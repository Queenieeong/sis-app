<?php

class Schedule_class_model extends MY_Model
{
	protected $_table = 'schedule_class';
	protected $primary_key = 'id';
	protected $return_type = 'array';
	protected $after_get = array('afterGetPrepData');

	protected function afterGetPrepData($data)
	{
		$data['daysAsArray'] = explode('-', $data['days']);
		$data['colspan'] = count($data['daysAsArray']);
		$data['timeSlot'] = implode(' to ', [$data['time_start'], $data['time_end']]);
		return $data;
	}

	public function getManyByWithDetails($param)
	{
		$this->db->select('
					schedule_class.*,
					ssubject.name as subjectName, 
					teacher.first_name as tfname,
					teacher.last_name as tlname,
					teacher.middle_name as tmname,
					teacher.teacher_number as trefnum,
					sy.name as syName,
					sd.name as sdName,
					sgl.name as sglName,
					ss.name as ssName,
					smaster.section_id
				')
			->join('schedule_master as smaster', 'smaster.id = schedule_class.schedule_master_id', 'left')
			->join('school_subjects as ssubject', 'ssubject.id = schedule_class.subject_id', 'left')
			->join('teachers as teacher', 'teacher.id = schedule_class.teacher_id', 'left')
			->join('school_years as sy', 'sy.id = smaster.school_year_id', 'left')
			->join('school_departments as sd', 'sd.id = smaster.department_id', 'left')
			->join('school_grade_levels as sgl', 'sgl.id = smaster.grade_level_id', 'left')
			->join('school_sections as ss', 'ss.id = smaster.section_id', 'left')
			->order_by('schedule_class.time_start');
		return $this->get_many_by($param);
	}

	public function school_days()
	{
		return array(
			array('name' => 'monday', 'shortName' => 'mon', 'other' => 'm'),
			array('name' => 'tuesday', 'shortName' => 'tue', 'other' => 't'),
			array('name' => 'wednesday', 'shortName' => 'wed', 'other' => 'w'),
			array('name' => 'thursday', 'shortName' => 'thu', 'other' => 'th'),
			array('name' => 'friday', 'shortName' => 'fri', 'other' => 'f'),
			array('name' => 'saturday', 'shortName' => 'sat', 'other' => 'sa'),
			array('name' => 'sunday', 'shortName' => 'sun', 'other' => 'su')
		);
	}

	public function getByWithDetails($param)
	{
		$this->db->select('
					schedule_class.*,
					school_subjects.name 		 as subject_name, 
					school_years.name 			 as school_year_name,
					school_departments.name  as school_department_name,
					school_grade_levels.name as school_grade_level_name,
					school_sections.name 		 as school_section_name
				')
			->join('schedule_master', 		'schedule_master.id = schedule_class.schedule_master_id',  'left')
			->join('school_subjects', 		'school_subjects.id = schedule_class.subject_id', 				 'left')
			->join('school_years', 				'school_years.id = schedule_master.school_year_id', 			 'left')
			->join('school_departments',  'school_departments.id = schedule_master.department_id', 	 'left')
			->join('school_grade_levels', 'school_grade_levels.id = schedule_master.grade_level_id', 'left')
			->join('school_sections', 		'school_sections.id = schedule_master.section_id', 				 'left')

			->order_by('schedule_class.time_start');

		return $this->get_by($param);
	}

	public function getManyByWithStudentDetails($param)
	{
		$this->db->select('
					schedule_class.*,
					school_subjects.name 		 as subjectName, 
					teachers.first_name 		 as teacher_first_name,
					teachers.last_name 			 as teacher_last_name,
					teachers.middle_name 		 as teacher_middler_name,
					teachers.teacher_number  as teacher_reference_number,
					school_years.name 			 as school_year_name,
					school_departments.name  as school_department_name,
					school_grade_levels.name as school_grade_level_name,
					school_sections.name 		 as school_section_name,
					students.student_number	 as student_number,
					students.first_name			 as student_first_name,
					students.middle_name		 as student_middle_name,
					students.last_name			 as student_last_name,
					students.id 						 as student_id
				')
			->join('schedule_master', 		'schedule_master.id = schedule_class.schedule_master_id', 	'left')
			->join('school_subjects', 		'school_subjects.id = schedule_class.subject_id', 					'left')
			->join('teachers', 						'teachers.id = schedule_class.teacher_id', 									'left')
			->join('school_years', 				'school_years.id = schedule_master.school_year_id', 				'left')
			->join('school_departments',  'school_departments.id = schedule_master.department_id', 		'left')
			->join('school_grade_levels', 'school_grade_levels.id = schedule_master.grade_level_id',	'left')
			->join('school_sections', 		'school_sections.id = schedule_master.section_id', 					'left')
			->join('student_enrolled', 		'student_enrolled.section_id = schedule_master.section_id', 'left')
			->join('students', 						'students.id = student_enrolled.student_id', 								'left')

			->order_by('schedule_class.time_start');

		return $this->get_many_by($param);
	}
}
