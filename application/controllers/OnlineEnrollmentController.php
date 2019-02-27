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

		$student_id = false;

		$this->form_validation->set_data($data);

		if ($this->form_validation->run('online_student_registration') === true) {

			$first_name = explode(' ', $data['student_first_name']);
			$first_name = implode('', $first_name);
			$last_name = explode(' ', $data['student_last_name']);
			$last_name = implode('', $last_name);

			$username = strtoupper(implode('_', [$last_name, $first_name]));
			$password = $username;			

			$email = $data['student_email_address'];
			$additional_data = array(
				'first_name' => strtoupper($data['student_first_name']),
				'last_name'  => strtoupper($data['student_last_name']),
				'active'	 => 0
			);

			$groupID = array('3');

			$user_id = $this->ion_auth->register($username, $password, $email, $additional_data, $groupID);

			if ( ! $user_id) {

				$this->session->set_flashdata('ERROR_MESSAGE', $this->ion_auth->errors());
				redirect('online_enrollment/submit');
			
			} else {

				$this->load->model([
					'student_model',
					'student_parent_model',
					'school_year_model'
				]);

				$school_year = $this->school_year_model->get_by(['is_current' => 1]);
				
				$student_number = implode('', array(
					date('Y', strtotime($school_year['date_start'])),
					date('m'),
					date('d'),
					str_pad($user_id, 5, '0', STR_PAD_LEFT)
				));

				$this->ion_auth->update($user_id, [
					'username' => $student_number,
					'password' => $student_number
				]);

				$student_id = $this->student_model->insert([
					'user_id' 			=> $user_id,
					'student_number' 	=> $student_number,
					'first_name' 		=> $data['student_first_name'],
					'middle_name' 		=> $data['student_middle_name'],
					'last_name' 		=> $data['student_last_name'],
					'suffix_name' 		=> $data['student_suffix_name'],
					'current_address' 	=> $data['student_current_address'],
					'telephone_number' 	=> $data['student_telephone_number'],
					'mobile_number' 	=> $data['student_mobile_number'],
					'email_address'		=> $data['student_email_address'],
					'gender' 			=> $data['student_gender'],
					'birth_date' 		=> $data['student_birth_date'],
					'birth_place' 		=> $data['student_birth_place']
				]);

				$data['student_id'] = $student_id; 

				$student_parent_data = $this->_student_parent_data_wrapper($data);

				$parent_id = $this->student_parent_model->insert_many($student_parent_data);

				if ($student_id) {
					$this->session->set_flashdata('SUCCESS_MESSAGE', 'You are successfully registered as student to Probex School Inc. kindly settle your payments and be fully enrolled to our school.');
					redirect('/', 'refresh');
				} else {
					$this->session->set_flashdata('ERROR_MESSAGE', 'An error has occured while processing your request. Please try again.');
					redirect('/', 'refresh');
				}
			}
		}

		$this->load->view('layouts/online-enrollment');
	}

	private function _student_parent_data_wrapper($data = array()) {
		return array(
			array(
				'parent_type_id' 	=> 1,
				'student_id' 		=> $data['student_id'],
				'first_name' 		=> $data['father_first_name'],
				'middle_name' 		=> $data['father_middle_name'],
				'last_name' 		=> $data['father_last_name'],
				'suffix_name' 		=> $data['father_suffix_name'],
				'current_address'  	=> $data['father_current_address'],
				'telephone_number' 	=> $data['father_telephone_number'],
				'mobile_number' 	=> $data['father_mobile_number'],
				'email_address' 	=> $data['father_email_address'],
				'occupation' 		=> $data['father_occupation']
			),
			array(
				'parent_type_id' 	=> 2,
				'student_id' 		=> $data['student_id'],
				'first_name' 		=> $data['mother_first_name'],
				'middle_name' 		=> $data['mother_middle_name'],
				'last_name' 		=> $data['mother_last_name'],
				'suffix_name' 		=> $data['mother_suffix_name'],
				'current_address' 	=> $data['mother_current_address'],
				'telephone_number' 	=> $data['mother_telephone_number'],
				'mobile_number' 	=> $data['mother_mobile_number'],
				'email_address' 	=> $data['mother_email_address'],
				'occupation' 		=> $data['mother_occupation']
			)
		);
	}
}
