<?php 
class error_404 extends CI_Controller {
	/* load model, libraries etc. */
	 public function __construct(){
		parent::__construct(); 
	 } 
	/* load view files for 404 ERROR*/
	 public function index(){ 
		$this->output->set_status_header('404'); 
		$this->load->view('admin/error-404');
	 } 
} 