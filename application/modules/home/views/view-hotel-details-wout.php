<?php  
$this->load->view('header');
 ?>
<script>
function change() {
document.getElementById( "register" ).submit();
}
</script>
 
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<!-- Modal//cartModal -->
<?php //include "cart-item.php"; ?>
<!-- End Cart Modal -->
 
<div class="row page-heads" id="contents">
  <div class="container">
    <form type="search" method="POST" action="" class="searchs col-sm-10 offset-md-1">
      <input name="by" type="hidden" value="1"/>
      <div class="selection clearfix">
        <div class="row">
          <div class="col-sm-3 pr-1 pl-1">
            <div class="styled-select-small">
              <div class="position-absolute"><i class="fa fa-search"></i></div>
              <input type="text" placeholder="Where are you going?" class="form-control" name="">
              
            </div>
          </div>
          <div class="col-sm-3 pr-1 pl-1">
            <div class="styled-select-small">
              <div class="position-absolute"><i class="fa fa-calendar"></i></div>
              <input type="text" id="datepicker" class="form-control" name="">
            </div>
          </div>
          <div class="col-sm-3 pr-1 pl-1">
            <div class="styled-select-small">
              <div class="position-absolute"><i class="fa fa-user"></i></div>
              <input type="text" class="form-control" name="" placeholder="2 Room 6 Guest">
            </div>
          </div>
          <div class="col-sm-3 pr-1 pl-1">
            <button type="submit"  name="search" class="btn btn-primary btn-search search-transfer  btn-block"> <i class="fa fa-search"></i> Find Hotel</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<div class="row content">
  <div class="container">
    <div class="row">
      
      <div class="col-sm-8">
	    <?php
		// $htlid=$this->input->get('id');
		   $hotelList = getHotelDetailsById($htlid);
			if(!empty($hotelList)){
			foreach($hotelList as $htlList){
		 ?>
        <h2 class="tour-name"> <a href="#">
          <i class="fa fa-building-o"></i> <?php echo $htlList['hotelname']; ?> <span> <?php echo $htlList['address'];  ?> </span> </a></h2>
			<?php } } ?>
           
           <div class="bg-secondary pl-4 pr-4 pt-2">
            <form  name="register" id="register" type="search" method="REQUEST" action="" class="row searchs-details">
              <input name="by" type="hidden" value="2" />
              
              
              <div class="col-sm-2 pr-1 pl-1">
                
                <div class="dates">
                  <input type="text" placeholder="from"   class="form-control" id="from-date" name="cindate">
                </div>
              </div>
              <div class="col-sm-2 pr-1 pl-1">
                
                <div class="dates">
                  <input type="text" placeholder="to"    class="form-control" id="to-date" name="coutdate">
                </div>
              </div>
              <div class="col-sm-2 pr-1 pl-1">
                
                <div class="selects">
                  <!--<select type="search" name="adult" class="form-control searchbox1" onchange="change();" required>
                    <?php  
					for($i=1;$i<14;$i++)   
						{   
					?>      
					<option value="<?php echo $i; ?>"<?php echo ($_REQUEST['adult']==$i)?'selected="selected"' : '' ?> ><?php echo $i; ?>
					</option> 
					<?php     
						}      
					?>
                  </select>-->
                </div>
              </div>
              <div class="col-sm-2 pr-1 pl-1">
                
                <div class="selects">
                  <!--<select type="search" name="child" class="form-control searchbox1" onchange="change();" required>
                    <?php   
					for($i=0;$i<=$_REQUEST['room'];$i++) 
						{ 
					?>    
					<option value="<?php echo $i; ?>" <?php echo ($_REQUEST['child']==$i)?'selected="selected"' : '' ?> ><?php echo $i; ?>
					</option>   
					<?php     
						}      
					?>
                  </select>-->
                </div>
              </div>
              <div class="col-sm-2 pr-1 pl-1">
                
                <!--<div class="selects">
                  <select type="search" name="room" class="form-control searchbox1" onchange="change();" required>
                    <?php 
					for($i=1;$i<14;$i++)    
						{   
					?>      
					<option value="<?php echo $i; ?>" <?php echo ($_REQUEST['room']==$i)?'selected="selected"' : '' ?> ><?php echo $i; ?></option>  
					<?php   
					}      
					?>
                  </select>
                </div>-->
              </div>
              <div class="col-sm-2 pr-1 pl-1">
                
                <input type="hidden"  name="id" value="<?php //echo $_REQUEST['id']; ?>"/>
                <input type="hidden"  name="hid" value="<?php// echo $_REQUEST['hid']; ?>"/>
                <button class="btn btn-primary btn-block btn-search" name="search">Search</button>
              </div>
            </form>
          </div>
          
          
          <div class="price ">
            
            <div class="row">
              
              <div class="col-sm-2 pr-1 pl-1">
                <label for="inputEmail">Checkin</label>
                <div class="form-control-static">
                  <strong class="text-primary"><?php
                 // echo date('d M Y',strtotime($_REQUEST['cindate']));
                  
                  ?></strong>
                </div>
              </div>
              <div class="col-sm-2 pr-1 pl-1">
                <label for="inputEmail">Checkout </label>
                <div class="form-control-static">
                  <strong class="text-primary"><?php // echo date('d M Y',strtotime($_REQUEST['coutdate'])); ?></strong>
                </div>
              </div>
              <div class="col-sm-2 pr-1 pl-1">
                <label for="inputEmail">Night</label>
                <div class="form-control-static">
                  <strong class="text-primary"><?php
                  //$start = strtotime($_REQUEST['cindate']);
                 // $end = strtotime($_REQUEST['coutdate']);
                  //echo $night = ceil(abs($end - $start) / 86400);
                  ?></strong>
                </div>
              </div>
              
              <div class="col-sm-2 pr-1 pl-1">
                <label class="">Adult</label>
                <div class="form-control-static">
                  <strong class="text-primary"><?php// echo $_GET['adult'];  ?></strong>
                </div>
              </div>
              <div class="col-sm-2 pr-1 pl-1">
                <label class="">Child</label>
                <div class="form-control-static">
                  <strong class="text-primary"><?php //echo $_GET['child'];  ?></strong>
                </div>
              </div>
              
              <div class="col-sm-2 pr-1 pl-1">
                <label class="">Room</label>
                <div class="form-control-static">
                  <strong class="text-primary"><?php //echo $_GET['room'];  ?></strong>
                </div>
              </div>
              </div>
           </div>
		   
		   
          <div class="price-container">
            <h4>Room Details</h4>
             <div class="card ">
              <div class="card-body">
                <h4  class="card-title" data-toggle="modal" data-target="#room-details"><?php //echo $_REQUEST['room']; ?> x Double Room  <a class="small" href="#" data-toggle="tooltip" data-placement="bottom" data-html="true" title=" <p>Max 2 Adults </p><p class='no-margin'> Child and extra bed Policy</p>
                <ul>
                  <li>infant 0-3 year(s): stay for free if using existing bedding. Note, if you need a cot there may be an extra charge.</li>
                </ul>"> Capacity: 2 x <i class="fa fa-user"></i> </a>
                </h4>
				<form name="form2" action="" method="POST">
					<div class="row">
						 <div class="col-sm-1" data-toggle="tooltip" data-placement="top" title="Bed And Breakfast">BB</div>
						 <div class="col-sm-5"><span ><i class="fa fa-gear"></i>  <a href="#" class="heads text-primary" data-toggle="modal" data-target="#room-details<?php //echo $p; ?>"><?php
                         // echo $fetrc['roomtype']; ?></a></span>  <span class="pull-right">20 Rooms Left</span></div>
					</div>
				</form>
				
				
				</div>
			</div>
          </div>
      </div>
     </div>
   </div>
</div>
 
<?php  $this->load->view('footer'); ?>
 

<script type="text/javascript">
$(document).ready(function() {
$('[data-toggle="tooltip"]').tooltip();
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


$(".owl-carousel").owlCarousel({
items: 1,
});

$(".owl-slider").owlCarousel({
items: 1,
});

</script>
<script>
$( function() {
var dateFormat = "yy/mm/dd",
from = $( "#from-date" )
.datepicker({
defaultDate: "+1w",
changeMonth: false,
minDate:<?php echo $d1;  ?>,
maxDate:<?php echo $d2;  ?>,
dateFormat: "yy/mm/dd",
numberOfMonths: 1
})
.on( "change", function() {
to.datepicker( "option", "minDate", getDate( this ) );
}),
to = $( "#to-date" ).datepicker({
defaultDate: "+1w",
changeMonth: false,
minDate:<?php echo $d1;  ?>,
maxDate:<?php echo $d2;  ?>,
dateFormat: "yy/mm/dd",
numberOfMonths: 1
})
.on( "change", function() {
from.datepicker( "option", "maxDate", getDate( this ) );
});
function getDate( element ) {
var date;
try {
date = $.datepicker.parseDate( dateFormat, element.value );
} catch( error ) {
date = null;
}
return date;
}
} );

</script>
<script type="text/javascript">
$(function() {
$("[data-toggle=popover]").popover({
html: true,
content: function() {
var content = $(this).attr("data-popover-content");
return $(content).children(".popover-body").html();
},
title: function() {
var title = $(this).attr("data-popover-content");
return $(title).children(".popover-heading").html();
}
});
});
</script>
<script>
$(window).load(function()
{
$('#model456').modal('show');
});
</script>
<script type="text/javascript" charset="utf-8" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="js/jquery.simple.thumbchanger.js"></script>
<script>
$(document).ready(function() {
$('.image-area').thumbchanger({
mainImageArea: '.main-image',
subImageArea:  '.sub-image',
animateTime:   100,
easing:        'easeOutCubic',
trigger:       'click',
});
});
</script>
</body>
</html>