<?php $this->load->view('supplier/header');
      $this->load->view('supplier/right-sidebar');
?>  
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Edit Video</h3>
          
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12"> 
                  <div class="form-panel">
                  	  
			  <?php $attributes = array('class' => 'form-horizontal style-form input_from_custom', 'id' => 'faq-form', 'name' => 'faq-form'); ?>
                          <?php echo form_open(current_url(), $attributes ); ?>
		      <?php if(validation_errors()!=''){ ?> 
		<div class="alert alert-danger">
			<?php if( isset($error)) print($error); ?>
                       <?php echo validation_errors(); ?>
        
                  </div>
		<?php } 
		//pr($pages);
		?>
                     <h4 class="mb"><i class="fa fa-angle-right"></i> General Information</h4>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Video Name<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input type="text" class="required form-control" value="<?php echo $pages[0]['video_name']; ?>"  name="video_name" >
                              </div>
                          </div>
						  
						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Video Title<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input type="text" class="required form-control" value="<?php echo $pages[0]['video_title']; ?>"  name="video_title" >
                              </div>
                          </div>
			  
			  
				
				<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Video Description<span class="red_asterisk">*</span></label></label>
                              <div class="col-sm-10">
							  <?php echo $this->ckeditor->editor("video_description",$pages[0]['video_description']); ?>
                           </div>
                </div>
				<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tags<span class="red_asterisk">*</span></label></label>
                              <div class="col-sm-10">
							   <input type="text" data-role="tagsinput" class="control-label form-control" id="keywords" name="keywords" value="<?php echo $pages[0]['keywords']; ?>" placeholder="Add your own tags.">
                              </div>
                </div>
				
				
				
				
				<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Set as<span class="red_asterisk">*</span></label></label>
							  <?php $is_popular = $pages[0]['is_popular'];	
							   $large_banner = $pages[0]['large_banner'];	
							   $small_banner = $pages[0]['small_banner']; ?>
                           
							 <div class="col-sm-10">
							  <!--<p>Popular Video
							  <input type="checkbox" class="required form-control" name="is_popular" value="1" <?php //echo set_value('is_popular', $is_popular) == 1 ? "checked" : ""; ?> /></p>-->
							  <p>Large Banner
							  <input style="width:15px;    margin: 4px 6px 0 0;     float: left;" type="checkbox" class="required form-control" name="large_banner" value="1" <?php echo set_value('large_banner', $large_banner) == 1 ? "checked" : ""; ?> /></p>
							  <p>Small Banner
							  <input type="checkbox" style="width:15px;    margin: 4px 6px 0 0;     float: left;" class="required form-control" name="small_banner" value="1" <?php echo set_value('small_banner', $small_banner) == 1 ? "checked" : ""; ?> /></p>
						     </div>
                </div>
				
				<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Category</label>
                              <div class="col-sm-10">
							  <?php
							  //$pid = $pages[0]['parent'];
							  $pid = '';
							  $parents = itsgetCategory(0);
							  $cat = array();
							  
							  foreach($catid as $cat_id)
							  {
								  $cat[] = $cat_id['cat_id'];
							  }
							 
							  ?>
                               <select name="parent" id="parent" class="form-control" style="width:300px;" multiple>
							   <option value="0">-Select-</option>
                               <?php
							   
							    foreach($parents as $name){
									
									if(in_array($name['catid'], $cat)){
										$selec="selected='selected'";
									}
									else { $selec='';}
									echo "<option value='".$name['catid']."' style='color:#F41173;' ".$selec.">".$name['cat_name']."</option>";
									$sub = itsgetCategory($name['catid']);
									if(count($sub)>0){
										foreach($sub as $sumcat){
											if($sumcat['catid']==$pid){
										$selec1="selected='selected'";
									}
									else { $selec1='';}
										echo "<option value='".$sumcat['catid']."' style='padding-left:10px;color:#6E4ED8;'".$selec1.">".$sumcat['cat_name']."</option>";
										/* $sublast = itsgetCategory($sumcat['catid']);
										if(count($sublast)>0){
											foreach($sublast as $lastcat){
											echo "<option value='".$lastcat['catid']."' style='padding-left:25px;'>".$lastcat['cat_name']."</option>";
										}
										} */
									}
									}
									
								}
							  ?>  							  
							   </select>
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
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
          
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->


<!--main content end-->
     <?php 
      $this->load->view('supplier/footer');
     ?>
<link rel="stylesheet" rel="stylesheet" href="<?php echo base_url(); ?>assets/tags/bootstrap-tagsinput.css">
<script src="<?php echo base_url();?>assets/tags/bootstrap-tagsinput.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/common/jquery.validate.js"></script>
<script>
$().ready(function() {
	// validate signup form on keyup and submit
	$("#user-form").validate({
	});
});
</script>



