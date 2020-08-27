<?php
class M_user extends CI_Model{
	 
	 function saveregister(){
    $data = array(
            'username' => $this->input->post('username'),
             'password' => $this->input->post('password'),
             'comp_name' => $this->input->post('comp_name'),
             'fname' => $this->input->post('fname'),
             'mname' => $this->input->post('mname'),
             'lname' => $this->input->post('lname'),
             'email' => $this->input->post('email'),
             'country' => $this->input->post('country'),
             'city' => $this->input->post('city1'),
             'address' => $this->input->post('address'),
             'pin' => $this->input->post('pin'),
             'landline' => $this->input->post('landline'),
             'mobile' => $this->input->post('mobile'),
             'about' => $this->input->post('about'),
             'xml' => $this->input->post('xml'),
             'website' => $this->input->post('website'),
             'fdate' => $this->input->post('fdate'),
             'staf' => $this->input->post('staf'),
             'pan' => $this->input->post('pan'),
             'gst' => $this->input->post('gst'),
             'acnt_name' => $this->input->post('acnt_name'),
             'acnt_email' => $this->input->post('acnt_email'),
             'acnt_mobile' => $this->input->post('acnt_mobile'),
             'resv_name' => $this->input->post('resv_name'),
             'resv_email' => $this->input->post('resv_email'),
             'resv_mobile' => $this->input->post('resv_mobile'),
             'manage_name' => $this->input->post('manage_name'),
             'manage_email' => $this->input->post('manage_email'),
             'manage_mobile' => $this->input->post('manage_mobile'),
             'marketing_name' => $this->input->post('marketing_name'),
               );
      $msg = 0;
      $this->db->insert('tbl_register', $data);
      $msg = ($this->db->affected_rows() > 0) ? 1 : 0;//for insert
      return  $msg;
   } 
   
	 function update(){
       $id = $this->input->post('id');		 
    $data = array(
            'fname' => $this->input->post('name'),
             'mobile' => $this->input->post('mobile')
             );

	$msg = 0;
	$this->db->where('id',$id );
    $this->db->update('tbl_register', $data);
    $msg = ($this->db->affected_rows() > 0) ? 1 : 0;//for insert
    return  $msg;
  }

   function changepassword(){
       $id= $this->input->post('id');
       $cpaswd= $this->input->post('currentpswd');
      $this->db->select('password');
      $this->db->from('tbl_register');
      $this->db->where('password',$cpaswd);
      $query= $this->db->get();
      $numrow=$query->num_rows();
      if($numrow > 0){
        $data = array(
            'password' => $this->input->post('newpswd'),
        );
        $this->db->where('id',$id);
        $this->db->update('tbl_register',$data);
        $msg = ($this->db->affected_rows() > 0) ? 1 : 0;//for insert
         return  $msg;
      }else{
        return false;
      } 
  }
  
	 
}
?>
