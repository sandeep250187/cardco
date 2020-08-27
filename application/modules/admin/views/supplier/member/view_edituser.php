<?php $this->load->view(SUPPLIER_FOLDER.'/header');
      $this->load->view(SUPPLIER_FOLDER.'/right-sidebar');
?>
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Edit Dentist <button class="btn btn-theme custom_blue_btn" type="button" onclick="window.history.go(-1);" style="float:right;">Go Back</button></h3>
          	
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
        
       <?php if($this->session->flashdata('message')){ ?>
 <div class="alert alert-danger">
<?php echo $this->session->flashdata('message'); ?>
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
                              <label class="col-sm-2 col-sm-2 control-label">User Name<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" value="<?php echo  $user[0]['username']; ?>"  name="username" readonly  >
                              </div>
                          </div>
			  
						<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Email Address<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input class="required form-control" name="user_email" type="email" maxlength="80" size="30" value="<?php echo $user[0]['email']; ?>" >
                              </div>
                          </div>
						 <!-- <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Credits<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input class="required form-control" name="credits" type="text" maxlength="80" size="30" value="<?php //echo $user[0]['credits']; ?>" >
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">User Name<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" value="<?php //echo $user[0]['username']; ?>"  name="username" readonly="readonly" >
                              </div>
                          </div>-->
                            <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Old Password</label>
                              <div class="col-sm-10">
                                  <input type="text" readonly id="pswd_one_change" minlength="6" value="<?php echo  $user[0]['org_password']; ?>"  class="form-control"   name="user_password"  readonly="readonly">
                              </div>
                          </div>
                     
                     <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">New Password</label>
                              <div class="col-sm-10">
                                  <input type="password" class="form-control" minlength="6" name="new_password">
                              </div>
                      </div>
						<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Office Address</label>
                              <div class="col-sm-10">
							  <textarea class="required form-control" name="location"><?php echo $user[0]['location']; ?></textarea>
                              </div>
                        </div>
						<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Mobile Number</label>
                              <div class="col-sm-10">
                                  <input class="required form-control" name="mobile" type="text" maxlength="200" size="30" value="<?php echo $user[0]['mobile']; ?>">
                              </div>
                        </div>
						<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Office Phone Number</label>
                              <div class="col-sm-10">
                                  <input class="required form-control" name="office_phone_number" type="text" maxlength="200" size="30" value="<?php echo $user[0]['office_phone_number']; ?>">
                              </div>
                        </div>
						<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">About Me</label>
                              <div class="col-sm-10">
                                  <textarea class="required form-control" name="description"><?php echo $user[0]['description']; ?></textarea>
                              </div>
                         </div>
				    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Profile Picture</label>
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
			 
			     
		     
					<h4 class="mb"><i class="fa fa-angle-right"></i> Iframe/Tablet Management: </h4>
						  <!-- for both iframe and tablet--->
                  <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Is IFrame</label>
                        <div class="col-md-10">
                        <?php  if($user[0]['is_iframe'] == '1')
						{
						   ?>
                            <label>Yes</label><input type="radio" name="is_iframe" class="iframe" id="iframe" value="1" id="iframe" checked />
                             <label>No</label><input type="radio" name="is_iframe" id="iframe" class="iframe"  value="0" id="iframe" />
                            
                            <?php } else { ?>
                            <label>Yes</label><input type="radio" name="is_iframe" class="iframe" id="iframe" value="1" id="iframe"/>
                            <label>No</label><input type="radio" name="is_iframe" id="iframe" class="iframe"  value="0" id="iframe" checked />
                            <?php }  ?>
                           </div>
                         </div>	
                          <div id="tblB"  <?php  if($user[0]['is_iframe'] == '0')
						{
						?>style="display:none;"<?php } ?>>                     
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">IFrame Start Date<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                              
                                  <input class="form-control" name="ifr_start_date" type="text" id='datepicker3'  value="<?php if($user[0]['ifr_start_date'] !='0000-00-00 00:00:00'){echo date('Y-m-d',strtotime($user[0]['ifr_start_date']));} ?>" >
                              </div>
                        </div>
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">IFrame End Date<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input class="form-control" name="ifr_end_date" type="text" id='datepicker4'  value="<?php if($user[0]['ifr_end_date'] !='0000-00-00 00:00:00'){echo date('Y-m-d',strtotime($user[0]['ifr_end_date']));} ?>" >  </div>
                        </div>
                        </div>
                        
				  <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Is Tablet</label>
                        <div class="col-md-10">
                          <?php  if($user[0]['is_tablet'] == '1')
						{
						   ?>
                            <label>Yes</label><input type="radio" name="is_tablet" class="iframe" id="tablet"  value="1" id="tablet" checked />
                             <label>No</label><input type="radio" name="is_tablet" class="iframe" id ="tablet" value="0" id="tablet" />
                             <?php } else { ?>
                             <label>Yes</label><input type="radio" name="is_tablet" class="iframe" id="tablet"  value="1" id="tablet" />
                            <label>No</label><input type="radio" name="is_tablet" class="iframe" id ="tablet" value="0" id="tablet" checked />
                            <?php }  ?>
                           </div>
                         </div>
                     <div id="tblC" <?php  if($user[0]['is_tablet'] == '0')
						{
						?>style="display:none;"<?php } ?>>
                  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tablet PIN<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input class="form-control" name="tablet_pin" type="text" maxlength="200" size="30" value="<?php echo $user[0]['tablet_pin']; ?>" >
                              </div>
                        </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tablet Start Date<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input class="form-control" name="tab_start_date" type="text" id='datepicker1' value="<?php if($user[0]['tab_start_date'] !='0000-00-00 00:00:00'){echo date('Y-m-d',strtotime($user[0]['tab_start_date']));} ?>" >
                              </div>
                        </div>
                       <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tablet End Date<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input class="form-control" name="tab_end_date" type="text" id='datepicker2'  value="<?php if($user[0]['tab_end_date'] !='0000-00-00 00:00:00'){echo date('Y-m-d',strtotime($user[0]['tab_end_date']));} ?>" >
                              </div>
                        </div>                         
                          
                      </div>    
                 
                         <!---   common fields  -->
                       <div id="showh4" style="display: none">
                      <h4 class="mb"><i class="fa fa-angle-right"></i> Clinic Informations: </h4>
                  </div>
                       <div id="tblA"   <?php if($user[0]['is_tablet'] == '0' && $user[0]['is_iframe'] == '0')
						{ ?> style="display:none;" <?php } ?>>  
                  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Clinic Name<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input class="required form-control" name="clinic_name" type="text" maxlength="200" size="30" value="<?php echo $user[0]['clinic_name']; ?>" >
                              </div>
                        </div>
                  <!--<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Clinic Description<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
								  <textarea class="required form-control" name="c_location"><?php echo $user[0]['c_location']; ?></textarea>
                              </div>
                        </div>
                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Clinic Email<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input class="required form-control" name="c_email" type="text" maxlength="200" size="30" value="<?php echo $user[0]['c_email']; ?>" >
                              </div>
                        </div>
                        <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Clinic Phone<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input class="required form-control" name="c_phone" type="text" maxlength="200" size="30" value="<?php echo $user[0]['c_phone']; ?>" >
                              </div>
                        </div>
                         <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Clinic Video<span class="red_asterisk">*</span></label>
                        <div class="col-md-10">
						<input class="required form-control" name="c_video" type="text" maxlength="200" size="30" value="<?php echo $user[0]['c_video']; ?>" >
                        </div>
                         </div>-->
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

  <?php 
      $this->load->view(SUPPLIER_FOLDER.'/footer');
     ?>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/common/jquery.validate.js"></script>
<script type="text/javascript">
$().ready(function() {
	$("#user-form").validate({
            rules: {
            pswd_second: {
            equalTo: "#pswd_one_change"
            }
            }
	});
});

/////////////new///
$(document).ready(function () {
    $('.iframe').on('click', function () {
        var value1 = $("[name=is_iframe]:checked").val();
		var value2 = $("[name=is_tablet]:checked").val();
		if(value1==1 && value2==1){
		show('tblB');show('tblC');show('tblA');
		show('showh4');
		}
		else{
			hide('tblB');hide('tblC');hide('tblA');
			hide('showh4');
			}
		if(value1==1 && value2!=1){
			show('tblB');show('tblA');
			show('showh4');
		}
		else{
			show('tblC'); show('tblA');
			show('showh4');
			}
		if(value1!=1 && value2!=1){
			hide('tblB');hide('tblC');hide('tblA');
			hide('showh4');
			}
		
    });
});
function show(id)
{
if (document.getElementById(id).style.display == 'none')
{
document.getElementById(id).style.display = '';
}
}
function hide(id)
{
document.getElementById(id).style.display = 'none';

}
  $( function() {
    $( "#datepicker1" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
  } );
   $( function() {
    $( "#datepicker2" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
  } );
   $( function() {
    $( "#datepicker3" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
  } );
   $( function() {
    $( "#datepicker4" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
  } );
    </script>
  </body>
</html>