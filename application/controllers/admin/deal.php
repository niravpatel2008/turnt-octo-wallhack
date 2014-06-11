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
		$post = $this->input->post();
		$columns = array();
		$columns = array(
			array( 'db' => 'dd_name', 'dt' => 0 ),
			array( 'db' => 'dd_description',  'dt' => 1 ),
			array( 'db' => 'dd_originalprice',  'dt' => 2 ),
			array( 'db' => 'dd_discount',  'dt' => 3 ),
			array( 'db' => 'dd_listprice',  'dt' => 4 ),
			array(
				'db'        => 'dd_createdate',
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
					'dt' => 7,
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
			#pr($post,1);
			$error = array();
			$e_flag=0; 
						
			if ($post['dd_dealerid'] == "") {
				$error['dd_dealerid'] = 'Please select dealer.';
				$e_flag=1;
			}
			if ($post['dd_catid'] == "") {
				$error['dd_catid'] = 'Please select category.';
				$e_flag=1;
			}
			if ($post['dd_name'] == "") {
				$error['dd_name'] = 'Please enter deal name.';
				$e_flag=1;
			}
			if ($post['dd_originalprice'] == "") {
				$error['dd_originalprice'] = 'Please enter price.';
				$e_flag=1;
			}
			if ($post['dd_status'] == "") {
				$error['dd_status'] = 'Please select status.';
				$e_flag=1;
			}


			$file_name = "";
			if($_FILES['dd_mainphoto']['name'] != '' && $_FILES['dd_mainphoto']['error'] == 0){
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
				
				$file_name_arr = explode('.',$_FILES['dd_mainphoto']['name']);
				$file_name_arr = array_reverse($file_name_arr);
				$file_extension = $file_name_arr[0];
				$file_name = $config['file_name'] = "deal_".time().".".$file_extension;

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('dd_mainphoto'))
				{
					$e_flag = 1;
					$error['dd_mainphoto'] = $this->upload->display_errors();
				}

			}
		
			if ($e_flag == 0) {
				$data = array(
							'dd_dealerid'=> $post['dd_dealerid'],
							'dd_catid'=> $post['dd_catid'],
							'dd_name'=> $post['dd_name'],
							'dd_createdby'=> $this->user_session['id'], // logged in user's id
							#'dd_createdate'=> $post['dd_createdate'], // need to add in add form
							'dd_description'=> $post['dd_description'],
							'dd_discount'=> $post['dd_discount'],
							'dd_expiredate'=> $post['dd_expiredate'],
							'dd_listprice'=> $post['dd_listprice'],
							'dd_originalprice'=> $post['dd_originalprice'],
							'dd_mainphoto'=> $file_name,
							'dd_modiftimestamp'=> date('Y-m-d H:i:s'),
							'dd_status'=> $post['dd_status']
						);
				
				$ret_user = $this->common_model->insertData(DEAL_DETAIL, $data);
				
				if ($ret_user > 0) {
					$data['flash_msg'] = success_msg_box('Deal added successfully.');
				}else{
					$data['flash_msg'] = error_msg_box('An error occurred while processing.');
				}
			}
			$data['error_msg'] = $error;
		}
		
		$data['dealers'] = $this->common_model->selectData(DEAL_DEALER, 'de_autoid,de_name,de_email');
		$data['categories'] = $this->common_model->selectData(DEAL_CATEGORY, 'dc_catid,dc_catname');
		
		$data['view'] = "add_edit";
		$this->load->view('admin/content', $data);
	}

	public function edit($id)
	{
		if ($id == "" || $id <= 0) {
			redirect('admin/deal');
		}

		$where = 'dd_autoid = '.$id;
		
		$post = $this->input->post();
		if ($post) {

			$error = array();
			$e_flag=0;

			if ($post['dd_dealerid'] == "") {
				$error['dd_dealerid'] = 'Please select dealer.';
				$e_flag=1;
			}
			if ($post['dd_catid'] == "") {
				$error['dd_catid'] = 'Please select category.';
				$e_flag=1;
			}
			if ($post['dd_name'] == "") {
				$error['dd_name'] = 'Please enter deal name.';
				$e_flag=1;
			}
			if ($post['dd_originalprice'] == "") {
				$error['dd_originalprice'] = 'Please enter price.';
				$e_flag=1;
			}
			if ($post['dd_status'] == "") {
				$error['dd_status'] = 'Please select status.';
				$e_flag=1;
			}

			$file_name = "";
			
			if($_FILES['dd_mainphoto']['name'] != '' && $_FILES['dd_mainphoto']['error'] == 0){
				
				#delete old file
				if ($post['old_filename'] != "") {
					unlink(DOC_ROOT."uploads/".$post['old_filename']);
				}
				

				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
				
				$file_name_arr = explode('.',$_FILES['dd_mainphoto']['name']);
				$file_name_arr = array_reverse($file_name_arr);
				$file_extension = $file_name_arr[0];
				$file_name = $config['file_name'] = "deal_".time().".".$file_extension;

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('dd_mainphoto'))
				{
					$e_flag = 1;
					$error['dd_mainphoto'] = $this->upload->display_errors();
				}

			}

			if ($e_flag == 0) {
				$data = array(
							'dd_dealerid'=> $post['dd_dealerid'],
							'dd_catid'=> $post['dd_catid'],
							'dd_name'=> $post['dd_name'],
							#'dd_createdby'=> $this->user_session['id'], // logged in user's id
							#'dd_createdate'=> $post['dd_createdate'], // need to add in add form
							'dd_description'=> $post['dd_description'],
							'dd_discount'=> $post['dd_discount'],
							'dd_expiredate'=> $post['dd_expiredate'],
							'dd_listprice'=> $post['dd_listprice'],
							'dd_originalprice'=> $post['dd_originalprice'],
							'dd_modiftimestamp'=> date('Y-m-d H:i:s'),
							'dd_status'=> $post['dd_status']
							);
				if($_FILES['dd_mainphoto']['name'] != '' && $_FILES['dd_mainphoto']['error'] == 0){
					$data['dd_mainphoto'] = $file_name;
				}

				$ret = $this->common_model->updateData(DEAL_DETAIL, $data, $where);
				
				if ($ret > 0) {
					$data['flash_msg'] = success_msg_box('Deal updated successfully.');
				}else{
					$data['flash_msg'] = error_msg_box('An error occurred while processing.');
				}
			}	
			$data['error_msg'] = $error;

		}
		
		$data['deal'] = $deal = $this->common_model->selectData(DEAL_DETAIL, '*', $where);
		
		if (empty($deal)) {
			redirect('admin/deal');
		}

		$data['dealers'] = $this->common_model->selectData(DEAL_DEALER, 'de_autoid,de_name,de_email');
		$data['categories'] = $this->common_model->selectData(DEAL_CATEGORY, 'dc_catid,dc_catname');
		
		$data['view'] = "add_edit";
		$this->load->view('admin/content', $data);	
	}

	public function delete()
	{
		$post = $this->input->post();
		
		if ($post) {
			$ret = $this->common_model->deleteData(DEAL_DETAIL, array('dd_autoid' => $post['id'] ));
			if ($ret > 0) {
				echo success_msg_box('Deal deleted successfully.');;
			}else{
				echo error_msg_box('An error occurred while processing.');
			}
		}
	}

}