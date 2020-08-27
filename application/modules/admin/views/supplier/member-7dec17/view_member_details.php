<?php 
$this->load->view('supplier/header');
$this->load->view('supplier/right-sidebar');
?>  
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>Member Details</h3>
          	<div class="btn_right_header">
	 <a class="btn btn-default" onclick="history.go(-1);">Go Back</a>
	</div>
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12"> 
                  <div class="form-panel">
                  	  
			  <?php
			  $attributes = array('class' => 'form-horizontal style-form input_from_custom', 'id' => 'faq-form', 'name' => 'faq-form' ,'enctype'=>'multipart/form-data' );
			  ?>
                  <?php echo form_open(current_url(), $attributes ); ?>
		    
                     <h4 class="mb"><i class="fa fa-angle-right"></i> Dentist Information</h4>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">First Name</label>
                              <div class="col-sm-10">
                                   <?php echo  $user[0]['fname']; ?>
                                   <input type="hidden" class="" value="<?php echo  $user[0]['id']; ?>" name="user_id" >
                              </div>
                          </div>
						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Last Name</label>
                              <div class="col-sm-10">
                                   <?php echo  $user[0]['lname']; ?>
                              </div>
                          </div>
			
			  
						<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Email Address</label>
                              <div class="col-sm-10">
                                  <?php echo $user[0]['email']; ?>
                              </div>
                          </div>
						 <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Credits</label>
                              <div class="col-sm-10">
                                  <?php echo $user[0]['credits']; ?>
                              </div>
                        </div>
						<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Location</label>
                              <div class="col-sm-10">
                                  <?php echo $user[0]['location']; ?>
                              </div>
                        </div>
						<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Mobile Number</label>
                              <div class="col-sm-10">
                                  <?php echo $user[0]['mobile']; ?>
                              </div>
                        </div>
						<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Experience</label>
                              <div class="col-sm-10">
                                  <?php echo $user[0]['experience']; ?>
                              </div>
                        </div>
						<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">About Me</label>
                              <div class="col-sm-10">
                                  <?php echo $user[0]['description']; ?>
                              </div>
                         </div>
			  
			 
			       <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Old Password</label>
                              <div class="col-sm-10">
                                  <?php echo  $user[0]['org_password']; ?>
                              </div>
                          </div>	       
						<h4 class="mb"><i class="fa fa-angle-right"></i> Iframe Management: </h4>
						
						<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Iframe Script</label>
                              <div class="col-sm-10">
                                  <pre><kbd>&lt;iframe src="<?php echo base_url().'iframe/dentist/'.base64url_encode($user[0]['id']); ?><?php echo $user[0]['id']; ?>"&gt;&lt;/iframe&gt;</kbd></pre>
                              </div>
                          </div>
						<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Iframe Form Video</label>
                              <div class="col-sm-10">
                                  <?php echo  $user[0]['iframe_form_video']; ?>
                              </div>
                          </div>
						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Iframe Form Description</label>
                              <div class="col-sm-10">
                                  <?php echo  $user[0]['iframe_form_desc']; ?>
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



