<?php $this->load->view(SUPPLIER_FOLDER.'/header');
      $this->load->view(SUPPLIER_FOLDER.'/right-sidebar');
?>
<!--middle contaen-->
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Gallery Management</h3>
		<?php 
		echo showmsg($this->session->flashdata('msg'));
		?>		
		  	
		  	<div class="row mt">
              <div class="col-lg-12">
                      <div class="content-panel">
						  <h4><i class="fa fa-angle-right"></i> Gallery List</h4>
						   <?php 
						 $attrib = array('class'=>'form-inline','style'=>'margin-bottom:15px;'); 
						echo form_open(current_url(),$attrib); ?>
						<div class="form-group">
							 <select name="username" id="username" class="form-control custom-select">
							<option value="">-Username-</option>
								  <?php
                              $users = getUserlist();
							  if(!empty($users)){
							  foreach($users as $usr){
								if($username!='null' && $username==$usr['username']){
								   $selec_u = "selected='true'";
							      }
							      else { $selec_u = ""; }
								echo "<option value='".$usr['username']."' ".$selec_u.">".$usr['full_name']."</option>";
							  }
							  }							  
							  ?>
							</select>
							
						</div>
						<span class="label label-info">OR</span>
						<div class="form-group">
							 <select name="email" id="email" class="form-control custom-select">
							<option value="">-Email-</option>
								  <?php
                              $users = getUserlist();
							  if(!empty($users)){
							  foreach($users as $usr){
								  if($email!='null' && $email==$usr['email']){
								   $selec_u = "selected='true'";
							      }
							      else { $selec_u = ""; }
								echo "<option value='".$usr['email']."' $selec_u>".$usr['email']."</option>";  
							  }
							  }							  
							  ?>
							</select>
							 
						</div>
						
						<div class="form-group" align="left">
							<button class="btn btn-theme custom_blue_btn" type="submit" name="search">Search</button>
							<button class="btn btn-theme custom_blue_btn" type="reset" onclick="window.location='<?php echo base_url() ?>supplier/album/gallery';" name="search">Reset</button>
						</div>
						<?php echo form_close(); ?>
							<section id="no-more-tables">
                              <table class="table table-bordered table-striped table-condensed cf">
                                  <thead class="cf">
                                  <tr>
                                      <th>SL#</th>
                                      <th>Full Name</th>
									  <th>Email</th>
				                      <th><i class=" fa fa-edit"></i> Action</th>
                                  </tr>
                                  </thead>
								<?php 
								//pr($user);die;
								if(is_array($user)){ ?>
								<?php $i=++$page;?>
                                  <tbody>
								  <?php 
							 
								  foreach($user as $row){ 
								  ?>
                                  <tr>
                                      <td data-title="SL#"><?php echo $i ; ?></td>
                                      <td data-title="Full Name"><?php echo $row['full_name'] ; ?></td>
                                      <td data-title="Email"><?php echo $row['email'] ; ?></td>
				   <td data-title="Action">
					  
					
			<a class="btn btn-primary btn-xs"  href="<?php echo SUPPLIER_URL. "album/image/".$row['id']."/".($page-1);?>" title="View" ><i class="fa fa-eye"></i></a>
			
					   
				      </td>
                                  </tr>
				      <?php $i++; } ?>
                       </tbody>
				  <tfoot>
        <tr>
          <td colspan="15"><div class="pagination custom_pagination"><?php echo $links; ?></div>
	  </td>
        </tr>
				  <?php }else{ ?>
        <tr>
          <td colspan="15">Record not available.</td>
        </tr>
        <?php  } ?>
                              </table>
                          </section>
                      </div><!-- /content-panel -->
                  </div><!-- /col-lg-12 -->
              </div><!-- /row -->

		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->


<!--content end-->
<?php 
$this->load->view(SUPPLIER_FOLDER.'/footer');
?>
<script type="text/javascript">
  $( function() {
	$("#username").customselect();
	$("#email").customselect();
  } );
  </script>
  </body>
</html>