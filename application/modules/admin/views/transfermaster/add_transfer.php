<?php 
$this->load->view('admin/header');
$this->load->view('admin/right-sidebar');
?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Add Transfer</h3>
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
                    <h4 class="mb"><i class="fa fa-angle-right"></i> Transfer Information</h4>

					<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">City</label>
                        <div class="col-md-10">
                           <select class="form-control" name="city">
								<option value="6">Penang</option>
						   </select>
						</div>
                    </div>
					
					<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Pickup From<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <select name="pickupfrom" id="pickupfrom" class="form-control input-sm" required=""> 
						        <option value="">Pelase Select</option>         
								<option value="1">Airport</option>
								<option value="2">Coach station</option>
								<option value="3">Railway Station</option>
								<option value="4">Hotel</option>
								<option value="5">Venue</option>
								<option value="6">Cruise</option>
								<option value="7">Ferry</option>
								<option value="8">Kuala Lumpur</option>
								<option value="9">IPOH</option>
								<option value="10">Hourly</option>
							</select>
						</div>
                    </div> 
					
					 <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Transfer Name<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="required form-control"   name="transferName"> </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Vehicle/Pax<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                         <span class="padd">
										<table width="100%" class="table table-bordered table-condensed">
											<tr>
												<td >Van</td>
												<td >MPV(6 Seater)</td>
												<td >Bus</td>
											</tr>
											
											<tr>
												<td class="form-inline"><input type="text" class="form-control input-sm"   name="van10"  placeholder="10 Seater"/> 
												<input type="text" class="form-control input-sm" style="width:80px"   name="van13"  placeholder="13 Seater"/> 
												<input type="text" class="form-control input-sm" style="width:80px"   name="van17"  placeholder="17 Seater"/>
											</td>
											<td>
												<input type="text" class="form-control input-sm" style="width:80px"   name="mpv"  placeholder="Enter Rate"/> </td>
											
											<td class="form-inline">
												<input type="text" class="form-control input-sm" style="width:80px"    name="bus31"  placeholder="31 Seater"/>	<input type="text" class="form-control input-sm" style="width:80px"    name="bus44"  placeholder="44 Seater"/>
										</td>
									</tr>
								</table>
							</span>                            
							</div>
                    </div>
					
					<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Tour Guide(Man/Eng Speaking)<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                           <span class="padd form-inline" >
								<label>
									<select name="guide" class="form-control input-sm">
										<option value="">-Select Guide-</option>
										<option value="1">Chinese</option>
										<option value="2">English</option>
									</select>
								</label>
							&nbsp;&nbsp;<input type="text" class="form-control input-sm" placeholder="Enter Guide Rate" name="guide_rate" style="width:180px;"/></span>
							</div>
                    </div>

					<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Validity<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="required form-control" id="validity"  name="validity"> </div>
                    </div>
					 
					
					<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Description<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <textarea type="text" class="required form-control ckeditor" id="ckeditor"  name="description" cols="50" rows="5"></textarea> 
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
      $this->load->view('admin/footer');
     ?>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/common/jquery.validate.js"></script>
<script>
    $().ready(function() {
        // validate signup form on keyup and submit
        $("#payment-form").validate({});
    });

</script>
<script type="text/javascript">
  $( function() {
    $( "#validity" ).datepicker();
    $( "#validity" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
} );
  </script>
  <script type="text/javascript">
$(function(){

    $('#addMore').on('click', function() {
            var data = $("#tb tr:eq(1)").clone(true).appendTo("#tb");
            data.find("input").val('');
     });
     $(document).on('click', '.remove', function() {
         var trIndex = $(this).closest("tr").index();
            if(trIndex>1) {
             $(this).closest("tr").remove();
           } else {
             alert("Sorry!! Can't remove first row!");
           }
      });
});      
</script>
