<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_contactcredit extends CI_Model{
 
  private $tbl_contact_credit =  'tbl_contact_credit';
    
  function __construct(){
	parent::__construct();	
  }
  
   
        
    function userListing($limit,$start,$like){
		$this->db->select('*');
		$this->db->from('tbl_contact_credit');
		if($like!='null'){			
			$this->db->like('name', $like);
			$this->db->or_like('email', $like);
			//$this->db->or_like('message', $like);
			
		}
		$this->db->limit($limit, $start);
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result_array();
	}
	
    function countUsers($like){
		$this->db->select('*');
		$this->db->from('tbl_contact_credit');
		if($like!='null'){			
			$this->db->like('name', $like);
			$this->db->or_like('email', $like);
			//$this->db->or_like('message', $like);
			
		};
	    $query = $this->db->get();
		//echo $this->db->last_query();
	    $nums = $query->num_rows();
	    return $nums;
	}    
        
    
        
         
        
    function lead_info($id=0){
		$this->db->select('*');
		$this->db->from($this->tbl_contact_credit);
		if(!empty($id)){
		$this->db->where('id',$id);
		}
		$query = $this->db->get();
		return $query->result_array();
	} 
	
	function leaddetails($id=0){
		$this->db->select('q.label,a.answer,SEC_TO_TIME(a.duration/1000) AS duration,q.drag_unit');
		$this->db->from('tbl_question q');
		$this->db->join('tbl_contact_credit_ans a','q.id = a.ques_id', 'left');
		$this->db->where('a.lead_id',$id);
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		return $query->result_array();
	}
	
	function leadlistbymember($member_id=0){
		$this->db->select("id, member_id, randuser_id, full_name, email, agree_term, lead_type, ip_address, score, date_format(created_on, '%Y-%m-%d') as date, step");
		$this->db->from($this->tbl_contact_credit);
		
		if(!empty($member_id)){
		$this->db->where('member_id',$member_id);
		}
		$query = $this->db->get();
		$contactcredit_result = $query->result_array();
		/* echo $this->db->last_query(); */
			if(!empty($contactcredit_result))
			{
				foreach($contactcredit_result as $key => $val)
				{
					$ldans = $this->db->query("select ldans.ques_id, ldans.answer from tbl_contact_credit_ans ldans where ldans.lead_id=$val[id] and ldans.ques_id=10");
					$contactcreditans_result = $ldans->result_array();
					//$contactcredit_result[$key]['age'] = $contactcreditans_result[0]['answer'];
				}				
			}
		return $contactcredit_result;
	
	}
	
	function leadSearchbymember($member_id=0)
	{

		$dateFrom = $_POST['date_from'];		
		$dateTo = $_POST['date_to'];		
		$source = $_POST['source'];	
		$survey = $_POST['survey'];
		

		$sql = "select ld.id, ld.member_id, ld.full_name, ld.email, date_format(ld.created_on, '%Y-%m-%d') as date, ld.score, ld.step, ld.ip_address, ld.agree_term, ld.lead_type from tbl_contact_credit ld where ld.member_id='$member_id'";
		
		if(isset($dateFrom) && isset($dateTo) && isset($source) && isset($survey))
		{
			
			$sql .= " and date_format(ld.created_on, '%Y-%m-%d')>='$dateFrom' and date_format(ld.created_on, '%Y-%m-%d')<='$dateTo' and ld.lead_type='$source' and score='$survey' order by ld.created_on desc";
		}
		
		$query = $this->db->query($sql);
		$result = $query->result_array();
		if(!empty($result))
			{
				foreach($result as $key => $val)
				{
					$ldans = $this->db->query("select ldans.ques_id, ldans.answer from tbl_contact_credit_ans ldans where ldans.lead_id=$val[id] and ldans.ques_id=10");
					$resultnew = $ldans->result_array();
					$result[$key]['age'] = $resultnew[0]['answer'];
				}				
			}
		return ($result);
		
	}
	
	function lead_ques_answ($lead_id=0){
		/* $this->db->select('q.*,la.ques_id,la.answer,la.duration');
		$this->db->from('tbl_question q');
		
		$this->db->join('tbl_contact_credit_ans la','q.id=la.ques_id', 'left outer');
		 
		if(!empty($lead_id)){
		$this->db->where('la.lead_id',$lead_id);
		}
		$query = $this->db->get();
		echo $this->db>last_query();
		return $query->result_array(); */
		
		$this->db->select('q.*,
							(SELECT la.answer FROM tbl_contact_credit_ans la WHERE la.lead_id = "'.$lead_id.'" AND la.ques_id = q.id) AS answer,
							(SELECT la.duration FROM tbl_contact_credit_ans la WHERE la.lead_id = "'.$lead_id.'" AND la.ques_id = q.id) AS duration'
						  );
		$this->db->from('tbl_question q');
		$this->db->order_by('q.order','ASC');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result_array();
		
	} 
        
       
        
    function userDelete( $id ){
		$this->db->delete('tbl_contact_credit', array('id' => $id));
		
		return ($this->db->affected_rows() != 1) ? true : false;
  	}
	

        
      

        
        
        
        
       
        
       
		 

}
?>
