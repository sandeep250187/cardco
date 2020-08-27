<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ad_admin extends CI_Model{
 
  private $tbl_admin_log =  'tbl_admin_log';
  //private $tbl_admins =  'tbl_admins';
    
  function __construct(){
	parent::__construct();	
  }
  
  function login($username, $password)
  {
   $this -> db -> select('id, username, password');
   $this -> db -> from('tbl_admin');
   $this -> db -> where('username', $username);
   $this -> db -> where('password',$password);
   $this -> db -> limit(1);
   $query = $this -> db -> get();
   $userResult = $query->result();
   if($query -> num_rows() == 1)
   {
     //$this->createLog($userResult[0]->user_id);
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
	   $this->db->update($this->tbl_admins,array('is_online'=> $status));
   }
   
   function userNameFromId($id){
	$row = $this->db->select('user_fname,user_lname')
					 ->get_where('tbl_admins',array('user_id' => $id))->row();
	return is_object($row)?$row->user_fname.' '.$row->user_lname:false;
	}
        
    function userListing($limit,$start, $like){
		$this->db->select('*');
		$this->db->from('tbl_admins');
		if(!empty($like)) : 			
			$this->db->like('username', $like);
			$this->db->or_like('user_fname', $like);
			$this->db->or_like('user_lname', $like);
			$this->db->or_like('user_phone', $like);
			$this->db->or_like('user_email', $like);
			
		endif;
		$this->db->limit($limit, $start);
		$this->db->order_by('user_id','Asc');
		$query = $this->db->get();
		return $query->result_array();
	}
	
    function countUsers(){
		       $query =   $this->db->get($this->tbl_admins);
			  return ($query->num_rows());
	}    
        
    function addUser(){
		$data = array('user_fname' => $this->input->post('user_fname'),
			'user_lname' => $this->input->post('user_lname'),
			'user_email' => $this->input->post('user_email'),
			'username' => $this->input->post('username'),
			'user_password' => SHA1($this->input->post('user_password')),
			'org_password' => $this->input->post('user_password'),
			'user_phone' => $this->input->post('user_phone'),
	);
	$this->db->insert('tbl_admins', $data);
	return  $this->db->affected_rows();
	}   
        
    function editUser($id){
	
	  if(isset($_POST['new_password']) && $_POST['new_password']!='' && $_POST['user_password']!='')
	       {
				$data = array('user_fname' => $this->input->post('user_fname'),
				'user_lname' => $this->input->post('user_lname'),
				'user_email' => $this->input->post('user_email'),
				'user_password' => SHA1($this->input->post('new_password')),
				'org_password' => $this->input->post('new_password'),
				'user_phone' => $this->input->post('user_phone'),
				'username'=> $this->input->post('username')
				);
			}
           else {
			   $data = array('user_fname' => $this->input->post('user_fname'),
				'user_lname' => $this->input->post('user_lname'),
				'user_email' => $this->input->post('user_email'),
				'user_phone' => $this->input->post('user_phone'),
				'username'=> $this->input->post('username')
				);
		   }
		
        $this->db->where('user_id',$id);        
	$this->db->update('tbl_admins', $data);
	return  $this->db->affected_rows();
	}       
        
       function user_info($id=0){
		$this->db->select('*');
		$this->db->from($this->tbl_admins);
		if(!empty($id)){
		$this->db->where('user_id',$id);
		}
		$query = $this->db->get();
		return $query->result_array();
	} 
        
        function check_exist($id,$type,$val){
		$this->db->select('user_id');
		$this->db->from($this->tbl_admins);
		$this->db->where('user_id !=',$id);
                $this->db->where($type,$val);  
		$query = $this->db->get();
		return $query->num_rows();
	   } 
        
        function userDelete( $user_id ){
		$this->db->delete('tbl_admins', array('user_id' => $user_id));
		return ($this->db->affected_rows() != 1) ? false : true;
  	}
        
        function userStatus( $user_id,$status ){
		$this->db->where('user_id',$user_id );
                $this->db->set("user_status", $status);
                $this->db->update("tbl_admins");
		return ($this->db->affected_rows() > 0) ? 2 : 0;
  	}
	function blockStatus( $user_id,$status ){
		$this->db->where('user_id',$user_id );
                $this->db->set("block_status", $status);
                $this->db->update("tbl_admins");
		return ($this->db->affected_rows() > 0) ? 2 : 0;
  	}
        
        function check_old_password($pass,$uid)
        {
            $old_psd=$this->db->get_where('tbl_admins',array('user_id'=>$uid))->row()->user_password;
            if($old_psd==SHA1($pass)){
                return TRUE;
            }
            return FALSE;
        } 
        
        
        function change_password($uid,$pass){
                $data = array('user_password' => SHA1($pass),
                    'org_password' => $pass,
                );
                $this->db->where('user_id',$uid);
                $this->db->update('tbl_admins', $data);
                return $this->db->affected_rows();
        }
        
        function forgotPass($email){
			$this->db->select('user_id');
			$this->db->from('tbl_admins');
			$this->db->where('user_email',$email);
			$query = $this->db->get();
			$result = $query->row_array();
			return $result['user_id'];
	     }
		 
		  
		 

}
?>
