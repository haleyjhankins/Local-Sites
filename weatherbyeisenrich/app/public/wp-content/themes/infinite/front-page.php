<?php
// Front Page

get_header(); ?>

<section class="pv8">
	<div class="row tac">
		<h1  class="tac">Our Values</h1>
		<hr class="hr--sm">
		<div class="core-values">
			<div>
				<div class="slide1 ph2 md-ph2 tac slide-title" data-title="EXCELLENCE">
					<h4 class="fwbold mb1">Excellence is our focus.</h4>
					<p class="italic serif">We believe in providing exceptional service and are always seeking new levels of excellence.</p>
				</div>
			</div>
			<div>
				<div class="slide2 ph2 md-ph2 tac slide-title" data-title="ENTHUSIASM">
					<h4 class="fwbold mb1">Enthusiasm is our attitude.</h4>
					<p class="italic serif">We feel we were called to help people protect and enhance their livelihood and are passionate about connecting with our clients.</p>
				</div>
			</div>
			<div>
				<div class="slide3 ph2 md-ph2 tac slide-title" data-title="ENERGY">
					<h4 class="fwbold mb1">Energy is our approach.</h4>
					<p class="italic serif">We think that, in order to keep up with the demands of the world, we must stay ahead of it through focus, innovation and healthy relationships.</p>
				</div>
			</div>
			<div>
				<div class="slide4 ph2 md-ph2 tac slide-title" data-title="ETHICS">
					<h4 class="fwbold mb1">Ethics is our standard.</h4>
					<p class="italic serif">We are determined to keep integrity at the forefront of our work. The right thing is our standard.</p>
				</div>
			</div>
		</div>
	</div>
</section>



<?php get_template_part( 'content-parts/content', 'section' ); ?>

<?php get_template_part( 'content-parts/content', 'testimonials' ); ?> 

<?php get_template_part('content-parts/content', 'minimal-form'); ?>

<?php get_template_part('content-parts/content', 'locations'); ?>

<?php get_footer(); ?>
