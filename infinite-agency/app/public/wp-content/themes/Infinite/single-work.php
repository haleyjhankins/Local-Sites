<?php get_header(); ?>

<div id="content">

	<?php if ( has_post_thumbnail() ) {
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
		$bg_image = $thumb['0'];
	} ?>

	<section id="top-section" style="background: url(<?php echo $bg_image ?>) no-repeat center !important; background-size: cover !important;">
		<div class="outer">
			<div class="inner">
				<div class="row">
					<div class="large-12">
						<h1 class="page-title" style="color: <?php the_field('title_color'); ?> !important" itemprop="headline"><?php the_title(); ?></h1>
						<p class="large-6 white text-left" style="color: <?php the_field('title_color'); ?> !important"><?php the_field('sub_title_paragraph'); ?></p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php

	$the_query = new WP_Query( 'post_type=work' );

	if ( $the_query->have_posts() ) { ?>

	<?php if( get_field('section') ): ?>

		<?php while( has_sub_field('section') ): ?>

			<?php 
			$section_bg = get_sub_field('background_image');

			$section_bg_color = get_sub_field('background_color');
			?>

			
			<section class="section" style="background: <?php echo $section_bg_color; ?> url('<?php echo $section_bg; ?>') no-repeat center; background-size: cover; background-attachment: fixed;">
				
						<div class="row">
							<div class="large-10 large-offset-1 text-center">
								<?php the_sub_field('section_content'); ?>
							</div>
						</div>
					
			</section>

		<?php endwhile; ?>

	<?php endif; ?>

	<?php } else {

	}

	wp_reset_postdata(); ?>

</div> <!-- end #content -->


<?php get_footer(); ?>