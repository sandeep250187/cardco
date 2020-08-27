<?php
class M_transfer extends CI_Model{
	 
	function allTransfersByDate()
	{
		$date=$this->input->post('serviceDate');
        $this->db->select('*');
		$this->db->from('tbl_penang_transfer_master');		
		if(!empty($date)){
			$this->db->where('validity >=',$date);
		}
		$this->db->where('status','1');
		$query=$this->db->get();
		return $query->result_array();
	}

	function allTransfersBySearch()
	{
		$pickup=$this->input->post('pickup');
        $this->db->select('*');
		$this->db->from('tbl_penang_transfer_master');		
		$this->db->like('transfer_name',$pickup, 'after');
		$this->db->where('status','1');		
		$query=$this->db->get();
		return $query->result_array();		
	}
 
}
?>
