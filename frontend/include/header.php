<?php //include "data-p.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#007bff">
    <title>Penang Tours</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css_home/nice-select.css">
    <link href="appcss/css_home/style.css" rel="stylesheet">
    <link href="appcss/css_home/owl.carousel.css" rel="stylesheet">
    <link href="appcss/css_home/owl.theme.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="appcss/css_home/hotel-datepicker.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="js/modernizr.js"></script>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <nav class="navbar navbar-expand-lg navbar-light bg-light  fixed-top">
          <div class="container">
            <a class="navbar-brand" href="index.php"><img src="images_home/logo.png" class="images-responsive logo" alt="logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a href="index.php" id="type-1" class="nav-link active">Hotel</a></li>
                <li class="nav-item"><a href="#!" id="type-21" class="nav-link">Flights</a></li>
                <li class="nav-item"><a href="#!" id="type-3" class="nav-link">Cruise</a></li>
                <li class="nav-item dropdown">
                  <a href="#!" class="nav-link dropdown-toggle" data-toggle="dropdown">Tours</a>
                <div class="dropdown-menu"> 
                  <a href="#!" class="dropdown-item"> Activities</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a href="#!" class="nav-link dropdown-toggle" data-toggle="dropdown">  Transfers</a>
              <div class="dropdown-menu">
                <a href="#!" class="dropdown-item"> Buses</a>
                <a href="#!" class="dropdown-item"> Trains</a>
                <a href="#!" class="dropdown-item"> Cars</a>
              </div>
            </li>
            <li class="nav-item"><a href="#!" class="nav-link"> Insurance</a></li>
            
          </ul>
          <ul class="navbar-nav justify-content-end">
            <li class="nav-item"><a href="#" data-toggle="modal" data-target="#login" class="nav-link"> Login</a></li>
            <li class="nav-item"><a href="#" data-toggle="modal" data-target="#registers" class="nav-link"> My Account</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
  
  
  <!-- Modal Login -->
  <div class="modal fade" id="login" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="text-center">
            <h2 class="headings">Login</h2>
          </div>
          <div class="form-horizontal pl-5 pr-5 pb-2">
          <form name="register" id="register" method="post" action="#" novalidate="novalidate">
            
            <div class="form-group">
              <div class="col-md-12">
                <label for="inputPassword">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                <label id="emerer" class="error" style="display:none;">Email Already Exists..</label>
              </div>
              
            </div>
            
            <div class="form-group">
              <div class="col-md-12">
                <label for="inputPassword">Password</label>
                <input type="password" name="pswd" class="form-control" id="pswd" placeholder="password">
              </div>
              
            </div>
            <div class="form-group text-center">
              <p>&nbsp;</p>
              <div class="col-md-12">
                <button type="submit" id="save" class="btn btn-primary btn-search" name="save">Login</button>
                <p>Not Registered Yet? <a href="#" data-toggle="modal" data-target="#registers">create an account to manage all your bookings</a>
              </p>
            </div>
          </div>
        </form>
      </div>
      </div>
      
    </div>
  </div>
</div>
<!-- Login end -->
<!-- Modal Register -->
<div class="modal fade" id="registers" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <h2 class="headings">Register</h2>
        </div>
        <div class="form-horizontal pl-5 pr-5 pb-2">
        <form name="register" id="register" method="post" action="#" novalidate="novalidate">
          <div class="form-group">
            
            <label for="inputEmail">First Name</label>
            <input type="text" class="form-control" id="fname" name="fname" value="<?php echo isset($_POST['fname']) ? $_POST['fname'] : '' ?>" placeholder="First Name" required>
          </div>
          <div class="form-group">
            <label for="inputEmail">Last Name</label>
            <input type="text" class="form-control" id="lname" name="lname" value="<?php echo isset($_POST['lname']) ? $_POST['lname'] : '' ?>" placeholder="Last Name" required>
          </div>
          
          <div class="form-group">
            
            <label for="inputPassword">Email</label>
            <input type="email" name="email" value="<?php  if (!empty($_POST['email'])) { echo htmlentities($_POST['email']); } ?>" class="form-control" id="email" placeholder="Email" required>
            <label id="emerer" class="error" style="display:none;">Email Already Exists..</label>
          </div>
          <div class="form-group">
            <label for="inputPassword">Mobile</label>
            <input type="tel" name="mobile" value="<?php  if (!empty($_POST['mobile'])) { echo htmlentities($_POST['mobile']); } ?>" class="form-control" id="phone" placeholder="Phone" required>
          </div>
          
          
          <div class="form-group">
            
            <label for="inputPassword">Password</label>
            <input type="password" name="pswd" id="password1" value="<?php  if (!empty($_POST['pswd'])) { echo htmlentities($_POST['pswd']); } ?>" class="form-control" id="pswd" placeholder="password" required>
          </div>
          <div class="form-group">
            <label for="inputPassword">Confirm Password</label>
            <input type="password" name="cpswd" id="password2" value="<?php  if (!empty($_POST['cpswd'])) { echo htmlentities($_POST['cpswd']); } ?>" class="form-control" id="cpswd" placeholder="confirm password" required>
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
</div>
<!-- Register end -->
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
                      <!--<td><img src="images_home/12.jpg" width="62" height="47" alt=""></td>-->
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
  <?php //include "model.php";
  
  ?>