<?php
 

error_reporting(0);
session_start();
date_default_timezone_set('Asia/Kolkata');
 






//////////
/*$username='bsdinfotechB1';
$password='kailash';
$hostname='localhost';
$dbname='loveneesh_';*/
$username='aatg_apollo';
$password='apollo@2015';
$hostname='localhost';
$dbname='aatg_apollo';

/*$username='root';
$password='';
$hostname='localhost';
$dbname='wireframes'; */

mysql_connect($hostname,$username,$password)or die(mysql_error());
mysql_select_db($dbname)or die(mysql_error());

?>


