<?php
session_start();
include_once('functions.php');
$auth_res = authanTicate();

if($auth_res['success']==1){
	 $token_type = $auth_res['data']['token_type'];
	 $access_token = $auth_res['data']['access_token'];
	 $_SESSION['access_token']=$token_type.' '.$access_token;
	 echo "<script>window.location='search.php';</script>";
}

?>