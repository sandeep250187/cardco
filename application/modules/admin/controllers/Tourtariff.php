<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tourtariff extends CI_Controller{
	public function __construct(){
	     parent::__construct();
	     is_logged_in();
	     $this->load->model('admin/M_tourtariff');
	}
	
	public function index(){
		 $data=array();
		$this->load->helper(array('form'));
	    $this->load->library('form_validation');
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$this->form_validation->set_rules('tour_name', 'Tour Name', 'required');
			$this->form_validation->set_rules('valid_from', 'Valid From', 'required');
			$this->form_validation->set_rules('valid_to', 'Valid To', 'required');
			$this->form_validation->set_rules('car', 'Car Price', 'required');
			$this->form_validation->set_rules('van', 'Van Price', 'required');
			if($this->form_validation->run() == true)
	   		{	
				$this->M_tourtariff->addtourtariff();
				$this->session->set_flashdata('msg', 'tour tariff added successfully!');
				redirect('admin/tourtariff/listing', 'refresh');
			}
	 	}
	 
	   $this->load->view('admin/tourtariff/add_tourtariff'); 
	
	}
	
	function upload()
   {
	
	$time = time();
	
	$url = 'uploads/'.$_FILES['upload']['name'];

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
	  	 
	  @move_uploaded_file($_FILES['upload']['tmp_name'], "uploads/".$_FILES['upload']['name']);
	
      /* $move = @ move_uploaded_file($_FILES['upload']['tmp_name'], $url); */
	  
   
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
		
		$data['tours'] = $this->M_tourtariff->listing($limit,$offset,$startdate,$enddate,$specificOption,$specificValue);
		$config['total_rows'] = $this->M_tourtariff->count_all($startdate,$enddate,$specificOption,$specificValue);
		/* pagination start */
		$this->load->library('pagination');
		$search_parameter="/$startdate/$enddate/$specificOption/$specificValue";
		$config['first_url'] = site_url("admin/tourtaiff/listing/0/".$search_parameter);
		$config['suffix']= $search_parameter;
		$config['base_url'] = site_url("admin/tourtaiff/listing/");
		$config['per_page'] = $limit; 
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config); 
		$data["links"] = $this->pagination->create_links();
		$data['page'] = $offset;
		/*******/
		$data['startdate'] = $startdate;
		$data['enddate'] = $enddate;
		$data['specificOptiaton'] = $specificOption;
		$data['specificValue'] = $specificValue;
		
		$this->load->view('admin/tourtariff/view_tourtariff',$data);
	}
		
		
	//edit tours
	function edit($id)
	{
		
		$data=array();
		 $this->load->library('form_validation');
	 if(!empty($_POST)){
		 
			//$this->form_validation->set_rules('tour_name', 'Tour Name', 'required');
			$this->form_validation->set_rules('valid_from', 'Valid From', 'required');
			$this->form_validation->set_rules('valid_to', 'Valid To', 'required');
			$this->form_validation->set_rules('car', 'Car Price', 'required');
			$this->form_validation->set_rules('van', 'Van Price', 'required');
	 }
	  
	 if($this->form_validation->run() == true)
	   {
		  
            $msg = $this->M_tourtariff->index($id);
			if(!empty($msg)){
			   $this->session->set_flashdata('msg', 'tour tariff updated successfully');
			}
			redirect('/admin/tourtariff/listing/');
	 }
	 else
	 {
			$this->load->helper(array('form'));
			$data['tours'] = $this->M_tourtariff->tourtariff_info($id);
			$this->load->view('admin/tourtariff/edit_tourtariff',$data);
	 }	
	}
	
	
	
	/* delete payment entry */
	function delete($tourid){
		//isUserPermission('delete_user');
		if($this->M_tourtariff->delete($tourid))
			$this->session->set_flashdata('msg', 'tour tariff Deleted successfully');
			redirect('/admin/tourtariff/listing/');
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
		if($this->M_tourtariff->status($id,$status))
			$this->session->set_flashdata('msg', 'tour Updated successfully');
			redirect('/admin/tourtaiff/listing/');
	}
	


}