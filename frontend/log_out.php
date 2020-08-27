<?php   
session_start(); //to ensure you are using same session
//session_destroy(); //destroy the session
unset($_SESSION['cart']);
header("location:/transfer-list.php"); //to redirect back to "index.php" after logging out
exit();
?>