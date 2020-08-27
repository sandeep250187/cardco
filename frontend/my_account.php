<?php
include "include/header.php";

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

?>
<div class="row bg-grey gap1">
    <div class="container gap">
        <div class="row">
            
            <div class="col-sm-3">
                <h4>Booking Number</h4>
                <ul class="list-unstyled">
                    <li class="searchs-details">
                        <div class="search-icon">
                            <input type="text=" class="form-control">
                        </div>
                    </li>
                </ul>
                <ul class="my-account">
                    
                    <li class="active"><a href="confirmed-last-30.html"><i class="fa fa-download"></i> Confirmed (Last 30 days)</a></li>
                    <li class="active"><a href="cancellation.html"><i class="fa fa-file-archive-o"></i>  Cancellation charges (Next 7 days)</a></li>
                    <li class="active"><a href="pending-payment.html"><i class="fa fa-file-archive-o"></i>Pending payment (Last 30 days)</a></li>
                    
                </ul>
            </div>
            <div class="col-sm-9">
                <div class="contact-form">
                    <form type="search" method="GET" action="" class="searchs">
                        <input name="by" type="hidden" value="2">
                        
                        
                        
                        <ul class="list-inline">
                            <li><label>Location :</label>
                            <div class="location">
                                <select type="search" class="form-control searchbox">
                                    <option>Penang</option>
                                </select>
                            </div>
                        </li>
                        
                        <li><label>By Booking  Date :</label><div class="dates"><input type="text" value="2018/09/01" class="form-control" id="from-date" name="cd">
                    </div>
                    </li> <li><label> By Checkin Date :</label><div class="dates"><input type="text" value="2018/09/02" class="form-control" id="to-date" name="cod"></div>
                </li>
                <!--    <li> <label>No Of Night:</label>    <div class="selects"> <select type="night" name="night" class="form-control searchbox1">                                        <option value="1"  >1</option>                                <option value="2"  >2</option>                                <option value="3"  >3</option>                                <option value="4"  >4</option>                                <option value="5"  >5</option>                                <option value="6"  >6</option>                                <option value="7"  >7</option>                                <option value="8"  >8</option>                                <option value="9"  >9</option>                                <option value="10"  >10</option>                                <option value="11"  >11</option>                                <option value="12"  >12</option>                                <option value="13"  >13</option>                                 </select></div>           </li>-->
                
                <li><label>&nbsp;</label>
                <button class="btn btn-primary btn-block btn-search" name="search">Search</button>
            </li>
        </ul>
    </form>
</div>
<!--   <div class="col-sm-12 my-account">
        <ul class="list-unstyled text-center">
                <li class=" col-sm-4 col-sm-offset-2"><div class="box1"><a href="view-invoice.html"><i class="fa fa-eye"></i>View Invoice</a></div></li>
        <li class="col-sm-4"><div class="box1"><a href="print-voucher.html"><i class="fa fa-print"></i>Print Hotel Voucher</a></div></li>
        </ul>
</div>-->
</div>
<div class="col-sm-12">
<div class="table-responsive">
    <table class="table table-condensed table-bordered">
        <thead>
            <tr>
                <td colspan="8">
                    <span class="project-name">Manage My Bookings</span>
                </td>
            </tr>
            <tr>
                <th><span></span></th>
                <th><span>Booking Number</span></th>
                <th>Guest Name</th>
                <th>Booking Date</th>
                
                
                <th  >Status</th>
                <th  >Total Amount</th>
                <th colspan="4">Action</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
        <?php
        $i=1;
        
        $select=mysql_query("select * from apmg_order_list where cus_id='$_SESSION[id]' order by id desc");
        while($fetch=mysql_fetch_array($select))
        {
        $t='';
        
        $select_detail=mysql_query("select * from apmg_order_detail_hotel where order_id='$fetch[id]'");
        //$tot='';
        while($data=mysql_fetch_array($select_detail))
        {
        $sql1=mysql_query("select h.id,h.hotelname,h.hotel_pic,t.child_breakfast from mala_hotelmaster h ,apmg_hotel_tariff_withoutshtl t where h.id=t.hotel_id  and t.id='$data[pid]'");
        $row1=mysql_fetch_array($sql1);
        
        $start = strtotime($data['cin']);
        $end = strtotime($data['cout']);
        $night = ceil(abs($end - $start) / 86400);
        
        $total=($data['room_price']+$data['markup'])*$data['noof_room']*$night+($row1['child_breakfast']*$data['child']);
        $tot=$tot+$total; echo "</bt>";
        //$tf=($tot*2.5)/100;
        }
        $select_transfer_detail=mysql_query("select * from apmg_order_detail_transfer where order_id='$fetch[id]' and cusid='$_SESSION[id]'");
        while($data=mysql_fetch_array($select_transfer_detail))
        {
        $to1+=($data['total_price']);echo "</bt>";
        }
        $select_transfer_detail2=mysql_query("select * from apmg_order_detail_tour where order_id='$fetch[id]' and cusid='$_SESSION[id]'");
        while($data=mysql_fetch_array($select_transfer_detail2))
        {
        $to2+=($data['total_price']);echo "</bt>";
        }
        $tf=(($tot+$to1+$to2)*2.5)/100;
        //echo "total=".ceil($tot+$to1+$to2);
        ?>
        <tbody>
            
            <tr>
                <!-- <td width="40%">
                    When making multi-reservation payments, it is not permitted to include bookings that have Cuba as destination.
                    <span>320-1107147</span>
                </td>-->
                <th><?php echo $i; ?></th>
                <td>
                    <span><?php echo $fetch['order_code']; ?></span>
                </td>
                <td>
                    <?php echo $fetch['name']; ?>
                </td>
                <td>
                    <?php echo $fetch['created_date']; ?>
                </td>
                
                <td>
                    <?php if($fetch['payment_status']!='S') { ?>
                    <span class="booking-state-symbol status-payment-pending">●</span>
                    <span class="booking-state-text"><span>Pending payment</span></span>
                    <?php } else { ?>
                    <span class="booking-state-symbol status-payment-done">●</span>
                    <span class="booking-state-text"><span>Payment Done </span></span>
                    
                    <?php } ?>
                </td>
                <td>
                    MYR <?php   $amount=number_format(ceil($tot+$to1+$to2+$tf),2);
                    echo $amount;    ?>
                </td>
                <td colspan="3"><div class="bnt-group bnt-group-sm">
                    <form  name="payment<?php echo $i; ?>"action="https://www.mdex.my/mdex/payment/eCommerce" method="POST">
                        <?php
                        if($fetch['booking_status']=='2')
                        {
                        echo "<b style='color:red'>Cancelled</b>";
                        }
                        else
                        {
                        ?>
                        <a href="cancel_booking.php?id=<?php echo $fetch['id']; ?>" target="_blank"  class="btn btn-xs btn-danger">Cancel</a><?php } ?>
                        <a href="view_detail.php?id=<?php echo $fetch['id']; ?>" target="_blank" class="btn btn-xs btn-warning">View </a>
                        <a href="invoice.php?id=<?php echo $fetch['id']; ?>" target="_blank" class="btn btn-xs btn-warning">Invoice </a>
                        <?php if($fetch['payment_status']!='S') {
                        
                        
                        $t=ceil($tot+$to1+$to2+$tf);
                        $amnt=$t.'00';
                        $len=strlen(ceil($amnt));
                        
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
                        
                        
                        // $hashKey = "Y7UOKZN11BDLA2YJYSII135VFH7G0Q4R";  for testing
                        // $mid     = "0000007860"; for test
                        $hashKey = "YELH6BCRKICN5BKK3LDKAZQ18NBYE7I4";
                        $mid     = "0000009572";
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
                        
                        
                        
                        <!-- <form action="https://pcimdex.mpay.my/mdex2/payment/eCommerce" method="POST">
                            <input type="hidden" name="mid" value="0000007860">
                            -->
                            <input type="hidden" name="secureHash" value="<?php  echo $secureHash; ?>">
                            <input type="hidden" name="mid" value="0000009572">
                            <input type="hidden" name="invno" value="<?php echo $fetch['order_code']; ?>">
                            <input type="hidden" name="amt" value="<?php echo $amount; ?>">
                            <input type="hidden" name="desc" value="APMG">
                            <input type="hidden" name="postURL" value="http://apmg.apolloasiab2b.com/responce.php">
                            <input type="hidden" name="phone" value="<?php echo $fetch['mobile']; ?>">
                            <input type="hidden" name="email" value="<?php echo $fetch['email']; ?>">
                            <input type="hidden" name="param" value="47630|P123">
                            <button class="btn btn-xs btn-primary" type="submit">Pay</button>
                            
                        </form>
                        
                        
                        <?php    } ?>
                    </td>
                    
                    
                </tr>
                
                
            </tbody>
            
            <?php
            $i++;
            $tot=''; $to1='';$to2='';
            
            
            
            }
            
            ?>
        </table>
    </div>
</div>
</div>
</div>
</div>
</div>
 
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
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
$(document).ready(function() {
$(".owl-carousel").owlCarousel({
items: 1,
});
});
</script>
<script>
$(document).ready(function () {

$("#from-date").datepicker({
// minDate:<?php echo $d1;  ?>,
// maxDate:<?php echo $d2;  ?>,
dateFormat: "yy/mm/dd",
minDate: 0,
onSelect: function (date) {
var date2 = $('#from-date').datepicker('getDate');
date2.setDate(date2.getDate() + 1);
$('#to-date').datepicker('setDate', date2);
//sets minDate to dt1 date + 1
$('#to-date').datepicker('option', 'minDate', date2);
setTimeout(function(){
$( "#to-date" ).datepicker('show');
}, 16);
}
});
$('#to-date').datepicker({
// minDate:<?php echo $d1;  ?>,
// maxDate:<?php echo $d2;  ?>,
dateFormat: "yy/mm/dd",
onClose: function () {
var dt1 = $('#from-date').datepicker('getDate');
console.log(dt1);
var dt2 = $('#to-date').datepicker('getDate');
if (dt2 <= dt1) {
var minDate = $('#to-date').datepicker('option', 'minDate');
$('#to-date').datepicker('setDate', minDate);
}
}
});
});



</script>
</body>
</html>