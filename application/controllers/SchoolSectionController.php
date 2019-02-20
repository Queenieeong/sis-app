<?php

defined('BASEPATH') or exit('No direct script access allowed');

class SchoolSectionController extends MY_Controller
{

	protected $schoolSectionForm = 'pages/system-parameter/components/school-section/components/create-school-section';

	protected $columnsRows = [
        ['header' => 'Name', 'data' => 'name', 'link' => true],
        ['header' => 'Grade Level', 'data' => 'schoolGradeLevelName', 'link' => false],
        ['header' => 'Department', 'data' => 'schoolDepartmentName', 'link' => false],
        ['header' => 'Status', 'data' => 'labelActiveStatus', 'link' => false],
    ];

	function __construct()
	{
		parent::__construct();

		$this->_componentDir = 'pages/system-parameter/components/school-section';
		$this->_activeLink = 'system-parameters';
		$this->_pageHeader = 'School Sections';

		$this->data['columnsRows'] = $this->columnsRows;

		$this->load->model([
			'section_model',
			'grade_level_model'
		]);
	}

	public function index()
	{
		$this->data['gradeLevels'] = $this->grade_level_model->get_many_by(['active_status' => 1]);
		$this->data['sections'] = $this->section_model->getAllRecordWithGradeLevel();
		$this->data['modalContent'] = $this->schoolSectionForm;
		$this->_renderLayout($this->_componentWrapper());
	}

	public function saveData()
	{
		$postedData = $this->input->post();

		$sectionsTagged = explode(',', $postedData['name']);

		$data = [];
		foreach ($sectionsTagged as $section) {
			$data[] = array(
				'name' 			 => strtoupper($section),
				'grade_level_id' => $postedData['grade_level_id'],
				'description' 	 => $postedData['description'],
				'active_status'  => 1,
			);
		}
		// @TODO: form validation

		$lastID = $this->section_model->insert_many($data);
		
		if ( ! $lastID) {
			$this->session->set_flashdata('errorMsg', 'Unable to add the record.');
			redirect('schoolSections');
		}

		$this->session->set_flashdata('successMsg', 'Successfully added new record');
		redirect('schoolSections');
	}
}
