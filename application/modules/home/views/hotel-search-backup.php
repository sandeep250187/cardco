<?php  
$this->load->view('header');
/* $night=$_REQUEST['night'];
$adult=$_REQUEST['adult'];
$child=$_REQUEST['child'];
$cd=$_REQUEST['cd'];
$cod=$_REQUEST['cod'];
$room=$_REQUEST['room'];
$start = strtotime($cd);
$end = strtotime($cod);
$night = ceil(abs($end - $start) / 86400);
//if(empty($_REQUEST['cd']) or empty($_REQUEST['cod'])) { return Redirect(); }
if($night==0)
{
echo "<script>";
echo "alert('Checkout Date Should be Greater than Checkindate')";
echo "<script>window.location='index.php'</script>";
echo "</script>";
}
$d=date('Y/m/d');
$out1='2018/09/01';
$start1 = strtotime($d);
$end1 = strtotime($out1);
$d1 = ceil(abs($end1 - $start1) / 86400);
$d2=$d1+30;
$date_cin= date('Y/m/d', strtotime($d . ' +'.$d1.' day'));
$date_cout= date('Y/m/d', strtotime($d . ' +'.($d1+1).' day'));
if($_REQUEST['cd']=='')
{
echo "<script>";
echo "<script>window.location='index.php'</script>";
echo "</script>";
} */
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
<p>From <strong><?php echo $_REQUEST['cd']; ?></strong>,  To <strong><?php echo $_REQUEST['cod']; ?></strong> </p>
<p>Adult <strong><?php echo $_REQUEST['adult']; ?></strong> , Child <strong><?php echo $_REQUEST['child']; ?></strong></p>
</div>
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

<?php //if($_REQUEST['cdo']<=$_REQUEST['cd'])  { ?>
<div class="row bg-grey">
<?php

/* $df=$_REQUEST['cd'];
$by=$_REQUEST['by'];
$pax=$adult+$child; */
?>
<div class="container">
<div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-list">

<div class="cbp-vm-options">
<a href="#" class="cbp-vm-icon cbp-vm-grid" data-view="cbp-vm-view-grid">Grid View</a>
<a href="#" class="cbp-vm-icon cbp-vm-list cbp-vm-selected" data-view="cbp-vm-view-list">List View</a>
</div>
<div class="row">
<div class="col-sm-3">
<div class="filter">
	<h5 class="headings">Save time with Filter</h5>
<p>Hotel Name</p>
<p>
<div class="search-icon">
<input type="search" class="form-control">
</div>
</p>
<p>Category</p>
 <div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" id="customCheck1">
  <label class="custom-control-label" for="customCheck1">
  	<i class="fa fa-star text-yellow"></i> 
  	<i class="fa fa-star text-yellow"></i>
  	<i class="fa fa-star text-yellow"></i>
  	<i class="fa fa-star text-yellow"></i>
  	<i class="fa fa-star text-yellow"></i> 5 Star (8)
  </label>
</div>
<div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" id="customCheck1">
  <label class="custom-control-label " for="customCheck1">
  	<i class="fa fa-star text-yellow"></i> 
  	<i class="fa fa-star text-yellow"></i>
  	<i class="fa fa-star text-yellow"></i>
  	<i class="fa fa-star text-yellow"></i> 4 Star (18)
   </label>
</div>
<div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" id="customCheck1">
  <label class="custom-control-label " for="customCheck1">
  	<i class="fa fa-star text-yellow"></i> 
  	<i class="fa fa-star text-yellow"></i>
  	<i class="fa fa-star text-yellow"></i>
  	  3 Star (28)
   </label>
</div>
<div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" id="customCheck1">
  <label class="custom-control-label " for="customCheck1">
  	<i class="fa fa-star text-yellow"></i> 
  	<i class="fa fa-star text-yellow"></i>
  	<i class="fa fa-star text-yellow"></i>
  	  2 Star (3)
   </label>
</div>
 
 

</div>
<?php
/* 


$q=mysql_query("select * from apmg_hotel_tariff_withoutshtl where validity>='$_REQUEST[cod]' and markup!=''");

/////// PAGING START
$recordPerPage=20;
$pageNum=isset($_GET['page'])?$_GET['page']:1;
$totalcontent=mysql_num_rows($q);
$totalPages= ceil($totalcontent/$recordPerPage);
$limit=($pageNum-1)*$recordPerPage;
if(isset($_REQUEST['page']) and $_REQUEST['page']=='1')
{
$num=1;
}
if(isset($_REQUEST['page']) and $_REQUEST['page']!='1')
{
$num=$recordPerPage+1;
}
else
{
$num=1;
}

//$sql1=mysql_query("select h.id,h.hotelname,h.starcat,h.hotel_pic,h.address,t.* from mala_hotelmaster h ,vcon_hotel_tariff t where h.id=t.hotel_id ORDER BY h.hotelname asc LIMIT $limit,$recordPerPage");

if($by==1)
{
$sql1=mysql_query("select h.id,h.hotelname,h.starcat,h.hotel_pic,pic2,pic3,pic4,pic5,pic6,h.address,t.* from mala_hotelmaster h ,apmg_hotel_tariff_withoutshtl t where h.id=t.hotel_id and t.validity>='$_REQUEST[cod]'  order by  h.hotelname asc LIMIT $limit,$recordPerPage");

}

if($by==3)
{
$sql1=mysql_query("select h.id,h.hotelname,h.starcat,h.hotel_pic,pic2,pic3,pic4,pic5,pic6,h.address,t.* from mala_hotelmaster h ,apmg_hotel_tariff_withoutshtl t where h.id=t.hotel_id  and t.validity>='$_REQUEST[cod]' order by  h.starcat asc LIMIT $limit,$recordPerPage");
}
if($by==4)
{
$sql1=mysql_query("select h.id,h.hotelname,h.starcat,h.hotel_pic,pic2,pic3,pic4,pic5,pic6,h.address,t.* from mala_hotelmaster h ,apmg_hotel_tariff_withoutshtl t where h.id=t.hotel_id  and t.shuttle=1  and t.validity>='$_REQUEST[cod]' order by  h.starcat asc LIMIT $limit,$recordPerPage");
}

if($by==2)
{
$sql1=mysql_query("select distinct h.id,h.hotelname,h.starcat,h.hotel_pic,h.address,t.* from mala_hotelmaster h ,apmg_hotel_tariff_withoutshtl t ,apmg_hotel_tariff_withoutshtl_rooming r where h.id=t.hotel_id and t.id=r.pid and r.room_type='2' ORDER BY CAST(r.room_price AS decimal) asc LIMIT $limit,$recordPerPage");
//$sql1=mysql_query("select h.id,h.hotelname,h.starcat,h.hotel_pic,pic2,pic3,pic4,pic5,pic6,h.address,t.* from mala_hotelmaster h ,apmg_hotel_tariff_withoutshtl t where h.id=t.hotel_id and t.validity>='$_REQUEST[cod]' LIMIT $limit,$recordPerPage");

} */


//$i=1;
?>
</div>
<div class="col-sm-9">
 <div class="row">
<div class="col">
<button class="btn btn-sm btn-outline-primary"><?php //echo $totalcontent; ?> Hotels Founds in Penang</button>
</div>
<div class="col">
	 
<div class="btn-group btn-group-sm">
<button type="" class="btn btn-sm btn-outline-secondary active"><strong>Filter</strong></button>
<a class="btn btn-sm btn-outline-secondary" href="hotel-search-wout-apmg.php?cd=<?php// echo $_REQUEST['cd']; ?>&cod=<?php// echo $_REQUEST['cod']; ?>&adult=<?php// echo $_REQUEST['adult']; ?>&child=<?php// echo $_REQUEST['child']; ?>&by=4&room=<?php echo $_REQUEST['room']; ?>">Free Shuttle</a>
<a class="btn btn-sm btn-outline-secondary" href="hotel-search-wout-apmg.php?cd=<?php //echo $_REQUEST['cd']; ?>&cod=<?php //echo $_REQUEST['cod']; ?>&adult=<?php //echo $_REQUEST['adult']; ?>&child=<?php //echo $_REQUEST['child']; ?>&by=2&room=<?php //echo $_REQUEST['room']; ?>">Price</a>
<a class="btn btn-sm btn-outline-secondary" href="hotel-search-wout-apmg.php?cd=<?php //echo $_REQUEST['cd']; ?>&cod=<?php echo $_REQUEST['cod']; ?>&adult=<?php echo $_REQUEST['adult']; ?>&child=<?php //echo $_REQUEST['child']; ?>&by=1&room=<?php //echo $_REQUEST['room']; ?>">Hotel Name</a>
<a class="btn btn-sm btn-outline-secondary" href="hotel-search-wout-apmg.php?cd=<?php echo $_REQUEST['cd']; ?>&cod=<?php echo $_REQUEST['cod']; ?>&adult=<?php //echo $_REQUEST['adult']; ?>&child=<?php echo $_REQUEST['child']; ?>&by=3&room=<?php //echo $_REQUEST['room']; ?>">Star Rating</a>
</div><br>
 
</div>
 
</div>
<br>
 
<ul>
<?php		//if(isset($_REQUEST['search']))		{



/* while($row1=mysql_fetch_array($sql1))  {  $hidd=$row1['id']; $did=$row1['d'];
$selrp=mysql_query("select MIN(room_price) from apmg_hotel_tariff_withoutshtl_rooming where room_type='2' and pid='$row1[id]' and room_price<1000");
$num=mysql_num_rows($selrp);
$fetrp=mysql_fetch_array($selrp);

if($fetrp[0]!='' and !empty($row1['markup']))
{ */

?>
<li>
<?php
/* if($row1['shuttle']=='1')
{
echo "<span class='launch-soon'>Free Shuttle</span>";
}
else
{
echo "<span class='launch-soon'>No Shuttle</span>";

} */
//echo $row1['map'];
?>
<a class="cbp-vm-image" href="#">																			<!--	<img src="http://aatg.work/my/upload/<?php //echo $row1['hotel_pic'];  ?>"  />-->
<img class="img-fluid" src="http://supplier.apolloasiab2b.com/transport/upload/<?php //echo $row1['hotel_pic'];  ?>"/>										</a>
<div class="cbp-vm-details">
<!--<h5 class="project-name text-uppercase">Package Code:-<?php //echo $row1['code'];  ?>  </h5>-->
<h5 class="project-name text-uppercase"><?php //echo $row1['hotelname'];  ?>
<span class="star-rating">
<?php  if($row1['starcat']==1) {  ?>
<i class="fa fa-star text-yellow"></i>
<?php } ?>
<?php  if($row1['starcat']==2) {  ?>
<i class="fa fa-star text-yellow"></i>
<i class="fa fa-star text-yellow"></i>
<?php } ?>

<?php  if($row1['starcat']==2.5) {  ?>
<i class="fa fa-star text-yellow"></i>
<i class="fa fa-star text-yellow"></i>
<i class="fa fa-star-half-o text-yellow" aria-hidden="true"></i>
<?php } ?>


<?php  if($row1['starcat']==3) {  ?>
<i class="fa fa-star text-yellow"></i>
<i class="fa fa-star text-yellow"></i>
<i class="fa fa-star text-yellow"></i>

<?php } ?>

<?php  if($row1['starcat']==3.5) {  ?>
<i class="fa fa-star text-yellow"></i>
<i class="fa fa-star text-yellow"></i>
<i class="fa fa-star text-yellow"></i>
<i class="fa fa-star-half-o text-yellow" aria-hidden="true"></i>
<?php } ?>

<?php  if($row1['starcat']==4) {  ?>
<i class="fa fa-star text-yellow"></i>
<i class="fa fa-star text-yellow"></i>
<i class="fa fa-star text-yellow"></i>
<i class="fa fa-star text-yellow"></i>
<?php } ?>

<?php  if($row1['starcat']==4.5) {  ?>
<i class="fa fa-star text-yellow"></i>
<i class="fa fa-star text-yellow"></i>
<i class="fa fa-star text-yellow"></i>
<i class="fa fa-star text-yellow"></i>
<i class="fa fa-star-half-o text-yellow" aria-hidden="true"></i>
<?php } ?>
<?php  if($row1['starcat']==5) {  ?>
<i class="fa fa-star text-yellow"></i>
<i class="fa fa-star text-yellow"></i>
<i class="fa fa-star text-yellow"></i>
<i class="fa fa-star text-yellow"></i>
<i class="fa fa-star text-yellow"></i>
<?php } ?>
<!--<i class="fa fa-star-half-o text-yellow" aria-hidden="true"></i>--></span>
</h5>
<p class="location1"><i class="fa fa-map-marker"></i> <?php echo $row1['address'];  ?></p>
 
<div class="descriptions">
<ul class="list-inline">
<li>
<a href="#" class="show-form btn btn-primary" data-target="t1<?php echo $i; ?>"><i class="fa fa-list-alt"></i> Description</a></li>
<li>
<a href="#" class="show-form btn btn-primary" data-target='t2<?php echo $i; ?>'><i class="fa fa-picture-o"></i> Images</a></li>
<li>
<a href="#" class="show-form btn btn-primary" data-target='t3<?php echo $i; ?>'><i class="fa fa-map-marker"></i> Map</a>
</li>
</ul>
</div>
<!--   <table class="table table-bordered table-condensed additional-table">
<tr bgcolor="#fff">
<td align="center"><strong>Checkin Date</strong></td>
<td align="center"><strong>No Of Night</strong></td>
<td align="center"><strong>Room Type</strong></td>
<td align="center"><strong>Room Category</strong></td>
<td align="center"><strong>Room Availability</strong></td>


</tr>
<tr>
<td align="center"><?php echo $package_date1=date("d M Y",strtotime($df));  ?></td>
<td align="center"><?php echo $night;  ?></td>
<td align="center">Twin Sharing</td>
<td align="center"><?php
/* $rc=$fetrp['room_cat'];
$selrc=mysql_query("select * from mala_roomcat_master where id='$rc'");
$fetrc=mysql_fetch_array($selrc);
echo $fetrc['roomtype']; */
?></td>
<td align="center">20 ROH</td>

</tr>

</table> -->
<?php
// if($row1['shuttle']=='1')
// {
// echo "This Hotel has Free shuttle services to the venues";

// }

?>


</div>	<!-- }); -->
<?php
$date1=date('Y/m/d');
$select_curr=mysql_query("select * from roe_master where roe_date='$date1'");
$fetch_curr_row=mysql_num_rows($select_curr);
if($fetch_curr_row!=0)
{

$fetch_curr=mysql_fetch_array($select_curr);
$usd=$fetch_curr['usd'];
$thb=$fetch_curr['THB'];
$aud=$fetch_curr['AUD'];
$cny=$fetch_curr['CNY'];
}
if($fetch_curr_row=='0')
{
$select_curr1=mysql_query("select * from roe_master order by roe_date desc limit 0,1");
$fetch_curr1=mysql_fetch_array($select_curr1);
$sgdinr=$fetch_curr1['inr'];
$usd=$fetch_curr1['usd'];
$thb=$fetch_curr1['THB'];
$aud=$fetch_curr1['AUD'];
$cny=$fetch_curr1['CNY'];
}
?>
<div class="call-back">
<!-- Content for Popover #1 -->
<div id="a1<?php echo $i; ?>" class="d-none popover">

<div class="popover-body">
<table class="table table-sm small">
<tr>
<td>USD</td>
<td>THB</td>
<td>AUD</td>
<td>CNY</td>

</tr>
<tr>
<td>  <?php //echo ceil(($fetrp[0]+$row1['markup'])*$usd); ?></td>
<td>  <?php  // echo ceil(($fetrp[0]+$row1['markup'])*$thb); ?></td>
<td> <?php  //echo ceil(($fetrp[0]+$row1['markup'])*$aud); ?></td>
<td>  <?php  //echo ceil(($fetrp[0]+$row1['markup'])*$cny); ?></td>


</tr>

</table>
</div>
</div>
<h3 class="price1" data-toggle="popover" data-trigger="hover" data-popover-content="#a1<?php echo $i; ?>" data-placement="top"><!--<i class="fa fa-usd"></i>-->MYR <?php


//$p=$fetrp[0]+$row1['markup'];

//echo number_format($p, 2);
//ceil($fetrp[0]/$fetchroe['amount']); ?><!-- /-  <small class="text-danger">1 left !</small> --></h3>
<p>Per Room Per Night</p>


<!--  <a class="cbp-vm-icon cbp-vm-add" href="book-hote-wout-apmg.php?adult=<?php// echo $adult;  ?>&cwb=<?php //echo $_REQUEST['child']; ?>&night=<?php// echo $night;  ?>&hid=<?php// echo $row1['hotel_id'];  ?>&cindate=<?php //echo $df;  ?>&id=<?php //echo $row1['id'];  ?>"> Book Now</a>-->
<a class="cbp-vm-icon cbp-vm-add btn btn-outline-danger btn-sm"href="view-hotel-details-wout.php?adult=<?php //echo $_REQUEST['adult'];  ?>&child=<?php //echo $_REQUEST['child'];  ?>&room=<?php //echo $_REQUEST['room'];  ?>&hid=<?php //echo $row1['hotel_id'];  ?>&cindate=<?php //echo $df;  ?>&coutdate=<?php //echo $_REQUEST['cod'];  ?>&id=<?php //echo $row1['id'];  ?>">Book Now</a>

</div>
<div class="description-section">
<div class="collapse" data-target='t1<?php echo $i; ?>'>
<?php echo $row1['descrip']; ?>

</div>



<div class="collapse clearfix" data-target='t2<?php echo $i; ?>'>
<div class="">
<div class="flexslider">
<ul class="slides">
<li data-thumb="http://supplier.apolloasiab2b.com/transport/upload/<?php echo $row1['pic2'];  ?>">
<img src="http://supplier.apolloasiab2b.com/transport/upload/<?php echo $row1['pic2'];  ?>" />
</li>
<li data-thumb="http://supplier.apolloasiab2b.com/transport/upload/<?php echo $row1['pic3'];  ?>">
<img src="http://supplier.apolloasiab2b.com/transport/upload/<?php echo $row1['pic3'];  ?>" />
</li>
<li data-thumb="http://supplier.apolloasiab2b.com/transport/upload/<?php echo $row1['pic4'];  ?>">
<img src="http://supplier.apolloasiab2b.com/transport/upload/<?php echo $row1['pic4'];  ?>" />
</li>



</ul>
</div>
<!-- <div class="row">
<div class="slide-cont">
<div id="" class="owl-carousel " data-slider-id="1">
<a class="item" href="http://aatg.work/my/upload/<?php echo $row1['hotel_pic'];  ?>" rel="prettyPhoto" title="This is the description">
<img class="img-fluid" src="http://aatg.work/my/upload/<?php echo $row1['hotel_pic'];  ?>" alt="title" />
</a>

<?php
/* $c2=substr($row1['pic2'], -1);
if(!empty($row1['pic2']))
{ */
?>
<a class="item" href="http://aatg.work/my/upload/<?php echo $row1['pic2'];  ?>" rel="prettyPhoto" title="This is the description">
<img class="img-fluid" src="http://aatg.work/my/upload/<?php echo $row1['pic2'];  ?>" alt="title" />
</a>


<?php

/* 
}
else
{ */
?>

<a class="item" href="http://aatg.work/my/upload/<?php //echo $row1['hotel_pic'];  ?>" rel="prettyPhoto" title="This is the description">
<img class="img-fluid" src="http://aatg.work/my/upload/<?php //echo $row1['hotel_pic'];  ?>" alt="title" />
</a>
<?php
/* 
}
$c3=substr($row1['pic3'], -1);
if(!empty($row1['pic3']))
{ */
?>
<a class="item" href="http://aatg.work/my/upload/<?php //echo $row1['pic3'];  ?>" rel="prettyPhoto" title="This is the description">
<img class="img-fluid" src="http://aatg.work/my/upload/<?php //echo $row1['pic3'];  ?>" alt="title" />
</a>
<?php /*  }
else
{ */
?>

<a class="item" href="http://aatg.work/my/upload/<?php //echo $row1['hotel_pic'];  ?>" rel="prettyPhoto" title="This is the description">
<img class="img-fluid" src="http://aatg.work/my/upload/<?php// echo $row1['hotel_pic'];  ?>" alt="title" />
</a>
<?php


//}
?>

</div>
</div>
</div> -->
</div>
<!--                <div class="col-sm-4">
<div class="row">
<div class="owl-thumbs" data-slider-id="1">
<button class="owl-thumb-item"> <img src="http://aatg.work/my/upload/<?php echo $row1['hotel_pic'];  ?>" alt="title" /></button>
<button class="owl-thumb-item"> <img src="http://aatg.work/my/upload/<?php echo $row1['pic2'];  ?>" alt="title" /></button>
<button class="owl-thumb-item"> <img src="http://aatg.work/my/upload/<?php echo $row1['pic3'];  ?>" alt="title" /></button>
</div>
</div>
</div> -->
</div>
<div class="collapse" data-target='t3<?php echo $i; ?>'>
<?php // echo $row1['map']; ?>
</div>
</div>
</li>
<?php
/* $i++;
}  */								}																		?>



</ul>
</div>
</div>
</div>
 


<nav aria-label="..." class="justify-content-center">
  <ul class="pagination justify-content-center">
    
<?php
//if($pageNum > '1'){
?>
 <li class="page-item"><a class="page-link" href="hotel-search-wout-apmg.php?page=<?//=($pageNum-1)?>&adult=<?php //echo $_REQUEST['adult'];  ?>&child=<?php //echo $_REQUEST['child'];  ?>&room=<?php //echo $_REQUEST['room'];  ?>&hid=<?php //echo $row1['hotel_id'];  ?>&cd=<?php //echo $df;  ?>&cod=<?php //echo $_REQUEST['cod'];  ?>&id=<?php //echo $row1['id'];  ?>&by=<?php echo $by; ?>">Prev</a></li>
<?php
/}?>
<?php 
/* for($i=1 ; $i<=$totalPages ; $i++)
{
$class =($pageNum == $i) ? "active":''; */
?>
<li class="page-item <?=$class?>"><a class="page-link" href="hotel-search-wout-apmg.php?page=<?=$i?>&adult=<?php// echo $_REQUEST['adult'];  ?>&child=<?php //echo $_REQUEST['child'];  ?>&room=<?php// echo $_REQUEST['room'];  ?>&hid=<?php //echo $row1['hotel_id'];  ?>&cd=<?php //echo $df;  ?>&cod=<?php //echo $_REQUEST['cod'];  ?>&id=<?php //echo $row1['id'];  ?>&by=<?php //echo $by; ?>"><?=$i?></a></li>
<?php
//}
?>
<?php
//if($pageNum<$totalPages){
?>
<li class="page-item"><a class="page-link" href="hotel-search-wout-apmg.php?page=<?=($pageNum+1)?>&adult=<?php// echo $_REQUEST['adult'];  ?>&child=<?php //echo $_REQUEST['child'];  ?>&room=<?php //echo $_REQUEST['room'];  ?>&hid=<?php //echo $row1['hotel_id'];  ?>&cd=<?php //echo $df;  ?>&cod=<?php //echo $_REQUEST['cod'];  ?>&id=<?php //echo $row1['id'];  ?>&by=<?php echo $by; ?>">Next</a></li>
<?php
//}
?>
</ul>
</nav>
 
</div>
 
<?php // } ?>
 </div>

<!-- 
<div class="row">
<div class="container ">
<div class="row text-center">
<h4 class="heading">Hotels, apartments, Homestays and more in Penang </h4>
<ul class="list-inline property-india">
<li>
<div class="div"><img src="http://aatg.work/my/upload/2016-10-24 15:57:33tune.jpg">
<button class="btn btn-warning btn-xs btn-view"  >View Details</button>
<span class="heading">TUNE HOTEL</span></div>
</li>
<li>
<div class="div"><img src="http://aatg.work/my/upload/2016-10-24 10:13:44sentral penanag.jpg">
<button class="btn btn-warning btn-xs btn-view"  >View Details</button>
<span class="heading">SENTRAL GEORGE TOWN</span></div>
</li><li>
<div class="div"><img src="http://aatg.work/my/upload/2016-10-24 13:26:33red rock.jpg">
<button class="btn btn-warning btn-xs btn-view" >View Details</button>
<span class="heading">RED ROCK HOTEL</span></div>
</li><li>
<div class="div"><img src="http://aatg.work/my/upload/2016-10-21 18:08:56copthrone orchid.jpg">
<button class="btn btn-warning btn-xs btn-view" >View Details</button>
<span class="heading">COPTHORNE ORCHID HOTEL</span></div>
</li><li>
<div class="div"><img src="http://aatg.work/my/upload/2016-10-24 13:21:27rainbow.jpg">
<button class="btn btn-warning btn-xs btn-view" >View Details</button>
<span class="heading">RAINBOW PARADISE BEACH RESORT</span></div>
</li>
</ul>
</div>
</div>
</div> -->
<!--
<div class="row trending-projects">
<div class="container text-center">
<h1 class="headings">Our Daily Departure Tours </h1>
<div class="row">
<?php
$d=date('Y/m/d');
?>
<div  class="trending">
<div class="col-sm-3">
<div class="divs"><!--<a href="tours.php?type=PVT&date_from=<?php echo $d; ?>&adult=2&child=0"><img src="http://aatg.work/sms/myo/upload/2016-07-27 17:38:55heritagetour.jpg">  
<a href="#"><img src="http://aatg.work/sms/myo/upload/2016-07-27 17:38:55heritagetour.jpg">
<h5 class="location-name">PENANG HERITAGE TOUR</h5></a>
</div>
</div><div class="col-sm-3">
<div class="divs"><!--<a href="tours.php?type=PVT&date_from=<?php echo $d; ?>&adult=2&child=0"><img src="http://aatg.work/sms/myo/upload/2016-07-27 17:40:22hillandtemple.jpg"></a>- 
<a href="#"><img src="http://aatg.work/sms/myo/upload/2016-07-27 17:40:22hillandtemple.jpg"></a>
<h5 class="location-name">PENANG HILL & TEMPLE TOUR</h5>
</div>
</div><div class="col-sm-3">
<div class="divs"><!--<a href="tours.php?type=PVT&date_from=<?php echo $d; ?>&adult=2&child=0"><img src="http://aatg.work/sms/myo/upload/2016-07-27 17:41:42scenicnight.jpg"></a> 
<a href="#"><img src="http://aatg.work/sms/myo/upload/2016-07-27 17:41:42scenicnight.jpg"></a>
<h5 class="location-name">PENANG SCENIC NIGHT TOUR</h5>
</div>
</div><div class="col-sm-3">
<div class="divs"><a href="#"><img src="http://aatg.work/sms/myo/upload/2016-07-27 17:37:46penangcitytour.jpg"></a>
<h5 class="location-name">PENANG CITY TOUR</h5>
</div>
</div>
 
</div>
</div>
<h1 class="headings">Pre - Post Event Surprises</h1>
<div class="row">
<div  class="trending">
<div class="col-sm-3">
<div class="divs"><a href="#"><img src="images/kl.jpg"> </a>
<h5 class="location-name">KUALA LUMPUR</h5>
</div>
</div><div class="col-sm-3">
<div class="divs"><a href="#"><img src="images/lg.jpg"> </a>
<h5 class="location-name">LANGKAWI</h5>
</div>
</div><div class="col-sm-3">
<div class="divs"><a href="#"><img src="images/cm.jpg"> </a>
<h5 class="location-name">CAMEROON HIGHLAND</h5>
</div>
</div><div class="col-sm-3">
<div class="divs"><a href="#"><img src="images/jh.jpg"> </a>
<h5 class="location-name">JOHOR BAHRU</h5>
</div>
</div>
</div>
</div>
</div>
</div>-->
<?php// include "include/footer.php"; ?>

<script>
// $(document).ready(function () {
// $("#from-date").datepicker({
// minDate:<?php echo $d1;  ?>,
// maxDate:<?php echo $d2;  ?>,
// dateFormat: "yy/mm/dd",
// minDate: 0,
// onSelect: function (date) {
// var date2 = $('#from-date').datepicker('getDate');
// date2.setDate(date2.getDate() + 1);
// $('#to-date').datepicker('setDate', date2);
// //sets minDate to dt1 date + 1
// $('#to-date').datepicker('option', 'minDate', date2);
// setTimeout(function(){
// $( "#to-date" ).datepicker('show');
// }, 16);
// }
// });
// $('#to-date').datepicker({
// minDate:<?php echo $d1;  ?>,
// maxDate:<?php echo $d2;  ?>,
// dateFormat: "yy/mm/dd",
// onClose: function () {
// var dt1 = $('#from-date').datepicker('getDate');
// console.log(dt1);
// var dt2 = $('#to-date').datepicker('getDate');
// if (dt2 <= dt1) {
// var minDate = $('#to-date').datepicker('option', 'minDate');
// $('#to-date').datepicker('setDate', minDate);
// }
// }
// });
// });
</script>
<script type="text/javascript">
$('.show-form').on('click', function (event){
event.preventDefault();
var elem = $(this); //writing $(this) every time is bad
var target = $('div[data-target="'+elem.attr("data-target")+'"]');
if(elem.hasClass('active')){
//remove from this
elem.removeClass("active");
//close box
target.slideUp("slow");
} else { //toggle menu when clicking on some other link
//remove from everywhere
$('.show-form').removeClass('active');
//slide every box up
$('.collapse').slideUp("slow");
//add to this only
elem.addClass('active');
//slide associated box down
target.slideDown("slow");
}
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
</script>
<script defer src="js/jquery.flexslider.js"></script>
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
</body>
</html>