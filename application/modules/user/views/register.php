<?php $this->load->view('home/header');?>

<div class="wrapper">
	<div class="content-wrapper">
		<section class="content card1 ">
			<div id="main-wrapper">
				<div class="container">
					<div class="row">
						<div class="col-sm-8 offset-md-2">
							<div class="register">
							<h2 class="text-center">Register</h2>
							 <?php
				                 echo showmsg($this->session->flashdata('msg'));
				                  if(validation_errors()!=''){ ?>
                    				<div class="alert alert-danger">
                       			       <?php if( isset($error))
										   print($error);  
                                           echo validation_errors(); ?>
                                   </div>
                    <?php } ?>
			                  
							<p class="subhead">Please fill all required fields <small class="pull-right">* Denotes Mandatory Fields</small></p>
								<div class="form-horizontal">
									<form name="register_form" id="register_form" method="post" action="<?php echo base_url(); ?>user/register" enctype="multipart/form-data" >
										<h4>Login Details</h4>
										<div class="form-row">
											<div class="col-sm-12 form-group">
												<label for="inputEmail">User Name*</label>
												<input type="text" class="form-control required" id="username" name="username" value="<?php echo  $this->input->post('username'); ?>" placeholder="User Name" autofocus>
											 </div>
										</div>
										<div class="form-row">
											<div class="col-sm-12 form-group">
												<label for="inputPassword">Password*</label>
												<input type="password" class="form-control required" id="pswd" name="password" value="<?php echo  $this->input->post('password'); ?>" placeholder="Password" autofocus>
											 </div>
											<div class="col-sm-12 form-group">
												<label for="inputPassword">Confirm Password*</label>
												<input type="password" name="cpassword" id="cpassword" class="form-control required" value="<?php echo  $this->input->post('cpassword'); ?>" placeholder="Confirm Password" autofocus>
											</div>
										</div>
										<h4>Personal Details</h4>
										<div class="form-row">
											<div class="col-sm-12 form-group">
												<label for="inputEmail">Company Name* </label>
												<input type="text" name="comp_name" value="<?php echo  $this->input->post('comp_name'); ?>" class="required form-control" id="companyname" placeholder="Company Name">
											 </div>
										</div>
										<div class="form-row">
											<div class="col form-group">
												<label for="inputPassword">First Name*</label>
												<input type="text" name="fname" value="<?php echo  $this->input->post('fname'); ?>" class="required form-control" id="fname" placeholder="First Name" >
											</div>
											<div class="col form-group">
												<label for="inputPassword">Middle Name</label>
												<input type="text" name="mname" id="mname" value="<?php echo  $this->input->post('mname'); ?>" class="form-control" placeholder="Middle Name">
											</div>
											<div class="col form-group">
												<label for="inputPassword">Last Name*</label>
												<input type="text" name="lname" id="lname" value="<?php echo  $this->input->post('lname'); ?>"  class="required form-control" placeholder="Last Name">
											 </div>
										</div>
										<div class="form-row">
											<div class="col-sm-12 form-group">
												<label for="inputPassword">Email*</label>
												<input type="text" name="regsemail" value="<?php echo  $this->input->post('regsemail'); ?>" class="required form-control" id="email2" onblur="checkemail();" placeholder="Email">
												 <span id="email_results"></span>
											</div>
										</div>
										 <div class="form-row">
											<div class="col form-group">
												<label for="inputPassword">Country*</label>
												<select name="country" id="country" class="required form-control custom-select">
													 <?php 
													 $cntry=getCountrylist();
													 foreach($cntry as $country){
													 ?>
													 <option value="<?php echo $country['id']; ?>"><?php echo $country['country']; ?></option>
													<?php } ?>
												</select>
											</div>
										  
											<div class="col form-group">
												<label for="inputPassword">City*</label>
												<select name="city1" id="city1" class="required form-control">
												 </select>
												 
											</div>
										 </div>
										<div class="form-row">
											<div class="col-sm-12 form-group">
												<label for="inputPassword">Address*</label>
												<textarea name="address" id="address" class="required form-control"><?php echo  $this->input->post('address'); ?></textarea>
											 </div>
										</div>
													<div class="form-row">
														<div class="col-sm-12 form-group">
															<label for="inputPassword">Pin Code/Zip Code/Postcode*</label>
															<input type="text" name="pin" value="<?php echo  $this->input->post('pin'); ?>" maxlength="8" class="required form-control" id="zipcode" placeholder="Pin">
														</div>
													</div>
													<div class="form-row">
														<div class="col form-group">
															<label for="inputPassword">Telephone</label>
															<input type="text" name="landline" value="<?php echo  $this->input->post('landline'); ?>" class="form-control" id="tele" placeholder="Telephone">
														</div>
														<div class="col form-group">
															<label for="inputPassword">Mobile Number*</label>
															<input type="text" name="mobile" value="<?php echo  $this->input->post('mobile'); ?>" maxlength="20" class="required form-control" id="phone" placeholder="Mobile Number" >
														</div>
													</div>
													<div class="form-row">
														<div class="col-sm-12 form-group">
															<label for="inputPassword">How did you hear about us*</label>
															<input type="text" name="about" value="<?php echo  $this->input->post('about'); ?>" class="required form-control" id="about" placeholder=" ">
														</div>
														<div class="col-sm-12 form-group">
															<label for="inputPassword">XML Link Technology?</label>
															<br>
															<label class="radio-inline">
															<input type="radio" name="xml" value="1" <?php if(isset($_REQUEST['xml']) && $_REQUEST['xml']=='1'){ echo "checked='checked'"; }    ?>>
															&nbsp;Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															<input type="radio" name="xml" value="0"  id="textfield3" <?php if(isset($_REQUEST['xml']) && $_REQUEST['xml']=='0'){ echo "checked='checked'"; }    ?>>
															&nbsp;No </label>
														</div>	
													</div>
													<div class="form-row">
														<div class="col form-group">
															<label for="inputPassword">Your Website</label>
															<input type="text" name="website" value="<?php echo  $this->input->post('website'); ?>" class="form-control" id="web" placeholder="">
														</div>
														<div class="col form-group">
															<label for="inputPassword">Company Logo(.jpeg,.png)<small>(For Print Voucher)</small></label>
															<input type="file" name="companyimage" accept="image/x-png,image/jpeg" value="<?php echo  $this->input->post('companyimage'); ?>" class="form-control">
															<input type="hidden" name="cimg" value="<?php echo  $this->input->post('companyimage'); ?>">
														</div>
													</div>
													<div class="form-row">
														<div class="col form-group">
															<label for="inputPassword">Founding Date *</label>
															<input type="text" name="fdate" value="<?php echo  $this->input->post('fdate'); ?>" class="required form-control" id="date" placeholder="Select Date" autocomplete ="off">
														</div>
														<div class="col form-group">
															<label for="inputPassword">Number Of Staff *</label>
															<input type="text" name="staf" value="<?php echo  $this->input->post('staf'); ?>" class="required form-control" id="staff" placeholder="No Of Staff">
														</div>
													</div>
													
													<h4>PAN/GST Detail</h4>
													
													<div class="form-row">
														<div class="col form-group">
															<label for="inputPassword">Enter PAN No* </label>
															<input type="text"name="pan" value="<?php echo  $this->input->post('pan'); ?>" class="required form-control" id="pan" placeholder=" " >
														</div>
														<div class="col form-group">
															<label for="inputPassword">Enter GST No </label>
															<input type="text" name="gst" class="required form-control" value="<?php echo  $this->input->post('gst'); ?>" id="gst" placeholder=" ">
														</div>
														
													</div>
													
													<h4>Contact Details</h4>
													<p class="subhead">Account Department</p>
													<div class="form-row">
														<div class="col-sm-12 form-group">
															<label for="inputPassword">Name </label>
															<input type="text"name="acnt_name" value="<?php echo  $this->input->post('acnt_name'); ?>" class="form-control" id="acnt_name" placeholder=" ">
														</div>
													</div>
													<div class="form-row">
														<div class="col form-group">
															<label for="inputPassword">Email</label>
															<input type="text" name="acnt_email" value="<?php echo  $this->input->post('acnt_email'); ?>" class="form-control" id="acnt_email" placeholder=" ">
														</div>
														<div class="col form-group">
															<label for="inputPassword">Mobile</label>
															<input type="text" name="acnt_mobile" value="<?php echo  $this->input->post('acnt_mobile'); ?>" class="form-control" id="acnt_mobile" placeholder=" ">
														</div>
													</div>
													<p class="subhead">Reservation/Operation Department</p>
													<div class="form-row">
														<div class="col-sm-12 form-group">
															<label for="inputPassword">Name </label>
															<input type="text" name="resv_name" value="<?php echo  $this->input->post('resv_name'); ?>" class="form-control" id="resv_name" placeholder=" ">
														</div>
													</div>
													<div class="form-row">
														<div class="col form-group">
															<label for="inputPassword">Email</label>
															<input type="text" name="resv_email" value="<?php echo  $this->input->post('resv_email'); ?>" class="form-control" id="resv_email" placeholder=" ">
														</div>
														<div class="col form-group">
															<label for="inputPassword">Mobile</label>
															<input type="text" name="resv_mobile" value="<?php echo  $this->input->post('resv_mobile'); ?>" class="form-control" id="resv_mobile" placeholder=" ">
														</div>
													</div>
													<p class="subhead">Management Department</p>
													<div class="form-row">
														<div class="col-sm-12 form-group">
															<label for="inputPassword">Name </label>
															<input type="text" name="manage_name" value="<?php echo  $this->input->post('manage_name'); ?>" class="form-control" id="manage_name" placeholder=" ">
														</div>
													</div>
													<div class="form-row">
														<div class="col form-group">
															<label for="inputPassword">Email</label>
															<input type="text" name="manage_email" value="<?php echo  $this->input->post('manage_email'); ?>" class="form-control" id="manage_email" placeholder=" ">
														</div>
														<div class="col form-group">
															<label for="inputPassword">Mobile</label>
															<input type="text" name="manage_mobile" value="<?php echo  $this->input->post('manage_mobile'); ?>" class="form-control" id="manage_mobile" placeholder=" ">
														</div>
													</div>
													<p class="subhead">Enter Reference Code</p>
													  <div class="form-row">
														<div class="col-md-12 form-group">
															<label for="inputPassword">Code </label>
															<input type="text" name="marketing_name" value="<?php echo  $this->input->post('marketing_name'); ?>" class="form-control" id="marketing_name" placeholder=" ">
														</div>
														</div>
													 <div class="form-row text-center">
														 
														 
															<div class="col form-group">
																<div id="imgparent">
																	<div id="imgdiv">
																		<p id="image_captcha"><?php echo $captchaImg; ?></p>
																	</div>
															 	</div>
															 <div class="col">
																<img id="reload" src="<?php echo base_url(); ?>assets/images_home/reload.png" /></div>
																<div class="col">
																	 <input placeholder="enter captcha text" id="captcha1" name="captcha" class=" form-control" value="" type="text">  
																  Enter the Text shown in Image

																</div>
															</div> 
														 
													<div class="form-row text-center">
														<div class="col-sm-12 form-group">
															<label class="checkbox-inline">
																<input type="checkbox" name="read" value="" checked="checked"  id="check">
															Yes,send me the B2B Specials newsletter, so that I can stay informed of the best promotion and news updates. </label>
														</div>
													</div>
													 
														<div class="col-sm-12 text-center">
															<input name="Save" type="submit" class="btn btn-warning custom-btn btn-block" id="register" value="Register"/>
													 
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
	         </div>
	         <?php $this->load->view('home/footer');?>
<script src="<?php echo base_url();?>assets/js/common/register_function.js"></script>
<!-- captcha refresh code -->
<script type="text/javascript">
	$(document).on("click","#reload",function(){
		 $.get('<?php echo base_url().'user/refresh'; ?>', function(data){
		 	 
		$('#image_captcha').html(data);
		});
	});
</script>>


<script type="text/javascript">
	$(document).ready(function() {
		 $("#country").customselect(); 
		$("#city1").customselect();
	 });
</script>
 
 
<script>
  $('#date').datepicker({
    inline: true,
    firstDay: 1,
    showOtherMonths: true,
    minDate:'0',
    maxDate:'30/11/2019',
    dateFormat: 'yy/mm/dd',
  }); 
</script> 		
