<?php $this->load->view(ADMIN_FOLDER.'/header');
      $this->load->view(ADMIN_FOLDER.'/right-sidebar');
?>  
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Add Roe</h3>

          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">  
			  <?php $attributes = array('class' => 'form-horizontal style-form input_from_custom', 'id' => 'user-form', 'name' => 'user-form');?>
                          <?php echo form_open(current_url(), $attributes ); ?>
		      <?php if(validation_errors()!=''){ ?> 
		  <div class="alert alert-danger">
			<?php if( isset($error)) print($error); ?>
                       <?php echo validation_errors(); ?>
                  </div>
		<?php } ?>
                     <h4 class="mb"><i class="fa fa-angle-right"></i> General Information</h4>
                           
			  				<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">MYR To USD<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" value="<?php echo  $this->input->post('usd'); ?>"  name="usd" >
                              </div>
                </div>
                <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">MYR To THB<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" value="<?php echo  $this->input->post('thb'); ?>"  name="thb" >
                              </div>
                </div>
                <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">MYR To AUD<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" value="<?php echo  $this->input->post('aud'); ?>"  name="aud" >
                              </div>
                </div>
                <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">MYR To CNY<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" value="<?php echo  $this->input->post('cny'); ?>"  name="cny" >
                              </div>
                </div>
                <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">MYR To INR<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" value="<?php echo  $this->input->post('inr'); ?>"  name="inr" >
                              </div>
                </div>
                <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">MYR To AED<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" value="<?php echo  $this->input->post('aed'); ?>"  name="aed" >
                              </div>
                </div>
                <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">ROE Date<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" id="roe_Date" value="<?php echo  $this->input->post('roe_date'); ?>"  name="roe_date" >
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
      $this->load->view(ADMIN_FOLDER.'/footer');
     ?>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/common/jquery.validate.js"></script>
<script>
    $().ready(function() {
        // validate signup form on keyup and submit
        $("#user-form").validate({});
    });

</script>
<script type="text/javascript">
  $( function() {
    $( "#roe_Date" ).datepicker({ minDate: 0,dateFormat: 'yy/mm/dd' });
  //  $( "#event_Date" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
} );
  </script>
 
  </body>
</html>