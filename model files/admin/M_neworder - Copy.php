<?php

class M_A_neworder extends CI_Model{
	
	public function storelist() {	
		$this -> db -> select('*');
		$this -> db -> from('storelist');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            return $query->result();
        }else{
			return false;
		}
    } // End of function

	public function cmb_product(){
		$this -> db -> select('productcode');
		$this -> db -> from('productinfo');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            return $query->result();
        }else{
			return false;
		}
	}
	public function get_productdetails($productcode){
		$this -> db -> select('*');
		$this -> db -> from('productinfo');
		$this -> db -> where('productcode = ' . "'" . $productcode . "'");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            return $query->row();
        }else{
			return false;
		}
	}
	public function get_customerphone($c_phone){
		$this -> db -> select('c_phone');
		$this -> db -> from('customer_info');
		$this -> db -> like('c_phone', $c_phone);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			//return $query->row();
            foreach ($query->result() as $row) {
                $data[] = $row->c_phone;
            }
            return $data;
        }
	}
	public function get_customerdetails($c_phone){
		$this -> db -> select('*');
		$this -> db -> from('customer_info');
		$this -> db -> where('c_phone = ' . "'" . $c_phone . "'");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->row();
        }
	}
	
	public function row_check($src) {
        $this -> db -> select('*');
		$this -> db -> from('productinfo');
		$this -> db -> where('productcode = ' . "'" . $src . "'");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    } // End of function
	
	
	public function getpid($productcode) {
		$pid = 0;
		$this -> db -> select('id');
		$this -> db -> from('productinfo');
		$this -> db -> where('productcode = ' . "'" . $productcode . "'");
		$query = $this->db->get();
		$row = $query->row();
		if (isset($row)){
        	$pid = $row->id;
		}	
		return $pid;
   	} // End of function
	public function getcid($c_ID) {
		$c_ID = 0;
		$this -> db -> select('id');
		$this -> db -> from('customer_info');
		$this -> db -> where('c_ID = ' . "'" . $c_ID . "'");
		$query = $this->db->get();
		$row = $query->row();
		if (isset($row)){
        	$c_ID = $row->id;
		}	
		return $c_ID;
   	} // End of function
	public function getcode() {
		
		$this -> db -> select('id');
		$this -> db -> from('customer_info');
		$this -> db -> limit(1);
		$query = $this->db->get();
		$row = $query->row();
		if (isset($row)){
        	$c_ID = $row->id;
		}	
		return $c_ID;
   	} // End of function
	public function customer_insert($data) {		
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->insert('customer_info', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;		
   	} // End of function
	public function sellsinfo_insert1($data) {		
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->insert('sells_info', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;		
   	} // End of function
	public function admindata_insert($data) {		
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->insert('admin_data', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;		
   	} // End of function
	public function productinfo_update1($data) {		
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->insert('productinfo', $data);
		$this -> db -> where('productcode = ' . "'" . $productcode . "'");
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;		
   	} // End of function
	public function sellsinfo_insert2($data) {		
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->insert('sells_info', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;		
   	} // End of function
	public function productinfo_update2($data) {		
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->insert('productinfo', $data);
		$this -> db -> where('productcode = ' . "'" . $productcode . "'");
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;		
   	} // End of function
}
?>