<?php
/*
Template Name: Staff test
*/
?>

<?php get_header(); ?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/demo.css">
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.flippy.js"></script>

<div id="content" class="single staff">
	<div class="row">
		<div id="main" class="large-12 medium-12 columns clearfix" role="main">

			<div class="large-12 medium-12 columns contact-menu">
				<ul>
					<li><a href="/contact-us/stay-connected/">Contact Us</a></li>
					<li><a href="/contact-us/locations/">Locations</a></li>
					<li><a href="/contact-us/our-staff/">Our Staff</a></li>
				</ul>
			</div>

		</div> <!-- end #main -->
	</div>


	<!--Begins Position type loop section -->
	<div class="row">
		<div class="large-10 medium-10 large-offset-1 medium-offset-1 columns">
			<h2 class="grey">principals</h2>	
			<hr>
		</div>
		<div class="large-10 medium-10 large-offset-1 medium-offset-1">
			<?php $the_query = new WP_Query( 'post_type=our_staff&position=principals&orderby=post_date&order=ASC' ); ?>

			<?php 

			while ( $the_query->have_posts() ) {
				$the_query->the_post(); ?>

				<!--Start of Staff loop-->

				<?php
				$staff_title = sanitize_title(get_the_title());
				
				?>


				<div class="large-6 medium-6 medium-6 columns text-center left flipbox-container">
					<div class="staff-member ">
						<div class="pic <?php echo $staff_title; ?>">
							<?php the_post_thumbnail('large'); ?>
						</div>
					</div>
				</div>

				<script type="text/javascript">
					jQuery(document).ready(function($) {
						(function($) {
							$.fn.clickToggle = function(func1, func2) {
								var funcs = [func1, func2];
								this.data('toggleclicked', 0);
								this.click(function() {
									var data = $(this).data();
									var tc = data.toggleclicked;
									$.proxy(funcs[tc], this)();
									data.toggleclicked = (tc + 1) % 2;
								});
								return this;
							};
						}(jQuery));

						$('.<?php echo $staff_title; ?>').clickToggle(function() {   
							$(this).flippy({
								color_target: "#d8a928",
								duration: "500",
								verso: "<div class='staff-details'><h2><?php the_title(); ?></h2><p><?php the_field('position'); ?></p><p><?php the_field('email'); ?></p><h6><?php the_field('location'); ?></h6><p><a class='white-link' href='<?php the_permalink(); ?>'>View Bio</a></p></div>"
							});
						},
						function() {
							$(this).flippyReverse();
						});
					});

				</script>

				<!--End of Staff loop-->
				
				<?php } ?>
				<?php wp_reset_postdata(); ?>

			</div>
		</div>
		<!--Ends Position type loop section -->

		<!--Begins Position type loop section -->
		<div class="row">
			<div class="large-10 medium-10 large-offset-1 columns">
				<h2 class="grey">brokers</h2>	
				<hr>
			</div>
			<div class="large-10 medium-10 large-offset-1">
				<?php $the_query = new WP_Query( 'post_type=our_staff&position=producer&orderby=post_date' ); ?>

				<?php 

				while ( $the_query->have_posts() ) {
					$the_query->the_post(); ?>

					<!--Start of Staff loop-->

				<?php
				$staff_title = sanitize_title(get_the_title());
				
				?>


				<div class="large-6 medium-6 medium-6 columns text-center left flipbox-container">
					<div class="staff-member ">
						<div class="pic <?php echo $staff_title; ?>">
							<?php the_post_thumbnail('large'); ?>
						</div>
					</div>
				</div>

				<script type="text/javascript">
					jQuery(document).ready(function($) {
						(function($) {
							$.fn.clickToggle = function(func1, func2) {
								var funcs = [func1, func2];
								this.data('toggleclicked', 0);
								this.click(function() {
									var data = $(this).data();
									var tc = data.toggleclicked;
									$.proxy(funcs[tc], this)();
									data.toggleclicked = (tc + 1) % 2;
								});
								return this;
							};
						}(jQuery));

						$('.<?php echo $staff_title; ?>').clickToggle(function() {   
							$(this).flippy({
								color_target: "#d8a928",
								duration: "500",
								verso: "<div class='staff-details'><h2><?php the_title(); ?></h2><p><?php the_field('position'); ?></p><p><?php the_field('email'); ?></p><h6><?php the_field('location'); ?></h6></div>"
							});
						},
						function() {
							$(this).flippyReverse();
						});
					});

				</script>

				<!--End of Staff loop-->
					
					<?php } ?>
					<?php wp_reset_postdata(); ?>

				</div>

			</div>
			<!--Ends Position type loop section -->

			<!--Begins Position type loop section -->
			<div class="row">
				<div class="large-10 medium-10 large-offset-1 columns">
					<h2 class="grey">Life & Health</h2>	
					<hr>
				</div>
				<div class="large-10 medium-10 large-offset-1">
					<?php $the_query = new WP_Query( 'post_type=our_staff&position=life-health&orderby=post_date' ); ?>

					<?php 

					while ( $the_query->have_posts() ) {
						$the_query->the_post(); ?>

						<div class="large-6 medium-6 medium-6 columns text-center left">
							<div class="staff-member">
								<div class="pic">
									<?php the_post_thumbnail('large'); ?>
								</div>
								<div class="txt">
									<div class="staff-details">

										<h2 class="text-center white"><?php the_title(); ?></h2>
										<p><?php the_field('position'); ?></p>	
										<p><?php the_field('email'); ?></p>
										<h6><?php the_field('location'); ?></h6>

									</div>
								</div>
							</div>
						</div>

						<?php } ?>
						<?php wp_reset_postdata(); ?>

					</div>

				</div>
				<!--Ends Position type loop section -->

				<!--Begins Position type loop section -->
				<div class="row">
					<div class="large-10 medium-10 large-offset-1 columns">
						<h2 class="grey">Commercial Lines</h2>	
						<hr>
					</div>
					<div class="large-10 medium-10 large-offset-1">
						<?php $the_query = new WP_Query( 'post_type=our_staff&position=commercial-lines&orderby=post_date' ); ?>

						<?php 

						while ( $the_query->have_posts() ) {
							$the_query->the_post(); ?>

							<div class="large-6 medium-6 medium-6 columns text-center left">
								<div class="staff-member">
									<div class="pic">
										<?php the_post_thumbnail('large'); ?>
									</div>
									<div class="txt">
										<div class="staff-details">

											<h2 class="text-center white"><?php the_title(); ?></h2>
											<p><?php the_field('position'); ?></p>	
											<p><?php the_field('email'); ?></p>
											<h6><?php the_field('location'); ?></h6>

										</div>
									</div>
								</div>
							</div>

							<?php } ?>
							<?php wp_reset_postdata(); ?>

						</div>

					</div>
					<!--Ends Position type loop section -->


					<!--Begins Position type loop section -->
					<div class="row">
						<div class="large-10 medium-10 large-offset-1 columns">
							<h2 class="grey">Personal Lines</h2>	
							<hr>
						</div>
						<div class="large-10 medium-10 large-offset-1">
							<?php $the_query = new WP_Query( 'post_type=our_staff&position=personal-lines&orderby=post_date' ); ?>

							<?php 

							while ( $the_query->have_posts() ) {
								$the_query->the_post(); ?>

								<div class="large-6 medium-6 medium-6 columns text-center left">
									<div class="staff-member">
										<div class="pic">
											<?php the_post_thumbnail('large'); ?>
										</div>
										<div class="txt">
											<div class="staff-details">

												<h2 class="text-center white"><?php the_title(); ?></h2>
												<p><?php the_field('position'); ?></p>	
												<p><?php the_field('email'); ?></p>
												<h6><?php the_field('location'); ?></h6>

											</div>
										</div>
									</div>
								</div>

								<?php } ?>
								<?php wp_reset_postdata(); ?>

							</div>

						</div>
						<!--Ends Position type loop section -->



						<!--Begins Position type loop section -->
						<div class="row">
							<div class="large-10 medium-10 large-offset-1 columns">
								<h2 class="grey">Claims & Client Services</h2>	
								<hr>
							</div>
							<div class="large-10 medium-10 large-offset-1">
								<?php $the_query = new WP_Query( 'post_type=our_staff&position=claims-advocate&orderby=post_date' ); ?>

								<?php 

								while ( $the_query->have_posts() ) {
									$the_query->the_post(); ?>

									<div class="large-6 medium-6 medium-6 columns text-center left">
										<div class="staff-member">
											<div class="pic">
												<?php the_post_thumbnail('large'); ?>
											</div>
											<div class="txt">
												<div class="staff-details">

													<h2 class="text-center white"><?php the_title(); ?></h2>
													<p><?php the_field('position'); ?></p>	
													<p><?php the_field('email'); ?></p>
													<h6><?php the_field('location'); ?></h6>

												</div>
											</div>
										</div>
									</div>

									<?php } ?>
									<?php wp_reset_postdata(); ?>

								</div>

							</div>
							<!--Ends Position type loop section -->


							<!--Begins Position type loop section -->
							<div class="row">
								<div class="large-10 medium-10 large-offset-1 columns">
									<h2 class="grey">Administration</h2>	
									<hr>
								</div>
								<div class="large-10 medium-10 large-offset-1">
									<?php $the_query = new WP_Query( 'post_type=our_staff&position=admin&orderby=post_date' ); ?>

									<?php 

									while ( $the_query->have_posts() ) {
										$the_query->the_post(); ?>

										<div class="large-6 medium-6 medium-6 columns text-center left">
											<div class="staff-member">
												<div class="pic">
													<?php the_post_thumbnail('large'); ?>
												</div>
												<div class="txt">
													<div class="staff-details">

														<h2 class="text-center white"><?php the_title(); ?></h2>
														<p><?php the_field('position'); ?></p>	
														<p><?php the_field('email'); ?></p>
														<h6><?php the_field('location'); ?></h6>

													</div>
												</div>
											</div>
										</div>

										<?php } ?>
										<?php wp_reset_postdata(); ?>

									</div>

								</div>
								<!--Ends Position type loop section -->


								<?php wp_reset_query()?>
								<?php $businessinfo = get_businessinfo(); ?>
								<?php while ( $businessinfo->have_posts() ) : $businessinfo->the_post(); ?>

									<section class="call-to-action">
										<div class="row">
											<div class="large-12 medium-12 columns hide-for-medium hide-for-small">
												<h4><a href="mailto:<?php the_field("company_email"); ?>">Email Us</a> <span>or Call Us</span><a class="no-click" href="tel:+<?php the_field("company_phone"); ?>"><?php the_field("company_phone"); ?></a></h4>	
											</div>
											<div class="large-12 medium-12 columns hide-for-large">
												<h4><a href="mailto:<?php the_field("company_email"); ?>">Email Us</a><br /><span>or Call Us</span><br /><a class="no-click" href="tel:+<?php the_field("company_phone"); ?>"><?php the_field("company_phone"); ?></a></h4>	
											</div>
										</div>
									</section>

								<?php endwhile;?>
								<?php wp_reset_query()?>
							</div> <!-- end #content -->

		<!--script>
			function flipBox(){
				$('div.staff-member .pic').bind("click",function(){

					var picBox = $(this);
					var imgFlip = $(this).html();

					var elem = $(this);
					var txtbox = $('div.staff-member .txt');
					if(elem.data('flipped'))
					{

						elem.revertFlip();
						elem.data('flipped',true);

					}
					else
					{

						elem.flip({
							direction:'lr',
							speed: 330,
							color: '#d8a928',
							onBefore: function(){
								elem.html(elem.siblings('div.staff-member .txt').html());
							}

						});

						$(imgFlip).appendTo($(this));



						picBox.find('img').css({
							'left': '-9999px',
							'position': 'absolute'
							
						});

						elem.data('flipped',true);

					}



				});
			}

			flipBox();
		</script-->

		<script type="text/javascript">

			jQuery( document ).ready(function() {

			$(".staff-member .pic").css({'height':($(".staff-member .pic img").height()+'px')}); 

		});

			jQuery( window ).resize(function() {

				$(".staff-member .pic").css({'height':($(".staff-member .pic img").height()+'px')}); 

			});
		</script>


		<?php get_footer(); ?>
