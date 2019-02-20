<?php

defined('BASEPATH') or exit('No direct script access allowed');

class OnlineEnrollmentController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function index() {
		$this->load->view('layouts/online-enrollment');
	}

	public function submit() {
		$data = $this->input->post();

		$studentID = false;

		$this->form_validation->set_data($data);

		if ($this->form_validation->run('online_student_registration') === true) {
			dump($data);
			$firstname = explode(' ', $data['student_first_name']);
			$firstname = implode('', $firstname);
			$lastname = explode(' ', $data['student_last_name']);
			$lastname = implode('', $lastname);

			$username = strtoupper(implode('_', [$lastname, $firstname]));
			$password = $username;

			$email = $data['student_email_address'];
			$additional_data = array(
				'first_name' => strtoupper($data['student_first_name']),
				'last_name'  => strtoupper($data['student_last_name']),
			);

			$groupID = array('3');

			$userID = $this->ion_auth->register($username, $password, $email, $additional_data, $groupID);

			if (!$userID) {
				$this->session->set_flashdata('ERROR_MESSAGE', $this->ion_auth->errors());
				redirect('online_enrollment/submit');
			} else {

			}
		} else {
			// dump(validation_errors());
		}

		$this->load->view('layouts/online-enrollment');


	}
}
