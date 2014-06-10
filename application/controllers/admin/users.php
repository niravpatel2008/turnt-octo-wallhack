<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

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
		
		$columns = array(
			array( 'db' => 'du_uname', 'dt' => 0 ),
			array( 'db' => 'du_role',  'dt' => 1 ),
			array( 'db' => 'du_contact',  'dt' => 2 ),
			array( 'db' => 'du_email',  'dt' => 3 ),
			array('db'        => 'du_createdate',
					'dt'        => 4,
					'formatter' => function( $d, $row ) {
						return date( 'jS M y', strtotime($d));
					}
			),
			array( 'db' => 'du_autoid',  
					'dt' => 5,
					'formatter' => function( $d, $row ) {
						return '<a href="'.site_url('/admin/users/edit/'.$d).'" class="fa fa-edit"></a> <a href="'.site_url('/admin/users/delete/'.$d).'" class="fa fa-trash-o"></a>';
					}
			),
		);
		echo json_encode( SSP::simple( $post, DEAL_USER, "du_autoid", $columns ) );exit;
	}

	public function add()
	{
		$post = $this->input->post();
		if ($post) {
			#pr($post);
			$error = array();
			$e_flag=0; 
			
			if(trim($post['user_name']) == ''){
				$error['user_name'] = 'Please enter user name.';
				$e_flag=1;
			}
			if(trim($post['role']) == ''){
				$error['role'] = 'Please select role.';
				$e_flag=1;
			}
			if(trim($post['contact']) == ''){
				$error['contact'] = 'Please enter contact number.';
				$e_flag=1;
			}
			if(!valid_email(trim($post['email'])) && trim($post['email']) == ""){
				$error['email'] = 'Please enter valid email.';
				$e_flag=1;
			}

			if ($e_flag == 0) {
				$data = array('du_uname' => $post['user_name'],
								'du_role' => $post['role'],
								'du_contact' => $post['contact'],
								'du_email' => $post['email'],
								'du_createdate' => date('Y-m-d H:i:s')
							);
				$ret_user = $this->common_model->insertData(DEAL_USER, $data);
				
				if ($ret_user > 0) {
					$data['flash_msg'] = success_msg_box('User added successfully.');
				}else{
					$data['flash_msg'] = error_msg_box('An error occurred while processing.');
				}
			}	
			$data['error_msg'] = $error;
		}
		$data['view'] = "add_edit";
		$this->load->view('admin/content', $data);
	}



	public function edit($id)
	{
		if ($id == "" || $id <= 0) {
			redirect('admin/users');
		}
		
		$where = 'du_autoid = '.$id;
		
		$post = $this->input->post();
		if ($post) {
			#pr($post);
			$error = array();
			$e_flag=0; 
			
			if(trim($post['user_name']) == ''){
				$error['user_name'] = 'Please enter user name.';
				$e_flag=1;
			}
			if(trim($post['role']) == ''){
				$error['role'] = 'Please select role.';
				$e_flag=1;
			}
			if(trim($post['contact']) == ''){
				$error['contact'] = 'Please enter contact number.';
				$e_flag=1;
			}
			if(!valid_email(trim($post['email'])) && trim($post['email']) == ""){
				$error['email'] = 'Please enter valid email.';
				$e_flag=1;
			}

			if ($e_flag == 0) {
				$data = array('du_uname' => $post['user_name'],
								'du_role' => $post['role'],
								'du_contact' => $post['contact'],
								'du_email' => $post['email']
							);
				$ret_user = $this->common_model->updateData(DEAL_USER, $data, $where);
				
				if ($ret_user > 0) {
					$data['flash_msg'] = success_msg_box('User updated successfully.');
				}else{
					$data['flash_msg'] = error_msg_box('An error occurred while processing.');
				}
			}	
			$data['error_msg'] = $error;
		}
		$data['user'] = $this->common_model->selectData(DEAL_USER, '*', $where);
		$data['view'] = "add_edit";
		$this->load->view('admin/content', $data);
	}


}
