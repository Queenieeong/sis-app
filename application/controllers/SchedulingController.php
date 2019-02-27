<?php

defined('BASEPATH') or exit('No direct script access allowed');

class SchedulingController extends MY_Controller
{
	protected $columnsRows = [
		['header' => 'Title', 'data' => 'viewDetailsLink', 'alignment' => 'text-left'],
		['header' => 'Adviser', 'data' => 'adviser', 'alignment' => 'text-center'],
		['header' => 'Capacity', 'data' => 'capacity', 'alignment' => 'text-center'],
		['header' => 'Total Enrolled', 'data' => 'total_enrolled', 'alignment' => 'text-center'],
		['header' => 'Total Dropped', 'data' => 'total_dropped', 'alignment' => 'text-center'],
		['header' => 'Status', 'data' => 'labelActiveStatus', 'alignment' => 'text-center'],
	];

	function __construct()
	{
		parent::__construct();
		$this->_componentDir = 'pages/scheduling';
		$this->_activeLink = 'scheduling';
		$this->_pageHeader = 'scheduling';
		$this->data['columnsRows'] = $this->columnsRows;
		$this->load->model([
			'school_year_model',
			'department_model',
			'grade_level_model',
			'section_model',
			'subject_model',
			'schedule_master_model',
			'schedule_class_model',
			'teacher_model'
		]);
	}

	public function index()
	{
		$this->data['scheduleMasters'] = $this->schedule_master_model->getScheduleMastersWithDetails();
		$this->_renderLayout($this->_componentWrapper());
	}

	public function create()
	{
		$this->data['schoolYears'] = $this->school_year_model->get_many_by(['is_current' => 1]);
		$this->data['departments'] = $this->department_model->get_many_by(['active_status' => 1]);
		$this->data['gradeLevels'] = $this->grade_level_model->get_many_by(['active_status' => 1]);
		$this->data['sections']    = $this->section_model->get_many_by(['active_status' => 1]);
		$this->data['teachers']    = $this->teacher_model->get_many_by(['active_status' => 1]);
		$post = $this->input->post();
		if (count($post) > 0) {
			$this->form_validation->set_data($post['masterSchedule']);
			$meronNa = $this->schedule_master_model->get_by([
				'school_year_id' => $post['masterSchedule']['school_year_id'],
				'department_id'  => $post['masterSchedule']['department_id'],
				'grade_level_id' => $post['masterSchedule']['grade_level_id'],
				'section_id'     => $post['masterSchedule']['section_id']
			]);
			if ($meronNa != false) {
				$this->session->set_flashdata('ERROR_MESSAGE', 'Already exists.');
				redirect('scheduling/create');
			} else {
				$masterScheduleID = $this->schedule_master_model->insert($post['masterSchedule']);
				if ( ! $masterScheduleID) {
					$this->session->set_flashdata('ERROR_MESSAGE', 'Unable to create new schedule master record.');
					redirect('scheduling/create');
				} else {
					$this->session->set_flashdata('SUCCESS_MESSAGE', 'Successfully created new schedule master record.');
					redirect('scheduling');
				}
			}
		}
		$this->_renderLayout($this->_componentWrapper('components/master-schedule-form'));
	}

	public function details()
	{
		$scheduleMasterID = $this->uri->segment(3);
		$this->data['scheduleMasterID'] = $scheduleMasterID;
		$this->data['teachers'] = $this->teacher_model->get_many_by(['active_status' => 1]);
		$details = $this->schedule_master_model->getByWithDetails(['schedule_master.id' => $scheduleMasterID]);
		$classSchedules = $this->schedule_class_model->getManyByWithDetails(['schedule_master_id' => $scheduleMasterID]);
		$subjects = $this->subject_model->get_many_by(['grade_level_id' => $details['grade_level_id']]);
		$this->data['details'] = $details;
		$this->data['subjects'] = $subjects;
		$this->data['classSchedules'] = $classSchedules;
		$this->data['schoolDays'] = $this->schedule_class_model->school_days();
		$this->_renderLayout($this->_componentWrapper('components/master-schedule-details'));
	}

	public function addClass()
	{
		$data = $this->input->post();
		$scheduleMasterID = $this->uri->segment(3);
		if (count($data) > 0) {
			$this->form_validation->set_data($data);
		}
		if ($this->form_validation->run('add_class') != false) {
			$days = '';
			$daysArr = array();
			foreach($data['day'] as $index => $value) {
				array_push($daysArr, $index);
			}
			$days = implode('-', $daysArr);
			$data['days'] = $days;
			unset($data['day']);
			$data['schedule_master_id'] = $scheduleMasterID;
			$classScheduleID = $this->schedule_class_model->insert($data);
			if ( ! $classScheduleID) {
				$this->session->set_flashdata('ERROR_MESSAGE', 'Unable to add new class on master schedule.');
				redirect('scheduling/details/' . $scheduleMasterID);
			} else {
				$this->session->set_flashdata('SUCCESS_MESSAGE', 'Successfully added new class on master schedule.');
				redirect('scheduling/details/' . $scheduleMasterID);
			}
		}
	}

	public function ajax()
	{
		$param = $this->uri->segment(3);
		$postedData = $this->input->post();
		switch ($param) {
			case 'schoolYear':
				$selectedSchoolYear = $this->school_year_model->get_by(['id'=> $postedData['schoolYearID']]);
				$data['schoolYear'] = $selectedSchoolYear;
			break;
			case 'department':
				$selectedDepartment = $this->department_model->get_by(['id'=> $postedData['departmentID']]);
				$data['department'] = $selectedDepartment;
			break;
			case 'gradeLevel':
				$selectedGradeLevel = $this->grade_level_model->get_by(['id'=> $postedData['gradeLevelID']]);
				$data['gradeLevel'] = $selectedGradeLevel;
			break;
			case 'section':
				$selectedSection = $this->section_model->get_by(['id'=> $postedData['sectionID']]);
				$data['section'] = $selectedSection;
			break;
			case 'gradeLevelByDepartment':
				$gradeLevels = $this->grade_level_model->getManyByWithDepartment(['school_grade_levels.department_id'=> $postedData['departmentID']]);
				$data['gradeLevels'] = $gradeLevels;
			break;
			case 'sectionByGradeLevel':
				$sections = $this->section_model->getManyByWithGradeLevel(['school_sections.grade_level_id'=> $postedData['gradeLevelID']]);
				$data['sections'] = $sections;
			break;
		}
		$data['postedData'] = $postedData;
		echo json_encode(['data' => $data, 'param' => $param]);
	}


	/**
	 * NOTE: For testing purpose only
	 */
	public function master_schedule()
	{
		$data['events'] = [
			[
				'title' => 'Event 11',
				'start' => '2018-08-11'
			],
			[
				'title' => 'Event 12',
				'start' => '2018-08-01',
				'end' => '2018-08-30'
			],
			[
				'title' => 'Event 13',
				'start' => '2018-08-13'
			],
			[
				'title' => 'Event 14',
				'start' => '2018-08-14'
			],
			[
				'title' => 'Event 15',
				'start' => '2018-08-15'
			],
			[
				'title' => 'Event 16',
				'start' => '2018-08-16'
			],
			[
				'title' => 'Event 17',
				'start' => '2018-08-17'
			],
			[
				'title' => 'Event 18',
				'start' => '2018-08-18'
			],
			[
				'title' => "Pres. Duterte's SONA 2018",
				'start' => '2018-08-24'
			]
		];
		print json_encode($data);
	}

}
