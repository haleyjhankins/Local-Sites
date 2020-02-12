<?php
/*
Template Name: Form
*/
get_header(); ?>

<?php get_template_part( 'content-parts/content', 'banner' ); ?>

<section id="content" class="content-area">
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?>>
			<div class="row">
				<div class="medium-10 medium-centered columns entry-content text-center">
					<?php the_content(); ?>
				</div>
			</div>
		</article>
	<?php endwhile; // End the loop ?>
</section>

<section class="pv8">

	<div class="row">
		<div class="medium-12 columns">
			<div class="fs-form-wrap clearfix" id="fs-form-wrap">
				<h3 class="tac mb2">Get A Quote</h3>

				<hr class="hr--light hr--sm mb2">

				<form id="myform" method="post" action="http://weatherby.dev/wp-content/themes/infinite/process.php" class="fs-form fs-form-full clearfix" autocomplete="off">
					<ol class="fs-fields">
						<li>
							<label class="fs-field-label fs-anim-upper text-center full-width" for="q1"><h2 class="text-center">What's your name?</h2></label>
							<input class="text-center fs-anim-lower" id="q1" name="q1" type="text" placeholder="What's your name?" required/>
						</li>
						<li>
							<label class="fs-field-label fs-anim-upper" for="q2"><h2 class="text-center">What's your email address?</h2></label>
							<input class="text-center fs-anim-lower" id="q2" name="q2" type="email" placeholder="What's your email address?" required/>
						</li>
						<li>
							<label class="fs-field-label fs-anim-upper" for="q3"><h2 class="text-center">What's your phone number?</h2></label>
							<input class="text-center fs-anim-lower" id="q3" name="q3" type="text" placeholder="What's your phone number?" required/>
							<div class="hide">
								<input type="text" name="hp1" id="hp1"/>
							</div>
						</li>
						<li>
							<label class="fs-field-label fs-anim-upper" for="q4"><h2 class="text-center">What's the nature of your inquiry?</h2></label>
							<textarea class="fs-anim-lower" id="q4" name="q4" placeholder="What's the nature of your inquiry?"></textarea>
						</li>
					</ol><!-- /fs-fields -->
					<button class="fs-submit" type="submit">SUBMIT</button>
					<div id="ft-form-msg" class="hide text-center">
						<p>Thank you, we will contact you shortly.</p>
					</div>
				</form><!-- /fs-form -->
			</div><!-- /fs-form-wrap -->
		</div>
	</div>

	<script src="/wp-content/themes/infinite/assets/js/classie.js"></script>
	<script src="/wp-content/themes/infinite/assets/js/selectFx.js"></script>
	<script src="/wp-content/themes/infinite/assets/js/fullscreenForm.js"></script>
	<script>
		(function() {
			var formWrap = document.getElementById( 'fs-form-wrap' );

			[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {
				new SelectFx( el, {
					stickyPlaceholder: false,
					onChange: function(val){
						document.querySelector('span.cs-placeholder').style.backgroundColor = val;
					}
				});
			} );

			new FForm( formWrap, {
				onReview : function() {
						classie.add( document.body, 'overview' ); // for demo purposes only
					}
				} );
		})();


	</script>



</section>

<?php get_footer(); ?>
