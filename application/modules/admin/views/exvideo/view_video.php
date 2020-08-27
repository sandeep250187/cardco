
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
						  <h4><i class="fa fa-angle-right"></i> Video List</h4>
				          <div style="text-align:center;float:left;font-size: 17px;padding-bottom: 5px;">Total Results: 
						  (<?php 
						  $totalResults = $this->session->userdata('totalResults');
						    if(!empty($totalResults)){
							 echo $totalResults;	
							}
						  ?>)
						  <button type="button" name="download_all" class="btn btn-theme custom_blue_btn download_all" style="margin-left:10px;"><i class="fa fa-download"></i>
						  Download all
						  </button>
						  </div>
					
					
				<section id="no-more-tables">
				  <table class="table table-bordered table-striped table-condensed cf">
				  <form method="post" id="video_form" action="">
					<thead class="cf">
					  <tr>
                      <th>SL#</th>
					  <th><input type="checkbox" id="down_all"></th>
                      <th>Video Title</th>
				      <th>Video Description</th>
					  <th>Video</th>
                      <th>Action</th>
                      </tr>
                      </thead>
				 
				 <?php 				
				  if(!empty($records)){
					  //pr($records);
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
					  if(!empty($row->id->videoId)){
						  
						  /**Get video tags**/
						 /* $key_url = 'http://www.youtube.com/watch?v='.$row->id->videoId;
                          $connect = file_get_contents($key_url);
					preg_match_all('|<meta property="og\:video\:tag" content="(.+?)">|si', $connect, $tags, PREG_SET_ORDER);
					$all_tags = '';
					if(!empty($tags)){
						foreach ($tags as $tag) {
							$all_tags.= $tag[1] .",";
						}
					} */
						  /**/
					  ?>
						  <tr>
						  <td data-title="SL#"><?php echo $i ; ?></td>
						  <td data-title="Download"><input type="checkbox" name="arr_vid[]" value="<?php echo $row->id->videoId;?>" class="down_ck"></td>
						  
						  <td data-title="Title">
						  <?php echo $row->snippet->title;?>
						  </td>
						  <td data-title="Description" >
							  <?php echo $row->snippet->description;?>
						  </td>
						<td data-title="Last Name" >
<iframe width="200" height="100" src="https://www.youtube.com/embed/<?php echo $row->id->videoId;?>" frameborder="0" allowfullscreen></iframe>
					    </td>
							   
				
			  
				<td data-title="Download" id="dwn-<?php echo $row->id->videoId;?>">
				<a class="btn btn-primary btn-xs download" vid="<?php echo $row->id->videoId;?>" cid="<?php echo $row->snippet->channelId;?>" desc="<?php echo $row->snippet->description;?>"  href="javascript:void(0);" title="Download"><i class="fa fa-download"></i></a>
				</td>
						  </tr>
				      <?php 
					  $i++; 
					   } 
					  }
					  ?>
                                  </tbody>
				  <tfoot>
        <tr>
       <td colspan="15">
	   <div style="text-align:center;float:left;font-size: 17px;padding-bottom: 5px;">
		  <button type="button" name="download_all" class="btn btn-theme custom_blue_btn download_all" style="margin-left:5px;"><i class="fa fa-download"></i>
		  Download all
		  </button>
		</div>
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
	   <input type="hidden" name="channel_id" value="<?php echo $channel_id; ?>">
        </tr>
		     
				  <?php } else { ?>
				<tr>
            <td colspan="15">	<center>Record not available.</center>
				</td>
			</tr>
        <?php  } ?>
		                </form>
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
$this->load->view('admin/footer');
?>
<script type="text/javascript">
$(document).ready(function(){
	
	  $("#down_all").click(function () {
        if ($("#down_all").is(':checked')) {
            $(".down_ck").each(function () {
                $(this).prop("checked", true);
            });

        } else {
            $(".down_ck").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
	
	$(".download_all").click(function(){
	 var ck_lent = $(".down_ck:checked").length;
	  if(ck_lent==0){
		 alert('Select video to download.'); 
		return false;  
	  }
	  
      $('#upload-loader').show();
	  var fdata = $('form').serialize();
		  $.ajax({
				url:'<?php echo base_url();?>ajax/downloadcj',
				type:'POST',
				data:fdata,
				success:function(html){
				 $('#upload-loader').hide(); 
                 alert('Video added in queue for download it will take some time to download all videos as per their size.')				 
				}
		  });
	 
	});
	
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
