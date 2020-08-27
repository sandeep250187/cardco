<?php include "include/header-h.php"; ?>
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
        <div class="row bg-grey gap1">
            <div class="container">
                <div class="row">
               <!--  <div class="col-sm-3">
                         <div class="filter shuttle-widget">
                             <h4 class="text-center">Search Transfer</h4> 
                            <div class="tops">
                                <div><span class="old-price">From <del><span style="font-size:smaller;">MYR</span> $20</del>
                                    </span>
                                </div>
                                <div class="new-price"><span style="font-size:smaller;">SGD</span> $10</div>
                                <div class="offer">Save SGD 10 Per Person. </div>
                            </div>
                            <ul class="list-unstyled">
                                <li>
                                    <select type="search" class="form-control searchbox">
                                        <option>Select Country</option>
                                    </select>
                                </li>
                                <li>
                                    <select type="search" class="form-control searchbox">
                                        <option>Select City</option>
                                    </select>
                                </li>
                                <li>
                                    <select type="search" class="form-control searchbox">
                                        <option>Select Pattern</option>
                                    </select>
                                </li>
                                <li>
                                    <select type="search" class="form-control searchbox1">
                                        <option>No. of Adult</option>
                                    </select>
                                </li>
                                <li>
                                    <select type="search" class="form-control searchbox1">
                                        <option>No. of Child</option>
                                    </select>
                                </li>
                                 
                                <li>
                                    <input type="text" id="date_from" class="form-control" name="" placeholder="Service Date">
                                </li>
                                <li>
                                    <button class="btn btn-primary btn-block btn-search">Search</button>
                                </li>
                            </ul>
                        </div>
                    </div>  -->
                    <div class="col-sm-12">
                    <div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-list">
                        <div class="col-md-7">
                            <ol class="breadcrumb">
                                <li><a href="index.html"><i class="fa fa-home"></i> Apollo Asia Holidays</a></li>
                                <li><a href="#">Tourist Attractions</a></li>
                            </ol>
                        </div>
                        <div class="cbp-vm-options">
                            <a href="#" class="cbp-vm-icon cbp-vm-grid" data-view="cbp-vm-view-grid">Grid View</a>
                            <a href="#" class="cbp-vm-icon cbp-vm-list cbp-vm-selected" data-view="cbp-vm-view-list">List View</a>
                        </div>
                        
                        
                            <div class="row">
                                <ul>																				<?php											 												if(isset($_REQUEST['search']))												{																								$tt=$_POST['tt'];												$st=$_POST['st'];												$dt=$_POST['cd'];												$adult=$_POST['adult'];												$child=$_POST['child'];																																				if($tt=='A')												{												$sql=mysql_query("select a.* from b2b_mala_tourmaster a,b2b_mala_tourmaster_name b where a.cityid='6' and b.service_type='1' and a.tid=b.serviceid");												}																								else												{												$sql=mysql_query("select a.* from b2b_mala_tourmaster a,b2b_mala_tourmaster_name b where a.cityid='6' and b.service_type='1' and a.tid=b.serviceid and b.type='$tt'");												}																																																}												else												{													$sql=mysql_query("select a.* from b2b_mala_tourmaster a,b2b_mala_tourmaster_name b where a.cityid='6' and b.service_type='1' and a.tid=b.serviceid");												}													  												while($fetch=mysql_fetch_array($sql))												{													$tt='SIC';	$sql5=mysql_query("select * from b2b_mala_tourmaster_name where serviceid='$fetch[tid]'"); $fetch5=mysql_fetch_array($sql5); 												?>
                                      <li>
                                        <span class="launch-soon"><?php echo  $fetch5['type']; ?></span>
                                        <a class="cbp-vm-image" href="details.html"><img  src="http://aatg.work/sms/myo/upload/<?php echo $fetch5['pic'];   ?>"></a>
                                        <div class="cbp-vm-details">										
                                            <h5 class="project-name text-uppercase"><?php  echo $fetch5['servicename'];  ?></h5>
                                            <p class="location1"><i class="fa fa-map-marker"></i> <?php echo  $fetch5['descrip']; ?></p>
                                            </h3>
                                      <!--      <table class="table table-bordered table-condensed additional-table">
                                                <tr bgcolor="#fff">
                                                    <td align="center"><strong>Hotel Type</strong></td>
                                                    <td align="center"><strong>Meal</strong></td>
                                                    <td align="center"><strong> Vehicle Type</strong></td>
                                                    <td align="center"><strong>Sightseeing</strong></td>
                                                </tr>
                                                <tr>
                                                    <td align="center"><i class="fa fa-bed"></i> 5 Star</td>
                                                    <td align="center"><i class="fa fa-coffee"></i> CP</td>
                                                    <td align="center"> <i class="fa fa-car"></i>Toyota Innova</td>
                                                    <td align="center"><i class="fa fa-binoculars"></i> All Major</td>
                                                </tr>
                                            </table>-->
                                        </div>
                                        <div class="call-back">
                                           <!-- <div class="package-id">Package ID : 32570</div>-->
                                            <h3 class="price1">MYR  <?php  											if($tt=='PVT')											{												echo $fetch['pr2'];											}											if($tt=='SIC')											{												echo $fetch['r2'];											}											?>
/<small>Per Person</small></h3>
                                            <span class="tiny-text">( Net Price, Inclusive of All taxes )</span>
                                           <!-- <a class="cbp-vm-icon btn-sm cbp-vm-add" href="view-details.html"> View Details</a>-->										   <a class="cbp-vm-icon btn-sm cbp-vm-add" href="book-tours.php">Book</a>
                                        </div>
                                    </li> 																		<?php												}									?>
                                </ul>
                            </div>
                        </div>
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
        </div><?php include "include/footer.php"; ?>
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
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>    <!-- Include all compiled plugins (below), or include individual files as needed -->    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>    <script src="js/classie.js"></script>    <script src="js/parallax.js"></script>    <script src="js/cbpViewModeSwitch.js"></script>    <script src="js/bootstrap.min.js"></script>    <script src="js/owl.carousel.js"></script>    <script type="text/javascript">    $(document).ready(function() {        $('[data-toggle="tooltip"]').tooltip();    });    </script>    <script src="js/crawler.js"></script>    <script type="text/javascript">    marqueeInit({        uniqueid: 'mycrawler2',        style: {            'padding': '9px 0 0',            'width': '100%',            'background': ' ',            'border': 'none',            'color': '#0284cf',            'font-size': '13px',        },        inc: 5, //speed - pixel increment for each iteration of this marquee's movement        mouse: 'cursor driven', //mouseover behavior ('pause' 'cursor driven' or false)        moveatleast: 2,        neutral: 200,        persist: true,        savedirection: true    });    </script>    <script>    $('#nav').affix({        offset: {            top: $('.search').height()        }    });    </script>    <script type="text/javascript">    function toggleIcon(e) {        $(e.target)            .prev('.panel-heading')            .find(".more-less")            .toggleClass('glyphicon-plus glyphicon-minus');    }    $('.panel-group').on('hidden.bs.collapse', toggleIcon);    $('.panel-group').on('shown.bs.collapse', toggleIcon);    </script>    <script>    $('#date_from').datepicker({        inline: true,        firstDay: 1,        showOtherMonths: true,        // dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],        minDate: '0',        maxDate: '30/11/2019',        dateFormat: 'yy/mm/dd',    });     </script>
</body>

</html>
