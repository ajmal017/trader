<?php

class Admin_payout_model extends CI_Model
{
    
    function __construct() {
        parent::__construct();	
    }
    
    function check_return_of_interest_and_loyality_payout($date){

        $month_start = date('Y-m-01', strtotime($date));
        $month_end = date('Y-m-t', strtotime($date));

        //$week_start = date("Y-m-d", strtotime('monday this week',strtotime($date)));
        //$week_end =  date("Y-m-d", strtotime('sunday this week',strtotime($date)));
        
        $this->db->trans_start();
        $this->db->select('count(1) as cnt');
        $this->db->from('return_of_interest');
        $this->db->where("status ='generated'");
        $this->db->where("created_date >='".$month_start."'"); 
        $this->db->where("created_date < DATE_ADD('".$month_end."', INTERVAL 1 DAY)"); 
        $query = $this->db->get();
        $cnt = 0;
        foreach($query->result() as $row)
        {
            $cnt = $row->cnt;
        }

        $this->db->select('count(1) as cnt');
        $this->db->from('loyality_income');
        $this->db->where("status ='generated'");
        $this->db->where("created_date >='".$month_start."'"); 
        $this->db->where("created_date < DATE_ADD('".$month_end."', INTERVAL 1 DAY)"); 
        $query1 = $this->db->get();
        foreach($query1->result() as $row)
        {
            $cnt = $cnt + $row->cnt;
        }

        $this->db->trans_complete();
        return $cnt;
    }

    function check_referral_income_payout($date){
        //$month_start = date('Y-m-01', strtotime($date));
        //$month_end = date('Y-m-t', strtotime($date));

        $month_start = date("Y-m-d", strtotime('monday this week',strtotime($date)));
        $month_end =  date("Y-m-d", strtotime('sunday this week',strtotime($date)));

		$this->db->trans_start();
        $this->db->select('count(1) as cnt');
        $this->db->from('referral_income');
        $this->db->where("status !='paid'");
        $this->db->where("created_date >='".$month_start."'"); 
        $this->db->where("created_date < DATE_ADD('".$month_end."', INTERVAL 1 DAY)"); 
        $query = $this->db->get();
        
        $cnt = 0;
        foreach($query->result() as $row)
        {
            $cnt = $row->cnt;
        }
		$this->db->trans_complete();
        return $cnt;
    }
}