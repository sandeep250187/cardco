<?php 
$this->load->view('supplier/header');
$this->load->view('supplier/right-sidebar');
?>
<link href="<?php echo base_url(); ?>assets/css/table-responsive.css" rel="stylesheet">
<!--middle contaen-->
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> SEO Management</h3>
			<?php
				echo showmsg($this->session->flashdata('msg'));
			?>
		  	<div class="row mt">
              <div class="col-lg-12">
                      <div class="content-panel">
						  <h4><i class="fa fa-angle-right"></i> SEO Page List</h4>
                          <section id="no-more-tables">
                              <table class="table table-bordered table-striped table-condensed cf">
                                  <thead class="cf">
                                  <tr>
								  <th>SL#</th>
								  <th>Main Url</th>
								  <th>Sub Url</th>
								  <th>Meta Title</th>
								  <th>Meta Description</th>
								  <th>Meta keyword</th>
								  <th><i class=" fa fa-edit"></i> Action</th>
                                  </tr>
                                  </thead>
				  <?php 
				
				  if(!empty($pages)){
     
				  ?>
				  
        <?php $i=++$page;?>
                                  <tbody>
				      <?php 
				 
				      foreach($pages as $row){ ?>
					<tr>
					  <td data-title="SL#"><?php echo $i ; ?></td>
					  <td data-title="Main Url"><?php echo $row['main_url'] ; ?></td>
					  <td data-title="Main Url"><?php echo $row['sub_url'] ; ?></td>
					  <td data-title="Meta Title"><?php echo $row['meta_title'] ; ?></td>
					  <td data-title="Description"><?php echo $row['meta_description']; ?></td>
					  <td data-title="Meta Keyword"><?php echo $row['meta_keyword'] ; ?></td>

					<td data-title="Email">
					<!---edit page---->
					<a class="btn btn-primary btn-xs"  href="<?php echo base_url() . "supplier/seo/edit/".$row['id']; ?>" onclick="return confirm('Are you sure you want to edit <?php echo $row['meta_title'] ; ?>?');" title="Edit" ><i class="fa fa-pencil"></i></a>
					<!---end edit page---->
					<!---status----->
					<?php  if($row['status']==1){?>
					<a href="<?php echo base_url() . "supplier/seo/status/".$row['id']."/0";?>" class="btn btn-success btn-xs"  title="Enable" onclick="return confirm('Are you sure you want to disable <?php $row['meta_title'] ; ?>?');">
					<i class="fa fa-check"></i></a>
					<?php } else { ?>
					<a class="btn btn-warning btn-xs" href="<?php echo base_url() . "supplier/seo/status/".$row['id']."/1";?>"  title="Disable" onclick="return confirm('Are you sure you want to enable <?php echo $row['meta_title'] ; ?>?');"> 
					<i class="fa fa-check"></i></a>
					<?php } ?> <!----end status------>
					
					<!----delete------>
					<a class="btn btn-danger btn-xs" href="<?php echo base_url() . "supplier/seo/delete/".$row['id'];  ?>" onclick="return confirm('Are you sure you want to remove this page?');" title="Remove"><i class="fa fa-trash-o "></i></a>
					<!----end delete------>
					</td>
           </tr>
				      <?php $i++; } ?>
                                  </tbody>
				  <tfoot>
        <tr>
          <td colspan="7"><div class="pagination custom_pagination"><?php echo $links; ?></div>
	  </td>
        </tr>
				  <?php }
				  else{ ?>
        <tr>
          <td colspan="7" style="text-align:center;">Record not available.</td>
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
