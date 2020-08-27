<?php
include_once('includes/data.php');

if(isset($_REQUEST['id']))

{

 $select=mysql_query("select * from thai_reservations where id='$_REQUEST[id]'");

 $fetch=mysql_fetch_array($select);

}

 

   $bdate=date("d  M, Y",strtotime($fetch['date']));

   $cdate=date("d  M, Y",strtotime($fetch['checkin_date']));

   $chkoutdate=date("d  M, Y",strtotime($fetch['checkout_date']));

   $selecthotel=mysql_query("select * from thai_hotelmaster where id='$fetch[hotelid]'");

   $fetchhotel=mysql_fetch_array($selecthotel);

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Thailand Hotel Voucher</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet">
</head>
<style type="text/css">
body {
	font-family: 'Ubuntu Condensed', sans-serif;
	font-size: 14px;
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
      <tr bgcolor="#8d2a63">
        <td colspan="2"><table style="width: 100%;">
            <tr>
              <td style="padding:0 10px;" width="40%"><img src="images/thai.jpg" class="img-responsive"  alt=""/></td>
              <td align="center" style="color: #fff;"><h1 style="margin: 0; font-size: 24px; padding: 0; text-transform: uppercase;"><span style="color:#ffff00; ">Hotel</span> Voucher</h1>
               </td>
              <td width="40%" align="right" style="color: #fff; padding: 10px 15px;"><strong style="font-size: 18px; margin-bottom: 5px; color: #FFEB3B;">APOLLO HOLIDAYS THAILAND CO. LTD.</strong></br>
                2098/857 Huamark SOI 31, Huamark, Bangkapi,<br>
                
                Bangkok 10240, Thailand <br>
                <i class="fa fa-phone"></i> (+66) 86 380 9575, +66 600024022 <br>
                <i class="fa fa-envelope"></i> thai.rsvn1@apolloholidays.net, </td>
            </tr>
          </table></td>
      </tr>
      <tr>
      	<td colspan="2" align="center" style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;"> Please present either an electronic or paper copy of your hotel Voucher upon check-in.</td>
      </tr>
      <tr>
        <td valign="top" style="padding: 10px; background: #f9f9f9; border: 3px solid #8d2a63;">
        	<table style="background: #e2e2e2; padding: 10px;">
            <tr>
              <td width="35%" style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;">Apollo PNR : </td>
              <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;"><strong style="color:red;"><?php echo $fetch['pnr'] ?></strong></td>
            </tr>
            <tr>
              <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;">Hotel Confirmation #: </td>
              <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;"><strong><?php echo $fetch['htlconfno'] ?></strong></td>
            </tr>
            <tr>
              <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;">City:</td>
              <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;"><strong>
                <?php
				$city=$fetchhotel['state'];
		  $selectstate=mysql_query("SELECT * FROM `thai_statemaster` WHERE id='$city'"); 
	   $fetchstate=mysql_fetch_array($selectstate);
	   
	  echo $fetchstate['state'];
		  ?>
                </strong></td>
            </tr>
            <tr>
              <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;" colspan="1">Hotel Name:</td>
              <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;"><strong><?php echo $fetchhotel['hotelname'];?></strong></td>
            </tr>
            <tr>
              <td  style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;">Address:</td>
              <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;"><strong><?php echo $fetchhotel['address'];?></strong></td>
            </tr>
            <?php 
	  $select1=mysql_query("select * from thai_new_reservations where id='$fetch[bid]'");

 $fetch1=mysql_fetch_array($select1);

  $selectmarket=mysql_query("select * from nationality_master where id='$fetch1[nationality]'");

  $fetchmarket=mysql_fetch_array($selectmarket);

  
 
  ?>
          </table></td>
        <td  valign="top" style="padding: 15px;background: #f9f9f9;  width: 50%; border: 3px solid #8d2a63;"><table style="background: #e2e2e2; padding: 10px; width: 100%;">
            <tr>
              <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;">Guest Name:</td>
              <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;"><strong><?php echo $fetch1['salut']; echo " "; echo $fetch1['name']; ?></strong></td>
            </tr>
            <tr>
              <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px; style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;">Nationality:</td>
              <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;"><strong><?php echo $fetch1['nationality']; ?></strong></td>
            </tr>
            <tr>
              <td  style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;">Check in:</td>
              <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;"><strong><?php echo $cdate;  ?></strong></td>
            </tr>
            <tr>
              <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;">Check Out: </td>
              <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;"><strong><?php echo $chkoutdate;  ?></strong></td>
            </tr>
            <tr>
              <td  style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;">No. of Nights :</td>
              <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;"><strong> <?php echo $fetch['nofnight']; ?></strong></td>
            </tr>
            <tr>
              <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;" >No. of Pax: </td>
              <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;">Adults: <strong> <?php echo $fetch['nofadlt']; ?></strong> <br>
                Child with Bed : <strong> <?php echo $fetch['nofchld']; ?></strong><br>
                Child with No Bed     : <strong> <?php echo $fetch['nofinfnt']; ?></strong></td>
            </tr>
            <tr>
              <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;">Room Details : </td>
              <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;"><strong>
                <?php

  $selectfleet=mysql_query("select * from thai_resrv_rooms where pnr='$fetch[pnr]'");

   $amount='';

   while($fetchfleet=mysql_fetch_array($selectfleet))

   {

   if($fetchfleet['nof_rooms']!=0)
   {
    $amount+=$fetchfleet['amount'];

    $selectroomtype=mysql_query("select * from thai_roomtypemaster where id='$fetchfleet[room_type]'");

    $fetchroomtype=mysql_fetch_array($selectroomtype);

	$selectroomcat=mysql_query("SELECT * FROM `thai_roomcat_master` where id='$fetchroomtype[room_cat]'");

   $fetchcat=mysql_fetch_array($selectroomcat);

?>
                <?=$fetchfleet['nof_rooms'];?>
                <?=$fetchroomtype['roomtype'];?>
                (
                <?=$fetchcat['roomtype'];  ?>
                ) <?php echo " , "; ?>
                <?php 
   }
}


echo $fetch['remark'];
?>
                </strong></td>
            </tr>
          </table></td>
      </tr>
      <?php

$selectname1=mysql_query("SELECT * FROM `acc_usermaster` WHERE `id`='$fetch[confirm_by]'")or die(mysql_error());

$fetchname1=mysql_fetch_array($selectname1);

?>
      <!--   <tr>
      <td colspan="2"><strong></strong></td>
      <td colspan="2">  <strong></strong></td>
    </tr>  -->
      <tr>
        <td   style="padding: 5px;" > Payment Terms : <strong>Prepaid </strong></td>
        <td    style="padding: 5px;"> Processed By : <strong>
          <?=$fetchname1['fname'];?>
          <?=$fetchname1['lname'];?>
          </strong></td>
      </tr>
      <tr>
        <td colspan="2" style="border-top:2px solid #ccc; padding: 5px 15px;"><strong style="font-size: 18px;">Notes : </strong></br>
          <ul>
            <li> <strong>IMPORTANT: </strong>At checkin, you must present the valid photo ID with the same name. Failure to do so may result in the hotel requesting additional payment or your reservation not being honored. 
</li>
<li>All rooms are guaranteed on the day of arrival. In the case of a noshow, your room(s) will be released and you will be subject to the terms and conditions of the Cancellation/No-Show Policy specified at the time you made the booking as well as noted in the Confirmation Email.</li>

            <li>The total price for this booking does not include minibar items, telephone usage, laundry service, etc. The hotel will bill you directly.
</li>
            <li>Please refer to the standard check in / check out Timings this hotel. 

You may need to give a security deposit while you check in. which will be refundable while check out- refer hotel policy.</li>
          </ul></td>
      </tr>
      <tr>
        <td  colspan="2" align="center" style="border-top:2px solid #ccc; padding: 5px;">This is a computer generated document do not required signature </td>
      </tr>
      <tr>
        <td colspan="2" align="center"    style="border-top:2px solid #ccc; padding: 5px;"><input type="submit" onclick="return printfn();" value="Print" class="btn btn-primary"></td>
      </tr>
    </tbody>
  </table>
</div>
</body>
</html>
