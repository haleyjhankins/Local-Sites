<?php
/*
Template Name: Homepage
*/
?>

<?php get_header(); ?>

<div id="content">

	<div id="main" class="" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<div id="top-section">
				<section class="row">

					<div class="home-content large-12 medium-12 columns">
						<?php the_content(); ?>
					</div>

				</section> <!-- end top section -->

				<div class="row">
					<div class="large-4 medium-4 small-12 columns">
						<div class="borders large-6 left columns"><h3>Strength</h3></div>						
					</div>
					<div class="large-4 medium-4 small-12 columns"> 
						<div class="borders large-6 large-offset-3 columns"><h3>Security</h3></div>						
					</div>
					<div class="large-4 medium-4 small-12 columns">
						<div class="borders large-6 large-offset-6 right columns"><h3>Stability</h3></div>						
					</div>
				</div>

			</div>

			<section class="row middle-section">

				<div id="sidebar3" class="large-3 medium-3 columns" role="complementary">

					<?php if ( is_active_sidebar( 'sidebar3' ) ) : ?>

						<?php dynamic_sidebar( 'sidebar3' ); ?>

					<?php else : ?>

						<!-- This content shows up if there are no widgets defined in the backend. -->

					<?php endif; ?>

				</div>

				<div id="sidebar4" class="large-3 medium-3 columns" role="complementary">

					<?php if ( is_active_sidebar( 'sidebar4' ) ) : ?>

						<?php dynamic_sidebar( 'sidebar4' ); ?>

					<?php else : ?>

						<!-- This content shows up if there are no widgets defined in the backend. -->

					<?php endif; ?>

				</div>

				<div id="sidebar5" class="large-3 medium-3 columns" role="complementary">

					<?php if ( is_active_sidebar( 'sidebar5' ) ) : ?>

						<?php dynamic_sidebar( 'sidebar5' ); ?>

					<?php else : ?>

						<!-- This content shows up if there are no widgets defined in the backend. -->

					<?php endif; ?>

				</div>

				<div id="sidebar2" class="large-3 medium-3 columns" role="complementary">

					<?php if ( is_active_sidebar( 'sidebar2' ) ) : ?>

						<?php dynamic_sidebar( 'sidebar2' ); ?>

					<?php else : ?>

						<!-- This content shows up if there are no widgets defined in the backend. -->

					<?php endif; ?>

				</div>

			</section> <!-- end middle section -->

		<?php endwhile; ?>	

	<?php else : ?>

	<?php endif; ?>

	<section class="services">

		<div class="row white text-center">
			<h1>Areas of Expertise</h1>

			<?php echo get_new_royalslider(2); ?>

			<p class="hide-for-desktop show-for-touch">Swipe to see more</p>

		</div>

	</section> <!-- end call to action section -->

	<section class="row client-section text-center">

		<!--?php echo get_new_royalslider(3); ?>
		<p class="hide-for-desktop show-for-touch">Swipe to see more</p-->


			<section class="four green-container">
				<div class="green-content-container">
					<div class="row">
						<div class="medium-12 columns green-bg">
							
							<div class="slidergroup">
								<section class="slider">
									<div class="outer">
										<div class="inner">
											<p class="medium-12 columns text-center">
												I just wanted to thank Carlisle Ins for the resources provided - the personalized service you provide, Zywave, and ThinkHR.   I have used these services more than I can tell you. Without these resources, I would be at a loss!  You have made it easy for me to research issues through these 2 websites as they provide me the non-subjective information I need to make recommendations to our Senior Leadership Team.
 

											</p>
											<p class="large-11 columns text-right gold uppercase"><strong>Vilma A. Cosneros</strong>,  <strong class="gold">Coil Solutions, Inc.</strong></p>
										</div>
									</div>
								</section>
								<section class="slider">
									<div class="outer">
										<div class="inner">
											<p class="medium-12 columns text-center">
												Carlisle Insurance Agency has provided FESCO Ltd. with exceptional service in all facets of our insurance needs. We have entertained other agencies over time but none could compare to Carlisle’s level of service, coverage, price and day to day needs. That is why we have been with them for 64 years.
											</p>
											<p class="large-11 columns text-right gold uppercase"><strong>Steve Findley- President</strong>,  <strong class="gold">FESCO Ltd.</strong></p>
										</div>
									</div>
								</section>
								<section class="slider">
									<div class="outer">
										<div class="inner">
											<p class="medium-12 columns text-center">
												We put our trust in Carlisle Insurance and feel confident that they provide the appropriate coverages to protect our business. They continue to provide excellent service and competitive pricing year after year.
											</p>
											<p class="large-11 columns text-right gold uppercase"><strong>Katherine & Daniel Dain</strong>,  <strong class="gold">DWD Pizza Inc. dba Dominos</strong></p>
										</div>
									</div>
								</section>
								<section class="slider">
									<div class="outer">
										<div class="inner">
											<p class="medium-12 columns text-center">
												Carlisle Insurance provides not only a great service, but I feel they always go above and beyond to ensure our company’s needs are met.
											</p>
											<p class="large-11 columns text-right gold uppercase"><strong>Jimmy Boller</strong>,  <strong class="gold">Boller Properties</strong></p>
										</div>
									</div>
								</section>
								<section class="slider">
									<div class="outer">
										<div class="inner">
											<p class="medium-12 columns text-center">
												Throughout our partnership with Carlisle Insurance Agency, they have continually found ways to improve our corporate insurance coverage while saving us money each year. They have provided outstanding customer service as well as been a strong supporter of our company.
											</p>
											<p class="large-11 columns text-right gold uppercase"><strong>Dave Resendez, President</strong>,  <strong class="gold">Apollo Towing Service</strong></p>
										</div>
									</div>
								</section>
								<section class="slider">
									<div class="outer">
										<div class="inner">
											<p class="medium-12 columns text-center">
												Coastal Deli is coming up on 20 years of business.  We have worked with many different agencies in Corpus Christi.  We have been with Carlisle Insurance for the past few years.  We have not found a better agency.  They have exceeded our expectations in many areas, including an excellent business package, windstorm coverage, hired and non-owned auto coverage, and ELPI.  And to make it even better, their service has been outstanding, and the premiums are very competitive.  I highly recommend giving Carlisle Insurance an opportunity to quote your business insurance.
											</p>
											<p class="large-11 columns text-right gold uppercase"><strong>Robert Becquet</strong>,  <strong class="gold">Coastal Deli, Inc DBA Jason’s Deli</strong></p>
										</div>
									</div>
								</section>
<section class="slider">
									<div class="outer">
										<div class="inner">
											<p class="medium-12 columns text-center">
												By doing something different – and adding into the language that our Broker of Record is expected to save tax dollars on what we pay for insurance premiums –  we saved $951,450! We couldn’t have done it without Carlisle Insurance being aggressive and getting us better coverage at such a low cost.
											</p>
											<p class="large-11 columns text-right gold uppercase"><strong>Chad Magill</strong>,  <strong class="gold">Corpus Christi City Councilman</strong></p>
										</div>
									</div>
								</section>	
							</div>
						</div>
					</div>
				</div>
			</section>
		</section> <!-- end bottom section -->


	</div> <!-- end #main -->

	<?php //get_sidebar(); // sidebar 1 ?>

</div> <!-- end #content -->

<script>
	$.fn.rotate = function(){
		return this.each(function() {

			/* Cache element's children */
			var $children = $(this).children();

			/* Current element to display */
			var position = -1;

			/* IIFE */
			!function loop() {

        /* Get next element's position.
         * Restarting from first children after the last one.
         */
         position = (position + 1) % $children.length;

         /* Fade element */
         $children.eq(position).fadeIn(1000).delay(7000).fadeOut(1000, loop);
     }();
 });
	};

	$(function(){
		$(".slider").hide();
		$(".slidergroup").rotate();
	});
</script>

<?php get_footer(); ?>
