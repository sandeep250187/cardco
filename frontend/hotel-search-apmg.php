 <?php include "include/header.php";$d=date('Y/m/d'); ?>
 
 <link rel="stylesheet" href="bootstrap.css">
 
  <script>
 document.onreadystatechange = function () {
  var state = document.readyState
  if (state == 'interactive') {
       document.getElementById('contents').style.visibility="hidden";
  } else if (state == 'complete') {
      setTimeout(function(){
         document.getElementById('interactive');
         document.getElementById('load').style.visibility="hidden";
         document.getElementById('contents').style.visibility="visible";
      },1000);
  }
}
 </script>
 <style>
 #load{
    width:100%;
    height:100%;
    position:fixed;
    z-index:9999;
    background:url("https://www.creditmutuel.fr/cmne/fr/banques/webservices/nswr/images/loading.gif") no-repeat center center rgba(0,0,0,0.25)
}
 </style>
 <div id="load"></div>
 
 
 
         <div class="row banner">
  <form name="frm" action="hotel-search-apmg.php" method="POST"> 
   <input name="by" type="hidden" value="2"/>
    <div class="input">
    <h4>Search Hotel + Venue Shuttle</h4>
  <form name="frm" method="POST" action="">
       <ul class="list-unstyled">
       <li><label>Location :</label>
              <select type="search" class="form-control searchbox">
                <option>Penang</option>
              </select>
              </li>
             
           <li><label>Date :</label>
           <input type="text" id="date_from" value="<?php echo $d; ?>" class="form-control" name="cd">
          </li>		   
          <li><label>Night :</label>   
                                <select type="night" name="night" class="form-control searchbox1">                							<?php							for($i=6;$i<=6;$i++)							{							?>							<option value="<?php echo $i; ?>" <?php echo ($_POST['adult']==$i)?'selected="selected"' : '' ?> ><?php echo $i; ?></option>                   <?php							}				   ?>              </select>           </li>
          <li>    <label>Adult:</label>  
                              <select type="search" name="adult" class="form-control searchbox1" required>                      				<?php							for($i=1;$i<41;$i++)							{							?>							<option value="<?php echo $i; ?>" <?php echo ($_POST['adult']==$i)?'selected="selected"' : '' ?> ><?php echo $i; ?></option>                   <?php							}				   ?>                        </select>                                           </li>
           <li>          <label>Child :</label>                <select type="search" name="child" class="form-control searchbox1" required> <?php							for($i=0;$i<41;$i++)							{							?>							<option value="<?php echo $i; ?>" <?php echo ($_POST['adult']==$i)?'selected="selected"' : '' ?> ><?php echo $i; ?></option>                   <?php							}				   ?>                        </select>                                           </li>
           <li><label>&nbsp;</label>  
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
		<?php
		$night=$_REQUEST['night'];	
								$pattern=$_REQUEST['pattern'];		
								$df=$_REQUEST['cd'];	
$by=$_REQUEST['by'];				
		?>
        <div class="row bg-grey">
            <div class="container">
                <div class="row">
                    <div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-list">
                        <div class="col-md-7">
                            <ol class="breadcrumb">
                                <li><a href="index.html"><i class="fa fa-home"></i>Hotel with Transfer</a></li>
                               <li><a href="hotel-search-apmg.php?cd=<?php echo $df; ?>&night=<?php echo $night; ?>&by=2">By Price</a></li>
								  <li><a href="hotel-search-apmg.php?cd=<?php echo $df; ?>&night=<?php echo $night; ?>&by=1">By Hotel Name</a></li>
                            </ol>
                        </div>
                        <div class="cbp-vm-options">
                            <a href="#" class="cbp-vm-icon cbp-vm-grid" data-view="cbp-vm-view-grid">Grid View</a>
                            <a href="#" class="cbp-vm-icon cbp-vm-list cbp-vm-selected" data-view="cbp-vm-view-list">List View</a>
                        </div>
                        <div class="col-sm-12 col-sm-push">
                            <div class="row">
                                <ul>									<?php		 							
														
								//$adult=$_POST['adult'];			
								//$child=$_POST['child'];			
								//$pax=$adult+$child;		

								//$sql1=mysql_query("select h.id,h.hotelname,h.starcat,h.hotel_pic,h.address,t.* from mala_hotelmaster h ,vcon_hotel_tariff t where h.id=t.hotel_id ORDER BY CAST(t.twin_rate AS decimal) asc");
$q=mysql_query("select * from apmg_hotel_tariff");
 
/////// PAGING START
$recordPerPage=30;
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
		if($by==1)
		{			
$sql1=mysql_query("select h.id,h.hotelname,h.starcat,h.hotel_pic,h.address,t.* from mala_hotelmaster h ,apmg_hotel_tariff t where h.id=t.hotel_id ORDER BY h.hotelname asc LIMIT $limit,$recordPerPage"); 
		}
		if($by==2)
		{			
$sql1=mysql_query("select h.id,h.hotelname,h.starcat,h.hotel_pic,h.address,t.* from mala_hotelmaster h ,apmg_hotel_tariff t where h.id=t.hotel_id ORDER BY CAST(t.double_rate_1 AS decimal) asc LIMIT $limit,$recordPerPage"); 
		}
								
								
								


								while($row1=mysql_fetch_array($sql1))  { $hidd=$row1['id']; $did=$row1['d'];     				
if(substr($row1['double_rate_1'], 0, 1)!='0')
{
					 $row1['double_rate_1'];			?>
                                    <li> 
                                        <a class="cbp-vm-image" href="#">																				<img src="http://aatg.work/my/upload/<?php echo $row1['hotel_pic'];  ?>" style="width:250px;height:120px;" />																				</a>
                                        <div class="cbp-vm-details">
										    <h5 class="project-name text-uppercase">Package Code:-<?php echo $row1['code'];  ?>  </h5>
                                            <h5 class="project-name text-uppercase"><?php echo $row1['hotelname'];  ?>  
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
                                            </h3>
                                            <table class="table table-bordered table-condensed additional-table">
                                                <tr bgcolor="#fff">
												 <td align="center"><strong>Checkin Date</strong></td>
												  <td align="center"><strong>No Of Night</strong></td>
                                                    <td align="center"><strong>Room Type</strong></td>
													<td align="center"><strong>Room Availability</strong></td>
                                                     
													<!--   <td align="center"><strong>Adult </strong></td>
													      <td align="center"><strong>Child</strong></td>-->
                                                    
                                                </tr>
                                                <tr>
												<td align="center"><?php echo $package_date1=date("d M Y",strtotime($df));  ?></td>
													<td align="center"><?php echo $night;  ?></td>
                                                    <td align="center">Twin Sharing</td>
													 <td align="center">20 ROH</td>
                                                    
													<!--<td align="center"><?php echo $adult;  ?></td>
													<td align="center"><?php echo $child;  ?></td>-->
                                                     
                                                </tr>
                                                
                                            </table>
                                        </div>
                                        <div class="call-back">
                                            <h3 class="price1"><!--<i class="fa fa-usd"></i>-->USD 
											<?php 
$roedate=date('Y/m/d');									
$selectroe=mysql_query("select * from roe_master where roe_date='$roedate'");
$fetchroe=mysql_fetch_array($selectroe);	?>										
											<?php echo ceil($row1['double_rate_1']/$fetchroe['amount']); ?>/<small>Price Per Adult Twin Sharing</small></h3>
                                           
<a class="cbp-vm-icons" href="view-hotel-details.php?adult=<?php echo $adult;  ?>&cwb=<?php echo $child; ?>&night=<?php echo $night;  ?>&cnb=<?php echo $cnb;  ?>&hid=<?php echo $row1['hotel_id'];  ?>&cindate=<?php echo $df;  ?>&id=<?php echo $row1['id'];  ?>"> View Details</a><br>

<?php 

	/*if(empty($_SESSION['id']))
	{
		echo "<script>";
		echo "alert('You Have Not Logged In!!!')";
		echo "<script>window.location='login.php'</script>";
		echo "</script>";
	}
	else
	{*/
		



?>

										   <a class="cbp-vm-icon cbp-vm-add" href="book-hote-apmg.php?&adult=<?php echo $adult;  ?>&cwb=<?php echo $child; ?>&night=<?php echo $night;  ?>&cnb=<?php echo $cnb;  ?>&hid=<?php echo $row1['hotel_id'];  ?>&cindate=<?php echo $df;  ?>&id=<?php echo $row1['id'];  ?>&code=<?php echo $row1['code'];?>"> Book Now</a>
                                        </div>
								</li>																		<?php	
	}
								
								}																										?>
                                    
									<!--<li>
									<a href="" class="cbp-vm-image"></a>
									       
									-->
									

							
					 
                    </div>
                 </div>
				  </div>
                 </div>
				 									<div class="text-center"> 
  <ul class="pagination pagination-sm">
    <?php
  if($pageNum > '1'){
  ?>
    <li><a href="hotel-search-apmg.php?page=<?=($pageNum-1)?>&cd=<?php echo $df; ?>&night=<?php echo $night; ?>&by=<?php echo $by; ?>">Prev</a></li>
<?php 
}?>
<?php
for($i=1 ; $i<=$totalPages ; $i++) 
{

  $class =($pageNum == $i) ? "active":'';
?>
    <li class="<?=$class?>"><a href="hotel-search-apmg.php?page=<?=$i?>&cd=<?php echo $df; ?>&night=<?php echo $night; ?>&by=<?php echo $by; ?>"><?=$i?></a></li>
<?php
}
?>
<?php
if($pageNum<$totalPages){
?>
    <li><a href="hotel-search-apmg.php?page=<?=($pageNum+1)?>&cd=<?php echo $df; ?>&night=<?php echo $night; ?>&by=<?php echo $by; ?>">Next</a></li>
<?php
}
?>
  </ul>
</div>


</div>

</li>


                                </ul>
								
  
                            </div>
				 
			
				 
                </div>
            </div>
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
      
    </div>
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
        </div> <?php include "include/footer.php"; ?>
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
  $('#date_from').datepicker({
    inline: true,
    firstDay: 1,
    showOtherMonths: true,
    // dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
    minDate:'0',
    maxDate:'30/11/2019',
    dateFormat: 'yy/mm/dd',
  }); 
   $('#date_to').datepicker({
    inline: true,
    firstDay: 1,
    showOtherMonths: true,
    // dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
    minDate:'0',
    maxDate:'30/11/2019',
    dateFormat: 'yy/mm/dd',
  }); 
  
   
</script>
</body>

</html>
