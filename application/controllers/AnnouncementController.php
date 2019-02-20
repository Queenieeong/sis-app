<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AnnouncementController extends MY_Controller
{
	protected $columnsRows = [
        ['header' => 'Title', 'data' => 'title'],
        ['header' => 'Date Start', 'data' => 'date_start'],
        ['header' => 'Date End', 'data' => 'date_end'],
        ['header' => 'Edit', 'data' => 'editAction'],
        ['header' => 'Status', 'data' => 'publishAction'],
	];

	function __construct()
	{
		parent::__construct();

		$this->_componentDir = 'pages/announcement';
		$this->_activeLink = 'announcements';
		$this->_pageHeader = 'announcements';

		$this->data['columnsRows'] = $this->columnsRows;

		$this->load->model([
			'announcement_model'
		]);

	}

	public function index()
	{
		$this->data['announcements'] = $this->announcement_model->get_all();
		$this->_renderLayout($this->_componentWrapper());
	}
	
	public function create()
	{
		$this->_pageHeader = 'Create Announcement';
		
		$data = $this->input->post();

		if (count($data) > 0) {
			$this->form_validation->set_data($data);
		}

		if ($this->form_validation->run('create_announcement') != false)
		{
			$lastID = $this->announcement_model->insert($data);

			if ($lastID)
			{
				$this->session->set_flashdata('SUCCESS_MESSAGE', 'Successfully created the announcement.');
				redirect('/announcements', 'refresh');
			}
			else
			{
				$this->session->set_flashdata('ERROR_MESSAGE', 'Unable to create the announcement.');
				redirect('/announcements', 'refresh');
			}
		
		}

		$this->_renderLayout($this->_componentWrapper('components/create-announcement'));
	}

	public function edit()
	{
		$this->_pageHeader = 'Edit Announcement';

		$announcementID = $this->uri->segment(3);

		$this->data['announcementID'] = $announcementID;
		$this->data['details'] = $this->announcement_model->get_by(['id' => $announcementID]);
		
		$data = $this->input->post();
		
		if (count($data) > 0) {
			$this->form_validation->set_data($data);
		}

		if ($this->form_validation->run('edit_announcement') != false)
		{
			$updated = $this->announcement_model->update($announcementID, $data);

			if ($updated)
			{
				$this->session->set_flashdata('SUCCESS_MESSAGE', 'Successfully edited the announcement.');
				redirect('/announcements', 'refresh');
			}
			else
			{
				$this->session->set_flashdata('ERROR_MESSAGE', 'Unable to edit the announcement.');
				redirect('/announcements', 'refresh');
			}
		}

		$this->_renderLayout($this->_componentWrapper('components/edit-announcement'));
	}

	public function published()
	{
		$announcementID = $this->uri->segment(3);

		$updated = $this->announcement_model->update($announcementID, ['publish_status' => 1]);

		if ($updated)
		{
			$this->session->set_flashdata('SUCCESS_MESSAGE', 'Successfully published the announcement.');
			redirect('/announcements', 'refresh');
		}
		else
		{
			$this->session->set_flashdata('ERROR_MESSAGE', 'Unable to publish the announcement.');
			redirect('/announcements', 'refresh');
		}
	}
	
	public function unpublished()
	{
		$announcementID = $this->uri->segment(3);

		$updated = $this->announcement_model->update($announcementID, ['publish_status' => 0]);

		if ($updated)
		{
			$this->session->set_flashdata('SUCCESS_MESSAGE', 'Successfully unpublished the announcement.');
			redirect('/announcements', 'refresh');
		}
		else
		{
			$this->session->set_flashdata('ERROR_MESSAGE', 'Unable to unpublish the announcement.');
			redirect('/announcements', 'refresh');
		}
	}
	

}
