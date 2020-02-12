<?php
/**
 * @package Hijacked
 */
?>

<?php $image_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
		$featured_image = $image_src[0]; ?>

<div class="row white-bg mb5">

	<div class="small-12 cover" style="background:url('<?php echo $featured_image; ?>') no-repeat center; height: 300px;">
	</div>

	<div class="medium-10 columns medium-centered pt3 pb5">
		<header class="entry-header">
			<h3 class="primary-text mb1"><?php the_title( ); ?></h3>

			<div class="entry-meta">
				<p class="user-icon mr3 dib only-sm-db pos-rel primary-text">Posted by <?php the_author( ); ?></p>
				<p class="calendar-icon mr3 dib only-sm-db pos-rel primary-text">On <?php the_date( ); ?></p>
				<p class="tag-icon mr3 dib only-sm-db pos-rel primary-text"><?php echo get_the_tag_list(' ', ', '); ?></p>
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->

		<div class="entry-content mt1 mb3">
			<?php the_excerpt(); ?>
		</div><!-- .entry-content -->

		<a href="<?php the_permalink(); ?>" class="button mb5">Read More</a>
	</div>
</div>