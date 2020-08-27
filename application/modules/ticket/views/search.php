<?php  
$this->load->view('home/header');
 ?>
 <div class="row page-heads" id="contents">
 
<div class="container">
<form type="search" method="POST" action="" id="hotel_form" class="searchs col-sm-10 offset-md-1">
<input name="by" type="hidden" value="1"/>
<div class="selection clearfix">
<div class="row">
<div class="col-sm-3 pr-1 pl-1">
<div class="styled-select-small">
<div class="position-absolute"><i class="fa fa-search"></i></div>
<input type="text" placeholder="" class="form-control" name="">
 
</div>
</div>

<div class="col-sm-3 pr-1 pl-1">
<div class="styled-select-small">
<div class="position-absolute"><i class="fa fa-user"></i></div>
<select class="form-control" name="country" id="country">
<option value="">Select Country</option>
<?php foreach($country as $key=>$value){ ?>
<option value="<?php echo $key ;?>" <?php if($countryId==$key){echo 'selected="selected"';} ?>><?php echo $value;?></option>
<?php }?>
</select>
<b><span class="text-warning" id="room_result"></span></b>
</div>
</div>
<div class="col-sm-3 pr-1 pl-1">
<div class="styled-select-small">
<div class="position-absolute"><i class="fa fa-user"></i></div>
<select class="form-control" name="city" id="city">
<option value="">Select City</option>
<?php foreach($city as $key=>$value){ ?>
<option value="<?php echo $key ;?>" <?php if($cityId==$key){echo 'selected="selected"';} ?>><?php echo $value ;?></option>
<?php }?>
</select>
<b><span class="text-warning" id="room_result"></span></b>
</div>
</div>

<div class="col-sm-3 pr-1 pl-1">
<button type="submit"  name="search" class="btn btn-primary btn-search search-transfer  btn-block" id="findhotel"> <i class="fa fa-search"></i> Find Tickets</button>
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
						<h5 class="headings">No Of Tickets:<?php echo count($attractions); ?></h5>
						<p></p>
						<p>
							</p><!--<div class="search-icon">
								<input type="text" class="form-control" name="tourSearch" id="tourSearch">
							</div> -->
							
						<p></p>
						
						
						<div>
						</div>
					</div>
				</div>
				<div class="col-sm-9">
					<ul id="result1">
					<?php

if(!empty($attractions)){
$num=1;
foreach($attractions as $value)
{
?>
												<li class="main-div">
							<a class="cbp-vm-image" href="#">
								<img class="img-fluid" src="https://uat-api.globaltix.com/api/image?name=<?php echo $value['imagePath']; ?>_thumb">
							</a>
							<div class="cbp-vm-details">
								<h5 class="project-name text-uppercase m-0 pt-3"><?php echo $value['title']; ?></h5>
								<p class="location1 m-0"></p>
								<p class="location1 m-0">Tour Duration:<?php echo $value['hoursOfOperation']; ?></p>
								<p class="location1 m-0">
									Description:-<?php echo substr($value['description'],0,10); ?> <a href="#" data-toggle="modal" data-target="#exampleModal<?php echo $num; ?>">Read More</a></p>
							</div>
							<!-- Modal -->
							<div class="modal fade" id="exampleModal<?php echo $num; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel"><?php echo $value['title']; ?></h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">×</span>
											</button>
										</div>
										<div class="modal-body">
											<p style="margin-left:5.0pt"><?php echo $value['description']; ?></p>


										</div>
										
									</div>
								</div>
							</div>

							<div class="call-back">
								<div id="a15" class="d-none popover">
									<div class="popover-body">
										<table class="table table-sm small">
											<tbody><tr>
												<td>USD</td>
												<td>THB</td>
												<td>AUD</td>
												<td>CNY</td>
											</tr>
																						<tr>
												<td>  42</td>
												<td>  63</td>
												<td>  63</td>
												<td>  48</td>
												<td>  </td>
											</tr>
										</tbody></table>
									</div>
								</div>
								<?php 
					       $response=getAttrraction($value['id']);
					  
					   foreach(json_decode($response,true)['data'] as $p)
					   {
					?>
								<h3 class="price1" data-toggle="popover" data-trigger="hover" data-popover-content="#a15" data-placement="top" data-original-title="" title=""> MYR <?php
								
								
									
								$adata=google_money_convert($p['currency'],'MYR',$p['price']); 
								
								?> <?php  echo round($adata,2); ?>/<br><small><?php echo $p[name]; ?>Per Pax	</small>							</h3>
					   <?php } ?>
								<a class="cbp-vm-icon cbp-vm-add btn btn-outline-danger btn-sm tickt_cl" href="javascript:void(0);" refname="<?php echo $value['title']; ?>" refid="<?php echo $value['id']; ?>">Book Now</a>
								
							</div>


							<div class="description-section">
								<div class="collapse" data-target="t15">
								
								</div>
                                			
							</div>
						</li>
											
<?php $num++;}}else{ ?>	
<p class="text-center">No Result Found</p>
<?php } ?>							
						
					</ul>
					
				</div>
			</div>
		</div>
	</div>
</div>

<?php  $this->load->view('home/footer'); ?>
<div class="modal fade" id="modaladdticket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" style="height:200px;" role="document">
		 <div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="pp_tickname"><?php echo $value['title'];?></h5>
				<button type="button" id="pp_close_search" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
				<div class="modal-body">
				  
						  <table class="table-sm table mb-2 small">
                          <tbody>
						 
                          	<tr>
                            <th>Adult</th>                           
                            <th>Child</th> 
                            <th>Noof Pax</th>							
                            <th>Price</th>
                            <th></th>
                          </tr>
						  <?php $res=getAttrraction($value['id']); foreach(json_decode($res,true)['data'] as $re){ ?>
						   <?php $pdata=google_money_convert($re['currency'],'MYR',$re['price']); ?>
						    <input type="checkbox" name="prod" id="prod_<?php echo $re['id']; ?>" value="<?php echo round($pdata,2); ?>" ><?php echo $re['name']; echo round($pdata,2);?>
						   <?php }?>
                          <tr>
						   
                            <td><select class="form-control" name="pp_modal" id="pp_modal" placeholder="Pick-up Point">
								<?php for($i=1;$i<=10;$i++) {?>
							<option value="<?php echo $i ;?>"><?php echo $i ;?></option>
							<?php }?>
							
							</select>
							</td>
                            <td class="form-inline"><select class="form-control" name="noof_pax" id="pp_noof_pax" placeholder="No of Pax">
							<?php for($i=1;$i<=10;$i++) {?>
							<option value="<?php echo $i ;?>"><?php echo $i ;?></option>
							<?php }?>
								
							</select></td>
                            <td>
							<select class="form-control" name="noof_pax" id="pp_noof_pax1" placeholder="No of Pax">
							<?php for($i=1;$i<=10;$i++) {?>
							<option value="<?php echo $i ;?>"><?php echo $i ;?></option>
							<?php }?>
								
							</select>
							</td>
                            <td id="ad_ch1">
							<strong class="text-info">
                              <span style="pull-left" id="pp_rate<?=$value['id'];?>">
							  
                              </span>
                              
                              </strong>
                              
                            </td>
                            <input type="hidden" name="price" id="price-<?=$value['id'];?>" value="<?=$Rate;?>">
							<input type="hidden" id="pp_tid" value="<?=$value['id'];?>">
                            <td>
                            <!--<a class="btn btn-primary btn-sm" href="<?php  echo base_url() ."tours/booktour/".$val['id']; ?>">Book</a>-->
                            <a href="javascript:void(0);" id="addbtn-<?=$value['id'];?>" class="add_c btn btn-primary btn-sm" row_id="<?=$value['id'];?>">Add</a>
					  <a href="javascript:void(0);" id="rvbtn-<?=$value['id'];?>" style="display:none;" class="remove_c btn btn-primary btn-sm" row_id="<?=$value['id'];?>">Remove</a>
                            </td>
                            
                          
						  
                            
                          </tr>
						   
                    </table>  
					
										</div>

										
									</div>
								</div>
</div>
<script type="text/javascript">
$("#country").on('change',function(){
	
	 $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>ticket/allCitylist",
                data: {countryid:$('#country').val()},
                success :function(data){
					$("#city").empty();
                    var city=JSON.parse(data);
					$.each(city,function(key,value){
						
						var option= $('<option value='+key+'>'+value+'</option>');
						//option.appendTo($("#city"));
						$("#city").append(option);
					});
					
                }
            });
});
$(document).on('click','.tickt_cl',function(){
	$("#pp_tickname").html($(this).attr('refname'));
	  $('#modaladdticket').modal('show');
});
$(document).on('change','#pp_noof_pax1',function(e){
	var price=[];
   $('input[name="prod"]:checked').each(function() {
	price.push(this.value);
   });
   var sum=0;
	for (var i = 0; i < price.length; i++) {
	sum += price[i] << 0;
	}
	  
  
   
   
	pax=this.options[e.target.selectedIndex].value;
	//alert(pax);
	total=(parseFloat(sum)*parseInt(pax)).toFixed(2);
	alert($("#pp_tid").val());
	//$("#pp_rate").empty();
	$("#pp_rate1").text(total);
});



</script>