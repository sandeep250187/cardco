<?php $this->load->view('supplier/header');
$this->load->view('supplier/right-sidebar');
?>
<link href="<?php echo base_url(); ?>assets/css/table-responsive.css" rel="stylesheet">
<!--middle contaen-->
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Category Management</h3>
			<?php
				echo showmsg($this->session->flashdata('msg'));
			?>
		  	<div class="row mt">
              <div class="col-lg-12">
                      <div class="content-panel">
						  <h4><i class="fa fa-angle-right"></i> Converted Category List</h4>
						   <form action="" method="post" class="form-inline">
						    <div class="form-group">
							  <label class="">&nbsp;Category&nbsp;</label>
							  <input type="text" name="searchtext" style="width:200px;" class="form-control" value="<?php echo $this->input->post('searchtext');  ?>" />
							  &nbsp;<input type="submit" name="search" value="Search" class="btn btn-theme custom_blue_btn">
							</div>
							<div>&nbsp;&nbsp;</div>
						  </form>
                          <section id="no-more-tables">
                              <table class="table table-bordered table-striped table-condensed cf">
                                  <thead class="cf">
                                  <tr>
                                      <th>SL#</th>
                                      <th>Name</th>
									  <th>Converted Date</th>
									  <!--<th><i class=" fa fa-edit"></i> Action</th>-->
                                  </tr>
                                  </thead>
				  <?php 
				 if(is_array($converted) && !empty($converted)){
				  ?>
				 <?php $i=++$page;?>
                    <tbody>
				      <?php 
				      
				      foreach($converted as $row){ 
					  $date = dateFormat($row['keytocat_date']);
					  ?>
                           <tr>
                            <td data-title="SL#"><?php echo $i ; ?></td>
                            <td data-title="First Name"><?php echo $row['cat_name'] ; ?></td>
							<td data-title="First Name"><?php echo $date; ?></td>
				      <!-- <td data-title="Action">
			
					    <a class="btn btn-primary btn-xs"  href="<?php echo base_url() . "supplier/keyword/edit/".$row['catid']."/".($page-1);?>" onclick="return confirm('Are you sure you want to edit <?php echo $row['cat_name']; ?>?');" title="Edit" ><i class="fa fa-pencil"></i></a>
					    
					   <a class="btn btn-danger btn-xs" href="<?php echo base_url() . "supplier/keyword/delete/".$row['catid']."/".($page-1);?>" onclick="return confirm('Are you sure you want to remove <?php echo $row['cat_name']; ?>?');"  title="Remove"><i class="fa fa-trash-o "></i></a>
				      </td>-->
                                  </tr>
				      <?php $i++; } ?>
                                  </tbody>
				  <tfoot>
        <tr>
          <td colspan="15"><div class="pagination custom_pagination"><?php
			echo $links;
		
		  ?></div>
	  </td>
        </tr>
				  <?php }else{ ?>
        <tr>
          <td colspan="15"><center>Record not available.</center></td>
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
