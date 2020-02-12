<?php
/*
Template Name: Full Width
*/
get_header(); ?>
<header id="subpage-hero" role="banner" style="background: url('http://cajunsteamer.wpengine.com/wp-content/themes/FoundationPress-master/img/gallery-header-bg.jpg'); background-size: cover; min-height:280px; margin-top:-32px;">
        <div class="large-12 columns">

		</div>
</header>

<div class="row">
	<div class="small-12 large-12 columns" role="main">
	
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			<footer>
				<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'FoundationPress'), 'after' => '</p></nav>' )); ?>
				<p><?php the_tags(); ?></p>
			</footer>
			<?php comments_template(); ?>
		</article>
	<?php endwhile; // End the loop ?>

	</div>
</div>
		
<?php get_footer(); ?>