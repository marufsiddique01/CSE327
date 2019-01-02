<?php
class M_store extends CI_Model{
/* ==================================================================================
	STORE INSERT
================================================================================== */
	public function getcode() {
		$this -> db -> select('id');
		$this -> db -> from('store_info');
		$this -> db -> limit(1);
		$this -> db -> order_by("id", "desc");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            $row = $query->row();
			if (isset($row)){
				return $row->id;
			}
        }else{
			return 0;
		}
   	} // End of function
	
	public function store_insert($data) {
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->insert('store_info', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;		
   	} // End of function
   	}
?>