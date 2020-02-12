<?php
/**
 * @package Hijacked
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

<?php if (is_front_page()) { ?>
<section class="banner-image cover show-for-touch" style="background: url('/wp-content/themes/hijacked-child/assets/img/header-image.jpg') no-repeat;">
	<div class="outer">
		<div class="inner">
			<div class="row">

			</div>
		</div>
	</div>
</section>
<?php } elseif (is_home()){ ?>

<section class="banner-image cover sm-pv4 md-pv7" style="background: url('/wp-content/themes/hijacked-child/assets/img/header-image.jpg') no-repeat;">
	<?php //the_post_thumbnail( 'featured-thumb' ); ?>
	<div class="outer">
		<div class="inner">
			<div class="row">
				<div class="medium-12 columns">
					<h3 class="white">Blog</h3>
				</div>
			</div>
		</div>
	</div>

</section>

<?php } else { ?>


<section class="banner-image cover sm-pv4 md-pv7" style="background: url('<?php echo $featured_image; ?>') no-repeat;">
	<?php //the_post_thumbnail( 'featured-thumb' ); ?>
	<div class="outer">
		<div class="inner">
			<div class="row">
				<div class="medium-12 columns">
					<h3 class="white"><?php the_title(); ?></h3>
				</div>
			</div>
		</div>
	</div>

</section>

<?php } ?>
