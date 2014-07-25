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
                        'db_dealstatus' => 'pending'
                    );
            $ret = $this->common_model->insertData(DEAL_BUYOUT, $data);
            if ($ret > 0) {
                $deal_data = $this->common_model->getDealDetail($post['deal_id']);
                $deal_details = array('name' => $deal_data['detail'][0]['dd_name'],
                                        'dealer' => $deal_data['detail'][0]['de_name'],
                                        'offer' => $deal_data['offer']->do_offertitle,
                                        'valid_till' => $deal_data['detail'][0]['dd_expiredate'],
                                        'price' => $deal_data['detail'][0]['dd_listprice']
                                    );
                $emailTpl = $this->get_user_deal_tpl($deal_details);
                $admin_email = selectData(DEAL_USER, 'du_email', "du_role = 'a' ");
                $bcc = $admin_email[0]->du_email.", ".$deal_data['detail'][0]['de_email'];
                $ret = sendEmail($this->front_session['du_email'], SUBJECT_DEAL_INFO, $emailTpl, FROM_EMAIL, FROM_NAME, '', $bcc);

                echo "success";
            }else{
                echo "error";
            }
        }

    }


    public function get_user_deal_tpl($details)
    {
        $html = '<p>Thank you for purchasing deal at django deals. </p>
                <p>Below are the deal details: </p>
                <p>
                    Name: '.$details['name'].'<br/>
                    Dealer: '.$details['dealer'].'<br/>
                    Offer: '.$details['offer'].'<br/>
                    Valid till: '.$details['valid_till'].'<br/>
                    Price: '.$details['price'].'
                </p>
                <p>
                    Thank you
                </p>
                ';

        return $html;
    }



}

