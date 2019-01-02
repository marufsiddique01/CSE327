<?php

class M_neworder extends CI_Model{
	
//	CUSTOMER CODES
	public function get_customerphone($phone){
		$this -> db -> select('phone');
		$this -> db -> from('customer_record');
		$this -> db -> like('phone', $phone);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			//return $query->row();
            foreach ($query->result() as $row) {
                $data[] = $row->phone;
            }
            return $data;
        }else{
			return 0;
		}
	} // End of function
	public function get_customerdetails($phone){
		$this -> db -> select('*');
		$this -> db -> from('customer_record');
		$this -> db -> where('phone = ' . "'" . $phone . "'");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->row();
        }
	} // End of function
	public function getcustomercode() {
		$this -> db -> select('customercode');
		$this -> db -> from('customer_record');
		$this -> db -> limit(1);
		$this -> db -> order_by("customercode", "desc");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            $row = $query->row();
			if (isset($row)){
				return $row->customercode;
			}
        }else{
			return 0;
		}
   	} // End of function
	public function customer_insert($data) {		
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->insert('customer_record', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;		
   	} // End of function
//	public function orderqty_update($data) {		
//        //Transfering data to Model
//		$this->db->trans_start();
//		$this->db->where('id', $id);
//		$this->db->update('customer_record', $data);
//		$this->db->trans_complete();
//   	} // End of function
	
//	END
	
//	PRODUCT CODES
	public function cmb_product(){
		$this -> db -> select('ip.id as pid, ip.itemcode as itemcode');
		$this -> db -> from('item_parent as ip');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            return $query->result();
        }else{
			return false;
		}
	} // End of function
	public function get_productdetails($itemcode){
		$this -> db -> select('ip.id as pid, ip.itemcode, ip.itemimage, ip.itemname, ip.sellprice, group_concat(siz.sizeshortcode) AS sizecode, group_concat(si.currentstock) AS stock, group_concat(ii.id) AS itemid, ip.store');
		$this -> db -> from('item_parent as ip');
		$this -> db -> join('item_info as ii', 'ip.id = ii.parentid', 'left');
		$this -> db -> join('stock_info as si', 'ii.id = si.itemid', 'left');
		$this -> db -> join('size_info as siz', 'siz.id = ii.size', 'left');
		$this -> db -> where('ip.id', $itemcode);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            return $query->row();
        }else{
			return false;
		}
	} // End of function
//	END
	
//	ORDER CODE
	public function getordercode() {
		$this -> db -> select('ordercode');
		$this -> db -> from('order_record');
		$this -> db -> limit(1);
		$this -> db -> order_by("ordercode", "desc");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            $row = $query->row();
			if (isset($row)){
				return $row->ordercode;
			}
        }else{
			return 0;
		}
   	} // End of function
	public function ordercode_insert($data) {		
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->insert('order_record', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;		
   	} // End of function
	public function orderinfo_insert($data) {		
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->insert('order_details', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;		
   	} // End of function
	
//	END

}
?>