<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Transfermaster extends CI_Controller{
	public function __construct(){
	     parent::__construct();
	     is_logged_in();
	     $this->load->model('admin/M_transfermaster');
	}
	
	public function index(){
		 $data=array();
		$this->load->helper(array('form'));
	    $this->load->library('form_validation');
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$this->form_validation->set_rules('transferName', 'Transfer Name', 'required');
			$this->form_validation->set_rules('van10', 'Van10 Rate', 'required');
			$this->form_validation->set_rules('van13', 'Van13 Rate', 'required');
			$this->form_validation->set_rules('van17', 'Van17 Rate', 'required');
			$this->form_validation->set_rules('mpv', 'MPV Rate', 'required');
			$this->form_validation->set_rules('bus31', 'Bus31 Rate', 'required');
			$this->form_validation->set_rules('bus44', 'Bus44 Rate', 'required');
			$this->form_validation->set_rules('guide', 'Guide Type', 'required');
			$this->form_validation->set_rules('guide_rate', 'Guide Rate', 'required');
			$this->form_validation->set_rules('validity', 'Validity', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');
			
			if($this->form_validation->run() == true)
	   		{	
				$this->M_transfermaster->addtransfer();
				$this->session->set_flashdata('msg', 'transfer added successfully!');
				redirect('admin/transfermaster/listing', 'refresh');
			}
	 	}
	  $this->load->view('admin/transfermaster/add_transfer'); 
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
		
		$data['transfers'] = $this->M_transfermaster->listing($limit,$offset,$startdate,$enddate,$specificOption,$specificValue);
		$config['total_rows'] = $this->M_transfermaster->count_all($startdate,$enddate,$specificOption,$specificValue);
		/* pagination start */
		$this->load->library('pagination');
		$search_parameter="/$startdate/$enddate/$specificOption/$specificValue";
		$config['first_url'] = site_url("admin/transfermaster/listing/0/".$search_parameter);
		$config['suffix']= $search_parameter;
		$config['base_url'] = site_url("admin/transfermaster/listing/");
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
		
		$this->load->view('admin/transfermaster/view_transfer',$data);
	}
		public function searchtransfer(){
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
		if($_SERVER['REQUEST_METHOD']=='POST'){
			$this->form_validation->set_rules('searchTransfer','Search Transfer','required');
			if($this->form_validation->run() == true){
				 $data=$this->M_transfermaster->searchtransfer();
				 $this->session->set_flashdata('$msg','Search Transfer saved successfully');
				 redirect('admin/transfermaster/searchlisting','refresh');
			 }
		}
		
		 $this->load->view('admin/transfermaster/search_transfer');
	}

	function searchlisting($offset=0,$startdate=0,$enddate=0,$specificOption=0,$specificValue=0){
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
		
		$data['searchtransfer'] = $this->M_transfermaster->searchlisting($limit,$offset,$startdate,$enddate,$specificOption,$specificValue);
		$config['total_rows'] = $this->M_transfermaster->countsearch_all($startdate,$enddate,$specificOption,$specificValue);
		/* pagination start */
		$this->load->library('pagination');
		$search_parameter="/$startdate/$enddate/$specificOption/$specificValue";
		$config['first_url'] = site_url("admin/transfermaster/searchlisting/0/".$search_parameter);
		$config['suffix']= $search_parameter;
		$config['base_url'] = site_url("admin/transfermaster/searchlisting/");
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
		
		$this->load->view('admin/transfermaster/view_transfersearch',$data);
	}

	 function edit($id)
	{
		$data=array();
		 $this->load->library('form_validation');
	 if(!empty($_POST)){
			$this->form_validation->set_rules('transferName', 'transfer Name', 'required');
			$this->form_validation->set_rules('van10', 'Van10 Rate', 'required');
			$this->form_validation->set_rules('van13', 'Van13 Rate', 'required');
			$this->form_validation->set_rules('van17', 'Van17 Rate', 'required');
			$this->form_validation->set_rules('mpv', 'MPV Rate', 'required');
			$this->form_validation->set_rules('bus31', 'Bus31 Rate', 'required');
			$this->form_validation->set_rules('bus44', 'Bus44 Rate', 'required');
			$this->form_validation->set_rules('guide', 'Guide Type', 'required');
			$this->form_validation->set_rules('guide_rate', 'Guide Rate', 'required');
			$this->form_validation->set_rules('validity', 'Validity', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');
	 }
	 
	 if($this->form_validation->run() == true)
	   {
            $msg = $this->M_transfermaster->index($id);
			if(!empty($msg)){
			   $this->session->set_flashdata('msg', 'transfer Updated successfully');
			}
			redirect('/admin/transfermaster/listing/');
	 }
	 else{
			 $this->load->helper(array('form'));
			$data['transfers'] = $this->M_transfermaster->transfer_info($id);
			$this->load->view('admin/transfermaster/edit_transfer',$data);
		}	
	}
	
	function editsearch($id)
	{
		$data=array();
		 $this->load->library('form_validation');
	 if(!empty($_POST)){
			$this->form_validation->set_rules('transferSearch', 'Search transfer Name', 'required');
	 }
	 
	 if($this->form_validation->run() == true)
	   {
            $msg = $this->M_transfermaster->editsearch($id);
			if(!empty($msg)){
			   $this->session->set_flashdata('msg', 'transfer Updated successfully');
			}
			redirect('/admin/transfermaster/searchlisting/');
	 }
	 else{
			 $this->load->helper(array('form'));
			$data['transfers'] = $this->M_transfermaster->searchtransfer_info($id);
			$this->load->view('admin/transfermaster/edit_transfersearch',$data);
		}	
	}
	
	/* delete payment entry */
	function delete($transferid){
		//isUserPermission('delete_user');
		if($this->M_transfermaster->delete($transferid))
			$this->session->set_flashdata('msg', 'transfer Deleted successfully');
			redirect('/admin/transfermaster/listing/');
	}

	function deletesearch($transferid){
		 if($this->M_transfermaster->deletesearch($transferid))
			$this->session->set_flashdata('msg', 'transfer Deleted successfully');
			redirect('/admin/transfermaster/searchlisting/');
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

	function status($id,$status){
		if($this->M_transfermaster->status($id,$status))
			$this->session->set_flashdata('msg', 'transfer Updated successfully');
			redirect('/admin/transfermaster/listing/');
	}

	function searchstatus($id,$status){
		 if($this->M_transfermaster->searchstatus($id,$status)) 
			$this->session->set_flashdata('msg', 'Search transfer Updated successfully');
			redirect('/admin/transfermaster/searchlisting/');
		 
	}


}