<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Contactcredit extends CI_Controller {
        public function __construct(){
	     parent::__construct();
	     $this->load->model('admin/M_contactcredit');
	}
        
	function listing($offset=0,$search='null')
	{
		is_logged_in();
		$this->load->helper('form');
		$limit = pagination_count;
		if($this->input->post('search')!=''){
		  $search = $this->input->post('search');
		}
		$data['user'] = $this->M_contactcredit->userListing($limit,$offset,$search);
		$config['total_rows'] = $this->M_contactcredit->countUsers($search);
		/* pagination start */
		$this->load->library('pagination');
		$search_parameter="/$search";
		$config['first_url'] = site_url("admin/contactcredit/listing/0".$search_parameter);
		$config['suffix']= $search_parameter;
		$config['base_url'] = site_url("admin/contactcredit/listing");
		$config['per_page'] = pagination_count; 
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config); 
		$data["links"] = $this->pagination->create_links();
		$data['page'] = $offset;
		/*******/
		$this->load->view(ADMIN_FOLDER.'/contactcredit/view_listing',$data);
	}
        
	  
        
    function delete($id,$page=1){
            is_logged_in();
			if($this->M_contactcredit->userDelete($id))
			$this->session->set_flashdata('msg', 'Record deleted successfully');
			redirect(ADMIN_FOLDER.'/contactcredit/listing/'.$page,'refresh');
	}
	
	function view($lead_id=0){
			is_logged_in();
			$data['lead'] = $this->M_contactcredit->lead_info($lead_id);
			$data['ques_ans'] = $this->M_contactcredit->lead_ques_answ($lead_id);
			$this->load->view(ADMIN_FOLDER.'/contactcredit/view_lead_view',$data);
    }
        
       
        
}
