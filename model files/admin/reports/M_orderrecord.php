<?php
class M_orderrecord extends CI_Model {
	/* get list data */
	public function orderrecordlist() {	
		$this->db->select('
		or.id as oid, or.ordercode as ordercode, or.customerid, or.created_at, od.orderid, od.itempid, od.quantity, cr.id, cr.phone, cr.address, cr.customername, ip.itemcode, si.sizeshortcode, if.itemid as productitemcode, od.itemid, sum(od.totalprice) as finalprice,
		');
		$this->db->from('order_record as or');
		$this->db->join('order_details as od', 'od.orderid = or.id', 'left');
		$this->db->join('customer_record as cr', 'cr.id = or.customerid');
		$this->db->join('item_parent as ip', 'ip.id = od.itempid');
		$this->db->join('item_info as if', 'if.id = od.itemid');
		$this->db->join('size_info as si', 'si.id = if.size');
		$this -> db -> group_by('ordercode');
		
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
				$this -> db -> select('if.itemid, si.sizeshortcode, od.quantity');
				$this -> db -> from('order_details as od');
				$this->db->join('order_record as or', 'od.orderid = or.id');
				$this -> db -> join('item_info as if', 'if.id = od.itemid');
				$this->db->join('size_info as si', 'si.id = if.size');
				$this -> db -> where('or.ordercode', $row->ordercode);
				$query1 = $this->db->get();
				$data1 = array(
				'oid' 			=> $row->oid,
				'ordercode' 	=> $row->ordercode,
				'customerid' 	=> $row->customerid,
				'created_at' 	=> $row->created_at,
				'orderid' 		=> $row->orderid,
				'itempid' 		=> $row->itempid,
				'quantity' 		=> $row->quantity,
				'finalprice' 	=> $row->finalprice,
				'phone' 		=> $row->phone,
				'address' 		=> $row->address,
				'customername' 	=> $row->customername,
				'itemcode' 		=> $row->itemcode,
				'sizeshortcode'	=> $row->sizeshortcode,
				'itemid' 		=> $row->itemid,
				'item_info' 	=> $query1->result()
				);
				$data[] = $data1;
            }
            return $data;
        }
        return false;
    } // End of function
}
?>