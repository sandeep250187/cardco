<?php 
$this->load->view('admin/header');
$this->load->view('admin/right-sidebar');
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
						  <h4><i class="fa fa-angle-right"></i> Video List</h4>
					      <?php 
						 $attrib = array('class'=>'form-inline','style'=>'margin-bottom:15px;'); 
						echo form_open(current_url(),$attrib); ?>
						<div class="form-group">
							 <select name="username" id="username" class="form-control custom-select">
							<option value="">-Username-</option>
						     <?php
                              $users = getUserlist();
							  if(!empty($users)){
							  foreach($users as $usr){
								  if($username!='null' && $username==$usr['username']){
								   $selec_u = "selected='true'";
							      }
							      else { $selec_u = ""; }
							 
								echo "<option value='".$usr['username']."' ".$selec_u.">".$usr['full_name']."</option>";  
							  }
							  }							  
							  ?>
							</select>
							
						</div>
						      <?php
							  $parents = itsgetCategory(0);
							  ?>
						<span class="label label-info">OR</span>
						<div class="form-group">
							 <select name="category" id="category" class="form-control custom-select">
							<option value="">-Category-</option>
								  <?php
                              foreach($parents as $name){
								  if($category!='null' && $category==$name['catid']){
								   $selec_c = "selected='true'";
							      }
							      else { $selec_c = ""; }
								  
									echo "<option value='".$name['catid']."' style='color:#F41173;' ".$selec_c.">".$name['cat_name']."</option>";
								}							  
							  ?>
							</select>
							 
						</div>
						<?php
						if($from!='null' && $to!='null'){
							$from_val = $from;
							$to_val = $to;
						}
						else { $from_val='From'; $to_val='To';}
						?>
						<div class="form-group">
						<span class="label label-info">OR</span>
							Registration Date :
							<div class="input-group input-large" style="width:300px;">
		                        <input type="text" class="form-control dpd1" name="from" placeholder="<?php echo $from_val; ?>" id="from">
		                        <span class="input-group-addon">To</span>
		                          <input type="text" placeholder="<?php echo $to_val; ?>" id="to" class="form-control dpd2"name="to">
		                   </div>
									  
						</div>
						<div class="form-group" align="left">
							<button class="btn btn-theme custom_blue_btn" type="submit" name="search">Search</button>
						</div>
						<?php echo form_close(); ?>
					
				<section id="no-more-tables">
				  <table class="table table-bordered table-striped table-condensed cf">
					<thead class="cf">
					  <tr>
                      <th>SL#</th>
                      <th>Video Title</th>
				      <th>Username</th>
					  <th>Category</th>
					  <th>Uploaded On</th>
                      <th><i class=" fa fa-edit"></i> Action</th>
                      </tr>
                      </thead>
				 
				 <?php 				
				  if(!empty($videos)){
					  $i=++$page;
				  ?>
                                  <tbody>
				      <?php 
				 
				      foreach($videos as $row){ ?>
                                  <tr>
                    <td data-title="SL#"><?php echo $i ; ?></td>
					<td data-title="Video Title"><?php 
					if(strlen($row['video_title'])>50)
						echo substr($row['video_title'],0,50)." ....." ; 
						 else
						 echo $row['video_title'];
						?></td>
					  <td data-title="Username"><?php 
					  echo $row['full_name'];
					  ?>
					  </td>
					<td data-title="Categories"> <?php echo Get_Video_Categories($row['v_id']); ?></td>
					
					
					<td data-title="Last Name"> <?php echo globalDateformat($row['video_date']); ?></td>
							
						
                      
						<td data-title="Action">
						<a class="btn btn-default btn-xs"  href="<?php echo base_url() . "admin/video/view/".$row['v_id']."/".($page-1); ?>" title="View" ><i class="fa fa-eye"></i></a>
						<!---edit page---->
						<a class="btn btn-primary btn-xs"  href="<?php echo base_url() . "admin/video/edit/".$row['v_id']."/".$row['video_lang']."/".($page-1); ?>" onclick="return confirm('Are you sure you want to edit <?php echo $row['video_title'] ; ?>?');" title="Edit" ><i class="fa fa-pencil"></i></a>
						<!---end edit page---->
						<!---status----->
						<?php  if($row['video_status']==1){ ?>
						<a href="<?php echo base_url() . "admin/video/status/".$row['v_id']."/0";?>" class="btn btn-success btn-xs"  title="Enable" onclick="return confirm('Are you sure you want to disable <?php $row['video_title']; ?>?');">
						<i class="fa fa-check"></i></a>
						<?php } else { ?>
						<a class="btn btn-warning btn-xs" href="<?php echo base_url() . "admin/video/status/".$row['v_id']."/1";?>"  title="Disable" onclick="return confirm('Are you sure you want to enable <?php echo $row['video_title']; ?>?');"> 
						<i class="fa fa-check"></i></a>
						<?php } ?> <!----end status------>
						
						<!----delete------>
						<a class="btn btn-danger btn-xs" href="<?php echo base_url() . "admin/video/delete/".$row['v_id'].'/'.$row['video_lang'];  ?>" onclick="return confirm('Are you sure you want to remove this video?');" title="Remove"><i class="fa fa-trash-o "></i></a>
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
$this->load->view('admin/footer');
?>
<script type="text/javascript">
  $( function() {
    $( "#from" ).datepicker();
	$( "#from" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
	
	$( "#to" ).datepicker();
    $( "#to" ).datepicker( "option", "dateFormat", "yy-mm-dd" );	
	 
	$("#username").customselect();
	
	$("#category").customselect();
  } );
  </script>