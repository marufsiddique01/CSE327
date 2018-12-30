<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class D_login extends CI_Controller {
	
    function __construct(){
		parent::__construct();
		$this->load->model('admin/M_logos');
		//$this->load->model( 'deliveryportal/D_M_login' );
		// Load google oauth library
        $this->load->library('Google');
		// Load user model
		$this->load->model('deliveryportal/user');
    }
	
    public function index(){		
		$dataarr = array();
			$metadata = array();
			$metadata["title"] = 'Metro Soft :: Login';
			$dataarr['metadata'] = $metadata;

			$dataarr['lockscreen_image_show'] = $this->M_logos->lockscreen_image_show();
			//die();
			$this->load->view( 'deliveryportal/login', $dataarr );
			// Redirect to profile page if the user already logged in
			if($this->session->userdata('loggedIn') == true){
			//redirect('pro');
			redirect('profile');
		}
		
		if(isset($_GET['code'])){
			
			// Authenticate user with google
			if($this->google->getAuthenticate()){
			
				// Get user info from google
				$gpInfo = $this->google->getUserInfo();
				
				// Preparing data for database insertion
				$userData['oauth_provider'] = 'google';
				$userData['oauth_uid'] 		= $gpInfo['id'];
				$userData['first_name'] 	= $gpInfo['given_name'];
				$userData['last_name'] 		= $gpInfo['family_name'];
				$userData['email'] 			= $gpInfo['email'];
				$userData['gender'] 		= !empty($gpInfo['gender'])?$gpInfo['gender']:'';
				$userData['locale'] 		= !empty($gpInfo['locale'])?$gpInfo['locale']:'';
				$userData['link'] 			= !empty($gpInfo['link'])?$gpInfo['link']:'';
				$userData['picture'] 		= !empty($gpInfo['picture'])?$gpInfo['picture']:'';
				
				// Insert or update user data to the database
				$userID = $this->user->checkUser($userData);
				
				// Store the status and user profile info into session
				$this->session->set_userdata('loggedIn', true);
				$this->session->set_userdata('userData', $userData);
				
				// Redirect to profile page
				redirect('profile');
			}
		} 
		
		// Google authentication url
		$data['loginURL'] = $this->google->loginURL();
		
		// Load google login view
		$this->load->view('deliveryportal/login',$data);
    }
	
	public function profile(){
		// Redirect to login page if the user not logged in
		if(!$this->session->userdata('loggedIn')){
			redirect('deliverylogin');
		}
		
		// Get user info from session
		$data['userData'] = $this->session->userdata('userData');
		// Load user profile view
		$this->load->view('deliveryportal/profile',$data);
	}
	
	public function logout(){
		// Delete login status & user info from session
		$this->session->unset_userdata('loggedIn');
		$this->session->unset_userdata('userData');
        $this->session->sess_destroy();
		
		// Redirect to login page
		redirect('deliverylogin');
    }
}
?>