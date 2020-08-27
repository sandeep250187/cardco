<?php
  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  error_reporting(1);
   class Transfer extends CI_Controller{
	public function __construct(){
	     parent::__construct();

	      $this->load->model('transfer/M_transfer');
	      
	}
	public function index()
	{
		$data=array();
		$date=$this->input->post('serviceDate');
		$data['transfers']=$this->M_transfer->allTransfersByDate();
		if($_POST['pickup']!='')
		{
			$data['transfers']=$this->M_transfer->allTransfersBySearch();
		}

		//$numrow = $this->M_hotels->numOfHotel($date);
		//$data['numrow']=$numrow;
		$data['date']=$date;
		
		/* pagination start */
		$this->load->library('pagination');
		$search_parameter="/$startdate/$enddate/$specificOption/$specificValue";
		$config['first_url'] = site_url("transfer/index/0/".$search_parameter);
		$config['suffix']= $search_parameter;
		$config['base_url'] = site_url("transfer/index/");
		$config['per_page'] = $limit; 
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config); 
		$data["links"] = $this->pagination->create_links();
		$data['page'] = $offset;
		/*******/
		
 		$this->load->view('transfer-search',$data);
	}
	
	
	
}
   
?>  