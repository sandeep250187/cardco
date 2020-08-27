<?php
  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  error_reporting(0);
   class Tours extends CI_Controller{
	public function __construct(){
	     parent::__construct();

	      $this->load->model('tour/M_tour');
	      
	}
	public function index()
	{		
		$date = $this->input->post('from');  
		if(!empty($date)){
			$tourList=$this->M_tour->findTours();
			$numrow = $this->M_tour->numOfTours($date);
			$data['numrow']=$numrow;
			$data['tourlist']=$tourList;
			$data['date']=$date; 
		}
		else
		{
			$tourList=$this->M_tour->allTours(); 
			$numrow = $this->M_tour->numOfTours();
			$data['tourlist']=$tourList;
			$data['numrow']=$numrow;
		}  
		 
		$this->load->view('tours',$data);
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
	
	public function searchtour(){
		$output = '';
        $query = '';
       
          $query = $this->input->post('search');
          $roe= getAllRoe();
          $tourSearch= $this->M_tour->searchtour($query);
		 /*  header('Content-Type: application/json'); */
		  /* echo json_encode(array('tourdata'=>$tourSearch,'currency'=>$roe)); */
		  echo json_encode($tourSearch);
	}
	
    public function tours_cart(){
    if(!empty($_POST))
		
		//print_r($_POST);
    
    	$data=$this->M_tour->get_tours($_POST['cid'],$_POST['pax']);
		//print_r($data);die;
		$tour_price=0;
		foreach($data as $key => $value){
			foreach($value as $k => $v){
				if($k==$_POST['pax'])
				{
					$tour_price=$v;
				} 
			}
			
		}
		//echo $tour_price;die;
		$tour_item=array(
		'id'=>$data[0]['id'],
		'tour_code'=>$data[0]['tour_code'],
		'tour_name'=>$data[0]['tour_name'],
		'thumbnail'=>$data[0]['thumbnail'],
		'duration'=>$data[0]['duration'],
		'noof_pax'=>$_POST['nopax'],
		'service_date'=>$_POST['sdate'],
		'tour_price'=>$tour_price,
		'validity'=>$data[0]['validity'],
		'description'=>$data[0]['description'],
		'popular_tour_pkg'=>$data[0]['popular_tour_pkg'],
		'created_date'=>$data[0]['created_date'],
		'status'=>$data[0]['status'],		
		);
		//print_r($tour_item);
	if(empty($this->session->userdata('tour_cart'))) {
			$cart=array($tour_item);
			 $this->session->set_userdata('tour_cart', serialize($cart));
	}else{
		 $index = $this->exists($_POST['cid']);
            $cart = array_values(unserialize($this->session->userdata('tour_cart')));
            if($index == -1) {
                array_push($cart, $tour_item);
                $this->session->set_userdata('tour_cart', serialize($cart));
            } 
	}
   
}
public function remove()
    {
		if(!empty($_POST)){
			//print_r($_POST);die;
        $index = $this->exists($_POST['id']);
        $cart = array_values(unserialize($this->session->userdata('tour_cart')));
        unset($cart[$index]);
        $this->session->set_userdata('tour_cart', serialize($cart));
    }
	}

    private function exists($id)
    {
        $cart = array_values(unserialize($this->session->userdata('tour_cart')));
		
        for ($i = 0; $i < count($cart); $i ++) {
			 
            if ($cart[$i]['id'] == $id) {
                return $i;
            }
        }
        return -1;
    }


public function cal_price(){
	$id = $this->input->post('id');
	$key = $this->input->post('key');
	echo getRate($id,$key);
	
    
}

public function cal_price_search($id,$px){
			
		echo getRateSearch($id,$key);
	}

public function cart_list_tour()
    {
		
        $data = array_values(unserialize($this->session->userdata('tour_cart')));
        //$data = $this->total();
		//header('Content-Type: application/json');
		echo json_encode($data);
       // $this->load->view('hotel_cart', $data);
    }
public function price_total_tour() 
    {
        $items = array_values(unserialize($this->session->userdata('tour_cart')));
		
        $tour_price = 0;
        foreach ($items as $item) {
            $tour_price += $item['tour_price'];
        }
       echo json_encode($tour_price);
    }	
	
}

   
?>  