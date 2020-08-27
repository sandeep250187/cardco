<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Site extends CI_Controller {
    public function __construct(){
	     parent::__construct();
	     is_logged_in();
	     $this->load->model('admin/M_setting');
	}
	public function index(){
		$data=array();
		$this->load->view(ADMIN_FOLDER.'/site/view_site',$data);
		}
		
		
		// Email
	public function emailtemplate($id=0){
	$this->load->library('ckeditor');
	$this->load->library('ckfinder');
    $this->ckeditor->basePath = base_url().'assets/ckeditor/';
	$this->ckeditor->config['language'] = 'eng';
	$this->ckeditor->config['width'] = '630px';
	$this->ckeditor->editor ='applyStyle';
    $this->ckeditor->config['height'] = '300px'; 
    //end ckeditor
    //isUserPermission('emailtemplate');
	   
	   $this->load->helper(array('form'));
	   $this->load->library('form_validation');
	   
	   $this->load->model('m_setting'); 
		if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
			
			$this->form_validation->set_rules('from', 'From', 'required');
			$this->form_validation->set_rules('subject', 'Subject', 'required');
			$this->form_validation->set_rules('content', 'Content', 'required');
			
			$seg = ''; 
			if($this->form_validation->run() == true)
	   		{	
				$data['sucmsg'] = $this->m_setting->edit_email();
				
				if($data['sucmsg']){
				  $this->session->set_flashdata('msg', 'Template updated successfully..');
				}
				redirect('admin/site/emailtemplate/', 'refresh');
			}
	 	}
	   if(!empty($id)){
		   //print_r($id);die;
		   
	      $data['template_detail'] =  $this->m_setting->email_templates_detail($id);
          $this->load->view(ADMIN_FOLDER.'/site/view_email_ajax',$data);
		  
	   } else { 	
	   $data['templates'] =  $this->m_setting->email_templates();   
	   $this->load->view(ADMIN_FOLDER.'/site/view_email_template',$data);
	   //print_r($data['templates']);die;
	   }
	}
	
	
	// Settings
	public function setting(){
		
		//isUserPermission('admin_setting');
	   $this->load->helper(array('form'));
	   $this->load->library('form_validation');
	   $this->load->model('m_setting');
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
				redirect('admin/site/setting/'.$seg, 'refresh');
			}
	 	}
		
	 	$data['setting'] = $this->m_setting->index(1);
		//echo'<pre>';print_r($data['setting']);	die;
         $this->load->view(ADMIN_FOLDER.'/site/view_setting',$data);		
	   //$this->load->view('view_setting',$data); 
	}
	
	public function info(){
		
		//isUserPermission('admin_setting');
	   $this->load->helper(array('form'));
	   $this->load->library('form_validation');
	   $this->load->model('m_setting');
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			
			$this->form_validation->set_rules('class', 'School Class', 'required');
			$this->form_validation->set_rules('stream', 'School Stream', 'required');
			$this->form_validation->set_rules('board', 'School Board', 'required');
			
			$this->form_validation->set_rules('course', 'College course', 'required');
			$this->form_validation->set_rules('branch', 'College branch', 'required');
			$this->form_validation->set_rules('university', 'College university', 'required');
			
			$this->form_validation->set_rules('dream', 'Dream Option', 'required');
			$this->form_validation->set_rules('problem', 'Problem Option', 'required');
			
			$seg = '';
			if($this->form_validation->run() == true)
	   		{	//echo'----';die;
				$data['sucmsg'] = $this->m_setting->info(1);
				if($data['sucmsg']){
				 $seg = 1;
				}
				redirect('admin/site/info/'.$seg, 'refresh');
			}else{
				//echo'------>>';die;
				$data['setting'] = $this->m_setting->info(1);
				//pr($data);
				$this->load->view(ADMIN_FOLDER.'/site/view_info',$data);	
			}
	 	}else{
		
	 	$data['setting'] = $this->m_setting->info(1);
		//echo'<pre>';print_r($data['setting']);	die;
         $this->load->view(ADMIN_FOLDER.'/site/view_info',$data);		
	   //$this->load->view('view_setting',$data); 
		}
	}
	
	public function collages(){
	     $this->load->model('m_setting');
	 	 $data['collages'] = $this->m_setting->collages();
         $this->load->view(ADMIN_FOLDER.'/site/view_collages_list',$data);		
	}
	public function collages_add(){
	   $this->load->helper(array('form'));
	   $this->load->library('form_validation');
	   $this->load->model('m_setting');
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->form_validation->set_rules('course', 'College course', 'required');
			$this->form_validation->set_rules('university', 'University', 'required');
			$this->form_validation->set_rules('year', 'College Year', 'required');
			$seg = '';
			if($this->form_validation->run() == true)
	   		{	
				$data['sucmsg'] = $this->m_setting->add_collage();
				redirect('admin/site/collages', 'refresh');
			}else{
				$this->load->view(ADMIN_FOLDER.'/site/add_collages',$data);	
			}
	 	}else{
         $this->load->view(ADMIN_FOLDER.'/site/add_collages',$data);		
		}
	}
	
	public function collages_edit($college_id){
	   $this->load->helper(array('form'));
	   $this->load->library('form_validation');
	   $this->load->model('m_setting');
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->form_validation->set_rules('course', 'College course', 'required');
			$this->form_validation->set_rules('university', 'University', 'required');
			$this->form_validation->set_rules('year', 'College Year', 'required');
			$seg = '';
			if($this->form_validation->run() == true)
	   		{	
				$data['sucmsg'] = $this->m_setting->update_collage($college_id);
				redirect('admin/site/collages', 'refresh');
			}else{
				$data['college_data'] = $this->m_setting->get_collage($college_id);
				$this->load->view(ADMIN_FOLDER.'/site/edit_collages',$data);	
			}
	 	}else{
		 $data['college_data'] = $this->m_setting->get_collage($college_id);
         $this->load->view(ADMIN_FOLDER.'/site/edit_collages',$data);		
		}
	}
	public function collages_del($college_id){
	    $this->load->model('m_setting');
		$data['sucmsg'] = $this->m_setting->collages_del($college_id);
		redirect('admin/site/collages', 'refresh');
	}

	
	
}
