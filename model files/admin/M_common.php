<?php
class M_common extends CI_Model {
/* ==================================================================================
	SESSION SETUP
================================================================================== */
	/* stores session data */
	public function session_info(){
		$session_data = $this->session->userdata('logged_in');
		$metadata = array();
		$metadata['id'] = $session_data['id'];
		$metadata['admincode'] = $session_data['admincode'];
		$metadata['adminname'] = $session_data['adminname'];
		$metadata['email'] = $session_data['email'];
		$metadata['phone'] = $session_data['phone'];
		$metadata['adminimage'] = $session_data['adminimage'];
		return $metadata;
	} // End of function
/* ==================================================================================
	LIST VIEWS
================================================================================== */
	/* get list data */
	public function admin_list() {	
		$this -> db -> select('*');
		$this -> db -> from('admin_login');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            return $query->result();
        }else{
			return false;
		}
    } // End of function
	/* get list data */
	public function item_list() {	
		$this -> db -> select('*');
		$this -> db -> from('item_parent');
		$this -> db -> where('status', '1');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    } // End of function
}
?>