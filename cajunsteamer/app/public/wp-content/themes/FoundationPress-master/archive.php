<?php get_header(); ?>
<style>
	.loc-active {
		background-color: #b21515!important;
		color: #fff!important;
	}
</style>
<section id="main" style="margin-top: -34px;">
<div class="row">
<!-- Row for main content area -->
	<div class="medium-12 large-centered columns text-center" role="main">
	<div class="blog-buttons">
		<a class="button <?php if(is_category('franklin')) { echo 'loc-active';  }?>" href="http://cajunsteamer.com/category/franklin/">franklin</a><a class="button <?php if(is_category('hoover')) { echo 'loc-active';  }?>" href="http://cajunsteamer.com/category/hoover/">hoover</a><a class="button <?php if(is_category('longview')) { echo 'loc-active';  }?>" href="http://cajunsteamer.com/category/longview/">longview</a><a class="button <?php if(is_category('trussville')) { echo 'loc-active';  }?>" href="http://cajunsteamer.com/category/trussville/">trussville</a><a class="button <?php if(is_category('huntsville')) { echo 'loc-active';  }?>" href="http://cajunsteamer.com/category/huntsville/">huntsville</a>
	</div>
	<?php if ( have_posts() ) : ?>

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php the_excerpt(); ?>
			<p> <a href="<?php the_permalink() ?>" class="button">Read More</a></p>
		<?php endwhile; ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>

	<?php endif; // end have_posts() check ?>

	<?php /* Display navigation to next/previous pages when applicable */ ?>
	<?php if ( function_exists('FoundationPress_pagination') ) { FoundationPress_pagination(); } else if ( is_paged() ) { ?>
		<nav id="post-nav">
			<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'FoundationPress' ) ); ?></div>
			<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'FoundationPress' ) ); ?></div>
		</nav>
	<?php } ?>

	</div>
	</section>
</div>
<?php get_footer(); ?>


