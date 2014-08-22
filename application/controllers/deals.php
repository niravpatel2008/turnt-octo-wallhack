<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Deals extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->front_session = $this->session->userdata('front_session');
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
		$page = (isset($post) && isset($post['page']))?$post['page']:1;
		$limit = (isset($post) && isset($post['limit']))?$post['limit']:15;
		$or = (isset($post) && isset($post['or']))?$post['or']:false;
		$deals = $this->common_model->searchDeals($tags,$catid,$page,$limit,$or);
		echo($deals);exit;
	}

	public function like()
	{
		$post = $this->input->post();
		$id = (isset($post) && isset($post['id']))?$post['id']:"";
		if ($id == "")	{
			echo "0";exit;
		}

		$session = $this->session->userdata('front_session');
		if (!isset($session['id'])) {
			echo "0";exit;
		}

		$data = array();
		$data['df_userid'] = $session['id'];
		$data['db_dealid'] = $id;
		$already_fav = $this->common_model->selectData(DEAL_FAV,"*", $data,"","","","","","rowcount");

		if ($already_fav < 1)
			$ret_deal = $this->common_model->insertData(DEAL_FAV, $data);
		else
			$ret_deal = 1;

		if ($ret_deal > 0)
			echo 1;
		else
			echo 0;
		exit;
	}

	public function dislike()
	{
		$post = $this->input->post();
		$id = (isset($post) && isset($post['id']))?$post['id']:"";
		if ($id == "")	{
			echo "0";exit;
		}

		$session = $this->session->userdata('front_session');
		if (!isset($session['id'])) {
			echo "0";exit;
		}

		$data = array();
		$data['df_userid'] = $session['id'];
		$data['db_dealid'] = $id;
		$this->common_model->deleteData(DEAL_FAV, $data);

		echo 1;
	}

	public function getprint($uid,$unique_id)
	{

		$uid = (isset($uid) && (preg_match('/^[0-9]*$/', $uid)))?$uid:"";
		$data = array();
		if ($uid == ""){
			redirect("welcome");
		}

		$where = array('db_uid' => $uid,
						'db_uniqueid' => $unique_id
					);

		$deal_buy = $this->common_model->selectData(DEAL_BUYOUT, 'db_autoid', $where);

		$data['deal_detail'] = $this->common_model->getDealDetailPrint($deal_buy[0]->db_autoid);

		if ($this->front_session['id'] != $data['deal_detail'][0]->db_uid) {
			redirect("welcome");
		}

		#$this->load->view('print',$data);
		$html = $this->load->view('print', $data,true);
		echo $html;exit;
		/*
		$this->load->helper('htmltopdf/WKPDF_MULTI');
		$pdf = new WKPDF();
		$pdf->set_html($html);
		$pdf->render();
		$pdf->output('I','sample.pdf');*/
	}

	public function dealcatpage($category)
	{
		$category = urldecode(trim($category,"-"));

		if ($category != "")
		{
			$catid = $this->common_model->selectData(DEAL_CATEGORY,"dc_catid",array("dc_catname"=>$category));
			if(count($catid) == 0) redirect("welcome");
			$catid = $catid[0]->dc_catid;
		}
		else
		{
			$category = "All deals";
			$catid = "";
		}

		$data['view'] = "category";
		$data['responsivejs'] = "1";
		$data['category'] = $catid;
		$data['categoryName'] = $category;
		$this->load->view('content', $data);
	}
}

/* End of file search.php */
/* Location: ./application/controllers/search.php */
