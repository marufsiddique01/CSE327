<?php
class A_product extends CI_Controller {
	/* load model, libraries etc. */
	function __construct(){
    	parent::__construct();
		if($this->session->userdata('logged_in')){
			$this->load->model('admin/products/M_product');
			$this->load->model('admin/M_common');
			$this->load->model('admin/M_status');
			$this->load->model('admin/M_supplier');
			$this->load->model('admin/M_store');
    	}else{
      		redirect('adminlogin', 'refresh');
		}
  	}
/* ==================================================================================
	PRODUCT LIST 
================================================================================== */
	/* store title in array and load view files with corresponding models */	
	public function item_list(){
		$dataarr  = array();
		$metadata = array();
		$metadata = $this->M_common->session_info();
		$metadata["title"] 		= 'Product List :: Metro Lifestyle';
		$dataarr['metadata'] 	= $metadata;
		
		$dataarr['item_list'] 		= $this->M_product->item_list();
		$dataarr['item_list_all'] 	= $this->M_product->item_list_all();
//		print_r($this->M_product->item_size_stock_all());
		$this->load->view( 'admin/products/list', $dataarr );
	} // End of function
/* ==================================================================================
	PRODUCT REPORT 
================================================================================== */
	/* store title in array and load view files with corresponding models */	
	public function product_reports() {
		$dataarr  = array();
		$metadata = array();
		$metadata = $this->M_common->session_info();
		$metadata["title"] 		= 'Product Reports :: Metro Lifestyle';
		$dataarr['metadata'] 	= $metadata;

		$dataarr['productreports'] = $this->M_product->product_reports();
		$this->load->view( 'admin/products/reports/view-reports', $dataarr );
	} // End of function
/* ==================================================================================
	PRODUCT REPORT DETAILS  
================================================================================== */
	/* store title in array and load view files with corresponding models */
	public function product_report_details() {
		$dataarr  = array();
		$metadata = array();
		$metadata = $this->M_common->session_info();
		$metadata["title"] 		= 'Product Report Details :: Metro Lifestyle';
		$dataarr['metadata'] 	= $metadata;

		$dataarr['productreportdetails'] = $this->M_product->product_report_details();
		$this->load->view( 'admin/products/reports/report-details', $dataarr );
	} // End of function
/* ==================================================================================
	ITEM INSERT  
================================================================================== */
	/* store title in array and load view files with corresponding models */	
	public function insert_index() {
		$dataarr  = array();
		$metadata = array();
		$metadata = $this->M_common->session_info();
		$metadata["title"] 		= 'Add New Product :: Metro Lifestyle';
		$dataarr['metadata'] 	= $metadata;
		
		$dataarr['category_list'] 	= $this->M_product->category_list();
		$dataarr['store_list'] 		= $this->M_store->store_list();
		$dataarr['status_list'] 	= $this->M_product->status_list();
		$this->load->view( 'admin/products/insert_new', $dataarr );
	} // End of function
	/* Recieves values from form data, post values in db table fields, checks for errors, store received form data to array, send those data to corresponding models, creates custom unique code and shows success or error messages*/
	public function product_uploaded() {
		//Error initializing		
		$error='';$err=0;
		//............
		//Posting value
		$itemcode 		= $this->input->post('itemcode');
		$itemname 		= $this->input->post('itemname');
		$sellprice 		= $this->input->post('sellprice');
		$sellpriceold 	= $this->input->post('sellpriceold');
		$discountprice 	= $this->input->post('discountprice');
		$makingcost 	= $this->input->post('makingcost');
//		$currentstock 	= $this->input->post('currentstock');
		$category		= $this->input->post('category');
		$store			= $this->input->post('store');
		$remark 		= $this->input->post('remark');
		$status 		= $this->input->post('status');
		$createdby 		= $this->input->post('createdby');
		$created_at 	= $this->input->post('created_at');
		$updatedby 		= $this->input->post('updatedby');
		$updated_at 	= $this->input->post('updated_at');
		//............
		//Check Null or not
//		$sellprice 		= ($sellprice == '' ? 0 : $sellprice);
		//............
		
		//Check itemcode exists or not
		$checkdata["itemcode"] = $this->M_product->itemcode_check($itemcode);				
		if($checkdata["itemcode"]){ $err=1;}	
					
		if(empty($itemcode)) $error='Code Required !';
		else if($err==1) $error='Code already exists !';
		//............
		
		//Equations
//		$upload_stock 		= $currentstock + $upload_size;
		//............
		if($error!=''){
			$this->output
        		->set_content_type('application/json')
        		->set_output(json_encode(array('status' => 'error','message' => $error)));
		}else{
			 //$this->load->library('form_validation');
			$this->form_validation->set_rules('itemname','Name','required');
			$this->form_validation->set_rules('sellprice','Price','required');
			if($this->form_validation->run()==true){
			//Setting values for tabel columns
			$data = array(
				'itemcode' 		=> $itemcode,
				'itemname' 		=> $itemname,
				'sellprice' 	=> $sellprice,
				'sellpriceold' 	=> $sellprice,
				'discountprice' => $discountprice,
				'makingcost' 	=> $makingcost,
//				'currentstock' 	=> $currentstock,
				'category' 		=> $category,
				'store' 		=> $store,
				'itemimage' 	=> '',
				'remark' 		=> $remark,
				'status' 		=> $status,
				'createdby' 	=> $createdby,
				'created_at' 	=> $created_at,
				'updatedby' 	=> $updatedby,
				'updated_at' 	=> $updated_at
			);
			$insert_id = $this->M_product->product_insert($data);
			//............
			if($insert_id>0){
				// Image code
				$imgname = preg_replace("![^a-z0-9.]+!i", "-", strtolower($_FILES['itemimage']['name']));		
				$uploadfolder = './assets/admin/upload-images/item-photos/items/';
				$bigimg = $insert_id.'_'.$imgname;					
				$file = $uploadfolder . $bigimg; 
				if (move_uploaded_file($_FILES['itemimage']['tmp_name'], $file)) {			  				
					$data = array(
						'itemimage' => $bigimg		
					);
					$imgup = $this->M_product->product_image_insert($data,$insert_id);	
				}
				//............
				$this->output
				->set_content_type('application/json')
				->set_output(json_encode(array('status' => 'success','message' => 'Item insert successful')));
			}else{
				$this->output
				->set_content_type('application/json')
				->set_output(json_encode(array('status' => 'error','message' => 'No item insert')));
			}
			}
			else{
				$this->output
				->set_content_type('application/json')
				->set_output(json_encode(array('status' => 'fielderror','message' => 'All field required')));
			}
		}
	} // End of function
/* ==================================================================================
	ITEM INSERT	:	ITEM INFO
================================================================================== */
	/* store title in array and load view files with corresponding models */
	public function itemsize_index() {
		$dataarr  = array();
		$metadata = array();
		$metadata = $this->M_common->session_info();
		$metadata["title"] 		= 'Item Size :: Metro Lifestyle';
		$dataarr['metadata'] 	= $metadata;
		
		$dataarr['status_list'] 	= $this->M_status->status_list();
		$dataarr['size_list'] 		= $this->M_product->size_list();
		$dataarr['itemsize_list'] 	= $this->M_product->itemsize_list();
		$dataarr['item_list_all'] 	= $this->M_product->item_list();
		$this->load->view( 'admin/products/setup/itemsize-view', $dataarr );
	} // End of function
	/* Recieves values from form data, post values in db table fields, checks for errors, store received form data to array, send those data to corresponding models, creates custom unique code and shows success or error messages*/
	public function itemsize_upload() {
		$dataarr  = array();
		$metadata = array();
		$metadata = $this->M_common->session_info();
		$metadata["title"] 		= 'Item Size Upload :: Metro Lifestyle';
		$dataarr['metadata'] 	= $metadata;
		
		$dataarr['status_list'] 	= $this->M_status->status_list();
		$dataarr['size_list'] 		= $this->M_product->size_list();
		$dataarr['item_list_all'] 	= $this->M_product->item_list();
		$dataarr['cmb_product'] 	= $this->M_product->cmb_product();
		$dataarr['store_list'] 		= $this->M_store->store_list();
		$dataarr['color_list'] 		= $this->M_product->color_list();
		$dataarr['supplier_list'] 	= $this->M_supplier->supplier_list();
		$this->load->view( 'admin/products/setup/itemsize-new', $dataarr );
	} // End of function
	/* Recieves values from form data, post values in db table fields, checks for errors, store received form data to array, send those data to corresponding models, creates custom unique code and shows success or error messages*/
	/* This function post data in four tables at once */
	public function itemsize_uploaded() {
		//Error initializing		
		$error='';$err=0;
		//............
		//Posting value: Item Info
		$itemid		= $this->input->post('itemid');
		$parentid	= $this->input->post('parentid');
		$size 		= $this->input->post('size');
		$color 		= $this->input->post('color');
		$store 		= $this->input->post('store');
		$status 	= $this->input->post('status');
		$createdby 	= $this->input->post('createdby');
		$created_at = $this->input->post('created_at');
		$updatedby 	= $this->input->post('updatedby');
		$updated_at = $this->input->post('updated_at');
		
		//Posting value: Manufacture Cost
		$itemrawcost 	= $this->input->post('itemrawcost');
		$colorcost 		= $this->input->post('colorcost');
		$brandingcost 	= $this->input->post('brandingcost');
		$additionalcost = $this->input->post('additionalcost');
		$shippingcost 	= $this->input->post('shippingcost');
		$itemcost 		= $this->input->post('itemcost');
		
		//Posting value: Purchase 
		$quantity	 	= $this->input->post('quantity');
		$purchasecode 	= $this->input->post('purchasecode');
		$totalcost 		= $this->input->post('totalcost');
		$purchasedby 	= $this->input->post('purchasedby');
		$purchase_at 	= $this->input->post('purchase_at');
		$receivedby 	= $this->input->post('receivedby');
		$received_at 	= $this->input->post('received_at');
		$supplierid 	= $this->input->post('supplierid');
		$remark 		= $this->input->post('remark');
		
		// Posting Value: Stock
		$currentstock 	= $this->input->post('currentstock');
		$oldstock 		= $this->input->post('oldstock');
		$totalsold 		= $this->input->post('totalsold');
		//............
		//Check productcode exists or not
		$checkdata["check"] = $this->M_product->itemsize_check($parentid, $size);				
		if($checkdata["check"]){ $err=1;}	
		if($err==1) $error='Same item size already exists !';
		//............
//		if($quantity='null'){
//			$err=2;
//		}if($err==2) $error='Quantity required !';
		
		//Check Null or not
		$itemrawcost 	= ($itemrawcost == '' ? 0 : $itemrawcost);
		$colorcost 		= ($colorcost == '' ? 0 : $colorcost);
		$brandingcost 	= ($brandingcost == '' ? 0 : $brandingcost);
		$additionalcost = ($additionalcost == '' ? 0 : $additionalcost);
		$shippingcost 	= ($shippingcost == '' ? 0 : $shippingcost);
		
		//Equations
		$update_itemcost = $itemrawcost + $colorcost + $brandingcost + $additionalcost + $shippingcost;
		
		$update_totalcost = $quantity * $update_itemcost;
		
		if($error!=''){
			$this->output
        		->set_content_type('application/json')
        		->set_output(json_encode(array('status' => 'error','message' => $error)));
		}else{
			//Setting values for tabel columns
			// INFO SECTION STARTS //
			$last_itemid = $this->M_product->get_item_code($itemid);
			$last_itemid = '000000' . ( ( substr( $last_itemid, -6 ) * 1 ) + 1 );
			$itemid = 'ITMID-' . substr( $last_itemid, -6 );
			$data1 = array(
				'itemid' 	=> $itemid,
				'parentid' 	=> $parentid,
				'size' 		=> $size,
				'color' 	=> $color,
				'store' 	=> $store,
				'status' 	=> $status,
				'createdby' => $createdby,
				'created_at'=> $created_at,
				'updatedby' => $updatedby,
				'updated_at'=> $updated_at
				);
			$insert_id1 = $this->M_product->itemsize_insert($data1);
			// INFO SECTION ENDS //
			// MANUFACTURE SECTION STARTS //
			$data2 = array(
				'itemid' 		=> $insert_id1,
				'itemcost' 		=> $update_itemcost,
				'itemrawcost' 	=> $itemrawcost,
				'colorcost' 	=> $colorcost,
				'brandingcost' 	=> $brandingcost,
				'additionalcost'=> $additionalcost,
				'shippingcost' 	=> $shippingcost,
				'status' 		=> $status,
				'createdby' 	=> $createdby,
				'created_at'	=> $created_at,
				'updatedby' 	=> $updatedby,
				'updated_at'	=> $updated_at
				);
			$insert_id2 = $this->M_product->manufacturecost_insert($data2);
			// MANUFACTURE SECTION ENDS //
			// PURCHASE SECTION STARTS //
			$last_purchasecode = $this->M_product->purchase_getcode();
			$last_purchasecode = '000000' . ( ( substr( $last_purchasecode, -6 ) * 1 ) + 1 );
			$purchasecode = 'PURID-' . substr( $last_purchasecode, -6 );
			$data3 = array(
				'itemid' 		=> $insert_id1,
				'mfrid' 		=> $insert_id2,
				'purchasecode' 	=> $purchasecode,
				'supplierid' 	=> $supplierid,
				'quantity' 		=> $quantity,
				'totalcost' 	=> $update_totalcost,
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
			$insert_id3 = $this->M_product->purchase_insert($data3);
			if($insert_id3>0){
				// PURCHASE RECEIPT UPLOAD CODE
				$imgname = preg_replace("![^a-z0-9.]+!i", "-", strtolower($_FILES['invoiceimage']['name']));		
				$uploadfolder = './assets/admin/upload-images/bills/purchase-bills/';
				$bigimg = $insert_id3.'_'.$imgname;					
				$file = $uploadfolder . $bigimg; 
				if (move_uploaded_file($_FILES['invoiceimage']['tmp_name'], $file)) {			  				
					$data = array(
						'invoiceimage' => $bigimg		
					);
					$this->M_product->purchase_receipt($data, $insert_id3);
				}
				
				
				// STOCK SECTION STARTS
				
				$stockdata = array(
				'itemid' 		=> $insert_id1,
				'currentstock' 	=> $quantity,
				'oldstock' 		=> $quantity,
				'totalsold' 	=> $totalsold,
				'createdby' 	=> $createdby,
				'created_at' 	=> $created_at,
				'updatedby' 	=> $updatedby,
				'updated_at' 	=> $updated_at
				);
			$insert_id4 = $this->M_product->stock_insert($stockdata);
				
				// STOCK SECTION ENDS
			
			}
			// PURCHASE SECTION ENDS //
			//............
			if($insert_id1>0 AND $insert_id2>0 AND $insert_id3>0){
				$this->output
				->set_content_type('application/json')
				->set_output(json_encode(array('status' => 'success','message' => 'Item info insert successful')));
			}else{
				$this->output
        		->set_content_type('application/json')
        		->set_output(json_encode(array('status' => 'error','message' => 'No info insert')));
			}
		}
	} // End of function
/* ==================================================================================
	PRODUCT SETUP	:	MANUFACTURE COST
================================================================================== */
	/* store title in array and load view files with corresponding models */
	public function manufacturecost_index() {
		$dataarr  = array();
		$metadata = array();
		$metadata = $this->M_common->session_info();
		$metadata["title"] 		= 'Manufacture Cost Record :: Metro Lifestyle';
		$dataarr['metadata'] 	= $metadata;
		
		$dataarr['status_list'] = $this->M_status->status_list();
		$dataarr['manufacturecost_list'] = $this->M_product->manufacturecost_list();
		$dataarr['itemsize_list'] = $this->M_product->itemsize_list();
		$dataarr['item_list_all'] = $this->M_product->item_list();
		$dataarr['supplier_list'] = $this->M_supplier->supplier_list();
		$this->load->view( 'admin/products/setup/manufacturecost/list', $dataarr );
	} // End of function
	
/* ==================================================================================
	SEARCH PRODUCT BY ID FOR UPDATE  
================================================================================== */
	/* post data and load view files with corresponding models */
	public function product_details(){
		$editpdata = $this->input->post('editpdata');
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('status' => 'success','prodetails' => $this->M_product->get_productdetails($editpdata) )));
	} // End of function
/* ==================================================================================
	PRODUCT UPDATE	:	DATA
================================================================================== */
	/* store title in array and load view files with corresponding models */
	public function update_index() {
		$dataarr  = array();
		$metadata = array();
		$metadata = $this->M_common->session_info();
		$metadata["title"] 		= 'Product Update :: Metro Lifestyle';
		$dataarr['metadata'] 	= $metadata;

		$dataarr['storelist'] = $this->M_product->storelist();
		$this->load->view( 'admin/products/update', $dataarr );
	} // End of function
	/* Recieves values from form data, post values in db table fields, checks for errors, store received form data to array, send those data to corresponding models, creates custom unique code and shows success or error messages*/
	public function product_edited(){
		//Error initializing		
		$error='';$err=0;
		//Posting value
		$productcode 		= $this->input->post('productcode');
		$pname 				= $this->input->post('pname');
		$pstocklocation 	= $this->input->post('pstocklocation');
		$sellprice 			= $this->input->post('sellprice');
		$sizes 				= $this->input->post('sizes');
		$sizem 				= $this->input->post('sizem');
		$sizel 				= $this->input->post('sizel');
		$sizexl 			= $this->input->post('sizexl');
		$sizexxl 			= $this->input->post('sizexxl');
		$sizexxxl 			= $this->input->post('sizexxxl');
		$rawcost 			= $this->input->post('rawcost');
		$transportcost 		= $this->input->post('transportcost');
		$othercost 			= $this->input->post('othercost');
		$preceived 			= $this->input->post('preceived');
		$pstock 			= $this->input->post('pstock');
		$prestock 			= $this->input->post('prestock');
		$preceiveddate 		= $this->input->post('preceiveddate');
		$productcategory	= $this->input->post('productcategory');
		$premarks 			= $this->input->post('premarks');
		$totalsold 			= $this->input->post('totalsold');
		$sold_size 			= $this->input->post('sold_size');
		$sellpriceold 		= $this->input->post('sellpriceold');
		$psold 				= $this->input->post('psold');
		$prejected 			= $this->input->post('prejected');
		$preturned 			= $this->input->post('preturned');
		$restock_sizes 		= $this->input->post('restock_sizes');
		$restock_sizem 		= $this->input->post('restock_sizem');
		$restock_sizel 		= $this->input->post('restock_sizel');
		$restock_sizexl 	= $this->input->post('restock_sizexl');
		$restock_sizexxl	= $this->input->post('restock_sizexxl');
		$restock_sizexxxl	= $this->input->post('restock_sizexxxl');
		$rejected_sizes 	= $this->input->post('rejected_sizes');
		$rejected_sizem 	= $this->input->post('rejected_sizem');
		$rejected_sizel 	= $this->input->post('rejected_sizel');
		$rejected_sizexl	= $this->input->post('rejected_sizexl');
		$rejected_sizexxl 	= $this->input->post('rejected_sizexxl');
		$rejected_sizexxxl 	= $this->input->post('rejected_sizexxxl');
		$restock_size 		= $this->input->post('restock_size');
		$return_size 		= $this->input->post('return_size');
		$discount_price 	= $this->input->post('discount_price');
		$increase_price 	= $this->input->post('increase_price');
		$updatedby 			= $this->input->post('updatedby');
		$remark 			= $this->input->post('remark');
		$status 			= $this->input->post('status');
		$createdby 			= $this->input->post('createdby');
		$created_at 		= $this->input->post('created_at');
		$updatedby 			= $this->input->post('updatedby');
		$updated_at 		= $this->input->post('updated_at');
		
		//Check Null or not
		$discount_price 	= ($discount_price == '' ? 0 : $discount_price);
		$increase_price 	= ($increase_price == '' ? 0 : $increase_price);
		$restock_sizes 		= ($restock_sizes == '' ? 0 : $restock_sizes);
		$restock_sizem 		= ($restock_sizem == '' ? 0 : $restock_sizem);
		$restock_sizel 		= ($restock_sizel == '' ? 0 : $restock_sizel);
		$restock_sizexl 	= ($restock_sizexl == '' ? 0 : $restock_sizexl);
		$restock_sizexxl	= ($restock_sizexxl == '' ? 0 : $restock_sizexxl);
		$restock_sizexxxl	= ($restock_sizexxxl == '' ? 0 : $restock_sizexxxl);
		$rejected_sizes 	= ($rejected_sizes == '' ? 0 : $rejected_sizes);
		$rejected_sizem 	= ($rejected_sizem == '' ? 0 : $rejected_sizem);
		$rejected_sizel 	= ($rejected_sizel == '' ? 0 : $rejected_sizel);
		$rejected_sizexl	= ($rejected_sizexl == '' ? 0 : $rejected_sizexl);
		$rejected_sizexxl 	= ($rejected_sizexxl == '' ? 0 : $rejected_sizexxl);
		$rejected_sizexxxl 	= ($rejected_sizexxxl == '' ? 0 : $rejected_sizexxxl);
		
		//Equations
		$restock_size 		= ( $restock_sizes + $restock_sizem + $restock_sizel + $restock_sizexl + $restock_sizexxl + $restock_sizexxxl );
		
		$rejected_size 		= ( $rejected_sizes + $rejected_sizem + $rejected_sizel + $rejected_sizexl + $rejected_sizexxl + $rejected_sizexxxl );
		
		$update_stock 		= $pstock + $return_size + $restock_size - $rejected_size;
		$update_totalsold 	= $totalsold - $return_size;
		$update_restock 	= $prestock + $restock_size;
		$update_return 		= $preturned + $return_size;
		$update_rejected 	= $prejected + $rejected_size;
		$update_price 		= ( $sellpriceold - $discount_price ) + $increase_price;
		$update_preceived 	= $preceived + $restock_size;

		$update_sizes 		= $sizes + $restock_sizes - $rejected_sizes;
		$update_sizem 		= $sizem + $restock_sizem - $rejected_sizem;
		$update_sizel 		= $sizel + $restock_sizel - $rejected_sizel;
		$update_sizexl 		= $sizexl + $restock_sizexl - $rejected_sizexl;
		$update_sizexxl		= $sizexxl + $restock_sizexxl - $rejected_sizexxl;
		$update_sizexxxl	= $sizexxxl + $restock_sizexxxl - $rejected_sizexxxl;
		
		if($error!=''){
			$this->output
        		->set_content_type('application/json')
        		->set_output(json_encode(array('status' => 'error','message' => $error)));
		}else{
			//Setting values for tabel columns
			$data = array(
				'productcode' 	=>$productcode,
				'pname' 		=>$pname,
				'sellpriceold' 	=>$update_price,
				'preceived' 	=>$update_preceived,
				'pstock' 		=>$update_stock,
				'psold' 		=>$psold,
				'prejected' 	=>$update_rejected,
				'preturned' 	=>$update_return,
				'pstocklocation'=>$pstocklocation,
				'prestock' 		=>$update_restock,
				'premarks' 		=>$premarks,
				'preceiveddate' =>$preceiveddate,
				'sizes' 		=>$update_sizes,
				'sizem' 		=>$update_sizem,
				'sizel' 		=>$update_sizel,
				'sizexl' 		=>$update_sizexl,
				'sizexxl' 		=>$update_sizexxl,
				'sizexxxl' 		=>$update_sizexxxl,
				'totalsold' 	=>$update_totalsold,
				'discount_price'=>$discount_price,
				'increase_price'=>$increase_price,
				'updatedby' 	=>$updatedby,
				'rawcost' 		=>$rawcost,
				'transportcost' =>$transportcost,
				'othercost' 	=>$othercost,
				'productcategory'=>$productcategory,
				'remark' 		=> $remark,
				'status' 		=> $status,
				'createdby' 	=> $createdby,
				'created_at' 	=> $created_at,
				'updatedby' 	=> $updatedby,
				'updated_at' 	=> $updated_at
			);
			$this->M_product->product_update($data,$productcode);	
			
			if($this){
				$this->output
				->set_content_type('application/json')
				->set_output(json_encode(array('status' => 'success','message' => 'Product update successful')));
			}else{
				$this->output
        		->set_content_type('application/json')
        		->set_output(json_encode(array('status' => 'error','message' => 'No product updated')));
			}
		}
	} // End of function
/* ==================================================================================
	PRODUCT STATUS CHANGE to INACTIVE
================================================================================== */
	/* Recieves values from form data, post values in db table fields, store received form data to array, send those data to corresponding models, creates custom unique code and shows success or error messages*/
	public function product_inactive() {
		$deletepdata 	= $this->input->post('deletepdata');
		$status 		= $this->input->post('status');
		
		$data = array(
			'status' => $status
			);
		
		$query = $this->M_product->status_update($data,$deletepdata);	
		if($query == 0){
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode(array('status' => 'success','message' => 'Product has been inactivated')));
		}else{
			$this->output
        		->set_content_type('application/json')
        		->set_output(json_encode(array('status' => 'error','message' => 'Error! No product inactivated')));
		}
	} // End of function
/* ==================================================================================
	PRODUCT SETUP	:	COLOR
================================================================================== */
	/* store title in array and load view files with corresponding models */
	public function color_list() {
		$dataarr  = array();
		$metadata = array();
		$metadata = $this->M_common->session_info();
		$metadata["title"] 		= 'Color View :: Metro Lifestyle';
		$dataarr['metadata'] 	= $metadata;
		
		$dataarr['status_list'] = $this->M_status->status_list();
		$dataarr['colorlist'] 	= $this->M_product->color_list();
		$this->load->view( 'admin/products/setup/color/list', $dataarr );
	} // End of function
	/* store title in array and load view files with corresponding models */
	public function color_insert_index() {
		$dataarr  = array();
		$metadata = array();
		$metadata = $this->M_common->session_info();
		$metadata["title"] 		= 'Color Upload :: Metro Lifestyle';
		$dataarr['metadata'] 	= $metadata;
		
		$dataarr['status_list'] = $this->M_status->status_list();
		$dataarr['colorlist'] 	= $this->M_product->color_list();
		$this->load->view( 'admin/products/setup/color/insert', $dataarr );
	} // End of function
	/* Recieves values from form data, post values in db table fields, checks for errors, store received form data to array, send those data to corresponding models, creates custom unique code and shows success or error messages*/
	public function color_uploaded() {
		//Error initializing		
		$error='';$err=0;
		//............
		//Posting value
		$colorname 		= $this->input->post('colorname');
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
			$data = array(
				'colorname' 	=> $colorname,
				'status' 		=> $status,
				'createdby' 	=> $createdby,
				'created_at' 	=> $created_at,
				'updatedby' 	=> $updatedby,
				'updated_at' 	=> $updated_at
				);
			$inser_id = $this->M_product->color_insert($data);
			//............
			if($inser_id>0){
				$this->output
				->set_content_type('application/json')
				->set_output(json_encode(array('status' => 'success','message' => 'Color insert successful')));
			}else{
				$this->output
        		->set_content_type('application/json')
        		->set_output(json_encode(array('status' => 'error','message' => 'No color insert')));
			}
		}
	} // End of function
/* ==================================================================================
	PRODUCT SETUP	:	CATEGORY
================================================================================== */
	/* store title in array and load view files with corresponding models */
	public function category_list() {
		$dataarr  = array();
		$metadata = array();
		$metadata = $this->M_common->session_info();
		$metadata["title"] 		= 'Category List :: Metro Lifestyle';
		$dataarr['metadata'] 	= $metadata;
		
		$dataarr['status_list'] 	= $this->M_status->status_list();
		$dataarr['categorylist'] 	= $this->M_product->category_list();
		$this->load->view( 'admin/products/setup/category/list', $dataarr );
	} // End of function
	/* store title in array and load view files with corresponding models */
	public function category_insert_index() {
		$dataarr  = array();
		$metadata = array();
		$metadata = $this->M_common->session_info();
		$metadata["title"] 		= 'Category Upload :: Metro Lifestyle';
		$dataarr['metadata'] 	= $metadata;
		
		$dataarr['status_list'] = $this->M_status->status_list();
		$dataarr['categorylist'] = $this->M_product->category_list();
		$this->load->view( 'admin/products/setup/category/insert', $dataarr );
	} // End of function
	/* Recieves values from form data, post values in db table fields, checks for errors, store received form data to array, send those data to corresponding models, creates custom unique code and shows success or error messages*/
	public function category_uploaded() {
		//Error initializing		
		$error='';$err=0;
		//............
		//Posting value
		$category 		= $this->input->post('category');
		$subcategory 	= $this->input->post('subcategory');
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
			$data = array(
				'category' 		=> $category,
				'subcategory' 	=> $subcategory,
				'status' 		=> $status,
				'createdby' 	=> $createdby,
				'created_at' 	=> $created_at,
				'updatedby' 	=> $updatedby,
				'updated_at' 	=> $updated_at
				);
			$inser_id = $this->M_product->category_insert($data);
			//............
			if($inser_id>0){
				$this->output
				->set_content_type('application/json')
				->set_output(json_encode(array('status' => 'success','message' => 'Category insert successful')));
			}else{
				$this->output
        		->set_content_type('application/json')
        		->set_output(json_encode(array('status' => 'error','message' => 'No category insert')));
			}
		}
	} // End of function
/* ==================================================================================
	PRODUCT SETUP	:	SIZE CODE
================================================================================== */
	/* store title in array and load view files with corresponding models */
	public function sizecode_list() {
		$dataarr  = array();
		$metadata = array();
		$metadata = $this->M_common->session_info();
		$metadata["title"] 		= 'Size Code List :: Metro Lifestyle';
		$dataarr['metadata'] 	= $metadata;
		
		$dataarr['status_list'] = $this->M_status->status_list();
		$dataarr['size_list'] 	= $this->M_product->size_list();
		$this->load->view( 'admin/products/setup/size/sizecode/list', $dataarr );
	} // End of function
	/* store title in array and load view files with corresponding models */
	public function sizecode_insert_index() {
		$dataarr  = array();
		$metadata = array();
		$metadata = $this->M_common->session_info();
		$metadata["title"] 		= 'Size Code Upload :: Metro Lifestyle';
		$dataarr['metadata'] 	= $metadata;
		
		$dataarr['status_list'] = $this->M_status->status_list();
		$dataarr['size_list'] 	= $this->M_product->size_list();
		$this->load->view( 'admin/products/setup/size/sizecode/insert', $dataarr );
	} // End of function
	/* Recieves values from form data, post values in db table fields, checks for errors, store received form data to array, send those data to corresponding models, creates custom unique code and shows success or error messages*/
	public function sizecode_uploaded() {
		//Error initializing		
		$error='';$err=0;
		//............
		//Posting value
		$sizetitle		= $this->input->post('sizetitle');
		$sizeshortcode 	= $this->input->post('sizeshortcode');
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
			$data = array(
				'sizetitle' 	=> $sizetitle,
				'sizeshortcode' => $sizeshortcode,
				'status' 		=> $status,
				'createdby' 	=> $createdby,
				'created_at' 	=> $created_at,
				'updatedby' 	=> $updatedby,
				'updated_at' 	=> $updated_at
				);
			$inser_id = $this->M_product->size_insert($data);
			//............
			if($inser_id>0){
				$this->output
				->set_content_type('application/json')
				->set_output(json_encode(array('status' => 'success','message' => 'Size code insert successful')));
			}else{
				$this->output
        		->set_content_type('application/json')
        		->set_output(json_encode(array('status' => 'error','message' => 'No size code insert')));
			}
		}
	} // End of function
/* ==================================================================================
	PRODUCT SETUP	:	SIZE DIMENSION
================================================================================== */
	/* store title in array and load view files with corresponding models */
	public function dimension_list() {
		$dataarr  = array();
		$metadata = array();
		$metadata = $this->M_common->session_info();
		$metadata["title"] 		= 'Size Dimension List :: Metro Lifestyle';
		$dataarr['metadata'] 	= $metadata;
		
		$dataarr['categorylist'] 	= $this->M_product->category_list();
		$dataarr['sizelist'] 		= $this->M_product->size_list();
		$dataarr['dimensionlist'] 	= $this->M_product->dimension_list();
		$this->load->view( 'admin/products/setup/size/sizedimension/list', $dataarr );
	} // End of function
	/* store title in array and load view files with corresponding models */
	public function dimension_insert_index() {
		$dataarr  = array();
		$metadata = array();
		$metadata = $this->M_common->session_info();
		$metadata["title"] 		= 'Size Dimension Upload :: Metro Lifestyle';
		$dataarr['metadata'] 	= $metadata;
		
		$dataarr['categorylist'] 	= $this->M_product->category_list();
		$dataarr['sizelist'] 		= $this->M_product->size_list();
		$dataarr['dimensionlist'] 	= $this->M_product->dimension_list();
		$this->load->view( 'admin/products/setup/size/sizedimension/insert', $dataarr );
	} // End of function
	/* Recieves values from form data, post values in db table fields, checks for errors, store received form data to array, send those data to corresponding models, creates custom unique code and shows success or error messages*/
	public function dimension_uploaded() {
		//Error initializing		
		$error='';$err=0;
		//............
		//Posting value
		$size_id 		= $this->input->post('size_id');
		$category_id_1 	= $this->input->post('category_id_1');
		$category_id_2 	= $this->input->post('category_id_2');
		$body_length 	= $this->input->post('body_length');
		$shoulder_width = $this->input->post('shoulder_width');
		$body_width 	= $this->input->post('body_width');
		$createdby 		= $this->input->post('createdby');
		$created_at 	= $this->input->post('created_at');
		//............
		if($error!=''){
			$this->output
        		->set_content_type('application/json')
        		->set_output(json_encode(array('status' => 'error','message' => $error)));
		}else{
			//Setting values for tabel columns
			$data = array(
				'size_id' 		=> $size_id,
				'category_id_1' => $category_id_1,
				'category_id_2' => $category_id_2,
				'body_length' 	=> $body_length,
				'shoulder_width'=> $shoulder_width,
				'body_width' 	=> $body_width,
				'createdby' 	=> $createdby,
				'created_at' 	=> $created_at
				);
			$inser_id = $this->M_product->dimension_insert($data);
			//............
			if($inser_id>0){
				$this->output
				->set_content_type('application/json')
				->set_output(json_encode(array('status' => 'success','message' => 'Size dimension insert successful')));
			}else{
				$this->output
        		->set_content_type('application/json')
        		->set_output(json_encode(array('status' => 'error','message' => 'No size dimension insert')));
			}
		}
	} // End of function

}
?>