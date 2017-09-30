<?php
class Admin_user_payment_details_model extends CI_Model
{
    
    function __construct() {
        parent::__construct();	
    }

    function release_payment($userid,$release_amount,$payment_desc='',$tablename){
        $this->db->trans_start();
        $array = array('userid' => $userid,'amount' => $release_amount,'description'=>$payment_desc,'status'=>'paid','created_date'=>config_item('current_date'));
        $this->db->set($array);
        $this->db->insert($tablename);
        $last_inserted_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $last_inserted_id;
    }
}