<?php $this->load->view('admin/header');
      $this->load->view('admin/right-sidebar');
?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Edit Product <button class="btn btn-theme custom_blue_btn" type="button" onclick="window.history.go(-1);" style="float:right;">Go Back</button></h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <?php $attributes = array('class' => 'form-horizontal style-form input_from_custom', 'id' => 'payment-form', 'name' => 'payment-form','enctype'=>'multipart/form-data'); ?>
                    <?php echo form_open(current_url(), $attributes ); ?>
                    <?php if(validation_errors()!=''){ ?>
                    <div class="alert alert-danger">
                        <?php if( isset($error)) print($error); ?>
                        <?php echo validation_errors(); ?>
                    </div>
                    <?php } ?>
                    <h4 class="mb"><i class="fa fa-angle-right"></i> General Information</h4>
                       <div class="form-group">
			 <?php
			  $cat = array();
			 $catid= json_decode($pages[0]['cat_id']);
			// print_r($catid);
			   if(!empty($catid)){
				  foreach($catid as $v)
				  {
					  $cat[] = $v;
				  }
			  }
							
			?>
					  <label class="col-sm-2 col-sm-2 control-label">Select Category<span class="red_asterisk">*</span></label>
					  <div class="col-sm-10">
						<select name="categories[]" id="categories" class="form-control" style="width:400px;" multiple>
						<option value="">-Select Category-</option>
						 <?php
							$category=itsgetCategory();									 
						foreach($category as $categories): 
								$selected = in_array($categories['id'], $cat)?"selected":"";
								echo "<option value='".$categories['id']."' $selected>".$categories['cat_name']."</option>";
					   endforeach;		
						 ?> 
					</select>
                    </div>
                    </div>
					<span class="error" id="categories-error"></span>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Product Name<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="required form-control" value="<?php echo $pages[0]['product_name']; ?>" name="product_name"> </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Placeholder Image<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                           <input type="file" name="placeholder_img" class="form-control">
						   <a href="<?php echo base_url() ."uploads/products/".$pages[0]['placeholder_img']."";  ?>" target="_blank"><img src="<?php echo base_url() ."uploads/products/".$pages[0]['placeholder_img']."";  ?>" style="width:60px;" /></a>
						   <input type="hidden" name="h_plcimg" value="<?php echo $pages[0]['placeholder_img']; ?>">
						</div>
                    </div>
					
                   
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Product Type<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                       				 <select name="type" class="form-control" style="width:400px;" id="type">
                                     <?php
													 $selected = "selected";
													 if($pages[0]['type'] == 'image')
													 {
											echo "<option value='".$pages[0]['type']."' ".$selected.">".ucfirst($pages[0]['type'])."</option>";
													echo "<option value='video'>Video</option>";
                                                    echo "<option value='pdf'>Pdf</option>";
                                                    echo "<option value='doc'>Doc/Docx</option>";
                                                    echo "<option value='audio'>Audio</option>";
														 }
														 elseif($pages[0]['type'] == 'video')
														 {
													echo "<option value='".$pages[0]['type']."' ".$selected.">".ucfirst($pages[0]['type'])."</option>";
													echo "<option value='image'>Image</option>";
                                                    echo "<option value='pdf'>Pdf</option>";
                                                    echo "<option value='doc'>Doc/Docx</option>";
                                                    echo "<option value='audio'>Audio</option>";		 
															 }
															  elseif($pages[0]['type'] == 'pdf')
														 {
													echo "<option value='".$pages[0]['type']."' ".$selected.">".strtoupper($pages[0]['type'])."</option>";	
													echo "<option value='image'>Image</option>";
                                                    echo "<option value='video'>Video</option>";
                                                    echo "<option value='doc'>Doc/Docx</option>";
                                                    echo "<option value='audio'>Audio</option>";	 
															 }
															  elseif($pages[0]['type'] == 'doc')
														 {
													echo "<option value='".$pages[0]['type']."' ".$selected.">".ucfirst($pages[0]['type'])."</option>";	
													echo "<option value='image'>Image</option>";
                                                    echo "<option value='video'>Video</option>";
                                                    echo "<option value='pdf'>Pdf</option>";
                                                    echo "<option value='audio'>Audio</option>";	 
															 }
															  elseif($pages[0]['type'] == 'audio')
															 {
														echo "<option value='".$pages[0]['type']."' ".$selected.">".ucfirst($pages[0]['type'])."</option>";
														echo "<option value='image'>Image</option>";
														echo "<option value='video'>Video</option>";
														echo "<option value='pdf'>Pdf</option>";
														echo "<option value='doc'>Doc/Docx</option>";		 
															}
														else
														 {
																
														 }
													
				                            			?>
                                                
                                                </select>
                                               
                           <span class="error" id="type-error"></span> </div>
                    </div>
                  
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Product File Name</label>
                        <div class="col-md-10">
                            <input type="file" name="file_name" class="form-control">
                            <?php 
							$path_parts=$pages[0]['file_name'];
							$ext = pathinfo($path_parts, PATHINFO_EXTENSION);
														
					if(!empty($pages[0]['file_name']) and $ext == 'mp4') {
						 ?> <a href="<?php echo base_url() ."uploads/products/".$pages[0]['file_name']."";  ?> " target="_blank">
						<?php echo "<img src='".base_url()."icons/video.png' width='60px;' height='60px;'>";	
						?>
                        </a>
                        <?php			
					}
					elseif($ext == 'pdf')
					{ ?> <a href="<?php echo base_url() ."uploads/products/".$pages[0]['file_name']."";  ?> " target="_blank">
						<?php echo "<img src='".base_url()."icons/pdf.png' width='60px;' height='60px;'>";	
						?>
                        </a>
                        <?php	
					}
					elseif($ext == 'doc' or $ext == 'docx')
					{
						 ?> <a href="<?php echo base_url() ."uploads/products/".$pages[0]['file_name']."";  ?> " target="_blank">
						<?php echo "<img src='".base_url()."icons/word.jpg' width='60px;' height='60px;'>";	
						?>
                        </a>
                        <?php	
					}
					elseif($ext == 'mp3')
					{
						 ?> <a href="<?php echo base_url() ."uploads/products/".$pages[0]['file_name']."";  ?> " target="_blank">
						<?php echo "<img src='".base_url()."icons/audio.png' width='60px;' height='60px;'>";	
						?>
                        </a>
                        <?php	
					}
					elseif($ext == 'png' or $ext == 'jpg' or $ext == 'jpeg')
					{
						 ?> <a href="<?php echo base_url() ."uploads/products/".$pages[0]['file_name']."";  ?> " target="_blank">
						<?php echo "<img src='".base_url()."/uploads/products/".$pages[0]['file_name']."' width='60px;' height='60px;'>";
						?>
                        </a>
                        <?php
					}
					 ?>
                            <input type="hidden" name="h_img" value="<?php echo $pages[0]['file_name']; ?>"> </div>
                    </div>
                    <!--<div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Page Slug<span class="red_asterisk">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="required form-control" value="<?php echo $pages[0]['page_slug']; ?>" name="page_slug"> <span class="user-message">Do not user space or special character,add hyphen between two word</span> </div>
                                        </div>-->
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Credit Required</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" value="<?php echo $pages[0]['credits']; ?>" name="credits"> </div>
                    </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Product Description<span class="red_asterisk">*</span></label>
                        </label>
                        <div class="col-sm-10">
                            <?php
							echo $this->ckeditor->editor("content",$pages[0]['description']);
							?>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Product Sub Description<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <?php
							echo $this->ckeditor->editor("sub_content",$pages[0]['sub_content']);
							?>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Product Elaboration<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <?php
							echo $this->ckeditor->editor("elb_content",$pages[0]['elb_content']);
							?>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Product Terms & Conditions <span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                         	<?php
									echo $this->ckeditor->editor("tnc_content",$pages[0]['tnc_content']);
							?>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Product's Recepient <span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="<?php echo $pages[0]['pro_recepient']; ?>" name="pro_recepient"> <span>Add Recepient Comma Seperated</span>
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
            </div>
            <!-- col-lg-12-->
        </div>
        <!-- /row -->
    </section>
    <! --/wrapper -->
</section>
<!-- /MAIN CONTENT -->
<!--main content end-->
<?php 
      $this->load->view('admin/footer');
     ?>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/common/jquery.validate.js"></script>
<script>
    $().ready(function() {
        // validate signup form on keyup and submit
        $("#user-form").validate({});
    });

</script>
