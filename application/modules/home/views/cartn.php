   <?php 
include "include/header.php";
//include "include/session_out.php";

$current=date('h:i:s');  	 
	$start=$_SESSION['stt'];  
    $checkTime = strtotime($current); 
    $endTime = strtotime("+30 minutes", strtotime($start));
    $et=date('h:i:s', $endTime); 
if($current>$_SESSION['stt'] or $current< $et ){ $loginTime =$endTime;  $diff = $checkTime - $loginTime; }

   // ele close 
 $second=abs($diff);
 
 
 
 
//session_start();
 $_SESSION['id'];
if($_SESSION['id']=='' or empty($_SESSION['id']))
{
echo "<script>alert('Please Login To Continue');window.location='login.php';</script>";
exit();
}
 
 
if($_GET['act']=='remove' and isset($_GET['id']))
{ 
    $count=count($_SESSION['cart-hotel']);
   
   
  $rem = $_GET['id'];
    $ses = $_SESSION['cart-hotel'];

    foreach ($_SESSION['cart-hotel'] as $i => $item) {
       if($i == $rem){
            unset($_SESSION['cart-hotel'][$i]);
      
  echo "<script>alert('Rooming Successfully Delete From Cart');</script>";
    
  header("location:cart.php");
        }
    }
  // echo "<script>alert('Product Successfully Remove From Cart');</script>";

} 
 if($_GET['act']=='remove' and isset($_GET['ide']))
{  
  $rem = $_GET['ide'];
    $ses = $_SESSION['my_cart'];
  foreach ($_SESSION['my_cart'] as $i => $item) 
  {
    if($i == $rem){
            unset($_SESSION['my_cart'][$i]);
      echo "<script>alert('Transfer Successfully Delete From Cart');</script>";
      header("location:cart.php");
      }
      
  }
}
if($_GET['act']=='remove' and isset($_GET['id2']))
{   $count=count($_SESSION['cart-item']); 
  $rem = $_GET['id2'];
    $ses = $_SESSION['cart-item'];

    foreach ($_SESSION['cart-item'] as $i => $item) {
       if($i == $rem)
     {
        unset($_SESSION['cart-item'][$i]);
    echo "<script>alert('Tour Successfully Delete From Cart');</script>";
    header("location:tour_cart.php");
       }
    }
}

  if(isset($_REQUEST['type']) and $_REQUEST['type']=='empty')
{
unset($_SESSION['cart-item']); 
unset($_SESSION['cart-hotel']);
unset($_SESSION['my_cart']);  
unset($_SESSION['stt']); 
}

if(isset($_POST['submit']))
{
 $total_p=$_REQUEST['total_p'];

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

$count_hotel=count($_SESSION['cart-hotel']);

foreach($_SESSION['cart-hotel'] as $data) 
        {
          $sql1=mysql_query("select h.id,h.hotelname,h.hotel_pic,t.child_breakfast from mala_hotelmaster h ,apmg_hotel_tariff_withoutshtl t where h.id=t.hotel_id  and t.id='$data[pid]'");  
                  $row1=mysql_fetch_array($sql);
          
            $start = strtotime($data['cin']);
$end = strtotime($data['cout']);

  $night = ceil(abs($end - $start) / 86400);

            $total=($data['price']+$data['markup'])*$data['room']*$night+($row1['child_breakfast']*$data['child']); 
            
$result_insert=mysql_query("insert into apmg_order_detail_hotel(order_id,code,cusid,service_type,ide,pid,cin,cout,room_type,room_cat,noof_room,room_price,adult,child,markup,total_price,created_date) values('$last_id','$code','$customerid','1','$data[id]','$data[pid]','$data[cin]','$data[cout]','$data[room_type]','$data[room_cat]','$data[room]','$data[price]','$data[adult]','$data[child]','$data[markup]','$total','$date1')");
            
        }
    
    foreach($_SESSION['my_cart'] as $data) 
    {
      

      $total_transfer=($data['price']+$data['markup'])*$data['pax']; 
      
$result_insert=mysql_query("insert into apmg_order_detail_transfer(order_id,code,cusid,service_type,ide,pid,service_date,noof_vehicle,vehicle_name,service_price,adult,child,markup,total_price,created_date) values('$last_id','$code','$customerid','2','','$data[id]','$date1','$data[pax]','$data[type]','$data[price]','$data[ad]','$data[ch]','$data[markup]','$total_transfer','$date1')");
      
    }
    foreach($_SESSION['cart-item'] as $data) 
    {
      $total_tour=$data['price'];
      
$result_insert=mysql_query("insert into apmg_order_detail_tour(order_id,code,cusid,service_type,ide,service_date,vehicle_name,type,service_price,adult,child,markup,total_price,created_date) values('$last_id','$code','$customerid','3','$data[id]','$data[cdate]','$data[sn]','$data[ttype]','$data[price]','$data[adult]','$data[child]','$data[markup]','$total_tour','$date1')");
    }
	$count_tour=count($_SESSION['cart-item']);
    $count_transfer=count($_SESSION['my_cart']);
    $total_price=number_format(($total+$total_transfer+$total_tour),2);
    //send Mail start
$message2="<table width='500' border='0' align='center' style='font-family:Arial, sans-serif; background:#fff; font-size:14px; color:#333; line-height:24px; padding:0; border:1px solid #ccc;'>
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
<td width='250px' style='background:#FAFAFA;'><b>Name:</b></td><td style='padding-left:10px;'>$_POST[name] </td>
</tr>

<tr>
<td width='250px' style='background:#FAFAFA;'><b>Service Description:</b></td><td style='padding-left:10px;'>2 Hotel</td>
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



$message="<body style='background: #e9eff5;'>
    <table role='presentation' cellspacing='0' cellpadding='0' border='0' align='center' width='100%' style='max-width: 600px; line-height: 1.3; font-family: sans-serif; background: #fff; padding: 0; font-size: 13px; color: #545454; letter-spacing: 0.05em;'>
        <tr>
            <td style='padding: 0; text-align: center'>
                <img src='http://apmg.apolloasiab2b.com/images/email-header.jpg' width='100%' alt='alt_text' border='0' style='height: auto; background: #dddddd; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;'>
            </td>
        </tr>
        <tr>
            <td style='padding: 20px;'>
                <p> Dear <strong>$name</strong>,</p>
                <p>
                    We have received your order and will be processing it shortly. The details of the order are below:
                </p>
				<p style='font-size: 15px; font-weight: 600;'>
                    Customer Id: <strong>$customerid</strong></p>
                <p style='font-size: 15px; font-weight: 600;'>
                    Web Id: <strong>$code</strong></p>
                <ul style='list-style: none; padding: 0;'>
                    <li>Product/Service : 
					<strong>  $count_hotel Hotels</strong></br>
					<strong>  $count_transfer Transfer</strong></br>
					<strong>  $count_tour Tours</strong></br></li>
                    <li>Booking Date: <strong>$date1</strong></li>
                   
                    <li>Location:<strong> Penang</strong></li>
                    <li>First Payment Amount:<strong> MYR $total_p</strong></li>
                    <li>Recurring Amount:<strong> MYR $total_p</strong></li>
                    <li>Payment Mode :<strong> Online</strong></li>
          <li>Booking Status :<strong>Pending</strong></li>
                </ul>
                <p><strong>Total Due Today: MYR $total_p</strong></p>
          
                <div style='border-bottom: 1px dashed #ccc; margin-bottom: 20px;'>&nbsp;</div>
                <p style='text-align: left;'>
                     You will receive an email from us shortly once your account has been setup. Please quote your order reference number if you wish to contact us about this order.</p>
                
            </td>
        </tr>
        
        <tr bgcolor=''>
            <td style='background: #00aeef; color: #fff; padding:10px 20px; text-align: center;'>
                 <p>Thank you.</p>
                <p style='color: #000;'><strong>
                    <a href='#' target='_blank' style='color: #000; text-decoration: none;'> APMG 2018 Tour Desk</a></p>
            </td>
        </tr>
        <tr bgcolor=''>
            <td style='background: #0099ff; color: #fff; padding:10px 20px; text-align: center;'>
                <p style='font-weight: bold; font-size: 12px; margin: 5px;'><a href='#'> visit our website</a> | <a href='http://apmg.apolloasiab2b.com/login.php'> log in to your account </a> | <a href='http://apmg2018.com'> get support </a>
                </p>
                <span style='font-size: 11px'> Copyright © Apollo Holidays Malaysia Sdn Bhd, All rights reserved.</span>
            </td>
        </tr>
    </table>
</body>";



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
unset($_SESSION['cart-hotel']);
unset($_SESSION['my_cart']);  
unset($_SESSION['stt']); 

echo "<script>window.location='checkout1.php?id=$last_id';</script>";




  
}
?>

<div class="row bg-grey gap">
<div class="container">
<!-- Hotel Start -->
<script type="text/javascript">	 
/* START TIMER */
var timeInSecs;
var ticker;

function startTimer(secs) {
timeInSecs = parseInt(secs);
ticker = setInterval("tick()", 1000); 
}

function tick( ) {
var secs = timeInSecs;
if (secs > 0) {
timeInSecs--; 
}
else {
clearInterval(ticker);
startTimer(1800);  // start again from 5 minutes
}

var mins = Math.floor(secs/60);
secs %= 60;
var pretty = ( (mins < 10) ? "0" : "" ) + mins + ":" + ( (secs < 10) ? "0" : "" ) + secs;
if(pretty=='00:00')
{
	alert('More Than 30 Minutes have elaped since You Added a service to your cart \n The service are deleted once thi time has elapsed in order to insure their availability and avoid price change ');
	 
	window.location='out.php';
}
document.getElementById("countdown").innerHTML = pretty;
}

startTimer(<?php echo $second; ?>);  // time left untill next cron update

</script>
    <style type="text/css">
    #progress3{ position: relative; margin-top: 15px; }
    .elapsed{ position: absolute;
        right: 0;
        top: 10px; font-size: 30px;
        font-weight: 700;
        color: #3F51B5;}
    .pbar .ui-progressbar-value {
        display: block !important;
        background: #d32d87 !important;
        border-color: #d32d87;
        border-radius: 0;
        margin: 0;
        padding: 0;

    }

    .pbar {
        overflow: hidden;
        height: 6px;
        margin-top: 10px;
        margin-bottom: 15px;
        background: #f5faff;
    }
    </style>
<!-- Session Out Timer  Start-->

<?php
if(!empty($_SESSION['stt']))
{
?>
  <div id="progress3">
                    <div class="row">
                        <div class="col-xs-9">
                            <i class="fa fa-clock-o fa-3x pull-left"></i>
                            <h4 class="heads">Your Shopping cart will expire in 30 minutes.<br><small>Enter your details below to complete your booking</small></h4>
                        </div>
                         
                    </div>
                    <div class="elapsed"></div>
                    <div class="pbar"></div>
                </div>
              
  
<?php
}
          $to='';
          session_start();
        //  echo $_SESSION['cart-hotel'];
           
    foreach($_SESSION['cart-hotel'] as $i=>$data) 
    {
       $start = strtotime($data['cin']);
$end = strtotime($data['cout']);

  $night = ceil(abs($end - $start) / 86400);
  
  $pid=$data['pid']; 
          
         $sql1=mysql_query("select h.id,h.hotelname,h.hotel_pic,t.child_breakfast from mala_hotelmaster h ,apmg_hotel_tariff_withoutshtl t where h.id=t.hotel_id  and t.id='$pid'");  
                  $row1=mysql_fetch_array($sql1);
    ?>

<!-- Session Out Timer  End -->
<div class="panel panel-default">
<div class="panel-heading clearfix">



<ul class="list-inline">
<li class="col-sm-2"><img src="http://supplier.apolloasiab2b.com/transport/upload/<?php echo $row1['hotel_pic'];  ?>" class="img-responsive cart-thumbnail"></li>
<li class="col-sm-7">
  <h4>
    <?php 
          echo $row1['hotelname'];
          
          ?>
  </h4>
 <ul class="list-inline order-details">
    <li><strong><?php echo $data['adult']; ?> Adults</strong></li>
    <li><strong><?php echo $data['child']; ?> Childs</strong></li>
  </ul>
</li>
<li class="col-sm-3 text-right">
  <h4 class="text-info"> <i class="fa fa-building"></i> Hotel</h4>
</li>
</ul>
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
          echo $data['room'].' * '.$rt.' '.$rc; 

$total=($data['price']+$data['markup'])*$data['room']*$night; 

          ?>
  </h4>
  <h4>Cancellation charges — Hotels <span   data-toggle="tooltip" title="Date and time is calculated based on local time of destination." data-placement="top"><i class="fa fa-info"></i></span></h4>
  <div class="col-sm-12">
    <ul class="list-unstyled">
      <li>Until 23:59 PM on 31/03/2018 
        <!--<span class="pull-right text-success"><i class="fa fa-check-circle"></i>Free</span>--> 
        <span class="pull-center badge">MYR <?php echo number_format((($total*10)/100),2);  ?></span> </li>
      <li>After 23:59 PM on 31/03/2018 <span class="pull-center badge">MYR <?php echo number_format((($total*100)/100),2);  ?></span></li>
    </ul>
  </div>
  <h4>Remarks </h4>
  <div class="col-sm-12 facilities">
    <ul class="list-unstyled comment">
      <li class=""> <span class="fa fa-circle"></span> The following fees and deposits are charged by the property at time of service, check-in, or check-out. You'll be asked to pay the following charges at the property: </li>
      <li class=""> <span class="fa fa-circle"></span>A tax is imposed by the city: MYR 3 per accommodation, per night. </li>
      <li class=""> <span class="fa fa-circle"></span> A tax of MYR 10.00 per accommodation, per night is imposed by the country of Malaysia and collected at the property. <br>
        *Permanent residents and Malaysian nationals are exempt from the tax. For more details, please contact the property using the information on the reservation confirmation received after booking. </li>
      <li class=""> <span class="fa fa-circle"></span> Key Collection 15:00 - 23:00. Check-in hour 15:00 - 15:00. Children without bed get free accommodation sharing parents bed & meals payable on the spot if not included in the booking. </li>
      <li class=""> <span class="fa fa-circle"></span>We have included all charges provided to us by the property. However, charges can vary, for example, based on length of stay or the room you book. Extra-person charges may apply and vary depending on property policy. </li>
      <li class=""> <span class="fa fa-circle"></span> Government-issued photo identification and a credit card or cash deposit are required at check-in for incidental charges. . Special requests are subject to availability upon check-in and may incur additional charges. Special requests cannot be guaranteed. </li>
      <li class=""> <span class="fa fa-circle"></span> This rate does not allow any changes. You must cancel the existing booking and issue a new one. Cancellation fees may apply according to the rate conditions </li>
    </ul>
  </div>
</div>
<div class="panel-footer clearfix"> <a href="cart.php?id=<?php echo $i; ?>&act=remove"><i class="fa fa-times"></i> Delete Product</a> 
  <!-- <a href="#"><i class="fa fa-times"></i> Delete Product</a>-->
  <span class="pull-right lead">
  <strong>Total MYR <?php echo  number_format($total+($row1['child_breakfast']*$data['child']),2); 
                   $to=$to+$total+($row1['child_breakfast']*$data['child']);
           ?> </strong></span> </div>
</div>
<?php   } ?>
<!-- Hotel End --> 

<!-- Transfer Start -->

<?php  
            $to1='';
            foreach($_SESSION['my_cart'] as $i=>$data) 
            { ?>
<div class="panel panel-default">
<div class="panel-heading clearfix">
<ul class="list-inline">
<li class="col-sm-2">
  <?php if($data['type']=="CAR"){?>
  <img src="images/car1.jpg" class="img-responsive cart-thumbnail"/>
  <?PHP } else {?>
  <img src="images/van1.jpg" class="img-responsive cart-thumbnail"/>
  <?php }?>
</li>
<li class="col-sm-7"> 
  <!--<h4>Offer Special: Full Day Lembongan Reef Cruise</h4>-->
 <h4>
        <?php 
                      if($data['pf']==1){ echo "Airport";}
                      if($data['pf']==2){ echo "Coach station";}
                      if($data['pf']==3){ echo "Railway Station";}
                      if($data['pf']==4){ echo "Hotel";}
                      if($data['pf']==5){ echo "Venue";}
                      if($data['pf']==6){ echo "Cruise";}
                      if($data['pf']==7){ echo "Ferry";}
            if($data['pf']==8){ echo "Kuala Lumpur";}
            if($data['pf']==9){ echo "IPOH";}             ?>
        <?php 
                      echo "(";
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
                      if($data['pf']=='4'){ $sql12=mysql_query("SELECT  * FROM apmg_location where id='$data[pp]'");
                                  $name2 = mysql_fetch_array($sql12);
                                   echo $name2['location_name'];
                                }
                      if($data['pf']=='5'){
                    $s=mysql_query("SELECT  id,vname FROM venue_master where id='$data[pp]'");
                    $na = mysql_fetch_array($s);
                    echo $na['vname'];
                    
                  } echo ")";?>
        <i class="fa fa-arrow-right"></i>
        <?php 
                    
                    if($data['dt']==1){ echo "Airport";}
                    if($data['dt']==2){ echo "Coach station";}
                    if($data['dt']==3){ echo "Railway Station";}
                    if($data['dt']==4){ echo "Hotel";}
                    if($data['dt']==5){ echo "Venue";}
                    if($data['dt']==6){ echo "Cruise";}
                    if($data['dt']==7){ echo "Ferry";}
          if($data['dt']==8){ echo "Kuala Lumpur";}
          if($data['dt']==9){ echo "IPOH";}         ?>
            <?php 
                    echo "(";
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
                    if($data['dt']=='4'){ $sql12=mysql_query("SELECT  * FROM apmg_location where id='$data[dp]'");
                                $name2 = mysql_fetch_array($sql12);
                                 echo $name2['location_name'];
                              }
                    if($data['dt']=='5'){
                    $s=mysql_query("SELECT  id,vname FROM venue_master where id='$data[dp]'");
                    $na = mysql_fetch_array($s);
                    echo $na['vname'];echo ")";
                    } echo ")";?>
     </h4>  
     <ul class="list-inline order-details">
    
   
    <li><strong> Adults : </strong><?php echo $data['ad']; ?> </li>
    <li><strong> Childs : </strong><?php echo $data['ch']; $pax2=ceil(($data['ad']+$data['ch'])/9);?> </li>
    <li><strong>Flight number :</strong> <span class="QA_transfer_flightNumber"><?php echo $data['arrival_name']; ?></span></li>
    <li><strong>Flight Time  :</strong> <span class="QA_transfer_timeFrom"><?php echo $data['fat']; ?>:<?php echo $data['fam']; ?></span></li>
  </ul>
    <ul class="list-inline order-details">
            <li>Service Date: <strong> <?php echo "  ".$data['cd1'];  ?></strong> </li>
            <li> Vehicle Name: <strong> <?php echo "  ".$pax2." - ".$data['type'];  ?></strong></li>
            <!--<li class="col-xs-6 col-xs-3"> Price:<strong> MYR <?php echo number_format($total,2);  ?></strong> </li>-->
          </ul>
</li>
<li class="col-sm-3 text-right">
  <h4 class="text-primary"> <i class="fa fa-car"></i> Transfer</h4>
  <a href="#">Pay to Apollo Asia</a> </li>
  </ul>

</div>
<div class="panel-body">
  <h4 class="project-name"> 
    <!--<span>Outbound</span>
                                        <span class="QA_transfer_dateFrom"><?php echo $data['cd1']; ?></span>--> 
    
    <span class="pull-right small"><strong><?php echo"MYR ".number_format(($data['price']+$data['markup']),2); ?></strong></span> </h4>
  <!-- <p class="alert alert-warning"><i class="fa fa-warning"></i> If the information is not accurate, the supplier is not responsible for the correct service provision.
                                </p>-->
  <h4>Cancellation charges — Outbound <span   data-toggle="tooltip" title="Date and time is calculated based on local time of destination." data-placement="top"><i class="fa fa-info"></i></span></h4>
  <div class="col-sm-6">
    <ul class="list-unstyled">
      <li>Until 23:59 PM on 30/06/2018  <span class="pull-center badge">MYR <?php echo number_format(((($data['price']+$data['markup'])*10)/100),2);  ?></span>
    <!--<span class="pull-right badge">10 %</span> 
        <span class="pull-right text-success"><i class="fa fa-check-circle"></i>Free</span>--> 
      </li>
      <li>After 23:59 PM on 30/06/2018 <span class="pull-center badge">MYR <?php echo number_format(((($data['price']+$data['markup'])*100)/100),2);  ?></span>
    
    <!--<span class="pull-right badge">100 %</span> <span class="pull-right badge">53.84 S$</span>--></li>
    </ul>
  </div>
</div>
<div class="panel-footer clearfix"> <a href="cart.php?ide=<?php echo $i;//$data['pcode']; ?>&act=remove"><i class="fa fa-times"></i> Delete Product</a> 
  <!--<a href="#"><i class="fa fa-times"></i> Delete Product</a>--> 
  <span class="pull-right lead"><strong>Total MYR <?php echo number_format(($data['price']+$data['markup'])*$data['pax'],2); $to1+=($data['price']+$data['markup'])*$data['pax'];?></strong></span> </div>
</div>
<?php   } ?>

<!-- Transfer End --> 
<!---Tour Start-->
<?php
          $to2='';
    foreach($_SESSION['cart-item'] as $i=>$data) 
    {
       $start = strtotime($data['cin']);
$end = strtotime($data['cout']);

  $night = ceil(abs($end - $start) / 86400);
  
  $pid=$data['id']; 
          
		  /*if($data['tt']=='A')
		{
		$sql=mysql_query("select a.* from apmg_mala_tourmaster a,apmg_mala_tourmaster_name b where a.cityid='6' and b.service_type='1' and a.tid='$pid' ");												
		}
		else		
		{									
		$sql=mysql_query("select a.* from apmg_mala_tourmaster a,apmg_mala_tourmaster_name b where a.cityid='6' and b.service_type='1' and a.tid='$pid' and b.type='$data[tt]'");		
		}*/$sql=mysql_query("select a.* from apmg_mala_tourmaster a,apmg_mala_tourmaster_name b where a.cityid='6' and b.service_type='1' and a.tid='$pid'");
		 
		 //$sql=mysql_query("select a.* from apmg_mala_tourmaster a,apmg_mala_tourmaster_name b where a.cityid='6' and b.service_type='1' and a.tid=b.serviceid and b.type='$data[tt]'");
          $row1=mysql_fetch_array($sql);
          
           $sql5=mysql_query("select * from apmg_mala_tourmaster_name where serviceid='$row1[tid]'"); 
                   $fetch5=mysql_fetch_array($sql5);
    ?>
<div class="panel panel-default">
  <div class="panel-heading clearfix">
    <div class="col-sm-2"><img src="http://aatg.work/sms/myo/upload/<?php echo $fetch5['pic'];?>" class="img-responsive cart-thumbnail"></div>
    <div class="col-sm-7">
      <h4><?php// echo "m-".$fetch5['pic'];?>
       
        &nbsp;&nbsp;
        <?php echo $data['sn']."(".$data['tt'].")";?>
      </h4>
       <ul class="list-inline order-details">
        <li><strong><?php echo $data['ttype']; ?></strong></li>
        <li><strong><?php echo $data['adult']; ?> Adults</strong></li>
        <li><strong><?php echo $data['child']; ?> Childs</strong></li>
        
        
      </ul>
    </div>
    <div class="col-sm-3 text-right">
      <h4 class="text-warning"> <i class="fa fa-bus"></i> Tour</h4>
    </div>
  </div>
  <div class="panel-body">
    <h4 class="project-name"> <span>Service Date</span> <span class="QA_transfer_dateFrom">
      <?=$data['cdate'];?>
      </span> <span class="pull-right small"><strong>
      <?php ?>
      </strong></span> </h4>
    <!--<p class="alert alert-warning"><i class="fa fa-warning"></i> If the information is not accurate, the supplier is not responsible for the correct service provision. </p>-->
    <h4>Cancellation charges — Outbound <span   data-toggle="tooltip" title="Date and time is calculated based on local time of destination." data-placement="top"><i class="fa fa-info"></i></span></h4>
    <div class="col-sm-6">
      <ul class="list-unstyled">
        <li>Until 23:59 PM on 25/10/2017 <span class="pull-center badge">MYR <?php echo number_format(((($data['price'])*10)/100),2);  ?></span>
    
    <!--<span class="pull-right text-success"><i class="fa fa-check-circle"></i>Free</span>--> </li>
        <li>After 23:59 PM on 25/10/2017 <span class="pull-center badge">MYR <?php echo number_format(((($data['price'])*100)/100),2);  ?></span><li>
      </ul>
    </div>
  </div>
  <div class="panel-footer clearfix"> <a href="cart.php?id2=<?php echo $i; ?>&act=remove"><i class="fa fa-times"></i> Delete Product</a>
    <spn class="pull-right lead">
    <strong>Total <?php echo $data['price'];
                $to2=$to2+$data['price'];
                ?> MYR</strong></span> </div>
</div>
<?php   } ?>
<!--End Tour-->

<form name="form" method="POST" action="">
  <div class="panel panel-default">
    <div class="panel-body">
      <?php
                if(empty($_SESSION['cart-hotel']) and empty($_SESSION['my_cart']) and empty($_SESSION['cart-item']))
          {
            ?>
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
          <div  class="row text-center">
            <header class="title_error">
              <h1>The shopping cart is empty</h1>
              <p>If you would like to make a new booking, add one or more products</p>
            </header>
            <div class="row" id="empty-cart">
              <div class="col-sm-4 text-center"> <a class="column-icon" href="index.php"> <i class="fa fa-bed fa-4x"> </i>
                <h3 class="bed">Accommodation</h3>
                <p class="link">Access</p>
                </a> </div>
              <div class="col-sm-4"> <a class="column-icon" href="transfer-search.php">
                <p class="fa fa-bus fa-4x"> </p>
                <h3 class="bus">Transfers</h3>
                <p class="link">Access</p>
                </a> </div>
              <!-- <div class="col-sm-4">
                <a class="column-icon" href="/extras">
                    <p class="fa fa-ticket fa-4x"> </p>
                    <h3 class="ticket">Tickets</h3>
                    <p class="link">Access</p>
                </a>
            </div> -->
              <div class="col-sm-4"> <a class="column-icon" href="tours.php">
                <p class="fa fa-car fa-4x"> </p>
                <h3 class="car">Tours</h3>
                <p class="link">Access</p>
                </a> </div>
            </div>
            </article>
          </div>
        </div>
        <?php
            
          }
    if(!empty($_SESSION['cart-hotel']) or !empty($_SESSION['my_cart']) or !empty($_SESSION['cart-item']))
          {
    ?>
        <h4 class="project-name">Passenger Details</h4>
        <div class="form-horizontal">
          <div class="form-group">
            <div class="col-sm-12">
              <label class="radio-inline">
                <input type="radio" name="test" checked="checked"  value="b" >
                Enter the lead passenger data only</label>
              <!-- <label class="radio-inline">
                                                <input type="radio" name="test" value="a"> Enter the data for all passengers</label>--> 
            </div>
          </div>
          <div id="Cars2" class="desc">
            <h5><strong>Lead passenger</strong> </h5>
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
                <option value="<?php  echo $row['prefix_code'];?> " <?php echo ($row['id']==149)?'selected="selected"' : '' ?>>
                <?php  echo $row['country'].'('.$row['prefix_code'].')';?>
                </option>
                <?php  } ?>
              </select>
            </div>
            <div class="col-sm-4">
              <label>Mobile <small></small></label>
              <input type="text" name="mobile" placeholder="Enter Mobile No" value="<?php echo $_POST['mobile']; ?>" class="form-control input-sm" required>
            </div>
          </div>
          <p>If you would like to receive more information, please provide your contact details. </p>
        </div>
        <?php  } ?>
      </div>
    </div>
    <!-- Boking Confirmation -->
    <?php
    if(!empty($_SESSION['cart-hotel']) or !empty($_SESSION['my_cart']) or !empty($_SESSION['cart-item']))
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
                <td align="right">MYR <?php echo number_format(($to+$to1+$to2),2); ?></td>
              </tr>
              <tr>
                <td class="services ">Transaction Fees</td>
                <td align="right">MYR
                  <?php $tf=ceil((($to+$to1+$to2)*2.5)/100); ECHO number_format($tf,2) ?></td>
              </tr>
              <!-- <tr>
                                                <td class="services ">Standard (Minivan)</td>
                                                <td align="right">53.84 S$</td>
                                            </tr>-->
              <tr class="total">
                <td class="services"><strong>Total</strong></td>
                <td align="right"><strong>MYR <?php echo $total=number_format(($to+$to1+$to2+$tf),2); ?></strong></td>
              </tr>
            </tbody>
          </table>
        </div>
		<input type="hidden" name="total_p" value="<?=$total;?>"/>
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
                                </div>-->
                            </div>
        <div class="panel-footer">
          <p class=" text-right ">
            <label class="checkbox-inline">
              <input type="checkbox" name=""  required>
              I have read and accept the <a target="_blank" href="#" data-toggle="modal" data-target="#general-terms">general terms</a> and <a href="#" data-toggle="modal" data-target="#cencellation">cancellation policy conditions</a> </label>
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
              </div>
              <br>
            </div>
          </div>
          <div class="action-button text-right"> <a href="cart.php?type=empty" class="pull-left"><i class="fa fa-times"></i> Empty shopping cart and start again</a> 
            <!--<input id="confirmButton" class="btn btn-primary btn-search " type="submit" value="Book now, Pay later">-->
            <input id="payButton" class="btn btn-primary btn-search " type="submit" data-qa="pay-button" name="submit" value="Continue">
          </div>
          <?php  } ?>
        </div>
      </div>
      <!-- Boking Confirmation End --> 
    </div>

</form>
 
 

<!-- Modal -->
<div id="cencellation" class="modal fade" role="dialog">
  <div class="modal-dialog"> 
    
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Cards & Refunds</h4>
      </div>
      <div class="modal-body" >
        <article class="text-justify" style="max-height: 500px; overflow: auto;">
          <h4 class="heading"> TERMS & CONDITIONS OF USING PAYMENT GATEWAY.</h4>
          <ul>
            <li>If you are using the Payment gateway to pay online using Debit/Credit Cards or Net banking. </li>
            <li>You are doing so with the consultation/approval of the card owner (if case if you are not the card holder yourself).</li>
            <li> If the payment is not processed because of any reason you are supposed to deposit cash in our Account within next 24 hours else the booking will be cancelled.</li>
            <li> If transaction is found suspicious by our risk management team and to protect your payment from potential fraud, we are forced to identify the credit card holder before we proceed with the payment. You may be asked to submit identification proof along with front copy of your credit card by email to complete your transaction. Failing which your transaction will be cancelled.</li>
            <li> Please get in touch with our nearest support office to get help in this regard or email us.</li>
            <li> Transaction processing charge will be borne by the user for using the payment Gateway.</li>
            <li> If the transaction has been cancelled by the user, processing charges still may apply to the Agent/card holder.</li>
            <li> Payment Gateway is an additional Payment option available for the user and is not the only option for making Payments.You can contact your nearest support office to make your reservation by paying cash or transferring funds via wire transfers.</li>
          </ul>
          <h4 class="heading"> CREDIT CARD INFORMATION</h4>
          <p> apolloasiab2b.comdoes not store your full credit card information on our servers. We do,however, store only the last 4 digits of your card number so that we can remind you later of the card you used during the reservation process. </p>
          <h4 class="heading"> CANCELLATION AND REFUND POLICY</h4>
          <ul>
            <li> Each hotel/service provider has its own deposits and cancellation policy, we apply exactly the same only after we receive the same from the Hotel/service provider.</li>
            <li>If you have any questions or issues with reservation cancellation or refund, please do not hesitate to contact us.</li>
            <li> Refund Process :- The reservations which are applicable for refund as per the cancellation policy specified in each booking will be entitled for refund (if applicable) and will be refunded within 15 working days from the date of cancellation request after the deduction of payment gateway processing charges.</li>
          </ul>
        </article>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="general-terms" class="modal fade" role="dialog">
  <div class="modal-dialog"> 
    
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">AGREEMENT BETWEEN USER AND APOLLO HOLIDAYS</h4>
      </div>
      <div class="modal-body">
        <article class="text-justify" style="max-height: 500px; overflow: auto;">
          <h4 class="heading">APPLICABILITY OF THE AGREEMENT:</h4>
          <p> This agreement ("user agreement") incorporates the terms and conditions for Apollo Holidays Malaysia Sdn Bhd (AHM) and its affiliate Companies to provide services to the person (s) ("the User") intending to purchase or inquiring for any products and/ or services of AHM by using AHM's websites or using any other customer interface channels of AHM which includes its sales persons, offices, call centers, advertisements, information campaigns etc.</p>
          <p>Both User and AHM are individually referred as 'party' to the agreement and collective referred to as 'parties'.</p>
          <h4 class="heading"> USER'S RESPONSIBILITY OF COGNIZANCE OF THIS AGREEMENT</h4>
          <p> The Users availing services from AHM shall be deemed to have read, understood and expressly accepted the terms and conditions of this agreement, which shall govern the desired transaction or provision of such services by AHM for all purposes, and shall be binding on the User. All rights and liabilities of the User and/or AHM with respect to any services to be provided by AHM shall be restricted to the scope of this agreement.</p>
          <p>AHM reserves the right, in its sole discretion, to terminate the access to any or all AHM websites or its other sales channels and the related services or any portion thereof at any time, without notice, for general maintenance or any reason what so ever.</p>
          <p> Certain products or services (e.g. hotel reservations) may be provided by third party suppliers. In addition to this Agreement, there are certain terms of service (TOS) specific to the services rendered/ products provided by AHM like the air tickets, MICE, bus, rail, holiday packages etc. Such TOS will be provided/ updated by AHM which shall be deemed to be a part of this Agreement and in the event of a conflict between such TOS and this Agreement, the terms of this Agreement shall prevail. The User shall be required to read and accept the relevant TOS for the service/ product availed by the User.</p>
          <p>Additionally, the Service Provider itself may provide terms and guidelines that govern particular features, offers or the operating rules and policies applicable to each Service (for example, flights, hotel reservations, packages, etc.). The User shall be responsible for ensuring compliance with the terms and guidelines or operating rules and policies of the Service Provider with whom the User elects to deal, including terms and conditions set forth in a Service Providers' fare rules, contract of carriage or other rules.</p>
          <p>AHM's Services are offered to the User conditioned on acceptance without modification of all the terms, conditions and notices contained in this Agreement and the TOS, as may be applicable from time to time. For the removal of doubts, it
            is clarified that availing of the Services by the User constitutes an acknowledgement and acceptance by the User of this Agreement and the TOS. If the User does not agree with any part of such terms, conditions and notices, the User must not avail AHM's Services.</p>
          <p>In the event that any of the terms, conditions, and notices contained herein conflict with the Additional Terms or other terms and guidelines contained within any other AHM document, then these terms shall control.</p>
          <h4 class="heading"> THIRD PARTY ACCOUNT INFORMATION</h4>
          <p> By using the Account Access service in AHM's websites, the User authorizes AHM and its agents to access third party sites, including that of Banks and other payment gateways, designated by them or on their behalf for retrieving requested information While registering, the User will choose a password and is responsible for maintaining the confidentiality of the password and the account.</p>
          <p> The User is fully responsible for all activities that occur while using their password or account. It is the duty of the User to notify AHM immediately in writing of any unauthorized use of their password or account or any other breach of security. AHM will not be liable for any loss that may be incurred by the User as a result of unauthorized use of his password or account, either with or without his knowledge. The User shall not use anyone else's password at any time</p>
          <h4 class="heading"> FEES PAYMENT</h4>
          <p> AHM reserves the right to charge listing fees for certain listings, as well as transaction fees based on certain completed transactions using the services. AHM further reserves the right to alter any and all fees from time to time, without notice. </p>
          <p>The User shall be completely responsible for all charges, fees, duties, taxes, and assessments arising out of the use of the services.</p>
          <p> In case, there is a short charging by AHM for listing, services or transaction fee or any other fee or service because of any technical or other reason, it reserves the right to deduct/charge/claim the balance subsequent to the transaction at its own discretion.</p>
          <p> Any increase in the price charged by Company on account of change in rate of taxes or imposition of new taxes by Government shall have to be borne by customer.</p>
          <p> In the rare possibilities of the reservation not getting confirmed for any reason whatsoever, we will process the refund and intimate you of the same. Apollo Holidaysis not under any obligation to make another booking in lieu of or to compensate/ replace the unconfirmed one. All subsequent further bookings will be treated as new transactions with no reference to the earlier unconfirmed reservation.</p>
          <p> The User shall request Apollo Holidays for any refunds against the unutilized or 'no show' air or hotel booking for any reasons within 90 days from the date of departure for the air ticket and/or the date of check in for the hotel booking. Any applicable refunds would accordingly be processed as per the defined policies of
            Airlines, hotels and Apollo Holidays as the case may be. No refund would be payable for any requests made after the expiry of 90 days as above and all unclaimed amounts for such unutilized or 'no show' air or hotel booking shall be deemed to have been forfeited.</p>
          <p> AHM reserves the right to charge listing fees for certain listings, as well as transaction fees based on certain completed transactions using the services. AHM further reserves the right to alter any and all fees from time to time, without notice.</p>
          <p> The User shall be completely responsible for all charges, fees, duties, taxes, and assessments arising out of the use of the services.</p>
          <p> In case, there is a short charging by AHM for listing, services or transaction fee or any other fee or service because of any technical or other reason, it reserves the right to deduct/charge/claim the balance subsequent to the transaction at its own discretion.</p>
          <p> Any increase in the price charged by Company on account of change in rate of taxes or imposition of new taxes by Government shall have to be borne by customer.</p>
          <p> In the rare possibilities of the reservation not getting confirmed for any reason whatsoever, we will process the refund and intimate you of the same. Apollo Holidays is not under any obligation to make another booking in lieu of or to compensate/ replace the unconfirmed one. All subsequent further bookings will be treated as new transactions with no reference to the earlier unconfirmed reservation.</p>
          <p> The User shall request Apollo Holidays for any refunds against the unutilized or 'no show' air or hotel booking for any reasons within 90 days from the date of departure for the air ticket and/or the date of check in for the hotel booking. Any applicable refunds would accordingly be processed as per the defined policies of
            Airlines, hotels and Apollo Holidays as the case may be. No refund would be payable for any requests made after the expiry of 90 days as above and all unclaimed amounts for such unutilized or 'no show' air or hotel booking shall be deemed to have been forfeited.</p>
          <h4 class="heading"> CONFIDENTIALITY</h4>
          <p> Any information which is specifically mentioned by AHM as Confidential shall be maintained confidentially by the user and shall not be disclosed unless as required by law or to serve the purpose of this agreement and the obligations of both the parties therein.</p>
          <h4 class="heading">USAGE OF THE MOBILE NUMBER OF THE USER BY AHM</h4>
          <p> AHM may send booking confirmation, itinerary information, cancellation, payment confirmation, refund status, schedule change or any such other information relevant for the transaction, via SMS or by voice call on the contact number given by the User at the time of booking; AHM may also contact the User by voice call, SMS or email in case the User couldn’t or hasn’t concluded the booking, for any reason what so ever, to know the preference of the User for concluding the booking and also to help the User for the same. The User hereby unconditionally consents that such communications via SMS and/ or voice call by AHM is (a) upon the request and authorization of the User, (b) ‘transactional’ and not an ‘unsolicited commercial communication’ as per the guidelines of Telecom Malaysia and (c) in compliance with the relevant guidelines of TM or such other authority in Malaysia and abroad. The User will indemnify AHM against all types of losses and damages incurred by AHM due to any action taken by TM, Access Providers (as per TM regulations) or any other authority due to any erroneous compliant raised by the User on AHM with respect to the intimations mentioned above or due to a wrong number or email id being provided by the User for any reason whatsoever.</p>
          <h4 class="heading"> ONUS OF THE USER</h4>
          <p> AHM is responsible only for the transactions that are done by the User through AHM. AHM will not be responsible for screening, censoring or otherwise controlling transactions, including whether the transaction is legal and valid as per the laws of the land of the User.</p>
          <p> The User warrants that they will abide by all such additional procedures and guidelines, as modified from time to time, in connection with the use of the services. The User further warrants that they will comply with all applicable laws and regulations regarding use of the services with respect to the jurisdiction concerned for each transaction.</p>
          <p> The User represent and confirm that the User is of legal age to enter into a binding contract and is not a person barred from availing the Services under the laws of Malaysia or other applicable law.</p>
          <h4 class="heading">ADVERTISERS ON AHM OR LINKED WEBSITES</h4>
          <p>AHM is not responsible for any errors, omissions or representations on any of its pages or on any links or on any of the linked website pages. AHM does not endorse any advertiser on its web pages in any manner. The Users are requested to verify the accuracy of all information on their own before undertaking any reliance on such information.</p>
          <p>The linked sites are not under the control of AHM and AHM is not responsible for the contents of any linked site or any link contained in a linked site, or any changes or updates to such sites. AHM is providing these links to the Users only as a convenience and the inclusion of any link does not imply endorsement of the site by AHM.</p>
          <h4 class="heading"> Cancellation Policy</h4>
          <p> The Customer agree that the booking made are subject to the cancellation policy set out on the booking page or as communicated to the customers in writing.</p>
          <h4 class="heading"> INSURANCE </h4>
          <p> Unless explicitly provided by AHM in any specific service or deliverable, obtaining sufficient insurance coverage is the obligation/option of the user and AHM doesn't accept any claims arising out of such scenarios.</p>
          <p> Insurance, if any provided as a part of the service/ product by AHM shall be as per the terms and conditions of the insuring company. The User shall contact the insurance company directly for any claims or disputes and AHM shall not provide any express or implied undertakings for acceptance of the claims by the insurance company.</p>
          <h4 class="heading">FORCE MAJURE CIRCUMSTANCES</h4>
          <p> The user agrees that there can be exceptional circumstances where the service operators like the airlines, hotels, the respective transportation providers or concerns may be unable to honor the confirmed bookings due to various reasons like climatic conditions, labor unrest, insolvency, business exigencies, government decisions, operational and technical issues, route and flight cancellations etc. If AHM is informed in advance of such situations where dishonor of bookings may happen, it will make its best efforts to provide similar alternative to its customers or refund the booking amount after reasonable service charges, if supported and refunded by that respective service operators. The user agrees that AHM being an agent for facilitating the booking services shall not be responsible for any such circumstances and the customers have to contact that service provider directly for any further resolutions and refunds.</p>
          <p> The User agrees that in situations due to any technical or other failure in AHM, services committed earlier may not be provided or may involve substantial modification. In such cases, AHM shall refund the entire amount received from the customer for availing such services minus the applicable cancellation, refund or other charges, which shall completely discharge any and all liabilities of AHM against such non-provision of services or deficiencies. Additional liabilities, if any, shall be borne by the User.</p>
          <p> AHM shall not be liable for delays or inabilities in performance or non-performance in whole or in part of its obligations due to any causes that are not due to its acts or omissions and are beyond its reasonable control, such as acts of God, fire, strikes, embargo, acts of government, acts of terrorism or other similar causes, problems at airlines, rails, buses, hotels or transporters end. In such event, the user affected will be promptly given notice as the situation permits.</p>
          <p> Without prejudice to whatever is stated above, the maximum liability on part of AHM arising under any circumstances, in respect of any services offered on the site, shall be limited to the refund of total amount received from the customer for availing the services less any cancellation, refund or others charges, as may be applicable. In no case the liability shall include any loss, damage or additional expense whatsoever beyond the amount charged by AHM for its services.</p>
          <p>In no event shall AHM and/or its suppliers be liable for any direct, indirect, punitive, incidental, special, consequential damages or any damages whatsoever including, without limitation, damages for loss of use, data or profits, arising out of or in any way connected with the use or performance of the AHM website(s) or any other channel . Neither shall AHM be responsible for the delay or inability to use the AHM websites or related services, the provision of or failure to provide services, or for

            any information, software, products, services and related graphics obtained through the AHM website(s), or otherwise arising out of the use of the AHM website(s), whether based on contract, tort, negligence, strict liability or otherwise.</p>
          <p> AHM is not responsible for any errors, omissions or representations on any of its pages or on any links or on any of the linked website pages.</p>
          <h4 class="heading">SAFETY OF DATA DOWNLOADED</h4>
          <p> The User understands and agrees that any material and/or data downloaded or otherwise obtained through the use of the Service is done entirely at their own discretion and risk and they will be solely responsible for any damage to their computer systems or loss of data that results from the download of such material and/or data.</p>
          <p> Nevertheless, AHM will always make its best endeavors to ensure that the content on its websites or other information channels are free of any virus or such other malwares.</p>
          <h4 class="heading">FEEDBACK FROM CUSTOMER AND SOLICITATION:</h4>
          <p> The User is aware that Apollo Holidays provides various services like hotel bookings, car rentals, holidays and would like to learn about them, to enhance his / her travel experience. The User hereby specifically authorizes Apollo Holidays to contact the User with offers on various services offered by it through direct mailers, e-mailers, telephone calls, short messaging services (SMS) or any other medium, from time to time. In case that the customer chooses not to be contacted, he /she shall write to Apollo Holidays for specific exclusion at admin@apolloholidays.net or provide his / her preferences to the respective service provider. The customers are advised to read and understand the privacy policy of AHM on its website in accordance of which AHM contacts, solicits the user or shares the user's information.</p>
          <h4 class="heading"> PROPRIETARY RIGHTS</h4>
          <p> AHM may provide the User with contents such as sound, photographs, graphics, video or other material contained in sponsor advertisements or information. This material may be protected by copyrights, trademarks, or other intellectual property rights and laws.</p>
          <p> The User may use this material only as expressly authorized by AHM and shall not copy, transmit or create derivative works of such material without express authorization.</p>
          <p> The User acknowledges and agrees that he/she shall not upload post, reproduce, or distribute any content on or through the Services that is protected by copyright or other proprietary right of a third party, without obtaining the written permission of the owner of such right.</p>
          <p> Any copyrighted or other proprietary content distributed with the consent of the owner must contain the appropriate copyright or other proprietary rights notice. The unauthorized submission or distribution of copyrighted or other proprietary content
            is illegal and could subject the User to personal liability or criminal prosecution.</p>
          <h4 class="heading"> VISA OBLIGATIONS OF THE USER </h4>
          <p> The travel bookings done by AHM are subject to the applicable requirements of Visa which are to be obtained by the individual traveller. AHM is not responsible for any issues, including inability to travel, arising out of such Visa requirements and is also not liable to refund for the untraveled bookings due to any such reason.</p>
          <h4 class="heading">PERSONAL AND NON-COMMERCIAL USE LIMITATION</h4>
          <p> Unless otherwise specified, the AHM services are for the User's personal and non - commercial use. The User may not modify, copy, distribute, transmit, display, perform, reproduce, publish, license, create derivative works from, transfer, or sell any information, software, products or services obtained from the AHM website(s) without the express written approval from AHM.</p>
          <h4 class="heading"> INDEMNIFICATION</h4>
          <p> The User agrees to indemnify, defend and hold harmless AHM and/or its affiliates, their websites and their respective lawful successors and assigns from and against any and all losses, liabilities, claims, damages, costs and expenses (including reasonable legal fees and disbursements in connection therewith and interest chargeable thereon) asserted against or incurred by AHM and/or its affiliates, partner websites and their respective lawful successors and assigns that arise out of, result from, or may be payable by virtue of, any breach or non-performance of any representation, warranty, covenant or agreement made or obligation to be performed by the User pursuant to this agreement.</p>
          <p> The user shall be solely and exclusively liable for any breach of any country specific rules and regulations or general code of conduct and AHM cannot be held responsible for the same.</p>
          <h4 class="heading">Right to Refuse</h4>
          <p> AHM at its sole discretion reserves the right to not to accept any customer order without assigning any reason thereof. Any contract to provide any service by AHM is not complete until full money towards the service is received from the customer and accepted by AHM.</p>
          <p> Without prejudice to the other remedies available to AHM under this agreement, the TOS or under applicable law, AHM may limit the user's activity, or end the user's listing, warn other users of the user's actions, immediately temporarily/indefinitely suspend or terminate the user's registration, and/or refuse to provide the user with access to the website if: </p>
          <ul>
            <li> The user is in breach of this agreement, the TOS and/or the documents it incorporates by reference;</li>
            <li>AHM is unable to verify or authenticate any information provided by the user; or</li>
            <li> AHM believes that the user's actions may infringe on any third party rights or breach any applicable law or otherwise result in any liability for the user, other users of the website and/or AHM.</li>
            <li> AHM may at any time in its sole discretion reinstate suspended users. Once the user have been indefinitely suspended the user shall not register or attempt to register with AHM or use the website in any manner whatsoever until such time that the
              user is reinstated by AHM.</li>
          </ul>
          <p> Notwithstanding the foregoing, if the user breaches this agreement, the TOS or the documents it incorporates by reference, AHM reserves the right to recover any amounts due and owing by the user to AHM and/or the service provider and to take strict legal action as AHM deems necessary.</p>
          <h4 class="heading"> RIGHT TO CANCELLATION BY AHM IN CASE OF INVALID INFROMATION FROM USER</h4>
          <p> The User expressly undertakes to provide to AHM only correct and valid information while requesting for any services under this agreement, and not to make any misrepresentation of facts at all. Any default on part of the User would vitiate this agreement and shall disentitle the User from availing the services from AHM.</p>
          <p> In case AHM discovers or has reasons to believe at any time during or after receiving a request for services from the User that the request for services is either unauthorized or the information provided by the User or any of them is not correct or that any fact has been misrepresented by him, AHM in its sole discretion shall have the unrestricted right to take any steps against the User(s), including cancellation of the bookings, etc. without any prior intimation to the User. In such
            an event, AHM shall not be responsible or liable for any loss or damage that may be caused to the User or any of them as a consequence of such cancellation of booking or services.</p>
          <p> The User unequivocally indemnifies AHM of any such claim or liability and shall not hold AHM responsible for any loss or damage arising out of measures taken by AHM for safeguarding its own interest and that of its genuine customers. This would also include AHM denying/cancelling any bookings on account of suspected fraud transactions.</p>
          <p> The terms and conditions herein shall apply equally to both the singular and plural form of the terms defined. Whenever the context may require, any pronoun shall include the corresponding masculine, feminine and neuter form. The words "include", "includes" and "including" shall be deemed to be followed by the phrase "without limitation". Unless the context otherwise requires, the terms "herein", "hereof", "hereto", 'hereunder" and words of similar import refer to this agreement as a whole.</p>
          <h4 class="heading"> SEVERABILITY</h4>
          <p> If any provision of this agreement is determined to be invalid or unenforceable in whole or in part, such invalidity or unenforceability shall attach only to such provision or part of such provision and the remaining part of such provision and all other provisions of this Agreement shall continue to be in full force and effect.</p>
          <h4 class="heading"> HEADING</h4>
          <p> The heading and subheading herein are included for convenience and identification only and are not intended to describe, interpret, define or limit the scope, extent or intent of this agreement, terms and conditions, notices, or the right to use this website by the User contained herein or any other section or pages of AHM Websites or its partner websites or any provision hereof in any manner whatsoever.</p>
          <p> In the event that any of the terms, conditions, and notices contained herein conflict with the Additional Terms or other terms and guidelines contained within any particular AHM website, then these terms shall control.</p>
          <h4 class="heading">RELATIONSHIP</h4>
          <p> None of the provisions of any agreement, terms and conditions, notices, or the right to use this website by the User contained herein or any other section or pages of AHM Websites or its partner websites, shall be deemed to constitute a partnership between the User and AHM and no party shall have any authority to bind or shall be deemed to be the agent of the other in any way.</p>
          <h4 class="heading"> UPDATION OF THE INFORMATION BY AHM</h4>
          <p> User acknowledges that AHM provides services with reasonable diligence and care. It endeavors its best to ensure that User does not face any inconvenience. 
            However, at some times, the information, software, products, and services included in or available through the AHM websites or other sales channels and ad materials may include inaccuracies or typographical errors which will be immediately
            corrected as soon as AHM notices them. Changes are/may be periodically made/added to the information provided such. AHM may make improvements and/or changes in the AHM websites at any time without any notice to the User. Any advice received except through an authorized representative of AHM via the AHM websites should not be relied upon for any decisions.</p>
          <h4 class="heading">MODIFICATION OF THESE TERMS OF USE</h4>
          <p> AHM reserves the right to change the terms, conditions, and notices under which the AHM websites are offered, including but not limited to the charges. The User is responsible for regularly reviewing these terms and conditions.</p>
          <h4 class="heading">JURISDICTION</h4>
          <p> AHM hereby expressly disclaims any implied warranties imputed by the laws of any jurisdiction or country other than those where it is operating its offices. AHM considers itself and intends to be subject to the jurisdiction only of the courts of Malaysia.</p>
          <h4 class="heading">RESPONSIBILITIES OF USER VIS-A-VIS THE AGREEMENT</h4>
          <p> The User expressly agrees that use of the services is at their sole risk. To the extent AHM acts only as a booking agent on behalf of third party service providers, it shall not have any liability whatsoever for any aspect of the standards of services provided by the service providers. In no circumstances shall AHM be liable for the services provided by the service provider. The services are provided on an "as is" and "as available" basis. AHM may change the features or functionality of the services at any time, in their sole discretion, without notice. AHM expressly disclaims all warranties of any kind, whether express or implied, including, but not limited to the implied warranties of merchantability, fitness for a particular purpose and non-infringement. No advice or information, whether oral or written, which the User obtains from AHM or through the services shall create any warranty not expressly made herein or in the terms and conditions of the services. If the User does not agree with any of the terms above, they are advised not to read the material on any of the AHM pages or otherwise use any of the contents, pages, information or any other material provided by AHM. The sole and exclusive remedy of the User in case of disagreement, in whole or in part, of the user agreement, is to discontinue using the services after notifying AHM in writing. </p>
          <p> I authorize Apollo Holidays representative to contact me over phone, message and email.</p>
        </article>
      </div>
    </div>
  </div>
</div>
</div>

 
<div class="row builders">
  <div class="container">
    <div class="marquee" id="mycrawler2">
      <ul class="list-inline">
        <li> <a href="#"><img src="images/c1.jpg"></a> </li>
        <li> <a href="#"><img src="images/c2.jpg"></a> </li>
        <li> <a href="#"><img src="images/c3.jpg"></a> </li>
        <li> <a href="#"><img src="images/c4.jpg"></a> </li>
        <li> <a href="#"><img src="images/c5.jpg"></a> </li>
        <li> <a href="#"><img src="images/c6.jpg"></a> </li>
        <li> <a href="#"><img src="images/c3.jpg"></a> </li>
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
<script type="text/javascript">
 $(document).ready(function() {    
    $(".comment").shorten();    
    $(".comment-small").shorten({showChars: 300});
 }); 
    </script>
	   <script type="text/javascript">
    $(document).ready(function() {
        jQuery.fn.anim_progressbar = function(aOptions) {
            // def values
            var iCms = 1000;
            var iMms = 60 * iCms;
            var iHms = 3600 * iCms;
            var iDms = 24 * 3600 * iCms;

            // def options
            var aDefOpts = {
                start: new Date(), // now
                finish: new Date().setTime(new Date().getTime() + <?php echo $second; ?> * iCms), // now + 60 sec
                interval: 100
            }
            var aOpts = jQuery.extend(aDefOpts, aOptions);
            var vPb = this;

            // each progress bar
            return this.each(
                function() {
                    var iDuration = aOpts.finish - aOpts.start;

                    // calling original progressbar
                    $(vPb).children('.pbar').progressbar();

                    // looping process
                    var vInterval = setInterval(
                        function() {
                            var iLeftMs = aOpts.finish - new Date(); // left time in MS
                            var iElapsedMs = new Date() - aOpts.start, // elapsed time in MS
                                iDays = parseInt(iLeftMs / iDms), // elapsed days
                                iHours = parseInt((iLeftMs - (iDays * iDms)) / iHms), // elapsed hours
                                iMin = parseInt((iLeftMs - (iDays * iDms) - (iHours * iHms)) / iMms), // elapsed minutes
                                iSec = parseInt((iLeftMs - (iDays * iDms) - (iMin * iMms) - (iHours * iHms)) / iCms), // elapsed seconds
                                iPerc = (iElapsedMs > 0) ? iElapsedMs / iDuration * 100 : 0; // percentages

                            // display current positions and progress
                            $(vPb).children('.percent').html('<b>' + iPerc.toFixed(1) + '%</b>');
                            $(vPb).children('.elapsed').html(iMin + ':' + iSec + '</b>');
                            $(vPb).children('.pbar').children('.ui-progressbar-value').css('width', iPerc + '%');

                            // in case of Finish
                            if (iPerc >= 100) {
                                clearInterval(vInterval);
                                $(vPb).children('.percent').html('<b>100%</b>');
                                $(vPb).children('.elapsed').html('Finished');
								alert('More Than 30 Minutes have elaped since You Added a service to your cart \n The service are deleted once thi time has elapsed in order to insure their availability and avoid price change ');
	 
	window.location='out.php';
                            }
                        }, aOpts.interval
                    );
                }
            );
        }

        // default mode
        $('#progress1').anim_progressbar();

        // from second #5 till 15
        var iNow = new Date().setTime(new Date().getTime() + 5 * 1000); // now plus 5 secs
        var iEnd = new Date().setTime(new Date().getTime() + 15 * 1000); // now plus 15 secs
		   var iEnd = '1800';
        $('#progress2').anim_progressbar({ start: iNow, finish: iEnd, interval: 100 });

        // we will just set interval of updating to 1 sec
        $('#progress3').anim_progressbar({ interval: 1000 });
    });
    </script>

</body>
</html>
