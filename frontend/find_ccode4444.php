<?php
error_reporting(E_ALL ^ E_NOTICE); 
error_reporting(0);session_start();
include_once('include/data-p.php');
 $q=$_GET['q'];   $_SESSION['country']=$q;
 
 
  if($q=='1')
{
	echo 'Penang Int’l Airport'."#".'PA'.",";
 }
 if($q=='2')
{
	echo 'Sungai Nibong'."#".'PC'.",";
 }
 if($q=='3')
{
	echo 'Butterworth'."#".'PR'.",";
}
  if($q=='4')
{
	//$sql11=mysql_query("SELECT  id,hotelname FROM mala_hotelmaster where state='6'");
	$sql11=mysql_query("SELECT  id,hotelname FROM mala_hotelmaster order by hotelname asc");
	while($name1 = mysql_fetch_array($sql11))

    {

  // echo $name[1];

     

   echo $name1[1]."#".$name1[0].",";

   }

 }
   
   if($q=='5')
{
  $sql11=mysql_query("SELECT  id,vname FROM venue_master");
	while($name1 = mysql_fetch_array($sql11))

    {

  // echo $name[1];

     

   echo $name1[1]."#".$name1[0].",";

   }


 }
  if($q=='6')
{
	echo 'Cruise Terminal'."#".'CT'.",";
} if($q=='7')
{
	echo 'Ferry Terminal'."#".'FT'.",";
}
   
   if($q=='8')
{
	echo 'KLIA'."#".'KLIA'.",";
	echo 'KLIA2'."#".'KLIA2'.",";
	echo 'KL City Hotels'."#".'KLCH'.",";
}
 if($q=='9')
{
	echo 'Airport'."#".'IPA'.",";
	//echo 'KLIA2'."#".'KLIA2'.",";
	echo 'City Hotels'."#".'IPCH'.",";
}
   
   
?>

