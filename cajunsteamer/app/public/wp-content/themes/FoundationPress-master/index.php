<?php get_header(); ?>
 <section id="main">

<header id="subpage-hero" role="banner" class="events-top">
        <div class="large-12 columns">

		</div>
</header>

<div class="row">
	<div class="medium-12 columns" role="main">
		<?php if ( has_post_thumbnail() ): ?>
				<div class="row">
					<div class="column">
						<?php the_post_thumbnail(); ?>
					</div>
				</div>
			<?php endif; ?>
	<?php if ( have_posts() ) : ?>
		
		<?php do_action('foundationPress_before_content'); ?>
	
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', get_post_format() ); ?>
		<?php endwhile; ?>
		
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		
		<?php do_action('foundationPress_before_pagination'); ?>
		
	<?php endif;?>
	
	
	
	<?php if ( function_exists('FoundationPress_pagination') ) { FoundationPress_pagination(); } else if ( is_paged() ) { ?>
		<nav id="post-nav">
			<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'FoundationPress' ) ); ?></div>
			<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'FoundationPress' ) ); ?></div>
		</nav>
	<?php } ?>
	
	<?php do_action('foundationPress_after_content'); ?>
	
	</div>
	</section>

</div>	
<?php get_footer(); ?>