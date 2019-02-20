<?php

class User_model extends MY_Model {
    protected $_table = 'users';
    protected $primary_key = 'id';
    protected $return_type = 'array';

    protected $before_create = array(
        'beforeCreatePrepData'
    );

    protected $after_get = array(
        'afterGetPrepData'
    );

    public function beforeCreatePrepData($data)
    {
        return $data;
    }

    public function afterGetPrepData($data)
    {
        $user = $this->ion_auth->user()->row();

        $user_groups = $this->ion_auth->get_users_groups($user->id)->result();
        $data['user_group_id'] = $user_groups[0]->id;

        $data['fullname'] = ucwords(
            strtolower(implode(' ', array(
                $data['first_name'],
                $data['last_name']
            )))
        );

        $data['account_status'] = $data['active'] == 1 ? '<label class="badge badge-success">Active</label>' : '<label class="badge badge-danger">Inactive</label>';
        
        $data = $this->_removeSensitiveData($data);


        return $data;
    }

    private function _removeSensitiveData($data)
    {
        unset($data['ip_address']);
        unset($data['password']);
        unset($data['salt']);
        unset($data['activation_code']);
        unset($data['forgotten_password_code']);
        unset($data['forgotten_password_time']);

        return $data;
    }

}
