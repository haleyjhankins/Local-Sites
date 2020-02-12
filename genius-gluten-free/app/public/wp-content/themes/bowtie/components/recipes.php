
<?php
  $recipes = get_sub_field('recipes');
	$args = array(
		'post_type' => 'recipe',
		'posts_per_page' => -1,
    'post__in' => $recipes,
    'orderby' => 'post__in'
	);

	$loop = new WP_Query($args);
?>
<div class="image-buttons">
<?php while($loop->have_posts()): $loop->the_post(); ?>
  <div class="image-button image-button--recipe" id="recipe-<?php print get_the_id(); ?>">
    <h5 class="title"><?php print get_the_title(); ?></h5>
    <div class="image" style="background: linear-gradient(180deg, rgba(0,0,0,0.4) 0%, rgba(0,0,0,0) 50%), url('<?php print get_field('preview_image'); ?>') no-repeat center;"></div>
    <div class="button fluid open-modal" data-target="#modal--recipe-<?php print get_the_id(); ?>">View Full Recipe</div>
  </div>

  <div class="modal--wrapper" id="modal--recipe-<?php print get_the_id(); ?>">
  <div class="modal modal--recipe">
    <header class="modal--header bg-<?php print get_field('select_brand_color'); ?> <?php if(!get_field('image')) { print 'flex-center'; } ?> <?php if(get_field('background_image')) {?>has-bg-image<?php } ?>" <?php if(get_field('background_image')) {?>style="background: url('<?php print get_field('background_image'); ?>') no-repeat center;"<?php } ?>>
      <a href="#" class="close" data-close>Close</a>
      <h3 class="modal--title <?php if(get_field('select_brand_color')) { print 'text--white'; } ?>"><?php print get_the_title(); ?></h3>
    </header>
    <section class="modal--content">
      <div class="row push-down--double">
        <div class="small-12 columns">
          <p class="text-center"><?php print get_field('short_description'); ?></p>
        </div>
      </div>
      <div class="row">
        <div class="medium-7 columns">
          <?php if(get_field('directions')): ?>
          <h4>Directions</h4>
          <p><?php print get_field('directions'); ?></p>
          <?php endif; ?>
        </div>
        <div class="medium-5 columns">
          <?php if(have_rows('ingredients')): ?>
          <h4>Ingredients</h4>
          <?php while(have_rows('ingredients')): the_row(); ?>
          <div class="ingredient text--grey"><?php print get_sub_field('ingredient'); ?></div>
          <?php	endwhile; ?>
          <?php endif; ?>
        </div>
      </div>

      <?php
      $product_id = get_field('select_bread');
      if($product_id && $product_id !== 'na') {
      $l = new WP_Query(array(
        'post_type' => 'product',
        'p' => $product_id,
        'posts_per_page' => 1
      ));
      while($l->have_posts()): $l->the_post(); ?>

      <div class="suggested-bread">
        <div class="content">
          <div>
            <div class="text--grey">We suggest using</div>
            <h4><?php print get_the_title(); ?></h4>
          </div>
        </div>
        <div class="image bg-<?php print get_field('select_brand_color'); ?>">
          <?php if(get_field('image')) { ?>
            <img src="<?php print get_field('image'); ?>" />
          <?php } ?>
        </div>
      </div>

      <?php endwhile; $loop->reset_postdata(); } ?>

    </section>
  </div>
  </div>
<?php endwhile; ?>
<?php wp_reset_query(); ?>
</div>

<div id="store-locator" style="top:50px;position:relative;"></div>
