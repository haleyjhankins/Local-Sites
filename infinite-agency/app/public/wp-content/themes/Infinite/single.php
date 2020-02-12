<?php get_header(); ?>

<div id="content">

	<?php if ( has_post_thumbnail() ) {
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
		$bg_image = $thumb['0'];
	} ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<section id="top-section" style="background: url(<?php echo $bg_image ?>) no-repeat center !important; background-size: cover !important;">
			<div class="outer">
				<div class="inner">
					<div class="row">
						<div class="large-12">
							<h1 class="page-title" style="color: <?php the_field('title_color'); ?> !important" itemprop="headline"><?php the_title(); ?></h1>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="section" style="margin-top:50px;margin-bottom:100px; padding: 0 10px;">
			<div class="row">
				<div class="large-12 text-justify">
					<?php the_content(); ?>
				</div>
			</div>


			<div class="row blog-pagination">
				<div class="small-4 columns previous">
					<div class="outer">
						<div class="inner">
							<?php previous_post_link('%link', '<img src="/wp-content/themes/Infinite/images/blog-left.png"> Previous Post', TRUE); ?>
						</div>
					</div>
				</div>
				<div class="small-4 columns text-center">
					<a href="/community"><img src="/wp-content/themes/Infinite/images/blog-back.png" title="Best Place to Work in Dallas" alt="Best Place to Work in Dallas"></a>
				</div>
				<div class="small-4 columns next">
					<div class="outer">
						<div class="inner">
							<?php next_post_link('%link', 'Next Post <img src="/wp-content/themes/Infinite/images/blog-right.png">', TRUE); ?>
						</div>
					</div>
				</div>
			</div>
		</section>

	<?php endwhile; ?>


<?php endif; ?>


</div> <!-- end #content -->


<?php get_footer(); ?>