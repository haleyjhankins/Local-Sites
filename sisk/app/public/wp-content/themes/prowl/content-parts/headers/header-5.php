<aside class="right-off-canvas-menu mobile-menu">
  <?php wp_nav_menu( array( 'theme_location' => 'mobile' ) ); ?>
</aside>

<header class="site-header" role="banner">
  <div class="row" data-equalizer>
    <div class="medium-2 columns small-6 site-logo left" data-equalizer-watch>
      <div class="outer">
        <div class="inner">
          <a href="<?php bloginfo( 'url' ); ?>"><img src="<?php echo of_get_option('logo'); ?>" alt=""></a>
        </div>
      </div>
    </div>

    <nav class="main-navigation right" role="navigation" data-equalizer-watch>
      <div class="outer">
        <div class="inner">
          <a class="right-off-canvas-toggle menu-icon" href="#"><span></span></a>
        </div>
      </div>
    </nav><!-- #site-navigation -->
  </div>
</header><!-- #masthead -->