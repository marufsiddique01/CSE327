<?php
class M_logos extends CI_Model{
	
/* ==================================================================================
	LOCKSCREEN LOGO
================================================================================== */
	/* insert data */
	public function lockscreen_image_insert($data) {
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->insert('lockscreen_logo', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;		
   	} // End of function
	/* insert image data */
	public function lockscreen_image($data,$id) {				
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->where('id', $id);
		$this->db->update('lockscreen_logo', $data);
		$this->db->trans_complete();
   	} // End of function
	/* get data from table */
	public function lockscreen_image_show() {	
		$this -> db -> select('l.lckimage, l.status, s.statustitle');
		$this -> db -> from('lockscreen_logo as l');
		$this -> db -> join('status_info as s', 'l.status = s.id');
		$this -> db -> where('l.status', '1');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            return $query->result_array();
        }else{
			return false;
		}
    } // End of function
	/* get list data */
	public function lockscreen_image_list() {	
		$this -> db -> select('l.id, l.name, l.lckimage, l.createdby, l.created_at , l.updatedby , l.updated_at , s.statustitle, a.admincode, a.adminname');
		$this -> db -> from('lockscreen_logo as l');
		$this -> db -> join('status_info as s', 'l.status = s.id');
		$this -> db -> join('admin_login AS a', 'l.createdby = a.id');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            return $query->result();
        }else{
			return false;
		}
    } // End of function
/* ==================================================================================
	COMPANY LOGO
================================================================================== */
	
}

?>