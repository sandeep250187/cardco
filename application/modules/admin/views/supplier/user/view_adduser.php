<?php $this->load->view(SUPPLIER_FOLDER.'/header');
      $this->load->view(SUPPLIER_FOLDER.'/right-sidebar');
?>  
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Add User</h3>

          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">  
			  <?php $attributes = array('class' => 'form-horizontal style-form input_from_custom', 'id' => 'user-form', 'name' => 'user-form'); ?>
                          <?php echo form_open(current_url(), $attributes ); ?>
		      <?php if(validation_errors()!=''){ ?> 
		  <div class="alert alert-danger">
			<?php if( isset($error)) print($error); ?>
                       <?php echo validation_errors(); ?>
                  </div>
		<?php } ?>
                     <h4 class="mb"><i class="fa fa-angle-right"></i> General Information</h4>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">First Name<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input type="text" class="required form-control" value="<?php echo  $this->input->post('user_fname'); ?>"  name="user_fname" >
                              </div>
                          </div>
			  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Last Name</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" value="<?php echo  $this->input->post('user_lname'); ?>"  name="user_lname" >
                              </div>
                          </div>			  
			  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Email Address<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input class="required form-control" name="user_email" autocomplete="false" type="email" maxlength="80" size="30" value="<?php echo $this->input->post('user_email'); ?>" >
                              </div>
                          </div>			  
			  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">User Name<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input type="text" class="required form-control" minlength="5" autocomplete="false"  value="<?php echo  $this->input->post('username'); ?>"  name="username" >
                              </div>
                          </div>			  
			  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Password<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input type="password" id="pswd_one_change" minlength="6"  class="required form-control"   name="user_password" >
                              </div>
                          </div>
                     
                     <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Retype Password<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input type="password" class="required form-control" minlength="6" name="pswd_second">
                              </div>
                          </div>
		        <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Phone</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" value="<?php echo  $this->input->post('user_phone'); ?>"  name="user_phone" >
                              </div>
                          </div>		     
			  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <button class="btn btn-theme custom_blue_btn" type="submit">Save</button>
                              </div>
                          </div>		                           
                      </form>
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
		</section>
      </section><!-- /MAIN CONTENT -->
<!--main content end-->
     <?php 
      $this->load->view(SUPPLIER_FOLDER.'/footer');
     ?>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/common/jquery.validate.js"></script>
<script>
$().ready(function() {
	$("#user-form").validate({
            rules: {
            pswd_second: {
            equalTo: "#pswd_one_change"
            }
            }
	});
});
</script>
  </body>
</html>