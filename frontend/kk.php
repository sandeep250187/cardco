<?php 
{echo  "pf=".$_SESSION['pf']=$_POST['pf']; echo  "</br>type=".$_SESSION['tt']=$_POST['ttype'];
	echo  "</br>pp=".$_SESSION['pp']=$_POST['pp'];	 	echo  "</br>seat=".$_SESSION['seat']=$_POST['seat']; 
	echo  "</br>dt=".$_SESSION['dt']=$_POST['dt'];	 	echo  "</br>cd=".$tdate=$_POST['cd'];		
	echo  "</br>dp=".$_SESSION['dpp']=$_POST['dp'];		$cd=date("Y/m/d",strtotime($tdate));
	echo "</br>vno=".$_SESSION['vno']=$_POST['vno'];
	$pf=$_SESSION['pf'];	$tt=$_SESSION['tt']; $pp=$_SESSION['pp'];$seat=$_SESSION['seat'];
	$dt=$_SESSION['dt'];$dp=$_SESSION['dpp'];$nofvehicle=$_SESSION['vno'];
}?>