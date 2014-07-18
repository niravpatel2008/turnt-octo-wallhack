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
                        'db_uid' => $this->front_session['id'],
                        'db_paymntopt' => 'COD',
                        'db_amntpaid' => 0,
                        'db_dealstatus' => 'pending'
                    );
            $ret = $this->common_model->insertData(DEAL_BUYOUT, $data);
            if ($ret > 0) {
                echo "success";
            }else{
                echo "error";
            }
        }

    }


}

