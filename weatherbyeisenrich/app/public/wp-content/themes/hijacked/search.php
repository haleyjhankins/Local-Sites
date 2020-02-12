<?php
/**
 * The template for displaying search results pages.
 *
 * @package Hijacked
 */

get_header(); ?>

<section id="primary" class="content-area">
  <main id="main" class="site-main" role="main">

    <?php if ( have_posts() ) : ?>

      <section class="banner-image cover sm-pv4 md-pv7" style="background: url(http://erdosmiller.dev/wp-content/uploads/2015/03/about-header.jpg) no-repeat;">
        <div class="outer">
          <div class="inner">
            <div class="row">
              <div class="medium-12 columns">
                <h3 class="white">Search Results</h3>
              </div>
            </div>
          </div>
        </div>
      </section>

      <div class="grey-bg">
        <div class="pv10 row">

          <?php /* Start the Loop */ ?>
          <?php while ( have_posts() ) : the_post(); ?>

            <?php
        /**
         * Run the loop for the search to output the results.
         * If you want to overload this in a child theme then include a file
         * called content-search.php and that will be used instead.
         */
        get_template_part( 'content', 'search' );
        ?>

      <?php endwhile; ?>

    <?php else : ?>

      <div class="grey-bg">
        <div class="pv10 row">
          <h3>Nothing found. Please try a different search term.</h3>
        </div>
      </div>

    <?php endif; ?>

  </div>
</div>

</main><!-- #main -->
</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
