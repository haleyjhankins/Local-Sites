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

<?php get_template_part( 'content-parts/content', 'slider' ); ?>

	<div id="primary" class="content-area">

		<?php get_template_part( 'content-parts/content', 'section' ); ?>

	</div><!-- #primary -->

<?php get_footer(); ?>
