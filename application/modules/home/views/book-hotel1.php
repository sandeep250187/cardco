 <?php include "include/header-h.php";$d=date('Y/m/d'); ?>

<div class="row gap bg-grey">
  <div class="container">
    <div class="row text-center">
      <h1 class="headings">Book Hotel</h1>
    </div>
    <div class="col-md-10 col-sm-offset-1">
      <div class="panel panel-default box">
        <div class="panel-body">
          <div class="form-horizontal">
            <form name="register" id="register" method="post" action="#" novalidate>
              <div class="form-group">
                <?php    $hotelname=$_POST['hotelname'];   $nationality=$_GET['nationality'];  $date=$_GET['cindate'];  $checkout_date=$_GET['coutdate'];     $night=$_GET['night'];   $adult=$_GET['adult']; $cwb=$_GET['cwb'];  $cnb=$_GET['cnb']; $room=$_GET['room']; 
				$cout= date('Y/m/d', strtotime($date. ' + 3 days'));
 				$select_hotel=mysql_query("select * from mala_hotelmaster where id='$_GET[hid]'");   
?>
               
                  
                  <!--  <tr style="background-color:#58ACFA;font-weignt:bold;color:white;"> <td width="20%">Hotel Pic</td><td width="80%" align="center">Hotel Details</td>   </tr> -->
                  <?php  $fetch_hotel=mysql_fetch_array($select_hotel);  $hid=$fetch_hotel['id']; $hotelid=$fetch_hotel['id'];  $desc=$fetch_hotel['landline']; 	$select_roomtype1=mysql_query("select * from mala_roomtypemaster where hotelid='$hid'");				$count1=mysql_num_rows($select_roomtype1);				$fetch_roomtype1=mysql_fetch_array($select_roomtype1);				if($count1!=0)				{				 $hi=$fetch_roomtype1['hotelid']; ?>
                  <div class="col-sm-8">
                    <h4 class="text-warning"><strong> <i class="fa fa-building-o"></i>
					
                      <?php    echo $fetch_hotel['hotelname']; ?>
                      </strong></h4>
                    <p> <i class="fa fa-map-marker"></i> :  <?php    echo $fetch_hotel['address']; ?></p>
                     <table class="table table-bordered table-condensed" >
                    <tr>
                      <th> Checkin Date </th>  <td><?php  echo $cindate=date("d  M, Y",strtotime($date));  ?></td>
                  </tr>
                  <tr>
                      <th> CheckOut Date </th> <td><?php  echo $coutdate=date("d  M, Y",strtotime($cout));  ?></td>
                  </tr>
                  <tr>
                      <th> Nights </th>              
                    
                     
                      <td><?php  echo $night;  ?></td>
                    </tr>
                  </table>
                  </div>
                  <div class="col-sm-4">
                    <div class="row">
					 
                      <div id="pictures" class="owl-slider"> <a class="item" href="http://aatg.work/my/upload/2017-08-23 18:24:48holiday-inn-resort-penang-3470202595-4x3.jpg" rel="prettyPhoto" title="This is the description"> <img src="http://aatg.work/my/upload/<?php echo $fetch_hotel['hotel_pic'];  ?>" alt="title" /></a> 
					  
					  <a class="item" href="http://aatg.work/my/upload/2017-08-23 18:24:48holiday-inn-resort-penang-3470202595-4x3.jpg" rel="prettyPhoto" title="This is the description"> <img src="http://aatg.work/my/upload/<?php echo $fetch_hotel['pic2'];  ?>" alt="title" /> </a>


					  <a class="item" href="http://aatg.work/my/upload/2017-08-23 18:24:48holiday-inn-resort-penang-3470202595-4x3.jpg" rel="prettyPhoto" title="This is the description"> <img src="http://aatg.work/my/upload/<?php echo $fetch_hotel['pic3'];  ?>" alt="title" /> </a> 
                        
                        <!-- <a class="item" href="https://www.travelogyindia.com/images/hill/shimla.jpg" rel="prettyPhoto" title="This is the description">
                                            <img src="https://www.travelogyindia.com/images/hill/shimla.jpg" alt="title" />
                                        </a>
                                        <a class="item" href="https://www.travelogyindia.com/images/hill/shimla.jpg" rel="prettyPhoto" title="This is the description">
                                            <img src="https://www.travelogyindia.com/images/hill/shimla.jpg" alt="title" />
                                        </a>--> 
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12">
                  <div class="table-responsive"> 

                  <table class="table table-bordered table-condensed">
                    <tr>
                      <th align="center">Category</th>
                      <th align="center">Availability</th>
                      <th align="center">Breakfast</th>
                      <th align="center">All Taxes</th>
                      <th align="center">Rate Per Night</th>
                      <th align="center">Action</th>
                    </tr>
                    <?php				$select_roomtype=mysql_query("select * from mala_roomtypemaster where hotelid='$hi' AND roomtype='Double'");				$count=mysql_num_rows($select_roomtype);				if($count!=0)				{ 												while($fetch_roomtype=mysql_fetch_array($select_roomtype))				{				  $room_type=$fetch_roomtype['id'];				$rt=$fetch_roomtype['roomtype'];				 				?>
                    <tr>
                      <?php $rc=$fetch_roomtype['room_cat']; 				$select_cat=mysql_query("select * from mala_roomcat_master where id='$rc'");				$fetch_cat=mysql_fetch_array($select_cat);								?>
                      <td align="center"><?php   $fetch_roomtype['roomtype']; ?>
                        <?php echo $rc1=$fetch_cat['roomtype'];  ?></td>
                      <td align="center"><b style="color:grey;">RQ</b></td>
                      <td align="center"><b style="color:grey;">
                        <?php 	$selectroomtype5=mysql_query("select * from mala_htl_tarrifmaster where hotelid='$hi' and with_bf='1'");				$countbf1=mysql_num_rows($selectroomtype5);				if($countbf1==0)				{				echo "NO"; 
$with_bf='2';										

										}				else				{				echo "YES";		$with_bf='1';				}				 ?>
                        </b></td>
                      <td align="center"><b style="color:grey;">Included</b></td>
                      <td align="center"><?php

										 for($k=1;$k<=$night;$k++)
	 { $rate=0;
	 $day=date('D', strtotime($date));
	 //echo $room_type;
	 if($day=='Mon')
	 {
		 
	 $selectsurcharge=mysql_query("SELECT MAX(rate) FROM `mala_htl_tarrifmaster` where hotelid='$hotelid' and roomtype='$room_type' and with_bf='$with_bf' and '$date' BETWEEN vfrom and vto and type='Surcharge' and (DMON='Y')"); 
	 }
	 if($day=='Tue')
	 {
		  
	 $selectsurcharge=mysql_query("SELECT MAX(rate) FROM `mala_htl_tarrifmaster` where hotelid='$hotelid' and roomtype='$room_type' and with_bf='$with_bf' and '$date' BETWEEN vfrom and vto and type='Surcharge' and (DTUE='Y')"); 
	 }
	 
	 if($day=='Wed')
	 {
		 
	 $selectsurcharge=mysql_query("SELECT MAX(rate) FROM `mala_htl_tarrifmaster` where hotelid='$hotelid' and roomtype='$room_type' and with_bf='$with_bf' and '$date' BETWEEN vfrom and vto and type='Surcharge' and (DWED='Y')"); 
	 }
	 if($day=='Thu')
	 {
		  
	 $selectsurcharge=mysql_query("SELECT MAX(rate) FROM `mala_htl_tarrifmaster` where hotelid='$hotelid' and roomtype='$room_type' and with_bf='$with_bf' and '$date' BETWEEN vfrom and vto and type='Surcharge' and (DTHU='Y')"); 
	 }
 
	   if($day=='Fri')
	 {
		 
	 $selectsurcharge=mysql_query("SELECT MAX(rate) FROM `mala_htl_tarrifmaster` where hotelid='$hotelid' and roomtype='$room_type' and with_bf='$with_bf' and '$date' BETWEEN vfrom and vto and type='Surcharge' and (DFRI='Y')"); 
	 }
	 if($day=='Sat')
	 {
		  
	 $selectsurcharge=mysql_query("SELECT MAX(rate) FROM `mala_htl_tarrifmaster` where hotelid='$hotelid' and roomtype='$room_type' and with_bf='$with_bf' and '$date' BETWEEN vfrom and vto and type='Surcharge' and (DSAT='Y')"); 
	 }
	 
	 if($day=='Sun')
	 {
		 
	 $selectsurcharge=mysql_query("SELECT MAX(rate) FROM `mala_htl_tarrifmaster` where hotelid='$hotelid' and roomtype='$room_type' and with_bf='$with_bf' and '$date' BETWEEN vfrom and vto and type='Surcharge' and (DSUN='Y')"); 
	 }
	   /*if($day=='Mon' or $day=='Tue' or $day=='Wed' or $day=='Thu')
	 {
		 
	 $selectsurcharge=mysql_query("SELECT MAX(rate) FROM `mala_htl_tarrifmaster` where hotelid='$hotelid' and roomtype='$room_type'  and with_bf='$with_bf' and '$date' BETWEEN vfrom and vto and type='Surcharge' and (DMON='Y' or DTUE='Y' or DWED='Y' or DTHU='Y')"); 
	 }
	 if($day=='Fri' or $day=='Sat' or $day=='Sun')
	 {
		  
	 $selectsurcharge=mysql_query("SELECT MAX(rate) FROM `mala_htl_tarrifmaster` where hotelid='$hotelid' and roomtype='$room_type' and with_bf='$with_bf' and '$date' BETWEEN vfrom and vto and type='Surcharge' and (DFRI='Y' or DSAT='Y' or DSUN='Y')"); 
	 }*/
	 //$selectsurcharge=mysql_query("SELECT MAX(rate) FROM `mala_htl_tarrifmaster` where hotelid='$hotelid' and roomtype='$room_type' and '$date' BETWEEN vfrom and vto and $column='Y' and type='Surcharge' and (DMON='Y' or DTUE='Y' or DWED='Y' or DTHU='Y' or DFRI='Y' or DSAT='Y' or DSUN='Y')"); 
	 $fetchratesurcharge=mysql_fetch_array($selectsurcharge);
     if($fetchratesurcharge[0]!='')
	 {
	    $rate=$fetchratesurcharge[0]; 
		  $tot=$tot+$rate;
	 //$amount=$rate*$nofnight; 
	 }
	 if($day=='Mon')
	 {
		 
	 $selectpromotional=mysql_query("SELECT MAX(rate) FROM `mala_htl_tarrifmaster` where hotelid='$hotelid' and roomtype='$room_type' and with_bf='$with_bf' and '$date' BETWEEN vfrom and vto and type='Promotional' and (DMON='Y')"); 
	 }
	 if($day=='Tue')
	 {
		  
	 $selectpromotional=mysql_query("SELECT MAX(rate) FROM `mala_htl_tarrifmaster` where hotelid='$hotelid' and roomtype='$room_type' and with_bf='$with_bf' and '$date' BETWEEN vfrom and vto and type='Promotional' and (DTUE='Y')"); 
	 }
	 
	 if($day=='Wed')
	 {
		 
	 $selectpromotional=mysql_query("SELECT MAX(rate) FROM `mala_htl_tarrifmaster` where hotelid='$hotelid' and roomtype='$room_type' and with_bf='$with_bf' and '$date' BETWEEN vfrom and vto and type='Promotional' and (DWED='Y')"); 
	 }
	 if($day=='Thu')
	 {
		  
	 $selectpromotional=mysql_query("SELECT MAX(rate) FROM `mala_htl_tarrifmaster` where hotelid='$hotelid' and roomtype='$room_type' and with_bf='$with_bf' and '$date' BETWEEN vfrom and vto and type='Promotional' and (DTHU='Y')"); 
	 }
 
	   if($day=='Fri')
	 {
		 
	 $selectpromotional=mysql_query("SELECT MAX(rate) FROM `mala_htl_tarrifmaster` where hotelid='$hotelid' and roomtype='$room_type' and with_bf='$with_bf' and '$date' BETWEEN vfrom and vto and type='Promotional' and (DFRI='Y')"); 
	 }
	 if($day=='Sat')
	 {
		  
	 $selectpromotional=mysql_query("SELECT MAX(rate) FROM `mala_htl_tarrifmaster` where hotelid='$hotelid' and roomtype='$room_type' and with_bf='$with_bf' and '$date' BETWEEN vfrom and vto and type='Promotional' and (DSAT='Y')"); 
	 }
	 
	 if($day=='Sun')
	 {
		 
	 $selectpromotional=mysql_query("SELECT MAX(rate) FROM `mala_htl_tarrifmaster` where hotelid='$hotelid' and roomtype='$room_type' and with_bf='$with_bf' and '$date' BETWEEN vfrom and vto and type='Promotional' and (DSUN='Y')"); 
	 }
 
  
	  /*if($day=='Mon' or $day=='Tue' or $day=='Wed' or $day=='Thu')
	 {
	 $selectpromotional=mysql_query("SELECT MAX(rate) FROM `mala_htl_tarrifmaster` where hotelid='$hotelid' and roomtype='$room_type' and with_bf='$with_bf' and '$date' BETWEEN vfrom and vto and type='Promotional' and (DMON='Y' or DTUE='Y' or DWED='Y' or DTHU='Y')"); 
	 }
	 if($day=='Fri' or $day=='Sat' or $day=='Sun')
	 {
	 $selectpromotional=mysql_query("SELECT MAX(rate) FROM `mala_htl_tarrifmaster` where hotelid='$hotelid' and roomtype='$room_type' and with_bf='$with_bf' and '$date' BETWEEN vfrom and vto and type='Promotional' and (DFRI='Y' or DSAT='Y' or DSUN='Y')"); 
	 }*/
	 //$selectpromotional=mysql_query("SELECT MIN(rate) FROM `mala_htl_tarrifmaster` where hotelid='$hotelid' and roomtype='$room_type' and '$date' BETWEEN vfrom and vto and type='Promotional' and (DMON='Y' or DTUE='Y' or DWED='Y' or DTHU='Y' or DFRI='Y' or DSAT='Y' or DSUN='Y')"); 
	 $fetchratepromo=mysql_fetch_array($selectpromotional);
	 // $rate=$fetchratepromo[0];  
	 if($fetchratesurcharge[0]=='' or $fetchratesurcharge[0]=='0')
	 {
     if($fetchratepromo[0]!='')
	 {
	 $rate=$fetchratepromo[0];  
   $tot=$tot+$rate;
	 //$amount=$rate*$nofnight; 
 
	 }
	 }
	 
	 /*if($day=='Mon' or $day=='Tue' or $day=='Wed' or $day=='Thu')
	 {
	 $selectcontract=mysql_query("SELECT MIN(rate) FROM `mala_htl_tarrifmaster` where hotelid='$hotelid' and roomtype='$room_type' and with_bf='$with_bf' and '$date' BETWEEN vfrom and vto and type='Contract' and (DMON='Y' or DTUE='Y' or DWED='Y' or DTHU='Y')"); 
	 }
	 if($day=='Fri' or $day=='Sat' or $day=='Sun')
	 {
	 $selectcontract=mysql_query("SELECT MIN(rate) FROM `mala_htl_tarrifmaster` where hotelid='$hotelid' and roomtype='$room_type' and with_bf='$with_bf' and '$date' BETWEEN vfrom and vto and type='Contract' and (DFRI='Y' or DSAT='Y' or DSUN='Y')"); 
	 }*/
	 if($day=='Mon')
	 {
		 
	 $selectcontract=mysql_query("SELECT MIN(rate) FROM `mala_htl_tarrifmaster` where hotelid='$hotelid' and roomtype='$room_type' and with_bf='$with_bf' and '$date' BETWEEN vfrom and vto and type='Contract' and (DMON='Y')"); 
	 }
	 if($day=='Tue')
	 {
		  
	 $selectcontract=mysql_query("SELECT MIN(rate) FROM `mala_htl_tarrifmaster` where hotelid='$hotelid' and roomtype='$room_type' and with_bf='$with_bf' and '$date' BETWEEN vfrom and vto and type='Contract' and (DTUE='Y')"); 
	 }
	 
	 if($day=='Wed')
	 {
		 
	 $selectcontract=mysql_query("SELECT MIN(rate) FROM `mala_htl_tarrifmaster` where hotelid='$hotelid' and roomtype='$room_type' and with_bf='$with_bf' and '$date' BETWEEN vfrom and vto and type='Contract' and (DWED='Y')"); 
	 }
	 if($day=='Thu')
	 {
		  
	 $selectcontract=mysql_query("SELECT MIN(rate) FROM `mala_htl_tarrifmaster` where hotelid='$hotelid' and roomtype='$room_type' and with_bf='$with_bf' and '$date' BETWEEN vfrom and vto and type='Contract' and (DTHU='Y')"); 
	 }
 
	   if($day=='Fri')
	 {
		 
	 $selectcontract=mysql_query("SELECT MIN(rate) FROM `mala_htl_tarrifmaster` where hotelid='$hotelid' and roomtype='$room_type' and with_bf='$with_bf' and '$date' BETWEEN vfrom and vto and type='Contract' and (DFRI='Y')"); 
	 }
	 if($day=='Sat')
	 {
		  
	 $selectcontract=mysql_query("SELECT MIN(rate) FROM `mala_htl_tarrifmaster` where hotelid='$hotelid' and roomtype='$room_type' and with_bf='$with_bf' and '$date' BETWEEN vfrom and vto and type='Contract' and (DSAT='Y')"); 
	 }
	 
	 if($day=='Sun')
	 {
		 
	$selectcontract=mysql_query("SELECT MIN(rate) FROM `mala_htl_tarrifmaster` where hotelid='$hotelid' and roomtype='$room_type' and with_bf='$with_bf' and '$date' BETWEEN vfrom and vto and type='Contract' and (DSUN='Y')"); 
	 }
	 $fetchratecont=mysql_fetch_array($selectcontract);
	 if($fetchratepromo[0]=='' and $fetchratesurcharge[0]=='')
	 {
     if($fetchratecont[0]!='')
	 {
	 
	  $rate=$fetchratecont[0];
	     $tot=$tot+$rate;
	 //$amount=$rate*$nofnight;
	 }
	 }
	 
			 //echo "rate="; echo $rate;  echo " date="; echo $date; echo "<br>";
	 $date=date('Y/m/d', strtotime('+1 day', strtotime($date)));
	 
	  //echo "</br>rate=".$rate;
	/*if($rate==0 or $rate=="")
		{
			//echo "hello</br>";
		mysql_query("delete from online_sales_addhotel where pnr='$pnr'");
   	 	echo "<script>";
		echo "alert('Validity Error - Please contact Support Team !..')";
		echo "</script>";

		echo "<script>window.location='addhoteln-sales.php?id=$_GET[sid]'</script>";
		exit();
		}
*/
	 }
	 
	 echo 'MYR '.$rate
										
			?></td>
                      <td align="center"><a href="book_hoteln.php?adult=<?php echo $adult;  ?>&cnb=<?php echo $cnb; ?>&cwb=<?php echo $cwb; ?>&night=<?php echo $night;  ?>&room=<?php echo $room;  ?>&cindate=<?php echo $_GET['cindate'];  ?>&coutdate=<?php echo $cout;  ?>&rate=<?php echo $rate;  ?>&hid=<?php echo $hotelid;  ?>&rt=<?php echo $rt; ?>&rc=<?php echo $rc;  ?>&rc1=<?php echo $rc1;  ?>"  style="text-align:center;color:blue;" >
                        <button type="button" class="btn btn-primary book-now  btn-xs">Next <i class="fa fa-angle-double-right"></i></button>
                        </a></td>
                    </tr>
                    <?php								}				if($cnb=='10')				{				?>
                    <?php				$selectroomtype=mysql_query("select * from mala_resrv_exservrates where hotelid='$hid'");				$countbf=mysql_num_rows($selectroomtype);				if($countbf==0)								{				?>
                    <tr>
                      <td align="center" colspan="6"><b style="color:red;">Breakfast Not Available in this Hotel</b></td>
                    </tr>
                    <?php				}				else				{				?>
                    <?php						$selectroomtype=mysql_query("select * from mala_resrv_exservrates where hotelid='$hid'");   while($fetchroomtype=mysql_fetch_array($selectroomtype))    {  ?>
                    <tr>
                      <td style="background-color:#58ACFA;font-weignt:bold;color:white;"  align="center" colspan="3"><?php  if($fetchroomtype['for']=='1')  {   echo "Adult";  }  if($fetchroomtype['for']=='2')  {   echo "Child";  }      ?></td>
                      <td><?php   if($fetchroomtype['servicetype']=='1')  { echo "Breakfast"; }  if($fetchroomtype['servicetype']=='2')  { echo "Lunch"; }  if($fetchroomtype['servicetype']=='3')  { echo "Dinner"; }   if($fetchroomtype['servicetype']=='4')  { echo "Room Only"; }  if($fetchroomtype['servicetype']=='5')  { echo "Room + Bf";}  if($fetchroomtype['servicetype']=='6')  { echo "BF+ L";}  if($fetchroomtype['servicetype']=='7')  { echo "BF+ L+D";}  if($fetchroomtype['servicetype']=='8')  { echo "BF+D";}  ?>
                        <?php  if($fetchroomtype['for']=='1')  {    ?>
                        SGD&nbsp;
                        <?=$fetchroomtype['rate'];?>
                        <?php  }  if($fetchroomtype['for']=='2')  {    ?>
                        SGD&nbsp;
                        <?=$fetchroomtype['rate'];?>
                        <?php  }         ?></td>
                    </tr>
                    <?php  }    }  }    ?>
                    <?php				 }				?>
                    <!--  <img   src="images/book.jpg" style="" /></a>  -->
                  </table>
                   </div>
               </div>
                  <?php			$i++;			} 		 			?>
                 
                </div>
              </div>
             
            </form>
        
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row builders">
  <div class="container">
    <div class="col-sm-10 col-sm-offset-1">
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
        $(".owl-slider").owlCarousel({
            autoPlay: 3000, //Set AutoPlay to 3 seconds
            items: 1,
            itemsDesktop: [1199, 1],
            itemsDesktopSmall: [979, 1]
        });
    });
    </script>
</body></html>