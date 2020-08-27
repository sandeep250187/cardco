  <?php include "data-p.php"; 
 
?>

<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Special Offers for Accommodation, Transfers & Tours by APMG 2018</title>

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



<body class="loading">

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
                             <li><a href="index.php" class="active"><i class="fa fa-hotel"></i> Hotel</a></li>
							 
							 <!--<li><a href="hotel_wvenue.php" class="active"><i class="fa fa-hotel"></i> Hotels+Venue Shuttle</a></li>-->
							 
                          <!--  <li><a href="transfer-search.php" class="active"><i class="fa fa-plane"></i> Transfers</a></li>

                 

                            <li><a href="tours-search.php" data-toggle="tooltip" data-placement="bottom" title="Coming Soon!"><i class="fa fa-bus"></i> Tours</a></li>-->
							<li><a href="transfer-search.php" class="active" ><i class="fa fa-plane"></i> Transfers</a></li>

                 

                            <li><a href="tours.php"><i class="fa fa-bus"></i> Tours</a></li>

                            <li><a href="#" data-toggle="tooltip" data-placement="bottom" title="Coming Soon!"><i class="fa fa-shield"></i> Insurance</a></li>

                        </ul>

                        <!-- Forms -->

                        <ul class="nav navbar-nav nav6 navbar-right">

                            <li>

                                <a href="enquiry.php"> <i class="fa fa-users"></i> Group Bookings</a>

                            </li>

                           <?php
						  // echo "sec==".$_SESSION['id'];
						   if(empty($_SESSION['id']))
						   {
						   ?>
						  
						    
						   <li><a href="login.php" class="active"><i class="fa fa-user"></i> Login</a></li>
						    <!--<li><a href="register.php" class="active"><i class="fa fa-users"></i> Register</a></li>-->
							<!--<li><a href="model.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>-->
						 <!--   <li><a href="#"  data-toggle="modal" data-target="#model456"><i class="fa fa-shopping-cart"></i> Cart</a>
 <ul>
              <li>
                <div class="widget_shopping_cart_content">
                  <h5 class="page-header"><strong>Recently Added</strong></h5>
				  <?php
				  if(!empty($_SESSION['cart-hotel']))
				  {
				  ?>
                  <table width="100%" border="0">
                    <tbody>
                      <?php
		foreach($_SESSION['cart-hotel'] as $data) 
		{
			 
$start = strtotime($data['cin']);
$end = strtotime($data['cout']);

 $night = ceil(abs($end - $start) / 86400);

												?>
		 
                      <tr>
                         
                        <td colspan="4"><?php
				  if($data['room_type']==2){$rt="Double";}
				  if($data['room_type']==3){$rt="Triple";}
				  if($data['room_type']==4){$rt="Family";}
				 
													$selrc=mysql_query("select * from mala_roomcat_master where id='$data[room_cat]'");
													$fetrc=mysql_fetch_array($selrc);
													 $rc=$fetrc['roomtype'];
				  
				  ?><?php echo $data['room'].' * '.$rt.' '.$rc;  ?><br>
                           <span class="price">MYR <?php echo  $total=($data['price']+$data['markup'])*$data['room']*$night; 
				   $to=$to+$total;
				   ?> </span></td>
                       
                      </tr>
                     
		<?php  } ?>
                      <tr>
                        <td colspan="2"><p><span class="total">Cart total</span></p></td>
                        <td colspan="2" align="right"><p> <span class="amount"><strong>MYR <?php echo $to; ?></strong></span></p></td>
                      </tr>
                    </tbody>
                  </table>
                  
                 
                  <p>
                    <button class="btn btn-block btn-default btn-ghost" onclick="window.location='cart.php'">Checkout</button>
                  </p>
				  <form name="f" action="" method="POST">
				   <p>
                     <button class="btn btn-block btn-default btn-ghost" name="empty1"  type="submit">Empty Cart</button>
                  </p>
				  </form>
				  <?php   } else { ?>
				  <p>
                     <span>Your Cart is Empty............</span>
                  </p>
				  <?php } ?>
                  <p>
                    <button class="btn btn-block btn-primary login" onClick="window.location='cart.html'">Checkout</button>
                  </p> 
                </div>
              </li>-->
			  <li><a href="cart.php"  ><i class="fa fa-shopping-cart"></i> Cart</a></li>
            </ul>
                </li>
						   <?php
						   }
						   else							   
						   { 					   
						   ?>
						    <!-- <li><a href="my_account.php" class="active"><i class="fa fa-user"></i>My Account</a></li> -->
             
							<!--  <li><a href="#" data-toggle="modal" data-target="#cartModal"><i class="fa fa-shopping-cart"></i> Cart</a>-->
							 <li><a href="cart.php"  ><i class="fa fa-shopping-cart"></i> Cart</a></li>
           
               </li>
							 
							
 <li><a href="my_account.php" class="active"><i class="fa fa-user"></i> My Account</a></li>
 <li class="dropdown"> <a href="index-next.html" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-user-circle-o"></i> Welcome <?php echo $_SESSION['fn']; ?>  
             <i class="caret"></i> </a>
              <ul class="dropdown-menu ">
               <li><a href="my_account.php" class="active"><i class="fa fa-user"></i> My Account</a></li>
                 <li><a href="logout.php" class="active"><i class="fa fa-power-off"></i> Log out</a></li>
               
              
              </ul>
            </li>

							    
						   
						   <?php
						   
						   } 
						   
						   ?>

                        </ul>

                    </div>

                </div>

            </div>

        </div>

		
		
		
		
		
		
		
		
		
		
		
		
		
		  <!-- Modal//cartModal -->
<div class="modal fade" id="model1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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


<?php include "model.php"; 
 
?>
