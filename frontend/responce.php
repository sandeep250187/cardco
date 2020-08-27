 <?php
 include "include/header.php"; 
 $dt=date('Y/m/d H:i:s');
  $r=$_GET['result']; 
echo "<br>";echo "<br>";echo "<br>";
 echo $status=$r[0]; 
 $txnid=substr($r,1,6); 
   $code=substr($r,18,9); 
 substr($r,27,4); 
 $amount=substr($r,31,12); 

if($status=='0')
{
	$bs=1;
	$ps='S';
	$message='Payment Successfully Done';
	
}
else
{
	$bs=0;
	$ps='F';
	$message='Transaction Failed';
}

 $dt=date('Y/m/d H:i:s');
	 
	$sql=mysql_query("update apmg_order_list set payment_id='$txnid',booking_status='$bs',payment_status='$ps',payment_date='$dt',result='$_GET[result]'  where order_code='$code'");

  

 ?>
 <html>
 <title>Register</title>
 <head>
 <script type="text/javascript" src="http://www.technicalkeeda.com/js/javascripts/plugin/jquery.js"></script>
    <script type="text/javascript" src="http://www.technicalkeeda.com/js/javascripts/plugin/jquery.validate.js"></script>
    <script>
    function validatePassword() {
        var validator = $("#loginForm").validate({
            rules: {
                password: "required",
                confirmpassword: {
                    equalTo: "#password"
                }
            },
            messages: {
                password: " Enter Password",
                confirmpassword: " Enter Confirm Password Same as Password"
            }
        });
        if (validator.form()) {
            alert('Sucess');
        }
    }
 
    </script>
 </head>
 <body>
 
        <div class="row gap bg-grey">
             <div class="col-sm-6 col-sm-offset-3">
                <div class="transfer-search">
                    <div class="well-lg">
                <div class="text-center">
                <h1 class="headings">Thank You ! </h1>
            
<div class="alert alert-success"><i class="fa fa-info-circle"></i> <?php echo $message; ?></div></div>
 <div class="text-center">
<ul class="list-unstyled">
<li>
   Your Transaction id  is:-  <strong> <?php echo $txnid; ?> </strong> and  Order Code:-  <strong><?php echo $code;  ?></strong>
</li> 

</ul>
<h1 class="text-center text-primary">MYR: <?php echo number_format(($amount/100),2); ?></h1>
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
        </div>
        <?php include "include/footer.php"; ?>
        </div>
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
    <!-- Compiled and minified JavaScript -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
 -->
</body>

</html>
