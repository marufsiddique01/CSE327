<?php
class A_store extends CI_Controller {
	/* load model, libraries etc. */
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
/* ==================================================================================
	STORE INSERT
================================================================================== */
	/* store title in array and load view files with corresponding models */
	public function store_list() {
		$dataarr = array();
		$metadata = array();
		$metadata = $this->M_common->session_info();
		$metadata["title"] = 'Store List :: Metro Lifestyle';
		$dataarr['metadata'] = $metadata;
		
		$dataarr['store_list'] = $this->M_store->store_list();
		$dataarr['status_list'] = $this->M_status->status_list();
		$this->load->view( 'admin/stores/list', $dataarr );
	} // End of function
	/* store title in array and load view files with corresponding models */
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
	/* Recieves values from form data, post values in db table fields, checks for errors, store received form data to array, send those data to corresponding models and shows success or error messages*/
	public function store_uploaded() {
		//Error initializing		
		$error='';$err=0;
		//............
		//Posting value
		$storecode 			= $this->input->post('storecode');
		$storename 			= $this->input->post('storename');
		$address 			= $this->input->post('address');
		$phone 				= $this->input->post('phone');
		$email 				= $this->input->post('email');
		$contactpersonname 	= $this->input->post('contactpersonname');
		$contactpersonphone = $this->input->post('contactpersonphone');
		$status 			= $this->input->post('status');
		$createdby 			= $this->input->post('createdby');
		$created_at 		= $this->input->post('created_at');
		$updatedby 			= $this->input->post('updatedby');
		$updated_at 		= $this->input->post('updated_at');
		//............
		if($error!=''){
			$this->output
        		->set_content_type('application/json')
        		->set_output(json_encode(array('status' => 'error','message' => $error)));
		}else{
			//Setting values for tabel columns
			$last_id = $this->M_store->getcode();
			$last_id = '00000' . ( ( substr( $last_id, -5 ) * 1 ) + 1 );
			$storecode = 'STRID-' . substr( $last_id, -5 );
			$data = array(
				'storecode' 	=> $storecode,
				'storename' 	=> $storename,
				'address' 		=> $address,
				'phone' 		=> $phone,
				'email' 		=> $email,
				'contactpersonname' => $contactpersonname,
				'contactpersonphone'=> $contactpersonphone,
				'status' 		=> $status,
				'createdby' 	=> $createdby,
				'created_at' 	=> $created_at,
				'updatedby' 	=> $updatedby,
				'updated_at' 	=> $updated_at
			);
			$inser_id = $this->M_store->store_insert($data);
			//............
			if($inser_id>0){
				$this->output
				->set_content_type('application/json')
				->set_output(json_encode(array('status' => 'success','message' => 'Store insert successful')));
			}else{
				$this->output
        		->set_content_type('application/json')
        		->set_output(json_encode(array('status' => 'error','message' => 'No store insert')));
			}
		}
	} // End of function
}
?>