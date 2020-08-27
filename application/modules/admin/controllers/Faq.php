<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Faq extends CI_Controller{
	public function __construct(){
	     parent::__construct();
	     is_logged_in();
	     $this->load->model('admin/M_faq');
	}
	
	public function index(){
		
		$this->load->library('Ckeditor');
		$this->load->library('Ckfinder');
		$data['priority']=$this->M_faq->faq_length();
		$this->ckeditor->basePath = base_url().'assets/ckeditor/';
		$this->ckeditor->config['language']= 'eng';
		$this->ckeditor->config['width'] = '630px';
		$this->ckeditor->config['height'] = '300px'; 	
		$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'/admin/page/upload'; 	
		$this->load->helper(array('form'));
	    $this->load->library('form_validation');
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$this->form_validation->set_rules('faq_title', 'Faq Title', 'required');
			$this->form_validation->set_rules('content', 'Content', 'required');
			$this->form_validation->set_rules('priority', 'Priority', 'required');
		
		
			if($this->form_validation->run() == true)
	   		{	
				$this->M_faq->addfaq();
				$this->session->set_flashdata('msg', 'Faq added successfully!');
				redirect('admin/faq/listing', 'refresh');
			}
	 	}
	 
	   $this->load->view('admin/faq/add_faq',$data); 
	
	}
	
	function upload()
		{
	
	$time = time();
	
	$url = 'uploads/'.$_FILES['upload']['name'];

	//extensive suitability check before doing anything with the file...
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
	  	 
	  @move_uploaded_file($_FILES['upload']['tmp_name'], "uploads/".$_FILES['upload']['name']);
	
      //$move = @ move_uploaded_file($_FILES['upload']['tmp_name'], $url);
	  
   
		$url = base_url().'uploads/'.$_FILES['upload']['name'];
		}
		 
		$CKEditorFuncNum = $_GET['CKEditorFuncNum'] ;
		echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$message');</script>";	
		}	
		
	function listing($offset=0,$startdate=0,$enddate=0,$specificOption=0,$specificValue=0){			
		
		$this->load->helper('form');
		$limit = pagination_count;		
		if($this->input->post('startdate')!='')
		{
			$startdate=$this->input->post('startdate');
		}
		if($this->input->post('enddate')!='')
		{
			$enddate=$this->input->post('enddate');
		}
		if($this->input->post('specificOption')!='')
		{
			$specificOption=$this->input->post('specificOption');
		}
		if($this->input->post('specificValue')!='')
		{
			$specificValue=$this->input->post('specificValue');
		}
		$data['faqs'] = $this->M_faq->listing($limit,$offset,$startdate,$enddate,$specificOption,$specificValue);
		$config['total_rows'] = $this->M_faq->count_all($startdate,$enddate,$specificOption,$specificValue);
		/* pagination start */
		$this->load->library('pagination');
		$search_parameter="/$startdate/$enddate/$specificOption/$specificValue";
		$config['first_url'] = site_url("admin/faq/listing/0/".$search_parameter);
		$config['suffix']= $search_parameter;
		$config['base_url'] = site_url("admin/faq/listing/");
		$config['per_page'] = $limit; 
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config); 
		$data["links"] = $this->pagination->create_links();
		$data['page'] = $offset;
		/*******/
		$data['startdate'] = $startdate;
		$data['enddate'] = $enddate;
		$data['specificOption'] = $specificOption;
		$data['specificValue'] = $specificValue;
		
		$this->load->view('admin/faq/view_faq',$data);
	}
		
		
	//edit pages
	function edit($id)
	{
		//add ckeditor tools
		$this->load->library('Ckeditor');
		$this->load->library('Ckfinder');
		$data=array();
		$this->ckeditor->basePath = base_url().'assets/ckeditor/';
		$this->ckeditor->config['language']= 'eng';
		$this->ckeditor->config['width'] = '630px';
		$this->ckeditor->config['height'] = '300px';  
		$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'/admin/faq/upload'; 
		//add ckeditor tools
	
	$this->load->library('form_validation');
	
	 if(!empty($_POST)){
			$this->form_validation->set_rules('faq_title', 'Faq Title', 'required');
			$this->form_validation->set_rules('content', 'Content', 'required');	
			$this->form_validation->set_rules('priority', 'Priority', 'required');				
	 }
	 
	 if($this->form_validation->run() == true)
	   {
		    $msg = $this->M_faq->index($id);
			if(!empty($msg)){
			   $this->session->set_flashdata('msg', 'Faq Updated successfully');
			}
			redirect('/admin/faq/listing/');
	 }
	 else{
			$this->load->helper(array('form'));
			$data['pages'] = $this->M_faq->faq_info($id);
			$this->load->view('admin/faq/edit_faq',$data);
		}	
	}
	
	function priority()
	{
		
		$id=$_GET['id'];
		$priority=$_GET['p'];
		$this->M_faq->Updatepriority($id,$priority);
		
	}
	
	// delete payment entry
	function delete($pageid){
		if($this->M_faq->delete($pageid))
			$this->session->set_flashdata('msg', 'Faq Deleted successfully');
			redirect('/admin/faq/listing/','refresh');
	}
	
	public function logout()
	{
		$CI =& get_instance();
		$is_logged_in = $CI->session->userdata('wholeyou_admin');
		if(!empty($is_logged_in))
		{
			$this->m_admin->logoutTime($is_logged_in['id']);
			$this->session->sess_destroy();
			redirect('admin/login');  
			die();
		}
		redirect('admin/login');
	}

	function status($id,$status){
		if($this->M_faq->status($id,$status)){
			$this->session->set_flashdata('msg', 'Faq Updated successfully');
			redirect('/admin/faq/listing/','refresh');
		}
	}


}