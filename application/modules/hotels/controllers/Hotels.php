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
		  
        
         $hotelSearch= $this->M_hotels->searchhtlname($query,$order,$date,$htlorder,$starrate,$catstar,$offset,$limit);
		    header('Content-Type: application/json'); 
		   echo json_encode(array('hoteldata'=>$hotelSearch,'offset'=>$data['offset'],'limit'=>$data['limit']));
	}
	public function hotel_cart()
	{
		
		if(!empty($_POST))
		$data=$this->M_hotels->get_room($_POST['hotel_id'],$_POST['room_id']);
	    
			$item=array(
			 'room_id'=>$data[0]['room_id'],
			 'hotel_id'=>$data[0]['hotel_id'],
			 'room_type'=>$data[0]['room_type'],
			 'room_price'=>$data[0]['room_price'],
			 'room_cat'=>$data[0]['room_cat'],
			 'room_hold'=>$data[0]['room_hold'],
			 'room_cutof'=>$data[0]['room_cutof'],
			 'description'=>$data[0]['description'],
			 'pic1'=>$data[0]['pic1'],
			 'pic2'=>$data[0]['pic2'],
			 'hotel_pic'=>$data[0]['hotel_pic'],
			 'pic3'=>$data[0]['pic3'],
			 'pic4'=>$data[0]['pic4'],
			 'pic5'=>$data[0]['pic5'],
			 'pic6'=>$data[0]['pic6'],
			 'SUPPLIER_CODE'=>$data[0]['SUPPLIER_CODE'],
			 'NAME'=>$data[0]['NAME'],
			 'hotelname'=>$data[0]['hotelname'],
			 'location'=>$data[0]['location'],
			 'instant'=>$data[0]['instant'],
			 'state'=>$data[0]['state'],
			 'locationid'=>$data[0]['locationid'],
			 'address'=>$data[0]['address'],
			 'starcat'=>$data[0]['starcat'],
			 'landline'=>$data[0]['landline'],
			 'contact_person'=>$data[0]['contact_person'],
			 'cancel_policy'=>$data[0]['cancel_policy'],
			 'cancel_policy_vcon'=>$data[0]['cancel_policy_vcon'],
			 'remarks'=>$data[0]['remarks'],
			 'htl_description'=>$data[0]['htl_description'],
			 'htl_map'=>$data[0]['htl_map'],
			 'BOARD_BASIS_CODE'=>$data[0]['BOARD_BASIS_CODE'],
			 'CURRENCY_CODE'=>$data[0]['CURRENCY_CODE'],
			 'VALID_FROM'=>$data[0]['VALID_FROM'],
			 'VALID_TO'=>$data[0]['VALID_TO'],
			 'DSUN'=>$data[0]['DSUN'],
			 'DMON'=>$data[0]['DMON'],
			 'DTUE'=>$data[0]['DTUE'],
			 'DWED'=>$data[0]['DWED'],
			 'DTHU'=>$data[0]['DTHU'],
			 'DFRI'=>$data[0]['DFRI'],
			 'DSAT'=>$data[0]['DSAT'],
			 'APPROVE'=>$data[0]['APPROVE'],
			 'SERVICE_ID'=>$data[0]['SERVICE_ID'],
			 'status'=>$data[0]['status'],
			 'apmg_location'=>$data[0]['apmg_location'],
			 'popular_hotel'=>$data[0]['popular_hotel'],
			 'image'=>$data[0]['image'],
			 'created_date'=>$data[0]['created_date']
			);
		
	    if(empty($this->session->userdata('hotel_cart'))) {
			$cart=array($item);
			 $this->session->set_userdata('hotel_cart', serialize($cart));
	}else{
		 $index = $this->exists($_POST['room_id']);
            $cart = array_values(unserialize($this->session->userdata('hotel_cart')));
            if($index == -1) {
                array_push($cart, $item);
                $this->session->set_userdata('hotel_cart', serialize($cart));
            } 
	}
	//print_r($this->session->userdata('hotel_cart')); die;
	//redirect('hotels/cart_list');
	}
	public function remove($id)
    {
        $index = $this->exists($id);
        $cart = array_values(unserialize($this->session->userdata('hotel_cart')));
        unset($cart[$index]);
        $this->session->set_userdata('hotel_cart', serialize($cart));
        //redirect('hotels/cart_list');
    }

    private function exists($id)
    {
        $cart = array_values(unserialize($this->session->userdata('hotel_cart')));
		
        for ($i = 0; $i < count($cart); $i ++) {
			 
            if ($cart[$i]['room_id'] == $id) {
                return $i;
            }
        }
        return -1;
    }

    private function total() {
        $items = array_values(unserialize($this->session->userdata('hotel_cart')));
		
        $s = 0;
        foreach ($items as $item) {
            $s += $item['room_price'];
        }
        return $s;
    }
	public function cart_list()
    {
		
        $data = array_values(unserialize($this->session->userdata('hotel_cart')));
        //$data = $this->total();
		//header('Content-Type: application/json');
		echo json_encode($data);
       // $this->load->view('hotel_cart', $data);
    }
	public function room_total() {
        $items = array_values(unserialize($this->session->userdata('hotel_cart')));
		
        $s = 0;
        foreach ($items as $item) {
            $s += $item['room_price'];
        }
       echo json_encode($s);
    }
}
   
?>