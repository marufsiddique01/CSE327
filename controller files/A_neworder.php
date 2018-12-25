<?php
class A_neworder extends CI_Controller{
	/* load model, libraries etc. */
	function __construct(){
    	parent::__construct();
		if($this->session->userdata('logged_in')){
			$this->load->model('admin/M_neworder');
			$this->load->model('admin/products/M_product');
			$this->load->model('admin/M_common');
			$this->load->model('admin/M_status');
			$this->load->model('admin/M_supplier');
			$this->load->model('admin/M_store');
    	}else{
      		redirect('adminlogin','refresh');
		}
  	} // End of function
	/* store title in array and load view files with corresponding models */
	public function index(){
		$dataarr = array();
		$metadata = array();
		$metadata = $this->M_common->session_info();
		$metadata["title"] = 'Add New Order :: Metro Lifestyle';
		$dataarr['metadata'] = $metadata;
		
		$dataarr['store_list'] = $this->M_store->store_list();
		$dataarr['status_list'] = $this->M_status->status_list();
		$dataarr['deliverystatus_list'] = $this->M_status->deliverystatus_list();
		$dataarr['cmbproduct'] = $this->M_neworder->cmb_product();  //cmb = combo box
		$this->load->view('admin/order-place-new',$dataarr);
	} // End of function
	/* Recieves values from form data, post values in db table fields, send those data to corresponding models*/
	public function customer_phone()
    {
		$phone = $this->input->post('phone');
		echo json_encode($this->M_neworder->get_customerphone($phone));
	} // End of function
	/* Recieves values from form data, post values in db table fields, send those data to corresponding models and shows success or error message*/
	public function customer_details()
    {
		$phone = strip_tags($this->input->post('phone'));
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('status'=>'success','customerdetails'=>$this->M_neworder->get_customerdetails($phone))));
	} // End of function
	/* Recieves values from form data, post values in db table fields, send those data to corresponding models and shows success or error message*/
	public function product_details(){
		$itemcode = $this->input->post('itemcode');
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('status'=>'success','prodetails'=>$this->M_neworder->get_productdetails($itemcode))));
	} // End of function
	/* Recieves values from form data, post values in db table fields, checks for errors, store received form data to array, send those data to corresponding models, creates custom unique code and shows success or error messages*/
	/* This function post data in two tables at once */
	public function order_received(){
		//Error initializing		
		$error='';$err=0;
		
		$postdata = json_decode($this->input->post('datalist'), true);
		$postdata = array_shift($postdata);
		
		//Posting value
		//Common record starts
		$createdby 	= $postdata['createdby'];
		//Common record ends
		$id 			= $postdata['id'];
		$customercode 	= $postdata['customercode'];
		$customername 	= $postdata['customername'];
		$phone 			= $postdata['phone'];
		$address 		= $postdata['address'];
		$fbid 			= $postdata['fbid'];
		$email			= $postdata['email'];
		$orderqty		= $postdata['orderqty'];
 		$status 		= $postdata['status'];
		$deliverystatus = $postdata['deliverystatus'];
		$sellprice 		= $postdata['sellprice'];	
		$itemcode 		= $postdata['itemcode'];
		$remark 		= $postdata['remark'];
		$orderdate 		= $postdata['orderdate'];
		
//		Check Null or not
		$orderqty 		= ($orderqty == '' ? 0 : $orderqty);
		
//		EQUATIONS
		$updateorderqty = $orderqty + '1';
		// if customer code is not found do this
		if(empty($customercode)){
			$last_id = $this->M_neworder->getcustomercode();
			$last_id = '00000'.((substr($last_id,-5)*1)+1);
			$customercode = 'MLCID-'.substr($last_id,-5);
			$data1 = array(
				'customercode' 	=> $customercode,
				'phone' 		=> $phone,
				'customername' 	=> $customername,
				'phone' 		=> $phone,
				'address' 		=> $address,
				'fbid' 			=> $fbid,
				'email'			=> $email,
				'orderqty'		=> $updateorderqty,
				'createdby' 	=> $createdby
			);
			$insert_id1 = $this->M_neworder->customer_insert($data1);
		}
		// if customer code is found do this
		elseif(!empty($customercode)){	
			$insert_id1 = $id;
		}
		
		$last_oid = $this->M_neworder->getordercode();
		$last_oid = '0000000'.((substr($last_oid,-7)*1)+1);
		$ordercode = 'ORDID-'.substr($last_oid,-7);
		
		$insertcode = array(
			'ordercode' 	=> $ordercode,
			'customerid' 	=> $insert_id1,
			'remark' 		=> $remark,
			'deliveryon' 	=> $orderdate,
			'status' 		=> $status,
			'deliverystatus'=> $deliverystatus,
			'createdby' 	=> $createdby
		);
		$insert_id2 = $this->M_neworder->ordercode_insert($insertcode);
		
		foreach ($postdata['detailstabledata'] as $rows) {	
			
			$ordertotalprice = $sellprice*$rows['Quantity'];			
			$orderdata = array(
                'orderid' 		=> $insert_id2,
				'itempid' 		=> $itemcode,
				'itemid' 		=> $rows['ItemId'],
				'quantity' 		=> $rows['Quantity'],
				'totalprice'	=> $ordertotalprice,
				'createdby' 	=> $createdby
			);
			$this->M_neworder->orderinfo_insert($orderdata);
		}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('status'=>'success','message'=>'Order insert successful')));
	} // End of function
}
?>