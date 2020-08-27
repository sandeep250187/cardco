<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Apartmenttariff extends CI_Controller{
	public function __construct(){
	     parent::__construct();
	     is_logged_in();
	     $this->load->model('admin/M_apartmenttariff');
	}
	
public function index(){
			$data=array();
		 $this->load->helper(array('form'));
		$this->load->library('form_validation');
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{	
			$this->form_validation->set_rules('aptid', 'Apartment Name', 'required');
			$this->form_validation->set_rules('apt_type', 'Apartment Type', 'required');
			$this->form_validation->set_rules('apt_cat', 'Apartment Category', 'required');
			$this->form_validation->set_rules('valid_from', 'Valid From', 'required');
			$this->form_validation->set_rules('valid_to', 'Valid To', 'required');
            $this->form_validation->set_rules('apt_price', 'Apartment Price', 'required');
			if($this->form_validation->run() == true)
	   		{	
				$result = $this->M_apartmenttariff->addapartmenttariff();
				 $this->session->set_flashdata('msg', 'apartment tariff added successfully!');
				redirect('admin/apartmenttariff/listing', 'refresh');
			}else{
			}
	 	}
	   $this->load->view('admin/apartmenttariff/add_apartmenttariff',$data); 

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
		
		$data['pages'] = $this->M_apartmenttariff->listing($limit,$offset,$startdate,$enddate,$specificOption,$specificValue);
		$config['total_rows'] = $this->M_apartmenttariff->count_all($startdate,$enddate,$specificOption,$specificValue);
		/* pagination start */
		$this->load->library('pagination');
		$search_parameter="/$startdate/$enddate/$specificOption/$specificValue";
		$config['first_url'] = site_url("admin/apartmenttariff/listing/0/".$search_parameter);
		$config['suffix']= $search_parameter;
		$config['base_url'] = site_url("admin/apartmenttariff/listing/");
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
		
		$this->load->view('admin/apartmenttariff/view_apartmenttariff',$data);
	}
		
		
	//edit pages
	function edit($id)
	{

		 $data=array();
		 $this->load->library('form_validation');
	 if(!empty($_POST)){
	 		//$this->form_validation->set_rules('hotelName', 'Hotel Name', 'required');
			$this->form_validation->set_rules('apt_type', 'Apartment Type', 'required');
			$this->form_validation->set_rules('apt_cat', 'Apartment Category', 'required');
            $this->form_validation->set_rules('valid_from', 'Valid From', 'required');
            $this->form_validation->set_rules('valid_to', 'Valid To', 'required');
            $this->form_validation->set_rules('apt_price', 'Apartment Price', 'required');
    }
	 
	 if($this->form_validation->run() == true)
	   {
		    
		        $msg = $this->M_apartmenttariff->index($id);
			if(!empty($msg)){
			   $this->session->set_flashdata('msg', 'apartmenttariff Updated successfully');
			}
			redirect('/admin/apartmentmaster/listing/');
	 }
	 else{
	 	    
			 $this->load->helper(array('form'));
			$data['pages'] = $this->M_apartmenttariff->page_info1($id);
			
			$this->load->view('admin/apartmenttariff/edit_apartmenttariff',$data);
		}	
	}
	
	
	 
	
	
	function view($lead_id=0,$check){

		 is_logged_in();
		 $data['pages'] = $this->M_apartmenttariff->page_info($lead_id);
		  $this->load->view(ADMIN_FOLDER.'/apartmenttariff/view_apartmenttariff_view',$data);
        	
    }
	
	/* delete payment entry */
	function delete($pageid){
		//isUserPermission('delete_user');
		if($this->M_apartmenttariff->delete($pageid))
			$this->session->set_flashdata('msg', 'apartmenttariff Deleted successfully');
			redirect('/admin/apartmenttariff/listing/');
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

}
