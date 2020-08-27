<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Apartmentmaster extends CI_Controller{
	public function __construct(){
	     parent::__construct();
	     is_logged_in();
	     $this->load->model('admin/M_apartmentmaster');
	}
	
	public function index(){
		$this->load->library('Ckeditor');
		$this->load->library('Ckfinder');
		$data=array();
		$this->ckeditor->basePath = base_url().'assets/ckeditor/';
		$this->ckeditor->config['language']= 'eng';
		$this->ckeditor->config['width'] = '630px';
		$this->ckeditor->config['height'] = '300px'; 
		$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'/uploads/apartmentmaster'; 
		 $this->load->helper(array('form'));
	    $this->load->library('form_validation');
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			 $this->form_validation->set_rules('aptName', 'Apartment Name', 'required');
			$this->form_validation->set_rules('location', 'Location', 'required');
			$this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('starCat', 'Star Category', 'required');
			 if($this->form_validation->run() == true)
	   		{	
				$result = $this->M_apartmentmaster->addapartmentmaster();
				 $this->session->set_flashdata('msg', 'apartmentmaster added successfully!');
				redirect('admin/apartmentmaster/listing', 'refresh');
			}
	 	}
	 
	   $this->load->view('admin/apartmentmaster/add_apartmentmaster',$data); 
	
	}

	 public  function check_username()
		{ 
			$username=$this->input->post('username');
		  $result = $this->M_apartmentmaster->checkusername($username);
		  if($result==false){
		  	 	$this->form_validation->set_message('check_username', 'Username is already exist');
		  	  	return false;
		  }else{
		  	 	return true;
		  }
		 
		}
	
	function upload()
   {
	
	$time = time();
	
	$url = 'uploads/apartmentmaster/'.$_FILES['upload']['name'];

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
	  	 
	  @move_uploaded_file($_FILES['upload']['tmp_name'], "uploads/apartmentmaster/".$_FILES['upload']['name']);
	
      /* $move = @ move_uploaded_file($_FILES['upload']['tmp_name'], $url); */
	  
   
		$url = base_url().'uploads/apartmentmaster/'.$_FILES['upload']['name'];
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
		
		$data['pages'] = $this->M_apartmentmaster->listing($limit,$offset,$startdate,$enddate,$specificOption,$specificValue);
		$config['total_rows'] = $this->M_apartmentmaster->count_all($startdate,$enddate,$specificOption,$specificValue);
		/* pagination start */
		$this->load->library('pagination');
		$search_parameter="/$startdate/$enddate/$specificOption/$specificValue";
		$config['first_url'] = site_url("admin/apartmentmaster/listing/0/".$search_parameter);
		$config['suffix']= $search_parameter;
		$config['base_url'] = site_url("admin/apartmentmaster/listing/");
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
		
		$this->load->view('admin/apartmentmaster/view_apartmentmaster',$data);
	}
		
		
	//edit pages
	function edit($id)
	{
		$this->load->library('Ckeditor');
		$this->load->library('Ckfinder');
		$data=array();
		$this->ckeditor->basePath = base_url().'assets/ckeditor/';
		$this->ckeditor->config['language']= 'eng';
		$this->ckeditor->config['width'] = '630px';
		$this->ckeditor->config['height'] = '300px'; 
		$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'/uploads/apartmentmaster'; 
		 $this->load->helper(array('form'));
		 $this->load->library('form_validation');
	 if(!empty($_POST)){
	 		$this->form_validation->set_rules('aptName', 'Apartment Name', 'required');
			$this->form_validation->set_rules('location', 'Location', 'required');
			$this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('starCat', 'Star Category', 'required');
  }
	 
	 if($this->form_validation->run() == true)
	   {
		      
		        $msg = $this->M_apartmentmaster->index($id);
			if(!empty($msg)){
			   $this->session->set_flashdata('msg', 'apartmentmaster Updated successfully');
			}
			redirect('/admin/apartmentmaster/listing/');
	 }
	 else{
			 $this->load->helper(array('form'));
			$data['pages'] = $this->M_apartmentmaster->page_info($id);
			$this->load->view('admin/apartmentmaster/edit_apartmentmaster',$data);
		}	
	}
	
	
	 
	
	
	function view($lead_id=0){
	    is_logged_in();
		$data['pages'] = $this->M_apartmentmaster->page_info($lead_id);
	    $this->load->view(ADMIN_FOLDER.'/apartmentmaster/view_apartmentmaster_view',$data);
        	
    }
	
	/* delete payment entry */
	function delete($pageid){
		//isUserPermission('delete_user');
		if($this->M_apartmentmaster->delete($pageid))
			$this->session->set_flashdata('msg', 'apartmentmaster Deleted successfully');
			redirect('/admin/apartmentmaster/listing/');
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
		if($this->M_apartmentmaster->status($id,$status))
			$this->session->set_flashdata('msg', 'Page Updated successfully');
			redirect('/admin/apartmentmaster/listing/');
	}
	
	


}