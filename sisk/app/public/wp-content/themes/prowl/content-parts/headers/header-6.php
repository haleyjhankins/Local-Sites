<aside class="right-off-canvas-menu mobile-menu">
  <?php wp_nav_menu( array( 'theme_location' => 'mobile' ) ); ?>
</aside>

<header class="site-header" role="banner">
  <div class="row" data-equalizer>
    <div class="small-4 columns" data-equalizer-watch>
      <div class="outer">
        <div class="inner">
          <div class="hide-for-small">
              <p><?php echo of_get_option('phone_number'); ?></p>
          </div>
          <a class="left-off-canvas-toggle menu-icon show-for-small" href="#"><span></span></a>
        </div>
      </div>
    </div>

    <div class="small-4 columns site-logo text-center" data-equalizer-watch>
      <div class="outer">
        <div class="inner">
          <a href="<?php bloginfo( 'url' ); ?>"><img src="<?php echo of_get_option('logo'); ?>" alt=""></a>
        </div>
      </div>
    </div>

    <div class="small-4 columns site-logo" data-equalizer-watch>
      <div class="outer">
        <div class="inner">
          <a class="right-off-canvas-toggle menu-icon right" href="#"><span></span></a>
        </div>
      </div>
    </div>
  </div>
</header><!-- #masthead -->