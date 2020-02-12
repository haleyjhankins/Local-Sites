<!doctype html>
<html class="no-js" lang="en">
<!--[if lte IE 8]>
<script type="text/javascript">
    window.location = "/wp-content/themes/Infinite/ie/index.html";
</script>
<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<?php $businessinfo = get_businessinfo(); ?>
	<?php while ( $businessinfo->have_posts() ) : $businessinfo->the_post(); ?>

	<title><?php wp_title(''); ?></title>

	<?php endwhile;?>
	<?php wp_reset_query()?>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">

	<script type="text/javascript" src="//use.typekit.net/dyv3adx.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

<!-- media-queries.js (fallback) -->
		<!--[if lt IE 9]>
			<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
			<![endif]-->

			<!-- html5.js -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<![endif]-->

			<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

			<!-- wordpress head functions -->
			<?php wp_head(); ?>
			<!-- end of wordpress head -->

			<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
			<link rel="stylesheet" type="text/css" media="all" href="<?php get_template_directory_uri(); ?>/wp-content/themes/Infinite/custom-full.css" />
			<link rel="stylesheet" type="text/css" media="print" href="<?php get_template_directory_uri(); ?>/wp-content/themes/Infinite/css/print.css" />
		</head>

		<body <?php body_class(); ?>>
			<div class="off-canvas-wrap">
				<div class="inner-wrap">

					<aside class="right-off-canvas-menu">

						<!--a class="exit-off-canvas hide-for-medium-up"><img src="/wp-content/themes/Infinite/images/menu-close.png"></a-->
						<?php get_search_form(); ?>

						<?php $businessinfo = get_businessinfo(); ?>
						<?php while ( $businessinfo->have_posts() ) : $businessinfo->the_post(); ?>

							<div class="phone large-10 large-offset-2 columns hide-for-medium-up">
								<!--a href="tel:+<?php the_field("company_phone"); ?>"><?php the_field("company_phone"); ?></a-->
							</div>

						<?php endwhile;?>
						<?php wp_reset_query()?>

						<?php bones_main_nav(); ?>
						<!--h3>Live Online Chat</h3-->
					</aside>

					<div class="container">

						<?php $businessinfo = get_businessinfo(); ?>
						<?php while ( $businessinfo->have_posts() ) : $businessinfo->the_post(); ?>
							<?php
							$warning = get_field('warning_message');
							if (!empty($warning)) { ?>
							<div class="large-12 text-center warning">
								<div>

									<a href="/emergency"><?php the_field('warning_message'); ?></a>

								</div>
							</div>

							<?php } ?>

						<?php endwhile;?>
						<?php wp_reset_query()?>

						<?php
						$parent_ID = $post->post_parent;


						?>

						<?php $businessinfo = get_businessinfo(); ?>
						<?php while ( $businessinfo->have_posts() ) : $businessinfo->the_post(); ?>

							<!--?php

							if ( is_page( 18 ) OR $parent_ID == '18' ){
								$rows = get_field('commercial_images');
								$row_count = count($rows);
								$i = rand(0, $row_count - 1);

								$inner_bg = $rows[$i]['commerial_image'];
							}

							if ( is_page( 19 ) OR $parent_ID == '19' ){
								$rows = get_field('benefits_images');
								$row_count = count($rows);
								$i = rand(0, $row_count - 1);

								$inner_bg = $rows[$i]['benefits_image'];
							}

							if ( is_page( 133 ) OR $parent_ID == '133' ){
								$rows = get_field('special_images');
								$row_count = count($rows);
								$i = rand(0, $row_count - 1);

								$inner_bg = $rows[$i]['special_image'];
							}

							if ( is_page( 5 ) OR $parent_ID == '5' ){
								$rows = get_field('personal_images');
								$row_count = count($rows);
								$i = rand(0, $row_count - 1);

								$inner_bg = $rows[$i]['personal_image'];
							}

							if ( is_page( 134 ) OR $parent_ID == '134' ){
								$rows = get_field('customer_images');
								$row_count = count($rows);
								$i = rand(0, $row_count - 1);

								$inner_bg = $rows[$i]['customer_image'];
							}

							if ( is_page( 135 ) OR $parent_ID == '135' ){
								$rows = get_field('about_images');
								$row_count = count($rows);
								$i = rand(0, $row_count - 1);

								$inner_bg = $rows[$i]['about_image'];
							}

							if ( is_page( 414 ) OR $parent_ID == '414' ){
								$rows = get_field('contact_images');
								$row_count = count($rows);
								$i = rand(0, $row_count - 1);

								$inner_bg = $rows[$i]['contact_image'];
							}

							else {

								$rows = get_field('images');
								$row_count = count($rows);
								$i = rand(0, $row_count - 1);

								$random_bg = $rows[$i]['image'];
							}

							?-->


							<?php

								$rows = get_field('images');
								$row_count = count($rows);
								$i = rand(0, $row_count - 1);

								$random_bg = $rows[$i]['image'];

							?>

						<?php endwhile;?>
						<?php wp_reset_query()?>




						<?php
							$staff_image = get_field( "single-background" );
						?>

						<?php

						// $bg_image = '/wp-content/themes/Infinite/images/top-section.jpg';


						//if ( $inner_bg != '' && $featured_image == '' ) {
						//	$bg_image = $inner_bg;
						//}

						if ( is_home() || is_single() ) {
							$bg_image = "/wp-content/themes/Infinite/images/blog-bg.jpg";
						} elseif (is_page('employer-compliance-library')) {
							$bg_image = "/wp-content/themes/Infinite/images/employer-compliance.jpg";
						} else {
							if ( has_post_thumbnail()  ) {
								$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
								$featured_image = $thumb['0'];
								$bg_image = $featured_image;
							}

							if ( $staff_image != '' ) {
								$bg_image = $staff_image;
							}

							if ( $featured_image == '' && $staff_image == '' ) {
								$bg_image = $random_bg;
							}
						}



						?>

						<div class="header-wrapper" style="background: url('<?php echo $bg_image; ?>') no-repeat bottom center; background-size: cover;">
							<header role="banner" id="top-header" class="row">

								<?php $businessinfo = get_businessinfo(); ?>
								<?php while ( $businessinfo->have_posts() ) : $businessinfo->the_post(); ?>

									<?php
									if(get_field("mobile_logo")!="") {
										$mobileLogo = get_field( "mobile_logo" );

									}
									else {
										$mobileLogo = "/wp-content/themes/Infinite/images/logo-small.png";
									}
									?>
									<?php
									if(get_field("logo")!="") {
										$largeLogo = get_field( "logo" );

									}
									else {
										$largeLogo = "/wp-content/themes/Infinite/images/logo.png";
									}
									?>

									<div class="phone large-4 medium-4 columns hide-for-small">
										<!--a class="no-click" href="tel:+<?php the_field("company_phone"); ?>"><?php the_field("company_phone"); ?></a-->
									</div>


									<div class="site-logo large-4 large-offset-0 medium-4 medium-offset-0 small-8 small-offset-2 columns">
										<a href="/"><img data-interchange="[<?php echo $mobileLogo; ?>, (only screen and (min-width: 1px))], [<?php echo $largeLogo; ?>, (only screen and (min-width: 768px))]" alt="<?php the_field( "company_name" ); ?> Logo" /></a>
									</div>

								<?php endwhile;?>
								<?php wp_reset_query()?>


								<div class="site-menu large-4 medium-4 small-2 columns">
									<div class="menu-div"><a class="right-off-canvas-toggle menu-icon right"><span></span></a><a class="right-off-canvas-toggle menu-icon right hide-for-small">Menu</a></div>
								</div>


								<?php

								$pageTitle = get_the_title();
								$partentTitle = empty( $post->post_parent ) ? get_the_title( $post->ID ) : get_the_title( $post->post_parent );

								if($pageTitle == $partentTitle){
									$pageTitle = $pageTitle;
									$partentTitle = "";
								}

								else {
									$pageTitle = $pageTitle;
									$partentTitle = $partentTitle;
								}

								?>

								<div class="row">
									<div class="large-12 medium-12 columns">
										<?php if ( is_home()) { ?>
											<h1 class="parent-title"><span></span></h1>
											<h1 class="child-title">Blog</h1>
										<?php }  elseif ( is_page( $page = '23' ) ) { ?>

										<h1 class="site-title"><img src="<?php echo get_template_directory_uri(); ?>/images/Carlisle-Tagline-WHITE.svg" width="100%" /></h1>

										<?php } else { ?>

										<h1 class="parent-title"><span><?php echo $partentTitle; ?></span></h1>
										<h1 class="child-title"><?php echo $pageTitle; ?></h1>

										<?php } ?>
									</div>
								</div>






								<!--?php bones_main_nav(); // Adjust using Menus in Wordpress Admin ?-->

					<!--div class="show-for-small menu-action">
				  	    <a href="#sidebar" id="mobile-nav-button" class="sidebar-button small secondary button">
							<svg xml:space="preserve" enable-background="new 0 0 48 48" viewBox="0 0 48 48" height="18px" width="18px" y="0px" x="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" id="Layer_1" version="1.1">
								<line y2="8.907" x2="48" y1="8.907" x1="0" stroke-miterlimit="10" stroke-width="8" stroke="#000000" fill="none"/>
								<line y2="24.173" x2="48" y1="24.173" x1="0" stroke-miterlimit="10" stroke-width="8" stroke="#000000" fill="none"/>
								<line y2="39.439" x2="48" y1="39.439" x1="0" stroke-miterlimit="10" stroke-width="8" stroke="#000000" fill="none"/>
								Menu
							</svg>
						</a>
					</div-->

					<!--?php bones_mobile_nav(); ?-->

				</header>
			</div>
