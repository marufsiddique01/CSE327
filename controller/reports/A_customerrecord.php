<?php
class A_customerrecord extends CI_Controller {
	/* load model, libraries etc. */
	function __construct(){
    	parent::__construct();
		if($this->session->userdata('logged_in')){
			$this->load->model('admin/reports/M_customerrecord');
			$this->load->model('admin/M_common');
    	}else{
      		redirect('adminlogin', 'refresh');
		}
  	}
	/* store title in array and load view files with corresponding models */
	public function index() {
		$dataarr = array();
		$metadata = array();
		$metadata = $this->M_common->session_info();
		$metadata["title"] = 'Customer Record :: Metro Lifestyle';
		$dataarr['metadata'] = $metadata;

		$dataarr['customerlist'] = $this->M_customerrecord->customerlist();
		$this->load->view( 'admin/reports/customer-info-record', $dataarr );
	} // End of function
}
?>