<?php

defined('BASEPATH') or exit('No direct script access allowed');

class EnrolmentController extends MY_Controller
{

	protected $columnsRows = [
        ['header' => 'Student Number', 'data' => 'processAction'],
        ['header' => 'Last Name', 'data' => 'last_name'],
        ['header' => 'First Name', 'data' => 'first_name'],
        ['header' => 'Middle Name', 'data' => 'middle_name'],
        ['header' => 'Is Enrolled', 'data' => 'labelIsEnrolled'],
	];

	function __construct()
	{
		parent::__construct();

		$this->_componentDir = 'pages/enrolment';
		$this->_activeLink = 'enrolment';
		$this->_pageHeader = 'enrolment';

		$this->data['columnsRows'] = $this->columnsRows;

		$this->load->model([
			'student_model',
			'school_year_model',
			'department_model',
			'grade_level_model',
			'section_model',
			'student_enrol_model',
			'schedule_master_model'
		]);

	}

	public function index()
	{
		$this->data['students'] = $this->student_model->get_many_by(['is_enrolled' => 0]);
		$this->_renderLayout($this->_componentWrapper());
	}

	public function process()
	{
		$this->_pageHeader = 'Enrolment Process';

		$studentID = $this->uri->segment(3);

		$this->data['studentID']      = $studentID;
		$this->data['studentDetails'] = $this->student_model->get_by(['id' => $studentID]);
		$this->data['schoolYear']  	  = $this->school_year_model->get_by(['is_current' => 1]);
		$this->data['departments'] 	  = $this->department_model->get_many_by(['active_status' => 1]);
		$this->data['gradeLevels'] 	  = $this->grade_level_model->get_many_by(['active_status' => 1]);
		$this->data['sections']    	  = $this->section_model->get_many_by(['active_status' => 1]);

		$data = $this->input->post();
		
		if (count($data) > 0) {
			$this->form_validation->set_data($data);
		}

		if ($this->form_validation->run('enrolment_process') != false)
		{
			$studentDetails = $this->student_model->get_by(['id' => $studentID]);

			$studentRecord = $this->student_enrol_model->get_by([
				'student_id' 	 => $data['student_id'],
				'school_year_id' => $data['school_year_id']
			]);

			$isEnrolled = (!empty($studentRecord) && count($studentRecord) > 0) ? true : false;

			$masterSchedule = $this->schedule_master_model->get_by([
				'school_year_id' => $data['school_year_id'],
				'section_id' => $data['section_id']
			]);

			if ($masterSchedule['capacity'] == 0) {
				$this->session->set_flashdata('ERROR_MESSAGE', 'Sorry, you selected a section that already reach the maximum capacity.');
				redirect('enrolment/process/' . $studentID, 'refresh');
			}

			if ($isEnrolled)
			{
				$this->session->set_flashdata('ERROR_MESSAGE', 'Sorry, the student is already enrolled.');
				redirect('enrolment/process/'.$studentID, 'refresh');
			}
			else
			{
				$lastID = $this->student_enrol_model->insert($data);

				if ($lastID)
				{
					$enrolled = $this->student_model->update($studentID, ['is_enrolled' => 1, 'student_enrolled_id' => $lastID]);

					$masterSchedule = $this->schedule_master_model->get_by([
						'school_year_id' => $data['school_year_id'],
						'section_id' => $data['section_id']
					]);

					$newCapacity = (!empty($masterSchedule)) ? --$masterSchedule['capacity'] : $masterSchedule['capacity'];

					$updatedSchedule = $this->schedule_master_model->update($masterSchedule['id'], ['capacity' => $newCapacity]);

					if ($enrolled && $updatedSchedule) {
						$this->session->set_flashdata('SUCCESS_MESSAGE', 'Successfully enrolled student named '.$studentDetails['student_fullname']);
						redirect('enrolment', 'refresh');
					} else {
						$this->session->set_flashdata('ERROR_MESSAGE', 'Sorry, unable to enrol student named '.$studentDetails['student_fullname']);
						redirect('enrolment', 'refresh');
					}
				}
				else
				{
					$this->session->set_flashdata('ERROR_MESSAGE', 'Sorry, unable to enrol student named '.$studentDetails['student_fullname']);
					redirect('enrolment', 'refresh');
				}
			}
		}
		$this->_renderLayout($this->_componentWrapper('components/enrolment-process-form'));
	}

}
