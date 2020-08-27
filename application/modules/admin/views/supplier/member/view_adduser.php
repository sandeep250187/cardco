<?php $this->load->view(SUPPLIER_FOLDER.'/header');
      $this->load->view(SUPPLIER_FOLDER.'/right-sidebar');
?>  
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Add Dentist</h3>

          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">  
			  <?php $attributes = array( 'class' => 'form-horizontal style-form input_from_custom', 'id' => 'user-form', 'name' => 'user-form' ,'enctype'=>'multipart/form-data'  ); ?>
                          <?php echo form_open(current_url(), $attributes ); ?>
		      <?php if(validation_errors()!=''){ ?> 
		  <div class="alert alert-danger">
			<?php if( isset($error)) print($error); ?>
                       <?php echo validation_errors(); ?>
                  </div>
		<?php } ?>
                     <h4 class="mb"><i class="fa fa-angle-right"></i> General Information</h4>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">First Name<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input type="text" class="required form-control" value="<?php echo  $this->input->post('fname'); ?>"  name="fname" >
                              </div>
                          </div>
						  
						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Last Name</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" value="<?php echo  $this->input->post('lname'); ?>"  name="lname" >
                              </div>
                          </div>
								  
						<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Email Address<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input class="required form-control" name="user_email" autocomplete="false" type="email" maxlength="80" size="30" value="<?php echo $this->input->post('user_email'); ?>" >
                              </div>
                          </div>
						<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Credits</label>
                              <div class="col-sm-10">
                                 <input class="required form-control" name="credits" autocomplete="false" type="number" maxlength="80" size="30" value="<?php echo $this->input->post('credits'); ?>" >
                              </div>
                        </div>	
						
                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">User Name<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" value="<?php echo  $this->input->post('username'); ?>"  name="username" >
                              </div>
                          </div>
                        		<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Password<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input type="password" id="pswd_one_change" minlength="6"  class="required form-control"   name="password" value="<?php echo $this->input->post('password'); ?>" />
                              </div>
                          </div>
                     
						<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Retype Password<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input type="password" class="required form-control" minlength="6" name="org_password" value="<?php echo $this->input->post('org_password'); ?>" />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Office Address<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
							  <textarea class="required form-control" name="location"><?php echo $this->input->post('location'); ?></textarea>
                              </div>
                        </div>
						<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Mobile Number<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input class="required form-control" name="mobile" type="text" maxlength="200" size="30" value="<?php echo $this->input->post('mobile'); ?>" >
                              </div>
                        </div>
						<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Office Phone Number<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input class="required form-control" name="office_phone_number" type="text" maxlength="200" size="30" value="<?php echo $this->input->post('office_phone_number'); ?>" >
                              </div>
                        </div>
						
						<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">About Me</label>
                              <div class="col-sm-10">
                                  <textarea class="required form-control" name="description"><?php echo $this->input->post('description'); ?></textarea>
                              </div>
                         </div>
						<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Member Profile Picture</label>
                        <div class="col-md-10">
                            <input type="file" name="profile_pic" accept="image/*" class="form-control"> </div>
                         </div>
			 	  
				  
				  <!-- for both iframe and tablet--->
                  <h4 class="mb"><i class="fa fa-angle-right"></i> Iframe/Tablet Management: </h4>
                  <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">For IFrame</label>
                        <div class="col-md-10">
                            <label>Yes</label><input type="radio" name="is_iframe" class="iframe" id="iframe" value="1" id="iframe" />
                            <label>No</label><input type="radio" name="is_iframe" id="iframe" class="iframe"  value="0" id="iframe" checked />
                           </div>
                           </div>
                            <div id="tblB" style="DISPLAY: none">                     
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">IFrame Start Date<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input class="form-control" name="ifr_start_date" type="text" id='datepicker3'  value="<?php echo $this->input->post('ifr_start_date'); ?>" >
                              </div>
                        </div>
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">IFrame End Date<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input class="form-control" name="ifr_end_date" type="text" id='datepicker4'  value="<?php echo $this->input->post('ifr_end_date'); ?>" >  </div>
                        </div>
                        </div>
                         
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">For Tablet</label>
                        <div class="col-md-10">
                            <label>Yes</label><input type="radio" name="is_tablet" class="iframe" id="tablet"  value="1" id="tablet" />
                            <label>No</label><input type="radio" name="is_tablet" class="iframe" id ="tablet" value="0" id="tablet" checked />
                           </div>
                         </div>
                       
                  <div id="tblC" style="DISPLAY: none">
                  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tablet PIN<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input class="form-control" name="tablet_pin" type="text" maxlength="200" size="30" value="<?php echo $this->input->post('tablet_pin'); ?>" >
                              </div>
                        </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tablet Start Date<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input class="form-control" name="tab_start_date" type="text" id='datepicker1'   value="<?php echo $this->input->post('tab_start_date'); ?>" >
                              </div>
                        </div>
                        
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tablet End Date<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input class="form-control" name="tab_end_date" type="text" id='datepicker2'  value="<?php echo $this->input->post('tab_end_date'); ?>" >
                              </div>
                        </div>
                      </div>
                       <!---   common fields  -->
                       <div id="showh4" style="DISPLAY: none">
                      <h4 class="mb"><i class="fa fa-angle-right"></i> Clinic Informations: </h4>
                  </div>
                       <div id="tblA" style="DISPLAY: none">  
                  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Clinic Name<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input class="required form-control" name="clinic_name" type="text" maxlength="200" size="30" value="<?php if($this->input->post('clinic_name')) {echo $this->input->post('clinic_name');}else echo 'Sleep Health Station'; ?>" >
                              </div>
                        </div>
                  <!--<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Clinic Description<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
								  <textarea class="required form-control" name="c_location"><?php if($this->input->post('c_location')) {echo $this->input->post('c_location');}else echo 'How was your morning today? You are not the only one who doesn\'t wake up feeling refreshed.Let\'s learn why.'; ?></textarea>
                              </div>
                        </div>
                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Clinic Email<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input class="required form-control" name="c_email" type="text" maxlength="200" size="30" value="<?php //echo $this->input->post('c_email'); ?>" >
                              </div>
                        </div>
                             <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Clinic Phone<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input class="required form-control" name="c_phone" type="text" maxlength="200" size="30" value="<?php //echo $this->input->post('c_phone'); ?>" >
                              </div>
                        </div>
                         <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Clinic Video<span class="red_asterisk">*</span></label>
                        <div class="col-md-10">
						<input class="required form-control" name="c_video" type="text" maxlength="200" size="30" value="<?php if($this->input->post('c_video')) {echo $this->input->post('c_video');}else echo base_url().'uploads/member/WholeYouPatientEducationVideoShort.mp4'; ?>" >
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
		</section>
      </section><!-- /MAIN CONTENT -->
<!--main content end-->
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
    $( "#datepicker1" ).datepicker({ dateFormat: 'yy-mm-dd'}).val();
  } );
   $( function() {
    $( "#datepicker2" ).datepicker({ dateFormat: 'yy-mm-dd'}).val();
  } );
   $( function() {
    $( "#datepicker3" ).datepicker({ dateFormat: 'yy-mm-dd'}).val();
  } );
   $( function() {
    $( "#datepicker4" ).datepicker({ dateFormat: 'yy-mm-dd'}).val();
  } );
    </script>
  </body>
</html>