<?php get_header(); ?>

<div id="content">

<style type="text/css">
	#top-section { position: relative; max-height: 400px; overflow: hidden; padding: 0; background: none !important;}
	#work-video { position: relative; top: 0; left: 0; width: 100%; height: 100%; }
	.page #top-section { padding: 0 !important; }

</style>

	<script type="text/javascript">
  var index = 1,
      playlist = ['' + <?php echo get_template_directory_uri(); ?> + '/video/Header_COLOR.mp4', '' + <?php echo get_template_directory_uri(); ?> + '/video/Header_COLOR.mp4', '' + <?php echo get_template_directory_uri(); ?> + '/video/Header_COLOR.mp4'],
      video = document.getElementById('work-video');

  video.addEventListener('ended', rotate_video, false);

  function rotate_video() {
    video.setAttribute('src', playlist[index]);
    video.load();
    index++;
    if (index >= playlist.length) { index = 0; }
  }
</script>
	<div id="top-section">
		<video id="work-video" src="<?php echo get_template_directory_uri(); ?>/video/Header_COLOR.mp4" autoplay loop >
  			  <source src="<?php echo get_template_directory_uri(); ?>/video/Header_COLOR.mp4" type="video/mp4">
			  <source src="<?php echo get_template_directory_uri(); ?>/video/Header_COLOR.oggtheora.ogv" type="video/ogg">
			  Your browser does not support the video tag.
</video>
		<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
	</div>
	<div class="row">
		<div id="main" class="large-8 columns clearfix" role="main">


			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


				<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="https://schema.org/BlogPosting">

					<header>

						<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>

					</header> <!-- end article header -->

					<section class="post_content clearfix" itemprop="articleBody">
						<?php the_content(); ?>

					</section> <!-- end article section -->

					<footer>

						<?php the_tags('<p class="tags"><span class="tags-title">Tags:</span> ', ', ', '</p>'); ?>

					</footer> <!-- end article footer -->

				</article> <!-- end article -->


				<?php comments_template(); ?>

			<?php endwhile; ?>		

		<?php else : ?>

			<article id="post-not-found">
				<header>
					<h1>Not Found</h1>
				</header>
				<section class="post_content">
					<p>Sorry, but the requested resource was not found on this site.</p>
				</section>
			</article>

		<?php endif; ?>

	</div> <!-- end #main -->
	<div class="large-4 columns page-sidebar">
		<div id="sidebar2" role="complementary">
			<?php if ( is_active_sidebar( 'sidebar2' ) ) : ?>

				<?php dynamic_sidebar( 'sidebar2' ); ?>

			<?php else : ?>

				<!-- This content shows up if there are no widgets defined in the backend. -->

			<?php endif; ?>
		</div>
		<div id="sidebar5" role="complementary">
			<?php if ( is_active_sidebar( 'sidebar5' ) ) : ?>

				<?php dynamic_sidebar( 'sidebar5' ); ?>

			<?php else : ?>

				<!-- This content shows up if there are no widgets defined in the backend. -->

			<?php endif; ?>
		</div>
	</div>
</div>
</div> <!-- end #content -->


<?php get_footer(); ?>