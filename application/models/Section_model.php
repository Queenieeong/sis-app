<?php

class Section_model extends MY_Model {
    protected $_table = 'school_sections';
    protected $primary_key = 'id';
    protected $return_type = 'array';
	protected $after_get = array('afterGetPrepData');

	protected function afterGetPrepData($schoolYear) {
		if ($schoolYear == null) return false;
		$schoolYear['labelActiveStatus'] = ($schoolYear['active_status'] == 1) ? '<label class="badge badge-success">Active</label>':'<label class="badge badge-danger">Inactive</label>';
		return $schoolYear;
	}

    public function getAllRecordWithGradeLevel() {
		$this->db->select('
			school_sections.*,
			school_grade_levels.name AS schoolGradeLevelName,
			school_departments.name AS schoolDepartmentName
		');
		$this->db->join('school_grade_levels', 'school_grade_levels.id = school_sections.grade_level_id', 'left');
		$this->db->join('school_departments', 'school_departments.id = school_grade_levels.department_id', 'left');
		return $this->get_all();
	}
	

    public function getManyByWithGradeLevel($param) {
		$this->db->select('
			school_sections.*,
			school_grade_levels.name AS schoolGradeLevelName,
			school_departments.name AS schoolDepartmentName
		');
		$this->db->join('school_grade_levels', 'school_grade_levels.id = school_sections.grade_level_id', 'left');
		$this->db->join('school_departments', 'school_departments.id = school_grade_levels.department_id', 'left');
		return $this->get_many_by($param);
    }
}
