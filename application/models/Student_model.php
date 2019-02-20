<?php

class Student_model extends MY_Model {
    protected $_table = 'students';
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
        $data['created_at'] = date('Y-m-d H:i:s');

        return $data;
    }

    protected function afterGetPrepData($data)
    {
		if ($data == null) return false;

        $viewDetailsUrl    = site_url('student/details/'.$data['id']);
        $updateDetailsUrl  = site_url('student/update/'.$data['id']);
        $manageCredentials = site_url('student/credentials/'.$data['id']);

        $processEnrol = '<a href="'.site_url('enrolment/process/'.$data['id']).'">Process</a>';

        $data['viewDetailsLink']   = '<a href="'.$viewDetailsUrl.'">' . $data['student_number'] . '</a>';
        $data['updateDetailsUrl']  = '<a href="'.$updateDetailsUrl.'" class="btn btn-sm btn-primary">Edit Details</a>';
        $data['manageCredentials'] = '<a href="'.$manageCredentials.'" class="btn btn-sm btn-primary">Manage Credentials</a>';
        $data['labelIsEnrolled']   = ($data['is_enrolled'] == 1) ? 'Yes' : 'No';
        $data['processAction']     = ($data['is_enrolled'] == 1) ? '<a href="'.$viewDetailsUrl.'">' . $data['student_number'] . '</a>' : $processEnrol;

        $data['student_fullname'] = ucwords(implode(' ', array(
            $data['last_name'] . ',',
            $data['first_name'],
            $data['middle_name']
        )));

        return $data;
    }
}
