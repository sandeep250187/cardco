<?php
	function Redirect($value='')
	{
		if($value==''){
			echo "<script>window.history.back();</script>";exit;
		}
		elseif ($value!='') {
			echo "<script>window.location='$value';</script>";exit;
		}
		else{
			echo "<script>window.location='index.php';</script>";exit;
		}
	}
	
	function login_validate()
{
	if(empty($_SESSION['id']))
	{
	 
echo "<script>alert('Please Login To Continue $_SESSION[id]');window.location='login.php';</script>";
exit();
	}
	 
}
?>