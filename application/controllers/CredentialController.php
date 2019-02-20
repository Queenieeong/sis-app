<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Some class description here
 * 
 * @author
 */
class CredentialController extends MY_Controller
{

	/**
	 * Some description here
	 * 
	 * @author
	 * @param
	 * @return
	 */
	function __construct()
	{
		parent::__construct();

		$this->_componentDir = 'pages/system-parameter/components/school-student-credential';
		$this->_activeLink = 'system-parameters';
		$this->_pageHeader = 'School Student Credentials';

		$this->load->library('form_validation');

		$this->load->model([
			'credential_model',
			'credential_template_model',
			'credential_requirement_model'
		]);
	}

	/**
	 * Some description here
	 * 
	 * @author
	 * @param
	 * @return
	 */
	function index()
	{
		$this->data['credentials'] = $this->credential_model->get_all();
		$credentialTemplates = $this->credential_template_model->get_all();
		foreach ($credentialTemplates as $i => $credentialTemplate) {
			$numberOfRequiredCredential = $this->credential_requirement_model->count_by(['credential_template_id' => $credentialTemplate['id']]);
			$listOfCredentials = $this->credential_requirement_model->getManyWithDetailsBy(['credential_template_id' => $credentialTemplate['id']]);
			$credentialTemplates[$i]['numberOfRequiredCredential'] = $numberOfRequiredCredential;
			$credentialTemplates[$i]['listOfCredentials'] = $listOfCredentials;
		}
		$this->data['credentialTemplates'] = $credentialTemplates;
		$this->_renderLayout($this->_componentWrapper());
	}

	/**
	 * Some description here
	 * 
	 * @author
	 * @param
	 * @return
	 */
	function create()
	{
		$this->_pageHeader = 'Add Student Credential';

		$post = $this->input->post();

		if (count($post) > 0) {
			$this->form_validation->set_data($post);
		}

		if ($this->form_validation->run('create_credential') != false) {

			$credentialID = $this->credential_model->insert($post);

			if ($credentialID) {
				$this->session->set_flashdata('SUCCESS_MESSAGE', 'Successfully added new Credential');
				redirect('credential');
			} else {
				$this->session->set_flashdata('ERROR_MESSAGE', 'Unable to add new Credential.');
				redirect('credential');
			}

		}

		$this->_renderLayout($this->_componentWrapper('components/create-credential'));
	}

	/**
	 * Some description here
	 * 
	 * @author
	 * @param
	 * @return
	 */
	function createTemplate()
	{
		$this->_pageHeader = 'Add Credential Template';
		$this->data['credentials'] = $this->credential_model->get_all();

		$post = $this->input->post();

		if (count($post) > 0) {
			$this->form_validation->set_data($post);
		}

		if ($this->form_validation->run('create_credential_template') != false) {


			$templateID = $this->credential_template_model->insert(['name' => $post['name']]);

			$credentialRequirements = [];

			foreach ($post['credential'] as $i => $credentialID) {
				$credentialRequirements[$i]['credential_template_id'] = $templateID;
				$credentialRequirements[$i]['credential_id'] = $credentialID;
			}

			$errorHandler = [];

			foreach ($credentialRequirements as $credentialRequirement) {
				$id = $this->credential_requirement_model->insert($credentialRequirement);
				$errorHandler[] = (!$id) ? 'Error: credential_id(' . $credentialRequirement['credential_id'] . ')' : true;
			}

			// $templateID = $this->credentailtemplate->insert(['name' => $post['name']]);
			// $credentialID = $this->credential_model->insert($post);
			// if($credentialID){
			//     $this->session->set_flashdata('SUCCESS_MESSAGE', 'Successfully added new Credential');
			//     redirect('credential');
			// }else{
			//     $this->session->set_flashdata('ERROR_MESSAGE', 'Unable to add new Credential.');
			//     redirect('credential');
			// }

		}


		$this->_renderLayout($this->_componentWrapper('components/create-credential-template'));
	}
}
// End of file CredentialController.php
// Location: ./application/controller/CredentialController.php  