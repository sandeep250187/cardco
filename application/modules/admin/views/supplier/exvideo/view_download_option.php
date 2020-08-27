
     <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>Download Options</h3>
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12"> 
                <?php
				echo message_box($this->session->flashdata('msg'),'danger');				
				?>
                  <div class="form-panel">
                  	  
			  <?php $attributes = array('class' => 'form-horizontal style-form input_from_custom', 'id' => 'faq-form', 'name' => 'faq-form' ,'enctype'=>'multipart/form-data' ); ?>
                          <?php echo form_open(current_url(), $attributes ); ?>
		      <?php if(validation_errors()!=''){ ?> 
		<div class="alert alert-danger">
			<?php if( isset($error)) print($error); ?>
                       <?php echo validation_errors(); ?>
        
                  </div>
		<?php } ?>
                     
					 
					  <div class="form-group">
						  <div class="col-sm-10">
							  <input type="hidden" value="<?php echo  $this->input->post('channel_id'); ?>"  name="channel_id" >
							  <div></div>
						  </div>
					  </div>

			  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><strong><?php echo $text_message; echo $total_records; ?> </strong></label>
                              <div class="col-sm-10">
							  <button type="button" name="download_all" class="btn btn-theme custom_blue_btn download_all" style="margin-left:5px;"><i class="fa fa-download"></i>
							  Download all
							  </button>
							  <button type="submit" name="submit" class="btn btn-theme custom_blue_btn" style="margin-left:5px;"><i class="fa fa-download"></i>
							  Partial Download
							  </button>
                                  
                              </div>
                          </div>
			  
                          
                      </form>
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
          
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

<!--main content end-->
<div id="upload-loader" style="display:none;">	
<div class="cssload-loader">downloading...</div>
<div class="overlay-uploading"></div>
</div>
     <?php 
      $this->load->view('supplier/footer');
     ?>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/common/jquery.validate.js"></script>
<script type="text/javascript">
$(".download_all").click(function(){
	 
      $('#upload-loader').show();
	  var fdata = $('form').serialize();
		  $.ajax({
				url:'<?php echo base_url();?>ajax/downloadall',
				type:'POST',
				data:fdata,
				success:function(html){
				 $('#upload-loader').hide();
                  window.location.href = '<?php echo base_url();?>supplier/exvideo';				 
				}
		  });
	 
	});
</script>



