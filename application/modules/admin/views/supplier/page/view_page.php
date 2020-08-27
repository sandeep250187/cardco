<?php 
$this->load->view('supplier/header');
$this->load->view('supplier/right-sidebar');
?>
<link href="<?php echo base_url(); ?>assets/css/table-responsive.css" rel="stylesheet">
<!--middle contaen-->
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Page Management</h3>
			<?php
				echo showmsg($this->session->flashdata('msg'));
			?>
		  	<div class="row mt">
              <div class="col-lg-12">
                      <div class="content-panel">
						  <h4><i class="fa fa-angle-right"></i> Page List</h4>
                          <section id="no-more-tables">
                              <table class="table table-bordered table-striped table-condensed cf">
                                  <thead class="cf">
                                  <tr>
                                      <th>SL#</th>
                                      <th>Page Title</th>
				      <th>Page Content</th>
                       <!--<th>House No.</th>
				       <th>Street</th>
				       <th>City</th>
				       <th>State</th>
                          <th class="numeric">Zip</th>
				       <th>Role</th>-->
				       <th><i class=" fa fa-edit"></i> Action</th>
                                  </tr>
                                  </thead>
				  <?php 
				
				
				
				
				  if(is_array($pages)){

			
				  ?>
				  
        <?php $i=++$page;?>
                                  <tbody>
				      <?php 
				 
				      foreach($pages as $row){ ?>
                                  <tr>
                                      <td data-title="SL#"><?php echo $i ; ?></td>
                                      <td data-title="Product Name"><?php echo $row['page_title'] ; ?></td>
				       <td data-title="Description"><?php $content=strip_tags($row['page_content']); echo substr($content,0,100)." ....."; ?></td>
                                 					  
						<td data-title="Action">
						<!---edit page---->
						<a class="btn btn-primary btn-xs"  href="<?php echo base_url()."supplier/page/edit/".$row['id'];?>" onclick="return confirm('Are you sure you want to edit <?php echo $row['page_title'] ; ?>?');" title="Edit" ><i class="fa fa-pencil"></i></a>
						<!---end edit page---->
						<!---status----->
						<?php  if($row['status']==1){?>
						<a href="<?php echo base_url()."supplier/page/status/".$row['id']."/0";?>" class="btn btn-success btn-xs"  title="Enable" onclick="return confirm('Are you sure you want to disable <?php $row['page_title'] ; ?>?');">
						<i class="fa fa-check"></i></a>
						<?php } else { ?>
						<a class="btn btn-warning btn-xs" href="<?php echo base_url()."supplier/page/status/".$row['id']."/1";?>"  title="Disable" onclick="return confirm('Are you sure you want to enable <?php echo $row['page_title'] ; ?>?');"> 
						<i class="fa fa-check"></i></a>
						<?php } ?> <!----end status------>
						
						<!----delete------>
						<a class="btn btn-danger btn-xs" href="<?php echo base_url()."supplier/page/delete/".$row['id']; ?>" onclick="return confirm('Are you sure you want to remove this page?');" title="Remove"><i class="fa fa-trash-o "></i></a>
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
$this->load->view('supplier/footer');
?>
