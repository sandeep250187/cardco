<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_enquiry extends CI_Model{
 
  private $tbl_enquiry =  'tbl_enquiry';
    
  function __construct(){
	parent::__construct();	
  }
  
   
        
    function userListing($limit,$start,$like){
		$this->db->select('*');
		$this->db->from('tbl_enquiry');
		if($like!='null'){			
			$this->db->like('first_name', $like);
			$this->db->or_like('email', $like);
			$this->db->or_like('message', $like);
			
		}
		$this->db->limit($limit, $start);
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result_array();
	}
	
    function countUsers($like){
		$this->db->select('*');
		$this->db->from('tbl_enquiry');
		if($like!='null'){			
			$this->db->like('first_name', $like);
			$this->db->or_like('email', $like);
			$this->db->or_like('message', $like);
			
		};
	    $query = $this->db->get();
		//echo $this->db->last_query();
	    $nums = $query->num_rows();
	    return $nums;
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
        
       
        
        function userDelete( $id ){
		$this->db->delete('tbl_enquiry', array('id' => $id));
		return ($this->db->affected_rows() != 1) ? false : true;
  	}
        
      

        
        
        
        
       
        
       
		 

}
?>
