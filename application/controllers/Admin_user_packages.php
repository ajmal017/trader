<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_user_packages extends CI_Controller {

	public function __construct() 
	{
        parent::__construct();
        $this->load->model('Adminuserpackages_model');
    }

	public function index()
	{
		$session_data = $this->session->userdata;
		$data = array();
		$data['session_data'] = $session_data;

		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/user_packages',$data);
	}

	function deleteUserPackageRequest(){
		if($this->input->post())
		{
			$status = '';
			$message = '';
			$user_package_id = $this->input->post('user_package_id');

			$this->load->library('form_validation');
			$this->form_validation->set_rules('user_package_id', 'User Package ID', 'required');
			
			$this->form_validation->run();
	        $error_array = $this->form_validation->error_array();

	        if(count($error_array) == 0 )
	        {
		        $this->Adminuserpackages_model->deleteUserPackageRequest($user_package_id);	
				$status = 'success';
			    $message = 'Request Deleted successfully';	
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

    function userPackageRequestAction(){
		if($this->input->post())
		{
			$status = '';
			$message = '';
			$user_package_id = $this->input->post('user_package_id');
			$status = $this->input->post('status');
			$userid = $this->input->post('userid');

			$this->load->library('form_validation');
			$this->form_validation->set_rules('user_package_id', 'User Package ID', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');
			
			$this->form_validation->run();
	        $error_array = $this->form_validation->error_array();

	        if(count($error_array) == 0 )
	        {
		        $this->Adminuserpackages_model->userPackageRequestAction($user_package_id,$status,$userid);	
				$status = 'success';
			    $message = 'Request Deleted successfully';	
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
