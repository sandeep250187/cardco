<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller{
	
	public function __construct(){
	     parent::__construct();
		  $this->load->model('admin/Ad_admin');
		
	}
	
	public function index(){
		$is_logged_in = $this->session->userdata('penang_admin');
		if(!isEmpty($is_logged_in)){
			redirect('/'.ADMIN_FOLDER.'/admin');
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
		else{   
		redirect('/'.ADMIN_FOLDER.'/admin');
		}
	}
	
	public function check_database()
		{
		  $result = $this->Ad_admin->login($this->input->post('username'), $this->input->post('password'));
		  
		  if($result){
		    $sess_array = array();
		    foreach($result as $row){
		     $sess_array = array(
			'id' => $row->id,
			'username' =>$row->username,
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
	
}