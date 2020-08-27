<?php
  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   class User extends CI_Controller{
	public function __construct(){
	     parent::__construct();
			$this->load->model('user/M_user');
			 }
			 
	public function index()
	{
		$this->load->view('my_profile');
	}

	public function register(){
  		$this->load->view('register');
	}

	public function saveregister(){
		$this->load->helper(array('form'));
	    $this->load->library('form_validation');
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			 $this->form_validation->set_rules('username', 'Username', 'required');
			 $this->form_validation->set_rules('password', 'Password', 'required');
			 $this->form_validation->set_rules('comp_name', 'Company Name', 'required');
			 $this->form_validation->set_rules('fname', 'First Name', 'required');
			 $this->form_validation->set_rules('lname', 'Last Name', 'required');
			 $this->form_validation->set_rules('email', 'Email', 'required');
			 $this->form_validation->set_rules('country', 'Country', 'required');
			 $this->form_validation->set_rules('city1', 'City', 'required');
			 $this->form_validation->set_rules('address', 'Address', 'required');
			 $this->form_validation->set_rules('pin', 'Pin', 'required');
			 $this->form_validation->set_rules('mobile', 'Mobile number', 'required');
			 $this->form_validation->set_rules('about', 'About', 'required');
			 $this->form_validation->set_rules('fdate', 'Founding Date', 'required');
			 $this->form_validation->set_rules('staf', 'Staff', 'required');
			 $this->form_validation->set_rules('pan', 'Pan No.', 'required');
			 if($this->form_validation->run() == true){
			 	$result = $this->M_user->saveregister();
			    if($result){
			    	$this->session->set_flashdata('msg', 'Registration successfully!');
				 	//echo "Registration successfully";
			    }else{
					echo "Registration not successfully";  
			    }
			 }
				
			 
		}
	}

	public function myaccount(){
		   $this->load->view('my_account');
	  }

	   public function logout(){
    	$is_logged_in = $this->session->userdata('userid');
	   if(!empty($is_logged_in)){
		    $this->session->unset_userdata('userid');
            $this->session->sess_destroy();
            redirect(base_url());
		}
	  }
	
	 public function back(){
	  	  $this->load->view('my_account');
	  }

	  public function editprofile(){
	  	$this->load->view('editprofile');
	  }
	  
	  public function update(){
		  if(isset($_POST)){
			 $result=$this->M_user->update(); 
			 if($result){
				 echo "1";
			 }else{
				 echo "0";
			 }
		  }
	  }

	  public function changepswdview(){
	  	$this->load->view('changepassword');
	  }
	
	 public function changepassword(){
	 	if(isset($_POST)){
			 $result=$this->M_user->changepassword(); 
			 if($result){
				 echo "1";
			 }else{
				 echo "0";
			 }
		  }
		  
	 }
  
	 
}
   
?>