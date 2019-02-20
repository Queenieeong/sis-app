<?php

defined('BASEPATH') or exit('No direct script access allowed');

class UserController extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->_componentDir = 'pages/user';
		$this->_activeLink = 'user';
		$this->_pageHeader = 'User';

		$this->load->library(array('ion_auth', 'form_validation'));
		$this->load->helper(array('url', 'language'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
		$this->load->model([
			'user_model', 'student_model'
		]);
	}

	public function index()
	{
		$this->_renderLayout($this->_componentWrapper());
	}

	public function profile()
	{
		$user = $this->ion_auth->user()->row();

		$this->data['details'] = $this->user_model->get_by(['id' => $user->id]);

		$this->_renderLayout($this->_componentWrapper('components/my-profile'));
	}


	/**
	 * Change password
	 */
	public function change_password()
	{

		$this->_pageHeader = 'Change Password';

		$this->form_validation->set_rules('old', $this->lang->line('change_password_validation_old_password_label'), 'required');
		$this->form_validation->set_rules('new', $this->lang->line('change_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
		$this->form_validation->set_rules('new_confirm', $this->lang->line('change_password_validation_new_password_confirm_label'), 'required');

		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login', 'refresh');
		}
		$redirectTo = $this->uri->segment(4);
		$this->data['redirectTo'] = $redirectTo;
		if (!empty($this->uri->segment(3))) {
			$user = $this->ion_auth->user($this->uri->segment(3))->row();
		} else {
			redirect($redirectTo, 'refresh');
		}

		$this->data['userData'] = $user;

		if ($this->form_validation->run() === false) {
			// display the form
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
			$this->data['old_password'] = array(
				'name' => 'old',
				'id' => 'old',
				'type' => 'password',
			);
			$this->data['new_password'] = array(
				'name' => 'new',
				'id' => 'new',
				'type' => 'password',
				'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
			);
			$this->data['new_password_confirm'] = array(
				'name' => 'new_confirm',
				'id' => 'new_confirm',
				'type' => 'password',
				'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
			);
			$this->data['user_id'] = array(
				'name' => 'user_id',
				'id' => 'user_id',
				'type' => 'hidden',
				'value' => $user->id,
			);

			// render

			$this->_renderLayout($this->_componentWrapper('components/change-password'));
		} else {
			$identity = $user->username;

			$change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

			if ($change) {
				//if the password was successfully changed
				$this->session->set_flashdata('SUCCESS_MESSAGE', $this->ion_auth->messages());
				redirect($redirectTo, 'refresh');
			} else {
				$this->session->set_flashdata('ERROR_MESSAGE', $this->ion_auth->errors());
				redirect($redirectTo, 'refresh');
			}
		}
	}

	public function reset_password()
	{
		$user_id = $this->uri->segment(3);
		$student_details = $this->student_model->get_by(['user_id' => $user_id]);

		$default_password = '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36';

		$this->user_model->update($user_id, ['password' => $default_password]);
		redirect('students/details/', $student_details['id']);
	}
}
