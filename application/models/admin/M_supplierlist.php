<?php
class M_supplierlist extends CI_Model{
	private $tbl_payment_criteria = 'tbl_supplier';

	
	function addcafe()
	{
		//$is_logged_in = $this->session->userdata('logged_in');
		 
		$capacity= $this->input->post('capacity');
		$criteria= $this->input->post('criteria');
		$keyword= $this->input->post('keyword');
		 $data = array(
		 	'cafe_capacity' => $capacity,
			'cafe_criteria' => $criteria,
			'keyword' => $keyword
		  );
		
		$msg = 0;
	    $this->db->insert('tbl_supplier', $data);
		$msg = ($this->db->affected_rows() > 0) ? 1 : 0; 
	 	return  $msg;
	}

	 function checkusername($username)
  {
   $this -> db -> select('username');
   $this -> db -> from('tbl_supplier');
   $this -> db -> where('username', $username);
   $query = $this->db->get();
   $userResult = $query->row_array();
   print_r($userResult);
   if($userResult > 0)
   { 
    	return false;
   }else{
    	 return true;
   }
    
 }
	
	function listing($limit,$start,$startdate,$enddate,$specificOption,$specificValue)
	{
		$this->db->select('*');
		$this->db->from('tbl_supplier');
		$this->db->where('fksuppliercategoryid',3);
		 if(!isEmpty($specificOption) && !isEmpty($specificValue)){
		   $this->db->like($specificOption,$specificValue);
		}
		$this->db->limit($limit, $start);
		$this->db->order_by('title','Asc');
		$query = $this->db->get();
		 return $query->result_array();
	}
	
	
	function index($id)
	{
		 $is_logged_in = $this->session->userdata('logged_in');
		 $text=str_replace("\'","'",$this->input->post('content'));
		 $text=str_replace($replacestring,"",$this->input->post('content'));
		 
		 $data = array(
		 	 'cafe' => $text,
			 );
		 $msg = 0;
	    if( $id == 0 ){
			$this->db->insert('tbl_supplier', $data);
			$msg = ($this->db->affected_rows() > 0) ? 1 : 0;//for insert
		}else{
			$this->db->where('id',$id );
	    	$this->db->update('tbl_supplier', $data); 
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
		$this->db->select('*');
		$this->db->from('tbl_supplier');
		$this->db->where('id',$id );
		$query = $this->db->get();
		$result= $query->row_array();
	    $link=base_url().'uploads/cafe/'.$result['logo'];
	    unlink($link);
	
		
		$this->db->delete('tbl_supplier', array('id' => $pageid));
		return ($this->db->affected_rows() != 1) ? false : true;
  	}
	function status($id,$status){
		$this->db->where('id',$id );
        $this->db->set("status", $status);
        $this->db->update("tbl_supplier");
		//$this->output->enable_profiler(TRUE);
		return ($this->db->affected_rows() > 0) ? 2 : 0;//for insert // for update 
  	}
	
	 function count_all($startdate,$enddate,$specificOption,$specificValue){
		$this->db->select('*');
		if(!isEmpty($specificOption) && !isEmpty($specificValue)){
		   $this->db->like($specificOption,$specificValue);
		}
		       $query =   $this->db->get($this->tbl_payment_criteria);
			return ($query->num_rows());
	}
	
	function page_info($id=0){
		$this->db->select('*');
		$this->db->from('tbl_supplier');
		if(!empty($id)){
		$this->db->where('id',$id);
		}
		$query = $this->db->get();
		return $query->result_array();

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
        $this->db->update("tbl_supplier");
		//$this->output->enable_profiler(TRUE);
		//return ($this->db->affected_rows() > 0) ? 2 : 0;//for insert // for update 
	}

	
	public function uploadImage()
	{
		//$time = time();
		//$url = 'assets/uploadimg/'.$time."_".$_FILES['upload']['name'];

		//$furl = 'http'.'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		//$fdata = explode('ckeditor/ckupload.php',$furl);

 //extensive suitability check before doing anything with the file...
    if (($_FILES['upload'] == "none") || (empty($_FILES['upload']['name'])) )
    {
       $message = "No file uploaded.";
    }
    else if ($_FILES['upload']["size"] == 0)
    {
       $message = "The file is of zero length.";
    }
    else if (($_FILES['upload']["type"] != "image/pjpeg") AND ($_FILES['upload']["type"] != "image/jpeg") AND ($_FILES['upload']["type"] != "image/png"))
    {
       $message = "The image must be in either JPG or PNG format. Please upload a JPG or PNG instead.";
    }
    else if (!is_uploaded_file($_FILES['upload']["tmp_name"]))
    {
       $message = "You may be attempting to hack our server. We're on to you; expect a knock on the door sometime soon.";
    }
    else {
      $message = "";
      $move = @ move_uploaded_file($_FILES['upload']['tmp_name'], $url);
      if(!$move)
      {
         $message = "Error moving uploaded file. Check the script is granted Read/Write/Modify permissions.";
      }
      $url = $fdata[0]."uploads/cafe/" . $time."_".$_FILES['upload']['name'];
    }
	 
	$CKEditorFuncNum = $_GET['CKEditorFuncNum'] ;
	echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$message');</script>";
				
	
	
	}
	
	
}
?>
