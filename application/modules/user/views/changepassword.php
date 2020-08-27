<?php  
$this->load->view('home/header');
 ?>
 
 
<div class="row page-heads" id="contents">
    <div class="container">
        <h4 class="text-center text-white">My Accounts</h4>
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
               <h4 class="text-primary head page-header">Change Password</h4>
                    
				           <?php 
						        $login =  getfrontCurUserID();
						        $userList = getMemberUserInfo($login);
							 ?>
								<div class="form-row"> 
									<div class="col-sm-4 form-group">
								  
									 
									 <input type="text" class="form-control" name="currentpswd" id="currentpswd" placeholder="Enter your current password"/>
									 <input type="hidden" name="regid" id="regid" value="<?php echo $userList['id']; ?>">
									 </div></div>
									 <div class="form-row">
									 	<div class="col-sm-4 form-group">
								 
									 <input type="text" class="form-control" name="newpswd" id="newpswd"  placeholder="Enter your new password">  
									</div></div>
									<div class="form-row">
										<div class="col-sm-4 form-group">
					 <button "name="changepswd" id="changepswd" class="btn btn-warning btn-block">Change Password</button> 
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
	<script>
	$('#changepswd').click(function(){
	   var id = $('#regid').val();
	   var currentpswd = $('#currentpswd').val();
	   var newpswd = $('#newpswd').val();
	    $.ajax({
			url:'<?php echo base_url(); ?>user/changepassword',
            method:"POST",
            data:{id:id,currentpswd:currentpswd,newpswd:newpswd},
			success:function(data)
            {
			   if(data!=0){
				swal('Password change Successfully','','success');
			    window.location.href='<?php echo base_url(); ?>user';
			   }else{
				  swal('Your current password is not correct','','warning'); 
			   } 
        
            }
		})   
 });
	</script>
   </body>
</html>