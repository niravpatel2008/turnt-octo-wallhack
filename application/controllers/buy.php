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
			$deal_detail = $this->common_model->selectData(DEAL_DETAIL, 'dd_address_flag', array('dd_autoid' => $post['deal_id']));
			if(count($deal_detail) > 0)
			{
				if ($deal_detail[0]->dd_address_flag == "1")
				{
					$post['address'] = 1;
					$this->session->set_userdata('cart',$post);
					echo "address";
				}
				else
				{
					$post['address'] = 0;
					$this->session->set_userdata('cart',$post);
					echo "success";
				}
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

        $cart = $this->session->userdata('cart');
        #pr($cart,1);

        $post = $this->input->post();


		if (!isset($cart) || $cart['deal_id'] == "" || $cart['offerid'] == "")
		{
            echo "Error: Cart is empty."; exit;
        }

        #save address details
		$data_address = "";
		if($cart['address'] == "1")
		{
			if ($post['lastname'] == "" || $post['address'] == "" || $post['city'] == "" ||$post['state'] == "" || $post['pincode'] == "" || $post['phone'] == "")
			{
				echo "Error: Shipping details are required.";
				exit;
			}

			$count = $this->common_model->selectData(DEAL_USER_ADDRESS, '*', array('da_userid' => $this->front_session['id']), "", "", "", "", "", 'rowcount');
			#$query = $this->common_model->get_where(DEAL_USER_ADDRESS, array('da_userid' => $this->front_session['id']));
            #$count = $query->num_rows(); //counting result from query
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

        /**
        * payu integration
        */
        $user_Detail = $this->common_model->selectData(DEAL_USER, 'du_email,du_uname,du_contact', array('du_autoid' => $this->front_session['id']));
        $offer_Detail = $this->common_model->selectData(DEAL_OFFER, 'do_listprice,do_offertitle', array('do_autoid' => $cart['offerid']));

        $url = 'https://test.payu.in/_payment';
        $key = 'JBZaLc';
        $txnid = microtime();
        $amount = $offer_Detail[0]->do_listprice*$cart['qty'];
        $productinfo = $offer_Detail[0]->do_offertitle;
        $firstname = $user_Detail[0]->du_uname;
        $email = $user_Detail[0]->du_email;
        $contact = $user_Detail[0]->du_contact;
        $salt = "GQs7yium";

        $curl_data = array('key' => $key,
                            'txnid' => $txnid,
                            'amount' => $amount,
                            'productinfo' => $productinfo,
                            'firstname' => $firstname,
                            'email' => $email,
                            'phone' => $contact,
                            'surl' => base_url().'buy/success',
                            'furl' => base_url().'buy/failure',
                            'hash' => hash('sha512', $key.'|'.$txnid.'|'.$amount.'|'.$productinfo.'|'.$firstname.'|'.$email.'|||||||||||'.$salt),
                            'service_provider' => 'payu_paisa'
                        );

        $curl_response = curl_request($url,$curl_data);
        $hArray = explode("\n",$curl_response);
        echo str_replace("Location: ", '', $hArray[11]);
        exit();

    }


    public function success()
    {
        $post = $this->input->post();
        $cart = $this->session->userdata('cart');
        if ($post) {
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

                $user_address = $this->common_model->selectData(DEAL_USER_ADDRESS, '*', array("da_userid"=>$this->front_session['id']));
                $data_address = array('da_userid' => $this->front_session['id'],
                            'da_firstname' => $user_address[0]->da_firstname,
                            'da_lastname' => $user_address[0]->da_lastname,
                            'da_address' => $user_address[0]->da_address,
                            'da_city' => $user_address[0]->da_city,
                            'da_state' => $user_address[0]->da_state,
                            'da_pincode' => $user_address[0]->da_pincode,
                            'da_phone' => $user_address[0]->da_phone
                        );

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
                #echo "success";
            }else{
                #echo "error";
            }
        }

        $data['view'] = "success";
        $this->load->view('content', $data);
    }

    public function failure()
    {
        $post = $this->input->post();
        if ($post) {
            $data['error_msg'] = $post['error_Message'];

            $deal_data = $this->common_model->getDealDetail($cart['deal_id'],$cart['offerid']);
            $deal_details = array('name' => $deal_data['detail'][0]['dd_name'],
                                        'dealer' => $deal_data['detail'][0]['de_name'],
                                        'offer' => $deal_data['offers']->do_offertitle,
                                        'valid_till' => $deal_data['detail'][0]['dd_validtilldate'],
                                        'price' => $deal_data['offers']->do_originalprice,
                                        'uid' => $data['db_uid'],
                                        'qty' => $cart['qty'],
                                        'email' => "payment_failed"
                                    );
            $admin_email = $this->common_model->selectData(DEAL_USER, 'du_email', array("du_role"=>'a'));
            $bcc = $admin_email[0]->du_email.", ".$deal_data['detail'][0]['de_email'];



            $emailTpl = $this->load->view('email_templates/template', $deal_details, true);
            $ret = sendEmail($this->front_session['email'], SUBJECT_PAYMENT_FAILED, $emailTpl, FROM_EMAIL, FROM_NAME, '', $bcc);

            $this->session->unset_userdata('cart');
        }

        $data['view'] = "failure";
        $this->load->view('content', $data);
    }
}

