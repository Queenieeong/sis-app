<?php

defined('BASEPATH') or exit('No direct script access allowed');

class SchoolSubjectController extends MY_Controller
{
	protected $schoolSubjectForm = 'pages/system-parameter/components/school-subject/components/create-school-subject';

	protected $columnsRows = [
        ['header' => 'Name', 'data' => 'name'],
        ['header' => 'Grade Level', 'data' => 'schoolGradeLevelName'],
        ['header' => 'Department', 'data' => 'schoolDepartmentName'],
        ['header' => 'Status', 'data' => 'labelActiveStatus'],
	];

	function __construct()
	{
		parent::__construct();

		$this->_componentDir = 'pages/system-parameter/components/school-subject';
		$this->_activeLink = 'system-parameters';
		$this->_pageHeader = 'School Subjects';
		$this->data['columnsRows'] = $this->columnsRows;
		$this->load->model([
			'subject_model',
			'department_model',
			'grade_level_model'
		]);
	}

	public function index()
	{
		$this->data['subjects'] = $this->subject_model->getAllRecordWithGradeLevel();
		$this->data['departments'] = $this->department_model->get_all();
		$this->data['gradeLevels'] = $this->grade_level_model->get_all();
		$this->data['modalContent'] = $this->schoolSubjectForm;
		$this->_renderLayout($this->_componentWrapper());
	}

	public function saveData()
	{
		$postedData = $this->input->post();

		$subjectsTagged = explode(',', $postedData['name']);

		$data = [];
		foreach ($subjectsTagged as $subject) {
			$gradeLevel = $this->grade_level_model->get_by(['id' => $postedData['grade_level_id']]);
			$data[] = array(
				'name' 			 => strtoupper($subject),
				'grade_level_id' => $gradeLevel['id'],
				'department_id'  => $gradeLevel['department_id'],
				'description' 	 => $postedData['description'],
				'active_status'  => 1,
			);
		}

		// @TODO: form validation

		$lastID = $this->subject_model->insert_many($data);
		
		if ( ! $lastID) {
			$this->session->set_flashdata('errorMsg', 'Unable to add the record.');
			redirect('schoolSubjects');
		}

		$this->session->set_flashdata('successMsg', 'Successfully added new record');
		redirect('schoolSubjects');
	}
}
