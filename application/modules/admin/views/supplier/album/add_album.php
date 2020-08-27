<?php $this->load->view('supplier/header');
      $this->load->view('supplier/right-sidebar');
?>  
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Add Album</h3>
          	
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
                              <label class="col-sm-2 col-sm-2 control-label">User<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                              <select name="user_name" id="user_name" class="required form-control custom-select">
							  <option value="">-Select-</option>
								  <?php
                              $users = getUserlist();
							  if(!empty($users)){
							  foreach($users as $usr){
								echo "<option value='".$usr['id']."'>".$usr['username']."</option>";  
							  }
							  }							  
							  ?>
								  </select>
                              </div>
                    </div>
                    <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Album Title<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input type="text" class="required form-control" value="<?php echo  $this->input->post('album_title'); ?>"  name="album_title" >
                              </div>
                    </div>
			  
				
				  <div class="form-group">
                         <label for="post_name"  class="control-label col-sm-2">Image</label>
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
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <button class="btn btn-theme custom_blue_btn" name="add_album" type="submit">Save</button>
                              </div>
                          </div>
			  
                          
                      </form>
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
          
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->


<!--main content end-->
     <?php 
      $this->load->view('supplier/footer');
     ?> 
<script type="text/javascript">
$(function(){
	
	$("#user_name").customselect();

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



