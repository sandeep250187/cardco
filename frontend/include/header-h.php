<?php include "data.php"; 

  
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

    <link href="css/datepicker.css" rel="stylesheet">

    <link href="css/owl.carousel.css" rel="stylesheet">

    <link href="css/owl.theme.css" rel="stylesheet">
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

                        <a href="index.php" class="navbar-brand"> <img src="images/logon.jpg" class="images-responsive logo" alt="logo"></a>

                    </div>

                    <div id="navbar-collapse-2" class="navbar-collapse collapse">

                        <ul class="nav navbar-nav">

                            <!-- Media Example -->
                             <li><a href="hotel.php" class="active"><i class="fa fa-hotel"></i>Hotel</a></li>
							 <!--<li><a href="hotel_wvenue.php" class="active"><i class="fa fa-hotel"></i> Hotels+Venue Shuttle</a></li>-->
                            <li><a href="index.php" class="active"><i class="fa fa-plane"></i> Transfers</a></li>

                 

                              <li><a href="tours-search.php"><i class="fa fa-bus"></i> Tours</a></li>

                            <li><a href="insurance.php"><i class="fa fa-shield"></i> Insurance</a></li>

                        </ul>

                        <!-- Forms -->

                        <ul class="nav navbar-nav navbar-right">

                            <li>

                                <a href="enquiry.php"> <i class="fa fa-lock"></i>Enquiry</a>

                            </li>

                          
                           <?php
						   if(empty($_SESSION['id']))
						   {
						   ?>
						  
						    
						   <li><a href="login.php" class="active"><i class="fa fa-user"></i> Login</a></li>
						    <li><a href="register.php" class="active"><i class="fa fa-users"></i> Register</a></li>
						    <li><a href="#" data-toggle="modal" data-target="#cartModal"><i class="fa fa-shopping-cart"></i>My Cart</a></li>
						   <?php
						   }
						   else							   
						   { 					   
						   ?>
						    <li><a href="my_account.php" class="active"><i class="fa fa-user"></i>My Account</a></li>
							 <li><a href="#" data-toggle="modal" data-target="#cartModal"><i class="fa fa-shopping-cart"></i>My Cart</a></li>
							 
							 <li><a href="logout.php" class="active"><i class="fa fa-user"></i> Log out</a></li>
						   
						   <?php
						   
						   } 
						   
						   ?>

                        </ul>

                    </div>

                </div>

            </div>

        </div>

		
		
			 <!-- Modal -->
<?php include "model.php"; 
 
?>
<!-- End Cart Modal -->