<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Seo extends CI_Controller{
	public function __construct(){
	     parent::__construct();
	     is_logged_in();
	     $this->load->model('admin/M_seo');
	}
	
	public function index(){
	
		$data=array();
		$this->load->helper(array('form'));
	    $this->load->library('form_validation');
		
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$this->form_validation->set_rules('main_url', 'Main Url', 'required');
			$this->form_validation->set_rules('meta_title', 'Meta Title', 'required');
		
			if($this->form_validation->run() == true)
	   		{	
				$this->M_seo->addpage();
				$this->session->set_flashdata('msg', 'Page added successfully!');
				redirect('admin/seo/listing', 'refresh');
			}
	 	}
	 
	   $this->load->view('admin/seo/add_page',$data); 
	
	}
	
		
	function listing($offset=0,$startdate=0,$enddate=0,$specificOption=0,$specificValue=0){			
		
		$this->load->helper('form');
		$limit = pagination_count;
		if($this->input->post('startdate')!='')
		{
			$startdate=$this->input->post('startdate');
		}
		
		$data['pages'] = $this->M_seo->listing($limit,$offset,$startdate,$enddate);
		$config['total_rows'] = $this->M_seo->count_all($startdate,$enddate);
		/* pagination start */
		$this->load->library('pagination');
		$search_parameter="/$startdate/$enddate";
		$config['first_url'] = site_url("admin/seo/listing/0/".$search_parameter);
		$config['suffix']= $search_parameter;
		$config['base_url'] = site_url("admin/seo/listing/");
		$config['per_page'] = $limit; 
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config); 
		$data["links"] = $this->pagination->create_links();
		$data['page'] = $offset;
		/*******/
		$data['startdate'] = $startdate;
		$data['enddate'] = $enddate;
		
		$this->load->view('admin/seo/view_page',$data);
	}
		
		
	//edit pages
	function edit($id)
	{
		
	 $this->load->library('form_validation');
	 if(!empty($_POST)){
			$this->form_validation->set_rules('main_url', 'Main Url', 'required');
			$this->form_validation->set_rules('meta_title', 'Meta Title', 'required');
	 }
	 
	 if($this->form_validation->run() == true)
	   {
		      
		        $msg = $this->M_seo->index($id);
			if(!empty($msg)){
			   $this->session->set_flashdata('msg', 'Page Updated successfully');
			}
			redirect('/admin/seo/listing/');
	 }
	 else{
			$this->load->helper(array('form'));
			$data['pages'] = $this->M_seo->page_info($id);
			$this->load->view('admin/seo/edit_page',$data);
		}	
	}
	
	
	
	/* delete payment entry */
	function delete($pageid){
		//isUserPermission('delete_user');
		if($this->M_seo->delete($pageid))
			$this->session->set_flashdata('msg', 'Record Deleted successfully');
			redirect('/admin/seo/listing/');
	}
	
	

	function status($id,$status){
		if($this->M_seo->status($id,$status))
			$this->session->set_flashdata('msg', 'Record Updated successfully');
			redirect('/admin/seo/listing/');
	}


}