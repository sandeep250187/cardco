<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Leads extends CI_Controller {
        public function __construct(){
	     parent::__construct();
	     $this->load->model('admin/M_leads');
	}
        
	function listing($offset=0,$search='null')
	{
		is_logged_in();
		if(isset($_POST['search']))
		{
			$res=array();
			$limit = 1000000;	
			$data['user'] = $this->M_leads->leadSearchAdmin();
			$data['resource_email'] = $this->M_leads->getEmail();
			$data['sno'] = $offset;
			$config['total_rows'] = $this->M_leads->leadSearchAdminCount();
			/* pagination start */
			$this->load->library('pagination');
			$config['first_url'] = site_url("myaccount/leads/0/");
			$config['suffix']= '';
			$config['base_url'] = site_url("myaccount/leads/");
			$config['per_page'] = $limit; 
			$config['uri_segment'] = 3;
			$this->pagination->initialize($config); 
			$data["links"] = $this->pagination->create_links();
			$data['page'] = $offset;
		}
		else
		{
			$this->load->helper('form');
			$limit = pagination_count;
			if($this->input->post('search')!=''){
			  $search = $this->input->post('search');
			} 
			$data['user'] = $this->M_leads->userListing($limit,$offset,$search);
			$data['resource_email'] = $this->M_leads->getEmail();
			$config['total_rows'] = $this->M_leads->countUsers($search);
			/* pagination start */
			$this->load->library('pagination');
			$search_parameter="/$search";
			$config['first_url'] = site_url("admin/leads/listing/0".$search_parameter);
			$config['suffix']= $search_parameter;
			$config['base_url'] = site_url("admin/leads/listing");
			$config['per_page'] = pagination_count; 
			$config['uri_segment'] = 4;
			$this->pagination->initialize($config); 
			$data["links"] = $this->pagination->create_links();
			$data['page'] = $offset;
		}
			
			/*******/
		$this->load->view(ADMIN_FOLDER.'/leads/view_listing', $data);
	}
        
		
    function delete($id,$page=1){
            is_logged_in();
			if($this->M_leads->userDelete($id))
			$this->session->set_flashdata('msg', 'Record deleted successfully');
			redirect(ADMIN_FOLDER.'/leads/listing/'.$page,'refresh');
	}
	
	function view($lead_id=0){
			is_logged_in();
			$data['lead'] = $this->M_leads->lead_info($lead_id);
			$data['ques_ans'] = $this->M_leads->lead_ques_answ($lead_id);
			$this->load->view(ADMIN_FOLDER.'/leads/view_lead_view',$data);
    }
        
		
	function download($dateFrom='', $dateTo='', $source='', $servey='', $full_name='')
	{
		$this->load->dbutil();
		$this->load->helper('file');
		$this->load->helper('download');
		
		if(!empty($dateFrom) || !empty($dataTo) || !empty($source) || !empty($servey) || !empty($full_name))
		{
			
				$arrQuery = array(
								'que1' => 'Snoring?',
								'que2' => 'Tired?',
								'que3' => 'Observed?',
								'que4' => 'Pressure?',
								'que5' => 'Choose Your Height',
								'que6' => 'Choose Your Weight',
								'que7' => 'Choose Your Age',
								'que8' => 'Choose Your Neck Size',
								'que9' => 'Select Your Gender',		
								'que10' => 'Full Name:',		
								'que11' => 'Email:',	
								'que12' => 'Agree to Terms:',										
							);
				/* SEC_TO_TIME(CAST(a.duration/1000 AS UNSIGNED)) AS duration ld.lead_type as resouce*/
				$this->db->select("ld.full_name as name, ld.email as email, ld.ip_address as ip, MAX(CASE WHEN ld.lead_type = '1' THEN 'Website'
				WHEN ld.lead_type = '2' THEN 'iFrame'
				ELSE 'Tablet' END) AS resouce, ld.score as scrore, date_format(ld.created_on, '%Y-%m-%d') as created_on,  MAX(CASE WHEN la.ques_id = '1' THEN la.answer ELSE NULL END) AS '$arrQuery[que1]',MAX(CASE WHEN la.ques_id = '1' THEN SEC_TO_TIME(CAST(la.duration/1000 AS UNSIGNED)) ELSE NULL END) AS '$arrQuery[que1](duration)',
										 MAX(CASE WHEN la.ques_id = '2' THEN la.answer ELSE NULL END) AS '$arrQuery[que2]',
										 MAX(CASE WHEN la.ques_id = '2' THEN SEC_TO_TIME(CAST(la.duration/1000 AS UNSIGNED)) ELSE NULL END) AS '$arrQuery[que2](duration)',
										 MAX(CASE WHEN la.ques_id = '3' THEN la.answer ELSE NULL END) AS '$arrQuery[que3]',
										 MAX(CASE WHEN la.ques_id = '3' THEN SEC_TO_TIME(CAST(la.duration/1000 AS UNSIGNED)) ELSE NULL END) AS '$arrQuery[que3](duration)',
										 MAX(CASE WHEN la.ques_id = '4' THEN la.answer ELSE NULL END) AS '$arrQuery[que4]',
										 MAX(CASE WHEN la.ques_id = '4' THEN SEC_TO_TIME(CAST(la.duration/1000 AS UNSIGNED)) ELSE NULL END) AS '$arrQuery[que4](duration)',
										 MAX(CASE WHEN la.ques_id = '5' THEN la.answer ELSE NULL END) AS '$arrQuery[que5]',
										 MAX(CASE WHEN la.ques_id = '5' THEN SEC_TO_TIME(CAST(la.duration/1000 AS UNSIGNED)) ELSE NULL END) AS '$arrQuery[que5](duration)',
										 MAX(CASE WHEN la.ques_id = '6' THEN la.answer ELSE NULL END) AS '$arrQuery[que6]',
										 MAX(CASE WHEN la.ques_id = '6' THEN SEC_TO_TIME(CAST(la.duration/1000 AS UNSIGNED)) ELSE NULL END) AS '$arrQuery[que6](duration)',
										 MAX(CASE WHEN la.ques_id = '7' THEN la.answer ELSE NULL END) AS '$arrQuery[que7]', 
										 MAX(CASE WHEN la.ques_id = '7' THEN SEC_TO_TIME(CAST(la.duration/1000 AS UNSIGNED)) ELSE NULL END) AS '$arrQuery[que7](duration)',
										 MAX(CASE WHEN la.ques_id = '8' THEN la.answer ELSE NULL END) AS '$arrQuery[que8]',
										 MAX(CASE WHEN la.ques_id = '8' THEN SEC_TO_TIME(CAST(la.duration/1000 AS UNSIGNED)) ELSE NULL END) AS '$arrQuery[que8](duration)',
										 MAX(CASE WHEN la.ques_id = '9' THEN la.answer ELSE NULL END) AS '$arrQuery[que9]',
										 MAX(CASE WHEN la.ques_id = '9' THEN SEC_TO_TIME(CAST(la.duration/1000 AS UNSIGNED)) ELSE NULL END) AS '$arrQuery[que9](duration)'");
										$this->db->from('tbl_leads ld');
										$this->db->join('tbl_leads_ans la',  'ld.id = la.lead_id', 'inner');
										if($dateFrom && $dateTo){
											$this->db->where('ld.created_on >= ', date('Y-m-d H:i:s', ($dateFrom)));
											$this->db->where('ld.created_on <= ', date('Y-m-d H:i:s', ($dateTo)));	
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
										$this->db->group_by('ld.id');
										$query = $this->db->get();	
										$sql = $this->db->last_query();
										$query = $this->db->query("$sql");
										$delimiter = ",";
										$newline = "\r\n";
				}
				else
				{
						 
						 $arrQuery = array(
										'que1' => 'Snoring?',
										'que2' => 'Tired?',
										'que3' => 'Observed?',
										'que4' => 'Pressure?',
										'que5' => 'Choose Your Height',
										'que6' => 'Choose Your Weight',
										'que7' => 'Choose Your Age',
										'que8' => 'Choose Your Neck Size',
										'que9' => 'Select Your Gender',		
										'que10' => 'Full Name:',		
										'que11' => 'Email:',	
										'que12' => 'Agree to Terms:',										
									);
						 
						 
						 $query = $this->db->query("SELECT l.full_name as name, l.email as email, l.ip_address as ip, MAX(CASE WHEN l.lead_type = '1' THEN 'Website'
						WHEN l.lead_type = '2' THEN 'iFrame'
						ELSE 'Tablet' END) AS resouce,
												 l.score as score,  l.created_on as created_on,  
												 MAX(CASE WHEN la.ques_id = '1' THEN la.answer ELSE NULL END) AS '$arrQuery[que1]',MAX(CASE WHEN la.ques_id = '1' THEN SEC_TO_TIME(CAST(la.duration/1000 AS UNSIGNED)) ELSE NULL END) AS '$arrQuery[que1](duration)',
												 MAX(CASE WHEN la.ques_id = '2' THEN la.answer ELSE NULL END) AS '$arrQuery[que2]',
												 MAX(CASE WHEN la.ques_id = '2' THEN SEC_TO_TIME(CAST(la.duration/1000 AS UNSIGNED)) ELSE NULL END) AS '$arrQuery[que2](duration)',
												 MAX(CASE WHEN la.ques_id = '3' THEN la.answer ELSE NULL END) AS '$arrQuery[que3]',
												 MAX(CASE WHEN la.ques_id = '3' THEN SEC_TO_TIME(CAST(la.duration/1000 AS UNSIGNED)) ELSE NULL END) AS '$arrQuery[que3](duration)',
												 MAX(CASE WHEN la.ques_id = '4' THEN la.answer ELSE NULL END) AS '$arrQuery[que4]',
												 MAX(CASE WHEN la.ques_id = '4' THEN SEC_TO_TIME(CAST(la.duration/1000 AS UNSIGNED)) ELSE NULL END) AS '$arrQuery[que4](duration)',
												 MAX(CASE WHEN la.ques_id = '5' THEN la.answer ELSE NULL END) AS '$arrQuery[que5]',
												 MAX(CASE WHEN la.ques_id = '5' THEN SEC_TO_TIME(CAST(la.duration/1000 AS UNSIGNED)) ELSE NULL END) AS '$arrQuery[que5](duration)',
												 MAX(CASE WHEN la.ques_id = '6' THEN la.answer ELSE NULL END) AS '$arrQuery[que6]',
												 MAX(CASE WHEN la.ques_id = '6' THEN SEC_TO_TIME(CAST(la.duration/1000 AS UNSIGNED)) ELSE NULL END) AS '$arrQuery[que6](duration)',
												 MAX(CASE WHEN la.ques_id = '7' THEN la.answer ELSE NULL END) AS '$arrQuery[que7]', 
												 MAX(CASE WHEN la.ques_id = '7' THEN SEC_TO_TIME(CAST(la.duration/1000 AS UNSIGNED)) ELSE NULL END) AS '$arrQuery[que7](duration)',
												 MAX(CASE WHEN la.ques_id = '8' THEN la.answer ELSE NULL END) AS '$arrQuery[que8]',
												 MAX(CASE WHEN la.ques_id = '8' THEN SEC_TO_TIME(CAST(la.duration/1000 AS UNSIGNED)) ELSE NULL END) AS '$arrQuery[que8](duration)',
												 MAX(CASE WHEN la.ques_id = '9' THEN la.answer ELSE NULL END) AS '$arrQuery[que9]',
												 MAX(CASE WHEN la.ques_id = '9' THEN SEC_TO_TIME(CAST(la.duration/1000 AS UNSIGNED)) ELSE NULL END) AS '$arrQuery[que9](duration)'
												 FROM tbl_leads l JOIN tbl_leads_ans la ON la.lead_id=l.id GROUP BY l.id");
												
						$delimiter = ",";
						$newline = "\r\n";
						
				}
				$data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
				force_download('leads.csv', $data);
		
	}
       
        
}
