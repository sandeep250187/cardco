<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Enquiry extends CI_Controller {
        public function __construct(){
	     parent::__construct();
	     $this->load->model('admin/M_enquiry');
	}
        
	function listing($offset=0,$search='null')
	{
		is_logged_in();
		$this->load->helper('form');
		$limit = pagination_count;
		if($this->input->post('search')!=''){
		  $search = $this->input->post('search');
		}
		$data['user'] = $this->M_enquiry->userListing($limit,$offset,$search);
		$config['total_rows'] = $this->M_enquiry->countUsers($search);
		/* pagination start */
		$this->load->library('pagination');
		$search_parameter="/$search";
		$config['first_url'] = site_url("admin/enquiry/listing/0".$search_parameter);
		$config['suffix']= $search_parameter;
		$config['base_url'] = site_url("admin/enquiry/listing");
		$config['per_page'] = pagination_count; 
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config); 
		$data["links"] = $this->pagination->create_links();
		$data['page'] = $offset;
		/*******/
		$this->load->view(ADMIN_FOLDER.'/enquiry/view_listing',$data);
	}
        
	  
        
        function delete($id,$page=1){
            is_logged_in();
		if($this->M_enquiry->userDelete($id))
			$this->session->set_flashdata('msg', 'Record deleted successfully');
			redirect(ADMIN_FOLDER.'/enquiry/listing/'.$page,'refresh');
	}
        
       
        
}
