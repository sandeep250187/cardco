<?php
class M_pages extends CI_Model{
	private $tbl_admins = 'tbl_pages';

	function index($page_slug){
		$is_logged_in = $this->session->userdata('logged_in');
		return true;
	}
	
	function get_pages($page_slug='')
	{
		//check slug is exist or not
		$query = $this->db->select('page_slug');
		$this->db->from('tbl_pages');
		$this->db->where('page_slug',$page_slug);
		$this->db->where('status',1);
		$this->db->limit(1,0);
		$query = $this->db->get();	
		$result = $query->row();
		
		if(empty($result)){
			$page_slug ='404';
		}		
		$this->db->select('*');
		$this->db->from('tbl_pages');
		$this->db->where('page_slug',$page_slug);
		$this->db->where('status',1);
		$this->db->limit(1,0);
		$query = $this->db->get();	
		$ret = $query->row();
		return $ret;
	}
	
	
	
	function get_testimonial($page_slug='')
	{
		/* check slug is exist or not */
		$query = $this->db->select('testimonial_slug');
		$this->db->from('tbl_testimonial');
		$this->db->where('testimonial_slug',$page_slug);
		$this->db->where('status',1);
		$this->db->limit(1,0);
		$query = $this->db->get();	
		$result = $query->row();
		
		if(empty($result)){
			$page_slug ='404';
		}		
		$this->db->select('*');
		$this->db->from('tbl_testimonial');
		$this->db->where('testimonial_slug',$page_slug);
		$this->db->where('status',1);
		$this->db->limit(1,0);
		$query = $this->db->get();	
		$ret = $query->row();
		return $ret;
		
		//return $query->result_array();		   
	}
	
	function get_testimonial_list($t_id='')
	{
		//check slug is exist or not
		$query = $this->db->select('id,testimonial_title,location,image_file,testimonial_slug');
		$this->db->from('tbl_testimonial');
		if(!empty($t_id))
		{
		$this->db->where('id', $t_id);
		}
		$this->db->where('status',1);
		$this->db->order_by('id','ASC');
		$query = $this->db->get();	
		//echo $this->db->last_query(); die;
		return $query->result_array();		   
	}
	
	

}
?>