<?php
/*
Template Name: New Culture
*/
?>
<?php get_header(); ?>

<script type="text/javascript">
	var index = 1,
	playlist = ['' + <?php echo get_template_directory_uri(); ?> + '/video/Culture.mp4', '' + <?php echo get_template_directory_uri(); ?> + '/video/Culture.mp4', '' + <?php echo get_template_directory_uri(); ?> + '/video/Culture.mp4'],
	video = document.getElementById('work-video');

	video.addEventListener('ended', rotate_video, false);

	function rotate_video() {
		video.setAttribute('src', playlist[index]);
		video.load();
		index++;
		if (index >= playlist.length) { index = 0; }
	}
</script>

<script type="text/javascript">
	jQuery( document ).ready(function() {
		setTimeout(function() {
			$(".culture #top-section").css({'height':($(".culture #work-video").height()+'px')});
		},1500);
	});

	jQuery( window ).resize(function() {
		$(".culture #top-section").css({'height':($(".culture #work-video").height()+'px')});
	});
</script>

<script type="text/javascript">
	$(function() {
		$(".video").click(function(event) {

			var href = this.id;
			$("#iframe").attr("src", href);

		});
	});
</script>



<div id="content" class="culture">

	<?php if ( has_post_thumbnail() ) {
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
		$bg_image = $thumb['0'];
	} ?>

	<section id="top-section" class="hide-for-desktop show-for-touch" style="background: url(<?php echo $bg_image ?>) no-repeat center !important; background-size: 100% !important; height:150px !important;">
		<div class="outer">
			<div class="inner">
				<div class="row">
					<div class="large-12">
						<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="top-section" class="hide-for-touch">
		<video id="work-video" autoplay loop >
			<source src="<?php echo get_template_directory_uri(); ?>/video/Culture.mp4" type="video/mp4">
				<source src="<?php echo get_template_directory_uri(); ?>/video/Firefox/Culture.ogg" type="video/ogg">
					Your browser does not support the video tag.
				</video>
				<div class="outer">
					<div class="inner">
						<div class="row">
							<div class="large-12">
								<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
							</div>
						</div>
					</div>
				</div>
			</section>



			<section class="two">
				<div class="row">
					<h1 class="white eames page-title text-center">5 Core Values</h1>
					<div class="twentyfive"></div>
					<div class="green-slashes text-center">
						<!--img src="/wp-content/uploads/the-infinite-agency-home-section3-top.jpg"-->
					</div>
					<div class="twentyfive"></div>
					<p class="white">In order to really get to know The Infinite Agency, you first have to know what we believe in. We have defined our beliefs in 5 core values. These values bind us together- as a company and as people. They are truly what we live by. You’ll see these values on the wall of our office and in the mind of every employee.</p>

					<p class="white">But we don’t just practice these words internally. Each core value reflects how we treat our relationship with every client. Our 5 core values clearly communicate how much we trust in each other, what you can expect in our work ethic, and how greatly we value people. We use this list to not only benefit you, but to also set expectations for ourselves.</p>
				</div>
			</section>




			<section class="three grey">
				<div class="row">
					<div class="large-12 columns text-center">
						<h2 class="white eames uppercase culture">learn more about our values</h2>
						<div class="twentyfive"></div>
					</div>
					<div class="video-gallery large-10 large-offset-1 left columns">
						<div class="video-player large-12 columns">
							<iframe id="iframe" src="//player.vimeo.com/video/78112674?title=0&amp;portrait=0&amp;color=a7c159" height="281" width="500" allowfullscreen="" frameborder="0"></iframe>
						</div>
						<div class="thumbnail-container large-12 columns">
							<div id="//player.vimeo.com/video/78112674?title=0&amp;portrait=0&amp;color=a7c159" class="video first-video">
								<div class="video-thumbnail-img hide-for-small">
									<img class="video-thumbnail" alt="//player.vimeo.com/video/78112674?title=0&amp;portrait=0&amp;color=a7c159" src="/wp-content/uploads/purpose-duty.jpg" alt="Company Core Values: Purpose Over Duty">
								</div>
								<p class="white center uppercase"><strong>PURPOSE OVER DUTY</strong></p>
							</div>
							<div id="//player.vimeo.com/video/78112675?title=0&amp;portrait=0&amp;color=a7c159" class="video">
								<div class="video-thumbnail-img hide-for-small">
									<img class="video-thumbnail" alt="//player.vimeo.com/video/78112675?title=0&amp;portrait=0&amp;color=a7c159" src="/wp-content/uploads/people-products.jpg" alt="Company Core Values: People Over Products">
								</div>
								<p class="white center uppercase"><strong>PEOPLE OVER PRODUCTS</strong></p>
							</div>
							<div id="//player.vimeo.com/video/78112948?title=0&amp;portrait=0&amp;color=a7c159" class="video">
								<div class="video-thumbnail-img hide-for-small">
									<img class="video-thumbnail" alt="//player.vimeo.com/video/78112948?title=0&amp;portrait=0&amp;color=a7c159" src="/wp-content/uploads/trust-control.jpg" alt="Company Core Values: Trust Over Control">
								</div>
								<p class="white center uppercase"><strong>TRUST OVER CONTROL</strong></p>
							</div>
							<div id="//player.vimeo.com/video/78112947?title=0&amp;portrait=0&amp;color=a7c159" class="video">
								<div class="video-thumbnail-img hide-for-small">
									<img class="video-thumbnail" alt="//player.vimeo.com/video/78112947?title=0&amp;portrait=0&amp;color=a7c159" src="/wp-content/uploads/potential-pride.jpg" alt="Company Core Values: Potential Over Pride">
								</div>
								<p class="white center uppercase"><strong>POTENTIAL	OVER PRIDE</strong></p>
							</div>
							<div id="//player.vimeo.com/video/78112950?title=0&amp;portrait=0&amp;color=a7c159" class="video last-video">
								<div class="video-thumbnail-img hide-for-small">
									<img class="video-thumbnail" alt="//player.vimeo.com/video/78112950?title=0&amp;portrait=0&amp;color=a7c159" src="/wp-content/uploads/strength-weakness.jpg" alt="Company Core Values: Strength Over Weakness">
								</div>
								<p class="white center uppercase"><strong>STRENGTH OVER WEAKNESS</strong></p>
							</div>
						</div>
					</div>
				</div>
			</section>




			<section class="four green-container">
				<div class="green-content-container">
					<div class="row">
						<div class="green-bg">
							<div class="twentyfive"></div>
							<h3 class="white eames uppercase text-center">Some flowery praise from our clients</h3>
							<div class="twentyfive"></div>
							<div class="slidergroup"><section class="slider">
								<div class="outer">
									<div class="inner">
										<p class="large-10 large-offset-1 text-justify eames lowercase white quote-text-green">
											With the help of The Infinite Agency, our social media numbers have increased exponentially!
											They have exceeded our expectations with each campaign and we have reached our stretch milestones.
											We look forward to working with them and reaching the next level of success.</p>
											<p class="large-11 text-right green-quote white uppercase"><strong>michelle davis</strong>, shops at park lane</p>
										</div>
									</div>
								</section>
								<section class="slider">
									<div class="outer">
										<div class="inner">
											<p class="large-10 large-offset-1 text-justify eames lowercase white quote-text-green">
												It has been refreshing to work with The Infinite Agency. We’ve always been able to count on them. From concept to product implementation, they’ve shown reliability and impressive creative talent. From the very beginning, they’ve delivered on time and on budget. We couldn’t be happier.</p>
												<p class="large-11 text-right green-quote white uppercase"><strong>Peter Linke- CEO</strong>, Hothead Technologies</p>
											</div>
										</div>
									</section>
									<section class="slider">
										<div class="outer">
											<div class="inner">
												<p class="large-10 large-offset-1 text-justify eames lowercase white quote-text-green">
													The Infinite Agency has helped us build our brand from the very beginning. From building our website, to creating signs, logos, apparel, and so much more. They get us everything we need in a timely matter, even when we ask for things last minute. They've really taken the effort to feel out The PilatesBarre culture. They even came to take a group class!</p>
													<p class="large-11 text-right green-quote white uppercase"><strong>Meghann O'Leary- Co-Founder</strong>, The PilatesBarre</p>
												</div>
											</div>
										</section></div>
										<div class="twentyfive"></div>
										<?php //echo get_new_royalslider(2); ?>
									</div>
								</div>
							</div>
						</section>


				<?php

					$args = array(
						'post_type' => 'team',
						'meta_key'			=> 'order',
						'orderby'			=> 'meta_value_num',
						'order'				=> 'ASC',
						'showposts' 			=> -1
						);

					$loop = new WP_Query( $args );

					if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post();
					$thumb_id = get_post_thumbnail_id();
					$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
					$main_img = $thumb_url_array[0];
					$swap_img = get_field('secondary_image');
				 ?>

					<!-- BEGIN PROFILES -->

						<section class="team-item" style='background-image: url(<?php echo $main_img; ?>);'>
							<div class="row zi5">
								<div class="profile-trigger" data-swap="<?php echo $swap_img; ?>" data-main="<?php echo $main_img; ?>"></div>
								<div class="culture-profile">
									<div class="profile-id-box right">
										<h3><?php the_title(); ?></h3>
										<h4><?php the_field('job_title'); ?></h4>
										<?php the_content(); ?>
										<?php
											// check if the repeater field has rows of data
											if( have_rows('social_media') ):

											 	// loop through the rows of data
											    while ( have_rows('social_media') ) : the_row();
												$network = get_sub_field('social_network');
												$username = get_sub_field('username');
										?>
											<div class="social-id">
											        <?php echo display_social_network($network,$username); ?>
											</div>

										<?php
										    endwhile; endif;
										?>
									</div>
								</div>
							</div>
						</section>

					<!-- END PROFILES -->

				<?php endwhile; endif; wp_reset_query(); ?>
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
         $children.eq(position).fadeIn(1000).delay(5000).fadeOut(1000, loop);
     }();
 });
		};

		$(function(){
			$(".slider").hide();
			$(".slidergroup").rotate();
		});

		// $(function() {
		// 	$('.profile-trigger').hover(

		// 		function () {
		// 			var parent = $(this).parents('section');
		// 			var swap = $(this).data('swap');
		// 		    $(parent).animate({
		// 		        opacity: 0
		// 		    }, 'fast', function () {
		// 		        $(parent)
		// 		            .css({
		// 		            'background-image': 'url('+swap+')'
		// 		        })
		// 		            .animate({
		// 		            opacity: 1
		// 		        });
		// 		    });
		// 		},

		// 		function () {
		// 			var parent = $(this).parents('section');
		// 			var main = $(this).data('main');
		// 		     $(parent).animate({
		// 		        opacity: 0
		// 		    }, 'fast', function () {
		// 		        $(parent)
		// 		            .css({
		// 		            'background-image': 'url('+main+')'
		// 		        })
		// 		            .animate({
		// 		            opacity: 1
		// 		        });
		// 		    });
		// 		});
		// });
	</script>

	<?php get_footer(); ?>



