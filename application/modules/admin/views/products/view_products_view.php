<?php 
$this->load->view('admin/header');
$this->load->view('admin/right-sidebar');
?>  
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>Products Details</h3>
          	<div class="btn_right_header">
	 <button class="btn btn-theme custom_blue_btn" type="button" onclick="window.history.go(-1);" style="float:right;">Go Back</button>
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
		    
                     <h4 class="mb"><i class="fa fa-angle-right"></i> Products Details</h4>
					 
						<div class="form-group">
						  <label class="col-sm-2 col-sm-2 control-label">Product Name :</label>
						  <div class="col-sm-10">
						   <?php echo $pages[0]['product_name']; ?>
						  </div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Product Type : </label>
							<div class="col-sm-10">
							<?php
							$path_parts=$pages[0]['file_name'];
							$ext = pathinfo($path_parts, PATHINFO_EXTENSION);
							if($ext == 'pdf')
							{
							 echo strtoupper($pages[0]['type'])  ;
							}
							else
							{
								echo ucfirst($pages[0]['type'])  ;
								}
							 
							  ?> 
                            <a href="<?php echo base_url() ."uploads/products/".$pages[0]['file_name']."";  ?> " target="_blank">
                                     <?php 
																	
					if(!empty($pages[0]['file_name']) and $ext == 'mp4') {
					echo "<img src='".base_url()."icons/video.png' width='60px;' height='60px;'>";				
					}
					elseif($ext == 'pdf')
					{
						echo "<img src='".base_url()."icons/pdf.png' width='60px;' height='60px;'>";		
					}
					elseif($ext == 'doc' or $ext == 'docx')
					{
						echo "<img src='".base_url()."icons/word.jpg' width='60px;' height='60px;'>";		
					}
					elseif($ext == 'mp3')
					{
						echo "<img src='".base_url()."icons/audio.png' width='60px;' height='60px;'>";		
					}
					elseif($ext == 'png' or $ext == 'jpg' or $ext == 'jpeg')
					{
						echo "<img src='".base_url()."/uploads/products/".$pages[0]['file_name']."' width='60px;' height='60px;'>";
					}
					 ?>
                            
                            
                            
                            
                            </a> 
							</div>
						</div>
                        	<div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Categories : </label>
                    <div class="col-sm-10">
					<?php
					 $catid= json_decode($pages[0]['cat_id']);
					//print_r($catid);
					 $val =  itsgetCategoryname($catid);
					 
					 echo $val->cat_name;
					  ?>
                             
                    </div>
                    </div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Credit Required : </label>
							<div class="col-sm-10">
							 <?php echo $pages[0]['credits']; ?>    
                              
							</div>
						</div>
                        
                        <div class="form-group">
						  <label class="col-sm-2 col-sm-2 control-label">Product Description : </label>
						  <div class="col-sm-10">
						   <?php echo $pages[0]['description']; ?>
						  </div>
						</div>


                        <div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Created Date : </label>
							<div class="col-sm-10">
							 <?php echo $pages[0]['date']; ?>     
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