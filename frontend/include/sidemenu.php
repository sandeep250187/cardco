 
	
	
	
	
	
	<!-- SIDEBAR -->
					<div id="sidebar" class="col-lg-3 col-md-3 col-sm-3 padbot50">
						
						<!-- CATEGORIES -->
						<div class="sidepanel widget_categories">
							<h3>Product Categories</h3>
							<ul>
								 
								
								<?php
 $select=mysql_query("select * from category order by name"); 
  while($fetch=mysql_fetch_array($select))
  {
	  
				?>
				<!--<li class="subMenu"><a href="products.php?id=<?php echo $fetch['id']; ?>">  <?php echo $fetch['name']; ?></a></li> -->
				<li class="subMenu"><a href="products.php?id=<?php echo $fetch['id']; ?>&cn=<?php echo $fetch['name']; ?>" ><?php echo $fetch['name']; ?></a></li>
				
<?php } ?>		
							</ul>
						</div><!-- //CATEGORIES -->
						
			 
						
						 
					</div><!-- //SIDEBAR -->
					