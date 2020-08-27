<?php 
$this->load->view('supplier/header');
$this->load->view('supplier/right-sidebar');
?>  
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>Dentist Leads Details</h3>
          	<div class="btn_right_header">
	 <a class="btn btn-default" onclick="history.go(-1);">Go Back</a>
	</div>
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12"> 
                  <div class="form-panel">
                  	  
			  <?php
			  //pr($ques_ans);
			  $attributes = array('class' => 'form-horizontal style-form input_from_custom', 'id' => 'faq-form', 'name' => 'faq-form' ,'enctype'=>'multipart/form-data' );
			  ?>
                  <?php echo form_open(current_url(), $attributes ); ?>
		    
                     <h4 class="mb"><i class="fa fa-angle-right"></i> Basic Details</h4>
					 
						<div class="form-group">
						  <label class="col-sm-2 col-sm-2 control-label">Full Name :</label>
						  <div class="col-sm-10">
						   <?php echo $lead[0]['full_name']; ?>
						  </div>
						</div>
						<div class="form-group">
						  <label class="col-sm-2 col-sm-2 control-label">Email : </label>
						  <div class="col-sm-10">
						   <?php echo $lead[0]['email']; ?>
						  </div>
						</div>


						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Date : </label>
							<div class="col-sm-10">
							<?php echo globalDateformat($lead[0]['created_on']); ?>       
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Resources : </label>
							<div class="col-sm-10">
							<?php echo lead_type($lead[0]['lead_type']); ?>       
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">IP Address : </label>
							<div class="col-sm-10">
							<?php echo $lead[0]['ip_address']; ?>       
							</div>
						</div>
						<h4 class="mb"><i class="fa fa-angle-right"></i> Survey Question & Answer</h4>
						<?php
						//pr($ques_ans);
						if($ques_ans){
							foreach($ques_ans as $row){
							 if($row['answer']){	?>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label"><?php echo $row['label']; ?>  </label>
							<div class="col-sm-10">
							<?php echo $row['answer']; ?>    <p style="font-size: 10px;">(Duration: <?php echo $row['duration']; ?>)</p>     
							</div>
						</div>
							
							 <?php }
							}
						}
						?>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Score : </label>
							<div class="col-sm-10">
							<span class="badge bg-info"><?php echo $lead[0]['score']; ?></span>       
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