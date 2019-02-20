<?php

class Student_credential_model extends MY_Model {

    protected $_table = 'student_credentials';
    protected $primary_key = 'id';
    protected $return_type = 'array';

    protected $before_create = array('beforeCreatePrepData');

    protected function beforeCreatePrepData($data) {
        $data['created_by'] = $this->ion_auth->user()->row()->id;
        return $data;
    }

    protected function afterGetPrepData($data) {
        $format[1] = 'PDF Format';
        $format[2] = 'Docx Format';
        $format[3] = 'Hard Copy';
        
        $data['credential_doc_type'] = $format[$data['document_type']];
        
        return $data;
    }

    public function getManyByWithDetails($param) {

        $this->db->select('
                        student_credentials.*, 
                        credential_templates.name as credential_template_name,
                        credentials.name as credential_name,
                        credentials.description as credential_description
                    ')
                 ->join('credential_templates', 'credential_templates.id = student_credentials.credential_template_id', 'left')
                 ->join('credentials', 'credentials.id = student_credentials.credential_id', 'left');
        return $this->get_many_by($param);
    }
}