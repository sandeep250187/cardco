<?php
error_reporting(1);
session_start();
date_default_timezone_set('Asia/Kolkata');

//////////
/*$username='bsdinfotechB1';
$password='kailash';
$hostname='localhost';
$dbname='loveneesh_';*/
$username='aatg_penang';
$password='penang@2017';
$hostname='localhost';
$dbname='aatg_penang';
 

mysql_connect($hostname,$username,$password)or die(mysql_error());
mysql_select_db($dbname)or die(mysql_error());
//session_start();
//echo $_SESSION['mi']."</br>";
//echo "sid=>".$_SESSION['id'];









 


 
?>


