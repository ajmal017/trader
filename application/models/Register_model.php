<?php

class Register_model extends CI_Model
{
    
    function __construct() {
        parent::__construct();	
    }
    
    function register($username,$email,$password,$email_verification_token)
    {
		$this->db->trans_start();
		$password = md5($password);
		$array = array('username' => $username,'email'=>$email,'password'=>$password,'created_date' => date("Y-m-d H:i:s"),'email_verification_token'=>$email_verification_token,'email_verified'=>'no','entry'=>0);
		$this->db->set($array);
		$this->db->insert('users');
		$userid = $this->db->insert_id();

		$array = array('userid' => $userid);
		$this->db->set($array);
		$this->db->insert('userdetails');

		$array = array('userid' => $userid,'user_alignment'=>'left');
		$this->db->set($array);
		$this->db->insert('user_settings');
		
		$this->db->trans_complete();
        return $userid;
    }

    function email_token_verification($email_verification_token)
    {
    	$this->db->trans_start();
    	$this->db->select('*');
    	$this->db->where('email_verification_token',$email_verification_token);
		$query = $this->db->get('users');
		
		$main_data = array();
		$data = array();
		foreach($query->result() as $row)
		{

			$data = array(
							'userid'=>$row->userid,
							'username'=>$row->username,
							'password'=>$row->password,
							);

	        $array = array('email_verified' => 'yes');
			$this->db->where('userid', $row->userid);
			$res = $this->db->update('users', $array);
		}
    	$this->db->trans_complete();
		return $data;
    }
}