<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_home extends CI_Controller {

	public function index()
	{
		$session_data = $this->session->userdata;
		$data = array();
		$data['session_data'] = $session_data;
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/home',$data);
	}

	public function clear_all_cache()
	{
		$path = $this->config->item('cache_path');

	    $cache_path = ($path == '') ? APPPATH.'cache/' : $path;

	    $handle = opendir($cache_path);
	    while (($file = readdir($handle))!== FALSE) 
	    {
	        //Leave the directory protection alone
	        if ($file != '.htaccess' && $file != 'index.html')
	        {
	           @unlink($cache_path.'/'.$file);
	        }
	    }
	    closedir($handle);
	}
}
