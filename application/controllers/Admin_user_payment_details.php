<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_user_payment_details extends CI_Controller {

	public function __construct() 
	{
        parent::__construct();
        $this->load->model('Admin_user_payment_details_model');
    }

	public function index()
	{
		$session_data = $this->session->userdata;
		$data = array();
		$data['session_data'] = $session_data;
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/user_payment_details',$data);
	}

	public function view($view_userid = 0)
	{
		$session_data = $this->session->userdata;
		$data = array();
		$data['session_data'] = $session_data;
		$data['view_userid'] = $view_userid;
		$this->load->view('admin/includes/header',$data);

		$this->load->view('admin/user_payment_details_view',$data);
	}

    function get_user_payment_details(){
		if($this->input->post())
		{
			$status = '';
			$message = '';
			$userid = $this->input->post('userid');
			

			$this->load->library('form_validation');
			$this->form_validation->set_rules('userid', 'User ID', 'required');
			
			
			$this->form_validation->run();
	        $error_array = $this->form_validation->error_array();

	        if(count($error_array) == 0 )
	        {
	        	$result = user_payment_details($userid);
	        	//dump($result);
	        	if(count($result) > 0)
	        	{
		        	$status = 'success';
				    $message = $result;	
				    $status_code = 200;		
	        	}else
	        	{
		        	$status = 'error';
				    $message = 'User ID not found';	
				    $status_code = 501;	
	        	}
		        
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

    function release_payment(){
		if($this->input->post())
		{
			$status = '';
			$message = '';
			$userid = $this->input->post('userid');
			$release_amount = $this->input->post('release_amount');
			$payment_desc = $this->input->post('payment_desc');
						

			$this->load->library('form_validation');
			$this->form_validation->set_rules('userid', 'User ID', 'required');
			$this->form_validation->set_rules('release_amount', 'Release Amount', 'required|numeric|greater_than[0]');
			
			
			$this->form_validation->run();
	        $error_array = $this->form_validation->error_array();
	        
	        $payment_data = user_payment_details($userid);
	        if($release_amount > $payment_data['Remaining_Amount'])
	        {
	        	$error_array['release_amount'] = 'Release Amount is greater than Remaining Amount.';	
	        }
	        if(count($error_array) == 0 )
	        {
	        	$result = $this->Admin_user_payment_details_model->release_payment($userid,$release_amount,$payment_desc);
	        	$status = 'success';
				$message = 'Successfully Released Payment';
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
