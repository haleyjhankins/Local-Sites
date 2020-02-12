<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"  <?php language_attributes( ) ?>> <!--<![endif]-->
<head>

    <meta charset="utf-8">
   	<meta name="description" content="">
	<meta name="author" content="">
  	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=UTF-8" />

	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>

	<link rel="alternate" type="application/rss+xml" title="RSS2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />


    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=PT+Sans" />
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

	<?php  $al_options = get_option('al_general_settings'); ?>

   	<?php if(!empty($al_options['al_favicon'])):?>
	<link rel="shortcut icon" href="<?php echo $al_options['al_favicon'] ?>" />
 	<?php endif?>
    <!--[if IE ]><link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/css/ie.css" /><![endif]-->

   	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
   	<?php wp_head(); ?>
   	<!--[if lt IE 9]><script src="<?php echo get_template_directory_uri() ?>/js/html5.js"></script><![endif]-->
    <!--[if lte IE 6]><script src="<?php echo get_template_directory_uri() ?>/js/ie6/warning.js"></script><script>window.onload=function(){e("<?php echo get_template_directory_uri()  ?>/js/ie6/")}</script><![endif]-->
  	<?php  $skin = isset($al_options['al_skin']) && $al_options['al_skin'] != '' ? $al_options['al_skin'] : 'default';?>
    <?php  $background = isset($al_options['al_background']) && $al_options['al_background'] != '' ? $al_options['al_background'] : '';?>

   	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/css/colors/<?php echo $skin?>.css" />

    <?php if ($background !== ''):?>
    	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/css/backgrounds/<?php echo $background?>.css" />
    <?php endif ?>

	<?php if (isset($al_options['al_theme']) && $al_options['al_theme']==1):?>
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/dark-theme.css" />
    <?php endif?>
	<?php include (TEMPLATEPATH . '/css/dynamic-styles.php'); ?>


	<?php $pageBg = get_post_meta($post->ID, "_background", $single = false);?>
	<?php if(!empty($pageBg[0]) ):?>
		<style type="text/css">body{background-image:url(<?php echo $pageBg[0]?>)!important}</style>
	<?php endif?>
    <?php
   		$bodyFont = isset($al_options['al_body_font']) ? $al_options['al_body_font'] : 'off';
		$headingsFont =(isset($al_options['al_headings_font']) && $al_options['al_headings_font'] !== 'off') ? $al_options['al_headings_font'] : 'off';
		$menuFont = (isset($al_options['al_menu_font']) && $al_options['al_menu_font'] !== 'off') ? $al_options['al_menu_font'] : 'off';

		$fonts['body, p, a'] = $bodyFont;
		$fonts['h1, h2, h3, h4, .callouttext, .pagetitle, .pagetitle span, .pagetitle a'] = $headingsFont;

		$fonts['#menu ul a'] = $menuFont;

		foreach ($fonts as $value => $key)
		{
			if($key != 'off' && $key != ''){
				$api_font = str_replace(" ", '+', $key);
				$font_name = font_name($key);

				echo '<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family='.$api_font.'" />';
				echo "<style type=\"text/css\">".$value."{ font-family: '".$key."' !important; }</style>";
			}
		}
	?>
</head>

<body  <?php body_class(); ?>>

<div id="maincontent">
    <div class="box" style="margin-top:100px;">
        <a href="#" id="top"></a>
        <!--Top Nav-->
        <div class="container_12">
            <div class="grid_12 alignright" style="float:right;">
                <!--Social Networks-->
                <div class="socialbar">
                   <img src="/wp-content/uploads/2016/12/healthcarer-revenue-solutions.jpg" />
		<p style="float:right; font-size:26px; margin-top:10px; "><a style="color:#000;" href="tel:9725329986">972.532.9986</a></p>
                </div>
                <!--End Social Networks-->
            </div>
        </div>
        <!--End Top Nav-->
        <!--Main Bar-->
        <header class="container_12">
            <!--Logo-->
            <div class="grid_4">
                <a href="<?php echo site_url() ?>">
                    <?php if(!empty($al_options['al_logo'])):?>
                        <img src="<?php echo $al_options['al_logo'] ?>" alt="<?php echo $al_options['al_logotext']?>" id="logo-image" class="logo" />
                    <?php else:?>
                        <?php echo isset($al_options['al_logotext']) ? $al_options['al_logotext'] : 'Cosmopolitan' ?>
                    <?php endif?>
                </a>
            </div>
            <!--End Logo-->
            <!--Main Nav-->
            <nav class="grid_8" style="margin-left:100px;">
                <?php
                    if(function_exists('wp_nav_menu')):
                        wp_nav_menu(
                        array(
                            'menu' =>'primary_nav',
                            'container'=>'div',
                            'depth' => 4,
                            'container_id' => 'menu',
                            'menu_class' => 'sf-menu'
                            )
                        );
                    else:
                        ?>
                        <div id="menu">
                            <ul class="sf-menu top-level-menu"><?php wp_list_pages('title_li=&depth=4'); ?></ul>
                        </div>
                        <?php
                    endif;
                ?>
                <div class="clearnospacing"></div>
            </nav>
			<div class="clearnospacing"></div>
        </header>
		<div class="clearnospacing"></div>