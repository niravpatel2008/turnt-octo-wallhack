<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	function __construct(){
		parent::__construct();
	}	 

	
	public function index()
	{
		$post = $this->input->post();
		$tags = (isset($post['tags']))$post['tags']?"";
		$deals = $this->common_model->searchDeals($tags);
	}
}

/* End of file deals.php */
/* Location: ./application/controllers/deals.php */