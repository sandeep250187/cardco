<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keyword" content="Whole You">

    <title>Penang Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />   
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/lineicons/style.css">    
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/frontend/images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="<?php echo base_url(); ?>assets/frontend/images/favicon.ico" type="image/x-icon">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style-responsive.css" rel="stylesheet">
    
    <link href="<?php echo base_url(); ?>assets/css/jquery-ui_datepicker.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/new_skin.css" rel="stylesheet">
	<script src="<?php echo base_url(); ?>assets/js/common/jquery-2.2.0.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/gritter/css/jquery.gritter.css" />
	<script src="<?php echo base_url(); ?>assets/js/chart-master/Chart.js"></script>
	  
  </head>

  <body>
<script>
 var base_url = '<?php echo base_url(); ?>';
</script>
  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
				  <div class="tooltip fade right" role="tooltip" id="tooltip493921" style=""><div class="tooltip-arrow"></div><div class="tooltip-inner">Toggle Navigation</div></div>
              </div>
			  
            <!--logo start-->
            <a href="<?php echo ADMIN_URL; ?>" class="logo"><img src="<?php echo base_url(); ?>assets/frontend/images/logo.png" width="70%" alt="Whole you"><!--<b>Video App</b>--></a>
            <!--logo end-->
          
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="<?php echo ADMIN_URL; ?>user/change_password">Change Password</a></li>
                    <li><a class="logout" href="<?php echo ADMIN_URL; ?>user/logout">Logout</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->
      
                                               <!--ajax model div-->
						<div class="modal fade" id="ajazResponseModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="myModalLabel">&nbsp;</h4>
						      </div>
							<div class="modal-body" id="ajaxResponseDiv">
						        
						        </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						        
						      </div>
						    </div>
						  </div>
						</div>  
                                             <!--end ajax model div-->