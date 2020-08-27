
<?php include "include/header.php"; $select_hotel=mysql_query("select * from mala_hotelmaster where id='$_GET[hid]'");

$fetch_hotel=mysql_fetch_array($select_hotel);
$select_rate=mysql_query("select * from apmg_hotel_tariff_withoutshtl where id='$_GET[id]'");
$fetch_rate=mysql_fetch_array($select_rate);

$rt_single=mysql_num_rows(mysql_query("select * from apmg_hotel_tariff_withoutshtl_rooming where pid='$_GET[id]' and room_type='1'"));
$rt_double=mysql_num_rows(mysql_query("select * from apmg_hotel_tariff_withoutshtl_rooming where pid='$_GET[id]' and room_type='2'"));
$rt_triple=mysql_num_rows(mysql_query("select * from apmg_hotel_tariff_withoutshtl_rooming where pid='$_GET[id]' and room_type='3'"));
$rt_family=mysql_num_rows(mysql_query("select * from apmg_hotel_tariff_withoutshtl_rooming where pid='$_GET[id]' and room_type='4'"));


 $d=date('Y/m/d');
 $out1='2018/09/01';
 $start1 = strtotime($d);
  $end1 = strtotime($out1);
  $d1 = ceil(abs($end1 - $start1) / 86400); 
  $d2=$d1+30; 
$date_cin= date('Y/m/d', strtotime($d . ' +'.$d1.' day'));
 $date_cout= date('Y/m/d', strtotime($d . ' +'.($d1+1).' day'));
 

?>
    
<?php
if(isset($_REQUEST['empty']))
{
unset($_SESSION['cart-hotel']); 
unset($_SESSION['my_cart']); 
unset($_SESSION['cart-item']); 
 
}
if(isset($_REQUEST['submit_double']))
{
//unset($_SESSION['cart']); 
//$_SESSION['cart']= array();
   $count_session=count($_SESSION['cart-hotel']);
// var_dump($_SESSION['cart']);
 $item=array('id'=>$_POST['ide'],'pid'=>$_POST['id'],'cin'=>$_POST['cin'],'cout'=>$_POST['cout'],'room_type'=>$_POST['rt'],'room_cat'=>$_POST['rc'],'room'=>$_POST['room'],'price'=>$_POST['double_price'],'markup'=>$_POST['markup'],'adult'=>$_POST['adult'],'child'=>$_POST['child']);
  if(empty($_SESSION['cart-hotel']))
 {
	 //unset($_SESSION['cart-hotel']); 
	 $_SESSION['cart-hotel']= array();
	 array_push($_SESSION['cart-hotel'],$item);
 }
  else
  {
	   
array_push($_SESSION['cart-hotel'],$item);
  }
 
 
	 
?>	
 
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

 
		
		
		 <!-- Modal//cartModal -->
<?php include "cart-item.php"; ?>
<!-- End Cart Modal -->


<?php
}
?>

 


        <div class="row bg-grey gap">
            <div class="container gap1">
                <div class="row">
                             
                    <div class="details1 clearfix">
                       <div class="col-sm-8">

                      <h2 class="tour-name"> <a href="#">
                                   <i class="fa fa-building-o"></i> <?php echo $fetch_hotel['hotelname']; ?> <br><span> <?php echo $fetch_hotel['address'];  ?> </span> </a></h2>
                                   <!--<address><p> <i class="fa fa-map-marker"></i> : <?php echo $fetch_hotel['address'];  ?></p> </address>-->

  
        <div class="well-sm bg-primary">
          <form type="search" method="REQUEST" action="" class="searchs-details">
            <input name="by" type="hidden" value="2" />
            <ul class="list-inline">
               
              <li>
                <label>From :</label>
                <div class="dates">
                  <input type="text" value="<?php echo $_REQUEST['cindate']; ?>" class="form-control" id="from-date" name="cindate">
                </div>
              </li>
              <li>
                <label>To :</label>
                <div class="dates">
                  <input type="text" value="<?php echo $_REQUEST['coutdate']; ?>"  class="form-control" id="to-date" name="coutdate">
                </div>
              </li>
              <li>
                <label>Adult:</label>
                <div class="selects">
                  <select type="search" name="adult" class="form-control searchbox1" required>
                                             						<?php							for($i=1;$i<14;$i++)							{							?>							<option value="<?php echo $i; ?>" <?php echo ($_REQUEST['adult']==$i)?'selected="selected"' : '' ?> ><?php echo $i; ?></option>                   <?php							}				   ?>                        
                  </select>
                </div>
              </li>
              <li>
                <label>Child:</label>
                <div class="selects">
                  <select type="search" name="child" class="form-control searchbox1" required>
                                           						<?php							for($i=1;$i<14;$i++)							{							?>							<option value="<?php echo $i; ?>" <?php echo ($_REQUEST['child']==$i)?'selected="selected"' : '' ?> ><?php echo $i; ?></option>                   <?php							}				   ?>                        
                  </select>
                </div>
              </li><li>
                <label>Room:</label>
                <div class="selects">
                  <select type="search" name="room" class="form-control searchbox1" required>
                                             						<?php							for($i=1;$i<14;$i++)							{							?>							<option value="<?php echo $i; ?>" <?php echo ($_REQUEST['room']==$i)?'selected="selected"' : '' ?> ><?php echo $i; ?></option>                   <?php							}				   ?>                        
                  </select>
                </div>
              </li>
              <li>
                <label>&nbsp;</label>
				  <input type="hidden"  name="id" value="<?php echo $_REQUEST['id']; ?>"/>
				  <input type="hidden"  name="hid" value="<?php echo $_REQUEST['hid']; ?>"/>
                <button class="btn btn-primary btn-block btn-search" name="search">Search</button>
              </li>
            </ul>
          </form>
        </div>
      

                                    
                        <div class="price ">
                             
<div class="form-group">
                                        
                                        <div class="col-sm-2 col-xs-6">
                                            <label for="inputEmail">Checkin</label>
                                            <div class="form-control-static">
                                                <strong class="text-warning"><?php   
												 echo date('d M Y',strtotime($_REQUEST['cindate']));
												
												?></strong>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 col-xs-6">
                                            <label for="inputEmail">Checkout </label>
                                            <div class="form-control-static">
                                                <strong class="text-warning"><?php  echo date('d M Y',strtotime($_REQUEST['coutdate'])); ?></strong>
                                            </div>
                                        </div>
										 <div class="col-sm-2 col-xs-6">
                                            <label for="inputEmail">Night</label>
                                            <div class="form-control-static">
                                                <strong class="text-warning"><?php 
$start = strtotime($_REQUEST['cindate']);
$end = strtotime($_REQUEST['coutdate']);

echo $night = ceil(abs($end - $start) / 86400);

												?></strong>
                                            </div>
                                        </div>
                                    
									<div class="col-sm-2 col-xs-6">
                                            <label class="">Adult</label>
                                            <div class="form-control-static">
                                                <strong class="text-warning"><?php echo $_GET['adult'];  ?></strong>
                                            </div>
                                        </div>
										<div class="col-sm-2 col-xs-6">
                                            <label class="">Child</label>
                                            <div class="form-control-static">
                                                <strong class="text-warning"><?php echo $_GET['child'];  ?></strong>
                                            </div>
                                        </div>
										
										<div class="col-sm-2 col-xs-6">
                                            <label class="">Room</label>
                                            <div class="form-control-static">
                                                <strong class="text-warning"><?php echo $_GET['room'];  ?></strong>
                                            </div>
                                        </div>
										
										
										
										</div>
										
										
										
										
										      
						 
 
									
						 
                              
                        
                         </div>



<div class="price-container">
 <h4>Room Details</h4>


<?php
								if($rt_double!='0')
								{
									
								?>
	
<div class="panel panel-default ">
<div class="panel-heading"><h4  class="heads text-info" data-toggle="modal" data-target="#room-details"><?php echo $_REQUEST['room']; ?> x Double Room </h4></div>
<?php
$select_cat2=mysql_query("select * from apmg_hotel_tariff_withoutshtl_rooming where pid='$_GET[id]' and room_type='2'");
$p=1;
											while($fetch_cat2=mysql_fetch_array($select_cat2))
											{
												 $rc=$fetch_cat2['room_cat'];  
											 
													$selrc=mysql_query("select * from mala_roomcat_master where id='$rc'");
													$fetrc=mysql_fetch_array($selrc);
?>
<form name="form2" action="" method="POST">



	  <input type="hidden"  name="ide" value="<?php echo $fetch_cat2['id'];  ?>"/>
	  
										  <input type="hidden"  name="cin" value="<?php echo $_GET['cindate'];  ?>"/>
										  <input type="hidden"  name="cout" value="<?php echo $_GET['coutdate'];  ?>"/>
										  <input type="hidden"  name="id" value="<?php echo $_REQUEST['id']; ?>"/>
										  
										   <input type="hidden"  name="adult" value="<?php echo $_REQUEST['adult'];  ?>"/>
										  <input type="hidden"  name="child" value="<?php echo $_REQUEST['child']; ?>"/>
										  
										  
											<input type="hidden"  name="rt" value="2"/>
											<input type="hidden"  name="rc" value="<?php echo $fetch_cat2['room_cat'];  ?>"/>
											<input type="hidden"  name="room" value="<?php echo $_REQUEST['room'];  ?>"/>
											<input type="hidden"  value="<?php echo $fetch_cat2['room_price'];?>" name="double_price"/>
											<input type="hidden"  value="<?php echo $fetch_rate['markup'];?>" name="markup"/>
<div class="panel-body">
	<ul class="list-unstyled">
<li class="col-sm-1" data-toggle="tooltip" data-placement="top" title="Bed And Breakfast">BB</li>
<li class="col-sm-5"><span ><i class="fa fa-gear"></i>  <a href="#" class="heads text-info" data-toggle="modal" data-target="#room-details<?php echo $p; ?>"><?php
													echo $fetrc['roomtype'];
											
											?></a></span>  <span class="pull-right">20 Rooms Left</span></li>
											
											
											
											<!-- Room Details Modal -->
<div class="modal fade" id="room-details<?php echo $p; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-dialog2" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Double <?php  echo $fetrc['roomtype'];;  ?></h4>
      </div>
      <div class="modal-body">
  <div id="" class="owl-carousel " data-slider-id="1">
                                        <a class="item" href="http://supplier.apolloasiab2b.com/transport/upload/<?php  echo $fetch_cat2['pic1'];;  ?>" rel="prettyPhoto" title="This is the description">
                                            <img class="img-responsive" src="http://supplier.apolloasiab2b.com/transport/upload/<?php  echo $fetch_cat2['pic1'];  ?>" alt="title" />
                                        </a>
                    
                    <?php
                    $c2=substr($fetch_cat2['pic2'], -1);
if(!empty($c2))
{
                    ?>
                                        <a class="item" href="http://supplier.apolloasiab2b.com/transport/upload/<?php  echo $fetch_cat2['pic2'];  ?>" rel="prettyPhoto" title="This is the description">
                                            <img class="img-responsive" src="http://supplier.apolloasiab2b.com/transport/upload/<?php  echo $fetch_cat2['pic2'];  ?>" alt="title" />
                                        </a>
                    
                    
                    <?php
                    
                    
}

else
{
  ?>
     
                                        <a class="item" href="http://supplier.apolloasiab2b.com/transport/upload/<?php  echo $fetch_cat2['pic1'];  ?>" rel="prettyPhoto" title="This is the description">
                                            <img class="img-responsive" src="http://supplier.apolloasiab2b.com/transport/upload/<?php  echo $fetch_cat2['pic1'];  ?>" alt="title" />
                                        </a>
  <?php
  
}
?>
                   
                                    </div>

      <!--  <div class="text-center">

        <div class="btn-group btn-group-sm">
          <a href="#" class="btn btn-success">Room size (sqm)</a> 
          <a href="#" class="btn btn-success">Bathtub</a>
          <a href="#" class="btn btn-success"> Wi-fi </a>
          <a href="#" class="btn btn-success"> TV </a>
          <a href="#" class="btn btn-success"> Satellite  TV </a>
          <a href="#" class="btn btn-success">  Cable TV</a> <a href="#" class="btn btn-success"> Individually adjustable air conditioning –</a>
        </div>
      </div>-->
      <hr>
            <div class="facilities">
<?php  echo $fetch_cat2['description'];  ?>
  
    </div>
</div>
</div>
</div>
</div>


<!-- Room Details Modal End -->
											
											
	<li class="col-sm-6"><span class="prices" ><small>MYR</small> <?php echo number_format($fetch_cat2['room_price']+$fetch_rate['markup'],2);  
									 ?></span> 
									 
									 
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

									 
									 
									 
<span class="pull-right"><span class="prices" data-toggle="popover" data-trigger="hover" data-popover-content="#a1<?php echo $p; ?>" data-placement="top"><small>MYR</small><?php echo number_format(($fetch_cat2['room_price']+$fetch_rate['markup'])*$_REQUEST['room']*$night,2);  
$p=($fetch_cat2['room_price']+$fetch_rate['markup'])*$_REQUEST['room']*$night;
											 
											if(!empty($p))
											{
											?></span>
											<button type="submit" name="submit_double" class="btn btn-primary btn-sm"> Add </button> 
											<?php } ?>
</span>

</li>
	</ul>

<!-- PopOver data  
<div id="a1" class="hidden">
  
  <div class="popover-body">
    <table class="table table-condensed table-bordered small">
      <tr>
        <td>USD</td>
        <td>THB</td>
        <td>AUD</td>
        <td>CNY</td>
         
      </tr>
      <tr>
        <td>  145</td>
        <td>  145</td>
        <td>  222</td>
        <td>   453</td>
        
        
      </tr>
      
    </table>
  </div>
</div>
  PopOver data End -->

</div>
</form>

<?php $p++; } ?>

</div>
								<?php  }  
								 
								if($rt_triple!='0')
								{
									
								?>
								
								
<div class="panel panel-default ">
<div class="panel-heading"><h4 class="heads text-info"><?php echo $_REQUEST['room']; ?> x Triple Room </h4></div>

<?php
$q=200;
$select_cat3=mysql_query("select * from apmg_hotel_tariff_withoutshtl_rooming where pid='$_GET[id]' and room_type='3'");
											while($fetch_cat3=mysql_fetch_array($select_cat3))
											{
?>


<form name="form3" action="" method="POST">	
 <input type="hidden"  name="ide" value="<?php echo $fetch_cat3['id'];  ?>"/>
 <input type="hidden"  name="cin" value="<?php echo $_GET['cindate'];  ?>"/>
										  <input type="hidden"  name="cout" value="<?php echo $_GET['coutdate'];  ?>"/>
										  <input type="hidden"  name="id" value="<?php echo $_REQUEST['id']; ?>"/>
											<input type="hidden"  name="rt" value="3"/>
											
											 <input type="hidden"  name="adult" value="<?php echo $_REQUEST['adult'];  ?>"/>
										  <input type="hidden"  name="child" value="<?php echo $_REQUEST['child']; ?>"/>
										  
											
											
											<input type="hidden"  name="rc" value="<?php echo $fetch_cat3['room_cat'];  ?>"/>
											<input type="hidden"  name="room" value="<?php echo $_REQUEST['room'];  ?>"/>
											<input type="hidden"  value="<?php echo $fetch_cat3['room_price'];?>" name="double_price"/>
											<input type="hidden"  value="<?php echo $fetch_rate['markup'];?>" name="markup"/>
											
											
											
											
											
																		 <div id="a2<?php echo $q; ?>" class="hidden">
  
  <div class="popover-body">
    <table class="table table-condensed table-bordered small">
     
	  <?php
	  for($i=0;$i<$night;$i++)
	  {
		  
 
   
	$new_date = date('Y/m/d', strtotime($_REQUEST['cindate'] . ' +'.$i.' day'));

	  ?> <tr>
        <td><?php  
		
		 echo date('d-M-Y',strtotime($new_date));
		?></td><td><small>MYR</small> <?php echo number_format($fetch_cat3['room_price']+$fetch_rate['markup'],2);  
									 ?></td> </tr>
        
	  <?php }  ?>
     
      
      
    </table>
  </div>
</div>
											
											
											
											
											
											
											
											
<div class="panel-body">
	<ul class="list-unstyled">
<li class="col-sm-1 data-toggle="tooltip" data-placement="top" title="Bed And Breakfast">BB</li>
<li class="col-sm-5"><span ><i class="fa fa-gear"></i>  <a href="#" class="heads text-info" data-toggle="modal" data-target="#room-details<?php echo $q; ?>"><?php $rc=$fetch_cat3['room_cat'];  
											 
													$selrc=mysql_query("select * from mala_roomcat_master where id='$rc'");
													$fetrc=mysql_fetch_array($selrc);
													echo $fetrc['roomtype'];
											
											?></a></span> <span class="pull-right">15 Rooms Left</span></li>
											
											
											
											<!-- Room Details Modal -->
<div class="modal fade" id="room-details<?php echo $q; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-dialog2" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Triple <?php  echo $fetrc['roomtype'];;  ?></h4>
      </div>
      <div class="modal-body">
  <div id="" class="owl-carousel " data-slider-id="1">
                                        <a class="item" href="http://supplier.apolloasiab2b.com/transport/upload/<?php  echo $fetch_cat3['pic1'];;  ?>" rel="prettyPhoto" title="This is the description">
                                            <img class="img-responsive" src="http://supplier.apolloasiab2b.com/transport/upload/<?php  echo $fetch_cat3['pic1'];  ?>" alt="title" />
                                        </a>
                    
                    <?php
                    $c2=substr($fetch_cat3['pic2'], -1);
if(!empty($c2))
{
                    ?>
                                        <a class="item" href="http://supplier.apolloasiab2b.com/transport/upload/<?php  echo $fetch_cat3['pic2'];  ?>" rel="prettyPhoto" title="This is the description">
                                            <img class="img-responsive" src="http://supplier.apolloasiab2b.com/transport/upload/<?php  echo $fetch_cat3['pic2'];  ?>" alt="title" />
                                        </a>
                    
                    
                    <?php
                    
                    
}

else
{
  ?>
     
                                        <a class="item" href="http://supplier.apolloasiab2b.com/transport/upload/<?php  echo $fetch_cat3['pic1'];  ?>" rel="prettyPhoto" title="This is the description">
                                            <img class="img-responsive" src="http://supplier.apolloasiab2b.com/transport/upload/<?php  echo $fetch_cat3['pic1'];  ?>" alt="title" />
                                        </a>
  <?php
  
}
?>
                   
                                    </div>


      <!--  <div class="text-center">

        <div class="btn-group btn-group-sm">
          <a href="#" class="btn btn-success">Room size (sqm)</a> 
          <a href="#" class="btn btn-success">Bathtub</a>
          <a href="#" class="btn btn-success"> Wi-fi </a>
          <a href="#" class="btn btn-success"> TV </a>
          <a href="#" class="btn btn-success"> Satellite  TV </a>
          <a href="#" class="btn btn-success">  Cable TV</a> <a href="#" class="btn btn-success"> Individually adjustable air conditioning –</a>
        </div>
      </div>-->
      <hr>
            <div class="facilities">
    
<?php  echo $fetch_cat3['description'];  ?>
  
    </div>
</div>
</div>
</div>
</div>


<!-- Room Details Modal End -->
											
											
											
											
											
											
											
											
											
											
											
											
											
<li class="col-sm-6"><span class="prices"  ><small>MYR</small> <?php echo number_format($fetch_cat3['room_price']+$fetch_rate['markup'],2);  
									 ?></span> 
<span class="pull-right"><span class="prices" data-toggle="popover" data-trigger="hover" data-popover-content="#a2<?php echo $q; ?>" data-placement="top"><small>MYR</small><?php echo number_format(($fetch_cat3['room_price']+$fetch_rate['markup'])*$_REQUEST['room']*$night,2);  
											 
										$p3=($fetch_cat3['room_price']+$fetch_rate['markup'])*$_REQUEST['room']*$night;
											 
											if(!empty($p3))
											{
											?></span>
											<button type="submit" name="submit_double" class="btn btn-primary btn-sm"> Add </button> <?php } ?>


</li>
	</ul>

</div>
</form>
											<?php $q++;  } ?>
</div>
								<?php  } 
								
								if($rt_family!='0')
								{
									
								?>
									
							
<div class="panel panel-default ">
<div class="panel-heading"><h4 class="heads text-info"><?php echo $_REQUEST['room']; ?> x Family Room</h4></div>

<?php
$r=101;
$select_cat4=mysql_query("select * from apmg_hotel_tariff_withoutshtl_rooming where pid='$_GET[id]' and room_type='4'");
											while($fetch_cat4=mysql_fetch_array($select_cat4))
											{
?>
<form name="form4" action="" method="POST">	
 <input type="hidden"  name="ide" value="<?php echo $fetch_cat4['id'];  ?>"/>
 <input type="hidden"  name="cin" value="<?php echo $_GET['cindate'];  ?>"/>
										  <input type="hidden"  name="cout" value="<?php echo $_GET['coutdate'];  ?>"/>
										  <input type="hidden"  name="id" value="<?php echo $_REQUEST['id']; ?>"/>
											<input type="hidden"  name="rt" value="4"/>
											
											 <input type="hidden"  name="adult" value="<?php echo $_REQUEST['adult'];  ?>"/>
										  <input type="hidden"  name="child" value="<?php echo $_REQUEST['child']; ?>"/>
										  
											
											
											<input type="hidden"  name="rc" value="<?php echo $fetch_cat4['room_cat'];  ?>"/>
											<input type="hidden"  name="room" value="<?php echo $_REQUEST['room'];  ?>"/>
											<input type="hidden"  value="<?php echo $fetch_cat4['room_price'];?>" name="double_price"/>
											<input type="hidden"  value="<?php echo $fetch_rate['markup'];?>" name="markup"/>
											
											
											
											 <div id="a3<?php echo $r; ?>" class="hidden">
  
  <div class="popover-body">
    <table class="table table-condensed table-bordered small">
     
	  <?php
	  for($i=0;$i<$night;$i++)
	  {
		  
 
   
	$new_date = date('Y/m/d', strtotime($_REQUEST['cindate'] . ' +'.$i.' day'));

	  ?> <tr>
        <td><?php  
		
		 echo date('d-M-Y',strtotime($new_date));
		?></td><td><small>MYR</small> <?php echo number_format($fetch_cat4['room_price']+$fetch_rate['markup'],2);  
									 ?></td> </tr>
        
	  <?php }  ?>
     
      
      
    </table>
  </div>
</div>
											
											
											
											
											
											
<div class="panel-body">
	<ul class="list-unstyled">
<li class="col-sm-1" data-toggle="tooltip" data-placement="top" title="Bed And Breakfast">BB</li>
<li class="col-sm-5"><span ><i class="fa fa-gear"></i> <a href="#" class="heads text-info" data-toggle="modal" data-target="#room-details<?php echo $r; ?>"> <?php $rc=$fetch_cat4['room_cat'];  
											 
													$selrc=mysql_query("select * from mala_roomcat_master where id='$rc'");
													$fetrc=mysql_fetch_array($selrc);
													echo $fetrc['roomtype'];
											
											?></a></span><span class="pull-right">10 Rooms Left</span></li>
											
											
					
<!-- Room Details Modal -->
<div class="modal fade" id="room-details<?php echo $r; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-dialog2" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Family <?php  echo $fetrc['roomtype'];;  ?></h4>
      </div>
      <div class="modal-body">
 <div id="" class="owl-carousel " data-slider-id="1">
                                        <a class="item" href="http://supplier.apolloasiab2b.com/transport/upload/<?php  echo $fetch_cat4['pic1'];;  ?>" rel="prettyPhoto" title="This is the description">
                                            <img class="img-responsive" src="http://supplier.apolloasiab2b.com/transport/upload/<?php  echo $fetch_cat4['pic1'];  ?>" alt="title" />
                                        </a>
                    
                    <?php
                    $c2=substr($fetch_cat4['pic2'], -1);
if(!empty($c2))
{
                    ?>
                                        <a class="item" href="http://supplier.apolloasiab2b.com/transport/upload/<?php  echo $fetch_cat4['pic2'];  ?>" rel="prettyPhoto" title="This is the description">
                                            <img class="img-responsive" src="http://supplier.apolloasiab2b.com/transport/upload/<?php  echo $fetch_cat4['pic2'];  ?>" alt="title" />
                                        </a>
                    
                    
                    <?php
                    
                    
}

else
{
  ?>
     
                                        <a class="item" href="http://supplier.apolloasiab2b.com/transport/upload/<?php  echo $fetch_cat4['pic1'];  ?>" rel="prettyPhoto" title="This is the description">
                                            <img class="img-responsive" src="http://supplier.apolloasiab2b.com/transport/upload/<?php  echo $fetch_cat4['pic1'];  ?>" alt="title" />
                                        </a>
  <?php
  
}
?>
                   
                                    </div>

      <!--  <div class="text-center">

        <div class="btn-group btn-group-sm">
          <a href="#" class="btn btn-success">Room size (sqm)</a> 
          <a href="#" class="btn btn-success">Bathtub</a>
          <a href="#" class="btn btn-success"> Wi-fi </a>
          <a href="#" class="btn btn-success"> TV </a>
          <a href="#" class="btn btn-success"> Satellite  TV </a>
          <a href="#" class="btn btn-success">  Cable TV</a> <a href="#" class="btn btn-success"> Individually adjustable air conditioning –</a>
        </div>
      </div>-->
      <hr>
            <div class="facilities">
    
<?php  echo $fetch_cat4['description'];  ?>
  
    </div>
</div>
</div>
</div>
</div>


<!-- Room Details Modal End -->					
											
											
											
											
											
											
											
											
<li class="col-sm-6"><span class="prices" ><small>MYR</small> <?php echo number_format($fetch_cat4['room_price']+$fetch_rate['markup'],2);  
									 ?></span> 
<span class=" pull-right"><span class="prices" data-toggle="popover" data-trigger="hover" data-popover-content="#a3<?php echo $r; ?>" data-placement="top"><small>MYR</small><?php echo number_format(($fetch_cat4['room_price']+$fetch_rate['markup'])*$_REQUEST['room']*$night,2);  
											 
                         $p4=($fetch_cat4['room_price']+$fetch_rate['markup'])*$_REQUEST['room']*$night;
											 
											if(!empty($p4))
											{
											 
											?></span>
											<button type="submit" name="submit_double" class="btn btn-primary btn-sm"> Add </button> <?php } ?>
</span>

</li>
	</ul>

</div>
</form>
											<?php  } ?>
</div>
								<?php  } ?>
</div>

                            </div>
                        <div class="col-sm-4">
                          <div class=" ">
                          
                                 
                                    <div id="pictures" class="owl-slider">
                                        <a class="item" href="http://aatg.work/my/upload/<?php echo $fetch_hotel['hotel_pic'];  ?>" rel="prettyPhoto" title="This is the description">
                                            <img src="http://aatg.work/my/upload/<?php echo $fetch_hotel['hotel_pic'];  ?>" alt="title" />
                                        </a>
										
										<?php
										$c2=substr($fetch_hotel['pic2'], -1);
if(!empty($fetch_hotel['pic2']))
{
										?>
                                        <a class="item" href="http://aatg.work/my/upload/<?php echo $fetch_hotel['pic2'];  ?>" rel="prettyPhoto" title="This is the description">
                                            <img src="http://aatg.work/my/upload/<?php echo $fetch_hotel['pic2'];  ?>" alt="title" />
                                        </a>
										
										
										<?php
										
										
}

else
{
	?>
		 
                                        <a class="item" href="http://aatg.work/my/upload/<?php echo $fetch_hotel['hotel_pic'];  ?>" rel="prettyPhoto" title="This is the description">
                                            <img src="http://aatg.work/my/upload/<?php echo $fetch_hotel['hotel_pic'];  ?>" alt="title" />
                                        </a>
	<?php
	
}
	$c3=substr($fetch_hotel['pic3'], -1);
if(!empty($fetch_hotel['pic3']))
{
										?>
                                        <a class="item" href="http://aatg.work/my/upload/<?php echo $fetch_hotel['pic3'];  ?>" rel="prettyPhoto" title="This is the description">
                                            <img src="http://aatg.work/my/upload/<?php echo $fetch_hotel['pic3'];  ?>" alt="title" />
                                        </a>
<?php  } 

else
{
	?>
		 
                                        <a class="item" href="http://aatg.work/my/upload/<?php echo $fetch_hotel['hotel_pic'];  ?>" rel="prettyPhoto" title="This is the description">
                                            <img src="http://aatg.work/my/upload/<?php echo $fetch_hotel['hotel_pic'];  ?>" alt="title" />
                                        </a>
	<?php
	
}
?>
										
                                       <!-- <a class="item" href="https://www.travelogyindia.com/images/hill/shimla.jpg" rel="prettyPhoto" title="This is the description">
                                            <img src="https://www.travelogyindia.com/images/hill/shimla.jpg" alt="title" />
                                        </a>
                                        <a class="item" href="https://www.travelogyindia.com/images/hill/shimla.jpg" rel="prettyPhoto" title="This is the description">
                                            <img src="https://www.travelogyindia.com/images/hill/shimla.jpg" alt="title" />
                                        </a>-->
                                    </div>
                              </div>
                              </div>
                              </div>
               
                     <!--   <div class="details1 clearfix">
                            <h2 class="inclusions">Description</h2>
                            <article>
                               <?php  //echo $fetch_rate['descrip']; ?>
                            </article>
                        </div>-->
                         

                         
                    </div>
                </div>
                        
                    
                   
                </div>
          
         <?php include "include/footer.php"; ?>
        <!--  <div class="row social text-center ">
    <div class="container">
      <div class="col-md-7 text-right">
       
      </div>
      <div class="col-md-4 text-right small"><br>
        <br>
       </div>
    </div>
  </div> -->
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
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
 <script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $("a[rel^='prettyPhoto']").prettyPhoto({
            allow_resize: true,
            /* Resize the photos bigger than viewport. true/false */
            default_width: 500,
            default_height: 344,
            horizontal_padding: 20
        });
        
    });

    $(document).ready(function(){
  $(".owl-carousel").owlCarousel({
    
    items: 1,
    
    
  });
}); 
   $(document).ready(function(){
  $(".owl-slider").owlCarousel({
    
    items: 1,
    
    
  });
}); 


 
    </script>
     <script>

$( function() {
    var dateFormat = "yy/mm/dd",
      from = $( "#from-date" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: false,
		 minDate:<?php echo $d1;  ?>,
		    maxDate:<?php echo $d2;  ?>,
		 dateFormat: "yy/mm/dd",
        numberOfMonths: 1
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#to-date" ).datepicker({
        defaultDate: "+1w",
        changeMonth: false,
		minDate:<?php echo $d1;  ?>,
		    maxDate:<?php echo $d2;  ?>,
		 dateFormat: "yy/mm/dd",
        numberOfMonths: 1
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });

    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }

      return date;
    }
  } );


/*  $('#date_from').datepicker({
    inline: true,
    firstDay: 1,
    showOtherMonths: true,
    // dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
    minDate:'0',
    maxDate:'30/11/2019',
    dateFormat: 'yy/mm/dd',
  }); 
   $('#date_to').datepicker({
    inline: true,
    firstDay: 1,
    showOtherMonths: true,
    // dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
    minDate:'0',
    maxDate:'30/11/2019',
    dateFormat: 'yy/mm/dd',
  }); 
  */
   
</script>

<script type="text/javascript">
  $(function() {
  $("[data-toggle=popover]").popover({
    html: true,
    content: function() {
      var content = $(this).attr("data-popover-content");
      return $(content).children(".popover-body").html();
    },
    title: function() {
      var title = $(this).attr("data-popover-content");
      return $(title).children(".popover-heading").html();
    }
  });
});

</script>

<script>
$(window).load(function()
{
    $('#model456').modal('show');
});

</script> 
<script type="text/javascript" charset="utf-8" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="js/jquery.simple.thumbchanger.js"></script>
<script>
  $(document).ready(function() {
      $('.image-area').thumbchanger({
        mainImageArea: '.main-image',
        subImageArea:  '.sub-image',
        animateTime:   100,
        easing:        'easeOutCubic',
        trigger:       'click',
      }); 
    });
    </script>
</body>

</html>
