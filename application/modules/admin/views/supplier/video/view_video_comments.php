<?php $this->load->view('supplier/header');
$this->load->view('supplier/right-sidebar');
?>
<link href="<?php echo base_url(); ?>assets/css/table-responsive.css" rel="stylesheet">
<!--middle contaen-->
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Video Management</h3>
			<?php
				echo showmsg($this->session->flashdata('msg'));
			?>
		  	<div class="row mt">
              <div class="col-lg-12">
                      <div class="content-panel">
						  <h4><i class="fa fa-angle-right"></i> Video Comment List</h4>
					
					
				<section id="no-more-tables">
				  <table class="table table-bordered table-striped table-condensed cf">
					<thead class="cf">
					  <tr>
                      <th>SL#</th>
                      <th>Comment Title</th>
				      <th>Comment Description</th>
					  <th>Comment Author</th>
                      <th><i class=" fa fa-edit"></i> Action</th>
                      </tr>
                      </thead>
				 
				 <?php 				
				  if(!empty($videos)){
				  ?>
                 
				  
				<?php $i=++$page;?>
                                  <tbody>
				      <?php 
				 
				      foreach($videos as $row){ ?>
                      <tr>
                        <td data-title="SL#"><?php echo $i ; ?></td>
                        <td data-title="First Name"><?php echo substr($row['video_name'],0,50)." ....." ; ?></td>
						<td data-title="First Name"><?php echo substr($row['video_title'],0,50)." ....." ; ?></td>
				       <td data-title="Last Name"><?php $content=strip_tags($row['video_description']); echo substr($content,0,50)." ....."; ?></td>
                      
						<td data-title="Email">
						<!---edit page---->
						<a class="btn btn-primary btn-xs"  href="<?php echo base_url() . "supplier/video/edit/".$row['v_id']; ?>" onclick="return confirm('Are you sure you want to edit <?php echo $row['video_title'] ; ?>?');" title="Edit" ><i class="fa fa-pencil"></i></a>
						<!---end edit page---->
						<!---status----->
						<?php  if($row['video_status']==1){ ?>
						<a href="<?php echo base_url() . "supplier/video/status/".$row['v_id']."/0";?>" class="btn btn-success btn-xs"  title="Enable" onclick="return confirm('Are you sure you want to disable <?php $row['video_title']; ?>?');">
						<i class="fa fa-check"></i></a>
						<?php } else { ?>
						<a class="btn btn-warning btn-xs" href="<?php echo base_url() . "supplier/video/status/".$row['v_id']."/1";?>"  title="Disable" onclick="return confirm('Are you sure you want to enable <?php echo $row['video_title']; ?>?');"> 
						<i class="fa fa-check"></i></a>
						<?php } ?> <!----end status------>
						
						<!----delete------>
						<a class="btn btn-danger btn-xs" href="<?php echo base_url() . "supplier/video/delete/".$row['v_id'];  ?>" onclick="return confirm('Are you sure you want to remove this video?');" title="Remove"><i class="fa fa-trash-o "></i></a>
						<!---- end delete ------>
						</td>
                       </tr>
				      <?php $i++; } ?>
                                  </tbody>
				  <tfoot>
        <tr>
       <td colspan="15"><div class="pagination custom_pagination"><?php echo $links; ?></div></td>
        </tr>
		     
				  <?php } else { ?>
				<tr>
          <td colspan="15">	<center>Record not available.</center>
				</td>
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
	
<script>
	
	function updatepriority(id,val)
		{
			
			//alert(val);
			var xmlhttp;
			if(navigator.appName=="Microsoft Internet Explorer")
				{
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
			else
				{
					xmlhttp = new XMLHttpRequest();
				}
			
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			
            }
        }
        xmlhttp.open("GET", "priority/?p="+val+"&id="+id, true);
        xmlhttp.send();
		
		}
				
		
</script>

<!--content end-->
<?php 
$this->load->view('supplier/footer');
?>
