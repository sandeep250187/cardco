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
		$this->load->helper(array('form'));
	    $this->load->library('form_validation');
	    $this->load->helper('captcha');
	    if($_SERVER['REQUEST_METHOD'] == 'POST'){
			     $this->form_validation->set_rules('username', 'Username', 'required');
			     $this->form_validation->set_rules('password', 'Password', 'required');
				 $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required');
				 $this->form_validation->set_rules('comp_name', 'Company Name', 'required');
				 $this->form_validation->set_rules('fname', 'First Name', 'required');
				 $this->form_validation->set_rules('lname', 'Last Name', 'required');
				 $this->form_validation->set_rules('regsemail', 'Email', 'required');
				 $this->form_validation->set_rules('country', 'Country', 'required');
				 $this->form_validation->set_rules('city1', 'City', 'required');
				 $this->form_validation->set_rules('address', 'Address', 'required');
				 $this->form_validation->set_rules('pin', 'Pin', 'required');
				 $this->form_validation->set_rules('mobile', 'Mobile number', 'required');
				 $this->form_validation->set_rules('about', 'About', 'required');
				 $this->form_validation->set_rules('fdate', 'Founding Date', 'required');
				 $this->form_validation->set_rules('staf', 'Staff', 'required');
				 $this->form_validation->set_rules('pan', 'Pan No.', 'required');
				 $this->form_validation->set_rules('captcha', 'captcha', 'required');
				 if($this->form_validation->run() == true){
				 	$inputCaptcha = $this->input->post('captcha');
                    $sessCaptcha = $this->session->userdata('captchaCode');
                  if($inputCaptcha === $sessCaptcha){
                		$result = $this->M_user->saveregister();
                		if($result){
                			$randno = rand();
                			$this->load->library('email');
                			$name= $this->input->post('fname'); 
							$config['charset'] = 'iso-8859-1';
							$config['wordwrap'] = TRUE;
							$config['mailtype'] = 'html';
							$email_send = selectEmailTemplate('user_confirmation');
							$sendemail = 'noreply@penang.tours';
 							$emailFindReplace = array(
									'##FROM_EMAIL##' => $sendemail,
									'##CLICK_HERE##' => base_url().'confirmuser/index/'. $randno,
									'##SITE_NAME##' => 'PENANG TOURS',
									'##USER##' => $name
								  );
  							$message = strtr($email_send->email_text_content, $emailFindReplace);
							$subject = strtr($email_send->subject, $emailFindReplace);
							$from= strtr($email_send->from, $emailFindReplace);
						    $this->email->initialize($config);
							$this->email->from('penangtours@gmail.com');
							$this->email->to($this->input->post('regsemail'));
							$this->email->subject($subject);
							$this->email->message(mailerTemplate($message));
							 if($this->email->send()){
						    	$data['send'] = "send";
				              }	
				    	 	$this->session->set_flashdata('msg', 'Registration successfully!');
				    	 	redirect(base_url().'user/register','refresh');
					 	}else{
							$this->session->set_flashdata('msg', 'Registration not successfully!');
				        }
                  }else{
                  $this->session->set_flashdata('msg', 'Captcha code does not match, please try again!');
                	 }
				 } 
		    }
		           $config = array(
						'img_path'      => 'captcha_images/',
						'img_url'       => base_url().'captcha_images/',
						'img_width'     => 200,
						'img_height'    => 50,
						'word_length'   => 5,
						//'font_path'  => '/assets/fonts/OpenSans-Bold.ttf',
						'font_size'   => 600
			         );
			         $captcha = create_captcha($config);
			         $this->session->unset_userdata('captchaCode');
			         $this->session->set_userdata('captchaCode', $captcha['word']);
			         $data['captchaImg'] = $captcha['image'];

  		         $this->load->view('register',$data);
	}


	public function refresh(){
		$this->load->helper('captcha');
		  $config = array(
            'img_url' => base_url() . 'captcha_images/',
            'img_path' => 'captcha_images/',
            'img_height' => 50,
            'word_length' => 5,
            'img_width' => '200',
            'font_size' => 25
        );
        $captcha = create_captcha($config);
        $this->session->unset_userdata('captchaCode');
        $this->session->set_userdata('captchaCode', $captcha['word']);
        echo $captcha['image'];
 
    }


	 public function checkEmailExist() {
	 	  $email= $this->input->post('email'); 
	 	$res=$this->M_user->check_exist($email);
		if($res)
        {
	 	 	echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Email Already Exist!...</label>';  
         }else{
	 	    return 0;
        }
    }

    public function statecountry() {
     	 $id=$this->input->post('cntry');
     	 $res=$this->M_user->statecountry($id);
     	 header('Content-Type: application/json');
		 echo json_encode(array('states'=>$res)); exit;
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
	  	$this->load->helper(array('form'));
	    $this->load->library('form_validation');
	  	if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->form_validation->set_rules('uname', 'Username', 'required');
			$this->form_validation->set_rules('cname', 'Company Name', 'required');
			$this->form_validation->set_rules('firstname', 'First Name', 'required');
			$this->form_validation->set_rules('lastname', 'Last Name', 'required');
			$this->form_validation->set_rules('country', 'Country', 'required');
			$this->form_validation->set_rules('city1', 'City', 'required');
			$this->form_validation->set_rules('place', 'Address', 'required');
			$this->form_validation->set_rules('pincode', 'Pin', 'required');
			$this->form_validation->set_rules('mobile', 'Mobile number', 'required');
			$this->form_validation->set_rules('about', 'About', 'required');
			$this->form_validation->set_rules('fndate', 'Founding Date', 'required');
			$this->form_validation->set_rules('staff', 'Staff', 'required');
			$this->form_validation->set_rules('panno', 'Pan No.', 'required');
			if($this->form_validation->run() == true){
				$id=$this->input->post('regid');
				$result = $this->M_user->editprofile($id);
				if($result){
				    $this->session->set_flashdata('msg', 'Profile updated successfully!');
				}else{
					 $this->session->set_flashdata('msg', 'Profile not updated!');
					 }
				}
		}
	  		$this->load->view('editprofile');
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