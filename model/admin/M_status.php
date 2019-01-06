<?php
class M_status extends CI_Model{
/* ==================================================================================
	STATUS INSERT
================================================================================== */
	/* checks existing data */
	public function status_check($src) {
        $this -> db -> select('*');
		$this -> db -> from('status_info');
		$this -> db -> where('id = ' . "'" . $src . "'");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    } // End of function
	/* insert data into table */
	public function status_insert($data) {
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->insert('status_info', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;		
   	} // End of function
	/* get list data from table */
	public function status_list() {	
		$this -> db -> select('
			s.id , s.statustitle , s.createdby , s.created_at , s.updatedby , s.updated_at , a.admincode, a.adminname
		');
		$this -> db -> from('status_info AS s');
		$this -> db -> join('admin_login AS a', 's.createdby = a.id');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            return $query->result();
        }else{
			return false;
		}
    } // End of function
/* ==================================================================================
	DELIVERY STATUS
================================================================================== */
	/* checks existing data */
	public function deliverystatus_check($src) {
        $this -> db -> select('*');
		$this -> db -> from('delivery_status');
		$this -> db -> where('id = ' . "'" . $src . "'");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    } // End of function
	/* get list data from table */
	public function deliverystatus_list() {	
		$this -> db -> select('
			d.id , d.statustitle , d.createdby , d.created_at , d.updatedby , d.updated_at , a.admincode, a.adminname
		');
		$this -> db -> from('delivery_status AS d');
		$this -> db -> join('admin_login AS a', 'd.createdby = a.id');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            return $query->result();
        }else{
			return false;
		}
    } // End of function
}
?>