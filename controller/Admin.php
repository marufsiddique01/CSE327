<?php
class Admin extends CI_Controller {
	/* load model, libraries etc. */
	function __construct(){
    	parent::__construct();
		$this->load->model('admin/M_dashboard');
		$this->load->model('admin/M_common');
		$this->load->model('admin/products/M_product');
  	}
	/* store title in array and load view files with corresponding models */
	public function index() {
		if($this->session->userdata('logged_in')){
			$dataarr = array();
			$metadata = array();
			$metadata = $this->M_common->session_info();
			$metadata["title"] = 'Dashboard :: Metro Lifestyle';
			$dataarr['metadata'] = $metadata;
			
			$dataarr['currentstock'] = $this->M_dashboard->currentstock();
			$dataarr['totalsold'] = $this->M_dashboard->totalsold();
			$dataarr['designquantity'] = $this->M_dashboard->designquantity();
			$dataarr['totalearnings'] = $this->M_dashboard->totalearnings();
			$dataarr['item_list'] = $this->M_product->item_list();
			
    		$this->load->view( 'admin/index', $dataarr );
    	}else{
      		//If no session, redirect to login page
      		redirect('adminlogin', 'refresh');
		}
	} // End of function
}
?>