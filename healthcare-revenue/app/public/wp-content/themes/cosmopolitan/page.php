<?php /** The default template for pages. **/ ?>

<?php get_header(); ?>

<?php $al_options = get_option('al_general_settings');?>

<!-- Title -->
<!--<div class="pagebgd">
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
</div>-->

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
<!--<div class="divider_shadow"></div>-->
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    
    <div class="pagecontents_margin">
        <div class="container_12">
             <div class="fullwidth paddingleft">
            	<?php the_content(); ?>
			</div>
        </div>
    </div>
<?php endwhile; ?>	
    
<?php get_footer(); ?>