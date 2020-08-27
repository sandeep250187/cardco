<?php $this->load->view(ADMIN_FOLDER.'/header');
      $this->load->view(ADMIN_FOLDER.'/right-sidebar');
?>
<!--middle contaen-->
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>Enquiry </h3>
		<?php 
		echo showmsg($this->session->flashdata('msg'));
		?>		
		  	
		  	<div class="row mt">
              <div class="col-lg-12">
                      <div class="content-panel">
						  <h4><i class="fa fa-angle-right"></i>Enquiry List</h4>
						<?php 
						 $attrib = array('class'=>'form-inline'); 
						echo form_open(current_url(),$attrib); ?>
						<div class="col-sm-4" align="right" style="margin-left:50%;margin-bottom:20px;">
							Type Here : <input type="text" class="form-control" name="search" id="search" value="<?php echo $this->input->post('search');?>" required>
						</div>
						<div class="col-sm-1" align="left">
							<button class="btn btn-theme custom_blue_btn" type="submit">Search</button>
						</div>
						<div class="col-sm-1" align="left">
							<button class="btn btn-theme custom_blue_btn" type="reset" onclick="window.location='<?php echo ADMIN_URL; ?>enquiry/listing';">Reset</button>
						</div>
						<?php echo form_close(); ?>
							<section id="no-more-tables">
                              <table class="table table-bordered table-striped table-condensed cf">
                                  <thead class="cf">
                                  <tr>
									<th>SL#</th>
									<th >Member Name</th>
									<th>Email</th>
                                    <th>Phone Number</th>
									<th>Address</th>
									<th>Zip Code</th>
									<th>Message</th>
									<th>Date</th>
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
                                      <td data-title="Name"><?php echo $row['first_name'].' '.$row['last_name']; ?></td>
				                      <td data-title="Email"><?php echo $row['email'] ; ?></td>
                                      <td data-title="Phone"><?php echo $row['phone'] ; ?></td>
                                      <td data-title="Message"><?php echo $row['address'] ; ?></td>
									  <td data-title="Message"><?php echo $row['zip'] ; ?></td>
									  <td data-title="Message"><?php echo $row['message'] ; ?></td>
									  <td data-title="Date"><?php echo globalDateformat(date('Y-m-d H:i:s',$row['date_enquiry'])); ?></td>
                                     
				   <td data-title="Action">
			<?php 
			$deleteUrl = ADMIN_URL. "enquiry/delete/".$row['id']."/".($page-1);
			?>
					    <a class="btn btn-danger btn-xs" href="<?php echo $deleteUrl;?>"   onclick="return confirm('Are you sure you want to remove?');" title="Remove"><i class="fa fa-trash-o "></i></a>
			
			 
					   
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