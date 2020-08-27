<?php  
$this->load->view('home/header');
?>
<!-- Banner
================================================== -->
<div class="main-search-container" data-background-image="<?php echo base_url() ?>assets/images/cards.jpg">
	<div class="main-search-inner">

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2>Find Who You Collect</h2>
					<h4>Expolore 1,000s of card collectors collections to expand your personal collection.</h4>

					<div class="main-search-input">

						<div class="main-search-input-item">
							<input type="text" placeholder="Who do you collect?" value=""/>
						</div>

						

					

						<button class="button" onclick="window.location.href='listings-half-screen-map-list.html'">Search</button>

					</div>
				</div>
			</div>
		</div>

	</div>
	
	

</div>



<!-- Content
================================================== -->
<div class="container">
	<div class="row">

		<div class="col-md-12">
			<h3 class="headline centered margin-top-75">
				Browse Popular Categories
			</h3>
		</div>

	</div>
</div>


<!-- Category Boxes -->
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="categories-boxes-container margin-top-5 margin-bottom-30">
				
				<!-- Box -->
				<a href="listings-list-with-sidebar.html" class="category-small-box">
					<i class="im im-icon-Hamburger"></i>
					<h4>Basketball Cards</h4>
					<span class="category-box-counter">12</span>
				</a>

				<!-- Box -->
				<a href="listings-list-with-sidebar.html" class="category-small-box">
					<i class="im  im-icon-Sleeping"></i>
					<h4>Unopened Boxes & Packs</h4>
					<span class="category-box-counter">32</span>
				</a>

				<!-- Box -->
				<a href="listings-list-with-sidebar.html" class="category-small-box">
					<i class="im im-icon-Shopping-Bag"></i>
					<h4>Soccer Cards</h4>
					<span class="category-box-counter">11</span>
				</a>

				<!-- Box -->
				<a href="listings-list-with-sidebar.html" class="category-small-box">
					<i class="im im-icon-Cocktail"></i>
					<h4>Signed Memberbilia</h4>
					<span class="category-box-counter">15</span>
				</a>

				<!-- Box -->
				<a href="listings-list-with-sidebar.html" class="category-small-box">
					<i class="im im-icon-Electric-Guitar"></i>
					<h4>Baseball Cards</h4>
					<span class="category-box-counter">21</span>
				</a>

				<!-- Box -->
				<a href="listings-list-with-sidebar.html" class="category-small-box">
					<i class="im im-icon-Dumbbell"></i>
					<h4>Football Cards</h4>
					<span class="category-box-counter">28</span>
				</a>

			</div>
		</div>
	</div>
</div>
<!-- Category Boxes / End -->







<!-- Flip banner -->
<a href="listings-list-with-sidebar.html" class="flip-banner parallax margin-top-65" data-background="<?php echo base_url() ?>assets/images/slider-bg-02.jpg" data-color="#f91942" data-color-opacity="0.85" data-img-width="2500" data-img-height="1666">
	<div class="flip-banner-content">
		<h2 class="flip-visible">Expolore others collections</h2>
		<h2 class="flip-hidden">Search Cards<i class="sl sl-icon-arrow-right"></i></h2>
	</div>
</a>
<!-- Flip banner / End -->

<?php $this->load->view('home/footer'); ?>

 
