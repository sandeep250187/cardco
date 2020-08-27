<?php
error_reporting(E_ALL ^ E_NOTICE); 
error_reporting(0);session_start();
include_once('includes/data.php');
 $q=$_GET['q'];   $_SESSION['country']=$q;
 
 
  /*if($q=='SIC')
{
	 $nb='';
  $n='Select Type';
  $n11='CAR';
  $n1='CAR';
  $n22='MPV';
  $n2='MPV';
  
   $n33='VAN';
  $n3='VAN';
  
  
 for($i=2;$i<=12;$i++)
 {
	 
	    echo $i."#".$i.",";
     
 }	 
   
   
 }*/
  if($q=='PVT')
{
	 $nb='';
  $n='Select Type';
  $n11='CAR';
  $n1='CAR(2 Pax)';
  //$n22='MPV';
 // $n2='MPV(4 Pax)';
  
   $n33='VAN';
  $n3='VAN(9 Pax)';
 // echo $nb."#".$nb.",";
  echo $n1."#".$n11.",";
    //echo $n2."#".$n22.",";
	 echo $n3."#".$n33.",";
   // echo $n2."#".$n22.",";
   
 }
    /*if($q=='HOURLY')
{
	 $nb='';
  $n='Select Vehicle';
  $n11='2H';
  $n1='2 Hours';
  $n22='4H';
  $n2='4 Hours';
 
 // echo $nb."#".$n.",";
  echo $n1."#".$n11.",";
    echo $n2."#".$n22.",";
	// echo $n3."#".$n33.",";
   // echo $n2."#".$n22.",";
   
 }*/
   
 
   
?>

