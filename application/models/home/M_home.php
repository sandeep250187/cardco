<?php

class M_home extends CI_Model{

   function regipp(){ 
    $data = array(
            'fname' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'mobile' => $this->input->post('mobile')
             );

	$msg = 0;
    $this->db->insert('tbl_register', $data);
    $msg = ($this->db->affected_rows() > 0) ? 1 : 0;//for insert
    return  $msg;
  }
 
    function check_exist($email){
       $this->db->select('id');
       $this->db->from('tbl_register');
       $this->db->where('email', $email);
       $query = $this->db->get();
       if($query->num_rows() > 0){  
           return true;  
        }else{  
         return false;  
        }  

     }
 
    function login()
    {
 		$email = $this->input->post('email'); 
 		$password = $this->input->post('password');
 	    $this->db->select('*');
 		$this->db->from('tbl_register');
 		$this->db->where(array('email'=>$email,'password'=>$password));
 		$query = $this->db->get();
 		$result= $query->row_array();
		return $result;
 	}
	
	function forgetpswd(){
		$email = $this->input->post('email');
		$this->db->select('email,password,fname');
		$this->db->from('tbl_register');
		$this->db->where('email',$email);
		$query = $this->db->get();
		$result = $query->row_array();
		 return $result;
		
	}

}

 

