<?php

class Announcement_model extends MY_Model {

    protected $_table = 'announcements';
    protected $primary_key = 'id';
    protected $return_type = 'array';

	protected $before_create = array('beforeCreatePrepData');
    protected $after_get = array('afterGetPrepData');
    
    protected function beforeCreatePrepData($data)
    {
		$data['created_at'] = date('Y-m-d H:i:s');
		return $data;
    }

    protected function afterGetPrepData($data)
    {
        if ($data == null) return false;

        $published   = '<a class="btn btn-success btn-sm" href="' . site_url('announcements/published/' . $data['id']) .'">Published</a>';
        $unpublished = '<a class="btn btn-danger btn-sm" href="' . site_url('announcements/unpublished/' . $data['id']) .'">Unpublished</a>';
  
        $data['publishAction'] = ($data['publish_status'] == 0) ? $published : $unpublished;

        $data['editAction'] = '<a class="btn btn-primary btn-sm" href="'.site_url('announcements/edit/'.$data['id']).'">Edit</a>';
		return $data;
	}


}
