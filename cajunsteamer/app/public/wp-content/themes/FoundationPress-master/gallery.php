<?php
/*
Template Name: Gallery
*/
get_header('gallery'); ?>


<header id="subpage-hero" role="banner" class="gallery-top">
        <div class="large-12 columns">
<?php if ( has_post_thumbnail() ) {
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
		$bg_image = $thumb['0'];
	} ?>
		</div>
</header>
<div class="tin-bg"></div>




  <section id="main">
      
      <div class="row">
		<div class="small-12 large-12 columns" role="main">
		
		<?php do_action('foundationPress_before_content'); ?>
		
		<?php while (have_posts()) : the_post(); ?>
			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<header>
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header>
				<div class="text-center">
				<img class="aligncenter" src="http://cajunsteamer.com/wp-content/uploads/2014/05/dots.png" alt="dots" />
				</div>
				<?php do_action('foundationPress_page_before_entry_content'); ?>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
				<footer>
					<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'FoundationPress'), 'after' => '</p></nav>' )); ?>
					<p><?php the_tags(); ?></p>
				</footer>
				<?php do_action('foundationPress_page_before_comments'); ?>
				<?php comments_template(); ?>
				<?php do_action('foundationPress_page_after_comments'); ?>
			</article>
		<?php endwhile;?>

		<?php do_action('foundationPress_after_content'); ?>

		</div>
  </section>


	
	<section id="photostack-1" class="photostack photostack-start">
				<div>
					<figure data-shuffle-iteration="3">
						<a href="https://www.flickr.com/photos/124341629@N06/14326459851/" class="photostack-img"><img src="../img/14326459851_fc040ba6a2_m.jpg" alt="14326459851_fc040ba6a2_m.jpg"/></a>
						<figcaption>
							<!--h2 class="photostack-title">Title Goes Here</h2-->
						</figcaption>
					</figure>
					<figure>
						<a href="https://www.flickr.com/photos/124341629@N06/14329782115/" class="photostack-img"><img src="../img/14329782115_e9369d3010_z.jpg" alt="14329782115_e9369d3010_z"/></a>
						<figcaption>
							<!--h2 class="photostack-title">Title Goes Here</h2-->
						</figcaption>
					</figure>
					<figure>
						<a href="https://www.flickr.com/photos/124341629@N06/14143271407/" class="photostack-img"><img src="../img/14143271407_fc520b5359_z.jpg" alt="14143271407_fc520b5359_z"/></a>
						<figcaption>
							<!--h2 class="photostack-title">Title Goes Here</h2-->
						</figcaption>
					</figure>
					<figure>
						<a href="https://www.flickr.com/photos/124341629@N06/14306652046/" class="photostack-img"><img src="../img/14306652046_b4d58f6bc2_z.jpg" alt="14306652046_b4d58f6bc2_z"/></a>
						<figcaption>
							<!--h2 class="photostack-title">Title Goes Here</h2-->
						</figcaption>
					</figure>
					<figure>
						<a href="https://www.flickr.com/photos/124341629@N06/14143271807/" class="photostack-img"><img src="../img/14143271807_ccc4244b78_z.jpg" alt="14143271807_ccc4244b78_z"/></a>
						<figcaption>
							<!--h2 class="photostack-title">Title Goes Here</h2-->
						</figcaption>
					</figure>
					<figure>
						<a href="https://www.flickr.com/photos/124341629@N06/14143130899/" class="photostack-img"><img src="../img/14143130899_9dfb90fb47_z.jpg" alt="14143130899_9dfb90fb47_z"/></a>
						<figcaption>
							<!--h2 class="photostack-title">Title Goes Here</h2-->
						</figcaption>
					</figure>
					<figure>
						<a href="https://www.flickr.com/photos/124341629@N06/14306653536/" class="photostack-img"><img src="../img/14306653536_2a65f4148f_z.jpg" alt="14306653536_2a65f4148f_z"/></a>
						<figcaption>
							<!--h2 class="photostack-title">Title Goes Here</h2-->
						</figcaption>
					</figure>
					<figure>
						<a href="https://www.flickr.com/photos/124341629@N06/14143131639/" class="photostack-img"><img src="../img/14306652046_b4d58f6bc2_z.jpg" alt="14306652046_b4d58f6bc2_z"/></a>
						<figcaption>
							<!--h2 class="photostack-title">Title Goes Here</h2-->
						</figcaption>
					</figure>
					<figure>
						<a href="https://www.flickr.com/photos/124341629@N06/14143172130/" class="photostack-img"><img src="../img/14143172130_8d849dd40a_z.jpg" alt="14143172130_8d849dd40a_z"/></a>
						<figcaption>
							<!--h2 class="photostack-title">Title Goes Here</h2-->
						</figcaption>
					</figure>
					<figure>
						<a href="https://www.flickr.com/photos/124341629@N06/14328052232/" class="photostack-img"><img src="../img/14328052232_d1e3661e49_z.jpg" alt="14328052232_d1e3661e49_z"/></a>
						<figcaption>
							<!--h2 class="photostack-title">Title Goes Here</h2-->
						</figcaption>
					</figure>
					<figure>
						<a href="https://www.flickr.com/photos/124341629@N06/14143137119/in/photostream/" class="photostack-img"><img src="../img/14143137119_0ce7e5f288_b.jpg" alt="14328052232_d1e3661e49_z"/></a>
						<figcaption>
							<!--h2 class="photostack-title">Title Goes Here</h2-->
						</figcaption>
					</figure>
					<figure>
						<a href="https://www.flickr.com/photos/124341629@N06/14326467651/in/photostream/" class="photostack-img"><img src="../img/14326467651_0db2b417e2_b.jpg" alt="14328052232_d1e3661e49_z"/></a>
						<figcaption>
							<!--h2 class="photostack-title">Title Goes Here</h2-->
						</figcaption>
					</figure>
					<figure>
						<a href="https://www.flickr.com/photos/124341629@N06/14143178560/in/photostream/" class="photostack-img"><img src="../img/14143178560_068609909d_b.jpg" alt="14328052232_d1e3661e49_z"/></a>
						<figcaption>
							<!--h2 class="photostack-title">Title Goes Here</h2-->
						</figcaption>
					</figure>
					
				</div>
			</section>


</div>		
<?php get_footer('gallery'); ?>