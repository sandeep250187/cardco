<?php $this->load->view(ADMIN_FOLDER.'/header');
      $this->load->view(ADMIN_FOLDER.'/right-sidebar');
?>
<!--middle contaen-->
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <?php
		  if(!empty($_POST)){
			  if(!empty($_POST['fname'])){
				$name = $_POST['fname'];  
			  }
			  else { $name = 0; }
			   if(!empty($_POST['email'])){
				$email = str_replace('@','_',$_POST['email']); 
			   }
			   else { $email = 0; }
			   if(!empty($_POST['from'])){
				$from = $_POST['from'];
			   }
			   else { $from = 0; }
			  if(!empty($_POST['to'])){
				$to = $_POST['to'];
			   }
			   else { $to = 0; }
			  
		  }
		  else {
			  $name = 0;
			  $email = 0;
			  $from = 0;
			  $to = 0;
		  }
		  ?>
          	<h3><i class="fa fa-angle-right"></i> Dentist Management <div align="right">
							  <a href="<?php echo ADMIN_URL; ?>/importcsv" class="btn btn-theme custom_blue_btn">Import Dentist</a>
							  <a href="<?php echo ADMIN_URL; ?>importcsv/download/<?=$name;?>/<?=$email;?>/<?=$from;?>/<?=$to;?>" class="btn btn-theme custom_blue_btn">Export Dentist</a>
							  </div></h3>
		<?php 
		echo showmsg($this->session->flashdata('msg'));
		?>		
		  	
		  	<div class="row mt">
              <div class="col-lg-12">
                      <div class="content-panel">
						  <h4><i class="fa fa-angle-right"></i> Dentist List </h4>
						<?php 
						 $attrib = array('class'=>'form-inline','style'=>'margin-bottom:15px;'); 
						echo form_open(current_url(),$attrib); ?>
						<div class="form-group">
							 <select name="fname" id="username" class="form-control custom-select">
							<option value="">-First Name-</option>
								  <?php
                              $users = getUserlist();
							  if(!empty($users)){
							  foreach($users as $usr){
								  if($username!='null' && $fname==$usr['fname']){
								   $selec_u = "selected='true'";
							      }
							      else { $selec_u = ""; }
								echo "<option value='".$usr['fname']."' ".$selec_u.">".$usr['fname']."</option>";  
							  }
							  }							  
							  ?>
							</select>
							
						</div>
						<span class="label label-info">OR</span>
						<div class="form-group">
							 <select name="email" id="email" class="form-control custom-select">
							<option value="">-Username-</option>
								  <?php
                              $users = getUserlist();
							  if(!empty($users)){
							  foreach($users as $usr){
								  if($email!='null' && $email==$usr['username']){
								   $selec_e = "selected='true'";
							      }
							      else { $selec_e = ""; }
								echo "<option value='".$usr['username']."' ".$selec_e.">".$usr['username']."</option>";  
							  }
							  }							  
							  ?>
							</select>
							 
						</div>
						<?php
						if($from!='null' && $to!='null'){
							$from_val = $from;
							$to_val = $to;
						}
						else { $from_val='From'; $to_val='To';}
						?>
						<div class="form-group">
						<span class="label label-info">OR</span>
							Registration Date :
							<div class="input-group input-large" style="width:300px;">
		                        <input type="text"  class="form-control dpd1" name="from" placeholder="<?php echo $from_val; ?>" id="from">
		                        <span class="input-group-addon">To</span>
		                          <input type="text" placeholder="<?php echo $to_val; ?>" id="to" class="form-control dpd2" name="to">
		                   </div>
									  
						</div>
						<div class="form-group" align="left">
							<button class="btn btn-theme custom_blue_btn" type="submit" name="search">Search</button>
							<button class="btn btn-theme custom_blue_btn" type="reset" onclick="window.location='<?php echo base_url() ?>admin/member/listing';" name="search">Reset</button>
						</div>
						<?php echo form_close(); ?>
							<section id="no-more-tables">
                              <table class="table table-bordered table-striped table-condensed cf">
                                  <thead class="cf">
                                  <tr>
                                      <th>SL#</th>
                                      <th>First Name</th>
									  <th>Last Name</th>
									  <th>Username</th>
									  <th>Email</th>
									  <th>Registration Data</th>
									  <th>Photo</th>
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
									  <td data-title="Full Name"><?php echo $row['fname'] ; ?></td>
                                      <td data-title="fname"><?php echo $row['lname'] ; ?></td>
									  <td data-title="username"><?php echo $row['username'] ; ?></td>
                                      <td data-title="Email"><?php echo $row['email'] ; ?></td>
                <td data-title="date"><?php echo globalDateformat($row['created_on']); ?></td>		  
        					
		<td data-title="Avatar">
		<?php $image = $row['profile_pic'] ; ?>
		<?php
	     //$member_id = $row['id'];
		  //if(!empty($member_id)) {
		   //$img = '';//getuserPic($member_id);
		   if($image!=''){
		  ?>
		  <img src="<?php echo base_url(); ?>/uploads/member/<?php echo $image; ?>" width="74" height="74" alt="" border="0" />
		  <?php 
		   }
		   else {
		  ?>
		  <img width="74" height="74" alt="No image" src="<?php echo base_url(); ?>/uploads/member/no-image.jpg">
		  <?php 
		   }
	 //}
		  ?></td>
				   <td data-title="Action">
				   
					  <a class="btn btn-default btn-xs"  href="<?php echo ADMIN_URL. "member/view/".$row['id']."/".($page-1);?>" title="View" ><i class="fa fa-eye"></i></a>
					  
					  <?php if($row['id'] != 1) { ?>
					  <?php  if($row['status']){ ?>
					  <a href="<?php echo ADMIN_URL. "member/status/".$row['id']."/0/".($page-1);?>" class="btn btn-success btn-xs"  title="Enable" onclick="return confirm('Are you sure you want to disable <?php echo $row['fname'].' '.$row['lname']; ?>?');">
		<i class="fa fa-check"></i>
					  </a>
            <?php } else {?>
		<a class="btn btn-warning btn-xs" href="<?php echo ADMIN_URL. "member/status/".$row['id']."/1/".($page-1);?>"  title="Disable" onclick="return confirm('Are you sure you want to enable <?php echo $row['fname'].' '.$row['lname']; ?>?');"> 
		    <i class="fa fa-check"></i></a>
			<?php
					}
				}
			?>
			<a class="btn btn-primary btn-xs"  href="<?php echo ADMIN_URL. "member/edit/".$row['id']."/".($page-1);?>" onclick="return confirm('Are you sure you want to edit <?php echo $row['fname'].' '.$row['lname']; ?>?');" title="Edit" ><i class="fa fa-pencil"></i></a>
			
			<?php if($row['id']!=1) {
			$deleteUrl =  (empty($row['lock_row']))?(ADMIN_URL. "member/delete/".$row['id']."/".($page-1)):"javascript:alert('Remove Not Allowed For ".$row['email'].")"; ?>
					    <a class="btn btn-danger btn-xs" href="<?php echo $deleteUrl;?>" <?php if(empty($row['lock_row'])){ ?>  onclick="return confirm('Are you sure you want to remove <?php echo $row['fname'].' '.$row['lname']; ?>?');" <?php } ?> title="Remove"><i class="fa fa-trash-o "></i></a>
						
						<a class="btn btn-plus btn-xs btn-delivery" href="<?php echo ADMIN_URL. "member/deliveryinfo/".$row['id'];?>" title="Update Delivery Info"><i class="fa fa-plus"></i></a>
						  
						<a class="btn btn-plus btn-xs btn-credit" href="<?php echo ADMIN_URL. "member/creditdetails/".$row['id'];?>" title="Add Credit"><i class="fa fa-plus"></i></a>
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
							  <div align="right">
							  <a href="<?php echo ADMIN_URL; ?>importcsv" class="btn btn-theme custom_blue_btn">Import Dentist</a>
							 <a href="<?php echo ADMIN_URL; ?>importcsv/download/<?=$name;?>/<?=$email;?>/<?=$from;?>/<?=$to;?>" class="btn btn-theme custom_blue_btn">Export Dentist</a>
							  </div>
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
<style>
.btn-delivery
{
	background: #F99;
}
.btn-credit
{
	background: #f6ae71;
}
</style>
 <script type="text/javascript">
  $( function() {
    $( "#from" ).datepicker();
	$( "#from" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
	
	$( "#to" ).datepicker();
    $( "#to" ).datepicker( "option", "dateFormat", "yy-mm-dd" );	
	 
	$("#username").customselect();
	
	$("#email").customselect();
  } );
  </script>
  </body>
</html>