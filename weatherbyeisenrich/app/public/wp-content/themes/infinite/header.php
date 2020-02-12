<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Hijacked
 */
?>
<!doctype html>
<!--[if IE 9]><html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<!--[if lte IE 8]>
<script type="text/javascript">
window.location = "/browser-upgrade";
</script>
<![endif]-->

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
    <meta name="format-detection" content="telephone=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="shortcut icon" type="image/icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/favicon.ico">
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/apple-touch-icon-144x144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/apple-touch-icon-precomposed.png">
	<script src="//use.typekit.net/oba1ygq.js"></script>
	<script>try{Typekit.load();}catch(e){}</script>
	<?php wp_head(); ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-65243801-1', 'auto');
  ga('require', 'displayfeatures');
  ga('send', 'pageview');

</script>

</head>

<body <?php body_class(); ?>>
	<div class="off-canvas-wrap" data-offcanvas>
		<div class="inner-wrap">

			<div class="overlay overlay-hugeinc">
				<button type="button" class="overlay-close">Close</button>
				<div class="outer">
					<div class="inner">
						<nav>
							<?php wp_nav_menu( array( 'theme_location' => 'right', 'menu_class' => 'main-menu' ) ); ?>
						</nav>
					</div>
				</div>
			</div>

			<header class="site-header pv2" role="banner">
				<div class="row" data-equalizer>
					<div class="large-5 medium-6 columns small-6 site-logo left" data-equalizer-watch>
						<div class="outer">
							<div class="inner">
								<a href="<?php bloginfo( 'url' ); ?>"><img src="/wp-content/themes/infinite/assets/img/logo.png" alt="logo"></a>
							</div>
						</div>
					</div>

					<nav class="main-navigation right" role="navigation" data-equalizer-watch>
						<div class="outer">
							<div class="inner">
								<div>
								<ul class="dib xmv">
									<!-- <li>
										<span class="ft3"><a href="/getaquote/">GET A HOME &amp; AUTO QUOTE</a></span>
									</li>
									<li><span class="ph1 lh1-5">|</span></li>-->
									<li>
										<span class="ft3"><a href="/clients/">CLIENTS</a></span>
										<!-- <ul class="sub-menu">
											<li><a href="https://portal.csr24.com/default.asp?ak=2184195&" target="_blank">Portal</a></li>
										</ul> -->
									</li>
									<li><span class="ph1 lh1-5">|</span></li>
									<li><a class="ft3" id="trigger-overlay-word" href="#">MENU</a></li>
									<li>
										<a class="menu-icon" id="trigger-overlay" href="#"><span></span></a>
									</li>
								</ul>
								</div>

							</div>
						</div>
					</nav><!-- #site-navigation -->
				</div>
			</header><!-- #masthead -->

			<div class="site-content">

			<?php get_template_part( 'content-parts/content', 'banner' ); ?>

			<?php get_template_part( 'content-parts/content', 'subnav' ); ?>

			<?php get_template_part( 'content-parts/content', 'slider' ); ?>
