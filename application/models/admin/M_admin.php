<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_admin extends CI_Model{
 
  private $tbl_admin_log =  'tbl_admin_log';
  private $tbl_admins =  'tbl_admins';  
    
  function __construct(){
	parent::__construct();	
  }
  
  function login($username, $password)
  {
   $this -> db -> select('user_id, username, user_password, user_role, user_type');
   $this -> db -> from('tbl_admins');
   $this -> db -> where('username', $username);
   $this -> db -> where('user_password', SHA1($password));
   $this -> db -> where('user_status',1); 
   $this -> db -> limit(1);

   $query = $this -> db -> get();
   //echo $this->db->last_query();
   $userResult = $query->result();
   if($query -> num_rows() == 1)
   {
     $this->createLog($userResult[0]->user_id);
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
   }
  
   function logoutTime($userId){
	$this->db->order_by('log_id','DESC');
	$this->db->limit(1);
	$this->db->update($this->tbl_admin_log,array('log_out'=>date('Y-m-d h:i:s a',time())),array('log_userId'=>$userId));
}
 
}
//End of class m_breakage