 <?php include "include/header-h.php";$d=date('Y/m/d'); ?>
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
<!--   <style>
  
 #load{
    width:100%;
    height:100%;
    position:fixed;
    z-index:9999;
    background:url("https://www.creditmutuel.fr/cmne/fr/banques/webservices/nswr/images/loading.gif") no-repeat center center rgba(0,0,0,0.25)
}
 </style> -->
 <div id="load"></div>
 
         <div class="row banner" id="contents">
            <div class="input">
                <div class="container">
      <form type="search" method="POST" action="" class="searchs">
       <input name="by" type="hidden" value="2"/>
       
       
       
       <ul class="list-inline">
       <li><label>Location :</label>
        <div class="location">
              <select type="search" class="form-control searchbox">
                <option>Penang</option>
              </select>
          </div>
              </li>
             
          <li><label>Checkin Date :</label><div class="dates"><input type="text" class="form-control" id="from-date" name="cd" value="<?=$_REQUEST['cd'];?>">
          </div>
          </li>
          <li><label>CheckOut Date :</label><div class="dates"><input type="text" class="form-control" id="to-date" name="cod" value="<?=$_REQUEST['cod'];?>"></div>
          </li>       
    <!--      <li> <label>No Of Night:</label>    <div class="selects"> <select type="night" name="night" class="form-control searchbox1">                                  <?php                           for($i=1;$i<14;$i++)                            {                           ?>                          <option value="<?php echo $i; ?>" <?php echo ($_POST['night']==$i)?'selected="selected"' : '' ?> ><?php echo $i; ?></option>                   <?php                            }                  ?>              </select></div>           </li>-->
    
    <li>
                        <label>Type:</label>                   
                        <div class="selects"><select name="tt" type="search" class="form-control searchbox">
                                                     <option value="A" <?php if($_POST['tt']=='A') echo 'selected="selected"'; ?>>All</option>                                                         <option value="Half Day" <?php if($_POST['tt']=='Half Day') echo 'selected="selected"'; ?>>Half Day</option>     <option value="Short Tour" <?php if($_POST['tt']=='Short Tour') echo 'selected="selected"'; ?>>Short Tour</option>      <option value="Full Day" <?php if($_POST['tt']=='Full Day') echo 'selected="selected"'; ?>>Full Day</option> 
                        </select>
                    </li>
    
          <li>         <label>Adult:</label>                     <div class="selects"> <select type="search" name="adult" class="form-control searchbox1">                                                 <?php                           for($i=1;$i<14;$i++) 
          {
              ?>
                 <option value="<?=$i;?>" <?php if($_REQUEST['adult']==$i) echo 'selected="selected"';?>><?=$i;?></option>
              <?php
          }
              ?>                          
                                    </select>   </div>                                        </li>
           <li>    <label>Child:</label>                              <div class="selects"><select type="search" name="child" class="form-control searchbox1">                                             <?php                            for($i=1;$i<14;$i++) 
          {
              ?>
                 <option value="<?=$i;?>" <?php if($_REQUEST['child']==$i) echo 'selected="selected"';?>><?=$i;?></option>
              <?php
          }
              ?>                                                 </select>      </div>                                     </li>
               <li>     <label>Room</label>                    <div class="selects"><select type="search" name="room" class="form-control searchbox1">                                             <?php                           for($i=1;$i<14;$i++) 
          {
              ?>
                 <option value="<?=$i;?>" <?php if($_REQUEST['room']==$i) echo 'selected="selected"';?>><?=$i;?></option>
              <?php
          }
              ?>                                                 </select>       </div>                                    </li>
           <li><label>&nbsp;</label>
              <button class="btn btn-primary btn-block btn-search" name="search">Search</button>
              </li>
              </ul>
        </form>
        </div>
    </div>
        </div>
		<?php
		
			$q=mysql_query("select * from mala_hotelmaster where state='6'");
 
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
   
   
		$sql1=mysql_query("select h.id,h.hotelname,h.location,h.hotel_pic,h.hotelname,h.starcat,h.address from mala_hotelmaster h where h.state='6' LIMIT $limit,$recordPerPage");
		$count_result=mysql_num_rows($sql1);
		?>
        <div class="row bg-grey">
            <div class="container">
                <div class="row">
                    <div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-list">
                        <div class="col-md-7">
                            <ol class="breadcrumb">
                                <li><a href="index.html"><i class="fa fa-home"></i> Apollo Asia Holidays</a></li>
                                <li><a href="#">Hotels At Penang</a></li>
								 <li> <a href="#" >	<span >Total Result Founds:- <?php  echo $count_result;?></span></a> </li>
                            </ol>
                        </div>
                        <div class="cbp-vm-options">
					
                            <a href="#" class="cbp-vm-icon cbp-vm-grid" data-view="cbp-vm-view-grid">Grid View</a>
                            <a href="#" class="cbp-vm-icon cbp-vm-list cbp-vm-selected" data-view="cbp-vm-view-list">List View</a>
                        </div>
                        <div class="col-sm-12 col-sm-push">
                            <div class="row">
                                <ul>									<?php		//if(isset($_REQUEST['search']))		{							
								$night=$_REQUEST['night'];	
								$pattern=$_REQUEST['pattern'];		
								$df=$_REQUEST['cd'];			
								$adult=$_REQUEST['adult'];			
								$child=$_REQUEST['child'];			
								$pax=$adult+$child;		

							//	$sql1=mysql_query("select h.id,h.hotelname,h.location,h.hotel_pic,h.hotelname,h.starcat,h.address,p.id as d ,t.rate,p.roomtype,p.room_cat from mala_hotelmaster h ,mala_htl_tarrifmaster t,mala_roomtypemaster p where h.id=t.hotelid and (t.type='Contract' or t.type='Promotional') and h.status='1' and t.roomtype=p.id and p.roomtype='Double' and h.id=p.hotelid and h.state='6' GROUP BY t.hotelid order by t.rate");  while($row1=mysql_fetch_array($sql1))  { $hidd=$row1['id']; $did=$row1['d'];  

							
							  while($row1=mysql_fetch_array($sql1))  { $hidd=$row1['id']; $did=$row1['d'];  

							?>
                                    <li> 
                                        <a class="cbp-vm-image" href="#">																				<img src="http://aatg.work/my/upload/<?php echo $row1['hotel_pic'];  ?>" style="width:250px;height:120px;" />																				</a>
                                        <div class="cbp-vm-details">
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
                                                    <td align="center"><strong>Type</strong></td>
                                                    <td align="center"><strong>Category</strong></td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td align="center"><?php echo $row1['roomtype'];  ?>Double</td>
                                                    <td align="center"><?php  $row1['room_cat'];  													$selectlocation=mysql_query("SELECT * FROM `mala_roomcat_master` WHERE `id`='$row1[room_cat]'"); $fetchlocation=mysql_fetch_array($selectlocation);echo $fetchlocation['roomtype'];																										?>Superior</td>
                                                     
                                                </tr>
                                                
                                            </table>
                                        </div>
                                        <div class="call-back">
                                            <h3 class="price1"><!--<i class="fa fa-usd"></i>-->MYR 0<?php //echo $row1['rate']; ?>/<small>night</small></h3>
											
											<?php $c=mysql_num_rows(mysql_query("select * from mala_htl_tarrifmaster where hotelid='$hidd'")); 
											if($c!=0)
											{
											?>
                                            <a class="cbp-vm-icon cbp-vm-add" href="book-hote-apmg.php?adult=<?php echo $adult;  ?>&cwb=<?php echo $child; ?>&night=<?php echo $_POST['night'];  ?>&cnb=<?php echo $cnb;  ?>&hid=<?php echo $hidd;  ?>&cindate=<?php echo $_POST['cd'];  ?>&rate=<?php echo $adult*$row1['rate'];  ?>&rt=<?php echo $rt; ?>&rc=<?php echo $rc1;  ?>"> Book Now</a>  <?php } 
											
											else
											{?>
										 <a class="cbp-vm-icon cbp-vm-add disabled" href="#"> Book Now</a> 
												
												
										<?php	}
											
											?>
                                        </div>
                                    </li>																		<?php	}									//}																		?>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
					
					
					<div class="pagination pagination-sm pagination-centered"> 
  <ul>
    <?php
  if($pageNum > '1'){
  ?>
    <li><a href="hotel-search.php?page=<?=($pageNum-1)?>&cd=<?php echo $df; ?>&night=<?php echo $night; ?>&by=<?php echo $by; ?>">Prev</a></li>
<?php 
}?>
<?php
for($i=1 ; $i<=$totalPages ; $i++) 
{

  $class =($pageNum == $i) ? "active":'';
?>
    <li class="<?=$class?>"><a href="hotel-search.php?page=<?=$i?>&cd=<?php echo $df; ?>&night=<?php echo $night; ?>&by=<?php echo $by; ?>"><?=$i?></a></li>
<?php
}
?>
<?php
if($pageNum<$totalPages){
?>
    <li><a href="hotel-search.php?page=<?=($pageNum+1)?>&cd=<?php echo $df; ?>&night=<?php echo $night; ?>&by=<?php echo $by; ?>">Next</a></li>
<?php
}
?>
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
              <button class="btn btn-warning btn-xs btn-view" onClick="window.location='book-hotel1.php'">View Details</button>
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
            <div class="col-sm-10 col-sm-offset-1">
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
