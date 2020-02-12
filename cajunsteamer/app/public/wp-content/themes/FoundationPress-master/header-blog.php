<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php if ( is_category() ) {
    echo 'Category Archive for &quot;'; single_cat_title(); echo '&quot; | '; bloginfo( 'name' );
  } elseif ( is_tag() ) {
    echo 'Tag Archive for &quot;'; single_tag_title(); echo '&quot; | '; bloginfo( 'name' );
  } elseif ( is_archive() ) {
    wp_title(''); echo ' Archive | '; bloginfo( 'name' );
  } elseif ( is_search() ) {
    echo 'Search for &quot;'.esc_html($s).'&quot; | '; bloginfo( 'name' );
  } elseif ( is_home() || is_front_page() ) {
    bloginfo( 'name' ); echo ' | '; bloginfo( 'description' );
  }  elseif ( is_404() ) {
    echo 'Error 404 Not Found | '; bloginfo( 'name' );
  } elseif ( is_single() ) {
    wp_title('');
  } else {
    echo wp_title( ' | ', 'false', 'right' ); bloginfo( 'name' );
  } ?></title>
  
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/app.css" />
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css" />

  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/apple-touch-icon-144x144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/apple-touch-icon-114x114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/apple-touch-icon-72x72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/apple-touch-icon-precomposed.png">
  <script type="text/javascript" src="//use.typekit.net/ubd6snn.js"></script>
  <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
  <link href='http://fonts.googleapis.com/css?family=Sue+Ellen+Francisco' rel='stylesheet' type='text/css'>

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <?php do_action('foundationPress_after_body'); ?>
  
  <div class="off-canvas-wrap">
    <div class="inner-wrap">
      
      <?php do_action('foundationPress_layout_start'); ?>
      
      <nav class="tab-bar show-for-small-only">
        <section class="left-small">
          <a class="left-off-canvas-toggle menu-icon" ><span></span></a>
        </section>
        <section class="middle tab-bar-section">
          
          <h1 class="title"><?php bloginfo( 'name' ); ?></h1>

        </section>
      </nav>

      <aside class="left-off-canvas-menu">
        <?php foundationPress_mobile_off_canvas(); ?>
      </aside>
      
      <div class="top-bar-container contain-to-grid show-for-medium-up">
        <nav class="top-bar" data-topbar="">
          
          <section class="top-bar-section" style="margin: 0 auto 30px auto; position: relative; display: table;">
            <?php foundationPress_top_bar_l(); ?>
            <?php foundationPress_top_bar_r(); ?>
          </section>
        </div>

        <header class="entry-header my-full-size">
          <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
            <div class="entry-thumbnail">
              <?php the_post_thumbnail(); ?>
            </div>
          <?php endif; ?>

          <h1 class="entry-title my-full-size"><?php the_title(); ?></h1>
        </header><!-- .entry-header -->
        
        <div class="mobile-menu-container">

          <img src="<?php echo get_template_directory_uri(); ?>/img/mobile-logo.png" alt="">
          <div class="menu-icon-open"></div>
        </div>

        <div class="mobile-menu">
          <div class="menu-icon-close"></div>
          <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/menu">Menu</a></li>
            <li><a href="/gallery">Gallery</a></li>
            <li><a href="/events">Events</a></li>
            <li><a href="/catering">Catering</a></li>
            <li><a href="/locations">Locations</a></li>
            <li><a href="/join">Join</a></li>
          </ul>
        </div>

        <section class="container" role="document">
          <?php do_action('foundationPress_after_header'); ?>