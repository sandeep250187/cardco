<?php $this->load->view('admin/header');
      $this->load->view('admin/right-sidebar');
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
                    <?php }
                     ?>
                    <h4 class="mb"><i class="fa fa-angle-right"></i> General Information</h4>
					<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">MYR To USD<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">

                            <input type="text" class="required form-control"  name="usd" value="<?php echo $pages[0]['usd'];?>"> </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">MYR To THB<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">

                            <input type="text" class="required form-control"  name="thb" value="<?php echo $pages[0]['THB'];?>"> </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">MYR To AUD<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">

                            <input type="text" class="required form-control"  name="aud" value="<?php echo $pages[0]['AUD'];?>"> </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">MYR To CNY<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">

                            <input type="text" class="required form-control"  name="cny" value="<?php echo $pages[0]['CNY'];?>"> </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">MYR To INR<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">

                            <input type="text" class="required form-control"  name="inr" value="<?php echo $pages[0]['inr'];?>"> </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">MYR To AED<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">

                            <input type="text" class="required form-control"  name="aed" value="<?php echo $pages[0]['aed'];?>"> </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">ROE Date<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                           
                          <?php echo $pages[0]['roe_date'];?> </div>

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
    $( "#roe_Date" ).datepicker({ dateFormat: 'yy/mm/dd' });
  //  $( "#event_Date" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
} );
  </script>
