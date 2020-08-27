<?php include "include/header.php";

if($_REQUEST['action']=='add')
{
	
	
	//isset($_POST['btn1']) &&$_GET['sub']) or 
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
	 <script type="text/javascript">
   
    $(window).onClick('load',function(){
        $('#cartModal').modal('show');
    });

	</script>
	<?
	
}
if(isset($_POST['sub']))
{
	

	echo "</br>BTN _POST";
	echo "</br>pf".$pf=$_POST['pf']; 	echo "</br>tt".$tt=$_POST['ttype'];
	$pp=$_POST['pp'];	echo "</br>ss".$seat=$_POST['seat']; 
	$dt=$_POST['dt'];	$tdate=$_POST['cd'];		
	$dp=$_POST['dp'];	$cd=date("Y/m/d",strtotime($tdate));
	echo "</br>nov".$nofvehicle=$_POST['vno'];
	
	$user_arr=array('pf'=>$pf,'pp'=>$pp,'dt'=>$dt,'dp'=>$dp,'tt'=>$tt,'ss'=>$seat,'vno'=>$nofvehicle,'cd'=>$cd);
	$_SESSION['user']=$user_arr;
	//var_dump($_SESSION['user'])or die();
	
	/*$pf=$_SESSION['pf'];	$tt=$_SESSION['tt']; $pp=$_SESSION['pp'];$seat=$_SESSION['seat'];
	$dt=$_SESSION['dt'];$dp=$_SESSION['dpp'];$nofvehicle=$_SESSION['vno'];*/
}
if(isset($_POST['submit']))
{	
	unset($_SESSION['user']);
	echo "</br></br></br></br></br></br>";
	
	$id=$_POST['ide'];			 $nofvehicle=$_POST['vno']; $pf=$_POST['pf'];		 $pp=$_POST['pp'];		  $dt=$_POST['dt'];	
	$dp=$_POST['dp'];		  $tt=$_POST['ttype'];		   $seat=$_POST['seat']; $rnd=$_POST['rnd'][0];foreach($_POST['rnd'] as $val)
	{ //echo"</br>".$val."</br>";
	}
 $tdate1=$_POST['cd1']; $tdate2=$_POST['cd2'];	$cd1=date("Y/m/d",strtotime($tdate1));$cd2=date("Y/m/d",strtotime($tdate2));
	$user_arr=array('pf'=>$pf,'pp'=>$pp,'dt'=>$dt,'dp'=>$dp,'tt'=>$tt,'ss'=>$seat,'vno'=>$nofvehicle,'cd'=>$cd,'item_id'=>$id);
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
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#city").change(function(){
		var ssa = $(this).val();
		//var ss = $(this).attr('id');
		//var arr = data.split('/');
		
		//alert('type='+ssa);
		
		//alert("roomtype="+roomtype + "hotelid="+hotelid);
		$.ajax({
			type: 'post',
			url: 'find_ccode04.php',
			data: 
			{
				ttype: ssa,
				
			},
			success: function (response){
				 
				
				$('#vehicletype').html(response);
				
				
				//old_property_rents =property_rents;
				/* $('.fix').smint({'scrollSpeed' : 1000, 'mySelector': 'a.colonies_'+property_rents}); */
				
			}
		})
	})
//var ids= $('# room_type_1').val();
//alert('hlo----'+ ids);	

});
	
	
	</script>
<script>
function abc()
{
	alert('Please Login');
}
	</script>
        <div class="row banner banner1 text-center"><p>&nbsp;</p>
<h1 class="headings text-center text-white">Book Transfer</h1>  <form name="input1" action="transfer-list.php" method="POST">
            <!-- 
            <div class="input">
                <ul class="list-unstyled">
                    <li>
                        <select type="search" class="form-control searchbox">
                            <option>Select Pattern</option>
                        </select>
                    </li>
                    <li>
                        <select type="search" class="form-control searchbox1">
                            <option>Pickup From</option>
                        </select>
                    </li>
                    <li>
                        <select type="search" class="form-control searchbox1">
                            <option>Drop To</option>
                        </select>
                    </li>
                    <li>
                        <select type="search" class="form-control searchbox1">
                            <option>Transfer Type</option>
                        </select>
                    </li>
                    <li>
                        <input type="text" id="date_from" class="form-control" name="" placeholder="Service Date">
                    </li>
                    <li>
                        <button class="btn btn-primary btn-block btn-search">Search</button>
                    </li> $_SESSION['pf']
                </ul>
            </div> -->
        </div>				<?php		/* $id=$_POST['ide'];			  echo "vno=".$nofvehicle=$_POST['vno']; $pf=$_POST['pf'];		 $pp=$_POST['pp'];		  $dt=$_POST['dt'];		 $dp=$_POST['dp'];		  $tt=$_POST['ttype'];		   $seat=$_POST['seat'];		  $tdate=$_POST['cd'];				$cd=date("Y/m/d",strtotime($tdate));*/		?>
        <div class="row bg-grey gap1">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 ">
                        <div class="filter shuttle-widget">
                            <!--  <h4 class="text-center">Search Transfer</h4> -->
                            <div class="tops">
                                <div><span class="old-price">From <del><span style="font-size:smaller;">MYR</span> 20</del>
                                    </span>
                                </div>
                                <div class="new-price"><span style="font-size:smaller;">MYR</span> 10</div>
                                <div class="offer">Save MYR 10 Per Person. </div>
                            </div>
                            <ul class="list-unstyled">
                                <li>
                                    <!--<select type="search" name="pf" class="form-control searchbox">-->
									 <select name="pf"   class="form-control"   onchange="getCurrencyCode('find_ccode4444.php?q='+this.value,'locationf');" >
                                        <option >Pickup From</option>
										<?php //if($fetchstate['state_id']==$fetch1['state2']) echo 'selected="selected"';
										if(isset($_SESSION['user']))
										{ //$_SESSION['user'] = array();} else{
											$pf=$_SESSION['user']['pf'];$pp=$_SESSION['user']['pp'];$dt=$_SESSION['user']['dt'];
											$dp=$_SESSION['user']['dp'];$tt=$_SESSION['user']['tt'];$seat=$_SESSION['user']['ss'];
											$nofvehicle=$_SESSION['user']['vno'];
										}
										
										?>
										
										<option value="1" <?php if($pf=='1') echo 'selected="selected"'; ?>>Airport</option>
										<option value="2" <?php if($pf=='2') echo 'selected="selected"'; ?>>Coach station</option>
										<option value="3" <?php if($pf=='3') echo 'selected="selected"'; ?>>Railway Station</option>			   <option value="4" <?php if($pf=='4') echo 'selected="selected"'; ?>>Hotel</option>	
										<option value="5" <?php if($pf=='5') echo 'selected="selected"'; ?>>Venue</option>
										<option value="6" <?php if($pf=='6') echo 'selected="selected"'; ?>>Cruise</option>	
									   <option value="7" <?php if($pf=='7') echo 'selected="selected"'; ?>>Ferry</option>
                                    </select>
                                </li>
                                <li>
                                    <select type="search" name="pp" class="form-control searchbox" id="locationf">
                                       <option value="PA" <?php if($pp=='PA') echo 'selected="selected"'; ?>>Penang Airport</option>
										<option value="PC" <?php if($pp=='PC') echo 'selected="selected"'; ?>>Penang Coach Station</option>
										<option value="PR" <?php if($pp=='PR') echo 'selected="selected"'; ?>>Penang Railway Station</option>
										<option value="CT" <?php if($pp=='CT') echo 'selected="selected"'; ?>>Cruise Terminal</option>
										<option value="FT" <?php if($pp=='FT') echo 'selected="selected"'; ?>>Ferry Terminal</option>										
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

										{

										?><option value="<?=$pp;?>" <?php if($pp==$name1['id']) echo 'selected="selected"'; ?>><?=$name1['vname'];?></option>										<?php
										} }
										?>
										
										
										
                                    </select>
                                </li>
                                <li>
                                    <!--<select type="search" name="dt" class="form-control searchbox">-->
									<select name="dt"   class="form-control searchbox"   onchange="getCurrencyCode('find_ccode4444.php?q='+this.value,'location');" >
									   <option value="">Drop To</option>
									   <option value="1" <?php if($dt=='1') echo 'selected="selected"'; ?>>Airport</option>	
									   <option value="2" <?php if($dt=='2') echo 'selected="selected"'; ?>>Coach station</option>
									   <option value="3" <?php if($dt=='3') echo 'selected="selected"'; ?>>Railway Station</option>	
									   <option value="4" <?php if($dt=='4') echo 'selected="selected"'; ?>>Hotel</option>	
									   <option value="5" <?php if($dt=='5') echo 'selected="selected"'; ?>>Venue</option>
									   <option value="6" <?php if($dt=='6') echo 'selected="selected"'; ?>>Cruise</option>	
									   <option value="7" <?php if($dt=='7') echo 'selected="selected"'; ?>>Ferry</option>
                                    </select>
                                </li>
                                <li>
                                    <select type="search" name="dp" class="form-control searchbox1" id="location">
									
                                        <option value="">Drop Point</option>
									   <option value="1" <?php if($dp=='PA') echo 'selected="selected"'; ?>>Penang Airport</option>	
									   <option value="2" <?php if($dp=='PC') echo 'selected="selected"'; ?>>Penang Coach Station</option>
									   <option value="3" <?php if($dp=='PR') echo 'selected="selected"'; ?>>Penang Railway Station</option>	
									   <option value="6" <?php if($dp=='CT') echo 'selected="selected"'; ?>>Cruise Terminal</option>
										<option value="7" <?php if($dp=='FT') echo 'selected="selected"'; ?>>Ferry Terminal</option>
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
                                </li>
                                <li>
                                    <!--<select type="search" class="form-control searchbox1">-->
										<select name="ttype" required="" class="form-control" id="city" onchange="getCurrencyCode('find_ccode444.php?q='+this.value,'vehicleid');">  
										<option>Transfer Type</option>
										<!--<option value="SIC" <?php if (isset($tt) && $tt=="SIC") echo "selected";?>>Shared</option>-->
										<option value="PVT" <?php if (isset($tt) && $tt=="PVT") echo "selected";?>>Private</option>
										<!--<option value="HOURLY" <?php if (isset($tt) && $tt=="HOURLY") echo "selected";?>>Hourly</option>-->
										<!--<option value="SIC" <?php if($tt=='SIC') echo 'selected="selected"'; ?>>Shared</option>	
										<option value="PVT" <?php if($tt=='PVT') echo 'selected="selected"'; ?>>Private</option>
										<option value="HOURLY" <?php if($tt=='HOURLY') echo 'selected="selected"'; ?>>Hourly</option>-->
                                    </select>
                                </li>
								<li> <select name="seat" type="search" class="form-control searchbox1" id="vehicleid"> 
								<?php if($tt=='PVT'){?>
								  <option value="CAR" <?php if($seat=='CAR') echo 'selected="selected"'; ?>>CAR</option>
								  <!--<option value="MPV" <?php if($seat=='MPV') echo 'selected="selected"'; ?>>MPV</option>-->
								  <option value="VAN" <?php if($seat=='VAN') echo 'selected="selected"'; ?>>VAN</option>
								<?php /*} 
								if($tt=='SIC'){
									for($i=2;$i<=12;$i++)
									{
								?>
								<option value="<?=$i;?>" <?php if($seat==$i) echo 'selected="selected"'; ?>><?=$i;?></option>
								<?php } } 
								if($tt=='HOURLY'){
								?>
								<option value="2H" <?php if($seat=='2H') echo 'selected="selected"'; ?>>2 Hours</option>
								<option value="4H" <?php if($seat=='4H') echo 'selected="selected"'; ?>>4 Hours</option>
								<?php */} ?>
								</select> </li>		
								<li><select name="vno"  class="form-control" id="vehicletype">
											 <option value="0">No Of Vehicle</option>
											<?php for($i=1;$i<=5;$i++)
											{?>	
                                                    <option value="<?=$nofvehicle?>"<?php if($nofvehicle==$i) echo 'selected="selected"';?>><?=$i?></option>
											<?php } ?>
													<option value="<?=$nofvehicle?>"<?php echo 'selected="selected"'; ?>><?=$nofvehicle?></option>
								</select></li>								
                                 
                                <li>
								 
                             <input type="text" id="date_from" class="form-control" name="cd" value="<?php  echo $tdate; ?> " placeholder="Service Date">
                                </li>
                                <li>
                                    <input type="submit" name="sub"  class="btn btn-primary btn-block btn-search" value="Search"/>
                                </li>
                            </ul>
                        </div>
                    </div>
					</form>
					<?php 
					$sql=mysql_query("select * from transfer_tariff_master where pickup_from='$pf' and pickup_point='$pp' and drop_to='$dt' and drop_point='$dp'");			
					if(mysql_num_rows($sql)> 0)
					{
					while($fetch=mysql_fetch_array($sql))
					{
						
					
									//echo$pf."/".$pp."/".$dt."/".$dp;	
																					{
					?>
					<form name="input11" action="transfer-list.php?action=add&id=<?=$fetch['id'];?>&ttype=<?=$tt?>&seat=<?=$seat?>&vno=<?=$nofvehicle?>" method="POST">
                    <div class="col-sm-9">
                        <!-- <div class="text-center">
                            <h4 class="head">Book Transfers</h4>
                        </div> -->
                        <div class="panel-group"   >
                            <div class="panel panel-default">
                                 
                                <div   class="panel-collapse" >
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-condensed table-bordered table-hover">
                                                <tr><?php //foreach($_SESSION['user'] as $val)
														//{ echo $val."</br>";} ?>
                                                    <th>Pickup From</th>
                                                    <th>Drop To</th>
                                                    <th>Transfer Type</th>
                                                    <th>Pax/Seat</th>
                                                    <th>Price</th>
                                                    <th>Action</th>
                                                </tr>	
												<?php //if($fetchstate['state_id']==$fetch1['state2']) echo 'selected="selected"';
											if(isset($_SESSION['user']))
											{ //$_SESSION['user'] = array();} else{
											$pf=$_SESSION['user']['pf'];$pp=$_SESSION['user']['pp'];$dt=$_SESSION['user']['dt'];
											$dp=$_SESSION['user']['dp'];$tt=$_SESSION['user']['tt'];$seat=$_SESSION['user']['ss'];
											$nofvehicle=$_SESSION['user']['vno'];
											}
												?>
												<?php											 												  																										?>
                                                <tr>
                                                    <td>  <?php													if($fetch['pickup_from']==1)													{														$peneng_pf='Airport';													}													if($fetch['pickup_from']==2)													{														$peneng_pf='Coach Station';													}													if($fetch['pickup_from']==3)													{														$peneng_pf='Railway Station';													}													if($fetch['pickup_from']==4)													{														$peneng_pf='Hotel';													}													if($fetch['pickup_from']==5)													{														$peneng_pf='Venue';													}
													if($fetch['pickup_from']==6)				
														{	$peneng_pf='Cruise';	}
								if($fetch['pickup_from']==7)
								{$peneng_pf='Ferry'; }																																							if($fetch['pickup_point']=='PA')													{														$peneng_pp='Penang Airport';													}													if($fetch['pickup_point']=='PC')													{														$peneng_pp='Penang Coach Station';}
								if($fetch['pickup_point']=='PR')
								{	$peneng_pp='Penang Railway Station';	}
								if($fetch['pickup_point']=='CT')
								{	$peneng_pp='Cruse Terminal';	}
								if($fetch['pickup_point']=='FT')
								{	$peneng_pp='Ferry Terminal';	}
								if($fetch['pickup_from']==4)
								{//$peneng_pp='Hotel';				
							//$sql11=mysql_query("SELECT  id,hotelname FROM mala_hotelmaster where id='$fetch[drop_point]'");          
							$sql11=mysql_query("SELECT  * FROM apmg_location where id='$fetch[pickup_point]'");
							$name1 = mysql_fetch_array($sql11);         
							$peneng_pp=$name1['location_name']; 													}													if($fetch['pickup_from']==5)													{														//$peneng_pp='Venue';	
													$sql11=mysql_query("SELECT  id,vname FROM venue_master where id='$fetch[drop_point]'");                                                         $name1 = mysql_fetch_array($sql11);                                                           $peneng_pp=$name1['vname'];													}																																							echo $peneng_pf.'('.$peneng_pp.')';													?>                                                        </td>
                                                    <td>													 <?php													if($fetch['drop_to']==1)													{														$peneng_pf='Airport';														$peneng_pp='Penang Airport';													}													if($fetch['drop_to']==2)													{														$peneng_pf='Coach Station';														$peneng_pp='Penang Coach Station';													}													if($fetch['drop_to']==3)													{														$peneng_pf='Railway Station';														$peneng_pp='Penang Railway Station';
													}
													if($fetch['drop_to']==6)				
														{	$peneng_pf='Cruise';$peneng_pp='Cruise Terminal';	}
								if($fetch['drop_to']==7)
								{$peneng_pf='Ferry';$peneng_pp='Ferry Terminal'; }
													if($fetch['drop_to']==4)													{														$peneng_pf='Hotel';																							
											//$sql11=mysql_query("SELECT  id,hotelname FROM mala_hotelmaster where id='$fetch[drop_point]'");
											$sql11=mysql_query("SELECT  * FROM apmg_location where id='$fetch[drop_point]'");
													$name1 = mysql_fetch_array($sql11);   
													$peneng_pp=$name1['location_name']; 	
													}									
													if($fetch['drop_to']==5)			
														{			
														$peneng_pf='Venue';
														$sql11=mysql_query("SELECT  id,vname FROM venue_master where id='$fetch[drop_point]'");     
														$name1 = mysql_fetch_array($sql11);
														$peneng_pp=$name1['vname'];													}									
														echo $peneng_pf.'('.$peneng_pp.')';													?>
                                                    </td>
                                                    <td><?php echo $tt;  ?></td>
                                                    <td><?php echo $nofvehicle."&nbsp;". $seat;?></td>
                                                    <td>													
													<?php if($tt=='PVT') 
													{	if($seat=='CAR')
													{	$price=$fetch['pvt_car']*$nofvehicle;	}													
													/*if($seat=='MPV')													
														{
														$price=$fetch['pvt_mpv']*$nofvehicle;						
														}	*/													if($seat=='VAN')														{													$price=$fetch['pvt_van']*$nofvehicle;																													}																											}																										/*if($tt=='HOURLY')													{														if($seat=='2H')														{															  $price=$fetch['van_one_hour'];																													}														if($seat=='4H')														{															  $price=$fetch['van_two_hour'];																													}														 																											}																																							if($tt=='SIC')													{														 $price=$fetch['sic_rate'];																											}	*/												echo 'MYR '.$price;																										?>													 													</td>
													<?php 
													if($_SESSION['id']!=0)
													{
													?>
                                                    <td>
													<!--data-toggle="modal" data-target="#cartModal"<input type="hidden" name="ide" value="<?=$fetch['id']?>"/>
													<input type="hidden" name="price" value="<?=$price?>"/>
													<input type="hidden" name="typ" value="<?=$tt?>"/>
													<input type="hidden" name="she" value="<?=$seat?>"/>data-target="#cartModal" 
													<input type="hidden" name="vn" value="<?=$nofvehicle?>"/>-->
                                                       <a href="transfer-list.php?id=<?php echo $fetch['id']; ?>&prate=<?=$price?>&ttype=<?=$tt?>&seat=<?=$seat?>&vno=<?=$nofvehicle?>&action=add">
													   <button type="submit" id="myModal2" data-toggle="modal"  name="btn1" class="btn btn-success btn-xs">Add</button></a>
													
													
                                                    </td>
													<?php 
													}
													else 
													{ ?>
												<td>
                                                       <a href="login.php?"> <button Onclick="abc()" type="button" class="btn btn-success btn-xs">Add</button></a>
                                                    </td>
													<?php 
													}
													?>
                                                </tr>																								<?php												}																								?>
                                                
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                           						   						   						   						   
                        </div>
						
                        <!-- panel-group -->
                    </div>					</form>
					<?php 
					}						
					}
					else
					{
					?><center><h4 class="heading">Record Not Found </h4> </center>
					<? } ?>
                    <div class="modal fade" id="mymodal">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                    <h4 class="modal-title">Things to Remember</h4>
                                </div>
                                <div class="modal-body">
                                    <ul>
                                        <li>
                                            “Shared” refers to sharing vehicle with other guests.</li>
                                        <li>
                                            “Private” refers to the service by a private vehicle.</li>
                                        <li>
                                            If you are not finding your suitable timings in Shared transfers you may choose Private.</li>
                                        <li>
                                            Baggage Policy - 01 Bag per passenger. </li>
                                        <li>
                                            All our drivers are english spoken. </li>
                                        <li>
                                            Capacity of Vans - 9 pax with luggage / 12 with out luggage.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                </div>
            </div>
        </div>
        <div class="row builders">
            <div class="container">
                <div class="marquee" id="mycrawler2">
                    <ul class="list-inline">
                        <li>
                            <a href="#"><img src="images/c1.jpg"></a>
                        </li>
                        <li>
                            <a href="#"><img src="images/c2.jpg"></a>
                        </li>
                        <li>
                            <a href="#"><img src="images/c3.jpg"></a>
                        </li>
                        <li>
                            <a href="#"><img src="images/c4.jpg"></a>
                        </li>
                        <li>
                            <a href="#"><img src="images/c5.jpg"></a>
                        </li>
                        <li>
                            <a href="#"><img src="images/c6.jpg"></a>
                        </li>
                        <li>
                            <a href="#"><img src="images/c3.jpg"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    <?php include "include/footer.php"; ?>
        <!--  <div class="row social text-center ">
    <div class="container">
      <div class="col-md-7 text-right">
       
      </div>
      <div class="col-md-4 text-right small"><br>
        <br>
       </div>
    </div>
  </div> -->
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
	<!--<script type="text/javascript">
    $(window).on('load',function(){
        $('#cartModal').modal('show');
    });
</script>-->
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
    $('#date_from').datepicker({
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
    });
    </script>
</body>

</html>