<?php
/* Template Name: With Sidebar (Left) */
?>
<?php get_header(); ?>

<!-- Title -->
<div class="pagebgd">
	<div class="container_12">
		<div class="grid_6_no_margin">
    		<div class="pagetitle">
            	<?php if(class_exists('the_breadcrumb') ){ $bc = new the_breadcrumb;} ?>
            </div>
    	</div>
    	<div class="grid_6_no_margin">
    		 <?php get_search_form(); ?>
    	</div>
	</div>
</div>

<?php $promo = get_post_meta($post->ID, "_promo", $single = false);?>
<?php if(!empty($promo[0]) ):?>
   <div class="calloutcontainer">
		<div class="container_12">
			<div class="grid_12">            
				<?php echo do_shortcode($promo[0]);?>
			</div>
		</div>
	</div>    
<?php endif?>
<div class="divider_shadow"></div>
  
<div class="pagecontents">
	<div class="container_12">
		<aside class="grid_3 sidebarleft alignleft">
			<?php generated_dynamic_sidebar() ?>
		</aside>
		<div class="grid_9 paddingleft omega">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>	
		</div>
		<div class="clear"></div>
	</div>
</div>



<?php get_footer(); ?>