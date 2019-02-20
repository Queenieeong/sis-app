<?php

defined('BASEPATH') or exit('No direct script access allowed');

class EventsController extends MY_Controller
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

		$this->_componentDir = 'pages/event';
		$this->_activeLink = 'events';
		$this->_pageHeader = 'events';
		
		$this->data['columnsRows'] = $this->columnsRows;

		$this->load->model([
			'event_model'
		]);

	}

	public function index()
	{
		$this->data['events'] = $this->event_model->get_all();
		$this->_renderLayout($this->_componentWrapper());
	}

	
	
	public function create()
	{
		$this->_pageHeader = 'Create Event';
		
		$data = $this->input->post();

		if (count($data) > 0) {
			$this->form_validation->set_data($data);
		}

		if ($this->form_validation->run('create_event') != false)
		{
			$lastID = $this->event_model->insert($data);

			if ($lastID)
			{
				$this->session->set_flashdata('SUCCESS_MESSAGE', 'Successfully created the event.');
				redirect('/events', 'refresh');
			}
			else
			{
				$this->session->set_flashdata('ERROR_MESSAGE', 'Unable to create the event.');
				redirect('/events', 'refresh');
			}
		
		}

		$this->_renderLayout($this->_componentWrapper('components/create-event'));
	}

	public function edit()
	{
		$this->_pageHeader = 'Edit Event';

		$eventID = $this->uri->segment(3);

		$this->data['eventID'] = $eventID;
		$this->data['details'] = $this->event_model->get_by(['id' => $eventID]);
		
		$data = $this->input->post();
		
		if (count($data) > 0) {
			$this->form_validation->set_data($data);
		}

		if ($this->form_validation->run('edit_event') != false)
		{
			$updated = $this->event_model->update($eventID, $data);

			if ($updated)
			{
				$this->session->set_flashdata('SUCCESS_MESSAGE', 'Successfully edited the event.');
				redirect('/events', 'refresh');
			}
			else
			{
				$this->session->set_flashdata('ERROR_MESSAGE', 'Unable to edit the event.');
				redirect('/events', 'refresh');
			}
		}

		$this->_renderLayout($this->_componentWrapper('components/edit-event'));
	}

	public function published()
	{
		$eventID = $this->uri->segment(3);

		$updated = $this->event_model->update($eventID, ['publish_status' => 1]);

		if ($updated)
		{
			$this->session->set_flashdata('SUCCESS_MESSAGE', 'Successfully published the event.');
			redirect('/events', 'refresh');
		}
		else
		{
			$this->session->set_flashdata('ERROR_MESSAGE', 'Unable to publish the event.');
			redirect('/events', 'refresh');
		}
	}
	
	public function unpublished()
	{
		$eventID = $this->uri->segment(3);

		$updated = $this->event_model->update($eventID, ['publish_status' => 0]);

		if ($updated)
		{
			$this->session->set_flashdata('SUCCESS_MESSAGE', 'Successfully unpublished the event.');
			redirect('/events', 'refresh');
		}
		else
		{
			$this->session->set_flashdata('ERROR_MESSAGE', 'Unable to unpublish the event.');
			redirect('/events', 'refresh');
		}
	}

}
