<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package buckhead
 */


 while(the_flexible_field('blocks')):
 $disabled = get_sub_field('disable_block');
 $get_row_layout = get_row_layout();
 $width = get_sub_field('width');
 $height = 'height-'.get_sub_field('height');
 $padded = get_sub_field('padding') ? 'padded' : '';
 $id = get_sub_field('custom_id') ? get_sub_field('custom_id') : 'block-'.get_row_index();
 $fixed_pane = get_sub_field('fixed_pane');
 $background_color = get_sub_field('select_brand_color');

 $classes = implode(' ', array(
   $get_row_layout,
   $height,
   $padded,
   get_sub_field('additional_classes'),
	 ($background_color ? 'bg-'.$background_color : ''),
   ($get_row_layout == 'cta' ? 'padded flex-center': ''),
 ));
 $row_classes = implode(' ', array(
	 ($width[0] == 'full' ? 'expanded' : ''),
	 ($get_row_layout == 'cta' ? 'text-center': ''),
 ));
?>
  <?php if(!$disabled): ?>
	<section class="block <?php print $classes;  ?>" id="<?php print $id; ?>">
		<div class="row small-12 <?php print $row_classes; ?>">
			<?php if($get_row_layout == 'full'): ?>
			<div class="column">
				<?php the_sub_field('content'); ?>
			</div>
		  <?php elseif($get_row_layout == 'photo_and_text'): ?>
				<div class="medium-10 medium-centered flex-center">
					<?php if(get_sub_field('photo')): ?><div class="photo"><img src="<?php print get_sub_field('photo')['sizes']['large']; ?>" /></div><?php endif; ?>
					<div class="content">
						<?php the_sub_field('content'); ?>
					</div>
				</div>
    <?php elseif($get_row_layout == 'cta'): ?>
      <div>
        <h1 class="text-white push-down-single"><?php print get_sub_field('title'); ?></h1>
        <?php if(get_sub_field('button_link')): ?><a href="<?php print get_sub_field('button_link'); ?>" class="button"><?php print get_sub_field('button_text'); ?></a><?php endif; ?>
      </div>
    <?php elseif($get_row_layout == 'masked_content'): ?>
			<div class="mask--cloud">
				<div class="mask--content">
					<h1 class="headline"><?php print get_sub_field('masked_headline'); ?></h1>
					<p class="headline--description"><?php print get_sub_field('masked_content'); ?></p>
				</div>
			</div>
    <?php elseif($get_row_layout == 'quote'): ?>
			<div class="medium-8 medium-centered">
				<h2 class="headline text-center"><?php print get_sub_field('headline'); ?></h2>
				<div class="text--quote text--white"><span><?php print get_sub_field('quote'); ?></span></div>
			</div>
    <?php elseif($get_row_layout == 'recipes'): ?>
      <?php get_template_part( 'components/recipes' ); ?>
    <?php elseif($get_row_layout == 'location_finder'): ?>
      <?php get_template_part( 'components/location-finder' ); ?>
    <?php elseif($get_row_layout == 'products'): ?>
      <?php get_template_part( 'components/products' ); ?>
	  <?php endif; ?>
		</div>
	</section>
  <?php endif; // if disabled ?>
<?php endwhile; ?>
