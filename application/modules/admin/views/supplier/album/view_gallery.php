<?php $this->load->view(SUPPLIER_FOLDER.'/header');
      $this->load->view(SUPPLIER_FOLDER.'/right-sidebar');
?>
<!--middle contaen-->
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Gallery Management <button class="btn btn-theme custom_blue_btn" type="button" onclick="window.history.go(-1);" style="float:right;">Go Back</button></h3>
		<?php 
		echo showmsg($this->session->flashdata('msg'));
		?>		
		  	
		  	<div class="row mt">
              <div class="col-lg-12">
                      <div class="content-panel">
						  <h4><i class="fa fa-angle-right"></i> Gallery Images</h4>
						<?php 
						 $attrib = array('class'=>'form-inline'); 
						//echo form_open(current_url(),$attrib); ?>
						<section id="no-more-tables">
                          <ul class="video_list">
                    <?php if(!empty($images)):?>
                    	<?php						
                        $i=1;
                        foreach($images as $property):
						?>
						
						<!--<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
						<div class="project-wrapper">
		                    <div class="project">
		                        <div class="photo-wrapper">
		                            <div class="photo">
		                            	<a class="fancybox" href="<?php echo base_url() ?>uploads/album-images/thumb_<?php echo $property['name']?>"><img class="img-responsive" src="<?php echo base_url() ?>uploads/album-images/thumb_<?php echo $property['name']?>" alt=""></a>
		                            </div>
		                            <div class="overlay"></div>
		                        </div>
		                    </div>
		                </div>
					</div>-->
					
		              <li id="hide<?php echo $property['id']?>">
								
                                <div class="imgbar">
    <a href="javascript:void(0);" class="close_button removedel" delid="<?php echo $property['id']?>"><span class="glyphicon glyphicon-remove-circle"></span></a>
                                    </div>
						<a class="fancybox-buttons" data-fancybox-group="button" href="<?php echo base_url() ?>uploads/album-images/<?php echo $property['name']?>">
									<img src="<?php echo base_url() ?>uploads/album-images/thumb_<?php echo $property['name']?>" >
						</a>	
							 </li>
							                                                            
		                    
                    	<?php endforeach; endif;?>
						</ul>    
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
<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.fancybox.pack.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/jquery.fancybox.css?v=2.1.5" media="screen" />
	
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/jquery.fancybox-buttons.css?v=1.0.5" />
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script>
$(function(){
	  /// Delete
		$(document).on('click','.removedel',function(){
		 var delid = $(this).attr('delid');
				
					if(delid!=''){
						if(confirm('Are you sure to delete?'))
						{
						  $.ajax({
							url: '<?php echo base_url()?>ajax/ajaxDelimage/'+delid,
							type: 'POST',
							data:'', 
							async: false,
						   cache: false,
						   contentType: false,
						   processData: false,
							success: function (result) {
							$('#hide'+delid).remove();
							}
						  }); 
					} 
				}
			});
			
	/*
			 *  Button helper. Disable animations, hide close button, change title type and content
			 */

			$('.fancybox-buttons').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});	

});   
</script>
  </body>
</html>