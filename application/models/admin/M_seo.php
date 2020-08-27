<?php
class M_seo extends CI_Model{
	private $tbl_payment_criteria = 'tbl_seo';

	
	function addpage()
	{
		$is_logged_in = $this->session->userdata('logged_in');
			
		$data = array('main_url' => $this->input->post('main_url'),
			'sub_url' => $this->input->post('sub_url'),
			'meta_title' => $this->input->post('meta_title'),
			'meta_description' => $this->input->post('meta_description'),
			'meta_keyword' => $this->input->post('meta_keyword'),
		);
		$msg = 0;
	
		$this->db->insert('tbl_seo', $data);
		$msg = ($this->db->affected_rows() > 0) ? 1 : 0;//for insert
	
		return  $msg;
	
	}
	
	function listing($limit,$start,$startdate,$enddate)
	{
		$this->db->select('*');
		$this->db->from('tbl_seo');
		$this->db->limit($limit, $start);
		$this->db->order_by('created_on','Asc');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	
	function index($id){
		
		$is_logged_in = $this->session->userdata('logged_in');

		$data = array('main_url' => $this->input->post('main_url'),
			'sub_url' => $this->input->post('sub_url'),
			'meta_title' => $this->input->post('meta_title'),
			'meta_description' => $this->input->post('meta_description'),
			'meta_keyword' => $this->input->post('meta_keyword'),
		);
		
	$msg = 0;
	if( $id == 0 ){
		$this->db->insert('tbl_seo', $data);
		$msg = ($this->db->affected_rows() > 0) ? 1 : 0;//for insert
	}else{
		$this->db->where('id',$id );
	    $this->db->update('tbl_seo', $data); 
		$msg = ($this->db->affected_rows() > 0) ? 2 : 3;//for update : for nothing happened
		
	}	
	return  $msg;
	
	}
	
	
	function delete($pageid){
		$this->db->delete('tbl_seo', array('id' => $pageid));
		return ($this->db->affected_rows() != 1) ? false : true;
  	}
	function status($id,$status){
		$this->db->where('id',$id );
        $this->db->set("status", $status);
        $this->db->update("tbl_seo");
		return ($this->db->affected_rows() > 0) ? 2 : 0;//for insert // for update 
  	}
	
	 function count_all($startdate,$enddate){
		$this->db->select('*');
		$query = $this->db->get($this->tbl_payment_criteria);
		return ($query->num_rows());
	}
	
	function page_info($id=0){
		$this->db->select('*');
		$this->db->from('tbl_seo');
		if(!empty($id)){
		$this->db->where('id',$id);
		}
		$query = $this->db->get();
		return $query->result_array();
	}
	
	
}
?>