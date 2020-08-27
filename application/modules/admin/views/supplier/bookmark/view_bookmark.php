<?php $this->load->view('supplier/header');
$this->load->view('supplier/right-sidebar');
?>
<link href="<?php echo base_url(); ?>assets/css/table-responsive.css" rel="stylesheet">
<!--middle contaen-->
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Bookmark Management</h3>
			<?php
				echo showmsg($this->session->flashdata('msg'));
			?>
		  	<div class="row mt">
              <div class="col-lg-12">
                      <div class="content-panel">
						  <h4><i class="fa fa-angle-right"></i> Bookmark List</h4>
					
					
				<section id="no-more-tables">
				  <table class="table table-bordered table-striped table-condensed cf">
					<thead class="cf">
					  <tr>
                      <th>SL#</th>
					  <th>Bookmark Name</th>
					  <th>Bookmark Details</th> 
                      <th><i class=" fa fa-edit"></i> Action</th>
                      </tr>
                      </thead>
				
				 <?php 				
				   //print_r($bookmarks); die;
				  ?>
				 <?php 				
				  if(!empty($bookmarks)){
				  ?>
                 
				  
				<?php $i=++$page;?>
                                  <tbody>
				      <?php 
				 
				      foreach($bookmarks as $row){ ?>
                                  <tr>
                                      <td data-title="SL#"><?php echo $i ; ?></td>
                                      <td data-title="First Name"><?php 
									  if(strlen($row['bookmark_name'])<50)
									  {
										 echo $row['bookmark_name'];
									  }
									  else
									  {
										 echo substr($row['bookmark_name'],0,50)." ....." ;
									  }  
									  ?></td>
									  
								<td>
								
								
									<?php 
									
									$book = Get_VideoBook_Listing($row['ID']);
									
									if($book):
									
									echo "<ul>";
									
									for($i=0; $i<count($book); $i++)
									{
									foreach($book[$i] as $key => $val):
										echo "<li><div class='v-detail'><img src='". base_url() ."uploads/uservideo/images/". $val['video_image_path'] ."' height='35' width='45' /> ". $val['video_title']  ." | <span>Size : ". $val['video_size'] ."</span>, <span>Resolution : ". $val['video_resolution_height'] ."</span><hr class='hr-line' /></div></li>";
									endforeach;
									}
									echo "</ul>";
									endif;
									
									?>
								
								</td>
                      
						<td data-title="Email">
						<!---edit page---->
						<a class="btn btn-primary btn-xs"  href="<?php echo base_url() . "supplier/bookmark/edit/".$row['ID']; ?>" onclick="return confirm('Are you sure you want to edit <?php echo $row['bookmark_name'] ; ?>?');" title="Edit" ><i class="fa fa-pencil"></i></a>
						<!---end edit page---->
						<!---status----->
						<?php  //if($row['video_status']==1){ ?>
						<!--<a href="<?php echo base_url() . "supplier/bookmark/status/".$row['ID']."/0";?>" class="btn btn-success btn-xs"  title="Enable" onclick="return confirm('Are you sure you want to disable <?php $row['video_title']; ?>?');">
						<i class="fa fa-check"></i></a>
						<?php //} else { ?>
						<a class="btn btn-warning btn-xs" href="<?php echo base_url() . "supplier/bookmark/status/".$row['ID']."/1";?>"  title="Disable" onclick="return confirm('Are you sure you want to enable <?php echo $row['video_title']; ?>?');"> 
						<i class="fa fa-check"></i></a>-->
						<?php //} ?> 
						
						<!----delete------>
						<a class="btn btn-danger btn-xs" href="<?php echo base_url() . "supplier/bookmark/delete/".$row['ID'];  ?>" onclick="return confirm('Are you sure you want to remove this video?');" title="Remove"><i class="fa fa-trash-o "></i></a>
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
