<?php $this->load->view('admin/header');
      $this->load->view('admin/right-sidebar');
?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Edit Location Master <button class="btn btn-theme custom_blue_btn" type="button" onclick="window.history.go(-1);" style="float:right;">Go Back</button></h3>
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
                    <h4 class="mb"><i class="fa fa-angle-right"></i> Location Transfer</h4>
					<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Search Transfer Name<span class="red_asterisk">*</span></label>
                        <div class="col-md-10">
                            <select name="searchTransfer" class="required form-control">
                                <option value="">-Select Transfer-</option>
                                        <?php
                                             $searchid = trasferlocation();
                                             foreach($searchid as $val){ 
                                         ?>
                                    <option value="<?php echo $val['id']; ?>" <?php if($transfers[0]['search_transferid']==$val['id']) echo "selected='selected'"; ?>><?php echo $val['search_transfer'];?></option>
                                     <?php } ?>     
                                </select>
                            </label>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Transfer Pickup Point</label>
                        <div class="col-md-10">
                           <select class="required form-control" name="transferPickup">
                                <option value="">Select</option>
                                <option value="1" <?php if($transfers[0]['transfer_pickup']=='1') echo "selected='selected'";?>>Convention Centres</option>
                                <option value="2" <?php if($transfers[0]['transfer_pickup']=='2') echo "selected='selected'";?>>Hotels </option>
                                <option value="3" <?php if($transfers[0]['transfer_pickup']=='3') echo "selected='selected'";?>>Unique Venues </option>
                                <option value="4" <?php if($transfers[0]['transfer_pickup']=='4') echo "selected='selected'";?>>RESTAURANTS & CAFES</option>
                            </select>
                        </div>
                    </div>
					  <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Transfer Place<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="required form-control"   name="transferPlace" value="<?php echo $transfers[0]['transfer_place'];?>">
                        </div>
                    </div>  
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                            <button class="btn btn-theme custom_blue_btn" type="submit">Update</button>
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
    $( "#validity" ).datepicker();
    $( "#event_Date" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
} );
  </script>
