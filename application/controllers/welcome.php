<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	
	public function index()
	{
		$session = $this->session->userdata('user_session');
		#pr($session,1);
		if (isset($session['id'])) {
			redirect("dashboard");
		}

		$post = $this->input->post();
		if ($post) {
			#pr($post);
			$error = array();
			$e_flag=0; 
			if(trim($post['username']) == ''){
				$error['username'] = 'Please enter username.';
				$e_flag=1;
			}
			if(trim($post['password']) == ''){
				$error['password'] = 'Please enter password.';
				$e_flag=1;
			}

			if ($e_flag == 0) {
				$where = array('du_uname' => $post['username'],
								'du_password' => $post['password'],
								'du_role' => 'u'
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
					redirect('dashboard');
				}else{
					$error['invalid_login'] = "Invalid username or password";
				}
			}

			$data['error_msg'] = $error;


		}	
		$data['view'] = "index";
		$this->load->view('content', $data);
	}

	public function signup()
	{
		$post = $this->input->post();
		if ($post) {
			#pr($post);
			$error = array();
			$e_flag=0; 
			
			if(trim($post['username']) == ''){
				$error['username'] = 'Please enter user name.';
				$e_flag=1;
			}
			if(trim($post['password']) == ''){
				$error['password'] = 'Please enter password.';
				$e_flag=1;
			}
			if(trim($post['confirm_password']) == ''){
				$error['confirm_password'] = 'Please enter confirm password.';
				$e_flag=1;
			}
			if(trim($post['confirm_password']) != trim($post['password'])){
				$error['confirm_password'] = 'Please confirm password same as password.';
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
				$data = array('du_uname' => $post['username'],
								'du_password' => $post['password'],
								'du_role' => 'u',
								'du_contact' => $post['contact'],
								'du_email' => $post['email'],
								'du_createdate' => date('Y-m-d H:i:s')
							);
				$ret = $this->common_model->insertData(DEAL_USER, $data);
				
				if ($ret > 0) {
					#start session & login
				}else{
					#show error
				}
			}
			$data['error_msg'] = $error;
		}

		$data['view'] = "signup";
		$this->load->view('content', $data);
	}

	public function autosuggest()
	{
		$get = $this->input->get();
		if (!isset($get["keyword"])) exit;
		$tag = $get["keyword"];
		$tags = $this->common_model->getTagAutoSuggest($tag);
		echo json_encode($tags);exit;
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */