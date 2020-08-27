 <?php
 session_start();
// unset($_SESSION['user_card']);
//session_destroy();
 ?>
 <?php 
	   
	
	//$user=array('id'=>$id,'type'=>$type,'seat'=>$seat,'price'=>$price,'vno'=>$vno);
	if(!empty($_GET["action"])) {
		$vno=$_GET['vno']; $id=$_GET['id']; echo "</br>"; $type=$_GET['ttype']; $seat=$_GET['seat']; //$price=$_GET['prate'];

		//switch($_GET["action"]) {
		//case "add":
		if(!empty($_GET['id']))
		{	$sql1=mysql_query("select * from transfer_tariff_master where id='$_GET[id]'");
			$fetch=mysql_fetch_array($sql1);
			if($fetch['pickup_from']==1){	$peneng_pf='Airport';	}
			if($fetch['pickup_from']==2){	$peneng_pf='Coach Station';	}
			if($fetch['pickup_from']==3){	$peneng_pf='Railway Station';}	
			if($fetch['pickup_from']==4){	$peneng_pf='Hotel'; }	
			if($fetch['pickup_from']==5){	$peneng_pf='Venue';}
			if($fetch['pickup_from']==6){	$peneng_pf='Cruise'; }	
			if($fetch['pickup_from']==7){	$peneng_pf='Ferry';}
			if($fetch['pickup_point']=='PA'){	$peneng_pp='Penang Airport';}
			if($fetch['pickup_point']=='PC'){	$peneng_pp='Penang Coach Station';}				
			if($fetch['pickup_point']=='PR'){	$peneng_pp='Penang Railway Station';}
			if($fetch['pickup_point']=='CT'){	$peneng_pp='Cruse Terminal';}				
			if($fetch['pickup_point']=='FT'){	$peneng_pp='Ferry Terminal';}
			if($fetch['pickup_from']==4){		//$peneng_pp='Hotel';				
				$sql11=mysql_query("SELECT  * FROM apmg_location where id='$fetch[pickup_point]'");                         
				$name1 = mysql_fetch_array($sql11);                                                          
				$peneng_pp=$name1['location_name'];}
			if($fetch['pickup_from']==5){ 	//$peneng_pp='Venue';			
				$sql12=mysql_query("SELECT  id,vname FROM venue_master where id='$fetch[drop_point]'");                                   
				$name2 = mysql_fetch_array($sql12);                                   
				$peneng_pp=$name2['vname'];}					
				//$peneng_pf.'('.$peneng_pp.')';
			if($fetch['drop_to']==1){	$peneng_pfd='Airport';	$peneng_ppd='Penang Airport';	}												
			if($fetch['drop_to']==2){	$peneng_pfd='Coach Station';	$peneng_ppd='Penang Coach Station';}										
			if($fetch['drop_to']==3){	$peneng_pfd='Railway Station';$peneng_ppd='Penang Railway Station';}
			if($fetch['drop_to']==6){	$peneng_pfd='Cruise';$peneng_ppd='Cruise Terminal';	}
			if($fetch['drop_to']==7){	$peneng_pfd='Ferry';$peneng_ppd='Ferry Terminal'; }
			if($fetch['drop_to']==4){$peneng_pfd='Hotel';
			$sql11=mysql_query("SELECT * FROM apmg_location where id='$fetch[drop_point]'");
			$name1 = mysql_fetch_array($sql11);
			$peneng_ppd=$name1['location_name'];	}					
			if($fetch['drop_to']==5){	$peneng_pfd='Venue';
			$sql11=mysql_query("SELECT  id,vname FROM venue_master where id='$fetch[drop_point]'");
			$name1 = mysql_fetch_array($sql11);$peneng_ppd=$name1['hotelname'];	}
			if($type=='PVT')
			{	if($seat=='CAR')
				{	$price=$fetch['pvt_car']*$vno;	}
				if($seat=='VAN')
					{	$price=$fetch['pvt_van']*$vno; }
			}
			//echo $peneng_pf.'('.$peneng_pp.')';
			
		}
		/*$user=array($vvm[0]['code']=>array("pickup from"=>$peneng_pf[0]['pickup from'],"pickup to"=>$peneng_pp[0]['pickup to'],"drop from"=>$peneng_pfd[0]['drop from'],"drop to"=>$peneng_ppd[0]['drop to'],"type"=>$type[0]['type'],"seat"=>$seat[0]['seat'],"price"=>$price[0]['price'],"no of seat"=>$vno[0]['no of seat']));*/
		
		//$user=array($vvm[0]['code']=>array("pickup from"=>$peneng_pf,"pickup to"=>$peneng_pp,"drop from"=>$peneng_pfd,"drop to"=>$peneng_ppd,"type"=>$_GET['ttype'],"seat"=>$_GET['seat'],"price"=>$_GET['prate'],"no of seat"=>$_GET['vno']));
		
		//$user=array($vvm[0]['code']=>array("pic"=>$peneng_pf,"pp"=>$peneng_pp,"pfd"=>$peneng_pfd,"ppd"=>$peneng_ppd,"type"=>$type,"vno"=>$vno,"seat"=>$seat,"price"=>$price));
			
		if(isset($_SESSION["cart"]))
		{	
	
	
	//echo "</br></br></br></br>";
	//var_dump($_SESSION["cart"]);
			/*$item_array_id=array_column($_SESSION['cart'],"item_id");
			if(!in_array($_GET['id'],$item_array_id))
				{
					$cont=count($_SESSION['cart']);
					$user=array(	
						"pickup from"=>	$peneng_pf,
						"pickup to"=>	$peneng_pp,
						"drop from"=>	$peneng_pfd,
						"drop to"=>		$peneng_ppd,
						"item_id"=>		$_GET['id'],
						"type"=>		$_GET['ttype'],
						"seat"=>		$_GET['seat'],
						"price"=>		$_GET['prate'],
						"no of seat"=>	$_GET['vno']);
						$_SESSION['cart'][$cont]=$user;
				}
				else
				{
					echo "Item already added";
				}*/
		//}
		//if(in_array($vvm[0]["code"],$_SESSION["cart"])) { echo "array not merge";
		//$item_array_id=array_column($_SESSION['cart'],"item_id");
		echo"</br>";
		//print_r(in_array(24,$_SESSION['cart'][0],true));
		echo"</br>";
		if(!in_array($_GET['id'],$_SESSION['cart'][0],true)) 
		{ //echo "array not merge";
		$cont=count($_SESSION['cart']);
		$user=array(	
						"pickup from"=>	$peneng_pf,
						"pickup to"=>	$peneng_pp,
						"drop from"=>	$peneng_pfd,
						"drop to"=>		$peneng_ppd,
						"item_id"=>		$_GET['id'],
						"type"=>		$_GET['ttype'],
						"seat"=>		$_GET['seat'],
						"price"=>		$price,
						"no of seat"=>	$_GET['vno']);
		$_SESSION['cart'][$cont]=$user;
		echo "<script>alert('Transfer Added Successfully In Cart')</script>";
		}
		else
				{
					echo "<script>alert('Transfer Already Added In Cart')</script>";
				}
		/*else 
		{
		echo "<br>";echo "<br>";echo "<br>";
		echo "array mergen   ";
		
		//$_SESSION["cart"][$cont] = array_merge($_SESSION["cart"],$user);
		
		echo "cnt=".count($_SESSION['cart']);
		//var_dump($_SESSION["cart"]);
		}*/
		}
		else
		{
			
		//echo "out isset";
		 $user=array(	"pickup from"=>	$peneng_pf,
						"pickup to"=>	$peneng_pp,
						"drop from"=>	$peneng_pfd,
						"drop to"=>		$peneng_ppd,
						"item_id"=>		$_GET['id'],
						"type"=>		$_GET['ttype'],
						"seat"=>		$_GET['seat'],
						"price"=>		$price,
						"no of seat"=>	$_GET['vno']);
		$_SESSION['cart'][0]=$user;
		
		 count($_SESSION['cart']);
		echo "<script>alert('Transfer Added Successfully In Cart')</script>";
		//var_dump($_SESSION['cart']);
		}

	//break;	}
	}
	//$user=array('id'=>$id,'type'=>$type,'seat'=>$seat,'price'=>$price,'vno'=>$vno);
	//$_SESSION['user_card']=$id;
//var_dump($_SESSION['user_card']) or die();

?>
			
		
		
		
		
		
		
		  <!-- Modal -->
<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Your Cart</h4>
      </div>
      <div class="modal-body">
     <div class="row small"> 
                <!-- Modal -->
     <h4 class="text-uppercase text-center">
     <strong>CART DETAILS</strong>
      <strong>OF ORDER CODE: <b style="color:red">AG0062</b></strong> 
      </h4>
        <div class="col-md-8">
        
          <div class="table-responsive">
      <?php
if(isset($_SESSION["cart"])){
    $item_total = 0;
?>	
      
            <table class="table cart-table small">
      
              <tbody>
                <tr>
                  <!--<th>Item</th>-->
                  <th>Pickup From</th>
                  <th>Drop To</th>
                  <th><strong> 	Transfer Type</strong></th>
                  <th width="100"><strong>Pax/Seat</strong></th>
                  <th width="100" align="right">Price</th>
                  <th align="right"><strong class="pull-right">Action</strong></th>
				  <th>&nbsp;</th>
                </tr><?php //for($i=0;$i<count($_SESSION["cart"]);$i++){ 
				//echo $_SESSION["cart"][$i]."\t";
				if(!empty($_SESSION['cart']))
				{
				foreach ($_SESSION["cart"] as $key=>$item){
					
				?>
				<tr>     
					<td class="product-text"><?php echo $item['pickup from']."(".$item['pickup to'].")";  ?></td>
					<td class="product-text"><?php echo $item['drop from']."(".$item['drop to'].")";  ?> </td>
					<td class="product-text"><ul class="product_list_widget1 list-unstyled">
                    <li class="product-text"><?php echo $item['type'];  ?><br> </li></ul></td>
                    <td align="center"><?php echo $item['no of seat']." ".$item['seat'];  ?></td>
					<td><?php echo "MYR ".$item['price'];  $to+=$item['price'];?></td>
					<td><button type="button" class="close1" data-dismiss="modal" aria-label="Close">
					<a class="btn-link" onclick="if(confirm('Are You Sure U want to Delete This Permanently...')){javascript:window.location='transfer-list.php?action=delete&id=<?=$item['item_id'];?>';}"><span aria-hidden="true">×</span></a></button>
					<!--<a class="btn-link" onclick="if(confirm('Are You Sure U want to Delete This Permanently...')){javascript:window.location='transfer-list.php?action=delete&id=<?=$item['item_id'];?>';}"><button type="button" class="close1" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span></button></a>-->
					</td>
				</tr>
				<!--<tr>     
					<td class="product-text"><?php echo $_SESSION["cart"][0]."(".$_SESSION["cart"][1].")";  ?></td>
					<td class="product-text"><?php echo $_SESSION["cart"][2]."(".$_SESSION["cart"][3].")";  ?> </td>
					<td class="product-text"><ul class="product_list_widget1 list-unstyled">
                    <li class="product-text"><?php echo $_SESSION["cart"][4];  ?><br> </li></ul></td>
                    <td align="center"><?php echo $_SESSION["cart"][5]." ".$_SESSION["cart"][6];  ?></td>
					<td><?php echo "MYR ".$_SESSION["cart"][7];  ?></td>
					<td><button type="button" class="close1" data-dismiss="modal" aria-label="Close">
					<a class="btn-link" onclick="if(confirm('Are You Sure U want to Delete This Permanently...')){javascript:window.location='delete.php?id=64';}"><span aria-hidden="true">×</span></a></button></td>
				</tr>-->
                <?php } ?>
				<?php  }
//}?>
        
                <tr>
                  <td colspan="6">&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
        
        
              <!--  <tr>
                  <td colspan="6">Select Delivery Option:
                    <div class="btn-group-xs btn-group">
                      <button class="btn btn-success"><i class="fa fa-check"></i></button>
                      <button class="btn btn-default">E-Ticket</button>
                    </div>
                    <div class="btn-group-xs btn-group ">
                      <button class="btn btn-default disabled"><i class="fa fa-close"></i></button>
                      <button class="btn btn-default disabled">E-Ticket</button>
                    </div></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>-->
              </tbody>
        
        
            </table>
         <?php } ?>
          </div>
        </div>
        <div class="col-md-4">
          <div class="">
           
            <table class="table total-order small">
              <tbody>
                <tr>
                  <th>Item</th>
                  <th align="right" style="text-align:right;">Price (SGD)</th>
                </tr>
                <tr>
                  <td>Total</td>
                  <td align="right"><strong> MYR <?=$to?></strong></td>
                </tr>
               <!-- <tr>
                  <td>Transaction Fees</td>
                  <td align="right"><strong>SGD 2</strong></td>
                </tr>-->
                <tr class="heading">
        <td><strong>Order Total</strong></td>
                  <td align="right"><strong> MYR <?=$to?>
        <input type="hidden" value="42" name="net"></strong></td>
                  
                </tr>
              </tbody>
            </table>
            <p>
              <button class="btn btn-block btn-primary login" onclick="window.location='checkout.php'">Check Out</button>
            </p>
            <p>
              <button class="btn btn-block btn-default btn-ghost" data-dismiss="modal">Continue Shopping</button>
            </p>
			<p><a href="log_out.php"><button class="btn btn-primary btn-block btn-search">Remove</button></a></p>
          </div>
        </div>
    
        
      </div>
      </div>
    
    </div>
  </div>
</div>
<!-- End Cart Modal -->

