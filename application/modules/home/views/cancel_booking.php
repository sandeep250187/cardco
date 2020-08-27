 <?php 
include "include/header.php";



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

<div class="panel panel-default">
    <div class="panel-body">
      <h4 class="project-name">Passenger Details</h4>
      <div class="form-horizontal"> 
        
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

<!-- Hotel Start -->
<div class="panel panel-default">

<div class="panel-body">
  
  <h4>Cancellation charges — Outbound <span   data-toggle="tooltip" title="Date and time is calculated based on local time of destination." data-placement="top"><i class="fa fa-info"></i></span></h4>
  <div class="col-sm-6">
    <ul class="list-unstyled">
      <li>Until 23:59 PM on 31/03/2018 
        <!--<span class="pull-right text-success"><i class="fa fa-check-circle"></i>Free</span>--> 
        <span class="pull-right badge">10 %</span> </li>
      <li>After 23:59 PM on 31/03/2018 <span class="pull-right badge">100 %</span></li>
    </ul>
  </div>
</div>
<div class="panel-footer clearfix"> 
  <!--   <a href="#"><i class="fa fa-times"></i> Delete Product</a>-->
  <spn class="pull-right lead">
  <strong>Total MYR <?php echo  $total=($data['room_price']+$data['markup'])*$data['noof_room']*$night; 
                   $to=$to+$total;
                   ?> </strong></span> </div>
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
      <h4 class="text-right"><strong>Total net price to pay to Apollo Holidays: <span class="leads">MYR <?php echo number_format($to+$tf,2); ?></span></strong></h4>
     
    </div>
    <!-- Boking Confirmation End --> 
  </div>
  
  
  <div class="panel panel-default">
    <div class="panel-body">
      <p class="project-name">Are You Sure You Want To Cancel This Booking</p>
      <div class="table-responsive">
        <table class="table table-condensed">
          <tbody>
            <tr>
              <td class="services"> <button class="btn btn-xs btn-danger" style="height:50px;width:250px;cursor:pointer;align:center;" onClick="if(confirm('Are You Sure U want to Delete...')){javascript:window.location='change_status.php?id=<?php echo $fetch['id'];?>&cust_id=<?=$_SESSION['id'];?>';}" />Continue</button></td>             
            </tr>
          </tbody>
        </table>
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
