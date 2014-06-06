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
		$config = array();
		$config["base_url"] = admin_path() . "category/ajax_list/";
		$config["total_rows"] = $this->common_model->selectData(DEAL_CATEGORY, '*', '', "", "", "", "", "", 'rowcount');
		$config['per_page'] = 1;
		$this->pagination->initialize($config);
		$data['cur_page'] = $limit;
		$data['pagination_link'] = $this->pagination->create_links($limit);
		$data['pfooterTxt'] = $this->pagination->get_number_part();

		$data["result"] = $this->common_model->selectData(DEAL_CATEGORY, '*', '', "", "", "", $limit, $config["per_page"]);


		$data['view'] = "list";
		$this->load->view('admin/ajax_content', $data);
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