<?php 
$CI = & get_instance();
//print_r($_SERVER['REQUEST_URI']);

function isLogin()
{
	global $CI;
	$controller_name = $CI->uri->segment(1);
	
	$frontend_pages = array("","home","bankers","contact_us","about_us","faqs","testimonials","login","register");
	if(in_array($controller_name, $frontend_pages))
	{
		//$CI->output->cache(15);
	}

	$client_access_pages = array('dashboard','profile','packages','myteam','news','bonus');
	if(in_array($controller_name, $client_access_pages)  && $CI->session->userdata('logged_in') == '')
	{
		redirect('home');
	}

	$admin_pages = array('admin_home','admin_packages','admin_notifications','admin_news','admin_user_packages','admin_user_payment_details'); 
	$role_id = @$CI->session->userdata['logged_in']['role_id'];
	if(in_array($controller_name, $admin_pages)  && $role_id != 1)
	{
		redirect('home');
	} 
}
?>