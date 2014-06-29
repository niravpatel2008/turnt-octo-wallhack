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
					redirect('search');
				}else{
					$error['invalid_login'] = "Invalid username or password";
				}
			}

			$data['error_msg'] = $error;
			#pr($data,1);

		}
		$data['categories'] = $this->common_model->selectData('deal_category', 'dc_catname,dc_catid');
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

			$is_unique_username = $this->common_model->isUnique(DEAL_USER, 'du_uname', trim($post['user_name']));
			$is_unique_email = $this->common_model->isUnique(DEAL_USER, 'du_email', trim($post['email']));


			if(trim($post['username']) == ''){
				$error['username'] = 'Please enter user name.';
				$e_flag=1;
			}
			if (!$is_unique_username) {
				$error['username'] = 'User name already exists.';
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
			if (!$is_unique_email) {
				$error['email'] = 'Email already exists.';
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


	public function forgotpassword()
	{
		$post = $this->input->post();
		if ($post) {
			$error = array();
			$e_flag=0;
			if(!valid_email(trim($post['email'])) && trim($post['email']) == ''){
				$error['email'] = 'Please enter email.';
				$e_flag=1;
			}

			if ($e_flag == 0) {
				$where = array('du_email' => trim($post['email']));
				$user = $this->common_model->selectData('deal_user', '*', $where);
				if (count($user) > 0) {
					$login_details = array('username' => $user[0]->du_uname,
											'password' => $user[0]->du_password
										);
					$emailTpl = $this->get_forgotpassword_tpl($login_details);
					$ret = sendEmail($user[0]->du_email, SUBJECT_LOGIN_INFO, $emailTpl, FROM_EMAIL, FROM_NAME);
					if ($ret) {
						$flash_arr = array('flash_type' => 'success',
										'flash_msg' => 'Login details sent successfully.'
									);
					}else{
						$flash_arr = array('flash_type' => 'error',
										'flash_msg' => 'An error occurred while processing.'
									);
					}

					$data['flash_msg'] = $flash_arr;
				}else{
					$error['email'] = "Invalid email address.";
				}
			}
			$data['error_msg'] = $error;
		}
		$data['view'] = "forgotpassword";
		$this->load->view('content', $data);
	}


	public function get_forgotpassword_tpl($details)
	{
		$html = '<p>Your login details are: </p>
				<p>
					Username: '.$details['username'].'<br/>
					Password: '.$details['password'].'
				</p>
				<p>
					Thank you
				</p>
				';

		return $html;
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
