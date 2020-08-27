<?php $this->load->view('supplier/header');
      $this->load->view('supplier/right-sidebar');
?>  
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Add Testimonial</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12"> 
                  <div class="form-panel">
                  	  
			  <?php $attributes = array('class' => 'form-horizontal style-form input_from_custom', 'id' => 'payment-form', 'name' => 'payment-form' ,'enctype'=>'multipart/form-data' ); ?>
                          <?php echo form_open(current_url(), $attributes ); ?>
		      <?php if(validation_errors()!=''){ ?> 
				<div class="alert alert-danger">
			<?php if( isset($error)) print($error); ?>
                       <?php echo validation_errors(); ?>
        
                </div>
		<?php } ?>
                     <h4 class="mb"><i class="fa fa-angle-right"></i> General Information</h4>
                    <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Testimonial Title<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input type="text" class="required form-control" value="<?php echo  $this->input->post('testimonial_title'); ?>"  name="testimonial_title" >
                              </div>
                     </div>
					  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Location<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input type="text" class="required form-control" value="<?php echo  $this->input->post('location'); ?>"  name="location" >
                              </div>
                     </div>
					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">Testimonial Banner</label>
					<div class="col-md-10"><input type="file" name="image_file" accept="image/*" class="form-control">
					</div> 					
					</div>
					<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Testimonial Content<span class="red_asterisk">*</span></label></label>
                              <div class="col-sm-10">
							  <?php
							echo $this->ckeditor->editor("content");
							?>
                                 
                        </div>
                 </div>
				 <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tablet Content</label></label>
                              <div class="col-sm-10">
							  <?php
							echo $this->ckeditor->editor("tablet_content");
							?>
                                 
                        </div>
                 </div>
				 <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Testimonial Slug<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input type="text" class="required form-control" value="<?php echo  $this->input->post('testimonial_slug'); ?>"  name="testimonial_slug" >
								  <span class="user-message">Do not use space or special character,add hyphen between two word</span>
                              </div>
                          </div>
			  
			   <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Meta Title</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" value="<?php echo  $this->input->post('meta_title'); ?>"  name="meta_title" >
                              </div>
                          </div>
			  
			  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Description</label>
                              <div class="col-sm-10">
                                  <input type="text" class="required form-control" value="<?php echo  $this->input->post('meta_description'); ?>"  name="meta_description" >
                              </div>
                          </div>
			 <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Meta keyword</label>
                              <div class="col-sm-10">
                                  <input type="text" class="required form-control" value="<?php echo  $this->input->post('meta_keyword'); ?>"  name="meta_keyword" >
								   <span class="user-message">Seprated by comma(,)</span>
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
          
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->


<!--main content end-->
     <?php 
      $this->load->view('supplier/footer');
     ?>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/common/jquery.validate.js"></script>
<script>
$().ready(function() {
	// validate signup form on keyup and submit
	$("#user-form").validate({
	});
});
</script>



