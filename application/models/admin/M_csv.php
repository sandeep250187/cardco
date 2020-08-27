<?php
class M_csv extends CI_Model {
    
    function __construct() {
        parent::__construct();
        
    }
    
	 function checkRecord($email) {
        $this->db->select('id');
		$this->db->from('tbl_members');
		$this->db->where('email',$email);
		return $data = $this->db->get()->row_array();
      }
	  
	  function checkCredit($member_id) {
        $this->db->select('credit,rem_credit');
		$this->db->from('tbl_member_credit');
		$this->db->where('member_id',$member_id);
		return $data = $this->db->get()->result_array();
      }
	  
	
	function get_maxid() {
		 $this->db->select_max('id');
         $result= $this->db->get('tbl_members')->row_array();
         return $result['id'];
	}
    function insert_csv($data) {
		
		$check = $this->checkRecord($data['email']);
		if($check['id']==''){
			 $this->db->insert('tbl_members', $data);
			 $last_id = $this->db->insert_id();
			 $new_date = strtotime('+ 1 year',strtotime($data['created_on']));
			 $expiery_date = date('Y-m-d', $new_date);
			 $data_credit = array('member_id'=>$last_id,
			 'credit'=>$data['credits'], 
			 'created_on'=>$data['created_on'],
			 'expiery_date'=>$expiery_date,
			 'rem_credit'=>$data['credits']
			 ); 
			 $this->db->insert('tbl_member_credit', $data_credit);
		}
		else {
			 $check_c = $this->checkCredit($check['id']);
             if(count($check_c==1) && $check_c[0]['credit']==$check_c[0]['rem_credit']){
				 $this->db->where('id', $check['id']);
				 $this->db->update('tbl_members', $data);
				 
				 $new_date = strtotime('+ 1 year',strtotime($data['created_on']));
				 $expiery_date = date('Y-m-d', $new_date);
				 $data_credit = array('member_id'=>$check['id'],
				 'credit'=>$data['credits'], 
				 'created_on'=>$data['created_on'],
				 'expiery_date'=>$expiery_date,
				 'rem_credit'=>$data['credits']
				 ); 
				 $this->db->where('member_id', $check['id']);
				 $this->db->update('tbl_member_credit', $data_credit);
				 
			 
			 }
		} 
    }
}
/*END OF FILE*/
