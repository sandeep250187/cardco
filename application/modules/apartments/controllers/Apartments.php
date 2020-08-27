<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   class Apartments extends CI_Controller{
   public function __construct(){
	     parent::__construct();
			$this->load->model('apartments/M_apartments');
			$this->load->helper("url");
			$this->load->library("pagination");
	      
	}
	public function index()
	{
		$data=array();
		$from = $this->input->post('from_apt');
		 $to_date = $this->input->post('to_apt');
		 $child = $this->input->post('child_apt');
		 $adult = $this->input->post('adult_apt');
		 $room = $this->input->post('room_apt');
		 if(!empty($from))
		 {
		$data['numrow']=$this->M_apartments->numOfHotel($from);
		$data['hotelList']=$this->M_apartments->findHotel();
		   $_SESSION['date']=$data['date']=$from; 
			$_SESSION['to_date']=$data['to_date']=$to_date; 
			$_SESSION['child']=$data['child']=$child; 
			$_SESSION['adult']=$data['adult']=$adult; 
			$_SESSION['room']=$data['room']=$room; 
		 }else{
			$data['numrow']=$this->M_apartments->numOfHotel($from);
		   $data['hotelList']=$this->M_apartments->allHotel(); 
		 }
       
		$this->load->view('apartments_index',$data);
		
	}
   public function searchhtlname(){
		
       $query =0;$order =0;$date=0;$htlorder=0;$starrate=0;$catstar=0;
		$offset=$_POST['offset'];
		$limit=$_POST['limit'];
	    $data['offset'] =$offset +10;
        $data['limit'] =$limit;
			if(isset($_POST['query']) && $_POST['query']!='')
			{
			$query = $this->input->post('query');
			}
			if(isset($_POST['order']) && $_POST['order']!='')
			{
			$order = $this->input->post('order');
			}
			if(isset($_POST['date']) && $_POST['date']!='')
			{
			$date = $this->input->post('date');
			}

			if(isset($_POST['htlorder']) && $_POST['htlorder']!='')
			{
			$htlorder = $this->input->post('htlorder');
			}
			if(isset($_POST['starrate']) && $_POST['starrate']!='')
			{
			$starrate = $this->input->post('starrate');
			}

			if(isset($_POST['catstar']) && $_POST['catstar']!='')
			{
			$catstar = $this->input->post('catstar');
			}
		  
        
         $hotelSearch= $this->M_apartments->searchhtlname($query,$order,$date,$htlorder,$starrate,$catstar,$offset,$limit);
		    header('Content-Type: application/json'); 
		   echo json_encode(array('hoteldata'=>$hotelSearch,'offset'=>$data['offset'],'limit'=>$data['limit'])); 
       
	}
   }