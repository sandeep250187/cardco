<?php
	function get_product_name($pid){
		$result=mysql_query("select name from products where serial=$pid") or die("select name from products where serial=$pid"."<br/><br/>".mysql_error());
		$row=mysql_fetch_array($result);
		return $row['name'];
	}
	function get_product_size($size){
		$result=mysql_query("select products from size where id='$size'") or die("select products from products where id=$size"."<br/><br/>".mysql_error());
		$row=mysql_fetch_array($result);
		return $row['products'];
	}
	
	function get_product_code($pid){
		$result=mysql_query("select p_code from products where serial=$pid") or die("select p_code from products where serial=$pid"."<br/><br/>".mysql_error());
		$row=mysql_fetch_array($result);
		return $row['p_code'];
	}
	
	
	
	
	function get_price($pid){
		$result1=mysql_query("select price from products where serial='$pid'") or die("select name from products where serial=$pid"."<br/><br/>".mysql_error());
		$row=mysql_fetch_array($result1);
		return $row['price'];
	}
	
	
	function remove_product($pid){
		$pid=intval($pid);
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			if($pid==$_SESSION['cart'][$i]['productid']){
				unset($_SESSION['cart'][$i]);
				break;
			}
		}
		$_SESSION['cart']=array_values($_SESSION['cart']);
	}
	function get_order_total(){
		$max=count($_SESSION['cart']);
		$sum=0;
		$q1=0;
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['productid'];
		
			$q=$_SESSION['cart'][$i]['qty'];	
			 
			$price=get_price($pid);
		    $sum+=$price*$q;
		}
		return $sum;
	}
	function addtocart($pid,$qty){
		if($pid>1 or $qty>=1) return;
		
		if(is_array($_SESSION['cart'])){
			if(product_exists($pid)) return;
			$max=count($_SESSION['cart']);
			$_SESSION['cart'][$max]['productid']=$pid;
			$_SESSION['cart'][$max]['qty']=$qty;
		 // $_SESSION['cart'][$max]['size']=$size;
		  
		}
		else{
			$_SESSION['cart']=array();
			$_SESSION['cart'][0]['productid']=$pid;
			$_SESSION['cart'][0]['qty']=$qty;
			//$_SESSION['cart'][0]['size']=$size;

		}
	}
	function product_exists($pid){
		$pid=intval($pid);
		$max=count($_SESSION['cart']);
		$flag=0;
		for($i=0;$i<$max;$i++){
			if($pid==$_SESSION['cart'][$i]['productid']){
				$flag=1;
				break;
			}
		}
		return $flag;
	}

	
	
	
function get_quantity(){
		$max=count($_SESSION['cart']);
		 
		$q1=0;
		for($i=0;$i<$max;$i++){
			 
			$q=$_SESSION['cart'][$i]['qty'];
			
			$q1+=$q;
		 
		}
		return $q1;
	}
	
	
	function get_shipping_charge($q){
		$result=mysql_query("select cost from freight where qty=$q") or die("select cost from freight where qty=$pid"."<br/><br/>".mysql_error());
		$row=mysql_fetch_array($result);
		return $row['cost'];
	}
	
	
?>