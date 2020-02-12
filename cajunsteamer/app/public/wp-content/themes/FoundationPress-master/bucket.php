<?php
/*
Template Name: Bucket in Header
*/
get_header('sub'); ?>


<header id="subpage-hero" role="banner" style="background: url('http://cajunsteamer.com/wp-content/themes/FoundationPress-master/img/bucket-header-bg.jpg'); background-size: cover; min-height:280px; margin-top:-32px;">
        <div class="large-12 columns">
<?php if ( has_post_thumbnail() ) {
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
		$bg_image = $thumb['0'];
	} ?>
		</div>
</header>




  <section id="main">
      
      <div class="row">
		<div class="small-12 large-12 columns" role="main">
		
		<?php do_action('foundationPress_before_content'); ?>
		
		<?php while (have_posts()) : the_post(); ?>
			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<header>
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header>
				<?php do_action('foundationPress_page_before_entry_content'); ?>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
				<footer>
					<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'FoundationPress'), 'after' => '</p></nav>' )); ?>
					<p><?php the_tags(); ?></p>
				</footer>
				<?php do_action('foundationPress_page_before_comments'); ?>
				<?php comments_template(); ?>
				<?php do_action('foundationPress_page_after_comments'); ?>
			</article>
		<?php endwhile;?>

		<?php do_action('foundationPress_after_content'); ?>

		</div>
  </section>

	

</div>		
<?php get_footer('sub'); ?>