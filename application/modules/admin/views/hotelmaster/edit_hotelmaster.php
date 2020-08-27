<?php $this->load->view('admin/header');
      $this->load->view('admin/right-sidebar');
?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Edit Hotel Master <button class="btn btn-theme custom_blue_btn" type="button" onclick="window.history.go(-1);" style="float:right;">Go Back</button></h3>
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
                    <?php }  ?>
                    <h4 class="mb"><i class="fa fa-angle-right"></i> Hotel Information</h4>
					<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Hotel Name<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="required form-control" value="<?php echo $pages[0]['hotelname']; ?>" name="hotelName"> </div>
                    </div>
					 
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Hotel Pic</label>
                        <div class="col-md-10">
                            <input type="file" name="hotel_pic" accept="image/*" class="form-control"  value="<?php echo $pages[0]['hotel_pic']; ?>">
							 
                            <?php 
																				
					if(!empty($pages[0]['hotel_pic'])) {
						?> <a href="<?php echo base_url() ."uploads/hotelmaster/".$pages[0]['hotel_pic']."";  ?> " target="_blank">
						<?php echo "<img src='".base_url()."uploads/hotelmaster/".$pages[0]['hotel_pic']."' width='60px;' height='60px;'>";
						?>
                        </a>
                        <?php } ?>
                        
                            <input type="hidden" name="h_img" value="<?php echo $pages[0]['hotel_pic']; ?>"> </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Location<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <textarea type="text" class="required form-control"   name="location"><?php echo $pages[0]['location']; ?></textarea> 
							</div>
                    </div>
                
                   <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Address<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <textarea type="text" class="required form-control"  name="address"><?php echo $pages[0]['address']; ?></textarea> 
							</div>
                    </div> 
					
					 <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Star Caregory<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="required form-control" value="<?php echo $pages[0]['starcat']; ?>" name="starCat"> </div>
                    </div>
					
					 <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Landline </label>
                        <div class="col-sm-10">
                            <input type="text" class="required form-control" value="<?php echo  $pages[0]['landline']; ?>" name="landline"> </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Map Location<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <textarea type="text" class="required form-control" name="maploc"  ><?php echo $pages[0]['htl_map']; ?></textarea> 
							</div>
                    </div>
					
					 <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Contat Person </label>
                        <div class="col-sm-10">
                            <input type="text" class="required form-control" value="<?php echo  $pages[0]['contact_person']; ?>" name="contact"> </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Cancel Policy </label>
                        <div class="col-sm-10">
                            <textarea type="text" class="required form-control"  name="cancelPolicy"><?php echo $pages[0]['cancel_policy']; ?></textarea> 
							</div>
                    </div>
					
					<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Remarks</label>
                        <div class="col-sm-10">
                            <textarea type="text" class="required form-control"  name="remark"><?php echo $pages[0]['remarks']; ?></textarea> 
							</div>
                    </div>

                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Hotel Descriptions <span class="red_asterisk">*</span></label>
                        
                        <div class="col-sm-10">
                            <?php
                               echo $this->ckeditor->editor("htl_description",$pages[0]['htl_description']);
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Popular Hotel </label>
                        <div class="col-sm-10">
                            <input type="checkbox" class="required form-control" value="1" <?php if($pages[0]['popular_hotel']==1) echo 'checked="checked"'?>"  name="popular_hotel"> </div>
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
<script type="text/javascript">
  $( function() {
    $( "#event_Date" ).datepicker();
  //  $( "#event_Date" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
} );
  </script>
