<?php 
if(!function_exists('message_box'))    
{
    function  message_box($msg, $status = 'success')
    {
	 $response = '';
	 $class = 'danger';
	 if($status == 'success'){
	  $class = 'success';
	 }
	 if(!empty($msg)){
	  $response = '<div class="alert alert-'.$class.' no-margin" style="margin-bottom:15px!important;">'.$msg.'</div>';
	 }
	 return $response;
	}
}
if(!function_exists('getMemberUserID'))
{
    function getMemberUserID()
    {
	   $CI =& get_instance();
	   $is_logged_in = $CI->session->userdata('wholeyou_member');
       if(isset($is_logged_in) || $is_logged_in == true)
       {
			return $is_logged_in['id'];
       }else
			return '';
    }
}
if(!function_exists('getCurUserID'))    
{
    function getCurUserID()
    {
	   $CI =& get_instance();
	   $is_logged_in = $CI->session->userdata('wholeyou_admin');
       if(isset($is_logged_in) || $is_logged_in == true)
       {
		return $is_logged_in['id'];   
       } else 
	    return '';
    }
}
if(!function_exists('userNameFromId')){
	function userNameFromId($id=''){
		if(!isEmpty($id)){
			$CI = & get_instance();
			$row = $CI->db->select('username')
					 ->get_where('tbl_admin',array('id' => $id))->row();
	            return is_object($row)?$row->username:false;
		}else {
			return false;
		}
	}
}
if(!function_exists('GetMemberInfo')){
	function GetMemberInfo($id='',$fields='*'){
		if(!isEmpty($id)){
			$CI = & get_instance();
			$query = $CI->db->select($fields)->from('tbl_members')->where(array('id' => $id))->get();
			$result=$query->result_array();			 
			return $result[0]; 
		} else {
			return false;
		}
	}
}

if(!function_exists('GetProductInfo')){
	function GetProductInfo($id='',$fields='*'){
		if(!isEmpty($id)){
			$CI = & get_instance();
			$query = $CI->db->select($fields)->from('tbl_products')->where(array('id' => $id))->get();
			$result=$query->result_array();			 
			return $result[0]; 
		} else {
			return false;
		}
	}
}

/*** ## common **/
if (! function_exists('showmsg'))
{
	function showmsg($msg){
	      if(!empty($msg)){
		  $html='';
		  $html .='<div class="alert alert-success custom_green_alert">'.$msg.'</div>';
		  return $html;
	      } else {
		  return '';
	      }
		}
}
if ( ! function_exists('showerrormsg'))
{
	function showerrormsg($msg){
		
	      if(!empty($msg)){
		  $html='';
		  $html .='<div class="alert alert-danger custom_red_alert">'.$msg.'</div>';
		  return $html;
	      } else {
		  return '';
	      }
		}
}
if (! function_exists('val_error'))
{
	function val_error($msg){
	      if(!empty($msg)){
		  $html='';
		  $html .='<div class="validation_error">'.$msg.'</div>';
		  return $html;
	      } else {
		  return '';
	      }
		}
}
if (! function_exists('sholockmsg'))
{
	function sholockmsg($msg){
	      if(!empty($msg)){
		  return $msg;
	      } else {
		  return '';
	      }
		}
}
if ( ! function_exists('isEmpty'))
{
	function isEmpty($var){
		 if (is_array($var)){
		    $arFilter=  array_filter($var);
		    if(empty($arFilter)) return true;
		    else return false;
		} else {
		if(empty($var) || trim($var) == "" || $var == NULL) return true;
		else return false;
		}
	}
}


	if(!function_exists('checkSocial'))
		{	
			function checkSocial($email)
			{		
				$CI =  & get_instance();	
				$query =  $CI->db->select('*')->from('tbl_members')->where('email',$email)->get();
				return $query->num_rows();
			}
		}
	
	
	
	/* if(!function_exists('insertSocials'))
		{	
			function insertSocials($data)
			{		
			$CI =  & get_instance();	
			$name = $data['first_name']."&nbsp;".$data['last_name'];	
			$email = $data['email'];		
			$query =  $CI->db->insert('tbl_members', $data);		
			return $CI->db->affected_rows();	
			}
		} */
			
	
		/// Login Social 
		if(!function_exists('loginSocials'))
		{	
			function loginSocials($email,$type)
			{		
			
			$CI =  & get_instance();
			
			$query =  $CI->db->select('*')->from('tbl_members')->where(array('email'=>$email,'register_type'=>$type))->get(); 
				  
			$arr=$query->result_array();		
			//pr($arr);  die;		     
			
			
			$nums = $query->num_rows();		
			if($nums>0){				
			
			$sess_array = array(		
			'id' => $arr[0]['id'],			
			'username' => $arr[0]['username'],		
			'register_type' => $arr[0]['register_type'],	
			'status' => $arr[0]['status']			
			);				
			
			$CI->session->set_userdata('wholeyou_member', $sess_array);      
			//$logdata = array('user_last_login'=>date('Y-m-d h:i:s')); 			
			//$uid = $arr[0]['id']; 		        
			//$CI->db->where('id',$uid);		       
			//$CI->db->update('tbl_members',$logdata);			
			}			 
			return $nums;					
			}
		}

if(!function_exists('mailerTemplate'))
{
	function mailerTemplate($message)
	{
			
			$mailertmp='<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF; border:3px solid #ea5404; width:600px; margin:0 auto; font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#141414;">
			<thead><tr><th style="background:#007bff;padding:10px 0;"><p><img src="'.base_url().'assets/images_home/logo.png" width="180" alt="" border="0" /></p></th></tr></thead><tbody><tr><td style="padding:0 20px;">';
			$mailertmp .=$message;
			$mailertmp .='</td></tr></tbody><tfoot><tr><td style="padding:20px 20px; font-size:16px;"><p>Regards,<br />Penang Tours</p></td></tr></tfoot></table>';
			
			return $mailertmp;		
			
	 }
}
	
if(!function_exists('mailerTemplateResult'))
{
	function mailerTemplateResult($message)
	{
			
			$mailertmp='<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF; border:3px solid #ea5404; width:600px; margin:0 auto; font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#141414;">
			<thead><tr><th style="background:#eee;padding:10px 0;"></th></tr></thead><tbody><tr><td style="padding:0 1px;">';
			$mailertmp .=$message;
			$mailertmp .='</td></tr></tbody></table>';
			
			return $mailertmp;
			
	 }
}
			
 if(!function_exists('selectEmailTemplate'))
 {	
					function selectEmailTemplate($template='')
					{		
						if(!isEmpty($template))
						{		
						$CI = & get_instance();	
						$CI->load->model('admin/M_setting');		
						return $CI->M_setting->selectEmailTemplate($template);	
						}
						else 
						{							
							return false;
						}
					}		
}
			
if(!function_exists('getSettingbyField')){
	function getSettingbyField($id=1,$field='admin_email'){ 
		if(!isEmpty($id)){
			$CI = & get_instance();
			$CI->load->model('admin/M_setting');
			return $CI->M_setting->getSettingbyField($id,$field);
		}else
			return false;
	}
}
			
			
//  Get Categories Type
if(!function_exists('itsgetCategory')){
	function itsgetCategory(){
		$CI =  & get_instance();
		$output =  $CI->db->select('*')->from('tbl_category')->get();
		//$zipcode = '';
		if ($output->num_rows() > 0)
		{
			$row = $output->result_array();
			return $row;
		}
		
		
	}
}
//  Get Keywords 
if(!function_exists('itsgetkeywords')){
	function itsgetkeywords($taskid=0){
		$CI =  & get_instance();
		$output =  $CI->db->select('tc.catid,(SELECT type FROM `tbl_categories` c WHERE c.catid = tc.catid) AS TYPE')->from('tbl_task_categories tc') ->where(array('taskid'=>$taskid))->get();
		if ($output->num_rows() > 0)
		{
			$row = $output->result_array();
			$keys = '';
			foreach($row as $newrow)
			{
			 	if($newrow['TYPE']=='2'){
			      $keys[] = $newrow['catid'];
				}
			}
		    return $keys;	
		}
		
	}
}
//  Get Category Name
if(!function_exists('itsgetCategoryname')){
	function itsgetCategoryname($keyid=0){
		$ids = $keyid;
		//print_r($ids);
//$this->db->where_in('id', $ids );
		$CI =  & get_instance();
		$output =  $CI->db->select('cat_name')->from('tbl_category')
		 ->where_in('id',$ids)->get();
		// echo $CI->db->last_query();
		if ($output->num_rows() > 0)
		{
			$row = $output->row();
			return $row;
		}
		
	}
}
//  Get Keywords Name
if(!function_exists('itsgetkeyworname')){
	function itsgetkeyworname($keyid=0){
		$CI =  & get_instance();
		$output =  $CI->db->select('cat_name')->from('tbl_categories')
		 ->where(array('catid'=>$keyid,'type'=>2))->get();
		if ($output->num_rows() > 0)
		{
			$row = $output->result_array();
			return $row;
		}
		
	}
}

if(!function_exists('getChildCategories')){
	function getChildCategories($pid=''){
		$CI =  & get_instance();
		$count = 0;$categories='';
		if($pid){
			$output =  $CI->db->select('*')->from('tbl_categories')
			 ->where('parent',$pid)
			->get();
			if ($output->num_rows() > 0)
			{
				foreach($output->result_array() as $row){
					$categories[$count]['id'] = $row['catid'];
					$categories[$count]['cat_name'] = $row['cat_name'];
					$categories[$count++]['parent'] = $row['parent'];
				}
			}
		}
		return $categories;
		//print_r($categories);die;
	}
}

if(!function_exists('getCategoryFieldByName')){
	function getCategoryFieldByName($cat_name='',$field ='catid'){
		$CI =  & get_instance();
		if($cat_name){
			$output =  $CI->db->select($field)->from('tbl_categories')
			 ->where('cat_name',$cat_name)
			->get();
			if ($output->num_rows() > 0)
			{
				  $row = $output->row(); 

				return $row->$field;
			}else
				return '';
			
		}

		//print_r($categories);die;
	}
}

if(!function_exists('datediff'))
{
	function datediff($fromdate)
	{
	 if($fromdate){
		$todate=date('m/d/Y h:i:s a');
		$diff = abs(strtotime($todate) - strtotime($fromdate));
		$years = floor($diff / (365*60*60*24));
		$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
		$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
		if($days==1 || $days >1){
		return $days.' '.'Days ago';
		}
       else {
		 return 'Today';
		}
		
	 }
	}
}

if(!function_exists('getUserField'))
{
    function getUserField($field,$member_id='')
    {
	   $CI =& get_instance();
	   
	    $is_logged_in = $CI->session->userdata('wholeyou_member');
		if($member_id){
			$member_id = $member_id;
		}else{
			$member_id = $is_logged_in['id'];
		}			
		$CI->db->select('*');
		$CI->db->from('tbl_members m1');
		$CI->db->where('m1.id', $member_id);
		$query = $CI->db->get();
		$member = $query->row_array();
	    
       if(isset($member_id) || $member[$field]!='')
       {
			return $member[$field];
       } 
	   else
	   {
		   return '';
	   }
			
    }
}

if(!function_exists('saniTize'))
{
	function saniTize($input){
		if($input){ 
		 $input = trim($input); // get rid of white space left and right
		 $input = htmlentities($input); // convert symbols to html entities
		 $input = addslashes($input); // server doesn't add slashes, so we will add them to escape ',",\,NULL
		 //$input = mysql_real_escape_string($input); // escapes \x00, \n, \r, \, ', " and \x1a
         return $input;		 
		 }
	}
}

if(!function_exists('UnSaniTize'))
{
	function UnSaniTize($input){
		if($input){ 
		 $input = stripslashes($input); 
         return $input;		 
		 }
	}
}

// Get User Profile Pic
if(!function_exists('getuserPic')){
	 function getuserPic($userid){
		 $CI =  & get_instance();
		 $query = $CI->db->select('register_type,profile_pic')->from('tbl_members')->where('id',$userid)->get();
			if ($query->num_rows() > 0)
			{
			   $row = $query->result_array();
			   $utype = $row[0]['register_type'];  
			   $pimage = $row[0]['profile_pic'];

					if($pimage!=''){
							$full_url = base_url().'uploads/profile-image/'.$pimage;
							if(file_exists('uploads/profile-image/'.$pimage)){
								$img = $full_url;
							}
							else {
								$img = $pimage;
							}
							
					   }
					else {
					  $img='';	
					}
					
				return $img;
			}
		 
	 }
}
//Get video upload size in current week
if(!function_exists('getVideoSizeInWeek')){
	 function getVideoSizeInWeek($userid, $redirect_url = '/uservideo/listvideo'){
		$monday = date( 'Y-m-d h:i:s', strtotime( 'monday this week' ) );
		$sunday = date( 'Y-m-d h:i:s', strtotime( 'sunday this week' ) ); 
		$CI = & get_instance();
		$CI->db->select('SUM(video_size) as video_size');
		$CI->db->from('tbl_video_property');
		$CI->db->where('created_on>',$monday);
		$CI->db->where('created_on<',$sunday);
		$CI->db->where('u_id',$userid);
		$result = $CI->db->get()->row_array('video_size');
		if($result){
			//return $result['video_size'];
			if($result['video_size'] >=5368709120){ /* 5 gb = 5368709120 Byte */
				$noupload = $CI->session->set_flashdata('noupload', 'Sorry, you have exceeded your weekly video upload limit. You will be able to upload video(s) from upcoming Monday.');
				redirect($redirect_url,'refresh');
			}
		}		 
	 }
}


//Get list of users whom video is shared
if(!function_exists('getVideoshareuser')){
	 function getVideoshareuser($videoid,$event_date,$event_time){	 
		$sender_id = getfrontCurUserID(); 
		$CI = & get_instance();
		$CI->db->select('reciever_id,event_date,event_time,status');
		$CI->db->from('tbl_notification');
		$CI->db->where('sender_id',$sender_id);
		$CI->db->where('video_id',$videoid);
		$CI->db->where('event_date',$event_date);
		$CI->db->where('event_time',$event_time);
		$CI->db->where('not_type','Video Sharing'); 
		$query = $CI->db->get();
		//echo $CI->db->last_query();
		$result = $query->result_array();
		//pr($result);
		$make_array='';
		if($result){
			foreach($result as $rows){
			  if($rows['status']==1){
				  $status = 'Accepted';
				  $color = '#65ba16';
			  }
			  else {
				 $status = 'Not accepted';
                 $color = '#e02918';				 
			  }
			  $username = getUserField('username', $rows['reciever_id']);
			  $make_array[] = array('reciever_id'=>$rows['reciever_id'],'user'=>$username,'status'=>$status,'color'=>$color);
			}	
	    }
		return $make_array;
		
}
}

//Get video uploaded size in current week
if(!function_exists('getVideoUploadInWeek')){
	 function getVideoUploadInWeek($userid){
		$monday = date( 'Y-m-d h:i:s', strtotime( 'monday this week' ) );
		$sunday = date( 'Y-m-d h:i:s', strtotime( 'sunday this week' ) ); 
		$CI = & get_instance();
		$CI->db->select('SUM(video_size) as video_size');
		$CI->db->from('tbl_video_property');
		$CI->db->where('created_on>',$monday);
		$CI->db->where('created_on<',$sunday);
		$CI->db->where('u_id',$userid);
		$result = $CI->db->get()->row_array('video_size');
		if($result){
			if($result['video_size']!=''){
				$used = $result['video_size'];	
			  
			}
			else {
				$used = 0;
			}
			
			$percent = $used*100/5368709120;
			return round($percent);
			
			/* if($result['video_size'] >=5368709120){
				
				
			} */
		}		 
	 }
}

if(!function_exists('base64url_decode'))    
{
	function base64url_decode($data) { 
	  return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT)); 
	}
}
if(!function_exists('base64url_encode'))    
{	
	function base64url_encode($data) { 
	  return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); 
	} 
}

//Get lead resources 1-website, 2-iframe, 3-tab,
if(!function_exists('lead_type')){
	 function lead_type($lead_type){		
		if($lead_type){
			$arr = array(
						'1' => 'Website',
						'2' => 'Iframe',
						'3' => 'Tablet',
					); 
			return 	$arr[$lead_type];		
		}		
	 }
}

//Get Questions by survey order,
if(!function_exists('formFielybyOrder')){
	 function formFielybyOrder($order){		
		if($order){
			$CI = & get_instance();
			$CI->db->select('*');
			$CI->db->from('tbl_question');
			$CI->db->where('order',$order);
			$CI->db->order_by('sub_order','Asc');
			$result = $CI->db->get()->result_array();	
            return $result;			
		}		
	 }
}
//Check form Submit status
if(!function_exists('checkForm')){
	 function checkForm($randuser_id){		
		if($randuser_id){
			$CI = & get_instance();
			$CI->db->select('step');
			$CI->db->from('tbl_leads');
			$CI->db->where('randuser_id',$randuser_id);
			$result = $CI->db->get()->row_array();	
            return $result['step'];			
		}		
	 }
}


if(!function_exists('getLeadid')){
	 function getLeadid($randuser_id){		
		if($randuser_id){
			$CI = & get_instance();
			$CI->db->select('id');
			$CI->db->from('tbl_leads');
			$CI->db->where('randuser_id',$randuser_id);
			$result = $CI->db->get()->row_array();	
            return $result['id'];			
		}		
	 }
}

if(!function_exists('calculateRisk')){
	 function calculateRisk($lead_id){		
		if($lead_id){
			$CI = & get_instance();
			$CI->db->select('*');
			$CI->db->from('tbl_leads_ans');
			$CI->db->where('lead_id',$lead_id);
			$result = $CI->db->get()->result_array();

            $nof_y = 0;
			$nof_n = 0; 			
			//pr($result);
			$q_yes_no = array('1','2','3','4');
			if(!empty($result)){
				$ans_arr= array();
				foreach($result as $res){
					if(in_array($res['ques_id'],$q_yes_no)){
						$ans_arr[] = $res['answer'];
					}
				}
			}
			//************//
			$q_h_w = array('5','6','7','8','9');
			if(!empty($result)){
				$ans_arr1= array();
				foreach($result as $res){
					if(in_array($res['ques_id'],$q_h_w)){
						$ans_arr1[] = $res['answer'];
					}
				}
			}
			$height = $ans_arr1[0];
			$expl = explode("'",$height);
			$feet_h = $expl[0];
			$inch_h = substr($expl[1],0,-1);
			$pound = $ans_arr1[1];
			$age = $ans_arr1[2];
			
			$neck = $ans_arr1[3];
			$exp_neck = explode("'",$neck);
			$neck_1 = $exp_neck[0];
			$neck_2 = substr($exp_neck[1],0,-1);
			$neck_final = $neck_1.'.'.$neck_2;
			$neck_size = round($neck_final); 
			
			$gender = $ans_arr1[4];
			$kg = $pound* 0.45359237;
			$height_m = ($feet_h*0.3048)+($inch_h*0.0254);
            $bmi = $kg/$height_m;
            $final_bmi	= round($bmi/$height_m); 
			if($final_bmi>35){
				$nof_y = $nof_y+1;
			}
			if($age>50){
				$nof_y = $nof_y+1;
			}
			if($gender=='Male' && $neck_size>17){
				$nof_y = $nof_y+1;
			}
			if($gender=='Female' && $neck_size>16){
				$nof_y = $nof_y+1;
			}
			//************//
			foreach($ans_arr as $ans){
				if($ans=='Yes'){
				 $nof_y = $nof_y+1;	
				}
				if($ans=='No'){
					$nof_n = $nof_n+1;
				}
			}
			if($nof_y<=2){
				$risk = "Low Risk";
				$color="green";
			}
			else if($nof_y>2 && $nof_y<=4){
				$risk = "Intermediate Risk";
				$color="orange";
			}
			else {
				$risk = "High Risk";
				$color="red";
			}
		    return $res_arr = array('risk'=>$risk,'nofy'=>$nof_y,'color'=>$color);			
		}		
	 }
}

if(!function_exists('sendResult')){
	 function sendResult($member_id,$score,$risk,$full_name,$email,$color){		
		if($member_id){
			$CI = & get_instance();
			$CI->load->library('email'); 
			$config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = TRUE;
			$config['mailtype'] = 'html';

			$admin_details = getSettingbyField(); 
			$clinic_name = $admin_details['clinic_name'];
			$cemail = $admin_details['admin_email'];
			$office_phone_number = $admin_details['admin_contact'];
			$risk_text = "<span style='color:".$color."'>".$risk."</span>";
			$email_send = selectEmailTemplate('survey_result');
			$emailFindReplace = array(
			'##SUBJECT##' => 'Survey Result',
			'##FROM_EMAIL##' => '<'.$cemail.'>',
			'##SITE_NAME##' => 'Wholeyou',
			'##SCORE##' => $score,
			'##RISK##' => $risk_text,
			'##USER##' => ucwords($full_name),
			'##CLINIC_NAME##' => $clinic_name,
			'##OFFICEPHONENO##' => $office_phone_number,
			);	
			$message = strtr($email_send->email_text_content, $emailFindReplace);
			$subject = strtr('['.$clinic_name.'] '.$email_send->subject, $emailFindReplace);
			$from= strtr($email_send->from, $emailFindReplace);
           /*  echo mailerTemplateResult($message); die; */
			$CI->email->initialize($config);
			$CI->email->from($from, $clinic_name);
			$CI->email->to($email);
			$CI->email->subject($subject);
			$CI->email->message(mailerTemplateResult($message));
			$CI->email->send();		
		}		
	 }
}

if(!function_exists('getQuestions')){
	 function getQuestions(){		
			
			$ques_array = array('1'=>'first','2'=>'second','3'=>'third','4'=>'fourth','5'=>'fifth','6'=>'sixth','7'=>'seventh','8'=>'eighth','9'=>'ninth');
			$fileds_arr = '';
			if(!empty($ques_array)){
				foreach($ques_array as $key=>$val){
					$fields = formFielybyOrder($key);
					$fileds_arr[$val]= $fields;
				}
			}
            			
           return $fileds_arr;
           			
	 }
}

if(!function_exists('getCreditinfo')){
	function getCreditinfo($member_id){		
		if($member_id){
			
			$cur_date = date('Y-m-d');
			$CI = & get_instance();
			$CI->db->select('SUM(credit) AS total_credit,SUM(rem_credit) AS rem_credit, (SUM(credit)-SUM(rem_credit)) as used_credit');
			$CI->db->from('tbl_member_credit');
			$CI->db->where('member_id',$member_id);
			$CI->db->where('expiery_date >=',$cur_date);
			return $result = $CI->db->get()->row_array();		
			
		}		
	 }
}

if(!function_exists('usedCreditinfo')){
	 function usedCreditinfo($member_id){		
		if($member_id){
			$cur_date = date('Y-m-d');
			$CI = & get_instance();
			$CI->db->select('SUM(credits) AS usedcredit');
			$CI->db->from('tbl_resources');
			$CI->db->where('member_id',$member_id);
			return $result = $CI->db->get()->row_array();		
		}		
	 }
}

if(!function_exists('getPageinfo')){
	 function getPageinfo($page_id){		
		if($page_id){
			$CI = & get_instance();
			$CI->db->select('*');
			$CI->db->from('tbl_static_content_value');
			$CI->db->where('static_id',$page_id);
			$CI->db->order_by('static_order','ASC');
			$result = $CI->db->get()->result_array();	
			$res_arr = array();
            if(!empty($result)){
				foreach($result as $row){
					$key = $row['static_key'];
					$val = $row['static_value']; 
				    $res_arr[$key] = $val; 
				}
			}	
		}		
		 return $res_arr;
	 }
}

/********* Shiva *****************/

if(!function_exists('getEvents')){
	function getEvents(){
			$CI = & get_instance();
			$query = $CI->db->select('*')->from('tbl_event')->where(array('status' => 1))->get();
			$result=$query->result_array();			 
			return $result; 
		
	}
}


if(!function_exists('showEvents')){
	function showEvents($id){
			$CI = & get_instance();
			$query = $CI->db->select('*')->from('tbl_event')->where('id', $id)->get();
			$result=$query->result_array();			 
			return $result; 
		
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
if(!function_exists('is_logged_in'))    
{
    function is_logged_in()
    {
		
        $CI =&get_instance();
		$CI->load->library('session');
		$is_logged_in = $CI->session->userdata('wholeyou_admin');
		if(empty($is_logged_in)){
			 redirect(ADMIN_FOLDER.'/user/login');
		}
	if(!isset($is_logged_in) || $is_logged_in != true)
		{
			 redirect(ADMIN_FOLDER.'/user/login');
		} 
	}
}



/*<!-------------------------------Penang Tours-------------------
*/
if(!function_exists('getHotelList')){
	function getHotelList(){
			$CI = & get_instance();
			$query = $CI->db->select('*')->from('tbl_hotelmaster')->get();
			$result=$query->result_array();			 
			return $result; 
		
	}
}
if(!function_exists('getApartmentList')){
	function getApartmentList(){
			$CI = & get_instance();
			$query = $CI->db->select('*')->from('tbl_apartmentmaster')->get();
			$result=$query->result_array();			 
			return $result; 
		
	}
}
if(!function_exists('getHotel')){
	function getHotel($hid){
			$CI = & get_instance();
			$query = $CI->db->select('hotelname')->from('tbl_hotelmaster')->where('id', $hid)->get()->row();
			//$result=$query->result_array();

			return $query->hotelname; 
		
	}
}
if(!function_exists('getApartment')){
	function getApartment($hid){
			$CI = & get_instance();
			$query = $CI->db->select('aptname')->from('tbl_apartmentmaster')->where('id', $hid)->get()->row();
			//$result=$query->result_array();

			return $query->aptname; 
		
	}
}
if(!function_exists('getRoomCat')){
	function getRoomCat($rc_id){
			$CI = & get_instance();
			$query = $CI->db->select('roomtype')->from('tbl_roomcat_master')->where('id', $rc_id)->get()->row();
			//$result=$query->result_array();

			return $query->roomtype; 
		
	}
}
if(!function_exists('getAptCat')){
	function getAptCat($rc_id){
			$CI = & get_instance();
			$query = $CI->db->select('aptcat')->from('tbl_aptcat_master')->where('id', $rc_id)->get()->row();
			//$result=$query->result_array();

			return $query->aptcat; 
		
	}
}
if(!function_exists('getCategory')){
	function getCategory(){
			$CI = & get_instance();
			$query = $CI->db->select('*')->from('tbl_roomcat_master')->get();
			$result=$query->result_array();			 
			return $result; 
		
	}
}
if(!function_exists('getCategoryApt')){
	function getCategoryApt(){
			$CI = & get_instance();
			$query = $CI->db->select('*')->from('tbl_aptcat_master')->get();
			$result=$query->result_array();			 
			return $result; 
		
	}
}
if(!function_exists('getTourList')){
	function getTourList(){
			$CI = & get_instance();
			$query = $CI->db->select('*')->from('tbl_penang_tour_master')->get();
			$result=$query->result_array();			 
			return $result; 
		
	}
}
if(!function_exists('getTourName')){
	function getTourName($tid){
			$CI = & get_instance();
			$query = $CI->db->select('tour_name')->from('tbl_penang_tour_master')->where('id',$tid)->get()->row();
			//$result=$query->result_array();			 
			return $query->tour_name; 
		
	}
}













?>