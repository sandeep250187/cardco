<?php
error_reporting(0);

class Ticket extends CI_Controller
{
	public function __construct(){
	     parent::__construct();
			$this->load->model('ticket/M_ticket');
			$this->load->helper("url");
			$this->load->library("pagination");
	      
	}
	function index()
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://uat-api.globaltix.com/api/auth/login",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "{\r\n  \"username\": \"reseller@globaltix.com\",\r\n  \"password\": \"12345\"\r\n}",
		  CURLOPT_HTTPHEADER => array(
			"Content-Type: application/json"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
      
		curl_close($curl);

		 if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			$response = json_decode($response,true);
		   if($response['success']==1){
	 $token_type = $response['data']['token_type'];
	 $access_token = $response['data']['access_token'];
	 $_SESSION['access_token']=$token_type.' '.$access_token;
		   }
		} 
		
		$inc_country = array('1','2','4','6','15','88');
     $auth_country = $this->getCountrylist($inc_country);
	 
	 foreach($auth_country as $key=>$value){
		 if($value=='Malaysia')
		 {
			 $countryId=$key;
		 }
	 }
	 $auth_cities =$this->getallCitylist($countryId);
	 $data['city']= $this->getallCitylists();
	 foreach($auth_cities as $key=>$value){
		 if($value=='Penang')
		 {
			 $cityId=$key;
		 }
	 }
	   if(!empty($_POST))
	   {
		   $countryId=$_POST['country'];
		   $cityId=$_POST['city'];
	   }
	  
		
	   $data['attractions']=$this->getallAttractionslist($countryId,$cityId);
	   $ids=array();
	   foreach($data['attractions'] as $val)
	   {
		   $this->db->where('session_id!=',session_id());
		   $this->db->delete("tbl_tickets");
	      $ids=array('id'=>$val['id'],'imagePath'=>$val['imagePath'],'description'=>$val['description'],'hoursOfOperation'=>$val['hoursOfOperation'],'title'=>$val['title'],'session_id'=>session_id());
		  $this->db->insert('tbl_tickets',$ids);
	   }
	
	$data['country']=$this->AllCountrylist();
	$data['countryId']= $countryId;
	$data['cityId']= $cityId;
	//print_r($data['country']); die;
	$this->load->view('search',$data);
		//$this->search();
	}
	
	function getCountrylist($inc_country){
          $access_token = $_SESSION['access_token'];
          $curl = curl_init();
		  curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://uat-api.globaltix.com/api/country/getAllListingCountry",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
			"Accept-Version: 1.0",
			"Authorization: $access_token"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
       //echo '<pre>';
	   //print_r($response);
		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		    $response = json_decode($response,true);
			if(!empty($response['data'])){
				$cntry_ar = array();
				foreach($response['data'] as $cntry){
					if(in_array($cntry['id'],$inc_country))
					{
					 $cntry_ar[$cntry['id']]= $cntry['name'];
					}
				}
				
			}
			// print_r($cntry_ar);
		    return $cntry_ar;
		}
  }
  function getallCitylist($countryid){
          $access_token = $_SESSION['access_token'];
          $curl = curl_init();
		  curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://uat-api.globaltix.com/api/city/getAllCities",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
			"Accept-Version: 1.0",
			"Authorization: $access_token"
		  ),
		 ));

		$response = curl_exec($curl);
		$err = curl_error($curl);
       
		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		    $response = json_decode($response,true);
			if(!empty($response['data'])){
				$cntry_ar = array();
				foreach($response['data'] as $cntry){
					 if($countryid==$cntry['countryId'] && $cntry['name']!='Others'){
					   $cntry_ar[$cntry['id']]= $cntry['name'];
					 }
				}
				
			}
		    return $cntry_ar;
		}
  }
  function getallAttractionslist($countryid,$cityid){
	 
	      
          $access_token = $_SESSION['access_token'];
          $curl = curl_init();
		  
		  curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://uat-api.globaltix.com/api/attraction/list?countryId=".$countryid."&cityId=".$cityid."&excludeTicketTypes=true&field=&keyword=&page=1&tab=Attractions",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 500,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
			"Accept-Version: 1.0",
			"Authorization: $access_token"
		  ),
		 ));

		$response = curl_exec($curl);
		$err = curl_error($curl);
        
		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		    $response = json_decode($response,true);
			file_put_contents('price.txt', print_r($response,true));
			if(!empty($response['data'])){
				$cntry_ar = array();
				foreach($response['data'] as $cntry){
					$cntry_ar[]= array('id'=>$cntry['id'],'imagePath'=>$cntry['imagePath'],'description'=>$cntry['description'],'hoursOfOperation'=>$cntry['hoursOfOperation'],'title'=>$cntry['title']);
				}
				
			}
		    return $cntry_ar;
		}
  }
  
  public function search()
  {

	  error_reporting(0);
	  $this->index();
	  
	  $inc_country = array('1','2','4','6','15','88');
     $data['country']=$auth_country = $this->getCountrylist($inc_country);
	 
	 foreach($auth_country as $key=>$value){
		 if($value=='Malaysia')
		 {
			 $countryId=$key;
		 }
	 }
	 $data['city']=$auth_cities =$this->getallCitylist($countryId);
	
	 foreach($auth_cities as $key=>$value){
		 if($value=='Penang')
		 {
			 $cityId=$key;
		 }
	 }
	
	  $access_token = $_SESSION['access_token'];
          $curl = curl_init();
		  
		  curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://uat-api.globaltix.com/api/attraction/list?countryId=".$countryId."&cityId=".$cityId."&excludeTicketTypes=false&field=&keyword=&page=1&tab=Attractions",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 500,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
			"Accept-Version: 1.0",
			"Authorization: $access_token"
		  ),
		 ));

		$response = curl_exec($curl);
		$err = curl_error($curl);
        
		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		    $response = json_decode($response,true);
			if(!empty($response['data'])){
				$attractiondata = array();
				foreach($response['data'] as $cntry){
					$attractiondata[]= array('id'=>$cntry['id'],'imagePath'=>$cntry['imagePath'],'description'=>$cntry['description'],'hoursOfOperation'=>$cntry['hoursOfOperation'],'title'=>$cntry['title']);
				}
				
			}
		    
		}
		
	   $data['attractions']=$attractiondata;
	   $ids=array();
	   foreach($attractiondata as $val)
	   {
	      $ids[]=$val['id'];
	   }
	$price=array();
	foreach($ids as $id)
	{
		$price[]=$this->getPricedetails($id);
	}
	$data['price']=$price;
	
	$this->load->view('search',$data);
  }
  function getPricedetails($attraction_id){
          $access_token = $_SESSION['access_token'];
          $curl = curl_init();
		  
		  curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://uat-api.globaltix.com/api/ticketType/list?attraction_id=".$attraction_id,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
			"Accept-Version: 1.0",
			"Authorization: $access_token"
		  ),
		 ));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		    $response = json_decode($response,true);
			
			if(!empty($response['data'])){
				$cntry_ar = array();
				foreach($response['data'] as $cntry){
					$cntry_ar[]= array('id'=>$cntry['id'],'name'=>$cntry['name'],'currency'=>$cntry['currency'],'price'=>$cntry['price'],'variation'=>$cntry['variation']['name']);
				} 
				
			}
		    return $cntry_ar;
		}
  }
  public function AllCountrylist()
  {
	 
          $access_token = $_SESSION['access_token'];
          $curl = curl_init();
		  curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://uat-api.globaltix.com/api/country/getAllListingCountry",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
			"Accept-Version: 1.0",
			"Authorization: $access_token"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
       //echo '<pre>';
	   //print_r($response);
		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		    $response = json_decode($response,true);
			if(!empty($response['data'])){
				$cntry_ar = array();
				foreach($response['data'] as $cntry){
					
					 $cntry_ar[$cntry['id']]= $cntry['name'];
					
				}
				
			}
			// print_r($cntry_ar);
		    return $cntry_ar;
		}
  
  }
  function allCitylist(){
	  $countryid=$_POST['countryid'];
          $access_token = $_SESSION['access_token'];
          $curl = curl_init();
		  curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://uat-api.globaltix.com/api/city/getAllCities",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
			"Accept-Version: 1.0",
			"Authorization: $access_token"
		  ),
		 ));

		$response = curl_exec($curl);
		$err = curl_error($curl);
       
		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		    $response = json_decode($response,true);
			if(!empty($response['data'])){
				$cntry_ar = array();
				foreach($response['data'] as $cntry){
					 if($countryid==$cntry['countryId'] && $cntry['name']!='Others'){
					   $cntry_ar[$cntry['id']]= $cntry['name'];
					 }
				}
				
			}
		    echo  json_encode($cntry_ar); exit();
		}
  }
  function getallCitylists(){
          $access_token = $_SESSION['access_token'];
          $curl = curl_init();
		  curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://uat-api.globaltix.com/api/city/getAllCities",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
			"Accept-Version: 1.0",
			"Authorization: $access_token"
		  ),
		 ));

		$response = curl_exec($curl);
		$err = curl_error($curl);
       
		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		    $response = json_decode($response,true);
			if(!empty($response['data'])){
				$cntry_ar = array();
				foreach($response['data'] as $cntry){
					 if($cntry['name']!='Others'){
					   $cntry_ar[$cntry['id']]= $cntry['name'];
					 }
				}
				
			}
		    return $cntry_ar;
		}
  }
  
    public function ticket_cart()
	{
		$data=$this->M_ticket->get_ticket($_POST['ticket_id']);
		$price=$this->getPricedetails($_POST['ticket_id']);
		
		$adult_price=0;
		$child_price=0;
		
		foreach($price as $p)
		{
			if($p['variation']==='ADULT')
				$adult_price+=$p['price'];
			if($p['variation']==='CHILD')
				$child_price+=$p['price'];
		}
		$adata=$this->google_money_convert('SGD','MYR',$adult_price);
		$cdata=$this->google_money_convert('SGD','MYR',$child_price);
		//print_r($adata); die;
		$adult_price=$adata['convertedAmount'];
		$child_price=$cdata['convertedAmount'];
		$titem=array(
		   'id'=>$data[0]['id'],
		   'imagePath'=>$data[0]['imagePath'],
		   'title'=>$data[0]['title'],
		   'hoursOfOperation'=>$data[0]['hoursOfOperation'],
		   'description'=>$data[0]['description'],
		   'adult_price'=>$adult_price,
		   'child_price'=>$child_price,
		   'currency'=>'SGD'
		     
		);
		
		if(empty($this->session->userdata('ticket_cart'))) {
			$cart=array($titem);
			 $this->session->set_userdata('ticket_cart', serialize($cart));
	}else{
		 $index = $this->exists($_POST['ticket_id']);
            $cart = array_values(unserialize($this->session->userdata('ticket_cart')));
            if($index == -1) {
                array_push($cart, $titem);
                $this->session->set_userdata('ticket_cart', serialize($cart));
            } 
	}
	}
	public function remove($id)
    {
        $index = $this->exists($id);
        $cart = array_values(unserialize($this->session->userdata('ticket_cart')));
        unset($cart[$index]);
        $this->session->set_userdata('ticket_cart', serialize($cart));
        //redirect('hotels/cart_list');
    }

    private function exists($id)
    {
        $cart = array_values(unserialize($this->session->userdata('ticket_cart')));
		
        for ($i = 0; $i < count($cart); $i ++) {
			 
            if ($cart[$i]['id'] == $id) {
                return $i;
            }
        }
        return -1;
    }
	function google_money_convert($from, $to, $amount)
{
	$query=$from.'_'.$to;
    $url = "http://free.currencyconverterapi.com/api/v5/convert?q=$query&compact=ultra";
    $request = curl_init();
    $timeOut = 0;
    curl_setopt($request, CURLOPT_URL, $url);
    curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($request, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36");
    curl_setopt($request, CURLOPT_CONNECTTIMEOUT, $timeOut);
    $response = curl_exec($request);
    curl_close($request);
    $response = json_decode($response, true);
    $responseOld=$response;
    
    return $response[$query]*$amount;
}
}