<?php
	
	//print_r($this->session->userdata('video_existence'));

 $this->load->view('header'); ?>


<div class="full_wrap middle_section">
<div class="wrap">
<div class="heading">
<h1 class="page_title">My Bookmark</h1>
	<div class="btn_wrap_header">
		<a class="btn btn-default" href="<?php echo site_url('uservideo/addBookmark')?>">Add New Bookmark</a>
	</div>
</div>
<div class="box-body">
            	<?php echo showmsg($this->session->flashdata('message'));?>
            	
                <table class="table table-bordered">
                    <tr>
                        <th class="no_table" width="5%">#</th>
						<th class="title_table" width="20%">Bookmark</th> 	
                        <th class="title_table" width="65%">Bookmark Details</th>   
                        <th class="action_table" width="10%">Action</th>
                    </tr>
                    <?php 
					//print_r($Playlist);
					if(!empty($bookmarks)):?>
                    	<?php 
                        $i=1;
                        foreach($bookmarks as $bookmark):?>
						
						
		                    <tr>
		                        <td class="no_table" ><?php echo $i++;?></td>
		                        <td class="title_table">
								<?php echo $bookmark['bookmark_name'];?>
								</td>                                  
                                <td class="title_table">
								
								
									<?php 
									
									$bookmarks = Get_VideoBook_Listing($bookmark['ID']);
									
									if($bookmarks):
									
									echo "<ul>";
									
									for($i=0; $i<count($bookmarks); $i++)
									{
									foreach($bookmarks[$i] as $key => $val):
										echo "<li><div class='v-detail'><img src='". base_url() ."uploads/uservideo/images/". $val['video_image_path'] ."' height='35' width='45' /> ". $val['video_title']  ." | <span>Size : ". $val['video_size'] ."</span>, <span>Resolution : ". $val['video_resolution_height'] ."</span><hr class='hr-line' /></div></li>";
									endforeach;
									}
									echo "</ul>";
									endif;
									
									?>
								
								</td>                           
		                        <td class="action_table">
		                        	<a class="btn btn-primary btn-xs" href="<?php echo site_url('uservideo/editbookmark/'.$bookmark['ID'])?>" title="Edit"><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-danger btn-xs" href="<?php echo site_url('uservideo/deletebookmark/'.$bookmark['ID'])?>" onclick="return confirm('Are you sure to delete <?php echo $bookmark['bookmark_name']?>?')" title="Delete"><i class="fa fa-trash-o "></i></a>
		                        </td>
		                    </tr>
                    	<?php endforeach;?>
                	<?php else:?>
                		<tr><td colspan="3">No record found</td></tr>
                	<?php endif;?>
                </table>
            </div><!-- /.box-body -->
<div class="box-footer clearfix"><?php echo $links ?></div>      
</div>
</div>

<style>
.private
{
	background-color: rgba(132, 55, 60, 0.47);
    color: #fff;
}
.hr-line
{	
	margin: 2px;
	border-top: 1px solid rgba(79, 82, 81, 0.1)	
}
</style>

<?php $this->load->view('footer'); ?>

