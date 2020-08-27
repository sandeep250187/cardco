 <?php
 include('includes/db-config.php');
 
$h_id=$_GET['hotel_id'];
$id=$_GET['id'];

if(isset($_REQUEST['a']) and $_REQUEST['a']=='del')
{
$id=$_GET['id'];
 mysql_query("delete from apmg_hotel_tariff_withoutshtl where id='$id'");
 ?>
 <script>
	alert("Record Deleted Successfully!!");
	window.location='apmg_hotel_wout_shuttle.php';
</script>
<?php
}

if(isset($_REQUEST['submit']))
{  

 
 /* $name = $_FILES["filename"]["name"];
$ext = end((explode(".", $name))); # extra () to prevent notice
$file_name_arr = explode(".",$_FILES["filename"]["name"]);
$image_new_name=".".$extension;	
$file_name ="".$file_name_arr[0].'.'.$file_name_arr[count($file_name_arr)-1];
   $file_namen=time().$file_name;
//chmod('Gallert',0777);
//if(condition for existing image)
move_uploaded_file($_FILES["filename"]["tmp_name"],realpath(getcwd()) .'/pic/'.$file_namen); 
	  */
	$hotel_id=$_POST['hotel_id'];
	$descrip=$_POST['discrip'];	
    $can_policy=$_POST['can_policy'];
    $pmnt_policy=$_POST['pmnt_policy'];	
	$twin_rate=$_POST['twin_rate'];	
    $ext_twin_rate=$_POST['exn_twinrate'];	
	$validity=$_POST['validity'];
	
	$single_rate1=$_POST['single_rate1'];
    $rc_single1=$_POST['rc_single1'];
	$roh_single1=$_POST['rh_single1'];
	$single_cutof1=$_POST['single_cutof1'];
	$single_rate2=$_POST['single_rate2'];
    $rc_single2=$_POST['rc_single2'];
	$roh_single2=$_POST['rh_single2'];
	$single_cutof2=$_POST['single_cutof2'];
	
	$double_rate1=$_POST['double_rate1'];
    $rc_double1=$_POST['rc_double1'];
	$roh_double1=$_POST['rh_double1'];
	$double_cutof1=$_POST['double_cutof1'];
	$double_rate2=$_POST['double_rate2'];
    $rc_double2=$_POST['rc_double2'];
	$roh_double2=$_POST['rh_double2'];
	$double_cutof2=$_POST['double_cutof2'];
	
	$triple_rate1=$_POST['triple_rate1'];
    $rc_triple1=$_POST['rc_triple1'];
	$roh_triple1=$_POST['rh_triple1'];
	$triple_cutof1=$_POST['triple_cutof1'];
	$triple_rate2=$_POST['triple_rate2'];
    $rc_triple2=$_POST['rc_triple2'];
	$roh_triple2=$_POST['rh_triple2'];
	$triple_cutof2=$_POST['triple_cutof2'];
	
	
$selectmax=mysql_query("SELECT MAX(id) FROM `apmg_hotel_tariff_withoutshtl`");

$fetchmax=mysql_fetch_array($selectmax);

$maxid=$fetchmax[0]+1;

 if(strlen($maxid)=='1')

{

$code='VCW0000'.$maxid;

}

if(strlen($maxid)=='2')

{

$code='VCW000'.$maxid;

}

if(strlen($maxid)=='3')

{

$code='VCW00'.$maxid;

}

if(strlen($maxid)=='4')

{

$code='VCW0'.$maxid;

}

if(strlen($maxid)=='5')

{

$code='VCW'.$maxid;

}




$sql2=mysql_query("insert into `apmg_hotel_tariff_withoutshtl` (`code`,`hotel_id`,`descrip`,`can_policy`,`pmnt_policy`,`single_rate_1`,`single_rate_cat1`,`single_roh_cat1`,`single_cutof1`,`single_rate_2`,`single_rate_cat2`,`single_roh_cat2`,`single_cutof2`,`double_rate_1`,`double_rate_cat1`,`double_roh_cat1`,`double_cutof1`,`double_rate_2`,`double_rate_cat2`,`double_roh_cat2`,`double_cutof2`,`triple_rate_1`,`triple_rate_cat1`,`triple_roh_cat1`,`triple_cutof1`,`triple_rate_2`,`triple_rate_cat2`,`triple_roh_cat2`,`triple_cutof2`,`validity`) 
values('$code','$hotel_id','$descrip','$can_policy','$pmnt_policy','$single_rate1','$rc_single1','$roh_single1','$single_cutof1','$single_rate2','$rc_single2','$roh_single2','$single_cutof2','$double_rate1','$rc_double1','$roh_double1','$double_cutof1','$double_rate2','$rc_double2','$roh_double2','$double_cutof2','$triple_rate1','$rc_triple1','$roh_triple1','$triple_cutof1','$triple_rate2','$rc_triple2','$roh_triple2','$triple_cutof2','$validity')")or die(mysql_error());



  //$pid = mysql_insert_id(); 
//echo $countt=count($_POST['room_type']);
  $dt=date("Y/m/d");
 // echo var_dump($_POST['room_cat']);
 
//echo $counttype=count($_POST['room_type']);
 /*for($i=0;$i<$counttype;$i++)
{
	$rt=$_POST['room_type'][$i];
	$rp=$_POST['room_price'][$i];
	$rc=$_POST['room_cat'][$i];
	$roh=$_POST['room_roh'][$i];
	$rcut=$_POST['room_cutof'][$i];
	
	 $sql_insert=mysql_query("insert into `apmg_hotel_tariff_withoutshtl_rooming` (`pid`,`room_type`,`room_price`,`room_cat`,`room_hold`,`room_cutof`,`created_date`) values('$pid','$rt','$rp','$rc','$roh','$rcut','$dt')")or die(mysql_error());
	
}
 
 */


    echo "<script>";
	echo "alert('Hotel Added Successfully')";
	echo "</script>";
	echo "<script>window.location='apmg_hotel_wout_shuttle.php'</script>";
	
}
 ?>
 
 

 <!DOCTYPE HTML>
<html>
<head>
<title>Hotel Only</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!----webfonts--->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<!---//webfonts--->  
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <script>
   
   
   
   
   
   
   
   
   
   
   /*
   $(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $("#input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).add('<tr><td><select name="room_type[]"><option value="">-Room Type-</option><option  value="1">Single</option><option  value="2">Double</option><option  value="3">Triple</option><option  value="4">Family</option></select></td><td><input type="text" name="room_price[]"/></td><td><select name="room_cat[]"><option value="">-Room Category-</option><?php
	   $sql11=mysql_query("SELECT  id,roomtype FROM mala_roomcat_master order by roomtype");
	while($name1 = mysql_fetch_array($sql11))

    {?><option value="<?php echo $name1['id'];?>"><?php echo $name1['roomtype'];?></option> <?PHP } ?></select></td><td><input type="text" name="room_roh[]"/></td><td><input type="text" name="room_cutof[]" class="datepicker"/></td><td><a href="#" class="remove_field">Remove</a></td></tr>'); //add input box
        }
		
			$('.datepicker').each(function(){
    $(this).datepicker({
                dateFormat: 'yy/mm/dd' ,
				minDate:0
				
            });
});
    });
	
	 
	
	
	
	
	
	
	
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).closest('tr').remove(); x--;
    })
	


});

*/




	 $(document).ready(function() {
      
				$("#transfer").click(function() {//// botton is a name of button on click we want to add the rows.....
          var n   = $('#addbox tbody>tr').length - 2;
					var row = $('#addbox tbody>tr:last').clone(true);
          //row.find("input:text").val("");shows blank values in cloned field
          //row.find("input:text").val();//shows prev values in cloned field
					row.find('input:text, select').each(function(){
						this.name = this.name.replace(/\[(\d+)\]$/, '[' + n + ']');
          })
					//alert ('true');
          row.insertAfter('#addbox tbody>tr:last');
          return false;
        });
		////////////remove
		$('#removetransport').click(function(){
     $('#addbox tr:last').remove();
})
      });	
	  


 
   
   
   
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
				 
						//sel.options.add(new Option("Please Select Tour",""));
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
						sel.options.add(new Option('Please Select',''));
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
	 
 

////////////////
</script>
 
    <script>
	function getCurrencyCode2(strURL,el1)
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
						
			        	temp=req.responseText;
			            if(temp==123)
					{
					alert("This ITEM Already Exist");
					document.getElementById('itemname').value='';
					}
					else
					{
					return true;
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
  $( function() {
    $( "#datepicker" ).datepicker({
                dateFormat: 'yy/mm/dd' ,
				minDate:0
				
            });

  } );
  </script>
   <script>
  $( function() {
    $( ".datepicker1" ).datepicker({
                dateFormat: 'yy/mm/dd' ,
				minDate:0
				
            });

  } );
  </script>
   <script>
  $( function() {
    $( "#datepicker2" ).datepicker({
                dateFormat: 'yy/mm/dd' ,
				minDate:0
				
            });

  } );
  </script>
   <script>
  $( function() {
    $( "#datepicker3" ).datepicker({
                dateFormat: 'yy/mm/dd' ,
				minDate:0
				
            });

  } );
  </script>
   <script>
  $( function() {
    $( "#datepicker4" ).datepicker({
                dateFormat: 'yy/mm/dd' ,
				minDate:0
				
            });

  } );
  </script>
   <script>
  $( function() {
    $( "#datepicker5" ).datepicker({
                dateFormat: 'yy/mm/dd' ,
				minDate:0
				
            });

  } );
  </script>
   <script>
  $( function() {
    $( "#datepicker6" ).datepicker({
                dateFormat: 'yy/mm/dd' ,
				minDate:0
				
            });

  } );
  </script>
  <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
 <script type="text/javascript" src="ckeditor/sample.js"></script>
 
</head>
<body>
<div id="wrapper">
     <!-- Navigation -->
        <nav class="top1 navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
           <?php
include('includes/logout-menu.php');
 
include('includes/sidemenu.php');
  ?>
        </nav>
        <div id="page-wrapper">
        <div class="col-md-12 graphs">
	   <div class="xs">
  	 <h3>Hotel Only(APMG)</h3>
 
   
	 
	<div class="bs-example4" data-example-id="simple-responsive-table">
    
    <div class="table-responsive">
	<?php 
	if($id==0)
	{
	?>
      <table class="table table-bordered">
	  <form name="frm" method="post" action="" > 
	  <thead>
	    <tr>
	  <th >Select Hotel </th><td><select name="hotel_id" style="width:140px;" required >
	                    <option value="">-Select Hotel-</option>
						<?php
	   $sql11=mysql_query("SELECT  id,hotelname FROM mala_hotelmaster where state='6' order by hotelname");
	while($name1 = mysql_fetch_array($sql11))

    {
?>
 <option value="<?php echo $name1['id'];?>"><?php echo $name1['hotelname'];?></option>
<?PHP
   }
	  ?>
	  </select></td>
	  </tr>
	 
	 	<tr><th>Package Description </th><td><textarea name="discrip" class="ckeditor form-control" id="ckeditor" cols="50" rows="5"></textarea></td></tr>
		
		<tr><th>Cancellation Policy </th><td><textarea name="can_policy" class="ckeditor form-control" id="ckeditor" cols="50" rows="5"></textarea></td></tr>
		
		<tr><th>Payment Policy</th><td><textarea name="pmnt_policy" class="ckeditor form-control" id="ckeditor" cols="50" rows="5"></textarea></td></tr>
		
	

	 
		
	 
 
		
		
		
		
		
		
		
		
		
		
		
	 
		
		<!--<tr><th>Extra Rate(Night)</th><td colspan="2">&nbsp;Twin Rate <input style="width:80px;" type="text" name="twin_rate"  >
		
		</td></tr>-->
		<tr><th>Valid Up To</th><td colspan="2"><input type="text" name="validity" placeholder="Select Date"  id="datepicker"></td></tr>
		<tr><td colspan="3" align="center"><input type="submit" name="submit" value="Submit"></td></tr>
		</thead>
		</form>
		</table>
		
		<div class="table-responsive">
      <table class="table table-bordered">
	  <tr>
            <th>SNo.</th>
			
			 <th align="center">Hotel Name</th>
		     <th align="center">Hotel Code</th>
			 <!--<th align="center">Discription</th>-->
			
			 <th align="center">Single Rate</th>
			 <th align="center">Double Rate</th>
			 <th align="center">Triple Rate</th>
			 <!--<th align="center">Triple Rate</th>-->
			 <th align="center">Validity</th>
			 <th align="center">Action</th>
         </tr>
	  <?php 
	  $sql=mysql_query("select * from apmg_hotel_tariff_withoutshtl ");
	  $n=mysql_num_rows($sql);
	  if($n <= 0)
	  { ?><tr><td colspan="7" style="color:red;">No Record Found</tr><?}
	  else
	  {	$sno=1;
		while($fet=mysql_fetch_array($sql))
		{ 
		?>
		<tr><?php
		$ssql1=mysql_query("SELECT * FROM mala_hotelmaster where id='$fet[hotel_id]'");
	 
		$result=mysql_fetch_array($ssql1);
		 ?><td><?=$sno;?></td><td><?=$result['hotelname'];
		  echo "("; if($result['starcat']=='5'){?>&#9734;&#9734;&#9734;&#9734;&#9734;<?php }
                         if($result['starcat']=='4'){?>&#9734;&#9734;&#9734;&#9734;<?php }
						 if($result['starcat']=='3'){?>&#9734;&#9734;&#9734;<?php }
						 if($result['starcat']=='2'){?>&#9734;&#9734;<?php }
						 if($result['starcat']=='1'){?>&#9734;<?php }
			   echo ")";
		 ?></td><td><?=$fet['code'];?></td> 
		        <td>
				<?php 
				$selsincat1=mysql_query("SELECT  id,roomtype FROM mala_roomcat_master where id='$fet[single_rate_cat1]'");
	            $fetsincat1 = mysql_fetch_array($selsincat1);
				$sc1=$fetsincat1['roomtype'];
				$selsincat2=mysql_query("SELECT  id,roomtype FROM mala_roomcat_master where id='$fet[single_rate_cat2]'");
	            $fetsincat2 = mysql_fetch_array($selsincat2);
				$sc2=$fetsincat2['roomtype'];
				$seldblcat1=mysql_query("SELECT  id,roomtype FROM mala_roomcat_master where id='$fet[double_rate_cat1]'");
	            $fetdblcat1 = mysql_fetch_array($seldblcat1);
				$dc1=$fetdblcat1['roomtype'];
				$seldblcat2=mysql_query("SELECT  id,roomtype FROM mala_roomcat_master where id='$fet[double_rate_cat1]'");
	            $fetdblcat2 = mysql_fetch_array($seldblcat2);
				$dc2=$fetdblcat2['roomtype'];
				$seltplcat1=mysql_query("SELECT  id,roomtype FROM mala_roomcat_master where id='$fet[triple_rate_cat1]'");
	            $fettplcat1 = mysql_fetch_array($seltplcat1);
				$tc1=$fettplcat1['roomtype'];
				$seltplcat2=mysql_query("SELECT  id,roomtype FROM mala_roomcat_master where id='$fet[triple_rate_cat2]'");
	            $fettplcat2 = mysql_fetch_array($seltplcat2);
				$tc2=$fettplcat2['roomtype'];
				
		?>
				<?='PRPN Cat1='.$fet['single_rate_1'].'<br>'.'Cat1='.$sc1.'<br>'.'RH1='.$fet['single_roh_cat1'].'<br>'.'CutOf 1='.$fet['single_cutof1'].'<br>'.'PRPN Cat2='.$fet['single_rate_2'].'<br>'.'Cat2='.$sc2.'<br>'.'RH2='.$fet['single_roh_cat2'].'<br>'.'CutOf 2='.$fet['single_cutof2'];?></td>
				<td><?='PRPN Cat1='.$fet['double_rate_1'].'<br>'.'Cat1='.$dc1.'<br>'.'RH1='.$fet['double_roh_cat1'].'<br>'.'CutOf 1='.$fet['double_cutof2'].'<br>'.'PRPN Cat2='.$fet['double_rate_2'].'<br>'.'Cat2='.$dc2.'<br>'.'RH2='.$fet['double_roh_cat2'].'<br>'.'CutOf 2='.$fet['double_cutof2'];?></td>
				<td><?='PRPN Cat1='.$fet['triple_rate_1'].'<br>'.'Cat1='.$tc1.'<br>'.'RH1='.$fet['triple_roh_cat1'].'<br>'.'CutOf 1='.$fet['triple_cutof1'].'<br>'.'PRPN Cat2='.$fet['triple_rate_2'].'<br>'.'Cat2='.$tc2.'<br>'.'RH2='.$fet['triple_roh_cat2'].'<br>'.'CutOf 2='.$fet['triple_cutof2'];?></td>
				<td><?=$fet['validity'];?></td>  
				<td>
			  
		   <a href="edit_hotelonly_apmg.php?id=<?=$fet['id'];?>&&hotel_id=<?php echo $fet['hotel_id'];?>" target="_blank" style="color:blue;"><img src="images/edit.png" style="height:20px;cursor:pointer;"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		   <img src="images/delete.png" style="height:20px;cursor:pointer;" onClick="if(confirm('Are You Sure U want to Delete...')){javascript:window.location='apmg_hotel_wout_shuttle.php?a=del&id=<?php echo $fet['id'];?>&hotel_id=<?php echo $fet['hotel_id'];?>';}" />
		   </td>
	 </tr>
	<? $sno++; } 
  }
	  ?>
	  </table></div>
		<?php
	}
		if($id!=0)
		{
			
			$query=mysql_query("select * from vcon_hotel_tariff_withoutshtl where id='$id'");
			$fetch=mysql_fetch_array($query);
			$num=mysql_num_rows($query);
			?>
			<table class="table table-bordered">
	  <form method="POST" action="" enctype="multipart/form-data"> 
	  <thead>
	    <tr>
	  <th>Select Hotel </th><td><select name="hotel_id" style="width:150px;" >
	                    <!--<option value="">-Select Hotel-</option>where id='$fetch[hotel_id]'-->
						<?php
	   $qu=mysql_query("SELECT  id,hotelname FROM mala_hotelmaster ");
	while($n1 = mysql_fetch_array($qu))

    {

?>	  
<option value="<?php echo $n1['id'];?>"<?php echo($fetch['hotel_id']==$n1['id'])? "selected=selected":'';?>><?php echo $n1['hotelname'];?></option>
<!-- <option value="<?=$fetch['hotel_id']=='$n1[id]'? "selected=selected":'';?>"><?php echo $n1['hotelname'];?></option>-->
<?PHP
   }
	  ?>
	  </select></td>
	  </tr>
	
	  
	  
	 	<tr><th>Description</th><td><textarea name="discrip" class="ckeditor form-control" id="ckeditor" cols="50" rows="5"><?=$fetch['descrip'];?></textarea></td></tr>
		<tr><th>Hotel Rate </th><td>&nbsp;Twin Rate <input style="width:80px;" type="text" name="twin_rate" value="<?=$fetch['twin_rate'];?>"  >
		
		</td></tr>
		<tr><th>Valid Up To</th><td><input type="text" name="validity" placeholder="Select Date"  id="datepicker" value="<?=$fetch['validity'];?>"></td></tr>
		<tr><td colspan="2" align="center"><input type="submit" name="update" value="Update"></td></tr>
		</thead>
		</form>
		</table>
			
		<?php } ?>
		
	  
    </div><!-- /.table-responsive -->
  </div>
  </div>
  
             <?php
include('includes/footer.php');
  ?>
  
   </div>
      </div>
      <!-- /#page-wrapper -->
   </div>
    <!-- /#wrapper -->
<!-- Nav CSS -->
<script src="js/bootstrap.min.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
