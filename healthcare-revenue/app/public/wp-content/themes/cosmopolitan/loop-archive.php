<?php /*** The loop that displays posts.***/ ?>

<?php $al_options = get_option('al_general_settings');?>
<?php if ( ! have_posts() ) : ?>
	<div id="post-0" class="post error404 not-found">
		<h1 class="entry-title"><?php _e( 'Not Found', 'Cosmopolitan' ); ?></h1>
		<div class="entry-content">
		<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'Cosmopolitan' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</div><!-- #post-0 -->
<?php endif; ?>

<?php $postcounter = 1; ?>
	

<div class="container_12" id="masonry-grid">    
 	
	<?php while ( have_posts() ) : the_post(); ?>
		
		<article <?php post_class('blogpost grid_6 masonry-item'); ?> id="post-<?php the_ID();?>">
			<div class="grid_6 omega">
				<div class="projectdetailssm">                                
					<div class="grid_6 omega"> 
						<?php $custom =  get_post_custom_values("_post_video") ?>
						
                        <?php if ($custom): ?>
                            <div class="shadowdetailsvideosm">
                                <div class="featuredimage">
                                    <?php echo do_shortcode ('[vimeo id="'.$custom[0].'" width="410" height="240" /]');?>
                                </div>
                            </div>
						<?php elseif(has_post_thumbnail()):?>
							<div class="shadowdetailssm">
								<div class="featuredimage">
									<div class="hover">
										<?php $full_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full', false); ?>
										<a href="<?php echo (isset ($custom) && $custom[0] !== '') ? 'http://vimeo.com/'.$custom[0] : $full_image[0]; ?>" title="<?php the_title()?>" data-rel="prettyPhoto">
											<?php the_post_thumbnail('blog-list', array('class'=>'')); ?>
										</a>
									</div>
								</div>
							</div>	
						<?php endif?>
						<!--Date-->
						<div class="grid_2_no_margin">
							<?php if($al_options['al_blog_show_date']): ?>
								   <h2><?php the_time('M jS'); ?></h2>
								   <h3><?php the_time('Y'); ?></h3>
								   <div class="clearextrasmall"></div>
							<?php endif?>
							<h5>
								<?php if($al_options['al_blog_show_author']): ?>
									<img src="<?php echo get_template_directory_uri() ?>/images/icons/user.png" alt="Author"/>
									<?php printf( __( 'By %1$s', 'Cosmopolitan' ),  get_the_author()) ?><br />
								<?php endif?>
								<?php if($al_options['al_blog_show_cats']): ?>
									<?php if ( count( get_the_category() ) ) : ?>
										<?php $category = get_the_category();  if($category[0]):?>
											<img src="<?php echo get_template_directory_uri() ?>/images/icons/tag.png" alt="Category"/><?php _e('Posted in ', 'Cosmopolitan') ?><a href="<?php echo get_category_link($category[0]->term_id )?>"><?php echo $category[0]->cat_name?></a><br />
										<?php endif?>
									<?php endif; ?>
								<?php endif?>
								<?php if( 'open' == $post->comment_status && $al_options['al_blog_show_comments']) : ?>
									<img src="<?php echo get_template_directory_uri() ?>/images/icons/comment.png" alt="Comments"/>
									<?php _e('Comments ', 'Cosmopolitan') ?><?php comments_popup_link('0', '1', '%'); ?><br />
								<?php endif; ?>
							</h5>
						</div>
						<div class="grid_4 blog-article-desc">         
							<!--Title-->
							<h4><?php the_title(); ?></h4>                                                     
							<!--Description-->
							<p><?php echo  get_the_excerpt(); ?></p> 
							<div><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %1$s', 'Cosmopolitan' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark" class="button light small"><?php _e('Read more', 'Cosmopolitan')?></a></div>                
						</div>
						<div class="clearnospacing"></div>
					</div>
					<div class="clearnospacing"></div>
				</div>
			</div>
		</article>
		<!--End Blog Post-->
		
	<?php $postcounter++; endwhile; // End the loop. Whew. ?>
	
	<div class="clearnospacing"></div>
	</div>
	<div class="container_12 paddingleft">
	<?php if ( $wp_query->max_num_pages > 1 ) :
	   include(Cosmopolitan_PLUGINS . '/wp-pagenavi.php' );
	   if(function_exists('wp_pagenavi')) { wp_pagenavi(); }
	?>
	<div class="clearnospacing"></div>
	<?php endif?>
</div>

