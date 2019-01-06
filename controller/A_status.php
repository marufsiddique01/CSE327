<?php
class A_status extends CI_Controller {
	/* load model, libraries etc. */
	function __construct(){
    	parent::__construct();
		if($this->session->userdata('logged_in')){
			$this->load->model('admin/M_status');
			$this->load->model('admin/M_common');
    	}else{
      		redirect('adminlogin', 'refresh');
		}
  	}
/* ==================================================================================
	STATUS INSERT
================================================================================== */
	/* store title in array and load view files with corresponding models */
	public function status_list() {
		$dataarr = array();
		$metadata = array();
		$metadata = $this->M_common->session_info();
		$metadata["title"] = 'Status List :: Metro Lifestyle';
		$dataarr['metadata'] = $metadata;
		
		$dataarr['status_list'] = $this->M_status->status_list();
		$this->load->view( 'admin/setups/status/list', $dataarr );
	} // End of function
	/* store title in array and load view files with corresponding models */
	public function status_insert_index() {
		$dataarr = array();
		$metadata = array();
		$metadata = $this->M_common->session_info();
		$metadata["title"] = 'Status Upload :: Metro Lifestyle';
		$dataarr['metadata'] = $metadata;
		
		$this->load->view( 'admin/setups/status/insert', $dataarr );
	} // End of function
	/* Recieves values from form data, post values in db table fields, checks for errors, store received form data to array, send those data to corresponding models and shows success or error messages*/
	public function status_uploaded() {
		//Error initializing		
		$error='';$err=0;
		//............
		//Posting value
		$statustitle 	= $this->input->post('statustitle');
		$createdby 		= $this->input->post('createdby');
		$updatedby 		= $this->input->post('updatedby');
		$created_at 	= $this->input->post('created_at');
		$updated_at 	= $this->input->post('updated_at');
		//............
		if($error!=''){
			$this->output
        		->set_content_type('application/json')
        		->set_output(json_encode(array('status' => 'error','message' => $error)));
		}else{
			//Setting values for tabel columns
			$data = array(
				'statustitle' 	=> $statustitle,
				'createdby' 	=> $createdby,
				'updatedby' 	=> $updatedby,
				'created_at' 	=> $created_at,
				'updated_at' 	=> $updated_at
				);
			$inser_id = $this->M_status->status_insert($data);
			//............
			if($inser_id>0){
				$this->output
				->set_content_type('application/json')
				->set_output(json_encode(array('status' => 'success','message' => 'Status insert successful')));
			}else{
				$this->output
        		->set_content_type('application/json')
        		->set_output(json_encode(array('status' => 'error','message' => 'No status insert')));
			}
		}
	} // End of function
	/* ==================================================================================
		DELIVERY STATUS 
	================================================================================== */
	/* store title in array and load view files with corresponding models */
	public function deliverystatus_list() {
		$dataarr = array();
		$metadata = array();
		$metadata = $this->M_common->session_info();
		$metadata["title"] = 'Delivery Status List :: Metro Lifestyle';
		$dataarr['metadata'] = $metadata;
		
		$dataarr['deliverystatus_list'] = $this->M_status->deliverystatus_list();
		$this->load->view( 'admin/setups/status/list', $dataarr );
	} // End of function
}
?>