<?php  
$this->load->view('home/header');
 ?>
 
 
 
<div class="row bg-grey">
    <div class="container">
         <a href="<?php echo base_url();?>user/back" type="submit "name="back" class="btn btn-warning btn-xs">Back</a>
        <div class="row">

            <div class="col-sm-9">
                 <div class="col-sm-12">
                    <div class="table-responsive">
					 <table class="table table-condensed table-bordered">
                            <tbody>
				           <?php 
						        $login =  getfrontCurUserID();
						        $userList = getMemberUserInfo($login);
							 ?>
								<tr>
									<th>Name</th> 
									<td><?php echo $userList['fname']; ?></td> 
                                </tr>
								<tr>
                                    <th>Email</th> 
									<td><?php echo $userList['email']; ?></td> 
                                </tr>
								<tr>
									<th>mobile</th> 
									<td><?php echo $userList['mobile']; ?></td> 
                                </tr>
								<tr>
									<th>Password</th> 
									<td><?php echo $userList['password']; ?></td> 
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