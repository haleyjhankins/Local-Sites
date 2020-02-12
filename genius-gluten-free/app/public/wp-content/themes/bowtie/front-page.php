<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bowtie
 */

$background = get_field('hero_background_image');

get_header(); ?>

<div class="hero <?php print get_field('hero_disabled') ? 'disabled' : ''; ?>">
  <div class="row">
		<div class="content">
			<?php if(get_field('headline')): ?>
			<h1 class="headline"><?php the_field('headline'); ?></h1>
			<?php endif; ?>
			<?php if(get_field('hero_copy')): ?>
			<p class="headline--description"><?php the_field('hero_copy'); ?></p>
			<?php endif; ?>

      <div class="quick-search--wrapper">
        <input type="tel" pattern="[0-9]*" maxlength="5" class="quick-search--field" placeholder="Enter your Zip Code" />
        <a class="button quick-search--submit">Find A Store</a>
      </div>
		</div>
  </div>
</div>

<main id="main" class="site-main" role="main">

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'components/content', 'page' ); ?>

	<?php endwhile; // End of the loop. ?>

	<?php get_template_part( 'components/content', 'blocks' ); ?>
	<?php get_template_part( 'components/styles', 'blocks' ); ?>

	<?php //get_sidebar(); ?>

</main><!-- #main -->

<script type="text/javascript" src="//www.google.com/jsapi"></script>

<?php if($background['type'] == 'image') { ?>
<style>
	.hero .row {
		background: url('<?php print wp_get_attachment_url($background['ID']); ?>') no-repeat center!important;
		background-size: cover!important;
	}
</style>
<?php } ?>

<?php get_footer(); ?>
