<?php

$config = array(
	'student_register' => array(
		array('field' => 'first_name', 'label' => 'Student First Name', 'rules' => 'trim|required'),
		array('field' => 'middle_name', 'label' => 'Student Middle Name', 'rules' => 'trim'),
		array('field' => 'last_name', 'label' => 'Student Last Name', 'rules' => 'trim|required|alpha'),
		array('field' => 'current_address', 'label' => 'Student Address', 'rules' => 'trim|required'),
		array('field' => 'telephone_number', 'label' => 'Student Telephone Number', 'rules' => 'trim|numeric'),
		array('field' => 'mobile_number', 'label' => 'Student Mobile Number', 'rules' => 'trim|numeric'),
		array('field' => 'email_address', 'label' => 'Student Email Address', 'rules' => 'trim|valid_email'),
		array('field' => 'gender', 'label' => 'Student Gender', 'rules' => 'trim|required')
    ),
	'parent_register' => array(
		array('field' => 'first_name', 'label' => 'Parent First Name', 'rules' => 'trim|required'),
		array('field' => 'middle_name', 'label' => 'Parent Middle Name', 'rules' => 'trim'),
		array('field' => 'last_name', 'label' => 'Parent Last Name', 'rules' => 'trim|required|alpha'),
		array('field' => 'current_address', 'label' => 'Parent Address', 'rules' => 'trim|required'),
		array('field' => 'telephone_number', 'label' => 'Parent Telephone Number', 'rules' => 'trim|numeric'),
		array('field' => 'mobile_number', 'label' => 'Parent Mobile Number', 'rules' => 'trim|numeric'),
		array('field' => 'email_address', 'label' => 'Parent Email Address', 'rules' => 'trim|valid_email'),
		array('field' => 'gender', 'label' => 'Parent Gender', 'rules' => 'trim|required'),
		array('field' => 'parent_type_id', 'label' => 'Parent Parent Information', 'rules' => 'trim|required')
    ),
	'student_update' => array(
		array('field' => 'first_name', 'label' => 'Student First Name', 'rules' => 'trim|required'),
		array('field' => 'middle_name', 'label' => 'Student Middle Name', 'rules' => 'trim'),
		array('field' => 'last_name', 'label' => 'Student Last Name', 'rules' => 'trim|required|alpha'),
		array('field' => 'current_address', 'label' => 'Student Address', 'rules' => 'trim|required'),
		array('field' => 'telephone_number', 'label' => 'Student Telephone Number', 'rules' => 'trim|numeric'),
		array('field' => 'mobile_number', 'label' => 'Student Mobile Number', 'rules' => 'trim|numeric'),
		array('field' => 'email_address', 'label' => 'Student Email Address', 'rules' => 'trim|valid_email'),
		array('field' => 'gender', 'label' => 'Student Gender', 'rules' => 'trim|required'),
		array('field' => 'parent_type_id', 'label' => 'Student Parent Information', 'rules' => 'trim|required')
	),
	'create_master_schedule' => array(
		array('field' => 'first_name', 'label' => 'Student First Name', 'rules' => 'trim|required'),
		array('field' => 'middle_name', 'label' => 'Student Middle Name', 'rules' => 'trim'),
		array('field' => 'last_name', 'label' => 'Student Last Name', 'rules' => 'trim|required|alpha'),
		array('field' => 'current_address', 'label' => 'Student Address', 'rules' => 'trim|required'),
		array('field' => 'telephone_number', 'label' => 'Student Telephone Number', 'rules' => 'trim|numeric'),
		array('field' => 'mobile_number', 'label' => 'Student Mobile Number', 'rules' => 'trim|numeric'),
		array('field' => 'email_address', 'label' => 'Student Email Address', 'rules' => 'trim|valid_email'),
		array('field' => 'gender', 'label' => 'Student Gender', 'rules' => 'trim|required'),
		array('field' => 'parent_type_id', 'label' => 'Student Parent Information', 'rules' => 'trim|required')
	),
	'teacher_register' => array(
		array('field' => 'first_name', 'label' => 'Student First Name', 'rules' => 'trim|required'),
		array('field' => 'middle_name', 'label' => 'Student Middle Name', 'rules' => 'trim'),
		array('field' => 'last_name', 'label' => 'Student Last Name', 'rules' => 'trim|required|alpha'),
		array('field' => 'address', 'label' => 'Student Address', 'rules' => 'trim|required'),
		array('field' => 'telephone_number', 'label' => 'Student Telephone Number', 'rules' => 'trim|numeric'),
		array('field' => 'mobile_number', 'label' => 'Student Mobile Number', 'rules' => 'trim|numeric'),
		array('field' => 'email_address', 'label' => 'Student Email Address', 'rules' => 'trim|valid_email'),
		array('field' => 'gender', 'label' => 'Student Gender', 'rules' => 'trim|required')
	),
	
	'create_announcement' => array(
		array('field' => 'title', 'label' => 'Title', 'rules' => 'trim|required'),
		array('field' => 'message', 'label' => 'Message', 'rules' => 'trim|required'),
	),
	
	'edit_announcement' => array(
		array('field' => 'title', 'label' => 'Title', 'rules' => 'trim'),
		array('field' => 'message', 'label' => 'Message', 'rules' => 'trim|required'),
	),
	
	'create_event' => array(
		array('field' => 'title', 'label' => 'Title', 'rules' => 'trim|required'),
		array('field' => 'message', 'label' => 'Message', 'rules' => 'trim|required'),
	),
	
	'edit_event' => array(
		array('field' => 'title', 'label' => 'Title', 'rules' => 'trim'),
		array('field' => 'message', 'label' => 'Message', 'rules' => 'trim|required'),
	),
	
	'enrolment_process' => array(
		array('field' => 'department_id', 'label' => 'Department', 'rules' => 'trim|required'),
		array('field' => 'grade_level_id', 'label' => 'Grade Level', 'rules' => 'trim|required'),
		array('field' => 'section_id', 'label' => 'Section', 'rules' => 'trim|required'),
		array('field' => 'date_enrolled', 'label' => 'Date Enrolled', 'rules' => 'trim|required'),
    ),
	
	'add_class' => array(
		array('field' => 'subject_id', 'label' => 'Subject', 'rules' => 'trim|required'),
	),
	
	'create_credential' => array(
		array('field' => 'name', 'label' => 'credential name', 'rules' => 'trim|required'),
		array('field' => 'description', 'label' => 'credential description', 'rules' => 'trim')
	),

	'create_credential_template' => array(
		array('field' => 'name', 'label' => 'Credential Template Name', 'rules' => 'trim|required')
	),
	'online_student_registration' => array(
	    array('field' => 'student_last_name', 		 'label' => 'student_last_name', 		'rules' => 'trim|required'),
		array('field' => 'student_first_name', 		 'label' => 'student_first_name', 		'rules' => 'trim|required'),
		array('field' => 'student_middle_name', 	 'label' => 'student_middle_name', 		'rules' => 'trim'),
		array('field' => 'student_suffix_name', 	 'label' => 'student_suffix_name', 		'rules' => 'trim'),
		array('field' => 'student_current_address',  'label' => 'student_current_address', 	'rules' => 'trim|required'),
		array('field' => 'student_telephone_number', 'label' => 'student_telephone_number', 'rules' => 'trim|required'),
		array('field' => 'student_mobile_number', 	 'label' => 'student_mobile_number', 	'rules' => 'trim|required'),
		array('field' => 'student_email_address', 	 'label' => 'student_email_address', 	'rules' => 'trim|required|valid_email'),
		array('field' => 'student_birth_date', 		 'label' => 'student_birth_date', 		'rules' => 'trim'),
		array('field' => 'student_birth_place', 	 'label' => 'student_birth_place', 		'rules' => 'trim'),
		array('field' => 'student_gender', 			 'label' => 'student_gender', 			'rules' => 'trim'),

		array('field' => 'father_last_name', 		'label' => 'father_last_name', 		  'rules' => 'trim|required'),
		array('field' => 'father_first_name', 		'label' => 'father_first_name', 	  'rules' => 'trim|required'),
		array('field' => 'father_middle_name', 		'label' => 'father_middle_name', 	  'rules' => 'trim'),
		array('field' => 'father_suffix_name', 		'label' => 'father_suffix_name', 	  'rules' => 'trim'),
		array('field' => 'father_current_address', 	'label' => 'father_current_address',  'rules' => 'trim|required'),
		array('field' => 'father_telephone_number', 'label' => 'father_telephone_number', 'rules' => 'trim|required'),
		array('field' => 'father_mobile_number', 	'label' => 'father_mobile_number', 	  'rules' => 'trim|required'),
		array('field' => 'father_email_address', 	'label' => 'father_email_address', 	  'rules' => 'trim|required|valid_email'),
		array('field' => 'father_occupation', 		'label' => 'father_occupation', 	  'rules' => 'trim'),

		array('field' => 'mother_last_name', 		'label' => 'mother_last_name', 		  'rules' => 'trim|required'),
		array('field' => 'mother_first_name', 		'label' => 'mother_first_name', 	  'rules' => 'trim|required'),
		array('field' => 'mother_middle_name', 		'label' => 'mother_middle_name', 	  'rules' => 'trim'),
		array('field' => 'mother_suffix_name', 		'label' => 'mother_suffix_name', 	  'rules' => 'trim'),
		array('field' => 'mother_current_address', 	'label' => 'mother_current_address',  'rules' => 'trim|required'),
		array('field' => 'mother_telephone_number', 'label' => 'mother_telephone_number', 'rules' => 'trim|required'),
		array('field' => 'mother_mobile_number', 	'label' => 'mother_mobile_number', 	  'rules' => 'trim|required'),
		array('field' => 'mother_email_address', 	'label' => 'mother_email_address', 	  'rules' => 'trim|required|valid_email'),
		array('field' => 'mother_occupation', 		'label' => 'mother_occupation', 	  'rules' => 'trim'),
    ),
);






