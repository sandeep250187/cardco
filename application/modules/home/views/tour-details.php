 <?php 

 include "include/header.php"; 
 
 $sql5=mysql_query("select * from b2b_mala_tourmaster_name where serviceid='$_GET[id]'"); 
 $fetch5=mysql_fetch_array($sql5);
  $sqlr5=mysql_query("select * from b2b_mala_tourmaster where tid='$_GET[id]'"); 
 $fetchr5=mysql_fetch_array($sqlr5);
 
 ?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Apollo Asia Travel Group</title>
<!-- Compiled and minified CSS -->
<!--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css"> -->
<!-- Bootstrap -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<link href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/owl.carousel.css" rel="stylesheet">
<link href="css/owl.theme.css" rel="stylesheet">
<link href="css/datepicker.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/prettyphoto/3.1.5/css/prettyPhoto.css">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="container-fluid">
  <div class="row">
    <div id="nav" class="navbar navbar-default  yamm">
      <div class="container">
        <div class="navbar-header">
          <button type="button" data-toggle="collapse" data-target="#navbar-collapse-2" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
          <a href="index.html" class="navbar-brand"> <img src="images/logon.jpg" class="images-responsive logo" alt="logo"></a> </div>
        <div id="navbar-collapse-2" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <!-- Media Example -->
            <li><a href="tranfser.html" class="active"><i class="fa fa-plane"></i> Transfer</a></li>
            <li><a href="hotel.html"><i class="fa fa-bed"></i> Hotel</a></li>
            <li><a href="tours.html"><i class="fa fa-bus"></i> Tours</a></li>
            <li><a href="insurance.html"><i class="fa fa-shield"></i> Insurance</a></li>
          </ul>
          <!-- Forms -->
          <ul class="nav navbar-nav navbar-right">
            <li> <a href="login.html"> <i class="fa fa-lock"></i> SignIn </a> </li>
            <li><a href="register.html"><i class="fa fa-user"></i> Register</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>


 
  
  <div class="row bg-grey gap1">
    <div class="container gap">
      <div class="row">
        <div class="col-sm-4">
          <div class="slide-cont">
            <div id="" class="owl-carousel " data-slider-id="1"> <a class="item" href="http://aatg.work/sms/myo/upload/<?php echo $fetch5['pic'];   ?>" rel="prettyPhoto" title="This is the description"> <img class="img-responsive" src="http://aatg.work/sms/myo/upload/<?php echo $fetch5['pic'];   ?>" alt="title" /> </a>
              <?php
                                        $c2=substr($fetch_hotel['pic2'], -1);
if(!empty($fetch_hotel['pic2']))
{
                                        ?>
              <a class="item" href="https://www.balimagictour.com/data2/photos/bali-bird-park-2-balimagictour.jpg" rel="prettyPhoto" title="This is the description"> <img class="img-responsive" src="https://www.balimagictour.com/data2/photos/bali-bird-park-2-balimagictour.jpg" alt="title" /> </a>
              <?php
                                        
                                        
}

else
{
    ?>
              <a class="item" href="http://aatg.work/sms/myo/upload/<?php echo $fetch5['pic'];   ?>" rel="prettyPhoto" title="This is the description"> <img class="img-responsive" src="http://aatg.work/sms/myo/upload/<?php echo $fetch5['pic'];   ?>" alt="title" /> </a>
              <?php
    
}
    $c3=substr($fetch_hotel['pic3'], -1);
if(!empty($fetch_hotel['pic3']))
{
                                        ?>
              <a class="item" href="http://aatg.work/sms/myo/upload/<?php echo $fetch5['pic'];   ?>" rel="prettyPhoto" title="This is the description"> <img class="img-responsive" src="http://aatg.work/sms/myo/upload/<?php echo $fetch5['pic'];   ?>" alt="title" /> </a>
              <?php  } 

else
{
    ?>
              <a class="item" href="http://aatg.work/sms/myo/upload/<?php echo $fetch5['pic'];   ?>" rel="prettyPhoto" title="This is the description"> <img class="img-responsive" src="http://aatg.work/sms/myo/upload/<?php echo $fetch5['pic'];   ?>" alt="title" /> </a>
              <?php
    
}
?>
            </div>
          </div>
        </div>
        <div class="col-sm-8">
          <div class="panel panel-default">
            <div class="panel-body">
			
			<?php 
			$select=mysql_query("select * from b2b_mala_tourmaster_name where serviceid='$_GET[id]'");
			$fetch=mysql_fetch_array($select);
			
			
			?>
			
              <h3 class="heads"><?=$fetch['servicename'];?>
			  <form method="post" name="back"><span style="float:right;">	
              <INPUT TYPE="button" VALUE="Back" onClick="history.go(-1);"></span></form></h3>
              <h4><i class="fa fa-map-marker text-info"></i> Penang </h4>
              <p><?=$fetch['descrip'];?></p>
              <p><a href="#more">more</a></p>
            </div>
          </div>
        </div>
      </div>
      <!--<div class="row">
        <div class="well-sm bg-primary">
          <form type="search" method="REQUEST" action="" class="searchs-details">
            <input name="by" type="hidden" value="2" />
            <ul class="list-inline">
              <li>
                <label>From :</label>
                <div class="dates">
                  <input type="text" value="<?=$_REQUEST['cin']?> " class="form-control" id="from-date" name="cin" readonly="true">
                </div>
              </li>
              <li>
                <label>To :</label>
                <div class="dates">
                  <input type="text" value="<?=$_REQUEST['cout']?> " class="form-control" id="to-date" name="cout" readonly="true">
                </div>
              </li>
			  <li>
                <label>Service Date :</label>
                <div class="dates">
                  <input type="text" value="<?=$_REQUEST['cdate']?> " class="form-control" id="ser-date" name="cdate">
                </div>
              </li>
			   <li>
                <label>Transfer Type :</label>
                <div class="selects">
                  <select type="search"  class="form-control" name="ttype" required>
				  <option value="SIC" <?php echo ($_REQUEST['ttype']=='SIC')?'selected="selected"' : '' ?>>SIC</option>
				  <option value="PVT" <?php echo ($_REQUEST['ttype']=='PVT')?'selected="selected"' : '' ?>>PVT</option>
				  </select>
                </div>
              </li>
              <li>
                <label>Adult:</label>
                <div class="selects">
                  <select type="search" name="adult" class="form-control searchbox1" required>
				  <?php 
				  for($i=1;$i<=15;$i++)
				  {
					  ?>
					  <option value="<?=$i;?>"  <?php echo ($_REQUEST['adult']==$i)?'selected="selected"' : '' ?> ><?=$i;?></option>
					  <?php
				  }
				  ?>
                    
                  </select>
                </div>
              </li>
              <li>
                <label>Child:</label>
                <div class="selects">
                  <select type="search" name="child" class="form-control searchbox1" required>
                    <?php 
				  for($i=1;$i<=15;$i++)
				  {
					  ?>
					  <option value="<?=$i;?>"  <?php echo ($_REQUEST['child']==$i)?'selected="selected"' : '' ?> ><?=$i;?></option>
					  <?php
				  }
				  ?>
                  </select>
                </div>
              </li>
              <li>
                <label>&nbsp;</label>
				<input type="hidden"  name="id" value="<?php echo $_REQUEST['id']; ?>"/>
                <button class="btn btn-primary btn-block btn-search" name="search">Search</button>
              </li>
            </ul>
          </form>
        </div>
      </div>-->
      <hr>
      
			
			<?php 
			
			
			
			
			
				
			?>
			<div class="row">
        <!--<div class="table-responsive">
		
		<form action="" type="search" method="POST">
		<table class="table-condensed table table-bordered">
            <tr>
              <th>Category</th>
              <th>Price/ Person</th>
              <th>Date</th>
              <th>Type</th>
			  <th>Adult</th>
			  <th>Child</th>
			  <!--<th>Transfer Type</th>
              <th>Net Price</th>
              <th></th>
            </tr>
			
			<?php 
			
			if(isset($_['search']))
				{																								$cd=$_POST['cd'];				
			    $cod=$_POST['cod'];											
				$type=$_POST['type'];											
				$adult=$_POST['adult'];												
				$child=$_POST['child'];		

           $select1=mysql_query("select * from b2b_mala_tourmaster where tid='$_GET[id]'");
		   $fetch1=mysql_fetch_array($select1);				
			
			

				}
			
			?>
			
            <tr>
              <td>SIC</td>          
			  <td><strong>Adult:</strong> <?=$fetchr5['r2'];?> </td>
              <td class="form-inline"><input type="text" class="form-control input-sm" id="date" name="cdate" value="<?=$_REQUEST['cdate'];?>"></td>
			  <td><?=$fetch5['type'];?></td>
              <td><?=$_REQUEST['adult'];?></td>
			  <td><?=$_REQUEST['child'];?></td>
			   <td><?=$_REQUEST['ttype'];?></td>
              <td><strong class="text-info"><?php 
			  
			   if($_REQUEST['adult']=='1')
			   {
				   $ra=$fetchr5['r1'];
			   }
			   if($_REQUEST['adult']=='2')
			   {
				    $ra=$fetchr5['r2'];
			   }
			   if($_REQUEST['adult']=='3')
			   {
				    $ra=$fetchr5['r3'];
			   }
			   if($_REQUEST['adult']=='4')
			   {
				   $ra=$fetchr5['r4'];
			   }
			   if($_REQUEST['adult']=='5')
			   {
				    $ra=$fetchr5['r5'];
			   }
			   if($_REQUEST['adult']=='6')
			   {
				    $ra=$fetchr5['r6'];
			   }
			   if($_REQUEST['child']=='1')
			   {
				   $rc=$fetchr5['cr1'];
			   }
			   if($_REQUEST['child']=='2')
			   {
				    $rc=$fetchr5['cr2'];
			   }
			   if($_REQUEST['child']=='3')
			   {
				    $rc=$fetchr5['cr3'];
			   }
			   if($_REQUEST['child']=='4')
			   {
				   $rc=$fetchr5['cr4'];
			   }
			   if($_REQUEST['child']=='5')
			   {
				    $rc=$fetchr5['cr5'];
			   }
			   if($_REQUEST['child']=='6')
			   {
				    $rc=$fetchr5['cr6'];
			   }
			   echo $ra+$rc;
			  
			  ?></strong>&nbsp;<a href="#" data-toggle="popover" data-trigger="hover" data-popover-content="#a1" data-placement="top"><i class="fa fa-info-circle"></i></a></td>
              
			  
			   <input type="hidden"  name="ide" value="<?php echo $_GET['id'];  ?>"/>
	  
										  <input type="hidden"  name="cin" value="<?php echo $_GET['cin'];  ?>"/>
										  <input type="hidden"  name="cout" value="<?php echo $_GET['cout'];  ?>"/>
								<input type="hidden"  name="id" value="<?php echo $_REQUEST['id']; ?>"/>
										  
										   <input type="hidden"  name="adult" value="<?php echo $_REQUEST['adult'];  ?>"/>
										  <input type="hidden"  name="child" value="<?php echo $_REQUEST['child']; ?>"/>
										  
										  <input type="hidden"  name="type" value="<?php echo $fetch5['type']; ?>"/>
										  
										  <input type="hidden"  name="cdate" value="<?php echo $_GET['cdate']; ?>"/>
										  
										  <input type="hidden"  name="sname" value="<?php echo $fetch5['servicename']; ?>"/>
										  
										   <input type="hidden"  name="ttype" value="SIC"/>
										  										  											
											<input type="hidden"  value="<?php echo $tamount;?>" name="tamount"/>
											<input type="hidden"  value="<?php echo $fetch_rate['markup'];?>" name="markup"/>
			  
			  
			  
			  <td><button type="submit" name="add" class="btn btn-primary btn-sm"> Add </button></td>
            </tr>
			
			<tr>
              <td>PVT</td>
			  <td><strong>Adult:</strong><?=$fetchr5['pr2'];?></td>
			  <td class="form-inline"><input type="text" class="form-control input-sm" id="date" name="cdate" value="<?=$_REQUEST['cdate'];?>"></td>
			   
			  <td><?=$fetch5['type'];?></td>
             
              
              <td><?=$_REQUEST['adult'];?></td>
			  <td><?=$_REQUEST['child'];?></td>
              <td><strong class="text-info"> 
			  <?php
			  if($_REQUEST['adult']=='1')
			   {
				   $pra=$fetchr5['pr1'];
			   }
			   if($_REQUEST['adult']=='2')
			   {
				    $pra=$fetchr5['pr2'];
			   }
			   if($_REQUEST['adult']=='3')
			   {
				    $pra=$fetchr5['pr3'];
			   }
			   if($_REQUEST['adult']=='4')
			   {
				   $pra=$fetchr5['pr4'];
			   }
			   if($_REQUEST['adult']=='5')
			   {
				    $pra=$fetchr5['pr5'];
			   }
			   if($_REQUEST['adult']=='6')
			   {
				    $pra=$fetchr5['pr6'];
			   }
			   if($_REQUEST['child']=='1')
			   {
				   $prc=$fetchr5['pcr1'];
			   }
			   if($_REQUEST['child']=='2')
			   {
				    $prc=$fetchr5['pcr2'];
			   }
			   if($_REQUEST['child']=='3')
			   {
				    $prc=$fetchr5['pcr3'];
			   }
			   if($_REQUEST['child']=='4')
			   {
				   $prc=$fetchr5['pcr4'];
			   }
			   if($_REQUEST['child']=='5')
			   {
				    $prc=$fetchr5['pcr5'];
			   }
			   if($_REQUEST['child']=='6')
			   {
				    $prc=$fetchr5['pcr6'];
			   }
			   echo $pra+$prc;
			 ?> 			 			 
			 
			  </strong> <a href="#" data-toggle="popover" data-trigger="hover" data-popover-content="#a1" data-placement="top"><i class="fa fa-info-circle"></i></a> </td>
			  
			  
			  <input type="hidden"  name="ide" value="<?php echo $_GET['id'];  ?>"/>
	  
										  <input type="hidden"  name="cin" value="<?php echo $_GET['cin'];  ?>"/>
										  <input type="hidden"  name="cout" value="<?php echo $_GET['cout'];  ?>"/>
								<input type="hidden"  name="id" value="<?php echo $_REQUEST['id']; ?>"/>
										  
										   <input type="hidden"  name="adult" value="<?php echo $_REQUEST['adult'];  ?>"/>
										  <input type="hidden"  name="child" value="<?php echo $_REQUEST['child']; ?>"/>
										  
										  <input type="hidden"  name="type" value="<?php echo $fetch5['type']; ?>"/>
										  
										  <input type="hidden"  name="cdate" value="<?php echo $_GET['cdate']; ?>"/>
										  
										  <input type="hidden"  name="sname" value="<?php echo $fetch5['servicename']; ?>"/>
										  
										   <input type="hidden"  name="ttype" value="PVT"/>
										  										  											
											<input type="hidden"  value="<?php echo $tamount;?>" name="tamount"/>
											<input type="hidden"  value="<?php echo $fetch_rate['markup'];?>" name="markup"/>
			  
              <td><button type="submit" name="add" class="btn btn-primary btn-sm"> Add </button></td>
            </tr>
			
				<?php ?>
          </table>
		  </form>
        </div>-->
      </div>
      <div class="row">
        <article>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title"><strong>Information</strong></h4>
          </div>
          <div class="panel-body" id="more">
            <dl class="dl-horizontal facilities">
              <dt>
                <h4><span class="icon icon-ticket"></span>Description </h4>
              </dt>
              <dd>
                <p> <?=$fetch['descrip'];?> </p>
                <p> <strong>Meeting/pick-up point:</strong> Hotel Lobby in Kuta, Seminyak, Kerobokan, Sanur, Jimbaran, Nusa Dua, Tanjung Benoa. <br>
                  <strong>Duration:</strong> 6 hours. <br>
                  <strong>Pick-up time:</strong> At 9am. <br>
                  <strong>End/closing time:</strong> At 3pm. </p>
              </dd>
              <dt>
                <h4><span class="icon icon-compass"></span>Location</h4>
              </dt>
              <dd>
                <ul class="list-unstyled">
<li class="col-sm-6"> <i class="fa fa-circle"></i> Malaysia</li>
                  <li class="col-sm-6"> <i class="fa fa-circle"></i>Penang</li>
                </ul>
              </dd>
              <dt>
                <h4><span class="icon icon-bullet"></span>Included</h4>
              </dt>
              <dd>
                <ul class="list-unstyled">
                  <li class="col-sm-6"> <i class="fa fa-circle"></i> Tickets</li>
<li class="col-sm-6"> <i class="fa fa-circle"></i> Transport</li>
                  <li class="col-sm-6"> <i class="fa fa-circle"></i> Meal</li>
                </ul>
              </dd>
              <dt>
                <h4><span class="icon icon-bullet"></span>Activity duration</h4>
              </dt>
              <dd>
                <ul class="list-unstyled">
                  <li class="col-sm-6"> <i class="fa fa-circle"></i> Half-day morning</li>
                </ul>
              </dd>
              <dt>
                <h4><span class="icon icon-bullet"></span>Activity for</h4>
              </dt>
              <dd>
                <ul class="list-unstyled">
                  <li class="col-sm-6"> <i class="fa fa-circle"></i> Families</li>
                  <li class="col-sm-6"> <i class="fa fa-circle"></i> Couples</li>
                  <li class="col-sm-6"> <i class="fa fa-circle"></i> Youth</li>
                  <li class="col-sm-6"> <i class="fa fa-circle"></i> Seniors</li>
                </ul>
              </dd>
              <dt>
                <h4><span class="icon icon-bullet"></span>Activity type</h4>
              </dt>
              <dd>
                <ul class="list-unstyled">
                 <li class="col-sm-6"> <i class="fa fa-circle"></i> Tours &amp; Activities</li>
                </ul>
              </dd>
            </dl>
          </div>
        </div>
         
     
      </article>
    </div>
<div class="row">



 <div class="col-sm-12">
    <h4>Users who saw <b><?php echo $fetch5['servicename'];?></b> were also interested in these tickets</h4>
                    <div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-list">
                                           
                        
                            <div class="row">
							<form type="search" method="REQUEST" action="">
                                <ul>
                                      	<?php											 												if(isset($_REQUEST['search']))												{																								$tt=$_POST['tt'];												$st=$_POST['st'];												$dt=$_POST['cd'];												$adult=$_POST['adult'];												$child=$_POST['child'];																																				if($tt=='A')												{												$sql=mysql_query("select a.* from b2b_mala_tourmaster a,b2b_mala_tourmaster_name b where a.cityid='6' and b.service_type='1' and a.tid=b.serviceid");												}																								else												{												$sql=mysql_query("select a.* from b2b_mala_tourmaster a,b2b_mala_tourmaster_name b where a.cityid='6' and b.service_type='1' and a.tid=b.serviceid and b.type='$tt'");												}																																																}												else												{													$sql=mysql_query("select a.* from b2b_mala_tourmaster a,b2b_mala_tourmaster_name b where a.cityid='6' and b.service_type='1' and a.tid=b.serviceid");												}													  												while($fetch=mysql_fetch_array($sql))												{													$tt='SIC';	$sql5=mysql_query("select * from b2b_mala_tourmaster_name where serviceid='$fetch[tid]'"); $fetch5=mysql_fetch_array($sql5); 												?>
                                      <li>
                                        <span class="launch-soon"><?php echo  $fetch5['type']; ?></span>
                                        <a class="cbp-vm-image" href="details.html"><img  src="http://aatg.work/sms/myo/upload/<?php echo $fetch5['pic'];   ?>"></a>
                                        <div class="cbp-vm-details">										
                                            <h5 class="project-name text-uppercase"><?php  echo $fetch5['servicename'];  ?></h5>
                                            <p class="location1"><i class="fa fa-map-marker"></i> <?php echo  $fetch5['descrip']; ?></p>
                                            </h3>
                                      
                                            <h3 class="price1">MYR  <?php  											if($tt=='PVT')											{												echo $fetch['pr2'];											}											if($tt=='SIC')											{												echo $fetch['r2'];											}											?>
/<small>Per Person</small></h3>
                                            <span class="tiny-text">( Net Price, Inclusive of All taxes )</span>
                                           <!-- <a class="cbp-vm-icon btn-sm cbp-vm-add" href="view-details.html"> View Details</a>-->										   <a class="cbp-vm-icon btn-sm cbp-vm-add" href="tour-details-abd.php?id=<?=$fetch['serviceid'];?>&cin=<?=$_GET['cin'];?>&cout=<?=$_GET['cout'];?>&adult=<?=$_GET['adult'];?>&child=<?=$_GET['child'];?>&type=<?=$_GET['tt'];?>&ttype=<?=$_REQUEST['ttype'];?>">Book</a>
                                        </div>
                                    </li> 																		<?php												}									?>


                                </ul>
								</form>
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

  
</div>
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

        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({

                items: 1,


            });
        });
        </script> 
<script>
        $(function() {
            var dateFormat = "yy/mm/dd",
                from = $("#from-date")
                .datepicker({
                    defaultDate: "+1w",
                    changeMonth: false,
                    minDate: 0,
                    dateFormat: "yy/m/d",
                    numberOfMonths: 2
                })
                .on("change", function() {
                    to.datepicker("option", "minDate", getDate(this));
                }),
                to = $("#to-date").datepicker({
                    defaultDate: "+1w",
                    changeMonth: false,
                    minDate: 0,
                    dateFormat: "yy/m/d",
                    numberOfMonths: 2
                })
                .on("change", function() {
                    from.datepicker("option", "maxDate", getDate(this));
                }),
				ser = $("#ser-date").datepicker({
                    defaultDate: "+1w",
                    changeMonth: false,
                    minDate: 0,
                    dateFormat: "yy/m/d",
                    numberOfMonths: 2
                })
                .on("change", function() {
                    from.datepicker("option", "maxDate", getDate(this));
                });

            function getDate(element) {
                var date;
                try {
                    date = $.datepicker.parseDate(dateFormat, element.value);
                } catch (error) {
                    date = null;
                }

                return date;
            }
        });


        $('#date').datepicker({
            inline: true,
            firstDay: 1,
            showOtherMonths: true,
            // dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
            minDate: '0',
            maxDate: '30/11/2019',
            dateFormat: 'yy/mm/dd',
        });
        /*   $('#date_to').datepicker({
            inline: true,
            firstDay: 1,
            showOtherMonths: true,
            // dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
            minDate:'0',
            maxDate:'30/11/2019',
            dateFormat: 'yy/mm/dd',
          }); 
          */
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
</body>
</html>