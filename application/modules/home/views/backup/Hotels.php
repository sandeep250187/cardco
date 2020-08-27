<?php
  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  error_reporting(0);
   class Hotels extends CI_Controller{
	public function __construct(){
	     parent::__construct();

	      $this->load->model('hotels/M_hotels');
	      
	}
	public function index()
	{
		 $date = $this->input->post('from');  
		 if(!empty($date)){
			 $hotelList=$this->M_hotels->findHotel();
			$numrow = $this->M_hotels->numOfHotel($date);
			$data['numrow']=$numrow;
			$data['hotellist']=$hotelList;
			$data['date']=$date; 
		 }else{
			 $hotelList=$this->M_hotels->allHotel(); 
			$numrow = $this->M_hotels->numOfHotel();
			$data['hotellist']=$hotelList;
			$data['numrow']=$numrow;
		 }
		 
		 $this->load->view('hotel-search-wout-apmg',$data);
	}
	
	public function bookhotel($id){
		$bookHotel=$this->M_hotels->bookhotel($id);
		$data['bookhotel']=$bookHotel; 
		$this->load->view('view-hotel-details-wout',$data);
	}
	
	public function searchprice($date){
		$searchPrice=$this->M_hotels->searchprice($date); 
		$data['searchprice']=$searchPrice; 
		$this->load->view('hotel-search-wout-apmg',$data);
	}
	
	public function searchhtlname(){
		$output = '';
        $query = '';
        if($this->input->post('query'))
        {
          $query = $this->input->post('query');
        }
         $hotelSearch= $this->M_hotels->searchhtlname($query);
		   header('Content-Type: application/json');
		  echo json_encode(array('hoteldata'=>$hotelSearch)); exit;
		  //$this->load->view('hotels/hotel-search-wout-apmg',$data);
	}
	
}
   
?>  