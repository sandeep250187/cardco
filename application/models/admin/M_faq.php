<?php
class M_faq extends CI_Model{
	private $tbl_faqs = 'tbl_faqs';

	
	function addfaq()
	{
		$is_logged_in = $this->session->userdata('logged_in');
			
		$text=str_replace("\'","'",$this->input->post('content'));
			
		$data = array('faq_title' => $this->input->post('faq_title'),
			'faq_content' => $text,
			'status' => 1,
			'priority' => $this->input->post('priority'),
		);
	
		$msg = 0;	
		$this->db->insert('tbl_faqs', $data);
		$msg = ($this->db->affected_rows() > 0) ? 1 : 0;//for insert
	
		return  $msg;
	
	}
	
	function listing($limit,$start,$startdate,$enddate,$specificOption,$specificValue)
	{
		$this->db->select('tbl_faqs.*');
		$this->db->from('tbl_faqs');
		if(!isEmpty($specificOption) && !isEmpty($specificValue)){
		   $this->db->like($specificOption,$specificValue);
		}
		$this->db->limit($limit, $start);
		$this->db->order_by('priority','Asc');
		$query = $this->db->get();
	
		return $query->result_array();
	}
	
	
	function index($id){
		//echo '==='.$user_id;die;
		$is_logged_in = $this->session->userdata('logged_in');
		
		$text=str_replace("\'","'",$this->input->post('content'));
	
		$data = array('faq_title' => $this->input->post('faq_title'),
			'faq_content' => $text,
			'priority' => $this->input->post('priority'),
		);

	$msg = 0;
	if( $id == 0 ){
		$this->db->insert('tbl_faqs', $data);
		$msg = ($this->db->affected_rows() > 0) ? 1 : 0;//for insert
	}else{
		$this->db->where('id',$id );
	    $this->db->update('tbl_faqs', $data); 
		$msg = ($this->db->affected_rows() > 0) ? 2 : 3;//for update : for nothing happened
		
	}	
	return  $msg;
	
	}
	
	function update_profile($user_id){
		$is_logged_in = $this->session->userdata('logged_in');
		$data = array('user_fname' => $this->input->post('user_fname'),
			'user_lname' => $this->input->post('user_lname'),
			'user_email' => $this->input->post('user_email'),
			'username' => $this->input->post('username'),
			'user_password' => SHA1($this->input->post('user_password')),
			'org_password' => $this->input->post('user_password'),
			'house_no' => $this->input->post('house_no'),
			'street' => $this->input->post('street'),
			'state' => $this->input->post('state'),
			'city' => $this->input->post('city'),
			'zip' => $this->input->post('zip'),
			'user_phone' => $this->input->post('user_phone'),
	);
	//echo'<pre>';print_r($data);echo'</pre>'; die;
	$msg = 0;
		$this->db->where('user_id',$user_id );
	        $this->db->update('tbl_admins', $data); 
		//echo $this->db->last_query();die;
		$msg = ($this->db->affected_rows() > 0) ? 2 : 3;//for update : for nothing happened
		
		
	return  $msg;
	
	}
	
	function role(){
		$query = $this->db->get('tbl_role');
		$role[''] = "Select Role*"; 
		foreach($query->result() as $row){
			$role[$row->role_id] =  ucfirst($row->role_name);
		}
		return $role;
	}
	
	
	
	function countUser(){
		return $this->db->count_all('tbl_admins');
	}
	
	function delete($pageid){
		$this->db->delete('tbl_faqs', array('id' => $pageid));
		return ($this->db->affected_rows() != 1) ? false : true;
  	}
	function status($id,$status){
		$this->db->where('id',$id );
        $this->db->set("status", $status);
        $this->db->update("tbl_faqs");
		//$this->output->enable_profiler(TRUE);
		return ($this->db->affected_rows() > 0) ? 2 : 0;//for insert // for update 
  	}
	
	 function count_all($startdate,$enddate,$specificOption,$specificValue){
		$this->db->select('*');
		if(!isEmpty($specificOption) && !isEmpty($specificValue)){
		   $this->db->like($specificOption,$specificValue);
		}
		       $query =   $this->db->get($this->tbl_faqs);
			return ($query->num_rows());
	}
	
	function faq_info($id=0){
		$this->db->select('*');
		$this->db->from('tbl_faqs');
		if(!empty($id)){
		$this->db->where('id',$id);
		}
		$query = $this->db->get();
		return $query->result_array();
	}
	
	//faq length
	function faq_length(){
		$this->db->select('*');
		$this->db->from('tbl_faqs');
		$query = $this->db->get();
		return count($query->result_array())+1;
	}
	
	
	function userNameFromId($id){
	$row = $this->db->select('user_fname,user_lname')
					 ->get_where('tbl_admins',array('user_id' => $id))->row();
	return is_object($row)?$row->user_fname.' '.$row->user_lname:false;
	}
	
	function Updatepriority($id,$priority)
	{
		$this->db->where('id',$id );
        $this->db->set("priority", $priority);
        $this->db->update("tbl_faqs");
		//$this->output->enable_profiler(TRUE);
		//return ($this->db->affected_rows() > 0) ? 2 : 0;//for insert // for update 
	}

	
}
?>