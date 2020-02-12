<?php
	/* Template Name: Home Page (with Blog) */
	get_header();
?>

<?php
$al_options = get_option('al_general_settings'); 
$slider = isset($al_options['al_active_slider']) && $al_options['al_active_slider'] !='' ? $al_options['al_active_slider'] : 'nivo';
//$slider = isset($_GET['slider_type']) ? $_GET['slider_type'] : 'nivo';
if ($slider)
{
	include('sliders/'.$slider.'/slider.php');
	wp_reset_query();
}

// Include Promo text
$promo = get_post_meta($post->ID, "_promo", $single = false); ?>
<?php if(!empty($promo[0]) ):?>
     <div class="calloutcontainer">
        <div class="container_12">
            <div class="grid_12">            
                <?php echo do_shortcode($promo[0]);?>
            </div>
        </div>
    </div>  
<?php endif?>

<!-- Include homepage widgets -->
<?php if ($al_options['al_homepage_widgets']): ?>	
    <div class="box_background">
		<div class="divider_shadow_box"></div>
        <div class="container_12">
            <div class="grid_12 nomargin homepage-widget-container">
                <?php
                for($i = 1; $i<= 4; $i++){
                 	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Homepage Widget ".$i) ) :endif;
                }	
                ?>       
            </div>    
            <div class="clearnospacing"></div>
        </div>		
        <div class="divider_shadow_reverse"></div>
    </div>
<?php endif;?>

<!--Page Content-->
<div class="pagecontents_margin">
	<div class="container_12" id="masonry-grid">
	
		<?php 
        	$pp = get_option('posts_per_page');
		
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			if ( get_query_var('paged') ) {
				$paged = get_query_var('paged');
			} elseif ( get_query_var('page') ) {
				$paged = get_query_var('page');
			} else {
				$paged = 1;
			}
			query_posts( array( 'post_type' => 'post', 'posts_per_page'=> $pp, 'paged' => $paged ) );
			
			get_template_part( 'loop-archive', 'index' );
		?>      
	</div>
</div>
<!--End Page Content-->
<?php get_footer(); ?>		