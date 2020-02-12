<?php /* Template Name: Blog (with Sidebar) */

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

<!--Page Content-->

<div class="pagecontents">
	<div class="container_12">
    	<div class="grid_9 paddingleft">
            <ul id="list" class="image-grid with-sidebar-col alternate-blog-list">
				<?php 
                    $temp = $wp_query;
                    $wp_query= null;
                    $wp_query = new WP_Query();
                    $pp = get_option('posts_per_page');
                    $wp_query->query('posts_per_page='.$pp.'&paged='.$paged);			
                    get_template_part( 'loop2', 'index' );
                    //wp_reset_postdata();
                ?>
            </ul>
        </div>
        <aside class="grid_3 sidebarright alignright">
		   <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Global Sidebar") ) : ?> <?php   endif;?>
        </aside> 
        <div class="clearfix"></div>
 	</div>   
</div>
<?php get_footer();?>