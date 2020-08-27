<?php 
$this->load->view('supplier/header');
$this->load->view('supplier/right-sidebar');
?>
    <link href="<?php echo base_url(); ?>assets/css/table-responsive.css" rel="stylesheet">
    <!--middle contaen-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Product Management</h3>
            <?php
				echo showmsg($this->session->flashdata('msg'));
			?>
                <div class="row mt">
                    <div class="col-lg-12">
                        <div class="content-panel">
                            <h4><i class="fa fa-angle-right"></i> Product List</h4>
                            <section id="no-more-tables">
                                <table class="table table-bordered table-striped table-condensed cf">
                                    <thead class="cf">
                                        <tr>
                                            <th>SL#</th>
                                            <th>Product Name</th>
                                            <th>Category</th>
                                            <th>Credit Required</th>
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
                                                        <td data-title="SL#">
                                                            <?php echo $i ; ?>
                                                        </td>
                                                        <td data-title="Product Name">
                                                            <?php echo $row['product_name'] ; ?>
                                                        </td>
                                                       <td data-title="Category"> 
													   <?php 
													    $catid= json_decode($row['cat_id']);
														//print_r($catid);
														 $val =  itsgetCategoryname($catid);
														 
														 echo $val->cat_name;?>
													   </td>
                                                       <td data-title="Credit Required">
                                                        <?php echo $row['credits']; ?>
                                                       </td>
                                                       
                                                        <td data-title="Action">
                                                        <a class="btn btn-default btn-xs"  href="<?php echo SUPPLIER_URL. "products/view/".$row['id']."/".($page-1);?>" title="View" ><i class="fa fa-eye"></i></a>
                                                            <!---edit page----><a class="btn btn-primary btn-xs" href="<?php echo base_url() ."supplier/products/edit/".$row['id']; ?>" onclick="return confirm('Are you sure you want to edit <?php echo $row['product_name'] ; ?>?');" title="Edit"><i class="fa fa-pencil"></i></a>
                                                            <!---end edit page---->
                                                            <!---status----->
                                                            <?php  if($row['status']==1){?>
                                                                <a href="<?php echo base_url() ."supplier/products/status/".$row['id']."/0 ";?>" class="btn btn-success btn-xs" title="Enable" onclick="return confirm('Are you sure you want to disable <?php $row['product_name'] ; ?>?');"> <i class="fa fa-check"></i></a>
                                                                <?php } else { ?>
                                                                    <a class="btn btn-warning btn-xs" href="<?php echo base_url() ."supplier/products/status/".$row['id']."/1 ";?>" title="Disable" onclick="return confirm('Are you sure you want to enable <?php echo $row['product_name'] ; ?>?');"> <i class="fa fa-check"></i></a>
                                                                    <?php } ?>
                                                                        <!----end status------>
                                                                        <!----delete------><a class="btn btn-danger btn-xs" href="<?php echo base_url(). "supplier/products/delete/".$row['id'];  ?>" onclick="return confirm('Are you sure you want to remove this page?');" title="Remove"><i class="fa fa-trash-o "></i></a>
                                                                        <!----end delete------>
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