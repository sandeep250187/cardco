<?php 
$this->load->view('supplier/header');
$this->load->view('supplier/right-sidebar');
?>
    <link href="<?php echo base_url(); ?>assets/css/table-responsive.css" rel="stylesheet">
    <!--middle contaen-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
		
				
            <h3><i class="fa fa-angle-right"></i> Order Management</h3>
            <?php
				echo showmsg($this->session->flashdata('msg'));
			?>
                <div class="row mt">
                    <div class="col-lg-12">
                        <div class="content-panel">
                            <h4><i class="fa fa-angle-right"></i> Order List</h4>
							
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
						<br /><br />
						<div class="form-group">
						<span class="label label-info">OR</span>
							By Order Name :
							<div class="input-group input-large" style="width:300px;">
		                       <?php
									
										$arrResourceName = array('' => '---Select Order---');
										foreach($resource_name as $row)
										{
											 $productname = GetProductInfo($row['product_id']) ;
											 $arrResourceName[$row['product_id']] = $productname['product_name'];
										}
										echo form_dropdown('resource_name', $arrResourceName, set_value('resource_name'), 'class="form-control custom-select" id="resource_name"');
								
								?>
		                   </div>
						</div>
						<div class="form-group">
						<span class="label label-info">OR</span>
							By Name :
							<div class="input-group input-large" style="width:300px;">
		                       <?php
									
										$arrEmail = array('' => '---Select Name---');
										foreach($resource_email as $row)
										{
											$Ufull_name = getUserField('fname', $row['member_id']).' '.getUserField('lname', $row['member_id']);
											$arrEmail[$row['member_id']] = $Ufull_name;
										}
										echo form_dropdown('email', $arrEmail, set_value('email'), 'class="form-control custom-select" id="full_name"');
								
								?>
		                   </div>
						</div>
					
						<div class="form-group" align="left">
							<button class="btn btn-theme custom_blue_btn" type="submit" name="search">Search</button>
							<button class="btn btn-theme custom_blue_btn" type="reset" onclick="window.location='<?php //echo base_url() ?>supplier/member/listing';" name="search">Reset</button>
							 <?php 
								//cretae variable
								$dateFrom = !empty($_POST['date_from'])?strtotime($_POST['date_from']):0;
								$dateTo = !empty($_POST['date_to'])?strtotime($_POST['date_to']):0;
								$email = !empty($_POST['email'])?$_POST['email']:0;
								$resource_name = !empty($_POST['resource_name'])?$_POST['resource_name']:0;
							  ?>
						</div>
						
						<?php echo form_close(); ?>
						 
							
                            <section id="no-more-tables">
                                <table class="table table-bordered table-striped table-condensed cf">
                                    <thead class="cf">
                                        <tr>
                                            <th>SL#</th>
                                            <th>Resource Name</th>
                                            <th>Resource's User</th>
											<th>Resource's User Email</th>
                                            <th>Date</th>
											<th>Status</th>
                                            <th><i class=" fa fa-edit"></i> Action</th>
                                        </tr>
                                    </thead>
                                    <?php 
				
				
				
				
				  if(is_array($pages)){

			
				  ?>
                                        <?php $i=++$page;?>
                                            <tbody>
                                                <?php 
				 
				      foreach($pages as $row){   //print_r($row); ?>
                                                    <tr>
                                                        <td data-title="SL#">
                                                            <?php echo $i ; ?>
                                                        </td>
                                                        <td data-title="Product Name">
                                                            <?php $productname = GetProductInfo($row['product_id']) ;
																	
																	echo ($productname['product_name']);

															?>
                                                        </td>
                                                       <td data-title="Category"> 
													   <?php 
																$UserField = getUserField('fname', $row['member_id']);
																echo $UserField;
														?>
													   </td>
													   <td data-title="Category"> 
													   <?php 
																$UserField = getUserField('email', $row['member_id']);
																echo $UserField;
														?>
													   </td>
                                                       <td data-title="Credit Required">
                                                        <?php echo date('d F, Y', strtotime($row['date'])); ?>
                                                       </td>
													  <td>
													    <?php  if($row['status']==1){?>
														Approved
                                                         <?php } else { ?>
                                                        Unapproved
                                                           <?php } ?>
													   </td>
                                                       
                                                        <td data-title="Action">
														<a href="<?php echo base_url(). "supplier/order";  ?>/viewdetail/<?php echo $row['id']; ?>" title="View Detail & Approve"><i class="fa fa-eye"></i></a> &nbsp;&nbsp;&nbsp;
                                                                                    
                                                         <a class="btn btn-danger btn-xs" href="<?php echo base_url(). "supplier/order/delete/".$row['id'];  ?>" onclick="return confirm('Are you sure you want to remove this page?');" title="Remove"><i class="fa fa-trash-o "></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php $i++; } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="15">
                                                        <div class="pagination custom_pagination">
                                                            <?php echo $links; ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php }else{ ?>
                                                    <tr>
                                                        <td colspan="15">Record not available.</td>
                                                    </tr>
                                                    <?php  } ?>
                                </table>
                            </section>
                        </div>
                        <!-- /content-panel -->
                    </div>
                    <!-- /col-lg-12 -->
                </div>
                <!-- /row -->
        </section>
        <! --/wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--content end-->
    <?php 
$this->load->view('supplier/footer');
?>
 <script type="text/javascript">
  $( function() {
    $( "#date_from" ).datepicker();
	$( "#date_from" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
	
	$( "#date_to" ).datepicker();
    $( "#date_to" ).datepicker( "option", "dateFormat", "yy-mm-dd" );	
	 
	$("#resource_name").customselect();
	$("#full_name").customselect();
  } );
  </script>