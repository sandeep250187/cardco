<?php
class M_product extends CI_Model{
	
	private $tbl_products = 'tbl_products';
	
	function index($id)
	{
			
			$member_id = getfrontCurUserID();
			
			/*$this->db->select("p.*,r.product_id, concat(p.type, '.jpg') as type_image");
			$this->db->from('tbl_products p');
			$this->db->join('tbl_resources r','r.product_id = p.id', 'left');
			$this->db->where(array('p.status' => '1', 'p.id' => $id,'r.member_id' => $member_id));
			$this->db->order_by('date', 'Asc');
			$this->db->group_by('id');
			$query = $this->db->get();	
			$result = $query->result_array();
			return $query->result_array();	*/
			
			$this->db->select("p.*, placeholder_img as type_image");
			$this->db->from('tbl_products p');
			$this->db->where(array('p.status' => '1', 'p.id' => $id));
			$this->db->order_by('p.date', 'Asc');
			$this->db->group_by('p.id');
			$query = $this->db->get();	
			$result = $query->result_array();
			return $query->result_array();	
			
			
			
	}
		
	function apiProductDetail($id, $member_id)
	{
			/*$member_id = $member_id;
			$this->db->select("p.*,r.product_id, p.placeholder_img as type_image");
			$this->db->from('tbl_products p');
			$this->db->join('tbl_resources r','r.product_id = p.id', 'left');
			$this->db->where(array('p.status' => '1', 'p.id' => $id,'r.member_id' => $member_id));
			$this->db->order_by('date', 'Asc');
			$this->db->group_by('id');
			$query = $this->db->get();	
			$result = $query->result_array();
			return $query->result_array();	*/
			
			$member_id = $member_id;
		
			$this->db->select("p.*, placeholder_img as type_image");
			$this->db->from('tbl_products p');
			$this->db->where(array('p.status' => '1', 'p.id' => $id));
			$this->db->order_by('p.date', 'Asc');
			$this->db->group_by('p.id');
			$query = $this->db->get();	
			$ProductResult = $query->result_array();
			
			$this->db->select("r.*");
			$this->db->from('tbl_resources r');
			$this->db->where(array('r.product_id' => $id, 'r.member_id' => $member_id));
			$query = $this->db->get();	
			$ResourceResult = $query->result_array();
			
			$cur_date = date('Y-m-d');
			$this->db->select('SUM(credit) AS total_credit,SUM(rem_credit) AS rem_credit, (SUM(credit)-SUM(rem_credit)) as used_credit');
			$this->db->from('tbl_member_credit');
			$this->db->where('member_id',$member_id);
			$this->db->where('expiery_date >=',$cur_date);
			$MemberCredit = $this->db->get()->row_array();		
			
			if(count($ResourceResult)>0)
			{
				$ProductResult[0]['buy_status'] = 1;
			}
			else
			{
				$ProductResult[0]['buy_status'] = 0;
			}
			

			$result = array(
				'product_info' => $ProductResult,
				'memberinfo_info' => $MemberCredit,
			);
			return $result;
			
	}	

	function apiResources($uid)
	{
		$query = $this->db->query("Select tp.*, tr.status, tr.member_id as member_id, concat(tp.type, '.jpg') as type_image,DATE_FORMAT(tr.date, '%b %d, %Y %H:%i:%S') AS tdate from tbl_products tp left join tbl_resources tr on tp.id=tr.product_id where tp.status='1' and tr.member_id = '$uid' group by tp.id order by tp.id");
		$result_pro = $query->result_array();
		return $result_pro;	
	}
	
	
}
?>