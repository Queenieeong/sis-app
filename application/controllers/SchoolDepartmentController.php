<?php

defined('BASEPATH') or exit('No direct script access allowed');

class SchoolDepartmentController extends MY_Controller
{
	protected $schoolDepartmentForm = 'pages/system-parameter/components/school-department/components/create-school-department';

	protected $columnsRows = [
        ['header' => 'Code Name', 'data' => 'code_name'],
        ['header' => 'Name', 'data' => 'name'],
        ['header' => 'Status', 'data' => 'labelActiveStatus'],
	];
	
	function __construct()
	{
		parent::__construct();

		$this->_componentDir = 'pages/system-parameter/components/school-department/';
		$this->_activeLink = 'system-parameters';
		$this->_pageHeader = 'School Department';
		$this->data['columnsRows'] = $this->columnsRows;

		$this->load->model([
			'department_model'
		]);
	}

	public function index()
	{
		$this->data['departments'] = $this->department_model->get_all();
		$this->data['modalContent'] = $this->schoolDepartmentForm;
		$this->_renderLayout($this->_componentWrapper());
	}

	public function saveData()
	{
		$postedData = $this->input->post();

		// @TODO: form validation

		$lastID = $this->department_model->insert($postedData);
		
		if ( ! $lastID) {
			$this->session->set_flashdata('errorMsg', 'Unable to add the record.');
			redirect('schoolDepartments');
		}

		$this->session->set_flashdata('successMsg', 'Successfully added new record');
		redirect('schoolDepartments');
	}
}
