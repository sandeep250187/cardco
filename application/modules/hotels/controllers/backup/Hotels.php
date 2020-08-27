<?php
  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   class Hotels extends CI_Controller{
	public function __construct(){
	     parent::__construct();
			$this->load->model('hotels/M_hotels');
			$this->load->helper("url");
			$this->load->library("pagination");
	      
	}
	public function index()
	{
		 $date = $this->input->post('from');
		 $to_date = $this->input->post('to');
		 $child = $this->input->post('child');
		 $adult = $this->input->post('adult');
		 $room = $this->input->post('room');
		 if(!empty($date)){
			$hotelList=$this->M_hotels->findHotel();
			$numrow = $this->M_hotels->numOfHotel($date);
			$data['numrow']=$numrow;
			$data['hotellist']=$hotelList;
			$_SESSION['date']=$data['date']=$date; 
			$_SESSION['to_date']=$data['to_date']=$to_date; 
			$_SESSION['child']=$data['child']=$child; 
			$_SESSION['adult']=$data['adult']=$adult; 
			$_SESSION['room']=$data['room']=$room; 
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
	
	public function searchprice(){
		$date=$this->input->post('order'); 
		$searchPrice=$this->M_hotels->searchprice($date); 
		$numrow = $this->M_hotels->numOfHotel($date);
		$data['hotellist']=$searchPrice; 
		$data['numrow']=$numrow;
		$this->load->view('hotel-search-wout-apmg',$data);
	}
	
	public function searchhtlname(){
		$output = '';
        $query = '';$order ='';$date='';$htlorder='';$starrate='';$catstar='';
		
        if($this->input->post('query') || $this->input->post('order') || $this->input->post('date') || $this->input->post('htlorder') || $this->input->post('starrate') || $this->input->post('catstar'))
        {
          $query = $this->input->post('query');
		  $order = $this->input->post('order');
		  $date = $this->input->post('date');
		  $htlorder = $this->input->post('htlorder');
		  $starrate = $this->input->post('starrate');
		  $catstar = $this->input->post('catstar');
        } 
         $hotelSearch= $this->M_hotels->searchhtlname($query,$order,$date,$htlorder,$starrate,$catstar);
		   header('Content-Type: application/json');
		   echo json_encode(array('hoteldata'=>$hotelSearch)); exit;
		  //$this->load->view('hotels/hotel-search-wout-apmg',$data);
	}
	public function hotel_cart()
	{
		$_SESSION['hotel_cart']=array();
		if(!empty($_POST))
		$data=$this->M_hotels->get_room($_POST['hotel_id'],$_POST['room_id']);
	   
	   if(isset($_SESSION['hotel_cart']))
	   {
	     array_push($_SESSION['hotel_cart'],$data);
	   }else{
		   array_push($_SESSION['hotel_cart'],$data);
	   }
	   //print_r($_SESSION);
	}
}
   
?>