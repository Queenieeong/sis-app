<?php

defined('BASEPATH') or exit('No direct script access allowed');

class SchoolGradeLevelController extends MY_Controller
{
	protected $schoolGradeLevelForm = 'pages/system-parameter/components/school-grade-level/components/create-school-grade-level';

	protected $columnsRows = [
        ['header' => 'Department', 'data' => 'schoolDepartmentName'],
        ['header' => 'Name', 'data' => 'name'],
        ['header' => 'Status', 'data' => 'labelActiveStatus'],
	];

	function __construct()
	{
		parent::__construct();

		$this->_componentDir = 'pages/system-parameter/components/school-grade-level';
		$this->_activeLink = 'system-parameters';
		$this->_pageHeader = 'School Grade Level';
		$this->data['columnsRows'] = $this->columnsRows;

		$this->load->model([
			'grade_level_model',
			'department_model'
		]);
	}

	public function index()
	{
		$this->data['departments'] = $this->department_model->get_many_by(['active_status' => 1]);
		$this->data['gradelevels'] = $this->grade_level_model->getAllRecordWithDepartment();
		$this->data['modalContent'] = $this->schoolGradeLevelForm;
		$this->_renderLayout($this->_componentWrapper());
	}

	public function saveData()
	{
		$postedData = $this->input->post();
		dump($postedData);

		$sectionsTagged = explode(',', $postedData['name']);

		$data = [];
		foreach ($sectionsTagged as $section) {
			$data[] = array(
				'name' 			=> strtoupper($section),
				'department_id' => $postedData['department_id'],
				'description' 	=> $postedData['description'],
				'active_status' => 1
			);
		}
		
		// @TODO: form validation

		$lastID = $this->grade_level_model->insert_many($data);
		
		if ( ! $lastID) {
			$this->session->set_flashdata('errorMsg', 'Unable to add the record.');
			redirect('schoolGradeLevels');
		}

		$this->session->set_flashdata('successMsg', 'Successfully added new record');
		redirect('schoolGradeLevels');
	}
}
