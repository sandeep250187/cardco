<?php $this->load->view('admin/header');
      $this->load->view('admin/right-sidebar');
?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Edit Tour <button class="btn btn-theme custom_blue_btn" type="button" onclick="window.history.go(-1);" style="float:right;">Go Back</button></h3>
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
                        <label class="col-sm-2 col-sm-2 control-label">Tour Name<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="required form-control" value="<?php echo $tours[0]['tour_name']; ?>"  name="tour_name"> </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Tour Code<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="required form-control" value="<?php echo $tours[0]['tour_code']; ?>"  name="tour_code"> </div>
                    </div>
                   
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Tour Image</label>
                        <div class="col-md-10">
                            <input type="file" name="tour_image" accept="image/*" class="form-control">
                            <?php 
																				
					if(!empty($tours[0]['thumbnail'])) {
						?> <a href="<?php echo base_url() ."uploads/tourname/thumb_".$tours[0]['thumbnail']."";  ?> " target="_blank">
						<?php echo "<img src='".base_url()."/uploads/tourname/thumb_".$tours[0]['thumbnail']."' width='60px;' height='60px;'>";
						?>
                        </a>
                        <?php } ?>
                        
                            <input type="hidden" name="h_img" value="<?php echo $tours[0]['thumbnail']; ?>"> </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Duration<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="required form-control" value="<?php echo $tours[0]['duration']; ?>"  name="duration"> </div>
                    </div>
					 <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Pax1<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="required form-control" value="<?php echo $tours[0]['pax1']; ?>"  name="pax1"> </div>
					</div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">02-04 Pax<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="required form-control" value="<?php echo $tours[0]['pax4']; ?>"  name="pax4"> </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">05-09 Pax<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="required form-control" value="<?php echo $tours[0]['pax9']; ?>"  name="pax9"> </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">10-16 Pax<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="required form-control" value="<?php echo $tours[0]['pax16']; ?>"  name="pax16"> </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">17-25 Pax<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="required form-control" value="<?php echo $tours[0]['pax25']; ?>"  name="pax25"> </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">26-31Pax<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="required form-control" value="<?php echo $tours[0]['pax31']; ?>"  name="pax31"> </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">32-40 Pax<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="required form-control" value="<?php echo $tours[0]['pax40']; ?>"  name="pax40"> </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Validity<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="required form-control" value="<?php echo $tours[0]['validity']; ?>"  name="validity"> </div>
                    </div>
					 <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Description<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <textarea class="required form-control"  name="description"><?=$tours[0]['description'];?></textarea> </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Popular Tour<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <input type="checkbox" class="required form-control" value="1" <?php if($tours[0]['popular_tour_pkg']==1) echo 'checked="checked"'?>"  name="popular_tour_pkg"> </div>
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
