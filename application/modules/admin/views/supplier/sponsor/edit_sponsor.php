<?php $this->load->view('supplier/header');
      $this->load->view('supplier/right-sidebar');
?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Edit Sponsor <button class="btn btn-theme custom_blue_btn" type="button" onclick="window.history.go(-1);" style="float:right;">Go Back</button></h3>
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
                        <label class="col-sm-2 col-sm-2 control-label">Sponsor Name<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="required form-control" value="<?php echo $pages[0]['sp_name']; ?>" name="sp_name"> </div>
                    </div>
                   
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">sponsor Logo</label>
                        <div class="col-md-10">
                            <input type="file" name="sp_logo" accept="image/*" class="form-control">
                            <?php 
																				
					if(!empty($pages[0]['sp_logo'])) {
						?> <a href="<?php echo base_url() ."uploads/sponsor/".$pages[0]['sp_logo']."";  ?> " target="_blank">
						<?php echo "<img src='".base_url()."/uploads/sponsor/".$pages[0]['sp_logo']."' width='60px;' height='60px;'>";
						?>
                        </a>
                        <?php } ?>
                        
                            <input type="hidden" name="h_img" value="<?php echo $pages[0]['sp_logo']; ?>"> </div>
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
