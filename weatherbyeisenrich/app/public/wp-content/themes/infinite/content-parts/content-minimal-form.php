<section class="pb10">

	<div class="row">
		<div class="medium-12 columns">
			<div class="fs-form-wrap clearfix" id="fs-form-wrap">
				<h1 class="tac mb2">Get A Quote</h1>

				<hr class="bcg30 hr--sm mb1">

				<form id="myform" method="post" action="/wp-content/themes/infinite/process.php" class="fs-form fs-form-full clearfix" autocomplete="off">
					<ol class="fs-fields">
						<li>
							<label class="fs-field-label fs-anim-upper text-center full-width" for="q1"><!-- <h2 class="text-center">What's your name?</h2> --></label>
							<input class="text-center fs-anim-lower" id="q1" name="question" type="text" placeholder="What's your name?" required/>
						</li>
						<li>
							<label class="fs-field-label fs-anim-upper" for="q2"><!-- <h2 class="text-center">What's your email address?</h2> --></label>
							<input class="text-center fs-anim-lower" id="q2" name="question_two" type="email" placeholder="What's your email address?" required/>
						</li>
						<li>
							<label class="fs-field-label fs-anim-upper" for="q3"><!-- <h2 class="text-center">What's your phone number?</h2> --></label>
							<input class="text-center fs-anim-lower" id="q3" name="question_three" type="text" placeholder="What's your phone number?" required/>
							<div class="hide">
								<input type="text" name="hp1" id="hp1"/>
							</div>
						</li>
						<li>
							<label class="fs-field-label fs-anim-upper text-center full-width" for="q4"><!-- <h2 class="text-center">What's the nature of your inquiry?</h2> --></label>
							<input class="text-center fs-anim-lower" id="q4" name="question_four" type="text" placeholder="What's the nature of your inquiry?"/>
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
