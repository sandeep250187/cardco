<?php  $this->load->view('home/header'); ?>
 
 
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
                 <div class="col-sm-12">
                       <h4 class="text-primary head page-header">My Profile</h4>
                    <div class="table-responsive">
					 <table class="table table-sm table-bordered">
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
									<td><?php echo $userList['username']; ?></td> 
                                </tr>
								 <tr>
									<th>Password</th> 
									<td><?php echo $userList['password']; ?></td> 
                                </tr>
                                 <tr>
                                    <th colspan="2" style="color:gray;" class="text-center">Personal Details</th>
                                </tr>
                                 <tr>
                                    <th>Company Name</th> 
                                    <td><?php echo $userList['comp_name']; ?></td> 
                                </tr>
                                <tr>
                                    <th>First Name</th> 
                                    <td><?php echo $userList['fname']; ?></td> 
                                </tr>
                                <tr>
                                    <th>Middle Name</th> 
                                    <td><?php echo $userList['mname']; ?></td> 
                                </tr>
                                <tr>
                                    <th>Last Name</th> 
                                    <td><?php echo $userList['lname']; ?></td> 
                                </tr>
                                 <tr>
                                    <th>Email</th> 
                                    <td><?php echo $userList['email']; ?></td> 
                                </tr>
                                 <tr>
                                    <th>Country</th> 
                                    <td>
                                        <?php 
                                            $cntry=getCountrylistById($userList['country']);
                                            foreach($cntry as $country){
                                                echo $country['country'];
                                            }
                                         ?>
                                    </td> 
                                </tr>
                                 <tr>
                                    <th>City</th> 
                                    <td>
                                        <?php 
                                            $states=getCountryStatelistById($userList['city']);
                                            foreach($states as $state){
                                                echo $state['state'];
                                            }
                                         ?>
                                    </td> 
                                </tr>
                                 <tr>
                                    <th>Address</th> 
                                    <td><?php echo $userList['address']; ?></td> 
                                </tr>
                                <tr>
                                    <th>Pincode</th> 
                                    <td><?php echo $userList['pin']; ?></td> 
                                </tr>
                                <tr>
                                    <th>Telephone</th> 
                                    <td><?php echo $userList['landline']; ?></td> 
                                </tr>
                                <tr>
                                    <th>Mobile</th> 
                                    <td><?php echo $userList['mobile']; ?></td> 
                                </tr>
                                <tr>
                                    <th>About</th> 
                                    <td><?php echo $userList['about']; ?></td> 
                                </tr>
                                <tr>
                                    <th>Xml</th> 
                                    <td><?php  if($userList['xml']=='0'){ echo "No"; }else{echo "Yes"; } ?></td> 
                                </tr>
                                 <tr>
                                    <th>Website</th> 
                                    <td><?php echo $userList['website']; ?></td> 
                                </tr>
                                 <tr>
                                    <th>Company Logo</th> 
                                    <td>
                                         <?php 
                                            if(!empty($userList['cimg'])) {
                                         ?> 
                                        <a href="<?php echo base_url() ."uploads/cimage/".$userList['cimg']."";  ?> " target="_blank">
                                        <?php echo "<img src='".base_url()."uploads/cimage/".$userList['cimg']."' width='100px;' height='71px;'>";
                                         ?></a>
                                        <?php } ?>
                                </td> 
                                </tr>
                                 <tr>
                                    <th>Founding Date</th> 
                                    <td><?php echo $userList['fdate']; ?></td> 
                                </tr>
                                <tr>
                                    <th>No. of staff</th> 
                                    <td><?php echo $userList['staf']; ?></td> 
                                </tr>
                                 <tr>
                                    <th colspan="2" style="color:gray;" class="text-center">PAN/GST Details</th>
                                </tr>
                                <tr>
                                    <th>Pan no.</th> 
                                    <td><?php echo $userList['pan']; ?></td> 
                                </tr>
                                 <tr>
                                    <th>Gst no.</th> 
                                    <td><?php echo $userList['gst']; ?></td> 
                                </tr>
                                 <tr>
                                    <th colspan="2" style="color:gray;" class="text-center">Contact Details(Account Department)</th>
                                </tr>
                                  <tr>
                                    <th>Name</th> 
                                    <td><?php echo $userList['acnt_name']; ?></td> 
                                </tr>
                                 <tr>
                                    <th>Email</th> 
                                    <td><?php echo $userList['acnt_email']; ?></td> 
                                </tr>
                                 <tr>
                                    <th>Mobile</th> 
                                    <td><?php echo $userList['acnt_mobile']; ?></td> 
                                </tr>
                                <tr>
                                    <th colspan="2" style="color:gray;" class="text-center">Contact Details(Reservation/Operation Department)</th>
                                </tr>
                                 <tr>
                                    <th>Name</th> 
                                    <td><?php echo $userList['resv_name']; ?></td> 
                                </tr>
                                 <tr>
                                    <th>Email</th> 
                                    <td><?php echo $userList['resv_email']; ?></td> 
                                </tr>
                                 <tr>
                                    <th>Mobile</th> 
                                    <td><?php echo $userList['resv_mobile']; ?></td> 
                                </tr>
                                 <tr>
                                    <th colspan="2" style="color:gray;" class="text-center">Contact Details(Management Department)</th>
                                </tr>
                                <tr>
                                    <th>Name</th> 
                                    <td><?php echo $userList['manage_name']; ?></td> 
                                </tr>
                                 <tr>
                                    <th>Email</th> 
                                    <td><?php echo $userList['manage_email']; ?></td> 
                                </tr>
                                 <tr>
                                    <th>Mobile</th> 
                                    <td><?php echo $userList['manage_mobile']; ?></td> 
                                </tr>
                                 <tr>
                                    <th colspan="2" style="color:gray;" class="text-center">Reference Code</th>
                                </tr>
                                <tr>
                                    <th>Code</th> 
                                    <td><?php echo $userList['marketing_name']; ?></td> 
                                </tr>
                                 
							 </tbody>
						</table>
					 </div>
                </div>
            </div>
        </div>
    </div>
</div>
   
	 
	<?php $this->load->view('home/footer'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script src="js/crawler.js"></script>
    <script>
    $('#nav').affix({
        offset: {
            top: $('.search').height()
        }
    });
    </script>
    <script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
   </body>
</html>