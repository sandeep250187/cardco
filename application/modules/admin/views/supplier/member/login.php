<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="">
    <title>Video app</title>
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" /> 
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
  </head>
  <body> 
	  <div id="login-page">
	  	<div class="container">
	  	<?php echo form_open(SUPPLIER_FOLDER.'/user/login_check',array('class' => 'form-login','id'=>'login-form')); ?>
		        <h2 class="form-login-heading">supplier Panel</h2>
				<div align="center" class="">
				<?php
					echo showerrormsg($this->session->flashdata('error_msg'));
					echo showmsg($this->session->flashdata('msg'));
				?>
				</div>
		        <div class="login-wrap">
			    <input type="text" name="username" required="" class="form-control" placeholder="Username" autofocus>
		            <br>
			    
			    <input type="password" name="password" required="" class="form-control" placeholder="Password">
		            <label class="checkbox">
                                 <span class="pull-right">
		                    <a href="login.html#myModal" data-toggle="modal"> F Password?</a>
		                </span>
		            </label>
		            <button class="btn btn-theme btn-block" href="index.php" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
                            
		            <hr>

		        </div>
 </form>	 
		          <!-- Modal -->
                          <?php echo form_open(SUPPLIER_FOLDER.'/user/forgot_password',array('class' => '','id'=>'forgot-popup')); ?>
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Fo Password ?</h4>
		                      </div>
		                      <div class="modal-body">
		                          <p>Enter your e-mail address below to reset your password.</p>
                                          <input type="email" required="" name="forgot_email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
		                      </div>
		                      <div class="modal-footer">
		                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
		                          <button class="btn btn-theme" type="submit">Submit</button>
		                      </div>
		                  </div>
		              </div>
		          </div>
                           </form>
		          <!-- modal -->

		      	
	  	</div>
	  </div>
    <script src="<?php echo base_url(); ?>assets/js/common/jquery-2.2.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("<?php echo base_url(); ?>assets/img/login-bg.jpg", {speed: 500});
    </script>
  </body>
</html>

