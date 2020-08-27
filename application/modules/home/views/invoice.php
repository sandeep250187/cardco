  <?php 
include "include/data-p.php";
$select=mysql_query("select * from apmg_order_list where id='$_GET[id]' and cus_id='$_SESSION[id]'");
$fetch=mysql_fetch_array($select);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Apmg 2018 Invoice</title>
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
.order-details li {
  border: 1px solid #ccc;
  font-size: 14px;
  margin-top: 4px;
}
.order-details h4 {
     margin: 0;
    /* background: #ececec; */
    padding: 1px;
    font-size: 15px;
    color: #000;
    font-weight: 700;
    border: 1px solid #f2f2f2;
}
</style>
<script>
function printfn() {
    window.print();

}
</script>

<body style="background: #f9f9f9;">
<div class="container">
  <table style="border: 1px solid #ccc;   background: #fff;  padding: 10px;   border-collapse: initial; width: 100%;">
    <tbody>
     <!--  <tr>
        <td colspan="2" align="center"> 20/10/2017 </td>
      </tr> -->
      <tr bgcolor="#fff" >
        <td colspan="2" style="border:1px solid #ccc">
        <table width="100%">
            <tr>
              <td align="left" valign="top" style="padding:10px;" width="40%"><img src="images/malaysia.png" height="100px"  alt=" "/></td>
              <td align="center "><h1 style="margin: 0; font-size: 24px; padding: 0; text-transform: uppercase; "><span style="color:#000; ">Performa</span> Invoice</h1></td>
              <td width="40% " align="right " style=" padding: 10px 15px; "><!-- <img src="images/malaysia.png "   alt=" "/> --> <ul class="list-unstyled">
            <li>
 
<li><h4><strong>Apollo Holidays Malaysia Sdn Bhd</strong></h4></li>
 <li>Unit-A-5-1, Wisma yoon cheng, No.726,<br>
 Jalan Sultan Azlan Shah, batu 41/2 Kuala Lumpur. 51200</li>
<li>Phone - <strong>+603 62525003/ 9003</strong></li>


</ul></td>
            </tr>
          </table></td>
      </tr>
      <tr>
        <td colspan="2 "><span style="border:1px solid #00acea; display: block; margin-top: 15px; background: #00acea; font-size: 18px; color: #fff; padding:2px 15px; "> Booking Details</span></td>
      </tr>
      <tr>
        <td valign="top " colspan="2" style="padding: 10px;background: #f9f9f9; border: 1px solid #cacaca; "><table style="background: #fff; padding: 10px; width: 100%; ">
            <tr>
              <td width="20%" style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px; ">Booking reference: </td>
              <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px; "><b style="color:red; "><?PHP echo $fetch['order_code']; ?></b></td>
              <td width="20%" style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px; ">Booking confirmation date:</td>
              <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px; "><strong><?PHP echo $fetch['created_date']; ?></strong></td>
            </tr>
            <tr>
              <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px; ">Passenger name: </td>
              <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px; "><strong> <?PHP echo $fetch['name']; ?> </strong></td>
              <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px; ">Payment Type:</td>
              <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px; "><strong>Online</strong></td>
            </tr>
            <tr>
              <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px; ">Email:</td>
              <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px; "><strong><?PHP echo $fetch['email']; ?></strong></td>
            </tr>
          </table></td>
      </tr>
      <tr>
        <td  colspan="2 "><span style="border:1px solid #00acea; display: block; margin-top: 15px; background: #00acea; font-size: 18px; color: #fff; padding:2px 15px; "> Hotel </span></td>
      </tr>
      <?php
                    $to='';
        $select_detail1=mysql_query("select distinct pid from apmg_order_detail_hotel where order_id='$_GET[id]' and cusid='$_SESSION[id]'");
while($data1=mysql_fetch_array($select_detail1))
        {
         
   $pid=$data1['pid']; 
                  
                  $sql1=mysql_query("select h.id,h.hotelname,h.hotel_pic from mala_hotelmaster h ,apmg_hotel_tariff_withoutshtl t where h.id=t.hotel_id  and t.id='$pid'");  
                  $row1=mysql_fetch_array($sql1);
        ?>
      <tr>
        <td colspan="2" valign="top " style="padding: 10px; background: #f9f9f9; border: 1px solid #cacaca; ">
        <div class="order-details">
          <h4 style="font-size: 18px;
    font-weight: 700;
    border-bottom: 2px solid #ccc;
    padding-bottom: 5px;">
            <?php
          echo $row1['hotelname'];
          
          ?>
          </h4>
           
          <?php
$tot='';
$t='';
 $select_detail=mysql_query("select * from apmg_order_detail_hotel where order_id='$_GET[id]' and pid='$pid' and cusid='$_SESSION[id]'");
while($data=mysql_fetch_array($select_detail))
        {
        $start = strtotime($data['cin']);
$end = strtotime($data['cout']);

  $night = ceil(abs($end - $start) / 86400);   
      
        $total=($data['room_price']+$data['markup'])*$data['noof_room']*$night; 
      $t=$total+$t;
?>
        
          <ul class="list-unstyled">
            <li class="col-xs-3">  <h4>
            <?php
			 
          if($data['room_type']==2){$rt="Double";}
          if($data['room_type']==3){$rt="Triple";}
          if($data['room_type']==4){$rt="Family";}
         
                          $selrc=mysql_query("select * from mala_roomcat_master where id='$data[room_cat]'");
                          $fetrc=mysql_fetch_array($selrc);
                           $rc=$fetrc['roomtype'];
          echo $data['noof_room'].' * '.$rt.' '.$rc;  ?>
          </h4></li>
            <li class="col-xs-6 col-xs-3"> Checkin Date: <strong> <?php echo $data['cin'];  ?></strong></li>
            <li class="col-xs-6 col-xs-3"> Checkout Date:<strong> <?php echo $data['cout'];  ?></strong> </li>
            <li class="col-xs-6 col-xs-3"> Price:<strong> MYR <?php echo number_format($total,2);  ?></strong> </li>
          </ul>
          <br>
          <table style="background: #e2e2e2; padding: 10px; width: 100%; ">
            <!--<tr>
        <td colspan="2"   style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px; font-weight: 700; font-size: 16px;">Arrival Transfer</td>
      </tr>-->
            <tr>
              <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px; "></td>
              <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;" align="right"></td>
            </tr>
            </table>
           
            
            <?php
    }
    }
?>
          
          <table style="background: #e2e2e2; padding: 10px; width: 100%; ">
            <tr>
              <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px; "></td>
              <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px; font-size: 16px; font-weight: bold;" align="right">Total MYR <?php echo $t; ?></td>
            </tr>
          </table>
           </div>
          </td>
      </tr>
      
       <tr>
        <td  colspan="2 "><span style="border:1px solid #00acea; display: block; margin-top: 15px; background: #00acea; font-size: 18px; color: #fff; padding:2px 15px; "> Transfer </span></td>
      </tr>
      <?php
                    $to='';
        $select_detail_transfer=mysql_query("select * from apmg_order_detail_transfer where order_id='$_GET[id]' and cusid='$_SESSION[id]'");
while($data_transfer=mysql_fetch_array($select_detail_transfer))
        {
         
   $pid=$data_transfer['pid']; 
    
        ?>
      <tr>
        <td colspan="2" valign="top " style="padding: 10px; background: #f9f9f9; border: 1px solid #cacaca; ">
        <div class="order-details">
        
           
              <?php
                    $to_trans='';
        $select_detail_transfer=mysql_query("select * from apmg_order_detail_transfer where order_id='$_GET[id]' and cusid='$_SESSION[id]'");
while($data_transfer=mysql_fetch_array($select_detail_transfer))
        {
         
   $pid=$data_transfer['pid']; 
    
	$select=mysql_query("select * from transfer_tariff_master where id='$pid'");
$data=mysql_fetch_array($select);
        ?>
        
          <ul class="list-unstyled">
            <li class="col-xs-4"> <h4> <?php 
											if($data['pickup_from']==1){ echo "Airport";}
											if($data['pickup_from']==2){ echo "Coach station";}
											if($data['pickup_from']==3){ echo "Railway Station";}
											if($data['pickup_from']==4){ echo "Hotel";}
											if($data['pickup_from']==5){ echo "Venue";}
											if($data['pickup_from']==6){ echo "Cruise";}
											if($data['pickup_from']==7){ echo "Ferry";} ?> <?php 
											echo "(";
											if($data['pickup_point']=='PA'){ echo "Penang Airport";}
											if($data['pickup_point']=='PC'){ echo "Penang Coach Station";}
											if($data['pickup_point']=='PR'){ echo "Penang Railway Station";}
											if($data['pickup_point']=='CT'){ echo "Cruise Terminal";}
											if($data['pickup_point']=='FT'){ echo "Ferry Terminal";}
											if($data['pickup_from']=='4'){	$sql12=mysql_query("SELECT  * FROM apmg_location where id='$data[pp]'");
																	$name2 = mysql_fetch_array($sql12);
																	 echo $name2['location_name'];
																}
											if($data['pickup_from']=='5'){
										$s=mysql_query("SELECT  id,vname FROM venue_master where id='$data[pp]'");
										$na = mysql_fetch_array($s);
										echo $na['vname'];
										
									} echo ")";?> <i class="fa fa-arrow-right"></i> <?php 
										
										if($data['drop_to']==1){ echo "Airport";}
										if($data['drop_to']==2){ echo "Coach station";}
										if($data['drop_to']==3){ echo "Railway Station";}
										if($data['drop_to']==4){ echo "Hotel";}
										if($data['drop_to']==5){ echo "Venue";}
										if($data['drop_to']==6){ echo "Cruise";}
										if($data['drop_to']==7){ echo "Ferry";} ?><?php 
										echo "(";
										if($data['drop_point']=='PA'){ echo "Penang Airport";}
										if($data['drop_point']=='PC'){ echo "Penang Coach Station";}
										if($data['drop_point']=='PR'){ echo "Penang Railway Station";}
										if($data['drop_point']=='CT'){ echo "Cruise Terminal";}
										if($data['drop_point']=='FT'){ echo "Ferry Terminal";}
										if($data['drrop_to']=='4'){	$sql12=mysql_query("SELECT  * FROM apmg_location where id='$data[dp]'");
																$name2 = mysql_fetch_array($sql12);
																 echo $name2['location_name'];
															}
										if($data['drrop_to']=='5'){
										$s=mysql_query("SELECT  id,vname FROM venue_master where id='$data[dp]'");
										$na = mysql_fetch_array($s);
										echo $na['vname'];echo ")";
										} echo ")";?></h4></li>
										 <li class="col-xs-6 col-xs-3"> Service Date: <strong> <?php echo $data_transfer['service_date'];  ?></strong></li>
            <li class="col-xs-6 col-xs-1"> Adult: <strong> <?php echo $data_transfer['adult'];  ?></strong></li>
            <li class="col-xs-6 col-xs-1"> Child:<strong> <?php echo $data_transfer['child'];  ?></strong> </li>
            <li class="col-xs-6 col-xs-3"> Price:<strong> MYR <?php echo $data_transfer['total_price'];  $tot_trans=$tot_trans+$data_transfer['total_price'];  ?></strong> </li>
          </ul>
          <br>
          <table style="background: #e2e2e2; padding: 10px; width: 100%; ">
            <!--<tr>
        <td colspan="2"   style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px; font-weight: 700; font-size: 16px;">Arrival Transfer</td>
      </tr>-->
            <tr>
              <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px; "></td>
              <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;" align="right"></td>
            </tr>
            </table>
           
            
            <?php
    }
    }
?>
          
          <table style="background: #e2e2e2; padding: 10px; width: 100%; ">
            <tr>
              <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px; "></td>
              <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px; font-size: 16px; font-weight: bold;" align="right">Total MYR <?php echo $tot_trans; ?></td>
            </tr>
          </table>
           </div>
          </td>
      </tr>
       <tr>
        <td  colspan="2 "><span style="border:1px solid #00acea; display: block; margin-top: 15px; background: #00acea; font-size: 18px; color: #fff; padding:2px 15px; "> Tours </span></td>
      </tr>
      <?php
                    $tot_tour='';
        $select_detail_tour=mysql_query("select * from apmg_order_detail_tour where order_id='$_GET[id]' and cusid='$_SESSION[id]'");
while($data_tour=mysql_fetch_array($select_detail_tour))
        {
         
   $pid=$data_tour['tid']; 
    
	$select=mysql_query("select * from apmg_mala_tourmaster where serviceid='$pid'");
$data=mysql_fetch_array($select);

$select1=mysql_query("select * from apmg_mala_tourmaster_name where serviceid='$data[tid]'");
$data1=mysql_fetch_array($select1);
    
        ?>
      <tr>
        <td colspan="2" valign="top " style="padding: 10px; background: #f9f9f9; border: 1px solid #cacaca; ">
        <div class="order-details">
        
           
              <?php
                
  
        ?>
        
          <ul class="list-unstyled">
            <li class="col-xs-6"> <h4> <?php echo $data_tour['vehicle_name'];// echo $data1['servicename'];?></h4></li>
										 <li class="col-xs-6 col-xs-2"> Service Date: <strong> <?php echo $data_tour['service_date'];  ?></strong></li>
            <li class="col-xs-6 col-xs-1"> Adult: <strong> <?php echo $data_tour['adult'];  ?></strong></li>
            <li class="col-xs-6 col-xs-1"> Child:<strong> <?php echo $data_tour['child'];  ?></strong> </li>
            <li class="col-xs-6 col-xs-2"> Price:<strong> MYR <?php echo $data_tour['total_price'];  $tot_tour=$tot_tour+$data_tour['total_price'];  ?></strong> </li>
          </ul>
          <br>
          <table style="background: #e2e2e2; padding: 10px; width: 100%; ">
            <!--<tr>
        <td colspan="2"   style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px; font-weight: 700; font-size: 16px;">Arrival Transfer</td>
      </tr>-->
            <tr>
              <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px; "></td>
              <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px;" align="right"></td>
            </tr>
            </table>
           
            
            <?php
 
    }
?>
          
          <table style="background: #e2e2e2; padding: 10px; width: 100%; ">
            <tr>
              <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px; "></td>
              <td style="border:1px solid #f2f2f2; background: #fff; padding:2px 15px; font-size: 16px; font-weight: bold;" align="right">Total MYR <?php echo $tot_tour; ?></td>
            </tr>
          </table>
           </div>
          </td>
      </tr>
      
       
      <tr>
        <td colspan="2" align="center" style="border-top:2px solid #ccc; padding: 5px 15px; font-size: 14px; line-height: 24px; "><strong style="font-size: 18px; ">Notes : </strong></br>
           <p style="text-align: center;"><a href="http://www.apollocosting.online" target="_blank">www.apollocosting.online</a> all payments to be done as per dateline given, (except group bookings with fixed days in advance at the time of the confirmation) . <br>Please indicate our reference number when making payment. Thank you for your cooperation.</p>
    </td>
      </tr>
      <tr>
        <td colspan="2 " style="border-top:2px solid #ccc; padding: 5px 15px; font-size: 14px; line-height: 24px; ">
          <ul class="list-unstyled">
            <li>
<strong>Bank Details -</strong> </li>
<li><h4>Apollo Holidays Malaysia Sdn Bhd</h4></li>
<li>Bank / Branch: <strong>MALAYAN BANKING BERHAD</strong></li>
<li>Bank Address:  <strong>3rd Mile, Jalan Sultan Azlan Shah, Jalan Ipoh, 51200 Kuala Lumpur</strong></li>
<li> A/C No: <strong>564 333 612 410</strong></li>
<li>Swift Code: <strong>MBBEMYKL</strong></li>
<li>GST NO - <strong>001667219456</strong></li>
</ul>
</td>
      </tr><tr>
        <td colspan="2 " align="right" style="border-top:2px solid #ccc; padding: 5px 15px; font-size: 14px; line-height: 24px; "> 
          <!-- <ul class="list-unstyled">
            <li>
 
<li><h4>Apollo Holidays Malaysia Sdn Bhd</h4></li>
 <li>Unit-A-5-1, Wisma yoon cheng, No.726,
 Jalan Sultan Azlan Shah, batu 41/2 Kuala Lumpur. 51200</li>
<li>Phone - <strong>+603 62525003/ 9003</strong></li>


</ul> -->
</td>
      </tr>
    </tbody>
  </table>
</div>
</body>
</html>