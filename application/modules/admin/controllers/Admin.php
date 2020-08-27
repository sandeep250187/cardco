<?php 
   if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   class Admin extends CI_Controller{
	public function __construct(){
	     parent::__construct();
	     is_logged_in();
	     $this->load->model('admin/M_admin'); 
	}
	
	public function index(){
		   $this->load->helper(array('form'));
		   $data = array();
		   $this->load->view('view_home',$data);
		}
		
	public function logout()
	{
		$CI =& get_instance();
		$is_logged_in = $this->session->userdata('wholeyou_admin');
		if(!empty($is_logged_in))
		{
			$this->m_admin->logoutTime($is_logged_in['id']);
			$this->session->unset_userdata('wholeyou_admin');
			redirect('admin/login');  
			die();
		}
		redirect('admin/login');
	}

		
		
	function setting(){
		
       /* isUserPermission('admin_setting'); */
	   $this->load->helper(array('form'));
	   $this->load->library('form_validation');
	   $this->load->model('admin/M_setting');
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			
			$this->form_validation->set_rules('admin_email', 'Email', 'required');
			$this->form_validation->set_rules('invoice_from', 'Invoice from', 'required');
			//$this->form_validation->set_rules('defaultRMB', 'Default RMB', 'required');
			
			$seg = '';
			if($this->form_validation->run() == true)
	   		{	
				$data['sucmsg'] = $this->m_setting->index(1);
				if($data['sucmsg']){
				 $seg = 1;
				}
				redirect('admin/setting/'.$seg, 'refresh');
			}
	 	}
		
	 	$data['setting'] = $this->m_setting->index(1);
		//echo'<pre>';print_r($data['setting']);	die;	
	   $this->load->view('view_setting',$data); 
	   
	}	
		
		
		
	/* email template */
	
   function email_template($id=0)
   {
   //ckeditor
   $this->load->library('ckeditor');

   $this->load->library('ckfinder');


    $this->ckeditor->basePath = base_url().'assets/ckeditor/';

	$this->ckeditor->config['language'] = 'eng';

	$this->ckeditor->config['width'] = '630px';
	
	$this->ckeditor->editor ='applyStyle';

	$this->ckeditor->config['height'] = '300px';            
   //end ckeditor
       /* isUserPermission('email_template'); */
	   $this->load->helper(array('form'));
	   $this->load->library('form_validation');
	   $this->load->model('admin/M_setting');
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			
			$this->form_validation->set_rules('from', 'From', 'required');
			$this->form_validation->set_rules('subject', 'Subject', 'required');
			$this->form_validation->set_rules('content', 'Content', 'required');
			
			$seg = '';
			if($this->form_validation->run() == true)
	   		{	
				$data['sucmsg'] = $this->M_setting->edit_email();
				if($data['sucmsg']){
				  $this->session->set_flashdata('msg', 'Template updated successfully..');
				}
				redirect('admin/email_template/', 'refresh');
			}
	 	}
	   if(!empty($id)){
	      $data['template_detail'] =  $this->M_setting->email_templates_detail($id);	
	      $this->load->view(ADMIN_FOLDER.'/mailer/view_email_ajax',$data); 
	   } else {	
	   $data['templates'] =  $this->M_setting->email_templates();	
	   $this->load->view(ADMIN_FOLDER.'/mailer/view_email_template',$data); 
	   }
	   
   }	
	
	
	


}