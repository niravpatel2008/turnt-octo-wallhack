<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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

	public function deal_list()
	{
		$post = $this->input->post();

		$columns = array(
			array( 'db' => 'dd_name',  'dt' => 0 ),
			array( 'db' => 'de_name',  'dt' => 1 ),
			array( 'db' => 'du_uname',  'dt' => 2 ),
			array( 'db' => 'du_contact',  'dt' => 3 ),
			array( 'db' => 'du_email', 'dt' => 4 ),
			array( 'db' => 'db_paymntopt',  'dt' => 5 ),
			array( 'db' => 'db_amntpaid',  'dt' => 6 ),
			array( 'db' => 'db_dealstatus',  'dt' => 7 ),
			array('db'        => 'db_date',
					'dt'        => 8,
					'formatter' => function( $d, $row ) {
						return date( 'jS M y', strtotime($d));
					}
			),
			array( 'db' => 'db_autoid',
					'dt' => 9,
					'formatter' => function( $d, $row ) {
						return '<a href="javascript:void(0);" onclick="#" class="fa fa-trash-o"></a>';
					}
			),
		);
		$join1 = array(DEAL_USER,'du_autoid = db_uid');
		$join2 = array(DEAL_DETAIL,'dd_autoid = db_dealid');
		$join3 = array(DEAL_DEALER,'de_autoid = dd_dealerid');
		echo json_encode( SSP::simple( $post, DEAL_BUYOUT, "db_autoid", $columns ,array($join1, $join2, $join3) ) );exit;

	}

}
