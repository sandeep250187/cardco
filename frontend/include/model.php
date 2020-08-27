 
		
		
		
		
		
		
		
		
		
		
		
		
		  <!-- Modal -->
<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Your Carts</h4>
      </div>
      <div class="modal-body">
     <div class="row small"> 
                <!-- Modal -->
				
     <h4 class="text-uppercase text-center">
     <strong>CART DETAILS</strong>
      <strong>OF ORDER CODE:<?php
		var_dump($_SESSION['cart']);
		echo "ashu";
		?>	
		 <b style="color:red">AG00621</b></strong> 
      </h4>
        <div class="col-md-8">
        
          <div class="table-responsive">
      
      
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
                </tr>
       <?php
	$id=$_GET['id'];$type=$_GET['ttype']; $seat=$_GET['seat']; $price=$_GET['prate'];
		
		/*if(isset($_GET['id']) & !empty($_GET['id'])){
			$items = $_GET['id'];
			$_SESSION['cart'] = $items;
			//header('location: index.php?status=success');
	}*/
	if(isset($_SESSION['cart']) & !empty($_SESSION['cart'])){
	$items = $_SESSION['cart'];
	$cartitems = explode(",", $items);
	$items .= $_GET['id'];
	echo "itmid=".$_SESSION['cart'] = $items;echo "</br>";
	//header('location: index.php?status=success');
}else{
	$items = $_GET['id'];
	$_SESSION['cart'] = $items;
	//header('location: index.php?status=success');
}
	
	//mysql_query(" CREATE TEMPORARY TABLE imp(id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY, `sid` int,`nofadult` int,`nofchild` int,`stype` int,`droom` int,`troom` int,`d_price` varchar(20),`t_price` varchar(20),`c_date` varchar(50),`total_amt`)");
	
	
	
 // mysql_query("insert into imp (`sid`,`nofadult`,`nofchild`,`stype`,`droom`,`troom`,`d_price`,`t_price`,`c_date`,`total_amt`) values('$id','','','$type','','','','','','$price')");
 
  //$sql=mysql_query("select * from imp");
  //echo " row==".mysql_num_rows($sql);
//while($fetch1=mysql_fetch_array($sql))
//{
 


?>
                       <!--  <tr>
                  
                  <!--<td><img src="images/12.jpg" width="62" height="47" alt=""></td>-/->
				  <?php  $sql1=mysql_query("select * from transfer_tariff_master where id='$fetch1[sid]'");
				  $fetch=mysql_fetch_array($sql1);
				  
				  ?>
                  <td class=""> <?php													if($fetch['pickup_from']==1)													{														$peneng_pf='Airport';													}													if($fetch['pickup_from']==2)													{														$peneng_pf='Coach Station';													}													if($fetch['pickup_from']==3)													{														$peneng_pf='Railway Station';													}													if($fetch['pickup_from']==4)													{														$peneng_pf='Hotel';													}													if($fetch['pickup_from']==5)													{														$peneng_pf='Venue';													}																																							if($fetch['pickup_point']=='PA')													{														$peneng_pp='Penang Airport';													}													if($fetch['pickup_point']=='PC')													{														$peneng_pp='Penang Coach Station';													}													if($fetch['pickup_point']=='PR')													{														$peneng_pp='Penang Railway Station';													}													if($fetch['pickup_point']==4)													{														$peneng_pp='Hotel';				
													$sql11=mysql_query("SELECT  id,hotelname FROM mala_hotelmaster where id='$fetch[drop_point]'");                                                         $name1 = mysql_fetch_array($sql11);                                                           $peneng_pp=$name1['hotelname']; 													}													if($fetch['pickup_point']==5)													{														$peneng_pp='Venue';														$sql11=mysql_query("SELECT  id,vname FROM venue_master where id='$fetch[drop_point]'");                                                         $name1 = mysql_fetch_array($sql11);                                                           $peneng_pp=$name1['hotelname'];													}																																							echo $peneng_pf.'('.$peneng_pp.')';													?></td>
          <td class=""> <?php													if($fetch['drop_to']==1)													{														$peneng_pf='Airport';														$peneng_pp='Penang Airport';													}													if($fetch['drop_to']==2)													{														$peneng_pf='Coach Station';														$peneng_pp='Penang Coach Station';													}													if($fetch['drop_to']==3)													{														$peneng_pf='Railway Station';														$peneng_pp='Penang Railway Station';													}													if($fetch['drop_to']==4)													{														$peneng_pf='Hotel';																												$sql11=mysql_query("SELECT  id,hotelname FROM mala_hotelmaster where id='$fetch[drop_point]'");                                                         $name1 = mysql_fetch_array($sql11);                                                           $peneng_pp=$name1['hotelname']; 													}													if($fetch['drop_to']==5)													{														$peneng_pf='Venue';																												$sql11=mysql_query("SELECT  id,vname FROM venue_master where id='$fetch[drop_point]'");                                                         $name1 = mysql_fetch_array($sql11);                                                           $peneng_pp=$name1['hotelname'];													}																																																				 																																							echo $peneng_pf.'('.$peneng_pp.')';													?></td>
        
                  <td class=""><ul class="product_list_widget1 list-unstyled">
                      <li class="product-text"><?php echo $fetch1['type'];  ?> <br>
                      </li>
                    </ul></td>
                              <td align="center"><!--<input type="number" class="form-control" name="number" id="number">-/->
         <?php echo  $seat;?> </td>
                  <td><?php													if($fetch1['type']=='PVT')													{														if($seat=='CAR')														{															  $price=$fetch['pvt_car'];																													}														if($seat=='MPV')														{															  $price=$fetch['pvt_mpv'];																													}														if($seat=='VAN')														{															  $price=$fetch['pvt_van'];																													}																											}																										if($fetch1['type']=='HOURLY')													{														if($seat=='2H')														{															  $price=$fetch['van_one_hour'];																													}														if($seat=='4H')														{															  $price=$fetch['van_two_hour'];																													}														 																											}																																							if($fetch1['type']=='SIC')													{														 $price=$fetch['sic_rate'];																											}													echo 'MYR '.$price;																										?>    </td>
                  <td><button type="button" class="close1" data-dismiss="modal" aria-label="Close">
          <a class="btn-link" onclick="if(confirm('Are You Sure U want to Delete This Permanently...')){javascript:window.location='delete.php?id=64';}"><span aria-hidden="true">×</span></a></button></td>
          
                          </tr>-->
                
<?php //} ?>
        
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
                  <td align="right"><strong> SGD 42</strong></td>
                </tr>
               <!-- <tr>
                  <td>Transaction Fees</td>
                  <td align="right"><strong>SGD 2</strong></td>
                </tr>-->
                <tr>
        <td><strong>Order Total</strong></td>
                  <td align="right"><strong>SGD 42
        <input type="hidden" value="42" name="net"></strong></td>
                  
                </tr>
              </tbody>
            </table>
            <p>
              <button class="btn btn-block btn-primary login" onclick="window.location='checkout.php'">Proceed to Payment</button>
            </p>
            <p>
              <button class="btn btn-block btn-default btn-ghost" data-dismiss="modal">Continue Shopping</button>
            </p>
          </div>
        </div>
    
        
      </div>
      </div>
    
    </div>
  </div>
</div>
<!-- End Cart Modal -->

















<div class="modal fade" id="cartModal-hotel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Hotel Cart</h4>
      </div>
      <div class="modal-body">
     <div class="row small"> 
                <!-- Modal -->
				
     <h4 class="text-uppercase text-center">
     <strong>CART DETAILS</strong>
      <strong>OF ORDER CODE:<?php
		var_dump($_SESSION['cart']);
		echo "ashu";
		?>	
		 <b style="color:red">AG00621</b></strong> 
      </h4>
        <div class="col-md-8">
        
          <div class="table-responsive">
      
      
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
                </tr>
       <?php
	$id=$_GET['id'];$type=$_GET['ttype']; $seat=$_GET['seat']; $price=$_GET['prate'];
		
		/*if(isset($_GET['id']) & !empty($_GET['id'])){
			$items = $_GET['id'];
			$_SESSION['cart'] = $items;
			//header('location: index.php?status=success');
	}*/
	if(isset($_SESSION['cart']) & !empty($_SESSION['cart'])){
	$items = $_SESSION['cart'];
	$cartitems = explode(",", $items);
	$items .= $_GET['id'];
	echo "itmid=".$_SESSION['cart'] = $items;echo "</br>";
	//header('location: index.php?status=success');
}else{
	$items = $_GET['id'];
	$_SESSION['cart'] = $items;
	//header('location: index.php?status=success');
}
	
	//mysql_query(" CREATE TEMPORARY TABLE imp(id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY, `sid` int,`nofadult` int,`nofchild` int,`stype` int,`droom` int,`troom` int,`d_price` varchar(20),`t_price` varchar(20),`c_date` varchar(50),`total_amt`)");
	
	
	
 // mysql_query("insert into imp (`sid`,`nofadult`,`nofchild`,`stype`,`droom`,`troom`,`d_price`,`t_price`,`c_date`,`total_amt`) values('$id','','','$type','','','','','','$price')");
 
  //$sql=mysql_query("select * from imp");
  //echo " row==".mysql_num_rows($sql);
//while($fetch1=mysql_fetch_array($sql))
//{
 


?>
                       <!--  <tr>
                  
                  <!--<td><img src="images/12.jpg" width="62" height="47" alt=""></td>-/->
				  <?php  $sql1=mysql_query("select * from transfer_tariff_master where id='$fetch1[sid]'");
				  $fetch=mysql_fetch_array($sql1);
				  
				  ?>
                  <td class=""> <?php													if($fetch['pickup_from']==1)													{														$peneng_pf='Airport';													}													if($fetch['pickup_from']==2)													{														$peneng_pf='Coach Station';													}													if($fetch['pickup_from']==3)													{														$peneng_pf='Railway Station';													}													if($fetch['pickup_from']==4)													{														$peneng_pf='Hotel';													}													if($fetch['pickup_from']==5)													{														$peneng_pf='Venue';													}																																							if($fetch['pickup_point']=='PA')													{														$peneng_pp='Penang Airport';													}													if($fetch['pickup_point']=='PC')													{														$peneng_pp='Penang Coach Station';													}													if($fetch['pickup_point']=='PR')													{														$peneng_pp='Penang Railway Station';													}													if($fetch['pickup_point']==4)													{														$peneng_pp='Hotel';				
													$sql11=mysql_query("SELECT  id,hotelname FROM mala_hotelmaster where id='$fetch[drop_point]'");                                                         $name1 = mysql_fetch_array($sql11);                                                           $peneng_pp=$name1['hotelname']; 													}													if($fetch['pickup_point']==5)													{														$peneng_pp='Venue';														$sql11=mysql_query("SELECT  id,vname FROM venue_master where id='$fetch[drop_point]'");                                                         $name1 = mysql_fetch_array($sql11);                                                           $peneng_pp=$name1['hotelname'];													}																																							echo $peneng_pf.'('.$peneng_pp.')';													?></td>
          <td class=""> <?php													if($fetch['drop_to']==1)													{														$peneng_pf='Airport';														$peneng_pp='Penang Airport';													}													if($fetch['drop_to']==2)													{														$peneng_pf='Coach Station';														$peneng_pp='Penang Coach Station';													}													if($fetch['drop_to']==3)													{														$peneng_pf='Railway Station';														$peneng_pp='Penang Railway Station';													}													if($fetch['drop_to']==4)													{														$peneng_pf='Hotel';																												$sql11=mysql_query("SELECT  id,hotelname FROM mala_hotelmaster where id='$fetch[drop_point]'");                                                         $name1 = mysql_fetch_array($sql11);                                                           $peneng_pp=$name1['hotelname']; 													}													if($fetch['drop_to']==5)													{														$peneng_pf='Venue';																												$sql11=mysql_query("SELECT  id,vname FROM venue_master where id='$fetch[drop_point]'");                                                         $name1 = mysql_fetch_array($sql11);                                                           $peneng_pp=$name1['hotelname'];													}																																																				 																																							echo $peneng_pf.'('.$peneng_pp.')';													?></td>
        
                  <td class=""><ul class="product_list_widget1 list-unstyled">
                      <li class="product-text"><?php echo $fetch1['type'];  ?> <br>
                      </li>
                    </ul></td>
                              <td align="center"><!--<input type="number" class="form-control" name="number" id="number">-/->
         <?php echo  $seat;?> </td>
                  <td><?php													if($fetch1['type']=='PVT')													{														if($seat=='CAR')														{															  $price=$fetch['pvt_car'];																													}														if($seat=='MPV')														{															  $price=$fetch['pvt_mpv'];																													}														if($seat=='VAN')														{															  $price=$fetch['pvt_van'];																													}																											}																										if($fetch1['type']=='HOURLY')													{														if($seat=='2H')														{															  $price=$fetch['van_one_hour'];																													}														if($seat=='4H')														{															  $price=$fetch['van_two_hour'];																													}														 																											}																																							if($fetch1['type']=='SIC')													{														 $price=$fetch['sic_rate'];																											}													echo 'MYR '.$price;																										?>    </td>
                  <td><button type="button" class="close1" data-dismiss="modal" aria-label="Close">
          <a class="btn-link" onclick="if(confirm('Are You Sure U want to Delete This Permanently...')){javascript:window.location='delete.php?id=64';}"><span aria-hidden="true">×</span></a></button></td>
          
                          </tr>-->
                
<?php //} ?>
        
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
                  <td align="right"><strong> SGD 42</strong></td>
                </tr>
               <!-- <tr>
                  <td>Transaction Fees</td>
                  <td align="right"><strong>SGD 2</strong></td>
                </tr>-->
                <tr>
        <td><strong>Order Total</strong></td>
                  <td align="right"><strong>SGD 42
        <input type="hidden" value="42" name="net"></strong></td>
                  
                </tr>
              </tbody>
            </table>
            <p>
              <button class="btn btn-block btn-primary login" onclick="window.location='checkout.php'">Proceed to Payment</button>
            </p>
            <p>
              <button class="btn btn-block btn-default btn-ghost" data-dismiss="modal">Continue Shopping</button>
            </p>
          </div>
        </div>
    
        
      </div>
      </div>
    
    </div>
  </div>
</div>
<!-- End Cart Modal -->
