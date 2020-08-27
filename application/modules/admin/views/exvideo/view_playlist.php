<?php $this->load->view('admin/header');
$this->load->view('admin/right-sidebar');
?>
<link href="<?php echo base_url(); ?>assets/css/table-responsive.css" rel="stylesheet">
<!--middle contaen-->
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Play List Management</h3>
			<?php
				echo showmsg($this->session->flashdata('msg'));
			?>
		  	<div class="row mt">
              <div class="col-lg-12">
                      <div class="content-panel">
				 <h4><i class="fa fa-angle-right"></i> Play List</h4>
					<div style="text-align:center;float:left;font-size: 17px;padding-bottom: 5px;">Total Results: 
						  (<?php 
						  $totalResults = $this->session->userdata('totalResults');
						    if(!empty($totalResults)){
							 echo $totalResults;	
							}
						  ?>)
					</div>
					
				<section id="no-more-tables">
				  <table class="table table-bordered table-striped table-condensed cf">
					<thead class="cf">
					  <tr>
                      <th>SL#</th>
                      <th>Play List Title</th>
				      <th>Play List Description</th>
					  <th>Thumb</th>
                      <th>Action</th>
                      </tr>
                      </thead>
				 
				 <?php 				
				  if(!empty($records)){
					  //pr($records);
					  $this->session->unset_userdata('v_item');
					  $viewd_item = $this->session->userdata('viewd_item');
						if(!empty($viewd_item)){
						 $i= $viewd_item;	
						}
						else {
						 $i= 1;	
						}
				  ?>
                 
                 <tbody>
				      <?php 
				      foreach($records as $row){ 
					  ?>
						  <tr>
							  <td data-title="SL#"><?php echo $i ; ?></td>
						  <td data-title="Title">
						  <?php echo $row->snippet->title;?>
						  </td>
						  <td data-title="Description" >
							  <?php echo $row->snippet->description;?>
						  </td>
						  
						<td data-title="Last Name" >
                        <img src="<?php echo $row->snippet->thumbnails->default->url;?>">
					    </td>
							   
				
			  
				<td data-title="View">
				<a class="btn btn-primary btn-xs view"  href="<?php echo site_url(); ?>admin/exvideo/view?pid=<?php echo $row->id->playlistId;?>&p=first" target="_blank" title="View"><i class="fa fa-eye"></i></a>
				</td>
						  </tr>
				      <?php 
					  $i++; 
					   } 
					  
					  ?>
                                  </tbody>
				  <tfoot>
        <tr>
       <td colspan="15">
	   <div class="pagination custom_pagination">
	   <?php
	   $channel_id =  $this->session->userdata('channel_id');
	   $nextPageToken = $this->session->userdata('nextPageToken');
	   $prevPageToken = $this->session->userdata('prevPageToken');
	   
	   if(!empty($prevPageToken)){
		   $link_nav = site_url().'admin/exvideo?cid='.$channel_id.'&prev='.$prevPageToken;
		   echo "<a href='".$link_nav."'>Prev</a>";
	   }
	   if(!empty($nextPageToken)){
		   $link_nav = site_url().'admin/exvideo?cid='.$channel_id.'&next='.$nextPageToken;
		   echo "<a href='".$link_nav."'>Next</a>";
	   }
	   
	   ?>
	   </div></td>
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

<!--content end-->

<div id="upload-loader" style="display:none;">	
<div class="cssload-loader">downloading...</div>
<div class="overlay-uploading"></div>
</div>

<?php 
//$this->load->view('admin/footer');
?>
<script type="text/javascript">
$(document).ready(function(){
	  $('.download').click(function(){
		
        var vid = $(this).attr('vid');
        var cid = $(this).attr('cid');
		var desc = $(this).attr('desc');
		
		if(confirm('Do you want to download.!')){
				 $('#upload-loader').show();
				 $.ajax({
					url:'<?php echo base_url();?>ajax/downloadv',
					type:'POST',
					data:{cid:cid,vid:vid,desc:desc},
					success:function(html){
					 $('#upload-loader').hide();
                      if(html==0){
						  alert('Same video already exists.');
					  }
                      if(html==1){
						  alert('Video download failed.');
					  }
                      if(html==2){
						  alert('Video downloaded successfully.');
						  $('#dwn-'+vid).hide();
					  }					  
					}
				});  
		  }		
	  });
});	
</script>
