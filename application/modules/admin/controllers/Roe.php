<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Roe extends CI_Controller{
	public function __construct(){
	     parent::__construct();
	     is_logged_in();
	     $this->load->model('admin/M_roe');
	}
	
	public function index(){     
		$data=array();
		$this->load->helper(array('form'));
	    $this->load->library('form_validation');
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$this->form_validation->set_rules('usd', 'USD Rate', 'required');
			$this->form_validation->set_rules('thb', 'THB Rate', 'required');
			$this->form_validation->set_rules('aud', 'AUD Rate', 'required');
			$this->form_validation->set_rules('cny', 'CNY Rate', 'required');
			$this->form_validation->set_rules('inr', 'INR Rate', 'required');
			$this->form_validation->set_rules('aed', 'AED Rate', 'required');
            if($this->form_validation->run() == true)
	   		{	
				$msg =$this->M_roe->addroe();
				if($msg==0){
					$this->session->set_flashdata('msg', 'ROE Already Exist!');
				redirect('admin/roe/listing', 'refresh');
				}
				else
				{
				$this->session->set_flashdata('msg', 'ROE added successfully!');
				redirect('admin/roe/listing', 'refresh');
			}
		}
		}
	  	$this->load->view('admin/roe/add_roe',$data); 
	}

	 public  function check_username()
		{ 
			$username=$this->input->post('username');
		  $result = $this->M_roe->checkusername($username);
		  if($result==false){
		  	 	$this->form_validation->set_message('check_username', 'Username is already exist');
		  	  	return false;
		  }else{
		  	 	return true;
		  }
		 
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
		
		$data['pages'] = $this->M_roe->listing($limit,$offset,$startdate,$enddate,$specificOption,$specificValue);
		$config['total_rows'] = $this->M_roe->count_all($startdate,$enddate,$specificOption,$specificValue);
		/* pagination start */
		$this->load->library('pagination');
		$search_parameter="/$startdate/$enddate/$specificOption/$specificValue";
		$config['first_url'] = site_url("admin/roe/listing/0/".$search_parameter);
		$config['suffix']= $search_parameter;
		$config['base_url'] = site_url("admin/roe/listing/");
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
		
		$this->load->view('admin/roe/view_roe',$data);
	}
		
		
	//edit pages
	function edit($id)
	{
		$data=array();
		$this->load->library('form_validation');
	 	if(!empty($_POST)){
	 		$this->form_validation->set_rules('usd', 'USD Rate', 'required');
			$this->form_validation->set_rules('thb', 'THB Rate', 'required');
			$this->form_validation->set_rules('aud', 'AUD Rate', 'required');
			$this->form_validation->set_rules('cny', 'CNY Rate', 'required');
			$this->form_validation->set_rules('inr', 'INR Rate', 'required');
			$this->form_validation->set_rules('aed', 'AED Rate', 'required');
		}
			if($this->form_validation->run() == true)
	   		{

	 		  $msg = $this->M_roe->index($id);
	 		  if(!empty($msg)){
			   $this->session->set_flashdata('msg', 'roe Updated successfully');
			  }
			redirect('/admin/roe/listing/');
		    }
		else
		{
			$this->load->helper(array('form'));
			$data['pages'] = $this->M_roe->page_info($id);
			$this->load->view('admin/roe/edit_roe',$data);
		}
	}
	
	
	 
	
	
	function view($lead_id=0){
			
			//is_logged_in();
		   	$data['pages'] = $this->M_roe->page_info($lead_id);
			$this->load->view('admin/roe/view_roe_view',$data);
        	
    }
	
	/* delete payment entry */
	function delete($pageid){
		//isUserPermission('delete_user');
		if($this->M_roe->delete($pageid))
			$this->session->set_flashdata('msg', 'roe Deleted successfully');
			redirect('/admin/roe/listing/');
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
		if($this->M_roe->status($id,$status))
			$this->session->set_flashdata('msg', 'Page Updated successfully');
			redirect('/admin/roe/listing/');
	}


}
