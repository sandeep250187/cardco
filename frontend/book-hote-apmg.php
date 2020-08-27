<?php include "include/header.php"; 
$dt=date('Y/m/d');
$select_rate=mysql_query("select * from apmg_hotel_tariff where id='$_GET[id]'");
$fetch_rate=mysql_fetch_array($select_rate);
$pcode=$fetch_rate['code'];
/*
if(empty($_SESSION['id']))
{ 
?>
<script>
alert('Please Loging To Continue');
window.location='hotel-search.php';
 </script>
<?php 
} 
 */
if(isset($_POST['save']))
{
	 $name=$_POST['name'];
	 $mobile=$_POST['mobile'];
	 $email=$_POST['email'];
	 $nationality=$_POST['nationality'];
	 $arrival_date=$_POST['arrival_date'];
	 $noof_adult=$_POST['noof_adult'];
	 $noof_child=$_POST['noof_child'];
	 $noof_room2=$_POST['nroom2'];
	 $rt2=$_POST['rt2'];
	 $rc2=$_POST['rc2'];
	 $noof_room3=$_POST['nroom3'];
	 $rt3=$_POST['rt3'];
	 $rc3=$_POST['rc3'];
	$pickup_date=$_POST['pickup_date'];
	$pickup_frm=$_POST['pickup_frm'];
	//$book_amount=$_POST['book_amount'];
	$book_date=date('Y/m/d');
	//$pcode=$_REQUEST['code'];
	
	
$selectmax=mysql_query("SELECT MAX(id) FROM `apmg_bookings`");

$fetchmax=mysql_fetch_array($selectmax);

$maxid=$fetchmax[0]+1;

 if(strlen($maxid)=='1')

{

$code='WEBV0000'.$maxid;

}

if(strlen($maxid)=='2')

{

$code='WEBV000'.$maxid;

}

if(strlen($maxid)=='3')

{

$code='WEBV00'.$maxid;

}

if(strlen($maxid)=='4')

{

$code='WEBV0'.$maxid;

}

if(strlen($maxid)=='5')

{

$code='WEBV'.$maxid;

}
	
	
	$sql=mysql_query("insert into apmg_bookings (`web_id`,`pkg_id`,`name`,`email`,`mobile`,`nationality`,`adult`,`child`,`dbl_room`,`rt_double`,`rc_double`,`trpl_room`,`rt_triple`,`rc_triple`,`pickup_from`,`booking_cost`,`created_date`,`booking_date`,`arrival_date`) values ('$code','$_GET[code]','$name','$mobile','$email','$nationality','$noof_adult','$noof_child','$noof_room2','$rt2','$rc2','$noof_room3','$rt3','$rc3','$pickup_frm','$book_amount','$dt','$book_date','$arrival_date')")or die(mysql_error());
	if($sql)
	{
      echo "<script>";

	echo "alert('DOne')";

	echo "</script>";
	
	echo "<script>window.location='book-hote-apmg.php'</script>";
	}
	
	
	//echo "<script>";

	//echo "alert('Hotel Booked Successfully')";

	//echo "</script>";

	//echo "<script>window.location='http://supplier.apolloasiab2b.com/transport/vcon_bookinglist.php'</script>";
}

?>
        <div class="row banner banner1">
           
     
            <div class="container">
               
                 <div class="col-sm-8 col-sm-offset-2">
                <div class="transfer-search text-blue">
                <div> <div class="row text-center">
                    <h1 class="headings text-white">Add Package</h1>
                </div>
                            <div class="form-horizontal">
                                <form name="register" id="register" method="post" action="#" novalidate="novalidate">
                                    <div class="form-group">
                                        <div class="col-xs-4">
                                            <label class="">Package Code ID</label>
                                            <div class="form-control-static">
                                                <strong class="text-warning"><?php echo $fetch_rate['code'];  ?></strong>
                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <label for="inputEmail">Country</label>
                                            <div class="form-control-static">
                                                <strong class="text-warning">Malaysia</strong>
                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <label for="inputEmail">City</label>
                                            <div class="form-control-static">
                                                <strong class="text-warning">Penang</strong>
                                            </div>
                                        </div>
                                    </div>
                                   <!-- <div class="form-group">
                                        <h4>Guest Details</h4>
                                        <div class="col-md-6">
                                            <label for="inputPassword">Name</label>
                                            <input type="text" name="name" value="<?php echo $_REQUEST['name'];?>" class="form-control"   placeholder="name">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputPassword">Nationality</label>
											
                                            <select name="nationality" class="form-control">
											<option value="">Select</option>
											<?php 
											$selectcntry=mysql_query("select * from nationality_master order by nationality asc");
											while($fetchcntry=mysql_fetch_array($selectcntry))
											{									
											?>
											<option value="<?php echo $fetchcntry['id']; ?>"><?php echo $fetchcntry['nationality']; ?></option>
											<?php } ?>
											</select>
                                        </div>
                                    </div>
								
									 <div class="form-group">
                                        
                                        <div class="col-md-6">
                                            <label for="inputPassword">Email</label>
                                            <input type="email" name="email" value="<?php echo $_REQUEST['email'];?>" class="form-control" id="email" placeholder="Email">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputPassword">Mobile</label>
                                            <input type="tel" name="mobile" value="<?php echo $_REQUEST['name'];?>" class="form-control" id="phone" placeholder="Phone">
                                        </div>
                                    </div>
                                  
                                    <div class="form-group">
									    
                                       <div class="col-md-6"> 
										 <label for="inputEmail">No of Adult </label>  
                                         <?php //echo $_REQUEST['noof_adult'];?>										 
										 <select name="noof_adult"  class="form-control">
										 <option value="" selected disabled>Select</option>
										 <?php 
										 for($i=0;$i<=20;$i++)
										 {
											 ?>
											 <option value="<?php echo $i;?>" <?php if($_REQUEST['noof_adult']==$i) echo 'selected="selected"'; ?>><?=$i;?></option>
											 <?php
										 }
										 ?>
										 </select>              
									   </div>
                                        <div class="col-md-6">
                                            <label for="inputEmail">No of Child</label>
											<?php //echo $_REQUEST['noof_child'];?>
                                            <select type="search" name="noof_child" class="form-control searchbox1" required>
											<option value="" selected disabled>Select</option>
										 <?php 
										 for($i=0;$i<=20;$i++)
										 {
											 ?>
											 <option value="<?php echo $i;?>" <?php if($_REQUEST['noof_child']==$i) echo 'selected="selected"'; ?>><?=$i;?></option>
											 <?php
										 }
										 ?>
											</select>
                                        </div>
                                    </div>	-->	
									
									<div class="form-group">
									 <h4>Room Details</h4>
									  <div class="col-md-4">
                                            <label for="inputEmail">Room Type </label>
                                            <select type="search" name="rt2" class="form-control searchbox1" required>   
                                            <option value="0" <?php if(0==$_REQUEST['rt2']) echo 'selected="selected"'; ?>>N/A</option>														
                                            <option value="2" <?php if(2==$_REQUEST['rt2']) echo 'selected="selected"'; ?>>Double</option> 
                                            								
						                    </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputEmail">Room Category</label>
                                            <select type="search" name="rc2" class="form-control searchbox1" required> 
                                            <option value="0"  <?php if(0==$_REQUEST['rc2']) echo 'selected="selected"'; ?>>N/A</option>	
											<option value="1" <?php if(1==$_REQUEST['rc2']) echo 'selected="selected"'; ?>>Deluxe</option>    
											
                                            <option value="2" <?php if(2==$_REQUEST['rc2']) echo 'selected="selected"'; ?>>Superior</option> 	          
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputEmail">No Of Room </label>
                                            <select type="search" name="nroom2" onchange="change();" class="form-control searchbox1" required>
                                            <option value="" selected disabled>Select</option>
											<?php		
											for($i=0;$i<20;$i++)	
												{			
											?>		
											<option value="<?php echo $i; ?>" <?php if($i==$_REQUEST['nroom2']) echo 'selected="selected"'; ?>><?php echo $i; ?></option>                   <?php			}			?>       
											</select>
                                        </div>
										
                                    </div>
									<div class="form-group">
									<div class="col-md-4">
                                            <label for="inputEmail">Room Type </label>
                                            <select type="search" name="rt3" class="form-control searchbox1" required>    
                                             <option value="0" <?php if(0==$_REQUEST['rt3']) echo 'seleted="selected"'; ?>>N/A</option>												
											 <option value="3" <?php if(3==$_REQUEST['rt3']) echo 'seleted="selected"'; ?>>Triple</option>
										 
                                              
						                    </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputEmail">Room Category</label>
                                            <select type="search" name="rc3" class="form-control searchbox1" required>     
                                            <option value="0"  <?php if(0==$_REQUEST['rc3']) echo 'seleted="selected"'; ?>>N/A</option>				
                                            <option value="1" <?php if(1==$_REQUEST['rc3']) echo 'seleted="selected"'; ?>>Deluxe</option>       
                                            <option value="2" <?php if(2==$_REQUEST['rc3']) echo 'seleted="selected"'; ?>>Superior</option> 	          
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputEmail">No Of Room </label>
                                            <select type="search" name="nroom3" onchange="change();" class="form-control searchbox1" required>      <?php		
											for($i=0;$i<20;$i++)	
												{			
											?>		
											<option value="<?php echo $i; ?>" <?php if($i==$_REQUEST['nroom3']) echo 'selected="selected"';?>><?php echo $i; ?></option>                   <?php			}			?>       
											</select>
                                        </div>
										 
                                    </div>
									
									  <div class="form-group">
                                        <div class="col-md-12">
                                            <label for="inputPassword">Extra Nights</label>
                                           <select type="search" name="enights" onchange="admSelectCheck(this);" class="form-control searchbox1" required> 
                                           <option value="0" <?php if(0==$_REQUEST['enights']) echo 'selected="selected"';?>>NO</option>      										   
                                           <option id="admOption" value="1" <?php if(1==$_REQUEST['enights']) echo 'selected="selected"';?>>YES</option>												 
                                           
                                            </select>
                                        </div>
                                        
                                    </div>
									
									<?php 
									if($_REQUEST['enights']==0)
									{
										?>
										<div id="admDivCheck" style="display:none;">
                                        <?php 
									}
										
									if($_REQUEST['enights']=='1')
									{
										?>
										<div id="admDivCheck">
                                        <?php 
										}
									/*else
									{
										?>
										<div id="admDivCheck" style="display:none;">
                                        <?php 
										}*/
										?>
									
									
									<div class="form-group">
									 <h4>Extra Night Details</h4>
									  <div class="col-md-12">
                                            <label for="inputEmail">No Of Nights </label>
                                            <select type="search" name="ext_night" class="form-control searchbox1" required>
                                            <option value="" selected disabled>Nights</option>
											<?php		
											for($i=0;$i<20;$i++)	
												{			
											?>		
											<option value="<?php echo $i; ?>" <?php if($i==$_REQUEST['ext_night']) echo 'selected="selected"'; ?>><?php echo $i; ?></option>                   <?php			}			?>       
											</select>
                                        </div>
										
                                        
                                       
                                    </div>
									
									 
									
									</div>
									
									 
									 
									 
									
									
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label for="inputPassword">Arrival Date</label>
                                            <input type="text" name="arrival_date" id="date_from" value="<?php echo $cindate;; ?>" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputPassword">Pick Up From</label>
                                           <input type="text"  name="pickup_frm" class="form-control">
                                        </div>
                                    </div>
									
									
									<?php
									
									if(!empty($_REQUEST['nroom2']))
									{
									?>
                                    <div class="form-group text-right">
                                    <hr>
                                   <div class="col-sm-12">
								   <?php 
								   $no_adult=$_REQUEST['adult'];
								   $drate=$fetch_rate['twin_rate'];
								   $trate=$fetch_rate['triple_rate'];
								   $no_room2=$_REQUEST['nroom2'];
								   $no_room3=$_REQUEST['nroom3'];
								   $no_day=$_GET['night'];
								   $book_amount=$rate*$no_day;
								   ?>
                                  <h4> Total  Booking Cost: <span class="text-warning"> <?php   $fetch_rate['twin_rate'];?></span></h4>
								          <table class="table table-bordered table-condensed additional-table">
										    <tr bgcolor="#fff">
												 <td align="center"><strong>No Of Rooms</strong></td>
												  <td align="center"><strong>Room Price(USD)</strong></td>
												   <td align="center"><strong>Room Type</strong></td>
												    <td align="center"><strong>Total</strong></td></tr>
                                                <tr bgcolor="#fff">
												 <td align="center"><strong><?php echo $_REQUEST['nroom2'];?></strong></td><td align="center"><strong>USD <?php echo $fetch_rate['twin_rate']; ?></strong></td><td align="center"><strong>Double sharing</strong></strong></td>
												  <td align="center"><strong>USD <?php echo $_REQUEST['nroom2']*$fetch_rate['twin_rate']; ?></strong></td>
                                                   
                                                </tr>
												<?php
												if(!empty($_REQUEST['nroom3']))
												{
												?>
												 
												  <tr bgcolor="#fff">
												 <td align="center"><strong><?php echo $_REQUEST['nroom3'];?></strong></td><td align="center"><strong>USD <?php echo $fetch_rate['triple_rate']; ?></strong></td><td align="center"><strong>Triple sharing</strong></strong></td>
												  <td align="center"><strong>USD <?php echo $_REQUEST['nroom3']*$fetch_rate['triple_rate']; ?></strong></td>
                                                   
                                                </tr>
												<?php
												}
												if($_REQUEST['enights']=='1')
												{								
																							if(!empty($_REQUEST['nroom3']))
												{
													
											?>
											   <tr bgcolor="#fff">
												 <td align="center" colspan="4"><strong>No Of extra night  <?php echo $_REQUEST['ext_night'];  ?></strong></td>
												  </tr>
													
													
												    <tr bgcolor="#fff">
												 <td align="center"><strong><?php echo  $_REQUEST['ext_nroom2']; ?></strong></td>
												  <td align="center"><strong><?php echo $fetch_rate['exn_twinrate']; ?></strong></td>
												   <td align="center"><strong>Double Sharing</strong></td>
												    <td align="center"><strong>USD <?php echo $_REQUEST['ext_nroom2']*$fetch_rate['exn_twinrate']; ?></strong></td></tr>
                                              <?php
												}
												}
											  ?>
											  
											  
											 
                                                
                                            </table>
                                   </div>
                                        <div class="col-sm-6">
                                             <button type="submit" name="save" value="Add" class="btn btn-primary book-now1 btn-lg">Add  </button>
                                        </div>
										
									<?php
									}

?>									
										
                                    </div>
                                </form>
                            </div>
                        </div>
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
	<script>
	function admSelectCheck(nameSelect)
{
    console.log(nameSelect);
    if(nameSelect){
        admOptionValue = document.getElementById("admOption").value;
        if(admOptionValue == nameSelect.value){
            document.getElementById("admDivCheck").style.display = "block";
        }
        else{
            document.getElementById("admDivCheck").style.display = "none";
        }
    }
    else{
        document.getElementById("admDivCheck").style.display = "none";
    }
}
	</script>
	<script>
  function change() {
   document.getElementById( "register" ).submit();
  }
  </script>
</body>

</html>
