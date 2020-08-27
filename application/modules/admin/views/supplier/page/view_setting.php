<?php 
$this->load->view('supplier/header');
$this->load->view('supplier/right-sidebar');
?>
<link href="<?php echo base_url(); ?>assets/css/table-responsive.css" rel="stylesheet">
<!--middle contaen-->
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Setting</h3>
			<?php
				echo showmsg($this->session->flashdata('msg'));
			?>
		  	<div class="row mt">
              <div class="col-lg-12">
                      <div class="content-panel">
						  <h4><i class="fa fa-angle-right"></i>Setting</h4>
                          <section id="no-more-tables">
                              <table class="table table-bordered table-striped table-condensed cf">
                                  <thead class="cf">
                                  <tr>
                                      <th>SL#</th>
									  <th>Clinic Name</th>
                                      <th>supplier Email</th>
									  <th>supplier Contact</th>
				                      <th><i class=" fa fa-edit"></i> Action</th>
                                  </tr>
                                  </thead>
				  <?php 
				  if(!empty($setting)){
				  ?>
                                  <tbody>
                                  <tr>
                                      <td data-title="SL#">1</td>
                       <td data-title="Clinic Name"><?php echo $setting['clinic_name']; ?></td>       
				       <td data-title="supplier Email"><?php echo $setting['supplier_email']; ?></td>
                       <td data-title="supplier Contact"><?php echo $setting['supplier_contact']; ?></td>        					  
						<td data-title="Action">
						<!---edit page---->
						<a class="btn btn-primary btn-xs"  href="<?php echo base_url()."supplier/setting/edit/".$setting['id'];?>" onclick="return confirm('Are you sure you want to edit <?php echo $setting['clinic_name'] ; ?>?');" title="Edit" ><i class="fa fa-pencil"></i></a>
						<!---end edit page---->
						</td>
                                  </tr>
                                  </tbody>
				  <tfoot>
        <tr>
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
