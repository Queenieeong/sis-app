<?php

defined('BASEPATH') or exit('No direct script access allowed');

class TeacherController extends MY_Controller
{
	protected $_teacherRegistrationForm = 'components/teacher-registration-form';
	protected $columnsRows = [
		['header' => 'Account Number', 'data' => 'viewDetailsLink'],
		['header' => 'Fullname', 'data' => 'full_name'],
		['header' => 'Status', 'data' => 'labelIsActive'],
	];

	function __construct()
	{
		parent::__construct();
		$this->_componentDir = 'pages/teacher';
		$this->_activeLink = 'teacher';
		$this->_pageHeader = 'Teacher';
		$this->data['columnsRows'] = $this->columnsRows;
		$this->load->model([
			'teacher_model',
			'school_year_model',
			'schedule_class_model',
			'schedule_master_model',
			'department_model',
			'grade_level_model',
			'section_model',
			'subject_model'
		]);
	}

	public function index()
	{
		$this->data['teachers'] = $this->teacher_model->get_all();
		$this->_renderLayout($this->_componentWrapper());
	}

	public function add()
	{
		$this->_pageHeader = 'Add New Teacher';
		$data = $this->input->post();
		$teacherID = false;
		$this->data['departments'] = $this->department_model->get_all();
		$this->data['grade_levels'] = $this->grade_level_model->get_all();
		$this->data['sections'] = $this->section_model->get_all();
		$this->data['subjects'] = $this->subject_model->getAllRecordWithDetails();
		if (count($data) > 0) {
			$this->form_validation->set_data($data['teacher']);
		}
		if ($this->form_validation->run('teacher_register') != false)
		{
			$firstName = explode(' ', $data['teacher']['first_name']);
			$lastName = $data['teacher']['last_name'];
			$username = strtoupper(implode('_', [$lastName, $firstName[0]]));
			$password = strtoupper(implode('_', [$lastName, $firstName[0]]));
			$email = $data['teacher']['email_address'];
			$additional_data = array(
				'first_name' => strtoupper($data['teacher']['first_name']),
				'last_name' => strtoupper($data['teacher']['last_name']),
			);
			$group = array('4'); // Sets user to teacher.
			$userID = $this->ion_auth->register($username, $password, $email, $additional_data, $group);
			if (!$userID) {
				$this->session->set_flashdata('ERROR_MESSAGE', $this->ion_auth->errors());
				redirect('teacher');
			} else {
				$data['teacher']['user_id'] = $userID;
				$schoolYear = $this->school_year_model->get_by(['is_current' => 1]);
				$currentYear = date('Y', strtotime($schoolYear['date_start']));
				$teacherNumber = implode('-', array(
					$currentYear,
					'04',
					str_pad($userID, 5, '0', STR_PAD_LEFT)
				));
				$data['teacher']['teacher_number'] = $teacherNumber;
				$teacherID = $this->teacher_model->insert($data['teacher']);
				if ( ! $teacherID) {
					$this->session->set_flashdata('ERROR_MESSAGE', 'Unable to create new teacher record.');
					redirect('teacher');
				} else {
					$this->session->set_flashdata('SUCCESS_MESSAGE', 'Successfully created new teacher record.');
					redirect('teacher');
				}
			}
		}
		$this->_renderLayout($this->_componentWrapper($this->_teacherRegistrationForm));
	}

	public function details()
	{
		$this->_pageHeader = 'Teacher Profile';
		$teacherID = $this->uri->segment(3);
		$details = $this->teacher_model->getByWithDetails(['teachers.id' => $teacherID]);
		$classes = $this->schedule_class_model->getManyByWithDetails([
			'schedule_class.teacher_id' => $teacherID
		]);
		$this->data['user_account'] = $this->user_model->get_by(['id' => $details['user_id']]);
		$this->data['teacherID'] = $teacherID;
		$this->data['details'] = $details;
		$this->data['classes'] = $classes;
		$this->_renderLayout($this->_componentWrapper('components/teacher-profile'));
	}

	public function uploadProfilePicture()
	{
		$teacherID = $this->uri->segment(3);
		$teacher = $this->teacher_model->get_by(['id' => $teacherID]);
		$file_name = hash('md5', implode('-', array(
			$teacher['teacher_number'],
			$teacher['full_name']
		)));
		$config['upload_path']   = './assets/img/teacher-photos/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']      = 1000;
		$config['max_width']     = 10240;
		$config['max_height']    = 10240;
		$config['file_name']     = $file_name;
		$this->load->helper('file');
		$this->load->library('upload');
		$this->upload->initialize($config);
		if(!$this->upload->do_upload('userfile')){
			$this->session->set_flashdata('ERROR_MESSAGE',$this->upload->display_errors());
			redirect('teacher/details/'.$teacherID);
		}else{
			$uploadData = array('upload_data' => $this->upload->data());
			$fullPath = site_url('assets/img/teacher-photos/'.$uploadData['upload_data']['file_name']);
			$fileNameExtracted = pathinfo($uploadData['upload_data']['file_name']);
			$fileName = $fileNameExtracted['basename'];
			$updated = $this->teacher_model->update($teacherID, array(
				'profile_photo_filename' => $fileName,
				'profile_photo_filepath' => $fullPath
			));
			if ($updated){
				$this->session->set_flashdata('SUCCESS_MESSAGE', 'Successfully upload new image.');
				redirect('teacher/details/'.$teacherID);
			}else{
				$this->session->set_flashdata('ERROR_MESSAGE', 'An error has occured while uploading photo. Please try again.');
				redirect('teacher/details/'.$teacherID);
			}
		}
	}

	public function update()
	{
		$id = $this->uri->segment(3);
		dump($id);
	}
}
