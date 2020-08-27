<?php
class M_tour extends CI_Model{
	 
	function findTours(){
		$is_logged_in_sup = $this->session->userdata('logged_in');
		$date=$this->input->post('from'); 
		$this->db->select('*');
	    $this->db->from('tbl_penang_tour_master');
		$this->db->where('validity >=',$date);
		$query = $this->db->get();
		$result= $query->result_array();
		 return $result; 
		 //print_r($result);
	}
	
	function allTours(){ 
		 $this->db->select('*');
	    $this->db->from('tbl_penang_tour_master');
		//$this->db->join('tbl_tourtariff_master','tbl_tourtariff_master.tid = tbl_tourname_master.id','left');
		//$this->db->group_by('tbl_tourname_master.id');
		$query = $this->db->get();
		$result= $query->result_array();
		 return $result;
	}
	
	function numOfTours($date=0){
		$this->db->select('*');
	    $this->db->from('tbl_penang_tour_master');
		//$this->db->join('tbl_tourtariff_master','tbl_tourtariff_master.tid = tbl_tourname_master.id','left');
		if(!empty($date)){
			$this->db->where('validity >=',$date);
		} 
		//$this->db->group_by('tbl_tourname_master.id');
		$query = $this->db->get();
		return $query->num_rows();
	  }
	
	function booktour($id){
		$date=$this->input->post('from'); 
		$this->db->select('*');
	    $this->db->from('tbl_tourtariff_master');
		$this->db->where('tid',$id);
		$query = $this->db->get();
	    $result= $query->result_array();
		 return $result; 
	}
	
	function searchprice($date){
		$this->db->select('*');
	    $this->db->from('tbl_tourtariff_master');
		$this->db->where('valid_from >=',$date);
		$this->db->order_by("room_price","asc");
		$query = $this->db->get();
		$result= $query->result_array();
		  return $result; 
	}
	
	function searchtour($query1){
		$this->db->select('*');
        $this->db->from("tbl_penang_tour_master");
		if($query1 != ''){
		    $this->db->like('tour_name',$query1);
		    $this->db->or_like('tour_code',$query1);
		 }
        $query= $this->db->get();	
		$result= $query->result_array();
		return $result; 
	}
	function get_tours($id,$nopax){
		$this->db->select('*');
		$this->db->from('tbl_penang_tour_master');
		$this->db->where('id',$id);
		$query= $this->db->get();
		return $query->result_array();
        
	}
 
}
?>
