<?php
class M_dashboard extends CI_Model {

/* ==================================================================================
	PRODUCT CURRENT STOCK 
================================================================================== */
	/* get stock data */
	public function currentstock() {
		$this -> db -> select('
			sum(si.currentstock) as currentstock,
			ip.id, ip.itemcode, ip.itemimage, ip.itemname, ip.sellprice, ii.id, ii.itemid, ii.parentid, ii.size, ii.color, ii.store, ii.status, ii.createdby, ii.created_at, ii.updatedby, ii.updated_at
		');
		$this -> db -> from('item_parent as ip');
		$this -> db -> join('item_info as ii', 'ip.id = ii.parentid');
		$this -> db -> join('stock_info as si', 'ii.id = si.itemid');
		$query = $this->db->get();
		
		if ( $query->num_rows() ) {
			return $query->row()->currentstock;
		} else {
			return false;
		}
	} // End of function
/* ==================================================================================
	PRODUCT TOTAL SOLD QUANTITY 
================================================================================== */
	/* get total sold data */
	public function totalsold() {
		$this->db->select_sum('orderqty');
		$this->db->from('customer_record');
		$query = $this->db->get();
		
		if ( $query->num_rows() ) {
			return $query->row()->orderqty;
		} else {
			return false;
		}
	} // End of function
/* ==================================================================================
	TOTAL PRODUCT DESIGNS 
================================================================================== */
	/* get total design quatity data */
	public function designquantity() {
		$this->db->select('id');
		$this->db->from('item_parent'); 
		$query = $this->db->get(); 
		return $query->num_rows();
	} // End of function
/* ==================================================================================
	TOTAL SALES  REPORT 
================================================================================== */
	/* get total earning data */
	public function totalearnings() {
		$this->db->select_sum('pcost');
		$this->db->from('sales_info');
		$query = $this->db->get();
		if ( $query->num_rows() ) {
			return $query->row()->pcost;
		} else {
			return false;
		}
	} // End of function	
}
?>