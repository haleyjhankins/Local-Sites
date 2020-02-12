<?php
/*** The template for displaying Archive pages. **/

get_header(); ?>


<?php $promo = get_post_meta($post->ID, "_promo", $single = false);?>

<!-- Title and promo text -->
<div class="pagebgd">
	<div class="container_12">
		<div class="grid_6_no_margin">
    		<div class="pagetitle">
            	<?php if ( is_day() ) : ?>
					<?php printf( __( 'Daily Archives: <span>%s</span>', 'Cosmopolitan' ), get_the_date() ); ?>
                <?php elseif ( is_month() ) : ?>
                    <?php printf( __( 'Monthly Archives: <span>%s</span>', 'Cosmopolitan' ), get_the_date('F Y') ); ?>
                <?php elseif ( is_year() ) : ?>
                    <?php printf( __( 'Yearly Archives: <span>%s</span>', 'Cosmopolitan' ), get_the_date('Y') ); ?>
                <?php elseif ( is_category() ) : ?>
                    <?php single_cat_title();?>
                <?php else : ?>
                    <?php _e( 'Blog Archives', 'Cosmopolitan' ); ?>
                <?php endif; ?>
            </div>
    	</div>
    	<div class="grid_6_no_margin">
    		 <?php get_search_form(); ?>
    	</div>
        <div class="clearnospacing"></div>
	</div>
</div>
<div class="divider_shadow"></div>
<!-- Page Contents -->
<div class="pagecontents">
	<div class="container_12" id="masonry-grid">
    	
		<?php
			if ( have_posts() ) the_post();
			rewind_posts();    
			get_template_part( 'loop-archive', 'archive' );
        ?>
    </div>
</div>

<?php get_footer(); ?>
