<?php include "include/header.php"; 

if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$nationality=$_POST['nationality'];
	$email=$_POST['email'];
	$mobile=$_POST['mobile'];
	$adult=$_POST['adult'];
	$child=$_POST['child'];
	$pf=$_POST['pf'];
	$time=$_POST['time'];
	$date=$_POST['date'];
	$remark=$_POST['remark'];
	$status=$_POST['status'];
	$cdate=date('Y/m/d');
	
	$selectmax=mysql_query("SELECT MAX(id) FROM `apmg_group_enquiry`");
$fetchmax=mysql_fetch_array($selectmax);
$maxid=$fetchmax[0]+1;
if(strlen($maxid)=='1')
{
$maxid='APGEN000'.$maxid;
}
if(strlen($maxid)=='2')
{
$maxid='APGEN00'.$maxid;
}
if(strlen($maxid)=='3')
{
$maxid='APGEN0'.$maxid;
}
if(strlen($maxid)=='4')
{
$maxid='APGEN'.$maxid;
}
	
	$insert=mysql_query("insert into apmg_group_enquiry (`web_id`,`name`,`nationality`,`email`,`mobile`,`adult`,`child`,`pickup_from`,`pickup_time`,`pickup_date`,`remark`,`status`,`created`)values('$maxid','$name','$nationality','$email','$mobile','$adult','$child','$pf','$time','$date','$remark','$status','$cdate')");
	
	if($insert)
	{
		echo "<script>";
		echo "alert('You Enquiry Has Been Submitted Successfully!!!')";
		echo "</script>";
		echo "<script>window.location='index.php'</script>";
	}
	
}

?>


        <div class="row bg-grey">
           
     
            <div class="container">
               
                 <div class="col-sm-8 col-sm-offset-2">
                <div class="transfer-search">
                <div> <div class="row text-center">
                    <h1 class="headings text-white">REQUEST QUOTE</h1>
                </div>
                            <div class="form-horizontal well-lg">
                                <form name="register" id="register" method="post" action="#" novalidate="novalidate">
                                     
                                    <div class="form-group">
                                        <h4>Booking Details</h4>
                                        <div class="col-md-6">
                                            <label for="inputPassword">Guest Name</label>
                                            <input type="email" name="name" class="form-control" id="email" placeholder="Enter Your Name">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputPassword">Nationality</label>
                                            <input type="tel" name="nationality" class="form-control" id="phone" placeholder="Enter Nationality">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                         
                                        <div class="col-md-6">
                                            <label for="inputEmail">Email</label>
                                            <input type="text" class="form-control"  Placeholder="Enter Your Email" name="email" >
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputEmail">Mobile</label>
                                            <input type="text" name="mobile"Placeholder="Enter Your Mobile " class="form-control"  >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                         <div class="col-md-6">  
										 <label for="inputEmail">No of Adult</label>                             <input type="text" class="form-control" name="adult" Placeholder="Enter No Of Adult" >   
										 </div>
                                      																												<div class="col-md-6">    										       		   <label for="inputEmail">No of Child </label>                                    <input type="text" class="form-control" name="child" Placeholder="Enter No Of child" >                                        </div>
                                    </div> <div class="form-group">
                                        <div class="col-md-6">
                                            <label for="inputEmail">Pickup From</label>
                                            <input type="text" class="form-control"  Placeholder="Enter Pickup Location"   name="pf">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputEmail">Departure Time(24 Hour)</label>
                                            <input type="text" class="form-control" Placeholder="Enter Departure Time" name="time">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label for="inputPassword">Pick Up Date</label>
                                            <input type="text" name="date" id="datepicker"  class="form-control">
                                        </div>
                                        <!--<div class="col-md-6">
                                            <label for="inputPassword">Pick Up From</label>
                                            <select class="form-control"><option>-select-</option></select>
                                        </div>-->
                                    </div>																											  <div class="form-group">                                        <div class="col-md-12">                                            <label for="inputPassword">Remark</label>                                            <textarea  type="text" name="remark" class="form-control"> </textarea>                                        </div>                                                                         </div>
                                    <div class="form-group text-center">
                                    <hr>
                                 
                                                <button type="submit" name="submit"   class="btn btn-primary btn-search">Send Now</button>  
                                        
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
	
  
 

  <script>
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy/mm/dd' });
  } );
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
                });
	</script>			
	
    <!-- Compiled and minified JavaScript -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
 -->
</body>

</html>
