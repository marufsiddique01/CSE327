<?php
class M_bills extends CI_Model{
	
/* ==================================================================================
	CONVINCE SETUP
================================================================================== */
	/* get convince code */
	public function convince_getcode() {
		$this->db->select('id');
		$this->db->from('convincebill_record');
		$this->db->limit(1);
		$this->db->order_by("id", "desc");
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
	/* insert convince record into table and creates last insert id */
	public function convince_insert($data) {
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->insert('convincebill_record', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;		
   	} // End of function
	/* update convince image by selecting id */
	public function convince_image($data,$id) {				
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->where('id', $id);
		$this->db->update('convincebill_record', $data);
		$this->db->trans_complete();
   	} // End of function
	/* get convince record list*/
	public function convince_list() {
		$this->db->select('
			c.id , c.convincecode , c.amount , c.preparedby , c.prepared_at , c.invoiceimage , c.remark , c.status , c.createdby , c.created_at , c.updatedby , c.updated_at , a.admincode, a.adminname
		');    
		$this->db->from('convincebill_record AS c');
		$this->db->join('admin_login AS a', 'c.createdby = a.id');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            return $query->result();
        }else{
			return false;
		}
    } // End of function
/* ==================================================================================
	PURCHASE SETUP
================================================================================== */
	/* get purchase code */
	public function purchase_getcode() {
		$this->db->select('id');
		$this->db->from('item_purchase_record');
		$this->db->limit(1);
		$this->db->order_by("id", "desc");
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
	/* insert purchase record into table and creates last insert id */
	public function purchase_insert($data) {
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->insert('item_purchase_record', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;		
   	} // End of function
	/* update purchase image by selecting id */
	public function purchase_image($data,$id) {				
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->where('id', $id);
		$this->db->update('item_purchase_record', $data);
		$this->db->trans_complete();
   	} // End of function
	/* get purchase record list*/
	public function purchase_list() {	
		$this->db->select('
			p.id, p.purchasecode, p.received_at, p.supplierid, p.itemid, p.quantity, p.totalcost, p.invoiceimage, p.status, p.purchasedby, p.purchase_at, p.receivedby, p.received_at, p.createdby, p.created_at, p.updatedby, p.updated_at, i.itemid, a.admincode, a.adminname
		');
		$this->db->from('item_purchase_record AS p');
		$this->db->join('item_info AS i', 'p.itemid = i.id');
		$this->db->join('admin_login AS a', 'p.createdby = a.id');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            return $query->result();
        }else{
			return false;
		}
    } // End of function
}
?>