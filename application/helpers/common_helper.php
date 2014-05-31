<?php

	function pr($arr, $option="")
	{
		echo "<pre>";
		print_r($arr);
		echo "</pre>";
		if ($option != "") {
			exit();
		}
	}

	function public_path($type="www")
	{
		return base_url()."public/";
	}

	function admin_path($type="www")
	{
		return base_url()."admin/";
	}

	function is_login()
	{
		
		$CI =& get_instance();
		$session = $CI->session->userdata('user_session');
		
		if (!isset($session['id'])) {
			redirect(base_url());
		}
	}

?>