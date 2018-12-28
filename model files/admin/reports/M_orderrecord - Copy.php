<?php

class M_orderrecord extends CI_Model {
	public function orderrecordlist() {	
		$this -> db -> select('*') -> from('sales_info');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            return $query->result();
        }else{
			return false;
		}
        
    } // End of function
}
?>