<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_payout extends CI_Controller {

	public function __construct() 
	{
        parent::__construct();
        $this->load->model('Admin_payout_model');
    }

	public function index()
	{

	}

	public function generate_payout()
	{
		if($this->input->post())
		{
			$status = '';
        	$message = '';
        	$status_code = 200;
			$obj = new binaryTree();
			//$date = strtotime("2017-07-02");
			$date = strtotime(date("Y-m-d"));

			$payout_cnt = $this->Admin_payout_model->checkPayout($date);
			
			if($payout_cnt == 0)
			{
				$obj->payout($date);
				$status = 'success';
	        	$message = 'Payout successfully done.';
	        	$status_code = 200;
			}else if($payout_cnt > 0)
	        {
	        	$status = 'error';
	        	$message = 'Already Done With Payout This Week';
	        	$status_code = 501;
	        }
			
	        $response = array('status'=>$status,'message'=>$message);
			echo responseObject($response,$status_code);
		}
	}
}