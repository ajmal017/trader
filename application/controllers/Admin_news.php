<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_news extends CI_Controller {

	public function __construct() 
	{
        parent::__construct();
       	$this->load->model('Adminnews_model');
   		$this->menu_active = 'Admin_news';
    }

	public function index()
	{
		$session_data = $this->session->userdata;
		$data = array();
		$data['session_data'] = $session_data;
		
		$this->load->view('template/admin/news',$data);
	}

	public function edit($news_id = 0)
	{
		$session_data = $this->session->userdata;
		$data = array();
		$data['session_data'] = $session_data;
		$data['news_id']=$news_id;
		
		$this->load->view('template/admin/edit_news',$data);
	}

	public function save_news()
	{
		if($this->input->post())
		{
			$status = '';
			$message = '';
			$this->load->library('form_validation');
			$news_heading = $this->input->post('news_heading');
			$news_desc = $this->input->post('news_desc');
			
			$this->form_validation->set_rules('news_heading', 'News Heading', 'required');
			$this->form_validation->set_rules('news_desc', 'News Description', 'required');
			
			$this->form_validation->run();
	        $error_array = $this->form_validation->error_array();
	        
	        if(count($error_array) == 0 )
	        {
	        	$this->Adminnews_model->save_news($news_heading,$news_desc,config_item('current_date'));	
			    $status = 'success';
			    $message = 'Added successfully';
	        }else
	        {
	        	$status = 'error';
	        	$message = $error_array;
	        }
	        $response = array('status'=>$status,'message'=>$message);
			echo responseObject($response);
		}
	}

	public function edit_news()
	{
		if($this->input->post())
		{
			$status = '';
			$message = '';
			$this->load->library('form_validation');
			$news_heading = $this->input->post('news_heading');
			$news_desc = $this->input->post('news_desc');
			$news_id = $this->input->post('news_id');
			
			$this->form_validation->set_rules('news_heading', 'News Heading', 'required');
			$this->form_validation->set_rules('news_desc', 'News Description', 'required');
			$this->form_validation->set_rules('news_id', 'News ID', 'required');
			
			$this->form_validation->run();
	        $error_array = $this->form_validation->error_array();
	        
	        if(count($error_array) == 0 )
	        {
	        	$this->Adminnews_model->edit_news($news_id,$news_heading,$news_desc);	
			    $status = 'success';
			    $message = 'Edited successfully';
	        }else
	        {
	        	$status = 'error';
	        	$message = $error_array;
	        }
	        $response = array('status'=>$status,'message'=>$message);
			echo responseObject($response);
		}
	}

	function delete_news(){
		if($this->input->post())
		{
			$status = '';
			$message = '';
			$news_id = $this->input->post('news_id');

			$this->load->library('form_validation');
			$this->form_validation->set_rules('news_id', 'News ID', 'required');
			
			$this->form_validation->run();
	        $error_array = $this->form_validation->error_array();

	        if(count($error_array) == 0 )
	        {
	        	$this->Adminnews_model->delete_news($news_id);
		        $status = 'success';
			    $message = 'Deleted successfully';	
	        }else
	        {
	        	$status = 'error';
	        	$message = $error_array;
	        }
			
	        $response = array('status'=>$status,'message'=>$message);
			echo responseObject($response);	
		}
    }
}
