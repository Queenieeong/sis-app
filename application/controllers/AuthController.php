<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AnnouncementController extends MY_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->_componentDir = 'pages/announcement';
		$this->_activeLink = 'announcements';
		$this->_pageHeader = 'announcements';

	}

	public function index()
	{
		$this->_renderLayout($this->_componentWrapper());
    }

    public function userList()
    {

    }

    /**
     * put some details here...
     *
     * @param   mix
     * @return  mix
     */
    public function roleList()
    {
        // put code here...
    }

    /**
     * put some details here...
     *
     * @param   mix
     * @return  mix
     */
    public function userGroupList()
    {
        // put code here...
    }

    /**
     * put some details here...
     *
     * @param   mix
     * @return  mix
     */
    public function rolePermissionList()
    {
        // put code here...
    }

    /**
     * put some details here...
     *
     * @param   mix
     * @return  mix
     */

}
    // put code here...
