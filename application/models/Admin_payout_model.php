<?php

class Admin_payout_model extends CI_Model
{
    
    function __construct() {
        parent::__construct();	
    }
    
    function checkPayout($date){

        $week_start = date("Y-m-d", strtotime('monday this week',$date));
        $week_end =  date("Y-m-d", strtotime('sunday this week',$date));

		$this->db->trans_start();
        $this->db->select('count(1) as cnt');
        $this->db->from('payout');
        $this->db->where("created_date >='".$week_start."'"); 
        $this->db->where("created_date < DATE_ADD('".$week_end."', INTERVAL 1 DAY)"); 
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