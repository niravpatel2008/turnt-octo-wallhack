<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dealer extends CI_Controller {

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
			array( 'db' => 'de_name', 'dt' => 0 ),
			array( 'db' => 'de_contact', 'dt' => 1 ),
			array( 'db' => 'de_email', 'dt' => 2 ),
			array( 'db' => 'de_address',  'dt' => 3 ),
			array( 'db' => 'de_city',  'dt' => 4 ),
			array( 'db' => 'de_state',  'dt' => 5 ),
			array( 'db' => 'de_zip',  'dt' => 6 ),
			array( 'db' => 'de_lat',  'dt' => 7 ),
			array( 'db' => 'de_long',  'dt' => 8 ),
			array( 'db' => 'de_url',  'dt' => 9 ),
			array(
				'db'        => 'de_createdate',
				'dt'        => 10,
				'formatter' => function( $d, $row ) {
					return date( 'jS M y', strtotime($d));
				}
			)
		);
		echo json_encode( SSP::simple( $post, DEAL_DETAIL, "de_autoid", $columns ) );exit;
	}

	public function add()
	{
		$post = $this->input->post();
		if ($post) {
			#pr($post);
			$error = array();
			$e_flag=0; 
		
			if ($e_flag == 0) {
				$data = array(
					'de_userid'=> $post['de_userid'],
					'de_name'=> $post['de_name'],
					'de_address'=> $post['de_address'],
					'de_city'=> $post['de_city'],
					'de_state'=> $post['de_state'],
					'de_zip'=> $post['de_zip'],
					'de_lat'=> $post['de_lat'],
					'de_long'=> $post['de_long'],
					'de_contact'=> $post['de_contact'],
					'de_email'=> $post['de_email'],
					'de_url'=> $post['de_url'],
					'de_createdate' =>date('Y-m-d H:i:s'),
				);

				$ret_user = $this->common_model->insertData(DEAL_DEALER, $data);
				
				if ($ret_user > 0) {
					$data['flash_msg'] = success_msg_box('Category added successfully.');
				}else{
					$data['flash_msg'] = error_msg_box('An error occurred while processing.');
				}
			}
			$data['error_msg'] = $error;
		}
		$data['view'] = "add_edit";
		$data['users'] = $this->common_model->selectData('deal_user', 'du_autoid,du_uname,du_email', array('du_role' => 'd'));
		$this->load->view('admin/content', $data);
	}
}