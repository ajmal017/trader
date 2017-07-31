<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$session_data = $this->session->userdata;
		$data = array();
		$data['session_data'] = $session_data;
		$this->load->view('frontend/profile',$data);
	}

	public function personal_details()
	{
		if($this->input->post())
		{
			$status = '';
			$message = '';
			$session_data = $this->session->userdata;
			$userid = $session_data['logged_in']['userid'];
		
			$firstname = $this->input->post('firstname');
			$middlename = $this->input->post('middlename');
			$lastname = $this->input->post('lastname');
			$mobile = $this->input->post('mobile');
			$email = $this->input->post('email');
			$dateofbirth = $this->input->post('dateofbirth');
			$profile_image_path = $this->input->post('profile_image_path');
			$filesCount=isset($_FILES['profile_image']['name'])? count($_FILES['profile_image']['name']):0;

			$this->load->library('form_validation');
			$this->form_validation->set_rules('firstname', 'First Name', 'required');
			$this->form_validation->set_rules('middlename', 'Middle Name', 'required');
			$this->form_validation->set_rules('lastname', 'Last Name', 'required');
			$this->form_validation->set_rules('mobile', 'Mobile', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('dateofbirth', 'Date Of Birth', 'required');
			$this->form_validation->run();
			$error_array = $this->form_validation->error_array();
			
			$allowed =  array('gif','png' ,'jpg','jpeg');
	    	if($filesCount > 0)
	        {
				$file_name = $_FILES['profile_image']['name'];
				$error = false;
				if($file_name != '')
				{	
					$ext = pathinfo($file_name, PATHINFO_EXTENSION);
					if(!in_array($ext,$allowed) ) {
					    $error = true;
					}
				}
				if($error == true)
				{
					$error_array['profile_image'] = 'Please choose valid format images';
				}
	        }

	        if(count($error_array) == 0 )
	        {
	        	$this->load->model('Profile_model');
				$this->Profile_model->save_personal_details($userid,$firstname,$middlename,$lastname,$mobile,$email,$dateofbirth);

	        	if($filesCount > 0)
		        {
		        	$this->load->library('upload');
				    $config['upload_path'] = FCPATH . 'uploads/profile/';
				    $config['allowed_types'] = 'gif|jpg|png';
				    $files = $_FILES['profile_image'];	
		        	$_FILES['uploadedimage']['name'] = time().'_'.rand(1111,9999).'_'.$files['name'];
			        $_FILES['uploadedimage']['type'] = $files['type'];
			        $_FILES['uploadedimage']['tmp_name'] = $files['tmp_name'];
			        $_FILES['uploadedimage']['error'] = $files['error'];
			        $_FILES['uploadedimage']['size'] = $files['size'];
			        //now we initialize the upload library
			        $this->upload->initialize($config);
			        $data = array();
			        @unlink($config['upload_path'] . $profile_image_path);
			        if ($this->upload->do_upload('uploadedimage'))
			        {
			        	$data['uploads'] = $this->upload->data();
			        }
			        if(isset($data) && count($data) > 0)
			        {	
			        	foreach ($data as $du)
			        	{
			        		$image_path = $du['file_name'];
			        		$this->Profile_model->editProfileImage($userid,$image_path);
			        	}
			        }
			    }
			    
			    $status = 'success';
			    $message = 'updated successfully';
			    $status_code = 200;
	        }else
			{
				$status = 'error';
			    $message = $error_array;
			    $status_code = 501;
			}
			$response = array('status'=>$status,'message'=>$message);
			echo responseObject($response,$status_code);			
		}
	}

	public function address_details()
	{
		if($this->input->post())
		{
			$status = '';
			$message = '';
			$session_data = $this->session->userdata;
			$userid = $session_data['logged_in']['userid'];
		
			$country = $this->input->post('country');
			$state = $this->input->post('state');
			$city = $this->input->post('city');
			$address = $this->input->post('address');
			$pincode = $this->input->post('pincode');
			
			
			$this->load->library('form_validation');
			$this->form_validation->set_rules('country', 'Country', 'required');
			$this->form_validation->set_rules('state', 'State', 'required');
			$this->form_validation->set_rules('city', 'City', 'required');
			$this->form_validation->set_rules('address', 'Address', 'required');
			$this->form_validation->set_rules('pincode', 'Pincode', 'required');
			$this->form_validation->run();
			$error_array = $this->form_validation->error_array();
			
			if(count($error_array) == 0 )
	        {
	        	$this->load->model('Profile_model');
				$this->Profile_model->save_address_details($userid,$country,$state,$city,$address,$pincode);

	        	$status = 'success';
			    $message = 'updated successfully';
			    $status_code = 200;
	        }else
			{
				$status = 'error';
			    $message = $error_array;
			    $status_code = 501;
			}
			$response = array('status'=>$status,'message'=>$message);
			echo responseObject($response,$status_code);			
		}
	}

	public function bank_details()
	{
		if($this->input->post())
		{
			$status = '';
			$message = '';
			$session_data = $this->session->userdata;
			$userid = $session_data['logged_in']['userid'];
		
			$bank_account_holder_name = $this->input->post('bank_account_holder_name');
			$bank_name = $this->input->post('bank_name');
			$branch = $this->input->post('branch');
			$account_number = $this->input->post('account_number');
			$ifsc_code = $this->input->post('ifsc_code');
			
			
			$this->load->library('form_validation');
			$this->form_validation->set_rules('bank_account_holder_name', 'Bank Account Holder Name', 'required');
			$this->form_validation->set_rules('bank_name', 'Bank Name', 'required');
			$this->form_validation->set_rules('branch', 'Branch', 'required');
			$this->form_validation->set_rules('account_number', 'Account Number', 'required');
			$this->form_validation->set_rules('ifsc_code', 'IFSC Code', 'required');
			$this->form_validation->run();
			$error_array = $this->form_validation->error_array();
			
			if(count($error_array) == 0 )
	        {
	        	$this->load->model('Profile_model');
				$this->Profile_model->save_bank_details($userid,$bank_account_holder_name,$bank_name,$branch,$account_number,$ifsc_code);

	        	$status = 'success';
			    $message = 'updated successfully';
			    $status_code = 200;
	        }else
			{
				$status = 'error';
			    $message = $error_array;
			    $status_code = 501;
			}
			$response = array('status'=>$status,'message'=>$message);
			echo responseObject($response,$status_code);			
		}
	}

	public function save_kyc_details()
	{
		if($this->input->post())
		{
			$status = '';
			$message = '';
			$session_data = $this->session->userdata;
			$userid = $session_data['logged_in']['userid'];
		
			$pancard = $this->input->post('pancard');
			$aadhaar_card = $this->input->post('aadhaar_card');
			
			$current_pancard_image = $this->input->post('current_pancard_image');
			$current_aadhaar_card_image = $this->input->post('current_aadhaar_card_image');
			$pancardFilesCount=isset($_FILES['pancard_image']['name'])? count($_FILES['pancard_image']['name']):0;
			$aadhaarcardFilesCount=isset($_FILES['aadhaar_card_image']['name'])? count($_FILES['aadhaar_card_image']['name']):0;

			$this->load->library('form_validation');
			$this->form_validation->set_rules('pancard', 'Pancard', 'required');
			$this->form_validation->set_rules('aadhaar_card', 'Aadhaar Card', 'required');
			
			$this->form_validation->run();
			$error_array = $this->form_validation->error_array();
			
			$allowed =  array('gif','png' ,'jpg','jpeg');
	    	if($pancardFilesCount > 0)
	        {
				$file_name = $_FILES['pancard_image']['name'];
				$error = false;
				if($file_name != '')
				{	
					$ext = pathinfo($file_name, PATHINFO_EXTENSION);
					if(!in_array($ext,$allowed) ) {
					    $error = true;
					}
				}
				if($error == true)
				{
					$error_array['pancard_image'] = 'Please choose valid format for Pancard image';
				}
	        }
	        if($aadhaarcardFilesCount > 0)
	        {
				$file_name = $_FILES['aadhaar_card_image']['name'];
				$error = false;
				if($file_name != '')
				{	
					$ext = pathinfo($file_name, PATHINFO_EXTENSION);
					if(!in_array($ext,$allowed) ) {
					    $error = true;
					}
				}
				if($error == true)
				{
					$error_array['aadhaar_card_image'] = 'Please choose valid format for Aadhaar image';
				}
	        }

	        if(count($error_array) == 0 )
	        {
	        	$this->load->model('Profile_model');
				$this->Profile_model->save_kyc_details($userid,$pancard,$aadhaar_card);

	        	if($pancardFilesCount > 0)
		        {
		        	$this->load->library('upload');
				    $config['upload_path'] = FCPATH . 'uploads/documents/';
				    $config['allowed_types'] = 'gif|jpg|png';
				    $files = $_FILES['pancard_image'];	
		        	$_FILES['uploadedimage']['name'] = time().'_'.rand(1111,9999).'_'.$files['name'];
			        $_FILES['uploadedimage']['type'] = $files['type'];
			        $_FILES['uploadedimage']['tmp_name'] = $files['tmp_name'];
			        $_FILES['uploadedimage']['error'] = $files['error'];
			        $_FILES['uploadedimage']['size'] = $files['size'];
			        //now we initialize the upload library
			        $this->upload->initialize($config);
			        $data = array();
			        @unlink($config['upload_path'] . $current_pancard_image);
			        if ($this->upload->do_upload('uploadedimage'))
			        {
			        	$data['uploads'] = $this->upload->data();
			        }
			        if(isset($data) && count($data) > 0)
			        {	
			        	foreach ($data as $du)
			        	{
			        		$image_path = $du['file_name'];
			        		$this->Profile_model->editKycDocs($userid,'pancard_image',$image_path);
			        	}
			        }
			    }

			    if($aadhaarcardFilesCount > 0)
		        {
		        	$this->load->library('upload');
				    $config['upload_path'] = FCPATH . 'uploads/documents/';
				    $config['allowed_types'] = 'gif|jpg|png';
				    $files = $_FILES['aadhaar_card_image'];	
		        	$_FILES['uploadedimage']['name'] = time().'_'.rand(1111,9999).'_'.$files['name'];
			        $_FILES['uploadedimage']['type'] = $files['type'];
			        $_FILES['uploadedimage']['tmp_name'] = $files['tmp_name'];
			        $_FILES['uploadedimage']['error'] = $files['error'];
			        $_FILES['uploadedimage']['size'] = $files['size'];
			        //now we initialize the upload library
			        $this->upload->initialize($config);
			        $data = array();
			        @unlink($config['upload_path'] . $current_aadhaar_card_image);
			        if ($this->upload->do_upload('uploadedimage'))
			        {
			        	$data['uploads'] = $this->upload->data();
			        }
			        if(isset($data) && count($data) > 0)
			        {	
			        	foreach ($data as $du)
			        	{
			        		$image_path = $du['file_name'];
			        		$this->Profile_model->editKycDocs($userid,'aadhaar_card_image',$image_path);
			        	}
			        }
			    }
			    
			    $status = 'success';
			    $message = 'updated successfully';
			    $status_code = 200;
	        }else
			{
				$status = 'error';
			    $message = $error_array;
			    $status_code = 501;
			}
			$response = array('status'=>$status,'message'=>$message);
			echo responseObject($response,$status_code);			
		}
	}

	public function change_password()
	{
		if($this->input->post())
		{
			$status = '';
			$message = '';
			$session_data = $this->session->userdata;
			$userid = $session_data['logged_in']['userid'];
		
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password');
			
			$this->load->library('form_validation');
			$this->form_validation->set_rules('current_password', 'Current Password', 'required');
			$this->form_validation->set_rules('new_password', 'New Password', 'required');
			
			$this->form_validation->run();
			$error_array = $this->form_validation->error_array();
			
			if(count($error_array) == 0 )
	        {
	        	$this->load->model('Profile_model');
				$result = $this->Profile_model->change_password($userid,$current_password,$new_password);
				if($result == "success")
				{
					$status = 'success';
				    $message = 'updated successfully';
				    $status_code = 200;	
				}else
				{
					$status = 'failure';
				    $message = 'not updated password';
				    $status_code = 200;	
				}
	        	
	        }else
			{
				$status = 'error';
			    $message = $error_array;
			    $status_code = 501;
			}
			$response = array('status'=>$status,'message'=>$message);
			echo responseObject($response,$status_code);			
		}
	}

	public function get_user_info()
	{
		$status = '';
		$message = '';
	
		$session_data = $this->session->userdata;
		$userid = $session_data['logged_in']['userid'];
		$data = getUserInfo($userid);
		
		if(count($data) > 0)
		{
	        $status = 'success';
			$message = $data;
			$status_code = 200;				
		}else
		{
			$status = 'error';
		    $message = 'data not found';
		    $status_code = 501;
		}
		$response = array('status'=>$status,'message'=>$message);
		echo responseObject($response,$status_code);			
	}

	public  function save_placement()
	{
		if($this->input->post())
		{
			$status = '';
			$message = '';
			$session_data = $this->session->userdata;
			$userid = $session_data['logged_in']['userid'];
		
			$placement = $this->input->post('placement');
			
			$this->load->library('form_validation');
			$this->form_validation->set_rules('placement', 'Placement', 'required');
			
			
			$this->form_validation->run();
			$error_array = $this->form_validation->error_array();
			
			if(count($error_array) == 0 )
	        {
	        	$this->load->model('Profile_model');
				$result = $this->Profile_model->save_placement($userid,$placement);
				$status = 'success';
			    $message = 'updated successfully';
			    $status_code = 200;	
	        }else
			{
				$status = 'error';
			    $message = $error_array;
			    $status_code = 501;
			}
			$response = array('status'=>$status,'message'=>$message);
			echo responseObject($response,$status_code);			
		}		
	}
}