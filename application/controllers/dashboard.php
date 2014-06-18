<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();

		is_login();

		$this->user_session = $this->session->userdata('user_session');
	}	 

	
	public function index()
	{
		
		$data['view'] = "index";
		$this->load->view('content', $data);
	}

	
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */