<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	function __construct(){
		parent::__construct();
	}	 

	public function index()
	{
		$data = array();
		$post = $this->input->post();
		if ($post) {
			$error = array();
			$e_flag=0; 
			if(trim($post['userid']) == ''){
				$error['userid'] = 'Please enter userid.';
				$e_flag=1;
			}
			if(trim($post['password']) == ''){
				$error['password'] = 'Please enter password.';
				$e_flag=1;
			}

			if ($e_flag == 0) {
				$where = array('du_uname' => $post['userid'],
								'du_password' => $post['password'],
								'du_role' => 'a'
							 );
				$user = $this->common_model->selectData('deal_user', '*', $where);
				if (count($user) > 0) {
					# create session
					$data = array('id' => $user[0]->du_autoid,
									'uname' => $user[0]->du_uname,
									'contact' => $user[0]->du_contact,
									'email' => $user[0]->du_email,
									'create_date' => $user[0]->du_createdate
								);
					$this->session->set_userdata('user_session',$data);
					redirect('admin/dashboard');
				}else{
					$error['invalid_login'] = "Invalid userid or password";
				}
			}

			$data['error_msg'] = $error;
			
			
		}
		
		$this->load->view('admin/index/index', $data);
	}


	public function logout()
	{
		$this->session->sess_destroy();
		redirect(admin_path());
	}

}
