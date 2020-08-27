<?php $this->load->view(ADMIN_FOLDER.'/header');
      $this->load->view(ADMIN_FOLDER.'/right-sidebar');
?>
<!--middle contaen-->
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>Dentist Leads</h3>
			
					
				<?php 
				echo showmsg($this->session->flashdata('msg'));
				?>		
					
		  	<div class="row mt">
              <div class="col-lg-12">
                      <div class="content-panel">
						  <h4><i class="fa fa-angle-right"></i>Dentist Leads List</h4>
						  <!--------------form design-------->
						  <?php 
									$attrib = array('class'=>'form-inline','style'=>'margin-bottom:15px;'); 
									echo form_open(current_url(),$attrib); 
						  ?>
						<div class="form-group">
							Date : 
							<div class="input-group input-large" style="width:300px;">
								<span class="input-group-addon">From</span>
		                        <input type="text"  class="form-control dpd1" value="<?php echo set_value('date_from'); ?>" name="date_from" placeholder="<?php //echo $from_val; ?>" id="date_from">
		                        <span class="input-group-addon">To</span>
		                        <input type="text" value="<?php echo set_value('date_to'); ?>" placeholder="<?php //echo $to_val; ?>" id="date_to" class="form-control dpd2" name="date_to">
		                 </div>
						</div>
						<span class="label label-info">OR</span>
						<div class="form-group">
							By Name :
							<div class="input-group input-large" style="width:300px;">
		                       <?php
									
										$arrEmail = array('' => '---Select Name---');
										foreach($resource_email as $row)
										{
											$Ufull_name = getUserField('fname', $row['member_id']).' '.getUserField('lname', $row['member_id']);
											$Ufull_name1 = getUserField('fname', $row['member_id']).'_'.getUserField('lname', $row['member_id']);
											$arrEmail[$Ufull_name1] = $Ufull_name;
										}
										echo form_dropdown('full_name', $arrEmail, set_value('full_name'), 'class="form-control custom-select" id="full_name"');
								
								?>
		                   </div>
						</div>
						<br /><br />
						<div class="form-group">
						<span class="label label-info">OR</span>
							Source :
							<div class="input-group input-large" style="width:300px;">
		                       <?php
										$options = array(
										  ''  => '---All---',
										  '1'    => 'iFrame',
										  '3' => 'Tablet',
										);
										echo form_dropdown('source', $options, set_value('source'), 'class="form-control custom-select" id="source"');
								?>
		                   </div>
						</div>
						<div class="form-group">
						<span class="label label-info">OR</span>
							Survey :
							<div class="input-group input-large" style="width:300px;">
		                       <?php
										$options = array(
										  ''  => '---All---',
										  '10'    => 'Completed',
										  '8' => 'Incompleted',
										);
										echo form_dropdown('servey', $options, set_value('servey'), 'class="form-control custom-select" id="servey"');
								?>
							   
		                   </div>
						</div>
						<div class="form-group" align="left">
							<button class="btn btn-theme custom_blue_btn" type="submit" name="search">Search</button>
							<button class="btn btn-theme custom_blue_btn" type="reset" onclick="window.location='<?php //echo base_url() ?>admin/member/listing';" name="search">Reset</button>
							
							 <?php 
								//cretae variable 
								$dateFrom = !empty($_POST['date_from'])?strtotime($_POST['date_from']):0;
								$dateTo = !empty($_POST['date_to'])?strtotime($_POST['date_to']):0;
								$source = !empty($_POST['source'])?$_POST['source']:0;
								$servey = !empty($_POST['servey'])?$_POST['servey']:0;
								$full_name = !empty($_POST['full_name'])?$_POST['full_name']:'';
							  ?>
							
							  
							 
						</div>
						 <div align="right"><a href="<?php echo ADMIN_URL. "leads/download/$dateFrom/$dateTo/$source/$servey/$full_name"; ?>" class="btn btn-theme custom_blue_btn">Export Leads</a></div>
						<?php echo form_close(); ?>
						  
						<section id="no-more-tables">
                              <table class="table table-bordered table-striped table-condensed cf">
                                  <thead class="cf">
                                  <tr>
									<th>SL#</th>
									<th>Name</th>
									<th>Email</th>
									<th>Resources</th>
									<th>Score</th>
									<th>Date</th>
									<th><i class=" fa fa-edit"></i> Action</th>
                                  </tr>
                                  </thead>
				  <?php 
				
				  if(!empty($user)){ ?>
        <?php $i=++$page;?>
                                  <tbody>
				      <?php 
				 
				      foreach($user as $row){ 
					  ?>
                                  <tr>
                                      <td data-title="SL#"><?php echo $i ; ?></td>
                                      <td data-title="Name"><?php echo $row['full_name']; ?></td>
				                      <td data-title="Email"><?php echo $row['email'] ; ?></td>
                                      <td data-title="Resources"><?php echo lead_type($row['lead_type']); ?></td>
									  <td data-title="Score"><?php echo $row['score'] ; ?></td>
									  <td data-title="Date"><?php echo globalDateformat($row['created_on']); ?></td>
                                     
				   <td data-title="Action">
			<?php 
			$deleteUrl = ADMIN_URL. "leads/delete/".$row['id']."/".($page-1);
			?>
					    
						<a class="btn btn-default btn-xs"  href="<?php echo ADMIN_URL. "leads/view/".$row['id']."/".($page-1);?>" title="View" ><i class="fa fa-eye"></i></a>
						<a class="btn btn-danger btn-xs" href="<?php echo $deleteUrl;?>"   onclick="return confirm('Are you sure you want to remove?');" title="Remove"><i class="fa fa-trash-o "></i></a>
			
			 
					   
				      </td>
                                  </tr>
				      <?php $i++; } ?>
                                  </tbody>
				  <tfoot>
					<tr>
					  <td colspan="7"><div class="pagination custom_pagination"><?php echo $links; ?></div></td>
					</tr>
					
				  <?php }else{ ?>
					<tr>
					  <td colspan="7" align="center">Record not available.</td>
					</tr>
        <?php  } ?>
                              </table>
							  
							  <?php 
								//cretae variable
							/* 	$dateFrom = !empty($_POST['date_from'])?strtotime($_POST['date_from']):0;
								$dateTo = !empty($_POST['date_to'])?strtotime($_POST['date_to']):0;
								$source = !empty($_POST['source'])?$_POST['source']:0;
								$servey = !empty($_POST['servey'])?$_POST['servey']:0; */
							  ?>
							
							  
							  <div align="right"><a href="<?php echo ADMIN_URL. "leads/download/$dateFrom/$dateTo/$source/$servey/$full_name"; ?>" class="btn btn-theme custom_blue_btn">Export Leads</a></div>
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
    $( "#date_from" ).datepicker();
	$( "#date_from" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
	
	$( "#date_to" ).datepicker();
    $( "#date_to" ).datepicker( "option", "dateFormat", "yy-mm-dd" );	
	 
	$("#full_name").customselect();
	$("#source").customselect();
	$("#servey").customselect();
  } );
  </script>
  </body>
</html>

