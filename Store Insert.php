<?php
class A_store extends CI_Controller {
	
	function __construct(){
    	parent::__construct();
		if($this->session->userdata('logged_in')){
			$this->load->model('admin/M_store');
			$this->load->model('admin/M_status');
			$this->load->model('admin/M_common');
    	}else{
      		redirect('adminlogin', 'refresh');
		}
  	}

public function store_insert_index() {
		$dataarr  = array();
		$metadata = array();
		$metadata = $this->M_common->session_info();
		$metadata["title"] 		= 'Store Upload :: Metro Lifestyle';
		$dataarr['metadata'] 	= $metadata;
		
		$dataarr['store_list']  = $this->M_store->store_list();
		$dataarr['status_list'] = $this->M_status->status_list();
		$this->load->view( 'admin/stores/insert', $dataarr );
	} // End of function