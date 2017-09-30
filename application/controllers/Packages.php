<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Packages extends CI_Controller {

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
		$this->load->view('template/packages',$data);
	}

	public function add_packages()
	{
		$session_data = $this->session->userdata;
		$data = array();
		$data['session_data'] = $session_data;
		$this->load->view('template/add_packages',$data);
	}

	public function content()
	{
		$package_id = $this->input->get('package_id');
		$session_data = $this->session->userdata;
		$data = array();
		$data['session_data'] = $session_data;
		$data['package_id'] = $package_id;
		
		$this->load->view('template/package_content',$data);
	}

	public function view($package_id,$package_media_id)
	{
		$session_data = $this->session->userdata;
		$data = array();
		$data['session_data'] = $session_data;
		$data['package_id'] = $package_id;
		$data['package_media_id'] = $package_media_id;
		
		$this->load->view('template/package_content_view',$data);
	}

	public function add_user_package()
	{
		if($this->input->post())
		{
			$status = '';
			$message = '';
			$session_data = $this->session->userdata;
			$userid = $session_data['logged_in']['userid'];
		
			$package_id = $this->input->post('package_id');
			$payment_details = $this->input->post('payment_details');
			$payment_type = $this->input->post('payment_type');
			$quantity = 1;

			$this->load->library('form_validation');
			$this->form_validation->set_rules('package_id', 'Package', 'required');
			$this->form_validation->set_rules('payment_details', 'Payment Details', 'required');
			$this->form_validation->set_rules('payment_type', 'Payment Type', 'required');
			//$this->form_validation->set_rules('quantity', 'Quantity', 'required');
			$this->form_validation->run();
			$error_array = $this->form_validation->error_array();

			if(count($error_array) == 0 )
	        {
	        	$this->load->model('Packages_model');
				$this->Packages_model->add_user_package($userid,$package_id,$quantity,$payment_details,$payment_type);
	        	$status = 'success';
			    $message = 'added successfully';
			    $status_code = 200;
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