<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Prowl
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
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,400italic|Open+Sans:400italic,400,600' rel='stylesheet' type='text/css'>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/slick.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/app.css">

	<script src="//use.typekit.net/gyg8alx.js"></script>
	<script>try{Typekit.load();}catch(e){}</script>

	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/apple-touch-icon-144x144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/apple-touch-icon-precomposed.png">
	<?php wp_head(); ?>
</head>

<?php
$headerType = of_get_option('header_type');
$ctaTitle = of_get_option('cta_title');
$ctaLink = of_get_option('cta_link');
$leftMenuTitle = of_get_option('l_menu_title');
$rightMenuTitle = of_get_option('r_menu_title');
$phoneNumber = of_get_option('phone_number');
$email = of_get_option('email');
$twitter = of_get_option('twitter');
$facebook = of_get_option('facebook');
$instagram = of_get_option('instagram');
$pinterest = of_get_option('pinterest');
$footer = of_get_option('footer_type');
$copyright = of_get_option('copyright');
?>

<body <?php body_class(); ?>>
	<div class="off-canvas-wrap" data-offcanvas>
		<div class="inner-wrap">

			<?php get_template_part( 'content-parts/headers/header', $headerType); ?>

			<div class="site-content">
