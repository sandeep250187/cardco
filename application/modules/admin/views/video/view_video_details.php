<?php 
$this->load->view('admin/header');
$this->load->view('admin/right-sidebar');
?>  
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>Video Details</h3>
          	<div class="btn_right_header">
	 <a class="btn btn-default" onclick="history.go(-1);">Go Back</a>
	</div>
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12"> 
                  <div class="form-panel">
                  	  
			  <?php
			  $attributes = array('class' => 'form-horizontal style-form input_from_custom', 'id' => 'faq-form', 'name' => 'faq-form' ,'enctype'=>'multipart/form-data' );
              //pr($videos);
			  ?>
                  <?php echo form_open(current_url(), $attributes ); ?>
		    
                     <h4 class="mb"><i class="fa fa-angle-right"></i> Video Details</h4>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Video Title :</label>
                              <div class="col-sm-10">
                               <?php echo $videos[0]['video_title']; ?>
                              </div>
                          </div>
						  <?php 
                        $getVideoDetail = playVideobylang($videos[0]['v_id'], 1);
						?>
						<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Video :</label>
                              <div class="col-sm-10">
                               <a href="javascript:void(0);" class="right_detail" id="cip-<?php echo $videos[0]['v_id']; ?>" ><img src="<?php echo base_url(); ?>uploads/uservideo/images/<?php echo $getVideoDetail[0]['video_image']; ?>" alt="" path="<?php echo base_url(); ?>uploads/uservideo/videos/<?php echo $getVideoDetail[0]['video_path']; ?>" class="path" width="210" height="147" /></a>
                              </div>
                       </div>
						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Video Description : </label>
                              <div class="col-sm-10">
                               <?php echo $videos[0]['video_description']; ?>
                              </div>
                          </div>
				<div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Video Upload Date : </label>
                    <div class="col-sm-10">
					<?php echo globalDateformat($videos[0]['video_date']); ?>
                             
                    </div>
                </div>
			    <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Uploaded by : </label>
                    <div class="col-sm-10">
					<?php echo $videos[0]['full_name']; ?>
                             
                    </div>
                </div>
				 <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Video available in  : </label>
                    <div class="col-sm-10">
					<?php echo Video_AvailableInAdmin($videos[0]['v_id']); ?>
                             
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Categories : </label>
                    <div class="col-sm-10">
					<?php Get_Video_Categories($videos[0]['v_id']); ?>
                             
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">No of Views : </label>
                    <div class="col-sm-10">
					<span class="badge bg-info"><?php echo count_videoviews($videos[0]['v_id']); ?></span>
                             
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">No of Likes : </label>
                    <div class="col-sm-10">
					<span class="badge bg-info"><?php echo count_thumbup($videos[0]['v_id']); ?></span>
                             
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">No of Dislikes : </label>
                    <div class="col-sm-10">
					<span class="badge bg-info"><?php echo count_thumbdown($videos[0]['v_id']); ?></span>
                             
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">No of Comments : </label>
                    <div class="col-sm-10">
					<span class="badge bg-info"><?php echo comment_count($videos[0]['v_id']); ?></span>
                             
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Comments : </label>
                    <div class="col-sm-10">
					<div class="comment-listing" id="comment-listing">
					<?php comment_listingAdmin($videos[0]['v_id']); ?>
                    </div>  					
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
      $this->load->view('admin/footer');
     ?>
<script src="http://code.jquery.com/jquery-2.0.3.min.js"></script> 
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<script>
$.fn.editable.defaults.mode = 'inline';
$(document).ready(function() {
    $('.c_edit').editable();
	
	$('.delcom').click(function(){
		var pk = $(this).attr('pk');
		if(pk!='' && confirm('Are you sure?')){
			$.ajax({
				type:"POST",
				url:"<?php echo base_url(); ?>ajax/ac_delete",
				data:{pk:pk},
				success:function(){
				 $('#li-'+pk).remove();
				 
				}
			});
		}
	});
});
</script>



