<?php

defined('BASEPATH') or exit('No direct script access allowed');

class StudentController extends MY_Controller
{
	protected $studentProfilePage = '';
	protected $columnsRows = [
		['header' => 'Student Number', 'data' => 'viewDetailsLink'],
		['header' => 'Last Name', 'data' => 'last_name'],
		['header' => 'First Name', 'data' => 'first_name'],
		['header' => 'Middle Name', 'data' => 'middle_name'],
		['header' => 'Is Enrolled', 'data' => 'labelIsEnrolled'],
	];
	function __construct()
	{
		parent::__construct();
		$this->_componentDir = 'pages/student';
		$this->_activeLink = 'students';
		$this->_pageHeader = 'students';

		$this->data['columnsRows'] = $this->columnsRows;

		$this->load->model([
			'user_model',
			'student_model',
			'student_credential_model',
			'student_enrolled_model',
			'schedule_master_model',
			'schedule_class_model'
		]);
	}

	public function index()
	{
		$this->data['students'] = $this->student_model->get_all();
		$this->_renderLayout($this->_componentWrapper());
	}

	public function details()
	{
		$studentID = $this->uri->segment(3);
		$details = $this->student_model->get_by(['id' => $studentID]);

		$studentEnrolled = $this->student_enrolled_model->get_by([
			'student_id' => $studentID
			// @TODO: add other parameters here. if student record is multiple just to filter records
		]);

		$scheduleMaster = $this->schedule_master_model->getByWithDetails([
			'section_id' => $studentEnrolled['section_id']
		]);

		$scheduleClasses = $this->schedule_class_model->getManyByWithDetails([
			'schedule_class.schedule_master_id' => $scheduleMaster['id']
		]);

		$this->data['studentID'] = $studentID;

		$this->data['studentEnrolled'] = $studentEnrolled;
		$this->data['scheduleMaster'] = $scheduleMaster;
		$this->data['scheduleClasses'] = $scheduleClasses;

		$this->data['details'] = $details;
		$this->data['student_account'] = $this->user_model->get_by(['id' => $details['user_id']]);

		$this->data['credentials'] = $this->student_credential_model->getManyByWithDetails(['student_credentials.student_id' => $studentID]);
		$this->_renderLayout($this->_componentWrapper('components/student-profile'));
	}

	public function doUpload()
	{
		$studentID = $this->uri->segment(3);

		$student = $this->student_model->get_by(['id' => $studentID]);

		$file_name = hash('md5', implode('-', array(
			$student['student_number'],
			$student['student_fullname']
		)));

		$config['upload_path'] = './assets/img/student-photos/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 1000;
		$config['max_width'] = 10240;
		$config['max_height'] = 10240;
		$config['file_name'] = $file_name;

		$this->load->helper('file');
		$this->load->library('upload');
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('userfile')) {
			$this->session->set_flashdata('ERROR_MESSAGE', $this->upload->display_errors());
			redirect('student/details/' . $studentID);
		} else {
			$uploadData = array('upload_data' => $this->upload->data());
			$fullPath = site_url('assets/img/student-photos/' . $uploadData['upload_data']['file_name']);
			$fileNameExtracted = pathinfo($uploadData['upload_data']['file_name']);
			$fileName = $fileNameExtracted['basename'];

			$updated = $this->student_model->update($studentID, array(
				'profile_photo_filename' => $fileName,
				'profile_photo_filepath' => $fullPath
			));

			if ($updated) {
				$this->session->set_flashdata('SUCCESS_MESSAGE', 'Successfully upload new image.');
				redirect('student/details/' . $studentID);
			} else {
				$this->session->set_flashdata('ERROR_MESSAGE', 'An error has occured while uploading photo. Please try again.');
				redirect('student/details/' . $studentID);
			}
		}
	}
}
