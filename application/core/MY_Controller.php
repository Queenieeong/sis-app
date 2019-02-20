<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
	protected $data = array();

	protected $_componentDir = '';

	protected $_activeLink = 'dashboard';
	protected $_pageHeader = 'Dashboard';

	function __construct()
	{
		parent::__construct();

		if ( ! $this->ion_auth->logged_in()) {
			redirect('auth/login');
		}

		$this->load->model('user_model');

		$user = $this->ion_auth->user()->row();
		$this->data['user'] = $this->user_model->get_by(['id' => $user->id]);
	}

	public function _componentWrapper($componentFile = 'index')
	{
		return implode('/', [$this->_componentDir, $componentFile]);
	}

	public function _renderLayout($sub_view = null)
	{
		$this->data['sub_view'] = (isset($sub_view)) ? $sub_view : 'errors/error_404';
		$this->data['activeLink'] = $this->_activeLink;
		$this->data['pageHeader'] = ucwords($this->_pageHeader);
		foreach ($this->config->item('main_components') as $key => $component) {
			$this->data[$key] = strtolower(sprintf('%s/%s', 'components', $component));
		}

		foreach ($this->config->item('layout_settings') as $layout_key => $layout_value) {
			$this->data[$layout_key] = $layout_value;
		}

		foreach ($this->config->item('btn_settings') as $btn_key => $btn_value) {
			$this->data[$btn_key] = $btn_value;
		}

		$this->load->view('layouts/new-main-layout', $this->data);
		$this->output->enable_profiler(false);
	}
}
