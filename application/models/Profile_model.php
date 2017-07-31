<?php

class Profile_model extends CI_Model
{
    
    function __construct() {
        parent::__construct();	
    }
    
    function save_personal_details($userid,$firstname,$middlename,$lastname,$mobile,$email,$dateofbirth)
    {
		$this->db->trans_start();
		
		$array = array('mobile'=>$mobile,'dateofbirth'=>$dateofbirth);
		$this->db->where('userid', $userid);
		$this->db->update('userdetails',$array);
		
		$array = array('email' => $email,'firstname'=>$firstname,'middlename'=>$middlename,'lastname'=>$lastname);
		$this->db->where('userid', $userid);
		$this->db->update('users', $array);

		$this->db->trans_complete();
        return true;
    }

    function editProfileImage($userid,$profile_image)
    {
		$this->db->trans_start();
		
		$array = array('profile_image' => $profile_image);
		$this->db->where('userid', $userid);
		$this->db->update('users', $array);
		$this->db->trans_complete();
        return true;
    }

    function editKycDocs($userid,$column,$image_path)
    {
		$this->db->trans_start();
		
		$array = array($column => $image_path);
		$this->db->where('userid', $userid);
		$this->db->update('userdetails', $array);
		$this->db->trans_complete();
        return true;
    }

    function save_address_details($userid,$country,$state,$city,$address,$pincode)
    {
		$this->db->trans_start();
		
		$array = array('country' => $country,'state'=>$state,'city'=>$city,'address'=>$address,'pincode'=>$pincode);
		$this->db->where('userid', $userid);
		$this->db->update('userdetails', $array);

		$this->db->trans_complete();
        return true;
    }

    function save_bank_details($userid,$bank_account_holder_name,$bank_name,$branch,$account_number,$ifsc_code)
    {
		$this->db->trans_start();
		$array = array('bank_account_holder_name' => $bank_account_holder_name,'bank_name'=>$bank_name,'branch'=>$branch,'account_number'=>$account_number,'ifsc_code'=>$ifsc_code);
		$this->db->where('userid', $userid);
		$this->db->update('userdetails', $array);
		$this->db->trans_complete();
        return true;    	
    }

    function save_kyc_details($userid,$pancard,$aadhaar_card)
    {
		$this->db->trans_start();
		$array = array('pancard' => $pancard,'aadhaar_card'=>$aadhaar_card);
		$this->db->where('userid', $userid);
		$this->db->update('userdetails', $array);
		$this->db->trans_complete();
        return true;    	
    }

    function save_placement($userid,$placement)
    {
		$this->db->trans_start();
		$array = array('user_alignment' => $placement);
		$this->db->where('userid', $userid);
		$this->db->update('user_settings', $array);
		$this->db->trans_complete();
        return true;    	
    }

    function change_password($userid,$current_password,$new_password)
    {
    	$current_password = md5($current_password);
    	$new_password = md5($new_password);
    	$this->db->trans_start();

    	$this->db->select('*');
    	$this->db->where('userid',$userid);
    	$this->db->where('password', $current_password);
    	$this->db->from('users');
		$query = $this->db->get();
		$count = $query->num_rows();
		
		$response = "failure";
		if($count > 0)
		{
			$array = array('password' => $new_password);
			$this->db->where('userid', $userid);
			$res = $this->db->update('users', $array);	
			$response = "success";
		}
		
		$this->db->trans_complete();
        return $response;	
    }
}