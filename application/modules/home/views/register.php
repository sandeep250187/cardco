 <?php
 include "include/header.php"; 
 $dt=date('Y/m/d H:i:s');

if(isset($_POST['save']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	
	$s=mysql_query("select email from apmg_signup where email='$email'");
	$num=mysql_num_rows($s);
	if($num>0)
	{
		echo "<script>";
		echo "alert('Looks like you have registered earlier with us.')";
		
		//echo "<script>window.location='register.php'</script>";
		echo "</script>";
		echo "<script>window.location='register.php'</script>";
		exit();
	}
	
  
  $selectmax=mysql_query("SELECT MAX(id) FROM `apmg_signup`");

$fetchmax=mysql_fetch_array($selectmax);

$maxid=$fetchmax[0]+1;

 if(strlen($maxid)=='1')

{

$code='APCI0000'.$maxid;

}

if(strlen($maxid)=='2')

{

$code='APCI000'.$maxid;

}

if(strlen($maxid)=='3')

{

$code='APCI00'.$maxid;

}

if(strlen($maxid)=='4')

{

$code='APCI0'.$maxid;

}

if(strlen($maxid)=='5')

{

$code='APCI'.$maxid;

}
   
	
	$mobile=$_POST['mobile'];
	$password=$_POST['pswd'];
	$cpassword=$_POST['cpswd'];
	if($password!=$cpassword)
	{
		echo "<script>";
		echo "alert('Password Is Not Matched!!!')";		
	   	echo "</script>";
		echo "<script>window.location='register.php'</script>";
		exit();
	}
	else
	{
	
	$insert=mysql_query("insert into apmg_signup (cid,first_name,last_name,email,mobile,password,created_date)values('$code','$fname','$lname','$email','$mobile','$password','$dt')");
	
	
	$selectmax=mysql_query("SELECT MAX(id) FROM `apmg_signup`");
$fetchmax=mysql_fetch_array($selectmax);
$maxid=$fetchmax[0];
$mi=base64_encode($maxid);

//$link="https://apmg.apolloasiab2b.com/acc_aut.php?id=$mi";
	
	
	echo "<script>";
	echo "alert('You Have Registered Successfully!!!')";
	echo "</script>";
	echo "<script>window.location='login.php'</script>";
	
	
}
//send Mail start
$message="<body style='background: #e9eff5;'>
    <table role='presentation' cellspacing='0' cellpadding='0' border='0' align='center' width='100%' style='max-width: 600px; line-height: 1.3; font-family: sans-serif; background: #fff; padding: 0; font-size: 13px; color: #545454; letter-spacing: 0.05em;'>
        <tr>
            <td style='padding: 0; text-align: center'>
                <img src='http://apmg.apolloasiab2b.com/images/email-header.jpg' width='100%' alt='alt_text' border='0' style='height: auto; background: #dddddd; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;'>
            </td>
        </tr>
        <tr>
            <td style='padding: 20px;'>
                <p> Dear <strong>$fname  $lname</strong>,</p>
                
                <p>Thank you for Registering ! Your account has now been setup and this email contains all the information you will need in order to begin using your account.
</p>
                <p style='font-size: 15px; font-weight: 600;'>
                    <strong>Login Details</strong></p>
                <ul style='list-style: none; padding: 0; line-height: 24px;'>
                    <li>Email : <strong>  $email </strong></li>
                    <li>Password: <strong>$password</strong></li>
                    <li>Login  URL:<strong> <a href='http://apmg.apolloasiab2b.com/login.php' target='_blank' style='color: #2196f3;'> www.apmg.apolloasiab2b.com/login.php</a></strong></li>
                   
                </ul>
                <p>Once you logged in on our website you can access all the information related to your booking, profile and you can update your login details.</p>
          
                <div style='border-bottom: 1px dashed #ccc; margin-bottom: 20px;'>&nbsp;</div>
                
                
                <p>Thank you.</p>
                <p style='color: #000;'><strong>
                	<a href='#' target='_blank' style='color: #000; text-decoration: none;'> APMG 2018 Tour Desk</a></p>
            </td>
        </tr>
        <tr bgcolor=''>
            <td style='background: #00aeef; color: #fff; padding:10px 20px; text-align: center;'>
                <p style='font-weight: bold; font-size: 16px; margin: 0;'>Apollo Holidays Malaysia Sdn Bhd </p>
                Unit-A-5-1, Wishma Yoon Cheng, No.726, Jalan ipoh, Batu 4 1/2, <br> Kuala Lumpur Malaysia
                 
            </td>
        </tr>
        <tr bgcolor=''>
            <td style='background: #0099ff; color: #fff; padding:10px 20px; text-align: center;'>
                <p style='font-weight: bold; font-size: 12px; margin: 5px;'>  <a href='http://www.apmg.apolloasiab2b.com/login.php' target='_blank' style='color: #000; text-decoration: none;'> log in to your account </a> | <a href='www.apmg2018.com' style='color: #000; text-decoration: none;'> get support </a>
                </p>
                <span style='font-size: 11px'> Copyright © Apollo Holidays Malaysia Sdn Bhd, All rights reserved.</span>
            </td>
        </tr>
    </table>
</body>";

     $to=$email;
	 $dt=date("Y-m-d");
     $headers = "From:apmg2018@apolloholidays.net\r\n";
	//$headers.= "Bcc:contact@globallawdirectories.com\r\n";
	 $headers.= "Content-Type: text/html; charset=iso-8859-1;\r\n\r\n";
    $subject="APMG 2018 - Your have successfully Created your Account";
     mail($to,$subject,$message,$headers) or die("error");
	 
	  echo " <script>";
echo "alert('Your Account Created Successfully')";
echo "window.location='cart.php';";
echo " </script>";

}

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
 
        <div class="row banner banner1">
             <div class="col-sm-6 col-sm-offset-3">
                <div class="transfer-search">
                <div class="text-center">
                <h2 class="headings">Register </h2>
                </div>
                            <div class="form-horizontal well-lg">
                                <form name="register" id="register" method="post" action="#" novalidate="novalidate">
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label for="inputEmail">First Name</label>
                                            <input type="text" class="form-control" id="fname" name="fname" value="<?php echo isset($_POST['fname']) ? $_POST['fname'] : '' ?>" placeholder="First Name" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputEmail">Last Name</label>
                                            <input type="text" class="form-control" id="lname" name="lname" value="<?php echo isset($_POST['lname']) ? $_POST['lname'] : '' ?>" placeholder="Last Name" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label for="inputPassword">Email</label>
                                            <input type="email" name="email" value="<?php  if (!empty($_POST['email'])) { echo htmlentities($_POST['email']); } ?>" class="form-control" id="email" placeholder="Email" required>
                                            <label id="emerer" class="error" style="display:none;">Email Already Exists..</label>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputPassword">Mobile</label>
                                            <input type="tel" name="mobile" value="<?php  if (!empty($_POST['mobile'])) { echo htmlentities($_POST['mobile']); } ?>" class="form-control" id="phone" placeholder="Phone" required>
                                        </div>
                                    </div>
                                   
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label for="inputPassword">Password</label>
                                            <input type="password" name="pswd" id="password1" value="<?php  if (!empty($_POST['pswd'])) { echo htmlentities($_POST['pswd']); } ?>" class="form-control" id="pswd" placeholder="password" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputPassword">Confirm Password</label>
                                            <input type="password" name="cpswd" id="password2" value="<?php  if (!empty($_POST['cpswd'])) { echo htmlentities($_POST['cpswd']); } ?>" class="form-control" id="cpswd" placeholder="confirm password" required>
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <p>&nbsp;</p>
                                        <div class="col-md-12">
                                            <button type="submit" id="save" class="btn btn-primary btn-search" name="save" value="">Register Now</button>
                                        </div>
                                    </div>
                                </form>
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
