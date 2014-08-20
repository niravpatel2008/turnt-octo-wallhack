<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cron extends CI_Controller {

    function __construct(){
		$_SERVER['REMOTE_ADDR']  = $this->ip_address = '0.0.0.0';  
		parent::__construct();

        if ( ! $this->input->is_cli_request())
        {
            exit;
        }
    }

    public function dealStatus()
    {
		
    }
}

//00 00 * * * php index.php Cron dealStatus