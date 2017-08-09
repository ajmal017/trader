<?php

class Contactus_model extends CI_Model
{
    
    function __construct() {
        parent::__construct();	
    }
    
    function save_contact($name,$email,$mobile,$enquiry){
		$this->db->trans_start();
        $array = array('name' => $name,'email'=>$email,'mobile'=>$mobile,'enquiry'=>$enquiry,'created_date'=> config_item('current_date'));
		$this->db->set($array);
		$this->db->insert('contact_us');
		$last_inserted_id = $this->db->insert_id();
		$this->db->trans_complete();
        return $last_inserted_id;
    }
}