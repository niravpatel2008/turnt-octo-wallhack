<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Buy extends CI_Controller {

    function __construct(){
        parent::__construct();

        $this->front_session = $this->session->userdata('front_session');
    }


    public function check_login()
    {
        if (!isset($this->front_session['id'])) {
            echo "login";
        }else{
			$post = $this->input->post();
			$this->session->set_userdata('cart',$post);            
			$deal_detail = $this->common_model->selectData(DEAL_DETAIL, 'dd_address_flag', array('dd_autoid' => $post['deal_id']+412));
			if(count($deal_detail) > 0)
			{
				if ($deal_detail[0]->dd_address_flag == "1")
					echo "address";
				else
					echo "success";
			}
			else
				echo "Error: Deal not available.";
			
        }
		exit;
    }


    public function index()
    {
        if (!isset($this->front_session['id'])) {
            echo "login";
            exit;
        }
        $post = $this->input->post();
        if ($post) {

        #save address details
		$data_address = "";
		if(isset($post['address']) && $post['address'] != "")
		{
			$query = null; 
			$query = $this->common_model->get_where(DEAL_USER_ADDRESS, array('da_userid' => $this->front_session['id']));
			$count = $query->num_rows(); //counting result from query
			$data_address = array('da_userid' => $this->front_session['id'],
							'da_firstname' => $post['firstname'],
							'da_lastname' => $post['lastname'],
							'da_address' => $post['address'],
							'da_city' => $post['city'],
							'da_state' => $post['state'],
							'da_pincode' => $post['pincode'],
							'da_phone' => $post['phone']
						);

			if ($count === 0) {
				$ret_addrs = $this->common_model->insertData(DEAL_USER_ADDRESS, $data_address);
			}
			else
			{
				$ret_addrs = $this->common_model->updateData(DEAL_USER_ADDRESS, $data_address, array('da_userid' => $this->front_session['id']));
			}
		}

			$cart = $this->session->userdata('cart');

			if (!isset($cart) || $cart['deal_id'] == "" || $cart['offerid'] == "")
			{	echo "Error: Cart is empty."; exit; }
			
			$db_uniqueid = array();
			$buy_id = array();
			for ($i = 0 ; $i  < $cart['qty'];$i++)
			{
				 $data = array('db_dealid' => $cart['deal_id'],
                        'db_offerid' => $cart['offerid'],
                        'db_uid' => $this->front_session['id'],
                        'db_paymntopt' => 'COD',
                        'db_amntpaid' => 0,
                        'db_dealstatus' => 'active',
                        'db_uniqueid' => uniqid()
                );
				$db_uniqueid[] = $data['db_uniqueid'];
				$buy_id[] = $this->common_model->insertData(DEAL_BUYOUT, $data);
			}

            if (count($buy_id) > 0) {
                $deal_data = $this->common_model->getDealDetail($cart['deal_id'],$cart['offerid']);

                $deal_details = array('name' => $deal_data['detail'][0]['dd_name'],
                                        'dealer' => $deal_data['detail'][0]['de_name'],
                                        'offer' => $deal_data['offers']->do_offertitle,
                                        'valid_till' => $deal_data['detail'][0]['dd_validtilldate'],
                                        'price' => $deal_data['offers']->do_originalprice,
                                        'uid' => $data['db_uid'],
                                        'qty' => $cart['qty'],
                                        'uniqueId' => $db_uniqueid,
                                        'email' => "buydeal",
                                        'address' => $data_address
                                    );
                $emailTpl = $this->load->view('email_templates/template', $deal_details, true);
                $admin_email = $this->common_model->selectData(DEAL_USER, 'du_email', array("du_role"=>'a'));
                $bcc = $admin_email[0]->du_email.", ".$deal_data['detail'][0]['de_email'];
                $ret = sendEmail($this->front_session['email'], SUBJECT_DEAL_INFO, $emailTpl, FROM_EMAIL, FROM_NAME, '', $bcc);

				$this->session->unset_userdata('cart');
                echo "success";
            }else{
                echo "error";
            }
        }

    }

}

