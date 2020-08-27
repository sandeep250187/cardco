<?php $this->load->view('admin/header');
      $this->load->view('admin/right-sidebar');
?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Edit Apartment Master <button class="btn btn-theme custom_blue_btn" type="button" onclick="window.history.go(-1);" style="float:right;">Go Back</button></h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <?php $attributes = array('class' => 'form-horizontal style-form input_from_custom', 'id' => 'payment-form', 'name' => 'payment-form','enctype'=>'multipart/form-data'); ?>
                    <?php echo form_open(current_url(), $attributes ); ?>
                    <?php if(validation_errors()!=''){ ?>
                    <div class="alert alert-danger">
                        <?php if( isset($error)) print($error); ?>
                        <?php echo validation_errors(); ?>
                    </div>
                    <?php } 

                    ?>

                    <h4 class="mb"><i class="fa fa-angle-right"></i> Apartment Information</h4>
					<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Apartment Name<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <?php 
                                 $aptid=$pages[0]['apt_id'] ;
                                  $aptName = getApartment($aptid);
                                 echo $aptName;
                                  ?>
                        </div>
                    </div>
					 
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Apartment Pic1</label>
                        <div class="col-md-10">
                        <input type="file" name="pic1" accept="image/*" class="form-control">
						<?php echo $pages[0]['pic1']; 						
					   if(!empty($pages[0]['pic1'])) 
                       {
						?> <a href="<?php echo base_url() ."uploads/apartmenttariff/".$pages[0]['pic1']."";  ?> " target="_blank">
						<?php echo "<img src='".base_url()."/uploads/apartmenttariff/".$pages[0]['pic1']."' width='60px;' height='60px;'>";
						?>
                        </a>
                        <?php 
                        }
                        ?>
                        
                            <input type="hidden" name="apt_img1" value="<?php echo $pages[0]['pic1']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Apartment Pic2</label>
                        <div class="col-md-10">
                        <input type="file" name="pic2" accept="image/*" class="form-control">
                        <?php echo $pages[0]['pic2'];                       
                       if(!empty($pages[0]['pic2'])) 
                       {
                        ?> <a href="<?php echo base_url() ."uploads/apartmenttariff/".$pages[0]['pic2']."";  ?> " target="_blank">
                        <?php echo "<img src='".base_url()."/uploads/apartmenttariff/".$pages[0]['pic2']."' width='60px;' height='60px;'>";
                        ?>
                        </a>
                        <?php 
                        }
                        ?>
                        
                            <input type="hidden" name="apt_img2" value="<?php echo $pages[0]['pic2']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Apartment Type<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            <select class="form-control" name="apt_type">
                                <option value="">-Select-</option>
                                <option value="Single" <?php if($pages[0]['apt_type']=='Single') echo 'selected="selected"'?>>Single</option>
                                <option value="Double" <?php if($pages[0]['apt_type']=='Double') echo 'selected="selected"'?>>Double</option>
                                <option value="Triple" <?php if($pages[0]['apt_type']=='Triple') echo 'selected="selected"'?>>Triple</option>
                                <option value="Quad" <?php if($pages[0]['apt_type']=='Quad')    echo 'selected="selected"'?>>Quad</option>
                           </select>
						</div>
                    </div>
                
                   <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Apartment Category<span class="red_asterisk">*</span></label>
                        <div class="col-sm-10">
                            
                             <select class="form-control" name="apt_cat">
                                <option value="">-Select-</option>
                                <?php
                            $CategoryId = getCategoryApt();
                            foreach($CategoryId as $category)
                            {
                                ?>
                            <option value="<?=$category['id'];?>" <?php if($pages[0]['apt_cat']==$category['id']) echo 'selected="selected"';?>><?=$category['aptcat'];?></option>
                            <?php 
                            }
                            ?>
                           </select>
							</div>
                    </div> 
					
					
					 <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Valid From</label>
                        <div class="col-sm-10">
                            <input type="text" class="required form-control" value="<?php echo  $pages[0]['valid_from']; ?>" name="valid_from" id="valid_from"></div>
                    </div>
					
					 <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Valid To</label>
                        <div class="col-sm-10">
                            <input type="text" class="required form-control" value="<?php echo  $pages[0]['valid_to']; ?>" name="valid_to" id="valid_to"> </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Apartment Price </label>
                        <div class="col-sm-10">
                            <input type="text" class="required form-control"  name="apt_price" value="<?php echo $pages[0]['apt_price']; ?>">
							</div>
                    </div>
					
					<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Days</label>
                        <div class="col-sm-10">
                        <?php 
                        $days_arr=array('SUN'=>'Sunday','MON'=>'Monday','TUE'=>'Tuesday','WED'=>'Wednesday','THU'=>'Thursday','FRI'=>'Friday','SAT'=>'Saturday');
                        
                        $days=unserialize($pages[0]['days']);
                      
                        foreach($days as $value)
                        {
                            if(array_key_exists($value,$days_arr))
                            {
                                $check="checked";
                            }
                            else
                            {
                                $check=" ";
                            }
                          
                            ?>
                              <input type="checkbox" value="<?=$value;?>" name="days[]" <?=$check?>>&nbsp;<?=$days_arr[$value];?>&nbsp;
                            <?php  
                        }
                         
                        ?>
                        
							</div>
                    </div>

                     
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                            <button class="btn btn-theme custom_blue_btn" type="submit">Save</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <!-- col-lg-12-->
        </div>
        <!-- /row -->
    </section>
    <! --/wrapper -->
</section>
<!-- /MAIN CONTENT -->
<!--main content end-->
<?php 
      $this->load->view('admin/footer');
     ?>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/common/jquery.validate.js"></script>
<script>
    $(document).ready(function() {
        // validate signup form on keyup and submit
        $("#user-form").validate({});
    });

</script>
<script type="text/javascript">
  $( function() {
    $( "#valid_from").datepicker({dateFormat: 'yy-mm-dd'});
    //$('#valid_from').datepicker("setDate", '<?php echo  $pages[0]['valid_from']; ?>' );

    //$( "#valid_from").datepicker( "option", "dateFormat", "yy-mm-dd" );
});
</script>
<script type="text/javascript">
  $( function() {
    $( "#valid_to").datepicker({dateFormat: 'yy-mm-dd'});
    //$( "#valid_to").datepicker( "option", "dateFormat", "yy-mm-dd" );
});    
</script>
