<?php $this->load->view('admin/header');
      $this->load->view('admin/right-sidebar');
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
                        <label class="col-sm-2 col-sm-2 control-label">Tour Name<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <?php 
							      $tid=$tours[0]['tid'];
                                  $tour_name=getTourName($tid);
								  echo $tour_name;
							?>
						</div>
                    </div>
					
					<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Valid From<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <input type="text"  class="required form-control"   name="valid_from" id="valid_from" value="<?php echo $tours[0]['valid_from']; ?>">
							</div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Valid To<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <input type="text"  class="required form-control"   name="valid_to" id="valid_to" value="<?php echo $tours[0]['valid_to']; ?>">
							</div>
                    </div>
					
					<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Car<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="required form-control" value="<?php echo $tours[0]['car']; ?>"  name="car"> </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Van<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="required form-control" value="<?php echo $tours[0]['van']; ?>"  name="van"></div>
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
   $( "#valid_from").datepicker({dateFormat: 'yy-mm-dd'});
    //$( "#valid_from" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
} );
  </script>
  <script type="text/javascript">
  $( function() {
    $( "#valid_to").datepicker({dateFormat: 'yy-mm-dd'});
    //$( "#valid_to" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
} );
  </script>





