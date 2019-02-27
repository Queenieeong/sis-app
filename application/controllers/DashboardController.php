<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DashboardController extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->_componentDir = 'pages/dashboard';
		$this->_activeLink = 'dashboard';
		$this->_pageHeader = 'dashboard';

		$this->load->model([
			'announcement_model', 
			'event_model',
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




	public function index()
	{

		// $type = $this->uri->segment(2);
		// if ($type === 'student') {
			
		// }
		if ($this->ion_auth->in_group(array('student'))) {
			$user 					 = $this->ion_auth->user()->row();
			$student 				 = $this->student_model->get_by(['user_id' => $user->id]);
			$details 				 = $this->student_model->get_by(['id' => $student['id']]);
			$studentEnrolled = $this->student_enrolled_model->get_by(['student_id' => $student['id']]);
			$scheduleMaster  = $this->schedule_master_model->getByWithDetails(['section_id' => $studentEnrolled['section_id']]);
			$scheduleClasses = $this->schedule_class_model->getManyByWithDetails(['schedule_class.schedule_master_id' => $scheduleMaster['id']]);

			$this->data['studentID'] 	   = $student['id'];
			$this->data['studentEnrolled'] = $studentEnrolled;
			$this->data['scheduleMaster']  = $scheduleMaster;
			$this->data['scheduleClasses'] = $scheduleClasses;
			$this->data['details'] 		   = $details;
			$this->data['student_account'] = $this->user_model->get_by(['id' => $details['user_id']]);
			$this->data['credentials'] 	   = $this->student_credential_model->getManyByWithDetails(['student_credentials.student_id' => $student['id']]);
			$this->data['announcements']   = $this->announcement_model->get_many_by(['publish_status' => 1]);
			$this->data['events']          = $this->event_model->get_many_by(['publish_status' => 1]);
			$this->data['school_year']	   = $this->school_year_model->get_by(['is_current' => 1]);

			$this->_renderLayout($this->_componentWrapper());
		}
		else {
			$this->data['announcements'] = $this->announcement_model->get_many_by(['publish_status' => 1]);
			$this->data['events'] = $this->event_model->get_many_by(['publish_status' => 1]);
			$this->data['school_year']	   = $this->school_year_model->get_by(['is_current' => 1]);
			
			$this->_renderLayout($this->_componentWrapper());
		}
		
	}
}
