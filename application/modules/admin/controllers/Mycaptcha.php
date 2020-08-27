<?php
  
   class Mycaptcha extends CI_Controller {
   
      public function __construct() { 
         parent::__construct(); 
         $this->load->helper(array('form', 'url', 'captcha', 'html')); 
      } 
	
      public function index() {
			
         /* Load form validation library */ 
         $this->load->library('form_validation');
			
	 /* Validation rule */
	 $this->form_validation->set_rules('captcha', 'Captcha', 'required|callback_checkCaptcha');	 
			
         if ($this->form_validation->run() == FALSE) {
		        $arr = array(
			            'img_path'    => './captcha/',
				    'img_url'     => base_url().'/captcha/',
				    'word_length' => 4
				 );
			 $captcha = create_captcha($arr);
			 $data = array(
					'captcha_time'  => $captcha['time'],
					'ip_address'    => $this->input->ip_address(),
					'word'          => $captcha['word']
				      );
		
			$query = $this->db->insert_string('captcha', $data);
			$this->db->query($query);

			$this->load->view('captcha_form', compact('captcha')); 
         } 
         else {
		    $success = "Captcha has been successfully verified!";
                    $this->load->view('captcha_form', compact('success')); 
         } 
      }

	public function checkCaptcha($captcha)
	   {
		   // First, delete old captchas
		   $expiration = time() - 7200; // Two hour limit
		   $this->db->where('captcha_time < ', $expiration)->delete('captcha');
		   // Then see if a captcha exists:
		   $sql = 'SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?';
		   $binds = array($captcha, $this->input->ip_address(), $expiration);
		   $query = $this->db->query($sql, $binds);
		   $row = $query->row();
		   if ($row->count ==  0) {
			  $this->form_validation->set_message('checkCaptcha','The code you entered is incorrect');
			  return FALSE;
			}
		  else 
			  return TRUE;
		}
	}
?>