<?php $this->load->view(ADMIN_FOLDER.'/header');
      $this->load->view(ADMIN_FOLDER.'/right-sidebar');
?>
<!--middle contaen-->
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> User Management</h3>
		<?php 
		echo showmsg($this->session->flashdata('msg'));
		?>		
		  	
		  	<div class="row mt">
              <div class="col-lg-12">
                      <div class="content-panel">
						  <h4><i class="fa fa-angle-right"></i> Users List</h4>
						<?php 
						 $attrib = array('class'=>'form-inline'); 
						echo form_open(current_url(),$attrib); ?>
						<div class="col-sm-5" align="right" style="margin-left:50%;margin-bottom:20px;">
							Type Here : <input type="text" class="form-control" name="search" id="search" required>
						</div>
						<div class="col-sm-1" align="left">
							<button class="btn btn-theme custom_blue_btn" type="submit">Search</button>
						</div>
						<?php echo form_close(); ?>
							<section id="no-more-tables">
                              <table class="table table-bordered table-striped table-condensed cf">
                                  <thead class="cf">
                                  <tr>
                                      <th>SL#</th>
                                      <th >First Name</th>
				      <th>Last Name</th>
                                      <th class="numeric">Phone</th>
				       <th>Email</th>
				       <th>Username</th>
				      <th><i class=" fa fa-edit"></i> Action</th>
                                  </tr>
                                  </thead>
				  <?php 
				
				  if(is_array($user)){ ?>
        <?php $i=++$page;?>
                                  <tbody>
				      <?php 
				 
				      foreach($user as $row){ 
					  ?>
                                  <tr>
                                      <td data-title="SL#"><?php echo $i ; ?></td>
                                      <td data-title="First Name"><?php echo $row['user_fname'] ; ?></td>
				       <td data-title="Last Name"><?php echo $row['user_lname'] ; ?></td>
                                      <td class="numeric" data-title="Phone"><?php echo $row['user_phone'] ; ?></td>
                                      <td data-title="Email"><?php echo $row['user_email'] ; ?></td>
                                      <td data-title="Username"><?php echo $row['username'] ; ?></td>
				   <td data-title="Action">
					  
					  <?php if($row['user_id'] != 1) { ?>
					  <?php  if($row['user_status']){ ?>
					  <a href="<?php echo ADMIN_URL. "user/status/".$row['user_id']."/0/".($page-1);?>" class="btn btn-success btn-xs"  title="Enable" onclick="return confirm('Are you sure you want to disable <?php echo $row['user_fname'].'&nbsp;'.$row['user_lname'] ; ?>?');">
		<i class="fa fa-check"></i>
					  </a>
            <?php } else {?>
		<a class="btn btn-warning btn-xs" href="<?php echo ADMIN_URL. "user/status/".$row['user_id']."/1/".($page-1);?>"  title="Disable" onclick="return confirm('Are you sure you want to enable <?php echo $row['user_fname'].'&nbsp;'.$row['user_lname'] ; ?>?');"> 
		    <i class="fa fa-check"></i></a>
			<?php
					}
				}
				if($row['user_id']!=1) {
				 if($row['block_status']==0){
			?>
			<a  href="<?php echo ADMIN_URL. "user/block/".$row['user_id']."/1/".($page-1);?>" <?php if(empty($row['lock_row'])){ ?>  onclick="return confirm('Are you sure you want to block <?php echo $row['user_fname'].'&nbsp;'.$row['user_lname'] ; ?>?');" <?php } ?> title="Block"><i class="fa fa-ban fa-fw"></i></a>
			<?php }
			else {
			?>
			<a class="btn btn-danger btn-xs" href="<?php echo ADMIN_URL. "user/block/".$row['user_id']."/0/".($page-1);?>" <?php if(empty($row['lock_row'])){ ?>  onclick="return confirm('Are you sure you want to unblock <?php echo $row['user_fname'].'&nbsp;'.$row['user_lname'] ; ?>?');" <?php } ?> title="Unblock"><i class="fa fa-ban fa-fw"></i></a>
			<?php } } ?>
			<a class="btn btn-primary btn-xs"  href="<?php echo ADMIN_URL. "user/edit/".$row['user_id']."/".($page-1);?>" onclick="return confirm('Are you sure you want to edit <?php echo $row['user_fname'].'&nbsp;'.$row['user_lname'] ; ?>?');" title="Edit" ><i class="fa fa-pencil"></i></a>
			
			<?php if($row['user_id']!=1) {
			$deleteUrl =  (empty($row['lock_row']))?(ADMIN_URL. "user/delete/".$row['user_id']."/".($page-1)):"javascript:alert('Remove Not Allowed For ".$row['user_fname'].'&nbsp;'.$row['user_lname']."')"; ?>
					    <a class="btn btn-danger btn-xs" href="<?php echo $deleteUrl;?>" <?php if(empty($row['lock_row'])){ ?>  onclick="return confirm('Are you sure you want to remove <?php echo $row['user_fname'].'&nbsp;'.$row['user_lname'] ; ?>?');" <?php } ?> title="Remove"><i class="fa fa-trash-o "></i></a>
			<?php  } 
			?>
			 
					   
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
$this->load->view(ADMIN_FOLDER.'/footer');
?>
  </body>
</html>