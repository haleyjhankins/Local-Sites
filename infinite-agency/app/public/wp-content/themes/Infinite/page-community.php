<?php
/*
Template Name: Community
*/
?>

<?php get_header(); ?>

<script type="text/javascript">
	var index = 1,
	playlist = ['' + <?php echo get_template_directory_uri(); ?> + '/video/Community.mp4', '' + <?php echo get_template_directory_uri(); ?> + '/video/Community.mp4', '' + <?php echo get_template_directory_uri(); ?> + '/video/Community.mp4'],
	video = document.getElementById('work-video');

	video.addEventListener('ended', rotate_video, false);

	function rotate_video() {
		video.setAttribute('src', playlist[index]);
		video.load();
		index++;
		if (index >= playlist.length) { index = 0; }
	}
</script>

<script type="text/javascript">
	jQuery( document ).ready(function() {
		setTimeout(function() {
			$(".community #top-section").css({'height':($(".community #work-video").height()+'px')});
		},1000);
	});

	jQuery( window ).resize(function() {

		$(".community #top-section").css({'height':($(".community #work-video").height()+'px')}); 

	});
</script>


<div id="content" class="community">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
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
			<video id="work-video" autoplay loop >
				<source src="<?php echo get_template_directory_uri(); ?>/video/Community.mp4" type="video/mp4">
				<source src="<?php echo get_template_directory_uri(); ?>/video/Firefox/Community.ogg" type="video/ogg">
						Your browser does not support the video tag.
					</video>
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

				<section class="two">
					<div class="row" style="max-width:1030px !important;">
						<div class="large-12">
							<?php the_content(); ?>
						</div>
					</div>
				</section>

			<?php endwhile; ?>
		<?php endif; ?>


		<?php get_footer(); ?>