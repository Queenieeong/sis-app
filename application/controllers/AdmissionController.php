<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AdmissionController extends MY_Controller
{
	protected $_studentRegistrationForm = 'components/student-registration-form';
	  
	function __construct()
	{
		parent::__construct();

		$this->_componentDir = 'pages/admission';
		$this->_activeLink = 'admission';
		$this->_pageHeader = 'Student Registration';

		$this->load->library('form_validation');

		$this->load->model([
			'school_year_model',
			'student_model',
			'student_parent_model'
		]);
	}

	public function index()
	{
		$this->_renderLayout($this->_componentWrapper());
	}

	public function add()
	{
		$data = $this->input->post();

		$studentID = false;

		if (count($data) > 0) {
			$this->form_validation->set_data($data['student']);
		}

		if ($this->form_validation->run('student_register') != false)
		{

			$test = $this->student_parent_model->get_all();

			$firstName = explode(' ', $data['student']['first_name']);
			$lastName = $data['student']['last_name'];

			$username = strtoupper(implode('.', [$lastName, $firstName[0]]));
			$password = strtoupper(implode('.', [$lastName, $firstName[0]]));
			$email = $data['student']['email_address'];
			$additional_data = array(
				'first_name' => strtoupper($data['student']['first_name']),
				'last_name' => strtoupper($data['student']['last_name']),
			);
			$group = array('3'); // Sets user to student.

			$userID = $this->ion_auth->register($username, $password, $email, $additional_data, $group);
			
			if (!$userID) {
				$this->session->set_flashdata('ERROR_MESSAGE', $this->ion_auth->errors());
				redirect('admission');
			} else {
				$data['student']['user_id'] = $userID;

				$schoolYear = $this->school_year_model->get_by(['is_current' => 1]);
				$currentYear = date('Y', strtotime($schoolYear['date_start']));
				$studentNumber = implode('-', array(
					$currentYear,
					'03',
					str_pad($userID, 5, '0', STR_PAD_LEFT)
				));
				$data['student']['student_number'] = $studentNumber;
				
				$studentID = $this->student_model->insert($data['student']);
				$studentParentID = $this->student_parent_model->insert($data['parent']);

				$data = array(
				  'username' => $studentNumber,
				  'password' => $studentNumber,
				);

				$this->ion_auth->update($userID, $data);
				
				if ( ! $studentID) {
					$this->session->set_flashdata('ERROR_MESSAGE', 'Unable to create new student record.');
					redirect('admission');
				} else {

					$this->session->set_flashdata('SUCCESS_MESSAGE', 'Successfully created new student record.');
					redirect('admission');
				}
			}
		}

		$this->_renderLayout($this->_componentWrapper($this->_studentRegistrationForm));
	}

}
