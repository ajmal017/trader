<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_packages extends CI_Controller {

	public function __construct() 
	{
        parent::__construct();
        $this->load->model('Adminpackages_model');
   		$this->menu_active = 'packages';
    }

	public function index()
	{
		$session_data = $this->session->userdata;
		$data = array();
		$data['session_data'] = $session_data;

		$this->load->view('template/admin/packages',$data);
	}

	public function edit($package_id = 0)
	{
		$session_data = $this->session->userdata;
		$data = array();
		$data['session_data'] = $session_data;
		$data['package_id']=$package_id;
		$this->load->view('template/admin/edit_package',$data);
	}

	public function add_package()
	{
		if($this->input->post())
		{
			$status = '';
			$message = '';
			$this->load->library('form_validation');
			$package_name = $this->input->post('package_name');
			$package_amount = $this->input->post('package_amount');
			$package_desc = $this->input->post('package_desc');
			$package_type = $this->input->post('package_type');
			$filesCount=isset($_FILES['files']['name'])? count($_FILES['files']['name']):0;
			$downloadable_documents_count=isset($_FILES['downloadable_documents']['name'])? count($_FILES['downloadable_documents']['name']):0;

			$this->form_validation->set_rules('package_name', 'Package Name', 'required');
			$this->form_validation->set_rules('package_amount', 'Package Amount', 'required|numeric');
			$this->form_validation->set_rules('package_desc', 'Package Description', 'required');
			$this->form_validation->set_rules('package_type', 'Package Type', 'required');
			
			$this->form_validation->run();
	        $error_array = $this->form_validation->error_array();
	        $allowed =  array('gif','png' ,'jpg','jpeg');
	    	if ($filesCount == 0)
	        {
	            $error_array['files'] = 'Please choose files for upload';
	        } 
	        
	        if ($downloadable_documents_count == 0)
	        {
	            $error_array['downloadable_documents'] = 'Please choose Downloadable Documents for upload';
	        }

	        if($filesCount > 0)
	        {
				$file_name = $_FILES['files']['name'];
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
					$error_array['files'] = 'Please choose valid format images';
				}
	        }

	        if(count($error_array) == 0 )
	        {
	        	$last_inserted_id = $this->Adminpackages_model->addPackage($package_name,$package_amount,$package_type,$package_desc);	

	        	$this->load->library('upload');
			    $config['upload_path'] = FCPATH . 'uploads/packages/';
			    $config['allowed_types'] = 'gif|jpg|png';
			    
	        
	        if($filesCount > 0)
	        {	
	        	$files = $_FILES['files'];
	        	$_FILES['uploadedimage']['name'] = time().'_'.rand(1111,9999).'_'.$files['name'];
		        $_FILES['uploadedimage']['type'] = $files['type'];
		        $_FILES['uploadedimage']['tmp_name'] = $files['tmp_name'];
		        $_FILES['uploadedimage']['error'] = $files['error'];
		        $_FILES['uploadedimage']['size'] = $files['size'];
		        //now we initialize the upload library
		        $this->upload->initialize($config);
		        $data = array();

		        if ($this->upload->do_upload('uploadedimage'))
		        {
		        	$data['uploads'] = $this->upload->data();
		        }
		        if(isset($data) && count($data) > 0)
		        {
		        	
		        	foreach ($data as $du)
		        	{
		        		$package_id = $last_inserted_id;
		        		$image_path = $du['file_name'];
		        		$type= 'product';
		        		$created_date = config_item('current_date');
		        		$this->Adminpackages_model->addPackageMedia($package_id,$image_path,$type,$created_date);
		        	}
		        }
		    }

		    if($downloadable_documents_count > 0 )
		    {
			    $files1 = $_FILES['downloadable_documents'];
			    //dump($files1);
			    for ($i = 0; $i < $downloadable_documents_count; $i++) {
			    	
			        $_FILES['downloadable_documents_image']['name'] = time().'_'.rand(1111,9999).'_'.$files1['name'][$i];
			        $_FILES['downloadable_documents_image']['type'] = $files1['type'][$i];
			        $_FILES['downloadable_documents_image']['tmp_name'] = $files1['tmp_name'][$i];
			        $_FILES['downloadable_documents_image']['error'] = $files1['error'][$i];
			        $_FILES['downloadable_documents_image']['size'] = $files1['size'][$i];
			        //now we initialize the upload library
			        $config['upload_path'] = FCPATH . 'uploads/packages/online_study_docs/';
			        $config['max_size']    = '20048000000';
			    	$config['allowed_types'] = '*';
			        $this->upload->initialize($config);
			        $img_data = array();
			        //dump($_FILES['downloadable_documents_image']);
			        if ($this->upload->do_upload('downloadable_documents_image'))
			        {
			        	$img_data['uploads'][$i] = $this->upload->data();
			        }
			        //dump($_FILES);
			        if(isset($img_data['uploads']) && count($img_data['uploads']) > 0)
			        {
			        	foreach ($img_data['uploads'] as $du)
			        	{
			        		$image_path = $du['file_name'];
			        		$file_type = $du['file_type'];
			        		$created_date = config_item('current_date');
			        		$this->Adminpackages_model->addPackageStudyDocs($package_id,$image_path,$file_type,$created_date);
			        	}
			        }
			    }
			}
			    
			    $status = 'success';
			    $message = 'Added successfully';
	        }else
	        {
	        	$status = 'error';
	        	$message = $error_array;
	        }
	        $response = array('status'=>$status,'message'=>$message);
			echo responseObject($response);
		}
	}

	public function edit_package()
	{
		if($this->input->post())
		{
			$status = '';
			$message = '';
			$this->load->library('form_validation');
			$package_id = $this->input->post('package_id');
			$package_name = $this->input->post('package_name');
			$package_amount = $this->input->post('package_amount');
			$package_desc = $this->input->post('package_desc');
			$package_type = $this->input->post('package_type');
			
			$package_image = $this->input->post('package_image');
			$filesCount=isset($_FILES['files']['name'])? count($_FILES['files']['name']):0;
			$downloadable_documents_count=isset($_FILES['downloadable_documents']['name'])? count($_FILES['downloadable_documents']['name']):0;
			$downloadable_documents_already_count = $this->input->post('downloadable_documents_already_count');

			$this->form_validation->set_rules('package_name', 'Package Name', 'required');
			$this->form_validation->set_rules('package_amount', 'Package Amount', 'required|numeric');
			$this->form_validation->set_rules('package_desc', 'Package Description', 'required');
			$this->form_validation->set_rules('package_type', 'Package Type', 'required');
			
			$this->form_validation->run();
	        $error_array = $this->form_validation->error_array();
	        $allowed =  array('gif','png' ,'jpg','jpeg');
	    	if ($filesCount == 0  && $package_image == '')
	        {
	            $error_array['files'] = 'Please choose files for upload';
	        }

	        if ($downloadable_documents_count == 0  && $downloadable_documents_already_count == 0)
	        {
	            $error_array['files'] = 'Please choose files for upload';
	        } 
	        
	        if($filesCount > 0)
	        {
				$file_name = $_FILES['files']['name'];
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
					$error_array['files'] = 'Please choose valid format images';
				}
	        }

	        if(count($error_array) == 0 )
	        {
	        	$this->Adminpackages_model->editPackage($package_id,$package_name,$package_amount,$package_type,$package_desc);	
	        	$this->load->library('upload');
		        if($filesCount > 0)
		        {	
		        	$files = $_FILES['files'];
		        	$config['upload_path'] = FCPATH . 'uploads/packages/';
				    $config['allowed_types'] = 'gif|jpg|png';

		        	$_FILES['uploadedimage']['name'] = time().'_'.rand(1111,9999).'_'.$files['name'];
			        $_FILES['uploadedimage']['type'] = $files['type'];
			        $_FILES['uploadedimage']['tmp_name'] = $files['tmp_name'];
			        $_FILES['uploadedimage']['error'] = $files['error'];
			        $_FILES['uploadedimage']['size'] = $files['size'];
			        //now we initialize the upload library
			        $this->upload->initialize($config);
			        $data = array();
			        unlink($config['upload_path'] . $package_image);
			        if ($this->upload->do_upload('uploadedimage'))
			        {
			        	$data['uploads'] = $this->upload->data();
			        }
			        if(isset($data) && count($data) > 0)
			        {
			        	
			        	foreach ($data as $du)
			        	{
			        		$image_path = $du['file_name'];
			        		$type= 'packages';
			        		$created_date = config_item('current_date');
			        		$this->Adminpackages_model->addPackageMedia($package_id,$image_path,$type,$created_date);
			        	}
			        }
			    }

			    if($downloadable_documents_count > 0 )
			    {
				    $files1 = $_FILES['downloadable_documents'];
				    //dump($files1);
				    for ($i = 0; $i < $downloadable_documents_count; $i++) {
				    	
				        $_FILES['downloadable_documents_image']['name'] = time().'_'.rand(1111,9999).'_'.$files1['name'][$i];
				        $_FILES['downloadable_documents_image']['type'] = $files1['type'][$i];
				        $_FILES['downloadable_documents_image']['tmp_name'] = $files1['tmp_name'][$i];
				        $_FILES['downloadable_documents_image']['error'] = $files1['error'][$i];
				        $_FILES['downloadable_documents_image']['size'] = $files1['size'][$i];
				        //now we initialize the upload library
				        $config['upload_path'] = FCPATH . 'uploads/packages/online_study_docs/';
				        $config['max_size']    = '20048000000';
				    	$config['allowed_types'] = '*';
				        $this->upload->initialize($config);
				        $img_data = array();
				        //dump($_FILES['downloadable_documents_image']);
				        if ($this->upload->do_upload('downloadable_documents_image'))
				        {
				        	$img_data['uploads'][$i] = $this->upload->data();
				        }
				        //dump($_FILES);
				        if(isset($img_data['uploads']) && count($img_data['uploads']) > 0)
				        {
				        	foreach ($img_data['uploads'] as $du)
				        	{
				        		$image_path = $du['file_name'];
				        		$file_type = $du['file_type'];
				        		$created_date = config_item('current_date');
				        		$this->Adminpackages_model->addPackageStudyDocs($package_id,$image_path,$file_type,$created_date);
				        	}
				        }
				    }
				}
			    
			    $status = 'success';
			    $message = 'Edited successfully';
	        }else
	        {
	        	$status = 'error';
	        	$message = $error_array;
	        }
	        $response = array('status'=>$status,'message'=>$message);
			echo responseObject($response);
		}
	}

	function deletePackage(){
		if($this->input->post())
		{
			$status = '';
			$message = '';
			$package_id = $this->input->post('package_id');

			$this->load->library('form_validation');
			$this->form_validation->set_rules('package_id', 'Package ID', 'required');
			
			$this->form_validation->run();
	        $error_array = $this->form_validation->error_array();

	        if(count($error_array) == 0 )
	        {
		        $this->db->trans_start();
				$package_data = getPackages($package_id);
				if(count($package_data) > 0)
				{
					unlink(FCPATH . 'uploads/packages/'.$package_data['package_image']);	
				}
				$this->db->where('package_id', $package_id);
				$res = $this->db->delete('package_master'); 
				$this->db->trans_complete();
				$status = 'success';
			    $message = 'Deleted successfully';	
	        }else
	        {
	        	$status = 'error';
	        	$message = $error_array;
	        }
			
	        $response = array('status'=>$status,'message'=>$message);
			echo responseObject($response);	
		}
    }

    public function delete_package_media()
	{
		if($this->input->post())
		{
			$status = '';
			$message = '';
			$package_media_id = $this->input->post('package_media_id');
			$this->Adminpackages_model->delete_package_media($package_media_id);
			
			$status = 'success';
			$message = 'successfully deleted';	
		
			$response = array('status'=>$status,'message'=>$message);
			echo responseObject($response);
		}
	}
}
