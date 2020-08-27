<?php
$this->load->view('home/header');
?>
<div class="row page-heads">
<div class="container">
<form name="input1" action="" class="searchs col-sm-10 offset-md-1" method="POST">
<div class="selection clearfix">
<?php   ?>
<div class="row">
<div class="col-sm-12">
<label class="radio-inline" id="seat5"><input type="radio" id="hide" checked="checked" value="true" name="rnd"/>One-way Only</label>
<!--<label class="radio-inline"><input type="radio" id="show" value="false" name="rnd"/>Round Trip</label>-->
</div>
</div>
<div class="row">
<div class="col-sm-3">
<!-- <div class="styled-select-small"> <label>Pattern:</label>
<select name="pattern" required="" class="form-control" >
<select name="pattern" id="state" style="width:110px;" onchange="getCurrencyCode('find_ccode4.php?q='+this.value,'vehicleid');"> -->
<!--   <option value="">Select Country</option>
<option value="">Transfer Pattern</option>     <option value="A">Arrival</option>      <option value="D">Departure</option>        <option value="I">Internal</option>
<option value="Malaysia">Malaysia</option>
</select>
</div>-->
<div class="styled-select-small"><label>Pickup From:</label>
<div class="selects">
<!--- DROPDOWN FOR PICKUP LOCATION ----->
<?php 
	$pick_trans = trasferlocation();
 ?>
<select name="pickup"   class="form-control"   onchange="getCurrencyCode('find_ccode4444.php?q='+this.value,'locationf');" >
<option value="">Please Select</option>
<?php foreach ($pick_trans as $key ) {
?>
<option value="<?php echo $key['search_transfer'];?>" <?php if($key['search_transfer']==$_POST['pickup']){echo 'selected';}?>><?=$key['search_transfer']?></option>
<?php

}  ?>

</select>
</div>
</div>
</div>
<!--<div class="col-sm-3">
<div class="styled-select-small"><label>Pickup Point:</label>
<div class="selects">
<select name="pp" id="locationf" class="form-control"  >
<option value="">Please Select</option>
</select>
</div>
</div>
</div> -->
<!-- <div class="col-sm-3">
<div class="styled-select-small"><label>Drop  To:</label>
<div class="selects">
<select name="dropto"   class="form-control"   onchange="getCurrencyCode('find_ccode4444.php?q='+this.value,'location');" >
<option value="">Please Select</option>
<option value="1">Airport</option>
<option value="2">Coach station</option>
<option value="3">Railway Station</option>
<option value="4">Hotel</option>
<option value="5">APMG Venues</option>
<option value="6">Cruise</option>
<option value="7">Ferry</option>
<option value="8">Kuala Lumpur</option>
<option value="9">IPOH</option>
</select>
</div>
</div>
</div> -->
<div class="col-sm-2">
<div class="styled-select-small">
<label>No of Pax</label>
<div class="selects">
<select name="noofpax" required="" class="form-control" id="location">
<?php for($i=1;$i<=10;$i++){?>
<option value="<?=$i?>"><?=$i?></option>
<?php }?>
</select>
</div>
</div>
</div>
<div class="col-sm-2" id="seat51">
<div class="styled-select-small">
<label>Pickup Date:</label>
<div class="dates">
<input type="text" id="datepicker4" class="form-control" value="<?php if(!empty($date)){ echo $date; }else{  } ?>" name="serviceDate" placeholder="Service Date">
</div>
</div>
</div>
<div class="col-sm-2">
<label>&nbsp;</label>
<button type="submit" name="submit" class="btn btn-primary btn-search  btn-block">Search Transfer</button>
</div>
</div>
</div>
</form>
</div>
<!-- <div class="tab-pane fade" id="B">
<form name="input" action="ticket-search.php" method="POST">
<div class="selection clearfix">
<div class="row">
<div class="col-sm-6">
<div class="styled-select-small"> <label>Country:</label>
<select name="country" required="" class="form-control" onchange="getCurrencyCode('find_ccode41.php?q='+this.value,'citytk');">
<option value="Singapore">Singapore</option>
<!--<option value="Malaysia">Malaysia</option>
</select>
</div>
</div>
<div class="col-sm-6">
<div class="styled-select-small">
<label>City</label>
<select name="city" required="" class="form-control" id="citytk">
<option value="1">Singapore</option>
</select>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-6">
<div class="styled-select-small"> <label>Adult:</label>
<select name="adult" required="" class="form-control">
<option value="0">1
</option>
<option value="1">2
</option>
<option value="2">3
</option>
</select>
</div>
</div>
<div class="col-sm-6">
<div class="styled-select-small"> <label>Child:</label>
<select name="child" required="" class="form-control">
<!--  <option value="">No of Pax</option>
<option value="0">1
</option>
<option value="1">2
</option>
<option value="2">3
</option>
</select>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-6">
<div class="styled-select-small"><label> Service Date:</label>
<input type="text" name="cd" autocomplete="off" required="" id="mydate1" value=" " readonly="" class="form-control hasDatepicker">
</div>
</div>
<div class="col-sm-6">
<div class="book-now offer styled-select-small">
<label>&nbsp;</label>
<button type="submit" name="submit" class="btn btn-primary btn-block btn-search">Search Tours</button>
</div>
</div>
</div>
</div>
</div>
</div>-->
</div>
<div class="bg-grey" id="content">
<div class="container" >
<div class="col-sm-10 offset-sm-1">
<div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-list">
<div class="cbp-vm-options">
<a href="#" class="cbp-vm-icon cbp-vm-grid" data-view="cbp-vm-view-grid">Grid View</a>
<a href="#" class="cbp-vm-icon cbp-vm-list cbp-vm-selected" data-view="cbp-vm-view-list">List View</a>
</div>
<ul>
<?php
foreach($transfers as $value){
?>
<form name="form2" action="enquiry.php" method="POST">
<input type="hidden" name="pf" value="1-PA">
<input type="hidden" name="pp" value="PA">
<input type="hidden" name="dt" value="1-PA">
<input type="hidden" name="dp" value="PA">
<input type="hidden" name="ch" value="">
<input type="hidden" name="ad" value="1">
<input type="hidden" name="cd1" value="2019/02/22">
<input type="hidden" name="hn_pf" value="">
<input type="hidden" name="hn_dt" value="">
<li class="main-div">
<a class="cbp-vm-image" href="details.html"><img src="https://apmg.apolloasiab2b.com/images/bus.jpg"></a>
<div class="cbp-vm-details">
<!--<h5 class="project-name text-uppercase">PRIVATE <small>STANDARD <span class="text-muted">CAR</span></small></h5> data-target="#pricemodal"-->
<h5 class="mb-0 mt-3 project-name">
<?php echo $value['transfer_name']; ?></h5>
<p class=" text-uppercase mt-0 mb-0">PRIVATE <small>Coach <span class="text-muted">(40 Seater)</span></small></p>
 <ul class="list-inline mb-1">
    <li class="list-inline-item">
 <i class="fa fa-flag-o"></i> Door to door service </li>
<li class="list-inline-item"><i class="fa fa-clock-o"></i> Available 24/7 </li>
<li class="list-inline-item">Service Date: 22 Feb 2019</li>
</ul> 
<ul class="list-unstyled facilities small">
<li><i class="fa fa-circle"></i> Exclusive ride for you </li>
<li><i class="fa fa-circle"></i>1 item of hand baggage allowed per person </li>
<li> <i class="fa fa-circle"></i>1 piece of baggage allowed per person ( max.dimensions 158cm) length + width + height = 158cm </li>
<li><i class="fa fa-circle"></i>transfer from 11:00 pm to 6:00 am will attract 50 % night surcharge on the above rate</li>
</ul>

</div>
<div class="call-back">
<h3 class="price1"> </h3>


<!--<input type="hidden" name="emp" value="" id="code1"/>-->
<div class="col-sm-2 text-center"><br><br>
<button type="button" name="submit_f1" class="cbp-vm-icon cbp-vm-add btn btn-outline-primary" data-toggle="modal" data-target="#mymodal"> Book </button>
<!--<a class="cbp-vm-icon cbp-vm-add " onclick="document.getElementById('code1').value = makeid()"href="#" data-toggle="modal"> Add</a>-->

<br>
</div>
</div>
<div class="description-section">
    <div class="col-sm-12">
<h4 class="price1">Arrival Transfer </h4>
<div class="row">
<div class="col-sm-3">
<label>Arrival Flight code:</label>

<input class="form-control" type="text" placeholder="FY0512E" name="arrival_name" required="required">
</div>
<div class="col-sm-3">
<label>Flight arrival time (HR):</label>

<span class="selects">
<select name="fat" required="" class="form-control">
<option value="">-hh-</option>
<option value="00">00</option>   
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option> 
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>                                                          <option value="08">08</option>                                                      <option value="09">09</option>                                                          <option value="10">10</option>                                                          <option value="11">11</option>                                                          <option value="12">12</option>                                                          <option value="13">13</option>                                                          <option value="14">14</option>                                                          <option value="15">15</option>                                                          <option value="16">16</option>                                                          <option value="17">17</option>                                                          <option value="18">18</option>                                                          <option value="19">19</option>                                                          <option value="20">20</option>                                                      <option value="21">21</option>                                                          <option value="22">22</option>                                                          <option value="23">23</option>                                                          </select>
</span>
</div>
<div class="col-sm-3">
<label>Flight arrival time (Min):</label>
<span class="selects">
<select type="search" name="fam" required="" class="form-control">
<option value="">-mm-</option>
<option value="00">00</option> 
<option value="05">05</option> 
<option value="10">10</option> 
<option value="15">15</option>
<option value="20">20</option>
 <option value="25">25</option> 
 <option value="30">30</option>
 <option value="35">35</option> 
 <option value="40">40</option>                                                          
                                                       <option value="45">45</option>                                                          
                                                       <option value="50">50</option>                                                          
                                                       <option value="55">55</option>                                                     
                                                        </select>
</span>
</div>
<div class="col-sm-3">
    <label>&nbsp;</label>
    <button type="submit" class="btn btn-block btn-outline-primary">Book Now</button>
    </div>

</div>
</div>
</li>
</form>
<?php } ?>
</ul>
</div>
</div>
</div>

<tfoot>
<tr>
<td colspan="15">
<div class="pagination custom_pagination">
<?php echo $links; ?>
</div>
</td>
</tr>
</tfoot>												





</div>
<?php
$this->load->view('home/footer');
?>
<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" style="height:200px;" role="document">
		 <div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="pp_tname"><?php //echo $val['tour_name'];?></h5>
				<button type="button" id="pp_close_search" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
				<div class="modal-body">
				  
						  <table class="table-sm table mb-2 small">
                          <tbody>
                          	<tr>
                            <th>Pickup location</th>    
                            <th>Pickup Point</th>                       
                            <th>Service Date</th> 
                            <th>Noof Pax</th>							
                            <th>Price</th>
                            <th></th>
                          </tr>
                          <tr>
                          	<td>

				<!--- DROPDOWN FOR PICKUP LOCATION ----->

						<?php 
							$pick_trans = trasferlocation();
 						?>
								<select name="pickup" class="form-control">
									<option value="">Please Select</option>
									<?php foreach ($pick_trans as $key ) {
									?>
									<option value="<?php echo $key['search_transfer'];?>" <?php if($key['search_transfer']==$_POST['pickup']){echo 'selected';}?>><?=$key['search_transfer']?></option>
									<?php

										}  
									?>

							</select>
							</td>
                            <td class="form-inline"><input type="text" name="pp_modalsdate" value="<?php echo $_REQUEST['from'];?>"></td>
                            <td>
							<select class="form-control" name="noof_pax" id="pp_noof_pax" placeholder="No of Pax">
								
<?php for($i=1;$i<=10;$i++){?>
<option value="<?=$i?>"><?=$i?></option>
<?php }?>							</select>
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
<script type="text/javascript" src="<?php echo base_url();?>assets/js/common/transfer_function.js"></script>