<?php
	/* Template Name: Home Page (Full Width) */
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



<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	
    <!--Page Content-->
    <div class="pagecontents_margin">
        <div class="container_12">  
            <div class="fullwidth paddingleft">     
                <?php the_content(); ?>
            </div>
        </div>
    </div>
    <!--End Page Content-->
<?php endwhile; ?> 
     
<?php get_footer(); ?>