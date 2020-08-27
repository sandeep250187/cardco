<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
session_start();
class Api extends CI_Controller {
	
     
   
	 public function authanTicate(){
	 	
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
	//print_r($_SESSION); die;
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
		  CURLOPT_URL => "https://uat-api.globaltix.com/api/attraction/list?countryId=".$countryid."&cityId=".$cityid."&excludeTicketTypes=true&field=&keyword=&page=1&tab=ALL",
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
	  $this->authanTicate();
	  
	  $inc_country = array('1','2','4','6','15','88');
     $auth_country = $this->getCountrylist($inc_country);
	 
	 foreach($auth_country as $key=>$value){
		 if($value=='Malaysia')
		 {
			 $countryId=$key;
		 }
	 }
	 $auth_cities =$this->getallCitylist($countryId);
	
	 foreach($auth_cities as $key=>$value){
		 if($value=='Penang')
		 {
			 $cityId=$key;
		 }
	 }
	
	  $access_token = $_SESSION['access_token'];
          $curl = curl_init();
		  
		  curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://uat-api.globaltix.com/api/attraction/list?countryId=".$countryId."&cityId=".$cityId."&excludeTicketTypes=true&field=&keyword=&page=1&tab=ALL",
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
	 
	$this->load->view('api/search');
  }

	
}
