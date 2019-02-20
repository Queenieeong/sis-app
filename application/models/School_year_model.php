<?php

class School_year_model extends MY_Model {
    protected $_table = 'school_years';
    protected $primary_key = 'id';
	protected $return_type = 'array';
	protected $after_get = array('afterGetPrepData');

	protected function afterGetPrepData($schoolYear) {
		if ($schoolYear == null) return false;
		$schoolYear['dateStart'] = isset($schoolYear['date_start']) ? date('Y-m-d', strtotime($schoolYear['date_start'])):'';
		$schoolYear['dateEnd'] = isset($schoolYear['date_end']) ? date('Y-m-d', strtotime($schoolYear['date_end'])):'';
		$schoolYear['labelIsCurrent'] = isset($schoolYear['is_current']) ? (($schoolYear['is_current'] == 1) ? '<label class="text-success">Yes</label>':'<label class="text-danger">No</label>'):'';
		$schoolYear['action'] = isset($schoolYear['is_current']) ? (($schoolYear['is_current'] == 0) ? '<a href="'.site_url('schoolyear/set_as_current/'.$schoolYear['id']).'">Set as Current</a>':''):'';
		return $schoolYear;
	}

	protected $formRules = array(
		array(
			'field' => 'name',
			'label' => 'name',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'description',
			'label' => 'description',
			'rules' => 'trim'
		),
		array(
			'field' => 'date_start',
			'label' => 'date_start',
			'rules' => 'trim'
		),
		array(
			'field' => 'date_end',
			'label' => 'date_end',
			'rules' => 'trim'
		),
	);

	public function deActivatePreviousSchoolYear() {
		$previousSY = $this->get_by(['is_current' => 1]);
		if ($previousSY == null) return false;
		return $this->update($previousSY['id'], ['is_current' => 0]);
	}
}
