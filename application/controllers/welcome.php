<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->front_session = $this->session->userdata('front_session');
	}


	public function index()
	{
		/*$this->load->helper('htmltopdf/WKPDF_MULTI');
		$templateHtml = "<html><body><b>This is testing.</b></body></html>";
		$pdf = new WKPDF();
		$pdf->set_html($templateHtml);
		$pdf->render();
		$pdf->output('I','sample.pdf');
		exit;*/
		$data['categories'] = $this->common_model->selectData(DEAL_CATEGORY, 'dc_catname,dc_catid');
		$data['view'] = "index";
		$this->load->view('content', $data);
	}

	public function login()
	{
		$post = $this->input->post();
		if ($post) {
			if(trim($post['txtusername']) == ''){
				echo 'Please enter user name.';
				exit;
			}
			if(trim($post['txtpassword']) == ''){
				echo 'Please enter password.';
				exit;
			}

			$where = array('du_uname' => $post['txtusername'],
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

			$is_unique_username = $this->common_model->isUnique(DEAL_USER, 'du_uname', trim($post['username']));
			$is_unique_email = $this->common_model->isUnique(DEAL_USER, 'du_email', trim($post['email']));

			if(trim($post['username']) == ''){
				echo 'Please enter user name.';
				exit;
			}
			if (!$is_unique_username) {
				echo 'User name already exists.';
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
				$emailTpl = $this->get_welcome_tpl($login_details);
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
				$user = $this->common_model->updateData(DEAL_USER,$data,$where);

				$login_details = array('username' => $user[0]->du_uname,'password' => $newpassword);
				$emailTpl = $this->get_forgotpassword_tpl($login_details);
				$ret = sendEmail($user[0]->du_email, SUBJECT_LOGIN_INFO, $emailTpl, FROM_EMAIL, FROM_NAME);
				if ($ret) {
					echo "success";
				}else{
					echo 'An error occurred while processing.';
					exit;
				}

			}else{
				echo "Invalid email address.";
				exit;
			}

		}
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

	public function get_welcome_tpl($details)
	{
		$html = '<p>Welcome to dhiskiyaon on deals </p>
				<p>Your login details are: </p>
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
