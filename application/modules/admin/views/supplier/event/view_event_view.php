<?php 
$this->load->view('supplier/header');
$this->load->view('supplier/right-sidebar');
?>  
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>Event Details</h3>
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
		    
                     <h4 class="mb"><i class="fa fa-angle-right"></i> Event Details</h4>
					 
						<div class="form-group">
						  <label class="col-sm-2 col-sm-2 control-label">Event Name :</label>
						  <div class="col-sm-10">
						   <?php echo $pages[0]['name']; ?>
						  </div>
						</div>
                        
                        	<div class="form-group">
						  <label class="col-sm-2 col-sm-2 control-label">Event Logo :</label>
						  <div class="col-sm-10">
						  <?php 
																				
						if(!empty($pages[0]['logo'])) {
						?> <a href="<?php echo base_url() ."uploads/event/".$pages[0]['logo']."";  ?> " target="_blank">
						<?php echo "<img src='".base_url()."/uploads/event/".$pages[0]['logo']."' width='100px;' height='71px;'>";
						?></a>
						<?php } ?>
                          
						  </div>
						</div>
                         
					<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Event Date : </label>
							<div class="col-sm-10">
							 <?php echo $pages[0]['from']; ?>    
                              
							</div>
						</div>
                        
                        <div class="form-group">
						  <label class="col-sm-2 col-sm-2 control-label">Event Description : </label>
						  <div class="col-sm-10">
						   <?php echo $pages[0]['content']; ?>
						  </div>
						</div>


                        <div class="form-group">
						  <label class="col-sm-2 col-sm-2 control-label">Background Image :</label>
						  <div class="col-sm-10">
						  <?php 
																				
						if(!empty($pages[0]['bg_color'])) {
						?> <a href="<?php echo base_url() ."uploads/event/".$pages[0]['bg_color']."";  ?> " target="_blank">
						<?php echo "<img src='".base_url()."/uploads/event/".$pages[0]['bg_color']."' width='100px;' height='71px;'>";
						?></a>
						<?php } ?>
                          
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
$this->load->view(SUPPLIER_FOLDER.'/footer');
?>
 </body>
</html>