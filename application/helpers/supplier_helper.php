<?php 
if ( ! function_exists('pr'))
{
	function pr($data){
		echo '<pre>';
		print_r($data);
		echo '</pre>';
	}
}


/********* Shiva *****************/
if(!function_exists('is_logged_in_sup'))    
{
    function is_logged_in_sup()
    {
		$CI =&get_instance();
		$CI->load->library('session');
		$is_logged_in_sup = $CI->session->userdata('wholeyou_supplier');
		if(!isset($is_logged_in_sup) || $is_logged_in_sup != true)
		{
			redirect(SUPPLIER_FOLDER.'/user/login');
			     
		}
	}
}

if(!function_exists('getSupplierUserID'))
{
    function getSupplierUserID()
    {
	   $CI =& get_instance();
	   $is_logged_in = $CI->session->userdata('wholeyou_supplier');
       if(isset($is_logged_in) || $is_logged_in == true)
       {
			return $is_logged_in['id'];
       }else

			return '';
    }
}
if(!function_exists('getMemberUserName'))
{
    function getMemberUserName()
    {
	   $CI =& get_instance();
		
	   $query = $CI->db->query("SELECT username from `tbl_members` where id='$id'");
	   
	    $nums = $query->num_rows();
	    $name = $query->row_array();
			
		if($nums>0)
		{
			
			return $name;
		}
		
	  
    }
}





if(!function_exists('getEventsNameById')){
	function getEventsNameById($id){
			$CI = & get_instance();
			$query = $CI->db->select('*')->from('tbl_event')->where(array('status' => 1,'id'=>$id))->get();
			$result=$query->row_array();			 
			return $result; 
		
	}
}



if(!function_exists('checkpass')){
	function checkpass($id, $password){
			$CI = & get_instance();
			$query = $CI->db->query(" SELECT * FROM `tbl_register` WHERE password = '$password' AND id = '$id'");
	    $nums = $query->num_rows();
 		if($nums > 0)
		{
			 return $nums;
		}else
			 return $nums;
	}
}
?>
