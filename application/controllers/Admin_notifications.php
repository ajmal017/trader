<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_notifications extends CI_Controller {

	public function __construct() 
	{
        parent::__construct();
        $this->load->model('Admin_notifications_model');
    }

	public function index()
	{
		$session_data = $this->session->userdata;
		$data = array();
		$data['session_data'] = $session_data;
		$this->load->view('template/admin/notifications',$data);
	}

	public function edit($notification_id=0)
	{
		$session_data = $this->session->userdata;
		$data = array();
		$data['session_data'] = $session_data;
		$data['notification_id']=$notification_id;
		
		$this->load->view('template/admin/edit_notification',$data);
	}

	function add_notification(){
		if($this->input->post())
		{
			$status = '';
			$message = '';
			$notification = $this->input->post('notification');
			$packages = $this->input->post('packages');
			
			$this->load->library('form_validation');
			$this->form_validation->set_rules('notification', 'Notification', 'required');
			
			$this->form_validation->run();
	        $error_array = $this->form_validation->error_array();

	        if(count($error_array) == 0 )
	        {
		        $this->Admin_notifications_model->add_notification($notification,$packages);
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

    function edit_notification(){
		if($this->input->post())
		{
			$status = '';
			$message = '';
			$notification = $this->input->post('notification');
			$notification_id = $this->input->post('notification_id');
			$notification_status = $this->input->post('notification_status');

			$this->load->library('form_validation');
			$this->form_validation->set_rules('notification', 'Notification', 'required');
			$this->form_validation->set_rules('notification_id', 'Notification ID', 'required');
			$this->form_validation->set_rules('notification_status', 'Notification Status', 'required');
			
			$this->form_validation->run();
	        $error_array = $this->form_validation->error_array();

	        if(count($error_array) == 0 )
	        {
		        $this->Admin_notifications_model->edit_notification($notification,$notification_status,$notification_id);	
				$status = 'success';
			    $message = 'updated successfully';	
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

    function delete_notification(){
		if($this->input->post())
		{
			$status = '';
			$message = '';
			$notification_id = $this->input->post('notification_id');

			$this->load->library('form_validation');
			$this->form_validation->set_rules('notification_id', 'Notification ID', 'required');
			
			$this->form_validation->run();
	        $error_array = $this->form_validation->error_array();

	        if(count($error_array) == 0 )
	        {
		        $this->Admin_notifications_model->delete_notification($notification_id);	
				$status = 'success';
			    $message = 'Deleted successfully';	
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
