<?php
/*
Template Name: Menu-OLD
*/
get_header('sub'); ?>

<style>
	.tabs dd {
		float: none !important;
	}
	.tabs {
		text-align: center;
	}
</style>

<header id="subpage-hero" role="banner" class="menu-top">
	<div class="large-12 columns">
		<?php if ( has_post_thumbnail() ) {
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
			$bg_image = $thumb['0'];
		} ?>
	</div>
</header>
<div class="tin-bg"></div>




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

	<script>
		jQuery(document).ready(function($) {

			function getUrlParameter(sParam) {

				var sPageURL = window.location.search.substring(1);
				var sURLVariables = sPageURL.split('&');
				for (var i = 0; i < sURLVariables.length; i++) {
					var sParameterName = sURLVariables[i].split('=');

					if (sParameterName[0] == sParam) {
						return sParameterName[1];
					}
				}
			}
		var menu = getUrlParameter('menu');

		if (menu == 'cocktails') {
			$('.tabs dd').removeClass('active');
			$('.cocktails').addClass('active');
		};
	});
	</script>

</div>
<?php get_footer('sub'); ?>

