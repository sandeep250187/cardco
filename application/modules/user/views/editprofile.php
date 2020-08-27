<?php  
$this->load->view('home/header');
 ?>
 
 
<div class="row page-heads" id="contents">
    <div class="container">
        <h4 class="text-center text-white">My Account</h4>
    </div>
</div>
<div class="row bg-grey">
    <div class="container pt-4 pb-4">
        <div class="row">
            <div class="col-sm-3">
                <h4>Booking Number</h4>
                <ul class="list-unstyled">
                    <li class="searchs-details">
                        <div class="search-icon">
                            <input type="text=" class="form-control">
                        </div>
                    </li>
                </ul>
                <ul class="my-account">
                    <li class="active"><a href="<?php echo base_url();?>user"><i class="fa fa-user"></i> My Profile</a></li>
                    <li class="active"><a href="<?php echo base_url();?>user/editprofile"><i class="fa fa-user"></i> Edit Profile</a></li>
                    <li class="active"><a href="<?php echo base_url();?>user/changepswdview"><i class="fa fa-user"></i>Change Password</a></li>
                    <li class="active"><a href="confirmed-last-30.html"><i class="fa fa-download"></i> Confirmed (Last 30 days)</a></li>
                    <li class=""><a href="cancellation.html"><i class="fa fa-file-archive-o"></i>  Cancellation charges (Next 7 days)</a></li>
                    <li class=""><a href="pending-payment.html"><i class="fa fa-file-archive-o"></i>Pending payment (Last 30 days)</a></li>
                </ul>
            </div>
            <div class="col-sm-9">
                 <div class="row">
                    <div class="table-responsive">
                    	<h4 class="text-primary"> Edit your Profile</h4>
                            <?php
                                 echo showmsg($this->session->flashdata('msg'));
                                  if(validation_errors()!=''){ ?>
                                    <div class="alert alert-danger">
                                       <?php if( isset($error))
                                           print($error);  
                                           echo validation_errors(); ?>
                                   </div>
                            <?php } ?>
                        <form action="<?php echo base_url();?>user/editprofile" method="post" enctype="multipart/form-data" >
					 <table class="table table-sm">
                            <tbody>
				           <?php 
						        $login =  getfrontCurUserID();
						        $userList = getMemberUserInfo($login);

							 ?>
                              <tr>
                                 <th colspan="2" style="color:gray;" class="text-center">Login Details</th>
                             </tr>
                             <tr>
                                    <th>Username</th> 
                                    <td><input type="text" name="uname" id="uname" value="<?php echo $userList['username']; ?>"></td> 
                                </tr>
                                <tr>
                                    <th>Password</th> 
                                     <td><?php echo $userList['password']; ?>  </td> 
                                </tr>
                                <tr>
                                    <th colspan="2" style="color:gray;" class="text-center">Personal Details</th>
                                </tr>  
                                <tr>
                                    <th>Company Name</th> 
                                    <td><input type="text" name="cname" id="cname" value="<?php echo $userList['comp_name']; ?>"> </td> 
                                </tr>
                                <tr>
                                    <th>First Name</th> 
                                    <td><input type="text" name="firstname" id="firstname" value="<?php echo $userList['fname']; ?>">
                                        <input type="hidden" name="regid" id="regid" value="<?php echo $userList['id']; ?>">
                                     </td> 
                                </tr>
                                <tr>
                                    <th>Middle Name</th> 
                                    <td><input type="text" name="midname" id="midname" value="<?php echo $userList['mname']; ?>"> </td> 
                                </tr>
                                <tr>
                                    <th>Last Name</th> 
                                    <td><input type="text" name="lastname" id="lastname" value="<?php echo $userList['lname']; ?>"> </td> 
                                </tr>
                                 <tr>
                                    <th>Email</th> 
                                    <td><?php echo $userList['email']; ?> </td> 
                                </tr>
                                 <tr>
                                    <th>Country</th> 
                                    <td>
                                        <select name="country" id="country">
                                            <?php  
                                                $cntry=getCountrylist();
                                                foreach($cntry as $country){
                                             ?>
                                            <option value="<?php echo $country['id']; ?>" <?php if($userList['country']==$country['id']){ echo "selected='selected'"; } ?>><?php  echo $country['country']; ?></option>
                                                        <?php } ?>
                                        </select>
                                    </td> 
                                </tr>
                                 <tr>
                                    <th>City</th> 
                                    <td>
                                        <select  name="city1" id="city1">
                                            <?php 
                                                $states=getCountryStatelist($userList['country']);
                                                 foreach($states as $state){
                                            ?>
                                             <option value="<?php echo $state['id']; ?>" <?php if($userList['city']==$state['countryId']){ echo "selected='selected'"; } ?>><?php  echo $state['state']; ?></option>
                                                        <?php } ?>
                                        </select>
                                    </td> 
                                </tr>
                                 <tr>
                                    <th>Address</th> 
                                    <td><input type="text" name="place" id="place" value="<?php echo $userList['address']; ?>"> </td> 
                                </tr>
                                <tr>
                                    <th>Pincode</th> 
                                    <td><input type="text" name="pincode" id="pincode" value="<?php echo $userList['pin']; ?>"> </td> 
                                </tr>
                                <tr>
                                    <th>Telephone</th> 
                                    <td><input type="text" name="landline" id="landline" value="<?php echo $userList['landline']; ?>"> </td> 
                                </tr>
                                <tr>
                                    <th>Mobile</th> 
                                    <td><input type="text" name="mobile" id="mobile" value="<?php echo $userList['mobile']; ?>"></td> 
                                </tr>
                                <tr>
                                    <th>About</th> 
                                    <td><input type="text" name="about" id="about" value="<?php echo $userList['about']; ?>"> </td> 
                                </tr>
                                <tr>
                                    <th>Xml</th> 
                                    <td><input type="text" name="xml" id="xml" value="<?php echo $userList['xml']; ?>"> </td> 
                                </tr>
                                 <tr>
                                    <th>Website</th> 
                                    <td><input type="text" name="website" id="website" value="<?php echo $userList['website']; ?>"></td> 
                                </tr> 
                                <tr>
                                    <th>Company Logo</th> 
                                    <td>
                                        <input type="file" name="companyimg" id="companyimg" value="<?php echo $userList['cimg']; ?>">
                                         <?php 
                                            if(!empty($userList['cimg'])) {
                                         ?> 
                                        <a href="<?php echo base_url() ."uploads/cimage/".$userList['cimg']."";  ?> " target="_blank">
                                        <?php echo "<img src='".base_url()."uploads/cimage/".$userList['cimg']."' width='100px;' height='71px;'>";
                                         ?></a>
                                        <?php } ?>
                                        <input type="hidden" name="cimg" value="<?php echo $userList['cimg']; ?>">
                                    </td> 
                                </tr>
                                <tr>
                                    <th>Founding Date</th> 
                                    <td><input type="text" name="fndate" id="fndate" value="<?php echo $userList['fdate']; ?>"></td> 
                                </tr>
                                <tr>
                                    <th>No. of staff</th> 
                                    <td><input type="text" name="staff" id="staff" value="<?php echo $userList['staf']; ?>"></td> 
                                </tr>
                                 <tr>
                                    <th colspan="2" style="color:gray;" class="text-center">PAN/GST Details</th>
                                </tr>
                                <tr>
                                    <th>Pan no.</th> 
                                    <td><input type="text" name="panno" id="panno" value="<?php echo $userList['pan']; ?>"> </td> 
                                </tr>
                                 <tr>
                                    <th>Gst no.</th> 
                                    <td><input type="text" name="gstno" id="gstno" value="<?php echo $userList['gst']; ?>"> </td> 
                                </tr>
                                 <tr>
                                    <th colspan="2" style="color:gray;" class="text-center">Contact Details(Account Department)</th>
                                </tr>
                                  <tr>
                                    <th>Name</th> 
                                    <td><input type="text" name="accname" id="accname" value="<?php echo $userList['acnt_name']; ?>"> </td> 
                                </tr>
                                 <tr>
                                    <th>Email</th> 
                                    <td><input type="text" name="accemail" id="accemail" value="<?php echo $userList['acnt_email']; ?>"> </td> 
                                </tr>
                                 <tr>
                                    <th>Mobile</th> 
                                    <td><input type="text" name="accmobile" id="accmobile" value="<?php echo $userList['acnt_mobile']; ?>"> </td> 
                                </tr>
                                <tr>
                                    <th colspan="2" style="color:gray;" class="text-center">Contact Details(Reservation/Operation Department)</th>
                                </tr>
                                 <tr>
                                    <th>Name</th> 
                                    <td><input type="text" name="resvname" id="resvname" value="<?php echo $userList['resv_name']; ?>"> </td> 
                                </tr>
                                 <tr>
                                    <th>Email</th> 
                                    <td><input type="text" name="resvemail" id="resvemail" value="<?php echo $userList['resv_email']; ?>"> </td> 
                                </tr>
                                 <tr>
                                    <th>Mobile</th> 
                                    <td><input type="text" name="resvmobile" id="resvmobile" value="<?php echo $userList['resv_mobile']; ?>"> </td> 
                                </tr>
                                 <tr>
                                    <th colspan="2" style="color:gray;" class="text-center">Contact Details(Management Department)</th>
                                </tr>
                                <tr>
                                    <th>Name</th> 
                                    <td><input type="text" name="managename" id="managename" value="<?php echo $userList['manage_name']; ?>"> </td> 
                                </tr>
                                 <tr>
                                    <th>Email</th> 
                                    <td><input type="text" name="manageemail" id="manageemail" value="<?php echo $userList['manage_email']; ?>"> </td> 
                                </tr>
                                 <tr>
                                    <th>Mobile</th> 
                                    <td><input type="text" name="managemobile" id="managemobile" value="<?php echo $userList['manage_mobile']; ?>"> </td> 
                                </tr>
                                 <tr>
                                    <th colspan="2" style="color:gray;" class="text-center">Reference Code</th>
                                </tr>
                                <tr>
                                    <th>Code</th> 
                                    <td><input type="text" name="refcode" id="refcode" value="<?php echo $userList['marketing_name']; ?>"> </td> 
                                </tr>
								  
							 </tbody>
						</table>
                        <button "name="update" id="update" class="btn btn-primary">Update</button>
                    </form>
					 </div>
					  
                </div>
            </div>
        </div>
    </div>
</div>
   
	 
	<?php $this->load->view('home/footer'); ?>
    <script src="<?php echo base_url();?>assets/js/common/register_function.js"></script>
     
	 
 