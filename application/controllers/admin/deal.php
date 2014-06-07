<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Deal extends CI_Controller {

	function __construct(){
		parent::__construct();

		is_login();

		$this->user_session = $this->session->userdata('user_session');
	}	 

	public function index()
	{
		#pr($this->user_session);
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
			array( 'db' => 'dd_expiredate',  'dt' => 5 ),
			array( 'db' => 'dd_status',  'dt' => 6 ),

			array(
				'db'        => 'dd_createdate',
				'dt'        => 7,
				'formatter' => function( $d, $row ) {
					return date( 'jS M y', strtotime($d));
				}
			)
		);
		echo json_encode( SSP::simple( $post, DEAL_DETAIL, "dd_autoid", $columns ) );exit;
	}

	public function add()
	{
		$post = $this->input->post();
		if ($post) {
			#pr($post);
			$error = array();
			$e_flag=0; 
			
			if(trim($post['dc_catname']) == ''){
				$error['dc_catname'] = 'Please enter category name.';
				$e_flag=1;
			}
			if(trim($post['dc_catdetails']) == ''){
				$error['dc_catdetails'] = 'Please enter category detail.';
				$e_flag=1;
			}

			if ($e_flag == 0) {
				$data = array('dc_catname' => $post['dc_catname'],
								'dc_catdetails' => $post['dc_catdetails'],
								'dc_createdate' => date('Y-m-d H:i:s'),
							);
				$ret_user = $this->common_model->insertData(DEAL_CATEGORY, $data);
				
				if ($ret_user > 0) {
					$data['flash_msg'] = success_msg_box('Category added successfully.');
				}else{
					$data['flash_msg'] = error_msg_box('An error occurred while processing.');
				}
			}	
			$data['error_msg'] = $error;
		}
		$data['view'] = "add_edit";
		$this->load->view('admin/content', $data);
	}
}