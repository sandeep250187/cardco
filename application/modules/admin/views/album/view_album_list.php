<?php 
$this->load->view('admin/header');
$this->load->view('admin/right-sidebar');
?>
<link href="<?php echo base_url(); ?>assets/css/table-responsive.css" rel="stylesheet">
<!--middle contaen-->
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Album Management</h3>
			<?php
				echo showmsg($this->session->flashdata('msg'));
			?>
		  	<div class="row mt">
              <div class="col-lg-12">
                      <div class="content-panel">
						  <h4><i class="fa fa-angle-right"></i> Album List</h4>
						  <?php 
						 $attrib = array('class'=>'form-inline','style'=>'margin-bottom:15px;'); 
						echo form_open(current_url(),$attrib); ?>
						<div class="form-group" style="margin-left:15px;">
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
						
						<div class="form-group" align="left">
							<button class="btn btn-theme custom_blue_btn" type="submit" name="search">Search</button>
							<button class="btn btn-theme custom_blue_btn" type="reset" onclick="window.location='<?php echo base_url() ?>admin/album/listing';" name="search">Reset</button>
						</div>
						<?php echo form_close(); ?>
                          <section id="no-more-tables">
                              <table class="table table-bordered table-striped table-condensed cf">
                                  <thead class="cf">
                                  <tr>
                                      <th>SL#</th>
                                      <th>Album Name</th>
                                      <th>Username</th>
				               <th><i class=" fa fa-edit"></i> Action</th>
                                  </tr>
                                  </thead>
				  <?php 
				  if(is_array($albums)){
				  ?>
				  
        <?php $i=++$page;?>
                                  <tbody>
				      <?php 
				 
				      foreach($albums as $row){ 
					  ?>
                                  <tr>
                                      <td data-title="SL#"><?php echo $i ; ?></td>
                                      <td data-title="Album Title"><?php echo $row['album_title'] ; ?></td>
				               <td data-title="Full Name"><?php echo $row['full_name'] ; ?></td>
					  
						<td data-title="Email">
						<a class="btn btn-default btn-xs"  href="<?php echo base_url() . "admin/album/view/".$row['id']; ?>" title="View" ><i class="fa fa-eye"></i></a>
						<!---edit page---->
						<a class="btn btn-primary btn-xs"  href="<?php echo base_url() . "admin/album/edit/".$row['id']; ?>" onclick="return confirm('Are you sure you want to edit <?php echo $row['album_title'] ; ?>?');" title="Edit" ><i class="fa fa-pencil"></i></a>
						<!---end edit page---->
						<!----delete------>
						<a class="btn btn-danger btn-xs" href="<?php echo base_url() . "admin/page/delete/".$row['id'];  ?>" onclick="return confirm('Are you sure you want to remove this page?');" title="Remove"><i class="fa fa-trash-o "></i></a>
						<!----end delete------>
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
$this->load->view('admin/footer');
?>
<script type="text/javascript">
  $( function() {
	$("#username").customselect();
  } );
  </script>