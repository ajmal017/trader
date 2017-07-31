<?php

class Adminuserpackages_model extends CI_Model
{
    
    function __construct() {
        parent::__construct();	
    }
    
    function deleteUserPackageRequest($user_package_id){
		$this->db->trans_start();
        $this->db->where('id', $user_package_id);
        $res = $this->db->delete('user_packages'); 
        $this->db->trans_complete();
        return true;
    }

    function userPackageRequestAction($user_package_id,$status,$userid)
    {
        $this->db->trans_start();
        $array = array('status' => $status,'acceptance_date'=> date("Y-m-d H:i:s"));
        $this->db->where('id', $user_package_id);
        $res = $this->db->update('user_packages', $array);
        
        $array = array('status' => 'active');
        $this->db->where('userid', $userid);
        $res = $this->db->update('users', $array);
        $this->db->trans_complete();
        return $res;
    }
}