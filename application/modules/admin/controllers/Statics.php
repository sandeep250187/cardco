<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Statics extends CI_Controller{
	public function __construct(){
	     parent::__construct();
	     is_logged_in();
	     $this->load->model('admin/M_statics');
	}
	
	public function index(){
	
		$this->load->library('Ckeditor');
		$this->load->library('Ckfinder');
		$data=array();
		$this->ckeditor->basePath = base_url().'assets/ckeditor/';
		$this->ckeditor->config['language']= 'eng';
		$this->ckeditor->config['width'] = '630px';
		$this->ckeditor->config['height'] = '300px'; 
		$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'/admin/statics/upload'; 	
		$this->load->helper(array('form'));
	    $this->load->library('form_validation');
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$this->form_validation->set_rules('static_value', 'Content', 'required');
			$this->form_validation->set_rules('static_label', 'Label', 'required');
			$this->form_validation->set_rules('static_key', 'Key', 'required');
			$this->form_validation->set_rules('static_order', 'Order', 'required');
			$this->form_validation->set_rules('static_type', 'Type', 'required');
		
			if($this->form_validation->run() == true)
	   		{	
				$this->M_statics->addpage();
				$this->session->set_flashdata('msg', 'Content added successfully!');
				redirect('admin/statics/listing', 'refresh');
			}
	 	}
	 
	   $this->load->view('admin/statics/add_static',$data); 
	
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
		
		$data['statics'] = $this->M_statics->listing($limit,$offset,$startdate,$enddate,$specificOption,$specificValue);
		$config['total_rows'] = $this->M_statics->count_all($startdate,$enddate,$specificOption,$specificValue);
		/* pagination start */
		$this->load->library('pagination');
		$search_parameter="/$startdate/$enddate/$specificOption/$specificValue";
		$config['first_url'] = site_url("admin/statics/listing/0/".$search_parameter);
		$config['suffix']= $search_parameter;
		$config['base_url'] = site_url("admin/statics/listing/");
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
		
		$this->load->view('admin/statics/view_statics',$data);
	}
	
	function listingdetail($id){			
		
		$this->load->helper('form');
		
		//$id=$this->uri->segment(4); 
		$data['staticsdetail'] = $this->M_statics->listingdetail($id);
		$config['total_rows'] = $this->M_statics->count_alldetail($id);
		/* pagination start */
		//$this->load->library('pagination');
		//$search_parameter="/$startdate/$enddate/$specificOption/$specificValue";
		//$config['first_url'] = site_url("admin/statics/listingdetail/0/".$search_parameter);
		//$config['suffix']= $search_parameter;
		//$config['base_url'] = site_url("admin/statics/listingdetail/");
		//$config['per_page'] = $limit; 
		//$config['uri_segment'] = 4;
		//$this->pagination->initialize($config); 
		//$data["links"] = $this->pagination->create_links();
		//$data['page'] = $offset;
		/*******/
		//$data['startdate'] = $startdate;
		//$data['enddate'] = $enddate;
		//$data['specificOption'] = $specificOption;
		//$data['specificValue'] = $specificValue;
		
		$this->load->view('admin/statics/view_staticsdetails',$data);
	}
		
		
	//edit pages
	function edit($id,$staticId)
	{
		
		/* add ckeditor tools */
		$this->load->library('ckeditor');
		$this->load->library('ckfinder');
		$data=array();
		$this->ckeditor->basePath = base_url().'assets/ckeditor/';
		$this->ckeditor->config['language']= 'eng';
		$this->ckeditor->config['width'] = '630px';
		$this->ckeditor->config['height'] = '300px';  
		$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'/admin/statics/upload'; 
		/* add ckeditor tools */
	
	 $this->load->library('form_validation');
	
	 if(!empty($_POST)){
			$this->form_validation->set_rules('static_value', 'Content', 'required');
			$this->form_validation->set_rules('static_label', 'Label', 'required');
		
	 }
	
	 if($this->form_validation->run() == true)
	   {
		      
		    $msg = $this->M_statics->index($id);
			if(!empty($msg)){
			   $this->session->set_flashdata('msg', 'Content Updated successfully');
			}
			redirect('/admin/statics/listingdetail/'.$staticId);
	 }
	 else{
			/* $data['role'] =  $this->M_page->role(); */
			$this->load->helper(array('form'));
			$data['statics'] = $this->M_statics->static_info($id);
			$this->load->view('admin/statics/edit_statics',$data);
		}	
	}
	
	
	
	/* delete payment entry */
	function delete($pageid){
		//isUserPermission('delete_user');
		if($this->M_statics->delete($pageid))
			$this->session->set_flashdata('msg', 'Content Deleted successfully');
			redirect('/admin/statics/listing/');
	}
	

	function status($id,$status){
		if($this->M_statics->status($id,$status))
			$this->session->set_flashdata('msg', 'Content Updated successfully');
			redirect('/admin/statics/listing/');
	}


}