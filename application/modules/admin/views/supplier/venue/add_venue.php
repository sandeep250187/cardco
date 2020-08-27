<?php $this->load->view(SUPPLIER_FOLDER.'/header');
      $this->load->view(SUPPLIER_FOLDER.'/right-sidebar');
?>  
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Add Venue</h3>

          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">  
			  <?php $attributes = array('class' => 'form-horizontal style-form input_from_custom', 'id' => 'user-form', 'name' => 'user-form'); ?>
                          <?php echo form_open(current_url(), $attributes ); ?>
		      <?php if(validation_errors()!=''){ ?> 
		  <div class="alert alert-danger">
			<?php if( isset($error)) print($error); ?>
                       <?php echo validation_errors(); ?>
                  </div>
		<?php } ?>
                     <h4 class="mb"><i class="fa fa-angle-right"></i> General Information</h4>
                          <div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Choose Events<span class="red_asterisk">*</span></label>
									<div class="col-sm-10">
										<?php 
											$events = getEvents();
											$i = 0;
 											foreach ($events as $value) {
										?> 
										<label class="checkbox-inline"><input type="checkbox" value="<?php echo $value['id']; ?>" name="events[]"><?php echo $value['name']; ?></label>
 										<?php
 											$i++;
 											}
										?>
 									</div>
							</div>
			  				<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Venue Name<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" value="<?php echo  $this->input->post('user_lname'); ?>"  name="venueName" >
                              </div>
                          </div>			  
			 			 <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Venue Type<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input class="required form-control" name="venueType" autocomplete="false" type="text" maxlength="80" size="30" value="<?php echo $this->input->post('user_email'); ?>" >
                              </div>
                          </div>			  
			  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Accommodation Capacity </label>
                              <div class="col-sm-10">
                                  <input type="text" class="required form-control"  autocomplete="false"  value="<?php echo  $this->input->post('username'); ?>"  name="accCapacity" >
                              </div>
                          </div>			  
			  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Room Setups<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input type="text" id="pswd_one_change"  class="required form-control"   name="roomSetup" >
                              </div>
                          </div>
                     
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Room Capacity (Pax) </label>
                              <div class="col-sm-10">
                                  <input type="text" class="required form-control"   name="roomCapacity">
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
      $this->load->view(SUPPLIER_FOLDER.'/footer');
     ?>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/common/jquery.validate.js"></script>
 
  </body>
</html>