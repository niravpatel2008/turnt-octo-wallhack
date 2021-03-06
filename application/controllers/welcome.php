<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->front_session = $this->session->userdata('front_session');
	}


	public function index()
	{
		//$emailTpl = $this->load->view('email_templates/template', array('email'=>'signup','username'=>'Nirav Patel','password'=>'password'), true);
		//$ret = sendEmail("nirav.ce.2008@gmail.com", "TEST EMAIL", $emailTpl, "nirav.ce.2008@gmail.com", "Nirav Patel");

		$data['categories'] = $this->common_model->selectData(DEAL_CATEGORY, 'dc_catname,dc_catid,dc_catimg',array("dc_status"=>1));
		$data['view'] = "index";
		$this->load->view('content', $data);

	}

	public function login()
	{
		$post = $this->input->post();
		if ($post) {
			if(trim($post['txtuseremail']) == ''){
				echo 'Please enter email address.';
				exit;
			}
			if(trim($post['txtpassword']) == ''){
				echo 'Please enter password.';
				exit;
			}

			$where = array('du_email' => $post['txtuseremail'],
							'du_password' => sha1(trim($post['txtpassword'])),
							'du_role' => 'u'
						 );
			$user = $this->common_model->selectData(DEAL_USER, '*', $where);
			if (count($user) > 0) {
				# create session
				$data = array('id' => $user[0]->du_autoid,
								'uname' => $user[0]->du_uname,
								'contact' => $user[0]->du_contact,
								'email' => $user[0]->du_email,
								'profile_picture' => $user[0]->du_profile_picture,
								'create_date' => $user[0]->du_createdate
							);
				$this->session->set_userdata('front_session',$data);
				echo "success";
			}else{
				echo "Invalid username or password";
			}

		}

	}

	public function signup()
	{
		$post = $this->input->post();
		if ($post) {

			//$is_unique_username = $this->common_model->isUnique(DEAL_USER, 'du_uname', trim($post['username']));
			$is_unique_email = $this->common_model->isUnique(DEAL_USER, 'du_email', trim($post['email']));

			if(trim($post['username']) == ''){
				echo 'Please enter your name.';
				exit;
			}
			if(trim($post['password']) == ''){
				echo 'Please enter password.';
				exit;
			}
			if(trim($post['password2']) == ''){
				echo 'Please enter confirm password.';
				exit;
			}
			if(trim($post['password2']) != trim($post['password'])){
				echo 'Please confirm password same as password.';
				exit;
			}
			if(trim($post['contact']) == ''){
				echo 'Please enter contact number.';
				exit;
			}
			if(!valid_email(trim($post['email'])) && trim($post['email']) == ""){
				echo 'Please enter valid email.';
				exit;
			}
			if (!$is_unique_email) {
				echo 'Email already exists.';
				exit;
			}

			$data = array('du_uname' => $post['username'],
							'du_password' => sha1(trim($post['password'])),
							'du_role' => 'u',
							'du_contact' => $post['contact'],
							'du_email' => $post['email'],
							'du_createdate' => date('Y-m-d H:i:s')
						);
			$ret = $this->common_model->insertData(DEAL_USER, $data);

			if ($ret > 0) {
				# create session
				$data = array('id' => $ret,
								'uname' => $post['username'],
								'contact' => $post['contact'],
								'email' => $post['email'],
								'profile_picture' => "",
								'create_date' => date('Y-m-d H:i:s')
							);
				$this->session->set_userdata('front_session',$data);

				$login_details = array('username' => $post['username'],
										'password' => trim($post['password'])
									);

				$emailTpl = $this->load->view('email_templates/template', array('email'=>'signup','username'=>$login_details['username'],'password'=>$login_details['password']), true);
				
				$ret = sendEmail($post['email'], SUBJECT_LOGIN_INFO, $emailTpl, FROM_EMAIL, FROM_NAME);

				echo "success";
			}else{
				#show error
				echo "An error occurred while processing.";
			}

		}
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

			if(!valid_email(trim($post['txtemail'])) && trim($post['txtemail']) == ''){
				echo 'Please enter email.';
				exit;
			}

			$where = array('du_email' => trim($post['txtemail']),
							'du_role' => 'u'
						);
			$user = $this->common_model->selectData(DEAL_USER, '*', $where);
			if (count($user) > 0) {

				$newpassword = random_string('alnum', 8);
				$data = array('du_password' => sha1($newpassword));
				$upid = $this->common_model->updateData(DEAL_USER,$data,$where);

				$login_details = array('username' => $user[0]->du_uname,'password' => $newpassword);

				$emailTpl = $this->load->view('email_templates/template', array('email'=>'forgot_password','username'=>$login_details['username'],'password'=>$login_details['password']), true);
				

				$ret = sendEmail($user[0]->du_email, SUBJECT_LOGIN_INFO, $emailTpl, FROM_EMAIL, FROM_NAME);
				if ($ret) {
					echo "success";
				}else{
					echo 'An error occurred while processing.';
					exit;
				}

			}else{
				echo "User does not exist.";
				exit;
			}

		}
	}


	public function contact()
	{
		$post = $this->input->post();
		if ($post) {
			$error = array();
			$e_flag=0;

			if(trim($post['name']) == ''){
				$error['name'] = 'Please enter your name.';
				$e_flag=1;
			}

			if(!valid_email(trim($post['email'])) && trim($post['email']) == ''){
				$error['email'] = 'Please enter valid email.';
				$e_flag=1;
			}

			if(trim($post['message']) == ''){
				$error['message'] = 'Please enter message.';
				$e_flag=1;
			}

			if ($e_flag == 0) {
				$emailData = array_merge($post,array('email'=>'contact'));
				$emailTpl = $this->load->view('email_templates/template',$emailData , true);
				$ret = sendEmail(FROM_EMAIL, SUBJECT_CONTACT_ADMIN, $emailTpl, FROM_EMAIL, FROM_NAME);
				if ($ret) {
					$flash_arr = array('flash_type' => 'success',
										'flash_msg' => "Your contact us form has been submitted successfully."
									);
				}else{
					$flash_arr = array('flash_type' => 'error',
										'flash_msg' => 'An error occurred while processing.'
									);
				}
				$data['flash_msg'] = $flash_arr;
			}
			$data['error_msg'] = $error;
		}
		$data['view'] = "contact";
		$this->load->view('content', $data);
	}

	public function about()
	{
		$data['view'] = "about";
		$this->load->view('content', $data);
	}

	public function howitworks()
	{
		$data['view'] = "howitworks";
		$this->load->view('content', $data);
	}

	public function privacypolicy()
	{
		$data['view'] = "privacypolicy";
		$this->load->view('content', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
