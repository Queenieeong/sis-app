<?php

defined('BASEPATH') or exit('No direct script access allowed');

class RegistrarController extends MY_Controller
{

	protected $columnsRows = [
        ['header' => 'Student Number', 'data' => 'viewDetailsLink', 'alignment'=>'text-left'],
        ['header' => 'Last Name', 'data' => 'last_name', 'alignment'=>'text-left'],
        ['header' => 'First Name', 'data' => 'first_name', 'alignment'=>'text-left'],
        ['header' => 'Middle Name', 'data' => 'middle_name', 'alignment'=>'text-left'],
        ['header' => 'Is Enrolled', 'data' => 'labelIsEnrolled', 'alignment'=>'text-left'],
        ['header' => 'Action', 'data' => ['updateDetailsUrl', 'manageCredentials'], 'alignment'=>'text-center'],
        // ['header' => '', 'data' => '', 'alignment'=>'text-left'],
	];

	function __construct()
	{
		parent::__construct();

		$this->load->model([
			'student_model',
			'student_credential_model',
			'credential_model',
			'credential_template_model',
			'credential_requirement_model'
		]);

		$this->_componentDir = 'pages/registrar';
		$this->_activeLink = 'registrar';
		$this->_pageHeader = 'registrar';

		$this->data['columnsRows'] = $this->columnsRows;

	}

	public function index()
	{
		$this->data['students'] = $this->student_model->get_all();
		$this->_renderLayout($this->_componentWrapper());
	}

	public function update()
	{
		$studentID = $this->uri->segment(3);
		$this->data['studentID'] = $studentID;

		$studentDetails = $this->student_model->get_by(['id' => $studentID]);
		$this->data['studentDetails'] = $studentDetails;

		$post = $this->input->post();

		if (count($post) > 0) {
			$this->form_validation->set_data($post['student']);
		}

		if ($this->form_validation->run('student_update') != false)
		{
			unset($post['student']['parent_type_id']);
			
			$updated = $this->student_model->update($studentID, $post['student']);
			
			if ( ! $updated) {
				$this->session->set_flashdata('ERROR_MESSAGE', 'Unable to update student record.');
				redirect('registrar');
			} else {

				$this->session->set_flashdata('SUCCESS_MESSAGE', 'Successfully updated student record.');
				redirect('registrar');
			}
		}


		$this->_renderLayout($this->_componentWrapper('components/update-student-form'));
	}

	public function AddNewStudent()
	{

		$this->_renderLayout($this->_componentWrapper('components/add-student-form'));
	}

	public function studentCredentials()
	{
		$studentID = $this->uri->segment(3);
		$credentialRequirements = $this->credential_requirement_model->getAllWithDetails();
		$credentialTemplates = $this->credential_template_model->get_all();

		// check if student already submitted a credentials
		$hasStudentCredential = $this->student_credential_model->get_many_by(array('student_id' => $studentID));

		$this->_pageHeader = 'Student Credentials';

		$post = $this->input->post();
		$mode = '';
		$checker = false;
		$credentialTemplateID = null;
		$templateRequirements = null;
		$dataToSave = array();

		if (count($post) > 0) {
			$mode = $post['mode'];
			$credentialTemplateID = isset($post['credentialTemplateID']) ? $post['credentialTemplateID'] : null;
			$this->data['selected'] = $credentialTemplateID;
		}
		
		if($mode === 'chooseCredentialTemplate') {
			$templateRequirements = $this->credential_requirement_model->getManyWithDetailsBy([
				'credential_templates.id' => $credentialTemplateID
			]);
		}

		$errorHandler = array();
		if($mode === 'submitCredential') {
			foreach ($post['credential'] as $key => $val) {
				$lastID = $this->student_credential_model->insert(
					array(
						'student_id' => $studentID,
						'credential_template_id' => $post['credential_template_id'],
						'credential_id' => $val,
						'document_type' => $post['document_type'][$key],
						'remarks' => $post['remarks'][$key]
					)
				);

				$errorHandler[] = ($lastID) ? 'Success: key[' . $key . ']' : 'Error: key[' . $key . ']';

				if ($lastID) {
					$this->student_credential_model->update($lastID, array('is_submitted' => 1));
				} else {
					$errorHandler[] = 'Unable to update submit status.';
				}
			}

			$this->session->set_flashdata('SUCCESS_MESSAGE', 'Successfully added student credentials.');
			redirent('registrar');
		}

		$this->data['templateRequirements'] = $templateRequirements;
		$this->data['studentID'] = $studentID;
		$this->data['studentDetails'] = $this->student_model->get_by(['id' => $studentID]);
		$this->data['credentialRequirements'] = $credentialRequirements;
		$this->data['credentialTemplates'] = $credentialTemplates;
		$this->data['hasStudentCredential'] = $hasStudentCredential;
		
		$this->_renderLayout($this->_componentWrapper('components/student-credentials'));
	}
}
