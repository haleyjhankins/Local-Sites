<?php /*
Template Name: Community Involvement
*/ ?>
<?php get_header(); ?>

<div id="content" class="single">
  <div class="row">
    <div id="main" class="large-8 medium-8 columns clearfix" role="main">


      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>


        <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

          <section class="post_content clearfix" itemprop="articleBody">
            <?php the_content(); ?>

          </section> <!-- end article section -->

          <footer>

            <?php the_tags('<p class="tags"><span class="tags-title">Tags:</span> ', ', ', '</p>'); ?>

          </footer> <!-- end article footer -->

        </article> <!-- end article -->


        <?php comments_template(); ?>

      <?php endwhile; ?>

    <?php else : ?>

      <article id="post-not-found">
        <header>
          <h1>Not Found</h1>
        </header>
        <section class="post_content">
          <p>Sorry, but the requested resource was not found on this site.</p>
        </section>
      </article>

    <?php endif; ?>

  </div> <!-- end #main -->
  <div class="large-4 medium-4 columns page-sidebar">
    <div id="sidebar2" role="complementary">
      <?php if ( is_active_sidebar( 'sidebar6' ) ) : ?>

        <?php dynamic_sidebar( 'sidebar6' ); ?>

      <?php else : ?>

        <!-- This content shows up if there are no widgets defined in the backend. -->

      <?php endif; ?>
    </div>
  </div>
</div>


<?php wp_reset_query()?>
<?php $businessinfo = get_businessinfo(); ?>
<?php while ( $businessinfo->have_posts() ) : $businessinfo->the_post(); ?>

  <a href="/contact-us/locations">
    <section class="call-to-action">
      <div class="row">
        <div class="large-12 medium-12 columns">
          <h4>Email <span>or</span>Call Us</h4>
        </div>
      </div>
    </section>
  </a>

<?php endwhile;?>
<?php wp_reset_query()?>
</div> <!-- end #content -->


<?php get_footer(); ?>