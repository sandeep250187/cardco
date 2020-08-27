<?php 
$this->load->view('admin/header');
$this->load->view('admin/right-sidebar');
?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Tour Master</h3>
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
                        <label class="col-sm-2 col-sm-2 control-label">City<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
						<select class="required form-control"   name="city">
							<option value="6">Penang</option>
						</select>
						</div>
                            
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Tour Name<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="required form-control"   name="tour_name"> </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Tour Code<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="required form-control"   name="tour_code"> </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Tour Image</label>
                        <div class="col-md-10">
                            <input type="file" name="tour_image" accept="image/*" class="form-control"> </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Duration<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="required form-control"   name="duration"> </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Per Adult Rate<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <span class="padd">
										<table width="100%" class="table table-bordered table-condensed">
											<tr>
												<td>01 Pax</td>
												<td>02-04 Pax</td>
												<td>05-09 Pax</td>
												<td>10-16 Pax</td>
												<td>17-25 Pax</td>
												<td>26-31 Pax</td>
												<td>32-40 Pax</td>
											</tr>

											<tr>
												<td class="form-inline">
												    <input type="text" class="form-control input-sm" style="width:80px"  name="pax1"  placeholder="01 Pax"/>
											    </td>
												<td>
												    <input type="text" class="form-control input-sm" style="width:80px"   name="pax4"  placeholder="02-04 Pax"/>
											    </td>
												<td>
												    <input type="text" class="form-control input-sm" style="width:80px"   name="pax9"  placeholder="05-09 Pax"/>
												</td>
												<td>
													<input type="text" class="form-control input-sm" style="width:80px"   name="pax16"  placeholder="10-16 Pax"/>
												</td>
											    <td>
											    	<input type="text" class="form-control input-sm" style="width:80px"    name="pax25"  placeholder="17-25 Pax"/>
												</td>
												<td>
													<input type="text" class="form-control input-sm" style="width:80px"    name="pax31"  placeholder="26-31 Pax"/>
										        </td>
										        <td>
										        	<input type="text" class="form-control input-sm" style="width:80px"    name="pax40"  placeholder="32-40 Pax"/>
										        </td>
									</tr>
								</table>
							</span>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Validity<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="required form-control" id="validity"  name="validity"> </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Description<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                           <textarea  name="description" id="ckeditor" class="ckeditor form-control" cols="50" rows="5"></textarea> </div>
                    </div>
					
                    

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                            <button class="btn btn-theme custom_blue_btn" type="submit">Submit</button>
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
    $( "#validity" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
} );
  </script>





