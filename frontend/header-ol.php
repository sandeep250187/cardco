<?php include "data-p.php"; 

  
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
<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Your Cart</h4>
      </div>
      <div class="modal-body">
     <div class="row small"> 
                <!-- Modal -->
     <h4 class="text-uppercase text-center">
     <strong>CART DETAILS</strong>
      <strong>OF ORDER CODE: <b style="color:red">AG0062</b></strong> 
      </h4>
        <div class="col-md-8">
        
          <div class="table-responsive">
      
      
            <table class="table cart-table small">
      
              <tbody>
                <tr>
                  <th>&nbsp;</th>
                  <!--<th>Item</th>-->
                  <th>Destination</th>
                  <th>Date / Time</th>
                  <th><strong>DESCRIPTION</strong></th>
                            <th width="100"><strong>No Of Pax / Vehicle</strong></th>
                  <th width="100" align="right">Per Pax / Vehicle</th>
                  <th align="right"><strong class="pull-right">Subtotal</strong></th>
                </tr>
        
                         <tr>
                  <td><button type="button" class="close1" data-dismiss="modal" aria-label="Close">
          <a class="btn-link" onclick="if(confirm('Are You Sure U want to Delete This Permanently...')){javascript:window.location='delete.php?id=64';}"><span aria-hidden="true">×</span></a></button></td>
                  <!--<td><img src="images/12.jpg" width="62" height="47" alt=""></td>-->
                  <td class="">Singapore</td>
          <td class="">2017/09/30 (06:30)</td>
        
                  <td class=""><ul class="product_list_widget1 list-unstyled">
                      <li class="product-text"> Hotel lobby To Hotel lobby (Inter transfer) (PVT)  <br>
                      </li>
                    </ul></td>
                              <td align="center"><!--<input type="number" class="form-control" name="number" id="number">-->
          1 CAR         </td>
                  <td>SGD <!--<input type="number" class="form-control" name="number2" id="number2">-->
          42 (Per Vehicle)          </td>
                  <td align="right"><strong>SGD 
          42          </strong></td>
          
                          </tr>
                
                
        
                <tr>
                  <td colspan="6">&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
        
        
              <!--  <tr>
                  <td colspan="6">Select Delivery Option:
                    <div class="btn-group-xs btn-group">
                      <button class="btn btn-success"><i class="fa fa-check"></i></button>
                      <button class="btn btn-default">E-Ticket</button>
                    </div>
                    <div class="btn-group-xs btn-group ">
                      <button class="btn btn-default disabled"><i class="fa fa-close"></i></button>
                      <button class="btn btn-default disabled">E-Ticket</button>
                    </div></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>-->
              </tbody>
        
        
            </table>
         
          </div>
        </div>
        <div class="col-md-4">
          <div class="">
           
            <table class="table total-order small">
              <tbody>
                <tr>
                  <th>Item</th>
                  <th align="right" style="text-align:right;">Price (SGD)</th>
                </tr>
                <tr>
                  <td>Total</td>
                  <td align="right"><strong> SGD 42</strong></td>
                </tr>
               <!-- <tr>
                  <td>Transaction Fees</td>
                  <td align="right"><strong>SGD 2</strong></td>
                </tr>-->
                <tr class="heading">
        <td><strong>Order Total</strong></td>
                  <td align="right"><strong>SGD 42
        <input type="hidden" value="42" name="net"></strong></td>
                  
                </tr>
              </tbody>
            </table>
            <p>
              <button class="btn btn-block btn-primary login" onclick="window.location='checkout.php'">Proceed to Payment</button>
            </p>
            <p>
              <button class="btn btn-block btn-default btn-ghost" data-dismiss="modal">Continue Shopping</button>
            </p>
          </div>
        </div>
    
    
        
      </div>
      </div>
    
    </div>
  </div>
</div>
<!-- End Cart Modal -->
