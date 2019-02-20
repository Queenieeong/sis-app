<?php

class Teacher_model extends MY_Model
{
	protected $_table = 'teachers';
	protected $primary_key = 'id';
	protected $return_type = 'array';

	protected $before_create = array(
		'beforeCreatePrepData'
	);

	protected $after_get = array(
		'afterGetPrepData'
	);

	protected function beforeCreatePrepData($data)
	{
		$data['active_status'] = 1;
		$data['date_created'] = date('Y-m-d H:i:s');
		$data['created_by'] = $this->ion_auth->user()->row()->id;

		return $data;
	}

	protected function afterGetPrepData($data)
	{
		if ($data == null) return false;

		$viewDetailsUrl = site_url('teacher/details/' . $data['id']);
		$updateDetailsUrl = site_url('teacher/update/' . $data['id']);

		$data['full_name'] = strtoupper(
			implode(' ', array(
				$data['last_name'] . ',',
				$data['first_name'],
				$data['middle_name']
			))
		);

		$data['account_number_with_full_name'] = strtoupper(
			implode(' ', array(
				$data['teacher_number'] . ' -',
				$data['last_name'] . ',',
				$data['first_name'],
				$data['middle_name']
			))
		);

		$data['viewDetailsLink'] = '<a href="' . $viewDetailsUrl . '">' . $data['teacher_number'] . '</a>';
		$data['updateDetailsUrl'] = '<a href="' . $updateDetailsUrl . '">Update</a>';
		$data['labelIsActive'] = ($data['active_status'] == 1) ? '<label class="badge badge-success">Active</label>' : '<label class="badge badge-danger">Inactive</label>';

		return $data;
	}

	public function getByWithDetails($param)
	{
		$this->db->select('
					teachers.*, school_subjects.name as subject_name,
					school_departments.name as school_department_name,
					school_grade_levels.name as school_grade_level_name
				')
			->join('school_subjects', 'school_subjects.id = teachers.specialized_subject_id', 'left')
			->join('school_departments', 'school_departments.id = school_subjects.department_id', 'left')
			->join('school_grade_levels', 'school_grade_levels.id = school_subjects.grade_level_id', 'left');

		return $this->get_by($param);
	}
}
