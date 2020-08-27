<?php $this->load->view(ADMIN_FOLDER.'/header');
      $this->load->view(ADMIN_FOLDER.'/right-sidebar');
?>  
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Add Apartment Category</h3>

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
                              <label class="col-sm-2 col-sm-2 control-label">Apartment Category Name<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" value="<?php echo  $this->input->post('apartmentCategory'); ?>"  name="apartmentCategory" >
                              </div>
                          </div>        
                <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Apartment Capacity<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
<?php
  $option = array('' => 'Select Capacity');
  $i = 1;
  $attr = array('class' => 'form-control' );
  while($i <= 25)
  {
    $option[$i] = $i;
    $i++;
  }
  echo form_dropdown('aptcap',$option,'', $attr);
?>
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
 
  </body>
</html>