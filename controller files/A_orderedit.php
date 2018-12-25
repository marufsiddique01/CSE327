<?php
class A_orderedit extends CI_Controller {
	/* load model, libraries etc. */
	function __construct(){
    	parent::__construct();
		if($this->session->userdata('logged_in')){
			$this->load->model('admin/M_orderedit');
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
		$metadata["title"] = 'Order Update :: Metro Lifestyle';
		$dataarr['metadata'] = $metadata;

		$dataarr['orderedit'] = $this->M_orderedit->orderedit();
		$this->load->view( 'admin/order-update', $dataarr );
	} // End of function
}
?>