<?php
    $this->load->view(SUPPLIER_FOLDER.'/header');
    $this->load->view(SUPPLIER_FOLDER.'/right-sidebar');
?>
<!--main content start-->
<section id="main-content">
  <section class="wrapper site-min-height">
    <div class="row">
      <div class="col-lg-9 main-chart">
	  <button type="button" class="btn btn-primary btn-lg btn-block">Today Reports..</button>
					<div class="row mtbox">
					<?php
                     $startdate = date('Y-m-d 00:00:00');
					 $enddate = date('Y-m-d 23:59:59');
					?>
                  		<div class="col-md-5 col-sm-2 col-md-offset-1 box0">
                  			<div class="box1">
					  			<span class="li_user"></span>
					  			<h3>(<?php echo membersCount($startdate,$enddate); ?>)</h3>
                  			</div>
					  			<p>(<?php echo membersCount($startdate,$enddate); ?>) Dentist.</p>
                  		</div>
                  		<div class="col-md-5 col-sm-2 box0">	
                  			<div class="box1">
					  			<span class="li_lead"></span>
					  			<h3>(<?php echo leadCount($startdate,$enddate); ?>)</h3>
                  			</div>
					  			<p>(<?php echo leadCount($startdate,$enddate); ?>) Leads.</p>
                  		</div>
                  		
                  		
                  	
                  	</div>
		<button type="button" class="btn btn-primary btn-lg btn-block">All Reports..</button>			
                 <div class="row mtbox">
                  		<div class="col-md-5 col-sm-2 col-md-offset-1 box0">
                  			<div class="box1">
					  			<span class="li_user"></span>
					  			<h3>(<?php echo membersCount($startdate='',$enddate=''); ?>)</h3>
                  			</div>
					  			<p>(<?php echo membersCount($startdate='',$enddate=''); ?>) Dentist.</p>
                  		</div>
                  		<div class="col-md-5 col-sm-2 box0">	
                  			<div class="box1">
					  			<span class="li_lead"></span>
					  			<h3>(<?php echo leadCount($startdate='',$enddate=''); ?>)</h3>
                  			</div>
					  			<p>(<?php echo leadCount($startdate='',$enddate=''); ?>) Leads.</p>
                  		</div>
                  </div>
					
					
					
					<div class="col-lg-12">
                          <div class="content-panel">
							  <h4><i class="fa fa-angle-right"></i> Dentist Registration and Leads Stats for Year <?php echo date('Y'); ?> </h4>
							  <div><div style="background:blue;width:25px;display: inline-block;">&nbsp;</div> <span>Leads Stats</span></div>
							  <div><div style="background:#00FF00;width:25px;display: inline-block;margin-top:5px;">&nbsp;</div> <span>Dentist Registration</span></div>
							  
                              <div class="panel-body text-center">
                                  <canvas id="bar" height="300" width="700"></canvas>
                              </div>
                          </div>
						  <?php 
						  $month_data = monthlyBar();
						  ?>
                      </div>
					  <script type="text/javascript">
					  var barChartData = {
						labels : ["January","February","March","April","May","June","July","August","September","October","November","December"],
						datasets : [
							{
								fillColor : "rgba(31,24,226,0.8)",
								strokeColor : "rgba(31,24,226,1)",
								data : [<?php echo $month_data['leads']; ?>] 
							},
							{
								fillColor : "rgba(24,226,71,0.7)",
								strokeColor : "rgba(24,226,71,1)",
								data : [<?php echo $month_data['member']; ?>]
							}
						  ]

					      };
	                   new Chart(document.getElementById("bar").getContext("2d")).Bar(barChartData);
					  </script>
					
					
	   
      </div>
      <!-- /col-lg-9 END SECTION MIDDLE -->
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->
	  <div class="col-lg-3 ds">
                    <!--COMPLETED ACTIONS DONUTS CHART-->
						<h3>RECENT DENTIST</h3>
                         <?php 
                          $members = recentMembers();
						  if(!empty($members)){
							  foreach($members as $mems){
						 ?>						 
                       <div class="desc">
                      	<div class="thumb">
						<?php
							   $img = $mems['profile_pic'];
							   if($img!=''){
							  ?>
							  <img class="img-circle" src="<?php echo base_url(); ?>/uploads/member/<?php echo $img; ?>" width="35" height="35" alt="" border="0" />
							  <?php 
							   }
							   else {
								   ?>
							  <img class="img-circle" width="35" height="35" alt="No image" src="<?php echo base_url(); ?>/uploads/member/no-image.jpg">
						  <?php 
							   }
					   ?>
                      		
                      	</div>
                      	<div class="details">
                      		<p><a href="<?php echo base_url(); ?>supplier/member/view/<?php echo $mems['id']; ?>/0"><?php echo $mems['fname'].' '.$mems['lname']; ?></a><br/>
                      		   <muted><?php if($mems['status']==1){ echo "Active"; } else { echo "Inactive";} ?></muted>
                      		</p>
                      	</div>
                      </div>
						  <?php }  } ?> 
                       <!-- USERS ONLINE SECTION -->
						<h3>MAX LEADS BY DENTIST</h3>
						<?php
                        $max_user = maxleadGeneraters();
                        if(!empty($max_user)){
						  foreach($max_user as $members){
						?>
                      <!-- First Member -->
                      <div class="desc">
                      	<div class="thumb">
                      		<?php
							   $img = $members['profile_pic'];
							   if($img!=''){
							  ?>
							  <img class="img-circle" src="<?php echo base_url(); ?>/uploads/member/<?php echo $img; ?>" width="35" height="35" alt="" border="0" />
							  <?php 
							   }
							   else {
								   ?>
							  <img class="img-circle" width="35" height="35" alt="No image" src="<?php echo base_url(); ?>/uploads/member/no-image.jpg">
						  <?php 
							   }
					   ?>
                      	</div>
                      	<div class="details">
                      		<p><a href="<?php echo base_url(); ?>supplier/member/view/<?php echo $members['member_id']; ?>/0"><?php echo $members['full_name']; ?></a><br/>
                      		   <muted>Leads </muted>(<?php echo $members['count']; ?>) <br/>
							   <span><a href="<?php echo base_url(); ?>supplier/leads/listing">View Leads</a><span>
                      		</p>
                      	</div>
                      </div>
						<?php } } ?>
                      
                  </div>
				  
    </div>
  </section>
</section>
<!--main content end-->
<?php 
    $this->load->view(SUPPLIER_FOLDER.'/footer');
?>
  </body>
</html>
<!--script for this page-->