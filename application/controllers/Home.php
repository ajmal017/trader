<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
	public function __construct() 
	{
        parent::__construct();
    }

	public function index()
	{
		$session_data = $this->session->userdata;
		$data = array();
		$data['session_data'] = $session_data;
		$this->load->view('frontend/home',$data);
	}

	public function view_package($package_id=0)
	{
		$data = array('package_id'=>$package_id);
		$this->load->view('frontend/view_package',$data);
	}

	public function zerodha_lead()
	{
		if($this->input->post())
		{
			$status = '';
			$message = '';
			$this->load->library('form_validation');
			$zerodha_name = $this->input->post('zerodha_name');
			$zerodha_phone = $this->input->post('zerodha_phone');
			$zerodha_email = $this->input->post('zerodha_email');
			$partner_id = "ZAPAJN";

			$this->form_validation->set_rules('zerodha_name', 'Zerodha Name', 'required');
			$this->form_validation->set_rules('zerodha_phone', 'Zerodha Phone', 'required|numeric');
			$this->form_validation->set_rules('zerodha_email', 'Zerodha Email', 'required|valid_email');
			
			$this->form_validation->run();
	        $error_array = $this->form_validation->error_array();
	        
	        if(count($error_array) == 0 )
	        {
	        	$url = "http://crm.zerodha.net/zlm/L2Lead/add/".$zerodha_name."/".$zerodha_phone."/".$zerodha_email."/".$partner_id;
				$method = "GET";
				$useragent = "ZERODHA LEAD";
				$message = curl_request($url,$method,$useragent);
			    $status = 'success';
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
