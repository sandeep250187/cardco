<?php //$this->load->view('home/header');
if($result=='1'){
	echo "User Email Confirmed";
}elseif($result=='0'){
	echo "Wrong Userid";
	}
	if($result=='2'){
		echo "User Email Already Confirmed";
	}elseif($result=='3')
	{	echo "Wrong Userid";
	}

?>