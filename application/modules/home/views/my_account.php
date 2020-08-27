<?php  $this->load->view('header'); ?>
  
<div class="row bg-grey">
    <div class="container">
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
                    <li class="active"><a href="<?php echo base_url();?>user"><i class="fa fa-user"></i> My Profile</a></li> 
					<li class="active"><a href="<?php echo base_url();?>user/editprofile"><i class="fa fa-user"></i> Edit Profile</a></li>
					<li class="active"><a href="confirmed-last-30.html"><i class="fa fa-download"></i> Confirmed (Last 30 days)</a></li>
                    <li class=""><a href="cancellation.html"><i class="fa fa-file-archive-o"></i>  Cancellation charges (Next 7 days)</a></li>
                    <li class=""><a href="pending-payment.html"><i class="fa fa-file-archive-o"></i>Pending payment (Last 30 days)</a></li>
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
									  </li> 
									  <li><label> By Checkin Date :</label><div class="dates"><input type="text" value="2018/09/02" class="form-control" id="to-date" name="cod"></div>
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
										 
                                        <tbody>
										 <tr>
                                               <!-- <td width="40%">
                                                    When making multi-reservation payments, it is not permitted to include bookings that have Cuba as destination.
                                                    <span>320-1107147</span>
                                                </td>-->
												<th><?php //echo $i; ?></th>
                                                <td>
                                                    <span><?php //echo $fetch['order_code']; ?></span>
                                                </td>
                                                <td>
                                                    <?php //echo $fetch['name']; ?>
                                                </td>
                                                <td>
                                                   <?php //echo $fetch['created_date']; ?>
                                                </td>
                                                 
                                                <td>
												<?php //if($fetch['payment_status']!='S') { ?>
                                                    <span class="booking-state-symbol status-payment-pending">●</span>
                                                    <span class="booking-state-text"><span>Pending payment</span></span>
												 
												<span class="booking-state-symbol status-payment-done">●</span>
                                                    <span class="booking-state-text"><span>Payment Done </span></span>
												
												 
                                                </td>
												 <td>
                                                   MYR  
                                                </td>
												 <td colspan="3"><div class="bnt-group bnt-group-sm">
												 <form  name="payment<?php //echo $i; ?>"action="https://www.mdex.my/mdex/payment/eCommerce" method="POST">
										 								  
								   <a href="cancel_booking.php?id= " target="_blank"  class="btn btn-xs btn-danger">Cancel</a> 
                                  <a href="view_detail.php?id= " target="_blank" class="btn btn-xs btn-warning">View </a>
								   <a href="invoice.php?id= " target="_blank" class="btn btn-xs btn-warning">Invoice </a> 
 		                        
<!-- <form action="https://pcimdex.mpay.my/mdex2/payment/eCommerce" method="POST">
<input type="hidden" name="mid" value="0000007860">
-->

<input type="hidden" name="secureHash" value="">
<input type="hidden" name="mid" value="0000009572">
<input type="hidden" name="invno" value=""> 
<input type="hidden" name="amt" value=""> 
<input type="hidden" name="desc" value="APMG"> 
<input type="hidden" name="postURL" value="http://apmg.apolloasiab2b.com/responce.php"> 
<input type="hidden" name="phone" value=""> 
<input type="hidden" name="email" value=""> 
<input type="hidden" name="param" value="47630|P123"> 
 <button class="btn btn-xs btn-primary" type="submit">Pay</button>
												
                                  </form>
									</td>
								  </tr>
								</tbody>
							 </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     
    </div>
	<?php $this->load->view('footer'); ?>

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