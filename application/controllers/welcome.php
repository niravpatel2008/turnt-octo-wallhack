<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{	
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

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */