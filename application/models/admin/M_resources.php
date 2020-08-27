<?php
class M_resources extends CI_Model{
	private $tbl_resources = 'tbl_resources';

	
	function addproducts()
	{
		$is_logged_in = $this->session->userdata('logged_in');
		//$escape=array("\'","\r\n");
		//$replace=array("'","");
		$text=str_replace("\'","'",$this->input->post('content'));
		$text1=str_replace("\'","'",$this->input->post('sub_content'));
		$text2=str_replace("\'","'",$this->input->post('elb_content'));
		$text3=str_replace("\'","'",$this->input->post('tnc_content'));
		//$content=mysql_real_escape_string($text);
		if($_FILES['file_name']['error']!= 4){
			$randno = rand();
			$string = str_replace(' ', '-',$_FILES['file_name']['name']);
			$clearimg = preg_replace('/[^A-Za-z0-9\-.]/', '', $string);
            $imgname = $randno."_".$clearimg;
             move_uploaded_file($_FILES['file_name']['tmp_name'],"uploads/products/".$imgname);			
		}
		else {
			$imgname='';
		}
		
		
		/*placeholder image*/
		
		
		if($_FILES['placeholder_img']['error']!= 4)
		{
			$randno = rand();
			$string = str_replace(' ', '-',$_FILES['placeholder_img']['name']);
			$clearimg = preg_replace('/[^A-Za-z0-9\-.]/', '', $string);
            $placeholder_img = $randno."_".$clearimg;
             move_uploaded_file($_FILES['placeholder_img']['tmp_name'],"uploads/products/".$placeholder_img);			
		}
		else
		{
			$placeholder_img='';
		}
						
		$data = array('product_name' => $this->input->post('product_name'),
			'description' => $text,
			'sub_content' => $text1,
			'elb_content' => $text2,
			'tnc_content' => $text3,
			'placeholder_img' => $placeholder_img,
			'file_name'=>$imgname,
			'cat_id' => json_encode($this->input->post('categories[]')),
			'type' => $this->input->post('type'),
			'credits' => $this->input->post('credits'),
		);
		
		$msg = 0;
		//print_r($data);
		//die('---');
		$this->db->insert('tbl_products', $data);
		$msg = ($this->db->affected_rows() > 0) ? 1 : 0;//for insert
	
		return  $msg;
	
	}
	
	function listing($limit,$start,$startdate,$enddate,$specificOption,$specificValue)
	{
		
		if(isset($_POST['search']))
		{
			
			$dateFrom = $_POST['date_from'];		
			$dateTo = $_POST['date_to'];		
			$email = $_POST['email'];	
			$resource_name = $_POST['resource_name'];
			$sql = '';
			if(!empty($email))
			{
				$sql = "select rs.id, rs.product_id, rs.member_id, rs.type, rs.credits, rs.status, date_format(rs.date, '%Y-%m-%d') as date from tbl_resources rs where";
				$sql .= " rs.member_id='$email' order by rs.id desc";
			}
			
			if(!empty($resource_name))
			{	
				$sql = "select rs.id, rs.product_id, rs.member_id, rs.type, rs.credits, rs.status, date_format(rs.date, '%Y-%m-%d') as date from tbl_resources rs where";
				$sql .= " rs.product_id='$resource_name' order by rs.id desc";
			}
			
			if(!empty($email) && !empty($resource_name))
			{
				$sql = "select rs.id, rs.product_id, rs.member_id, rs.type, rs.credits, rs.status, date_format(rs.date, '%Y-%m-%d') as date from tbl_resources rs where";
				$sql .= "  rs.member_id='$email' and rs.product_id='$resource_name' order by rs.id desc";
			}
			if(!empty($dateFrom) && !empty($dateTo))
			{
				$sql = "select rs.id, rs.product_id, rs.member_id, rs.type, rs.credits, rs.status, date_format(rs.date, '%Y-%m-%d') as date from tbl_resources rs where";
				$sql .= " date_format(rs.date, '%Y-%m-%d')>='$dateFrom' and date_format(rs.date, '%Y-%m-%d')<='$dateTo' order by rs.id desc";
			}
				
			if(!empty($dateFrom) && !empty($dateTo) && !empty($email) && !empty($resource_name))
			{
				$sql = "select rs.id, rs.product_id, rs.member_id, rs.type, rs.credits, rs.status, date_format(rs.date, '%Y-%m-%d') as date from tbl_resources rs where";
				$sql .= " date_format(rs.date, '%Y-%m-%d')>='$dateFrom' and date_format(rs.date, '%Y-%m-%d')<='$dateTo' and rs.member_id='$email' and rs.product_id='$resource_name' order by rs.id desc";
			}
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return ($result);
		}
		else
		{
			$this->db->select('tbl_resources.*');
			$this->db->from('tbl_resources');
			//$this->db->join('tbl_role','tbl_role.role_id = tbl_admins.user_role','left');
			if(!isEmpty($specificOption) && !isEmpty($specificValue)){
			   $this->db->like($specificOption,$specificValue);
			}
			$this->db->limit($limit, $start);
			$this->db->order_by('id','DESC');
			$query = $this->db->get();
			//echo $this->db->last_query(); 
			return $query->result_array();
			
			
		}
		
	}
	
	
	function index($id){
		//echo '==='.$user_id;die;
		$is_logged_in = $this->session->userdata('logged_in');
		//$escape=array("\'","\r\n");
		//$replace=array("'","");
		$text=str_replace("\'","'",$this->input->post('content'));
		$text=str_replace($replacestring,"",$this->input->post('content'));
		
		$text1 = str_replace($replacestring,"",$this->input->post('sub_content'));
		
		$text2 = str_replace($replacestring,"",$this->input->post('elb_content'));
		$text3 = str_replace($replacestring,"",$this->input->post('tnc_content'));
		//$content=mysql_real_escape_string($text);
		
		if($_FILES['file_name']['error']!= 4){
			$randno = rand();
			$string = str_replace(' ', '-',$_FILES['file_name']['name']);
			$clearimg = preg_replace('/[^A-Za-z0-9\-.]/', '', $string);
            $imgname = $randno."_".$clearimg;
			
			if($this->input->post('h_img')!=''){
				$linlk = base_url().'uploads/products/'.$this->input->post('h_img');
				unlink($linlk);
			}
             move_uploaded_file($_FILES['file_name']['tmp_name'],"uploads/products/".$imgname);			
		}
		else {
			$imgname= $this->input->post('h_img');
		}
		
		/*+++placeholder image++++*/
		if($_FILES['placeholder_img']['error']!= 4){
			$randno = rand();
			$string = str_replace(' ', '-',$_FILES['placeholder_img']['name']);
			$clearimg = preg_replace('/[^A-Za-z0-9\-.]/', '', $string);
            $plcimgname = $randno."_".$clearimg;
			
			if($this->input->post('h_plcimg')!=''){
				$linlk = base_url().'uploads/products/'.$this->input->post('h_plcimg');
				unlink($linlk);
			}
             move_uploaded_file($_FILES['placeholder_img']['tmp_name'],"uploads/products/".$plcimgname);			
		}
		else {
			$plcimgname= $this->input->post('h_plcimg');
		}
		
		$data = array('product_name' => $this->input->post('product_name'),
			'description' => $text,
			'sub_content' => $text1,
			'elb_content' => $text2,
			'tnc_content' => $text3,
			'placeholder_img' => $plcimgname,
			'file_name' => $imgname,
			'cat_id' => json_encode($this->input->post('categories[]')),
			'type' => $this->input->post('type'),
			'credits' => $this->input->post('credits'),
			//'meta_keyword' => $this->input->post('meta_keyword'),
		);
	//echo'<pre>';print_r($data);echo'</pre>'; die;
	$msg = 0;
	if( $id == 0 ){
		$this->db->insert('tbl_products', $data);
		$msg = ($this->db->affected_rows() > 0) ? 1 : 0;//for insert
	}else{
		$this->db->where('id',$id );
	    $this->db->update('tbl_products', $data); 
		//echo $this->db->last_query();die;
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
		$this->db->delete('tbl_resources', array('id' => $pageid));
		return ($this->db->affected_rows() != 1) ? false : true;
  	}
	
	function status($id,$status)
	{
				
                $this->db->where('id',$id );
				$this->db->set("status", $status);
				$this->db->update("tbl_resources");
				/* user alert about product activation*/
				$this->load->library('email'); 
				$config['charset'] = 'iso-8859-1';
				$config['wordwrap'] = TRUE;
				$config['mailtype'] = 'html';
				$email_send = selectEmailTemplate('product_approval');
				$username = $_POST['user_name'];
				$useremail = $_POST['resource_email'];
				$productname = $_POST['resource_name'];
				
			    $emailFindReplace = array(
						'##FROM_EMAIL##' => getSettingbyField(1,'admin_email'),
						'##SITE_NAME##' => 'WholeYou',
						'##SITE_URL##' => base_url(),
						'##USER##' => $username,	
						'##CLICK_HERE##' =>'<a href="'.base_url().'myaccount/myresources/">'.$productname.'</a>',					
					);
					
				$message = @strtr($email_send->email_text_content, $emailFindReplace);
				$subject = @strtr($email_send->subject, $emailFindReplace);
				$from= @strtr($email_send->from, $emailFindReplace);
				$this->email->initialize($config);
				$this->email->from($from, 'WholeYou');
				$this->email->to($useremail);
				$this->email->subject($subject);
                /* echo mailerTemplate($message); die; */
				$this->email->message(mailerTemplate($message));					
				$this->email->send();
  	}
	
	function count_all($startdate,$enddate,$specificOption,$specificValue){
		if(isset($_POST['search']))
		{
			
			$dateFrom = $_POST['date_from'];		
			$dateTo = $_POST['date_to'];		
			$email = $_POST['email'];	
			$resource_name = $_POST['resource_name'];
			$sql = '';
			
			if(!empty($email))
			{
				$sql = "select rs.id, rs.product_id, rs.member_id, rs.type, rs.credits, rs.status, date_format(rs.date, '%Y-%m-%d') as date from tbl_resources rs where";
				$sql .= " rs.member_id='$email' order by rs.id desc";
			}
			
			if(!empty($resource_name))
			{	
				$sql = "select rs.id, rs.product_id, rs.member_id, rs.type, rs.credits, rs.status, date_format(rs.date, '%Y-%m-%d') as date from tbl_resources rs where";
				$sql .= " rs.product_id='$resource_name' order by rs.id desc";
			}
			
			if(!empty($email) && !empty($resource_name))
			{
				$sql = "select rs.id, rs.product_id, rs.member_id, rs.type, rs.credits, rs.status, date_format(rs.date, '%Y-%m-%d') as date from tbl_resources rs where";
				$sql .= "  rs.member_id='$email' and rs.product_id='$resource_name' order by rs.id desc";
			}
			if(!empty($dateFrom) && !empty($dateTo))
			{
				$sql = "select rs.id, rs.product_id, rs.member_id, rs.type, rs.credits, rs.status, date_format(rs.date, '%Y-%m-%d') as date from tbl_resources rs where";
				$sql .= " date_format(rs.date, '%Y-%m-%d')>='$dateFrom' and date_format(rs.date, '%Y-%m-%d')<='$dateTo' order by rs.id desc";
			}
			if(!empty($dateFrom) && !empty($dateTo) && !empty($email) && !empty($resource_name))
			{
				$sql = "select rs.id, rs.product_id, rs.member_id, rs.type, rs.credits, rs.status, date_format(rs.date, '%Y-%m-%d') as date from tbl_resources rs where";
				$sql .= " date_format(rs.date, '%Y-%m-%d')>='$dateFrom' and date_format(rs.date, '%Y-%m-%d')<='$dateTo' and rs.member_id='$email' and rs.product_id='$resource_name' order by rs.id desc";
			}
			$query = $this->db->query($sql);
			return ($query->num_rows());
		}
		else
		{
			$this->db->select('*');
			if(!isEmpty($specificOption) && !isEmpty($specificValue)){
			   $this->db->like($specificOption,$specificValue);
			}
		   $query =   $this->db->get($this->tbl_resources);
		   return ($query->num_rows());
		}
		
	}
	
	/*function count_all($startdate,$enddate,$specificOption,$specificValue){
		
		
		$this->db->select('*');
		if(!isEmpty($specificOption) && !isEmpty($specificValue)){
		   $this->db->like($specificOption,$specificValue);
		}
		       $query =   $this->db->get($this->tbl_resources);
			return ($query->num_rows());
	}*/
	
	function page_info($id=0){
		$this->db->select('*');
		$this->db->from('tbl_products');
		if(!empty($id)){
		$this->db->where('id',$id);
		}
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function getEmail()
	{
		
		$query = $this->db->query("select distinct(member_id) from tbl_resources");
		return $query->result_array();
		
	}
	
	function getResourceName()
	{
		
		$query = $this->db->query("select distinct(product_id) from tbl_resources");
		return $query->result_array();
		
	}
	
	function getResources($id)
	{
		$query = $this->db->query("select * from tbl_resources where id=".$id);
		
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
      $url = $fdata[0]."uploads/products/" . $time."_".$_FILES['upload']['name'];
    }
	 
	$CKEditorFuncNum = $_GET['CKEditorFuncNum'] ;
	echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$message');</script>";
				
	
	
	}
	
	
}
?>
