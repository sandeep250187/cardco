 <?php include "include/header.php";  

 $d=date('Y/m/d'); ?>
  <div class="row banner">
  <form name="frm" action="hotel-search-apmg.php" method="POST"> 
   <input name="by" type="hidden" value="2"/>
    <div class="input">
    <h4>Search Hotel + Venue Shuttle</h4>
  <form name="frm" method="POST" action="">
       <ul class="list-unstyled">
       <li>
              <select type="search" class="form-control searchbox">
                <option>Penang</option>
              </select>
              </li>
             
           <li><input type="text" value="<?php echo $d; ?>" class="form-control" id="from-date" name="cd">
          </li>		   <li>                         <select type="night" name="night" class="form-control searchbox1">                 					<?php							for($i=1;$i<14;$i++)							{							?>							<option value="<?php echo $i; ?>" <?php echo ($_POST['adult']==$i)?'selected="selected"' : '' ?> ><?php echo $i; ?></option>                   <?php							}				   ?>              </select>           </li>
          <li>                        <select type="search" name="adult" class="form-control searchbox1" required>                         						<?php							for($i=1;$i<14;$i++)							{							?>							<option value="<?php echo $i; ?>" <?php echo ($_POST['adult']==$i)?'selected="selected"' : '' ?> ><?php echo $i; ?></option>                   <?php							}				   ?>                        </select>                                           </li>
           <li>                        <select type="search" name="child" class="form-control searchbox1" required>                        						<?php							for($i=1;$i<14;$i++)							{							?>							<option value="<?php echo $i; ?>" <?php echo ($_POST['adult']==$i)?'selected="selected"' : '' ?> ><?php echo $i; ?></option>                   <?php							}				   ?>                        </select>                                           </li>
           <li>
              <button class="btn btn-primary btn-block btn-search" name="search">Search</button>
              </li>
              </ul>
        </form>
        </div>
  
   </form>
    <div id="carousel-example" class="carousel slide carousel-fade" data-ride="carousel"> 
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example" data-slide-to="1"></li>
        <li data-target="#carousel-example" data-slide-to="2"></li>
      </ol>
      
      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active"> <img src="images/banner.jpg" alt="...">
        
        </div>
        <div class="item"> <img src="images/banner1.jpg" alt="...">
        
        </div>
        <div class="item"> <img src="images/banner2.jpg" alt="...">
        
        </div>
      </div>
      
      <!-- Controls --> 
      <a class="left carousel-control" href="#carousel-example" role="button" data-slide="prev"> <span class="sr-only">Previous</span><i class="glyphicon glyphicon-chevron-left"></i> </a> <a class="right carousel-control" href="#carousel-example" role="button" data-slide="next"> <span class="sr-only">Next</span><i class="glyphicon glyphicon-chevron-right"></i>  </a> </div>
  </div>
 
  <div class="row">
    <div class="container ">
      <div class="row text-center">
        <h4 class="heading">Hotels, apartments, Homestays and more in Penang </h4>
        <ul class="list-inline property-india">
          <li>
            <div class="div"><img src="http://aatg.work/my/upload/2016-10-24 15:57:33tune.jpg">
              <button class="btn btn-warning btn-xs btn-view" onClick="window.location='hotel-search.php?search=search'">View Details</button>
              <span class="heading">TUNE HOTEL</span></div>
          </li>
          <li>
            <div class="div"><img src="http://aatg.work/my/upload/2016-10-24 10:13:44sentral penanag.jpg">
              <button class="btn btn-warning btn-xs btn-view" onClick="window.location='hotel-search.php?search=search'">View Details</button>
              <span class="heading">SENTRAL GEORGE TOWN</span></div>
          </li><li>
            <div class="div"><img src="http://aatg.work/my/upload/2016-10-24 13:26:33red rock.jpg">
              <button class="btn btn-warning btn-xs btn-view" onClick="window.location='hotel-search.php?search=search'">View Details</button>
              <span class="heading">RED ROCK HOTEL</span></div>
          </li><li>
            <div class="div"><img src="http://aatg.work/my/upload/2016-10-21 18:08:56copthrone orchid.jpg">
              <button class="btn btn-warning btn-xs btn-view" onClick="window.location='hotel-search.php?search=search'">View Details</button>
              <span class="heading">COPTHORNE ORCHID HOTEL</span></div>
          </li><li>
            <div class="div"><img src="http://aatg.work/my/upload/2016-10-24 13:21:27rainbow.jpg">
              <button class="btn btn-warning btn-xs btn-view" onClick="window.location='hotel-search.php?search=search'">View Details</button>
              <span class="heading">RAINBOW PARADISE BEACH RESORT</span></div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="row trending-projects">
    <div class="container text-center">
      <h1 class="headings">Our Daily Departure Tours </h1>
      <div class="row">
      <?php
       $d=date('Y/m/d');
      ?>
        <div  class="trending">
          <div class="col-sm-3">
            <div class="divs"><a href="tours.php?type=PVT&date_from=<?php echo $d; ?>&adult=2&child=0"><img src="http://aatg.work/sms/myo/upload/2016-07-27 17:38:55heritagetour.jpg"> 
              <h5 class="location-name">PENANG HERITAGE TOUR</h5></a>
             </div>
            </div><div class="col-sm-3">
            <div class="divs"><a href="tours.php?type=PVT&date_from=<?php echo $d; ?>&adult=2&child=0"><img src="http://aatg.work/sms/myo/upload/2016-07-27 17:40:22hillandtemple.jpg"></a>
              <h5 class="location-name">PENANG HILL & TEMPLE TOUR</h5>
             </div>
            </div><div class="col-sm-3">
            <div class="divs"><a href="tours.php?type=PVT&date_from=<?php echo $d; ?>&adult=2&child=0"><img src="http://aatg.work/sms/myo/upload/2016-07-27 17:41:42scenicnight.jpg"></a>
              <h5 class="location-name">PENANG SCENIC NIGHT TOUR</h5>
             </div>
            </div><div class="col-sm-3">
            <div class="divs"><a href="tours.php?type=PVT&date_from=<?php echo $d; ?>&adult=2&child=0"><img src="http://aatg.work/sms/myo/upload/2016-07-27 17:37:46penangcitytour.jpg"></a>
              <h5 class="location-name">PENANG CITY TOUR</h5>
             </div>
            </div>
            
            <!--<div class="col-sm-3">
            <div class="divs"><a href="tours.php"><img src="images/trending4.jpg"> </a>
              <h5 class="location-name">TOURIST ATTRACTIONS</h5>
             </div>
            </div><div class="col-sm-3">
            <div class="divs"><a href="tours.php"><img src="images/trending5.jpg"> </a>
              <h5 class="location-name">TOURIST ATTRACTIONS</h5>
             </div>
            </div><div class="col-sm-3">
            <div class="divs"><a href="list-page.html"><img src="images/trending6.jpg"> </a>
              <h5 class="location-name">TOURIST ATTRACTIONS</h5>
             </div>
            </div>
            
            <div class="col-sm-3">
            <div class="divs"><a href="list-page.html"><img src="images/trending7.jpg"> </a>
              <h5 class="location-name">TOURIST ATTRACTIONS</h5>
             </div>
            </div>-->
          
        </div>
      </div>
      
   
      <h1 class="headings">Pre - Post Event Surprises</h1>
      <div class="row">
        <div  class="trending">
          <div class="col-sm-3">
            <div class="divs"><a href="tours.php"><img src="images/kl.jpg"> </a>
              <h5 class="location-name">KUALA LUMPUR</h5>
             </div>
            </div><div class="col-sm-3">
            <div class="divs"><a href="tours.php"><img src="images/lg.jpg"> </a>
              <h5 class="location-name">LANGKAWI</h5>
             </div>
            </div><div class="col-sm-3">
            <div class="divs"><a href="tours.php"><img src="images/cm.jpg"> </a>
              <h5 class="location-name">CAMEROON HIGHLAND</h5>
             </div>
            </div><div class="col-sm-3">
            <div class="divs"><a href="tours.php"><img src="images/jh.jpg"> </a>
              <h5 class="location-name">JOHOR BAHRU</h5>
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
          <li><a href="#"><img src="images/c1.jpg"></a></li>
          <li><a href="#"><img src="images/c2.jpg"></a></li>
          <li><a href="#"><img src="images/c3.jpg"></a></li>
          <li><a href="#"><img src="images/c4.jpg"></a></li>
          <li><a href="#"><img src="images/c5.jpg"></a></li>
          <li><a href="#"><img src="images/c6.jpg"></a></li>
          <li><a href="#"><img src="images/c3.jpg"></a></li>
        </ul>
      </div>
      </div>
    </div>
  </div>
 <?php include "include/footer.php"; ?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/owl.carousel.js"></script> 
<script type="text/javascript">
        $(document).ready(function () {
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
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
    $('#date_from').datepicker({
        inline: true,
        firstDay: 1,
        showOtherMonths: true,
        // dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
        minDate: '0',
        maxDate: '30/11/2019',
        dateFormat: 'yy/mm/dd',
    });
    $('#date_to').datepicker({
        inline: true,
        firstDay: 1,
        showOtherMonths: true,
        // dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
        minDate: '0',
        maxDate: '30/11/2019',
        dateFormat: 'yy/mm/dd',
    });
    </script>
</body>
</html>