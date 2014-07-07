<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Deal extends CI_Controller {

	function __construct(){
		parent::__construct();

		is_login();

		$this->user_session = $this->session->userdata('user_session');

		if (!@in_array("deal", @array_keys(config_item('user_role')[$this->user_session['role']])) && $this->user_session['role'] != 'a') {
			redirect("admin/dashboard");
		}

		/*if (!@in_array($this->router->fetch_method(), @config_item('user_role')[$this->user_session['role']]['deal']) && $this->user_session['role'] != 'a') {
			redirect("admin/deal");
		}*/
	}

	public function index()
	{
		//pr($this->user_session);
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
				'db'        => 'dd_startdate',
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
					'dt' => 8,
					'formatter' => function( $d, $row ) {
						return '<a href="'.site_url('/admin/deal/edit/'.$d).'" class="fa fa-edit"></a> / <a href="javascript:void(0);" onclick="delete_deal('.$d.')" class="fa fa-trash-o"></a>';
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

			if ($e_flag == 0) {
				$timeperiod = explode("-",$post['dd_timeperiod']);
				$dd_startdate = date('Y-m-d H:i:s',strtotime($timeperiod[0]));
				$dd_expiredate = date('Y-m-d H:i:s',strtotime($timeperiod[1]));

				$data = array(
					'dd_dealerid'=> $post['dd_dealerid'],
					'dd_catid'=> $post['dd_catid'],
					'dd_name'=> $post['dd_name'],
					'dd_createdby'=> $this->user_session['id'], // logged in user's id
					#'dd_createdate'=> date('Y-m-d H:i:s'), // need to add in add form
					'dd_description'=> $post['dd_description'],
					'dd_discount'=> $post['dd_discount'],
					'dd_startdate'=> $dd_startdate,
					'dd_expiredate'=> $dd_expiredate,
					'dd_listprice'=> $post['dd_listprice'],
					'dd_originalprice'=> $post['dd_originalprice'],
					'dd_mainphoto'=> $post['dd_mainphoto'],
					'dd_modiftimestamp'=> date('Y-m-d H:i:s'),
					'dd_status'=> $post['dd_status']
					);

				$ret_deal = $this->common_model->insertData(DEAL_DETAIL, $data);

				if ($ret_deal > 0) {
					$post_tags = $post['dd_tags'];

					foreach ($post_tags as $tag)
					{
						$tag = trim($tag);
						$tagid = $this->common_model->selectData(DEAL_TAGS,"dt_autoid",array("dt_tag"=>$tag));
						if(!$tagid)
						{
							$tagdata =  array("dt_tag"=>$tag);
							$tagid = $this->common_model->insertData(DEAL_TAGS, $tagdata);
						}
						else
						{
							$tagid = ($tagid[0]->dt_autoid);
						}


						$tagmap = $this->common_model->selectData(DEAL_MAP_TAGS,"*",array("dm_ddid"=>$ret_deal,"dm_dtid"=>$tagid));
						if (!$tagmap)
						{
							$tagmapdata =  array("dm_ddid"=>$ret_deal,"dm_dtid"=>$tagid);
							$this->common_model->insertData(DEAL_MAP_TAGS, $tagmapdata);
						}
					}

					/*update deal id to uploaded image link*/
					$newimages = array_filter(explode(",",$post['newimages']));
					if (count($newimages) > 0)
						$this->common_model->assingImagesToDeal($ret_deal,$newimages);


					$flash_arr = array('flash_type' => 'success',
										'flash_msg' => 'Deal added successfully.'
									);
				}else{
					$flash_arr = array('flash_type' => 'error',
										'flash_msg' => 'An error occurred while processing.'
									);
				}
				$this->session->set_flashdata($flash_arr);
				redirect("admin/deal");
			}
			$data['error_msg'] = $error;
		}

		$data['dealers'] = $this->common_model->selectData(DEAL_DEALER, 'de_autoid,de_name,de_email');
		$data['categories'] = $this->common_model->selectData(DEAL_CATEGORY, 'dc_catid,dc_catname');
		$data['dd_images'] = array();

		$data['view'] = "add_edit";
		$this->load->view('admin/content', $data);
	}

	public function edit($id)
	{
		if (!@in_array("edit", @config_item('user_role')[$this->user_session['role']]['deal']) && $this->user_session['role'] != 'a') {
			redirect("admin/deal");
		}

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

			if ($e_flag == 0) {
				$timeperiod = explode("-",$post['dd_timeperiod']);
				$dd_startdate = date('Y-m-d H:i:s',strtotime($timeperiod[0]));
				$dd_expiredate = date('Y-m-d H:i:s',strtotime($timeperiod[1]));

				$data = array(
							'dd_dealerid'=> $post['dd_dealerid'],
							'dd_catid'=> $post['dd_catid'],
							'dd_name'=> $post['dd_name'],
							#'dd_createdby'=> $this->user_session['id'], // logged in user's id
							#'dd_createdate'=> $post['dd_createdate'], // need to add in add form
							'dd_description'=> $post['dd_description'],
							'dd_discount'=> $post['dd_discount'],
							'dd_startdate'=> $dd_startdate,
							'dd_expiredate'=> $dd_expiredate,
							'dd_mainphoto' => $post['dd_mainphoto'],
							'dd_listprice'=> $post['dd_listprice'],
							'dd_originalprice'=> $post['dd_originalprice'],
							'dd_modiftimestamp'=> date('Y-m-d H:i:s'),
							'dd_status'=> $post['dd_status']
							);

				$ret = $this->common_model->updateData(DEAL_DETAIL, $data, $where);

				if ($ret > 0) {

					$post_tags = $post['dd_tags'];
					$old_tags = $this->common_model->getDealTags($id);

					foreach ($post_tags as $tag)
					{
						$tag = trim($tag);

						$found = false;
						foreach ($old_tags as $k=>$v)
						{
							if ($tag == $v['dt_tag'])
							{
								$found = true;
								unset($old_tags[$k]);
							}
						}

						if ($found) continue;

						$tagid = $this->common_model->selectData(DEAL_TAGS,"dt_autoid",array("dt_tag"=>$tag));
						if(!$tagid)
						{
							$tagdata =  array("dt_tag"=>$tag);
							$tagid = $this->common_model->insertData(DEAL_TAGS, $tagdata);
						}
						else
						{
							$tagid = ($tagid[0]->dt_autoid);
						}


						$tagmap = $this->common_model->selectData(DEAL_MAP_TAGS,"*",array("dm_ddid"=>$id,"dm_dtid"=>$tagid));
						if (!$tagmap)
						{
							$tagmapdata =  array("dm_ddid"=>$id,"dm_dtid"=>$tagid);
							$this->common_model->insertData(DEAL_MAP_TAGS, $tagmapdata);
						}
					}

					if (count($old_tags)>0)
					{
						$del_ids = array_reduce($old_tags,function($arr,$k){ $arr[] = $k['dt_autoid']; return $arr;});
						$this->common_model->deleteTags($del_ids,$id);
					}

					$flash_arr = array('flash_type' => 'success',
										'flash_msg' => 'Deal updated successfully.'
									);
				}else{
					$flash_arr = array('flash_type' => 'error',
										'flash_msg' => 'An error occurred while processing.'
									);
				}
				$this->session->set_flashdata($flash_arr);
				redirect("admin/deal");
			}
			$data['error_msg'] = $error;

		}

		$data['deal'] = $deal = $this->common_model->selectData(DEAL_DETAIL, '*', $where);

		if (empty($deal)) {
			redirect('admin/deal');
		}

		$data['dealers'] = $this->common_model->selectData(DEAL_DEALER, 'de_autoid,de_name,de_email');
		$data['categories'] = $this->common_model->selectData(DEAL_CATEGORY, 'dc_catid,dc_catname');
		$data['dd_tags'] = $this->common_model->getDealTags($id);
		$data['dd_images'] = $this->common_model->selectData(DEAL_LINKS, 'dl_autoid,dl_url',array("dl_ddid"=>$id));

		$data['view'] = "add_edit";
		$this->load->view('admin/content', $data);
	}

	public function fileupload()
	{
		$file_name = "";
		$error = "";
		$post = $this->input->post();
		if($_FILES['file']['name'] != '' && $_FILES['file']['error'] == 0){
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';

			$file_name_arr = explode('.',$_FILES['file']['name']);
			$file_name_arr = array_reverse($file_name_arr);
			$file_extension = $file_name_arr[0];
			$file_name = $config['file_name'] = "deal_".time().".".$file_extension;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('file'))
			{
				$e_flag = 1;
				$error = $this->upload->display_errors();
			}

			if ($error != "")
				echo "Error:".$error;
			else
			{
				$dd_ddid = isset($post['dd_id'])?$post['dd_id']:"";
				$linkdata =  array("dl_ddid"=>$dd_ddid,"dl_type"=>"img","dl_url"=>$file_name);
				$link_id = $this->common_model->insertData(DEAL_LINKS, $linkdata);
				echo '{"id":"'.$link_id.'","path":"'.base_url()."uploads/".$file_name.'"}';
			}
			exit;
		}else
		{
			echo "Error: File not uploaded to server.";
		}
	}

	public function delete()
	{
		if (!@in_array("delete", @config_item('user_role')[$this->user_session['role']]['deal']) && $this->user_session['role'] != 'a') {
			echo "redirect";
			exit;
		}

		$post = $this->input->post();

		if ($post) {
			$ret = $this->common_model->deleteData(DEAL_DETAIL, array('dd_autoid' => $post['id'] ));
			if ($ret > 0) {
				echo "success";
				#echo success_msg_box('Deal deleted successfully.');;
			}else{
				echo "error";
				#echo error_msg_box('An error occurred while processing.');
			}
		}
	}

}
