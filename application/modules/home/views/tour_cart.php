<?php 

include "include/header.php"; 
if($_SESSION['id']=='' or empty($_SESSION['id']))
{
echo "<script>alert('Please Login To Continue');window.location='login.php?type=tour'</script>";
exit();
}
if($_GET['act']=='remove')
{ 
	  $count=count($_SESSION['cart-item']);
	 
	 
  $rem = $_GET['id'];
    $ses = $_SESSION['cart-item'];

    foreach ($_SESSION['cart-item'] as $i => $item) {
       if($item['id'] == $rem){
            unset($_SESSION['cart-item'][$i]);
			
  echo "<script>alert('Tour Successfully Delete From Cart');</script>";
		
 	header("location:tour_cart.php");
        }
    }

		 
    
  
 
// echo "<script>alert('Product Successfully Remove From Cart');</script>";

}
 
 
 if(isset($_POST['submit']))
{

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

$code='OCES00'.$maxid;

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


			
 foreach($_SESSION['cart-item'] as $data) 
		{
			$total=$total+$data['price'];
			
$result_insert=mysql_query("insert into apmg_order_detail_tour(order_id,code,cusid,service_type,ide,service_date,vehicle_name,type,service_price,adult,child,markup,total_price,created_date) values('$last_id','$code','$customerid','3','$data[id]','$data[cdate]','$data[sn]','$data[ttype]','$data[price]','$data[adult]','$data[child]','$data[markup]','$total','$date1')");
		}	
		
		
		//send Mail start
$message="<table width='500' border='0' align='center' style='font-family:Arial, sans-serif; background:#fff; font-size:14px; color:#333; line-height:24px; padding:0; border:1px solid #ccc;'>
  <tbody>
    <tr>
      <td colspan='2' align='left'><h2>BOOKING CONFIRMATION</h2></td>
    </tr>
    <tr>
      <td colspan='2' align='left' style='padding:5px;'>Thanks for booking with Hotelbeds. Below you will find your booking details:
        <ol>
        </ol></td>
    </tr>
	  
	 <tr>
<td width='250px' style='background:#FAFAFA;'><b>Booking Reference::</b></td><td style='padding-left:10px;'>$code</td>
</tr>
<tr>
<td width='250px' style='background:#FAFAFA;'><b>Name:</b></td><td style='padding-left:10px;'>$_POST[name] $data[price] $total</td>
</tr>

<tr>
<td width='250px' style='background:#FAFAFA;'><b>Service Description:</b></td><td style='padding-left:10px;'>Tour</td>
</tr>

<tr>
<td style='background:#FAFAFA;'><b> Booking Dates:</b></td><td style='padding-left:10px;'>$date1</td>
</tr>

 <tr>
      <td colspan='2' align='left'><h2>CANCELLATION CHARGES</h2></td>
    </tr>
   
    <tr>
      <td  colspan='2' align='left'>Shared - Shuttle - Premium, Minivan (Kuala Lumpur, Int. Airport - Istana) from 27/Nov/2017 23:59h.  the cancellation charges are 63.72 S$</td>
    
    </tr>
	<tr>
      <td  colspan='2' align='left'>
<strong>Date and time is calculated based on local time of destination.</strong><br>
Please do not reply to this email. This is an automated message. If you want to check or modify your booking, please visit our website. If you have any questions, please do not hesitate to contact us.</td>
    
    </tr>
   
  </tbody>
</table>";

     $to=$_POST['email'];
	 $to1='apmg2018@apolloholidays.net';
	 $dt=date("Y-m-d");
     $headers = "From:apmg2018@apolloholidays.net\r\n";
	//$headers.= "Bcc:contact@globallawdirectories.com\r\n";
	 $headers.= "Content-Type: text/html; charset=iso-8859-1;\r\n\r\n";
    $subject="Booking confirmation APMG2018 : $code";
     mail($to,$subject,$message,$headers) or die("error");
	   mail($to1,$subject,$message,$headers) or die("error");
					
		
		unset($_SESSION['cart-item']); 

echo "<script>window.location='checkout_tour.php?id=$last_id';</script>";
	
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Apollo Asia Travel Group</title>
    <!-- Compiled and minified CSS -->
    <!--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css"> -->
    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">
    <link href="css/datepicker.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div id="nav" class="navbar navbar-default  yamm">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" data-toggle="collapse" data-target="#navbar-collapse-2" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                        <a href="index.html" class="navbar-brand"> <img src="images/logon.jpg" class="images-responsive logo" alt="logo"></a>
                    </div>
                    <div id="navbar-collapse-2" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <!-- Media Example -->
                            <li><a href="tranfser.html" class="active"><i class="fa fa-plane"></i> Transfer</a></li>
                            <li><a href="hotel.html"><i class="fa fa-bed"></i> Hotel</a></li>
                            <li><a href="tours.html"><i class="fa fa-bus"></i> Tours</a></li>
                            <li><a href="insurance.html"><i class="fa fa-shield"></i> Insurance</a></li>
                        </ul>
                        <!-- Forms -->
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="login.html"> <i class="fa fa-lock"></i> SignIn </a>
                            </li>
                            <li><a href="register.html"><i class="fa fa-user"></i> Register</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row bg-grey gap">
            <div class="container gap1">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
					
					<?php
					$to='';
		foreach($_SESSION['cart-item'] as $data) 
		{
			 $start = strtotime($data['cin']);
$end = strtotime($data['cout']);

  $night = ceil(abs($end - $start) / 86400);
  
  $pid=$data['id']; 
				  
				  $sql=mysql_query("select a.* from apmg_mala_tourmaster a,apmg_mala_tourmaster_name b where a.cityid='6' and b.service_type='1' and a.tid='$pid'");
				  $row1=mysql_fetch_array($sql);
				  
				   $sql5=mysql_query("select * from apmg_mala_tourmaster_name where serviceid='$row1[tid]'"); 
                   $fetch5=mysql_fetch_array($sql5);
		?>
					
					
                        <div class="panel panel-default">
                            <div class="panel-heading clearfix">
                                <ul class="list-inline">
                                    <li class="col-sm-2"><img src="http://aatg.work/sms/myo/upload/<?php echo $fetch5['pic'];?>" class="img-responsive cart-thumbnail"></li>
                                    <li class="col-sm-7">
                                        <h4>Offer Special: <?=$data['tt'];?>&nbsp;&nbsp;<?=$data['sn'];?></h4>
                                        <ul class="list-unstyled">
										<li><strong><?php echo $data['ttype']; ?></strong></li>
                                            <li><strong><?php echo $data['adult']; ?> Adults</strong></li>
											   <li><strong><?php echo $data['child']; ?> Childs</strong></li>
                                            
                                        
Route</strong>: Singapore, Changi International Airport <i class="fa fa-arrow-right"></i> Cameron</li>
                                        </ul>
                                    </li>
                                    <li class="col-sm-3 text-right">
                                        <h4 class="text-success">
    <i class="fa fa-car"></i> Tour</h4>
                                    </li>
                            </div>
                            <div class="panel-body">
                                <h4 class="project-name">   
                                        <span>Service Date</span>
                                        <span class="QA_transfer_dateFrom"><?=$data['cdate'];?></span>
                                        , Arrival time <span class="QA_transfer_timeFrom">16:10</span>
                                                    , Flight number <span class="QA_transfer_flightNumber">BA026</span>
                                                <span class="pull-right small"><strong><?php ?></strong></span>
                                             </h4>
                                <p class="alert alert-warning"><i class="fa fa-warning"></i> If the information is not accurate, the supplier is not responsible for the correct service provision.
                                </p>
                                <h4>Cancellation charges — Outbound <span   data-toggle="tooltip" title="Date and time is calculated based on local time of destination." data-placement="top"><i class="fa fa-info"></i></span></h4>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled">
                                        <li>Until 23:59 PM on 25/10/2017
                                            <span class="pull-right text-success"><i class="fa fa-check-circle"></i>Free</span>
                                        </li>
                                        <li>After 23:59 PM on 25/10/2017 <span class="pull-right badge">53.84 S$</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-footer clearfix">
                                <a href="tour_cart.php?id=<?php echo $data['id']; ?>&act=remove"><i class="fa fa-times"></i> Delete Product</a>
                                <spn class="pull-right lead"><strong>Total <?php echo $data['price'];
								$to=$to+$data['price'];
								?> MYR</strong></span>
                            </div>
                        </div>
				<?php   } ?>

				        <form name="form" method="POST" action="">
                        <div class="panel panel-default">
                            <div class="panel-body">
							
							
								<?php
								if(empty($_SESSION['cart-item']))
				  {
					  ?>
					   <h4 class="project-name">Your Cart is Empty....</h4>
							<?php 
				  }
							if(!empty($_SESSION['cart-item']))
				            {
		                    ?> 
                                <h4 class="project-name">Passenger Details</h4>
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="radio-inline">
                                                <input type="radio" name="test" checked="checked"  value="b" > Enter the lead passenger data only</label>
                                            <!--<label class="radio-inline">
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
    <!--<div id="show-me" style="display: none;">
                                    <h5><strong>Other passenger</strong>
 </h5>
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
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="checkbox-inline"><input type="checkbox" name=""> Copy all details to all services</label>
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
                                            <input type="text" name="email" class="form-control input-sm">
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
                                            <label>Mobile <small></label>
                                            <input type="text" name="mobile" class="form-control input-sm">
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
		if(!empty($_SESSION['cart-item']))
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
                                                <td class="services ">Tour Total Prices</td>
                                                <td align="right">MYR <?php echo $to; ?></td>
                                            </tr>
											<tr>
                                                <td class="services ">Transaction Fees</td>
                                                <td align="right">MYR <?php echo $tf=ceil(($to*2.5)/100); ?></td>
                                            </tr>
                                            <tr class="total">
                                                <td class="services"><strong>Total</strong></td>
                                                <td align="right"><strong>MYR <?php echo $total=$to+$tf; ?></strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <h4 class="text-right"><strong>Total net price to pay to Apollo Holidays: <span class="leads">MYR <?php echo  $total; 
				  
				   ?></span></strong></h4>
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
                                    <input id="payButton" class="btn btn-primary btn-search " type="submit" data-qa="pay-button"  name="submit" value="Continue">
                                   
                                </div>
                          
                    <?php  } ?> 
                </div>
            </div>
                <!-- Boking Confirmation End -->
            </div>
        </div>
    </div>
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
    <div class="row footer">
        <div class="container text-center">
            <ul class="list-inline">
                <li>Privacy Policy </li>
                <li> Terms & Conditions</li>
                <li> Contact Us</li>
            </ul>
            <h4>-: We are Social :-</h4>
            <ul class="list-inline">
                <li>
                    <a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Facebook"><img src="images/facebook.png"></a>
                </li>
                <li>
                    <a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Twitter"><img src="images/twitter.png"></a>
                </li>
                <li>
                    <a href="#" data-toggle="tooltip" data-placement="top" data-original-title="RSS"><img src="images/rss-feed.png"></a>
                </li>
                <li>
                    <a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Google Plus"><img src="images/google.png"></a>
                </li>
                <li>
                    <a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Pinterest"><img src="images/p-interest.png"></a>
                </li>
            </ul>
            <br>
            <p> Copyrright 2017, All Rights Reserved </p>
        </div>
    </div>
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