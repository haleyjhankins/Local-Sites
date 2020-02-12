<?php
/*
Template Name: Contact - Dallas
*/
?>
<?php get_header(); ?>

<script src="http://cdn.jquerytools.org/1.2.7/all/jquery.tools.min.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/skin1.css"/>

<!--input type="range" name="test" min="100" max="300" value="150" /-->


<style type="text/css">

	/*.contact-form {
		position: relative;
	}
	output {
	  position: absolute;
	  background-image: -webkit-gradient(linear, left top, left bottom, from(#444444), to(#999999));
	  background-image: -webkit-linear-gradient(top, #444444, #999999);
	  background-image: -moz-linear-gradient(top, #444444, #999999);
	  background-image: -ms-linear-gradient(top, #444444, #999999);
	  background-image: -o-linear-gradient(top, #444444, #999999);
	  width: 40px;
	  height: 30px;
	  text-align: center;
	  color: white;
	  border-radius: 10px;
	  display: inline-block;
	  font: bold 15px/30px Georgia;
	  bottom: 175%;
	  left: 0;
	  margin-left: -1%;
	}
	output:after {
	  content: "";
	  position: absolute;
	  width: 0;
	  height: 0;
	  border-top: 10px solid #999999;
	  border-left: 5px solid transparent;
	  border-right: 5px solid transparent;
	  top: 100%;
	  left: 50%;
	  margin-left: -5px;
	  margin-top: -1px;
	}*/
</style>

<script type="text/javascript">
	var index = 1,
	playlist = ['' + <?php echo get_template_directory_uri(); ?> + '/video/Contact.mp4', '' + <?php echo get_template_directory_uri(); ?> + '/video/Contact.mp4', '' + <?php echo get_template_directory_uri(); ?> + '/video/Contact.mp4'],
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
			$(".contact #top-section").css({'height':($(".contact #work-video").height()+'px')});
		},1000);
	});

	jQuery( window ).resize(function() {
		$(".contact #top-section").css({'height':($(".contact #work-video").height()+'px')});
	});
</script>


<!--video id="work-video" src="<?php echo get_template_directory_uri(); ?>/video/Contact.mp4" autoplay loop -->


<div id="content" class="contact">

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
			<source src="<?php echo get_template_directory_uri(); ?>/video/Contact.mp4" type="video/mp4">
			<source src="<?php echo get_template_directory_uri(); ?>/video/Firefox/Contact.ogv" type="video/ogg">
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
		<iframe width='100%' height='500px' frameBorder='0' src='https://api.mapbox.com/v4/theinfiniteagency.gh67ob0h/page.html?access_token=pk.eyJ1IjoidGhlaW5maW5pdGVhZ2VuY3kiLCJhIjoiNTJiNWFSMCJ9.rpJ3Ds1mUZHQV2hKPE51Aw#13/32.8652/-96.9358'></iframe>
		<div class="row">
		<div class="large-4 columns map-info">
				<h2>220 E Las Colinas Blvd #C210<br />Irving, TX 75039</h2>
				<div class="twentyfive"></div>
				<p><a href="mailto:hello@theinfiniteagency.com">hello@theinfiniteagency.com</a></p>
				<p class="hide-for-small">214.736.1653</p>
				<p class="hide-for-medium-up"><a href="tel:469.310.5870">469.310.5870</a></p>
			</div>
		</div>
	</section>

	<section class="three">
		<div class="row">
			<div class="large-12">
				<?php the_content(); ?>
			</div>
		</div>
	</section>

	<section class="four">
		<div class="row">
			<div class="large-12">
				<div class="large-6 columns">
					<p>We are always looking for passionate talent. If you feel you have that "it" factor we are looking for please send us your information so we can talk.</p>
				</div>
				<div class="large-6 columns">
					<?php echo do_shortcode('[contact-form-7 id="636" title="Submit Your Resume"]'); ?>
				</div>
			</div>
		</div>
	</section>

	<!--script type="text/javascript">
		// DOM Ready
		$(function() {
		 var el, newPoint, newPlace, offset;

		 // Select all range inputs, watch for change
		 $("input[type='range']").change(function() {

		   // Cache this for efficiency
		   el = $(this);

		   // Measure width of range input
		   width = el.width();

		   // Figure out placement percentage between left and right of input
		   newPoint = (el.val() - el.attr("min")) / (el.attr("max") - el.attr("min"));

		   // Janky value to get pointer to line up better
		   offset = -1.3;

		   // Prevent bubble from going beyond left or right (unsupported browsers)
		   if (newPoint < 0) { newPlace = 0; }
		   else if (newPoint > 1) { newPlace = width; }
		   else { newPlace = width * newPoint + offset; offset -= newPoint; }

		   // Move bubble
		   el
		     .next("output")
		     .css({
		       left: newPlace,
		       marginLeft: offset + "%"
		     })
		     .text(el.val());
		 })
		 // Fake a change to position bubble at page load
		 .trigger('change');
		});
	</script-->


	<script>
		$(":range").rangeinput();
	</script>


	<?php get_footer(); ?>

