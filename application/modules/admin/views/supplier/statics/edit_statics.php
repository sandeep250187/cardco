<?php $this->load->view('supplier/header');
      $this->load->view('supplier/right-sidebar');
?>  
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Edit Static Content <button class="btn btn-theme custom_blue_btn" type="button" onclick="window.history.go(-1);" style="float:right;">Go Back</button></h3>
          
			<?php //pr($statics); ?>
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12"> 
                  <div class="form-panel">
                  	  
			  <?php $attributes = array('class' => 'form-horizontal style-form input_from_custom', 'id' => 'static-form', 'name' => 'static-form','enctype'=>'multipart/form-data'); ?>
                          <?php echo form_open(current_url(), $attributes ); ?>
		      <?php if(validation_errors()!=''){ ?> 
		<div class="alert alert-danger">
			<?php if( isset($error)) print($error); ?>
                       <?php echo validation_errors(); ?>
        
                  </div>
		<?php } ?>
                     <h4 class="mb"><i class="fa fa-angle-right"></i> General Information</h4>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Content Label<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input type="text" class="required form-control" value="<?php echo $statics[0]['static_label']; ?>"  name="static_label" >
                              </div>
                          </div>
			<?php if($statics[0]['static_type']=='1'){
			//1=Text; 2=Text Area; 3=Editor; 4= Image/File
			?>
			  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Content<span class="red_asterisk">*</span></label></label>
                              <div class="col-sm-10">
							  <input type="text" class="required form-control" value="<?php echo $statics[0]['static_value']; ?>"  name="static_value" >
							
                           </div>
                </div>
			<?php }else if($statics[0]['static_type']=='2'){?>
				<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Content<span class="red_asterisk">*</span></label></label>
                              <div class="col-sm-10">
							 <textarea class="required form-control" name="static_value"><?php echo $statics[0]['static_value']; ?></textarea>
                           </div>
                </div>
			<?php }
else if($statics[0]['static_type']=='4'){
	?>
	<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Content<span class="red_asterisk">*</span></label></label>
                              <div class="col-sm-10">
							  <input type="text" class="required form-control" value="<?php echo $statics[0]['static_value']; ?>"  name="static_value" >
							
                           </div>
                </div>
	<?php
}
			else{?>
			<div class="form-group">
                              <label class="col-sm-2 col-sm-2 required control-label">Content<span class="red_asterisk">*</span></label></label>
                              <div class="col-sm-10">
							  <?php
							echo $this->ckeditor->editor("static_value",$statics[0]['static_value']);
							?>
                           </div>
                </div>
			<?php } ?>
			
			  <!-- <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Key</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" value="<?php echo $statics[0]['static_key']; ?>"  name="static_key" >
                              </div>
                          </div>
			  
			  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Order</label>
                              <div class="col-sm-10">
                                  <input type="text" class="required form-control" value="<?php echo $statics[0]['static_order']; ?>"  name="static_order" >
                              </div>
                          </div>
						  <div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label" >Type :</label>
							<div class="col-sm-10">
								<label class="checkbox-inline">
								  <input class="required" type="radio" name="static_type" value="1" <?php if ($statics[0]['static_type']==1) { echo 'checked="checked"'; } ?>>Text
								</label>
								<label class="checkbox-inline">
								  <input class="required" type="radio" name="static_type" value="2" <?php if ($statics[0]['static_type']==2) { echo 'checked="checked"'; } ?>>Text Area
								</label>
								<label class="checkbox-inline">
								  <input class="required" type="radio" name="static_type" value="3" <?php if ($statics[0]['static_type']==3) { echo 'checked="checked"'; } ?>>Editor
								</label>
								
							</div>
						  </div>-->
			
			  
			 
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
	$("#static-form").validate({
	});
});
</script>



