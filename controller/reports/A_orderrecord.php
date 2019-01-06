<?php
class A_orderrecord extends CI_Controller {
	/* load model, libraries etc. */
	function __construct(){
    	parent::__construct();
		if($this->session->userdata('logged_in')){
			$this->load->model('admin/reports/M_orderrecord');
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
		$metadata["title"] = 'Order Record :: Metro Lifestyle';
		$dataarr['metadata'] = $metadata;

		$dataarr['orderrecordlist'] = $this->M_orderrecord->orderrecordlist();
//		$dataarr['item_list'] 		= $this->M_orderrecord->item_list();
		$this->load->view( 'admin/reports/order-record', $dataarr );
	} // End of function
}
?>