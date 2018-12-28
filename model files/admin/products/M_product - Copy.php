<?php
class M_product extends CI_Model{
/* ==================================================================================
	PRODUCT LIST 
================================================================================== */		
	public function item_list() {	
		$this -> db -> select('*');
		$this -> db -> from('item_info');
		$this -> db -> where('status', 'active');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    } // End of function
	public function item_list_all() {	
		$this -> db -> select('*');
		$this -> db -> from('item_info');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    } // End of function
/* ==================================================================================
	PRODUCT REPORT 
================================================================================== */
	public function product_reports(){
		$this -> db -> select('*');
		$this -> db-> from('item_info');
		$query = $this -> db -> get();
		if ($query -> num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	} // End of function
/* ==================================================================================
	PRODUCT REPORT DETAILS  
================================================================================== */
	public function product_report_details(){
		$id = $_REQUEST[ 'id' ];
		$this -> db -> select('*'); 
		$this -> db -> from('item_info');
		$this -> db -> where('itemcode = "'.$id.'"');
		$query = $this -> db -> get();
		if ($query -> num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	} // End of function
/* ==================================================================================
	STORE SEARCH  
================================================================================== */
	public function storelist() {	
		$this -> db -> select('*');
		$this -> db -> from('store_info');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            return $query->result();
        }else{
			return false;
		}
    } // End of function
/* ==================================================================================
	CATEGORY SEARCH  
================================================================================== */
	public function categorylist() {	
		$this -> db -> select('*');
		$this -> db -> from('item_category');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            return $query->result();
        }else{
			return false;
		}
    } // End of function
/* ==================================================================================
	STATUS SEARCH  
================================================================================== */
	public function status_list() {	
		$this -> db -> select('*');
		$this -> db -> from('status_info');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            return $query->result();
        }else{
			return false;
		}
    } // End of function
/* ==================================================================================
	PRODUCT CODE CHECK  
================================================================================== */
	public function productcode_check($src) {
        $this -> db -> select('*');
		$this -> db -> from('item_info');
		$this -> db -> where('itemcode = ' . "'" . $src . "'");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    } // End of function
/* ==================================================================================
	PRODUCT INSERT	:	DATA
================================================================================== */
	public function getcid($id) {
		$id = 0;
		$this -> db -> select('id');
		$this -> db -> from('item_info');
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
	public function getcode() {
		$this -> db -> select('itemcode');
		$this -> db -> from('item_info');
		$this -> db -> limit(1);
		$this -> db -> order_by("itemcode", "desc");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            $row = $query->row();
			if (isset($row)){
				return $row->itemcode;
			}
        }else{
			return 0;
		}
   	} // End of function

	public function get_item_code($itemcode){
		$this -> db -> select('itemcode');
		$this -> db -> from('item_info');
		$this -> db -> like('itemcode', $itemcode);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			//return $query->row();
            foreach ($query->result() as $row) {
                $data[] = $row->itemcode;
            }
            return $data;
        }
	}
	public function get_item_details($itemcode){
		$this -> db -> select('*');
		$this -> db -> from('item_info');
		$this -> db -> where('itemcode = ' . "'" . $itemcode . "'");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->row();
        }
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function product_insert($data) {
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->insert('item_info', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;		
   	} // End of function
/* ==================================================================================
	PRODUCT INSERT	:	IMAGE  
================================================================================== */
	public function product_image_insert($data,$id) {				
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->where('id', $id);
		$this->db->update('item_info', $data);
		$this->db->trans_complete();
   	} // End of function
/* ==================================================================================
	SEARCH PRODUCT BY ID FOR UPDATE  
================================================================================== */
	public function get_productdetails($editpdata){
		$editpdata = $_REQUEST[ 'editpdata' ];
		$this -> db -> select('*');
		$this -> db -> from('item_info');
		$this -> db -> where('itemcode = ' . "'" . $editpdata . "'");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            return $query->row();
        }else{
			return false;
		}
	} // End of function
/* ==================================================================================
	PRODUCT UPDATE	:	DATA
================================================================================== */
	public function product_update($data,$productcode) {				
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->where('itemcode', $productcode);
		$this->db->update('item_info', $data);
		$this->db->trans_complete();
   	} // End of function
/* ==================================================================================
	PRODUCT STATUS CHANGE to INACTIVE
================================================================================== */
	public function status_update($data,$deletepdata) {				
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->set('status', 'inactive');
		$this->db->where('itemcode', $deletepdata);
		$this->db->update('item_info', $data);
		$this->db->trans_complete();
   	} // End of function
/* ==================================================================================
	PRODUCT SETUP	:	COLOR
================================================================================== */
	public function color_insert($data) {
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->insert('item_color', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;		
   	} // End of function
	
	public function color_list() {	
		$this -> db -> select('
			c.id , c.colorname , c.status , c.createdby , c.created_at , c.updatedby , c.updated_at , a.admincode, a.adminname
		');
		$this -> db -> from('item_color AS c');
		$this -> db -> join('admin_login AS a', 'c.createdby = a.id');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            return $query->result();
        }else{
			return false;
		}
    } // End of function
/* ==================================================================================
	PRODUCT SETUP	:	CATEGORY
================================================================================== */
	public function category_insert($data) {
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->insert('item_category', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;		
   	} // End of function
	
	public function category_list() {	
		$this -> db -> select('
			c.id , c.parentid , c.category , c.subcategory , c.displayorder , c.status , c.createdby , c.created_at , c.updatedby , c.updated_at , a.admincode, a.adminname
		');
		$this -> db -> from('item_category AS c');
		$this -> db -> join('admin_login AS a', 'c.createdby = a.id');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            return $query->result();
        }else{
			return false;
		}
    } // End of function
/* ==================================================================================
	PRODUCT SETUP	:	SIZE CODE
================================================================================== */
	public function size_check($src) {
        $this -> db -> select('*');
		$this -> db -> from('size_info');
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
	
	public function size_insert($data) {
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->insert('size_info', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;		
   	} // End of function
	
	public function size_list() {	
		$this -> db -> select('
			s.id , s.sizetitle , s.sizeshortcode , s.status , s.createdby , s.created_at , s.updatedby , s.updated_at , a.admincode, a.adminname  
		');
		$this -> db -> from('size_info AS s');
		$this -> db -> join('admin_login AS a', 's.createdby = a.id');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            return $query->result();
        }else{
			return false;
		}
    } // End of function
/* ==================================================================================
	PRODUCT SETUP	:	ITEM SIZE
================================================================================== */
	public function itemsize_check($src1, $src2) {
        $this -> db -> select('*');
		$this -> db -> from('item_size');
		$this -> db -> where('itemid = ' . "'" . $src1 . "'");
		$this -> db -> where('sizeid = ' . "'" . $src2 . "'");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    } // End of function
	
	public function itemsize_insert($data) {
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->insert('item_size', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;		
   	} // End of function
	
	public function itemsize_list() {	
		$this -> db -> select('
			is.id , is.itemid , is.sizeid , is.quantity , is.status , is.createdby , is.created_at , is.updatedby , is.updated_at , ii.itemcode, s.sizeshortcode, a.admincode, a.adminname  
		');
		$this -> db -> from('item_size AS is');
		$this -> db -> join('size_info AS s', 'is.sizeid = s.id');
		$this -> db -> join('item_info AS ii', 'is.itemid = ii.id');
		$this -> db -> join('admin_login AS a', 'is.createdby = a.id');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            return $query->result();
        }else{
			return false;
		}
    } // End of function
/* ==================================================================================
	PRODUCT SETUP	:	SIZE DIMENSION
================================================================================== */
	public function dimension_check($src) {
        $this -> db -> select('*');
		$this -> db -> from('product_size_dimension');
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
	
	public function dimension_insert($data) {
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->insert('product_size_dimension', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;		
   	} // End of function
	
	public function dimension_list() {	
		$this -> db -> select('*');
		$this -> db -> from('product_size_dimension');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            return $query->result();
        }else{
			return false;
		}
    } // End of function
/* ==================================================================================
	PRODUCT SETUP	:	MANUFACTURE COST
================================================================================== */
	public function manufacturecost_insert($data) {
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->insert('item_manufacturecost', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;		
   	} // End of function
	
	public function manufacturecost_list() {	
		$this -> db -> select('
			m.id , m.itemid , m.supplierid , m.itemrawcost , m.colorcost , m.brandingcost , m.additionalcost , m.shippingcost , m.totalcost , m.purchasedby , m.receivedby , m.purchase_at , m.receive_at , m.remarks , m.status , m.createdby , m.created_at , m.updatedby , m.updated_at , i.itemcode, s.suppliername, a.admincode, a.adminname
		');
		$this -> db -> from('item_manufacturecost AS m');
		$this -> db -> join('item_info AS i', 'm.itemid = i.id');
		$this -> db -> join('supplier_info AS s', 'm.supplierid = s.id');
		$this -> db -> join('admin_login AS a', 'm.createdby = a.id');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            return $query->result();
        }else{
			return false;
		}
    } // End of function
}
?>