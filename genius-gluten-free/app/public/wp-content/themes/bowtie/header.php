<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bowtie
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<meta name="description" content="" />

<?php if( is_front_page() ) : ?>
	<link rel="alternate" href="https://geniusglutenfree.com/fr_fr" hreflang="fr-fr">
	<link rel="alternate" href="https://geniusglutenfree.com/nl_nl" hreflang="nl-nl">
	<link rel="alternate" href="https://geniusglutenfree.com/de_de" hreflang="de-de">
	<link rel="alternate" href="https://geniusglutenfree.com/en_au" hreflang="en-au">
	<link rel="alternate" href="https://geniusglutenfree.com/en_gb" hreflang="x-default">
	<link rel="alternate" href="https://geniusglutenfree.com/en_gb" hreflang="en-gb">
	<link rel="alternate" href="https://us.geniusglutenfree.com" hreflang="en-us">
<?php endif; ?>

<link rel="apple-touch-icon" href="<?php print get_stylesheet_directory_uri(); ?>/assets/img/favicon-180.png">
<link rel="icon" href="<?php print get_stylesheet_directory_uri(); ?>/assets/img/favicon.png" sizes="16x16" type="image/png">
<link rel="icon" href="<?php print get_stylesheet_directory_uri(); ?>/assets/img/favicon-152.png" sizes="152x152" type="image/png">
<link rel="icon" href="<?php print get_stylesheet_directory_uri(); ?>/assets/img/favicon-180.png" sizes="180x180" type="image/png">

<meta itemprop="name" content="<?php print get_bloginfo('name'); ?>">
<meta itemprop="description" content="">
<meta itemprop="image" content="">

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TNT3FBV');</script>
<!-- End Google Tag Manager -->

<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="<?php print get_bloginfo('name'); ?>">
<meta name="twitter:description" content="">
<meta name="twitter:site" content="geniusfoods">
<meta name="twitter:creator" content="geniusfoods">
<meta name="twitter:image" content="">

<meta property="og:site_name" content="<?php print get_bloginfo('name'); ?>" />
<meta property="og:title" content="<?php print get_bloginfo('name'); ?>" />
<meta property="og:description" content="" />
<meta property="og:type" content="article" />
<meta property="og:url" content="<?php print get_permalink(); ?>" />
<meta property="og:image" content="" />

<meta property="fb:app_id" content="1725013521105155" />
<meta property="fb:admins" content="100009561018602" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-TNT3FBV"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

		<header class="main" role="banner">
      <div class="row small-12 columns">
				<?php
					if(is_front_page()) {
						$logo_atts = 'href="#" data-scroll';
					} else {
						$logo_atts = 'href="'.get_bloginfo('url').'"';
					}
				?>
				<a <?php print $logo_atts; ?> rel="home" class="logo">
					<img src="<?php print get_stylesheet_directory_uri(); ?>/assets/img/logo.gif" />
				</a>

				<nav class="main" role="navigation">
					<?php if(is_front_page()) { ?>
          	<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
					<?php } else { ?>
						<?php wp_nav_menu( array( 'theme_location' => 'primary-absolute' ) ); ?>
					<?php } ?>
					<?php print do_shortcode('[social_media]'); ?>
          <button class="hamburger" type="button" data-menu><span class="hamburger-box"><span class="hamburger-inner"></span></span></button>
				</nav><!-- #site-navigation -->
      </div>
		</header><!-- #masthead -->

    <nav class="responsive">
			<?php if(is_front_page()) { ?>
				<?php wp_nav_menu( array( 'theme_location' => 'responsive' ) ); ?>
			<?php } else { ?>
				<?php wp_nav_menu( array( 'theme_location' => 'responsive-absolute' ) ); ?>
			<?php } ?>
			<?php print do_shortcode('[social_media]'); ?>
    </nav>

		<div id="content" class="site-content">
