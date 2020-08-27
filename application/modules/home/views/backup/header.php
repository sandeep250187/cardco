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
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/appcss/css_home/nice-select.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/appcss/datepicker.css">
    <link href="<?php echo base_url(); ?>assets/appcss/css_home/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/appcss/css_home/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/appcss/css_home/owl.theme.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/appcss/css_home/hotel-datepicker.css">
    <script src="<?php echo base_url(); ?>assets/js_home/modernizr.js"></script>
	<script type="text/javascript">
	 var base_url = '<?php echo base_url(); ?>';
	 </script>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <nav class="navbar navbar-expand-lg navbar-light bg-light  fixed-top">
          <div class="container">
            <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images_home/logo.png" class="images-responsive logo" alt="logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a href="<?php echo base_url(); ?>hotels" id="type-1" class="nav-link active">Hotel</a></li>
                <!-- <li class="nav-item"><a href="#!" id="type-21" class="nav-link">Flights</a></li> -->
                <li class="nav-item"><a href="<?php echo base_url(); ?>cruise" id="type-3" class="nav-link">Apartments</a></li>
                <li class="nav-item dropdown">
                  <a href="<?php echo base_url(); ?>tours" class="nav-link">Tours</a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>transfer" class="nav-link">Transfers</a>
                </li>
                <li class="nav-item"><a href="<?php echo base_url(); ?>ticket" class="nav-link">Tickets</a></li>
                <!--<li class="nav-item"><a href="javascript:void(0);" class="nav-link"> Insurance</a></li>-->
              </ul>
              <ul class="navbar-nav justify-content-end">
                <?php
                $login =  getfrontCurUserID();
                if(!empty($login)){  ?>
                  <li class="nav-item dropdown"><a href="#" id="cart" class="nav-link"><i class="fa fa-shopping-bag"></i> Cart <span class="badge-info badge">0</span> </a>

                      <div class="shopping-cart dropdown-menu dropdown-menu-right">
    <div class="shopping-cart-header">
      <i class="fa fa-shopping-cart cart-icon"></i><span class="badge">3</span>
      <div class="shopping-cart-total">
        <span class="lighter-text">Total:</span>
        <span class="main-color-text">$2,229.97</span>
      </div>
    </div> <!--end shopping-cart-header -->

    <ul class="shopping-cart-items">
      <li class="clearfix">
        <img src="https://penang.tours//uploads/hotelmaster/thumb_1324138552_images-4.jpg" style="height:80px;width:80px;" alt="item1"/>
        <span class="item-name">COPTHORNE ORCHID HOTEL PENANG</span>
        <span class="item-price">$849.99</span>
        <span class="item-quantity">Quantity: 01</span>
      </li>

      <li class="clearfix">
        <img src="https://penang.tours//uploads/hotelmaster/thumb_691654208_images-19.jpg" style="height:80px;width:80px;" alt="item1" />
        <span class="item-name">DE' GARDEN HOTEL</span>
        <span class="item-price">$1,249.99</span>
        <span class="item-quantity">Quantity: 01</span>
      </li>

      <li class="clearfix">
        <img src="https://penang.tours//uploads/hotelmaster/thumb_1006510119_images-46.jpg" style="height:80px;width:80px;" alt="item1" />
        <span class="item-name">DOUBLETREE RESORT BY HILTON PENANG</span>
        <span class="item-price">$129.99</span>
        <span class="item-quantity">Quantity: 01</span>
      </li>
    </ul>

    <a href="#" class="btn btn-primary btn-block">Checkout</a>
  </div> <!--end shopping-cart -->
                  </li>
                <!-- <li class="nav-item"><a href="#" id="cart-drop" data-toggle="modal" data-target="#cart"class="nav-link"><i class="fa fa-shopping-bag"></i> Cart <span class="badge-info badge">0</span> </a></li> -->
                <li class="nav-item dropdown"><a href="<?php echo base_url();?>home/home/myaccount"   class="nav-link">
                  <?php
                  $userDetails = getMemberUserInfo($login);
                  echo "Hi".' , '.$userDetails['fname'];
                  ?>
                </a>
                <div class="dropdown-menu">
                  <a href="<?php echo base_url();?>user/myaccount" class="dropdown-item"> My Account</a>
                  <a href="<?php echo base_url();?>user/logout" class="dropdown-item"> Logout</a>
                </div>
              </li>
              <?php  }else{ ?>
              <li class="nav-item"><a href="#" data-toggle="modal" data-target="#login" class="nav-link"> Login</a></li>
              <li class="nav-item"><a href="<?php echo base_url();?>user/register" data-toggle="modal" data-target="#registers" class="nav-link">Register</a></li>
              <?php  } ?>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  
    <!-- Modal Login -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" >
      <div class="modal-dialog modal-sm1" role="document">
        <div class="modal-content">
          <div class="modal-header" >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form  class="form-login" id="login_form" method="post">
              <div class="text-center">
                <h2 class="headings">Login</h2>
              </div>
              <div class="form-horizontal">
                <div class="form-group">
                  <div class="col-md-12">
                    <input type="email" name="email" class="required form-control" id="email" placeholder="Email id" autofocus>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-12">
                    <input type="password" name="pswd" class="required form-control" id="password" placeholder="Password" autofocus>
                  </div>
				  <span id="envlogin" class="text-danger error" style="display:none;">Invalid email or password..</span>
                </div>
                <div class="form-group text-center">
                  <div id="loading">
                    <div class="col-md-12" >
                      <p> <button type="button" id="save" class="btn btn-primary btn-block btn-register-login" name="save">Login</button></p>
                      <p>Forgot <a href="#" class="forgot">Password</a>?
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </form>
          <form  class="form-login" id="forgot_form" method="post" style="display: none;" >
            <div class="text-center">
              <h2 class="headings">Forgot Password</h2>
            </div>
            <div class="form-horizontal">
              <div class="form-group">
                <div class="col-md-12">
                  <input type="email" name="regemail" class="required form-control" id="regemail" placeholder="Enter your registered Email id" autofocus>
                </div>
				<span id="envforgot" class="text-danger error" style="display:none;">Email Id not registered with us..</span>
              </div>
              <div class="form-group text-center">
                <div class="col-md-12">
                  <p> <button type="button" id="frgtpswd" class="btn btn-primary btn-block btn-register-login" name="frgtpswd">Submit</button></p>
                </p>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Login end -->
<!-- Modal Register -->
<div class="modal fade" id="registers" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm1" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  class="form-register" id="register_form">
          <div class="text-center">
            <h2 class="headings">Register</h2>
          </div>
          <div class="form-horizontal mr-3 ml-3">
            <div class="form-group">
              <input type="text" class="required form-control" id="fname" name="fname"   placeholder="Full Name" autofocus>
            </div>
            <div class="form-group">
              <input type="email" name="email"   class="required form-control" id="email1" placeholder="Email id"   autofocus>
              <span id="email_result"></span>
            </div>
            <div class="form-group">
              <input type="tel" name="mobile"  class="required form-control" id="phone" placeholder="Mobile No." autofocus>
            </div>
            <div class="form-group">
              <input type="password" name="pswd" id="password1"   class="required form-control" id="pswd" placeholder="Password" autofocus>
            </div>
            <div class="form-group">
              <input type="password" name="cpswd" id="password2" class="required form-control" id="cpswd" placeholder="Confirm password" autofocus>
            </div>
            <div class="form-group text-center">
              <button type="button" id="register" class="btn btn-primary btn-block btn-register-login" name="register" value="">Register Now</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Register end -->
<!-- Modal//cartModal -->
<div class="modal fade" id="cart" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Your Cart Details for Order ID : #PGT09</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table table-sm table-bordered">
            <tbody>
              <tr>
                <th>&nbsp;</th>
                <th>Destination</th>
                <th>Date/Time</th>
                <th><strong>Description</strong></th>
                <th><strong>No Of Pax / Vehicle</strong></th>
                <th align="right">Per Pax / Vehicle</th>
                <th align="right"><strong class="pull-right">Subtotal</strong></th>
              </tr>
              <tr>
                <td>
                  <a class="btn p-1 btn-outline-info btn-sm" onclick="if(confirm('Are You Sure U want to Delete This Permanently...')){javascript:window.location='delete.php?id=64';}"><span aria-hidden="true">×</span></a></td>
                  <td class=""></td>
                  <td class="">2017/09/30 (06:30)</td>
                  <td class="">
                    <ul class="mb-0">
                      <li class="product-text">  <br>
                      </li>
                    </ul>
                  </td>
                  <td align="center"><!--<input type="number" class="form-control" name="number" id="number">-->
                1 CAR         </td>
                <td>SGD <!--<input type="number" class="form-control" name="number2" id="number2">-->
              42 (Per Vehicle)          </td>
              <td align="right"><strong>SGD
              42          </strong></td>
            </tr>
            <tr>
              <th colspan="6" align="right">Total</th>
              <th align="right"><strong> SGD 42</strong></th>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="text-right">
        <button class="btn btn-primary" onclick="window.location='checkout.php'">Proceed to Payment</button>
        <button class="btn btn-warning" data-dismiss="modal">Continue Shopping</button>
      </div>
    </div>
  </div>
</div>
</div>
<!-- End Cart Modal -->