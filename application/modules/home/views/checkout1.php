   <?php 
include "include/header.php";


//  Hash Code




class SecureHash
{
    private $hashKey;
    private $merchantID;
    private $invoiceNo;
    private $amount;
    private $message;
    private $digest;

    public function __construct($hashKey = '', $merchantID = '', $invoiceNo = '', $amount = '')
    {
        $this->hashKey    = $hashKey;
        $this->merchantID = $merchantID;
        $this->invoiceNo  = $invoiceNo;
        $this->amount     = $amount;
    }

    public function generate()
    {
        $this->prepareMessage();

        $this->digest = hash('sha256', $this->message);

        return strtoupper($this->digest);
    }

    public function getHashKey()
    {
        return $this->hashKey;
    }

    public function getMerchantID()
    {
        return $this->merchantID;
    }

    public function getInvoiceNo()
    {
        return $this->invoiceNo;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getDigest()
    {
        return $this->digest;
    }

    public function setHashKey($hashKey)
    {
        $this->hashKey = $hashKey;
    }

    public function setMerchantID($merchantID)
    {
        $this->merchantID = $merchantID;
    }

    public function setInvoiceNo($invoiceNo)
    {
        $this->invoiceNo = $invoiceNo;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    private function prepareMessage()
    {
            $buffer = array_merge([$this->hashKey], ['Continue'], [
            $this->merchantID,
            $this->invoiceNo,
            $this->amount,
        ]);

        $this->message = implode('', $buffer);
    }

    public function __get($property)
    {
        $method = "get{$property}";

        if (method_exists($this, $method)) {
            return $this->$method();
        }
    }

    public function __set($property, $value)
    {
        $method = "set{$property}";

        if (method_exists($this, $method)) {
            $this->$method($value);
        }
    }

    public function __destruct()
    {
        $hashKey    = null;
        $merchantID = null;
        $invoiceNo  = null;
        $amount     = null;
        $message    = null;
        $digest     = null;
    }
}

 





//Hash Code end
 
if($_SESSION['id']=='' or empty($_SESSION['id'])) { echo "<script>alert('Please Login To Continue');window.location='register.php';</script>"; }

$select=mysql_query("select * from apmg_order_list where id='$_GET[id]' and cus_id='$_SESSION[id]'");
$fetch=mysql_fetch_array($select);



?>

<div class="row bg-grey gap">
<div class="container gap1">
 
 
  <h4 class="text-right">ORDER CODE:- <?PHP echo $fetch['order_code']; ?></h4>
 
<?php
                    $to='';
        $select_detail1=mysql_query("select distinct pid from apmg_order_detail_hotel where order_id='$_GET[id]' and cusid='$_SESSION[id]'");
while($data1=mysql_fetch_array($select_detail1))
        {
         
   $pid=$data1['pid']; 
                  
                  $sql1=mysql_query("select h.id,h.hotelname,h.hotel_pic,t.child_breakfast from mala_hotelmaster h ,apmg_hotel_tariff_withoutshtl t where h.id=t.hotel_id  and t.id='$pid'");  
                  $row1=mysql_fetch_array($sql1);
        ?>
<!-- Hotel Start -->
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
 <!-- <ul class="list-unstyled">
    <li><strong><?php echo $data['adult']; ?> Adults</strong></li>
    <li><strong><?php echo $data['child']; ?> Childs</strong></li>
  </ul>-->
</li>
<li class="col-sm-3 text-right">
  <h4 class="text-success"> <i class="fa fa-building"></i> Hotel</h4>
  <a href="#">Pay to Apollo Asia</a> </li>
  </ul>
</div>

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
  <h4 class="">
  
    <?php
                  if($data['room_type']==2){$rt="Double";}
                  if($data['room_type']==3){$rt="Triple";}
                  if($data['room_type']==4){$rt="Family";}
                 
                                                    $selrc=mysql_query("select * from mala_roomcat_master where id='$data[room_cat]'");
                                                    $fetrc=mysql_fetch_array($selrc);
                                                     $rc=$fetrc['roomtype'];
                  echo $data['room'].' * '.$rt.' '.$rc;  ?>
  </h4>
  
 
  <ul class="list-unstyled"><li  class="col-sm-3">Checkin Date:  <?php    echo date('d M Y',strtotime($data['cin'])); ?></li> 
    <li class="col-sm-3">Checkout Date:  <?php echo date('d M Y',strtotime($data['cout'])); ?></li> 
     <li class="col-sm-2">Adults:  <?php echo $data['adult']; ?></li> 
      <li class="col-sm-2">Childs:  <?php echo $data['child']; ?></li> 
        <li class="col-sm-2">Price:  MYR <?php echo number_format($total,2); ?></li> 
    </ul>

        
        
        </div>
        <?php  } ?>
     </div>






<div class="panel-footer clearfix"> 
<h4>Cancellation charges — Hotels <span   data-toggle="tooltip" title="Date and time is calculated based on local time of destination." data-placement="top"><i class="fa fa-info"></i></span></h4>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled">
                                        <li>Until 23:59 PM on 30/06/2018
                                        <span class="pull-right badge">MYR <?php echo number_format(((($t)*10)/100),2);  ?></span>
                                            <!--<span class="pull-right text-success"><i class="fa fa-check-circle"></i>Free</span>-->
                                        </li>
                                        <li>After 23:59 PM on 30/06/2018 
                                        <span class="pull-right badge">MYR <?php echo number_format(((($t)*100)/100),2);  ?></span>
                                        <!--<span class="pull-right badge">53.84 S$</span>--></li>
                                    </ul>
                                <!-- <a href="cart_transfer.php?ide=<?php echo $i;//$data['pcode']; ?>&act=remove"><i class="fa fa-times"></i> Delete Product</a> 
                                <a href="#"><i class="fa fa-times"></i> Delete Product</a>-->
                                
                            </div>
							<span class="pull-right lead">
									<strong>Total MYR <?php echo  $t;  $to=$to+$t; ?> </strong></span>
  <!--   <a href="#"><i class="fa fa-times"></i> Delete Product</a>-->
 
				   
  <div class="col-sm-12 facilities">
  <h4>Remarks </h4>
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

</div>
<?php  } ?>
<!-- Hotel End --> 
<!-- Transfer Start -->

<?php  
            $select_transfer_detail=mysql_query("select * from apmg_order_detail_transfer where order_id='$_GET[id]' and cusid='$_SESSION[id]'");
                    while($data=mysql_fetch_array($select_transfer_detail))
                    {
                        $ad=$data['adult']; $ch=$data['child'];
                         $pid=$data['pid']; 
                         $select=mysql_query("select * from transfer_tariff_master where id='$pid'");
                        $data1=mysql_fetch_array($select);?>
                        <div class="panel panel-default">
                            <div class="panel-heading clearfix">
                                <ul class="list-inline">
                                    <li class="col-sm-2"><?php if($data['vehicle_name']=="CAR"){?><img src="images/car1.jpg" class="img-responsive cart-thumbnail"/><?PHP } else {?><img src="images/van1.jpg" class="img-responsive cart-thumbnail"/></li><? }?>
                                    <li class="col-sm-7">
                                        <!--<h4>Offer Special: Full Day Lembongan Reef Cruise</h4>-->
                                       <h4><?php 
                                            if($data1['pickup_from']==1){ echo "Airport";}
                                            if($data1['pickup_from']==2){ echo "Coach station";}
                                            if($data1['pickup_from']==3){ echo "Railway Station";}
                                            if($data1['pickup_from']==4){ echo "Hotel";}
                                            if($data1['pickup_from']==5){ echo "Venue";}
                                            if($data1['pickup_from']==6){ echo "Cruise";}
                                            if($data1['pickup_from']==7){ echo "Ferry";} 
                                            if($data1['pickup_from']==8){ echo "Kuala Lumpur";} 
                                            if($data1['pickup_from']==9){ echo "IPOH";} 
                                            
                                            ?> <?php 
                                            echo "(";
                                            if($data1['pickup_point']=='PA'){ echo "Penang Airport";}
                                            if($data1['pickup_point']=='PC'){ echo "Penang Coach Station";}
                                            if($data1['pickup_point']=='PR'){ echo "Penang Railway Station";}
                                            if($data1['pickup_point']=='CT'){ echo "Cruise Terminal";}
                                            if($data1['pickup_point']=='FT'){ echo "Ferry Terminal";}
                                            if($data1['pickup_point']=='KLIA'){ echo "KLIA";}
                                            if($data1['pickup_point']=='KLIA2'){ echo "KLIA2";}
                                            if($data1['pickup_point']=='KLCH'){ echo "KL City Hotels";}
                                            if($data1['pickup_point']=='IPA'){ echo "Airport";}
                                            if($data1['pickup_point']=='IPCH'){ echo "City Hotels";}
                                            if($data1['pickup_from']=='4'){ $sql12=mysql_query("SELECT  * FROM apmg_location where id='$data1[pickup_point]'");
                                                                    $name2 = mysql_fetch_array($sql12);
                                                                     echo $name2['location_name'];
                                                                }
                                            if($data1['pickup_from']=='5'){
                                        $s=mysql_query("SELECT  id,vname FROM venue_master where id='$data1[pickup_point]'");
                                        $na = mysql_fetch_array($s);
                                        echo $na['vname'];
                                        
                                    } echo ")";?> <i class="fa fa-arrow-right"></i> <?php 
                                        
                                        if($data1['drop_to']==1){ echo "Airport";}
                                        if($data1['drop_to']==2){ echo "Coach station";}
                                        if($data1['drop_to']==3){ echo "Railway Station";}
                                        if($data1['drop_to']==4){ echo "Hotel";}
                                        if($data1['drop_to']==5){ echo "Venue";}
                                        if($data1['drop_to']==6){ echo "Cruise";}
                                        if($data1['drop_to']==7){ echo "Ferry";}
                                        if($data1['drop_to']==8){ echo "Kuala Lumpur";} 
                                        if($data1['drop_to']==9){ echo "IPOH";} ?><?php 
                                        echo "(";
                                        if($data1['drop_point']=='PA'){ echo "Penang Airport";}
                                        if($data1['drop_point']=='PC'){ echo "Penang Coach Station";}
                                        if($data1['drop_point']=='PR'){ echo "Penang Railway Station";}
                                        if($data1['drop_point']=='CT'){ echo "Cruise Terminal";}
                                        if($data1['drop_point']=='FT'){ echo "Ferry Terminal";}
                                        
                                        if($data1['drop_point']=='KLIA'){ echo "KLIA";}
                                        if($data1['drop_point']=='KLIA2'){ echo "KLIA2";}
                                        if($data1['drop_point']=='KLCH'){ echo "KL City Hotels";}
                                        if($data1['drop_point']=='IPA'){ echo "Airport";}
                                        if($data1['drop_point']=='IPCH'){ echo "City Hotels";}
                                        if($data1['drrop_to']=='4'){    $sql12=mysql_query("SELECT  * FROM apmg_location where id='$data1[drop_point]'");
                                                                $name2 = mysql_fetch_array($sql12);
                                                                 echo $name2['location_name'];
                                                            }
                                        if($data1['drrop_to']=='5'){
                                        $s=mysql_query("SELECT  id,vname FROM venue_master where id='$data1[drop_point]'");
                                        $na = mysql_fetch_array($s);
                                        echo $na['vname'];echo ")";
                                        } echo ")";?></h4> 
                                         <ul class="list-inline order-details">
                                         
                                        <li><strong>Adults:</strong>  <?php echo $data['adult']; ?></li> 
                                        <li><strong>Childs:</strong>  <?php echo $data['child']; ?></li> 
                                            <!--<li> <?php echo $data['vehicle_name'];?></li>
                                        <li><strong> Adults <?php echo $data['adult']; ?></strong></li>
                                        <li><strong> Childs <?php echo $data['child']; ?></strong></li>-->
                                        
                                        <!--<li>Flight number <span class="QA_transfer_flightNumber"><?php //echo $data['arrival_name']; ?></span></li>
                                        <li>Flight Time <span class="QA_transfer_timeFrom"><?php //echo $data['fat']; ?>:<?php echo $data['fam']; ?></li></span>-->
                                        </ul>
                                    </li>
                                    <li class="col-sm-3 text-right">
                                        <h4 class="text-success">
                                        <i class="fa fa-car"></i> Transfer</h4>
                                        <a href="#">Pay to Apollo Asia</a>
                                    </li>
                                </ul>
                            </div>

                            
                            <div class="panel-body">
                                <div class="order-details">
                            <ul class="list-unstyled">
                            <li  class="col-sm-4"> Service Date: <?php echo $data['service_date']; $val=ceil(($ad+$ch)/9);   ?></li> 
                            <li class="col-sm-4">Vehicle Name:  <?php echo " ".$val." - ".$data['vehicle_name']; ?></li> 
                            
                            <li class="col-sm-4 text-right"> <strong><?php echo"MYR ".number_format(($data['service_price']+$data['markup']),2); ?></strong> </li> 

                            
                            </ul>
                            </div>
                                <h4 class="project-name">   
                                        <!--<span>Outbound</span>
                                        <span class="QA_transfer_dateFrom"><?php //echo $data['cd1']; ?></span>-->
                                        
                                               
                                             </h4>
                               <!-- <p class="alert alert-warning"><i class="fa fa-warning"></i> If the information is not accurate, the supplier is not responsible for the correct service provision.
                                </p>-->
                               
                                </div>
                           
                            <div class="panel-footer clearfix">
                                 <h4>Cancellation charges  <!--Outbound <span   data-toggle="tooltip" title="Date and time is calculated based on local time of destination." data-placement="top"><i class="fa fa-info"></i></span>--></h4>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled">
                                        <li>Until 23:59 PM on 30/06/2018
                                        <span class="pull-right badge">MYR <?php echo number_format(((($data['total_price'])*10)/100),2);  ?></span>
                                            <!--<span class="pull-right text-success"><i class="fa fa-check-circle"></i>Free</span>-->
                                        </li>
                                        <li>After 23:59 PM on 30/06/2018 
                                        <span class="pull-right badge">MYR <?php echo number_format(((($data['total_price'])*100)/100),2);  ?></span>
                                        <!--<span class="pull-right badge">53.84 S$</span>--></li>
                                    </ul>
                                <!-- <a href="cart_transfer.php?ide=<?php echo $i;//$data['pcode']; ?>&act=remove"><i class="fa fa-times"></i> Delete Product</a> 
                                <a href="#"><i class="fa fa-times"></i> Delete Product</a>-->
                               
                            </div>
                            <span class="pull-right lead">
                               <strong>Total MYR <?php echo number_format($data['total_price'],2); $to1+=($data['total_price']);?></strong></span>
                        </div>
                     </div>
                        <?php   } ?>
<!-- Transfer Start --> 
<!--Tour Start-->
                        <?php
                    $to2='';
        $select_transfer_detail=mysql_query("select * from apmg_order_detail_tour where order_id='$_GET[id]' and cusid='$_SESSION[id]'");
                    while($data=mysql_fetch_array($select_transfer_detail))
                    {
                        $pid=$data['ide']; 
                  
                  $sql=mysql_query("select a.* from apmg_mala_tourmaster a,apmg_mala_tourmaster_name b where a.cityid='6' and b.service_type='1' and a.tid='$pid'");
                  $row1=mysql_fetch_array($sql);
                  
                   $sql5=mysql_query("select * from apmg_mala_tourmaster_name where serviceid='$row1[tid]'"); 
                   $fetch5=mysql_fetch_array($sql5);?>
                    
                    
                        <div class="panel panel-default">
                            <div class="panel-heading clearfix">
                                <ul class="list-inline">
                                    <li class="col-sm-2"><img src="http://aatg.work/sms/myo/upload/<?php echo $fetch5['pic'];?>" class="img-responsive cart-thumbnail"></li>
                                    <li class="col-sm-7">
                                        <h4><?php echo $data['tt'];echo "&nbsp"; echo $data['vehicle_name'];?></h4>
                                        
                                    </li>
                                    <li class="col-sm-3 text-right">
                                        <h4 class="text-success">
    <i class="fa fa-car"></i> Tour</h4>
                                    </li>
                                    </ul>
                            </div>
                            
                            <div class="panel-body">
                                 
                            <div class="order-details">
                            <ul class="list-unstyled">
                            <li  class="col-sm-5">Service Date: <?php echo $data['service_date'];    ?></li> 
                            <li class="col-sm-3">Tour Type:  <?php echo $data['type']; ?></li> 
                            <li class="col-sm-2">Adults:  <?php echo $data['adult']; ?></li> 
                            <li class="col-sm-2">Childs:  <?php echo $data['child']; ?></li> 
                            
                            </ul>
                            </div>
                                <h4>Cancellation charges  <!--Outbound <span   data-toggle="tooltip" title="Date and time is calculated based on local time of destination." data-placement="top"><i class="fa fa-info"></i>--></span></h4>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled">
                                        <li>Until 23:59 PM on 25/10/2017
                                            <span class="pull-right badge">MYR <?php echo number_format(((($data['total_price'])*10)/100),2);  ?></span>
                                        </li>
                                        <li>After 23:59 PM on 25/10/2017 <span class="pull-right badge">MYR <?php echo number_format(((($data['total_price'])*100)/100),2);  ?></span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-footer clearfix">
                                <a href="tour_cart.php?id2=<?php echo $data['id']; ?>&act=remove"><i class="fa fa-times"></i> Delete Product</a>
                                <spn class="pull-right lead"> <strong>Total MYR <?php echo number_format($data['total_price'],2); $to2+=($data['total_price']);?></strong></span>
                            </div>
                        </div>
                <?php   } ?>
 

<?php
                        $tf=(($to+$to1+$to2)*2.5)/100;
                        $t=ceil($to+$to1+$to2+$tf);
                        $amnt=$t.'00';
                        $len=strlen($amnt);
                     
                        if($len==3)
                        {
                            $amount='000000000'.$amnt;
                        }
                        if($len==4)
                        {
                            $amount='00000000'.$amnt;
                        }
                        if($len==5)
                        {
                            $amount='0000000'.$amnt;
                        }
                        if($len==6)
                        {
                            $amount='000000'.$amnt;
                        }
                        if($len==7)
                        {
                            $amount='00000'.$amnt;
                        }
                        if($len==8)
                        {
                            $amount='0000'.$amnt;
                        }
                        if($len==9)
                        {
                            $amount='000'.$amnt;
                        }
                        if($len==10)
                        {
                            $amount='00'.$amnt;
                        }
                        if($len==11)
                        {
                            $amount='0'.$amnt;
                        }
                        if($len==12)
                        {
                            $amount=$amnt;
                        }
                         

                        $secureHash = '';
                        
$hashKey = "Y7UOKZN11BDLA2YJYSII135VFH7G0Q4R";
$mid     = "0000007860";
$invno   = $fetch['order_code'];
$amt     = $amount;

// hashing
$secureHash             = new SecureHash;
$secureHash->hashKey    = $hashKey;
$secureHash->merchantID = $mid;
$secureHash->invoiceNo  = $invno;
$secureHash->amount     = $amt;
$secureHash             = $secureHash->generate();

                        ?>
<form action="https://pcimdex.mpay.my/mdex2/payment/eCommerce" method="POST">
  <input type="hidden" name="secureHash" value="<?php  echo $secureHash; ?>">
  <input type="hidden" name="mid" value="0000007860">
  <input type="hidden" name="invno" value="<?php echo $fetch['order_code']; ?>">
  <input type="hidden" name="amt" value="<?php echo $amount; ?>">
  <input type="hidden" name="desc" value="APMG">
  <input type="hidden" name="postURL" value="http://apmg.apolloasiab2b.com/responce.php">
  <input type="hidden" name="phone" value="<?php echo $fetch['mobile']; ?>">
  <input type="hidden" name="email" value="<?php echo $fetch['email']; ?>">
  <input type="hidden" name="param" value="47630|P123">
  <?php
                        // input your value
                        
                        
                        ?>
  <div class="panel panel-default">
    <div class="panel-body">
      <h4 class="project-name">Passenger Details</h4>
      <div class="form-horizontal"> 
        <!-- <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="radio-inline">
                                                <input type="radio" name="test" checked="checked"  value="b" > Enter the lead passenger data only</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="test" value="a"> Enter the data for all passengers</label>
                                        </div>
                                    </div>-->
        <div id="Cars2" class="desc">
          <div class="form-group">
            <div class="col-sm-4">
              <label>Name</label>
              <?php echo $fetch['name'];  ?> </div>
            <div class="col-sm-4"> </div>
          </div>
          <div class="form-group">
            <div class="col-sm-4">
              <label>Email</label>
              <?php echo $fetch['email'];  ?> </div>
            <div class="col-sm-4"> </div>
          </div>
          <div class="form-group">
            <div class="col-sm-4">
              <label>Contact No</label>
              <?php echo $fetch['code'].' - '.$fetch['mobile'];  ?> </div>
            <div class="col-sm-4"> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Boking Confirmation -->
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
              <td align="right">MYR <?php echo $to+$to1+$to2; ?></td>
            </tr>
            <tr>
              <td class="services ">Transaction Fees</td>
              <td align="right">MYR <?php echo $tf=ceil((($to+$to1+$to2)*2.5)/100); ?></td>
            </tr>
            <!-- <tr>
                                                <td class="services ">Standard (Minivan)</td>
                                                <td align="right">53.84 S$</td>
                                            </tr>-->
            <tr class="total">
              <td class="services"><strong>Total</strong></td>
              <td align="right"><strong>MYR <?php echo number_format($to+$to1+$to2+$tf,2); ?></strong></td>
            </tr>
          </tbody>
        </table>
      </div>
      <h4 class="text-right"><strong>Total net price payable: <span class="leads">MYR <?php echo number_format($to+$to1+$to2+$tf,2); ?></span></strong></h4>
      <div class="panel-footer">
        <p class=" text-right ">
          <label class="checkbox-inline">
            <input type="checkbox" name="">
            I have read and accept the <a target="_blank" href="#">general terms</a> and <a href="#">cancellation policy conditions</a> </label>
        </p>
        <div class="action-button text-right">
          <input id="payButton" class="btn btn-primary btn-search " type="submit"  data-qa="pay-button" value="Pay now">
        </div>
      </div>
    </div>
    <!-- Boking Confirmation End --> 
  </div>
 
</form>
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
</body>
</html>
