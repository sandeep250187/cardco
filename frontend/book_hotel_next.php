 <?php include "include/header-h.php";$d=date('Y/m/d'); 
 
 
$select1=mysql_query("SELECT * FROM `b2bagent_markup` where agent_id='38'");

$fetch1=mysql_fetch_array($select1);

 
 
 echo $hid=trim($_POST['hid']);

$nrooms=$_POST['nrooms'];

			  $nroomd=$_POST['nroomd'];

				   $nroomt=$_POST['nroomt'];

				 

				 



				   

   $breakfast_rate;				

  $rc1=$_POST['rc1'];				   

				   

 $adult=$_GET['adult'];

 

 // $child=$_GET['child'];

  $night=$_POST['night'];

    $room=$_GET['room'];

  $cindate=$_POST['cidate'];

  $coutdate=$_POST['codate'];

 $web=$_SESSION['webi']; 

 $rate=$_GET['rate'];

  $rt=$_GET['rt'];

 $rc=$_POST['rc'];

 $sql5=mysql_query("select * from mala_hotelmaster where  id='$hid'");

 $fetch5=mysql_fetch_array($sql5);

 

 

 $selectroomtype=mysql_query("select * from mala_resrv_exservrates where hotelid='$hid' AND servicetype='1'");

				 

    while($fetchroomtype=mysql_fetch_array($selectroomtype))

	{

	if($fetchroomtype['for']==2)

	{

	

	$breakfast_rate=$fetchroomtype['rate'];

	}

	

	}

 
 $hname=$fetch5['hotelname'];
 ?>

<div class="row gap bg-grey">
  <div class="container">
    <div class="row text-center">
      <h1 class="headings">Book Hotel</h1>
    </div>
    <div class="col-md-10 col-sm-offset-1">
      <div class="panel panel-default box row">
        <div class="panel-body">
          <div class="form-horizontal">
            <div class="form-group">
              <form name="booking_master" id="ospmaster" method="post" onSubmit="return validate();" action="book_hotel.php">
                <?php

   $hotelname=$_POST['hotelname'];

   $nationality=$_GET['nationality'];

 $checkin_date=$_GET['cindate'];

  $checkout_date=$_GET['coutdate'];

     $night=$_GET['night'];

   $adult=$_GET['adult'];

 $cwb=$_GET['cwb'];

  $cnb=$_GET['cnb'];

 $room=$_GET['room']; 

 $select_hotel=mysql_query("select * from mala_hotelmaster where id='$hid'");

  $fetch_hotel=mysql_fetch_array($select_hotel);

 

 ?>
         
 
                
                <?php

 

 $hidd=$fetch_hotel['id'];

  $desc=$fetch_hotel['landline'];

 	$select_roomtype1=mysql_query("select * from mala_roomtypemaster where hotelid='$hidd'");

				$count1=mysql_num_rows($select_roomtype1);

				$fetch_roomtype1=mysql_fetch_array($select_roomtype1);

				 

				 $hi=$fetch_roomtype1['hotelid'];

				 

				  $roomtypes=$_POST['roomtypes'];

				  $roomtyped=$_POST['roomtyped'];

				  $roomtypet=$_POST['roomtypet'];

						  $nrooms=$_POST['nrooms'];

			  $nroomd=$_POST['nroomd'];

				   $nroomt=$_POST['nroomt'];

				$night=$_POST['night'];

				$rc=$_POST['rc'];

				 

		 	$cnb=$_POST['cnb'];

				

				   

				    $rates=$_POST['rates'];

				    $rated=$_POST['rated'];

				    $ratet=$_POST['ratet'];

					

					if($cnb!=0)

					{

					$selectroomtype=mysql_query("select * from mala_resrv_exservrates where hotelid='$hidd' AND servicetype='1'");

				 

    while($fetchroomtype=mysql_fetch_array($selectroomtype))

	{

	if($fetchroomtype['for']==2)

	{

	

	$breakfast_rate=$fetchroomtype['rate'];

	}
	}
	}	   

 ?>
                <input type="hidden" name="cnb"  value="<?php echo $cnb;  ?>" />
                <input type="hidden" name="hid"  value="<?php echo $hid;  ?>" />
                <input type="hidden" name="ci"  value="<?php echo $cindate;  ?>" />
                <input type="hidden" name="co"  value="<?php echo $coutdate;  ?>" />
                <input type="hidden" name="night"  value="<?php echo $night;  ?>" />
                <input type="hidden" name="nrooms"  value="<?php echo $nrooms;  ?>" />
                <input type="hidden" name="nroomd"  value="<?php echo $nroomd;  ?>" />
                <input type="hidden" name="nroomt"  value="<?php echo $nroomt;  ?>" />
                <input type="hidden" name="rc1"  value="<?php echo $rc1;  ?>" />
                <div class="col-sm-8">
                  <h4 class="text-warning"><strong> <i class="fa fa-building-o"></i>
                    <?php    echo $fetch_hotel['hotelname']; ?>
                    <input type="hidden" name="hn" value="<?php    echo $fetch_hotel['hotelname']; ?>"  />
                    </strong></h4>
                  <p> <i class="fa fa-map-marker"></i> : <?php    echo $fetch5['address']; ?></p>
                   <table  class="table table-bordered table-condensed">
                    <tr>
                      <th  >Check in date</th><td><?php  echo $cindate=date("d  M, Y",strtotime($cindate));  ?></td>
                      </tr>
                      <tr>
                      <th  >Check Out Date</th> <td><?php  echo $coutdate=date("d  M, Y",strtotime($coutdate));  ?></td>
                      </tr>
                      <tr>
                      <th  >No.of Night</th>
                       <td   align="left"><?php echo $night;  ?></td>
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
                      <th> Per Room Per Night Cost </th>
                      <th> Calculate(Price per Night X No of Room X night) </th>
                    </tr>
                    <?php  

	 if($nrooms!='' and $nrooms!='0')

	 {

	 ?>
                    <tr>
                      <td><b> Single(<?php echo $rc1; ?>)</b>
                        <input type="hidden" value="1" name="roomtypes" /></td>
                      <td><b> <?php echo $rates;  ?></b></td>
                      <td><?php  echo $rates;    echo " X "; echo $nrooms; echo " X "; echo $night; echo " = ";  echo $totals=$rates*$nrooms*$night; ?>
                        <input type="hidden" name="rates" value="<?php echo $rates; ?>"    /></td>
                    </tr>
                    <?php

	 }

	 

	 if($nroomd!='' and $nroomd!='0')

	 {

	 ?>
                    <tr>
                      <td><b>Double(<?php echo $rc1; ?>)</b>
                        <input type="hidden" value="2" name="roomtyped" /></td>
                      <td><b><?php echo $rated;  ?></b></td>
                      <td><?php    echo $rated; echo " X "; echo $nroomd; echo " X "; echo $night; echo " = ";  echo $totald=$rated*$nroomd*$night;?></td>
                        <input type="hidden" name="rated" value="<?php echo $rated; ?>"    /></td>
                    </tr>
                    <?php

 }

 

 if($nroomt!='' and $nroomt!='0')

 {

 

 ?>
                    <tr>
                      <td><b>Triple(<?php echo $rc1; ?>)</b>
                        <input type="hidden" value="3" name="roomtypet" /></td>
                      <td><b> <?php echo $ratet;  ?></b></td>
                      <td><b><?php echo $ratet;   echo " X "; echo $nroomt; echo " X "; echo $night; echo " = "; echo $totalt=$ratet*$nroomt*$night;   ?></b>
                        <input type="hidden" name="ratet" value="<?php echo $ratet; ?>"    /></td>
                    </tr>
                    <?php

 }

 

 if($cnb!='0')

 {

 

 ?>
                    <tr>
                      <td><b>Chil No Bed</b>
                        <input type="hidden" value="3" name="cnb" /></td>
                      <td><b> <?php echo $ratet;  ?></b></td>
                      <td><b><?php echo $cnb ;  echo " X "; echo $breakfast_rate; echo " X "; echo $night; echo " = "; echo $totalb=$cnb*$breakfast_rate*$night;   ?></b>
                        <input type="hidden" name="fb" value="<?php echo $totalb; ?>"    /></td>
                    </tr>
                    <?php

 }

 ?>
                    <tr>
                      <td  ></td>
                      <td><b style="color:red;">Total Booking Cost=</b></td>
                      <td  ><b style="color:red;">MYR <?php echo $total=$totals+$totald+$totalt+$totalb ?></b>
                        <input type="hidden" name="total" value="<?php echo $total; ?>" /></td>
                    </tr>
                  </table>
                 
                </div>
                 <div class="text-center">
                  <button type="button" class="btn btn-primary book-now">Add <i class="fa fa-plus"></i> </button>
              </div>
               </div>
              
              </form>
            </div>
          </div>
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