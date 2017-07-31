<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('login');
	}

	public function signIn()
	{
		if($this->input->post())
		{
			$status = '';
			$message = '';
			$this->load->library('form_validation');
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->run();
			$error_array = $this->form_validation->error_array();
			
			
			if(count($error_array) == 0 )
			{
				$this->load->model('Login_model');
				$result = $this->Login_model->check_login($username,$password);
				if($result == 1)
				{
					$status = 'success';
				    $message = 'user login successfully';
				    $status_code = 200;	
				} elseif ($result === 'email_verified')
				{
					$status = 'failed';
				    $message = 'Email Verification not completed';
				    $status_code = 200;
				}else
				{
					$status = 'failed';
				    $message = 'username and password not matching';
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

	public function forgot_password()
	{
		$this->load->view('frontend/forgot_password');
	}

	public function forgot_password_change_password()
	{
		$forgot_password_token = $this->input->get('forgot_password_token');
		$data = array("forgot_password_token"=>$forgot_password_token);
		$this->load->view('frontend/forgot_password_change_password',$data);
	}

	public function change_password()
	{
		if($this->input->post())
		{
			$status = '';
			$message = '';
			$this->load->library('form_validation');
			$password = $this->input->post('password');
			$forgot_password_token = $this->input->post('forgot_password_token');
			
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->run();
			$error_array = $this->form_validation->error_array();
			
			if(count($error_array) == 0 )
			{
				$this->load->model('Login_model');
				$result = $this->Login_model->change_password($password,$forgot_password_token);
				if(is_array($result))
				{
					$status = 'success';
				    $message = 'Passsword successfully changed.';
				    $status_code = 200;	
				}else
				{
					$status = 'error';
				    $message = array('Forgot Password Token expired');
				    $status_code = 501;
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

	public function forgot_password_token_generation()
	{
		if($this->input->post())
		{
			$status = '';
			$message = '';
			$this->load->library('form_validation');
			$email = $this->input->post('forgot_email');
			
			$this->form_validation->set_rules('forgot_email', 'Email', 'required|valid_email');
			$this->form_validation->run();
			$error_array = $this->form_validation->error_array();
			
			
			if(count($error_array) == 0 )
			{
				$this->load->model('Login_model');
				$result = $this->Login_model->forgot_password_token_generation($email);
				if(is_array($result))
				{
					$email_data = array();
					$template_data = array();
					$template_data['fullname'] = ucfirst($result['firstname']).' '.ucfirst($result['lastname']);
					$template_data['username'] = $result['username'];
					$template_data['forgot_password_token'] = $result['forgot_password_token'];

					$email_data['subject'] = 'Forgot Password';
					$email_data['html'] = $this->load->view('frontend/email_templates/forgot_password',$template_data,true);;
					$email_data['to'] = $email;
					//dump($email_data);
					send_email($email_data);
					$status = 'success';
				    $message = 'Please check Email ID to reset Password';
				    $status_code = 200;	
				}else
				{
					$status = 'error';
				    $message = 'Email not matching with any account';
				    $status_code = 501;
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
}