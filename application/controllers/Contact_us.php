<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_us extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$session_data = $this->session->userdata;
		$data = array();
		$data['session_data'] = $session_data;
		$this->load->view('frontend/contact_us',$data);
	}

	public function save_contact()
	{
		if($this->input->post())
		{
			$status = '';
			$message = '';
			
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$mobile = $this->input->post('mobile');
			$enquiry = $this->input->post('enquiry');

			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('mobile', 'Mobile', 'required|numeric');
			$this->form_validation->set_rules('enquiry', 'Enquiry', 'required');

			$this->form_validation->run();
			$error_array = $this->form_validation->error_array();

			if(count($error_array) == 0 )
	        {
	        	$this->load->model('Contactus_model');
				$this->Contactus_model->save_contact($name,$email,$mobile,$enquiry);
	        	$status = 'success';
			    $message = 'added successfully';
			    $status_code = 200;

			    $email_data = array();
				$template_data = array();
				$template_data['email'] = $email;
				$template_data['name'] = $name;
				$template_data['mobile'] = $mobile;
				$template_data['enquiry'] = $enquiry;
				$email_data['subject'] = 'New Enquiry';
				$email_data['html'] = $this->load->view('frontend/email_templates/contact_us',$template_data,true);;
				$email_data['to'] = 'info@onlinetradinginstitute.in';
				send_email($email_data);
	        }else
			{
				$status = 'error';
			    $message = $error_array;
			    $status_code = 501;
			}
			$response = array('status'=>$status,'message'=>$message);
			echo responseObject($response,$status_code);			
		}
	}
}
