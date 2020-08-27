<?php $this->load->view('admin/header');
      $this->load->view('admin/right-sidebar');
?>  
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Change Site Setting </h3>
          	 <?php 
		 		$sucmsg = $this->uri->segment(3);
			   if( isset($sucmsg) and $sucmsg == 1){?>
              <div class="errormsg" style="color:green;text-align: center;">Admin setting changed Sucessfully!.</div>
               <?php } ?>
					  
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12"> 
                  <div class="form-panel">
                  	  
					  
					  
			  <?php $attributes = array('class' => 'form-horizontal style-form input_from_custom', 'id' => 'faq-form', 'name' => 'faq-form' ,'enctype'=>'multipart/form-data' ); ?>
                          <?php echo form_open(current_url(), $attributes ); ?>
		      <?php if(validation_errors()!=''){ ?> 
		<div class="alert alert-danger">
			<?php if( isset($error)) print($error); ?>
                       <?php echo validation_errors(); ?>
        
                  </div>
		<?php } ?>
                     <h4 class="mb"><i class="fa fa-angle-right"></i> General Information</h4>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><label>Admin Email</label><span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input style="width: 210px;" type="text" placeholder="Enter Admin Email" class="required form-control" size="20" id="admin_email" required="required" name="admin_email" value="<?php echo $setting->admin_email; ?>">
                              </div>
                          </div>
			  
			  
			 <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><label>Invoice From</label><span class="red_asterisk">*</span></label></label>
                              <div class="col-sm-10">
							  <input style="width: 210px;" type="text" placeholder="Enter Invoice company" class="required form-control" size="20" id="invoice_from" required="required" name="invoice_from" value="<?php echo $setting->invoice_from; ?>">
							  <?php
							//echo $this->ckeditor->editor("content",$this->input->post('content'));
							?>
                                 
                              </div>
                </div>
				<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><label>Invoice Address</label><span class="red_asterisk">*</span></label></label>
                              <div class="col-sm-10">
							  <textarea style="width: 210px;" class="required form-control" placeholder="Enter Billing Address" id="address" name="address"><?php echo $setting->address; ?></textarea>     </div>
                </div>
				
				<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><label>Feedback Feild</label><span class="red_asterisk">*</span></label></label>
                              <div class="col-sm-10">
							  <textarea style="width: 210px;" class="required form-control" placeholder="Feedback Feild" id="address" name="feedback_field"><?php echo $setting->feedback_field; ?></textarea>     </div>
                </div>
				<!---<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"> <label>Default RMB:</label><span class="red_asterisk">*</span></label></label>
                              <div class="col-sm-10">
							 <input required="required" style="width: 210px;" type="text" placeholder="Enter Current RMB Amount" class="input-large" size="20" id="defaultRMB" name="defaultRMB" onkeypress="return isNumberKey(event);" value="<?php echo $setting->defaultRMB; ?>">
							 </div>
                </div>--->
					
				
			  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <button class="btn btn-theme custom_blue_btn" type="submit">Update</button>
                              </div>
                          </div>
			  
			  
                          
                      </form>
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
          
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->


<!--main content end-->
     <?php 
      $this->load->view('admin/footer');
     ?>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/common/jquery.validate.js"></script>
<script>
$().ready(function() {
	// validate signup form on keyup and submit
	$("#user-form").validate({
	});
});
</script>



