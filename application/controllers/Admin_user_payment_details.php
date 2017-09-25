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
		$this->load->view('template/admin/user_payment_details',$data);
	}

	public function view($payment_method,$view_userid = 0)
	{
		$session_data = $this->session->userdata;
		$data = array();
		$data['session_data'] = $session_data;
		$data['view_userid'] = $view_userid;
		$data['payment_method'] = $payment_method;
		$this->load->view('template/admin/user_payment_details_view',$data);
	}

	public function roi()
	{
		$session_data = $this->session->userdata;
		$data = array();
		$data['session_data'] = $session_data;
		$this->load->view('template/admin/roi',$data);
	}

	public function loyality_income()
	{
		$session_data = $this->session->userdata;
		$data = array();
		$data['session_data'] = $session_data;
		$this->load->view('template/admin/loyality_income',$data);
	}

	public function referral_income()
	{
		$session_data = $this->session->userdata;
		$data = array();
		$data['session_data'] = $session_data;
		$this->load->view('template/admin/referral_income',$data);
	}

    function get_payment_details(){
		if($this->input->post())
		{
			$status = '';
			$message = '';
			$userid = $this->input->post('userid');
			$payment_method = $this->input->post('payment_method');

			$this->load->library('form_validation');
			$this->form_validation->set_rules('userid', 'User ID', 'required');
			$this->form_validation->set_rules('payment_method', 'Payment Method', 'required');
			
			
			$this->form_validation->run();
	        $error_array = $this->form_validation->error_array();

	        if(count($error_array) == 0 )
	        {
	        	if($payment_method == 'roi')
		        {
		        	$result = roi_details($userid);
		        }else if($payment_method == 'referral_income')
		        {
		        	$result = referral_income_details($userid);
		        }else if($payment_method == 'loyality_income')
		        {
		        	$result = loyality_income_details($userid);
		        }
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
			$payment_method = $this->input->post('payment_method');

						

			$this->load->library('form_validation');
			$this->form_validation->set_rules('userid', 'User ID', 'required');
			$this->form_validation->set_rules('payment_method', 'Payment Method', 'required');
			$this->form_validation->set_rules('release_amount', 'Release Amount', 'required|numeric|greater_than[0]');
			
			
			$this->form_validation->run();
	        $error_array = $this->form_validation->error_array();
	        
	        $tablename = '';
	        if($payment_method == 'roi')
	        {
	        	$payment_data = roi_details($userid);
	        	$tablename = 'return_of_interest';	
	        }else if($payment_method == 'referral_income')
	        {
	        	$payment_data = referral_income_details($userid);
	        	$tablename = 'referral_income';
	        }else if($payment_method == 'loyality_income')
	        {
	        	$payment_data = loyality_income_details($userid);
	        	$tablename = 'loyality_income';	
	        }
	        
	        
	        if($release_amount > $payment_data['Remaining_Amount'])
	        {
	        	$error_array['release_amount'] = 'Release Amount is greater than Remaining Amount.';	
	        }
	        if(count($error_array) == 0 )
	        {
	        	$result = $this->Admin_user_payment_details_model->release_payment($userid,$release_amount,$payment_desc,$tablename);
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
