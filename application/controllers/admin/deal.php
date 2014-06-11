<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Deal extends CI_Controller {

	function __construct(){
		parent::__construct();

		is_login();

		$this->user_session = $this->session->userdata('user_session');
	}	 

	public function index()
	{
		//pr($this->user_session);
		$data['view'] = "index";
		$this->load->view('admin/content', $data);
	}

	public function ajax_list($limit=0)
	{
		$this->load->helper('datatable_helper');
		$post = $this->input->post();
		$columns = array();
		$columns = array(
			array( 'db' => 'dd_name', 'dt' => 0 ),
			array( 'db' => 'dd_description',  'dt' => 1 ),
			array( 'db' => 'dd_originalprice',  'dt' => 2 ),
			array( 'db' => 'dd_discount',  'dt' => 3 ),
			array( 'db' => 'dd_listprice',  'dt' => 4 ),
			array(
				'db'        => 'dd_startdate',
				'dt'        => 5,
				'formatter' => function( $d, $row ) {
					return date( 'jS M y', strtotime($d));
				}
			),
			array(
				'db'        => 'dd_expiredate',
				'dt'        => 6,
				'formatter' => function( $d, $row ) {
					return date( 'jS M y', strtotime($d));
				}
			),
			array( 'db' => 'dd_status',  'dt' => 7 ),
			array( 'db' => 'dd_autoid',  
					'dt' => 8,
					'formatter' => function( $d, $row ) {
						return '<a href="'.site_url('/admin/deal/edit/'.$d).'" class="fa fa-edit"></a> / <a href="'.site_url('/admin/category/deal/'.$d).'" class="fa fa-trash-o"></a>';
					}
			),
		);
		echo json_encode( SSP::simple( $post, DEAL_DETAIL, "dd_autoid", $columns ) );exit;
	}

	public function add()
	{
		$post = $this->input->post();
		if ($post) {
			$error = array();
			$e_flag=0; 
			
			if ($e_flag == 0) {
				$timeperiod = explode("-",$post['dd_timeperiod']);
				$dd_startdate = date('Y-m-d H:i:s',strtotime($timeperiod[0]));
				$dd_expiredate = date('Y-m-d H:i:s',strtotime($timeperiod[1]));

				$data = array(
					'dd_dealerid'=> $post['dd_dealerid'],
					'dd_catid'=> $post['dd_catid'],
					'dd_name'=> $post['dd_name'],
					'dd_createdby'=> $this->user_session['id'], // logged in user's id
					'dd_createdate'=> date('Y-m-d H:i:s'), // need to add in add form
					'dd_description'=> $post['dd_description'],
					'dd_discount'=> $post['dd_discount'],
					'dd_startdate'=> $dd_startdate,
					'dd_expiredate'=> $dd_expiredate,
					'dd_listprice'=> $post['dd_listprice'],
					'dd_originalprice'=> $post['dd_originalprice'],
					'dd_mainphoto'=> $post['dd_mainphoto'],
					'dd_modiftimestamp'=> date('Y-m-d H:i:s'),
					'dd_status'=> $post['dd_status']
					);
				
				$ret_deal = $this->common_model->insertData(DEAL_DETAIL, $data);
				
				if ($ret_deal > 0) {
					$post_tags = $post['dd_tags'];
			
					foreach ($post_tags as $tag)
					{ 
						$tag = trim($tag);
						$tagid = $this->common_model->selectData(DEAL_TAGS,"dt_autoid",array("dt_tag"=>$tag));
						if(!$tagid)
						{
							$tagdata =  array("dt_tag"=>$tag);
							$tagid = $this->common_model->insertData(DEAL_TAGS, $tagdata);
						}
						else
						{
							$tagid = ($tagid[0]->dt_autoid);
						}
							

						$tagmap = $this->common_model->selectData(DEAL_MAP_TAGS,"*",array("dm_ddid"=>$ret_deal,"dm_dtid"=>$tagid));
						if (!$tagmap)
						{
							$tagmapdata =  array("dm_ddid"=>$ret_deal,"dm_dtid"=>$tagid);
							$this->common_model->insertData(DEAL_MAP_TAGS, $tagmapdata);
						}
					}
					
					$data['flash_msg'] = success_msg_box('Deal added successfully.');
				}else{
					$data['flash_msg'] = error_msg_box('An error occurred while processing.');
				}
			}
			$data['error_msg'] = $error;
		}
		$data['view'] = "add_edit";
		$data['dealers'] = $this->common_model->selectData(DEAL_DEALER, 'de_autoid,de_name,de_email',"");
		$data['categories'] = $this->common_model->selectData(DEAL_CATEGORY, 'dc_catid,dc_catname',"");
		$this->load->view('admin/content', $data);
	}
}