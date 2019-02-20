<?php

class Grade_level_model extends MY_Model {
    protected $_table = 'school_grade_levels';
    protected $primary_key = 'id';
    protected $return_type = 'array';
	protected $after_get = array('afterGetPrepData');

	protected function afterGetPrepData($record) {
		if ($record == null) return false;
		$record['labelActiveStatus'] = ($record['active_status'] == 1) ? '<label class="badge badge-success">Active</label>':'<label class="badge badge-danger">Inactive</label>';
		return $record;
	}

	public function getAllRecordWithDepartment() {
		$this->db->select('
			school_grade_levels.*,
			school_departments.name AS schoolDepartmentName
		');
		$this->db->join('school_departments', 'school_departments.id = school_grade_levels.department_id', 'left');
		return $this->get_all();
	}

	public function getManyByWithDepartment($param) {
		$this->db->select('
			school_grade_levels.*,
			school_departments.name AS schoolDepartmentName
		');
		$this->db->join('school_departments', 'school_departments.id = school_grade_levels.department_id', 'left');
		return $this->get_many_by($param);
	}
}
