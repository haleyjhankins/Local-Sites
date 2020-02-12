<?php
/**
 * @package Prowl
 */
?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php if (has_post_thumbnail( $post->ID ) ): ?>
		<?php $image_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
				$featured_image = $image_src[0]; ?>
		<?php else :
				$featured_image = get_bloginfo( 'stylesheet_directory') . '/assets/img/header-image.jpg'; ?>
	<?php endif; ?>
<?php endwhile; ?>
<!-- post navigation -->
<?php else: ?>
<!-- no posts found -->
<?php endif; ?>

<section class="banner-image cover" style="background: url('<?php echo $featured_image; ?>') no-repeat;">
	<?php //the_post_thumbnail( 'featured-thumb' ); ?>
	<div class="outer">
		<div class="inner">
		<div class="row">
			<div class="medium-12 columns">
				<h1 class="white text-center"><?php the_title(); ?></h1>
			</div>
		</div>
		</div>
	</div>

</section>
