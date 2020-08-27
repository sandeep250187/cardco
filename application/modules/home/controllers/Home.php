<?php
   if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   class Home extends CI_Controller{
	public function __construct(){
	     parent::__construct();

	      $this->load->model('home/M_home');
	      
	}

	public function index(){
		$this->load->view('view_home');
    }
    
    public function login(){
		if(isset($_POST))
		{
		  if($_POST['email']!='' && $_POST['password']!=''){		
		   $result = $this->M_home->login();
		   if($result){
				$this->session->set_userdata('userid',$result['id']);
				echo "1";
			}
			else{
				 echo "0";
			}
		 }
	    } 
    }
   
	public function forgetpswd(){
		if($_POST['email']!=''){
			$result=$this->M_home->forgetpswd();
			if($result){
				$this->load->library('email'); 
				$config['charset'] = 'iso-8859-1';
				$config['wordwrap'] = TRUE;
				$config['mailtype'] = 'html';
				$email_send = selectEmailTemplate('forgot_password');
				$sendemail =  'noreply@penang.tours';

				$emailFindReplace = array(
						'##FROM_EMAIL##' => $sendemail,
						'##LOGIN_URL##' => base_url(),
						'##SITE_NAME##' => 'PENANG TOURS',
						'##PASSWORD##' => $result['password'],
						'##USER##' => $result['fname'],
						
					);
					
					$message = strtr($email_send->email_text_content, $emailFindReplace);
					$subject = strtr($email_send->subject, $emailFindReplace);
					$from= strtr($email_send->from, $emailFindReplace);
				    $this->email->initialize($config);
					$this->email->from('penangtours@gmail.com');
					$this->email->to($this->input->post('email'));
					$this->email->subject($subject);
					$this->email->message(mailerTemplate($message));				    
				    if($this->email->send()){
				    	$data['send'] = "send";
				    }
				echo "1";
			}else{
				echo "0";
			}
		}
	}
	
	 
	  public function back(){
	  	  $this->load->view('my_account');
	  }
	  
}
