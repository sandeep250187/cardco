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
<div class="col-sm-10 col-sm-offset-1">
  <h4>ORDER CODE:- <?PHP echo $fetch['order_code']; ?></h4>
</div>
<div class="col-sm-10 col-sm-offset-1">
<?php
                    $to='';
        $select_detail=mysql_query("select * from apmg_order_detail_transfer where order_id='$_GET[id]' and cusid='$_SESSION[id]'");
while($data=mysql_fetch_array($select_detail))
        {
         $start = strtotime($data['cin']);
$end = strtotime($data['cout']);

  $night = ceil(abs($end - $start) / 86400);     
   $pid=$data['pid']; 
                  
                  $sql1=mysql_query("select h.id,h.hotelname,h.hotel_pic from mala_hotelmaster h ,apmg_hotel_tariff_withoutshtl t where h.id=t.hotel_id  and t.id='$pid'");  
                  $row1=mysql_fetch_array($sql1);
        ?>
<!-- Hotel Start --/>
<div class="panel panel-default">
<div class="panel-heading clearfix">
<ul class="list-inline">
<li class="col-sm-2"><img src="http://aatg.work/my/upload/<?php echo $row1['hotel_pic'];  ?>" class="img-responsive cart-thumbnail"></li>
<li class="col-sm-7">
  <h4>
    <?php
                  echo $row1['hotelname'];
                  
                  ?>
  </h4>
  <ul class="list-unstyled">
    <li><strong><?php echo $data['adult']; ?> Adults</strong></li>
    <li><strong><?php echo $data['child']; ?> Childs</strong></li>
  </ul>
</li>
<li class="col-sm-3 text-right">
  <h4 class="text-success"> <i class="fa fa-building"></i> Transfer</h4>
  <a href="#">Pay to Apollo Asia</a> </li>
  </ul>
</div>
<div class="panel-body">
  <h4 class="project-name">
    <?php
                    ?>
  </h4>
  <h4>Cancellation charges — Outbound <span   data-toggle="tooltip" title="Date and time is calculated based on local time of destination." data-placement="top"><i class="fa fa-info"></i></span></h4>
  <div class="col-sm-6">
    <ul class="list-unstyled">
      <li>Until 23:59 PM on 31/03/2018 
        <!--<span class="pull-right text-success"><i class="fa fa-check-circle"></i>Free</span>--/> 
        <span class="pull-right badge">10 %</span> </li>
      <li>After 23:59 PM on 31/03/2018 <span class="pull-right badge">100 %</span></li>
    </ul>
  </div>
</div>
<div class="panel-footer clearfix"> 
  <!--   <a href="#"><i class="fa fa-times"></i> Delete Product</a>--/>
  <spn class="pull-right lead">
  <strong>Total MYR <?php echo  $total=($data['service_price']+$data['markup']); 
                   $to=$to+$total;
                   ?> </strong></span> </div>
</div>
<?php  } ?>
<!-- Hotel End --> 

<!-- Transfer Start --> 
<?php
                    $to='';
        $select_detail=mysql_query("select * from apmg_order_detail_transfer where order_id='$_GET[id]' and cusid='$_SESSION[id]'");
while($data=mysql_fetch_array($select_detail))
        { ?>
<div class="panel panel-default">
                            <div class="panel-heading clearfix">
                                <ul class="list-inline">
                                    <li class="col-sm-2"><img src="images/banner2.jpg" class="img-responsive cart-thumbnail"></li>
                                    <li class="col-sm-7">
                                        <h4>Offer Special: Full Day Lembongan Reef Cruise</h4>
                                        <ul class="list-unstyled">
                                            <li><strong><?=$data['adult'];?>Adults</strong></li>
											<li><strong><?=$data['child'];?>Child</strong></li>
                                            <!--<li><strong>
Route</strong>: Singapore, Changi International Airport <i class="fa fa-arrow-right"></i> Cameron</li>-->
                                        </ul>
                                    </li>
                                    <li class="col-sm-3 text-right">
                                        <h4 class="text-success">
    <i class="fa fa-car"></i> Transfer</h4>
                                    </li>
                            </div>
                            <div class="panel-body">
                                <h4 class="project-name">   
                                        <span>Outbound</span>
                                        <span class="QA_transfer_dateFrom"><?=$data['service_date'];?></span>
                                        , Arrival time <span class="QA_transfer_timeFrom">16:10</span>
                                                    , Flight number <span class="QA_transfer_flightNumber">BA026</span>
                                                <span class="pull-right small"><strong>53.84 S$</strong></span>
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
                                <a href="#"><i class="fa fa-times"></i> Delete Product</a>
                                <spn class="pull-right lead"><strong>Total 53.84 S$</strong></span>
                            </div>
                        </div>
		<?php }?>

<!-- Transfer End -->

<?php
                        $tf=($to*2.5)/100;
                        $t=ceil($to+$tf);
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
              <td align="right"><strong>MYR <?php echo number_format($to+$tf,2); ?></strong></td>
            </tr>
          </tbody>
        </table>
      </div>
      <h4 class="text-right"><strong>Total net price payable: <span class="leads">MYR <?php echo number_format($to+$tf,2); ?></span></strong></h4>
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
