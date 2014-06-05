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

	function success_msg_box($msg)
	{
		$html = '<div class="alert alert-success alert-dismissable">
                    <i class="fa fa-check"></i>
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    '.$msg.'
                </div>';
        return $html;         
	}

	function error_msg_box($msg)
	{
		$html = '<div class="alert alert-danger alert-dismissable">
                    <i class="fa fa-ban"></i>
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    '.$msg.'
                </div>';
        return $html;        
	}

?>