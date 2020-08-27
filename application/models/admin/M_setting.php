<?php
class M_setting extends CI_Model{

private $tblname = 'tbl_setting';
	public function __construct() {        
		parent::__construct();
	}



 function index($id=1){	
		    $msg = 0;
			$htmlcode=html_entity_decode($this->input->post('feedback_field'));
			$data = array(
				'clinic_name' => $this->input->post('clinic_name'),
				'admin_email' => $this->input->post('admin_email'),
				'admin_contact' => $this->input->post('admin_contact'));
			$this->db->where('id',$id );
			$this->db->update('tbl_setting', $data);
			$msg = 1;
			return $msg;
		
	
 }
 function listing(){
	 $this->db->select("*");
	 $this->db->from('tbl_setting');
	 $query = $this->db->get();
	 $result= $query->row_array();
	 return $result;
 }

 function info($id=1){	
		$msg = 0;
		//return 'hi';
		//
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
		
			$data = array(
				'class' => $this->input->post('class'),
				'stream' => $this->input->post('stream'),
				'board' => $this->input->post('board'),
				'course' => $this->input->post('course'),
				'branch' => $this->input->post('branch'),
				'university' => $this->input->post('university'),
				'year' => $this->input->post('year'),
				'dream' => $this->input->post('dream'),
				'problem' => $this->input->post('problem'),
			);
			if(count(array_filter($data)) == count($data)) {
				$this->db->where('id',$id );
				$this->db->update('tbl_info', $data);
				$msg = ($this->db->affected_rows() > 0) ? 1 : '';  //for update : for nothing happened
				//echo $this->db->last_query(); die;
				return $msg;
			} else {
				$query = $this->db->query("SELECT * FROM `tbl_info` WHERE id =$id");
				if ($query->num_rows() > 0)
				{
				   $row = $query->row(); 
					return $row;
				}
			}
			
		}
		else{
			$query = $this->db->query("SELECT * FROM `tbl_info` WHERE id =$id");
			if ($query->num_rows() > 0)
			{
			   $row = $query->row(); 
				return $row;
			}
		}
 } 
 function add_collage(){	
		    $msg = 0;
			$data = array(
				'course' => $this->input->post('course'),
				'branch' => $this->input->post('branch'),
				'university' => $this->input->post('university'),
				'year' => $this->input->post('year')
			);
				$this->db->insert('collage_info',$data);
				$msg = ($this->db->affected_rows() > 0) ? 1 : '';  //for update : for nothing happened
				return $msg;
			
 }
 function collages(){	
				$this->db->select('*');
				$this->db->from('collage_info');
				$this->db->order_by('id','desc');
				$query = $this->db->get();
				return $query->result_array();
			
 }
 function get_collage($college_id){	
				$this->db->select('*');
				$this->db->from('collage_info');
				$this->db->where('id',$college_id);
				$query = $this->db->get();
				return $query->result_array();
			
 }
 function update_collage($college_id){	
		    $msg = 0;
			$data = array(
				'course' => $this->input->post('course'),
				'branch' => $this->input->post('branch'),
				'university' => $this->input->post('university'),
				'year' => $this->input->post('year')
			);
			    $this->db->where('id',$college_id);
				$this->db->update('collage_info',$data);
				$msg = ($this->db->affected_rows() > 0) ? 1 : '';  //for update : for nothing happened
				return $msg;
			
 }
 function collages_del($college_id){	
		    $msg = 0;
			
			$this->db->delete('collage_info',array('id'=>$college_id));
			$msg = ($this->db->affected_rows() > 0) ? 1 : '';  //for update : for nothing happened
			return $msg;
			
 }
 function getSettingbyField	($id=1,$field='admin_email'){
	 $query = $this->db->query("SELECT * FROM `tbl_setting` WHERE id =$id");
		if ($query->num_rows() > 0)
		{
		   $row = $query->row_array(); 
			//pr($row);
			return $row;
		}
	 
 }
 
    function getInfobyField($id=1,$field='class'){
	 $query = $this->db->query("SELECT $field FROM `tbl_info` WHERE id =$id");
		if ($query->num_rows() > 0)
		{
		   $row = $query->row()->$field; 
			//pr($row);die;
			return $row;
		}
	 
 }
   function email_templates(){
		$query = $this->db->get('tbl_email_templates');
		$role[''] = "Select Template"; 
		foreach($query->result() as $row){
			$role[$row->id] =  ucfirst($row->name);
			//print_r($query->result());die;
		}
		return $role;
	}
	
	function email_templates_detail($id){
		$query = $this->db->get_where('tbl_email_templates',array('id'=>$id))->row();
		return $query;
	}
	
	function edit_email(){
		$msg = 0;	
		
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
//pr($_POST); die;
			$text=str_replace("\'","'",$this->input->post('content'));

			$data = array(
				'from' => $this->input->post('from'),
				'subject' => $this->input->post('subject'),
				'email_text_content' => $text,
			);
			$this->db->where('id',$this->input->post('email_id') );
			$this->db->update('tbl_email_templates', $data);
			$msg = ($this->db->affected_rows() > 0) ? 1 : '';
			return $msg;
		}
	}
	
	function selectEmailTemplate($template){
		$query = $this->db->get_where('tbl_email_templates',array('alias'=>$template))->row();
		return $query;
	}
	
	/*function sendMail($to,$email_template,$replace_word,$default){
				$default_content = array(
				'##SITE_NAME##' => 'Shuttle Storage',
				'##SITE_URL##' => base_url(),
				);
				$emailFindReplace = array_merge($default_content, $replace_word);		
				$message = strtr($email_template->email_text_content, $emailFindReplace);
				$subject = strtr($email_template->subject, $emailFindReplace);
				$from= strtr($email_template->from, $emailFindReplace);
			            $this->load->library('email'); 
						$config['charset'] = 'iso-8859-1';
						$config['wordwrap'] = TRUE;
						$config['mailtype'] = 'html';
						$this->email->initialize($config);
						$this->email->from($from, 'Shuttle Storage');
						$this->email->to($to);
						$this->email->subject($subject);
						$this->email->message($message);
						$this->email->send();
						$this->email->clear(TRUE);
	} */
	
	function sendMail($to,$email_template,$replace_word,$msg=''){
		$default_content = array(
			'##SITE_NAME##' => 'Studiuz',
			'##SITE_URL##' => base_url(),
		);
		$emailFindReplace = array_merge($default_content, $replace_word);
		//pr($emailFindReplace);
		//echo $to;die;
		$message = strtr($email_template->email_text_content, $emailFindReplace);
		$message = mailerTemplate($message);
		$message .= $msg;
		$subject = strtr($email_template->subject, $emailFindReplace);
		$from = strtr($email_template->from, $emailFindReplace);

		$this->load->library('email');
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		$this->email->from($from, 'Studiuz');
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->send();
		$this->email->clear(TRUE);
	}
	
	function selectPageTemplate($slug){
		$query = $this->db->get_where('tbl_pages',array('slug'=>$slug))->row();
		return $query;
	}
	
	function edit_page(){
	$msg = 0;	
	//pr($_POST); die;
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$data = array(
						'meta_title' => $this->input->post('meta_title'),
						'meta_description' => $this->input->post('meta_description'),
						'keyword' => $this->input->post('keyword'),
						'content' => $this->input->post('content'),
						);
	$this->db->where('id',$this->input->post('page_id') );		
	$this->db->update('tbl_pages', $data);	
	$msg = ($this->db->affected_rows() > 0) ? 1 : '';
	return $msg;	
	}
	}
	
}

