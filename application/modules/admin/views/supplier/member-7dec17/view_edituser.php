<?php $this->load->view(SUPPLIER_FOLDER.'/header');
      $this->load->view(SUPPLIER_FOLDER.'/right-sidebar');
?>
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Edit Dentist</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	  
			  <?php $attributes = array('class' => 'form-horizontal style-form input_from_custom', 'id' => 'user-form', 'name' => 'user-form' ,'enctype'=>'multipart/form-data'); ?>
                         <?php echo form_open(current_url(), $attributes ); ?>
		      <?php if(validation_errors()!=''){ ?> 
				<div class="alert alert-danger">
			<?php if( isset($error)) print($error); ?>
                       <?php echo validation_errors(); ?>
                </div>
		<?php } ?>
		<?php if(isset($msg)){ echo'<div style="color:green">'.$msg.'</div>';}?>
                     <h4 class="mb"><i class="fa fa-angle-right"></i> General Information</h4>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">First Name<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                   <input type="text" class="required form-control" value="<?php echo  $user[0]['fname']; ?>"  name="fname" >
                                   <input type="hidden" class="" value="<?php echo  $user[0]['id']; ?>" name="user_id" >
                              </div>
                          </div>
						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Last Name</label>
                              <div class="col-sm-10">
                                   <input type="text" class="form-control" value="<?php echo  $user[0]['lname']; ?>"  name="lname" >
                              </div>
                          </div>
			
			  
						<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Email Address<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input class="required form-control" name="user_email" type="email" maxlength="80" size="30" value="<?php echo $user[0]['email']; ?>" >
                              </div>
                          </div>
						 <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Credits<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input class="required form-control" name="credits" type="text" maxlength="80" size="30" value="<?php echo $user[0]['credits']; ?>" >
                              </div>
                          </div>
						<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Location</label>
                              <div class="col-sm-10">
                                  <input class="required form-control" name="location" type="text" maxlength="200" size="30" value="<?php echo $user[0]['location']; ?>" >
                              </div>
                        </div>
						<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Mobile Number</label>
                              <div class="col-sm-10">
                                  <input class="required form-control" name="mobile" type="text" maxlength="200" size="30" value="<?php echo $user[0]['mobile']; ?>" >
                              </div>
                        </div>
						<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Experience</label>
                              <div class="col-sm-10">
                                  <input class="required form-control" name="experience" type="text" maxlength="200" size="30" value="<?php echo $user[0]['experience']; ?>" >
                              </div>
                        </div>
						<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">About Me</label>
                              <div class="col-sm-10">
                                  <textarea class="required form-control" name="description"><?php echo $user[0]['description']; ?></textarea>
                              </div>
                         </div>
				    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Product File Name</label>
                        <div class="col-md-10">
                            <input type="file" name="profile_pic" accept="image/*" class="form-control">
                            <?php 
							$path_parts=$user[0]['profile_pic'];
							$ext = pathinfo($path_parts, PATHINFO_EXTENSION);
														
					if(!empty($user[0]['profile_pic']) and $ext == 'mp4') {
						 ?> <a href="<?php echo base_url() ."uploads/member/".$user[0]['profile_pic']."";  ?> " target="_blank">
						<?php echo "<img src='".base_url()."icons/video.png' width='60px;' height='60px;'>";	
						?>
                        </a>
                        <?php			
					}
					elseif($ext == 'pdf')
					{ ?> <a href="<?php echo base_url() ."uploads/member/".$user[0]['profile_pic']."";  ?> " target="_blank">
						<?php echo "<img src='".base_url()."icons/pdf.png' width='60px;' height='60px;'>";	
						?>
                        </a>
                        <?php	
					}
					elseif($ext == 'doc' or $ext == 'docx')
					{
						 ?> <a href="<?php echo base_url() ."uploads/member/".$user[0]['profile_pic']."";  ?> " target="_blank">
						<?php echo "<img src='".base_url()."icons/word.jpg' width='60px;' height='60px;'>";	
						?>
                        </a>
                        <?php	
					}
					elseif($ext == 'mp3')
					{
						 ?> <a href="<?php echo base_url() ."uploads/member/".$user[0]['profile_pic']."";  ?> " target="_blank">
						<?php echo "<img src='".base_url()."icons/audio.png' width='60px;' height='60px;'>";	
						?>
                        </a>
                        <?php	
					}
					elseif($ext == 'png' or $ext == 'jpg' or $ext == 'jpeg')
					{
						 ?> <a href="<?php echo base_url() ."uploads/member/".$user[0]['profile_pic']."";  ?> " target="_blank">
						<?php echo "<img src='".base_url()."/uploads/member/".$user[0]['profile_pic']."' width='60px;' height='60px;'>";
						?>
                        </a>
                        <?php
					}
					 ?>
                            <input type="hidden" name="h_img" value="<?php echo $user[0]['profile_pic']; ?>"> </div>
                    </div>
			 
			       <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Old Password</label>
                              <div class="col-sm-10">
                                  <input type="text" readonly id="pswd_one_change" minlength="6" value="<?php echo  $user[0]['org_password']; ?>"  class="form-control"   name="user_password" >
                              </div>
                          </div>
                     
                     <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">New Password</label>
                              <div class="col-sm-10">
                                  <input type="password" class="form-control" minlength="6" name="new_password">
                              </div>
                      </div>
		     
					<h4 class="mb"><i class="fa fa-angle-right"></i> Iframe Management: </h4>
						
						<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Iframe Form Video</label>
                              <div class="col-sm-10">
                                  <pre><kbd>&lt;iframe src="<?php echo base_url().'iframe/dentist/'.base64url_encode($user[0]['id']); ?><?php echo $user[0]['id']; ?>"&gt;&lt;/iframe&gt;</kbd></pre>
                              </div>
                          </div>
						<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Iframe Form Video</label>
                              <div class="col-sm-10">
								<input class="required form-control" name="iframe_form_video" type="text" maxlength="200" size="30" value="<?php echo  $user[0]['iframe_form_video']; ?>" >
                                  
                              </div>
                          </div>
						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Iframe Form Description</label>
                              <div class="col-sm-10">
							  <textarea class="required form-control" name="iframe_form_desc" maxlength="80" size="30"><?php echo  $user[0]['iframe_form_desc']; ?></textarea>
                                  
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


<?php $this->load->view(SUPPLIER_FOLDER.'/footer'); ?>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/common/jquery.validate.js"></script>
<script>
$().ready(function() {
	$("#user-form").validate({
           
	});
});
</script>
  </body>
</html>