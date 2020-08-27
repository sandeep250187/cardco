<?php
class M_ticket extends CI_Model{
	 
	 public function get_ticket($id)
	 {
		 $this->db->select('*');
		 $this->db->from('tbl_tickets');
		 $this->db->where('id',$id);
		 $this->db->where('session_id',session_id());
		 $query=$this->db->get();
		 return $query->result_array();
	 }
  
	 
}
?>
