<?php
include_once('../costing/includes/data.php');
$con = $_SESSION['country'];
include_once('functions.php');


if(!isset($_SESSION['access_token']) && $_SESSION['access_token']!=''){
	  echo "<script>window.location='index.php';</script>";
} 
 $inc_country = array('1','2','4','6','15','88');
 $auth_country = getCountrylist($inc_country);
?>
<?php include_once('../costing/includes/head-common.php'); ?>

<style type="text/css">
#loadingmessage{
	position: fixed;
	left:0px;
	top:0px;
	width:100%;
	height:100%;
	z-index:500;
	//background:url('https://apollob2b.net/costing/loading.gif');
}
</style>
<body>
	<?php 
	include_once('../costing/includes/include-body.php');
	?>
	
	<form class="form-horizontal" name="search" method="post" action="">
	     <div class="form-group text-center main-button">
		 <h4>Select Destination: </h4>
		 <?php
						if(!empty($auth_country )){
							foreach($auth_country as $key=>$val){
								?>
					<input onClick="{javascript:window.location='search.php?loc=<?php echo $key; ?>'}" type="button" class="btn btn-primary <?php if(isset($_GET['loc']) && $_GET['loc']==$key){ echo "active";} ?>" value="<?php echo $val; ?>"/>
								<?php
							}
						}
						?>
		</div>
		<hr>
		<?php
		if(isset($_GET['loc']) && $_GET['loc']!=''){
			 $location = $_GET['loc'];
			 $auth_cities = getallCitylist($location);
		?>
		<hr>
		<div class="form-group text-center">
			<ul class="list-inline">
				<li>
				 <input type="hidden" name="country" value="<?php echo $location; ?>">
					<select  class="form-control input-sm" name="city" required>
						<option value="">-City-</option>
						<?php
						if(!empty($auth_cities )){
							foreach($auth_cities as $key=>$val){
								if(isset($_POST['city']) && $_POST['city']==$key){
									$sel="selected='true';";
								}
								else { $sel='';}
								echo "<option value='".$key."' $sel>".$val."</option>";
							}
						}
						?>
					</select>
				</li>
				<li>
				</li>
				<li>
					<input type="submit" name="search" value="Search" class="btn btn-success btn-sm submit-button"/>
				</li>
			</ul>
		</div>
		<?php } ?>
	</form>
	<div class="table-responsive">
		<table class="table table-bordered table-hover table-condensed">
		<?php
		if(isset($_POST['search'])){
			?>
			<tr>
				<th width="5%">S. No</th>
				<th width="10%">Service</th>
				<th width="10%">Image</th>
				<th width="20%">Description</th>
				<th width="30%">Hours Of Operation</th>
				<th width="25%">Type</th>
			</tr>
			<?php
			 $country = $_POST['country'];
			 $city = $_POST['city'];
			 $attractions = getallAttractionslist($country,$city);
			 if(!empty($attractions)){
				 $num=1;
				 foreach($attractions as $att){	
				 $att_detail = getPricedetails($att['id']);
				 ?>
					  <tr>
					  <td><?php echo $num; ?>.</td>
					  <td><?php echo $att['title']; ?></td>
					  <td><image src="https://uat-api.globaltix.com/api/image?name=<?php echo $att['imagePath']; ?>_thumb" /></td>
					  <td><div style="height:36px;overflow:hidden; width: 300px;"><?php echo $att['description']; ?></div></td>
					  <td><div style="height:36px;overflow:hidden; width: 300px;"><?php echo $att['hoursOfOperation']; ?></div></td>
					  <td>
					  <select class="form-control input-sm">
					  <?php
					   if(!empty($att_detail)){
						   foreach($att_detail as $tcs){
							   echo "<option value='$tcs[id]'>$tcs[name]($tcs[variation])@$tcs[price] $tcs[currency]</option>";
						   }
					   }
					  ?></select></td>
					  </tr>
					 <?php 
					 $num++;
				 }
			 }
			 else {
				 echo '<tr><td colspan="6" cellpadding="0">No result found.</td></tr>';
			 }
		}
		?>
		
	</table>
</div>
	
<?php include_once('../costing/includes/include-footer.php'); ?>