<?php
class M_user extends CI_Model{
	 
	 function saveregister(){
     if($_FILES['companyimage']['error']!= 4){
      $randno = rand();
      $string = str_replace(' ', '-',$_FILES['companyimage']['name']);
      $clearimg = preg_replace('/[^A-Za-z0-9\-.]/', '', $string);
            $imagename = $randno."_".$clearimg;
             move_uploaded_file($_FILES['companyimage']['tmp_name'],"uploads/cimage/".$imagename);      
    }
    else {
      $imagename=$this->input->post('cimg');;
    }
     $data = array(
            'username' => $this->input->post('username'),
             'password' => $this->input->post('password'),
             'comp_name' => $this->input->post('comp_name'),
             'fname' => $this->input->post('fname'),
             'mname' => $this->input->post('mname'),
             'lname' => $this->input->post('lname'),
             'email' => $this->input->post('regsemail'),
             'country' => $this->input->post('country'),
             'city' => $this->input->post('city1'),
             'address' => $this->input->post('address'),
             'pin' => $this->input->post('pin'),
             'landline' => $this->input->post('landline'),
             'mobile' => $this->input->post('mobile'),
             'about' => $this->input->post('about'),
             'xml' => $this->input->post('xml'),
             'website' => $this->input->post('website'),
             'cimg'=>$imagename,
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
             'captcha' => $this->input->post('captcha')
               );
      $msg = 0;
      $this->db->insert('tbl_register', $data);
      $msg = ($this->db->affected_rows() > 0) ? 1 : 0;//for insert
      return  $msg;
   } 

   function confirmuser($confirm){
    $this->db->select('status');
    $this->db->from('tbl_register');
    $this->db->where('captcha',$confirm);
    $query = $this->db->get();
     if($query->num_rows() > 0){  
    $result=$query->row_array();
    if($result['status']=='0'){
      $this->db->where('captcha',$confirm);
      $this->db->update('tbl_register',array('status'=>'1'));
       $msg = ($this->db->affected_rows() > 0) ? 1 : 0;     
          return  $msg;
      }elseif($result['status']=='1'){
        return 2;
      }
    }else{
      return 3;
    }

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

     function statecountry($id){
     $this->db->select('state,id');
       $this->db->from('country_state');
       $this->db->where('countryId', $id);
       $query = $this->db->get();
        return $query->result_array();
     }

	 function editprofile($id){
     if($_FILES['companyimg']['error']!= 4){
      $randno = rand();
      $string = str_replace(' ', '-',$_FILES['companyimg']['name']);
      $clearimg = preg_replace('/[^A-Za-z0-9\-.]/', '', $string);
            $imagename = $randno."_".$clearimg;
             move_uploaded_file($_FILES['companyimg']['tmp_name'],"uploads/cimage/".$imagename);      
    }
    else {
      $imagename=$this->input->post('cimg');;
    }
     $data = array(
             'username' => $this->input->post('uname'),
             'comp_name' => $this->input->post('cname'),
             'fname' => $this->input->post('firstname'),
             'mname' => $this->input->post('midname'),
             'lname' => $this->input->post('lastname'),
             'country' => $this->input->post('country'),
             'city' => $this->input->post('city1'),
             'address' => $this->input->post('place'),
             'pin' => $this->input->post('pincode'),
             'landline' => $this->input->post('landline'),
             'mobile' => $this->input->post('mobile'),
             'about' => $this->input->post('about'),
             'xml' => $this->input->post('xml'),
             'website' => $this->input->post('website'),
             'cimg'=>$imagename,
             'fdate' => $this->input->post('fndate'),
             'staf' => $this->input->post('staff'),
             'pan' => $this->input->post('panno'),
             'gst' => $this->input->post('gstno'),
             'acnt_name' => $this->input->post('accname'),
             'acnt_email' => $this->input->post('accemail'),
             'acnt_mobile' => $this->input->post('accmobile'),
             'resv_name' => $this->input->post('resvname'),
             'resv_email' => $this->input->post('resvemail'),
             'resv_mobile' => $this->input->post('resvmobile'),
             'manage_name' => $this->input->post('managename'),
             'manage_email' => $this->input->post('manageemail'),
             'manage_mobile' => $this->input->post('managemobile'),
             'marketing_name' => $this->input->post('refcode'),
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
