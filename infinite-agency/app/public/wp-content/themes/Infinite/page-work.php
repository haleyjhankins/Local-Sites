<?php
/*
Template Name: Work
*/
get_header(); ?>


<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<script type="text/javascript">
	
	jQuery(document).ready(function($) {
		$(".work-item").click(function(){
			window.location=$(this).find("a").attr("href"); 
			return false;
		});
	});

</script>



<div id="content" class="work">

	<!--script type="text/javascript">
		var index = 1,
		playlist = ['' + <?php echo get_template_directory_uri(); ?> + '/video/Work.mp4', '' + <?php echo get_template_directory_uri(); ?> + '/video/Work.mp4', '' + <?php echo get_template_directory_uri(); ?> + '/video/Work.mp4'],
		video = document.getElementById('work-video');

		video.addEventListener('ended', rotate_video, false);

		function rotate_video() {
			video.setAttribute('src', playlist[index]);
			video.load();
			index++;
			if (index >= playlist.length) { index = 0; }
		}
	</script-->

	<script type="text/javascript">
		jQuery( document ).ready(function() {
			setTimeout(function() {
				$(".work #top-section").css({'height':($(".work #work-video").height()+'px')});
			},1000);
		});

		jQuery( window ).resize(function() {
			$(".work #top-section").css({'height':($(".work #work-video").height()+'px')});
		});
	</script>

	<?php if ( has_post_thumbnail() ) {
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
		$bg_image = $thumb['0'];
	} ?>

	<section id="top-section" class="hide-for-desktop show-for-touch" style="background: url(<?php echo $bg_image ?>) no-repeat center !important; background-size: 100% !important; height:150px !important;">
		<div class="outer">
			<div class="inner">
				<div class="row">
					<div class="large-12">
						<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="top-section" class="hide-for-touch">
		<div class="outer">
			<div class="inner">
				<div class="row">
					<div class="large-12">
						<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
					</div>
				</div>
			</div>
		</div>
		<video id="work-video" autoplay loop >
			<source src="<?php echo get_template_directory_uri(); ?>/video/Work.mp4" type="video/mp4">
				<source src="<?php echo get_template_directory_uri(); ?>/video/Firefox/Work.ogg" type="video/ogg">
					Your browser does not support the video tag.
				</video>
			</section>

			<div class="row">
				<div class="large-12 work-cat-list">

					<li class="filter"><span>FILTER</span></li>
					<li class="filter"><span>/////</span></li>
					<li class="cat-all"><a href="#">All</a></li>

					<?php $args = array(
						'show_option_all'    => '',
						'orderby'            => 'name',
						'order'              => 'ASC',
						'style'              => 'list',
						'show_count'         => 0,
						'hide_empty'         => 1,
						'use_desc_for_title' => 1,
						'child_of'           => 0,
						'feed'               => '',
						'feed_type'          => '',
						'feed_image'         => '',
						'exclude'            => '8',
						'exclude_tree'       => '',
						'include'            => '',
						'hierarchical'       => 1,
						'title_li'           => __( '' ),
						'show_option_none'   => __('No categories'),
						'number'             => null,
						'echo'               => 1,
						'depth'              => 0,
						'current_category'   => 0,
						'pad_counts'         => 0,
						'taxonomy'           => 'category',
						'walker'             => null
						); 

					wp_list_categories( $args ); 
					?>

				</div>
			</div>

			<div class="row">

				<ul id="work-grid" class="large-12">

					<?php

					$the_query = new WP_Query( 'post_type=work&posts_per_page=15&order=ASC' );

					if ( $the_query->have_posts() ) { ?>

					<!-- the loop -->
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>



						<?php $categories = wp_get_post_categories($post->ID); ?>

						<li class="<?php foreach ($categories as $c) { $cat = get_category( $c );
							echo $cat->slug . ' ';}?>large-4 columns left work-item">
							<img src="<?php the_field('cover_image'); ?>" alt="Finest Marketing & Advertising Work in Dallas, Texas"/>
							
							<section class="text-center work-thumb">
								<div class="outer">
									<div class="inner">
										<a href="<?php the_permalink(); ?>"><p class="white"><?php the_title(); ?>
										</p></a>
										<hr>
										<p class="white"><?php echo get_the_category_list( $separator = ', ' ); ?>
										</p>
									</div>
								</div>
							</section>
							
						</li>

					<?php endwhile; ?>
					<!-- end of the loop -->

					<?php } 

					wp_reset_postdata(); ?>

				</ul>


			</div>
		</div>
	</div> <!-- end #content -->

	<script type="text/javascript">

		$('.cat-all').click(function(event) {
			event.preventDefault();
			$( ".work-item" ).hide();
			$( ".work-item" ).fadeIn('1000');

		});

		$('.cat-item-6').click(function(event) {
			event.preventDefault();
			$( ".work-item" ).hide();
			$( ".branding" ).fadeIn('1000');


		});

		$('.cat-item-5').click(function(event) {
			event.preventDefault();
			$( ".work-item" ).hide();
			$( ".seo" ).fadeIn('1000');	

		});

		$('.cat-item-7').click(function(event) {
			event.preventDefault();
			$( ".work-item" ).hide();
			$( ".social" ).fadeIn('1000');

		});

	</script>


	<?php get_footer(); ?>