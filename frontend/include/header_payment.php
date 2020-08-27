 
<!DOCTYPE html>
<html lang="en">


<head>
	
	<meta charset="utf-8">
	<title>Ethnic Designer </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	
	<link rel="shortcut icon" href="images/favicon.ico">
    
	<!-- CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="css/flexslider.css" rel="stylesheet" type="text/css" />
	<link href="css/fancySelect.css" rel="stylesheet" media="screen, projection" />
	<link href="css/animate.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" />
    
	<!-- FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href="fonts/font-awesome.css" rel="stylesheet">
	 <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>
</head>
  <body onLoad="submitPayuForm()">

<!-- PRELOADER -->
<div id="preloader"><img src="images/preloader.gif" alt="" /></div>
<!-- //PRELOADER -->
<div class="preloader_hide">

	<!-- PAGE -->
	<div id="page">
	
		<!-- HEADER -->
		<header>
			
			<!-- TOP INFO -->
			<!--<div class="top_info">
				
				
				<div class="container clearfix">
					<ul class="secondary_menu">
						<li><a href="my-account.html" >my account</a></li>
						<li><a href="my-account.html" >Register</a></li>
					</ul>
					
					<div class="live_chat"><a href="javascript:void(0);" ><i class="fa fa-comment-o"></i> Live chat</a></div>
					
					<div class="phone_top">have a question? <a href="tel:1 800 888 2828" >1 800 888 2828</a></div>
				</div>
			</div>-->
			
			
			<!-- MENU BLOCK -->
			<div class="menu_block">
			
				<!-- CONTAINER -->
				<div class="container clearfix">
					
					<!-- LOGO -->
					<div class="logo">
						<a href="index.php" ><img src="images/logo.png" alt="" /></a>
					</div><!-- //LOGO -->
					
					
					<!-- SEARCH FORM -->
					<div class="top_search_form">
						<a class="top_search_btn" href="javascript:void(0);" ><i class="fa fa-search"></i></a>
						<form method="get" action="#">
							<input type="text" name="search" value="Search" onFocus="if (this.value == 'Search') this.value = '';" onBlur="if (this.value == '') this.value = 'Search';" />
						</form>
					</div><!-- SEARCH FORM -->
					
					<?php   $max1=count($_SESSION['cart']);  ?>
					<!-- SHOPPING BAG -->
					<div class="shopping_bag">
						<a class="shopping_bag_btn" href="my_cart.php" ><i class="fa fa-shopping-cart"></i><p>Cart</p><span><?php echo $max1; ?></span></a>
						<!--<div class="cart">
							<ul class="cart-items">
								<li class="clearfix">
									<img class="cart_item_product" src="images/tovar/women/1.jpg" alt="" />
									<a href="product-page.html" class="cart_item_title">popover sweatshirt in floral jacquard</a>
									<span class="cart_item_price">1 × $98.00</span>
								</li>
								<li class="clearfix">
									<img class="cart_item_product" src="images/tovar/women/3.jpg" alt="" />
									<a href="product-page.html" class="cart_item_title">japanese indigo denim jacket</a>
									<span class="cart_item_price">2 × $158.00</span>
								</li>
							</ul>
							<div class="cart_total">
								<div class="clearfix"><span class="cart_subtotal">bag subtotal: <b>$414</b></span></div>
								<a class="btn active" href="checkout.html">Checkout</a>
							</div>
						</div>-->
					</div><!-- //SHOPPING BAG -->
					
					
					<!-- LOVE LIST -->
					<!--<div class="love_list">
						<a class="love_list_btn" href="javascript:void(0);" ><i class="fa fa-heart-o"></i><p>Love list</p><span>0</span></a>
						<div class="cart">
							<ul class="cart-items">
								<li>Cart is empty</li>
							</ul>
							<div class="cart_total">
								<div class="clearfix"><span class="cart_subtotal">bag subtotal: <b>$0</b></span></div>
								<a class="btn active" href="checkout.html">Checkout</a>
							</div>
						</div>
					</div>--><!-- //LOVE LIST -->
					
					
					<!-- MENU -->
					<ul class="navmenu center">
						<li class="sub-menu first active"><a href="index.php" >Home</a>
							<!-- MEGA MENU -->
							<!--<ul class="mega_menu megamenu_col1 clearfix">
								<li class="col">
									<ol>
										<li class="active"><a href="index-2.html" >Home slider</a></li>
										<li><a href="index2.html" >Home men promo</a></li>
										<li><a href="index3.html" >Home kids</a></li>
										<li><a href="index4.html" >Home video</a></li>
										<li><a href="sale.html" >Home Sale<span>sale</span></a></li>
										<li><a href="shoes.html" >Home shoes</a></li>
									</ol>
								</li>
							</ul>--><!-- //MEGA MENU -->
						</li>
						<!--<li class="sub-menu"><a href="shop.html" >Shop</a>
							
							<ul class="mega_menu megamenu_col1 clearfix">
								<li class="col">
									<ol>
										<li><a href="women.html" >sweaters</a></li>
										<li><a href="women.html" >shirts & tops<span>hot</span></a></li>
										<li><a href="women.html" >knits & tees</a></li>
										<li><a href="women.html" >pants</a></li>
										<li><a href="women.html" >denim</a></li>
										<li><a href="women.html" >dresses</a></li>
										<li><a href="women.html" >maternity</a></li>
									</ol>
								</li>
							</ul>
						</li>-->
						<li class="sub-menu"><a href="about-us.php" >About us</a>
							<!-- MEGA MENU -->
							<!--<ul class="mega_menu megamenu_col2 clearfix">
								<li class="col">
									<ol>
										<li><a href="men.html" >sweaters</a></li>
										<li><a href="men.html" >shirts & tops</a></li>
										<li><a href="men.html" >knits & tees</a></li>
										<li><a href="men.html" >pants</a></li>
										<li><a href="men.html" >denim</a></li>
										<li><a href="men.html" >dresses</a></li>
										<li><a href="men.html" >maternity</a></li>
									</ol>
								</li>
								<li class="col">
									<ol>
										<li><a href="men.html" >skirts</a></li>
										<li><a href="men.html" >shorts</a></li>
										<li><a href="men.html" >blazers</a></li>
										<li><a href="men.html" >outerwear</a></li>
										<li><a href="men.html" >suiting</a></li>
										<li><a href="men.html" >swim</a></li>
										<li><a href="men.html" >sleepwear</a></li>
									</ol>
								</li>
							</ul>--><!-- //MEGA MENU -->
						</li>
						<!--<li><a href="shoes.html" >shoes</a></li>-->
						<li class="sub-menu"><a href="#" >Shop</a>
							<!-- MEGA MENU -->
							<ul class="mega_menu megamenu_col3 clearfix">
								<li class="col">
									<ol>
									<?php
									$sql=mysql_query("select * from category order by name");
									while($row=mysql_fetch_array($sql))
									{
									?>
										 
										<li><a href="products.php?id=<?php echo $row['id']; ?>&cn=<?php echo $row['name']; ?>" ><?php echo $row['name']; ?></a></li>
										 <?php
										 
									} 
										 ?>
										
									</ol>
								</li>
								 
								<!--<li class="col">
									<ol>
										<li><a href="404.html" >404 Page</a></li>
										<li><a href="articles.html" >Articles</a></li>
										<li><a href="article-single.html" >Article Single</a></li>
										<li><a href="checkout.html" >Checkout</a></li>
										<li><a href="faq.html" >FAQ</a></li>
									</ol>
								</li>-->
							</ul><!-- //MEGA MENU -->
						</li>
                        <li class="sub-menu"><a href="refund-exchange.php" >Refund & Exchange</a>
						<li class="sub-menu"><a href="contacts.php" >Contact us</a>
							<!-- MEGA MENU -->
							<!--<ul class="mega_menu megamenu_col1 clearfix">
								<li class="col">
									<ol>
										<li><a href="blog.html" >Blog</a></li>
										<li><a href="blog-post.html" >Blog Post</a></li>
									</ol>
								</li>
							</ul>--><!-- //MEGA MENU -->
						</li>
					 
						
						 <?php 
						 
						 
						 if(empty($_SESSION['id'])) { ?>
	<li class="last sale_menu"><a href="login.php" ><?php echo $_SESSION['name'];  ?>Signup</a></li>
	<li class="last sale_menu"><a href="login.php" >Login</a></li>
	 
	 <?php
	  }
	if(!empty($_SESSION['id'])) {
	 ?>
		<li class="sub-menu"><a href="my-account.php" >My Account</a>
							<!-- MEGA MENU -->
							<ul class="mega_menu megamenu_col3 clearfix">
								<li class="col">
									<ol>
										 
										<li><a href="my_order.php" >My Order</a></li>
										<li><a href="my_profile.php" >My Profile</a></li>
										<li><a href="update_profile.php" >Update Profile</a></li>
										 
									</ol>
								</li>
								 
							</ul><!-- //MEGA MENU -->
						</li>
	 <li class="last sale_menu"><a href="logout.php" > Log Out</a></li>
	 <?php
	  }
	 
	 ?>
					</ul><!-- //MENU -->
				</div><!-- //MENU BLOCK -->
			</div><!-- //CONTAINER -->
		</header><!-- //HEADER -->
