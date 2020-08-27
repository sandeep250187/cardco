<?php 
$this->load->view('admin/header');
$this->load->view('admin/right-sidebar');
?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Add Apartment Room</h3>
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
                    <h4 class="mb"><i class="fa fa-angle-right"></i> Apartment Information</h4>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Select Apartment<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <select class="required form-control"   name="aptid">
                                <option value="">-Select Apartment-</option>
                                <?php
                            $aptId = getApartmentList();
                            foreach($aptId as $apt)
                            {
                            echo "<option value=".$apt['id'].">".$apt['aptname']."</option>";
                            }
                            ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Room Pic1</label>
                        <div class="col-md-10">
                            <input type="file" name="room_pic1" accept="image/*" class="form-control" value="<?php echo  $this->input->post('room_pic1'); ?>"> </div>
                    </div>
				     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Room Pic2</label>
                        <div class="col-md-10">
                            <input type="file" name="room_pic2" accept="image/*" class="form-control" value="<?php echo  $this->input->post('room_pic2'); ?>"> </div>
                    </div>
                    <div class="form-group">
                         <label for="post_name"  class="control-label col-sm-2"> Apartment image gallery</label>
                         <div class="col-sm-10">
                    <table id="tb" cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <th>
                <div class="col-md-12"><a href="javascript:void(0);" id="addMore" class="btn btn-success btn-xs" ><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                </div>
                </th>
            </tr>
            <tr>
                <td>
                <div class="form-group" style="margin-top:15px;">
                    <div class="col-md-10"><input type="file" name="image_file[]" accept="image/*" id="BoxName" class="checkfile form-control"></div>                   
                    <div class="col-md-2">                      
                        <a href="javascript:void(0);" class="remove btn btn-danger btn-xs" id="addMore"><i class="fa fa-minus-circle" aria-hidden="true"></i></a>
                    </div>                  
                </div>              
                </td>
            </tr>
                             </table></div>
                     </div>
					
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Apartment Type</label>
                        <div class="col-md-10">
                           <select class="form-control" name="apt_type">
                                <option value="">-Select-</option>
								<option value="Single">Single</option>
                                <option value="Double">Double</option>
                                <option value="Triple">Triple</option>
                                <option value="Quad">Quad</option>
						   </select>
						</div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Apartment Category</label>
                        <div class="col-md-10">
                           <select class="form-control" name="apt_cat">
								<option value="">-Select-</option>
                                <?php
                            $CategoryId = getCategoryApt();
                            foreach($CategoryId as $category)
                            {
                            echo "<option value=".$category['id'].">".$category['aptcat']."</option>";
                            }
                            ?>
						   </select>
						</div>
                    </div>	
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Valid From<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="required form-control" value="<?php echo  $this->input->post('valid_from'); ?>" name="valid_from" id="valid_from"> </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Valid To<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="required form-control" value="<?php echo  $this->input->post('valid_to'); ?>" name="valid_to" id="valid_to"> </div>
                    </div>									
					<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Apartment Price<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="required form-control" value="<?php echo  $this->input->post('apt_price'); ?>" name="apt_price">
							</div>
                    </div>	
					 
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Days<span class="red_asterisk">*</span></label>
                        <input type="checkbox" value="SUN" name="days[]" checked>&nbsp;Sunday&nbsp;
                        <input type="checkbox" value="MON" name="days[]" checked>&nbsp;Monday&nbsp;
                        <input type="checkbox" value="TUE" name="days[]" checked>&nbsp;Tuesday&nbsp;
                        <input type="checkbox" value="WED" name="days[]" checked>&nbsp;Wednesday&nbsp;
                        <input type="checkbox" value="THU" name="days[]" checked>&nbsp;Thursday&nbsp;
                        <input type="checkbox" value="FRI" name="days[]" checked>&nbsp;Friday &nbsp;
                        <input type="checkbox" value="SAT" name="days[]" checked>&nbsp;Saturday
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
    $( "#valid_from" ).datepicker();
    $( "#valid_from" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
} );
  </script>
  <script type="text/javascript">
  $( function() {
    $( "#valid_to" ).datepicker();
    $( "#valid_to" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
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
