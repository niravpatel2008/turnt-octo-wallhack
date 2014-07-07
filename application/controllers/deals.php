<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Deals extends CI_Controller {

	function __construct(){
		parent::__construct();
	}	 

	
	public function index()
	{

	}

	public function detail($id,$name)
	{
		$data = array();
		$name = isset($name)?$name:"";
		
		$id = (isset($id) && (preg_match('/^[0-9]*$/', $id)))?$id:"";
		if ($id == "")
			redirect("welcome");

		$dealsDetail = $this->common_model->getDealDetail($id);
		$data['dealsDetail'] = $dealsDetail;

		$data['view'] = "detail";
		$this->load->view('content', $data);
	}

	public function search()
	{
		$post = $this->input->post();
		$tags = (isset($post) && isset($post['tags']))?$post['tags']:"";
		$catid = (isset($post) && isset($post['category']))?$post['category']:"";
		$deals = $this->common_model->searchDeals($tags,$catid);
		echo($deals);exit;
	}
}

/* End of file search.php */
/* Location: ./application/controllers/search.php */