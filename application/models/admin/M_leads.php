<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_leads extends CI_Model{
 
  private $tbl_leads =  'tbl_leads';
    
  function __construct(){
	parent::__construct();	
  }
  
    function userListing($limit,$start,$like){
		$this->db->select('*');
		$this->db->from('tbl_leads');
		if($like!='null'){			
			$this->db->like('full_name', $like);
			$this->db->or_like('email', $like);
			//$this->db->or_like('message', $like);
		}
		$this->db->where('step',10);
		$this->db->limit($limit, $start);
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result_array();
	}
	
    function countUsers($like){
		$this->db->select('*');
		$this->db->from('tbl_leads');
		if($like!='null'){			
			$this->db->like('full_name', $like);
			$this->db->or_like('email', $like);
			//$this->db->or_like('message', $like);
		};
		$this->db->where('step',10);
	    $query = $this->db->get();
		//echo $this->db->last_query();
	    $nums = $query->num_rows();
	    return $nums;
	}    
        
    function lead_info($id=0){
		$this->db->select('*');
		$this->db->from($this->tbl_leads);
		if(!empty($id)){
		$this->db->where('id',$id);
		}
		$query = $this->db->get();
		
		$result = $query->result_array();
		
		if($result[0]['view_status']==1)
		{
					$data = array(
							'view_status' => 0,
						);
					$this->db->where('id', $id);
					$this->db->update('tbl_leads', $data);
		}
		else
		{
					$data = array(
							'view_status' => 0,
						);
					$this->db->where('id', $id);
					$this->db->update('tbl_leads', $data);
		}
		return $query->result_array();
	} 
	
	function leaddetails($id=0){
		$this->db->select('q.label,a.answer,SEC_TO_TIME(CAST(a.duration/1000 AS UNSIGNED)) AS duration,q.drag_unit');
		$this->db->from('tbl_question q');
		$this->db->join('tbl_leads_ans a','q.id = a.ques_id', 'left');
		$this->db->where('a.lead_id',$id);
		$this->db->group_by('q.id');
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		return $query->result_array();
	}
	
	function leadlistbymember($member_id=0, $limit, $start){
		$this->db->select("id, member_id, randuser_id, full_name, email, agree_term, lead_type, ip_address, score, date_format(created_on, '%b %d, %Y %H:%i:%S') as date, step, view_status");
		$this->db->from($this->tbl_leads);
		if(!empty($member_id)){
		$this->db->where('member_id',$member_id);
		$this->db->where('step',10);
		$this->db->limit($limit, $start);
		}
		/* $this->db->where('step',10); */
		$this->db->order_by("id","desc");
		$query = $this->db->get();
		$leads_result = $query->result_array();
		
		/* echo $this->db->last_query(); */
			if(!empty($leads_result))
			{
				foreach($leads_result as $key => $val)
				{
					$query = "select ldans.ques_id, ldans.answer from tbl_leads_ans ldans where ldans.lead_id=$val[id]";
					$ldans = $this->db->query($query);
					$leadsans_result = $ldans->result_array();
					if(!empty($leadsans_result))
					{
						@$leads_result[$key]['age'] = $leadsans_result[6]['answer'];
					}
				}				
			}
			return $leads_result;
			
	}
	
	/*total results*/
	function leadlistbymemberRows($member_id=0){
		$this->db->select("id");
		$this->db->from($this->tbl_leads);
		if(!empty($member_id)){
			$this->db->where('member_id',$member_id);
			$this->db->where('step',10);
		}
		/* $this->db->where('step',10); */
		$this->db->order_by("id","desc");
		$query = $this->db->get();
		$leads_result = $query->result_array();
		
	
		return count($leads_result);
	}
	
	
	
	function leadcountbymemberInactive($member_id=0){
		$this->db->select("*");
		$this->db->from($this->tbl_leads);
		if(!empty($member_id)){
			$this->db->where('member_id',$member_id);
			$this->db->where('step',10);
			$this->db->where('view_status',1);
		}
		/* $this->db->where('step',10); */
		$this->db->order_by("id","desc");
		$query = $this->db->get();
		$leads_result = $query->result_array();
		return count($leads_result);
	}
	
	function leadcountbymemberActive($member_id=0){
		$this->db->select("*");
		$this->db->from($this->tbl_leads);
		if(!empty($member_id)){
			$this->db->where('member_id',$member_id);
			$this->db->where('step',10);
			$this->db->where('view_status',0);
		}
		/* $this->db->where('step',10); */
		$this->db->order_by("id","desc");
		$query = $this->db->get();
		$leads_result = $query->result_array();
		return count($leads_result);
	}
	
	
	function leadSearchbymember($member_id=0)
	{

		$dateFrom = $_POST['date_from'];		
		$dateTo = $_POST['date_to'];		
		$source = $_POST['source'];	
		$survey = $_POST['survey'];
		

		$sql = "select ld.id, ld.member_id, ld.full_name, ld.email, date_format(ld.created_on, '%Y-%m-%d') as date, ld.score, ld.step, ld.ip_address, ld.agree_term, ld.lead_type from tbl_leads ld where ld.member_id='$member_id'";
		
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
					$ldans = $this->db->query("select ldans.ques_id, ldans.answer from tbl_leads_ans ldans where ldans.lead_id=$val[id] and ldans.ques_id=10");
					$resultnew = $ldans->result_array();
					$result[$key]['age'] = $resultnew[0]['answer'];
				}				
			}
		return ($result);
		
	}
	
	function getEmail()
	{
		
		$query = $this->db->query("select distinct(member_id) from tbl_resources");
		return $query->result_array();
		
	}
	
	function lead_ques_answ($lead_id=0){
		$this->db->select('q.*,
							(SELECT la.answer FROM tbl_leads_ans la WHERE la.lead_id = "'.$lead_id.'" AND la.ques_id = q.id) AS answer,
							(SELECT SEC_TO_TIME(CAST(la.duration/1000 AS UNSIGNED)) AS duration FROM tbl_leads_ans la WHERE la.lead_id = "'.$lead_id.'" AND la.ques_id = q.id) AS duration'
						  );
		$this->db->from('tbl_question q');
		$this->db->order_by('q.order','ASC');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result_array();
		
	} 
        
       
        
    function userDelete( $id ){
		$this->db->delete('tbl_leads', array('id' => $id));
		$this->db->delete('tbl_leads_ans', array('lead_id' => $id));
		return ($this->db->affected_rows() != 1) ? true : false;
  	}
	

        
    /*++++++++++++++++++++++++++++++++++++++++++++++++*/

	function leadSearch($member_id=0, $limit=0, $start=0)
	{
		$dateFrom = $_POST['date_from'];		
		$dateTo = $_POST['date_to'];		
		$source = $_POST['source'];	
		$survey = $_POST['servey'];
		$this->db->select("ld.id, ld.member_id, ld.full_name, ld.email, date_format(ld.created_on, '%b %d, %Y %H:%i:%S') as date, ld.score, ld.step, ld.ip_address, ld.agree_term, ld.lead_type");
		$this->db->from('tbl_leads ld');
		$this->db->where('ld.member_id',$member_id);
		if($dateFrom && $dateTo){
			$this->db->where('ld.created_on >= ', date('Y-m-d H:i:s', strtotime($dateFrom)));
			$this->db->where('ld.created_on <= ', date('Y-m-d 23:59:59', strtotime($dateTo)));	
		}
		if(!empty($source) && $source){
			$this->db->where('ld.lead_type = ', $source);
		}
		if(!empty($survey) && $survey==10){
			$this->db->where('ld.step = ', $survey);
		}
		if(!empty($survey) && $survey!=10){
			$this->db->where("ld.step <", 10);
		}
		$this->db->order_by('ld.id','DESC');
		$this->db->limit($limit, $start);
		$query = $this->db->get();	
		$result = $query->result_array();
		
		if(!empty($result))
			{
				foreach($result as $key => $val)
				{
					$ldans = $this->db->query("select ldans.ques_id, ldans.answer from tbl_leads_ans ldans where ldans.lead_id=$val[id] ");
					$resultnew = $ldans->result_array();
					$result[$key]['age'] = $resultnew[6]['answer'];
				}				
			}
		return ($result);
		
	}	
	
	function leadSearchadmin()
	{
		
		$dateFrom = $_POST['date_from'];		
		$dateTo = $_POST['date_to'];		
		$source = $_POST['source'];	
		$survey = $_POST['servey'];
		$full_name = !empty($_POST['full_name'])?$_POST['full_name']:'';
		$this->db->select('ld.id, ld.member_id, ld.full_name, ld.email, date_format(ld.created_on, "%Y-%m-%d") as created_on, ld.score, ld.step, ld.ip_address, ld.agree_term, ld.lead_type');
		$this->db->from('tbl_leads ld');
		
		if($dateFrom && $dateTo){
			$this->db->where('ld.created_on >= ', date('Y-m-d H:i:s', strtotime($dateFrom)));
			$this->db->where('ld.created_on <= ', date('Y-m-d H:i:s', strtotime($dateTo)));	
		}
		if(!empty($source) && $source){
			$this->db->where('ld.lead_type = ', $source);
		}
		if(!empty($survey) && $survey==10){
			$this->db->where('ld.step = ', $survey);
		}
		if(!empty($survey) && $survey!=10){
			$this->db->where("ld.step <", 10);
		}
		if(!empty($survey) && $survey!=10){
			$this->db->where("ld.step <", 10);
		} 
		if(!empty($full_name) && $full_name!=''){
			$full_name  = str_replace('_',' ',$full_name);
			$this->db->where("ld.full_name", $full_name);
		}
		$this->db->order_by('ld.id','DESC');
		//$this->db->limit($limit, $start);
		$query = $this->db->get();	
		$result = $query->result_array();
		return ($result);
	
	}	
	
	function leadSearchadminCount()
	{
		$dateFrom = $_POST['date_from'];		
		$dateTo = $_POST['date_to'];		
		$source = $_POST['source'];	
		$survey = $_POST['servey'];
		$full_name = !empty($_POST['full_name'])?$_POST['full_name']:'';
		$this->db->select('ld.id, ld.member_id, ld.full_name, ld.email, date_format(ld.created_on, "%Y-%m-%d") as created_on, ld.score, ld.step, ld.ip_address, ld.agree_term, ld.lead_type');
		$this->db->from('tbl_leads ld');
		if($dateFrom && $dateTo){
			$this->db->where('ld.created_on >= ', date('Y-m-d H:i:s', strtotime($dateFrom)));
			$this->db->where('ld.created_on <= ', date('Y-m-d H:i:s', strtotime($dateTo)));	
		}
		if(!empty($source) && $source){
			$this->db->where('ld.lead_type = ', $source);
		}
		if(!empty($survey) && $survey==10){
			$this->db->where('ld.step = ', $survey);
		}
		if(!empty($survey) && $survey!=10){
			$this->db->where("ld.step <", 10);
		}
		if(!empty($full_name) && $full_name!=''){
			$full_name  = str_replace('_',' ',$full_name);
			$this->db->where("ld.full_name", $full_name);
		}
		$this->db->order_by('ld.id','DESC');
		$query = $this->db->get();	
		$result = $query->result_array();
		return count($result);
	
	}	
	
	
	function leadSearchRow($member_id=0)
	{
		$dateFrom = $_POST['date_from'];		
		$dateTo = $_POST['date_to'];		
		$source = $_POST['source'];	
		$survey = $_POST['servey'];
		
		$this->db->select('ld.id, ld.member_id, ld.full_name, ld.email, date_format(ld.created_on, "%Y-%m-%d") as date, ld.score, ld.step, ld.ip_address, ld.agree_term, ld.lead_type');
		$this->db->from('tbl_leads ld');
		$this->db->where('ld.member_id',$member_id);
		
		if($dateFrom && $dateTo){
			$this->db->where('ld.created_on >= ', date('Y-m-d H:i:s', strtotime($dateFrom)));
			$this->db->where('ld.created_on <= ', date('Y-m-d H:i:s', strtotime($dateTo)));	
		}
		
		if(!empty($source) && $source){
			$this->db->where('ld.lead_type = ', $source);
		}
		
		if(!empty($survey) && $survey==10){
			$this->db->where('ld.step = ', $survey);
		}
		
		if(!empty($survey) && $survey!=10){
			$this->db->where("ld.step <", 10);
		}
		
		$this->db->order_by('ld.id','DESC');
		
		$query = $this->db->get();	
		
		$result = $query->result_array();
		
		return count($result);
	
	}	
	
	function exportleadSearchadminCount()
	{
		$dateFrom = $_POST['date_from'];		
		$dateTo = $_POST['date_to'];		
		$source = $_POST['source'];	
		$survey = $_POST['servey'];
		$this->db->select("ld.id, ld.member_id, ld.full_name, ld.email, date_format(ld.created_on, '%b %d, %Y %H:%i:%S') as date, ld.score, ld.step, ld.ip_address, ld.agree_term, ld.lead_type");
		$this->db->from('tbl_leads ld');
		$this->db->where('ld.member_id',$member_id);
		if($dateFrom && $dateTo){
			$this->db->where('ld.created_on >= ', date('Y-m-d H:i:s', strtotime($dateFrom)));
			$this->db->where('ld.created_on <= ', date('Y-m-d 23:59:59', strtotime($dateTo)));	
		}
		if(!empty($source) && $source){
			$this->db->where('ld.lead_type = ', $source);
		}
		if(!empty($survey) && $survey==10){
			$this->db->where('ld.step = ', $survey);
		}
		if(!empty($survey) && $survey!=10){
			$this->db->where("ld.step <", 10);
		}
		$this->db->order_by('ld.id','DESC');
		$this->db->limit($limit, $start);
		$query = $this->db->get();	
		$result = $query->result_array();
		
		if(!empty($result))
			{
				foreach($result as $key => $val)
				{
					$ldans = $this->db->query("select ldans.ques_id, ldans.answer from tbl_leads_ans ldans where ldans.lead_id=$val[id] ");
					$resultnew = $ldans->result_array();
					$result[$key]['age'] = $resultnew[6]['answer'];
				}				
			}
		return ($result);
		
	}
}
?>
