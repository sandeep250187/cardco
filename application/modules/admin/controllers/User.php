<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {
        public function __construct(){
	     parent::__construct();
	     $this->load->model('admin/Ad_admin');
	}
        
	public function index()
	{
		$this->listing();
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
		$this->load->view(ADMIN_FOLDER.'/login',$data);
	}
                
    public function login_check()
		{  
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');
		if($this->form_validation->run() == FALSE)
		{
		   $this->session->set_flashdata('error_msg', 'Invalid Username Or Password');
		   redirect('/'.ADMIN_FOLDER.'/user/login');
		}
		else
		{    
		redirect('/'.ADMIN_FOLDER,'refresh');
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
						   //$this->Ad_admin->logoutTime($is_logged_in['id']);
						   //$this->session->sess_destroy();
						   //$this->session->unset_userdata('wholeyou_admin');
						   //redirect(ADMIN_FOLDER);
						   //die();
				  	       $this->session->unset_userdata('wholeyou_admin');
                           $this->session->sess_destroy();
                           
                           redirect('admin/','refresh');
				  }
					//redirect('admin');
		} 
                    
    function listing($offset=0,$search=''){
                is_logged_in();
		$this->load->helper('form');
		$limit = pagination_count;
		if($this->input->post('search')!=''){
		  $search = $this->input->post('search');
		}
		$data['user'] = $this->Ad_admin->userListing($limit,$offset,$search);
		$config['total_rows'] = $this->Ad_admin->countUsers();
		/* pagination start */
		$this->load->library('pagination');
		//$search_parameter="/";
		if(isset($_POST['search'])){
		 $search_parameter="/$search";	
		}
		else {
		 $search_parameter="/$search";
		}
		$config['first_url'] = site_url("admin/user/listing/0/".$search_parameter);
		$config['suffix']= $search_parameter;
		$config['base_url'] = site_url("admin/user/listing/");
		$config['per_page'] = pagination_count; 
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config); 
		$data["links"] = $this->pagination->create_links();
		$data['page'] = $offset;
		/*******/
		$this->load->view(ADMIN_FOLDER.'/user/view_listing',$data);
	}
        
        function add($user_id=0){
        is_logged_in();
        $data=array();    
	$this->load->library('form_validation');	
	if(!empty($_POST)){ 	
	$this->form_validation->set_rules('user_fname', 'First name', 'required');
	$this->form_validation->set_rules('user_email', 'Email', 'required|is_unique[tbl_admins.user_email]');
        $this->form_validation->set_message('is_unique[tbl_admins.user_email]', 'The email is already taken');
	$this->form_validation->set_rules('username', 'Username','required|min_length[5]|max_length[40]|is_unique[tbl_admins.username]');
        $this->form_validation->set_rules('user_password', 'Password', 'required');
    
	 }  
	 if($this->form_validation->run() == true)
	   {
		 $msg = $this->Ad_admin->addUser();
		 $this->session->set_flashdata('msg', 'User added successfully');
			redirect(ADMIN_FOLDER.'/user/listing/');
	   }
	 else{
			$this->load->helper(array('form'));
			$this->load->view(ADMIN_FOLDER.'/user/view_adduser',$data);
		}
	}     
        
        function edit($user_id=0,$page=0){
            is_logged_in();
        $this->load->library('form_validation');
        if(!empty($_POST)){
        $this->form_validation->set_rules('user_fname', 'First name', 'required');
        $this->form_validation->set_rules('user_email', 'Email', 'required|callback_check_email_exist');
        $this->form_validation->set_rules('username', 'Username','required|min_length[5]|max_length[40]|callback_check_username_exist');
        }
         if($this->form_validation->run() == true)
           {
            
                        $msg = $this->Ad_admin->editUser($user_id);
                        if(!empty($msg)){
                           $this->session->set_flashdata('msg', 'User updated successfully');
                        }
                        redirect(ADMIN_FOLDER.'/user/listing/'.$page.'/');
         }
         else{
                        $this->load->helper(array('form'));
                        $data['user'] = $this->Ad_admin->user_info($user_id);
                        $data['page'] = $page;
                        $this->load->view(ADMIN_FOLDER.'/user/view_edituser',$data);
                }	
        }
        
        function check_email_exist() {
                $res=$this->Ad_admin->check_exist($this->input->post('user_id'),'user_email',$this->input->post('user_email'));
                if(empty($res))
                {
                    return TRUE;
                } else {
                    $this->form_validation->set_message('check_email_exist', 'Email already exist.');
                    return FALSE;
                }
        }
        
        function check_username_exist() {    
                $res=$this->Ad_admin->check_exist($this->input->post('user_id'),'username',$this->input->post('username'));
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
		if($this->Ad_admin->userDelete($user_id))
			$this->session->set_flashdata('msg', 'User deleted successfully');
			redirect(ADMIN_FOLDER.'/user/listing/'.$page,'refresh');
	}
        
        function status($user_id,$status,$page=1){
            is_logged_in();
		if($this->Ad_admin->userStatus($user_id,$status)){
			$this->session->set_flashdata('msg', 'User status updated successfully');
			redirect(ADMIN_FOLDER.'/user/listing/'.$page,'refresh');
			}
	    }
		function block($user_id,$status,$page=1){
            is_logged_in();
		if($this->Ad_admin->blockStatus($user_id,$status)){
			$this->session->set_flashdata('msg', 'User Block status updated successfully');
			redirect(ADMIN_FOLDER.'/user/listing/'.$page,'refresh');
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
			$user_email = $email;
			$user_id = $this->Ad_admin->forgotPass($email);
			if(!empty($user_id))
			{
                    $user_data=$this->Ad_admin->user_info($user_id);
                    $pass=$user_data[0]['org_password'];
                            
					$this->load->library('email'); 
					$config['charset'] = 'iso-8859-1';
					$config['wordwrap'] = TRUE;
					$config['mailtype'] = 'html';
					$this->email->initialize($config);
					$this->email->from('admin@kerlinks.com', 'Video app');
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
        
}
