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
		$session_data = $this->session->userdata;
		$data = array();
		$data['session_data'] = $session_data;
		$this->load->view('template/admin/payout',$data);
	}

	public function return_of_interest_and_loyality_payout()
	{
		if($this->input->post())
		{
			$status = '';
        	$message = '';
        	$status_code = 200;
			$obj = new binaryTree();
			$date = config_item('current_date');

			//$date = strtotime(date("Y-m-d",strtotime(config_item('current_date'))));

			$payout_cnt = $this->Admin_payout_model->check_return_of_interest_and_loyality_payout($date);
			
			if($payout_cnt == 0)
			{
				$obj->return_of_interest_and_loyality_payout($date);
				$status = 'success';
	        	$message = 'Payout successfully done.';
	        	$status_code = 200;
			}else if($payout_cnt > 0)
	        {
	        	$status = 'error';
	        	$message = 'Already done with payout this month';
	        	$status_code = 501;
	        }
			
	        $response = array('status'=>$status,'message'=>$message);
			echo responseObject($response,$status_code);
		}
	}

	public function referral_income_payout()
	{
		if($this->input->post())
		{
			$status = '';
        	$message = '';
        	$status_code = 200;
			$obj = new binaryTree();
			//$date = strtotime("2017-07-02");
			$date = config_item('current_date');
			$month_start = date('Y-m-01', strtotime($date));
        	$month_end = date('Y-m-t', strtotime($date));
			//$week_start = date("Y-m-d", strtotime('monday this week',strtotime($date)));
			//$week_end =  date("Y-m-d", strtotime('sunday this week',strtotime($date)));

			$payout_cnt = $this->Admin_payout_model->check_referral_income_payout($date);
			//echo "payout_cnt".$payout_cnt;
			if($payout_cnt == 0)
			{
				$obj->referral_bonus($date,$month_start,$month_end);
				$status = 'success';
	        	$message = 'Payout successfully done.';
	        	$status_code = 200;
			}else if($payout_cnt > 0)
	        {
	        	$status = 'error';
	        	$message = 'Already done with payout this month';
	        	$status_code = 501;
	        }
			
	        $response = array('status'=>$status,'message'=>$message);
			echo responseObject($response,$status_code);
		}
	}
}