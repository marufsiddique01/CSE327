<?php
class A_supplier extends CI_Controller {
	/* load model, libraries etc. */
	function __construct(){
    	parent::__construct();
		if($this->session->userdata('logged_in')){
			$this->load->model('admin/M_supplier');
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
	public function supplier_list() {
		$dataarr = array();
		$metadata = array();
		$metadata = $this->M_common->session_info();
		$metadata["title"] = 'Supplier List :: Metro Lifestyle';
		$dataarr['metadata'] = $metadata;
		
		$dataarr['supplier_list'] = $this->M_supplier->supplier_list();
		$dataarr['status_list'] = $this->M_status->status_list();
		$this->load->view( 'admin/suppliers/list', $dataarr );
	} // End of function
	/* store title in array and load view files with corresponding models */
	public function supplier_insert_index() {
		$dataarr = array();
		$metadata = array();
		$metadata = $this->M_common->session_info();
		$metadata["title"] = 'Supplier Upload :: Metro Lifestyle';
		$dataarr['metadata'] = $metadata;
		
		$dataarr['supplier_list'] = $this->M_supplier->supplier_list();
		$dataarr['status_list'] = $this->M_status->status_list();
		$this->load->view( 'admin/suppliers/insert', $dataarr );
	} // End of function
	/* Recieves values from form data, post values in db table fields, checks for errors, store received form data to array, send those data to corresponding models, creates custom unique code and shows success or error messages*/
	public function supplier_uploaded() {
		//Error initializing		
		$error='';$err=0;
		//............
		//Posting value
		$suppliercode 		= $this->input->post('suppliercode');
		$suppliername 		= $this->input->post('suppliername');
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
			$last_id = $this->M_supplier->getcode();
			$last_id = '00000' . ( ( substr( $last_id, -5 ) * 1 ) + 1 );
			$suppliercode = 'SUPID-' . substr( $last_id, -5 );
			$data = array(
				'suppliercode' 	=> $suppliercode,
				'suppliername' 	=> $suppliername,
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
			$inser_id = $this->M_supplier->supplier_insert($data);
			//............
			if($inser_id>0){
				$this->output
				->set_content_type('application/json')
				->set_output(json_encode(array('status' => 'success','message' => 'Supplier insert successful')));
			}else{
				$this->output
        		->set_content_type('application/json')
        		->set_output(json_encode(array('status' => 'error','message' => 'No supplier insert')));
			}
		}
	} // End of function
}
?>