<?php

class Credential_template_model extends MY_Model {
    protected $_table = 'credential_templates';
    protected $primary_key = 'id';
	protected $return_type = 'array';
	protected $after_get = array('afterGetPrepData');

	protected function afterGetPrepData($schoolYear) {
		// if ($schoolYear == null) return false;
		// $schoolYear['labelActiveStatus'] = ($schoolYear['active_status'] == 1) ? '<label class="badge badge-success">Active</label>':'<label class="badge badge-danger">Inactive</label>';
		return $schoolYear;
    }
    
    public function getAllWithDetails()
    {
        $this->db->select('credential_templates.*, credentials.name as credentialName, credentials.description as credentialDescription')
                 ->join('credentials', 'credentials.id = credential_templates.credential_id', 'left');

        return $this->get_all();
    }
}
