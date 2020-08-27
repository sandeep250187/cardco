<?php $this->load->view(SUPPLIER_FOLDER.'/header');
      $this->load->view(SUPPLIER_FOLDER.'/right-sidebar');
?>
<!--middle contaen-->
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>Credit Detail Listing <button class="btn btn-theme custom_blue_btn" type="button" onclick="window.history.go(-1);" style="float:right;">Go Back</button></h3>
		<?php 
				echo showmsg($this->session->flashdata('msg'));
		?>		
		  	
		  	<div class="row mt">
              <div class="col-lg-12">
                      <div class="content-panel">
						  <h4><i class="fa fa-angle-right"></i> Credit Detail Listing</h4>
						
							<section id="no-more-tables">
                              <table class="table table-bordered table-striped table-condensed cf">
                                  <thead class="cf">
                                  <tr>
                                      <th>SL#</th>
                                      <th>Credits</th>
									  <th>Credits Date</th>
									  <th>Expire Date</th>
				                      <!--<th><i class=" fa fa-edit"></i> Action</th>-->
                                  </tr>
                                  </thead>
								<?php 
								//pr($user);die;
								if(is_array($creditDetails)){ ?>
								<?php $i=1;?>
                                  <tbody>
								  <?php 
							 
								  foreach($creditDetails as $row){ 
								  ?>
                                  <tr>
                                      <td data-title="SL#"><?php echo $i ; ?></td>
									  <td data-title="credit"><?php echo $row['credit'] ; ?></td>
                                      <td data-title="created on"><?php echo date('d M, Y', strtotime($row['created_on'])) ; ?></td>
                                      <td data-title="expiery date"><?php echo date('d M, Y', strtotime($row['expiery_date'])) ; ?></td>
									  <!--<td data-title="date"><?php echo globalDateformat($row['created_on']); ?></td>-->		  
								</tr>
				      <?php $i++; } ?>
					    </tbody>
				  <tfoot>
        <tr>
          <td colspan="15"><div class="pagination custom_pagination"><?php //echo $links; ?></div>
	  </td>
        </tr>
		
		  <tr><td colspan="4"><div align="center"><a href="<?php echo base_url()."/supplier/member/addcredit/".$this->uri->segment(4); ?>" class="btn btn-theme custom_blue_btn">Add User Credit</a> </div></td></tr>
				  <?php } else { ?>
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
$this->load->view(SUPPLIER_FOLDER.'/footer');
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
    $( "#from" ).datepicker();
	$( "#from" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
	
	$( "#to" ).datepicker();
    $( "#to" ).datepicker( "option", "dateFormat", "yy-mm-dd" );	
	 
	$("#username").customselect();
	
	$("#email").customselect();
  } );
  </script>
  </body>
</html>