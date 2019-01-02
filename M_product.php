<?php
class M_product extends CI_Model{
/* ==================================================================================
	PRODUCT LIST 
================================================================================== */		
	public function item_list() {	
		$this -> db -> select('
			sum(si.currentstock) as currentstock,
			ip.id as pid, ip.itemcode, ip.itemimage, ip.itemname, ip.sellprice, ii.createdby, ii.created_at, sti.storename, sta.statustitle 
		');
		$this -> db -> from('item_parent as ip');
		$this -> db -> join('item_info as ii', 'ip.id = ii.parentid', 'left');
		$this -> db -> join('stock_info as si', 'ii.id = si.itemid', 'left');
		$this -> db -> join('store_info as sti', 'ii.store = sti.id', 'left');
		$this -> db -> join('status_info as sta', 'ip.status = sta.id');
		$this -> db -> where('ip.status', '1');
		$this -> db -> group_by('pid');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
				$this -> db -> select('sizeshortcode, currentstock');
				$this -> db -> from('item_info as ii');
				$this -> db -> join('size_info as siz', 'siz.id = ii.size');
				$this -> db -> join('stock_info as si', 'ii.id = si.itemid');
				$this -> db -> where('ii.parentid', $row->pid);
				$query1 = $this->db->get();
				$data1 = array(
				'currentstock' 	=> $row->currentstock,
				'itemcode' 		=> $row->itemcode,
				'itemimage' 	=> $row->itemimage,
				'itemname' 		=> $row->itemname,
				'sellprice' 	=> $row->sellprice,
				'createdby' 	=> $row->createdby,
				'created_at' 	=> $row->created_at,
				'storename' 	=> $row->storename,
				'statustitle' 	=> $row->statustitle,
				'stock_info' 	=> $query1->result()
				);
				$data[] = $data1;
            }
            return $data;
        }
        return false;
    } // End of function
	public function cmb_product(){
		$this -> db -> select('id, itemcode, itemname');
		$this -> db -> from('item_parent');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            return $query->result();
        }else{
			return false;
		}
	}
	public function item_list_all() {	
		$this -> db -> select('
			sum(si.currentstock) as currentstock,
			ip.id as pid, ip.itemcode, ip.itemimage, ip.itemname, ip.sellprice, ii.createdby, ii.created_at, sti.storename, sta.statustitle 
		');
//		, ii.id as iid,ii.size, ii.color,, ii.updatedby, ii.updated_at, ii.itemid, ii.parentid,  ii.store, ii.status
		$this -> db -> from('item_parent as ip');
		$this -> db -> join('item_info as ii', 'ip.id = ii.parentid', 'left');
		$this -> db -> join('stock_info as si', 'ii.id = si.itemid', 'left');
		$this -> db -> join('store_info as sti', 'ii.store = sti.id', 'left');
		$this -> db -> join('status_info as sta', 'ip.status = sta.id');
		$this -> db -> group_by('pid');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
				$this -> db -> select('sizeshortcode, currentstock');
				$this -> db -> from('item_info as ii');
				$this -> db -> join('size_info as siz', 'siz.id = ii.size');
				$this -> db -> join('stock_info as si', 'ii.id = si.itemid');
//				$this -> db -> from('stock_info as si');
//				$this -> db -> join('item_info as ii', 'ii.id = si.itemid');
//				$this -> db -> join('item_parent as ip', 'ip.id = ii.parentid');
				$this -> db -> where('ii.parentid', $row->pid);
				$query1 = $this->db->get();
				$data1 = array(
//				'pdi' 	=> $row->pdi,
//				'iid' 			=> $row->iid,
//				'itemid' 		=> $row->itemid,
//				'parentid' 		=> $row->parentid,
//				'size' 			=> $row->size,
				'currentstock' 	=> $row->currentstock,
				'itemcode' 		=> $row->itemcode,
				'itemimage' 	=> $row->itemimage,
				'itemname' 		=> $row->itemname,
				'sellprice' 	=> $row->sellprice,
//				'color' 		=> $row->color,
//				'store' 		=> $row->store,
//				'status' 		=> $row->status,
				'createdby' 	=> $row->createdby,
				'created_at' 	=> $row->created_at,
//				'updatedby' 	=> $row->updatedby,
//				'updated_at' 	=> $row->updated_at,
				'storename' 	=> $row->storename,
				'statustitle' 	=> $row->statustitle,
				'stock_info' 	=> $query1->result()
				);
				$data[] = $data1;
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
		$this -> db-> from('item_parent');
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
		$this -> db -> from('item_parent');
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
	ITEM INSERT	:	PARENT DATA
================================================================================== */
	public function itemcode_check($src) {
        $this -> db -> select('*');
		$this -> db -> from('item_parent');
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
	public function product_insert($data) {
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->insert('item_parent', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;		
   	} // End of function
/* ==================================================================================
	ITEM INSERT	:	ITEM IMAGE  
================================================================================== */
	public function product_image_insert($data,$id) {				
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->where('id', $id);
		$this->db->update('item_parent', $data);
		$this->db->trans_complete();
   	} // End of function
/* ==================================================================================
	ITEM INSERT	:	ITEM INFO
================================================================================== */
	public function itemsize_check($src1, $src2) {
        $this -> db -> select('*');
		$this -> db -> from('item_info');
		$this -> db -> where('parentid = ' . "'" . $src1 . "'");
		$this -> db -> where('size = ' . "'" . $src2 . "'");
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
		$this->db->insert('item_info', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;		
   	} // End of function
	
	public function get_item_code() {
		$this -> db -> select('itemid');
		$this -> db -> from('item_info');
		$this -> db -> limit(1);
		$this -> db -> order_by("itemid", "desc");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            $row = $query->row();
			if (isset($row)){
				return $row->itemid;
			}
        }else{
			return 0;
		}
   	} // End of function
	
	public function itemsize_list() {	
		$this -> db -> select('
			i.id , i.itemid , i.size , i.status , i.createdby , i.created_at , i.updatedby , i.updated_at , ip.itemcode, s.sizeshortcode, a.admincode, a.adminname  
		');
		$this -> db -> from('item_info AS i');
		$this -> db -> join('size_info AS s', 'i.size = s.id');
		$this -> db -> join('item_parent AS ip', 'i.parentid = ip.id');
		$this -> db -> join('admin_login AS a', 'i.createdby = a.id');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            return $query->result();
        }else{
			return false;
		}
    } // End of function
/* ==================================================================================
	ITEM SETUP	:	MANUFACTURE COST
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
			m.id , m.itemid , m.itemrawcost , m.colorcost , m.brandingcost , m.additionalcost , m.shippingcost , m.itemcost , m.status , m.createdby , m.created_at , m.updatedby , m.updated_at , i.parentid, a.admincode, a.adminname, ip.itemcode, s.sizeshortcode, s.id
		');
		$this -> db -> from('item_manufacturecost AS m');
		$this -> db -> join('item_info AS i', 'm.itemid = i.id');
		$this -> db -> join('item_parent AS ip', 'i.parentid = ip.id');
		$this -> db -> join('size_info AS s', 'i.size = s.id');
		$this -> db -> join('admin_login AS a', 'm.createdby = a.id');
		$this -> db -> order_by("ip.itemcode");
		$this -> db -> order_by("s.id", "asc");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            return $query->result();
        }else{
			return false;
		}
    } // End of function
	
/* ==================================================================================
	ITEM SETUP	:	PURCHASE RECEIPT UPLOAD
================================================================================== */
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
	public function purchase_insert($data) {
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->insert('item_purchase_record', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;		
   	} // End of function
	public function purchase_receipt($data,$id) {				
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->where('id', $id);
		$this->db->update('item_purchase_record', $data);
		$this->db->trans_complete();
   	} // End of function
	
/* ==================================================================================
	STOCK UPDATE  
================================================================================== */
//	public function stock_update($stockdata,$id) {				
//        //Transfering data to Model
//		$this->db->trans_start();
//		$this->db->where('id', $id);
//		$this->db->update('stock_info', $stockdata);
//		$this->db->trans_complete();
//   	} // End of function
	public function stock_insert($stockdata) {
        //Transfering data to Model
		$this->db->trans_start();
		$this->db->insert('stock_info', $stockdata);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;		
   	} // End of function
	
/* ==================================================================================
	SEARCH PRODUCT BY ID FOR UPDATE  
================================================================================== */
	public function get_productdetails($editpdata){
		$editpdata = $_REQUEST[ 'editpdata' ];
		
		
		
		$this -> db -> select('
			sum(si.currentstock) as currentstock,
			ip.id as pid, ip.itemcode, ip.itemimage, ip.itemname, ip.sellprice, ip.remark, ii.createdby, ii.created_at, sti.storename, sta.statustitle, group_concat(siz.sizeshortcode) AS sizecode, group_concat(si.currentstock) AS stock, ip.store
		');
//		, ii.id as iid,ii.size, ii.color,, ii.updatedby, ii.updated_at, ii.itemid, ii.parentid,  ii.store, ii.status
		$this -> db -> from('item_parent as ip');
		$this -> db -> join('item_info as ii', 'ip.id = ii.parentid', 'left');
		$this -> db -> join('stock_info as si', 'ii.id = si.itemid', 'left');
		$this -> db -> join('store_info as sti', 'ii.store = sti.id', 'left');
		$this -> db -> join('size_info as siz', 'siz.id = ii.size', 'left');
		$this -> db -> join('status_info as sta', 'ip.status = sta.id');
		$this -> db -> where('itemcode = ' . "'" . $editpdata . "'");
		$this -> db -> group_by('pid');
		$query = $this->db->get();
		
		
		
		
		
		
//		$this -> db -> select('*');
//		$this -> db -> from('item_info');
//		$this -> db -> where('itemcode = ' . "'" . $editpdata . "'");
//		$query = $this->db->get();
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
//		$this->db->set('status', 'inactive');
		$this->db->where('itemcode', $deletepdata);
		$this->db->update('item_parent', $data);
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
			c.id , c.colorname , s.statustitle , c.createdby , c.created_at , c.updatedby , c.updated_at , a.admincode, a.adminname
		');
		$this -> db -> from('item_color AS c');
		$this -> db -> join('admin_login AS a', 'c.createdby = a.id');
		$this -> db -> join('status_info AS s', 'c.status = s.id');
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
			c.id , c.parentid , c.category , c.subcategory , c.displayorder , s.statustitle , c.createdby , c.created_at , c.updatedby , c.updated_at , a.admincode, a.adminname
		');
		$this -> db -> from('item_category AS c');
		$this -> db -> join('admin_login AS a', 'c.createdby = a.id');
		$this -> db -> join('status_info AS s', 'c.status = s.id');
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
			s.id , s.sizetitle , s.sizeshortcode , st.statustitle , s.createdby , s.created_at , s.updatedby , s.updated_at , a.admincode, a.adminname  
		');
		$this -> db -> from('size_info AS s');
		$this -> db -> join('admin_login AS a', 's.createdby = a.id');
		$this -> db -> join('status_info AS st', 's.status = st.id');
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
		$this -> db -> from('item_dimension');
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
		$this->db->insert('item_dimension', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;		
   	} // End of function
	
	public function dimension_list() {	
		$this -> db -> select('*');
		$this -> db -> from('item_dimension as d');
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