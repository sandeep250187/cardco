<?php $this->load->view('home/header');?>
<div class="row page-heads" id="contents">
	<div class="container">
		<form type="search" id="tour_validate" method="POST" action="" class="searchs col-sm-10 offset-md-1">
			<input name="by" type="hidden" value="1"/>
			<div class="selection clearfix">
				<div class="row">
					<div class="col-sm-3 pr-1 pl-1">
						<div class="styled-select-small">
							<div class="position-absolute"><i class="fa fa-calendar"></i></div>
							<input type="text" id="datepicker" class="form-control" name="from" placeholder="Service Date" value="<?php echo $date; ?>" autocomplete="off">
							<b><span class="text-warning" id="date_result"></span></b>
						</div>
					</div>
					<div class="col-sm-3 pr-1 pl-1">
						<div class="styled-select-small">
							<div class="position-absolute"><i class="fa fa-user"></i></div>
							<select class="form-control" name="pickup_point" id="pp" placeholder="Pick-up Point">
								<option value="">-Select-</option>
								<?php
								$HtlList = getHotelList();
								foreach($HtlList as $htl_list)
								{
								?>
								<option  value="<?=$htl_list['id']?>" <?php if($_REQUEST['pickup_point']==$htl_list['id']) echo 'selected="selected"';?>><?=$htl_list['hotelname']?></option>
								<?php
								}
								?>
							</select>
							<b><span class="text-warning" id="pp_result"></span></b>
						</div>
					</div>
					<div class="col-sm-3 pr-1 pl-1">
						<div class="styled-select-small">
							<div class="position-absolute"><i class="fa fa-user"></i></div>
							<select class="form-control" name="noof_pax" id="noof_pax" placeholder="No of Pax">
								<option value="">-Select-</option>
								<option value="pax1,1" <?php if($_REQUEST['noof_pax']=='pax1,1') echo 'selected="selected"';?>>01 Pax</option>
								<option value="pax4,2" <?php if($_REQUEST['noof_pax']=='pax4,2') echo 'selected="selected"';?>>02 Pax</option>
								<option value="pax4,3" <?php if($_REQUEST['noof_pax']=='pax4,3') echo 'selected="selected"';?>>03 Pax</option>
								<option value="pax4,4" <?php if($_REQUEST['noof_pax']=='pax4,4') echo 'selected="selected"';?>>04 Pax</option>
								<option value="pax9,5" <?php if($_REQUEST['noof_pax']=='pax9,5') echo 'selected="selected"';?>>05 Pax</option>
								<option value="pax9,6" <?php if($_REQUEST['noof_pax']=='pax9,6') echo 'selected="selected"';?>>06 Pax</option>
								<option value="pax9,7" <?php if($_REQUEST['noof_pax']=='pax9,7') echo 'selected="selected"';?>>07 Pax</option>
								<option value="pax9,8" <?php if($_REQUEST['noof_pax']=='pax9,8') echo 'selected="selected"';?>>08 Pax</option>
								<option value="pax9,9" <?php if($_REQUEST['noof_pax']=='pax9,9') echo 'selected="selected"';?>>09 Pax</option>
								<option value="pax16,10" <?php if($_REQUEST['noof_pax']=='pax16,10') echo 'selected="selected"';?>>10 Pax</option>
								<option value="pax16,11" <?php if($_REQUEST['noof_pax']=='pax16,11') echo 'selected="selected"';?>>11 Pax</option>
								<option value="pax16,12" <?php if($_REQUEST['noof_pax']=='pax16,12') echo 'selected="selected"';?>>12 Pax</option>
								<option value="pax16,13" <?php if($_REQUEST['noof_pax']=='pax16,13') echo 'selected="selected"';?>>13 Pax</option>
								<option value="pax16,14" <?php if($_REQUEST['noof_pax']=='pax16,14') echo 'selected="selected"';?>>14 Pax</option>
								<option value="pax16,15" <?php if($_REQUEST['noof_pax']=='pax16,15') echo 'selected="selected"';?>>15 Pax</option>
								<option value="pax16,16" <?php if($_REQUEST['noof_pax']=='pax16,16') echo 'selected="selected"';?>>16 Pax</option>
								<option value="pax25,17" <?php if($_REQUEST['noof_pax']=='pax25,17') echo 'selected="selected"';?>>17 Pax</option>
								<option value="pax25,18" <?php if($_REQUEST['noof_pax']=='pax25,18') echo 'selected="selected"';?>>18 Pax</option>
								<option value="pax25,19" <?php if($_REQUEST['noof_pax']=='pax25,19') echo 'selected="selected"';?>>19 Pax</option>
								<option value="pax25,20" <?php if($_REQUEST['noof_pax']=='pax25,20') echo 'selected="selected"';?>>20 Pax</option>
								<option value="pax25,21" <?php if($_REQUEST['noof_pax']=='pax25,21') echo 'selected="selected"';?>>21 Pax</option>
								<option value="pax25,22" <?php if($_REQUEST['noof_pax']=='pax25,22') echo 'selected="selected"';?>>22 Pax</option>
								<option value="pax25,23" <?php if($_REQUEST['noof_pax']=='pax25,23') echo 'selected="selected"';?>>23 Pax</option>
								<option value="pax25,24" <?php if($_REQUEST['noof_pax']=='pax25,24') echo 'selected="selected"';?>>24 Pax</option>
								<option value="pax25,25" <?php if($_REQUEST['noof_pax']=='pax25,25') echo 'selected="selected"';?>>25 Pax</option>
								<option value="pax31,26" <?php if($_REQUEST['noof_pax']=='pax31,26') echo 'selected="selected"';?>>26 Pax</option>
								<option value="pax31,27" <?php if($_REQUEST['noof_pax']=='pax31,27') echo 'selected="selected"';?>>27 Pax</option>
								<option value="pax31,28" <?php if($_REQUEST['noof_pax']=='pax31,28') echo 'selected="selected"';?>>28 Pax</option>
								<option value="pax31,29" <?php if($_REQUEST['noof_pax']=='pax31,29') echo 'selected="selected"';?>>29 Pax</option>
								<option value="pax31,30" <?php if($_REQUEST['noof_pax']=='pax31,30') echo 'selected="selected"';?>>30 Pax</option>
								<option value="pax31,31" <?php if($_REQUEST['noof_pax']=='pax31,31') echo 'selected="selected"';?>>31 Pax</option>
								
								<option value="pax40,32" <?php if($_REQUEST['noof_pax']=='pax40,32') echo 'selected="selected"';?>>32 Pax</option>
								<option value="pax40,33" <?php if($_REQUEST['noof_pax']=='pax40,33') echo 'selected="selected"';?>>33 Pax</option>
								<option value="pax40,34" <?php if($_REQUEST['noof_pax']=='pax40,34') echo 'selected="selected"';?>>34 Pax</option>
								<option value="pax40,35" <?php if($_REQUEST['noof_pax']=='pax40,35') echo 'selected="selected"';?>>35 Pax</option>
								<option value="pax40,36" <?php if($_REQUEST['noof_pax']=='pax40,36') echo 'selected="selected"';?>>36 Pax</option>
								<option value="pax40,37" <?php if($_REQUEST['noof_pax']=='pax40,37') echo 'selected="selected"';?>>37 Pax</option>
								<option value="pax40,38" <?php if($_REQUEST['noof_pax']=='pax40,38') echo 'selected="selected"';?>>38 Pax</option>
								<option value="pax40,39" <?php if($_REQUEST['noof_pax']=='pax40,39') echo 'selected="selected"';?>>39 Pax</option>
								<option value="pax40,40" <?php if($_REQUEST['noof_pax']=='pax40,40') echo 'selected="selected"';?>>40 Pax</option>
							</select>
							<b><span class="text-warning" id="nopax_result"></span></b>
						</div>
					</div>
					<!--<div class="col-sm-3 pr-1 pl-1">
						<div class="styled-select-small">
							<div class="position-absolute"><i class="fa fa-user"></i></div>
							<select class="form-control" name="noof_vehicle" placeholder="No of Vehicle">
								<option value="">-Select-</option>
								<option value="1" <?php if($_REQUEST['noof_vehicle']==1) echo 'selected="selected"';?>>1</option>
								<option value="2" <?php if($_REQUEST['noof_vehicle']==2) echo 'selected="selected"';?>>2</option>
								<option value="3" <?php if($_REQUEST['noof_vehicle']==3) echo 'selected="selected"';?>>3</option>
								<option value="4" <?php if($_REQUEST['noof_vehicle']==4) echo 'selected="selected"';?>>4</option>
								<option value="5" <?php if($_REQUEST['noof_vehicle']==5) echo 'selected="selected"';?>>5</option>
								<option value="6" <?php if($_REQUEST['noof_vehicle']==6) echo 'selected="selected"';?>>6</option>
								<option value="7" <?php if($_REQUEST['noof_vehicle']==7) echo 'selected="selected"';?>>7</option>
								<option value="8" <?php if($_REQUEST['noof_vehicle']==8) echo 'selected="selected"';?>>8</option>
								<option value="9" <?php if($_REQUEST['noof_vehicle']==9) echo 'selected="selected"';?>>9</option>
							</select>
						</div>
					</div>-->
					<div class="col-sm-3 pr-1 pl-1">
						<button type="submit" name="search" id="find_tour" class="btn btn-primary btn-search search-transfer  btn-block"> <i class="fa fa-search"></i> Find Tour</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<div class="row bg-grey">
	<div class="container">
		<div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-list">
			<div class="cbp-vm-options">
				<a href="#" class="cbp-vm-icon cbp-vm-grid" data-view="cbp-vm-view-grid">Grid View</a>
				<a href="#" class="cbp-vm-icon cbp-vm-list cbp-vm-selected" data-view="cbp-vm-view-list">List View</a>
			</div>
			
			<div class="row">
				<div class="col-sm-3">
					<div class="filter">
						<h5 class="headings">No Of Tours:<?php echo $numrow;?></h5>
						<p>Tour Name</p>
						<p>
							<div class="search-icon">
								<input type="search" class="form-control" name="tourSearch" id="tourSearch">
							</div>
							
						</p>
						
						
						<div>
						</div>
					</div>
				</div>
				<div class="col-sm-9">
					<ul id="result1">
						<?php
						if(!empty($tourlist)){
							$p=1;
						foreach($tourlist as $val){

						?>
						<li>
							<a class="cbp-vm-image" href="#">
								<img class="img-fluid" src="<?php echo base_url(); ?>uploads/tourname/<?php echo $val['thumbnail']; ?>"/>
							</a>
							<div class="cbp-vm-details">
								<h5 class="project-name text-uppercase m-0 pt-3"><?php echo $val['tour_name'];?></h5>
								<p class="location1 m-0">Tour Code:-<?php echo $val['tour_code'];?></p>
								<p class="location1 m-0">Tour Duration:-<?php echo $val['duration'];?></p>
								<p class="location1 m-0">
									Description:-<?php
									
									$string = strip_tags($val['description']);
									if (strlen($string) > 150) {
									
									$stringCut = substr($string, 0, 150);
									$endPoint = strrpos($stringCut, ' ');
									$string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
									$string .= '... <a href="#" data-toggle="modal" data-target="#exampleModal'.$val['id'].'">Read More</a>';
									}
									echo $string;
									
								?></p>
							</div>
							<!-- Modal -->
							<div class="modal fade" id="exampleModal<?=$val['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel"><?php echo $val['tour_name'];?></h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<?php echo $val['description'];?>
										</div>
										
									</div>
								</div>
							</div>

							<div class="call-back">
								<!--<div id="a1<?php echo $val['id']; ?>" class="d-none popover">
									<div class="popover-body">
										<table class="table table-sm small">
											<tr>
												<td>USD</td>
												<td>THB</td>
												<td>AUD</td>
												<td>CNY</td>
											</tr>
											<?php
												$roe=getAllRoe();
											?>
											<tr>
												<td>  <?php echo ceil(2*$roe['usd']); ?></td>
												<td>  <?php echo ceil(3*$roe['THB']); ?></td>
												<td>  <?php echo ceil(3*$roe['AUD']); ?></td>
												<td>  <?php echo ceil(4*$roe['CNY']); ?></td>
												<td>  <?php  //echo ceil(($fetrp[0]+$row1['markup'])*$roe['cny']); ?></td>
											</tr>
										</table>
									</div>
								</div>-->
								<h3 class="price1"> MYR <?php echo $val['pax1'].'/Per Pax'; ?>
								</h3>
								<?php
								$is_logged_in=getfrontCurUserID();
								if(isset($_POST['search']) and !empty($is_logged_in))
								{
				
									?>
								<a class="cbp-vm-icon cbp-vm-add btn btn-outline-danger btn-sm book_tour_search" href="javascript:void(0);" id="add_tour-<?=$val['id'];?>" ref="<?=$val['id'];?>" tname="<?php echo $val['tour_name'];?>" tprice="<?php echo $val['pax1'];?>">Book Now</a>
								<?php 
								}
								elseif(isset($_POST['search']) and empty($is_logged_in)) 
								{
										?>
										<a class="cbp-vm-icon cbp-vm-add btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#login" href="javascript:void(0);">Book Now</a>
										<?php
								} 
								elseif(!empty($is_logged_in))
								{
								?>
							    <a class="cbp-vm-icon cbp-vm-add btn btn-outline-danger btn-sm book_tour" href="javascript:void(0);" id="add_tour-<?=$val['id'];?>" ref="<?=$val['id'];?>" tname="<?php echo $val['tour_name'];?>" tprice="<?php echo $val['pax1'];?>">Book Now</a>
								<?php 
								}
								else
								{	
								?>
										<a class="cbp-vm-icon cbp-vm-add btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#login" href="javascript:void(0);">Book Now</a>
										<?php
								}
								?>
							</div>


							<div class="description-section">
								<div class="collapse" data-target="t1<?php echo $val['id']; ?>">
									<?php
									if(!empty($val['description'])){
											echo $val['description'];
									}else{
										echo '<label class="text-danger">No Description Found</label>';
									}?>
								</div>
                                <?php 
                                /*if(isset($_POST['search']))
                                {
                                	?>
								<div class="col-sm-12">
								<table class="table-sm table mb-2 small">
                          <tbody><tr>
                            <th>Noof Pax</th>
                            <th>Pickup Point</th>                           
                            <th>Service Date</th>      
                            <th>Price</th>
                            <th></th>
                          </tr>
                          
                          
                          
                          <tr>
                            <td><input type="text" name="no_pax" id="no_pax" 
							value="<?php 
							$n_px=explode(",",$_REQUEST['noof_pax']);
							//echo $n_px[0];
							echo $n_px[1];
							
							
							?>"></td>

                            <td><input type="text" name="pp" id="pp" 
							value="<?php 
							$h_id=$_REQUEST['pickup_point'];
							$hotelName=getHotel($h_id);
							echo $hotelName;
							
							?>"></td>
                            
                            <td class="form-inline"><input type="text" name="service_date" id="service_date" value="<?=$_REQUEST['from'];?>"></td>
                            
                            
                            <input type="hidden" name="mid" id="mid" value="">
                            
                            <td><strong class="text-info">
                              <span style="pull-left">
							  <?php 
							  
							   $Rate=getRate($val['id'],$n_px[0]);
							  echo "MYR ".$Rate;
							  ?></span>
                              
                              
                              </strong>
                              <input type="hidden" name="price" id="price-<?=$val['id'];?>" value="<?=$Rate;?>">
                            </td>
                            
                            <td>
                            <!--<a class="btn btn-primary btn-sm" href="<?php  echo base_url() ."tours/booktour/".$val['id']; ?>">Book</a>-->
                            <a href="javascript:void(0);" id="addbtn-<?=$val['id'];?>" class="add_c btn btn-primary btn-sm" row_id="<?=$val['id'];?>">Add</a>
					  <a href="javascript:void(0);" id="rvbtn-<?=$val['id'];?>" style="display:none;" class="remove_c btn btn-primary btn-sm" row_id="<?=$val['id'];?>">Remove</a>
                            </td>
                            
                          
                            
                            
                          </tr>

                        </tbody>
                    </table>
                    </div>
					<?php } */?>			
							</div>
						</li>
						<?php 
						$p++;
					} 
					
				}
				?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
$this->load->view('home/footer');
?>
<?php 
					 if(isset($_POST['search'])) 
                     {
						?>
<div class="modal fade" id="modaladdtour" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" style="height:200px;" role="document">
		 <div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="pp_tname"><?php echo $val['tour_name'];?></h5>
				<button type="button" id="pp_close_search" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
				<div class="modal-body">
				  
						  <table class="table-sm table mb-2 small">
                          <tbody>
                          	<tr>
                            <th>Pickup Point</th>                           
                            <th>Service Date</th> 
                            <th>Noof Pax</th>							
                            <th>Price</th>
                            <th></th>
                          </tr>
                          <tr>
                            <td><select class="form-control" name="pp_modal" id="pp_modal" placeholder="Pick-up Point">
								<option value="">-Select-</option>
								<?php
								$HtlList = getHotelList();
								foreach($HtlList as $htl_list)
								{
								?>
								<option  value="<?=$htl_list['id']?>" <?php if($htl_list['id']==$_REQUEST['pickup_point']) echo 'selected="selected"';?>><?=$htl_list['hotelname']?></option>
								<?php
								}
								?>
							</select>
							</td>
                            <td class="form-inline"><input type="text" name="pp_modalsdate" value="<?php echo $_REQUEST['from'];?>"></td>
                            <td>
							<select class="form-control" name="noof_pax" id="pp_noof_pax" placeholder="No of Pax">
								
								<option value="pax1,1" <?php if($_REQUEST['noof_pax']=='pax1,1') echo 'selected="selected"';?>>01 Pax</option>
								<option value="pax4,2" <?php if($_REQUEST['noof_pax']=='pax4,2') echo 'selected="selected"';?>>02 Pax</option>
								<option value="pax4,3" <?php if($_REQUEST['noof_pax']=='pax4,3') echo 'selected="selected"';?>>03 Pax</option>
								<option value="pax4,4" <?php if($_REQUEST['noof_pax']=='pax4,4') echo 'selected="selected"';?>>04 Pax</option>
								<option value="pax9,5" <?php if($_REQUEST['noof_pax']=='pax9,5') echo 'selected="selected"';?>>05 Pax</option>
								<option value="pax9,6" <?php if($_REQUEST['noof_pax']=='pax9,6') echo 'selected="selected"';?>>06 Pax</option>
								<option value="pax9,7" <?php if($_REQUEST['noof_pax']=='pax9,7') echo 'selected="selected"';?>>07 Pax</option>
								<option value="pax9,8" <?php if($_REQUEST['noof_pax']=='pax9,8') echo 'selected="selected"';?>>08 Pax</option>
								<option value="pax9,9" <?php if($_REQUEST['noof_pax']=='pax9,9') echo 'selected="selected"';?>>09 Pax</option>
								<option value="pax16,10" <?php if($_REQUEST['noof_pax']=='pax16,10') echo 'selected="selected"';?>>10 Pax</option>
								<option value="pax16,11" <?php if($_REQUEST['noof_pax']=='pax16,11') echo 'selected="selected"';?>>11 Pax</option>
								<option value="pax16,12" <?php if($_REQUEST['noof_pax']=='pax16,12') echo 'selected="selected"';?>>12 Pax</option>
								<option value="pax16,13" <?php if($_REQUEST['noof_pax']=='pax16,13') echo 'selected="selected"';?>>13 Pax</option>
								<option value="pax16,14" <?php if($_REQUEST['noof_pax']=='pax16,14') echo 'selected="selected"';?>>14 Pax</option>
								<option value="pax16,15" <?php if($_REQUEST['noof_pax']=='pax16,15') echo 'selected="selected"';?>>15 Pax</option>
								<option value="pax16,16" <?php if($_REQUEST['noof_pax']=='pax16,16') echo 'selected="selected"';?>>16 Pax</option>
								<option value="pax25,17" <?php if($_REQUEST['noof_pax']=='pax25,17') echo 'selected="selected"';?>>17 Pax</option>
								<option value="pax25,18" <?php if($_REQUEST['noof_pax']=='pax25,18') echo 'selected="selected"';?>>18 Pax</option>
								<option value="pax25,19" <?php if($_REQUEST['noof_pax']=='pax25,19') echo 'selected="selected"';?>>19 Pax</option>
								<option value="pax25,20" <?php if($_REQUEST['noof_pax']=='pax25,20') echo 'selected="selected"';?>>20 Pax</option>
								<option value="pax25,21" <?php if($_REQUEST['noof_pax']=='pax25,21') echo 'selected="selected"';?>>21 Pax</option>
								<option value="pax25,22" <?php if($_REQUEST['noof_pax']=='pax25,22') echo 'selected="selected"';?>>22 Pax</option>
								<option value="pax25,23" <?php if($_REQUEST['noof_pax']=='pax25,23') echo 'selected="selected"';?>>23 Pax</option>
								<option value="pax25,24" <?php if($_REQUEST['noof_pax']=='pax25,24') echo 'selected="selected"';?>>24 Pax</option>
								<option value="pax25,25" <?php if($_REQUEST['noof_pax']=='pax25,25') echo 'selected="selected"';?>>25 Pax</option>
								<option value="pax31,26" <?php if($_REQUEST['noof_pax']=='pax31,26') echo 'selected="selected"';?>>26 Pax</option>
								<option value="pax31,27" <?php if($_REQUEST['noof_pax']=='pax31,27') echo 'selected="selected"';?>>27 Pax</option>
								<option value="pax31,28" <?php if($_REQUEST['noof_pax']=='pax31,28') echo 'selected="selected"';?>>28 Pax</option>
								<option value="pax31,29" <?php if($_REQUEST['noof_pax']=='pax31,29') echo 'selected="selected"';?>>29 Pax</option>
								<option value="pax31,30" <?php if($_REQUEST['noof_pax']=='pax31,30') echo 'selected="selected"';?>>30 Pax</option>
								<option value="pax31,31" <?php if($_REQUEST['noof_pax']=='pax31,31') echo 'selected="selected"';?>>31 Pax</option>
								<option value="pax40,32" <?php if($_REQUEST['noof_pax']=='pax40,32') echo 'selected="selected"';?>>32 Pax</option>
								<option value="pax40,33" <?php if($_REQUEST['noof_pax']=='pax40,33') echo 'selected="selected"';?>>33 Pax</option>
								<option value="pax40,34" <?php if($_REQUEST['noof_pax']=='pax40,34') echo 'selected="selected"';?>>34 Pax</option>
								<option value="pax40,35" <?php if($_REQUEST['noof_pax']=='pax40,35') echo 'selected="selected"';?>>35 Pax</option>
								<option value="pax40,36" <?php if($_REQUEST['noof_pax']=='pax40,36') echo 'selected="selected"';?>>36 Pax</option>
								<option value="pax40,37" <?php if($_REQUEST['noof_pax']=='pax40,37') echo 'selected="selected"';?>>37 Pax</option>
								<option value="pax40,38" <?php if($_REQUEST['noof_pax']=='pax40,38') echo 'selected="selected"';?>>38 Pax</option>
								<option value="pax40,39" <?php if($_REQUEST['noof_pax']=='pax40,39') echo 'selected="selected"';?>>39 Pax</option>
								<option value="pax40,40" <?php if($_REQUEST['noof_pax']=='pax40,40') echo 'selected="selected"';?>>40 Pax</option>
							</select>
							</td>
                            <td id="ad_ch1">
							<strong class="text-info">
                              <span style="pull-left" id="pp_rate">
							  <?php 
							  $n_px=explode(",",$_REQUEST['noof_pax']);
							//echo $n_px[0];
							echo $n_px[1];
							   //ech/o $n_px[0];
							  //$Rate=getRate($val['id'],$n_px[0]);
							  //echo "MYR ".$Rate; 
							  ?></span>
                              
                              
                              </strong>
                              
                            </td>
                            <input type="hidden" name="price" id="price-<?=$val['id'];?>" value="<?=$Rate;?>">
							<input type="hidden" id="pp_tid">
                            <td>
                            <!--<a class="btn btn-primary btn-sm" href="<?php  echo base_url() ."tours/booktour/".$val['id']; ?>">Book</a>-->
                            <a href="javascript:void(0);" id="addbtn-<?=$val['id'];?>" class="add_c btn btn-primary btn-sm" row_id="<?=$val['id'];?>">Add</a>
					  <a href="javascript:void(0);" id="rvbtn-<?=$val['id'];?>" style="display:none;" class="remove_c btn btn-primary btn-sm" row_id="<?=$val['id'];?>">Remove</a>
                            </td>
                            
                          
                            
                            
                          </tr>
                    </table>  
					
										</div>

										
									</div>
								</div>
</div>
					
						<?php
						 
					 }	
                      else
					  {						  
				  ?>
				  <div class="modal fade" id="modaladdtour" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" style="height:200px;" role="document">
		 <div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="pp_tname"><?php echo $val['tour_name'].$val['id'];?></h5>
				<button type="button" id="pp_close" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
				<div class="modal-body">
				  
					
					 <table class="table-sm table mb-2 small">
                          <tbody><tr>
                            <th>Pickup Point</th>                           
                            <th>Service Date</th> 
                            <th>Noof Pax</th>							
                            <th>Price</th>
                            <th></th>
                          </tr>
                          <tr>
                            <td><select class="form-control" name="pp_modal" id="pp_modal" placeholder="Pick-up Point">
								<option value="">-Select-</option>
								<?php
								$HtlList = getHotelList();
								foreach($HtlList as $htl_list)
								{
								?>
								<option  value="<?=$htl_list['id']?>"><?=$htl_list['hotelname']?></option>
								<?php
								}
								?>
							</select>
							</td><b><span class="text-warning" id="pp_result"></span></b>
                            <td class="form-inline"><input type="text" name="pp_modalsdate" id="pp_modalsdate"></td>
                            <td>
							<select class="form-control" name="noof_pax" id="pp_noof_pax" placeholder="No of Pax">
								
								<option value="pax1,1">01 Pax</option>
								<option value="pax4,2">02 Pax</option>
								<option value="pax4,3">03 Pax</option>
								<option value="pax4,4">04 Pax</option>
								<option value="pax9,5">05 Pax</option>
								<option value="pax9,6">06 Pax</option>
								<option value="pax9,7">07 Pax</option>
								<option value="pax9,8">08 Pax</option>
								<option value="pax9,9">09 Pax</option>
								<option value="pax16,10">10 Pax</option>
								<option value="pax16,11">11 Pax</option>
								<option value="pax16,12">12 Pax</option>
								<option value="pax16,13">13 Pax</option>
								<option value="pax16,14">14 Pax</option>
								<option value="pax16,15">15 Pax</option>
								<option value="pax16,16">16 Pax</option>
								<option value="pax25,17">17 Pax</option>
								<option value="pax25,18">18 Pax</option>
								<option value="pax25,19">19 Pax</option>
								<option value="pax25,20">20 Pax</option>
								<option value="pax25,21">21 Pax</option>
								<option value="pax25,22">22 Pax</option>
								<option value="pax25,23">23 Pax</option>
								<option value="pax25,24">24 Pax</option>
								<option value="pax25,25">25 Pax</option>
								<option value="pax31,26">26 Pax</option>
								<option value="pax31,27">27 Pax</option>
								<option value="pax31,28">28 Pax</option>
								<option value="pax31,29">29 Pax</option>
								<option value="pax31,30">30 Pax</option>
								<option value="pax31,31">31 Pax</option>
								<option value="pax40,32">32 Pax</option>
								<option value="pax40,33">33 Pax</option>
								<option value="pax40,34">34 Pax</option>
								<option value="pax40,35">35 Pax</option>
								<option value="pax40,36">36 Pax</option>
								<option value="pax40,37">37 Pax</option>
								<option value="pax40,38">38 Pax</option>
								<option value="pax40,39">39 Pax</option>
								<option value="pax40,40">40 Pax</option>
							</select>
							</td>
                            <td id="ad_ch1">
							<strong class="text-info">
                              <span style="pull-left" id="pp_rate">
							  <?php 
							   //echo $n_px[0];
							   
							  ?></span>
                              
                              
                              </strong>
                              
                            </td>
                            <input type="hidden" name="price" id="price-<?=$val['id'];?>" value="<?=$Rate;?>">
							<input type="hidden" id="pp_tid">
                            <td>
                            <!--<a class="btn btn-primary btn-sm" href="<?php  echo base_url() ."tours/booktour/".$val['id']; ?>">Book</a>-->
                            <a href="javascript:void(0);" id="addbtn-<?=$val['id'];?>" class="add_c btn btn-primary btn-sm" row_id="<?=$val['id'];?>">Add</a>
					  <a href="javascript:void(0);" id="rvbtn-<?=$val['id'];?>" style="display:none;" class="remove_c btn btn-primary btn-sm" row_id="<?=$val['id'];?>">Remove</a>
                            </td>
                            
                          
                            
                            
                          </tr>
                    </table>
					  <?php } ?>
										</div>

										
									</div>
								</div>
</div>


<script type="text/javascript" src="<?php echo base_url();?>assets/js/common/tours_function.js"></script>








