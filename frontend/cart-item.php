<div class="modal fade" id="model456" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">CART DETAILS</h4>
      </div>
      <div class="modal-body">
     <div class=""> 
                <!-- Modal -->
     
        <div class="clearfix">
         <?php
		  if(!empty($_SESSION['cart-hotel']))
		  {
			  	$tot_hotel='';
		 
		  ?>
          <div class="table-responsive">
      <h4 class="text-uppercase text-center">
     <strong>HOTEL DETAILS</strong>
          
      </h4>
      
            <table class="table cart-table table-condensed table-bordered">
      
              <tbody>
                <tr>
                 <!--  <th>&nbsp;</th>
                 <th>Item</th>-->
                  <th>Hotel Name</th>
                  <th>Checkin Date</th>
                  <th><strong>Checkout</strong></th>
                            <th><strong>Night</strong></th>
                  <th   align="right">Adult</th>
				   <th  align="right">Child</th>
				    <th width="240" align="left">Room</th>
				   
				   
                  <th align="right"><strong class="pull-right">Subtotal</strong></th>
				   <th align="right"><strong class="pull-right">Child Breakfast</strong></th>
				  <th align="right"><strong class="pull-right">Total</strong></th>
                </tr>
        <?php
	
		foreach($_SESSION['cart-hotel'] as $data) 
		{
			 
		?>
                         <tr>
                  <!--<td><button type="button" class="close1" data-dismiss="modal" aria-label="Close">
          <a class="btn-link" onclick="if(confirm('Are You Sure U want to Delete This Permanently...')){javascript:window.location='delete.php?id=64';}"><span aria-hidden="true">×</span></a></button></td>
                  <td><img src="images/12.jpg" width="62" height="47" alt=""></td>-->
                  <td class=""><?php $pid=$data['pid']; 
				  
				  $sql1=mysql_query("select h.id,h.hotelname,t.child_breakfast from mala_hotelmaster h, apmg_hotel_tariff_withoutshtl t where h.id=t.hotel_id  and t.id='$pid'");  
				  $row1=mysql_fetch_array($sql1);
				  echo $row1['hotelname'];
				  
				  ?></td>
          <td class=""><?php echo $data['cin']; ?></td>
		  <td class=""><?php echo $data['cout']; ?></td>
		   <td class=""><?php 
$start = strtotime($data['cin']);
$end = strtotime($data['cout']);

echo $night = ceil(abs($end - $start) / 86400);

												?></td>
		   <td class=""><?php echo $data['adult']; ?></td>
		   <td class=""><?php echo $data['child']; ?></td>
        
                  <td class=""><ul class="product_list_widget1 list-unstyled">
				  <?php
				  if($data['room_type']==2){$rt="Double";}
				  if($data['room_type']==3){$rt="Triple";}
				  if($data['room_type']==4){$rt="Family";}
				 
													$selrc=mysql_query("select * from mala_roomcat_master where id='$data[room_cat]'");
													$fetrc=mysql_fetch_array($selrc);
													 $rc=$fetrc['roomtype'];
				  
				  ?>
                      <li class="product-text"><?php echo $data['room'].' '.$rt.' '.$rc;  ?>  
                      </li>
                    </ul></td>
                              
                  
                  <td align="center"><strong><small>MYR</small> <?php echo  number_format($data['price']+$data['markup'],2); ?>        </strong></td>
				    <td align="center"><strong> MYR <?php if($data['child']!=0) { echo  $row1['child_breakfast']; } else { echo "0"; } ?>        </strong></td>
				   <td align="right"><strong>MYR <?php echo  $total=number_format((($data['price']+$data['markup'])*$data['room']*$night)+($fetch_rate['child_breakfast']*$_REQUEST['child']),2); 
				   $tot_hotel=$tot_hotel+$total;
				   ?>        </strong></td>
          
                          </tr>
						 
                
         
        <?php } ?>
        
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
		  
		  <?php
		  }
		  if(!empty($_SESSION['my_cart']))
		  {
			   
		$to='';
		  ?>
		  
		      <div class="table-responsive">
       <h4 class="text-uppercase text-center">
     <strong>TRANSFER DETAILS</strong>
          
      </h4>
      
            <table class="table cart-table table-condensed table-bordered">
      
              <tbody>
                <tr>
                 <!-- <th>&nbsp;</th>
                  <th>Item code</th>-->
                  <th>Pickup From </th>
                  <!--<th>Pickup To </th>
                  <th>Drop From</th>-->
                  <th>Drop To </th>
                  <th>Adult</th>
				  <th>Child</th>
				  <th>Flight No</th>
				  <th>Flight Time</th><?php/* if($num==2){?>
				  <th>Departure  Flight code</th>
				  <th>Flight departure  time</th><?php }*/ ?>
				  <th>Vehicle Detail</th>
				  <th>Per Vehicle Price</th>
				  <th>Total Price</th>
				  <!--<th align="right"><strong class="pull-right">Subtotal</strong></th>
				  <th align="right"><strong class="pull-right">Total</strong></th>-->
                </tr>
        <?php
		
		foreach($_SESSION['my_cart'] as $data) 
		{
			 
		?>
                         <tr>
                  <!--<td><button type="button" class="close1" data-dismiss="modal" aria-label="Close">
          <a class="btn-link" onclick="if(confirm('Are You Sure U want to Delete This Permanently...')){javascript:window.location='delete.php?id=64';}"><span aria-hidden="true">X</span></a></button></td>-->
		  
					<!--<td><?php// echo"code-".$data['pcode']?></td>-->
                  <!--<td><img src="images/12.jpg" width="62" height="47" alt=""></td>-->
                  <td class="">
				  <?php if($data['pf']==1){ echo "Airport";}
						if($data['pf']==2){ echo "Coach station";}
						if($data['pf']==3){ echo "Railway Station";}
						if($data['pf']==4){ echo "Hotel";}
						if($data['pf']==5){ echo "Venue";}
						if($data['pf']==6){ echo "Cruise";}
						if($data['pf']==7){ echo "Ferry";}
						if($data['pf']==8){ echo "Kuala Lumpur";}
						if($data['pf']==9){ echo "IPOH";}
										
					
					?>
				 
          
		  <?php echo "(";
				if($data['pp']=='PA'){ echo "Penang Airport";}
				if($data['pp']=='PC'){ echo "Penang Coach Station";}
				if($data['pp']=='PR'){ echo "Penang Railway Station";}
				if($data['pp']=='CT'){ echo "Cruise Terminal";}
				if($data['pp']=='FT'){ echo "Ferry Terminal";}
				if($data['pp']=='KLIA'){ echo "KLIA";}
				if($data['pp']=='KLIA2'){ echo "KLIA2";}
				if($data['pp']=='KLCH'){ echo "KL City Hotels";}
				if($data['pp']=='IPA'){ echo "Airport";}
				if($data['pp']=='IPCH'){ echo "City Hotels";}
				
				
				if($data['pf']=='4'){	$sql12=mysql_query("SELECT  * FROM apmg_location where id='$data[pp]'");
										$name2 = mysql_fetch_array($sql12);
										 echo $name2['location_name'];
									}
				if($data['pf']=='5'){
										$s=mysql_query("SELECT  id,vname FROM venue_master where id='$data[pp]'");
										$na = mysql_fetch_array($s);
										echo $na['vname'];
									}
				echo ")";
		   ?> </td>
		  <td class="">
		  <?php 		if($data['dt']==1){ echo "Airport";}
						if($data['dt']==2){ echo "Coach station";}
						if($data['dt']==3){ echo "Railway Station";}
						if($data['dt']==4){ echo "Hotel";}
						if($data['dt']==5){ echo "Venue";}
						if($data['dt']==6){ echo "Cruise";}
						if($data['dt']==7){ echo "Ferry";}
						if($data['dt']==8){ echo "Kuala Lumpur";}
						if($data['dt']==9){ echo "IPOH";}
			?>
		  
		  <?php echo "(";
				if($data['dp']=='PA'){ echo "Penang Airport";}
				if($data['dp']=='PC'){ echo "Penang Coach Station";}
				if($data['dp']=='PR'){ echo "Penang Railway Station";}
				if($data['dp']=='CT'){ echo "Cruise Terminal";}
				if($data['dp']=='FT'){ echo "Ferry Terminal";}
				if($data['dp']=='KLIA'){ echo "KLIA";}
				if($data['dp']=='KLIA2'){ echo "KLIA2";}
				if($data['dp']=='KLCH'){ echo "KL City Hotels";}
				if($data['dp']=='IPA'){ echo "Airport";}
				if($data['dp']=='IPCH'){ echo "City Hotels";}
				if($data['dt']=='4'){	$sql12=mysql_query("SELECT  * FROM apmg_location where id='$data[dp]'");
										$name2 = mysql_fetch_array($sql12);
										 echo $name2['location_name'];
									}
				if($data['dt']=='5'){
										$s=mysql_query("SELECT  id,vname FROM venue_master where id='$data[dp]'");
										$na = mysql_fetch_array($s);
										echo $na['vname'];
									}
				echo ")";
			?> </td>
			<td class=""><?php echo $data['ad']; ?></td>
			<td class=""><?php echo $data['ch']; ?></td>
			<td class=""><?php echo $data['arrival_name'];?></td>
			<td class=""><?php echo $data['fat'].":".$data['fam']; ?></td>
			<?php /*if($data['num']==2){?>  
            <td class=""><?php echo $data['departure_name']; ?></td>       
            <td class=""><?php echo $data['fdt'].":".$data['fdm']; ?></td><?php }else{?>
			<td class=""><?php echo "N/A";?></td>       
            <td class=""><?php echo "N/A"; ?></td>	
			<? } */?>
			
			<td class=""><?php echo $data['pax']."  ".$data['type']; ?></td>         
            <td class=""><strong><?php echo "MYR ".number_format($data['price'],2);?></strong></td>
			<td><strong><?php echo "MYR ".number_format($data['price']*$data['pax'],2); $to+=$data['price']*$data['pax']; ?></strong></td>
            <!--<td align="center"><strong><small>MYR</small> <?php //echo  $data['price']+$data['markup']; ?>        </strong></td>
			<td align="right"><strong>MYR <?php //echo  $total=($data['price']+$data['markup'])*$data['room']*$night;  $to=$to+$total; ?></strong></td>-->
          
                          </tr>
                
                
        
                <tr>
                  <td colspan="8">&nbsp;</td>
                  <td><?php //echo $data['num']."-way";?></td>
                  <td>&nbsp;</td>
                </tr>
        <?php  }?>
        
             
              </tbody>
        
        
            </table>
         
          </div>
		  <?php
		  }
		  if(!empty($_SESSION['cart-item']))
		  {
		  
		  ?>
		  
		  
		  
		  
		     
 <div class="table-responsive">
       <h4 class="text-uppercase text-center">
     <strong>TOURS DETAILS</strong>
          
      </h4>
      
            <table class="table cart-table table-condensed table-bordered">
      
              <tbody>
                <tr>
                 
                  <!--<th>Item</th>-->
                  <th>Tour Name</th>
				  <th width="100" align="right">Service Date</th>
                  <!--<th>Checkin Date</th>
                  <th><strong>Checkout</strong></th>-->
                  <th width="100"><strong>TType</strong></th>
                  <th width="100" align="right">Adult</th>
				   <th width="100" align="right">Child</th>
				   <th width="100" align="right">Subtotal</th> 
				    <!--<th width="100" align="right">Room</th>-->
				   
				   
                  <!--<th align="right"><strong class="pull-right">Subtotal</strong></th>-->
				  <th align="right"><strong class="pull-right">Total</strong></th>
                </tr>
        <?php
		$tot_tour='';
		foreach($_SESSION['cart-item'] as $data) 
		{
			 
		?>
                         <tr>
                 <!-- <td><button type="button" class="close1" data-dismiss="modal" aria-label="Close">
          <a class="btn-link" onclick="if(confirm('Are You Sure U want to Delete This Permanently...')){javascript:window.location='delete.php?id=64';}"><span aria-hidden="true">×</span></a></button></td>-->
                  <!--<td><img src="images/12.jpg" width="62" height="47" alt=""></td>-->
                  <td class=""><?php $pid=$data['pid']; 
				  
				  //$sql=mysql_query("select a.* from apmg_mala_tourmaster a,apmg_mala_tourmaster_name b where a.cityid='6' and b.service_type='1' and a.tid=b.serviceid");
				  //$row1=mysql_fetch_array($sql);
				 // echo $row1['servicename'];
				  echo $data['sn'];
				  ?></td>
          <!--<td class=""><?php echo $data['cd']; ?></td>
		  <td class=""><?php echo $data['cod']; ?></td>-->
		   <!--<td class=""><?php 
$start = strtotime($data['cd']);
$end = strtotime($data['cod']);

echo $night = ceil(abs($end - $start) / 86400);			
			?></td>-->
			<td class=""><?php echo $data['cdate']; ?></td>
		   <td class=""><?php echo $data['ttype']; ?></td>										
		   <td class=""><?php echo $data['adult']; ?></td>
		   <td class=""><?php echo $data['child']; ?></td>
		   <td class=""><?php echo "MYR";echo "&nbsp"; echo number_format($data['amount'],2); ?></td>
                              
                  
                  <!--<td align="center"><strong><small>MYR</small> <?php echo  number_format($data['price']+$data['markup'],2); ?>        </strong></td>-->
				   <td align="right"><strong>MYR <?php echo  $total_tour=number_format($data['price'],2); 
				   $to_tour=$to_tour+$total_tour;
				   ?>        </strong></td>
          
                          </tr>
                
                
        
                 
        <?php } ?>
        
              
              </tbody>
        
        
            </table>
         
          </div>
		  
		  <?php  } ?>
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
        </div>
		<div class="row">
        <div class="col-md-3">
         
         
			
            <p>
              <button class="btn btn-block btn-primary login" onclick="window.location='cart.php'">Proceed to Payment</button>
            </p>
            
          </div>
		  <div class="col-md-3">
          
            <p>
              <button class="btn btn-block btn-default btn-ghost" data-dismiss="modal">Continue Shopping</button>
            </p><form name="f" action="" method="POST">
			 
          </div>
		  
		  <div class="col-md-3">
          
             <form name="f" action="" method="POST">
			 <p>
              <button class="btn btn-block btn-default btn-ghost" name="empty"  type="submit">Empty Cart</button>
            </p>
          </div>
           <div class="col-md-3 text-right">
		    
            <!--<table class="table total-order small">
              <tbody>
                <tr>
                  <th>Item</th>
                  <th align="right" style="text-align:right;">Price (MYR)</th>
                </tr>
                <tr>
                  <td>Total</td>
                  <td align="right"><strong  >MYR <?php echo $to; ?></strong></td>
                </tr>
               <!-- <tr>
                  <td>Transaction Fees</td>
                  <td align="right"><strong>SGD 2</strong></td>
                </tr>
                <tr class="heading">
        <td><strong>Order Total</strong></td>
                  <td align="right"><strong >MYR <?php echo $to; ?>
        <input type="hidden" value="42" name="net"></strong></td>
                  
                </tr>
              </tbody>
            </table>-->
			
           <span class="prices" >
              MYR <?php echo number_format($to+$tot_hotel+$to_tour,2); ?>
         </span>   
          </div>
        </div>
    
    </form>
        
      </div>
      </div>
    
    </div>
  </div>
</div>