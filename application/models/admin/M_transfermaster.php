<?php
class M_transfermaster extends CI_Model{
	private $tbl_payment_criteria = 'tbl_pages';

	
	function addtransfer()
	{
		$is_logged_in = $this->session->userdata('logged_in');
		 $data = array(
					'transfer_name' => $this->input->post('transferName'),
					'van10' => $this->input->post('van10'),
					'van13' => $this->input->post('van13'),
					'van17' => $this->input->post('van17'),
					'mpv' => $this->input->post('mpv'),
					'bus31' => $this->input->post('bus31'),
					'bus44' => $this->input->post('bus44'),
					'guide' => $this->input->post('guide'),
					'guide_rate' => $this->input->post('guide_rate'),
					'validity' => $this->input->post('validity'),
					'description' => $this->input->post('description'),
			    );
		 $msg = 0;
	     $this->db->insert('tbl_penang_transfer_master', $data);
		 $msg = ($this->db->affected_rows() > 0) ? 1 : 0;//for insert
	     return  $msg;
	 }

	 function searchlisting($limit,$start,$startdate,$enddate,$specificOption,$specificValue){
	 	$this->db->select('*');
		 $this->db->from('tbl_searchtransfer');
		 if(!isEmpty($specificOption) && !isEmpty($specificValue)){
		   $this->db->like($specificOption,$specificValue);
		}
		$this->db->limit($limit, $start);
		$this->db->order_by('created_date','Asc');
		$query = $this->db->get();
		 return $query->result_array();
	 }
	
	function listing($limit,$start,$startdate,$enddate,$specificOption,$specificValue)
	{
		 $this->db->select('*');
		 $this->db->from('tbl_penang_transfer_master');
		 if(!isEmpty($specificOption) && !isEmpty($specificValue)){
		   $this->db->like($specificOption,$specificValue);
		}
		$this->db->limit($limit, $start);
		$this->db->order_by('created_date','Asc');
		$query = $this->db->get();
		 return $query->result_array();
		 
	}
	
	function searchtransfer(){
		$data=array(
			'search_transfer'=>$this->input->post('searchTransfer')
		 );
		$msg='0';
		$this->db->insert('tbl_searchtransfer',$data);
		$msg=($this->db->affected_rows() > 0) ? 1 : '';
		return $msg;
	}

	function index($id){
		 $is_logged_in = $this->session->userdata('logged_in');
		 $data = array(
		    'transfer_name' => $this->input->post('transferName'),
			'van10'=>$this->input->post('van10'),
			'van13' => $this->input->post('van13'),
			'van17' => $this->input->post('van17'),
			'mpv' => $this->input->post('mpv'),
			'bus31' => $this->input->post('bus31'),
			'bus44' => $this->input->post('bus44'),
			'guide' => $this->input->post('guide'),
			'guide_rate' => $this->input->post('guide_rate'),
			'validity' => $this->input->post('validity'),
			'description' => $this->input->post('description'),
		);
	 
	$msg = 0;
	if( $id == 0 ){
		$this->db->insert('tbl_searchtransfer', $data);
		$msg = ($this->db->affected_rows() > 0) ? 1 : 0;//for insert
	}else{
		$this->db->where('id',$id );
	    $this->db->update('tbl_searchtransfer', $data); 
		$msg = ($this->db->affected_rows() > 0) ? 2 : 3;//for update : for nothing happened
		
	}	
	return  $msg;
	
	}

	function editsearch($id){
		 $is_logged_in = $this->session->userdata('logged_in');
		 $data = array(
		    'search_transfer' => $this->input->post('transferSearch'),
			 );
	 
	$msg = 0;
	if( $id == 0 ){
		$this->db->insert('tbl_searchtransfer', $data);
		$msg = ($this->db->affected_rows() > 0) ? 1 : 0;//for insert
	}else{
		$this->db->where('id',$id );
	    $this->db->update('tbl_searchtransfer', $data); 
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
		$this->db->delete('tbl_penang_transfer_master', array('id' => $pageid));
		return ($this->db->affected_rows() != 1) ? false : true;
  	}

  	function deletesearch($pageid){
		$this->db->delete('tbl_searchtransfer', array('id' => $pageid));
		return ($this->db->affected_rows() != 1) ? false : true;
  	}

	function status($id,$status){
		$this->db->where('id',$id );
        $this->db->set("status", $status);
        $this->db->update("tbl_penang_transfer_master");
		//$this->output->enable_profiler(TRUE);
		return ($this->db->affected_rows() > 0) ? 2 : 0;//for insert // for update 
  	}

  	function searchstatus($id,$status){
  		$this->db->where('id',$id );
        $this->db->set("status", $status);
        $this->db->update("tbl_searchtransfer");
		 return ($this->db->affected_rows() > 0) ? 2 : 0;//for insert // for update 
  	}
	
	 function count_all($startdate,$enddate,$specificOption,$specificValue){
		 $this->db->select('*');
		$this->db->from('tbl_penang_transfer_master');
		if(!isEmpty($specificOption) && !isEmpty($specificValue)){
			 $this->db->like($specificOption,$specificValue);
		}
		       $query =   $this->db->get();
			 return ($query->num_rows());
	}

	function countsearch_all($startdate,$enddate,$specificOption,$specificValue){
		 $this->db->select('*');
		$this->db->from('tbl_searchtransfer');
		if(!isEmpty($specificOption) && !isEmpty($specificValue)){
			 $this->db->like($specificOption,$specificValue);
		}
		       $query =   $this->db->get();
			 return ($query->num_rows());
	}
	
	function transfer_info($id=0){
		$this->db->select('*');
		$this->db->from('tbl_penang_transfer_master');
		if(!empty($id)){
		$this->db->where('id',$id);
		}
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function searchtransfer_info($id=0){
		$this->db->select('*');
		$this->db->from('tbl_searchtransfer');
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
      $url = $fdata[0]."uploads/" . $time."_".$_FILES['upload']['name'];
    }
	 
	$CKEditorFuncNum = $_GET['CKEditorFuncNum'] ;
	echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$message');</script>";
				
	
	
	}
	
	
}
?>