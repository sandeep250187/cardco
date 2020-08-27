<?php 
$this->load->view('admin/header');
$this->load->view('admin/right-sidebar');
?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Add Location</h3>
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
                    <h4 class="mb"><i class="fa fa-angle-right"></i> Location Information</h4>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Search Transfer Name</label>
                        <div class="col-md-10">
                           <select class="required form-control" name="searchTransfer">
                                <?php 
                                  $location=trasferlocation();
                                    foreach($location as $value){
                                 ?>
								<option value="<?php echo $value['id']; ?>"><?php echo $value['search_transfer'];?></option>
                            <?php } ?>
						   </select>
						</div>
                    </div>

                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Transfer Pickup Point</label>
                        <div class="col-md-10">
                           <select class="required form-control" name="transferPickup">
                                <option value="">Select</option>
                                <option value="1">Convention Centres</option>
                                <option value="2">Hotels</option>
                                <option value="3">Unique Venues</option>
                                <option value="4">RESTAURANTS & CAFES</option>
                            </select>
                        </div>
                    </div>

					 <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Transfer Place<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="required form-control"   name="transferPlace">
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
        $("#payment-form").validate({});
    });
</script>
 
   
