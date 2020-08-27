<?php include "include/header-h.php";$d=date('Y/m/d'); 
 
 
$select1=mysql_query("SELECT * FROM `b2bagent_markup` where agent_id='38'");

$fetch1=mysql_fetch_array($select1);

  $hid=trim($_GET['hid']);

 $pid=$_GET['pid']; 

$web=$_GET['webid'];

 $adult=$_GET['adult'];

  $cwb=$_GET['cwb'];

   $cnb=$_GET['cnb'];

 //$ch=$_GET['cnb'];

   $night=$_GET['night'];

    $room=$_GET['room'];

	  $cindate=$_GET['cindate'];
	  $date=$_GET['cindate'];

	   $coutdate=$_GET['coutdate'];

// $web=$_SESSION['webi']; 

  $rate=$_GET['rate'];



  $rt=$_GET['rt'];

 $rc=$_GET['rc'];

 $rc1=$_GET['rc1'];

 $sql5=mysql_query("select * from mala_hotelmaster where  id='$hid'");

 $fetch5=mysql_fetch_array($sql5);

 $select2=mysql_query("SELECT * FROM `b2b2_gen_package` where webid='$web'");

$fetch2=mysql_fetch_array($select2);

 

 $hname=$fetch5['hotelname'];
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 	//Calculate Hotel Rate Start

	

				

$sql3=mysql_query("select * from mala_roomtypemaster where hotelid='$hid' and roomtype='Single' and room_cat='$rc'");  			

  $count3=mysql_num_rows($sql3);

if($count3!=0)

{

  $row3=mysql_fetch_array($sql3);

  $rtp=$row3['id'];

 echo $date=$cindate;

  $night;

$tots='';			

				 for($k=1;$k<=$night;$k++)

	 {

	 $day=date('D',strtotime($date));

	   if($day=='Mon' or $day=='Tue' or $day=='Wed' or $day=='Thu')

	 {

	 $selectsurcharge=mysql_query("SELECT MAX(rate) FROM `mala_htl_tarrifmaster` where hotelid='$hid' and roomtype='$rtp' and '$date' BETWEEN vfrom and vto and type='Surcharge' and (DMON='Y' or DTUE='Y' or DWED='Y' or DTHU='Y')"); 

	 }

	 if($day=='Fri' or $day=='Sat' or $day=='Sun')

	 {

	 $selectsurcharge=mysql_query("SELECT MAX(rate) FROM `mala_htl_tarrifmaster` where hotelid='$hid' and roomtype='$rtp' and '$date' BETWEEN vfrom and vto and type='Surcharge' and (DFRI='Y' or DSAT='Y' or DSUN='Y')"); 

	 }

	 //$selectsurcharge=mysql_query("SELECT MAX(rate) FROM `sing_htl_tarrifmaster` where hotelid='$hotelid' and roomtype='$room_type' and '$date' BETWEEN vfrom and vto and $column='Y' and type='Surcharge' and (DMON='Y' or DTUE='Y' or DWED='Y' or DTHU='Y' or DFRI='Y' or DSAT='Y' or DSUN='Y')"); 

	 $fetchratesurcharge=mysql_fetch_array($selectsurcharge);

     if($fetchratesurcharge[0]!='')

	 {

	  echo $rate=$fetchratesurcharge[0]; 

	 //$amount=$rate*$nofnight; 

	 }

	 

	 

	  if($day=='Mon' or $day=='Tue' or $day=='Wed' or $day=='Thu')

	 {

	 $selectpromotional=mysql_query("SELECT MAX(rate) FROM `mala_htl_tarrifmaster` where hotelid='$hid' and roomtype='$rtp' and '$date' BETWEEN vfrom and vto and type='Promotional' and (DMON='Y' or DTUE='Y' or DWED='Y' or DTHU='Y')"); 

	 }

	 if($day=='Fri' or $day=='Sat' or $day=='Sun')

	 {

	 $selectpromotional=mysql_query("SELECT MAX(rate) FROM `mala_htl_tarrifmaster` where hotelid='$hid' and roomtype='$rtp' and '$date' BETWEEN vfrom and vto and type='Promotional' and (DFRI='Y' or DSAT='Y' or DSUN='Y')"); 

	 }

	 //$selectpromotional=mysql_query("SELECT MIN(rate) FROM `sing_htl_tarrifmaster` where hotelid='$hotelid' and roomtype='$room_type' and '$date' BETWEEN vfrom and vto and type='Promotional' and (DMON='Y' or DTUE='Y' or DWED='Y' or DTHU='Y' or DFRI='Y' or DSAT='Y' or DSUN='Y')"); 

	 $fetchratepromo=mysql_fetch_array($selectpromotional);

	 if($fetchratesurcharge[0]=='')

	 {

     if($fetchratepromo[0]!='')

	 {

	  $rate=$fetchratepromo[0];  

	 //$amount=$rate*$nofnight; 

	 }

	 }

	 

	 

	 $selectcontract=mysql_query("SELECT MIN(rate) FROM `mala_htl_tarrifmaster` where hotelid='$hid' and roomtype='$rtp' and '$date' BETWEEN vfrom and vto and type='Contract'"); 

	 

	 

	 $fetchratecont=mysql_fetch_array($selectcontract);

	 if($fetchratesurcharge[0]=='')

	 {

	 if($fetchratepromo[0]=='')

	 {

     if($fetchratecont[0]!='')

	 {

	 

	     $rate=$fetchratecont[0];

	 //$amount=$rate*$nofnight;

	 }

	 }

	 }

	 ///////////////

	

	 //////////////

	 

	

	 $date=date('Y/m/d', strtotime('+1 day', strtotime($date)));

	 $tots=$tots+$rate;

	 }

	 ////////////////

  echo " "; //echo $tot; 

	

/*	if($rt=='Single')

	{

	echo $rate=$tot; 

	}

	

	*/

	/*if($rt=='Double')

	{

	 

	echo $rate=(round($tot,2)/$night); 

	} */

	 

  

	   $rates=(round($tots,2)/$night); 

	

 }



	

$sql4=mysql_query("select * from mala_roomtypemaster where hotelid='$hid' and roomtype='Triple' and room_cat='$rc'");  			

  $count4=mysql_num_rows($sql4);

if($count4!=0)

{

  $row4=mysql_fetch_array($sql4);

 $rtp=$row4['id'];

 $date=$cindate;

  $night;

$tot_trp='';			

				 for($k=1;$k<=$night;$k++)

	 {

  $day=date('D', strtotime($date));

	   if($day=='Mon' or $day=='Tue' or $day=='Wed' or $day=='Thu')

	 {

	 $selectsurcharge=mysql_query("SELECT MAX(rate) FROM `mala_htl_tarrifmaster` where hotelid='$hid' and roomtype='$rtp' and '$date' BETWEEN vfrom and vto and type='Surcharge' and (DMON='Y' or DTUE='Y' or DWED='Y' or DTHU='Y')"); 

	 }

	 if($day=='Fri' or $day=='Sat' or $day=='Sun')

	 {

	 $selectsurcharge=mysql_query("SELECT MAX(rate) FROM `mala_htl_tarrifmaster` where hotelid='$hid' and roomtype='$rtp' and '$date' BETWEEN vfrom and vto and type='Surcharge' and (DFRI='Y' or DSAT='Y' or DSUN='Y')"); 

	 }

	 //$selectsurcharge=mysql_query("SELECT MAX(rate) FROM `sing_htl_tarrifmaster` where hotelid='$hotelid' and roomtype='$room_type' and '$date' BETWEEN vfrom and vto and $column='Y' and type='Surcharge' and (DMON='Y' or DTUE='Y' or DWED='Y' or DTHU='Y' or DFRI='Y' or DSAT='Y' or DSUN='Y')"); 

	 $fetchratesurcharge=mysql_fetch_array($selectsurcharge);

     if($fetchratesurcharge[0]!='')

	 {

	  $rate=$fetchratesurcharge[0]; 

	 //$amount=$rate*$nofnight; 

	 }

	 

	 

	  if($day=='Mon' or $day=='Tue' or $day=='Wed' or $day=='Thu')

	 {

	 $selectpromotional=mysql_query("SELECT MAX(rate) FROM `mala_htl_tarrifmaster` where hotelid='$hid' and roomtype='$rtp' and '$date' BETWEEN vfrom and vto and type='Promotional' and (DMON='Y' or DTUE='Y' or DWED='Y' or DTHU='Y')"); 

	 }

	 if($day=='Fri' or $day=='Sat' or $day=='Sun')

	 {

	 $selectpromotional=mysql_query("SELECT MAX(rate) FROM `mala_htl_tarrifmaster` where hotelid='$hid' and roomtype='$rtp' and '$date' BETWEEN vfrom and vto and type='Promotional' and (DFRI='Y' or DSAT='Y' or DSUN='Y')"); 

	 }

	 //$selectpromotional=mysql_query("SELECT MIN(rate) FROM `sing_htl_tarrifmaster` where hotelid='$hotelid' and roomtype='$room_type' and '$date' BETWEEN vfrom and vto and type='Promotional' and (DMON='Y' or DTUE='Y' or DWED='Y' or DTHU='Y' or DFRI='Y' or DSAT='Y' or DSUN='Y')"); 

	 $fetchratepromo=mysql_fetch_array($selectpromotional);

	 if($fetchratesurcharge[0]=='')

	 {

     if($fetchratepromo[0]!='')

	 {

 $rate=$fetchratepromo[0];  

	 //$amount=$rate*$nofnight; 

	 }

	 }

	 

	 if($day=='Mon' or $day=='Tue' or $day=='Wed' or $day=='Thu')

	 {

	 $selectcontract=mysql_query("SELECT MIN(rate) FROM `mala_htl_tarrifmaster` where hotelid='$hid' and roomtype='$rtp' and '$date' BETWEEN vfrom and vto and type='Contract' and (DMON='Y' or DTUE='Y' or DWED='Y' or DTHU='Y')"); 

	 }

	 if($day=='Fri' or $day=='Sat' or $day=='Sun')

	 {

	 $selectcontract=mysql_query("SELECT MIN(rate) FROM `mala_htl_tarrifmaster` where hotelid='$hid' and roomtype='$rtp' and '$date' BETWEEN vfrom and vto and type='Contract' and (DFRI='Y' or DSAT='Y' or DSUN='Y')"); 

	 }

	 $fetchratecont=mysql_fetch_array($selectcontract);

	  if($fetchratesurcharge[0]=='')

	 {

	 if($fetchratepromo[0]=='')

	 {

     if($fetchratecont[0]!='')

	 {

	 

	     $rate=$fetchratecont[0];

	 //$amount=$rate*$nofnight;

	 }

	 }

	 }

	 ///////////////

	

	 //////////////

	 

	

	  $date=date('Y/m/d', strtotime('+1 day', strtotime($date)));

	  $tot_trp=$tot_trp+$rate;

	 }

	 ////////////////

	  echo " "; //echo $tot; 

	

/*	if($rt=='Single')

	{

	echo $rate=$tot; 

	}

	

	*/

	/*if($rt=='Double')

	{

	 

	echo $rate=(round($tot,2)/$night); 

	} */

	 

	   $tot_trp; 

   $ratet=(round($tot_trp,2)/$night); 
   
   
// Calculace hotel rate end
 
 
}
 
 
 ?>

<div class="row gap bg-grey">
  <div class="container">
    <div class="row text-center">
      <h1 class="headings">Book Hotel</h1>
    </div>
    <div class="col-md-10 col-sm-offset-1">
      <div class="panel panel-default box row">
        <div class="panel-body">
          <?php

 

 $fetch_hotel=mysql_fetch_array($select_hotel); 

 $hidd=$fetch_hotel['id'];

  $desc=$fetch_hotel['landline'];

 	$select_roomtype1=mysql_query("select * from mala_roomtypemaster where hotelid='$hidd'");

				$count1=mysql_num_rows($select_roomtype1);

				$fetch_roomtype1=mysql_fetch_array($select_roomtype1);		 

				 $hi=$fetch_roomtype1['hotelid'];
 ?>
          <form name="booking_master" id="ospmaster" method="post" onSubmit="return validate();" action="book_hotel_next.php">
            <input type="hidden" name="cwb" value="<?php echo $cwb;  ?>" />
            <input type="hidden" name="cnb" value="<?php echo $cnb;  ?>" />
            <input type="hidden" name="rc1" value="<?php echo $rc1;  ?>" />
            <input type="hidden" name="hid" value="<?php echo $hid;  ?>" />
            <input type="hidden" name="cidate" value="<?php echo $_GET['cindate'];  ?>" />
            <input type="hidden" name="codate" value="<?php echo $_GET['coutdate'];  ?>" />
            <input type="hidden" name="night" value="<?php echo $night;  ?>" />
            <input type="hidden" name="rc" value="<?php echo $rc;  ?>" />
            <div class="col-sm-8">
              <h4 class="text-warning"><strong>  <i class="fa fa-building-o"></i> 
                <?php    echo $hname; ?>
                </strong></h4>
              <p> <i class="fa fa-map-marker"></i> :  <?php    echo $fetch5['address']; ?></p>
              <table  class="table table-bordered table-condensed">
                <tr>
                  <th  >Check in date</th>
                  <td><?php  echo $cindate=date("d  M, Y",strtotime($cindate));  ?></td>
                </tr>
                <tr>
                  <th  >Check Out Date</th>
                  <td><?php  echo $coutdate=date("d  M, Y",strtotime($coutdate));  ?></td>
                </tr>
                <tr>
                  <th  >No.of Night</th>
                  <td   align="left"><?php  echo $night;  ?></td>
                </tr>
              </table>
            </div>
            <div class="col-sm-4">
              <div class="row">
                <div id="pictures" class="owl-slider"> <a class="item" href="http://aatg.work/my/upload/2017-08-23 18:24:48holiday-inn-resort-penang-3470202595-4x3.jpg" rel="prettyPhoto" title="This is the description"> <img src="http://aatg.work/my/upload/2017-08-23 18:24:48holiday-inn-resort-penang-3470202595-4x3.jpg" alt="title" /> </a> <a class="item" href="http://aatg.work/my/upload/2017-08-23 18:24:48holiday-inn-resort-penang-3470202595-4x3.jpg" rel="prettyPhoto" title="This is the description"> <img src="http://aatg.work/my/upload/2017-08-23 18:24:48holiday-inn-resort-penang-3470202595-4x3.jpg" alt="title" /> </a> <a class="item" href="http://aatg.work/my/upload/2017-08-23 18:24:48holiday-inn-resort-penang-3470202595-4x3.jpg" rel="prettyPhoto" title="This is the description"> <img src="http://aatg.work/my/upload/2017-08-23 18:24:48holiday-inn-resort-penang-3470202595-4x3.jpg" alt="title" /> </a> 
                  
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
                <table  class="table table-bordered table-condensed">
                  <tr>
                    <th> Ocupancy </th>
                    <th> Number Of Room </th>
                    <th> Per Room Per Night </th>
                  </tr>
                  
                  <!-- <?php

	// $sql5=mysql_query("select distinct roomtype from sing_roomtypemaster where room_cat='$rc' and hotelid='$hid'");

	//while($row5=mysql_fetch_array($sql5))

	//{

	?>

	<tr><td><?php //echo $row5['roomtype']; ?></td><td>sd</td></tr>

	<?php

	//}

	 ?>  -->
                  
                  <?php

	 if($rates!='')

	 {

	 ?>
                  <tr>
                    <td><b> Single(<?php echo $rc1; ?>)</b>
                      <input type="hidden" value="1" name="roomtypes" /></td>
                    <td ><select name="nrooms" class="form-control input-sm">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                      </select></td>
                    <td> MYR
                      <?php  $rates; 

	

	if($fetch1['malah_pmark']=='FIX')

  {

 echo  $rates=$rates+$fetch1['malah_fmark'];

  

  }

  if($fetch1['malah_pmark']=='PER')

  {

  

  echo  $rates=$rates+($rates*$fetch1['malah_fmark'])/100;

  }

 

	

	?>
                      <input type="hidden" name="rates" value="<?php echo $rates; ?>"    /></td>
                  </tr>
                  <?php

	 }

	 ?>
                  <tr>
                    <td><b>Double(<?php echo $rc1; ?>)</b>
                      <input type="hidden" value="2" name="roomtyped" /></td>
                    <td ><select name="nroomd" class="form-control input-sm">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                      </select></td>
                    <td> MYR
                      <?php   $rated=$_GET['rate'];   $rated; 

 

 if($fetch1['malah_pmark']=='FIX')

  {

 echo  $rated=$rated+$fetch1['malah_fmark'];

  

  }

  if($fetch1['malah_pmark']=='PER')

  {

  

  echo  $rated=$rated+($rated*$fetch1['malah_fmark'])/100;


  }

 ?>
                      <input type="hidden" name="rated" value="<?php echo $rated; ?>"    /></td>
                  </tr>
                  <?php

	if($ratet!='')

{	

	 ?>
                  <tr>
                    <td><b>Triple(<?php echo $rc1; ?>)</b>
                      <input type="hidden" value="3" name="roomtypet" /></td>
                    <td><select name="nroomt" class="form-control" style="width:76px; display:inline-block">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                      </select></td>
                    <td> MYR
                      <?php   $ratet; 

	

if($fetch1['malah_pmark']=='FIX')

  {

 echo  $ratet=$ratet+$fetch1['malah_fmark'];

  

  }

  if($fetch1['malah_pmark']=='PER')

  {

  

  echo  $ratet=$ratet+($ratet*$fetch1['malah_fmark'])/100;

  }

 

	?>
                      <input type="hidden" name="ratet" value="<?php echo $ratet ?>"    /></td>
                  </tr>
                  <?php

}

?>
                  <tr>
                    <td  > Child No Bed*</td>
                    <td><select name="cnb"    class="form-control input-sm">
                        <?php

  for($i=0;$i<=10;$i++)

  { ?>
                        <option value="<?=$i?>">
                        <?=$i?>
                        </option>
                        <?php 

  }

  ?>
                      </select></td>
                  </tr>
                  <tr>
                    <td colspan="3" align="left"><b style="color:orange;"> Note:-Child with extra bed to be selected as triple sharing </b></td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="text-center">
              <button type="submit"  class="btn btn-primary book-now">Next <i class="fa fa-angle-double-right"></i></button>
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