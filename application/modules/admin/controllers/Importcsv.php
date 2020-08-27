<?php
class Importcsv extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('admin/M_csv');
        $this->load->library('csvimport');
    }

 

    public function index() {
		
		if(!empty($_FILES['userfile']['name'])){

        $data['error'] = '';    //initialize image upload error array to empty

        $config['upload_path'] = 'uploads';
        $config['allowed_types'] = 'csv';
        $config['max_size'] = '1000';
       
        $this->load->library('upload', $config);

         
        // If upload failed, display error
        if (!$this->upload->do_upload()) {
            $data['error'] = $this->upload->display_errors();
            $this->load->view(ADMIN_FOLDER.'/member/view_importcsv',$data);
        } else {
            $file_data = $this->upload->data();
            $file_path =  'uploads/'.$file_data['file_name'];
            
            if ($this->csvimport->get_array($file_path)) {
			
                 $csv_array = $this->csvimport->get_array($file_path);	
				 $i=1;
                foreach ($csv_array as $row) {
					if(!empty($row['FirstName'])){
						
					 if($row['CustomerPortalID']!=''){
						 $username = $row['CustomerPortalID'];
					 }	
					 else {
					  $max_id = $this->M_csv->get_maxid()+1;
					  $username = 'wy'.$max_id.'@'.strtolower($row['FirstName']).''.strtolower($row['LastName']);	 
					 }
					 if($row['RegistrationDate']!=''){
						 $registrationDate = $row['RegistrationDate'];
					 }	
					 else {
					  $registrationDate = date("Y-m-d H:i:s");
					 }
					 if($row['Password']!=''){
						 $password = SHA1($row['Password']);
						 $org_password = $row['Password'];
					 }	
					 else {
						 $rand_pwd =$this->randomPassword();
					     $password = SHA1($rand_pwd);
						 $org_password = $rand_pwd; 
					 }
					 
					
					$find = $row['Email'];
					if (strpos($find, ',') !== false) {
						
						$email_array = explode(',',$find);
						$email = $email_array[0];
						array_shift($email_array);
						$c_email = implode(',',$email_array);
					 }else{
						$email = $row['Email']; 
						$c_email = '';
					 }

					 
                    $insert_data = array(
                        'fname'=>$row['FirstName'],
                        'lname'=>$row['LastName'],
                        'email'=>$email,
                        'username'=>$username,
						'password'=>$password,
						'org_password'=>$org_password,
						'status'=>1, 
						'created_on'=>$registrationDate, 
						'credits'=>$row['Credits'],
						'c_email'=>$c_email
                    );  
                    $this->M_csv->insert_csv($insert_data);
					$i++;
					}
                }
				$insertRec = $i-1;
                $this->session->set_flashdata('msg', $insertRec.' Records Imported Successfully');
				redirect('admin/importcsv');
            } else 
                $data['error'] = "Error occured";
			    $this->load->view(ADMIN_FOLDER.'/member/view_importcsv',$data);
            }
            
        } 
		else {
            $this->load->view(ADMIN_FOLDER.'/member/view_importcsv');
		}
	}
	
	function randomPassword() {
		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$pass = array(); 
		$alphaLength = strlen($alphabet) - 1; 
		for ($i = 0; $i < 8; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass); 
    }

	public function download($name,$email,$from,$to){
		$this->load->dbutil();
		$this->load->helper('file');
		$this->load->helper('download');
		$filter_q='';
		if($from!='0' && $to!='0'){
			$filter_q .= "WHERE created_on >='$from' AND created_on >='$to'";
		}
		else { 
		   if($name!='0' && $email!='0'){
			    $email= str_replace('_','@',$email); 
			 $filter_q .= "WHERE `fname`='$name' AND `email`='$email'";
		    }
			else if($name!='0' && $email=='0'){
				$filter_q .= "WHERE `fname`='$name'";
			}
			else if($email!='0' && $name=='0'){
				$email= str_replace('_','@',$email);
				$filter_q .= "WHERE `email`='$email'";
			}
			else {
				$filter_q ='';
			}
		}
		/* $query = $this->db->query("Select m.fname AS FirstName,m.lname AS LastName,m.username AS Username,m.org_password AS Password,m.email AS Email,(SUM(c.credit)) As TotalCredit, SUM(c.rem_credit) As RemainingCredit,m.location AS Location,m.office_phone_number AS OfficePhoneNo,m.mobile AS Mobileno,m.description AS Description,m.created_on AS RegisterdOn,m.clinic_name AS ClinicName,IF (m.is_tablet='0','Disable','Enable') AS TabletStatus,IF (m.tablet_pin='0','',m.tablet_pin) AS TabletPin,IF (m.tab_start_date='0000-00-00 00:00:00','',m.tab_start_date) AS TabletStartDate,IF (m.tab_end_date='0000-00-00 00:00:00','',m.tab_end_date) AS TabletEndDate,IF (m.is_iframe='0','Disable','Enable') AS IframeStatus,IF (m.ifr_start_date='0000-00-00 00:00:00','',m.ifr_start_date) AS IframeStartDate,IF (m.ifr_end_date='0000-00-00 00:00:00','',m.ifr_end_date) AS IframeEndDate from `tbl_members` m LEFT JOIN `tbl_member_credit` c ON c.member_id=m.id $filter_q GROUP BY c.member_id");  */
		
		$query = $this->db->query("Select m.username AS CustomerPortalUsername,m.org_password AS Password, m.fname AS FirstName,m.lname AS LastName,m.email AS Email,(SUM(c.credit)) As Credits from `tbl_members` m LEFT JOIN `tbl_member_credit` c ON c.member_id=m.id $filter_q GROUP BY c.member_id"); 
		$delimiter = ",";
		$newline = "\r\n";
		$data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
		force_download('dentist.csv', $data);
	}

}
/*END OF FILE*/
