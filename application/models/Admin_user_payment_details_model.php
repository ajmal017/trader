<?php
class Admin_user_payment_details_model extends CI_Model
{
    
    function __construct() {
        parent::__construct();	
    }

    function release_payment($userid,$release_amount,$payment_desc=''){
        $this->db->trans_start();
        $array = array('userid' => $userid,'payout_amount' => $release_amount,'payment_desc'=>$payment_desc,'status'=>'paid','created_date'=>date("Y-m-d H:i:s"));
        $this->db->set($array);
        $this->db->insert('payout');
        $last_inserted_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $last_inserted_id;
    }
}