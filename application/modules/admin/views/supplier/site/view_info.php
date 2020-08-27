<?php $this->load->view('supplier/header');
      $this->load->view('supplier/right-sidebar');
?>  
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> School/College Info</h3>
          	 <?php 
		 		$sucmsg = $this->uri->segment(3);
			   if( isset($sucmsg) and $sucmsg == 1){?>
              <div class="errormsg" style="color:green;text-align: center;">School/College Info changed Sucessfully!.</div>
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
                <h4 class="mb"><i class="fa fa-angle-right"></i> School Information</h4>

				<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><label>School Class</label><span class="red_asterisk">*</span></label></label>
                              <div class="col-sm-10">
							  <textarea style="width: 300px; height:150px" class="required form-control" placeholder="Enter School Class" id="class" name="class"><?php echo $setting->class; ?></textarea>     </div>
                </div>
				
				<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><label>School Stream</label><span class="red_asterisk">*</span></label></label>
                              <div class="col-sm-10">
							  <textarea style="width: 300px; height:150px" class="required form-control" placeholder="Enter School Stream" id="stream" name="stream"><?php echo $setting->stream; ?></textarea>     </div>
                </div>
				
				<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><label>School Board</label><span class="red_asterisk">*</span></label></label>
                              <div class="col-sm-10">
							  <textarea style="width: 300px; height:150px" class="required form-control" placeholder="Enter School Stream" id="board" name="board"><?php echo $setting->board; ?></textarea>     </div>
                </div>
					
				<!--<h4 class="mb"><i class="fa fa-angle-right"></i> University Information</h4>

				<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><label>College Course</label><span class="red_asterisk">*</span></label></label>
                              <div class="col-sm-10">
							  <textarea style="width: 300px; height:150px" class="required form-control" placeholder="Enter College Course" id="course" name="course"><?php echo $setting->course; ?></textarea>     </div>
                </div>
				
				<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><label>College Branch</label><span class="red_asterisk">*</span></label></label>
                              <div class="col-sm-10">
							  <textarea style="width: 300px; height:150px" class="required form-control" placeholder="Enter College Stream" id="branch" name="branch"><?php echo $setting->branch; ?></textarea>     </div>
                </div>
				
				<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><label>University</label><span class="red_asterisk">*</span></label></label>
                              <div class="col-sm-10">
							  <textarea style="width: 300px; height:150px" class="required form-control" placeholder="Enter College Stream" id="university" name="university"><?php echo $setting->university; ?></textarea>     </div>
                </div>-->
				
				<!--<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><label>College Year</label><span class="red_asterisk">*</span></label></label>
                              <div class="col-sm-10">
							  <textarea style="width: 300px; height:150px" class="required form-control" placeholder="Enter College Year" id="year" name="year"><?php echo $setting->year; ?></textarea>     </div>
                </div>-->
				<h4 class="mb"><i class="fa fa-angle-right"></i> Dream Information</h4>

				<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><label>Dream Option</label><span class="red_asterisk">*</span></label></label>
                              <div class="col-sm-10">
							  <textarea style="width: 300px; height:150px" class="required form-control" placeholder="Enter Dream Option" id="dream" name="dream"><?php echo $setting->dream; ?></textarea>     </div>
                </div>
				<h4 class="mb"><i class="fa fa-angle-right"></i> Problem Information</h4>

				<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><label>Problem Option</label><span class="red_asterisk">*</span></label></label>
                              <div class="col-sm-10">
							  <textarea style="width: 300px; height:150px" class="required form-control" placeholder="Enter Problem Option" id="problem" name="problem"><?php echo $setting->problem; ?></textarea>     </div>
                </div>
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
          
		</section><!--/wrapper -->
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



