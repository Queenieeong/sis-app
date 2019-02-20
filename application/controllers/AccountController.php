<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AccountController extends MY_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->_componentDir = 'pages/student';
		$this->_activeLink = 'my_classes';
		$this->_pageHeader = 'My Classes';

		$this->load->library('form_validation');

		$this->load->model([
			'user_model',
			'student_model',
			'school_year_model',
			'student_credential_model',
			'student_enrolled_model',
			'schedule_master_model',
			'schedule_class_model',
			'teacher_model'
		]);
	}

	public function myClasses()
	{
		$type = $this->uri->segment(3);
		if ($type === 'student') {
			$this->studentDetails();
		}
		if ($type === 'teacher') {
			$this->teacherDetails();
		}
	}


	public function studentDetails()
	{
		$this->_componentDir = 'pages/student';

		$user 					 = $this->ion_auth->user()->row();
		$student 				 = $this->student_model->get_by(['user_id' => $user->id]);
		$details 				 = $this->student_model->get_by(['id' => $student['id']]);
		$studentEnrolled = $this->student_enrolled_model->get_by(['student_id' => $student['id']]);
		$scheduleMaster  = $this->schedule_master_model->getByWithDetails(['section_id' => $studentEnrolled['section_id']]);
		$scheduleClasses = $this->schedule_class_model->getManyByWithDetails(['schedule_class.schedule_master_id' => $scheduleMaster['id']]);

		$this->data['studentID'] 			 = $student['id'];
		$this->data['studentEnrolled'] = $studentEnrolled;
		$this->data['scheduleMaster']  = $scheduleMaster;
		$this->data['scheduleClasses'] = $scheduleClasses;
		$this->data['details'] 				 = $details;
		$this->data['student_account'] = $this->user_model->get_by(['id' => $details['user_id']]);
		$this->data['credentials'] 		 = $this->student_credential_model->getManyByWithDetails(['student_credentials.student_id' => $student['id']]);

		$this->_renderLayout($this->_componentWrapper('components/student-profile'));
	}

	public function teacherDetails()
	{
		$this->_componentDir = 'pages/teacher';

		$user 	 = $this->ion_auth->user()->row();
		$details = $this->teacher_model->getByWithDetails(['teachers.user_id' => $user->id]);
		$classes = $this->schedule_class_model->getManyByWithDetails(['schedule_class.teacher_id' => $details['id']]);

		$this->data['user_account'] = $this->user_model->get_by(['id' => $user->id]);
		$this->data['details'] = $details;
		$this->data['classes'] = $classes;
		$this->data['teacherID'] = $details['id'];
		
		$this->_renderLayout($this->_componentWrapper('components/teacher-profile'));
	}

	public function classStudents()
	{
		$schedule_class_id = $this->uri->segment(4);
		$scheduleClasses = $this->schedule_class_model->getManyByWithStudentDetails(['schedule_class.id' => $schedule_class_id]);
		$scheduleClassesDetails = $this->schedule_class_model->getByWithDetails(['schedule_class.id' => $schedule_class_id]);

		$this->data['class_students'] = $scheduleClasses;
		$this->data['class_details']  = $scheduleClassesDetails;
		$this->_componentDir = 'pages/teacher';
		$this->_renderLayout($this->_componentWrapper('components/teacher-classes-students'));
	}

}
