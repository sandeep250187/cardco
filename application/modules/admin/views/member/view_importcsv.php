<?php $this->load->view(ADMIN_FOLDER.'/header');
      $this->load->view(ADMIN_FOLDER.'/right-sidebar');
?>  
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Import Dentist</h3>

          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">  
			  <?php $attributes = array( 'class' => 'form-horizontal style-form input_from_custom', 'id' => 'user-form', 'name' => 'user-form' ,'enctype'=>'multipart/form-data'  ); ?>
                          <?php echo form_open(current_url(), $attributes ); ?>
		      <?php if(validation_errors()!=''){ ?> 
		  <div class="alert alert-danger">
			<?php if( isset($error)) print($error); ?>
                       <?php echo validation_errors(); ?>
                  </div>
		<?php } 
		
		 echo showmsg($this->session->flashdata('msg'));
		 ?>
		
                     <h4 class="mb"><i class="fa fa-angle-right"></i> Import file here.</h4>
					 <div align="right">
							  <a href="<?php echo base_url();?>uploads/format/sample-import.csv" class="btn btn-theme custom_blue_btn">Download sample file</a>
							  </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">File<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input type="file" name="userfile" accept=".csv">
                              </div>
							  
                          </div>
						  <div class="alert alert-info">Note: Accept only CSV files.</div>
     
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
<script type="text/javascript">
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