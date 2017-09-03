<?php

class Register_model extends CI_Model
{
    
    function __construct() {
        parent::__construct();	
    }
    
    function register($username,$email,$mobile,$password,$verification_otp)
    {
		$this->db->trans_start();
		$password = md5($password);
		$array = array('username' => $username,'email'=>$email,'password'=>$password,'created_date' => config_item('current_date'),'verification_otp'=>$verification_otp,'verified'=>'no','entry'=>0);
		$this->db->set($array);
		$this->db->insert('users');
		$userid = $this->db->insert_id();

		$array = array('userid' => $userid,'mobile' => $mobile);
		$this->db->set($array);
		$this->db->insert('userdetails');

		$array = array('userid' => $userid,'user_alignment'=>'left');
		$this->db->set($array);
		$this->db->insert('user_settings');
		
		$this->db->trans_complete();
        return $userid;
    }

    function verification($username,$verification_otp)
    {
    	$this->db->trans_start();
    	$this->db->select('*');
    	$this->db->where('username',$username);
    	$this->db->where('verification_otp',$verification_otp);
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

	        $array = array('verified' => 'yes');
			$this->db->where('userid', $row->userid);
			$res = $this->db->update('users', $array);
		}
    	$this->db->trans_complete();
		return $data;
    }


    function resend_otp($username,$verification_otp)
    {
    	$this->db->trans_start();
		$array = array('verification_otp' => $verification_otp);
		$this->db->where('username', $username);
		$res = $this->db->update('users', $array);
    	$this->db->trans_complete();
		return 1;
    }
}