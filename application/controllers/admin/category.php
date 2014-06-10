<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Category extends CI_Controller {

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
			array( 'db' => 'dc_catname', 'dt' => 0 ),
			array( 'db' => 'dc_catdetails',  'dt' => 1 ),
			array(
				'db'        => 'dc_createdate',
				'dt'        => 2,
				'formatter' => function( $d, $row ) {
					return date( 'jS M y', strtotime($d));
				}
			),
			array( 'db' => 'dc_catid',  
					'dt' => 3,
					'formatter' => function( $d, $row ) {
						return '<a href="'.site_url('/admin/category/edit/'.$d).'" class="fa fa-edit"></a> / <a href="'.site_url('/admin/category/delete/'.$d).'" class="fa fa-trash-o"></a>';
					}
			),
		);
		echo json_encode( SSP::simple( $post, DEAL_CATEGORY, "dc_catid", $columns ) );exit;
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