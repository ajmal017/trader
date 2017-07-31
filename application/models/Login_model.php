<?php

class Login_model extends CI_Model
{
    
    function __construct() {
        parent::__construct();	
    }
    
    function check_login($username,$password,$encrypt=false){
        if($encrypt == false)
        {
            $password = md5($password);
        }
        
		$this->db->trans_start();
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        //$this->db->where('email_verified','yes');
		
		$query = $this->db->get('users');
        if($query->num_rows()==1){
            foreach ($query->result() as $row){
                if($row->email_verified != 'yes')
                {
                    return 'email_verified';
                }
                $data = array('logged_in'=>array(
							'userid'=>$row->userid,
                            'email'=> $row->email,
							'password'=> $row->password,
							'username'=> $row->username,
                            'firstname'=> ucfirst($row->firstname),
                            'lastname'=> ucfirst($row->lastname),
                            'fullname'=> ucfirst($row->firstname).' '.ucfirst($row->middlename).' '.ucfirst($row->lastname),
							'role_id'=>$row->role_id,
                            'status'=>$row->status,
                        ));
            }
			$this->db->query("UPDATE users SET last_login='".date("Y-m-d H:i:s")."' WHERE userid='".$row->userid."' ");
			$this->db->trans_complete();
            $this->session->set_userdata($data);
            return 1;
        }
        else{
            return 0;
      }
       
    }

    function forgot_password_token_generation($email){
        
        $this->db->trans_start();
        $this->db->where('email',$email);
        $forgot_password_token = md5($email.date("Y-m-d H:i:s"));
        $query = $this->db->get('users');
        $data = array();
        if($query->num_rows()==1){
            foreach ($query->result() as $row){
                $data = array(
                            "username"=>$row->username,
                            "firstname"=>$row->firstname,
                            "middlename"=>$row->middlename,
                            "lastname"=>$row->lastname,
                            "forgot_password_token"=>$forgot_password_token,
                            );
            }
            $this->db->query("UPDATE users SET forgot_password_token='".$forgot_password_token."' WHERE email='".$email."'");
            $this->db->trans_complete();
            return $data;
        }
        else{
            return 0;
      }
    }

    function change_password($password,$forgot_password_token)
    {
        $this->db->trans_start();
        $forgot_password_token."forgot_password_token";
        $this->db->where('forgot_password_token',$forgot_password_token);
        $password = md5($password);
        $query = $this->db->get('users');
        $data = array();
        if($query->num_rows()==1){
            foreach ($query->result() as $row){
                $data = array(
                            "username"=>$row->username,
                            "firstname"=>$row->firstname,
                            "middlename"=>$row->middlename,
                            "lastname"=>$row->lastname,
                            );
            }
            $this->db->query("UPDATE users SET password='".$password."' WHERE forgot_password_token='".$forgot_password_token."'");
            $this->db->query("UPDATE users SET forgot_password_token='' WHERE userid='".$row->userid."'");
            $this->db->trans_complete();
            return $data;
        }
        else{
            return 0;
      }   
    }
}