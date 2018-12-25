<?php
class A_bills extends CI_Controller {
	
	function __construct(){
    	parent::__construct();
		if($this->session->userdata('logged_in')){
			$this->load->model('admin/M_bills');
			$this->load->model('admin/M_common');
			$this->load->model('admin/M_supplier');
			$this->load->model('admin/M_status');
    	}else{
      		redirect('adminlogin', 'refresh');
		}
  	}
	
/* ==================================================================================
	CONVINCE SETUP
================================================================================== */
	/* store title in array and load view files with corresponding models */
	public function covince_list() {
		$dataarr = array();
		$metadata = array();
		$metadata = $this->M_common->session_info();
		$metadata["title"] = 'Convince Bills Record:: Metro Lifestyle';
		$dataarr['metadata'] = $metadata;
		
		$dataarr['convince_list'] = $this->M_bills->convince_list();
		$this->load->view( 'admin/empconvince/list', $dataarr );
	} // End of function
	/* store title in array and load view files with corresponding models */
	public function covince_insert_index() {
		$dataarr = array();
		$metadata = array();
		$metadata = $this->M_common->session_info();
		$metadata["title"] = 'Convince Bills Upload:: Metro Lifestyle';
		$dataarr['metadata'] = $metadata;
		
		$dataarr['convince_list'] 	= $this->M_bills->convince_list();
		$dataarr['status_list'] 	= $this->M_status->status_list();
		$this->load->view( 'admin/empconvince/insert', $dataarr );
	} // End of function
	/* Recieves values from form data, post values in db table fields, checks for errors, store received form data to array, send those data to corresponding models, creates custom unique code , process image upload and shows success or error messages*/
	public function covince_uploaded() {
		//Error initializing		
		$error='';$err=0;
		//Posting value
		$convincecode 	= $this->input->post('convincecode');
		$amount 		= $this->input->post('amount');
		$preparedby 	= $this->input->post('preparedby');
		$prepared_at 	= $this->input->post('prepared_at');
		$remark 		= $this->input->post('remark');
		$status 		= $this->input->post('status');
		$createdby 		= $this->input->post('createdby');
		$created_at 	= $this->input->post('created_at');
		$updatedby 		= $this->input->post('updatedby');
		$updated_at 	= $this->input->post('updated_at');
		//............
		if($error!=''){
			$this->output
        		->set_content_type('application/json')
        		->set_output(json_encode(array('status' => 'error','message' => $error)));
		}else{
			//Setting values for tabel columns
			$last_id = $this->M_bills->convince_getcode();
			$last_id = '000000' . ( ( substr( $last_id, -6 ) * 1 ) + 1 );
			$convincecode = 'CNVID-' . substr( $last_id, -6 );
			$data = array(
				'convincecode' 	=> $convincecode,
				'amount' 		=> $amount,
				'preparedby' 	=> $preparedby,
				'prepared_at' 	=> $prepared_at,
				'invoiceimage' 	=> '',
				'remark' 		=> $remark,
				'status' 		=> $status,
				'createdby' 	=> $createdby,
				'created_at' 	=> $created_at,
				'updatedby' 	=> $updatedby,
				'updated_at' 	=> $updated_at
				);
			$inser_id = $this->M_bills->convince_insert($data);
			//............
			if($inser_id>0){
				// Image code
				$imgname = preg_replace("![^a-z0-9.]+!i", "-", strtolower($_FILES['invoiceimage']['name']));		
				$uploadfolder = './assets/admin/upload-images/bills/convince-bills/';
				$bigimg = $inser_id.'_'.$imgname;					
				$file = $uploadfolder . $bigimg; 
				if (move_uploaded_file($_FILES['invoiceimage']['tmp_name'], $file)) {			  				
					$data = array(
						'invoiceimage' => $bigimg		
					);
					$this->M_bills->convince_image($data,$inser_id);
				}
				//............
				$this->output
				->set_content_type('application/json')
				->set_output(json_encode(array('status' => 'success','message' => 'Convince insert successful')));
			}else{
				$this->output
        		->set_content_type('application/json')
        		->set_output(json_encode(array('status' => 'error','message' => 'No convince insert')));
			}
		}
	} // End of function
/* ==================================================================================
	PURCHASE SETUP
================================================================================== */
	/* store title in array and load view files with corresponding models */
	public function purchase_list() {
		$dataarr = array();
		$metadata = array();
		$metadata = $this->M_common->session_info();
		$metadata["title"] = 'Purchase Bills Record:: Metro Lifestyle';
		$dataarr['metadata'] = $metadata;
		
		$dataarr['item_list'] 		= $this->M_common->item_list();
		$dataarr['supplier_list'] 	= $this->M_supplier->supplier_list();
		$dataarr['purchase_list'] 	= $this->M_bills->purchase_list();
		$this->load->view( 'admin/purchase/list', $dataarr );
	} // End of function
	/* store title in array and load view files with corresponding models */
	public function purchase_insert_index() {
		$dataarr = array();
		$metadata = array();
		$metadata = $this->M_common->session_info();
		$metadata["title"] = 'Purchase Bills Upload :: Metro Lifestyle';
		$dataarr['metadata'] = $metadata;
		
		$dataarr['item_list'] 		= $this->M_common->item_list();
		$dataarr['supplier_list'] 	= $this->M_supplier->supplier_list();
		$dataarr['purchase_list'] 	= $this->M_bills->purchase_list();
		$dataarr['status_list'] 	= $this->M_status->status_list();
		$this->load->view( 'admin/purchase/insert', $dataarr );
	} // End of function
	/* Recieves values from form data, post values in db table fields, checks for errors, store received form data to array, send those data to corresponding models, creates custom unique code , process image upload and shows success or error messages*/
	public function purchase_uploaded() {
		//Error initializing		
		$error='';$err=0;
		//Posting value
		$purchasecode 	= $this->input->post('purchasecode');
		$supplierid 	= $this->input->post('supplierid');
		$itemid 		= $this->input->post('itemid');
		$quantity 		= $this->input->post('quantity');
		$totalcost 		= $this->input->post('totalcost');
		$remark 		= $this->input->post('remark');
		$status 		= $this->input->post('status');
		$purchasedby 	= $this->input->post('purchasedby');
		$purchase_at 	= $this->input->post('purchase_at');
		$receivedby 	= $this->input->post('receivedby');
		$received_at 	= $this->input->post('received_at');
		$createdby 		= $this->input->post('createdby');
		$created_at 	= $this->input->post('created_at');
		$updatedby 		= $this->input->post('updatedby');
		$updated_at 	= $this->input->post('updated_at');
		//............
		if($error!=''){
			$this->output
        		->set_content_type('application/json')
        		->set_output(json_encode(array('status' => 'error','message' => $error)));
		}else{
			//Setting values for tabel columns
			$last_id = $this->M_bills->purchase_getcode();
			$last_id = '000000' . ( ( substr( $last_id, -6 ) * 1 ) + 1 );
			$purchasecode = 'PURID-' . substr( $last_id, -6 );
			$data = array(
				'purchasecode' 	=> $purchasecode,
				'supplierid' 	=> $supplierid,
				'itemid' 		=> $itemid,
				'quantity' 		=> $quantity,
				'totalcost' 	=> $totalcost,
				'invoiceimage' 	=> '',
				'remark' 		=> $remark,
				'status' 		=> $status,
				'purchasedby' 	=> $purchasedby,
				'purchase_at' 	=> $purchase_at,
				'receivedby' 	=> $receivedby,
				'received_at' 	=> $received_at,
				'createdby' 	=> $createdby,
				'created_at' 	=> $created_at,
				'updatedby' 	=> $updatedby,
				'updated_at' 	=> $updated_at
				);
			$insert_id = $this->M_bills->purchase_insert($data);
			//............
			if($insert_id>0){
				// Image code
				$imgname = preg_replace("![^a-z0-9.]+!i", "-", strtolower($_FILES['invoiceimage']['name']));		
				$uploadfolder = './assets/admin/upload-images/bills/purchase-bills/';
				$bigimg = $insert_id.'_'.$imgname;					
				$file = $uploadfolder . $bigimg; 
				if (move_uploaded_file($_FILES['invoiceimage']['tmp_name'], $file)) {			  				
					$data = array(
						'invoiceimage' => $bigimg		
					);
					$this->M_bills->purchase_image($data,$insert_id);
				}
				//............
				$this->output
				->set_content_type('application/json')
				->set_output(json_encode(array('status' => 'success','message' => 'Purchase insert successful')));
			}else{
				$this->output
        		->set_content_type('application/json')
        		->set_output(json_encode(array('status' => 'error','message' => 'No purchase insert')));
			}
		}
	} // End of function
}
?>