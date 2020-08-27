<?php
include "include/data-p.php";

 
if($_SESSION['id']=='' or empty($_SESSION['id'])) { echo "<script>alert('Please Login To Continue');window.location='register.php';</script>"; }

$select=mysql_query("select * from apmg_order_list where id='$_GET[id]' and cus_id='$_SESSION[id]'");
$fetch=mysql_fetch_array($select);

 $sql1=mysql_query("select h.id,h.hotelname,h.hotel_pic,h.address from mala_hotelmaster h ,apmg_hotel_tariff_withoutshtl t where h.id=t.hotel_id  and t.id='$_GET[pid]'");  
                  $row1=mysql_fetch_array($sql1);

?> 



 <!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Malaysia Hotel Voucher</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet">
</head>
<style type="text/css">
body {
  font-family: 'Ubuntu Condensed', sans-serif;
  font-size: 14px;
}
 .order-details {
      
     clear: both;
     overflow: hidden;
     padding-bottom: 5px;
 }
 .order-details li{ border:1px solid #ccc; font-size: 14px; }

 .order-details h4 {
     margin: 3px 0 5px;
     background: #ececec;
     padding: 5px;
     font-size: 15px;
     color: #001299;
     font-weight: 700;
     border: 1px solid #f2f2f2;
 }

</style>
<script>
function printfn()
{
 window.print();
 
}
</script>

<body style="background: #f9f9f9;">
<div class="container">
  <table  style="border: 1px solid #ccc;   background: #fff;  padding: 10px;   border-collapse: initial;">
    <tbody>
      <tr bgcolor="#fff">
        <td  colspan="4" >
          <table width="100%">
            <tr>
        <td align="left"  valign="top" style="padding:0 10px;" width="40%""><img width="100px" src="images/logon.jpg"  alt=""/></td>
        <td align="center" style="color: #000;">
          <h1 style="margin: 0; font-size: 24px; padding: 0; text-transform: uppercase;"><span style="color:#000; ">Hotel</span> Voucher</h1>
               </td>
        <td width="40%" align="right" style="color: #000; padding: 10px 15px;">

<img width="100px" src="images/malaysia.png"  alt=""/>
         
        </td>
      </tr>
    </table>
  </td>
</tr>
      <tr>
        <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;" colspan="4" align="center" style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;"> Please present either an electronic or paper copy of your hotel Voucher upon check-in.</td>
      </tr>
     <tr>
        <td width="15%"  style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;">Web ID: </td>
        <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;"><b style="color:red;"><?php echo $fetch['order_code'];  ?> </b></td>
      
        <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;">Booking Date :</td>
        <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;"><strong><?php echo $fetch['created_date'];  ?> </strong></td>
      </tr>
        <tr>
        <td width="15%"  style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;">Guest Name:</td>
        <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;"><strong><?php echo $fetch['name'];  ?> </strong></td>
      
        <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;" align="left">Nationality: </td>
        <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;"><strong>Indian</strong></td>
      </tr>
      <tr>
        <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;">Hotel Name:</td>
        <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;"><strong><?php
                  echo $row1['hotelname'];
                  
                  ?></strong></td>
      
        <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;">Address:</td>
        <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;"><strong><?php
                  echo $row1['address'];
                  
                  ?></strong></td>
      </tr>
     <!--  <tr>
        <td colspan="2" valign="top" style="padding: 10px; width: 50%; background: #f9f9f9; border: 3px solid #00aaeb;">
          <table style="background: #e2e2e2; padding: 10px; width: 100%;">
    
      <tr>
        <td width="35%"  style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;">Web ID: </td>
        <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;"><b style="color:red;"><?php echo $fetch['order_code'];  ?> </b></td>
      </tr>
      <tr>
        <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;">Hotel Confirmation #:</td>
        <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;"><strong><?php echo $fetch['hotel_number'];  ?> </strong></td>
      </tr>
      <tr>
        <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;">City: </td>
        <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;"><strong>
        Penang         </strong></td>
      </tr>
      <tr>
        <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;">Hotel Name:</td>
        <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;"><strong><?php
                  echo $row1['hotelname'];
                  
                  ?></strong></td>
      </tr>
      <tr>
        <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;">Address:</td>
        <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;"><strong><?php
                  echo $row1['address'];
                  
                  ?></strong></td>
      </tr>
    </table>
  </td>

        <td valign="top" colspan="2" style="padding: 10px; background: #f9f9f9; border: 3px solid #00aaeb;">
          <table style="background: #e2e2e2; padding: 10px; width: 100%;">
         
      <tr>
        <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;">Check in: </td>
        <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;"><strong>12  Sep, 2017</strong></td>
      </tr>
      <tr>
        <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;">Check Out: </td>
        <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;"><strong>14  Sep, 2017</strong></td>
      </tr>
      <tr>
        <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;"  align="left">No. of Nights :</td>
        <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;"><strong> 2</strong></td>
      </tr>
      <tr>
        <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;">Pax </td>
        <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;"> Adults: <strong> 2</strong> <br>
          Child with Bed : <strong> 0</strong><br>
          Child with No Bed : <strong> 0</strong></td>
      </tr>
      <tr>
        <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;">Room Details :</td>
        <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;"><strong>
                    1          Double          &nbsp;&nbsp;(
          Superior Hill view           )  ,                     </strong></td>
      </tr>
              <tr>
      <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;" colspan="2"><strong></strong></td>
      <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;" colspan="2">  <strong></strong></td>
    </tr> 
  </table>
</td>
</tr> -->
    
    
    <tr>
        <td style="border:1px solid #f2f2f2; background: #fff; padding:0; font-size: 18px; line-height: 24px;" colspan="4">  
    
    
    <div class=" ">
<?php
                    $to='';
        $select_detail1=mysql_query("select distinct pid from apmg_order_detail_hotel where order_id='$_GET[id]' and pid='$_GET[pid]' and cusid='$_SESSION[id]'");
while($data1=mysql_fetch_array($select_detail1))
        {
         
   $pid=$data1['pid']; 
                  
                  $sql1=mysql_query("select h.id,h.hotelname,h.hotel_pic,t.child_breakfast from mala_hotelmaster h ,apmg_hotel_tariff_withoutshtl t where h.id=t.hotel_id  and t.id='$pid'");  
                  $row1=mysql_fetch_array($sql1);
        ?>
<!-- Hotel Start -->
<div class="panel panel-default">

<div class="panel-body">
<?php
$tot='';
$t='';
 $select_detail=mysql_query("select * from apmg_order_detail_hotel where order_id='$_GET[id]' and pid='$pid' and cusid='$_SESSION[id]'");
while($data=mysql_fetch_array($select_detail))
        {
        $start = strtotime($data['cin']);
$end = strtotime($data['cout']);

  $night = ceil(abs($end - $start) / 86400);   
      
        $total=(($data['room_price']+$data['markup'])*$data['noof_room']*$night)+($row1['child_breakfast']*$data['child']); 
      $t=$total+$t;
?><div class="order-details">
  <h4>
  
    <?php
                  if($data['room_type']==2){$rt="Double";}
                  if($data['room_type']==3){$rt="Triple";}
                  if($data['room_type']==4){$rt="Family";}
                 
                                                    $selrc=mysql_query("select * from mala_roomcat_master where id='$data[room_cat]'");
                                                    $fetrc=mysql_fetch_array($selrc);
                                                     $rc=$fetrc['roomtype'];
                  echo $data['noof_room'].' * '.$rt.' '.$rc;  ?> <span class="pull-right">#145245258152</span>
  </h4>
  
 
   <ul class="list-unstyled"><li class="col-xs-3">Checkin Date:-  <?php    echo date('d M Y',strtotime($data['cin'])); ?></li> 
     <li class="col-xs-3">Checkout Date:-  <?php echo date('d M Y',strtotime($data['cout'])); ?></li> 
     <li class="col-xs-2">Adults:-  <?php echo $data['adult']; ?></li> 
    <li class="col-xs-2">Childs:-  <?php echo $data['child']; ?></li> 
     <li class="col-xs-2">Price:-  MYR <?php echo number_format($total,2); ?></li></ul>
   </div>
    
    
   
    <?php  } ?>
  
  
  
  
  
  
 </div>
<div class="panel-footer clearfix"> 
  <!--   <a href="#"><i class="fa fa-times"></i> Delete Product</a>-->
 

 
<ul class="list-inline">
 
<li class="col-xs-9" style="font-size: 14px;">
 <!--  <h4>
    <?php
                  // echo  $row1['hotelname'];
                  
                  ?>
  </h4> -->
  <h4>Cancellation charges — Hotels <span   data-toggle="tooltip" title="Date and time is calculated based on local time of destination." data-placement="top"><i class="fa fa-info"></i></span></h4>
  <div class="col-xs-6">
    <ul class="list-unstyled">
     <li>Until 23:59 PM on 31/03/2018 
        <!--<span class="pull-right text-success"><i class="fa fa-check-circle"></i>Free</span>--> 
        <span class="pull-center badge">MYR <?php echo number_format((($total*10)/100),2);  ?></span> </li>
      <li>After 23:59 PM on 31/03/2018 <span class="pull-center badge">MYR <?php echo number_format((($total*100)/100),2);  ?></span></li>
    </ul>
  </div>
  <!--<ul class="list-unstyled">
    <li><strong><?php echo $data['adult']; ?> Adults</strong></li>
    <li><strong><?php echo $data['child']; ?> Childs</strong></li>
  </ul>-->
</li>
<li class="col-xs-3 text-right">
    <spn class="pull-right lead">
  <strong>Total MYR <?php echo  $t; 
                   $to=$to+$t;
                   ?> </strong></span> 
   </li>
</div>
<?php  } ?>
 

 
  
 
</form>
</div>
  </div>
    
    
    
    
    
    </td>
      </tr>
      <tr>
        <td colspan="4" style="border-top:2px solid #ccc; padding: 5px 15px; font-size: 14px; line-height: 24px;">
        <strong style="font-size: 18px;">Notes : </strong></br>
           <ul>
            <li> <strong>IMPORTANT: </strong>At checkin, you must present the valid photo ID with the same name. Failure to do so may result in the hotel requesting additional payment or your reservation not being honored. 
</li>
<li>All rooms are guaranteed on the day of arrival. In the case of a noshow, your room(s) will be released and you will be subject to the terms and conditions of the Cancellation/No-Show Policy specified at the time you made the booking as well as noted in the Confirmation Email.</li>

            <li>The total price for this booking does not include minibar items, telephone usage, laundry service, etc. The hotel will bill you directly.
</li>
            <li>Please refer to the standard check in / check out Timings this hotel. 

You may need to give a security deposit while you check in. which will be refundable while check out- refer hotel policy.</li>
          </ul>
          </td>
      </tr>
      <!-- <tr>
        <td style="border:1px solid #ccc; background: #f9f9f9; padding:2px 15px;"  colspan="4"  style="border-top:2px solid #ccc; padding: 5px;"> <strong style="font-size: 18px; margin-bottom: 5px; color: #000;">Apollo Holidays Malaysia Sdn Bhd </strong></br>
          Unit-A-5-1, Wishma Yoon Cheng,</br>
          No.726, Jalan ipoh, Batu 4 1/2, 
          Kuala Lumpur Malaysia</br>
         <i class="fa fa-phone"></i>  +603 62525003 / FAX: +60362524003</br>
        <i class="fa fa-envelope"></i> feedback@apolloholidays.net</a> </td>
      </tr> -->
      <tr>
        <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;"  colspan="4" align="center" style="border-top:2px solid #ccc; padding: 5px;">This is a computer generated document do not required signature </td>
      </tr>
      <tr>
        <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;" colspan="4" align="center"    style="border-top:2px solid #ccc; padding: 5px;"><input type="submit" onclick="return printfn();" value="Print" class="btn btn-primary"></td>
      </tr>
    </tbody>
  </table>
</div>
</body>
</html>
