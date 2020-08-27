<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Locationmaster extends CI_Controller{
	public function __construct(){
	     parent::__construct();
	     is_logged_in();
	     $this->load->model('admin/M_locationmaster');
	}
	
	public function index(){
		$data=array();
		$this->load->helper(array('form'));
	    $this->load->library('form_validation');
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$this->form_validation->set_rules('searchTransfer', 'Transfer Name', 'required');
			$this->form_validation->set_rules('transferPickup', 'Transfer Pickup', 'required');
			$this->form_validation->set_rules('transferPlace', 'Transfer Place', 'required');
			if($this->form_validation->run() == true)
	   		{	
				$this->M_locationmaster->addlocation();
				$this->session->set_flashdata('msg', 'Transfer Location added successfully!');
				//redirect('admin/locationmaster/listing', 'refresh');
			}
	 	}
	  $this->load->view('admin/locationmaster/add_location'); 
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
		
		$data['transfers'] = $this->M_locationmaster->listing($limit,$offset,$startdate,$enddate,$specificOption,$specificValue);
		$config['total_rows'] = $this->M_locationmaster->count_all($startdate,$enddate,$specificOption,$specificValue);
		/* pagination start */
		$this->load->library('pagination');
		$search_parameter="/$startdate/$enddate/$specificOption/$specificValue";
		$config['first_url'] = site_url("admin/locationmaster/listing/0/".$search_parameter);
		$config['suffix']= $search_parameter;
		$config['base_url'] = site_url("admin/locationmaster/listing/");
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
		
		$this->load->view('admin/locationmaster/view_location',$data);
	}
		 

	 
	 function edit($id)
	{
		$data=array();
		 $this->load->library('form_validation');
	 if(!empty($_POST)){
			$this->form_validation->set_rules('searchTransfer', 'Transfer Name', 'required');
			$this->form_validation->set_rules('transferPickup', 'Transfer Pickup', 'required');
			$this->form_validation->set_rules('transferPlace', 'Transfer Place', 'required');
			 }
	 if($this->form_validation->run() == true)
	   {
            $msg = $this->M_locationmaster->index($id);
			if(!empty($msg)){
			   $this->session->set_flashdata('msg', 'Transfer Location Updated successfully');
			}
			redirect('/admin/locationmaster/listing/');
	 }
	 else{
			 $this->load->helper(array('form'));
			$data['transfers'] = $this->M_locationmaster->transfer_info($id);
			$this->load->view('admin/locationmaster/edit_location',$data);
		}	
	}
	
	function delete($transferid){
		//isUserPermission('delete_user');
		if($this->M_locationmaster->delete($transferid))
			$this->session->set_flashdata('msg', 'transfer Deleted successfully');
			redirect('/admin/locationmaster/listing/');
	}

	 

}