<?php
class A_logos extends CI_Controller {
	/* load model, libraries etc. */
	function __construct(){
    	parent::__construct();
		if($this->session->userdata('logged_in')){
			$this->load->model('admin/M_logos');
			$this->load->model('admin/M_common');
			$this->load->model('admin/M_status');
    	}else{
      		redirect('adminlogin', 'refresh');
		}
  	}
	
/* ==================================================================================
	CONVINCE SETUP
================================================================================== */
	/* store title in array and load view files with corresponding models */
	public function lockscreenlogo_list() {
		$dataarr = array();
		$metadata = array();
		$metadata = $this->M_common->session_info();
		$metadata["title"] = 'Lockscreen Logo List:: Metro Lifestyle';
		$dataarr['metadata'] = $metadata;
		
		$dataarr['lockscreen_image_list'] = $this->M_logos->lockscreen_image_list();
		$this->load->view( 'admin/setups/logo/lockscreen/list', $dataarr );
	} // End of function
	/* store title in array and load view files with corresponding models */
	public function lockscreenlogo_insert_index() {
		$dataarr = array();
		$metadata = array();
		$metadata = $this->M_common->session_info();
		$metadata["title"] = 'Lockscreen Logo Upload:: Metro Lifestyle';
		$dataarr['metadata'] = $metadata;
		
		$dataarr['status_list'] = $this->M_status->status_list();
		$this->load->view( 'admin/setups/logo/lockscreen/insert', $dataarr );
	} // End of function
	/* Recieves values from form data, post values in db table fields, checks for errors, store received form data to array, process image upload send those data to corresponding models and shows success or error messages*/
	public function lockscreenlogo_uploaded() {
		//Error initializing		
		$error='';$err=0;
		//Posting value
		$name 			= $this->input->post('name');
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
				'name' 			=> $name,
				'status' 		=> $status,
				'lckimage' 		=> '',
				'createdby' 	=> $createdby,
				'created_at' 	=> $created_at,
				'updatedby' 	=> $updatedby,
				'updated_at' 	=> $updated_at
				);
			$insert_id = $this->M_logos->lockscreen_image_insert($data);
			//............
			if($insert_id>0){
				// Image code
				$imgname = preg_replace("![^a-z0-9.]+!i", "-", strtolower($_FILES['lckimage']['name']));		
				$uploadfolder = './assets/admin/upload-images/setup/logos/lockscreen/';
				$bigimg = $insert_id.'_'.$imgname;					
				$file = $uploadfolder . $bigimg; 
				if (move_uploaded_file($_FILES['lckimage']['tmp_name'], $file)) {			  				
					$data = array(
						'lckimage' => $bigimg		
					);
					$this->M_logos->lockscreen_image($data,$insert_id);
				}
				//............
				$this->output
				->set_content_type('application/json')
				->set_output(json_encode(array('status' => 'success','message' => 'Logo insert successful')));
			}else{
				$this->output
        		->set_content_type('application/json')
        		->set_output(json_encode(array('status' => 'error','message' => 'No logo insert')));
			}
		}
	} // End of function
}
?>