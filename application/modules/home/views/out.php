<?php  
session_start();
unset($_SESSION['cart-item']); 
unset($_SESSION['cart-hotel']);
unset($_SESSION['my_cart']);  
unset($_SESSION['stt']); 
echo "<script>window.location='index.php'</script>"; 
?>