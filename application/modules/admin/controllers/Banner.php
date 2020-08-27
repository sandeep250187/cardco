<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Banner extends CI_Controller{
	public function __construct(){
	     parent::__construct();
	     is_logged_in();
	     $this->load->model('admin/M_banner');
	}
	
	public function index(){
	
		$this->load->library('Ckeditor');
		$this->load->library('Ckfinder');
		$data=array();
		$this->ckeditor->basePath = base_url().'assets/ckeditor/';
		$this->ckeditor->config['language']= 'eng';
		$this->ckeditor->config['width'] = '630px';
		$this->ckeditor->config['height'] = '300px'; 
		$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'/admin/banner/upload'; 	
		$this->load->helper(array('form'));
	    $this->load->library('form_validation');
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('content', 'Banner Description', 'required');
			$this->form_validation->set_rules('priority', 'Priority', 'required');
		
			if($this->form_validation->run() == true)
	   		{	
				$this->M_banner->addbanner();
				$this->session->set_flashdata('msg', 'Banner added successfully!');
				redirect('admin/banner/listing', 'refresh');
			}
	 	}
	 
	   $this->load->view('admin/banner/add_banner',$data); 
	
	}
	
	function upload()
   {
	
	$time = time();
	
	$url = 'uploads/banner/'.$_FILES['upload']['name'];

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
	  	 
	  @move_uploaded_file($_FILES['upload']['tmp_name'], "uploads/banner/".$_FILES['upload']['name']);
	
      /* $move = @ move_uploaded_file($_FILES['upload']['tmp_name'], $url); */
	  
   
		$url = base_url().'uploads/banner/'.$_FILES['upload']['name'];
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
		
		$data['pages'] = $this->M_banner->listing($limit,$offset,$startdate,$enddate,$specificOption,$specificValue);
		$config['total_rows'] = $this->M_banner->count_all($startdate,$enddate,$specificOption,$specificValue);
		/* pagination start */
		$this->load->library('pagination');
		$search_parameter="/$startdate/$enddate/$specificOption/$specificValue";
		$config['first_url'] = site_url("admin/banner/listing/0/".$search_parameter);
		$config['suffix']= $search_parameter;
		$config['base_url'] = site_url("admin/banner/listing/");
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
		
		$this->load->view('admin/banner/view_banner',$data);
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
		$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'/admin/banner/upload'; 
		/* add ckeditor tools */
	
	 $this->load->library('form_validation');
	 if(!empty($_POST)){
			$this->form_validation->set_rules('title', 'Banner Title', 'required');
			$this->form_validation->set_rules('content', 'Banner Description', 'required');
			$this->form_validation->set_rules('priority', 'Priority', 'required');
		
	 }
	 
	 if($this->form_validation->run() == true)
	   {
		      
		        $msg = $this->M_banner->index($id);
			if(!empty($msg)){
			   $this->session->set_flashdata('msg', 'Banner Updated successfully');
			}
			redirect('/admin/banner/listing/');
	 }
	 else{
			/* $data['role'] =  $this->M_banner->role(); */
			$this->load->helper(array('form'));
			$data['pages'] = $this->M_banner->page_info($id);
			$this->load->view('admin/banner/edit_banner',$data);
		}	
	}
	
	
	function priority()
	{
		
		$id=$_GET['id'];
		$priority=$_GET['p'];
		$this->M_banner->Updatepriority($id,$priority);
		
	}
	
	
	function view($lead_id=0){
			
			is_logged_in();
		   	$data['pages'] = $this->M_banner->page_info($lead_id);
			$this->load->view(ADMIN_FOLDER.'/banner/view_banner_view',$data);
        	
    }
	
	/* delete payment entry */
	function delete($pageid){
		//isUserPermission('delete_user');
		if($this->M_banner->delete($pageid))
			$this->session->set_flashdata('msg', 'Banner Deleted successfully');
			redirect('/admin/banner/listing/');
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
		if($this->M_banner->status($id,$status))
			$this->session->set_flashdata('msg', 'Page Updated successfully');
			redirect('/admin/banner/listing/');
	}


}
