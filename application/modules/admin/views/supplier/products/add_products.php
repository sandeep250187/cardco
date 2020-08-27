<?php $this->load->view('supplier/header');
      $this->load->view('supplier/right-sidebar');
?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Add Product</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <?php $attributes = array('class' => 'form-horizontal style-form input_from_custom', 'id' => 'payment-form', 'name' => 'payment-form' ,'enctype'=>'multipart/form-data' ); ?>
                    <?php echo form_open(current_url(), $attributes ); ?>
                    <?php if(validation_errors()!=''){ ?>
                    <div class="alert alert-danger">
                        <?php if( isset($error)) print($error); ?>
                        <?php echo validation_errors(); ?>
                    </div>
                    <?php } ?>
                    <h4 class="mb"><i class="fa fa-angle-right"></i> General Information</h4>
                    <div class="form-group">
					  <label class="col-sm-2 col-sm-2 control-label">Select Category<span class="red_asterisk">*</span></label>
					  <div class="col-sm-10">
						<select name="categories[]" id="categories" class="form-control" style="width:400px;" multiple>
						<option value="">-Select Category-</option>
						 <?php
								$category=itsgetCategory();						 
								 foreach($category as $categories): 
										echo "<option value='".$categories['id']."'>".$categories['cat_name']."</option>";
								 endforeach;
									
						 ?> 
					</select>
					<span class="error" id="categories-error"></span>	
					</div>
					</div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Product Name<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="required form-control" value="<?php echo  $this->input->post('product_name'); ?>" name="product_name"> </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Placeholder Image</label>
                        <div class="col-md-10">
                            <input type="file" name="placeholder_img" accept="image/*" class="form-control"> 
						</div>
                    </div>
					
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Product Type<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <select name="type" class="form-control" style="width:400px;" id="type">
                                                    <option value="">-Select Product Type-</option>
                                                    <option value="image">Image</option>
                                                    <option value="video">Video</option>
                                                    <option value="pdf">PDF</option>
                                                    <option value="doc">Doc</option>
                                                    <option value="audio">Audio</option>
                                                </select> <span class="error" id="type-error"></span> </div>
                    </div>
                     
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Product File Name</label>
                        <div class="col-md-10">
                            <input type="file" name="file_name" accept="image/*" class="form-control"> </div>
                    </div>
                    <!-- <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Page Slug<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="required form-control" value="<?php echo  $this->input->post('page_slug'); ?>" name="page_slug"> <span class="user-message">Do not use space or special character,add hyphen between two word</span> </div></div>-->
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Credit Required</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" value="<?php echo  $this->input->post('credits'); ?>" name="credits"> </div>
                    </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Product Description <span class="red_asterisk">*</span></label>
                        </label>
                        <div class="col-sm-10">
                            <?php
							echo $this->ckeditor->editor("content");
							?>
                        </div>
                    </div>
					 <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Product Sub Description <span class="red_asterisk">*</span></label>
                        </label>
                        <div class="col-sm-10">
                            <?php
							echo $this->ckeditor->editor("sub_content");
							?>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Product Elaboration <span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <?php
									echo $this->ckeditor->editor("elb_content");
							?>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Product Terms & Conditions <span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <?php
									echo $this->ckeditor->editor("tnc_content");
							?>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Product's Recepient <span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="<?php echo  $this->input->post('pro_recepient'); ?>" name="pro_recepient"> <span>Add Recepient Comma Seperated</span>
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
      $this->load->view('supplier/footer');
     ?>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/common/jquery.validate.js"></script>
<script>
    $().ready(function() {
        // validate signup form on keyup and submit
        $("#user-form").validate({});
    });

</script>
