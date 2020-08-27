<?php 
$this->load->view('admin/header');
$this->load->view('admin/right-sidebar');
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
                              <label class="col-sm-2 col-sm-2 control-label">User Name</label>
                              <div class="col-sm-10">
                                   <?php echo  $user[0]['username']; ?>
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
						
				    <?php  if($user[0]['is_iframe'] == '1' or $user[0]['is_tablet'] == '1')
						{
						   ?>
                           <h4 class="mb"><i class="fa fa-angle-right"></i> Clinic Information: </h4>
                	<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Clinic Name</label>
                              <div class="col-sm-10">
                                  <?php echo $user[0]['clinic_name']; ?>
                              </div></div>
                              	<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Clinic Location</label>
                              <div class="col-sm-10">
                                  <?php echo $user[0]['c_location']; ?>
                              </div></div>
                              	<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Clinic Email Id</label>
                              <div class="col-sm-10">
                                  <?php echo $user[0]['c_email']; ?>
                              </div></div>
                              	<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Clinic Phone Number</label>
                              <div class="col-sm-10">
                                  <?php echo $user[0]['c_phone']; ?>
                              </div></div>
                              	<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Clinic Video</label>
                              <div class="col-sm-10">
                                  <?php echo $user[0]['c_video']; ?>
                              </div></div>
                              
                              
                              <?php }  ?>
                              
                                 <?php  if($user[0]['is_iframe'] == '1')
						{
						   ?>
                              <h4 class="mb"><i class="fa fa-angle-right"></i> Iframe Management: </h4>
                              	<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">IFrame Start Date</label>
                              <div class="col-sm-10">
                                  <?php echo $user[0]['ifr_start_date']; ?>
                              </div></div>
                              	<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">IFrame End Date</label>
                              <div class="col-sm-10">
                                  <?php echo $user[0]['ifr_end_date']; ?>
                              </div></div>
                              
                                <?php }  ?>
                              
                              <?php  if($user[0]['is_tablet'] == '1')
						{
						   ?> 
                              <h4 class="mb"><i class="fa fa-angle-right"></i> Tablet Management: </h4>
                              	<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tablet PIN</label>
                              <div class="col-sm-10">
                                  <?php echo $user[0]['tablet_pin']; ?>
                              </div></div>
                              
                                	<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tablet Start Date</label>
                              <div class="col-sm-10">
                                  <?php echo $user[0]['tab_start_date']; ?>
                              </div></div>
                              	<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tablet End Date</label>
                              <div class="col-sm-10">
                                  <?php echo $user[0]['tab_end_date']; ?>
                              </div> </div>
                			
                 <?php }  ?>
                 
                
                   
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



