<?php

class M_customerrecord extends CI_Model{
	/* get list data */
	public function customerlist(){
		$this -> db -> select('*') -> from('customer_record');
		$query = $this -> db -> get();
		if ($query->num_rows() > 0) {
            return $query->result();
        }else{
			return false;
		}
	} // End of function
}

?>