<?php
class M_hotelmaster extends CI_Model{
	private $tbl_payment_criteria = 'tbl_hotelmaster';

	
	function addhotelmaster()
	{
		$is_logged_in = $this->session->userdata('logged_in');
		$text=str_replace("\'","'",$this->input->post('spk_about'));
		 if($_FILES['hotel_pic']['error']!= 4){
			$randno = rand();
			$string = str_replace(' ', '-',$_FILES['hotel_pic']['name']);
			$clearimg = preg_replace('/[^A-Za-z0-9\-.]/', '', $string);
            $imagename = $randno."_".$clearimg;
             move_uploaded_file($_FILES['hotel_pic']['tmp_name'],"uploads/hotelmaster/".$imagename);			
		}
		else {
			$imagename='';
		}
		            
		            $config['image_library'] = 'gd2';
		            $config['allowed_types'] = 'gif|jpg|png|jpeg';
		            $config['source_image'] = "uploads/hotelmaster/".$imagename;
		            $config['new_image'] = 'thumb_'.$imagename;
		            $config['create_thumb'] = FALSE;
		            $config['maintain_ratio'] = FALSE;
		            $config['width'] = 298;
	            	$config['height'] = 298;
	            	$this->load->library('image_lib', $config);
	            	$this->image_lib->initialize($config);
	            	$this->image_lib->resize();
		 
		 $data = array(
		      'hotelname' => $this->input->post('hotelName'),
			  'hotel_pic'=>$imagename,
			  'locationid' => $this->input->post('country'),
			  'state' => $this->input->post('state'),
			  'location' => $this->input->post('location'),
			  'address' => $this->input->post('address'),
			  'starCat' => $this->input->post('starCat'),
			  'landline' => $this->input->post('landline'),
			  'contact_person' => $this->input->post('contact'),
			  'cancel_policy' => $this->input->post('cancelPolicy'),
			  'remarks' => $this->input->post('remark'),
			  'htl_map' => $this->input->post('maploc'),
			  'htl_description' => $this->input->post('htl_description')
		 );
		
		$msg = 0;
	    $this->db->insert('tbl_hotelmaster', $data);
		$lastinsert_id = $this->db->insert_id();
		$number_of_files = sizeof($_FILES['image_file']['tmp_name']);
					$files = $_FILES['image_file'];
					$errors = array();
					for($i=0;$i<$number_of_files;$i++)
					{
					  if($_FILES['image_file']['error'][$i] != 0) $errors[$i][] = 'Couldn\'t upload file '.$_FILES['image_file']['name'][$i];
					}
					 if(sizeof($errors)==0)
					{
					  
					  for ($i = 0; $i < $number_of_files; $i++) {
						$randno = rand();
						$string = str_replace(' ', '-',$files['name'][$i]);
						$clearimg = preg_replace('/[^A-Za-z0-9\-.]/', '', $string);
						$imgname=$lastinsert_id."_".$randno."_".$clearimg;				
						$_FILES['image_file']['tmp_name'] = $files['tmp_name'][$i];
						move_uploaded_file($_FILES['image_file']['tmp_name'],"uploads/hotelpicgallery/".$imgname);
					     /**Thumb Creation**/	
						$config['image_library'] = 'gd2';
						$config['allowed_types'] = 'gif|jpg|png|jpeg';
						$config['source_image'] = "uploads/hotelpicgallery/".$imgname;
						$config['new_image'] = 'thumb_'.$imgname;
						$config['create_thumb'] = FALSE;
						$config['maintain_ratio'] = FALSE;
						$config['width'] = 298;	
						$config['height'] = 298;
						$this->load->library('image_lib', $config);
						$this->image_lib->initialize($config);
						$this->image_lib->resize();
						$arraydaa = array('hotel_id'=>$lastinsert_id,'image'=>$imgname);
						$this->M_hotelmaster->uploadMultiplePic($arraydaa);
					  }
					}
				else
				{
				  print_r($errors);
				}
				
		$msg = ($this->db->affected_rows() > 0) ? 1 : 0;
	 
		return  $msg;
	    
	}
	
	function uploadMultiplePic($arraydaa){
		if(!empty($arraydaa)){
			$result = 0;
	        $this->db->insert('tbl_hotelpicgallery', $arraydaa);
			$result = ($this->db->affected_rows() > 0) ? 1 : 0;
	        return  $result;
		}else{
			return false;
		}
		
	}

	 function checkusername($username)
  {
   $this -> db -> select('username');
   $this -> db -> from('tbl_hotelmaster');
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
		$this->db->select('tbl_hotelmaster.*');
		$this->db->from('tbl_hotelmaster');
		//$this->db->join('tbl_role','tbl_role.role_id = tbl_users.user_role','left');
		if(!isEmpty($specificOption) && !isEmpty($specificValue)){
		   $this->db->like($specificOption,$specificValue);
		}
		$this->db->limit($limit, $start);
		$this->db->order_by('id','Asc');
		$query = $this->db->get();
		 return $query->result_array();
	}
	
	
	function index($id){
		$is_logged_in = $this->session->userdata('logged_in');
	      if($_FILES['hotel_pic']['error']!= 4){
			$randno = rand();
			$string = str_replace(' ', '-',$_FILES['hotel_pic']['name']);
			$clearimg = preg_replace('/[^A-Za-z0-9\-.]/', '', $string);
            $imagename = $randno."_".$clearimg;
             move_uploaded_file($_FILES['hotel_pic']['tmp_name'],"uploads/hotelmaster/".$imagename);			
		}
		else {
			 $imagename=$this->input->post('h_img');
		}

                    $config['image_library'] = 'gd2';
		            $config['allowed_types'] = 'gif|jpg|png|jpeg';
		            $config['source_image'] = "uploads/hotelmaster/".$imagename;
		            $config['new_image'] = 'thumb_'.$imagename;
		            $config['create_thumb'] = FALSE;
		            $config['maintain_ratio'] = FALSE;
		            $config['width'] = 298;
	            	$config['height'] = 298;
	            	$this->load->library('image_lib', $config);
	            	$this->image_lib->initialize($config);
	            	$this->image_lib->resize();
        

         $data = array(
			 'hotelname' => $this->input->post('hotelName'),
			  'hotel_pic'=>$imagename,
			  'location' => $this->input->post('location'),
			  'address' => $this->input->post('address'),
			  'starCat' => $this->input->post('starCat'),
			  'landline' => $this->input->post('landline'),
			  'contact_person' => $this->input->post('contact'),
			  'cancel_policy' => $this->input->post('cancelPolicy'),
			  'remarks' => $this->input->post('remark'),
			  'htl_map' => $this->input->post('maploc'),
			  'htl_description' => $this->input->post('htl_description'),
			  'popular_hotel' => $this->input->post('popular_hotel'),
		 );
		
	 $msg = 0;
	if( $id == 0 ){
		$this->db->insert('tbl_hotelmaster', $data);
		$msg = ($this->db->affected_rows() > 0) ? 1 : 0;//for insert
	}else{
		$this->db->where('id',$id );
	    $this->db->update('tbl_hotelmaster', $data); 
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
	        $this->db->update('tbl_users', $data); 
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
		return $this->db->count_all('tbl_users');
	}
	
	function delete($pageid){
		 $this->db->delete('tbl_hotelmaster', array('id' => $pageid));
		return ($this->db->affected_rows() != 1) ? false : true;
  	}
	function status($id,$status){
		$this->db->where('id',$id );
        $this->db->set("status", $status);
        $this->db->update("tbl_hotelmaster");
		//$this->output->enable_profiler(TRUE);
		return ($this->db->affected_rows() > 0) ? 2 : 0;//for insert // for update 
  	}
	
	 function count_all($startdate,$enddate,$specificOption,$specificValue){
		$this->db->select('*');
		$this->db->from('tbl_hotelmaster');
		if(!isEmpty($specificOption) && !isEmpty($specificValue)){
		   $this->db->like($specificOption,$specificValue);
		}
		       $query =   $this->db->get();
			return ($query->num_rows());
	}
	
	function page_info($id=0){
		$this->db->select('tbl_hotelmaster.*,tbl_hotelpicgallery.image');
		$this->db->from('tbl_hotelmaster');
		if(!empty($id)){
	      $this->db->join('tbl_hotelpicgallery','tbl_hotelpicgallery.hotel_id = tbl_hotelmaster.id','left');
		  $this->db->where('tbl_hotelmaster.id',$id);
		}
		$query = $this->db->get();
		return $query->result_array();
		//pr($result); 

	}
	
	
	function userNameFromId($id){
	$row = $this->db->select('user_fname,user_lname')
					 ->get_where('tbl_users',array('user_id' => $id))->row();
	return is_object($row)?$row->user_fname.' '.$row->user_lname:false;
	}

function Updatepriority($id,$priority)
	{
		$this->db->where('id',$id );
        $this->db->set("priority", $priority);
        $this->db->update("tbl_hotelmaster");
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
      $url = $fdata[0]."uploads/hotelmaster/" . $time."_".$_FILES['upload']['name'];
    }
	 
	$CKEditorFuncNum = $_GET['CKEditorFuncNum'] ;
	echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$message');</script>";
				
	
	
	}
	
	
}
?>
