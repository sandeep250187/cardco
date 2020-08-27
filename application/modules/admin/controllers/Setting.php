<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Setting extends CI_Controller{
	public function __construct(){
	     parent::__construct();
	     is_logged_in();
	     $this->load->model('admin/M_setting');
	}
	

		
	function index(){			
		
		$this->load->helper('form');
		$data['setting'] = $this->M_setting->listing();
		$this->load->view('admin/page/view_setting',$data);
	}
		
		
	//edit pages
	function edit($id)
	{
		/* add ckeditor tools */
		$this->load->library('ckeditor');
		$this->load->library('ckfinder');
		$data=array();
		$this->ckeditor->basePath = base_url().'assets/ckeditor/';
		$this->ckeditor->config['language']= 'eng';
		$this->ckeditor->config['width'] = '630px';
		$this->ckeditor->config['height'] = '300px';  
		$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'/admin/page/upload'; 
		/* add ckeditor tools */
	
	 $this->load->library('form_validation');
	 if(!empty($_POST)){
		    $this->form_validation->set_rules('clinic_name', 'Clinic Name', 'required');
			$this->form_validation->set_rules('admin_email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('admin_contact', 'Contact', 'required');
			
		
	 }
	 
	 if($this->form_validation->run() == true)
	   {   
		      $msg = $this->M_setting->index($id); 
			if(!empty($msg)){				
			   $this->session->set_flashdata('msg', 'Admin details update successfully');			
			  redirect(ADMIN_FOLDER.'/setting/');
			}
			//die('11');
	 }
	 else{
			/* $data['role'] =  $this->M_page->role(); */
			$this->load->helper(array('form'));
			$data['pages'] = $this->M_setting->listing();
			$this->load->view('admin/page/edit_setting',$data);
		}
		
	}
	
	
	
	/* delete payment entry */
	function delete($pageid){
		//isUserPermission('delete_user');
		if($this->M_page->delete($pageid))
			$this->session->set_flashdata('msg', 'Page Deleted successfully');
			redirect('/admin/page/listing/');
	}
	
	public function logout()
	{
		$CI =& get_instance();
		$is_logged_in = $CI->session->userdata('wholeyou_admin');
		if(!empty($is_logged_in))
		{
			$this->session->sess_destroy();
			redirect('admin/login');  
			die();
		}
		redirect('admin/login');
	}

	function status($id,$status){
		if($this->M_page->status($id,$status))
			$this->session->set_flashdata('msg', 'Page Updated successfully');
			redirect('/admin/page/listing/');
	}


}