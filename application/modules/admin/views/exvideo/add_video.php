<?php $this->load->view('admin/header');
      $this->load->view('admin/right-sidebar');
?>  
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
 <!--main content start-->
      <?php
	  if(isset($_POST['save'])){
	   $max_results=50;
	   $key = 'AIzaSyBAj6H0QAihtJohOEl5eoWE5qzkz8gUr1o';
	   $channel_id = $_POST['channel_id'];
		$context = stream_context_create(array(
			'http' => array('ignore_errors' => true),
		));
        $url ='https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId='.$channel_id.'&maxResults='.$max_results.'&key='.$key;
		$location = json_decode(file_get_contents($url, false, $context));

		if(!empty($location->error->message)){
		 $this->session->set_flashdata('msg', $location->error->message);
		 redirect('admin/exvideo/');
		}
			 
			 $total_records = (!empty($location->pageInfo->totalResults)) ? $location->pageInfo->totalResults:'';
		 //pr($location); die;
         if(isset($location->items[0]->id->playlistId)){
			$text_message = 'Total Playlist : ';  
		   }
		   else {
			$text_message = 'Total Video : ';     
		   }		
	    include_once('view_download_option.php');  
       die;	   
	  }
       if(!empty($records)){
		   //pr($records);
		   if(isset($records[0]->id->playlistId)){
			include_once('view_playlist.php');   
		   }
		   else {
			include_once('view_video.php');   
		   }
		 
		 die();
	   }
	   else {
	  ?>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Add Channel</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12"> 
                <?php
				echo message_box($this->session->flashdata('msg'),'danger');	
		        echo message_box($this->session->flashdata('msgsuccess'),'success');		
				?>
                  <div class="form-panel">
                  	  
			  <?php $attributes = array('class' => 'form-horizontal style-form input_from_custom', 'id' => 'faq-form', 'name' => 'faq-form' ,'enctype'=>'multipart/form-data' ); ?>
                          <?php echo form_open(current_url(), $attributes ); ?>
		      <?php if(validation_errors()!=''){ ?> 
		<div class="alert alert-danger">
			<?php if( isset($error)) print($error); ?>
                       <?php echo validation_errors(); ?>
        
                  </div>
		<?php } ?>
                     <h4 class="mb"><i class="fa fa-angle-right"></i> General Information</h4>
					 
					  <div class="form-group">
						  <label class="col-sm-2 col-sm-2 control-label">Channel Id<span class="red_asterisk">*</span></label>
						  <div class="col-sm-10">
							  <input type="text" class="required form-control" value="<?php echo  $this->input->post('channel_id'); ?>" required  name="channel_id" >
							  </br>
							  <div><strong>Note: Plese enter ony channel id like: UC-9-kyTW8ZkZNDHQJ6FgpwQ</strong></div>
						  </div>
					  </div>

			  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <button class="btn btn-theme custom_blue_btn" name="save" type="submit">Submit</button>
                              </div>
                          </div>
			  
                          
                      </form>
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
          
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
	   <?php } ?>

<!--main content end-->
     <?php 
      $this->load->view('admin/footer');
     ?>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/common/jquery.validate.js"></script>


