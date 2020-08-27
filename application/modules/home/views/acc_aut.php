<?php
require_once('includes/data.php');
error_reporting(0);

$id=$_GET['id'];

$mi=base64_decode($id);
 
	 $update=mysql_query("update apmg_signup set status='1' where id='$mi'");
	 
	  echo "<script type='text/javascript'>";
	echo "alert('Good Job !  your account is activated now !!');";
 
	echo "</script>"; 
	echo "<script>window.location='index.php'</script>";
 
 ?>

 