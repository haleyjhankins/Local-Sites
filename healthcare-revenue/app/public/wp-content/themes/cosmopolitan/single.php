<?php
/**
 * The Template for displaying all single posts.
 */

get_header(); ?>
<?php $al_options = get_option('al_general_settings'); ?>	

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
<div class="pagecontents">
	<div class="container_12">
    	<!--Start Main Contents-->
    	<div class="grid_12_no_margin">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                <article <?php post_class('projectdetails'); ?> id="post-<?php the_ID();?>">
                    <div class="grid_3_no_margin">
						<?php if($al_options['al_blog_show_date']): ?>
						   <h2><?php the_time('M jS'); ?></h2>
						   <h3><?php the_time('Y'); ?></h3>
						   <div class="clearextrasmall"></div>
						<?php endif?>
                        <h5>
							<?php if($al_options['al_blog_show_author']): ?>
                                <p class="single-author"><?php printf( __( 'By <span>%1$s</span>', 'Cosmopolitan' ),  get_the_author()) ?></p>
                            <?php endif?>
                            <?php if($al_options['al_blog_show_cats']): ?>
                                <?php if ( count( get_the_category() ) ) : ?>
                                    <?php $category = get_the_category();  if($category[0]):?>
                                        <?php _e('Posted in ', 'Cosmopolitan') ?><a href="<?php echo get_category_link($category[0]->term_id )?>"><?php echo $category[0]->cat_name?></a><br />
                                    <?php endif?>
                                <?php endif; ?>
                            <?php endif?>
                            <?php if( 'open' == $post->comment_status && $al_options['al_blog_show_comments']) : ?>
                                <?php _e('Comments ', 'Cosmopolitan') ?><?php comments_popup_link('0', '1', '%'); ?><br />
                            <?php endif; ?>
                        </h5>
                    </div>
                                        
                    <div class="grid_9_no_margin"> 
                        <!--Image-->
                             <!--Image-->
                        <?php $custom =  get_post_custom_values("_post_video") ?>
                      
                        <?php if ($custom): ?>
                            <div class="shadowdetailsvideo">
                                <div class="featuredimage">
                                    <?php echo do_shortcode ('[vimeo id="'.$custom[0].'" width="670" height="380" /]');?>
                                </div>
                            </div>	
                        <?php endif?>
                                                                   
                        <div><?php the_content(); ?></div> 
                    </div>
                    <div class="clearnospacing"></div>
                </article>
            <!--End Project--> 
       		<?php endwhile; ?>  
            <div class="clearsmall"></div>  
            <?php comments_template( '', true ); ?>
            <?php $test = false; if ($test) {comment_form(); wp_link_pages( $args );} ?>
			<div class="clearsmall"></div>
       </div>
	</div>
</div>        

<?php get_footer(); ?>