<?php /** The default template for pages. **/ ?>

<?php get_header(); ?>
<div class="pagecontents">
	<div class="container_12 paddingleft" id="masonry-grid">	
		<?php  get_template_part( 'loop', 'index' ); ?>
        <div class="clearnospacing"></div>
    </div>
</div>

<?php get_footer(); ?>
