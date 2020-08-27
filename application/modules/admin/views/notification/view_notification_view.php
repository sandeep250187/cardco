<?php 
$this->load->view('admin/header');
$this->load->view('admin/right-sidebar');
?>  
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>Notification Details</h3>
	<button class="btn btn-theme custom_blue_btn" type="button" onclick="window.history.go(-1);" style="float:right;">Go Back</button>

          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12"> 
                  <div class="form-panel">
                  	  
			  <?php
			  //pr($ques_ans);
			  $attributes = array('class' => 'form-horizontal style-form input_from_custom', 'id' => 'faq-form', 'name' => 'faq-form' ,'enctype'=>'multipart/form-data' );
			  ?>
                  <?php echo form_open(current_url(), $attributes ); ?>
		    
                     <h4 class="mb"><i class="fa fa-angle-right"></i> Notification Details</h4>
					  <div class="form-group">
						  <label class="col-sm-2 col-sm-2 control-label">Event Name :</label>
						  <div class="col-sm-10">
						  <?php
                                                 $evt = unserialize($pages[0]['event_id']);
                                                $events = "";
                                                foreach ($evt as $value) {
                                                    $event = showEvents($value);
                                                    if($events == ""){
                                                        $events = $event[0]['name'];
                                                    }
                                                    else
                                                    {
                                                    $events = $events . ", " . $event[0]['name'];
                                                }
                                            }
                                                    echo $events.".";

                                            ?>
						  </div>
						</div>
                         <div class="form-group">
						  <label class="col-sm-2 col-sm-2 control-label">Notification Description : </label>
						  <div class="col-sm-10">
						   <?php echo $pages[0]['notification']; ?>
						  </div>
						</div>
 					 </form>
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
          
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->


<!--main content end-->
     <?php 
$this->load->view(ADMIN_FOLDER.'/footer');
?>
 </body>
</html>