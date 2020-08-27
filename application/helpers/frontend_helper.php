<?php 
if(!function_exists('message_boxfront'))    
{
    function  message_boxfront($msg, $status = 'success')
    {
	 $response = '';
	 $class = 'danger';
	 if($status == 'success'){
	  $class = 'success';
	 }
	 if(!empty($msg)){
	  $response = '<div class="alert alert-'.$class.'">'.$msg.'</div>';
	 }
	 return $response;
	}
}

if(!function_exists('getVenueType'))
{
    function getVenueType()
    {
    	$CI =& get_instance();
        $query = $CI->db->query("SELECT * FROM `tbl_select_fields` WHERE `id`='1'");
	    $nums = $query->num_rows();
		$result1='';
 		if($nums > 0)
		{
			 $result = $query->row_array();
			 $ides = $result['sort'];
			 $query1 = $CI->db->query("SELECT * FROM `tbl_select_options` WHERE `id` IN ($ides)");
			 $result1 = $query1->result_array();
			 return $result1;
		}
	}
}

if(!function_exists('getAccomodationCap'))
{
	function getAccomodationCap()
	{
		$CI =& get_instance();
        $query = $CI->db->query("SELECT * FROM `tbl_select_fields` WHERE `id`='3'");
	    $nums = $query->num_rows();
		$result1='';
 		if($nums > 0)
		{
			 $result = $query->row_array();
			 $ides = $result['sort'];
			 $query1 = $CI->db->query("SELECT * FROM `tbl_select_options` WHERE `id` IN ($ides)");
			 $result1 = $query1->result_array();
			 return $result1;
		}
	}
}

if(!function_exists('getRoomSetups'))
{
    function getRoomSetups()
    {
    	$CI =& get_instance();
        $query = $CI->db->query("SELECT * FROM `tbl_select_fields` WHERE `id`='2'");
	    $nums = $query->num_rows();
		$result1='';
 		if($nums > 0)
		{
			 $result = $query->row_array();
			 $ides = $result['sort'];
			 $query1 = $CI->db->query("SELECT * FROM `tbl_select_options` WHERE `id` IN ($ides)");
			 $result1 = $query1->result_array();
			 return $result1;
		}
	}
}

if(!function_exists('getRoomCap'))
{
	function getRoomCap()
	{
		$CI =& get_instance();
        $query = $CI->db->query("SELECT * FROM `tbl_select_fields` WHERE `id`='4'");
	    $nums = $query->num_rows();
		$result1='';
 		if($nums > 0)
		{
			 $result = $query->row_array();
			 $ides = $result['sort'];
			 $query1 = $CI->db->query("SELECT * FROM `tbl_select_options` WHERE `id` IN ($ides)");
			 $result1 = $query1->result_array();
			 return $result1;
		}
	}
}

if(!function_exists('getCafeCapacity'))
{
	function getCafeCapacity()
	{
		$CI =& get_instance();
        $query = $CI->db->query("SELECT * FROM `tbl_select_fields` WHERE `id`='5'");
	    $nums = $query->num_rows();
		$result1='';
 		if($nums > 0)
		{
			 $result = $query->row_array();
			 $ides = $result['sort'];
			 $query1 = $CI->db->query("SELECT * FROM `tbl_select_options` WHERE `id` IN ($ides)");
			 $result1 = $query1->result_array();
			 return $result1;
		}
	}
}

if(!function_exists('getCafeCriteria'))
{
    function getCafeCriteria()
    {
    	$CI =& get_instance();
        $query = $CI->db->query("SELECT * FROM `tbl_select_fields` WHERE `id`='6'");
	    $nums = $query->num_rows();
		$result1='';
 		if($nums > 0)
		{
			 $result = $query->row_array();
			 $ides = $result['sort'];
			 $query1 = $CI->db->query("SELECT * FROM `tbl_select_options` WHERE `id` IN ($ides)");
			 $result1 = $query1->result_array();
			 return $result1;
		}
	}
}

if(!function_exists('getCafeCriteria'))
{
    function getCafeCriteria()
    {
    	$CI =& get_instance();
        $query = $CI->db->query("SELECT * FROM `tbl_select_fields` WHERE `id`='6'");
	    $nums = $query->num_rows();
		$result1='';
 		if($nums > 0)
		{
			 $result = $query->row_array();
			 $ides = $result['sort'];
			 $query1 = $CI->db->query("SELECT * FROM `tbl_select_options` WHERE `id` IN ($ides)");
			 $result1 = $query1->result_array();
			 return $result1;
		}
	}
}


if(!function_exists('getcatSupplier'))
{
    function getcatSupplier()
    {
    	$CI =& get_instance();
        $query = $CI->db->query("SELECT * FROM `tbl_select_fields` WHERE `id`='7'");
	    $nums = $query->num_rows();
		$result1='';
 		if($nums > 0)
		{
			 $result = $query->row_array();
			 $ides = $result['sort'];
			 $query1 = $CI->db->query("SELECT * FROM `tbl_select_options` WHERE `id` IN ($ides)");
			 $result1 = $query1->result_array();
			 return $result1;
		}
	}
}

if(!function_exists('getfrontCurUserID'))
{
    function getfrontCurUserID()
    {
		$CI =& get_instance();
		$is_logged_in = $CI->session->userdata('userid');
		    if(!empty($is_logged_in))
		   {
				return $is_logged_in;
		   } else {
			return '';
		   }
    }
}

if(!function_exists('getMemberUserInfo'))
{
    function getMemberUserInfo($id)
    {
	    $CI =& get_instance();
	    $query = $CI->db->query("SELECT * from `tbl_register` WHERE `id`='$id'");
	    $nums = $query->num_rows();
	    $name = $query->row_array();
		if($nums>0)
		{
			return $name;
		}
    }
}
if(!function_exists('alreadyLogin'))
{
    function alreadyLogin()
    {
		$CI =& get_instance();
		$is_logged_in = $CI->input->cookie('userid');
		   if(!empty($is_logged_in))
		   {
				redirect('api/login#!/api/menu/');
		   } else {
			return '';
		   }
    }
}


/**************Kailash Functions *****************/
if(!function_exists('is_frontuser_logged_in'))    
{
    function is_frontuser_logged_in()
    {
		$CI =& get_instance();
		$currentUserID = getfrontCurUserID();
		$is_logged_in = $CI->session->userdata('wholeyou_member');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			redirect('/');
			die();
		}
	}
}




if(!function_exists('getMemberStatus'))
{
    function getMemberStatus()
    {
	   $CI =& get_instance();
	   $is_logged_in = $CI->session->userdata('wholeyou_member');
	   //pr($is_logged_in);exit;
	   if(isset($is_logged_in) || $is_logged_in == true)
	   {
			return $is_logged_in['status'];
	   }else
			return '';
    }
}


if(!function_exists('checkUserResource'))
{
    function checkUserResource($id)
		{
			$CI =& get_instance();
			$user_id = getfrontCurUserID();
			$query = $CI->db->query("SELECT * from `tbl_resources` where product_id='$id' and member_id=".$user_id);
			$nums = $query->num_rows();
			$name = $query->row_array();
			if($nums>0)
			{
				return $name;
			}
		}
}




if(!function_exists('Check_Category_ByName'))
{
	function Check_Category_ByName($category)
	{
		$CI =& get_instance();
		
		$query = $CI->db->query("Select * from `tbl_categories` WHERE `cat_name` LIKE '%$category%'");
		
		$nums = $query->num_rows();
		if($nums==0){
			$slug = str_replace(' ','-',strtolower($category));
			$data = array('cat_name'=>$category,'cat_slug'=>$slug,'type'=>'1');
		    $CI->db->insert('tbl_categories',$data);
            return $CI->db->insert_id();			
		}
		else {
			$result = $query->row_array();
			return $result['catid'];
			
		}
 
 		
	}
	
}



if(!function_exists('getCatlist'))
{
	function getCatlist()
	{
		$CI = & get_instance();
		$CI->load->model('M_category');		
		return $CI->M_category->index();	
	
	}
	
}

if(!function_exists('globalDateformat()'))
{
	function globalDateformat($date)
	{
		$user_id = getfrontCurUserID();
		$CI = & get_instance();
		$new_date = date('d, M Y H:i:s', strtotime($date));
		return $new_date;
	}
}

if(!function_exists('activeClass()'))
{
	function activeClass()
	{
		$CI = & get_instance();
		$urlCont = $CI->router->fetch_class();
		
		if($urlCont=='pages'){
		 $current_page = $CI->uri->segment(2); 
		}
		else if($urlCont=='faqs'){
			$current_page = 'faqs'; 
		}
		else {
			$current_page = '';
		} 
		
		return $current_page;
		
		
	}
	
}
if(!function_exists('riskColor()'))
{
	function riskColor($score=0)
	{
		$res = array();
		if($score<=2){
			$res['color'] = 'green';
			$res['label'] = 'Low Risk';
		}
		elseif($score>=3 && $score<=4){
			$res['color'] = 'orange';
			$res['label'] = 'Intermediate Risk';
		}
		elseif($score>=5 && $score<=8){
			$res['color'] = 'red';
			$res['label'] = 'High Risk';
		}	
		return $res;
		
		
	}
	
}
if(!function_exists('getUserlist'))
{
	function getUserlist()
	{
		
		    $CI = & get_instance();
			$AllOnlinequery = $CI->db->query("Select * from `tbl_members` where `status`='1'");
			$fin_array = $AllOnlinequery->result_array();
			
			
			return $fin_array;
		
		
	}
}
//************//
if(!function_exists('createUsername()'))
{
	function createUsername($name)
	{
		$user_id = getfrontCurUserID();
		$CI = & get_instance();
		$rows = $CI->db->query("SELECT MAX(id) from `tbl_members`");
		$result = $rows->row_array();
		$maxid = $result['MAX(id)']+1;
		$new_name = str_replace(' ','_',$name);
		$final_name = 'K'.$maxid.$new_name;
		return $final_name;
		
	}
	
}
//************//
if(!function_exists('membersCount()'))
{
	function membersCount($startdate='',$enddate='')	
	{
		$user_id = getfrontCurUserID();
		$CI = & get_instance();
		$CI->db->select('id');
		$CI->db->from('tbl_members');
		if($startdate!='' && $enddate!=''){
          $CI->db->where("created_on >=",$startdate);
          $CI->db->where("created_on <=",$enddate);		  
		}
		$query = $CI->db->get();
		return $nums = $query->num_rows();
		
		
	}
	
}
//************//
if(!function_exists('leadCount()'))
{
	function leadCount($startdate='',$enddate='')	
	{
		$user_id = getfrontCurUserID();
		$CI = & get_instance();
		$CI->db->select('id');
		$CI->db->from('tbl_leads');
		if($startdate!='' && $enddate!=''){
          $CI->db->where("created_on >=",$startdate);
          $CI->db->where("created_on <=",$enddate);		  
		}
		$query = $CI->db->get();
		return $nums = $query->num_rows();
		
		
	}
	
}
//************//
if(!function_exists('monthlyBar()'))
{
	function monthlyBar()
	{
		
		$CI = & get_instance();

		$c_year = date('Y');
		$month_array = array('31','28','31','30','31','30','31','31','30','31','30','31');
		$month = 1;
		$mem_str ='';
		$video_str ='';
		foreach($month_array as $days){
		    $startdate = $c_year.'-'.$month.'-'.'1'.' 00:00:00';
		    $enddate = $c_year.'-'.$month.'-'.$days.' 23:59:59';
            $month++;
            ///***** Members Query ******///			
			$CI->db->select('id');
			$CI->db->from('tbl_members');
			$CI->db->where("created_on >=",$startdate);
			$CI->db->where("created_on <=",$enddate);		  
			$query = $CI->db->get();
			$nums = $query->num_rows();
			$mem_str .= $nums.',';	
		    $final_mem = substr($mem_str,0,-1);
			///****************///
			$CI->db->select('id');
			$CI->db->from('tbl_leads');
			$CI->db->where("created_on >=",$startdate);
			$CI->db->where("created_on <=",$enddate);		  
			$query1 = $CI->db->get();
			$nums1 = $query1->num_rows();
			$video_str .= $nums1.',';	
		    $final_vstr = substr($video_str,0,-1);
			///****************///
		
		}
		return $result = array('member'=>$final_mem,'leads'=>$final_vstr);
		
	}
	
}
//************//
if(!function_exists('recentMembers()'))
{
	function recentMembers()
	{
		$CI = & get_instance();
		$CI->db->select('*');
		$CI->db->from('tbl_members');
        $CI->db->order_by('created_on','desc');
		$CI->db->limit(5);
		$query = $CI->db->get();
		return $query->result_array(); 
		
		
	}
	
}
//************//
if(!function_exists('maxleadGeneraters()'))
{
	function maxleadGeneraters()
	{
		$CI = & get_instance();
		$CI->db->select('l.member_id,l.full_name, COUNT(*) as count,m.profile_pic');
		$CI->db->from('tbl_leads l');
		$CI->db->join('tbl_members m','m.id=l.member_id');
		$CI->db->group_by('l.member_id');
        $CI->db->order_by('count','desc');
		$CI->db->limit(5);
		$query = $CI->db->get();
		return $query->result_array(); 
		
		
	}
	
}
//************//
if(!function_exists('get_mime_types()'))
{
function get_mime_types($key){
	
$mime_types = array(

            'txt' => 'text/plain',
            'htm' => 'text/html',
            'html' => 'text/html',
            'php' => 'text/html',
            'css' => 'text/css',
            'js' => 'application/javascript',
            'json' => 'application/json',
            'xml' => 'application/xml',
            'swf' => 'application/x-shockwave-flash',
            'flv' => 'video/x-flv',

            // images
            'png' => 'image/png',
            'jpe' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'jpg' => 'image/jpeg',
            'gif' => 'image/gif',
            'bmp' => 'image/bmp',
            'ico' => 'image/vnd.microsoft.icon',
            'tiff' => 'image/tiff',
            'tif' => 'image/tiff',
            'svg' => 'image/svg+xml',
            'svgz' => 'image/svg+xml',

            // archives
            'zip' => 'application/zip',
            'rar' => 'application/x-rar-compressed',
            'exe' => 'application/x-msdownload',
            'msi' => 'application/x-msdownload',
            'cab' => 'application/vnd.ms-cab-compressed',

            // audio/video
            'mp3' => 'audio/mpeg',
			'aac' => 'audio/aac',
			'oga' => 'audio/ogg',
			'wav' => 'audio/wav',
            'qt' => 'video/quicktime',
            'mov' => 'video/quicktime',
			'avi' => 'video/x-msvideo',
			'mpeg' => 'video/mpeg',
			'ogv' => 'video/ogg', 
			'webm' => 'video/webm',
			'3gp' => 'video/3gpp',
			'3g2' => 'video/3gpp2',
			'mp4' => 'video/mp4',
			'm4v' => 'video/mp4',

            // adobe
            'pdf' => 'application/pdf',
            'psd' => 'image/vnd.adobe.photoshop',
            'ai' => 'application/postscript',
            'eps' => 'application/postscript',
            'ps' => 'application/postscript',

            // ms office
            'doc' => 'application/msword',
            'rtf' => 'application/rtf',
            'xls' => 'application/vnd.ms-excel',
            'ppt' => 'application/vnd.ms-powerpoint',

            // open office
            'odt' => 'application/vnd.oasis.opendocument.text',
            'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
        );

       return $result = isset($mime_types[$key]) ? $mime_types[$key] : null;		
 }
}
//************//
if(!function_exists('fun_image_types()'))
{
function fun_image_types(){
	
$mime_types = array(
            // images
            'png' => 'image/png',
            'jpe' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'jpg' => 'image/jpeg',
            'gif' => 'image/gif',
            'bmp' => 'image/bmp',
            'ico' => 'image/vnd.microsoft.icon',
            'tiff' => 'image/tiff',
            'tif' => 'image/tiff',
            'svg' => 'image/svg+xml',
            'svgz' => 'image/svg+xml',          
        );  
     return $mime_types;		
 }
}
//************//
if(!function_exists('fun_video_types()'))
{
function fun_video_types(){
	
$mime_types = array(
            //video
            'qt' => 'video/quicktime',
            'mov' => 'video/quicktime',
			'avi' => 'video/x-msvideo',
			'mpeg' => 'video/mpeg',
			'ogv' => 'video/ogg', 
			'webm' => 'video/webm',
			'3gp' => 'video/3gpp',
			'3g2' => 'video/3gpp2',
			'mp4' => 'video/mp4',
			'm4v' => 'video/mp4',         
        );  
     return $mime_types;		
 }
}
//************//
if(!function_exists('fun_audio_types()'))
{
function fun_audio_types(){
	
$mime_types = array(
            // audio
            'mp3' => 'audio/mpeg',
			'aac' => 'audio/aac',
			'oga' => 'audio/ogg',
			'wav' => 'audio/wav',
        );  
     return $mime_types;		
 }
}
//************//
if(!function_exists('getSeoinfo()'))
{
	function getSeoinfo($main_url,$sub_url)
	{
		$CI = & get_instance();
		$CI->db->select('*');
		$CI->db->from('tbl_seo');
        $CI->db->where('main_url',$main_url);
		if(!empty($sub_url)){
		$CI->db->where('sub_url',$sub_url);
		}
		$CI->db->where('status',1);
		$query = $CI->db->get();
		return $query->row_array(); 
		
		
	}
	
}
//************//

if(!function_exists('videoDuration'))
{
	function videoDuration($seconds)
	{
		$seconds = round($seconds);
		$str = '';
		if($seconds>0 && $seconds<=60){
			$str = '0:'.round($seconds); 
			if($str==60){
				$str=1;
			}
		}
		else if($seconds>60 && $seconds<=3600){
			$minutes = ($seconds/60);
			$round_mins = round($minutes,2);
			$explode = explode('.',$round_mins);
			$str = $explode[0];
			if(isset($explode[1])){
			 $str = $explode[0].':'.$explode[1];	
			}
            if($round_mins==60){
				$str = '1'.':00'.':00';
			}			
		}
		else if($seconds>3600) {
			$minutes = ($seconds/60);
			$round_mins = round($minutes,2);
			$hours = ($round_mins/60);
			$round_hours = round($hours,2);
			
			$explode = explode('.',$round_hours);
			$str = $explode[0].':00:00'; 
			if(isset($explode[1])){
			 $str = $explode[0].':'.$explode[1].':00';	
			}
			
		}
		else {
			
		}
	   return $str;
		
		
	}
}
//penang///////////////////

if(!function_exists('getCountrylist'))
{
	function getCountrylist()
	{
		
		    $CI = & get_instance();
			$AllOnlinequery = $CI->db->query("Select * from `country` where `status`='1'");
			$cntry_array = $AllOnlinequery->result_array();
			 return $cntry_array;
		
		
	}
}

if(!function_exists('getCountrylistById'))
{
	function getCountrylistById($id)
	{
		 $CI = & get_instance();
		$countryid = $CI->db->query("Select * from `country` where `status`='1' and `id`='$id'");
		$cntryarray = $countryid->result_array();
		return $cntryarray;
		
		
	}
}

if(!function_exists('getCountryStatelist'))
{
	function getCountryStatelist($id)
	{
		 $CI = & get_instance();
		$state = $CI->db->query("Select * from `country_state` where `status`='1' and `countryId`=$id");
		$result = $state->result_array();
		return $result;
	 }
}

if(!function_exists('getCountryStatelistById'))
{
	function getCountryStatelistById($id)
	{
		 $CI = & get_instance();
		$state = $CI->db->query("Select * from `country_state` where `status`='1' and `id`=$id");
		$result = $state->result_array();
		return $result;
	 }
}


if(!function_exists('getEventDetails'))
{
	function getEventDetails($eventid)
	{
		 $CI = & get_instance();
		 //$eventId = $CI->input->cookie('event_id');
		 if(isset($eventid) && $eventid!=''){
		 	$select = $CI->db->query("Select * from `tbl_event` where `id`='$eventid' and `status`=1");
		    $result = $select->row_array();
		    return $result; 
		 }else{
		 	return false;
		 }
	 }
}

if(!function_exists('getRegisterUser'))
{
	function getRegisterUser($Id)
	{
		 $CI = & get_instance();
		  if(isset($Id) && $Id!=''){
		 	$select = $CI->db->query("Select * from `tbl_register` where `id`='$Id'");
		    $result = $select->row_array();
		    return $result; 
		 }else{
		 	return false;
		 }
	 }
}




/*++++++++++++++++++++End Template Functions++++++++++++++++++*/


/*****************************Start penang.tours***********************************/ 
if(!function_exists('gethotelgallery'))
{
	function gethotelgallery($hotelid)
	{
		 $CI = & get_instance();
		  if(isset($hotelid) && $hotelid!=''){
		 	$select = $CI->db->query("Select * from `tbl_hotelpicgallery` where `hotel_id`='$hotelid'");
		    $result = $select->result_array();
		    return $result; 
		 }else{
		 	return false;
		 }
	 }
}

if(!function_exists('getHotelDetailsById'))
{
	function getHotelDetailsById($hotelid)
	{
		//echo $hotelid;die;
		 $CI = & get_instance();
		  if(isset($hotelid) && $hotelid!=''){
		 	$CI->db->select('*');
			$CI->db->from('tbl_hotelmaster');
            $CI->db->where('id',$hotelid);
			$query = $CI->db->get();
			   return $query->row_array(); 
		  }else{
		 	return false;
		 }
	 }
}


if(!function_exists('getRoomCategory'))
{
	function getRoomCategory($roomid)
	{
		  $CI = & get_instance();
		  if(isset($roomid) && $roomid!=''){
		 	$CI->db->select('*');
			$CI->db->from('tbl_roomcat_master');
            $CI->db->where('id',$roomid);
			$query = $CI->db->get();
			   return $query->row_array(); 
		 }else{
		 	return false;
		 }
	 }
}

if(!function_exists('getAllRoe'))
{
	function getAllRoe()
	{
		  $CI = & get_instance();
		  $CI->db->select('*');
		  $CI->db->from('tbl_roe_master');
          $query = $CI->db->get();
		  return $query->row_array(); 
		  
	 }
}
if(!function_exists('getMarkup'))
{
	function getMarkup()
	{
		$markup = array('htl_adult'=>'10','htl_child'=>'5','tour_adult'=>'10','tour_child'=>'5','trfr_adult'=>'10','trfr_child'=>'5');
		return $markup;
	}
}
if(!function_exists('getPopularTour'))
{
	function getPopularTour()
	{
		    $CI = & get_instance();	  
		 	$CI->db->select('id,tour_name,thumbnail,description');
			$CI->db->from('tbl_penang_tour_master');
            $CI->db->where('popular_tour_pkg','1');
            $CI->db->limit(6, 0);
			$query = $CI->db->get();
			return $query->result_array(); 
	 }
}
if(!function_exists('getPopularHotel'))
{
	function getPopularHotel()
	{
		    $CI = & get_instance();	  
		 	$CI->db->select('id,hotel_pic,hotelname,address,starcat');
			$CI->db->from('tbl_hotelmaster');
            $CI->db->where('popular_hotel',1);
            $CI->db->limit(4, 0);
			$query = $CI->db->get();
			return $query->result_array(); 
	 }
}
if(!function_exists('getRate')){
	function getRate($id,$px){
			$CI = & get_instance();
			$query = $CI->db->select($px)->from('tbl_penang_tour_master')->where('id', $id)->get()->row();
			//$result=$query->result_array();

			return $query->$px; 
		
	}
}

if(!function_exists('hotelPricetotal')){
	function hotelPricetotal() {
		$CI =& get_instance();
		if(!empty($CI->session->userdata('hotel_cart')))
		{
        $items = array_values(unserialize($CI->session->userdata('hotel_cart')));
        $s = 0;
        foreach ($items as $item) {
            $s += $item['room_price'];
        }
        return $s;
		}else{
			return 0;
		}
    }
}

if(!function_exists('tourPricetotal')){
	function tourPricetotal() {
		$CI =& get_instance();
		if(!empty($CI->session->userdata('tour_cart')))
		{
        $items = array_values(unserialize($CI->session->userdata('tour_cart')));
        $t_total = 0;
        foreach ($items as $item) {
            $t_total += $item['tour_price'];
        }
        return $t_total;
		}else{
			return 0;
		}
    }
}

if(!function_exists('trasferlocation')){
	function trasferlocation() {
		$CI = & get_instance();	  
		$CI->db->select('search_transfer,id');
		$CI->db->from('tbl_searchtransfer');
        $query = $CI->db->get();
		return $query->result_array(); 
    }
}

if(!function_exists('trasferLocationById')){
	function trasferLocationById($id) {
		$CI = & get_instance();	  
		$CI->db->select('search_transfer');
		$CI->db->from('tbl_searchtransfer');
		$CI->db->where('id',$id);
        $query = $CI->db->get();
		return $query->row_array(); 
    }
}
if(!function_exists('google_money_convert')){
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
if(!function_exists('getAttrraction')){
function getAttrraction($att_id)
{
		$access_token = $_SESSION['access_token'];
          $curl = curl_init();
		  
		  curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://uat-api.globaltix.com/api/ticketType/list?attraction_id=".$att_id,
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
		return $response;
}
}
							
