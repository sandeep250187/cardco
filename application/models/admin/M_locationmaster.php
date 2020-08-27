<?php
class M_locationmaster extends CI_Model{
	private $tbl_payment_criteria = 'tbl_pages';

	
	function addlocation()
	{
		$is_logged_in = $this->session->userdata('logged_in');
		 $data = array(
					'search_transferid' => $this->input->post('searchTransfer'),
					'transfer_pickup' => $this->input->post('transferPickup'),
					'transfer_place' => $this->input->post('transferPlace'),
					 );
		 $msg = 0;
	     $this->db->insert('tbl_transferlocation', $data);
		 $msg = ($this->db->affected_rows() > 0) ? 1 : 0;//for insert
	     return  $msg;
	 }

	 function listing($limit,$start,$startdate,$enddate,$specificOption,$specificValue)
	{
		 $this->db->select('*');
		 $this->db->from('tbl_transferlocation');
		 if(!isEmpty($specificOption) && !isEmpty($specificValue)){
		   $this->db->like($specificOption,$specificValue);
		}
		$this->db->limit($limit, $start);
		$this->db->order_by('created_date','Asc');
		$query = $this->db->get();
		 return $query->result_array();
		 
	}
	 
	function index($id){
		 $is_logged_in = $this->session->userdata('logged_in');
		 $data = array(
		    'search_transferid' => $this->input->post('searchTransfer'),
			'transfer_pickup'=>$this->input->post('transferPickup'),
			'transfer_place' => $this->input->post('transferPlace'),
			 );
	 
	$msg = 0;
	if( $id == 0 ){
		$this->db->insert('tbl_transferlocation', $data);
		$msg = ($this->db->affected_rows() > 0) ? 1 : 0;//for insert
	}else{
		$this->db->where('id',$id );
	    $this->db->update('tbl_transferlocation', $data); 
		$msg = ($this->db->affected_rows() > 0) ? 2 : 3;//for update : for nothing happened
		
	}	
	return  $msg;
	
	}
 
	function delete($pageid){
		$this->db->delete('tbl_transferlocation', array('id' => $pageid));
		return ($this->db->affected_rows() != 1) ? false : true;
  	}

  	function count_all($startdate,$enddate,$specificOption,$specificValue){
		 $this->db->select('*');
		$this->db->from('tbl_transferlocation');
		if(!isEmpty($specificOption) && !isEmpty($specificValue)){
			 $this->db->like($specificOption,$specificValue);
		}
		       $query =   $this->db->get();
			 return ($query->num_rows());
	}

	 
	function transfer_info($id=0){
		$this->db->select('*');
		$this->db->from('tbl_transferlocation');
		if(!empty($id)){
		$this->db->where('id',$id);
		}
		$query = $this->db->get();
		return $query->result_array();
	}

}
?>