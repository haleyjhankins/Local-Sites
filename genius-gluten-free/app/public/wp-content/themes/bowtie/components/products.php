<?php
	$args = array(
		'post_type' => 'product',
		'posts_per_page' => -1,
	);

	$loop = new WP_Query($args);
?>

<?php while($loop->have_posts()): $loop->the_post(); ?>
  <div class="product" id="product--<?php print get_the_id(); ?>">
    <div class="product--content">
      <h2><?php print get_the_title(); ?></h2>
      <p><?php print get_field('preview_description'); ?></p>
      <a href="#" class="button button--hollow open-modal" data-target="#modal--product-<?php print get_the_id(); ?>">Learn More</a>
    </div>
    <div class="product--photo bg-<?php print_r(get_field('select_brand_color')); ?>">
      <?php if(get_field('image')) { ?>
        <img src="<?php print get_field('image'); ?>" class="product--photo-offsett" />
      <?php } ?>
    </div>

		<div class="modal--wrapper" id="modal--product-<?php print get_the_id(); ?>">
		<div class="modal modal--product">
			<header class="modal--header bg-<?php print get_field('select_brand_color'); ?>">
				<a href="#" class="close" data-close>Close</a>
				<h3 class="modal--title text--white"><?php print get_the_title(); ?></h3>
				<p class="modal--description"><?php print get_field('short_description'); ?></p>
				<p class="modal--description-bite-size"><?php print get_field('bite_size_description'); ?></p>
				<div class="modal--image"><img src="<?php print get_field('image'); ?>" /></div>
			</header>
			<section class="modal--content">
				<div class="row">
					<div class="medium-6 columns">
						<?php if(get_field('what_makes_it_great')): ?>
						<h4>What makes it great?</h4>
						<p><?php print get_field('what_makes_it_great'); ?></p>
						<?php endif; ?>

						<?php if(get_field('great_things')): ?>
						<div class="great-things">
						<?php foreach(get_field('great_things') as $thing) { ?>
							<?php print do_shortcode('[icon id="'.$thing['value'].'"]'); ?>
						<?php } ?>
						</div>
						<?php endif; ?>

						<?php if(get_field('ingredients')): ?>
						<div class="row">
							<div class="small-12 columns">
								<h4>Ingredients</h4>
								<?php print get_field('ingredients'); ?>
							</div>
						</div>
						<?php endif; ?>
					</div>
					<div class="medium-6 columns">
						<?php if(have_rows('nutritional_information')): ?>
						<table class="table table--nutritional-information">
							<thead>
								<tr>
									<th colspan="3">Nutritional Information</th>
								</tr>
								<tr>
									<th></th>
									<th>Amount Per Serving</th>
									<th>% Daily Value</th>
								</tr>
							</thead>
							<tbody>
								<?php while(have_rows('nutritional_information')): the_row(); ?>
								<tr>
									<td><?php print get_sub_field('nutrient'); ?></td>
									<td><?php print get_sub_field('amount'); ?></td>
									<td><?php print get_sub_field('daily_value_%'); print get_sub_field('daily_value_%') || get_sub_field('daily_value_%') == '0' ? '%' : '' ?></td>
								</tr>
								<?php	endwhile; ?>
							</tbody>
						</table>
						<p>*Percent daily values are based on a 2,000 calorie diet. Your daily value may be higher or lower depending on your calorie needs.</p>
						<?php endif; ?>
					</div>
				</div>
			</section>
		</div>
		</div>
  </div>
<?php endwhile; ?>
<?php wp_reset_query(); ?>
