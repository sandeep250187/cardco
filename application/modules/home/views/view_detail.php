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
<div class="row">
 
<div class="col-sm-12">
<?php
                    $to='';
        $select_detail1=mysql_query("select distinct pid from apmg_order_detail_hotel where order_id='$_GET[id]' and cusid='$_SESSION[id]'");
		//echo "num=".$m=mysql_num_rows($select_detail1);
while($data1=mysql_fetch_array($select_detail1))
        {
         
   $pid=$data1['pid']; 
                  
                  $sql1=mysql_query("select h.id,h.hotelname,h.hotel_pic,t.child_breakfast  from mala_hotelmaster h ,apmg_hotel_tariff_withoutshtl t where h.id=t.hotel_id  and t.id='$pid'");  
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
  <p>ORDER CODE: <?PHP echo $fetch['order_code']; ?></p>
  <!--<ul class="list-unstyled">
    <li><strong><?php echo $data['adult']; ?> Adults</strong></li>
    <li><strong><?php echo $data['child']; ?> Childs</strong></li>
  </ul>-->
</li>
<li class="col-sm-3 text-right">

  <h4 class="text-success"> <i class="fa fa-building"></i> Hotel</h4>
  <a href="voucher.php?id=<?php echo $_GET['id'];  ?>&bid=<?php echo $data1['id']; ?>&pid=<?php echo $data1['pid']; ?>" target="_blank">Generate Hotel Voucher</a> </li>
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
                  echo $data['noof_room'].' * '.$rt.' '.$rc;  ?>
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
  <!--   <a href="#"><i class="fa fa-times"></i> Delete Product</a>-->
<div class="col-sm-9">

<h4>Cancellation charges — Hotels <span   data-toggle="tooltip" title="Date and time is calculated based on local time of destination." data-placement="top"><i class="fa fa-info"></i></span></h4>
  <div class="">
    <ul class="list-unstyled">
     <li>Until 23:59 PM on 31/03/2018 
        <!--<span class="pull-right text-success"><i class="fa fa-check-circle"></i>Free</span>--> 
        <span class="pull-right badge">MYR <?php echo number_format((($total*10)/100),2);  ?></span> </li>
      <li>After 23:59 PM on 31/03/2018 <span class="pull-right badge">MYR <?php echo number_format((($total*100)/100),2);  ?></span></li>
    </ul>

  </div>
</div>

  <div class="col-sm-3">
  <span class="pull-right lead">
  <strong>Total : MYR <?php echo  $t; 
                   $to=$to+$t;
                   ?> </strong></span> 
                 </div>
</div>
 
 </div>

<?php  } ?>








<?php
                    $to='';
       $select_detail_transfer=mysql_query("select* from apmg_order_detail_transfer where order_id='$_GET[id]' and cusid='$_SESSION[id]'");
	    $count_transfer=mysql_num_rows(mysql_query("select* from apmg_order_detail_transfer where order_id='$_GET[id]' and cusid='$_SESSION[id]'"));
		if($count_transfer!='0')
		{
while($data1=mysql_fetch_array($select_detail_transfer))
        {
			$ad=$data1['adult']; $ch=$data1['child'];
			$val=ceil(($ad+$ch)/9);
         
   $pid=$data1['pid']; 
                  
                  
        ?>
<!-- Hotel Start -->
<div class="panel panel-default">
<div class="panel-heading clearfix">
<ul class="list-inline">
<li class="col-sm-2">
<?php if($data1['vehicle_name']=="CAR"){?><img src="images/car1.jpg" class="img-responsive cart-thumbnail"/><?PHP } else {?><img src="images/van1.jpg" class="img-responsive cart-thumbnail"/><?php }?>
<!--<img src="http://supplier.apolloasiab2b.com/transport/upload/<?php echo $row1['hotel_pic'];  ?>" class="img-responsive cart-thumbnail">-->

</li>
<li class="col-sm-7">
  <h4>
    
  </h4>
  <?php $pid=$data1['pid']; 
    
	$select=mysql_query("select * from transfer_tariff_master where id='$pid'");
$data=mysql_fetch_array($select);?>
 <ul class="list-unstyled">
   <li class="col-xs-12"> <h4> <?php 
											if($data['pickup_from']==1){ echo "Airport";}
											if($data['pickup_from']==2){ echo "Coach station";}
											if($data['pickup_from']==3){ echo "Railway Station";}
											if($data['pickup_from']==4){ echo "Hotel";}
											if($data['pickup_from']==5){ echo "Venue";}
											if($data['pickup_from']==6){ echo "Cruise";}
											if($data['pickup_from']==7){ echo "Ferry";}
											if($data['pickup_from']==8){ echo "Kuala Lumpur";} 
											if($data['pickup_from']==9){ echo "IPOH";} 
											?> <?php 
											echo "(";
											if($data['pickup_point']=='PA'){ echo "Penang Airport";}
											if($data['pickup_point']=='PC'){ echo "Penang Coach Station";}
											if($data['pickup_point']=='PR'){ echo "Penang Railway Station";}
											if($data['pickup_point']=='CT'){ echo "Cruise Terminal";}
											if($data['pickup_point']=='FT'){ echo "Ferry Terminal";}
											if($data['pickup_point']=='KLIA'){ echo "KLIA";}
											if($data['pickup_point']=='KLIA2'){ echo "KLIA2";}
											if($data['pickup_point']=='KLCH'){ echo "KL City Hotels";}
											if($data['pickup_point']=='IPA'){ echo "Airport";}
											if($data['pickup_point']=='IPCH'){ echo "City Hotels";}
											if($data['pickup_from']=='4'){	$sql12=mysql_query("SELECT  * FROM apmg_location where id='$data[pickup_point]'");
																	$name2 = mysql_fetch_array($sql12);
																	 echo $name2['location_name'];
																}
											if($data['pickup_from']=='5'){
										$s=mysql_query("SELECT  id,vname FROM venue_master where id='$data[pickup_point]'");
										$na = mysql_fetch_array($s);
										echo $na['vname'];
										
									} echo ")";?> <i class="fa fa-arrow-right"></i> <?php 
										
										if($data['drop_to']==1){ echo "Airport";}
										if($data['drop_to']==2){ echo "Coach station";}
										if($data['drop_to']==3){ echo "Railway Station";}
										if($data['drop_to']==4){ echo "Hotel";}
										if($data['drop_to']==5){ echo "Venue";}
										if($data['drop_to']==6){ echo "Cruise";}
										if($data['drop_to']==7){ echo "Ferry";} 
										if($data['drop_to']==8){ echo "Kuala Lumpur";} 
										if($data['drop_to']==9){ echo "IPOH";}
										?><?php 
										echo "(";
										if($data['drop_point']=='PA'){ echo "Penang Airport";}
										if($data['drop_point']=='PC'){ echo "Penang Coach Station";}
										if($data['drop_point']=='PR'){ echo "Penang Railway Station";}
										if($data['drop_point']=='CT'){ echo "Cruise Terminal";}
										if($data['drop_point']=='FT'){ echo "Ferry Terminal";}
										if($data['drop_point']=='KLIA'){ echo "KLIA";}
										if($data['drop_point']=='KLIA2'){ echo "KLIA2";}
										if($data['drop_point']=='KLCH'){ echo "KL City Hotels";}
										if($data['drop_point']=='IPA'){ echo "Airport";}
										if($data['drop_point']=='IPCH'){ echo "City Hotels";}
										if($data['drrop_to']=='4'){	$sql12=mysql_query("SELECT  * FROM apmg_location where id='$data[dp]'");
																$name2 = mysql_fetch_array($sql12);
																 echo $name2['location_name'];
															}
										if($data['drrop_to']=='5'){
										$s=mysql_query("SELECT  id,vname FROM venue_master where id='$data[dp]'");
										$na = mysql_fetch_array($s);
										echo $na['vname'];echo ")";
										} echo ")";?></h4></li></ul>
  <p>ORDER CODE: <?PHP echo $fetch['order_code']; ?></p>
  <!--<ul class="list-unstyled">
    <li><strong><?php echo $data['adult']; ?> Adults</strong></li>
    <li><strong><?php echo $data['child']; ?> Childs</strong></li>
  </ul>-->
</li>
<li class="col-sm-3 text-right">

  <h4 class="text-success"> <i class="fa fa-building"></i> Transfer</h4>
  <a href="voucher.php?id=<?php echo $_GET['id'];  ?>&bid=<?php echo $data1['id']; ?>&pid=<?php echo $data1['pid']; ?>" target="_blank">Generate Transfer Voucher</a> </li>
</ul>
</div>


  </h4>
  <div class="order-details">
  <ul class="list-unstyled">
           
			<li class="col-sm-3"> Service Date: <strong> <?php echo $data1['service_date'];  ?></strong></li>
			<li class="col-sm-3"> Vehicle Name: <strong> <?php echo " ".$val." - ". $data1['vehicle_name'];  ?></strong></li>
            <li class="col-sm-2"> Adult: <strong> <?php echo $data1['adult'];  ?></strong></li>
            <li class="col-sm-2"> Child:<strong> <?php echo $data1['child'];  ?></strong> </li>
            <li class="col-sm-2"> Price:<strong> MYR <?php echo $data1['total_price'];  $tot_trans=$tot_trans+$data1['total_price'];  ?></strong> </li>
          </ul>
</div>
		
		
		
		
  
  
  
  
  
  
 </div>
<div class="panel-footer clearfix"> 
  <!--   <a href="#"><i class="fa fa-times"></i> Delete Product</a>-->
<div class="col-sm-9">

<h4>Cancellation charges — Hotels <span   data-toggle="tooltip" title="Date and time is calculated based on local time of destination." data-placement="top"><i class="fa fa-info"></i></span></h4>
  <div class="">
    <ul class="list-unstyled">
     <li>Until 23:59 PM on 31/03/2018 
        <!--<span class="pull-right text-success"><i class="fa fa-check-circle"></i>Free</span>--> 
        <span class="pull-right badge">MYR <?php echo number_format((($data1['total_price']*10)/100),2);  ?></span> </li>
      <li>After 23:59 PM on 31/03/2018 <span class="pull-right badge">MYR <?php echo number_format((($data1['total_price']*100)/100),2);  ?></span></li>
    </ul>

  </div>
</div>

  <div class="col-sm-3">
  <span class="pull-right lead">
  <strong>Total : MYR <?php echo  $data1['total_price']; 
                   //$to=$to+$t;
                   ?> </strong></span> 
                 </div>
</div>
 
 </div>

		<?php  }  } ?>
</br></br>
<!---Tour Start--->
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
                            </div>
							<div class="order-details">
							<ul class="list-unstyled">
							<li  class="col-sm-5">Service Date: <?php echo $data['service_date'];    ?></li> 
							<li class="col-sm-3">Tour Type:  <?php echo $data['type']; ?></li> 
							<li class="col-sm-2">Adults:  <?php echo $data['adult']; ?></li> 
							<li class="col-sm-2">Childs:  <?php echo $data['child']; ?></li> 
							
							</ul>
							</div>
                            <div class="panel-body">
                                 
                            
                                <h4>Cancellation charges — Outbound <span   data-toggle="tooltip" title="Date and time is calculated based on local time of destination." data-placement="top"><i class="fa fa-info"></i></span></h4>
                                <div class="col-sm-9">
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
                                <span class="pull-right lead"> <strong>Total MYR <?php echo number_format($data['total_price'],2); $to2+=($data['total_price']);?></strong></span>
                            </div>
                        </div>
				<?php   } ?>
						<?php/*
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
                                <a href="tour_cart.php?id2=<?php echo $data['id']; ?>&act=remove"><i class="fa fa-times"></i> Delete Product</a>
                                <spn class="pull-right lead"> <strong>Total MYR <?php echo number_format($data['total_price'],2); $to2+=($data['total_price']);?></strong></span>
                            </div>
                        </div>
				<?php   } */?>
						<!--End Tour--->






 
 
  <div class="panel panel-default">
    <div class="panel-body">
      <h4 class="project-name"><strong>Passenger Details</strong></h4>
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
      <h4 class="project-name"><strong>Booking Confirmation</strong></h4>
      <div class="table-responsive">
        <table class="table table-condensed">
          <tbody>
            <tr>
              <td class="services"><strong>Services</strong></td>
              <td align="right"><strong>Net Price</strong></td>
            </tr>
            <tr>
              <td class="services ">Hotel Total Price</td>
              <td align="right">MYR <?php echo $t+$tot_trans+$to2; ?></td>
            </tr>
            <tr>
              <td class="services ">Transaction Fees</td>
              <td align="right">MYR <?php echo $tf=ceil((($t+$tot_trans+$to2)*2.5)/100); ?></td>
            </tr>
            <!-- <tr>
                                                <td class="services ">Standard (Minivan)</td>
                                                <td align="right">53.84 S$</td>
                                            </tr>-->
            <tr class="total">
              <td class="services"><strong>Total</strong></td>
              <td align="right"><strong>MYR <?php echo number_format($t+$tot_trans+$to2+$tf,2); ?></strong></td>
            </tr>
          </tbody>
        </table>
      </div>
      <h4 class="text-right"><strong>Total net price to pay to Apollo Holidays: <span class="leads">MYR <?php echo number_format($t+$tot_trans+$to2+$tf,2); ?></span></strong></h4>
      
      <!--  <div class="panel-footer">
                                <p class=" text-right ">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name=""> I have read and accept the <a target="_blank" href="#">general terms</a> and
                                        <a href="#">cancellation policy conditions</a>
                                    </label>
                                </p>
                                
                                <div class="action-button text-right">
                                     
 
                                    <input id="payButton" class="btn btn-primary btn-search " type="submit"  data-qa="pay-button" value="Pay now">
                                   
                                </div>
                          
                     
                </div>--> 
    </div>
    <!-- Boking Confirmation End --> 
  </div>
  
</form>
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
</body>
</html>
