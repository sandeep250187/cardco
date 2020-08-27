<?php
class M_statics extends CI_Model{
	private $tbl_content_value = 'tbl_static_content_value';
	private $tbl_content = 'tbl_static_content';

	
	function addpage()
	{
		$is_logged_in = $this->session->userdata('logged_in');
		
		$text=str_replace("\'","'",$this->input->post('static_value'));
		
	
		$data = array(
			'static_label' => $this->input->post('static_label'),
			'static_value' => $text,
			'static_order' => $this->input->post('static_order'),
			'static_type' => $this->input->post('static_type'),
			'static_key' => $this->input->post('static_key'),
		);
		
		$msg = 0;
	
		$this->db->insert('tbl_pages', $data);
		$msg = ($this->db->affected_rows() > 0) ? 1 : 0;//for insert
	
		return  $msg;
	
	}
	
	function listing($limit,$start,$startdate,$enddate,$specificOption,$specificValue)
	{
		$this->db->select('tbl_static_content.*,tbl_static_content_value.static_id as valueId');
		$this->db->from('tbl_static_content');
	    $this->db->join('tbl_static_content_value','tbl_static_content_value.static_id = tbl_static_content.id','left');
		//$this->db->join('tbl_role','tbl_role.role_id = tbl_admins.user_role','left');
		if(!isEmpty($specificOption) && !isEmpty($specificValue)){
		   $this->db->like($specificOption,$specificValue);
		}
		$this->db->limit($limit, $start);
		$this->db->order_by('created_on','Asc');
		$this->db->group_by('id');
		$query = $this->db->get();
		//echo $this->db->last_query(); 
		return $query->result_array();
	}
	
	function listingdetail($id)
	{
		
		//echo $id; die('ssss');
		$this->db->select('tbl_static_content_value.*');
		$this->db->from('tbl_static_content_value');
	 
		$this->db->where('static_id',$id );
		
		$this->db->order_by('static_order','Asc');
		$query = $this->db->get();
		//echo $this->db->last_query(); 
		return $query->result_array();
	}
	
	
	function index($id){
	
		$is_logged_in = $this->session->userdata('logged_in');
	
		
		$text = str_replace("\'","'",$this->input->post('static_value'));
	
		$data = array(
			'static_label' => $this->input->post('static_label'),
			'static_value' => $text,
			
		);
	//echo'<pre>';print_r($data);echo'</pre>'; die;
	
	$msg = 0;
	if( $id == 0 ){
		$this->db->insert('tbl_static_content_value', $data);
		$msg = ($this->db->affected_rows() > 0) ? 1 : 0;//for insert
	}else{
		$this->db->where('id',$id );
	    $this->db->update('tbl_static_content_value', $data); 
		//echo $this->db->last_query();die;
		$msg = ($this->db->affected_rows() > 0) ? 2 : 3;//for update : for nothing happened
		
	}	
	return  $msg;
	
	}
	
	
	
	function delete($pageid){
		$this->db->delete('tbl_static_content_value', array('id' => $pageid));
		return ($this->db->affected_rows() != 1) ? false : true;
  	}
	function status($id,$status){
		$this->db->where('id',$id );
        $this->db->set("status", $status);
        $this->db->update("tbl_static_content");
		//$this->output->enable_profiler(TRUE);
		return ($this->db->affected_rows() > 0) ? 2 : 0;//for insert // for update 
  	}
	
	 function count_all($startdate,$enddate,$specificOption,$specificValue){
		$this->db->select('*');
		if(!isEmpty($specificOption) && !isEmpty($specificValue)){
		   $this->db->like($specificOption,$specificValue);
		}
		       $query = $this->db->get('tbl_static_content');
			return ($query->num_rows());
	}
	 function count_alldetail($id){
		$this->db->select('*');
		$this->db->where('static_id',$id );
		
		       $query = $this->db->get('tbl_static_content_value');
			return ($query->num_rows());
	}
	
	function static_info($id=0){

		$this->db->select('*');
		$this->db->from('tbl_static_content_value');
		if(!empty($id)){
		$this->db->where('id',$id);
		}
		$query = $this->db->get();
		return $query->result_array();
	}
	
	
	
	
	
}
?>