<?php  
if(empty($_SESSION['stt']))
{
$_SESSION['stt']=date('h:i:s');
$start=$_SESSION['stt'];
$endTime = strtotime("+30 minutes", strtotime($start));
 $checkTime = strtotime($start);
 $loginTime =$endTime;
$diff = $checkTime - $loginTime;


}// if close

else
	{
	$current=date('h:i:s');  	 
	$start=$_SESSION['stt'];  
    $checkTime = strtotime($current); 
    $endTime = strtotime("+30 minutes", strtotime($start));
    $et=date('h:i:s', $endTime); 
if($current>$_SESSION['stt'] or $current< $et ){ $loginTime =$endTime;  $diff = $checkTime - $loginTime; }

}  // ele close 
 $second=abs($diff);
?>