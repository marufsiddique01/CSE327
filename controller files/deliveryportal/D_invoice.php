<?php
class D_invoice extends CI_Controller {
	
	function __construct(){
    	parent::__construct();
		if($this->session->userdata('logged_in')){
			$this->load->model('admin/delivery/M_invoice');
			$this->load->model('admin/M_common');
    	}else{
      		redirect('adminlogin', 'refresh');
		}
  	}
	public function index() {
		$dataarr  = array();
		$metadata = array();
		$metadata = $this->M_common->session_info();
		$metadata["title"] 		= 'Invoice :: Metro Lifestyle';
		$dataarr['metadata'] 	= $metadata;

		$dataarr['invoicedetails'] = $this->M_invoice->invoicedetails();
		$this->load->view( 'admin/delivery/invoice/invoice', $dataarr );
	} // End of function
}
?>