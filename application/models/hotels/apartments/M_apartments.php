<?php
class M_apartments extends CI_Model{
	 
	function findHotel(){
		  //$is_logged_in_sup = $this->session->userdata('logged_in');
		$date=$this->input->post('from_apt'); 
		$this->db->select('tbl_apartmenttariff.*,tbl_apartmentmaster.*');
	    $this->db->from('tbl_apartmentmaster');
		$this->db->join('tbl_apartmenttariff','tbl_apartmenttariff.apt_id = tbl_apartmentmaster.id');
		$this->db->where('tbl_apartmentmaster.status','1');
		$this->db->where('tbl_apartmenttariff.valid_from >=',$date);
		$this->db->group_by('tbl_apartmentmaster.id');
		$query = $this->db->get();
		$result= $query->result_array();
		 return $result; 
	}
	
	function allHotel(){
		$this->db->select('tbl_apartmenttariff.*,tbl_apartmentmaster.*');
	    $this->db->from('tbl_apartmentmaster');
		$this->db->join('tbl_apartmenttariff','tbl_apartmenttariff.apt_id = tbl_apartmentmaster.id');
		$this->db->where('tbl_apartmentmaster.status','1');
		$this->db->group_by('tbl_apartmentmaster.id');
		$this->db->limit(10,0);
		$query = $this->db->get();
		//echo $this->db->last_query(); die;
		$result= $query->result_array();
		 return $result;
	}
	
	function numOfHotel($date=0){
		$this->db->select('tbl_apartmenttariff.*,tbl_apartmentmaster.*');
	    $this->db->from('tbl_apartmentmaster');
		$this->db->join('tbl_apartmenttariff','tbl_apartmenttariff.apt_id = tbl_apartmentmaster.id');
		if(!empty($date)){
			$this->db->where('tbl_apartmenttariff.valid_from >=',$date);
		} 
		$this->db->where('tbl_apartmentmaster.status','1');
		$this->db->group_by('tbl_apartmentmaster.id');
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
		$this->db->select('tbl_hoteltariff.*,tbl_hotelmaster.*');
	    $this->db->from('tbl_hoteltariff');
	    $this->db->join('tbl_hotelmaster','tbl_hotelmaster.id = tbl_hoteltariff.hotel_id','left');
	    if(!empty($date)){
			$this->db->where('tbl_hoteltariff.valid_from >=',$date);
		}
        $this->db->where('tbl_hotelmaster.status',1);		
		$this->db->group_by('tbl_hotelmaster.id');
		$this->db->order_by("tbl_hoteltariff.room_price","asc");
		
		$query = $this->db->get();
		$result= $query->result_array();
		  return $result; 
	}
	
	function hotel_count($date){
		$this->db->select('tbl_hoteltariff.*,tbl_hotelmaster.*');
	    $this->db->from('tbl_hoteltariff');
	    $this->db->join('tbl_hotelmaster','tbl_hotelmaster.id = tbl_hoteltariff.hotel_id','left');
	    if(!empty($date)){
			$this->db->where('tbl_hoteltariff.valid_from >=',$date);
		}
        $this->db->where('tbl_hotelmaster.status',1);		
		$this->db->group_by('tbl_hotelmaster.id');
		$this->db->order_by("tbl_hoteltariff.room_price","asc");
		$query = $this->db->get();
		$result= $query->num_rows();
		  return $result; 
	}
	
	function searchhtlname($query1,$order,$date,$htlorder,$starrate,$catstar,$offset,$limit){
		
		/* $this->db->select('`tbl_hotelmaster`.`id`,`tbl_hotelmaster`.`hotel_pic`,`tbl_hotelmaster`.`hotelname`,`tbl_hotelmaster`.`location`,`tbl_hotelmaster`.`htl_description`,`tbl_hotelmaster`.`htl_map`,`tbl_hotelmaster`.`starcat`,`tbl_hoteltariff`.`hotel_id` ,`tbl_hoteltariff`.`room_price`,`tbl_hotelpicgallery`.`image`');
        $this->db->from("tbl_hotelmaster");
		$this->db->join('tbl_hoteltariff','tbl_hotelmaster.id=tbl_hoteltariff.hotel_id');
        $this->db->join('tbl_hotelpicgallery','tbl_hotelmaster.id=tbl_hotelpicgallery.hotel_id');
		$this->db->where('tbl_hotelmaster.status',1);
		if($query1!=''){
			$this->db->where("(`tbl_hotelmaster.hotelname` LIKE '%".$query1."%')");
		}
		if($date!=''){
			$this->db->where('tbl_hoteltariff.valid_from >=',$date);
		}
		if($catstar!=''){
			$this->db->where('tbl_hotelmaster.starcat',$catstar);
		}
		 if($order!=''){
			$this->db->order_by('tbl_hoteltariff.room_price',$order);
		}
		if($htlorder!=''){
			$this->db->order_by('tbl_hotelmaster.hotelname',$htlorder);
		}
		if($starrate!=''){
			$this->db->order_by('tbl_hotelmaster.starcat',$starrate);
		}
		
		 $this->db->group_by('tbl_hoteltariff.hotel_id');
		 $this->db->limit($limit,$offset);
		 
		 $query= $this->db->get();
		 //echo $this->db->last_query(); die;
		 $result= $query->result_array();
		  return $result;   */
		  $where1="";
		  $where2="";
		  $where3="";
		  $orderby1="";
		  $orderby2="";
		  $orderby3="";
		  
		 if($query1!='0'){
			
			$where1="AND (tbl_apartmentmaster.aptname LIKE '%".$query1."%')";
		}
		 if($date!='0'){
			$where2="AND tbl_apartmenttariff.valid_from >=".$date."";
		}
		if($catstar!='0'){
			$where3="AND tbl_apartmentmaster.starcat=".$catstar."";
		}
		 if($order!='0'){
			$orderby1="ORDER BY tbl_apartmenttariff.apt_price ".$order."";
		}
		if($htlorder!='0'){
			$orderby2="ORDER BY tbl_apartmentmaster.aptname ".$htlorder."";
		}
		if($starrate!='0'){
			$orderby3="ORDER BY tbl_apartmentmaster.starcat ".$starrate."";
		} 
		$query= $this->db->query("SELECT `tbl_apartmentmaster`.`id`,`tbl_apartmentmaster`.`apt_pic`,`tbl_apartmentmaster`.`aptname`,`tbl_apartmentmaster`.`location`,`tbl_apartmenttariff`.`description`,`tbl_apartmentmaster`.`apt_map`,`tbl_apartmentmaster`.`starcat`,`tbl_apartmenttariff`.`apt_id` ,`tbl_apartmenttariff`.`apt_price`,`tbl_apartmentpicgallery`.`image` FROM `tbl_apartmentmaster`  JOIN `tbl_apartmenttariff` ON `tbl_apartmentmaster`.`id`=`tbl_apartmenttariff`.`apt_id`  JOIN `tbl_apartmentpicgallery` ON `tbl_apartmentmaster`.`id`=`tbl_apartmentpicgallery`.`apt_id` WHERE `tbl_apartmentmaster`.`status`='1' ".$where1." ".$where2." ".$where3."  GROUP BY `tbl_apartmenttariff`.`apt_id` ".$orderby1." ".$orderby2." ".$orderby3." LIMIT ".$offset.",".$limit."");
		//echo $this->db->last_query(); die;
		$result= $query->result_array();
		  return $result;  
	}
    function get_room($hotel_id,$room_id)
	{
		$this->db->select('tbl_hoteltariff.id as room_id,tbl_hoteltariff.hotel_id,tbl_hoteltariff.room_type,tbl_hoteltariff.room_price as room_price,tbl_hoteltariff.room_cat,tbl_hoteltariff.room_hold,tbl_hoteltariff.room_cutof,tbl_hoteltariff.description,tbl_hoteltariff.pic1,tbl_hoteltariff.pic2,tbl_hotelmaster.*,tbl_hotelpicgallery.*');
		$this->db->from("tbl_hoteltariff");
		$this->db->join('tbl_hotelmaster','tbl_hotelmaster.id=tbl_hoteltariff.hotel_id','left');
        $this->db->join('tbl_hotelpicgallery','tbl_hotelmaster.id=tbl_hotelpicgallery.hotel_id','left');
		$this->db->where('tbl_hoteltariff.hotel_id',$hotel_id);
		$this->db->where('tbl_hoteltariff.id',$room_id);
		$query= $this->db->get();
		
		$result= $query->result_array();
		return $result; 
		
	   	
	}
}
?>
