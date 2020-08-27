<?php 
session_start();
 include "include/header.php";

$select=mysql_query("update apmg_order_list set `booking_status`='2' where id='$_GET[id]' and cus_id='$_GET[cust_id]'");

echo "<script>";
echo "alert('Your Booking Has Been Cancelled Successfully!!!')";
echo "window.location='my_account.php'";
echo "</script>";
?>