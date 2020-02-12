<?php
/*
Template Name: Services
*/
?>
<?php get_header(); ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.royalslider.min.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/css/royalslider.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/css/skins/universal/rs-universal.css" />

<div id="content" class="services">

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
			<source src="<?php echo get_template_directory_uri(); ?>/video/Services.mp4" type="video/mp4">
			<source src="<?php echo get_template_directory_uri(); ?>/video/Firefox/Services.ogg" type="video/ogg">
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
					<div class="large-12 columns text-center">
						<p class="white">People don’t simply buy what you do. They buy why you do it.</p>
						<p class="white">At the Infinite Agency, we look at your brand through the lens of three separate but specific points of view.</p>
					</div>

					<div class="large-12 columns text-center">
						<img src="https://theinfiniteagency.com/wp-content/themes/Infinite/images/lenses.png" alt="Infinite Agency's Three Lens Approach to Marketing">
					</div>
					<div class="large-12 columns twentyfive"></div>
					<div class="large-12 columns text-center">
						<p class="white">Creative, Interactive and Motive-based Marketing.</p>
						<p class="white services">Each lens has a specific purpose and function, to help uncover the why behind your brand. As each lens comes into focus on your brands why, we have a clear and holistic picture of your brand's marketing landscape.</p>
					</div>
				</div>
			</section>

			<section class="three">
				<div class="row">
					<div class="large-12 columns">
						<h1 class="green">Creative</h1>
					</div>
					<div class="large-12 columns twentyfive"></div>

					<div class="large-7 columns">

						<p class="video-sub">When we view your brand through our Creative lens, we answer the questions, “Why is your brand unique?,” “Why should someone trust your brand?,” and “Is your brand being communicated through every touch point?”</p>
						<p class="video-sub">Using our Creative lens gives us an opportunity to deconstruct your brand and put it back together with a revitalized mission.</p>
						<p class="video-sub">Through this lens, we create visuals that graphically communicate, craft messages that tell stories, and construct web experiences that engage our audience. Our creative goal is to uncover your unique purpose and execute your message in a clear and clever way.</p>

					</div>
					<div class="large-4 large-offset-1 columns">
						<ul>
							<li>Concept Development</li>
							<li>Brand Name Development</li>
							<li>Logo Development</li>
							<li>Art Direction</li>
							<li>Web Design & Development</li>
							<li>Media Plans &amp; Strategies</li>
							<li>Print &amp; Collateral</li>
							<li>Promotional</li>
							<li>Graphic Design</li>
							<li>Copywriting</li>
							<li>TV</li>
							<li>Radio</li>

						</ul>
					</div>
				</div>
			</section>

			<section class="four">
				<div class="clear-bottom"></div>
				<div class="outer">
					<div class="inner">
						<div class="row">
							<a href="/work/shamoun-norman/">
								<div class="large-12 columns text-right">
									<h1 class="white">View an<br />example of our<br />Creative Lens</h1>
								</div>
							</a>
						</div>
					</div>
				</div>
			</section>

			<section class="five">
				<div class="row">
					<div class="large-12 columns">
						<h1 class="green">INTERACTIVE</h1>
					</div>
					<div class="large-12 columns twentyfive"></div>
					<div class="large-7 columns">

						<p class="video-sub">When we view your brand through our Interactive lens, we answer the questions, “How do customers view your brand?,” “Do they relate with your brand?” and  “Do they feel engaged?”</p>
						<p class="video-sub">Using our Interactive lens gives us an opportunity to have a mutual relationship with our customers.</p>
						<p class="video-sub">Through this lens, we use clear messaging through technology and social media platforms like Facebook and Twitter, giving your brand a personality. Our interactive goal is to give your customers the opportunity for a personal experience.</p>

					</div>
					<div class="large-4 large-offset-1 columns">
						<ul>
							<li>Social Media Strategy</li>
							<li>Public Relations</li>
							<li>ORM</li>
							<li>Design Posts</li>
							<li>Facebook</li>
							<li>Instagram</li>
							<li>Spotify</li>
							<li>Twitter</li>
							<li>Pandora</li>
						</ul>
					</div>
				</div>
			</section>

			<section class="six">
				<div class="clear-bottom"></div>
				<div class="outer">
					<div class="inner">
						<div class="row">
							<a href="/work/the-shops-at-park-lane/">
								<div class="large-12 columns text-right">
									<h1 class="white">View an<br />example of our<br />Interactive Lens</h1>
								</div>
							</a>
						</div>
					</div>
				</div>
			</section>

			<section class="seven">
				<div class="row">
					<div class="large-12 columns">
						<h1 class="green">Motive</h1>
					</div>
					<div class="large-12 columns twentyfive"></div>
					<div class="large-7 columns">

						<p class="video-sub">When we view your brand through our Motive lens, we answer the questions, “What are our customers needs?, How do they express it? And how do we align the two?”</p>
						<p class="video-sub">Using our Motive lens gives us an opportunity to tailor our messaging and services to your customers.</p>
						<p class="video-sub">Through this lens, we collect data, analyze trends and make calculated predictions using tools like paid search, conversion and search engine optimization. Our goal is to provide solutions for our clients and their customers’ specific desires.</p>

					</div>
					<div class="large-4 large-offset-1 columns">
						<ul>
							<li>Organic SEO</li>
							<li>Content Marketing</li>
							<li>Content Creation</li>
							<li>Pay-Per-Click</li>
							<li>Paid Search</li>
							<li>Synergistic Search</li>
							<li>Targeted Search</li>
						</ul>
					</div>
				</div>
			</section>

			<section class="eight">
				<div class="clear-bottom"></div>
				<div class="outer">
					<div class="inner">
						<div class="row">
							<a href="/work/the-pilatesbarre/">
								<div class="large-12 columns text-right">
									<h1 class="white">View an<br />example of our<br />Motive Lens</h1>
								</div>
							</a>
						</div>
					</div>
				</div>
			</section>

			<section class="nine">
				<div class="green-rectangle text-center">
					<h1 class="eames white">PROCESS</h1>
				</div>
			</section>

			<section class="ten">
				<div class="green-bottom"></div>
				<div class="row">
					<div class="large-12 columns">

						<?php echo get_new_royalslider(1); ?>
					</div>
				</div>
			</section>
<script type="text/javascript">
	var index = 1,
	playlist = ['/wp-content/themes/Infinite/video/Services.mp4', '/wp-content/themes/Infinite/video/Services.mp4', '/wp-content/themes/Infinite/video/Services.mp4'],
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
			$(".services #top-section").css({'height':($(".services #work-video").height()+'px')});
		},1000);
	});

	jQuery( window ).resize(function() {

		$(".services #top-section").css({'height':($(".services #work-video").height()+'px')});

	});
</script>
<?php get_footer(); ?>
