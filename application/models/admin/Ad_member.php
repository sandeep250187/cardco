<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ad_member extends CI_Model{

  private $tbl_admin_log =  'tbl_admin_log';
  private $tbl_members =  'tbl_members';

  function __construct(){
	parent::__construct();
  }

  function login($username, $password)
  {
   $this -> db -> select('id, username, password');
   $this -> db -> from('tbl_members');
   $this -> db -> where('username', $username);
   $this -> db -> where('password', SHA1($password));
   $this -> db -> where('status',1);
   $this -> db -> limit(1);
   $query = $this -> db -> get();
   $userResult = $query->result();
   if($query -> num_rows() == 1)
   {
     $this->createLog($userResult[0]->id);
     return $query->result();
   }
   else
   {
     return false;
   }
 }

   function createLog($userId){
	$data = array(
				'log_userId' => $userId,
				'log_in' => date('Y-m-d h:i:s a',time()),
				'log_ip' => $_SERVER['REMOTE_ADDR']
	);
	$this->db->insert('tbl_admin_log',$data);
	$this->changeLoginStatus($userId,true);
   }

   function logoutTime($userId){
	$this->db->order_by('log_id','DESC');
	$this->db->limit(1);
	$this->db->update($this->tbl_admin_log,array('log_out'=>date('Y-m-d h:i:s a',time())),array('log_userId'=>$userId));
	$this->changeLoginStatus($userId,false);
   }

   function changeLoginStatus($userId,$status){
	   $this->db->where('user_id',$userId);
	   $this->db->update($this->tbl_members,array('is_online'=> $status));
   }

   function userNameFromId($id){
	$row = $this->db->select('user_fname,user_lname')
					 ->get_where('tbl_members',array('user_id' => $id))->row();
	return is_object($row)?$row->user_fname.' '.$row->user_lname:false;
	}

    function userListing($limit, $start, $fname,$email,$from,$to){
		$this->db->select('*');
		$this->db->from('tbl_members');
		
		if($from!='null' && $to!='null'){
          $this->db->where("created_on >=",$from);
          $this->db->where("created_on <=",$to);		  
		}
		else {
			if($fname!='null'){
			 $this->db->where('fname', $fname);	
			}
			if($email!='null'){
			 $this->db->where('email', $email);	
			}
		}
		
		$this->db->limit($limit, $start);
		$this->db->order_by('id','desc');
		
		$query = $this->db->get();
		/* echo $this->db->last_query();
		die; */
		return $query->result_array();

	}

    function countUsers($fname,$email,$from,$to){
		$this->db->select('*');
		$this->db->from('tbl_members');
		if($from!='null' && $to!='null'){
          $this->db->where("created_on >=",$from);
          $this->db->where("created_on <=",$to);		  
		}
		else {
			if($fname!='null'){
			 $this->db->where('fname', $fname);	
			}
			if($email!='null'){
			 $this->db->where('email', $email);	
			}
		}
		$query =   $this->db->get();
		return ($query->num_rows());
	}

    function addUser(){

	    $user_name = '';//str_replace(' ','_',$this->input->post('user_name'));	
		
		if($_FILES['profile_pic']['error']!= 4){
			$randno = rand();
			$string = str_replace(' ', '-',$_FILES['profile_pic']['name']);
			$clearimg = preg_replace('/[^A-Za-z0-9\-.]/', '', $string);
            $imgname = $randno."_".$clearimg;
             move_uploaded_file($_FILES['profile_pic']['tmp_name'],"uploads/member/".$imgname);			
		}
		else {
			$imgname='';
		}
		
		$data = array(
			//'username' => $user_name,
			'username'=>$this->input->post('username'),
			'fname' => $this->input->post('fname'),
			'lname' => $this->input->post('lname'),
			'email' => $this->input->post('user_email'),
			'profile_pic'=>$imgname,
			'password' => SHA1($this->input->post('password')),
			'org_password' => $this->input->post('org_password'),
			'location' => $this->input->post('location'),
			'mobile' => $this->input->post('mobile'),
			'office_phone_number' => $this->input->post('office_phone_number'),
			//'experience' => $this->input->post('experience'),
			'description' => $this->input->post('description'),
			'is_iframe' => $this->input->post('is_iframe'),
			'is_tablet' => $this->input->post('is_tablet'),
			'tablet_pin' => $this->input->post('tablet_pin'),
			'clinic_name' => $this->input->post('clinic_name'),
			'c_location' => $this->input->post('c_location'),
			//'c_email' => $this->input->post('c_email'),
			//'c_phone' => $this->input->post('c_phone'),
			'c_video' => $this->input->post('c_video'),
			'tab_start_date' => $this->input->post('tab_start_date'),
			'tab_end_date' => $this->input->post('tab_end_date'),
			'ifr_start_date' => $this->input->post('ifr_start_date'),
			'ifr_end_date' => $this->input->post('ifr_end_date'),
			'status' => 1,
			);
			
		$this->db->insert('tbl_members', $data);
		//return  $this->db->affected_rows();
		/*++++++++++add credit user detail in tbl_member_credit+++++++++++++++++*/
		$id = $this->db->insert_id();
		
		$created_on = date('Y-m-d');
		$expiery_date = date('Y-m-d', strtotime('+1 years'));
		$Mdata = array(
					'member_id' => $id,
					'credit' => $this->input->post('credits'),
					'created_on' => $created_on,
					'expiery_date' => $expiery_date,
					'rem_credit' => $this->input->post('credits')
				);
		
		$this->db->insert('tbl_member_credit', $Mdata);
		return  $this->db->affected_rows();
		
     }

    function editUser($id){
		
		if($_FILES['profile_pic']['error']!= 4){
			$randno = rand();
			$string = str_replace(' ', '-',$_FILES['profile_pic']['name']);
			$clearimg = preg_replace('/[^A-Za-z0-9\-.]/', '', $string);
            $imgname = $randno."_".$clearimg;
			
			if($this->input->post('h_img')!=''){
				$linlk = base_url().'uploads/member/'.$this->input->post('h_img');
				unlink($linlk);
			}
             move_uploaded_file($_FILES['profile_pic']['tmp_name'],"uploads/member/".$imgname);			
		}
		else {
			$imgname= $this->input->post('h_img');
		}

	  if(isset($_POST['new_password']) && $_POST['new_password']!='' && $_POST['user_password']!='')
	       {
				$data = array(
				'full_name' => $this->input->post('full_name'),
				'email' => $this->input->post('user_email'),
				'password' => SHA1($this->input->post('new_password')),
				'org_password' => $this->input->post('new_password'),
				);
			}
			
           else {
			 
			 $tpin= $this->input->post('tablet_pin');
			 // echo $tpin;
			  $this->db->select('id');
			$this->db->from($this->tbl_members);
			$this->db->where('id !=',$id);
			$this->db->where('tablet_pin =', $tpin);
			$query = $this->db->get();
			$ad= $query->num_rows();
			//print_r($query->num_rows());
			
			if($_POST['is_tablet']==1)
			{
			if($ad >0)
			{
			$this->session->set_flashdata('message', 'Sorry your Tablet PIN is already Exist.');	

			redirect(admin_URL.'member/edit/'.$id); 
			
			}
			 
			}			 
			
			
			if($_POST['is_iframe']==0)
			{
				$_POST['ifr_start_date'] = '';	
				$_POST['ifr_end_date'] = '';	
			}

			if($_POST['is_tablet']==0)
			{
				$_POST['tablet_pin'] = '';	
				$_POST['tab_start_date'] = '';	
				$_POST['tab_end_date'] = '';	
			}
			
			if($_POST['is_iframe']==0 && $_POST['is_tablet']==0)
			{
				$_POST['ifr_start_date'] = '';	
				$_POST['ifr_end_date'] = '';
				$_POST['tablet_pin'] = '';	
				$_POST['tab_start_date'] = '';	
				$_POST['tab_end_date'] = '';
				$_POST['clinic_name'] = '';
				$_POST['c_location'] = '';
				//$_POST['c_email'] = '';
				//$_POST['c_phone'] = '';
				$_POST['c_video'] = '';
			}
			
			$data = array(
			   'username'=> $this->input->post('username'),
				'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				'email' => $this->input->post('user_email'),
				'credits' => $this->input->post('credits'),
				'profile_pic' => $imgname,
				'location' => $this->input->post('location'),
				'mobile' => $this->input->post('mobile'),
				'office_phone_number' => $this->input->post('office_phone_number'),
				//'experience' => $this->input->post('experience'),
				'description' => nl2br($this->input->post('description')),
				'is_iframe' => $this->input->post('is_iframe'),
				'is_tablet' => $this->input->post('is_tablet'),
				'tablet_pin' => $this->input->post('tablet_pin'),
				'clinic_name' => $this->input->post('clinic_name'),
				'c_location' => $this->input->post('c_location'),
				//'c_email' => $this->input->post('c_email'),
				//'c_phone' => $this->input->post('c_phone'),
				'c_video' => $this->input->post('c_video'),
				'tab_start_date' => $this->input->post('tab_start_date'),
				'tab_end_date' => $this->input->post('tab_end_date'),
				'ifr_start_date' => $this->input->post('ifr_start_date'),
				'ifr_end_date' => $this->input->post('ifr_end_date'),
				'status' => 1,
				);
		   }

			$this->db->where('id',$id);
			$this->db->update('tbl_members', $data);
			return  $this->db->affected_rows();

	}

	 function editProfile($id){

	  if(isset($_POST['c_password']) && $_POST['c_password']!='')
	       {
				$data = array(
				'password' => SHA1($this->input->post('c_password')),
				'org_password' => $this->input->post('c_password'),
				);
			}
           else {
			   $data = array(
			   'full_name' => $this->input->post('full_name'),
				'mobile' => $this->input->post('mobile'),
				'country' => $this->input->post('country'),
				'state' => $this->input->post('state'),
				'city' => $this->input->post('city'),
				'gender' => $this->input->post('gender'),
				'relation' => $this->input->post('relation'), 
				'profession' => $this->input->post('profession'),
				'about_user' => $this->input->post('about_user')
				);
		   }

			$this->db->where('id',$id);
			$this->db->update('tbl_members', $data);
			return  $this->db->affected_rows();

	}
	
	function editSetting($id){
		
			    $data = array(
			   'user_language' => $this->input->post('u_language'),
				'is_vd_share' => $this->input->post('is_vd_share')
			  );
            //pr($data); die;
			$this->db->where('id',$id);
			$this->db->update('tbl_members', $data);
			return  $this->db->affected_rows();

	}
	
	function editProfile_s($id){
               $register_type = getUserField('register_type');
			    if($register_type==2){
				$data = array(
				'email' => $this->input->post('email'),
				'password' => SHA1($this->input->post('password')),
				'org_password' => $this->input->post('password'),
				);
			   }
			   else {
				 $data = array(
				'password' => SHA1($this->input->post('password')),
				'org_password' => $this->input->post('password'),
				);
			   }
			   

			$this->db->where('id',$id);
			$this->db->update('tbl_members', $data);
			return  $this->db->affected_rows();

	}


       function user_info($id=0){
			$this->db->select('*');
			$this->db->from($this->tbl_members);
			if(!empty($id)){
			$this->db->where('id',$id);
			}
			$query = $this->db->get();
			return $query->result_array();
		}

        function check_exist($id,$type,$val){

			$this->db->select('id');
			$this->db->from($this->tbl_members);
			$this->db->where('id !=',$id);
			$this->db->where($type, $val);
			$query = $this->db->get();
			return $query->num_rows();

	}

        function userDelete( $user_id )
		{
				
			$this->db->delete('tbl_members', array('id' => $user_id));
			return ($this->db->affected_rows() != 1) ? false : true;
			
			$this->db->where(array('receiver_id' => $user_id));
			$this->db->delete('tbl_friend_requests');
			
			$this->db->where(array('reciever_id' => $user_id));
			$this->db->delete('tbl_notification');
					 
		}

        function userStatus( $user_id,$status ){
		$this->db->where('id',$user_id );
                $this->db->set("status", $status);
                $this->db->update("tbl_members");
		return ($this->db->affected_rows() > 0) ? 2 : 0;
  	}
	function blockStatus( $user_id,$status ){
		$this->db->where('id',$user_id );
                $this->db->set("status", $status);
                $this->db->update("tbl_members");
		return ($this->db->affected_rows() > 0) ? 2 : 0;
  	}

        function check_old_password($pass,$uid)
        {
            $old_psd=$this->db->get_where('tbl_members',array('id'=>$uid))->row()->user_password;
            if($old_psd==SHA1($pass)){
                return TRUE;
            }
            return FALSE;
        }


        function change_password($uid,$pass){
                $data = array('password' => SHA1($pass),
                    'org_password' => $pass,
                );
                $this->db->where('user_id',$uid);
                $this->db->update('tbl_members', $data);

				echo $this->db->last_query();
                return $this->db->affected_rows();
        }

        function forgotPass($email){
		$this->db->where('email',$email);
		$this->db->from('tbl_members');
		$result = $this->db->get()->row()->user_id;
		return $result;
	}

	function ChangeMemberPassword($member_id){

		$data = array('org_password' => $this->input->post('n_password'),
					'password' => SHA1($this->input->post('n_password')),
					);


		/*Change Password*/
		$msg = 0;
		$this->db->where('id',$member_id );
		$this->db->where('org_password',$this->input->post('o_password') );
	    $this->db->update('tbl_members', $data);
		//echo $this->db->last_query();die;
		$msg = ($this->db->affected_rows() > 0) ? 1 : 2;//for update : for nothing happened
	return  $msg;

	}

	 function check_reset_pwd($hash)
        {
          $this->db->select('id');
          $this->db->from('tbl_members');
		  $this->db->where('reset_pwd_hash',$hash);
		  $this->db->where('reset_pwd_status',0);
		  $query = $this->db->get(); 
		  return $query->num_rows();
        }
		
		function resetPassword($hash){
			
		$data = array('org_password'=>$this->input->post('n_password'),'reset_pwd_hash'=>'','reset_pwd_status'=>1);
		$this->db->where('reset_pwd_hash',$hash);
		$this->db->update('tbl_members',$data);
		$msg = ($this->db->affected_rows() > 0) ? 1 : 2;
	    return  $msg;

	}

	public function frequests()
	 {
		 $mem_id = getMemberUserID();
		 $this->db->select('fr.*,m.full_name,m.username');
         $this->db->from('tbl_friend_requests fr');
		 $this->db->join('tbl_members m','m.id=fr.sender_id');
         $this->db->where('fr.receiver_id',$mem_id);
         $this->db->where('fr.status',0);
		 $query = $this->db->get();
		 return $query->result_array();
	 }

	 public function faccept($rowid)
	 {
		 $this->db->where('id',$rowid);
		 $this->db->update('tbl_friend_requests',array('status'=>2));
	 }

	 public function freject($rowid)
	 {
		 $this->db->delete('tbl_friend_requests',array('id'=>$rowid));
	 }

	 public function connection($userid)
	 {
        
			$friends = array(
				'friends' => myFriends()
				
			);
			
			return $friends;
	}

	function notification($id)
	{
         $userid = getfrontCurUserID();
         if(isset($_POST['sv_vid_rqst'])){
			  $data = array('custom_message'=>$this->input->post('custom_message'),'status'=>$this->input->post('action_name'));
			  $this->db->where('id',$this->input->post('row_id'));
		      $this->db->update('tbl_notification',$data);

				  if($this->input->post('action_name')==1){
					$data_u = array(
						'id' => '',
						'uid' => $userid,
						'friend_id' => $this->input->post('ref_id'),
						'video_id' => $this->input->post('v_id'),
						'video_id' => $this->input->post('v_id'),
						'group_id' => $this->input->post('group_id'),
					);

					$this->db->insert('tbl_friends_video', $data_u);
				 }
		   }
		   if(isset($_POST['sv_difflang_rqst'])){
			  $data = array('custom_message'=>$this->input->post('custom_message'),'status'=>$this->input->post('action_name'));
			  $this->db->where('id',$this->input->post('row_id'));
		      $this->db->update('tbl_notification',$data);

				  if($this->input->post('action_name')==1){ 
					$data_u = array('status'=>'1');
					$this->db->where('id',$this->input->post('v_id'));
					$this->db->update('tbl_video_detail',$data_u);
				 }
				 redirect('user/notification/');
		   }

		$query = $this->db->query('select * from tbl_notification where reciever_id='.$id);

		return $query->result_array();


	}


	function SendNotification($id)
	{
		$userid = getfrontCurUserID();
		$shared_by = getUserField('full_name', $id);
		$group_id = mt_rand(100,1000);
		
		$username = getUserField('full_name', $id);
		$event_date = $_POST['event_date'];
		$event_time = $_POST['event_time'];
		$video_id  = $this->input->post('video_id');
		//**//
		$this->load->library('email'); 
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';
		$email_send = selectEmailTemplate('video_sharing');
		//**//
		foreach($_POST['users'] as $uid):
		$shared_user = getUserField('full_name', $uid);
		$email = getUserField('email', $uid);
		$data = array(
			'id' => '',
			'sender_id' => $id,
			'message' => $username. ' has send a video synchronization invitation.',
			'links' =>base_url().'video/detail/'.$video_id,
			'video_id' =>$video_id,
			'reciever_id' => $uid,
			'event_date' => $event_date,
			'event_time' => $event_time,
			'not_type' => 'Video Sharing',
			'date' => date('Y-m-d H:i:s'), 
			'group_id' => $group_id,
		);
		$this->db->insert('tbl_notification', $data);
		$msg = ($this->db->affected_rows() > 0) ? 1 : 0; 
        //**//
		$emailFindReplace = array(
						'##FROM_EMAIL##' => getSettingbyField(1,'admin_email'),
						'##SITE_NAME##' => 'Kerlinks',
						'##SITE_URL##' => base_url(),
						'##CLICK_HERE##' => '<a href="'.base_url().'video/friendvideo/'.$video_id.'?roomid='.$shared_by.'">Click here to watch video</a>',
						'##USER##' => $shared_user,
						'##SHARED_BY##' => $shared_by,
						'##DATE##' => $event_date,
						'##TIME##' => $event_time,
						
					);
					
					$message = strtr($email_send->email_text_content, $emailFindReplace);
					
					$subject = strtr($email_send->subject, $emailFindReplace);
					$from= strtr($email_send->from, $emailFindReplace);
					
					/* echo mailerTemplate($message);
				    die('------------------------------');  */
					/* template end */
					$this->email->initialize($config);
					$this->email->from($from, 'Kerlinks');
					$this->email->to($email);
					$this->email->subject($subject);
					$this->email->message(mailerTemplate($message));
					$this->email->send();
					$this->email->clear(TRUE);
		//**//

		endforeach;

		return $msg;

	}
	
	 function findfriend($field){
			 $userid = getfrontCurUserID();
			 $query = $this->db->query("SELECT * from `tbl_members` where `full_name` LIKE '%$field%' OR `email` LIKE '%$field%' OR `username` LIKE '%$field%' AND `id`!='$userid'");
			 return $query->result_array();
			 //echo $this->db->last_query();
			 
			 
	     }
		 
	function UpdateUserShipping($memberId)
	{
				
				$query = $this->db->query("SELECT * from `tbl_members_shipping` where `member_id`='$memberId'");
				$result = $query->result_array();
				if(count($result)>0)
				{
					$data = array(
							'name' => $_POST['name'],
							'email' => $_POST['user_email'],
							'contactno' => $_POST['mobile'],
							'address' => $_POST['address'],
							'city' => $_POST['city'],
							'state' => $_POST['state'],
							'country' => $_POST['country'],
							'zip' => $_POST['zipcode'],
							'status' => 1
						);
					$this->db->where('member_id', $memberId);
					$this->db->update('tbl_members_shipping', $data);
				}
				else
				{
					$data = array(
							'member_id' => $memberId,
							'name' => $_POST['name'],
							'email' => $_POST['user_email'],
							'contactno' => $_POST['mobile'],
							'address' => $_POST['address'],
							'city' => $_POST['city'],
							'state' => $_POST['state'],
							'country' => $_POST['country'],
							'zip' => $_POST['zipcode'],
							'status' => 1
						);
				
					$this->db->insert('tbl_members_shipping', $data);
					
				}
				
	}
	
	
	function UserShippingInfo($memberId)
	{
		$query = $this->db->query("SELECT * from `tbl_members_shipping` where `member_id`='$memberId'");
		$result = $query->result_array();
		return $result;
	}

	function addCredit($memberId)
	{
			$data = array(
						'member_id' => $memberId,
						'credit' => $_POST['credits'],
						'created_on' => date('Y-m-d'),
						'expiery_date' => date('Y-m-d', strtotime('+1 years')),
						'rem_credit' => $_POST['credits']
					);
			$this->db->insert('tbl_member_credit', $data);
			$msg = $this->db->affected_rows();
	}
	
	
	function creditListing($id)
	{
		$query = $this->db->query("SELECT * from `tbl_member_credit` where `member_id`='$id'");
		$result = $query->result_array();
		return $result;
	}
	
	 function check_username($username){
				$this->db->select('id');
				$this->db->from('tbl_members');
				$this->db->where('username',$username);
				$query = $this->db->get();
				return $query->num_rows();
			} 
}


?>
