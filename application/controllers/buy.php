<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Buy extends CI_Controller {

    function __construct(){
        parent::__construct();

        $this->front_session = $this->session->userdata('front_session');
    }

    public function index()
    {
        if (!isset($this->front_session['id'])) {
            echo "login";
            exit;
        }
        $post = $this->input->post();
        if ($post) {
            $data = array('db_dealid' => $post['deal_id'],
                        'db_offerid' => $post['offerid'],
                        'db_uid' => $this->front_session['id'],
                        'db_paymntopt' => 'COD',
                        'db_amntpaid' => 0,
                        'db_dealstatus' => 'active',
                        'db_uniqueid' => uniqid()
                    );
            $ret = $this->common_model->insertData(DEAL_BUYOUT, $data);
            if ($ret > 0) {
                $deal_data = $this->common_model->getDealDetail($post['deal_id'],$post['offerid']);
                $deal_details = array('name' => $deal_data['detail'][0]['dd_name'],
                                        'dealer' => $deal_data['detail'][0]['de_name'],
                                        'offer' => $deal_data['offers']->do_offertitle,
                                        'valid_till' => $deal_data['detail'][0]['dd_validtilldate'],
                                        'price' => $deal_data['detail'][0]['do_originalprice'],
                                        'uid' => $data['db_uid'],
                                        'uniqueId' => $data['db_uniqueid'],
                                        'email' => "buydeal"
                                    );
                $emailTpl = $this->load->view('email_templates/template', $deal_details, true);
                $admin_email = $this->common_model->selectData(DEAL_USER, 'du_email', array("du_role"=>'a'));
                $bcc = $admin_email[0]->du_email.", ".$deal_data['detail'][0]['de_email'];
                $ret = sendEmail($this->front_session['email'], SUBJECT_DEAL_INFO, $emailTpl, FROM_EMAIL, FROM_NAME, '', $bcc);

                echo "success";
            }else{
                echo "error";
            }
        }

    }

}

