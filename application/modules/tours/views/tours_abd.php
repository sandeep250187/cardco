<?php
session_start();
 include "include/header.php"; 
 $markup='10';
 
 $d=date('Y/m/d');
 $out1='2018/09/01';
 $start1 = strtotime($d);
  $end1 = strtotime($out1);
  $d1 = ceil(abs($end1 - $start1) / 86400); 
  $d2=$d1+30; 
  
$date_cin= date('Y/m/d', strtotime($d . ' +'.$d1.' day'));

 $date_cout= date('Y/m/d', strtotime($d . ' +'.($d1+1).' day'));
 
 if(empty($_REQUEST['cdate']))
 {
	$cdt=$date_cin; 
 }
  if(!empty($_REQUEST['cdate']))
 {
	$cdt=$_REQUEST['cdate']; 
 }
 
 $sql5=mysql_query("select * from apmg_mala_tourmaster_name where serviceid='$_GET[id]'"); 
 $fetch5=mysql_fetch_array($sql5);
  $sqlr5=mysql_query("select * from apmg_mala_tourmaster where tid='$_GET[id]'"); 
 $fetchr5=mysql_fetch_array($sqlr5);
 
  if(isset($_REQUEST['empty']))
{
unset($_SESSION['cart-hotel']); 
unset($_SESSION['my_cart']); 
unset($_SESSION['cart-item']); 
 
}
if(isset($_REQUEST['add']))
{
	$sql6=mysql_query("select * from apmg_mala_tourmaster_name where serviceid='$_GET[id]'"); 
 $fetch6=mysql_fetch_array($sql6);
 $sn=$fetch['servicename'];
//unset($_SESSION['cart']); 
//$_SESSION['cart']= array();
 echo $count_session=count($_SESSION['cart-item']);
// var_dump($_SESSION['cart']);
 $item=array('id'=>$_POST['ide'],'sn'=>$_POST['sname'],'cd'=>$_POST['cd'],'cod'=>$_POST['cod'],'tt'=>$_POST['tt'],'price'=>$_POST['tamount'],'amount'=>$_POST['amount'],'markup'=>$_POST['markup'],'adult'=>$_POST['adult'],'child'=>$_POST['child'],'ttype'=>$_POST['ttype'],'cdate'=>$_POST['cdate']);
  if(empty($_SESSION['cart-item']))
 {
	 //unset($_SESSION['cart-hotel']); 
	 $_SESSION['cart-item']= array();
	 array_push($_SESSION['cart-item'],$item);
 }
  else
  {
	   
array_push($_SESSION['cart-item'],$item);
  }
 
 
	 
?>	
 
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

 
		
	 <!-- Modal//cartModal -->
<?php include "cart-item.php"; ?>
<!-- End Cart Modal -->

<?php
}
 
 

 ?>
 <script>
 document.onreadystatechange = function () {
  var state = document.readyState
  if (state == 'interactive') {
       document.getElementById('contents').style.visibility="hidden";
  } else if (state == 'complete') {
      setTimeout(function(){
         document.getElementById('interactive');
         document.getElementById('load').style.visibility="hidden";
         document.getElementById('fades').style.visibility="hidden";
         document.getElementById('contents').style.visibility="visible";
      },1000);
  }
}
 </script>



 <div id="fades"></div>
 <div class="text-center" id="load">
  <p>
  <img src="images/loading.gif">
 </p>
 <p>Searching for Tours</p>
 <h4 class="text-primary">Penang, Malaysia</h4>
 <p>From <strong><?php echo $_REQUEST['cd']; ?></strong>,  To <strong><?php echo $_REQUEST['cod']; ?></strong> </p>
   <p>Adult <strong><?php echo $_REQUEST['adult']; ?></strong> , Child <strong><?php echo $_REQUEST['child']; ?></strong></p>

 </div>
 
 
 
 
        <div class="row banner" id="contents">
            <div class="input">
                <div class="container">
      <form type="search" method="POST" action="" class="searchs">
       <input name="by" type="hidden" value="2"/>
       
       
       
       <ul class="list-inline">
       <li><label>Location :</label>
        <div class="location">
              <select type="search" class="form-control searchbox">
                <option>Penang</option>
              </select>
          </div>
              </li>
			  <li><label>Service Date :</label><div class="dates"><input type="text" class="form-control" id="from-date" name="cdate" value="<?php echo $cdt; ?>">
          </div>
          </li>
             
          <!--<li><label>Checkin Date :</label><div class="dates"><input type="text" class="form-control" id="from-date" name="cd" value="<?=$_REQUEST['cd'];?>">
          </div>
          </li>
		  <li><label>CheckOut Date :</label><div class="dates"><input type="text" class="form-control" id="to-date" name="cod" value="<?=$_REQUEST['cod'];?>"></div>
          </li>-->       
    <!--      <li> <label>No Of Night:</label>    <div class="selects"> <select type="night" name="night" class="form-control searchbox1">                                  <?php                           for($i=1;$i<14;$i++)                            {                           ?>                          <option value="<?php echo $i; ?>" <?php echo ($_POST['night']==$i)?'selected="selected"' : '' ?> ><?php echo $i; ?></option>                   <?php                            }                  ?>              </select></div>           </li>-->
	
	<li>
                        <label>Type:</label>                   
						<div class="selects"><select name="tt" type="search" class="form-control searchbox">
                           							 <option value="A" <?php if($_REQUEST['tt']=='A') echo 'selected="selected"'; ?>>All</option>														   <option value="Half Day" <?php if($_REQUEST['tt']=='Half Day') echo 'selected="selected"'; ?>>Half Day</option>	    <option value="Short Tour" <?php if($_REQUEST['tt']=='Short Tour') echo 'selected="selected"'; ?>>Short Tour</option>		<option value="Full Day" <?php if($_REQUEST['tt']=='Full Day') echo 'selected="selected"'; ?>>Full Day</option> 
                        </select>
                    </li>
					<!--<li>
                        <label>Transfer Type:</label>                   
						<div class="selects"><select name="ttype" type="search" class="form-control searchbox">
                           							 														   <option value="SIC" <?php if($_REQUEST['ttype']=='SIC') echo 'selected="selected"'; ?>>SIC</option>	    <option value="PVT" <?php if($_REQUEST['ttype']=='PVT') echo 'selected="selected"'; ?>>PVT</option>		
                        </select>
                    </li>-->
	
          <li>         <label>Adult:</label>                     <div class="selects"> <select type="search" name="adult" class="form-control searchbox1">                                                 <?php                           for($i=1;$i<14;$i++) 
		  {
			  ?>
			     <option value="<?=$i;?>" <?php if($_REQUEST['adult']==$i) echo 'selected="selected"';?>><?=$i;?></option>
			  <?php
		  }
			  ?>                          
									</select>   </div>                                        </li>
           <li>    <label>Child:</label>                              <div class="selects"><select type="search" name="child" class="form-control searchbox1">                                             <?php                            for($i=1;$i<14;$i++) 
		  {
			  ?>
			     <option value="<?=$i;?>" <?php if($_REQUEST['child']==$i) echo 'selected="selected"';?>><?=$i;?></option>
			  <?php
		  }
			  ?>                                                 </select>      </div>                                     </li>
               <!--<li>     <label>Room</label>                    <div class="selects"><select type="search" name="room" class="form-control searchbox1">                                             <?php                           for($i=1;$i<14;$i++) 
		  {
			  ?>
			     <option value="<?=$i;?>" <?php if($_REQUEST['room']==$i) echo 'selected="selected"';?>><?=$i;?></option>
			  <?php
		  }
			  ?>                                                 </select>       </div>                                    </li>-->
           <li><label>&nbsp;</label>
		   <input type="hidden"  name="id" value="<?php echo $_REQUEST['id']; ?>"/>
              <button class="btn btn-primary btn-block btn-search" name="search">Search</button>
              </li>
              </ul>
        </form>
        </div>
    </div>
        </div>
		
		<?php if(!empty($_REQUEST['cdate'])) { 
		
		 $cin=$_POST['cd'];
                    $cout=$_POST['cod'];
                    					
				    $adult=$_POST['adult'];	
				    $child=$_POST['child'];
					$room=$_POST['room'];
				 	$tt=$_REQUEST['tt'];
					
					if($tt=='A')
					{
																													$sql=mysql_query("select a.* from apmg_mala_tourmaster a,apmg_mala_tourmaster_name b where a.cityid='6' and b.service_type='1' and a.tid=b.serviceid");												
					}
                    else		
						{									
					$sql=mysql_query("select a.* from apmg_mala_tourmaster a,apmg_mala_tourmaster_name b where a.cityid='6' and b.service_type='1' and a.tid=b.serviceid and b.type='$tt'");		
					    }					
					
		
		?>
        <div class="row bg-grey gap1">
            <div class="container">
                <div class="row">
                 <div class="col-sm-3">
                         <div class="filter shuttle-widget">
                            <!--  <h4 class="text-center">Search Transfer</h4> -->
                            <div class="tops text-center">
                                
                                <div class="new-price text-center"><span style="font-size:smaller;"><?php  echo mysql_num_rows($sql); ?></span></div>
 <div class="offer">No Of Tours Founds in Penang</div>
                                
                            </div>
                            <h4>Ticket Name</h4>
<ul class="list-unstyled">
       <li>
        <div class="search-icon">
          <input type="text" class="form-control">
      </div>
              </li>             
              </ul>
                        </div>
                    </div>
                    <div class="col-sm-9">
                    <div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-list">
                        <div class="col-md-7">
                            <ol class="breadcrumb">
                                <li><a href="index.html"><i class="fa fa-home"></i> Apollo Asia Holidays</a></li>
                                <li><a href="#">Tourist Attractions</a></li>
                            </ol>
                        </div>
                        <div class="cbp-vm-options">
                            <a href="#" class="cbp-vm-icon cbp-vm-grid" data-view="cbp-vm-view-grid">Grid View</a>
                            <a href="#" class="cbp-vm-icon cbp-vm-list cbp-vm-selected" data-view="cbp-vm-view-list">List View</a>
                        </div>
                        
                        
                            <div class="row">
<ul>																				<?php					      // if(isset($_POST['search']))											
                 	//{
										
				   			
				   
							
					
					//}												/*else												{													$sql=mysql_query("select a.* from b2b_mala_tourmaster a,b2b_mala_tourmaster_name b where a.cityid='6' and b.service_type='1' and a.tid=b.serviceid");												}*/
$p=1;					while($fetch=mysql_fetch_array($sql))												{													$tt='SIC';	$sql5=mysql_query("select * from apmg_mala_tourmaster_name where serviceid='$fetch[tid]'"); $fetch5=mysql_fetch_array($sql5); 												?>
                                      <li>
                                        <span class="launch-soon"><?php echo  $fetch5['type']; ?></span>
                                        <a class="cbp-vm-image" href="details.html"><img  src="http://aatg.work/sms/myo/upload/<?php echo $fetch5['pic'];   ?>"></a>
                                        <div class="cbp-vm-details">										
                                            <h5 class="project-name text-uppercase"><a href="tour-details.php?id=<?=$fetch['serviceid'];?>&cin=<?=$_REQUEST['cd'];?>&cout=<?=$_REQUEST['cod'];?>&adult=<?=$_REQUEST['adult'];?>&child=<?=$_REQUEST['child'];?>&type=<?=$_REQUEST['tt'];?>&ttype=<?=$_REQUEST['ttype'];?>"><?php  echo $fetch5['servicename'];  ?></a>
											
											<a href="#" data-toggle="modal" data-target="#mymodal"><i class="fa fa-info-circle"></i></a>
											
											
											</h5>
                                            <p class="location1"><i class="fa fa-map-marker"></i> <?php echo  $fetch5['descrip']; ?></p>
                                            </h3>
                                      
                                        </div>
                                        <div class="call-back">
                                          
                                            <!--<h3 class="price1">MYR  <?php  											if($tt=='PVT')											{												echo $fetch['pr2'];											}											if($tt=='SIC')											{												echo $fetch['r2'];											}											?>
/<small>Per Person</small></h3>
                                            <span class="tiny-text">( Net Price, Inclusive of All taxes )</span>-->
                                           <!-- <a class="cbp-vm-icon btn-sm cbp-vm-add" href="view-details.html"> View Details</a>-->										   <!--<a class="cbp-vm-icon btn-sm cbp-vm-add" href="tour-details-abd.php?id=<?=$fetch['serviceid'];?>&cin=<?=$_REQUEST['cd'];?>&cout=<?=$_REQUEST['cod'];?>&adult=<?=$_REQUEST['adult'];?>&child=<?=$_REQUEST['child'];?>&type=<?=$_REQUEST['tt'];?>&ttype=<?=$_REQUEST['ttype'];?>">Book</a>-->
                                        </div>
                                           <div class="table-responsive">
                                             <div id="a1" class="hidden">
  
  <div class="popover-body">
    <table class="table table-condensed table-bordered small">
     
      <?php
      for($i=0;$i<$night;$i++)
      {
          
 
   
    $new_date = date('Y/m/d', strtotime($_REQUEST['cindate'] . ' +'.$i.' day'));

      ?> <tr>
        <td><?php  
        
         echo date('d-M-Y',strtotime($new_date));
        ?></td><td><small>MYR</small><?php echo number_format($fetch_cat2['room_price']+$fetch_rate['markup'],2);  
                                     ?></td> </tr>
        
      <?php }  ?>
     
      
      
    </table>
  </div>
</div>
          
          <table class="table-condensed table table-bordered  no-margin">
            <tbody><tr>
              <th>Service Type</th>
               
              <th>Date</th>
              
			  <th>Adult</th>
			  <th>Child</th>
			   <th>Per Person Price</th>
              <th>Total Price</th>
              <th></th>
            </tr>
			<form action="" type="search" method="POST">
            <tr>
              <td>SIC</td>
              <?php 
			 
			   
			   if($_REQUEST['adult']=='1')
			   {
				   $ra=$fetch['r1'];
				   $rc=$fetch['cr1'];
			   }
			   if($_REQUEST['adult']=='2')
			   {
				    $ra=$fetch['r2'];
					$rc=$fetch['cr2'];
			   }
			   if($_REQUEST['adult']=='3')
			   {
				    $ra=$fetch['r3'];
					$rc=$fetch['cr3'];
			   }
			   if($_REQUEST['adult']=='4')
			   {
				   $ra=$fetch['r4'];
				   $rc=$fetch['cr4'];
			   }
			   if($_REQUEST['adult']=='5')
			   {
				    $ra=$fetch['r5'];
					$rc=$fetch['cr5'];
			   }
			   if($_REQUEST['adult']=='6')
			   {
				    $ra=$fetch['r6'];
					$rc=$fetch['cr6'];
			   }
			    if($_REQUEST['adult']=='7')
			   {
				   $ra=$fetch['r7'];
				   $rc=$fetch['cr7'];
			   }
			   if($_REQUEST['adult']=='8')
			   {
				    $ra=$fetch['r8'];
					$rc=$fetch['cr8'];
			   }
			   if($_REQUEST['adult']=='9')
			   {
				    $ra=$fetch['r9'];
					$rc=$fetch['cr9'];
			   }
			   if($_REQUEST['adult']=='10')
			   {
				   $ra=$fetch['r10'];
				   $rc=$fetch['cr10'];
			   }
			   if($_REQUEST['adult']=='11')
			   {
				    $ra=$fetch['r11'];
					$rc=$fetch['cr11'];
			   }
			   if($_REQUEST['adult']=='12')
			   {
				    $ra=$fetch['r12'];
					$rc=$fetch['cr12'];
			   }
			     $amount=$ra+$rc;
			   ?>
              <td class="form-inline"><?=$_REQUEST['cdate'];?></td>
           
			  <td><?=$_REQUEST['adult']?></td>
			  <td><?=$_REQUEST['child']?></td>
			  <td>MYR <?=$amount=$ra+$markup?></td>
              <td><strong class="text-info">
<span class="prices" data-toggle="popover" data-trigger="hover" data-popover-content="#a1<?php echo $p; ?>" data-placement="top">			  
			 MYR  <?php
			   echo $tamount=($ra*$_REQUEST['adult'])+($rc*$_REQUEST['child'])+($markup*($_REQUEST['child']+$_REQUEST['adult']));
			  
			  ?><i class="fa fa-info-circle"></i></span></strong>   </td>
			  
			   <input type="hidden"  name="ide" value="<?php echo $_GET['id'];  ?>"/>
	  
										  <!--<input type="hidden"  name="cd" value="<?php echo $_REQUEST['cd'];  ?>"/>
										  <input type="hidden"  name="cod" value="<?php echo $_REQUEST['cod'];  ?>"/>-->
								<!--<input type="hidden"  name="id" value="<?php echo $_REQUEST['id']; ?>"/>-->
										  
										   <input type="hidden"  name="adult" value="<?php echo $_REQUEST['adult'];  ?>"/>
										  <input type="hidden"  name="child" value="<?php echo $_REQUEST['child']; ?>"/>
										  
										  <input type="hidden"  name="tt" value="<?php echo $_REQUEST['tt']; ?>"/>
										  
										  <input type="hidden"  name="cdate" value="<?php echo $_REQUEST['cdate']; ?>"/>
										  
										  <input type="hidden"  name="sname" value="<?php echo $fetch5['servicename']; ?>"/>
										  
										   <input type="hidden"  name="ttype" value="SIC"/>
										    <input type="hidden"  name="markup" value="<?=$markup;?>"/>
										  										  											                                <input type="hidden"  value="<?php echo $amount;?>" name="amount"/>
											<input type="hidden"  value="<?php echo $tamount;?>" name="tamount"/>
											<!--<input type="hidden"  value="<?php echo $fetch_rate['markup'];?>" name="markup"/>-->
			  
              <td><button type="submit" name="add" class="btn btn-primary btn-sm"> Add </button></td>
            </tr>
             </form> 
			  
			  <form action="" type="search" method="POST">
			<tr>
              <td>PVT</td>
              <?php 
			  if($_REQUEST['adult']=='1')
			   {
				   $pra=$fetch['pr1'];
				   $prc=$fetch['pcr1'];
			   }
			   if($_REQUEST['adult']=='2')
			   {
				    $pra=$fetch['pr2'];
					$prc=$fetch['pcr2'];
			   }
			   if($_REQUEST['adult']=='3')
			   {
				    $pra=$fetch['pr3'];
					$prc=$fetch['pcr3'];
			   }
			   if($_REQUEST['adult']=='4')
			   {
				   $pra=$fetch['pr4'];
				   $prc=$fetch['pcr4'];
			   }
			   if($_REQUEST['adult']=='5')
			   {
				    $pra=$fetch['pr5'];
					$prc=$fetch['pcr5'];
			   }
			   if($_REQUEST['adult']=='6')
			   {
				    $pra=$fetch['pr6'];
					$prc=$fetch['pcr6'];
			   }
			  if($_REQUEST['adult']=='7')
			   {
				   $pra=$fetch['pr7'];
				   $prc=$fetch['pcr7'];
			   }
			   if($_REQUEST['adult']=='8')
			   {
				    $pra=$fetch['pr8'];
					$prc=$fetch['pcr8'];
			   }
			   if($_REQUEST['adult']=='9')
			   {
				    $pra=$fetch['pr9'];
					$prc=$fetch['pcr9'];
			   }
			   if($_REQUEST['adult']=='10')
			   {
				   $pra=$fetch['pr10'];
				   $prc=$fetch['pcr10'];
			   }
			   if($_REQUEST['adult']=='11')
			   {
				    $pra=$fetch['pr11'];
					$prc=$fetch['pcr12'];
			   }
			   if($_REQUEST['adult']=='13')
			   {
				    $pra=$fetch['pr13'];
					$prc=$fetch['pcr13'];
			   }
			    $amount=$pra+$prc;
			  ?>  
              <td class="form-inline"><?=$_REQUEST['cdate'];?> </td>
              
			  <td><?=$_REQUEST['adult']?></td>
			  <td><?=$_REQUEST['child']?></td>
			  <td>MYR <?=$pra+$markup?></td>
              <td><strong class="text-info"> 
			  <span class="prices" data-toggle="popover" data-trigger="hover" data-popover-content="#b1<?php echo $p; ?>" data-placement="top">
			  
			  MYR <?php 
			  
			   
			   echo $tamount=($pra*$_REQUEST['adult'])+($prc*$_REQUEST['child'])+($markup*($_REQUEST['child']+$_REQUEST['adult']));
			  
			  ?><i class="fa fa-info-circle"></i>
			  
			 </span> </strong>

			 	<!--  price conversion start -->
		 <div id="a1<?php echo $p; ?>" class="hidden">
  
  <div class="popover-body">
    <table class="table table-condensed table-bordered small">
     
	  <?php
	  for($i=0;$i<$night;$i++)
	  {
		  
 
   
	$new_date = date('Y/m/d', strtotime($_REQUEST['cindate'] . ' +'.$i.' day'));

	  ?> <tr>
        <td><?php  
		
		 echo date('d-M-Y',strtotime($new_date));
		?></td><td><small>MYR</small><?php echo number_format($fetch_cat2['room_price']+$fetch_rate['markup'],2);  
									 ?></td> </tr>
        
	  <?php }  ?>
     
      
      
    </table>
  </div>
</div>




 <div id="b1<?php echo $p; ?>" class="hidden">
  
  <div class="popover-body">
    <table class="table table-condensed table-bordered small">
     
	  <?php
	  for($i=0;$i<$night;$i++)
	  {
		  
 
   
	$new_date = date('Y/m/d', strtotime($_REQUEST['cindate'] . ' +'.$i.' day'));

	  ?> <tr>
        <td><?php  
		
		 echo date('d-M-Y',strtotime($new_date));
		?></td><td><small>MYR</small><?php echo number_format($fetch_cat2['room_price']+$fetch_rate['markup'],2);  
									 ?></td> </tr>
        
	  <?php }  ?>
     
      
      
    </table>
  </div>
</div>

		
		<!--  price conversion end-->


			 </td>
			  
			  <input type="hidden"  name="ide" value="<?php echo $_GET['id'];  ?>"/>
	  
										  <!--<input type="hidden"  name="cd" value="<?php echo $_REQUEST['cd'];  ?>"/>
										  <input type="hidden"  name="cod" value="<?php echo $_REQUEST['cod'];  ?>"/>-->
								<!--<input type="hidden"  name="id" value="<?php echo $_REQUEST['id']; ?>"/>-->
										  
										   <input type="hidden"  name="adult" value="<?php echo $_REQUEST['adult'];  ?>"/>
										  <input type="hidden"  name="child" value="<?php echo $_REQUEST['child']; ?>"/>
										  
										  <input type="hidden"  name="tt" value="<?php echo $fetch5['type']; ?>"/>
										  
										  <input type="hidden"  name="cdate" value="<?php echo $_REQUEST['cdate']; ?>"/>
										  
										  <input type="hidden"  name="sname" value="<?php echo $fetch5['servicename']; ?>"/>
										  
										   <input type="hidden"  name="ttype" value="PVT"/>
										   
										   <input type="hidden"  name="markup" value="<?=$markup;?>"/>
										  										  											                                <input type="hidden"  value="<?php echo $amount;?>" name="amount"/>
											<input type="hidden"  value="<?php echo $tamount;?>" name="tamount"/>
											<input type="hidden"  value="<?php echo $fetch_rate['markup'];?>" name="markup"/>
             <td><button type="submit" name="add" class="btn btn-primary btn-sm"> Add </button></td>
            </tr> 
          </tbody></table></form>
        </div>
		
	

                                    </li> 																		<?php $p++;												}									?>



                                </ul>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
		<?php } ?>
        <div class="row builders">
            <div class="container">
                <div class="marquee" id="mycrawler2">
                    <ul class="list-inline">
                        <li>
                            <a href="#"><img src="images/c1.jpg"></a>
                        </li>
                        <li>
                            <a href="#"><img src="images/c2.jpg"></a>
                        </li>
                        <li>
                            <a href="#"><img src="images/c3.jpg"></a>
                        </li>
                        <li>
                            <a href="#"><img src="images/c4.jpg"></a>
                        </li>
                        <li>
                            <a href="#"><img src="images/c5.jpg"></a>
                        </li>
                        <li>
                            <a href="#"><img src="images/c6.jpg"></a>
                        </li>
                        <li>
                            <a href="#"><img src="images/c3.jpg"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
 
 
 
 
 
 
 
 
 
 
 
 
 
 <!--  modal start-->
 <div class="modal fade" id="mymodal">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                    <h4 class="modal-title">General information</h4>
                                </div>
                                <div class="modal-body">
                                     <div class="dialog information">
   
    <ul class="custom-list">
            <li><strong>Exclusive ride for you</strong></li>
            <li><strong>Door to door service</strong></li>
            <li><strong>Available 24/7</strong></li>
            <li><strong>1 item of hand baggage allowed per person</strong></li>
            <li><strong>1 piece of baggage allowed per person ( max.dimensions 158cm) length+width+height=158cm</strong></li>
            <li>Remember to bring this voucher and valid photo ID with you</li>
            <li>If you change your accommodation during your holiday, you must inform us at least 48 hours before the departure of your flight so that we can update the details of your transfer.</li>
            <li>If you change your return flight during your holiday, you must inform us at least 48 hours before the departure of your flight so that we can update the details of your transfer.</li>
            <li>For domestic flights, you are advised to be at the airport 2 hours before the departure of the flight.</li>
            <li>For International flights, you are advised to be at the airport 3 hours before the departure of the flight.</li>
            <li>If you arrive at the destination with an excess of luggage, you will have to pay an additional charge for the extra undeclared weight. </li>
            <li>If you are travelling with children it is required to use a child safety seat. Please note that it´s the parent or guardian reponsability to bring one, in the case of not complying with this requirement the service may not be provided.</li>
            <li>Child car seats and boosters are not included unless specified in your booking and can carry an extra cost. Should you need to book them, please contact your point of sale prior to travelling.</li>
            <li>This vehicle is subject to change due to availability and may be substituted for a bigger model.</li>
    </ul>
</div>
<div class="dialog information">
        <h4><strong>Waiting time </strong></h4>
            <ul class="custom-list">
                    <li><strong>No waiting time for the customer </strong></li>
                <li><strong>Maximum supplier waiting time:</strong>
                60  minutes  (Domestic)
                90  minutes  (International)
                </li>
        </ul>
    </div>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->

                     <div class="modal fade" id="pricemodal">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
							<form type="search" method="POST" action="">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        <span class="sr-only">Close</span>
                                    </button>
									<input type="hidden" name="price" value="<?=$price?>"/>
									<input type="hidden" name="pax" value="<?=$pax?>"/>
									<input type="hidden" name="no" value="<?=$n?>"/>
									<input type="hidden" name="type" value="<?=$type?>"/>
                                    <h4 class="modal-title">&nbsp;</h4>
                                </div>
                                <div class="modal-body searches">
                                     <p>
                                         Please provide the following information. It is vital to confirm your transfer reservation If the details entered are incorrect, the provider will not be held responsible for correct service provision
                                     </p>
                                     <h4>Arrival Transfer</h4>
                                     <ul class="list-inline form-horizontal">
                            <li>
                                <label>Vessel Name :</label>
                                <div class="vessel">
                                   <input type="text" placeholder="FY0512E" class="form-control" name="ves_n"/>
                                </div>
                            </li> 
                            
                        
                            <li>
                                <label>Desired Pick-up Time:</label>
                                <div class="selects">
                                    <select type="search" name="dph" class="form-control searchbox1" required="">
                                       <option>hh</option>
									   <?php for($i=00;$i<= 23;$i++){?>
									   <option value="<?=$i?>"><?=$i?></option><? }?>
                                         </select>
                                </div>
                            </li>
                            <li>
                                <div class="selects">
                                    <select type="search" name="dpm" class="form-control searchbox1" required="">
                                        <option>mm</option>
										<?php for($i=00;$i<= 11;$i++){?>
									   <option value="<?=$i*5?>"><?=$i*5?></option><? }?>
                                       </select>
                                </div>
                            </li>
                            
                            
                        </ul>
                            
                       

                        </ul> 
                        <h4>Departure Transfer</h4>
                                     <ul class="list-inline form-horizontal">
                            <li>
                                <label>Vessel Name :</label>
                                <div class="vessel">
                                   <input type="text" class="form-control" placeholder="FY0512E" name="ves_name2">
                                </div>
                            </li> 
                            
                        
                            <li>
                                <label>Desired Pick-up Time:</label>
                                <div class="selects">
                                    <select type="search" name="dph1" class="form-control searchbox1" required="">
										<option>hh</option>
									   <?php for($i=00;$i<= 23;$i++){?>
									    <option value="<?=$i?>"><?=$i?></option><? }?>
                                         </select>
                                </div>
                            </li>
                            <li>
                                <div class="selects">
                                    <select type="search" name="dpm1" class="form-control searchbox1" required="">
                                        <option>mm</option>
										<?php for($i=00;$i<= 11;$i++){?>
									   <option value="<?=$i*5?>"><?=$i*5?></option><? }?>
                                       </select>
                                </div>
                            </li>
                                 <li>
                                <label>&nbsp;</label>
                                <button class="btn btn-primary btn-block btn-search" type="submit" name="search_cart">Continue</button>
								
                            </li>
                            
                        </ul>
                                </div></form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
					
					
					
        <?php include_once('include/footer.php');?>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/parallax.js"></script>
    <script src="js/cbpViewModeSwitch.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
    </script>
    <script src="js/crawler.js"></script>
    <script type="text/javascript">
    marqueeInit({
        uniqueid: 'mycrawler2',
        style: {
            'padding': '9px 0 0',
            'width': '100%',
            'background': ' ',
            'border': 'none',
            'color': '#0284cf',
            'font-size': '13px',
        },
        inc: 5, //speed - pixel increment for each iteration of this marquee's movement
        mouse: 'cursor driven', //mouseover behavior ('pause' 'cursor driven' or false)
        moveatleast: 2,
        neutral: 200,
        persist: true,
        savedirection: true
    });
    </script>
    <script>
    $('#nav').affix({
        offset: {
            top: $('.search').height()
        }
    });
    </script>
  <script>

$(document).ready(function () {
    
        $("#from-date").datepicker({
       minDate:<?php echo $d1;  ?>,
       maxDate:<?php echo $d2;  ?>,
       dateFormat: "yy/mm/dd",
            minDate: 0,
             
        });
        
    });

 
    </script>
<script type="text/javascript">
    function toggleIcon(e) {
        $(e.target)
            .prev('.panel-heading')
            .find(".more-less")
            .toggleClass('glyphicon-plus glyphicon-minus');
    }
    $('.panel-group').on('hidden.bs.collapse', toggleIcon);
    $('.panel-group').on('shown.bs.collapse', toggleIcon);
    </script>
	<script>
$(window).load(function()
{
    $('#model456').modal('show');
});

</script>	
</body>

</html>
