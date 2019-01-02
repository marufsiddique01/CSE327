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

   	public function store_list() {	
		$this -> db -> select('
			s.id , s.storecode , s.storename , s.address , s.phone , s.email , s.contactpersonname , s.contactpersonphone ,  st.statustitle , s.createdby , s.created_at , s.updatedby , s.updated_at , a.admincode, a.adminname
		');
		$this -> db -> from('store_info s');
		$this -> db -> join('admin_login AS a', 's.createdby = a.id');
		$this -> db -> join('status_info AS st', 's.status = st.id');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            return $query->result();
        }else{
			return false;
		}
    } // End of function
}
?>