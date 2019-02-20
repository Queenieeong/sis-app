<?php

class Subject_model extends MY_Model {
    protected $_table = 'school_subjects';
    protected $primary_key = 'id';
    protected $return_type = 'array';
	protected $after_get = array('afterGetPrepData');

	protected function afterGetPrepData($record) {
		if ($record == null) return false;
		$record['labelActiveStatus'] = ($record['active_status'] == 1) ? '<label class="badge badge-success">Active</label>':'<label class="badge badge-danger">Inactive</label>';
		return $record;
	}

	public function getAllRecordWithGradeLevel() {
		$this->db->select('
			school_subjects.*,
			school_departments.name AS schoolDepartmentName,
			school_grade_levels.name AS schoolGradeLevelName
		');
		$this->db->join('school_departments', 'school_departments.id = school_subjects.department_id', 'left');
		$this->db->join('school_grade_levels', 'school_grade_levels.id = school_subjects.grade_level_id', 'left');
		return $this->get_all();
	}

	public function getAllRecordWithDetails() {
		$this->db->select('
			school_subjects.*,
			school_departments.name AS schoolDepartmentName,
			school_grade_levels.name AS schoolGradeLevelName
		');
		$this->db->join('school_departments', 'school_departments.id = school_subjects.department_id', 'left');
		$this->db->join('school_grade_levels', 'school_grade_levels.id = school_subjects.grade_level_id', 'left');
		return $this->get_all();
	}
}
