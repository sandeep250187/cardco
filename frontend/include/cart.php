<?php include "include/header.php";
?>
		
		
		
        <div class="row bg-grey gap">
            <div class="container gap1">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
					<?php
					$to='';
		foreach($_SESSION['cart-hotel'] as $data) 
		{
			 
		?>
   <!-- Hotel Start -->
                        <div class="panel panel-default">
                            <div class="panel-heading clearfix">
                                <ul class="list-inline">
                                    <li class="col-sm-2"><img src="images/banner2.jpg" class="img-responsive cart-thumbnail"></li>
                                    <li class="col-sm-7">
                                        <h4><?php $pid=$data['pid']; 
				  
				  $sql1=mysql_query("select h.id,h.hotelname from mala_hotelmaster h ,apmg_hotel_tariff_withoutshtl t where h.id=t.hotel_id  and t.id='$pid'");  
				  $row1=mysql_fetch_array($sql1);
				  echo $row1['hotelname'];
				  
				  ?></h4>
                                        <ul class="list-unstyled">
                                            <li><strong><?php echo $data['adult']; ?> Adults</strong></li>
											   <li><strong><?php echo $data['child']; ?> Childs</strong></li>
                                            
                                        </ul>
                                    </li>
                                    <li class="col-sm-3 text-right">
                                        <h4 class="text-success">
    <i class="fa fa-building"></i> Hotel</h4>
    <a href="#">Pay to Apollo Asia</a>
                                    </li>
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
				  echo $data['room'].' * '.$rt.' '.$rc;  ?>
                                             </h4>
                                 
                                <h4>Cancellation charges — Outbound <span   data-toggle="tooltip" title="Date and time is calculated based on local time of destination." data-placement="top"><i class="fa fa-info"></i></span></h4>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled">
                                        <li>Until 23:59 PM on 25/10/2017
                                            <span class="pull-right text-success"><i class="fa fa-check-circle"></i>Free</span>
                                        </li>
                                        <li>After 23:59 PM on 25/10/2017 <span class="pull-right badge">MYR 50</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-footer clearfix">
                                <a href="#"><i class="fa fa-times"></i> Delete Product</a>
                                <spn class="pull-right lead"><strong>Total MYR <?php echo  $total=($data['price']+$data['markup'])*$data['room']; 
				   $to=$to+$total;
				   ?> </strong></span>
                            </div>
                        </div>
                        
		<?php  } ?>
                        <!-- Hotel End -->
						

                        
<!-- Transfer Start -->
                       <!-- <div class="panel panel-default">
                            <div class="panel-heading clearfix">
                                <ul class="list-inline">
                                    <li class="col-sm-2"><img src="images/banner2.jpg" class="img-responsive cart-thumbnail"></li>
                                    <li class="col-sm-7">
                                        <h4>Offer Special: Full Day Lembongan Reef Cruise</h4>
                                        <ul class="list-unstyled">
                                            <li><strong>2 Adults</strong></li>
                                            <li><strong>
Route</strong>: Singapore, Changi International Airport <i class="fa fa-arrow-right"></i> Cameron</li>
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
                                        <span class="QA_transfer_dateFrom">28/10/2017</span>
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
                        -->

                        <!-- Transfer End -->

						
						
						
						
						<form name="form" method="POST" action="">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h4 class="project-name">Passenger Details</h4>
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="radio-inline">
                                                <input type="radio" name="test" checked="checked"  value="b" > Enter the lead passenger data only</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="test" value="a"> Enter the data for all passengers</label>
                                        </div>
                                    </div>
                                    <div id="Cars2" class="desc">
                                    <h5><strong>Lead passenger</strong>
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
</div>
    <div id="show-me" style="display: none;">
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
                                            <input type="text" name="" class="form-control input-sm">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Surname</label>
                                            <input type="text" name="" class="form-control input-sm">
                                        </div>
                                    </div>
                                </div>
                                    <h4 class="project-name">Contact Details</h4>
                                    <div class="form-group">
                                        <div class="col-sm-4 form-inline">
                                            <label>Mobile No. <small>(Compulsory)</small></label>
                                            <br>
                                            <select class="form-control input-sm">
                                                <option>Country Code</option>
                                            </select>
                                            <input type="text" name="" class="form-control input-sm">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Email <small>(Optional)</small></label>
                                            <input type="text" name="" class="form-control input-sm">
                                        </div>
                                    </div>
                                    <p>If you would like to receive more information, please provide your contact details.
                                    </p>
                                   
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
                                                <td class="services ">Hotel</td>
                                                <td align="right">MYR <?php echo $to; ?></td>
                                            </tr>
                                           <!-- <tr>
                                                <td class="services ">Standard (Minivan)</td>
                                                <td align="right">53.84 S$</td>
                                            </tr>-->
                                            <tr class="total">
                                                <td class="services"><strong>Total</strong></td>
                                                <td align="right"><strong>MYR <?php echo $to; ?></strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <h4 class="text-right"><strong>Total net price to pay to Apollo Holidays: <span class="leads">MYR <?php echo $to; ?></span></strong></h4>
                                <hr>
                                <div class="payment-deadline-content">
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
                            </div>
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
 <input id="confirmButton" class="btn btn-primary btn-search " type="submit" value="Book now, Pay later">
                                    <input id="payButton" class="btn btn-primary btn-search " type="submit" data-qa="pay-button" value="Checkout">
                                   
                                </div>
                          
                     
                </div>
            </div>
                <!-- Boking Confirmation End -->
            </div>
        </div>
    </div>
	</form>
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