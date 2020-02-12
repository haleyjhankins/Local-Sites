<?php
/*
Template Name: Contact Template
*/
get_header(); ?>

<?php
$categoryBanner = get_field('section_image');
$categoryLink = get_field('event_page_link');
?>

<?php get_template_part( 'content-parts/content', 'banner' ); ?>

<div id="primary">

<div class="medium-12">
	<iframe src="https://a.tiles.mapbox.com/v4/theinfiniteagency.kc78d7g0/attribution,zoompan.html?access_token=pk.eyJ1IjoidGhlaW5maW5pdGVhZ2VuY3kiLCJhIjoiNTJiNWFSMCJ9.rpJ3Ds1mUZHQV2hKPE51Aw" width="100%" height="250px" frameborder="0"></iframe>
</div>

<div class="content-area">
	<?php get_template_part( 'content-parts/content', 'section' ); ?>
</div>

</div><!-- #primary -->

<?php get_footer(); ?>
