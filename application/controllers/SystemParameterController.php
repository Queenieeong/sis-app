<?php

defined('BASEPATH') or exit('No direct script access allowed');

class SystemParameterController extends MY_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->_componentDir = 'pages/system-parameter';
		$this->_activeLink = 'system-parameter';
		$this->_pageHeader = 'system parameter';

	}

	public function index()
	{
		$this->_renderLayout($this->_componentWrapper());
	}

}
