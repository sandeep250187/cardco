  <?php include "include/data-p.php";
 
 $select_markup=mysql_query("select landmark_markup from manage_markup_vcon where id='1'");
 $fetch_markup=mysql_fetch_array($select_markup);
 $markup=$fetch_markup['landmark_markup'];

											function clockalize($in){

    $h = intval($in);
    $m = round((((($in - $h) / 100.0)  *60.0) * 100), 0);
    if ($m == 60)
    {
        $h++;
        $m = 0;
    }
    $retval = sprintf("%02d", $h, $m);
    return $retval;
}



											
if($_REQUEST['action']=='add')
{
	
	
	//isset($_POST['btn1']) &&$_GET['sub']) or 
}
if(isset($_REQUEST['empty']))
{
unset($_SESSION['cart-hotel']); 
unset($_SESSION['my_cart']); 
unset($_SESSION['cart-item']); 
 
}
if(isset($_REQUEST['btn1']))
{
	

	//echo "SUB";
	$pf=$_REQUEST['pf']; 	$tt=$_REQUEST['ttype'];
	$pp=$_REQUEST['pp'];	$seat=$_REQUEST['seat']; 
	$dt=$_REQUEST['dt'];	$tdate=$_REQUEST['cd'];		
	$dp=$_REQUEST['dp'];	$cd=date("Y/m/d",strtotime($tdate));
	$nofvehicle=$_REQUEST['vno']; 	$id=$_REQUEST['id'];
	
	/*$sql1=mysql_query("select * from transfer_tariff_master where id='$id'");
			$fetch=mysql_fetch_array($sql1);
			if($fetch['pickup_from']==1){	$peneng_pf='Airport';	}
			if($fetch['pickup_from']==2){	$peneng_pf='Coach Station';	}
			if($fetch['pickup_from']==3){	$peneng_pf='Railway Station';}	
			if($fetch['pickup_from']==4){	$peneng_pf='Hotel'; }	
			if($fetch['pickup_from']==5){	$peneng_pf='Venue';}
			if($fetch['pickup_from']==6){	$peneng_pf='Cruise'; }	
			if($fetch['pickup_from']==7){	$peneng_pf='Ferry';}
			if($fetch['pickup_point']=='PA'){	$peneng_pp='Penang Airport';}
			if($fetch['pickup_point']=='PC'){	$peneng_pp='Penang Coach Station';}				
			if($fetch['pickup_point']=='PR'){	$peneng_pp='Penang Railway Station';}
			if($fetch['pickup_point']=='CT'){	$peneng_pp='Cruse Terminal';}				
			if($fetch['pickup_point']=='FT'){	$peneng_pp='Ferry Terminal';}
			if($fetch['pickup_point']==4){		//$peneng_pp='Hotel';				
				$sql11=mysql_query("SELECT  * FROM apmg_location where id='$fetch[drop_point]'");                         
				$name1 = mysql_fetch_array($sql11);                                                          
				$peneng_pp=$name1['location_name'];}
			if($fetch['pickup_point']==5){ 	//$peneng_pp='Venue';			
				$sql11=mysql_query("SELECT  id,vname FROM venue_master where id='$fetch[drop_point]'");                                   
				$name1 = mysql_fetch_array($sql11);                                   
				$peneng_pp=$name1['hotelname'];}					
				//$peneng_pf.'('.$peneng_pp.')';
			if($fetch['drop_to']==1){	$peneng_pfd='Airport';	$peneng_ppd='Penang Airport';	}												
			if($fetch['drop_to']==2){	$peneng_pfd='Coach Station';	$peneng_ppd='Penang Coach Station';}										
			if($fetch['drop_to']==3){	$peneng_pfd='Railway Station';$peneng_ppd='Penang Railway Station';}									
			if($fetch['drop_to']==4){$peneng_pfd='Hotel';
			$sql11=mysql_query("SELECT * FROM apmg_location where id='$fetch[drop_point]'");
			$name1 = mysql_fetch_array($sql11);
			$peneng_ppd=$name1['location_name'];	}					
			if($fetch['drop_to']==5){	$peneng_pfd='Venue';
			$sql11=mysql_query("SELECT  id,vname FROM venue_master where id='$fetch[drop_point]'");
			$name1 = mysql_fetch_array($sql11);$peneng_ppd=$name1['hotelname'];	}
			if(isset($_SESSION['user']))
			{
				echo "hhhhhhhhhhhhhh";
			}
		else
		{
			
		echo "out isset";
		 $user=array(	"pickup from"=>	$peneng_pf,
						"pickup to"=>	$peneng_pp,
						"drop from"=>	$peneng_pfd,
						"drop to"=>		$peneng_ppd,
						"item_id"=>		$_GET['id'],
						"type"=>		$_GET['ttype'],
						"seat"=>		$_GET['seat'],
						"price"=>		$_GET['prate'],
						"no of seat"=>	$_GET['vno']);
		$_SESSION['cart'][0]=$user;
		
		echo count($_SESSION['cart']);
		
		//var_dump($_SESSION['cart']);
		}*/
	/*$pf=$_SESSION['pf'];	$tt=$_SESSION['tt']; $pp=$_SESSION['pp'];$seat=$_SESSION['seat'];
	$dt=$_SESSION['dt'];$dp=$_SESSION['dpp'];$nofvehicle=$_SESSION['vno'];*/
	
	?>
	
	<?
	
}

								 if(isset($_POST['search']))
									{
									
									$pf=$_POST['pf']; 	$ch=$_POST['ch'];
									$pp=$_POST['pp'];	$ad=$_POST['ad']; 
									$dt=$_POST['dt'];	$tdate1=$_POST['cd1'];$tdate2=$_POST['cd2'];		
									$dp=$_POST['dp'];	//$rnd=$_POST['rnd'];
									$cd1=date("Y/m/d",strtotime($tdate1));$cd2=date("Y/m/d",strtotime($tdate2));
									$pax1=$ch+$ad;
	//$user_arr=array('pf'=>$pf,'pp'=>$pp,'dt'=>$dt,'dp'=>$dp,'tt'=>$tt,'ss'=>$seat,'vno'=>$nofvehicle,'cd'=>$cd);
	//$_SESSION['user']=$user_arr;
	//var_dump($_SESSION['user'])or die();
	
	/*$pf=$_SESSION['pf'];	$tt=$_SESSION['tt']; $pp=$_SESSION['pp'];$seat=$_SESSION['seat'];
	$dt=$_SESSION['dt'];$dp=$_SESSION['dpp'];$nofvehicle=$_SESSION['vno'];*/
}
					if(isset($_POST['submit_f1']))
									{
										include "include/session_out.php";
										//echo "code=".$code=$_POST['emp'];
										
										
									/*echo $price=$_POST['price']; 			echo $arrival_name=$_POST['arrival_name'];
									echo $pax=$_POST['pax'];				echo $departure_name=$_POST['departure_name']; 
									echo $num=$_POST['no'];echo"</br>";		echo $flight_arr_t=$_POST['fat'];;echo"</br>";
									echo $flight_arr_m=$_POST['fam'];		echo $type=$_POST['type'];		
									echo $flight_dep_t=$_POST['fdt'];echo"</br>";echo $id=$_POST['ide'];
									echo$flight_dep_m=$_POST['fdm'];*/
									$pf=$_POST['pf']; 	$ch=$_POST['ch'];	$dt=$_POST['dt'];
									$pp=$_POST['pp'];	$ad=$_POST['ad']; 	$dp=$_POST['dp'];
									$tdate1=$_POST['cd1'];//$tdate2=$_POST['cd2'];	//$rnd=$_POST['rnd'];
									$cd1=date("Y/m/d",strtotime($tdate1));//$cd2=date("Y/m/d",strtotime($tdate2));
									$count_session=count($_SESSION['my_cart']);
									
// var_dump($_SESSION['cart']);
 $item=array('id'=>$_POST['ide'],'price'=>$_POST['price'],'arrival_name'=>$_POST['arrival_name'],'departure_name'=>$_POST['departure_name'],'pax'=>$_POST['pax'],'type'=>$_POST['type'],'fam'=>$_POST['fam'],'fat'=>$_POST['fat'],'fdm'=>$_POST['fdm'],'fdt'=>$_POST['fdt'],"pf"=>$_POST['pf'],"pp"=>$_POST['pp'],"dt"=>$_POST['dt'],"dp"=>$_POST['dp'],"ch"=>$_POST['ch'],"ad"=>$_POST['ad'],'cd1'=>$cd1);
  if(empty($_SESSION['my_cart']))
 {
	 //unset($_SESSION['my_cart']); 
	 $_SESSION['my_cart']= array();
	 array_push($_SESSION['my_cart'],$item);
	 //var_dump($_SESSION['my_cart']);
 }
  else
  {
	 //unset($_SESSION['my_cart']); 
	array_push($_SESSION['my_cart'],$item);
	echo"not empty";
	 //var_dump($_SESSION['my_cart']);

  }
									//echo"<script>alert('add to cart...')</script>";
									//echo "<script>window.location='cart_new.php'</script>";


?>
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

		  <!-- Modal//cartModal -->
<?php include "cart-item.php"; ?>
<!-- End Cart Modal -->

									
		<? 
		}
if(isset($_POST['submit']))
{	
	unset($_SESSION['user']);
	//echo "</br></br></br></br></br></br>";
	
	$id=$_POST['ide'];			 $nofvehicle=$_POST['vno']; $pf=$_POST['pf'];		 $pp=$_POST['pp'];		  $dt=$_POST['dt'];	
	$dp=$_POST['dp'];	$ad=$_POST['ad']; $ch=$_POST['ch'];// $tt=$_POST['ttype'];		   $seat=$_POST['seat'];
	$rnd=$_POST['rnd'];//echo"/2=".$rnd2=$_POST['rnd'][1];
	$tdate1=$_POST['cd1']; $tdate2=$_POST['cd2'];	$cd1=date("Y/m/d",strtotime($tdate1));$cd2=date("Y/m/d",strtotime($tdate2));
	$user_arr=array('pf'=>$pf,'pp'=>$pp,'dt'=>$dt,'dp'=>$dp,'item_id'=>$id);
	$_SESSION['user']=$user_arr;
//unset($_SESSION['pf']);unset($_SESSION['pp']);unset($_SESSION['dt']);unset($_SESSION['dpp']);unset($_SESSION['vno']);unset($_SESSION['tt']);unset($_SESSION['seat']);

}
 ?>
 
 <script>

	function getXMLHTTP() { 

			var xmlhttp=false;	

			try{

				xmlhttp=new XMLHttpRequest();

			}

			catch(e)	{		

				try{			

					xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");

				}

				catch(e){

					try{

					xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");

					}

					catch(e1){

						xmlhttp=false;

					}

				}

			}

				

			return xmlhttp;

		}

	

	function getCurrencyCode(strURL,el1)

	{	

	

		var req = getXMLHTTP();		

		if (req) 

		{

			//function to be called when state is changed

			req.onreadystatechange = function()

			{

				//when state is completed i.e 4

				if (req.readyState == 4) 

				{			

					// only if http status is "OK"

					if (req.status == 200)

					{						

						//document.getElementById('cur_code').value=req.responseText;						

					//alert(temp);	

				temp=req.responseText.substring(0,req.responseText.lastIndexOf(","));

				

					el=temp.split(",");

						sel=document.getElementById(el1);

						if(temp.length>0)

						{

						sel.options.length=0;

				 

						//sel.options.add(new Option("Please Select",""));

						for(var i=0; i < el.length; i++)

							{

								var d = el[i];

								var x = d.split("#")[0];

								var y = d.split("#")[1];

								 

								sel.options.add(new Option(x.trim(),y.trim()));

								

							}

						//	if(d.split("#")[1]!='Others')

							//{

							//sel.options.add(new Option("Others","100000"));

							//}

						}

						else

						{

						sel.options.length=0;

						sel.options.add(new Option('Please Select point',''));

						//sel.options.add(new Option("Others","100000"));

						}

					} 

					else 

					{

						alert("There was a problem while using XMLHTTP:\n" + req.statusText);

					}

				}				

			 }			

			req.open("GET", strURL, true);

			//window.open(strURL);

			 req.send(null);

		}

			

	}
	
	
	
	</script>


<script>
function abc()
{
	alert('Please Login');
}
	</script>
<?php include("include/header.php");?>
        <div class="row banner gap1" id="contents">
            <div class="input">
                <div class="container">
                	<div class="col-sm-9">
                    <form type="search" method="POST" action="" class="searchs">
                        <input name="by" type="hidden" value="2" />
                        <h4>Transfer Search</h4>
                        <ul class="list-inline">    
                        	<li>
                        		<!--<label class="radio-inline" id="show">
								<input type="radio" name="rnd" value="false"  <?php //if($rnd=='false'){ echo "checked=checked";}  ?>>Round Trip</label> --> 
								<label class="radio-inline" id="hide">
                                <input type="radio" name="rnd" value="true" checked="checked"> One-Way Only</label>
                            </li>
                            </ul>
                        <ul class="list-inline form-horizontal">
                            <li>
                                <label>Pickup From :</label>
                                <div class="location">
                                   <select name="pf"   class="form-control"   onchange="getCurrencyCode('find_ccode4444.php?q='+this.value,'locationf');" >
                                        <!--<option >Pickup From</option>-->
										<option value="1" <?php if($pf=='1') echo 'selected="selected"'; ?>>Airport</option>
										<option value="2" <?php if($pf=='2') echo 'selected="selected"'; ?>>Coach station</option>
										<option value="3" <?php if($pf=='3') echo 'selected="selected"'; ?>>Railway Station</option>	
										<option value="4" <?php if($pf=='4') echo 'selected="selected"'; ?>>Hotel</option>	
										<option value="5" <?php if($pf=='5') echo 'selected="selected"'; ?>>APMG Venue</option>
										<option value="6" <?php if($pf=='6') echo 'selected="selected"'; ?>>Cruise</option>	
										<option value="7" <?php if($pf=='7') echo 'selected="selected"'; ?>>Ferry</option>
										<option value="8" <?php if($pf=='8') echo 'selected="selected"'; ?>>Kuala Lumpur</option>	
										<option value="9" <?php if($pf=='9') echo 'selected="selected"'; ?>>IPOH</option>
                                    </select>
                                </div>
                            </li>
							<li>
                                <label>Pickup Point:</label>
                                <div class="location">
                                    <select type="search" name="pp" class="form-control searchbox" id="locationf">
                                       <option value="PA" <?php if($pp=='PA') echo 'selected="selected"'; ?>>Penang Airport</option>
										<option value="PC" <?php if($pp=='PC') echo 'selected="selected"'; ?>>Penang Coach Station</option>
										<option value="PR" <?php if($pp=='PR') echo 'selected="selected"'; ?>>Penang Railway Station</option>
										<option value="CT" <?php if($pp=='CT') echo 'selected="selected"'; ?>>Cruise Terminal</option>
										<option value="FT" <?php if($pp=='FT') echo 'selected="selected"'; ?>>Ferry Terminal</option>
										<option value="KLIA" <?php if($pp=='KLIA') echo 'selected="selected"'; ?>>KLIA</option>
										<option value="KLIA2" <?php if($pp=='KLIA2') echo 'selected="selected"'; ?>>KLIA2</option>
										<option value="KLCH" <?php if($pp=='KLCH') echo 'selected="selected"'; ?>>KL City Hotels</option>
										<option value="IPA" <?php if($pp=='IPA') echo 'selected="selected"'; ?>>Airport</option>
										<option value="IPCH" <?php if($pp=='IPCH') echo 'selected="selected"'; ?>>City Hotels</option>
										
										<?php 
										if($pf=='4'){
										$sq1=mysql_query("SELECT  * FROM apmg_location");
										while($na = mysql_fetch_array($sq1))
										{

									  // echo $name[1];?>
										<option value="<?=$pp;?>" <?php if($pp==$na['id']) echo 'selected="selected"'; ?>><?php echo $na['location_name'];?></option>
										 <?
										} 
										}if($pf=='5'){
										$sql11=mysql_query("SELECT  id,vname FROM venue_master");
										while($name1 = mysql_fetch_array($sql11))
										{ ?><option value="<?=$pp;?>" <?php if($pp==$name1['id']) echo 'selected="selected"'; ?>><?=$name1['vname'];?></option>		
										<?php
										} 
										}
										?>
										
										
										
                                    </select>
                                </div>
                            </li>
							<li>
                                <label>Drop To :</label>
                                <div class="location">
                                    <select name="dt"   class="form-control searchbox"   onchange="getCurrencyCode('find_ccode4444.php?q='+this.value,'location');" >
									   <!--<option value="">Drop To</option>-->
									   <option value="1" <?php if($dt=='1') echo 'selected="selected"'; ?>>Airport</option>	
									   <option value="2" <?php if($dt=='2') echo 'selected="selected"'; ?>>Coach station</option>
									   <option value="3" <?php if($dt=='3') echo 'selected="selected"'; ?>>Railway Station</option>	
									   <option value="4" <?php if($dt=='4') echo 'selected="selected"'; ?>>Hotel</option>	
									   <option value="5" <?php if($dt=='5') echo 'selected="selected"'; ?>>APMG Venue</option>
									   <option value="6" <?php if($dt=='6') echo 'selected="selected"'; ?>>Cruise</option>	
									   <option value="7" <?php if($dt=='7') echo 'selected="selected"'; ?>>Ferry</option>
									   <option value="8" <?php if($dt=='8') echo 'selected="selected"'; ?>>Kuala Lumpur</option>	
									   <option value="9" <?php if($dt=='9') echo 'selected="selected"'; ?>>IPOH</option>
                                    </select>
                                </div>
                            </li>
							<li>
                                <label>Drop Point:<?php //echo"dp=".$dp;?></label>
                                <div class="location">
                                    <select type="search" name="dp" class="form-control searchbox1" id="location">
										<!--<option value="">Drop Point</option>-->
										<option value="PA" <?php if($dp=='PA') echo 'selected="selected"'; ?>>Penang Airport</option>	
										<option value="PC" <?php if($dp=='PC') echo 'selected="selected"'; ?>>Penang Coach Station</option>
										<option value="PR" <?php if($dp=='PR') echo 'selected="selected"'; ?>>Penang Railway Station</option>	
										<option value="CT" <?php if($dp=='CT') echo 'selected="selected"'; ?>>Cruise Terminal</option>
										<option value="FT" <?php if($dp=='FT') echo 'selected="selected"'; ?>>Ferry Terminal</option>
										<option value="KLIA" <?php if($dp=='KLIA') echo 'selected="selected"'; ?>>KLIA</option>
										<option value="KLIA2" <?php if($dp=='KLIA2') echo 'selected="selected"'; ?>>KLIA2</option>
										<option value="KLCH" <?php if($dp=='KLCH') echo 'selected="selected"'; ?>>KL City Hotels</option>
										<option value="IPA" <?php if($dp=='IPA') echo 'selected="selected"'; ?>>Airport</option>
										<option value="IPCH" <?php if($dp=='IPCH') echo 'selected="selected"'; ?>>City Hotels</option>
									   <?PHP
										if($dt=='4'){
										$sql12=mysql_query("SELECT  * FROM apmg_location");
											while($name2 = mysql_fetch_array($sql12))
											{ ?>
										<option value="<?=$dp?>" <?php if($dp==$name2['id']) echo 'selected="selected"'; ?>><?=$name2['location_name']?></option>
										<?php } }
										if($dt=='5'){
										$s=mysql_query("SELECT  id,vname FROM venue_master");
											while($na = mysql_fetch_array($s))
											{ ?>									   
										<option value="<?=$dp?>" <?php if($dp==$na['id']) echo 'selected="selected"'; ?>><?=$na['vname']?></option>
										<?php }  } ?>
                                    </select>
                                </div>
                            </li>
                        </ul>
                        <ul class="list-inline">                        
                            <li>
                                <label>Pickup Date :</label>
                               <div class="datepicker1">
                               	<div class="dates">
                                    <input type="text" value="<?=$cd1?>" class="form-control" id="from-date" name="cd1">
                                </div>
                                </div>
                            </li>
                            <!--<li>
                            	<?php //if($rnd=='false'){ ?>
                            	<div id="div_id">
                                <label>Return Date :</label>
                               <div class="datepicker2"> 
                               	<div class="dates">
                                    <input type="text" value="<?=$cd2?>" class="form-control" id="to-date" name="cd2">
                                </div>
                            </div>
                        </div>
                            <?php// } ?>
                            </li>-->
                            
                            <li>
                                <label>Adult:</label>
                                <div class="selects">
                                    <select type="search" name="ad" class="form-control searchbox1" required>
                                       <?php for($i=1;$i<= 15;$i++){?>
                                        <option value="<?=$i?>"<?php if($i==$ad) echo 'selected="selected"'; ?> ><?=$i;?></option>
									   <?php } ?>
                                         </select>
                                </div>
                            </li>
                            <li>
                                <label>Child:</label>
                                <div class="selects">
                                    <select type="search" name="ch" class="form-control searchbox1" required>
                                      <?php for($i=1;$i<= 15;$i++){?>
                                        <option value="<?=$i?>" <?php if($i==$ch) echo 'selected="selected"'; ?>><?=$i?></option>
									   <?php } ?>
                                       </select>
                                </div>
                            </li>
                            
                            <li>
                                <label>&nbsp;</label>
                                <button type="submit" class="btn btn-primary btn-block btn-search" name="search">Search</button>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
           </div>
        </div>
          <div class="row bg-grey">
            <div class="container">
                <div class="row">
                    <div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-list">
                        <div class="col-md-7">
                            <ol class="breadcrumb">
                                <li><a href="index.html"><i class="fa fa-home"></i> Apollo Asia Holidays</a></li>
                                <li><a href="#">Transfers List</a></li>
                            </ol>
                        </div>
                        <div class="cbp-vm-options">
                            <a href="#" class="cbp-vm-icon cbp-vm-grid" data-view="cbp-vm-view-grid">Grid View</a>
                            <a href="#" class="cbp-vm-icon cbp-vm-list cbp-vm-selected" data-view="cbp-vm-view-list">List View</a>
                        </div>
                        <div class="col-sm-12">
                            <div class="row">
                              	  <ul>

								<?php 
								 /*if(isset($_POST['search']))
									{
									//echo "isset</bt>";
									$pf=$_POST['pf']; 	$ch=$_POST['ch'];
									$pp=$_POST['pp'];	$ad=$_POST['ad']; 
									$dt=$_POST['dt'];	$tdate1=$_POST['cd1'];$tdate2=$_POST['cd2'];		
									$dp=$_POST['dp'];	$rnd=$_POST['rnd'];
									$cd1=date("Y/m/d",strtotime($tdate1));$cd2=date("Y/m/d",strtotime($tdate2));
									$sql=mysql_query("select * from transfer_tariff_master where pickup_from='$pf' and pickup_point='$pp' and drop_to='$dt' and drop_point='$dp' and pvt_van!='0' ");
									//echo mysql_num_rows($sql);
									if(mysql_num_rows($sql)> 0)
									{
									while($fetch=mysql_fetch_array($sql))
									{
									 $price=$fetch['pvt_van'];  $pax=ceil(($ad+$ch)/9);
									?> <li>
                                        <a class="cbp-vm-image" href="details.html"><img src="images/car.jpg"></a>
                                        <div class="cbp-vm-details">
                                            <!--<h5 class="project-name text-uppercase">PRIVATE <small>STANDARD <span class="text-muted">CAR</span></small></h5>-->
											<h5 class="project-name text-uppercase">PRIVATE <small>STANDARD <span class="text-muted"><?php  echo $pax."-VAN";?></span></small></h5>
                                            <div class="row">
											<div class="col-sm-5">
                                            <p class="location1"><i class="fa fa-flag-o"></i> Door to door service</p>
                                            <p class="services"><i class="fa fa-clock-o"></i> Available 24/7 </p>
											</div>
											<div class="col-sm-7">
											<ul class="list-unstyled facilities">
											<li><i class="fa fa-circle"></i> Exclusive ride for you </li>
											<li><i class="fa fa-circle"></i>1 item of hand baggage allowed per person </li>
											<li> <i class="fa fa-circle"></i>1 piece of baggage allowed per person ( max.dimensions 158cm) length+width+height=158cm </li>
											</ul>
											</div>
											</div>
                                        </div>
                                        <div class="call-back"><?php if($rnd=="true"){ $n=1; } else {$n=2;}?>
                                            <h3 class="price1">MYR <?=$price*$pax;?>/-</h3>
                                            <a class="cbp-vm-icon cbp-vm-add" href="#" data-toggle="modal" data-target="#pricemodal"> Select</a><br>
                                            <a href="#" data-toggle="modal" data-target="#mymodal">View More Details</a>
                                        </div>
                                    </li>  
									<?php 
									
									}
									}
									$sql=mysql_query("select * from transfer_tariff_master where pickup_from='$pf' and pickup_point='$pp' and drop_to='$dt' and drop_point='$dp' and pvt_car!='0' ");
									//echo mysql_num_rows($sql);
									if(mysql_num_rows($sql)> 0)
									{
									while($fetch=mysql_fetch_array($sql))
									{
									 $price=$fetch['pvt_car']; $pax=ceil(($ad+$ch)/2);
								?>
								
		
                                      <li>
                                        <a class="cbp-vm-image" href="details.html"><img src="images/car.jpg"></a>
                                        <div class="cbp-vm-details">
                                            <!--<h5 class="project-name text-uppercase">PRIVATE <small>STANDARD <span class="text-muted">CAR</span></small></h5>-->
											<h5 class="project-name text-uppercase">PRIVATE <small>STANDARD <span class="text-muted"><?php echo $pax."-CAR";?></span></small></h5>
                                            <div class="row">
											<div class="col-sm-5">
                                            <p class="location1"><i class="fa fa-flag-o"></i> Door to door service</p>
                                            <p class="services"><i class="fa fa-clock-o"></i> Available 24/7 </p>
											</div>
											<div class="col-sm-7">
											<ul class="list-unstyled facilities">
											<li><i class="fa fa-circle"></i> Exclusive ride for you </li>
											<li><i class="fa fa-circle"></i>1 item of hand baggage allowed per person </li>
											<li> <i class="fa fa-circle"></i>1 piece of baggage allowed per person ( max.dimensions 158cm) length+width+height=158cm </li>
											</ul>
											</div>
											</div>
                                        </div>
                                        <div class="call-back"><?php if($rnd=="true"){ $n=1; } else {$n=2;}?>
                                            <h3 class="price1">MYR <?=$price*$pax;?>/-</h3>
                                            <a class="cbp-vm-icon cbp-vm-add" href="#" data-toggle="modal" data-target="#pricemodal"> Select</a><br>
                                            <a href="#" data-toggle="modal" data-target="#mymodal">View More Details</a>
                                        </div>
                                    </li>  
									<?php 
									
									}
									}
									}
									else
									{*/
									$sql=mysql_query("select * from transfer_tariff_master where pickup_from='$pf' and pickup_point='$pp' and drop_to='$dt' and drop_point='$dp' and pvt_van!='0' ");
									//echo mysql_num_rows($sql);
									if(mysql_num_rows($sql)> 0)
									{
										
									while($fetch=mysql_fetch_array($sql))
									{
									 $price=$fetch['pvt_van']; $ttype="VAN"; $pax=ceil(($ad+$ch)/9);
									?> <li>
                                    <form name="form31" action="" method="POST">
									<input type="hidden" name="pf" value="<?=$pf?>"/>
									<input type="hidden" name="pp" value="<?=$pp?>"/>
									<input type="hidden" name="dt" value="<?=$dt?>"/>
									<input type="hidden" name="dp" value="<?=$dp?>"/>
									<input type="hidden" name="ch" value="<?=$ch?>"/>
									<input type="hidden" name="ad" value="<?=$ad?>"/>
									<input type="hidden" name="cd1" value="<?=$cd1?>"/>
									
									<!--<input type="hidden" name="rnd" value="<?=$rnd?>"/>-->
                                        <a class="cbp-vm-image" href="details.html"><img src="images/van1.jpg"></a>
                                        <div class="cbp-vm-details">
                                            <!--<h5 class="project-name text-uppercase">PRIVATE <small>STANDARD <span class="text-muted">CAR</span></small></h5> data-target="#pricemodal"-->
											<h4>
        <?php 
                      if($pf==1){ echo "Airport";}
                      if($pf==2){ echo "Coach station";}
                      if($pf==3){ echo "Railway Station";}
                      if($pf==4){ echo "Hotel";}
                      if($pf==5){ echo "Venue";}
                      if($pf==6){ echo "Cruise";}
                      if($pf==7){ echo "Ferry";}
            if($pf==8){ echo "Kuala Lumpur";}
            if($pf==9){ echo "IPOH";}             ?>
        <?php 
                      echo "(";
                      if($pp=='PA'){ echo "Penang Airport";}
                      if($pp=='PC'){ echo "Penang Coach Station";}
                      if($pp=='PR'){ echo "Penang Railway Station";}
                      if($pp=='CT'){ echo "Cruise Terminal";}
                      if($pp=='FT'){ echo "Ferry Terminal";}
            if($pp=='KLIA'){ echo "KLIA";}
            if($pp=='KLIA2'){ echo "KLIA2";}
            if($pp=='KLCH'){ echo "KL City Hotels";}
            if($pp=='IPA'){ echo "Airport";}
            if($pp=='IPCH'){ echo "City Hotels";}
                      if($pf=='4'){ $sql12=mysql_query("SELECT  * FROM apmg_location where id='$pp'");
                                  $name2 = mysql_fetch_array($sql12);
                                   echo $name2['location_name'];
                                }
                      if($pf=='5'){
                    $s=mysql_query("SELECT  id,vname FROM venue_master where id='$pp'");
                    $na = mysql_fetch_array($s);
                    echo $na['vname'];
                    
                  } echo ")";?>
        <i class="fa fa-arrow-right"></i>
        <?php 
                    
                    if($dt==1){ echo "Airport";}
                      if($dt==2){ echo "Coach station";}
                      if($dt==3){ echo "Railway Station";}
                      if($dt==4){ echo "Hotel";}
                      if($dt==5){ echo "Venue";}
                      if($dt==6){ echo "Cruise";}
                      if($dt==7){ echo "Ferry";}
            if($dt==8){ echo "Kuala Lumpur";}
            if($dt==9){ echo "IPOH";}         ?>
            <?php 
                    echo "(";
                    if($dp=='PA'){ echo "Penang Airport";}
                      if($dp=='PC'){ echo "Penang Coach Station";}
                      if($dp=='PR'){ echo "Penang Railway Station";}
                      if($dp=='CT'){ echo "Cruise Terminal";}
                      if($dp=='FT'){ echo "Ferry Terminal";}
            if($dp=='KLIA'){ echo "KLIA";}
            if($dp=='KLIA2'){ echo "KLIA2";}
            if($dp=='KLCH'){ echo "KL City Hotels";}
            if($dp=='IPA'){ echo "Airport";}
            if($dp=='IPCH'){ echo "City Hotels";}
                    if($dt=='4'){ $sql12=mysql_query("SELECT  * FROM apmg_location where id='$dp'");
                                $name2 = mysql_fetch_array($sql12);
                                 echo $name2['location_name'];
                              }
                    if($dt=='5'){
                    $s=mysql_query("SELECT  id,vname FROM venue_master where id='$dp'");
                    $na = mysql_fetch_array($s);
                    echo $na['vname'];echo ")";
                    } echo ")";?>
     </h4> 
											<h5 class="project-name text-uppercase">PRIVATE <small>STANDARD <span class="text-muted"><?php  echo $pax."-VAN";?></span></small></h5>
                                            <div class="row">
											<div class="col-sm-5">
                                            <p class="location1"><i class="fa fa-flag-o"></i> Door to door service</p>
                                            <p class="services"><i class="fa fa-clock-o"></i> Available 24/7 </p>
											<?php echo "Service Date ".$cd1;?>
											</div>
											<div class="col-sm-7">
											<ul class="list-unstyled facilities">
											<li><i class="fa fa-circle"></i> Exclusive ride for you </li>
											<li><i class="fa fa-circle"></i>1 item of hand baggage allowed per person </li>
											<li> <i class="fa fa-circle"></i>1 piece of baggage allowed per person ( max.dimensions 158cm) length+width+height=158cm </li>
											</ul>
											</div>
											</div>
                                        </div>
										 <div class="call-back">
                                            <br> <br> 
                                       <?php// if($rnd=="true"){ $n=1; }?>
                                            <h3 class="price1">MYR <?php echo number_format(($price+$markup)*$pax,2);?></h3>
                                            <br>
                                            <a href="#" data-toggle="modal" data-target="#mymodal">View More Details</a>
                                        </div>
										 <div class="descriptions searchs-details clearfix">
                                         <div class="col-sm-12">
                                      
                                      <div class="row">  
                                       	<div class="col-sm-5">
									<h4 class="price1">Arrival Details </h4>
								 
									<ul class="list-inline">
										<li>
											<label>Arrival Flight code:</label>
											<div>
											<input class="form-control" type="text" placeholder="FY0512E" required="required"  name="arrival_name"/>
											</div> 
										</li>
										<li class="form-inline">
											
											<label>Flight arrival time:</label>
											<br>
											
											 <span class="selects">
											<select type="search" name="fat" required="" class="form-control">
											<option value="">-hh-</option>
											<?php for($i=00;$i<= 23;$i++){?>
											<option value="<?php echo clockalize($i);?>"><?php echo clockalize($i);?></option><? }?>
											</select>
										</span>
										 <span class="selects">
											<select type="search"  name="fam" required="" class="form-control">
											<option value="">-mm-</option>
											<?php for($i=00;$i<= 11;$i++){?>
											<option value="<?php echo clockalize($i*5);?>"><?php echo clockalize($i*5);?></option><? }?>
											</select>
										</span>
											 
										</li>
									</ul>
								</div>

											<?php /*if($rnd=="false"){
												?>
<div class="col-sm-5">
												
												<h2 class="price1">Departure  Transfer </h2>
										 
												<ul class="list-inline">
													<li>
											<label>Departure  Flight code:</label>
 
 											<div>
											<input type="text" class="form-control" placeholder="FY0512E" name="departure_name"/>
											</div>
										</li>
										<li class="form-inline">
											<label>Flight departure  time:</label></br>
										 <span class="selects">
											<select type="search"  class="form-control" name="fdt" required="">
											<option>hh</option>
											<?php for($i=00;$i<= 23;$i++){?>
											<option value="<?=$i?>"><?=$i?></option><? }?>
											</select>
											 </span>
											 <span class="selects">
											<select type="search" class="form-control" name="fdm"  required="">
											<option>mm</option>
											<?php for($i=00;$i<= 11;$i++){?>
											<option value="<?=$i*5?>"><?=$i*5?></option><? }?>
											</select>

											 </span>
										</li>
									</ul>
								</div>
									<?
											}*/?>
									<input type="hidden" name="ide" value="<?=$fetch['id'];?>"/>
									<input type="hidden" name="price" value="<?=($price+$markup)?>"/>
									<input type="hidden" name="pax" value="<?=$pax?>"/>
									
									<input type="hidden" name="type" value="<?=$ttype?>"/>
									
								<div class="col-sm-2 text-center"></br></br>
								<button type="submit" name="submit_f1"  class="cbp-vm-icon cbp-vm-add btn"> Add </button> 
								<!--<a class="cbp-vm-icon cbp-vm-add " href="#" data-toggle="modal"> Add</a>-->
							</div>
							</div></br>
										</div>
                                        </div>
										 </form>
                                    </li>
									<?php 
									
									}
									}?> 
									<?php 
									$pax1=$ch+$ad;
									if($pax1 <= 2){
									$sql=mysql_query("select * from transfer_tariff_master where pickup_from='$pf' and pickup_point='$pp' and drop_to='$dt' and drop_point='$dp' and pvt_car!='0' ");
									//echo mysql_num_rows($sql);
									if(mysql_num_rows($sql)> 0)
									{
									while($fetch=mysql_fetch_array($sql))
									{
									 $price=$fetch['pvt_car']; $pax=ceil(($ad+$ch)/2);$ttype="CAR";
								?> <li>
                                
                                <form name="form2" action="" method="POST">	
									<input type="hidden" name="pf" value="<?=$pf?>"/>
									<input type="hidden" name="pp" value="<?=$pp?>"/>
									<input type="hidden" name="dt" value="<?=$dt?>"/>
									<input type="hidden" name="dp" value="<?=$dp?>"/>
									<input type="hidden" name="ch" value="<?=$ch?>"/>
									<input type="hidden" name="ad" value="<?=$ad?>"/>
									<input type="hidden" name="cd1" value="<?=$cd1?>"/>
									
                                      
                                        <a class="cbp-vm-image" href="details.html"><img src="images/car1.jpg"></a>
 
                                        <div class="cbp-vm-details">
                                            <!--<h5 class="project-name text-uppercase">PRIVATE <small>STANDARD <span class="text-muted">CAR</span></small></h5> data-target="#pricemodal"-->
											<h4>
        <?php 
                      if($pf==1){ echo "Airport";}
                      if($pf==2){ echo "Coach station";}
                      if($pf==3){ echo "Railway Station";}
                      if($pf==4){ echo "Hotel";}
                      if($pf==5){ echo "Venue";}
                      if($pf==6){ echo "Cruise";}
                      if($pf==7){ echo "Ferry";}
            if($pf==8){ echo "Kuala Lumpur";}
            if($pf==9){ echo "IPOH";}             ?>
        <?php 
                      echo "(";
                      if($pp=='PA'){ echo "Penang Airport";}
                      if($pp=='PC'){ echo "Penang Coach Station";}
                      if($pp=='PR'){ echo "Penang Railway Station";}
                      if($pp=='CT'){ echo "Cruise Terminal";}
                      if($pp=='FT'){ echo "Ferry Terminal";}
            if($pp=='KLIA'){ echo "KLIA";}
            if($pp=='KLIA2'){ echo "KLIA2";}
            if($pp=='KLCH'){ echo "KL City Hotels";}
            if($pp=='IPA'){ echo "Airport";}
            if($pp=='IPCH'){ echo "City Hotels";}
                      if($pf=='4'){ $sql12=mysql_query("SELECT  * FROM apmg_location where id='$pp'");
                                  $name2 = mysql_fetch_array($sql12);
                                   echo $name2['location_name'];
                                }
                      if($pf=='5'){
                    $s=mysql_query("SELECT  id,vname FROM venue_master where id='$pp'");
                    $na = mysql_fetch_array($s);
                    echo $na['vname'];
                    
                  } echo ")";?>
        <i class="fa fa-arrow-right"></i>
        <?php 
                    
                    if($dt==1){ echo "Airport";}
                      if($dt==2){ echo "Coach station";}
                      if($dt==3){ echo "Railway Station";}
                      if($dt==4){ echo "Hotel";}
                      if($dt==5){ echo "Venue";}
                      if($dt==6){ echo "Cruise";}
                      if($dt==7){ echo "Ferry";}
            if($dt==8){ echo "Kuala Lumpur";}
            if($dt==9){ echo "IPOH";}         ?>
            <?php 
                    echo "(";
                    if($dp=='PA'){ echo "Penang Airport";}
                      if($dp=='PC'){ echo "Penang Coach Station";}
                      if($dp=='PR'){ echo "Penang Railway Station";}
                      if($dp=='CT'){ echo "Cruise Terminal";}
                      if($dp=='FT'){ echo "Ferry Terminal";}
            if($dp=='KLIA'){ echo "KLIA";}
            if($dp=='KLIA2'){ echo "KLIA2";}
            if($dp=='KLCH'){ echo "KL City Hotels";}
            if($dp=='IPA'){ echo "Airport";}
            if($dp=='IPCH'){ echo "City Hotels";}
                    if($dt=='4'){ $sql12=mysql_query("SELECT  * FROM apmg_location where id='$dp'");
                                $name2 = mysql_fetch_array($sql12);
                                 echo $name2['location_name'];
                              }
                    if($dt=='5'){
                    $s=mysql_query("SELECT  id,vname FROM venue_master where id='$dp'");
                    $na = mysql_fetch_array($s);
                    echo $na['vname'];echo ")";
                    } echo ")";?>
     </h4> 
											<h5 class="project-name text-uppercase">PRIVATE <small>STANDARD <span class="text-muted"><?php  echo $pax."-CAR";?></span></small></h5>
                                            <div class="row">
											<div class="col-sm-5">
                                            <p class="location1"><i class="fa fa-flag-o"></i> Door to door service</p>
                                            <p class="services"><i class="fa fa-clock-o"></i> Available 24/7 </p>
											<?php echo "Service Date ".$cd1;?>
											</div>
											<div class="col-sm-7">
											<ul class="list-unstyled facilities">
											<li><i class="fa fa-circle"></i> Exclusive ride for you </li>
											<li><i class="fa fa-circle"></i>1 item of hand baggage allowed per person </li>
											<li> <i class="fa fa-circle"></i>1 piece of baggage allowed per person ( max.dimensions 158cm) length+width+height=158cm </li>
											</ul>
											</div>
											</div>
                                        </div>
 
										 <div class="call-back">
                                            <br> <br> 
                                     
                                            <h3 class="price1">MYR <?php echo number_format(($price+$markup)*$pax,2);?></h3>
                                            <br>
                                            <a href="#" data-toggle="modal" data-target="#mymodal">View More Details</a>
                                        </div>
 
										 <div class="descriptions searchs-details clearfix">
                                         <div class="col-sm-12">
                                      
                                      <div class="row">  
                                       	<div class="col-sm-5">
									<h4 class="price1">Arrival Transfer </h4>
								 
									<ul class="list-inline">
										<li>
											<label>Arrival Flight code:</label>
											<div>
											<input class="form-control" type="text" placeholder="FY0512E"  name="arrival_name" required="required"/>
											</div> 
										</li>
										<li class="form-inline">
											
											<label>Flight arrival time:</label>
											<br>
											<span class="selects">
											<select name="fat" required="" class="form-control" >
												<option value="">-hh-</option>
												<?php for($i=00;$i<= 23;$i++){?>
												<option value="<?php echo clockalize($i);?>"><?php echo clockalize($i);?></option><? }?>
											</select>
										</span>
										 <span class="selects">
											<select type="search"  name="fam" required="" class="form-control">
											<option value="">-mm-</option>
											<?php for($i=00;$i<= 11;$i++){?>
											<option value="<?php echo clockalize($i*5);?>"><?php echo clockalize($i*5);?></option><? }?>
											</select>
										</span>
											 
										</li>
									</ul>
								</div>
                                

											<?php if($rnd=="false"){
												?>
<div class="col-sm-5">
												
												<h2 class="price1">Departure  Transfer </h2>
										 
												<ul class="list-inline">
													<li>
											<label>Departure  Flight code:</label>
 
 											<div>
											<input type="text" class="form-control" placeholder="FY0512E" name="departure_name"/>
											</div>
										</li>
										<li class="form-inline">
											<label>Flight departure  time:</label></br>
										 <span class="selects">
											<select type="search"  class="form-control" name="fdt" required="">
											<option>hh</option>
											<?php for($i=00;$i<= 23;$i++){?>
											<option value="<?=$i?>"><?=$i?></option><? }?>
											</select>
											 </span>
											 <span class="selects">
											<select type="search" class="form-control" name="fdm"  required="">
											<option>mm</option>
											<?php for($i=00;$i<= 11;$i++){?>
											<option value="<?=$i*5?>"><?=$i*5?></option><? }?>
											</select>
											 </span>
										</li>
 
									</ul>
								</div>
									<?
											}?>
											
									<input type="hidden" name="ide" value="<?=$fetch['id'];?>"/>
									<input type="hidden" name="price" value="<?=($price+$markup)?>"/>
									<input type="hidden" name="pax" value="<?=$pax?>"/>
									
									<input type="hidden" name="type" value="<?=$ttype?>"/>
									<!--<input type="hidden" name="emp" value="" id="code1"/>-->
									<div class="col-sm-2 text-center"></br></br>
									<button type="submit" name="submit_f1" class="cbp-vm-icon cbp-vm-add btn"> Add </button> 
								<!--<a class="cbp-vm-icon cbp-vm-add " onclick="document.getElementById('code1').value = makeid()"href="#" data-toggle="modal"> Add</a>-->
							</div>
							</div></br>
											
											
									</div>
                                        </div>
 
 </form>
                                    </li> 
									 
									<?php 
									
									}
									}
									}
									//}
									?>
									
									<!--<li>
                                        <a class="cbp-vm-image" href="details.html"><img src="images/car.jpg"></a>
                                        <div class="cbp-vm-details">
                                            <h5 class="project-name text-uppercase">PRIVATE <small>STANDARD <span class="text-muted">CAR</span></small></h5>
                                            <div class="row">
                                                <div class="col-sm-5">
                                            <p class="location1"><i class="fa fa-flag-o"></i> Door to door service</p>
                                            <p class="services"><i class="fa fa-clock-o"></i> Available 24/7 </p>
</div>
<div class="col-sm-7">

                                            <ul class="list-unstyled facilities">
                                    
                                        <li><i class="fa fa-circle"></i> Exclusive ride for you </li>
                                    
                                    
                                    
                                        <li><i class="fa fa-circle"></i>1 item of hand baggage allowed per person </li>
                                    
                                        <li> <i class="fa fa-circle"></i>1 piece of baggage allowed per person ( max.dimensions 158cm) length+width+height=158cm </li>
                        </ul>
                    </div>
                </div>
                                        </div>
                                        <div class="call-back">
                                            <h3 class="price1">MYR 60/</h3>
                                            <a class="cbp-vm-icon cbp-vm-add" href="#" data-toggle="modal" data-target="#pricemodal"> Select</a><br>
                                            <a href="#" data-toggle="modal" data-target="#mymodal">View More Details</a>
                                        </div>
                                    </li>  <li>
                                        <a class="cbp-vm-image" href="details.html"><img src="images/car.jpg"></a>
                                        <div class="cbp-vm-details">
                                            <h5 class="project-name text-uppercase">PRIVATE <small>STANDARD <span class="text-muted">CAR</span></small></h5>
                                            <div class="row">
                                                <div class="col-sm-5">
                                            <p class="location1"><i class="fa fa-flag-o"></i> Door to door service</p>
                                            <p class="services"><i class="fa fa-clock-o"></i> Available 24/7 </p>
</div>
<div class="col-sm-7">

                                            <ul class="list-unstyled facilities">
                                    
                                        <li><i class="fa fa-circle"></i> Exclusive ride for you </li>
                                    
                                    
                                    
                                        <li><i class="fa fa-circle"></i>1 item of hand baggage allowed per person </li>
                                    
                                        <li> <i class="fa fa-circle"></i>1 piece of baggage allowed per person ( max.dimensions 158cm) length+width+height=158cm </li>
                        </ul>
                    </div>
                </div>
                                        </div>
                                        <div class="call-back">
                                            <h3 class="price1">MYR 60/</h3>
                                            <a class="cbp-vm-icon cbp-vm-add" href="#" data-toggle="modal" data-target="#pricemodal"> Select</a><br>
                                            <a href="#" data-toggle="modal" data-target="#mymodal">View More Details</a>
                                        </div>
                                    </li>  <li>
                                        <a class="cbp-vm-image" href="details.html"><img src="images/car.jpg"></a>
                                        <div class="cbp-vm-details">
                                            <h5 class="project-name text-uppercase">PRIVATE <small>STANDARD <span class="text-muted">CAR</span></small></h5>
                                            <div class="row">
                                                <div class="col-sm-5">
                                            <p class="location1"><i class="fa fa-flag-o"></i> Door to door service</p>
                                            <p class="services"><i class="fa fa-clock-o"></i> Available 24/7 </p>
</div>
<div class="col-sm-7">

                                            <ul class="list-unstyled facilities">
                                    
                                        <li><i class="fa fa-circle"></i> Exclusive ride for you </li>
                                    
                                    
                                    
                                        <li><i class="fa fa-circle"></i>1 item of hand baggage allowed per person </li>
                                    
                                        <li> <i class="fa fa-circle"></i>1 piece of baggage allowed per person ( max.dimensions 158cm) length+width+height=158cm </li>
                        </ul>
                    </div>
                </div>
                                        </div>
                                        <div class="call-back">
                                            <h3 class="price1">MYR 60/</h3>
                                            <a class="cbp-vm-icon cbp-vm-add" href="#" data-toggle="modal" data-target="#pricemodal"> Select</a><br>
                                            <a href="#" data-toggle="modal" data-target="#mymodal">View More Details</a>
                                        </div>
                                    </li>  <li>
                                        <a class="cbp-vm-image" href="details.html"><img src="images/car.jpg"></a>
                                        <div class="cbp-vm-details">
                                            <h5 class="project-name text-uppercase">PRIVATE <small>STANDARD <span class="text-muted">CAR</span></small></h5>
                                            <div class="row">
                                                <div class="col-sm-5">
                                            <p class="location1"><i class="fa fa-flag-o"></i> Door to door service</p>
                                            <p class="services"><i class="fa fa-clock-o"></i> Available 24/7 </p>
</div>
<div class="col-sm-7">

                                            <ul class="list-unstyled facilities">
                                    
                                        <li><i class="fa fa-circle"></i> Exclusive ride for you </li>
                                    
                                    
                                    
                                        <li><i class="fa fa-circle"></i>1 item of hand baggage allowed per person </li>
                                    
                                        <li> <i class="fa fa-circle"></i>1 piece of baggage allowed per person ( max.dimensions 158cm) length+width+height=158cm </li>
                        </ul>
                    </div>
                </div>
                                        </div>
                                        <div class="call-back">
                                            <h3 class="price1">MYR 60/</h3>
                                            <a class="cbp-vm-icon cbp-vm-add" href="#" data-toggle="modal" data-target="#pricemodal"> Select</a><br>
                                            <a href="#" data-toggle="modal" data-target="#mymodal">View More Details</a>
                                        </div>
                                    </li>  <li>
                                        <a class="cbp-vm-image" href="details.html"><img src="images/car.jpg"></a>
                                        <div class="cbp-vm-details">
                                            <h5 class="project-name text-uppercase">PRIVATE <small>STANDARD <span class="text-muted">CAR</span></small></h5>
                                            <div class="row">
                                                <div class="col-sm-5">
                                            <p class="location1"><i class="fa fa-flag-o"></i> Door to door service</p>
                                            <p class="services"><i class="fa fa-clock-o"></i> Available 24/7 </p>
</div>
<div class="col-sm-7">

                                            <ul class="list-unstyled facilities">
                                    
                                        <li><i class="fa fa-circle"></i> Exclusive ride for you </li>
                                    
                                    
                                    
                                        <li><i class="fa fa-circle"></i>1 item of hand baggage allowed per person </li>
                                    
                                        <li> <i class="fa fa-circle"></i>1 piece of baggage allowed per person ( max.dimensions 158cm) length+width+height=158cm </li>
                        </ul>
                    </div>
                </div>
                                        </div>
                                        <div class="call-back">
                                            <h3 class="price1">MYR 60/</h3>
                                            <a class="cbp-vm-icon cbp-vm-add" href="#" data-toggle="modal" data-target="#pricemodal"> Select</a><br>
                                            <a href="#" data-toggle="modal" data-target="#mymodal">View More Details</a>
                                        </div>
                                    </li>-->  
										 
										</ul>
                                    
                               
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="col-sm-3 col-sm-pull-9 hide">
                        <div class="filter">
                            <h4>More Filter</h4>
                            <ul class="list-unstyled">
                                <li>
                                    <select type="search" class="form-control searchbox">
                                        <option>Select City</option>
                                    </select>
                                </li>
                                <li>
                                    <select type="search" class="form-control searchbox1">
                                        <option>Select Pattern</option>
                                    </select>
                                </li>
                                <li>
                                    <input type="date" class="form-control" name="">
                                </li>
                                <li>
                                    <select type="search" class="form-control searchbox1">
                                        <option>Adult</option>
                                    </select>
                                </li>
                                <li>
                                    <select type="search" class="form-control searchbox1">
                                        <option>Child</option>
                                    </select>
                                </li>
                                <li>
                                    <button class="btn btn-primary btn-block btn-search">Search</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                    <div class="modal fade" id="mymodal">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                    <h4 class="modal-title">General information</h4>
                                </div>
                                <div class="modal-body">
                                     <div class="dialog information">
   
    <ul class="custom-list">
            <li><strong>Exclusive ride for you</strong></li>
            <li><strong>Door to door service</strong></li>
            <li><strong>Available 24/7</strong></li>
            <li><strong>1 item of hand baggage allowed per person</strong></li>
            <li><strong>1 piece of baggage allowed per person ( max.dimensions 158cm) length+width+height=158cm</strong></li>
            <li>Remember to bring this voucher and valid photo ID with you</li>
            <li>If you change your accommodation during your holiday, you must inform us at least 48 hours before the departure of your flight so that we can update the details of your transfer.</li>
            <li>If you change your return flight during your holiday, you must inform us at least 48 hours before the departure of your flight so that we can update the details of your transfer.</li>
            <li>For domestic flights, you are advised to be at the airport 2 hours before the departure of the flight.</li>
            <li>For International flights, you are advised to be at the airport 3 hours before the departure of the flight.</li>
            <li>If you arrive at the destination with an excess of luggage, you will have to pay an additional charge for the extra undeclared weight. </li>
            <li>If you are travelling with children it is required to use a child safety seat. Please note that it´s the parent or guardian reponsability to bring one, in the case of not complying with this requirement the service may not be provided.</li>
            <li>Child car seats and boosters are not included unless specified in your booking and can carry an extra cost. Should you need to book them, please contact your point of sale prior to travelling.</li>
            <li>This vehicle is subject to change due to availability and may be substituted for a bigger model.</li>
    </ul>
</div>
<div class="dialog information">
        <h4><strong>Waiting time </strong></h4>
            <ul class="custom-list">
                    <li><strong>No waiting time for the customer </strong></li>
                <li><strong>Maximum supplier waiting time:</strong>
                60  minutes  (Domestic)
                90  minutes  (International)
                </li>
        </ul>
    </div>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->

                     <div class="modal fade" id="pricemodal">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
							<form type="search" method="POST" action="">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        <span class="sr-only">Close</span>
                                    </button>
									<input type="hidden" name="price" value="<?=$price?>"/>
									<input type="hidden" name="pax" value="<?=$pax?>"/>
									<input type="hidden" name="no" value="<?=$n?>"/>
									<input type="hidden" name="type" value="<?=$type?>"/>
                                    <h4 class="modal-title">&nbsp;</h4>
                                </div>
                                <div class="modal-body searches">
                                     <p>
                                         Please provide the following information. It is vital to confirm your transfer reservation If the details entered are incorrect, the provider will not be held responsible for correct service provision
                                     </p>
                                     <h4>Arrival Transfer</h4>
                                     <ul class="list-inline form-horizontal">
                            <li>
                                <label>Vessel Name :</label>
                                <div class="vessel">
                                   <input type="text" placeholder="FY0512E" class="form-control" name="ves_n"/>
                                </div>
                            </li> 
                            
                        
                            <li>
                                <label>Desired Pick-up Time:</label>
                                <div class="selects">
                                    <select type="search" name="dph" class="form-control searchbox1" required="">
                                       <option>hh</option>
									   <?php for($i=00;$i<= 23;$i++){?>
									   <option value="<?=$i?>"><?=$i?></option><? }?>
                                         </select>
                                </div>
                            </li>
                            <li>
                                <div class="selects">
                                    <select type="search" name="dpm" class="form-control searchbox1" required="">
                                        <option>mm</option>
										<?php for($i=00;$i<= 11;$i++){?>
									   <option value="<?=$i*5?>"><?=$i*5?></option><? }?>
                                       </select>
                                </div>
                            </li>
                            
                            
                        </ul>
                            
                       

                        </ul> 
                        <h4>Departure Transfer</h4>
                                     <ul class="list-inline form-horizontal">
                            <li>
                                <label>Vessel Name :</label>
                                <div class="vessel">
                                   <input type="text" class="form-control" placeholder="FY0512E" name="ves_name2">
                                </div>
                            </li> 
                            
                        
                            <li>
                                <label>Desired Pick-up Time:</label>
                                <div class="selects">
                                    <select type="search" name="dph1" class="form-control searchbox1" required="">
										<option>hh</option>
									   <?php for($i=00;$i<= 23;$i++){?>
									    <option value="<?=$i?>"><?=$i?></option><? }?>
                                         </select>
                                </div>
                            </li>
                            <li>
                                <div class="selects">
                                    <select type="search" name="dpm1" class="form-control searchbox1" required="">
                                        <option>mm</option>
										<?php for($i=00;$i<= 11;$i++){?>
									   <option value="<?=$i*5?>"><?=$i*5?></option><? }?>
                                       </select>
                                </div>
                            </li>
                                 <li>
                                <label>&nbsp;</label>
                                <button class="btn btn-primary btn-block btn-search" type="submit" name="search_cart">Continue</button>
								
                            </li>
                            
                        </ul>
                                </div></form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
               
       <?php include_once('include/footer.php');?>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/parallax.js"></script>
    <script src="js/cbpViewModeSwitch.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.js"></script>
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
<script>
$(document).ready(function(){
   $("#div_id").hide();
	$("#show").click(function(){
		$("#div_id").show();
    });
	$("#hide").click(function(){
		$("#div_id").hide();
    });
});
</script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
    </script>
    <script src="js/crawler.js"></script>
    <script type="text/javascript">
    marqueeInit({
        uniqueid: 'mycrawler2',
        style: {
            'padding': '9px 0 0',
            'width': '100%',
            'background': ' ',
            'border': 'none',
            'color': '#0284cf',
            'font-size': '13px',
        },
        inc: 5, //speed - pixel increment for each iteration of this marquee's movement
        mouse: 'cursor driven', //mouseover behavior ('pause' 'cursor driven' or false)
        moveatleast: 2,
        neutral: 200,
        persist: true,
        savedirection: true
    });
    </script>
    <script>
    $('#nav').affix({
        offset: {
            top: $('.search').height()
        }
    });
    </script>
    <script type="text/javascript">
    function toggleIcon(e) {
        $(e.target)
            .prev('.panel-heading')
            .find(".more-less")
            .toggleClass('glyphicon-plus glyphicon-minus');
    }
    $('.panel-group').on('hidden.bs.collapse', toggleIcon);
    $('.panel-group').on('shown.bs.collapse', toggleIcon);
    </script>
	<script>
$(window).load(function()
{
    $('#model456').modal('show');
});

</script>	
    <script>
        $( function() {
    var dateFormat = "yy/mm/dd",
      from = $( "#from-date" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: false,
          minDate:0,
          dateFormat: "yy/m/d",
          numberOfMonths: 1
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#to-date" ).datepicker({
        defaultDate: "+1w",
        changeMonth: false,
         minDate:0,
         dateFormat: "yy/m/d",
        numberOfMonths: 1
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });

    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }

      return date;
    }
  } );


    /*$('#date_from').datepicker({
        inline: true,
        firstDay: 1,
        showOtherMonths: true,
        // dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
        minDate: '0',
        maxDate: '30/11/2019',
        dateFormat: 'yy/mm/dd',
    });
    $('#date_to').datepicker({
        inline: true,
        firstDay: 1,
        showOtherMonths: true,
        // dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
        minDate: '0',
        maxDate: '30/11/2019',
        dateFormat: 'yy/mm/dd',
    });*/
    </script>
	<!--<script>
        function randomStringToInput(clicked_element)
    {
        var random_string = generateRandomString(10);
        var element = document.getElementsByName('emp')[0];
        element.value = random_string;
        //clicked_element.parentNode.removeChild(clicked_element);
    }
    function generateRandomString(string_length)
    {
        var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var string = '';
        for(var i = 0; i <= string_length; i++)
        {
            var rand = Math.round(Math.random() * (characters.length - 1));
            var character = characters.substr(rand, 1);
            string = string + character;
        }
        return string;
    }
    </script>-->
	<script type="text/javascript">
    function makeid()
    {
	var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    return Math.round(Math.random() * (characters.length - 1))
}
</script>
</body>

</html>