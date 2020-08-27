<?php
 include "include/data-p.php"; 
$pax=$_REQUEST['pax'];
$val1=$_REQUEST['val1'];
$type=$_REQUEST['tt'];
$adult=$_REQUEST['crunt_val'];
$select_markup=mysql_query("select landmark_markup from manage_markup_vcon where id='1'");
 $fetch_markup=mysql_fetch_array($select_markup);
 $markup=$fetch_markup['landmark_markup'];

					$sql=mysql_query("select a.* from apmg_mala_tourmaster a,apmg_mala_tourmaster_name b where a.cityid='6' and b.service_type='1' and a.tid='$type'");												
						
						
					
				$fetch=mysql_fetch_array($sql);
//while($fetch=mysql_fetch_array($sql)){
			

if($adult==$pax)
{$child=0; $child;
				if($adult=='1'){ $pra=$fetch['pr1'];}
				if($adult=='2'){ $pra=$fetch['pr2'];}
				if($adult=='3'){ $pra=$fetch['pr3'];}
				if($adult=='4'){ $pra=$fetch['pr4'];}
				if($adult=='5'){ $pra=$fetch['pr5'];}
				if($adult=='6'){ $pra=$fetch['pr6'];}
				if($adult=='7'){ $pra=$fetch['pr7'];}
				if($adult=='8'){ $pra=$fetch['pr8'];}
			    if($adult=='9'){ $pra=$fetch['pr9'];}
				$rate=($pra+$markup)*$adult;
				
				?>
		<!--<select name="child" id="child"><option value="<?=$child?>"><?=$child?></option> </select>--><?

}
else
{
	 $child=$pax-$adult;
				if($adult=='1'){ $pra=$fetch['pr1'];}
				if($adult=='2'){ $pra=$fetch['pr2'];}
				if($adult=='3'){ $pra=$fetch['pr3'];}
				if($adult=='4'){ $pra=$fetch['pr4'];}
				if($adult=='5'){ $pra=$fetch['pr5'];}
				if($adult=='6'){ $pra=$fetch['pr6'];}
				if($adult=='7'){ $pra=$fetch['pr7'];}
				if($adult=='8'){ $pra=$fetch['pr8'];}
			    if($adult=='9'){ $pra=$fetch['pr9'];}
				
				if($child=='1'){ $prc=$fetch['pr1'];}
				if($child=='2'){ $prc=$fetch['pr2'];}
				if($child=='3'){ $prc=$fetch['pr3'];}
				if($child=='4'){ $prc=$fetch['pr4'];}
				if($child=='5'){ $prc=$fetch['pr5'];}
				if($child=='6'){ $prc=$fetch['pr6'];}
				if($child=='7'){ $prc=$fetch['pr7'];}
				if($child=='8'){ $prc=$fetch['pr8'];}
			    if($child=='9'){ $prc=$fetch['pcr9'];}
				$rate=(($prc+$markup)*$child+($pra+$markup)*$adult);
				?><!--<select name="child" id="child"><option value="<?=$child?>"><?=$child?></option> </select>--><?
}
				
//}

 ?>
 <?php  $child;?>
 
			    <td id="ad_ch<?php echo $val1; ?>"> 
			MYR <?php echo $rate;?>
			  <input type="hidden" name="price" value="<?php echo $rate;?>"/>
			  
			    </td>
 <!--<td id="ad_ch">MYR <?php echo $rate;?></td>-->
 
<?php//<span  name="checkout_date" style="width:150px; height:25px;" readonly="true" onmouseover="getnights()"><?=$date?><?//</span>

?>
