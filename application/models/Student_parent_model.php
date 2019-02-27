<?php

class Student_parent_model extends MY_Model {

  protected $_table = 'student_parent';
  protected $primary_key = 'id';
  protected $return_type = 'array';

  protected $before_create = array(
  	'before_create_prep_created_field',
  	'before_create_prep_active_status_field'
  );


  protected function before_create_prep_created_field($data) {
  	$data['created_at'] = date('Y-m-d H:i:s');
  	return $data;
  }

  protected function before_create_prep_active_status_field($data) {
  	$data['active_status'] = 1;
  	return $data;
  }

}