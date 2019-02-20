<?php

defined('BASEPATH') or exit('No direct script access allowed');

class SchoolYearController extends MY_Controller
{

	protected $schoolYearForm = 'pages/system-parameter/components/school-year/components/create-school-year';

	protected $columnsRows = [
        ['header' => 'Name', 'data' => 'name'],
        ['header' => 'Date Start', 'data' => 'dateStart'],
        ['header' => 'Date End', 'data' => 'dateEnd'],
		['header' => 'Current', 'data' => 'labelIsCurrent'],
		['header' => 'Action', 'data' => 'action'],
    ];

	function __construct()
	{
		parent::__construct();

		$this->_componentDir = 'pages/system-parameter/components/school-year/';
		$this->_activeLink = 'system-parameters';
		$this->_pageHeader = 'School Years';

		$this->data['columnsRows'] = $this->columnsRows;

		$this->load->model([
			'school_year_model'
		]);
	}

	public function index()
	{
		$this->data['schoolYears'] = $this->school_year_model->get_all();
		$this->data['modalContent'] = $this->schoolYearForm;
		$this->_renderLayout($this->_componentWrapper());
	}

	public function saveData()
	{
		$postedData = $this->input->post();
		
		$havePreviousSchoolYear = false;

		if (isset($postedData['is_current']) || $postedData['is_current'] == 'on') {
			$postedData['is_current'] = 1;
			$havePreviousSchoolYear = $this->school_year_model->deActivatePreviousSchoolYear();
		}

		$lastID = $this->school_year_model->insert($postedData);
		
		if ( ! $lastID) {
			$this->session->set_flashdata('ERROR_MESSAGE', 'Unable to add the record.');
			redirect('schoolYears');
		}

		$this->session->set_flashdata('SUCCESS_MESSAGE', 'Successfully added new record');
		redirect('schoolYears');
	}

	function setAsCurrent()
	{
		$schoolYearID = $this->uri->segment(3);

		$previousSY = $this->school_year_model->get_by(['is_current' => 1]);
		$this->school_year_model->update($previousSY['id'], ['is_current' => 0]);

		$this->school_year_model->update($schoolYearID, ['is_current' => 1]);

		$this->session->set_flashdata('SUCCESS_MESSAGE', 'Successfully changed current school year.');
		redirect('schoolYears');
	}
}
