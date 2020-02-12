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
	$featured_image = null; ?>
<?php endif; ?>
<?php endwhile; ?>
<!-- post navigation -->
<?php else: ?>
	<!-- no posts found -->
<?php endif; ?>

<?php if ($featured_image != null) { ?>

<section class="banner-image cover sm-pv4 md-pv7" style="background: url('<?php echo $featured_image; ?>') no-repeat center center;">

</section>

<?php } ?>
