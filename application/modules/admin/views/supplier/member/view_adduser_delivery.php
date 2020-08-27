<?php $this->load->view(SUPPLIER_FOLDER.'/header');
      $this->load->view(SUPPLIER_FOLDER.'/right-sidebar');
?>  
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Update Delivery Info <button class="btn btn-theme custom_blue_btn" type="button" onclick="window.history.go(-1);" style="float:right;">Go Back</button></h3>

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
							<?php 
							
								
								//print_r($userinfo);
								
							
							?>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Name<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input type="text" class="required form-control" value="<?php echo isset($userinfo[0]['name'])?$userinfo[0]['name']:''; ?>"  name="name" >
                              </div>
                          </div>
						
								  
						<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Email Address<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input class="required form-control" name="user_email" autocomplete="false" type="email" maxlength="80" size="30" value="<?php echo (isset($userinfo[0]['email']))?$userinfo[0]['email']:''; ?>" >
                              </div>
                          </div>
					
						
						<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Mobile Number<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input class="required form-control" name="mobile" type="tel" maxlength="200" size="30" value="<?php echo (isset($userinfo[0]['contactno']))?$userinfo[0]['contactno']:""; ?>" >
                              </div>
                        </div>
						<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Address<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                 <textarea name="address" id="address" class="required form-control"><?php echo (isset($userinfo[0]['address']))?$userinfo[0]['address']:""; ?></textarea>
                              </div>
                        </div>
						<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">City<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input class="required form-control" name="city" type="text" maxlength="200" size="30" value="<?php echo (isset($userinfo[0]['city']))?$userinfo[0]['city']:''; ?>" >
                              </div>
                        </div>
						<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">State<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input class="required form-control" name="state" id="state" type="text" maxlength="200" size="30" value="<?php echo (isset($userinfo[0]['state']))?$userinfo[0]['state']:''; ?>" >
                              </div>
                        </div>
						
						<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Country<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input class="required form-control" name="country" id="country" type="text" maxlength="200" size="30" value="<?php echo (isset($userinfo[0]['country']))?$userinfo[0]['country']:''; ?>" >
                              </div>
                        </div>
						<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Zip Code<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input class="required form-control" name="zipcode" id="zipcode" type="text" maxlength="8" size="30" value="<?php echo (isset($userinfo[0]['zip']))?$userinfo[0]['zip']:''; ?>" >
                              </div>
                        </div>
						
						<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <button class="btn btn-theme custom_blue_btn" type="submit" name="submit">Save</button>
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