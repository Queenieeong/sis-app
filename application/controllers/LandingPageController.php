<?php defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/Home_Controller.php';

class LandingPageController extends Home_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->_componentDir = 'pages/home';
		$this->_activeLink = 'home';
		$this->_pageHeader = 'home';
		$this->load->config('config');
	}

	public function index()
	{
		$this->_renderLayout($this->_componentWrapper());
	}
}
