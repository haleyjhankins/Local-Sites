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
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/apple-touch-icon-144x144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/apple-touch-icon-precomposed.png">
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

			<aside class="right-off-canvas-menu mobile-menu">
				<?php wp_nav_menu( array( 'theme_location' => 'mobile' ) ); ?>
			</aside>

			<header class="site-header" role="banner">
				<div class="row" data-equalizer>
					<div class="medium-2 columns small-6 site-logo left" data-equalizer-watch>
						<div class="outer">
							<div class="inner">
								<a href="<?php bloginfo( 'url' ); ?>"><img src="/wp-content/themes/Hijacked/assets/img/logo.svg" alt="CFM"></a>
							</div>
						</div>
					</div>

					<nav class="main-navigation right" role="navigation" data-equalizer-watch>
						<div class="outer">
							<div class="inner">
								<div class="hide-for-small">
									<?php wp_nav_menu( array( 'theme_location' => 'right', 'menu_class' => 'inline-list right' ) ); ?>
								</div>
								<a class="right-off-canvas-toggle menu-icon show-for-small" href="#"><span></span></a>
							</div>
						</div>
					</nav><!-- #site-navigation -->
				</div>
			</header><!-- #masthead -->

			<div class="site-content">
