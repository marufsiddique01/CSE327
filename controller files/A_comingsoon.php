<?php
class A_comingsoon extends CI_Controller {
	/* load model, libraries etc. */
	function __construct(){
    	parent::__construct();
		if($this->session->userdata('logged_in')){
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
		$metadata["title"] = 'Coming Soon :: Metro Lifestyle';
		$dataarr['metadata'] = $metadata;
		$this->load->view( 'admin/comingsoon', $dataarr );
	} // End of function
}
?>