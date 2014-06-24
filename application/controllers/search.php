<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class search extends CI_Controller {

	function __construct(){
		parent::__construct();
	}	 

	
	public function index()
	{
		$post = $this->input->post();
		$tags = (isset($post) && isset($post['tags']))?$post['tags']:"";
		$catid = (isset($post) && isset($post['catid']))?$post['catid']:"";
		$deals = $this->common_model->searchDeals($tags,$catid);
		echo($deals);exit;
	}
}

/* End of file search.php */
/* Location: ./application/controllers/search.php */