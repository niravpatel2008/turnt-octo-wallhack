<?php
if (in_array($this->router->fetch_class(), array('welcome')) &&  in_array($this->router->fetch_method(), array('index', 'signup', 'forgotpassword'))) {
	$this->load->view('template/header');
}else{
	$this->load->view('template/header_inner');
}

$this->load->view('template/middle');
$this->load->view('template/footer');
?>
