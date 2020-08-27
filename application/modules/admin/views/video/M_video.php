<?php
class M_video extends CI_Model{
	private $tbl_uvideo = 'tbl_uvideo';

	 // Insert
	function index(){
		$is_logged_in = $this->session->userdata('logged_in');
			
		$text=str_replace("\'","'",$this->input->post('content'));
			
		$data = array('video_name' => $this->input->post('video_name'),
			'video_title' => $this->input->post('video_title'),
			'video_description'=> $text,
			'video_status' => 1,
			
		);
	
		$msg = 0;	
		$this->db->insert('tbl_uvideo', $data);
		$msg = ($this->db->affected_rows() > 0) ? 1 : 0;  //for insert
	
		return  $msg;
	}
	
	
	function listing($limit,$start,$startdate,$enddate,$specificOption,$specificValue)
	{
		
		$this->db->select('tbl_uvideo.*');
		$this->db->from('tbl_uvideo');
		$this->db->limit($limit, $start);
		$this->db->order_by('video_date', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function comments()
	{
		$countquery = $this->db->query("SELECT count(c.v_id) as count FROM tbl_video_comment c inner join tbl_uvideo u on c.v_id=u.v_id");
		
	}
	
	
	//edit
	function editing($v_id){
		//echo '==='.$user_id;die;
		$is_logged_in = $this->session->userdata('logged_in');
		
		$text=str_replace("\'","'",$this->input->post('video_description'));
	
		$data = array('video_name' => $this->input->post('video_name'),
			'video_description' => $text,
			'video_title' => $this->input->post('video_title'),
			'is_popular' => $this->input->post('is_popular'),
			'large_banner' => $this->input->post('large_banner'),
			'small_banner' => $this->input->post('small_banner'),
		
		);

	$msg = 0;
	if( $v_id == 0 ){
		$this->db->insert('tbl_uvideo', $data);
		$msg = ($this->db->affected_rows() > 0) ? 1 : 0;  //for insert
	}else{
		$this->db->where('v_id',$v_id );
	    $this->db->update('tbl_uvideo', $data); 
		$msg = ($this->db->affected_rows() > 0) ? 2 : 3;  //for update : for nothing happened
		
	}	
	return  $msg;
	
	}
	
	// Count All
	function count_all($startdate,$enddate,$specificOption,$specificValue){
		$this->db->select('*');
		$query =   $this->db->get($this->tbl_uvideo);
		return ($query->num_rows());
	}

	
	// Get Converted Listing
	function converted($limit,$start,$search_parameter){
		$this->db->select('*');
		$this->db->from('tbl_uvideo');
		$this->db->where("keytocat_date !=''");
		$this->db->where('type',1);
		if($search_parameter!=''){
			$this->db->like('cat_name',$search_parameter);
		}
		$this->db->order_by('keytocat_date','Desc');
		$this->db->limit($limit, $start);
		$result = $this->db->get();
		//echo $this->db->last_query(); 
		$row = $result->result_array();
		return $row;
	} 
	
	// Count All Converted Categories
	function count_convertall($search_parameter){
		$this->db->select('*');
		$this->db->from('tbl_uvideo');
		$this->db->where("keytocat_date !=''");
		$this->db->where('type',1);
		if($search_parameter!=''){
			$this->db->like('cat_name',$search_parameter);
		}
		$query = $this->db->get();
	    return ($query->num_rows());
	}
	// Edit Listing
	function editlist($v_id){
		$this->db->select('*');
		$this->db->from('tbl_uvideo');
		$this->db->where('v_id',$v_id);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	// Update Categories
	function update_category($cat_id,$post){
		$msg=0;
		$catname = $post['cat_name'];
		$this->db->select('*')->from('tbl_uvideo');
		$this->db->where(array('type'=>1,'cat_name'=>$catname));
		$this->db->or_where('cat_name',strtolower($catname));
		$exist = $this->db->get();
		$rows = $exist->result_array();
		$oldcatid = $rows[0]['catid'];
		$nums = $exist->num_rows();
		if($nums>0 and $oldcatid!=$cat_id){
		 $this->session->set_flashdata('invalid', 'Category Already Exists..');
		 redirect(base_url().'admin/category/edit/'.$cat_id);
		}
		else {
		$this->db->where('catid',$cat_id);
		$this->db->update('tbl_uvideo',$post);
		$msg = ($this->db->affected_rows() > 0) ? 2 : 3; //for update : for nothing happened
		return $msg;
		}
	}
	
	// Delete Category
	function delete($pageid){
		$this->db->delete('tbl_uvideo', array('v_id' => $pageid));
		return ($this->db->affected_rows() != 1) ? false : true;
  	}
	
	function status($v_id,$status){
		
		$this->db->where('v_id',$v_id );
        $this->db->set("video_status", $status);
        $this->db->update("tbl_uvideo");
		
		//$this->output->enable_profiler(TRUE);
		return ($this->db->affected_rows() > 0) ? 2 : 0;  //for insert // for update 
  	}
}
?>