<?php $this->load->view('supplier/header');
      $this->load->view('supplier/right-sidebar');
?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Edit Event <button class="btn btn-theme custom_blue_btn" type="button" onclick="window.history.go(-1);" style="float:right;">Go Back</button></h3>
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
                        <label class="col-sm-2 col-sm-2 control-label">Event Name<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="required form-control" value="<?php echo $pages[0]['name']; ?>" name="eventName"> </div>
                    </div>
                   
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Event Logo</label>
                        <div class="col-md-10">
                            <input type="file" name="logo_path" accept="image/*" class="form-control">
                            <?php 
																				
					if(!empty($pages[0]['logo'])) {
						?> <a href="<?php echo base_url() ."uploads/event/".$pages[0]['logo']."";  ?> " target="_blank">
						<?php echo "<img src='".base_url()."/uploads/event/".$pages[0]['logo']."' width='60px;' height='60px;'>";
						?>
                        </a>
                        <?php } ?>
                        
                            <input type="hidden" name="h_img" value="<?php echo $pages[0]['logo']; ?>"> </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Backround Image</label>
                        <div class="col-md-10">
                            <input type="file" name="bg_path" accept="image/*" class="form-control">
                            <?php 
                                                                                
                    if(!empty($pages[0]['bg_color'])) {
                        ?> <a href="<?php echo base_url() ."uploads/event/".$pages[0]['bg_color']."";  ?> " target="_blank">
                        <?php echo "<img src='".base_url()."/uploads/event/".$pages[0]['bg_color']."' width='60px;' height='60px;'>";
                        ?>
                        </a>
                        <?php } ?>
                        
                            <input type="hidden" name="himg" value="<?php echo $pages[0]['bg_color']; ?>"> </div>
                    </div>
                
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Event Start Date</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="<?php echo $pages[0]['from']; ?>" name="eventDate" id="event_Date"> </div>
                    </div>

                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Event Description<span class="red_asterisk">*</span></label>
                        </label>
                        <div class="col-sm-10">
                            <?php
							echo $this->ckeditor->editor("content",$pages[0]['content']);
							?>
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
<script type="text/javascript">
  $( function() {
    $( "#event_Date" ).datepicker();
  //  $( "#event_Date" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
} );
  </script>
