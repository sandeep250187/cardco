<?php 
$this->load->view('admin/header');
$this->load->view('admin/right-sidebar');
?>  
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>Apartment Details</h3>
	<button class="btn btn-theme custom_blue_btn" type="button" onclick="window.history.go(-1);" style="float:right;">Go Back</button>

          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12"> 
                  <div class="form-panel">
                  	  
			  <?php
			  //pr($ques_ans);
			  $attributes = array('class' => 'form-horizontal style-form input_from_custom', 'id' => 'faq-form', 'name' => 'faq-form' ,'enctype'=>'multipart/form-data' );
			  ?>
                  <?php echo form_open(current_url(), $attributes ); ?>
		    
                     <h4 class="mb"><i class="fa fa-angle-right"></i> Apartment Details</h4>
					 
						<div class="form-group">
						  <label class="col-sm-2 col-sm-2 control-label">Apartment Name :</label>
						  <div class="col-sm-10">
						   <?php echo $pages[0]['aptname']; ?>
						  </div>
						</div>
                        
                        	<div class="form-group">
						  <label class="col-sm-2 col-sm-2 control-label">Apartment Pic :</label>
						  <div class="col-sm-10">
						  <?php 
																				
						if(!empty($pages[0]['apt_pic'])) {
						?> <a href="<?php echo base_url() ."uploads/apartmentmaster/".$pages[0]['apt_pic']."";  ?> " target="_blank">
						<?php echo "<img src='".base_url()."/uploads/apartmentmaster/".$pages[0]['apt_pic']."' width='100px;' height='71px;'>";
						?></a>
						<?php } ?>
                          
						  </div>
						</div>
                         
					<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Apartment image gallery : </label>
							<div class="col-sm-10">
							<?php 
																				
						if(!empty($pages[0]['image'])) {
						?> <a href="<?php echo base_url() ."uploads/apartmentpicgallery/".$pages[0]['image']."";  ?> " target="_blank">
						<?php echo "<img src='".base_url()."/uploads/apartmentpicgallery/".$pages[0]['image']."' width='100px;' height='71px;'>";
						?></a>
						<?php } ?>  
                              
							</div>
						</div>
                        
                        <div class="form-group">
						  <label class="col-sm-2 col-sm-2 control-label">Country : </label>
						  <div class="col-sm-10">
						   <?php if($pages[0]['locationid']==1){ echo "Malaysia"; } ?>
						  </div>
						</div>


                        <div class="form-group">
						  <label class="col-sm-2 col-sm-2 control-label">State in Which Exists :</label>
						  <div class="col-sm-10">
						  <?php  if($pages[0]['state']==6){ echo "Penang"; } ?>
                          
						  </div>
						</div>
						
						 <div class="form-group">
						  <label class="col-sm-2 col-sm-2 control-label">Location :</label>
						  <div class="col-sm-10">
						  <?php echo $pages[0]['location']; ?>
                          
						  </div>
						</div>
						
						 <div class="form-group">
						  <label class="col-sm-2 col-sm-2 control-label">Address :</label>
						  <div class="col-sm-10">
						  <?php echo $pages[0]['address']; ?>
                          
						  </div>
						</div>
						
						<div class="form-group">
						  <label class="col-sm-2 col-sm-2 control-label">Star Caregory :</label>
						  <div class="col-sm-10">
						  <?php echo $pages[0]['starcat']; ?>
                          
						  </div>
						</div>
						
						<div class="form-group">
						  <label class="col-sm-2 col-sm-2 control-label">Landline :</label>
						  <div class="col-sm-10">
						  <?php echo $pages[0]['landline']; ?>
                          
						  </div>
						</div>
						
						<div class="form-group">
						  <label class="col-sm-2 col-sm-2 control-label">Contact Person :</label>
						  <div class="col-sm-10">
						  <?php echo $pages[0]['contact_person']; ?>
                          
						  </div>
						</div>
						
						<div class="form-group">
						  <label class="col-sm-2 col-sm-2 control-label">Cancel Policy  :</label>
						  <div class="col-sm-10">
						  <?php echo $pages[0]['cancel_policy']; ?>
                          
						  </div>
						</div>
						
						
						<div class="form-group">
						  <label class="col-sm-2 col-sm-2 control-label">Remarks  :</label>
						  <div class="col-sm-10">
						  <?php echo $pages[0]['remarks']; ?>
                          
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
$this->load->view(ADMIN_FOLDER.'/footer');
?>
 </body>
</html>