<?php 
$this->load->view('supplier/header');
$this->load->view('supplier/right-sidebar');
?>
<link href="<?php echo base_url(); ?>assets/css/table-responsive.css" rel="stylesheet">
<!--middle contaen-->
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Static Management</h3>
			<?php
				echo showmsg($this->session->flashdata('msg'));
				
			?>
		  	<div class="row mt">
              <div class="col-lg-12">
                      <div class="content-panel">
						  <h4><i class="fa fa-angle-right"></i> Static Content List</h4>
                          <section id="no-more-tables">
                              <table class="table table-bordered table-striped table-condensed cf">
                                  <thead class="cf">
                                  <tr>
                                      <th>SL#</th>
                                      <th>Static Label</th>
                                      <th>Static Content</th>
									 
									   <th><i class=" fa fa-edit"></i> Action</th>
									  </tr>
							  </thead>
				  <?php 
				
				
				  if(is_array($staticsdetail)){

			
				  ?>
				  
        <?php $i=1;?>
                                  <tbody>
				      <?php 
				 
				      foreach($staticsdetail as $row){ ?>
                                  <tr>
                                      <td data-title="SL#"><?php echo $i ; ?></td>
                                      <td data-title="Product Name"><?php echo $row['static_label'] ; ?></td>				      
                                      <td data-title="Product Name"><?php echo $row['static_value'] ; ?></td>				      
                                 					  
						<td data-title="Action">
						<!---edit content---->
						<a class="btn btn-primary btn-xs"  href="<?php echo base_url()."supplier/statics/edit/".$row['id'].'/'.$row['static_id'];?>" onclick="return confirm('Are you sure you want to edit <?php echo $row['static_label'] ; ?>?');" title="Edit" ><i class="fa fa-pencil"></i></a>
						<!---end edit Content---->
					
						
						</td>
                                  </tr>
				      <?php $i++; } ?>
                                  </tbody>
				  <tfoot>
       
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
