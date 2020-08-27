<?php 
include "include/header.php";
/*if($_SESSION['id']=='' or empty($_SESSION['id']))
{
echo "<script>alert('Please Login To Continue');window.location='login.php';</script>";
exit();
}*/
 
if($_GET['act']=='remove')
{ 
	//echo"count=".$count=count($_SESSION['my_cart']);
	 
	 
	$rem = $_GET['id'];
    $ses = $_SESSION['my_cart'];
	foreach ($_SESSION['my_cart'] as $i => $item) 
	{
		if($i == $rem){
            unset($_SESSION['my_cart'][$i]);
			
  echo "<script>alert('Transfer Successfully Delete From Cart');</script>";
		
 	header("location:cart_transfer.php");
        }
		 
	}
	
    /*foreach ($_SESSION['my_cart'] as $i => $item) {
       if($item['pcode'] == $rem){
            unset($_SESSION['my_cart'][$i]);
			
  echo "<script>alert('Transfer Successfully Delete From Cart');</script>";
		
 	header("location:cart_transfer.php");
        }
    }*/

		 
    
  
 
// echo "<script>alert('Product Successfully Remove From Cart');</script>";

}	 
if(isset($_POST['submit']))
{


if($_SESSION['id']=='' or empty($_SESSION['id']))
{
echo "<script>alert('Please Login To Continue');window.location='login.php';</script>";
exit();
}


$selectmax=mysql_query("SELECT MAX(id) FROM `apmg_order_list`");

$fetchmax=mysql_fetch_array($selectmax);

$maxid=$fetchmax[0]+1;

 if(strlen($maxid)=='1')

{

$code='APMG0000'.$maxid;

}

if(strlen($maxid)=='2')

{

$code='APMG000'.$maxid;

}

if(strlen($maxid)=='3')

{

$code='APMG00'.$maxid;

}

if(strlen($maxid)=='4')

{

$code='APMG0'.$maxid;

}

if(strlen($maxid)=='5')

{

$code='APMG'.$maxid;

}

$customerid=$_SESSION['id'];

$date1=date('Y/m/d h:i:s');


$result=mysql_query("insert into apmg_order_list(order_code,cus_id,name,email,country_code,mobile,created_date) values('$code','$customerid','$_POST[name]','$_POST[email]','$_POST[code]','$_POST[mobile]','$date1')");

$last_id = mysql_insert_id();

foreach($_SESSION['my_cart'] as $data) 
		{
			$start = strtotime($data['cin']);
$end = strtotime($data['cout']);

  $night = ceil(abs($end - $start) / 86400);

			$total=($data['price']+$data['markup'])*$data['room']*$night; 
			
$result_insert=mysql_query("insert into apmg_order_detail_transfer(order_id,code,cusid,service_type,ide,pid,service_date,noof_vehicle,vehicle_name,service_price,adult,child,markup,total_price,created_date) values('$last_id','$code','$customerid','2','','$data[id]','$date1','$data[pax]','$data[type]','$data[price]','$data[adult]','$data[child]','10','$total','$date1')");
			
		}
		
		unset($_SESSION['my_cart']); 

echo "<script>window.location='checkout2.php?id=$last_id';</script>";




	
}
?>
		
		
		
        <div class="row bg-grey gap">
            <div class="container gap1">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
					<?php
					/*$to='';
					session_start();
				//	echo $_SESSION['cart-hotel'];
					 
		foreach($_SESSION['cart-hotel'] as $data) 
		{
			 $start = strtotime($data['cin']);
$end = strtotime($data['cout']);

  $night = ceil(abs($end - $start) / 86400);
  
  $pid=$data['pid']; 
				  
				  $sql1=mysql_query("select h.id,h.hotelname,h.hotel_pic from mala_hotelmaster h ,apmg_hotel_tariff_withoutshtl t where h.id=t.hotel_id  and t.id='$pid'");  
				  $row1=mysql_fetch_array($sql1);
		?>
   <!-- Hotel Start -->
                       <!-- <div class="panel panel-default">
                            <div class="panel-heading clearfix">
                                <ul class="list-inline">
                                    <li class="col-sm-2"><img src="http://aatg.work/my/upload/<?php echo $row1['hotel_pic'];  ?>" class="img-responsive cart-thumbnail"></li>
                                    <li class="col-sm-7">
                                        <h4><?php 
				  echo $row1['hotelname'];
				  
				  ?></h4>
                                        <ul class="list-unstyled">
                                            <li><strong><?php echo $data['adult']; ?> Adults</strong></li>
											   <li><strong><?php echo $data['child']; ?> Childs</strong></li>
                                            
                                        </ul>
                                    </li>
                                    <li class="col-sm-3 text-right">
                                        <h4 class="text-success">
    <i class="fa fa-building"></i> Hotel</h4>
    <a href="#">Pay to Apollo Asia</a>
                                    </li>
                            </div>
                            <div class="panel-body">
                                <h4 class="project-name">   
                                        <?php
				  if($data['room_type']==2){$rt="Double";}
				  if($data['room_type']==3){$rt="Triple";}
				  if($data['room_type']==4){$rt="Family";}
				 
													$selrc=mysql_query("select * from mala_roomcat_master where id='$data[room_cat]'");
													$fetrc=mysql_fetch_array($selrc);
													 $rc=$fetrc['roomtype'];
				  echo $data['room'].' * '.$rt.' '.$rc;  ?>
                                             </h4>
                                 
                                <h4>Cancellation charges — Outbound <span   data-toggle="tooltip" title="Date and time is calculated based on local time of destination." data-placement="top"><i class="fa fa-info"></i></span></h4>
                                <div class="col-sm-6">
                                   <ul class="list-unstyled">
                                        <li>Until 23:59 PM on 31/03/2018
                                            <!--<span class="pull-right text-success"><i class="fa fa-check-circle"></i>Free</span>-->
											<span class="pull-right badge">10 %</span>
                                        </li>
                                        <li>After 23:59 PM on 31/03/2018 <span class="pull-right badge">100 %</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-footer clearfix">
                       <a href="cart.php?id=<?php echo $data['id']; ?>&act=remove"><i class="fa fa-times"></i> Delete Product</a> 
						<!-- <a href="#"><i class="fa fa-times"></i> Delete Product</a>-->
                                <spn class="pull-right lead"><strong>Total MYR <?php echo  $total=($data['price']+$data['markup'])*$data['room']*$night; 
				   $to=$to+$total;
				   ?> </strong></span>
                            </div>
                        </div>
                        
		<?php   } */?>
                        <!-- Hotel End -->
						

                        
<!-- Transfer Start --><?php  
						$to='';
						foreach($_SESSION['my_cart'] as $i=>$data) 
						{?>
						<div class="panel panel-default">
                            <div class="panel-heading clearfix">
                                <ul class="list-inline">
                                    <li class="col-sm-2"><img src="images/banner2.jpg" class="img-responsive cart-thumbnail"></li>
                                    <li class="col-sm-7">
                                        <h4>Offer Special: Full Day Lembongan Reef Cruise</h4>
                                        <ul class="list-unstyled">
                                            <li><strong><?php echo $data['ad']; ?> Adults</strong></li>
											   <li><strong><?php echo $data['ch']; ?> Childs</strong></li>
                                            <li><strong>Route</strong>: <?php 
											if($data['pf']==1){ echo "Airport";}
											if($data['pf']==2){ echo "Coach station";}
											if($data['pf']==3){ echo "Railway Station";}
											if($data['pf']==4){ echo "Hotel";}
											if($data['pf']==5){ echo "Venue";}
											if($data['pf']==6){ echo "Cruise";}
											if($data['pf']==7){ echo "Ferry";} ?>, <?php 
											if($data['pp']=='PA'){ echo "Penang Airport";}
											if($data['pp']=='PC'){ echo "Penang Coach Station";}
											if($data['pp']=='PR'){ echo "Penang Railway Station";}
											if($data['pp']=='CT'){ echo "Cruise Terminal";}
											if($data['pp']=='FT'){ echo "Ferry Terminal";}
											if($data['pf']=='4'){	$sql12=mysql_query("SELECT  * FROM apmg_location where id='$data[pp]'");
																	$name2 = mysql_fetch_array($sql12);
																	 echo $name2['location_name'];
																}
											if($data['pf']=='5'){
										$s=mysql_query("SELECT  id,vname FROM venue_master where id='$data[pp]'");
										$na = mysql_fetch_array($s);
										echo $na['vname'];
									} ?> <i class="fa fa-arrow-right"></i> <?php 
										if($data['dt']==1){ echo "Airport";}
										if($data['dt']==2){ echo "Coach station";}
										if($data['dt']==3){ echo "Railway Station";}
										if($data['dt']==4){ echo "Hotel";}
										if($data['dt']==5){ echo "Venue";}
										if($data['dt']==6){ echo "Cruise";}
										if($data['dt']==7){ echo "Ferry";} ?>,<?php 
										if($data['dp']=='PA'){ echo "Penang Airport";}
										if($data['dp']=='PC'){ echo "Penang Coach Station";}
										if($data['dp']=='PR'){ echo "Penang Railway Station";}
										if($data['dp']=='CT'){ echo "Cruise Terminal";}
										if($data['dp']=='FT'){ echo "Ferry Terminal";}
										if($data['dt']=='4'){	$sql12=mysql_query("SELECT  * FROM apmg_location where id='$data[dp]'");
																$name2 = mysql_fetch_array($sql12);
																 echo $name2['location_name'];
															}
										if($data['dt']=='5'){
										$s=mysql_query("SELECT  id,vname FROM venue_master where id='$data[dp]'");
										$na = mysql_fetch_array($s);
										echo $na['vname'];
									} ?></li>
                                        </ul>
                                    </li>
                                    <li class="col-sm-3 text-right">
                                        <h4 class="text-success">
    <i class="fa fa-car"></i> Transfer</h4>
	<a href="#">Pay to Apollo Asia</a>
                                    </li>
                            </div>
                            <div class="panel-body">
                                <h4 class="project-name">   
                                        <span>Outbound</span>
                                        <span class="QA_transfer_dateFrom"><?php echo $data['cd1']; ?></span>
                                        , Arrival time <span class="QA_transfer_timeFrom"><?php echo $data['fat']; ?>:<?php echo $data['fam']; ?></span>
                                                    , Flight number <span class="QA_transfer_flightNumber"><?php echo $data['arrival_name']; ?></span>
                                                <span class="pull-right small"><strong><?php echo $data['price']; ?></strong></span>
                                             </h4>
                                <p class="alert alert-warning"><i class="fa fa-warning"></i> If the information is not accurate, the supplier is not responsible for the correct service provision.
                                </p>
                                <h4>Cancellation charges — Outbound <span   data-toggle="tooltip" title="Date and time is calculated based on local time of destination." data-placement="top"><i class="fa fa-info"></i></span></h4>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled">
                                        <li>Until 23:59 PM on 25/10/2017
										<span class="pull-right badge">10 %</span>
                                            <!--<span class="pull-right text-success"><i class="fa fa-check-circle"></i>Free</span>-->
                                        </li>
                                        <li>After 23:59 PM on 25/10/2017 <span class="pull-right badge">100 %</span> <!--<span class="pull-right badge">53.84 S$</span>--></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-footer clearfix">
								 <a href="cart_transfer.php?id=<?php echo $i;//$data['pcode']; ?>&act=remove"><i class="fa fa-times"></i> Delete Product</a> 
                                <!--<a href="#"><i class="fa fa-times"></i> Delete Product</a>-->
                                <spn class="pull-right lead"><strong>Total <?php echo $data['price']; $to+=$data['price'];?> S$</strong></span>
                            </div>
                        </div>
                        <?php   } ?>

                        <!-- Transfer End -->

						
						
						
						
						<form name="form" method="POST" action="">
                        <div class="panel panel-default">
                            <div class="panel-body">
                            
								<?php
								if(empty($_SESSION['my_cart']))
				  {
					  ?><h4 class="project-name"><script>window.location='cart-empty.php';</script></h4>
					   <!--<h4 class="project-name">Your Cart is Empty....</h4>-->
					  <?php
					  
				  }
		if(!empty($_SESSION['my_cart']))
				  {
		?>    <h4 class="project-name">Passenger Details</h4>
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="radio-inline">
                                                <input type="radio" name="test" checked="checked"  value="b" > Enter the lead passenger data only</label>
                                           <!-- <label class="radio-inline">
                                                <input type="radio" name="test" value="a"> Enter the data for all passengers</label>-->
                                        </div>
                                    </div>
                                    <div id="Cars2" class="desc">
                                    <h5><strong>Lead passenger</strong>
 </h5>
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label>Name</label>
                                            <input type="text" name="name"  placeholder="Please Enter Name " value="<?php echo $_POST['name']; ?>" class="form-control input-sm" required>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Email</label>
                                            <input type="email" name="email" placeholder="Please Enter Email " value="<?php echo $_POST['email']; ?>" class="form-control input-sm" required>
                                        </div>
                                    </div>
</div>
 <!--   <div id="show-me" style="display: none;">
                                    <h5><strong>Other passenger</strong>
 </h5>
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label>Name</label>
                                            <input type="text" name="" class="form-control input-sm"  >
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Surname</label>
                                            <input type="text" name="" class="form-control input-sm"  >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="checkbox-inline"><input type="checkbox" name="" > Copy all details to all services</label>
                                        </div>
                                    </div>
<h4 class="project-name">Shared - Shuttle Standard Minivan <small>Return, 2 Adults</small></h4>

 <h5><strong>Lead passenger</strong> </h5>
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label>Name</label>
                                            <input type="text" name="" class="form-control input-sm">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Surname</label>
                                            <input type="text" name="" class="form-control input-sm">
                                        </div>
                                    </div>
<h5><strong>Other passenger</strong>
 </h5>
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control input-sm">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Email</label>
                                            <input type="email" name="email" value="<?php echo $_POST['email']; ?>" class="form-control input-sm">
                                        </div>
                                    </div>
                                </div>-->
                                    <h4 class="project-name">Contact Details</h4>
                                    <div class="form-group">
                                        <div class="col-sm-4 form-inline">
                                            <label>Country Code. <small>(Compulsory)</small></label>
                                            <br>
                                            <select class="form-control input-sm" name="code" required>
											<?php  $sql=mysql_query("select * from mobile_code order by country");  
while($row=mysql_fetch_array($sql))
{
											?>
                                                <option value="<?php  echo $row['prefix_code'];?> " <?php echo ($row['id']==149)?'selected="selected"' : '' ?>><?php  echo $row['country'].'('.$row['prefix_code'].')';?></option>
<?php  } ?>
                                            </select>
                                          
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Mobile <small></small></label>
                                              <input type="text" name="mobile" placeholder="Enter Mobile No" value="<?php echo $_POST['mobile']; ?>" class="form-control input-sm" required>
                                        </div>
                                    </div>
                                    <p>If you would like to receive more information, please provide your contact details.
                                    </p>
                                   
                                </div>
								
				  <?php  } ?>
                            </div>
                        </div>
                        <!-- Boking Confirmation -->
						<?php
		if(!empty($_SESSION['my_cart']))
				  {
		?>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h4 class="project-name">Booking Confirmation</h4>
                                <div class="table-responsive">
                                    <table class="table table-condensed">
                                        <tbody>
                                            <tr>
                                                <td class="services">Services</td>
                                                <td align="right">Net Price</td>
                                            </tr>
                                            <tr>
                                                <td class="services ">Hotel Total Price</td>
                                                <td align="right">MYR <?php echo $to; ?></td>
                                            </tr>
											  <tr>
                                                <td class="services ">Transaction Fees</td>
                                                <td align="right">MYR <?php echo $tf=ceil(($to*2.5)/100); ?></td>
                                            </tr>
                                           <!-- <tr>
                                                <td class="services ">Standard (Minivan)</td>
                                                <td align="right">53.84 S$</td>
                                            </tr>-->
                                            <tr class="total">
                                                <td class="services"><strong>Total</strong></td>
                                                <td align="right"><strong>MYR <?php echo $total=$to+$tf; ?></strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <h4 class="text-right"><strong>Total net price payable: <span class="leads">MYR <?php echo $total; ?></span></strong></h4>
                                <hr>
                                <!--<div class="payment-deadline-content">
                                    <h4 class="project-name">Payment deadline</h4>
                                    <div class="col-sm-5">
                                        <ul class="list-unstyled">
                                            <li>
                                                Credit card <span class="badge pull-right">17/10/2017 at 23:59</span></li>
                                            <li> Bank transfer</span> <span class="badge pull-right">14/10/2017 at 23:59</span></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-7 small">Please ensure you pay for this booking before the previous dates (local time of destination) or your booking will be cancelled automatically. For bank transfers, send us a payment proof.</div>
                                </div>
                            </div>-->
                            <div class="panel-footer">
                                <p class=" text-right ">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name=""> I have read and accept the <a target="_blank" href="#">general terms</a> and
                                        <a href="#">cancellation policy conditions</a>
                                    </label>
                                </p>
                                <div class="row">
                                    <div class="col-sm-4 col-sm-offset-8">
                                       
                                        <label>Payment Type</label>
                                        <div class="searchs-details">
                                            <div class="selects">
                                                <select class="form-control">
                                                    <option>Online</option>
                                                </select>
                                            </div>
                                        </div><br>
                                   
                                    </div>
                                </div>
                                <div class="action-button text-right">
                                    <a href="#" class="pull-left"><i class="fa fa-times"></i> Empty shopping cart and start again</a>
 <!--<input id="confirmButton" class="btn btn-primary btn-search " type="submit" value="Book now, Pay later">-->
                                    <input id="payButton" class="btn btn-primary btn-search " type="submit" data-qa="pay-button" name="submit" value="Continue">
                                   
                                </div>
				  <?php  } ?>
                     
                </div>
            </div>
                <!-- Boking Confirmation End -->
            </div>
        </div>
    </div>
	</form>
    </div>
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
    <script>
    $(function() {
        var dateFormat = "yy/mm/dd",
            from = $("#from-date")
            .datepicker({
                defaultDate: "+1w",
                changeMonth: false,
                minDate: 0,
                dateFormat: "yy/m/d",
                numberOfMonths: 2
            })
            .on("change", function() {
                to.datepicker("option", "minDate", getDate(this));
            }),
            to = $("#to-date").datepicker({
                defaultDate: "+1w",
                changeMonth: false,
                minDate: 0,
                dateFormat: "yy/m/d",
                numberOfMonths: 2
            })
            .on("change", function() {
                from.datepicker("option", "maxDate", getDate(this));
            });

        function getDate(element) {
            var date;
            try {
                date = $.datepicker.parseDate(dateFormat, element.value);
            } catch (error) {
                date = null;
            }

            return date;
        }
    });


    $('#date').datepicker({
        inline: true,
        firstDay: 1,
        showOtherMonths: true,
        // dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
        minDate: '0',
        maxDate: '30/11/2019',
        dateFormat: 'yy/mm/dd',
    });
    /*$('#date_to').datepicker({
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
        $(document).ready(function() {
      $("input[name='test']").click(function () {
    $('#show-me').css('display', ($(this).val() === 'a') ? 'block':'none');
});
  });

    </script>
</body>

</html>