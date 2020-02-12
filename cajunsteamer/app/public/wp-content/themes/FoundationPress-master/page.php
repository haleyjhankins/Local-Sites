<?php get_header(); ?>
<header id="subpage-hero" role="banner" style="background: url('http://cajunsteamer.com/wp-content/themes/FoundationPress-master/img/events-header-bg.jpg') center bottom; background-size: cover; min-height:280px; margin-top:-32px;">
        <div class="large-12 columns">

		</div>
</header>

<div class="row">
	<div class="medium-12 columns" role="main">
		<a class="button" href="http://cajunsteamer.com/category/franklin/">franklin</a><a class="button" href="http://cajunsteamer.com/category/hoover/">hoover</a><a class="button" href="http://cajunsteamer.com/category/longview/">longview</a><a class="button" href="http://cajunsteamer.com/category/trussville/">trussville</a>

	<?php do_action('foundationPress_before_content'); ?>
	
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>
			<img class="aligncenter" src="http://cajunsteamer.com/wp-content/uploads/2014/05/dots.png" alt="dots" />
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
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>