<?php

// class Enrolment extends MY_Model {
//     protected $_table = 'school_departments';
//     protected $primary_key = 'id';
// 	protected $return_type = 'array';
// 	protected $after_get = array('afterGetPrepData');

// 	protected function afterGetPrepData($schoolYear) {
// 		if ($schoolYear == null) return false;
// 		$schoolYear['labelActiveStatus'] = ($schoolYear['active_status'] == 1) ? '<label class="badge badge-success">Active</label>':'<label class="badge badge-danger">Inactive</label>';
// 		return $schoolYear;
// 	}
// }