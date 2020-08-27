<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Member extends CI_Controller {
        public function __construct(){
	     parent::__construct();
	     $this->load->model('admin/Ad_member');
	}
        
	public function index()
	{
		$this->add();
	}
        
	public function login(){
		$is_logged_in = $this->session->userdata('wholeyou_admin');
		if(!isEmpty($is_logged_in)){
			redirect(ADMIN_URL,'refresh');
		}
		$this->load->helper(array('form'));
		$data=array();
		if(isset($_COOKIE['cook'])){
			$data['remember'] = $_COOKIE['cook'];
			$data['username'] = $_COOKIE['cook_user'];
			$data['password'] = $_COOKIE['cook_pass'];
		}
		$this->load->view(ADMIN_FOLDER.'/user/login',$data);
	}
                
        public  function login_check()
		{  
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');
		if($this->form_validation->run() == FALSE)
		{
		   $this->session->set_flashdata('error_msg', 'Invalid Username Or Password');
		   redirect('/'.ADMIN_FOLDER.'/user/login');
		}
		else{    redirect('/'.ADMIN_FOLDER,'refresh');
		}
		}
              
        public  function check_database()
		{
		  $result = $this->Ad_admin->login($this->input->post('username'), $this->input->post('password'));
		  if($result){
		    $sess_array = array();
		    foreach($result as $row){
		      $sess_array = array(
			'id' => $row->user_id,
			'username' => $row->username,
		      );
		      $this->session->set_userdata('wholeyou_admin', $sess_array);
			}
			/**Set cookie
			*/
			$this->load->helper('cookie');
			$cookie_time = time()+3600*24;
			$cookie_unset = time()-3600*24;
			if($this->input->post('remember') == "on"){
			       set_cookie('cook_user1',$this->input->post('username'),$cookie_time);
			       set_cookie('cook_pass1',$this->input->post('password'),$cookie_time);
			       set_cookie('cook1',$this->input->post('remember'),$cookie_time);
			}else{
			       if(isset($_COOKIE['cook_user1']) && !empty($_COOKIE['cook_user1']) ){
				       set_cookie('cook_user1','', $cookie_unset);
				   set_cookie('cook_pass1','', $cookie_unset);
				   set_cookie('cook1','', $cookie_unset);
			       }
			}
		    return TRUE;
		  }
		  else
		  {
		    $this->form_validation->set_message('check_database', 'Invalid username or password');
		    return false;
		  }
		}
                
		public function logout()
		{
			   $CI =& get_instance();
			   $is_logged_in = $CI->session->userdata('wholeyou_admin');
				  if(!empty($is_logged_in))
				  {
						   $this->Ad_admin->logoutTime($is_logged_in['id']);
						   $this->session->sess_destroy();
						   redirect(ADMIN_FOLDER.'/user/login');
						   die();
				  }
					redirect('admin');
		} 
                    
    function listing($offset=0,$fname='null',$email='null',$from='null',$to='null')
	{
   	    is_logged_in();
		$this->load->helper('form');
		$limit = pagination_count;
		if($this->input->post('fname')!=''){
		  $fname = $this->input->post('fname');
		}
		if($this->input->post('email')!=''){
		  $email = $this->input->post('email');
		}
		if($this->input->post('from')!=''){
		  $from = $this->input->post('from');
		}
		if($this->input->post('to')!=''){
		  $to = $this->input->post('to');
		}
		$data['user'] = $this->Ad_member->userListing($limit,$offset,$fname,$email,$from,$to);
		$config['total_rows'] = $this->Ad_member->countUsers($fname,$email,$from,$to);
		/* pagination start */
		$this->load->library('pagination');
		//$search_parameter="/";
		if(isset($_POST['search']))
		{
			$search_parameter="/$fname/$email/$from/$to";	
		}
		else 
		{
			$search_parameter="/$fname/$email/$from/$to";
		}
		$config['first_url'] = site_url("admin/member/listing/0/".$search_parameter);
		$config['suffix']= $search_parameter;
		$config['base_url'] = site_url("admin/member/listing/");
		$config['per_page'] = pagination_count; 
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config); 
		$data["links"] = $this->pagination->create_links();
		$data['page'] = $offset;
		/*******/
		$data['fname'] = $fname;
		$data['email'] = $email;
		$data['from'] = $from;
		$data['to'] = $to;
		$this->load->view(ADMIN_FOLDER.'/member/view_listing', $data);
		
	}
        
    function add($user_id=0){
      
   	    is_logged_in();
		$this->load->library('Ckeditor');
		$this->load->library('Ckfinder');
        $data=array();
        $this->ckeditor->basePath = base_url().'assets/ckeditor/';
		$this->ckeditor->config['language']= 'eng';
		$this->ckeditor->config['width'] = '630px';
		$this->ckeditor->config['height'] = '300px'; 
		$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'/admin/products/upload'; 	
		$this->load->helper(array('form'));		
		$this->load->library('form_validation');	
	
		if(!empty($_POST)){ 	
				$this->form_validation->set_rules('fname', 'First Name', 'required');
				$this->form_validation->set_rules('user_email', 'Email', 'required|is_unique[tbl_members.email]|callback_check_username');
				$this->form_validation->set_message('is_unique[tbl_members.email]', 'The email is already taken');
				$this->form_validation->set_rules('password', 'Password', 'required');
				$this->form_validation->set_rules('org_password', 'Confirm Password', 'required');
				$this->form_validation->set_rules('username', 'Username', 'required|is_unique[tbl_members.username]'); 
				$this->form_validation->set_rules('location', 'Location', 'required');
				$this->form_validation->set_rules('mobile', 'Mobile', 'required');
				if($_POST['is_iframe'] == 1)
				{
				$this->form_validation->set_rules('clinic_name', 'Clinic Name', 'required');
				/* $this->form_validation->set_rules('c_location', 'Clinic Description', 'required');
				$this->form_validation->set_rules('c_email', 'Clinic Email', 'required');
				$this->form_validation->set_rules('c_phone', 'Clinic Mobile', 'required');	
				$this->form_validation->set_rules('c_video', 'Clinic Video', 'required');	 */
				$this->form_validation->set_rules('ifr_start_date', 'IFrame Start Date', 'required');	
				$this->form_validation->set_rules('ifr_end_date', 'IFrame End Date', 'required');	
				}
				if($_POST['is_tablet'] == 1)
				{
				$this->form_validation->set_rules('clinic_name', 'Clinic Name', 'required');

				$this->form_validation->set_rules('tablet_pin', 'Tablet Pin', 'required|is_unique[tbl_members.tablet_pin]');
				$this->form_validation->set_message('is_unique[tbl_members.tablet_pin]', 'The Tablet Pin is already exist');
				
				$this->form_validation->set_rules('tab_start_date', 'Tablet Start Date', 'required');	
				$this->form_validation->set_rules('tab_end_date', 'Tablet End Date', 'required');	
					
				}
		 }  
		 if($this->form_validation->run() == true)
		   {
			 $msg = $this->Ad_member->addUser();
			 $this->session->set_flashdata('msg', 'Member added successfully');
				redirect(ADMIN_FOLDER.'/member/listing/');
		   }
		 else
			{
				$this->load->helper(array('form'));
				$this->load->view(ADMIN_FOLDER.'/member/view_adduser',$data);
			}
	}

	public function check_username()
		{
		  $result = $this->Ad_member->check_username($this->input->post('username'));
		    if(empty($result))
			{
				return TRUE;
			} 
			else
			{
				$this->form_validation->set_message('check_username', 'Username already exist.');
				return FALSE;
			}
		}
		
	function upload()
   {
	
	$time = time();
	
	$url = 'uploads/member/'.$_FILES['upload']['name'];

	/* extensive suitability check before doing anything with the file... */
    if (($_FILES['upload'] == "none") OR (empty($_FILES['upload']['name'])) )
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
	  	 
	  @move_uploaded_file($_FILES['upload']['tmp_name'], "uploads/member/".$_FILES['upload']['name']);
	
      /* $move = @ move_uploaded_file($_FILES['upload']['tmp_name'], $url); */
	  
   
		$url = base_url().'uploads/member/'.$_FILES['upload']['name'];
		}
		 
		$CKEditorFuncNum = $_GET['CKEditorFuncNum'] ;
		echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$message');</script>";	
		
		}
        
		
		
		function view($user_id=0,$page=0){
			
			is_logged_in();
			$data['user'] = $this->Ad_member->user_info($user_id);
			$data['page'] = $page;
			$this->load->view(ADMIN_FOLDER.'/member/view_member_details',$data);
        	
        }
		
        function edit($user_id=0,$page=0){
         is_logged_in();
		 $this->load->library('ckeditor');
		$this->load->library('ckfinder');
		$data=array();
		$this->ckeditor->basePath = base_url().'assets/ckeditor/';
		$this->ckeditor->config['language']= 'eng';
		$this->ckeditor->config['width'] = '630px';
		$this->ckeditor->config['height'] = '300px';  
		$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'/admin/products/upload'; 
        $this->load->library('form_validation');
        if(!empty($_POST)){
        $this->form_validation->set_rules('fname', 'First name', 'required');
		$this->form_validation->set_rules('location', 'Location', 'required');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required');
        $this->form_validation->set_rules('new_password', 'New Password','min_length[5]|max_length[40]');
        }
         
		 
		 if($this->form_validation->run() == true)
           {
					     
                    $msg = $this->Ad_member->editUser($user_id);
                    if(!empty($msg)){
                           $this->session->set_flashdata('msg', 'User updated successfully');
                    }
                    redirect(ADMIN_FOLDER.'/member/listing/'.$page.'/');
			}
         else
			{
                    $this->load->helper(array('form'));
                    $data['user'] = $this->Ad_member->user_info($user_id);
                    $data['page'] = $page;
                    $this->load->view(ADMIN_FOLDER.'/member/view_edituser',$data);
            }	
        
		
		}
        
        function check_email_exist() {
                $res=$this->Ad_member->check_exist($this->input->post('user_id'),'email',$this->input->post('email'));
                if(empty($res))
                {
                    return TRUE;
                } 
				else
				{
                    $this->form_validation->set_message('check_email_exist', 'Email already exist.');
                    return FALSE;
                }
        }
        
        function check_username_exist() {    
                $res=$this->Ad_member->check_exist($this->input->post('user_id'),'username',$this->input->post('username'));
                if(empty($res))
                {
                    return TRUE;
                } else {
                    $this->form_validation->set_message('check_username_exist', 'Username already exist.');
                    return FALSE;
                }
        }
        
        function delete($user_id,$page=1){
            is_logged_in();
		if($this->Ad_member->userDelete($user_id))
			$this->session->set_flashdata('msg', 'User deleted successfully');
			redirect(ADMIN_FOLDER.'/member/listing/'.$page,'refresh');
		}
        
        function status($user_id,$status,$page=1){
            is_logged_in();
		if($this->Ad_member->userStatus($user_id,$status)){
			$this->session->set_flashdata('msg', 'User status updated successfully');
			redirect(ADMIN_FOLDER.'/member/listing/'.$page,'refresh');
			}
	    }
		function block($user_id,$status,$page=1){
            is_logged_in();
		if($this->Ad_member->blockStatus($user_id,$status)){
			$this->session->set_flashdata('msg', 'User Block status updated successfully');
			redirect(ADMIN_FOLDER.'/member/listing/'.$page,'refresh');
			}
	    }
        
        
        function change_password(){
            is_logged_in();
            $data=array();    
            $this->load->library('form_validation');	
            if(!empty($_POST)){ 	
            $this->form_validation->set_rules('old_password', 'Old Password', 'required|callback_check_old_password');
            $this->form_validation->set_rules('new_password', 'New Password', 'required');
             }  
             if($this->form_validation->run() == true)
               {
                     $msg = $this->Ad_admin->change_password(getCurUserID(),$this->input->post('new_password'));
                     
                     $this->session->set_flashdata('msg', 'Password updated successfully');
                    
                            redirect(ADMIN_FOLDER.'/user/change_password');
               }
             else{
                            $this->load->helper(array('form'));
                            $this->load->view(ADMIN_FOLDER.'/user/view_change_password',$data);
                    }
	}    
        
        function check_old_password(){
            $isValid=$this->Ad_admin->check_old_password($this->input->post('old_password'),getCurUserID());
                if(!empty($isValid))
                {
                    return TRUE;
                } else {
                    $this->form_validation->set_message('check_old_password', 'Old password is not correct.');
                    return FALSE;
                }
        }
        
        
        function forgot_password(){
            $this->load->helper(array('form'));
                  if($this->input->method()=='post'){
                        $email = $this->input->post('forgot_email');
			$user_email=$email;
			$user_id=$this->Ad_admin->forgotPass($email);
			if(!empty($user_id))
			{
                            $user_data=$this->Ad_admin->user_info($user_id);
                            $pass=$user_data[0]['org_password'];
                            
					$this->load->library('email'); 
					$config['charset'] = 'iso-8859-1';
					$config['wordwrap'] = TRUE;
					$config['mailtype'] = 'html';
					$this->email->initialize($config);
					$this->email->from('dev.demo.info@gmail.com', 'Video app');
					$this->email->to($user_email);
					$this->email->subject('Password recovery');
					$siteUrl='<br><a href='.base_url().'>Click here to Log in!</a>';
					$this->email->message('Your password is '.$pass.'<br>'.$siteUrl);
					$this->email->send();
					$this->email->clear(TRUE);
					$this->session->set_flashdata('msg', 'New password sent to your email.');
                                        
                                        $this->session->set_flashdata('msg', 'Password sent to your email address.');
				        $this->load->view(ADMIN_FOLDER.'/user/login');	
			}
			else
			{
                                
                                $this->session->set_flashdata('error_msg', 'Emai address is not exist.');
				$this->load->view(ADMIN_FOLDER.'/user/login');
			}
            }
        }
		
		function deliveryInfo($memberId)
		{
			if(isset($_POST['submit']))
			{
				$this->Ad_member->UpdateUserShipping($memberId);
				redirect(ADMIN_FOLDER.'/member/deliveryinfo/'.$memberId);
			}
			else
			{
				$data = array();
				$data['userinfo'] = $this->Ad_member->UserShippingInfo($memberId);
			}
			
			$this->load->view(ADMIN_FOLDER.'/member/view_adduser_delivery', $data);
		}
        
		
		function addCredit($memberId)
		{	
			if(isset($_POST['submit']))
			{
				$msg = $this->Ad_member->addCredit($memberId);
				redirect(ADMIN_FOLDER.'/member/creditdetails/'.$memberId);		
			}
			else
			{
				$data = array();	 
				$this->load->view(ADMIN_FOLDER.'/member/view_adduser_credit_additional', $data);
			}
		}
		
		function creditDetails($id)
		{
			$data['creditDetails'] = $this->Ad_member->creditListing($id);
			$this->load->view(ADMIN_FOLDER.'/member/view_creditlisting', $data);
			
		}
        
		
}
