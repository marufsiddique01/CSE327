<?php

class A_login extends CI_Controller {
	/* load model, libraries etc. */
	function __construct(){
    	parent::__construct();
		$this->load->model('admin/M_logos');
		$this->load->model('admin/M_login');
  	} // End of function
	/* store title in array and load view files with corresponding models */
	public function index() {
		$dataarr = array();
		$metadata = array();
		$metadata["title"] 		= 'Metro Lifestyle :: Login';
		$dataarr['metadata'] 	= $metadata;
		
		$dataarr['lockscreen_image_show'] = $this->M_logos->lockscreen_image_show();
		$this->load->view('admin/login', $dataarr );
	} // End of function
	/* validate the login form, check login data in db
		if data matches then creates session and redirects to dashboard.
		if not matches then show errors.*/
	public function login_verify(){
		$this->form_validation->set_rules('useremail','Email','required');
		$this->form_validation->set_rules('password','Password','required|max_length[12]');

		if ( $this->form_validation->run() ){
			$useremail 	= $this->input->post('useremail');
			$password 	= $this->input->post('password');
			$password 	= md5($password);

			$result = $this->M_login->login($useremail,$password);
			
			if($result){		
				$sess_array = array();
				foreach($result as $row){
					$sess_array = array(
						'id' 		=> $row->id,
						'admincode' => $row->admincode,
						'adminname' => $row->adminname,
						'email' 	=> $row->email,
						'phone' 	=> $row->phone,
						'adminimage'=> $row->adminimage
					);
					$this->session->set_userdata('logged_in',$sess_array);
				}
				return redirect('dashboard');
			}else {
				redirect('adminlogin','refresh');
			}
		} else {
			$this->load->view('Admin/login');
		}
	} // End of function
	/* destroy session and redirect to login page */
	public function admin_logout(){
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('admin','refresh');
	} // End of function
}
?>