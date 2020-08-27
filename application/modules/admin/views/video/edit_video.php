<?php 
$this->load->view('admin/header');
$this->load->view('admin/right-sidebar');
?>  
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Edit Video</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12"> 
			 <?php 
			 echo showerrormsg($this->session->flashdata('msg'));
			 if(!empty($Videidetail)){
			 ?>
                  <div class="form-panel">
                  	  
			  <?php $attributes = array('class' => 'form-horizontal style-form input_from_custom', 'id' => 'fileupload', 'name' => 'faq-form' ,'enctype'=>'multipart/form-data' ); 
			  ?>
              <?php echo form_open(current_url(), $attributes ); ?>
		      <?php if(validation_errors()!=''){ ?> 
		<div class="alert alert-danger">
			<?php if( isset($error)) print($error); ?>
                       <?php echo validation_errors(); ?>
        
                  </div>
		<?php } ?>
                     <h4 class="mb"><i class="fa fa-angle-right"></i> General Information</h4>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Video Title<span class="red_asterisk">*</span></label>
                              <div class="col-sm-10">
                                  <input type="text" class="required form-control" value="<?php echo UnSaniTize($Videidetail[0]['video_title']); ?>"  name="video_title" id="video_title">
								  <span class="error" id="title-error"></span>
                              </div>
                          </div>
						  
			 <div class="form-group">
			 <?php
			  $cat = array();
			  if(!empty($catid)){
				  foreach($catid as $cat_id)
				  {
					  $cat[] = $cat_id['cat_id'];
				  }
			  }
							
			?>
					  <label class="col-sm-2 col-sm-2 control-label">Select Category<span class="red_asterisk">*</span></label>
					  <div class="col-sm-10">
						<select name="categories[]" id="categories" class="form-control" style="width:400px;" multiple>
						<option value="">-Select Category-</option>
						 <?php
														 
						foreach($category as $categories): 
								$selected = in_array($categories['catid'], $cat)?"selected":"";
								echo "<option value='".$categories['catid']."' $selected>".$categories['cat_name']."</option>";
					   endforeach;		
						 ?> 
					</select>
					<span class="error" id="categories-error"></span>
              <div class="video-thumb" style="float:right; margin-top:-80px;">
				<img src="<?php echo base_url(); ?>uploads/uservideo/images/<?php echo $Videidetail[0]['video_image']; ?>" height="80" width="100" />
			  </div>					
				  </div>
               </div>
			   
			   <div class="form-group">
					  <label class="col-sm-2 col-sm-2 control-label">Select Language<span class="red_asterisk">*</span></label>
					  <div class="col-sm-10">
						<select name="language" class="form-control" style="width:400px;" id="language">
				<option value="">-Select Language-</option>
				<?php
				$languages = getLanguages();
				if(!empty($languages)){
					foreach($languages as $language){
					 if($lang==$language['id']){
						 $selected = "selected";
					 }
					else {
						$selected = '';
					}					 
					 echo "<option value='".$language['id']."' ".$selected.">".$language['lang_name']."</option>";
					}	
				}
				?>
			</select>
			<span class="error" id="language-error"></span>		
				  </div>
               </div>
						  
		<?php
        if($Videidetail[0]['video_source']==2){		
			$checked_f = '';
			$checked_y = 'checked="true"';
			$style_f = 'display:none';
			$style_y = 'display:';
		}
		else {			
			 $checked_f = 'checked="true"';
			 $checked_y = '';
			 $style_f = 'display:';
			 $style_y = 'display:none';
		}
		?>		  
			  <div class="form-group">
				 <label class="col-sm-2 col-sm-2 control-label">Video Source<span class="red_asterisk">*</span></label>
				  <div class="col-sm-10">
				   <label class="control-label"><input type="radio" checked="true" <?php echo $checked_f; ?> value="1" class="video_source"  name="video_source" id="video_source"> From File </label>
		           <label class="control-label"><input type="radio" <?php echo $checked_y; ?> value="2" class="video_source" name="video_source" id="video_source"> Youtube/Vimeo</label>
				  </div>
               </div>
			   
			   
			   <div class="form-group">
				 
				 <div id="file-field" style="<?php echo $style_f; ?>">
		<label for="post_name" class="control-label col-sm-2">Select Files:</label>
		 <div class="col-sm-10">
		 
		 <div class="row fileupload-buttonbar">
  			<div class="col-lg-7">
  				<span class="btn btn-success fileinput-button">
                      <!--<i class="glyphicon glyphicon-plus"></i>
                      <span>Add files...</span>-->
                      <input type="file" accept="video/*" id="files" name="files[]">
                  </span>
  				
  				
  				
  				
  				<!-- The global file processing state -->
  				<span class="fileupload-process"></span>
  			</div>
  			<!-- The global progress state -->
  			<div class="col-lg-5 fileupload-progress fade">
  				<!-- The global progress bar -->
  				<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
  					<div class="progress-bar progress-bar-success" style="width:0%;"></div>
  				</div>
  				<!-- The extended global progress state -->
  				<div class="progress-extended">&nbsp;</div>
  			</div>
  		</div>
		<!-- The table listing the files available for upload/download -->
  		<table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
		
		<!-- The template to display files available for upload -->
  <script id="template-upload" type="text/x-tmpl">
  {% for (var i=0, file; file=o.files[i]; i++) { %}
      <tr class="template-upload fade">
          <td>
              <span class="preview" style="display:none;"></span>
          </td>
          <td>
              <p class="name">{%=file.name%}</p>
              <strong class="error text-danger"></strong>
          </td>
          <td style="display:none;">
              <p class="size">Processing...</p>
              <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
          </td>
          <td>
              {% if (!i && !o.options.autoUpload) { %}
                  <button class="btn btn-primary start" disabled>
                      <i class="glyphicon glyphicon-upload"></i>
                      <span>Start</span>
                  </button>
              {% } %}
              {% if (!i) { %}
                  <button class="btn btn-warning cancel">
                      <i class="glyphicon glyphicon-ban-circle"></i>
                      <span>Cancel</span>
                  </button>
              {% } %}
          </td>
      </tr>
  {% } %}
  </script>
  <!-- The template to display files available for download -->
  <script id="template-download" type="text/x-tmpl">
  {% for (var i=0, file; file=o.files[i]; i++) { %}
      <tr class="template-download fade">
          <td>
              <span class="preview">
                  {% if (file.thumbnailUrl) { %}
                      <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                  {% } %}
              </span>
          </td>
          <td>
              <p class="name">
                  {% if (file.url) { %}
                      <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                  {% } else { %}
                      <span>{%=file.name%}</span>
                  {% } %}
              </p>
              {% if (file.error) { %}
                  <div><span class="label label-danger">Error</span> {%=file.error%}</div>
              {% } %}
          </td>
          <td>
              <span class="size">{%=o.formatFileSize(file.size)%}</span>
          </td>
          <td>
              {% if (file.deleteUrl) { %}
                  <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                      <i class="glyphicon glyphicon-trash"></i>
                      <span>Delete</span>
                  </button>
                  <input type="checkbox" name="delete" value="1" class="toggle">
              {% } else { %}
                  <button class="btn btn-warning cancel">
                      <i class="glyphicon glyphicon-ban-circle"></i>
                      <span>Cancel</span>
                  </button>
              {% } %}
          </td>
      </tr>
  {% } %}
  </script>
  <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
  <script src="<?= site_url('assets/jfu/js/vendor/jquery.ui.widget.js'); ?>"></script>
  <!-- The Templates plugin is included to render the upload/download listings -->
  <script src="<?= site_url('assets/jfu/tmpl.min.js'); ?>"></script>
  <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
  <script src="<?= site_url('assets/jfu/load-image.all.min.js'); ?>"></script>
  
  <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
  <script src="<?= site_url('assets/jfu/js/jquery.iframe-transport.js'); ?>"></script>
  <!-- The basic File Upload plugin -->
  <script src="<?= site_url('assets/jfu/js/jquery.fileupload.js'); ?>"></script>
  <!-- The File Upload processing plugin -->
  <script src="<?= site_url('assets/jfu/js/jquery.fileupload-process.js'); ?>"></script>
  <!-- The File Upload image preview & resize plugin -->
  <script src="<?= site_url('assets/jfu/js/jquery.fileupload-image.js'); ?>"></script>
  <!-- The File Upload audio preview plugin -->
  <script src="<?= site_url('assets/jfu/js/jquery.fileupload-audio.js'); ?>"></script>
  <!-- The File Upload video preview plugin -->
  <script src="<?= site_url('assets/jfu/js/jquery.fileupload-video.js'); ?>"></script>
  <!-- The File Upload validation plugin -->
  <script src="<?= site_url('assets/jfu/js/jquery.fileupload-validate.js'); ?>"></script>
  <!-- The File Upload user interface plugin -->
  <script src="<?= site_url('assets/jfu/js/jquery.fileupload-ui.js'); ?>"></script>
  <!-- The main application script -->
  <script src="<?= site_url('assets/jfu/js/admin-main.js'); ?>"></script>
  <!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
  <!--[if (gte IE 8)&(lt IE 10)]>
  <script src="<?= site_url('assets/jfu/js/cors/jquery.xdr-transport.js'); ?>"></script>
  <![endif]-->
  
		
		
		<span class="video-error" id="video-error"></span>
		<span class="video-msg" id="video-msg"></span>

		</div>
		</div> 
     </div>
	 
	 
			<div class="form-group" id="youtube-field" style="<?php echo $style_y; ?>">
              <label for="post_name" class="control-label col-sm-2">Youtube/Vimeo Video Url:</label>
			 <div class="col-sm-10">
			 <input type="text" name="embedded_code" class="form-control" id="embedded_code" placeholder="Youtube/Vimeo Video Url">
			 <span class="error" id="embedded-error"></span>				
			 </div>
           </div>
		   
		   <div class="form-group">
		<label for="keywords" class="control-label col-sm-2">Keywords/Tags:</label>
		<div class="col-sm-10">
		<input type="text" data-role="tagsinput" class="control-label form-control" id="keywords" value="<?php echo $Videidetail[0]['keywords']; ?>" name="keywords" placeholder="Add your own tags.">
		</div>
		</div>
		
		<div class="form-group vd_field">
		<label for="post_name" class="control-label col-sm-2">Do you want to make private this video:</label>
		<div class="col-sm-10">
		<input type="checkbox" id="is_private" <?php if($Videidetail[0]['is_private']==1){ echo "checked";}?> name="is_private"  value="1" />
		</div>
		</div>
		
		<div class="form-group">
		<label for="post_name" class="control-label col-sm-2">Description:</label>
		<div class="col-sm-10">
		<textarea class="control-label form-control required" id="video_description" name="video_description" rows="5" cols="100" placeholder="Write Something About Video....."><?php echo strip_tags($Videidetail[0]['video_description']); ?></textarea>
		<span class="language-error" id="description-error"></span>
		</div>
		</div>
		
		<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Set as<span class="red_asterisk">*</span></label></label>
							  <?php $is_popular = $Videidetail[0]['is_popular'];	
							   $large_banner = $Videidetail[0]['large_banner'];	
							   $small_banner = $Videidetail[0]['small_banner']; ?>
                           
							 <div class="col-sm-10">
							  <p>Large Banner
							  <input style="width:15px;    margin: 4px 6px 0 0;float: left;" type="checkbox" class="required form-control" name="large_banner" value="1" <?php echo set_value('large_banner', $large_banner) == 1 ? "checked" : ""; ?> /></p>
							  <p>Small Banner
							  <input type="checkbox" style="width:15px;    margin: 4px 6px 0 0;     float: left;" class="required form-control" name="small_banner" value="1" <?php echo set_value('small_banner', $small_banner) == 1 ? "checked" : ""; ?> /></p>
						     </div>
                </div>
				
		
			   
			  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <button class="btn btn-theme custom_blue_btn" name="save_video" id="save_video" type="submit">Save</button>
                              </div>
               </div>
			   <input type="hidden" name="vd_id" value="<?php echo $Videidetail[0]['ID']; ?>" /> 
			   <input type="hidden" name="video_name" value="" id="video_name" class="required" />
				<ul id="file_list" style="display: none;">
					<!-- File data will be listed here -->
				</ul>
			  
                          
                      </form>
                  </div>
				  
				  <?php } ?>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
          
		  
			<div id="upload-loader" style="display:none;">	
			<div class="cssload-loader">Uploading...</div>
			<div class="overlay-uploading"></div>
			</div>


		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

<!--main content end-->
     <?php 
      $this->load->view('admin/footer');
     ?>
<link rel="stylesheet" rel="stylesheet" href="<?php echo base_url(); ?>assets/tags/bootstrap-tagsinput.css">
<script src="<?php echo base_url();?>assets/tags/bootstrap-tagsinput.min.js"></script>
	 <script type="text/javascript">

			$(document).ready(function() {

				$('.video_source').click(function(){
				 var c_val  = $(this).val();
				  if(c_val==1){
					  $('#file-field').show();
					  $('#youtube-field').hide();
				  }
				  if(c_val==2){
					  $('#youtube-field').show();
					  $('#file-field').hide();
				  }
				 
				});
				//**//
				$('#save_video').click(function(e){					
				//*******//
				var video_source = $('#video_source:checked').val();
				  
				 if($('#video_title').val()=="")
				  {
					$('#title-error').html('Enter video title.');
					return false;
				  }
				  else
				  { 
					$('#title-error').html('');
				  }
				
				 if($('#categories').val()=="")
					{	
				       $('#categories-error').html('Select video category.');
					  $('#categories').focus();
						return false;
					}
					else {
					 $('#categories-error').html('');	
					}
					
					var lang = $('#language').val();
						
						if(lang==''){ 						
							$('#language-error').html('Select any language.');
						    return false;
						}
						else {
							$('#language-error').html('');
						}
					
					
					
					if($('#video_description').val()=="")
					{	
				        $('#description-error').html('<span class="error">Enter video description.</span>');
						$('#video_description').focus();
						return false;
					}
					else {
						$('#description-error').html('');
					}   
					
                    $('#upload-loader').show();
					
				});
				//*End*//
			});
		</script>
<style>
		
		.progress {
				display: block;
				text-align: center;
				width:251px;
				height:20px;
				padding:0px;
				background:#ccc;
				border:1px solid #aaa;
				-moz-box-shadow: inset 0 0 3px #888;
				-webkit-box-shadow: inset 0 0 3px #888;
				box-shadow: inset 0 0 3px #888;
				transition: width .3s;
				margin-top: 10px;
			}

		.video-error {
				color: red;
				display: block;
				font-size: 13px;
				margin-bottom: 5px;
		}
		
		</style>