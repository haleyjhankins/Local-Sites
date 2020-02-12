<?php
/**
 * Portfolio Single Posts template.
 */

get_header(); ?>

<?php  $al_options = get_option('al_general_settings'); ?>
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
<div class="divider_shadow"></div>
<!--Page Content-->
<div class="pagecontents">
	<div class="container_12">
    	<div class="grid_12_no_margin">
			<?php if ( have_posts() ) while ( have_posts() ) :   the_post();  
				$custom = get_post_custom($post->ID); ?>
				<!--Project-->
                <div class="projectdetails">
                    <div class="grid_3_no_margin">
                        <h2><?php the_title()?></h2>
                        <h3>
                        	<?php 
								$categories =  get_the_terms($post->ID, 'portfolio_category'); 
								foreach ($categories as $category)
								{
									echo $category->name; 
								}
							?>
                        </h3>
                        <div class="clearextrasmall"></div>
                        <?php  if (isset($custom['_portfolio_additional_info'][0])):?>
							<h5><?php echo do_shortcode ($custom['_portfolio_additional_info'][0]) ?></h5>
                        <?php endif ?>
                        
                    </div>
                   			
                    <div class="grid_9_no_margin"> 
                    	<?php the_content();  ?>                              
                    </div>
                    
                    <div class="clearnospacing"></div>
                </div>
                <!--End Project--> 
            <?php  endwhile ?>    
        </div>        
        <div class="clearnospacing"></div> 
	</div>
</div>        
<?php get_footer(); ?>