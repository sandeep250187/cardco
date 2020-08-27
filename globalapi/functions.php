<?php
    session_start();
	function pr($data){
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}

 function authanTicate(){
	 
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
		    return $response;
		}
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

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		    $response = json_decode($response,true);
			if(!empty($response['data'])){
				$cntry_ar = '';
				foreach($response['data'] as $cntry){
					if(in_array($cntry['id'],$inc_country))
					{
					 $cntry_ar[$cntry['id']]= $cntry['name'];
					}
				}
				
			}
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
				$cntry_ar = '';
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
	      $cityid='';
          $access_token = $_SESSION['access_token'];
          $curl = curl_init();
		  
		  curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://uat-api.globaltix.com/api/attraction/list?countryId=".$countryid."&cityId=".$cityid."&excludeTicketTypes=true&field=&keyword=&page=1&tab=ALL",
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
				$cntry_ar = '';
				foreach($response['data'] as $cntry){
					$cntry_ar[]= array('id'=>$cntry['id'],'imagePath'=>$cntry['imagePath'],'description'=>$cntry['description'],'hoursOfOperation'=>$cntry['hoursOfOperation'],'title'=>$cntry['title']);
				}
				
			}
		    return $cntry_ar;
		}
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
				$cntry_ar = '';
				foreach($response['data'] as $cntry){
					$cntry_ar[]= array('id'=>$cntry['id'],'name'=>$cntry['name'],'currency'=>$cntry['currency'],'price'=>$cntry['price'],'variation'=>$cntry['variation']['name']);
				} 
				
			}
		    return $cntry_ar;
		}
  }
  
 
?>