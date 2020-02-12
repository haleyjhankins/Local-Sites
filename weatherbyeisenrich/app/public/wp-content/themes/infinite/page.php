<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Hijacked
 */

get_header(); ?>

	<div id="primary" class="content-area">

		<?php get_template_part( 'content-parts/content', 'section' ); ?>

		<?php
			if(is_page('26')) {
		?>
			<div class="row">
				<div class="small-12 columns">
					<div id="monday-morning-markets"></div><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';js=d.createElement(s);js.id=id;js.src=p+'://www.mondaymorningmarkets.com/widget/5771916a4251f4724d407c0b';fjs.parentNode.insertBefore(js,fjs);}(document,'script','mmm-js');</script>
				</div>
			</div>
		<?php

			}
		 ?>

	</div><!-- #primary -->

<?php get_footer(); ?>
