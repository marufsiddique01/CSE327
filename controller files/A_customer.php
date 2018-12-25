<?php
class A_customer extends CI_Controller {
	/* load model, libraries etc. */
	function __construct(){
    	parent::__construct();
		if($this->session->userdata('logged_in')){
			$this->load->model('admin/M_neworder');
			$this->load->model('admin/M_common');
    	}else{
      		redirect('adminlogin', 'refresh');
		}
  	} // End of function
	/* store title in array and load view files with corresponding models */
	public function index(){
		//Error initializing		
		$error=''; $err=0;
		$customercode 	= $this->input->post('customercode');
		$customername	= $this->input->post('customername');
		$phone 			= $this->input->post('phone');
		$address 		= $this->input->post('address');
		$fbid 			= $this->input->post('fbid');
		$email			= $this->input->post('email');
		$orderqty		= $this->input->post('orderqty');
		if($error!=''){
			$this->output
        		->set_content_type('application/json')
        		->set_output(json_encode(array('status' => 'error','message' => $error)));
		}else{
			//Setting values for tabel columns
			$data = array(
				'customername' 		=> $customername,
				'phone' 		=> $phone,
				'address' 	=> $address,
				'fbid' 		=> $fbid,
				'email'		=> $email,
				'orderqty'	=> $orderqty
				);
				$last_id = $this->M_neworder->getcode();
				$last_id = '00000' . ( ( substr( $last_id, -5 ) * 1 ) + 1 );
				$customercode = 'MLCID-' . substr( $last_id, -5 );
				$data1 = array(
					'customercode' 	=> $customercode,
					'phone' 		=> $phone,
					'customername' 		=> $customername,
					'phone' 		=> $phone,
					'address' 	=> $address,
					'fbid' 		=> $fbid,
					'email'		=> $email,
					'orderqty'	=> $orderqty
				);
				$inser_id = $this->M_neworder->customer_insert($data, $data1);
				//............
				if($inser_id>0){
					$this->output
					->set_content_type('application/json')
					->set_output(json_encode(array('status' => 'success','message' => 'Test code insert successful')));
				}else{
					$this->output
					->set_content_type('application/json')
					->set_output(json_encode(array('status' => 'error','message' => 'No test code insert')));
				}
		}
	} // End of function
}
?>