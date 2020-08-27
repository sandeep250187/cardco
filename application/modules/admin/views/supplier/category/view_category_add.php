<?php $this->load->view('supplier/header');
$this->load->view('supplier/right-sidebar');
?>
<link href="<?php echo base_url(); ?>assets/css/table-responsive.css" rel="stylesheet">
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Category Management </h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	  
			  <?php $attributes = array('class' => 'form-horizontal style-form input_from_custom', 'id' => 'user-form', 'name' => 'user-form','enctype' => 'multipart/form-data'); ?>
                          <?php echo form_open(current_url(), $attributes ); ?>
		      <?php if(validation_errors()!=''){ ?> 
		<div class="alert alert-danger">
			<?php if( isset($error)) print($error); ?>
                       <?php echo validation_errors(); ?>
        
                  </div>
		<?php }
         if($this->session->flashdata('invalid')!=''){
			 echo "<div class='alert alert-danger'>";
			 echo $this->session->flashdata('invalid'); 
			 echo "</div>";
		 }
		?>
                     <h4 class="mb"><i class="fa fa-angle-right"></i> Category Information</h4>
					 
					 
					     <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Category Name<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input type="text" class="required form-control" value="<?php echo  $this->input->post('cat_name'); ?>"  name="cat_name" id="cat_name" style="width:300px;" >
                              </div>
                          </div>
						  
					<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Category Description <span class="red_asterisk">*</span></label>
                        </label>
                        <div class="col-sm-10">
                            <?php
							echo $this->ckeditor->editor("cat_desc");
							?>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Category Sub Description <span class="red_asterisk">*</span></label>
                        </label>
                        <div class="col-sm-10">
                            <?php
							echo $this->ckeditor->editor("cat_sub_desc");
							?>
                        </div>
                    </div>
						  
					<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Category Image</label>
                        <div class="col-md-10">
                            <input type="file" name="file_name" accept="image/*" class="form-control"> </div>
                    </div>
						
					<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Priority</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" value="<?php echo  $this->input->post('priority'); ?>" name="priority"> </div>
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
	 
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/common/jquery.validate.js"></script>
<script>
$().ready(function() {
	// validate signup form on keyup and submit
	$("#user-form").validate({
	});
});
</script>
