<?php $this->load->view('supplier/header');
      $this->load->view('supplier/right-sidebar');
?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Approve Order <button class="btn btn-theme custom_blue_btn" type="button" onclick="window.history.go(-1);" style="float:right;">Go Back</button></h3>
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
                    <?php foreach($resource_id as $row): ?>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Resource Name<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
														
															<?php 
																	$productname = GetProductInfo($row['product_id']) ;
																	echo ($productname['product_name']);
															?>
														
                        <input type="text" class="required form-control" value="<?php echo $productname['product_name']; ?>" name="resource_name"> 
						</div>
                    </div>

					 <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Resource's User Name<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
									<?php 
																$UserField = getUserField('fname', $row['member_id']);
																
									?>
                        <input type="text" class="required form-control" value="<?php echo $UserField; ?>" name="user_name"> 
						</div>
                    </div>


					<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Resource's User Email<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
									<?php 
												$UserField = getUserField('email', $row['member_id']);
									?>
                        <input type="text" class="required form-control" value="<?php echo $UserField; ?>" name="resource_email"> 
						</div>
                    </div>
					 <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Status<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                          <label class="radio-inline"> Approve <input type="radio" class="required form-control" <?php if($row['status']==1) { echo "checked"; } ?> value="1" name="status" /> </label>&nbsp;&nbsp;&nbsp;  <label class="radio-inline"> Unapprove <input type="radio" class="required form-control" <?php if($row['status']==0) { echo "checked"; } ?> value="0" name="status" /></label> </div>
                     </div>
				               
                 
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                            <button class="btn btn-theme custom_blue_btn" type="submit">Approve</button>
                        </div>
                    </div>
					
					<?php endforeach; ?>
					
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
