<?php

class Schedule_master_model extends MY_Model {
    protected $_table = 'schedule_master';
    protected $primary_key = 'id';
    protected $return_type = 'array';

    protected $before_create = array('beforeCreatePrepData');
	protected $after_get = array('afterGetPrepData');

    public function getScheduleMastersWithDetails()
    {
        $this->db->select('
            schedule_master.*,
            sYear.name AS sYearName,
            sDept.name AS sDeptName,
            sGrade.name AS sGradeName,
            sSection.name AS sSectionName
        ');
        $this->db->join('school_years as sYear', 'sYear.id = schedule_master.school_year_id', 'left');
        $this->db->join('school_departments as sDept', 'sDept.id = schedule_master.department_id', 'left');
        $this->db->join('school_grade_levels as sGrade', 'sGrade.id = schedule_master.grade_level_id', 'left');
        $this->db->join('school_sections as sSection', 'sSection.id = schedule_master.section_id', 'left');

        return $this->get_all();
    }

    public function getByWithDetails($param)
    {
        $this->db->select('
            schedule_master.*,
            sYear.name AS sYearName,
            sDept.name AS sDeptName,
            sGrade.name AS sGradeName,
            sSection.name AS sSectionName
        ');
        $this->db->join('school_years as sYear', 'sYear.id = schedule_master.school_year_id', 'left');
        $this->db->join('school_departments as sDept', 'sDept.id = schedule_master.department_id', 'left');
        $this->db->join('school_grade_levels as sGrade', 'sGrade.id = schedule_master.grade_level_id', 'left');
        $this->db->join('school_sections as sSection', 'sSection.id = schedule_master.section_id', 'left');

        return $this->get_by($param);
    }

    public function getManyByWithDetails($param)
    {
        $this->db->select('
            schedule_master.*,
            sYear.name AS sYearName,
            sDept.name AS sDeptName,
            sGrade.name AS sGradeName,
            sSection.name AS sSectionName
        ');
        $this->db->join('school_years as sYear', 'sYear.id = schedule_master.school_year_id', 'left');
        $this->db->join('school_departments as sDept', 'sDept.id = schedule_master.department_id', 'left');
        $this->db->join('school_grade_levels as sGrade', 'sGrade.id = schedule_master.grade_level_id', 'left');
        $this->db->join('school_sections as sSection', 'sSection.id = schedule_master.section_id', 'left');

        return $this->get_many_by($param);
    }

    protected function beforeCreatePrepData($data)
    {
        $data['date_created'] = date('Y-m-d H:i:s');
        $data['active_status'] = 1;
        return $data;
    }

    protected function afterGetPrepData($data)
    {
        if ($data == null) return false;
        
        $viewDetailsUrl   = site_url('scheduling/details/'.$data['id']);
        $updateDetailsUrl = site_url('scheduling/update/'.$data['id']);

        $title = implode(' ', [
            isset($data['sYearName']) ? $data['sYearName'] : '',
            isset($data['sDeptName']) ? $data['sDeptName'] : '',
            isset($data['sGradeName']) ? $data['sGradeName'] : '',
            isset($data['sSectionName']) ? $data['sSectionName'] : ''
        ]);

        $data['title'] = $title;
        $data['viewDetailsLink']  = '<a href="'.$viewDetailsUrl.'">' . $title . '</a>';
		$data['labelActiveStatus'] = ($data['active_status'] == 1) ? '<label class="badge badge-success">Active</label>':'<label class="badge badge-danger">Inactive</label>';
        
        return $data;
    }
}
