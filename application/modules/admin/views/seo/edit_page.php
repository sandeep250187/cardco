<?php $this->load->view('admin/header');
      $this->load->view('admin/right-sidebar');
?>  
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Edit SEO Page <button class="btn btn-theme custom_blue_btn" type="button" onclick="window.history.go(-1);" style="float:right;">Go Back</button></h3>
          
			
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12"> 
                  <div class="form-panel">
                  	  
			  <?php $attributes = array('class' => 'form-horizontal style-form input_from_custom', 'id' => 'seo-form', 'name' => 'seo-form'); ?>
              <?php echo form_open(current_url(), $attributes ); ?>
		      <?php if(validation_errors()!=''){ ?> 
		<div class="alert alert-danger">
			<?php if( isset($error)) print($error); ?>
                       <?php echo validation_errors(); ?>
        
                  </div>
		<?php } ?>
                     <h4 class="mb"><i class="fa fa-angle-right"></i> General Information</h4>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Main Url<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input type="text" class="required form-control" value="<?php echo $pages[0]['main_url']; ?>"  name="main_url" >
                              </div>
                          </div>
			  
			 
				 <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Sub Url</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" value="<?php echo $pages[0]['sub_url']; ?>"  name="sub_url" >
								  <span class="user-message">Enter * for use Main Url for pages.</span>
                              </div>
                 </div>
			  
			   <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Meta Title</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control required" value="<?php echo $pages[0]['meta_title']; ?>"  name="meta_title" >
                              </div>
                          </div>
			  
			  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Description</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" value="<?php echo $pages[0]['meta_description']; ?>"  name="meta_description" >
                              </div>
                          </div>
			 <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Meta keyword</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" value="<?php echo $pages[0]['meta_keyword']; ?>"  name="meta_keyword" >
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
      $this->load->view('admin/footer');
     ?>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/common/jquery.validate.js"></script>
<script>
$().ready(function() {
	// validate signup form on keyup and submit
	$("#seo-form").validate({
	});
});
</script>



