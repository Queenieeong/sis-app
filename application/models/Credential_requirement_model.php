<?php

class Credential_requirement_model extends MY_Model {


    protected $_table = 'credential_requirements';
    protected $primary_key = 'id';
    protected $return_type = 'array';
    protected $after_get = array('afterGetPrepData');
    protected $before_create = array('breforeCreatePrepData');

    protected function afterGetPrepData($data)
    {
        return $data;
    }

    protected function breforeCreatePrepData($data)
    {
        $data['created_by'] = $this->ion_auth->user()->row()->id;
        return $data;
    }

    public function getAllWithDetails()
    {
        $this->db->select('
                    credential_requirements.*,
                    credentials.name as credentialName,
                    credentials.description as credentialDescription,
                    credential_templates.name as credentialTemplateName
                  ')
                 ->join('credential_templates', 'credential_templates.id = credential_requirements.credential_template_id', 'left')
                 ->join('credentials', 'credentials.id = credential_requirements.credential_id', 'left');


        return $this->get_all();
    }

    public function getManyWithDetailsBy($param)
    {
        $this->db->select('
                    credential_requirements.*,
                    credentials.name as credentialName,
                    credentials.description as credentialDescription,
                    credential_templates.name as credentialTemplateName
                  ')
                 ->join('credential_templates', 'credential_templates.id = credential_requirements.credential_template_id', 'left')
                 ->join('credentials', 'credentials.id = credential_requirements.credential_id', 'left');


        return $this->get_many_by($param);
    }
}