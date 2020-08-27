<?php
class M_hotels extends CI_Model{
	 
	function findHotel(){
		 //$is_logged_in_sup = $this->session->userdata('logged_in');
		$date=$this->input->post('from'); 
		$this->db->select('tbl_hoteltariff.*,tbl_hotelmaster.*');
	    $this->db->from('tbl_hotelmaster');
		$this->db->join('tbl_hoteltariff','tbl_hoteltariff.hotel_id = tbl_hotelmaster.id','left');
		$this->db->where('tbl_hoteltariff.valid_from >=',$date);
		$this->db->group_by('tbl_hotelmaster.id');
		$query = $this->db->get();
		$result= $query->result_array();
		 return $result; 
	}
	
	function allHotel(){
		 $this->db->select('tbl_hoteltariff.*,tbl_hotelmaster.*');
	    $this->db->from('tbl_hotelmaster');
		$this->db->join('tbl_hoteltariff','tbl_hoteltariff.hotel_id = tbl_hotelmaster.id','left');
		$this->db->group_by('tbl_hotelmaster.id');
		$query = $this->db->get();
		$result= $query->result_array();
		 return $result;
	}
	
	function numOfHotel($date=0){
		$this->db->select('tbl_hoteltariff.*,tbl_hotelmaster.*');
	    $this->db->from('tbl_hotelmaster');
		$this->db->join('tbl_hoteltariff','tbl_hoteltariff.hotel_id = tbl_hotelmaster.id','left');
		if(!empty($date)){
			$this->db->where('tbl_hoteltariff.valid_from >=',$date);
		} 
		$this->db->group_by('tbl_hotelmaster.id');
		$query = $this->db->get();
		return $query->num_rows();
	  }
	
	function bookhotel($id){
		$date=$this->input->post('from'); 
		$this->db->select('*');
	    $this->db->from('tbl_hoteltariff');
		$this->db->where('hotel_id',$id);
		$query = $this->db->get();
	    $result= $query->result_array();
		 return $result; 
	}
	
	function searchprice($date){
		$this->db->select('*');
	    $this->db->from('tbl_hoteltariff');
		$this->db->where('valid_from >=',$date);
		$this->db->order_by("room_price","asc");
		$query = $this->db->get();
		$result= $query->result_array();
		  return $result; 
	}
	
	function searchhtlname($query1){
		$this->db->select('tbl_hotelmaster.*,tbl_hoteltariff.*,tbl_hotelpicgallery.*');
        $this->db->from("tbl_hotelmaster");
		$this->db->join('tbl_hoteltariff','tbl_hotelmaster.id=tbl_hoteltariff.hotel_id','left');
        $this->db->join('tbl_hotelpicgallery','tbl_hotelmaster.id=tbl_hotelpicgallery.hotel_id','left');
		if($query1 != ''){
		    $this->db->like('tbl_hotelmaster.hotelname', $query1);
		 }
		 $this->db->group_by('tbl_hoteltariff.hotel_id');
        //$this->db->order_by('CustomerID', 'DESC');
        $query= $this->db->get();
		 $result= $query->result_array();
		  return $result; 
	}
 
}
?>
