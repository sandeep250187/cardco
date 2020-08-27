<?php 
class M_ajax extends CI_Model{
	
	function __construct(){
		parent::__construct();
		//$this->load->helper('url');
		$this->load->database();
  	}
	
	function check_exist($email){

			$this->db->select('id');
			$this->db->from('tbl_register');
			$this->db->where('email', $email);
			$query = $this->db->get();
			return $query->num_rows();

	}
	
	function buycredit($user_id)
	{ 
	        
			$cur_date = date('Y-m-d');
		    $this->db->select('*');
			$this->db->from('tbl_member_credit');
			$this->db->where('member_id',$user_id);
			$this->db->where('expiery_date >=',$cur_date);
			$this->db->where('rem_credit !=',0);
			$this->db->order_by('expiery_date','ASC');
			$result = $this->db->get()->result_array();
			
			/*Insert user resouces*/
			$data = array(
					'product_id' => $_POST['c_id'],
					'member_id' => $user_id,
					'type' => $_POST['file_type'],
					'credits' => $_POST['cval'],
					'status' => 0
				);
			
			$this->db->insert('tbl_resources', $data);
			$pr_credit = $_POST['cval'];
			
		
			if(!empty($result)){
				foreach($result as $rec){
					if($rec['rem_credit']>=$pr_credit){
						$remaining = $rec['rem_credit'] - $pr_credit;
						$this->updateRemaincredit($rec['id'], $remaining);
						break;
					}
					if($rec['rem_credit']<$pr_credit){
						$cur_credit = $rec['rem_credit'];
						$need_more = $pr_credit-$rec['rem_credit'];
						$remaining = 0;
						$this->updateRemaincredit($rec['id'], $remaining);
						$pr_credit = $need_more;
					}
					
				}
			
			} 
			
			$sqlProduct = "select tbl_products.pro_recepient from tbl_products where id=".$_POST['c_id'];
			$query = $this->db->query($sqlProduct);
			
			if(($query->num_rows())>0)
			{
				foreach($query->result_array() as $row)
				{
					$email = explode(",", $row['pro_recepient']);
					/*Email Template*/
					$this->load->library('email'); 
					$config['charset'] = 'iso-8859-1';
					$config['wordwrap'] = TRUE;
					$config['mailtype'] = 'html';

					$email_send = selectEmailTemplate('buy_product');
					$userinfo = GetMemberInfo($user_id);
					
					$username = $userinfo['fname'].' '.$userinfo['lname'];
					$useremail = $userinfo['email'];
					$productinfo = GetProductInfo($_POST['c_id']);
					$productname = $productinfo['product_name'];
					
					$emailFindReplace = array(
							'##FROM_EMAIL##' => getSettingbyField(1,'admin_email'),
							'##SITE_NAME##' => 'WholeYou',
							'##SITE_URL##' => base_url(),
							'##CLICK_HERE##' => '<a href="'.base_url().'admin/order/listing'.'">Click Here</a>',
							'##PRODUCT_TITLE##' => $productname,
							'##DENTIST_NAME##' => $username,
							'##CREDITS##' => $_POST['cval'],
                            '##POSTAL_ADDRESS##' => $userinfo['location'],
                            '##PHONE_NO##' => $userinfo['office_phone_number'],	
                            '##EMAIL##' => $useremail								
						);
						
					$message = @strtr($email_send->email_text_content, $emailFindReplace);
					$subject = @strtr($email_send->subject, $emailFindReplace);
					
					
					$this->email->initialize($config);
					$this->email->from($useremail, 'WholeYou');
					$this->email->to($row['pro_recepient']);
					$this->email->subject($subject);
					$this->email->message(mailerTemplate($message));					
					$this->email->send(); 
					/************************/
					$email_send = selectEmailTemplate('buy_product_user');
					$emailFindReplace = array(
							'##FROM_EMAIL##' => getSettingbyField(1,'admin_email'),
							'##SITE_NAME##' => 'WholeYou',
							'##SITE_URL##' => base_url(),
							'##USER##' => $username					
						);
						
					$message = @strtr($email_send->email_text_content, $emailFindReplace);
					$subject = @strtr($email_send->subject, $emailFindReplace);
					$from= @strtr($email_send->from, $emailFindReplace);
					$this->email->initialize($config);
					$this->email->from($from, 'WholeYou');
					$this->email->to($useremail);
					$this->email->subject($subject);
					$this->email->message(mailerTemplate($message));					
					$this->email->send();
					
				/*End Email Template*/
		
				}
			}
			else
			{
			/*Email Template*/
			
				$this->load->library('email'); 
				$config['charset'] = 'iso-8859-1';
				$config['wordwrap'] = TRUE;
				$config['mailtype'] = 'html';

				$email_send = selectEmailTemplate('buy_product');
				$userinfo = GetMemberInfo($user_id);

				$username = $userinfo['fname'].' '.$userinfo['lname'];
				$useremail = $userinfo['email'];
				$productinfo = GetProductInfo($_POST['c_id']);
				$productname = $productinfo['product_name'];
				
				$emailFindReplace = array(
						'##FROM_EMAIL##' => getSettingbyField(1,'admin_email'),
						'##SITE_NAME##' => 'WholeYou',
						'##SITE_URL##' => base_url(),
						'##CLICK_HERE##' => '<a href="'.base_url().'admin/order/listing'.'">Click Here</a>',
						'##PRODUCT_TITLE##' => $productname,
						'##DENTIST_NAME##' => $username,
						'##CREDITS##' => $_POST['cval'],
						'##POSTAL_ADDRESS##' => $userinfo['location'],
						'##PHONE_NO##' => $userinfo['office_phone_number'],	
						'##EMAIL##' => $useremail								
					);
				$message = @strtr($email_send->email_text_content, $emailFindReplace);
				$subject = @strtr($email_send->subject, $emailFindReplace);
				$from= strtr($email_send->from, $emailFindReplace);
				$this->email->initialize($config);
				$this->email->from($useremail, 'WholeYou');
				$this->email->to($from);
				$this->email->subject($subject);
				$this->email->message(mailerTemplate($message));					
				$this->email->send();
				/*****************************************/
				 $email_send = selectEmailTemplate('buy_product_user');				
				 $emailFindReplace = array(
						'##FROM_EMAIL##' => getSettingbyField(1,'admin_email'),
						'##SITE_NAME##' => 'WholeYou',
						'##SITE_URL##' => base_url(),
						'##USER##' => $username,	
						'##CLICK_HERE##' => '<a href="'.base_url().'myaccount/myresources/">'.$productname.'</a>',					
					);
					
				$message = @strtr($email_send->email_text_content, $emailFindReplace);
				$subject = @strtr($email_send->subject, $emailFindReplace);
				$from= @strtr($email_send->from, $emailFindReplace);
				$this->email->initialize($config);
				$this->email->from($from, 'WholeYou');
				$this->email->to($useremail);
				$this->email->subject($subject);
				$this->email->message(mailerTemplate($message));					
				$this->email->send();
				/*End Email Template*/
			
			}
			
			

	}
	
	
}