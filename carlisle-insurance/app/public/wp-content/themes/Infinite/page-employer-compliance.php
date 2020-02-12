<?php
/*
Template Name: Employer Compliance
*/
?>
<?php get_header(); ?>

<div id="content" class="single index-page">
	<div class="row">
		<?php if ( post_password_required() ) { ?>
			<div id="main" class="large-8 medium-8 columns clearfix" role="main">
				<h3>Employer Compliance Library</h3>
				<div class="employer-compliance-content">
					<p>At Carlisle Insurance, we TAKE PRIDE in going above and beyond for our clients by providing a variety of services and solutions to ensure success. In today’s ever-changing complicated legal and regulatory environment, it is important to stay in compliance to prevent substantial fines and the courtroom. </p>
					<p>The Employer Compliance Library is a free service to our clients that provides videos and resources from industry experts on a variety of current compliance topics about Health Care Reform, COBRA, HIPPA, FMLA, ERISA, ADA, and much more.</p>
					<p>Access the library by entering the password.  To receive a password, please contact your <a href="mailto:takepride@carlisleins.com">Carlisle Insurance Account Manager</a>.  The password will be reset periodically for security purposes.</p>
				</div>
		</div> <!-- end #main -->
			<div class="large-4 medium-4 columns page-sidebar">
				<div id="sidebar2" role="complementary">
					<?php the_content(); ?>
				</div>
			</div>
		<?php } else { ?>
		<div class="slide-text">
			<p><em>* Please download the presentation slides before viewing the video segments below. Click on each video segment to view the presentations.</em></p>
		</div>
		<div class="clearfix"></div>

		<?php
			// WP_Query arguments
			$args = array (
				'post_type'              => 'events',
				'order'			=> 'ASC'
			);

			// The Query
			$query = new WP_Query( $args );

			if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
			$thumbnail = get_field('video_thumbnail');
		?>
		<div class="event-wrapper">
			<h3 class="left"><?php the_title(); ?></h3>
			<?php if(get_field('pdf_document')) { ?>
				<a href="<?php the_field('pdf_document'); ?>" class="button black-button right">Download Presentation Slides</a>
			<?php } ?>
			<hr>
			<?php

			    // check if the repeater field has rows of data
			    if( have_rows('video') ):

			        // loop through the rows of data
			        while ( have_rows('video') ) : the_row();
			        $video_id = get_sub_field('video_id');
			        $video_title = get_sub_field('video_title');
			    ?>
			        <div class="large-4 columns ec-video-item left">
			            <div class="video-thumb" style="background-image: <?php the_field('video_thumbnail'); ?>;">
			                <?php echo do_shortcode('[video_lightbox_vimeo5 video_id="' .$video_id. '&rel=0" width="640" height="480" anchor="' .$thumbnail. '" auto_thumb=0]'); ?>
			            </div>
			            <h5 class="video-title"><?php the_sub_field('video_title'); ?></h5>
			        </div>

			    <?php

			        endwhile;

			    else :

			        // no rows found

			    endif;

			?>
		</div>
		<div class="clearfix"></div>

		<?php
			endwhile; endif; wp_reset_query();
		 ?>

		<?php } ?>
	</div>
</div> <!-- end #content -->
<style type="text/css">
	.slide-text > p {
		width: 60%;
		float: right;
		text-align: right;
		font-weight: bold;
	}
</style>
<?php get_footer(); ?>
