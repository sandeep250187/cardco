
<?php include "include/header.php"; $select_hotel=mysql_query("select * from mala_hotelmaster where id='$_GET[hid]'");

$fetch_hotel=mysql_fetch_array($select_hotel);
$select_rate=mysql_query("select * from vcon_hotel_tariff_withoutshtl where id='$_GET[id]'");$fetch_rate=mysql_fetch_array($select_rate);

$rt_single=mysql_num_rows(mysql_query("select * from apmg_hotel_tariff_withoutshtl_rooming where pid='$_GET[id]' and room_type='1'"));
$rt_double=mysql_num_rows(mysql_query("select * from apmg_hotel_tariff_withoutshtl_rooming where pid='$_GET[id]' and room_type='2'"));
$rt_triple=mysql_num_rows(mysql_query("select * from apmg_hotel_tariff_withoutshtl_rooming where pid='$_GET[id]' and room_type='3'"));
$rt_family=mysql_num_rows(mysql_query("select * from apmg_hotel_tariff_withoutshtl_rooming where pid='$_GET[id]' and room_type='4'"));

?>
    
<?php
if(isset($_REQUEST['submit_double']))
{
	$_SESSION['cart']=array();
	
	$double_price=$_POST['double_price'];
	$_SESSION['cart']=$double_price
	
?>	
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script>
$(window).load(function()
{
    $('#cartModal').modal('show');
});
</script>



<?php
}
?>
        <div class="row bg-grey gap">
            <div class="container">
                <div class="row">
              
                    
                                <div class="col-sm-12">
                    <div class="row">
                    <div class="details1 clearfix">
                       <div class="col-sm-8">
                      <h2 class="tour-name"> <a href="#">
                                   <i class="fa fa-building-o"></i> <?php echo $fetch_hotel['hotelname']; ?> <span> </span></a></h2>
                                   <address><p> <i class="fa fa-map-marker"></i> : <?php echo $fetch_hotel['address'];  ?></p> </address>
                                    <div class="row">
                        <div class="price ">
                             
<div class="form-group">
                                        
                                        <div class="col-xs-3">
                                            <label for="inputEmail">Country</label>
                                            <div class="form-control-static">
                                                <strong class="text-warning">Malaysia</strong>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <label for="inputEmail">City</label>
                                            <div class="form-control-static">
                                                <strong class="text-warning">Penang</strong>
                                            </div>
                                        </div>
                                    
									<div class="col-xs-3">
                                            <label class="">Adult</label>
                                            <div class="form-control-static">
                                                <strong class="text-warning"><?php echo $_GET['adult'];  ?></strong>
                                            </div>
                                        </div>
										<div class="col-xs-3">
                                            <label class="">Child</label>
                                            <div class="form-control-static">
                                                <strong class="text-warning"><?php echo $_GET['cwb'];  ?></strong>
                                            </div>
                                        </div>
										</div>
										
										
										
										
										     <div class="form-group">
                                        
                                        <div class="col-xs-3">
                                            <label for="inputEmail">Checkin Date</label>
                                            <div class="form-control-static">
                                               <strong class="text-warning"><?php echo $_GET['cindate'];  ?></strong>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <label for="inputEmail">Checkout Date</label>
                                            <div class="form-control-static">
                                                <strong class="text-warning"><?php
												echo $date = date("Y/m/d", strtotime($_GET['cindate']) . " +".$_GET['night']."days");
												
												?></strong>
                                            </div>
                                        </div>
                                    
									<div class="col-xs-3">
                                            <label class="">No Of Room</label>
                                            <div class="form-control-static">
                                                <strong class="text-warning"><?php echo $_GET['room'];  ?></strong>
                                            </div>
                                        </div>
										

										<div class="col-xs-3">
                                            <label class=""> </label>
                                            
                                        </div>
										</div>














	<div class="form-group">
									 <h4>Room Details</h4>
									  <div class="col-md-4">
                                            <label for="inputEmail">Room Type </label>
                                            
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputEmail">Room Category</label>
                                             
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputEmail">No Of Room </label>
                                            
                                        </div>
										
                                    </div>
						 
									
									
										<?php
								if($rt_double!='0')
								{
									$select_cat2=mysql_query("select * from apmg_hotel_tariff_withoutshtl_rooming where pid='$_GET[id]' and room_type='1'");
											while($fetch_cat2=mysql_fetch_array($select_cat2))
											{
								?>
								<form name="" action="" method="POST">
								<div class="form-group">
									 
									  <div class="col-md-3">
                                           
                                           
                                           
                                          Double
											<input type="hidden"  name="rt2" value="<?php echo $_REQUEST['rt2']; ?>"/>
                                        
                                        </div>
                                        <div class="col-md-3">
                                           <?php $rc=$fetch_cat2['room_cat'];  
											 
													$selrc=mysql_query("select * from mala_roomcat_master where id='$rc'");
													$fetrc=mysql_fetch_array($selrc);
													echo $fetrc['roomtype'];
											
											?>
                                        </div>
										<div class="col-md-3">
                                           
                                          MYR <?php echo $fetch_cat2['room_price'];  
											 
													 
											?>
											<input type="hidden"  value="<?php echo $fetch_cat2['room_price'];?>" name="double_price"/>
                                        </div>
                                        <div class="col-md-3">
                                            
                                        <!--    <select type="search" name="nroom2" onchange="change();" class="form-control searchbox1" required>
                                            <option value="" selected disabled>Select</option>
											<?php		
											for($i=0;$i<20;$i++)	
												{			
											?>		
											<option value="<?php echo $i; ?>" <?php if($i==$_REQUEST['nroom2']) echo 'selected="selected"'; ?>><?php echo $i; ?></option>                   <?php			}			?>       
											</select>-->
											   <button type="submit" name="submit_double" class="cbp-vm-icon cbp-vm-add">Add</button>
                                        </div>
										
                                    </div>
									</form>
									
									<?php
											}
								}
								 
								if($rt_triple!='0')
								{
									$select_cat3=mysql_query("select * from apmg_hotel_tariff_withoutshtl_rooming where pid='$_GET[id]' and room_type='1'");
											while($fetch_cat3=mysql_fetch_array($select_cat3))
											{
								?>
									
									<form name="" action="" method="POST">
									<div class="form-group">
									<div class="col-md-3">
                                            Triple
                                        
                                        </div>
                                        <div class="col-md-3">
                                           <?php $rc=$fetch_cat3['room_cat'];  
											 
													$selrc=mysql_query("select * from mala_roomcat_master where id='$rc'");
													$fetrc=mysql_fetch_array($selrc);
													echo $fetrc['roomtype'];
											
											?>
                                        </div>
                                        <div class="col-md-3">
                                             
                                         <!--   <select type="search" name="nroom3" onchange="change();" class="form-control searchbox1" required>      <?php		
											for($i=0;$i<20;$i++)	
												{			
											?>		
											<option value="<?php echo $i; ?>" <?php if($i==$_REQUEST['nroom3']) echo 'selected="selected"';?>><?php echo $i; ?></option>                   <?php			}			?>       
											</select>-->
											
											
											  <button type="submit" name="submit_triple" class="cbp-vm-icon cbp-vm-add">Add</button>
                                        </div>
										 
                                    </div>
									</form>
									
									 <!-- <div class="form-group">
                                        <div class="col-md-12">
                                            <label for="inputPassword">Extra Nights</label>
                                           <select type="search" name="enights" onchange="admSelectCheck(this);" class="form-control searchbox1" required> 
                                           <option value="0" <?php if(0==$_REQUEST['enights']) echo 'selected="selected"';?>>NO</option>      										   
                                           <option id="admOption" value="1" <?php if(1==$_REQUEST['enights']) echo 'selected="selected"';?>>YES</option>												 
                                           
                                            </select>
                                        </div>
                                        
                                    </div>-->
									
									<?php
											}
								}
									
									if($rt_family!='0')
								{
									$select_cat4=mysql_query("select * from apmg_hotel_tariff_withoutshtl_rooming where pid='$_GET[id]' and room_type='1'");
											while($fetch_cat4=mysql_fetch_array($select_cat4))
											{
								?>
									<form name="" action="" method="POST">
									
									<div class="form-group">
									<div class="col-md-4">
                                           Family 
                                            
                                        </div>
                                        <div class="col-md-4">
                                         <?php $rc=$fetch_cat4['room_cat'];  
											 
													$selrc=mysql_query("select * from mala_roomcat_master where id='$rc'");
													$fetrc=mysql_fetch_array($selrc);
													echo $fetrc['roomtype'];
											
											?>
                                        </div>
                                        <div class="col-md-4">
                                             
                                          <button type="submit" name="submit_family" class="cbp-vm-icon cbp-vm-add">Add</button>
                                        </div>
										 
                                    </div>
									
									  </form>
									<?php
											}
									}
									
									?>										
                           <hr>
                          <!-- <div class="row">
						   Total: MYR :234
                             <div class="col-sm-6 col-sm-offset-3"><a href="book-hote-wout.php" class="btn btn-block btn-warning btn-lg book-now1">Book Now</a> </div>
                             </div>-->
                            
                              
                        </div> 
                         </div>
                            </div>
                        <div class="col-sm-4">
                          <div class="row">
                          
                                 
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
               
                        <div class="details1 clearfix">
                            <h2 class="inclusions">Inclusions</h2>
                            <article>
                               <?php  echo $fetch_rate['descrip']; ?>
                            </article>
                        </div>
                         

                         
                    </div>
                </div>
                        
                    
                   
                </div>
            </div>
        </div><?php include "include/footer.php"; ?>
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
        $(".owl-slider").owlCarousel({
            autoPlay: 3000, //Set AutoPlay to 3 seconds
            items: 1,
            itemsDesktop: [1199, 1],
            itemsDesktopSmall: [979, 1]
        });
    });
    </script>
</body>

</html>
