<?php
 
$date1=$_REQUEST['pax'];

$date2=$_REQUEST['crunt_val'];
if($date2==$date1)
{$date2=0; $val=$date2;}
else
{
	 $val=$date1-$date2;
}
?>
	<select name="child" id="child">
			  <option value="<?=$val?>"><?=$val?></option> 
									   </select>

<?ohp//<span  name="checkout_date" style="width:150px; height:25px;" readonly="true" onmouseover="getnights()"><?=$date?><?//</span>

?>
