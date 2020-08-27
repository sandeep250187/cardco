<?php  
$this->load->view('home/header');
 ?>
<script>
document.onreadystatechange = function () {
var state = document.readyState

if (state == 'interactive') {
document.getElementById('contents').style.visibility="hidden";
} else if (state == 'complete') {
setTimeout(function(){
document.getElementById('interactive');
document.getElementById('load').style.visibility="hidden";
document.getElementById('fades').style.visibility="hidden";
document.getElementById('contents').style.visibility="visible";
},1000);
}
}

</script>

<div id="fades"></div>
<div class="text-center" id="load">
<p>
<img src="<?php echo base_url(); ?>assets/images/loading.gif">
</p>
<p>Searching for Accomodation</p>
<h4 class="text-primary">Penang, Malaysia</h4>
</div>
<div class="row page-heads" id="contents">
 
<div class="container">
<form type="search" method="POST" action="" id="hotel_form" class="searchs col-sm-10 offset-md-1">
<input name="by" type="hidden" value="1"/>
<div class="selection clearfix">
<div class="row">
<div class="col-sm-2 pr-1 pl-1">
<div class="styled-select-small">
<div class="position-absolute"><i class="fa fa-calendar"></i></div>
<input type="text" id="datepicker" class="form-control" name="from" value="<?php if(!empty($date)){ echo $date; }else{  } ?>" placeholder="Check-In-Date" autocomplete="off">
 <b><span class="text-warning" id="date_result"></span></b>
</div>
</div>
<div class="col-sm-2 pr-1 pl-1">
<div class="styled-select-small">
<div class="position-absolute"><i class="fa fa-calendar"></i></div>
<input type="text" id="datepicker1" class="form-control" name="to" value="<?php if(!empty($to_date)){ echo $to_date; }else{  } ?>" placeholder="Check-Out-Date" autocomplete="off">
 <b><span class="text-warning" id="date_result1"></span></b>
</div>
</div>
<div class="col-sm-2 pr-1 pl-1">
<div class="styled-select-small">
<div class="position-absolute"><i class="fa fa-user"></i></div>
<select class="form-control" id="child" name="child">
<option value="">Select Child</option>
<?php for($i=1;$i<=10;$i++) {?>
<option value="<?php echo $i ;?>"<?php if(!empty($child) && $child==$i){echo 'selected="selected"';} ?>><?php echo $i ;?></option>
<?php }?>
</select>
<b><span class="text-warning" id="room_result1"></span></b>
</div>
</div>
<div class="col-sm-2 pr-1 pl-1">
<div class="styled-select-small">
<div class="position-absolute"><i class="fa fa-user"></i></div>
<select class="form-control" id="adult" name="adult">
<option value="">Select Adult</option>
<?php for($i=1;$i<=10;$i++) {?>
<option value="<?php echo $i ;?>" <?php if( !empty($adult) && $adult==$i){echo 'selected="selected"';} ?>><?php echo $i ;?></option>
<?php }?>
</select>
<b><span class="text-warning" id="room_result2"></span></b>
</div>
</div>
<div class="col-sm-2 pr-1 pl-1">
<div class="styled-select-small">
<div class="position-absolute"><i class="fa fa-user"></i></div>
<select class="form-control" id="room" name="room">
<option value="">Select Room</option>
<?php for($i=1;$i<=10;$i++) {?>
<option value="<?php echo $i ;?>" <?php if(!empty($room) && $room==$i){echo 'selected="selected"';} ?>><?php echo $i ;?></option>
<?php }?>
</select><b><span class="text-warning" id="room_result3"></span></b>
</div>
</div>
<div class="col-sm-3 pr-1 pl-1">
<button type="submit"  name="search" class="btn btn-primary btn-search search-transfer  btn-block" id="findhotel"> <i class="fa fa-search"></i> Find Hotel</button>
</div>
</div>
</div>
<input type="hidden" name="offset"  id="offset" value="10">
<input type="hidden" name="limit"  id="limit" value="10">
</form>
</div>
</div>
 
 
<div class="row bg-grey">
	<div class="container">
	<div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-list">
	<div class="cbp-vm-options">
		<a href="#" class="cbp-vm-icon cbp-vm-grid" data-view="cbp-vm-view-grid">Grid View</a>
		<a href="#" class="cbp-vm-icon cbp-vm-list cbp-vm-selected" data-view="cbp-vm-view-list">List View</a>
	</div>
	<div class="row">
		<div class="col-sm-3">
			<div class="filter">
			<h5 class="headings">Save time with filter</h5>
			<p>Hotel Name</p>
			<p>
			<div class="search-icon">
				<input type="search" class="form-control" name="hotelSearch" id="hotelSearch">
			</div>
			 
			</p>
<p>Category</p>
 <div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" value="5" id="customCheck5" >
  <label class="custom-control-label" for="customCheck5">
  	<i class="fa fa-star text-yellow"></i> 
  	<i class="fa fa-star text-yellow"></i>
  	<i class="fa fa-star text-yellow"></i>
  	<i class="fa fa-star text-yellow"></i>
  	<i class="fa fa-star text-yellow"></i> 5 Star (8)
  </label>
</div>
<div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" value="4" id="customCheck4">
  <label class="custom-control-label " for="customCheck4">
  	<i class="fa fa-star text-yellow"></i> 
  	<i class="fa fa-star text-yellow"></i>
  	<i class="fa fa-star text-yellow"></i>
  	<i class="fa fa-star text-yellow"></i> 4 Star (18)
   </label>
</div>
<div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" value="3" id="customCheck3">
  <label class="custom-control-label " for="customCheck3">
  	<i class="fa fa-star text-yellow"></i> 
  	<i class="fa fa-star text-yellow"></i>
  	<i class="fa fa-star text-yellow"></i>
  	  3 Star (28)
   </label>
</div>
<div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" value="2" id="customCheck2">
  <label class="custom-control-label " for="customCheck2">
  	<i class="fa fa-star text-yellow"></i> 
  	<i class="fa fa-star text-yellow"></i>
  	  2 Star (3)
   </label>
</div>
</div>
</div>
 
<div class="col-sm-9">
 <div class="row">
<div class="col">
 <button class="btn btn-sm btn-outline-primary" id="rowcount"><?php   echo $numrow;  ?> Hotels Founds in Penang</button>
</div>
<div class="col text-right">
	 
<div class="btn-group btn-group-sm">
<!--<button type="" class="btn btn-sm btn-outline-secondary active"><strong>Filter</strong></button>-->
 

<a class="btn btn-sm btn-outline-secondary column_sortprice active" id="htlprice" pt="asc">Price</a>

<a class="btn btn-sm btn-outline-secondary column_sorthotel" id="htlname"  hn="asc"  >Hotel Name</a>

<a class="btn btn-sm btn-outline-secondary column_sortstar" id="starrate"  sr="asc">Star Rating</a>
</div><br>
 </div>
</div>
<br>
 
<ul id="result1">
<?php
 
if(!empty($hotellist)){
 foreach($hotellist as $val){
?>									 
<li class="main-div">
 

<a class="cbp-vm-image" href="#">																			 
<img class="img-fluid" src="<?php echo base_url(); ?>uploads/hotelmaster/<?php echo $val['hotel_pic']; ?>"/>	
</a>
<div class="cbp-vm-details">
	<h5 class="project-name text-uppercase"><?php echo $val['hotelname'];  ?>
	
	<span class="star-rating">
		<?php  if($val['starcat']==1) {  ?>
		<i class="fa fa-star text-yellow"></i>
		<?php } ?>
		<?php  if($val['starcat']==2) {  ?>
		<i class="fa fa-star text-yellow"></i>
		<i class="fa fa-star text-yellow"></i>
		<?php } ?>

		<?php  if($val['starcat']==2.5) {  ?>
		<i class="fa fa-star text-yellow"></i>
		<i class="fa fa-star text-yellow"></i>
		<i class="fa fa-star-half-o text-yellow" aria-hidden="true"></i>
		<?php } ?>


		<?php  if($val['starcat']==3) {  ?>
		<i class="fa fa-star text-yellow"></i>
		<i class="fa fa-star text-yellow"></i>
		<i class="fa fa-star text-yellow"></i>

		<?php } ?>

		<?php  if($val['starcat']==3.5) {  ?>
		<i class="fa fa-star text-yellow"></i>
		<i class="fa fa-star text-yellow"></i>
		<i class="fa fa-star text-yellow"></i>
		<i class="fa fa-star-half-o text-yellow" aria-hidden="true"></i>
		<?php } ?>

		<?php  if($val['starcat']==4) {  ?>
		<i class="fa fa-star text-yellow"></i>
		<i class="fa fa-star text-yellow"></i>
		<i class="fa fa-star text-yellow"></i>
		<i class="fa fa-star text-yellow"></i>
		<?php } ?>

		<?php  if($val['starcat']==4.5) {  ?>
		<i class="fa fa-star text-yellow"></i>
		<i class="fa fa-star text-yellow"></i>
		<i class="fa fa-star text-yellow"></i>
		<i class="fa fa-star text-yellow"></i>
		<i class="fa fa-star-half-o text-yellow" aria-hidden="true"></i>
		<?php } ?>
		<?php  if($val['starcat']==5) {  ?>
		<i class="fa fa-star text-yellow"></i>
		<i class="fa fa-star text-yellow"></i>
		<i class="fa fa-star text-yellow"></i>
		<i class="fa fa-star text-yellow"></i>
		<i class="fa fa-star text-yellow"></i>
		<?php } ?>
	 </span>
	 </h5>
    <p class="location1"><i class="fa fa-map-marker"></i> <?php echo $val['location'];  ?></p>
	<div class="descriptions">
		<ul class="list-inline">
			<li>
			<a href="#" class="show-form btn btn-primary" data-target="t1<?php echo $val['id']; ?>"><i class="fa fa-list-alt"></i> Description</a>
			</li>
			 <li>
			 <a href="#" class="show-form btn btn-primary" data-target='t2<?php echo $val['id']; ?>'><i class="fa fa-picture-o"></i> Images</a>
			 </li>
			<li>
			<a href="#" class="show-form btn btn-primary" data-target='t3<?php echo $val['id']; ?>'><i class="fa fa-map-marker"></i> Map</a>
			</li>
		</ul>
    </div>
</div>
 
 <div class="call-back">
	<div id="a1<?php echo $val['id']; ?>" class="d-none popover">
		<div class="popover-body">
			<table class="table table-sm small">
				<tr>
					<td>USD</td>
					<td>THB</td>
					<td>AUD</td>
					<td>CNY</td>
				</tr>
				<?php
					$roe=getAllRoe();
				 ?>
				<tr>
					<td>  <?php echo ceil(2*$roe['usd']); ?></td>
					<td>  <?php echo ceil(3*$roe['THB']); ?></td>
					<td>  <?php echo ceil(3*$roe['AUD']); ?></td>
					<td>  <?php echo ceil(4*$roe['CNY']); ?></td>
					<td>  <?php  //echo ceil(($fetrp[0]+$row1['markup'])*$roe['cny']); ?></td>
				</tr>
			</table>
		</div>
	</div>
	<h3 class="price1" data-toggle="popover" data-trigger="hover" data-popover-content="#a1<?php echo $val['id']; ?>" data-placement="top"> MYR <?php echo $val['room_price']; ?>  
	</h3>
    <p>Per Room Per Night</p>
	
     <a class="cbp-vm-icon cbp-vm-add btn btn-outline-danger btn-sm" href="<?php  echo base_url() ."hotels/bookhotel/".$val['id']; ?>">Book Now</a> 
	
    <!--<a class="cbp-vm-icon cbp-vm-add btn btn-outline-danger btn-sm"href="view-hotel-details-wout.php?adult=<?php //echo $_REQUEST['adult'];  ?>&child=<?php //echo $_REQUEST['child'];  ?>&room=<?php //echo $_REQUEST['room'];  ?>&hid=<?php //echo $row1['hotel_id'];  ?>&cindate=<?php //echo $df;  ?>&coutdate=<?php //echo $_REQUEST['cod'];  ?>&id=<?php echo $val['id'];  ?>">Book Now</a>-->
</div>

<div class="description-section">
     <div class="collapse" data-target="t1<?php echo $val['id']; ?>">
	 <?php 
	 if(!empty($val['htl_description'])){
			echo $val['htl_description']; 
	 }else{
		 echo '<label class="text-danger">No Description Found</label>';
	 }?>
	</div>
	 <div class="collapse clearfix" data-target='t2<?php echo $val['id']; ?>'>
		<div class="">
			<div class="flexslider">
			 <ul class="slides">
				 <?php
					  $hotelGallery = gethotelgallery($val['id']);
					   if(!empty($hotelGallery)){
						   foreach($hotelGallery as $htlpic){
				  ?>
				 <li data-thumb="<?php echo base_url(); ?>uploads/hotelpicgallery/<?php echo $htlpic['image'];  ?>">
						<img src="<?php echo base_url(); ?>uploads/hotelpicgallery/<?php echo $htlpic['image'];  ?>" />
					</li>
					<?php 
					} 
					}else{
						echo '<label class="text-danger">No Image Found</label>';
						} ?>
				 </ul>
			 </div>
		</div>
	</div>
	<div class="collapse" data-target='t3<?php echo $val['id']; ?>'>
	<?php
		if(!empty($val['htl_map'])){
		   echo $val['htl_map']; 
		}else{
			echo '<label class="text-danger"> No Map Found</label>';
			} ?>
	</div>
</div>
  
</li>
<?php } ?> 
                    <div class="pagination custom_pagination">
                         
                    </div>
<?php	}else{ ?>
		  <span><b style="color:red;">Record not available.</b></span>
	  <?php  } ?> 
  
        
</ul>
    <?php if($hotellist>0){ ?>
	<button type="button" name="search" class="btn btn-primary btn-search search-transfer  btn-block" id="loadhotel"> Load More</button>	
	<?php } ?>	
</div>
</div>
</div>
</div>
</div>
<?php $this->load->view('home/footer'); ?>
<script>
var base_url='<?php echo base_url(); ?>';
</script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/common/hotel_function.js"></script>
<script>
$(document).ready(function(){
	$("#findhotel").click(function(){
		var date = $('#datepicker').val();
		var room = $('#room').val();
		  if($('#datepicker').val()==''){
			   $('#date_result').html('Please Select Checkin  Date');
			   return false;
		 } 
		 if($('#datepicker1').val()==''){
			   $('#date_result1').html('Please Select Chekout Date');
			   return false;
		 } 
		 if($('#child').val()==''){
			   $('#room_result1').html('Please Select  No. of Child');
			     return false;
		 }
		 if($('#adult').val()==''){
			   $('#room_result2').html('Please Select  No. of Adult');
			     return false;
		 }
		 if($('#room').val()==''){
			   $('#room_result3').html('Please Select  No. of Room');
			     return false;
		 }
	});
});
</script>

<script type="text/javascript">
$(document).ready(function(){
  
  function load_data(search,order,htlorder,starrate,catstar)
   {
	var date = $('#datepicker').val();
	
    $.ajax({
    url:"<?php echo base_url(); ?>hotels/searchhtlname",
    method:"POST",
    data:{query:search,order:order,date:date,htlorder:htlorder,starrate:starrate,catstar:catstar,offset:'0',limit:'10'},
	beforeSend:function(){
		$.preloader.start({
			modal: true,
			position: 'center'
         });
	},
	success:function(data){
		
	$("#result1").empty();	
	if(data.hoteldata.length > 0 )
		 {
			$('#rowcount').html(data.hoteldata.length + ' Hotels Founds in Penang');
			$.each(data.hoteldata,function(key,value){
			 $.each(value,function(k,v){
			 	  if(k =='id')
				{
					id=v;
				}
				 if(k =='hotel_id')
				{
					hid=v;
				}
				if(k=='hotelname')
				{
					hotel=v;
				}
				if(k=='hotel_pic')
				{
					hotelimage=v;
				}
				if(k=='starcat'){
					var star=v;
					 htlstar='';
					 for(var s=1;s<=star;s++){
						hotelstar='<i class="fa fa-star text-yellow"></i>';
						htlstar =htlstar+hotelstar;
					 }
				 }
				if(k=='location'){
					htllocation=v;
				}
				if(k=='room_price'){
					roomprice=v;
				}
				if(k=='htl_description'){
					htldescription=v;
				 }
				 if(k=='image'){
					htlimage=v;
			 }
				
			 	
			 });
			var searchdata='<li class="main-div"><a class="cbp-vm-image"><img class="img-fluid" src="'+base_url+'/uploads/hotelmaster/'+hotelimage+'"></a><div class="cbp-vm-details"><h5 class="project-name text-uppercase">'+hotel+'<span class="star-rating">'+htlstar+'</span></h5><p class="location1"><i class="fa fa-map-marker"></i>'+htllocation+'</p><div class="descriptions"><ul class="list-inline"><li><a href="#" class="show-form btn btn-primary"  data-target="t1'+id+'"><i class="fa fa-list-alt"></i>Description</a></li> <li><a href="#" class="show-form btn btn-primary" data-target="t2'+id+'"><i class="fa fa-picture-o"></i> Images</a></li> <li><a href="#" class="show-form btn btn-primary" data-target="t3'+id+'"><i class="fa fa-map-marker"></i>Map</a></li></ul></div></div><div class="call-back"><div id="a1'+id+'" class="d-none popover"><div class="popover-body"><table class="table table-sm small"><tr><td>USD</td><td>THB</td><td>AUD</td><td>CNY</td></tr><tr><td>1</td><td>2</td><td>3</td><td>4</td></tr></table></div></div><h3 class="price1" data-toggle="popover" data-trigger="hover" data-popover-content="#a1'+id+'" data-placement="top"> MYR '+roomprice+'</h3> <p>Per Room Per Night</p><a class="cbp-vm-icon cbp-vm-add btn btn-outline-danger btn-sm" href="'+base_url+'hotels/'+id+'"">Book Now</a></div><div class="description-section"><div class="collapse" data-target="t1'+id+'">'+htldescription+'</div><div class="collapse clearfix" data-target="t2'+id+'"><div class=""><div class="flexslider"><ul class="slides"><li data-thumb="'+base_url+'uploads/hotelpicgallery/'+htlimage+'"><img src="'+base_url+'uploads/hotelpicgallery/'+htlimage+'" /></li></ul></div></div></div></div></li>';
			$("#result1").append(searchdata);
			});
			$("#loadhotel").show();
		}else{
			$("#result1").html('<p class="text-center">No Result Found</p>')
			$("#loadhotel").hide();
		}
		$.preloader.stop();
   }
   

  });
 }

 $('#hotelSearch').keyup(function(){
  var search = $(this).val();
   load_data(search);
 });
 
   $(document).on('click', '.column_sortprice', function(){ 
	 var order = $('#htlprice').attr("pt"); 
	 var search= $('#hotelSearch').val();
	 if(!$('#htlprice').hasClass('active'))
	 {
		$('#htlprice').addClass('active'); 
	 }
	 if($('#htlname').hasClass('active'))
	 {
		$('#htlname').removeClass('active'); 
	 }
	   if($('#starrate').hasClass('active'))
	 {
		$('#starrate').removeClass('active'); 
	 }
	 if(order=='asc'){
		 $('#htlprice').attr("pt","desc"); 
	 }else{
		 $('#htlprice').attr("pt","asc"); 
	 } 
	  load_data(search,order);
	  
    });
	$(document).on('click', '.column_sorthotel', function(){ 
	  var htlorder = $('#htlname').attr("hn");
	   var search= $('#hotelSearch').val();
	    if(!$('#htlname').hasClass('active'))
	 {
		$('#htlname').addClass('active'); 
	 }
	 if($('#htlprice').hasClass('active'))
	 {
		$('#htlprice').removeClass('active'); 
	 }
	  if($('#starrate').hasClass('active'))
	 {
		$('#starrate').removeClass('active'); 
	 }
	    if(htlorder=='asc'){
		 $('#htlname').attr("hn","desc"); 
	 }else{
		 $('#htlname').attr("hn","asc"); 
	 } 
	  load_data(search,'',htlorder);
	  
    });
	
	$(document).on('click', '.column_sortstar', function(){ 
	  var starrate = $('#starrate').attr("sr");
	   var search= $('#hotelSearch').val();
	   if(!$('#starrate').hasClass('active'))
	 {
		$('#starrate').addClass('active'); 
	 }
	 if($('#htlprice').hasClass('active'))
	 {
		$('#htlprice').removeClass('active'); 
	 }
	 if($('#htlname').hasClass('active'))
	 {
		$('#htlname').removeClass('active'); 
	 }
	    if(starrate=='asc'){
		 $('#starrate').attr("sr","desc"); 
	 }else{
		 $('#starrate').attr("sr","asc"); 
	 } 
	  load_data(search,'','',starrate);
	  
    });
	
	$(document).on('click', '.custom-control-input', function(){ 
	   if($('#customCheck5').is(":checked")){
            var catstar = $('#customCheck5').val();	
			var search= $('#hotelSearch').val();
			$('#customCheck4').prop('checked', false);
			$('#customCheck3').prop('checked', false);
			$('#customCheck2').prop('checked', false);
             load_data(search,'','','',catstar);			
		}else if($('#customCheck4').is(":checked")){
            var catstar = $('#customCheck4').val();
			var search= $('#hotelSearch').val();
			$('#customCheck5').prop('checked', false);
			$('#customCheck3').prop('checked', false);
			$('#customCheck2').prop('checked', false);
             load_data(search,'','','',catstar);
	   }else if($('#customCheck3').is(":checked")){
            var catstar = $('#customCheck3').val();	
            var search= $('#hotelSearch').val();
            $('#customCheck5').prop('checked', false);
			$('#customCheck4').prop('checked', false);
			$('#customCheck2').prop('checked', false);			
		    load_data(search,'','','',catstar);
	   }else if($('#customCheck2').is(":checked")){
            var catstar = $('#customCheck2').val();	
			var search= $('#hotelSearch').val();
            $('#customCheck5').prop('checked', false);
			$('#customCheck4').prop('checked', false);
			$('#customCheck3').prop('checked', false);			
		     load_data(search,'','','',catstar);
	   }else{
		   	var search= $('#hotelSearch').val();
		   load_data(search,'','','','');
	    }	   
          	   
	});
	
	
});
</script>

<script>
$(function() {
var showTotalChar = 200, showChar = "more (+)", hideChar = "less (-)";
$('.show').each(function() {
var content = $(this).text();
if (content.length > showTotalChar) {
var con = content.substr(0, showTotalChar);
var hcon = content.substr(showTotalChar, content.length - showTotalChar);
var txt= con +  '<span class="dots">...</span><span class="morectnt"><span>' + hcon + '</span>&nbsp;&nbsp;<a href="" class="showmoretxt">' + showChar + '</a></span>';
$(this).html(txt);
}
});
$(".showmoretxt").click(function() {
if ($(this).hasClass("sample")) {
$(this).removeClass("sample");
$(this).text(showChar);
} else {
$(this).addClass("sample");
$(this).text(hideChar);
}
$(this).parent().prev().toggle();
$(this).prev().toggle();
return false;
});
});
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
$("#datepicker").on("change",function(){
        
                var selectedDate1 = $("#datepicker").datepicker('getDate');
				 selectedDate1.setDate(selectedDate1.getDate()+1);
				 nextday=convert(selectedDate1);
				 $("#datepicker1").val(nextday);
				  $(function () {
                    $("#datepicker1").datepicker({
                        numberOfMonths: 2,
                        firstDay: 0,
                        dateFormat: 'yy-mm-dd',
                        minDate: nextday,
                        inline: true,
                    });
                    
                });
               
    });



 function convert(str) {
    var date = new Date(str),
        mnth = ("0" + (date.getMonth()+1)).slice(-2),
        day  = ("0" + date.getDate()).slice(-2);
    return [ date.getFullYear(), mnth, day ].join("-");
}
</script>
<script defer src="<?php echo base_url(); ?>assets/js/jquery.flexslider.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$(".flexslider").css('display','block');
});
$(window).load(function(){
$('.flexslider').flexslider({
animation: "slide",
controlNav: "thumbnails",
start: function(slider){
$('body').removeClass('loading');
}
});
});
$(".descriptions li a").click(function(){
$('.flexslider').resize();
});
</script>


 