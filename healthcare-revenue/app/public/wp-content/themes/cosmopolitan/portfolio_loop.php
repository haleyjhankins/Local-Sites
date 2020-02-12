<?php 
	$page_template_name = get_post_meta($post->ID,'_wp_page_template',true); 
	$al_options = get_option('al_general_settings');
	$type = 1;
	
	// Check which layout was selected
	switch($page_template_name)
	{
		case 'portfolio-template-1col-filterable.php':
		$type = 1;	
		break;
		
		case 'portfolio-template-2cols-filterable.php':
		
		$type = 2;	
		break;
		
		case 'portfolio-template-masonry.php':
		$type = 3;	
		break;

		case 'portfolio-template-standard.php':
		$type = 4;	
		break;
		
		case 'portfolio-template-sidebar.php':
		$type = 5;	
		break;
		
		case 'portfolio-template-masonry2.php':
		case 'homepage-template4.php':
		$type = 6;	
		break;
		
	}
	$_SESSION['ptname'] = $page_template_name;
	$cats =  get_post_meta($post->ID, "_page_portfolio_cat", $single = true);
	
?>
<?php if ($type == 1 || $type == 2):?>
	<script type="text/javascript" src="<?php echo get_template_directory_uri()  ?>/js/jquery.quicksand.js"></script>
    <script type="text/javascript">
		jQuery(document).ready(function($){
			// Clone applications to get a second collection
			var $data = $(".portfolio-content").clone();
		
			//NOTE: Only filter on the main portfolio page, not on the subcategory pages
			$('.portfolio-main li').click(function(e) {
				$(".filter li").removeClass("active");	
				// Use the last category class as the category to filter by. This means that multiple categories are not supported (yet)
				var filterClass=$(this).attr('class');
				
				if (filterClass == 'all-projects') {
					var $filteredData = $data.find('.project');
				} else {
					//var $filteredData = $data.find('.project[data-type=' + filterClass + ']');
					var $filteredData = $data.find('li[data-type~=' + filterClass + ']');
				}
				$(".portfolio-content").quicksand($filteredData, 
					{
						duration: 800,
						easing: 'swing',
					},
					function() {
						hover_overlay();
						$("a[data-rel^='prettyPhoto']").prettyPhoto();
					}
				);		
				$(this).addClass("active"); 			
				return false;
			});
		});
    </script>
<?php endif?>


<?php if ($page_template_name != 'homepage-template4.php'):?>
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
	
	<!-- Promo text -->
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
<?php endif?>
<!--Page Content-->
<div class="pagecontents<?php if ($page_template_name == 'homepage-template4.php'):?>_margin<?php endif ?>">
	<div class="container_12">
    	<div class="clearnospacing"></div> 
			
        	<div class="grid_12_no_margin <?php if ($type == 3 || $type == 6 ):?>paddingleft<?php endif?>">
			<?php
               	$pageId = get_page_ID_by_page_template($page_template_name);
                echo getPageContent($pageId); 
            ?>
			<?php
            $loop = new WP_Query(array('post_type' => 'portfolio', 'posts_per_page' => 10)); 
            // If the number of items per page has been set
            if( get_post_meta($post->ID, "_page_portfolio_num_items_page", $single = true) != '' ) 
			{ 
                $items_per_page = get_post_meta($post->ID, "_page_portfolio_num_items_page", $single = false);
            } 
			else 
			{ // else don't paginate
                $items_per_page = 777;
            }
		
			?>		
            <!-- List categories if this options is allowed from admin panel. -->
           <?php if ($type == 1 || $type == 2):?>
                <div class="grid_2">
                <!--Gallery-->
                	<div class="portnav">
                        <ul class="portfolio-main filter">
                            <li class="active all-projects"><a href="#" title="<?php _e('All', 'Cosmopolitan')?>"><?php _e('All', 'Cosmopolitan')?></a></li> 
                            <?php 
							$cats = get_post_meta($post->ID, "_page_portfolio_cat", $single = true);
							$MyWalker = new PortfolioWalker();
							$args = array( 'taxonomy' => 'portfolio_category', 'hide_empty' => '0', 'include' => $cats, 'title_li'=> '', 'walker' => $MyWalker, 'show_count' => '1');
							$categories = wp_list_categories ($args);
							?>										
                        </ul>
                    </div>
                 </div>
            <?php elseif ($type == 5):?>
                <aside class="grid_3 sidebarleft alignleft" style="margin-left:0; padding-top:20px">
                   <?php generated_dynamic_sidebar() ?>
                </aside> 
        	<?php endif?>
     
			<?php 
            if( $cats == '' ) 
			{
                echo '<div class="portfolio-content">
                <p>'. _e('No categories selected. To fix this, please login to your WP Admin area and set the categories you want 
                    to show by editing this page and setting one or more categories in the multi checkbox field "Portfolio Categories".', 'Cosmopolitan').'
                    
                </p>
                </div>';
            } 
			else 
			{ 
                if ($type == 3 || $type==6):?>
                	<div id="masonry-grid">
				<?php
				elseif ($type == 2 || $type == 1 ):  
					?>	
                    <div class="grid_10 omega alignright">
						<ul id="list" class="image-grid <?php if ($type==2):?>threecol<?php else:?>twocol<?php endif?> portfolio-content">
                   <?php
				 elseif ($type == 5):  
					?>	
                    <div class="grid_9 alpha omega alignright paddingleft">
						<ul id="list" class="image-grid with-sidebar-col portfolio-content">
                   <?php
				
				endif;
				// If the user hasn't set a number of items per page, then use JavaScript filtering
                if( $items_per_page == 777 ) :
          	 	endif; 
            	
				
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				//  query the posts in selected terms
                $portfolio_posts_to_query = get_objects_in_term( explode( ",", $cats ), 'portfolio_category');
			
                if (!empty($portfolio_posts_to_query)):
				
					$wp_query = new WP_Query( array( 'post_type' => 'portfolio', 'orderby' => 'menu_order', 'order' => 'ASC', 'post__in' => $portfolio_posts_to_query, 'paged' => $paged, 'showposts' => $items_per_page[0] ) ); 
					$counter = 1;
					?>
					<?php if ($wp_query->have_posts()): $col3counter=1;  $col4counter=1;  ?>
                    	
                       
						<?php while ($wp_query->have_posts()) : 							
                            $wp_query->the_post();
                            $custom = get_post_custom($post->ID);
                            // Get the portfolio item categories
                            $cats = wp_get_object_terms($post->ID, 'portfolio_category');
							
                        
                            // If no category was assigned, don't show the item
                            if ( $cats ) :
                                $cat_slugs = '';
                                foreach( $cats as $cat ) {$cat_slugs .= $cat->slug . " ";}
                               // $cat_slugs = substr($cat_slugs, 0, -1);
							
								endif;
                            ?>
							
							<?php if ($type == 3): ?>
                                <!--Project-->
                                <div class="grid_6 masonry-item">
                                    <div class="projectdetailssm">                               
                                        <div class="grid_6_no_margin"> 
                                            <!--Image-->
                                            <div class="shadowdetailssm">
                                                <div class="featuredimage">                                                	
                                                    <div class="hover">
                                                        <span>
                                                            <?php if( !empty ( $custom['_portfolio_video'][0] ) ) : // Check if there's a video to be displayed in the lightbox when clicking the thumb ?>
                                                                <a href="<?php echo $custom['_portfolio_video'][0]; ?>" class="zoom-icon" title="<?php the_title(); ?>" data-rel="prettyPhoto">
                                                            <?php elseif( isset($custom['_portfolio_link'][0]) && $custom['_portfolio_link'][0] != '' ) : // User has set a custom destination link for this portfolio item ?>
                                                                <a href="<?php echo $custom['_portfolio_link'][0]; ?>" title="<?php the_title(); ?>">
                                                            <?php elseif(  isset( $custom['_portfolio_no_lightbox'][0] )  &&  $custom['_portfolio_no_lightbox'][0] !='' ) : // View the project details ?>
                                                                <a href="<?php the_permalink(); ?>">
                                                            <?php else : // open image in original size in the pretty photo lightbox ?>
                                                                <a href="<?php $full_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full', false); echo $full_image[0]; ?>" class="zoom-icon" title="<?php the_title(); ?>" data-rel="prettyPhoto">
                                                            <?php endif; ?>
                                                            	<?php the_post_thumbnail('blog-list', array('class' => 'cover')); ?>
                                                            </a>     
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="grid_2_no_margin masonry-list">
                                                <h2><?php the_title(); ?></h2>
                                                <h3>
													<?php 
														$categories =  get_the_terms($post->ID, 'portfolio_category'); 
														foreach ($categories as $category)
														{
															echo $category->name; 
														}
													?>
                                                </h3>
                                            </div>
                                            <div class="grid_4 padingright omega" style="width:270px">                       
                                               	<p><?php echo  limit_words(get_the_excerpt(), '30'); ?></p>
                                                <?php  if (isset($custom['_portfolio_additional_info'][0])):?>
													<h5><?php echo do_shortcode ($custom['_portfolio_additional_info'][0]) ?></h5>
                                                <?php endif ?>
                                               	<?php if( isset ($custom['_portfolio_readmore'][0]) && $custom['_portfolio_readmore'][0] == '1' ) :?>
													<div><a href="<?php the_permalink()?>" class="button light small"> <?php _e ('Read More', 'Cosmopolitan') ?></a></div> 
												<?php endif?>
                                            </div>
                                        </div>
                                        <div class="clearnospacing"></div>
                                    </div>
                                </div>
                                <!--End Project-->
                      		
                            <?php elseif ($type == 6): ?>
                                <!--Project-->
                                <div class="grid_4 masonry-item">
                                    <div class="projectdetailssm">                               
                                        <div class="grid_4_no_margin"> 
                                            <!--Image-->
                                            <div class="shadowdetailsextrasm">
                                                <div class="featuredimage">                                                	
                                                    <div class="hover">
                                                        <span>
                                                            <?php if( !empty ( $custom['_portfolio_video'][0] ) ) : // Check if there's a video to be displayed in the lightbox when clicking the thumb ?>
                                                                <a href="<?php echo $custom['_portfolio_video'][0]; ?>" class="zoom-icon" title="<?php the_title(); ?>" data-rel="prettyPhoto">
                                                            <?php elseif( isset($custom['_portfolio_link'][0]) && $custom['_portfolio_link'][0] != '' ) : // User has set a custom destination link for this portfolio item ?>
                                                                <a href="<?php echo $custom['_portfolio_link'][0]; ?>" title="<?php the_title(); ?>">
                                                            <?php elseif(  isset( $custom['_portfolio_no_lightbox'][0] )  &&  $custom['_portfolio_no_lightbox'][0] !='' ) : // View the project details ?>
                                                                <a href="<?php the_permalink(); ?>">
                                                            <?php else : // open image in original size in the pretty photo lightbox ?>
                                                                <a href="<?php $full_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full', false); echo $full_image[0]; ?>" class="zoom-icon" title="<?php the_title(); ?>" data-rel="prettyPhoto">
                                                            <?php endif; ?>
                                                            	<?php the_post_thumbnail('portfolio-thumb-masonry2', array('class' => 'cover')); ?>
                                                            </a>     
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="grid_4 paddingleft masonry-list">
                                            	<h4 class="paddingright"><?php the_title(); ?></h4>
                                               	<p class="paddingright"><?php echo  limit_words(get_the_excerpt(), '30'); ?></p>
                                              	<?php  if (isset($custom['_portfolio_additional_info'][0])):?>
													<h5><?php echo do_shortcode ($custom['_portfolio_additional_info'][0]) ?></h5>
                                                <?php endif ?>
												<?php if( isset ($custom['_portfolio_readmore'][0]) && $custom['_portfolio_readmore'][0] == '1' ) :?>
													<div><a href="<?php the_permalink()?>" class="button light small"> <?php _e ('Read More', 'Cosmopolitan') ?></a></div>                
												<?php endif?>
											</div>
                                        </div>
                                        <div class="clearnospacing"></div>
                                    </div>
                                </div>
                                <!--End Project-->
                            
                           
                            <?php elseif ($type == 2 || $type == 1 || $type == 5):  ?>
                                <li data-id="post-<?php echo $counter ?>" data-type="<?php echo $cat_slugs?>" class="project">
                                   	<div class="hover">
                                        <span>
                                            <?php if( !empty ( $custom['_portfolio_video'][0] ) ) : // Check if there's a video to be displayed in the lightbox when clicking the thumb ?>
                                                <a href="<?php echo $custom['_portfolio_video'][0]; ?>" class="zoom-icon" title="<?php the_title(); ?>" data-rel="prettyPhoto">
                                            <?php elseif( isset($custom['_portfolio_link'][0]) && $custom['_portfolio_link'][0] != '' ) : // User has set a custom destination link for this portfolio item ?>
                                                <a href="<?php echo $custom['_portfolio_link'][0]; ?>" title="<?php the_title(); ?>">
                                            <?php elseif(  isset( $custom['_portfolio_no_lightbox'][0] )  &&  $custom['_portfolio_no_lightbox'][0] !='' ) : // View the project details ?>
                                                <a href="<?php the_permalink(); ?>">
                                            <?php else : // open image in original size in the pretty photo lightbox ?>
                                                <a href="<?php $full_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full', false); echo $full_image[0]; ?>" class="zoom-icon" title="<?php the_title(); ?>" data-rel="prettyPhoto">
                                            <?php endif; ?>
                                            	
                                                <?php if ($type == 2): ?>
                                                	<?php the_post_thumbnail('portfolio-thumb-masonry', array('class' => 'cover')); ?>
                                                <?php elseif ($type == 1 || $type == 5): ?>
                                                	<?php the_post_thumbnail('portfolio-thumb-filterable1', array('class' => 'cover')); ?>
												<?php endif; ?>
                                            </a>     
                                        </span>
                                    </div>
                                    <h4><?php the_title()?></h4>
                                    <?php if ($type ==2):?>
                                        <div class="excerpt-list2">
                                            <p><?php echo  limit_words(get_the_excerpt(), '18'); ?></p>
                                        </div>
                                    <?php else:?>
                                    	<div class="excerpt-list2">
                                            <p><?php echo  limit_words(get_the_excerpt(), '50'); ?></p>
                                        </div>
										
                                    <?php endif?>
                                    
									<?php  if ($type == 5 && isset($custom['_portfolio_additional_info'][0])):?>
										<div class="projectdetailssm no-shadow padding10">
											<h5><?php echo do_shortcode ($custom['_portfolio_additional_info'][0]) ?></h5>
                                        </div>
                                    <?php endif ?>
									<?php if( isset ($custom['_portfolio_readmore'][0]) && $custom['_portfolio_readmore'][0] == '1' ) :?>
										<div><a href="<?php the_permalink()?>" class="button light small"> <?php _e ('Read More', 'Cosmopolitan') ?></a></div>                
                                    <?php endif?>
									<?php if( isset($custom['_portfolio_link'][0]) && $custom['_portfolio_link'][0] != '' ) : ?>
                                    	<div class="alignright link"> 
                                        	<a href="<?php echo $custom['_portfolio_link'][0]; ?>">
                                            	<img src="<?php echo get_template_directory_uri() ?>/images/link_blank.png" alt="" />
                                            </a>
                                        </div>          
                                    <?php endif?>
                                    <div class="clearnospacing"></div>
                                </li>
                            <?php elseif ($type==4):?>
                            	<div class="projectdetails">               
                                    <div class="grid_3_no_margin">
                                        <h2><?php the_title(); ?></h2>
                                       	<div class="clearextrasmall"></div>
                                        <?php  if (isset($custom['_portfolio_additional_info'][0])):?>
                                        	<h5><?php echo do_shortcode ($custom['_portfolio_additional_info'][0]) ?></h5>
                                        <?php endif ?>
                                    </div>
                                                    
                                    <div class="grid_9_no_margin"> 
                                        <!-- Video -->
                                        <?php if( !empty ( $custom['_portfolio_video'][0] ) ) :?>
                                        	<div class="shadowdetailsvideo">
                                             	<div class="featuredimage">
                                             		<iframe src="<?php echo $custom['_portfolio_video'][0]; ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=00adef" width="670" height="380"></iframe>
                                        		</div>
											</div>
										<?php else: ?>
                                        <!--Image-->
                                        <div class="shadowdetails">
                                             <div class="featuredimage">
                                                <div class="hover">
                                                    <span>
                                                       	<?php if( isset($custom['_portfolio_link'][0]) && $custom['_portfolio_link'][0] != '' ) : // User has set a custom destination link for this portfolio item ?>
                                                            <a href="<?php echo $custom['_portfolio_link'][0]; ?>" title="<?php the_title(); ?>">
                                                        <?php elseif(  isset( $custom['_portfolio_no_lightbox'][0] )  &&  $custom['_portfolio_no_lightbox'][0] !='' ) : // View the project details ?>
                                                            <a href="<?php the_permalink(); ?>">
                                                        <?php else : // open image in original size in the pretty photo lightbox ?>
                                                            <a href="<?php $full_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full', false); echo $full_image[0]; ?>" class="zoom-icon" title="<?php the_title(); ?>" data-rel="prettyPhoto">
                                                        <?php endif; ?>
                                                            <?php the_post_thumbnail('full', array('class' => 'cover')); ?>
                                                        </a>     
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif ?>  
                                    	<p class="right40"><?php echo  limit_words(get_the_excerpt(), '100'); ?></p>  
                                        <?php if( isset ($custom['_portfolio_readmore'][0]) && $custom['_portfolio_readmore'][0] == '1' ) :?>
											<div><a href="<?php the_permalink()?>" class="button light small"> <?php _e ('Read More', 'Cosmopolitan') ?></a></div> 
										<?php endif?>
                                    </div>
                                    
                                    <div class="clearnospacing"></div>
                            	</div>
                                <div class="clear"></div>                                 
                            <?php endif; ?>                             	
						<?php $counter++; $col3counter++;  $col4counter++; endwhile;   ?>	 
                    <?php  endif; ?>                                    				 					                  
				<?php endif ?>
                <?php if ($type == 1 || $type == 2 || $type == 5): ?>
                	</ul>
            	<div>
				<?php endif?>
                <?php if ($type == 3 || $type == 6): ?></div><?php endif?>
                <?php if( !empty ($items_per_page) &&  $items_per_page!= 777 ) : ?>
				<div <?php if ($type == 4):?> class="paddingleft"<?php endif?>>
                	<?php 
						include(Cosmopolitan_PLUGINS . '/wp-pagenavi.php' );
						if(function_exists('wp_pagenavi')) { wp_pagenavi(); }
					?>
				 </div>
				<?php endif ?>
                <?php if ($type == 1 || $type == 2): ?></div><?php endif?>
                <?php
			} ?>
			<div class="clear"></div> 
			
            <?php if($type !== 4 && $type != 3 && $type != 6):?></div><?php endif?>
        </div>
	</div>
</div>
<div class="clearnospacing"></div>