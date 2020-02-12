<?php get_header(); ?>

<div id="content" class="clearfix row">

	<div id="main" class="large-12 columns clearfix" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

				<header>
					<div class="large-6 medium-6 columns">
						<?php the_post_thumbnail( 'wpbs-featured' ); ?>
						<h2 class="single-title staff-single-title" itemprop="headline"><?php the_title(); ?></h2>
						<h2 class="staff-single-title"><?php the_field('position'); ?></h2>
						<h6><?php the_field('location'); ?></h6>
						<h6><a href="<?php the_field('email'); ?>"><?php the_field('email'); ?></a></h6>
						<a href="/contact-us/our-staff/" class="hide-for-small"><img src="/wp-content/themes/Infinite/images/back-arrow.png" class="back-arrow"><h2 class="single-title staff-single-title inline-header">Back</h2></a>
					</div>
					<div class="large-6 medium-6 columns">
						<p><?php the_field('bio'); ?></p>
						<a href="/contact-us/our-staff/" class="hide-for-medium-up"><img src="/wp-content/themes/Infinite/images/back-arrow.png" class="back-arrow"><h2 class="single-title staff-single-title inline-header">Back</h2></a>
					</div>

				</header> <!-- end article header -->

				<section class="post_content large-12 columns clearfix" itemprop="articleBody">
					


				</section> <!-- end article section -->


			</article> <!-- end article -->

		<?php endwhile; ?>			

	<?php else : ?>


	<?php endif; ?>

</div> <!-- end #main -->

</div> <!-- end #content -->

<?php get_footer(); ?>
