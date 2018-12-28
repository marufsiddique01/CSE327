<?php
class D_M_login extends CI_Model {
	public function login($useremail, $password){
		$this -> db -> select('id, admincode, adminname, email, phone, adminimage');
		$this -> db -> from('admin_login');
		$this -> db -> where('email = ' . "'" . $useremail . "'"); 
		$this -> db -> where('password = ' . "'" . $password . "'"); 
		$this -> db -> limit(1);
		$query = $this -> db -> get();
		if($query -> num_rows() == 1){
			return $query->result();
		}else{
			return false;
		}
	}// end of function
}
?>