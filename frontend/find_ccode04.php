<?php
error_reporting(E_ALL ^ E_NOTICE); 
error_reporting(1);session_start();
include_once('includes/data.php');
//include_once('include/data-p.php');
//include "include/header.php";
/* echo "qrype=>>>".$q=$_GET['q'];  
 $part=explode(',',$q);
  echo "q=".$var=$part['0'];
 echo "</br>type=".$tt=$part['1'];*/
 echo "</br>type=".$val=$_REQUEST['ttype'];
// $date2=$_REQUEST['date2'];
   if($val=='PVT')
   {
	for($i=1;$i<=5;$i++){ ?>
    <option value="<?=$i;?>"><?php echo $i?></option>
	<? }
    }
   
?>

