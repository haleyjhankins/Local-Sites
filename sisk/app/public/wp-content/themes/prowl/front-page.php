<?php
/*
Template Name: Benefit
*/
get_header(); ?>

<?php get_template_part( 'content-parts/content', 'slider' ); ?>

<?php

if (get_field('website_link')) {
  $websiteLink = get_field('website_link');
}

if (get_field('company_text_color')) {
  $companyTextColor = get_field('company_text_color');
} else {
  $companyTextColor = '#000';
}

if (get_field('company_color')) {
  $companyColor = get_field('company_color');
} else {
  $companyColor = '#fff';
}

?>

<style>
  .company-text-color {
    color: <?php echo $companyTextColor; ?>;
  }

  .company-text-color-hover:hover {
    color: <?php echo $companyTextColor; ?>;
  }

  .company-color {
    background-color: <?php echo $companyColor; ?>;
  }

</style>

<section class="border-bottom">
  <div class="triangle-down"></div>
</section>

<div class="benefits">

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
  <section id="<?php echo $section_slug; ?>">
    <div class="full-width cover pd150" style="background: url('<?php $image = get_field('benefit_image'); if( !empty($image)) { echo $image['url']; } ?>') center center;">
      <div class="row white">
        <div class="medium-12 columns benefit-header">
          <h1 class="white"><?php the_title(); ?></h1>

          <?php the_field('disclaimer'); ?>

          <?php the_field('title_description'); ?>
        </div>
      </div>
    </div>
    <?php

      // check if the repeater field has rows of data
    if( have_rows('benefit_information') ):

        // loop through the rows of data
      while ( have_rows('benefit_information') ) : the_row(); ?>

    <div class="benefit-info">
      <?php $subTitle = get_sub_field('subtitle');

      if ($subTitle) { ?>
      <div class="row pd75 pb0">
        <div class="medium-12 columns">
          <h2 class="mb0"><?php the_sub_field('subtitle'); ?></h2>
          <p class="mb0"><?php the_sub_field('subtitle_description'); ?></p>
        </div>
      </div>
      <?php } ?>



      <div class="row pd100" data-equalizer>

        <?php
              // display a sub field value
        $icon = get_sub_field('icon');

        if( !empty($icon) ) { ?>
        <div class="medium-3 columns hide-for-small" data-equalizer-watch>
          <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>" />
        </div>
        <?php } ?>

        <div class="medium-9 columns border-left" data-equalizer-watch>
          <div class="outer">
            <div class="inner">
              <?php the_sub_field('icon_text'); ?>
            </div>
          </div>
        </div>

      </div>

      <div class="row">
        <div class="medium-12 columns">
          <hr>
          <p class="quote company-text-color"><?php the_sub_field('callout_text'); ?></p>
          <hr>
        </div>
      </div>

      <div class="row read-more-wrapper transition pd75">
        <div class="medium-12 columns text-center">
          <a class="button read-more company-text-color-hover" href="#">Read more</a>
        </div>
      </div>

      <div class="read-more-section full-width" style="display: none;">

        <?php $optionalDesciption = get_sub_field('optional_description');

        if ($optionalDesciption) { ?>

        <div class="full-width white-bg pd75">

          <div class="row">
            <div class="medium-12 columns">
              <?php the_sub_field('optional_description'); ?>
            </div>
          </div>

        </div>
        <?php } ?>

        <div class="full-width relative company-color pd100 white">

          <div class="triangle-down"></div>
          <div class="row text-center">
            <div class="medium-12 columns">
              <p><?php the_sub_field('read_more_content'); ?></p>
              <a class="button white-button company-text-color-hover" href="<?php echo $websiteLink; ?>" target="_blank">Sign up for <br />Member Benefits</a>
              <div class="clearfix"></div>
              <a href="" class="to-top">Back to top</a>
            </div>
          </div>

        </div>

      </div>
    </div>


  <?php endwhile;

  else :

          // no rows found

    endif;

  ?>

</section>
<?php endforeach; ?>

<?php wp_reset_postdata();?>

</div>

<?php get_footer(); ?>
