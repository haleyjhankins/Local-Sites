<?php /* Template Name: Blog */

get_header();
$catid = get_query_var('cat');
$cat = &get_category($catid);

?>
<div class="clearnospacing"></div>
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
<!--Page Content-->
<div class="pagecontents">
	
		<?php 
            $temp = $wp_query;
            $wp_query= null;
            $wp_query = new WP_Query();
            $pp = get_option('posts_per_page');
            $wp_query->query('posts_per_page='.$pp.'&paged='.$paged);			
     	    get_template_part( 'loop', 'index' );
        ?>
    
    <div class="clearsmall"></div>
</div>
<?php get_footer();?>