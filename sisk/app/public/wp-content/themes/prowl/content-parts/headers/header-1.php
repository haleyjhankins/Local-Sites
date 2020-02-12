<aside class="right-off-canvas-menu mobile-menu">
  <ul class="no-bullet ml15">
  <?php
// get the posts from ACF
  $custom_posts = get_field('company_benefits');

// sort the posts by post date, but you can also sort on ID or whatever
  usort($custom_posts, function($a, $b) {
    return strcmp($a->post_date,$b->post_date);
  });

// write them out
  foreach ($custom_posts as $post) :  setup_postdata($post); ?>

  <?php setup_postdata($post);

  $section_title = get_field('menu_item');
  $section_slug = sanitize_title( $section_title );

  ?>
  <li>
    <a href="#<?php echo $section_slug; ?>" class="company-text-color"><?php echo $section_title; ?></a>
  </li>
<?php endforeach; ?>
</ul>
<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

</aside>

<header class="site-header" role="banner">
  <div class="row" data-equalizer>
    <div class="medium-2 columns small-6 site-logo left" data-equalizer-watch>
      <div class="outer">
        <div class="inner">
          <a href="" class="no-click"><img src="<?php the_field('company_logo'); ?>" alt=""></a>
        </div>
      </div>
    </div>

    <nav class="main-navigation right" role="navigation" data-equalizer-watch>
      <div class="outer">
        <div class="inner">
          <div class="hide-for-small">

            <ul class="inline-list right">
              <?php
// get the posts from ACF
              $custom_posts = get_field('company_benefits');

// sort the posts by post date, but you can also sort on ID or whatever
              usort($custom_posts, function($a, $b) {
                return strcmp($a->post_date,$b->post_date);
              });

// write them out
              foreach ($custom_posts as $post) :  setup_postdata($post); ?>

              <?php setup_postdata($post);

              $section_title = get_field('menu_item');
              $section_slug = sanitize_title( $section_title );

              ?>
              <li>
                <a href="#<?php echo $section_slug; ?>"><?php echo $section_title; ?></a>
              </li>
            <?php endforeach; ?>
          </ul>
          <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

        </div>
       <!--  <a class="right-off-canvas-toggle menu-icon show-for-small" href="#"><span></span></a> -->
      </div>
    </div>
  </nav><!-- #site-navigation -->
</div>
</header><!-- #masthead -->
