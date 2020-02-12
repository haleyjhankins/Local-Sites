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
          <div class="hide-for-small">
            <ul class="inline-list right">
              <li><a href="<?php echo of_get_option('cta_link'); ?>"><?php echo of_get_option('cta_title'); ?></a></li>
              <li><?php echo of_get_option('phone_number'); ?></li>
            </ul>
            <?php wp_nav_menu( array( 'theme_location' => 'right', 'menu_class' => 'inline-list right' ) ); ?>
          </div>
          <a class="right-off-canvas-toggle menu-icon show-for-small" href="#"><span></span></a>
        </div>
      </div>
    </nav><!-- #site-navigation -->
  </div>
</header><!-- #masthead -->