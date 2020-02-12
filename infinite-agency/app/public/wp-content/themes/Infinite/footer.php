</div>
<footer role="contentinfo">
	<div class="outer">
		<div class="inner">
			<div class="footer_bottom row">
				<div class="footer-contact">
					<a href="https://www.facebook.com/TheInfiniteAgency" target="_blank">Facebook</a>
					<a href="https://twitter.com/InfiniteAgency" target="_blank">Twitter</a>
					<a href="http://instagram.com/infiniteagency" target="_blank">Instagram</a>
				</div>
			</div>
			<div class="footer-details row">
				<p><span>&copy; <?php echo date('Y'); ?> The Infinite Agency | 2001 Bryan Street #3900 Dallas, TX 75201</span></p>
				<p>A creative, interactive marketing and branding agency</p>
				<p>executing campaigns through traditional, digital, and social media marketing channels</p>

			</div>
		</div>
	</div>
</footer> <!-- end footer -->




<script>
	$(document).foundation();
</script>

</div> <!-- end #container -->

<!--[if lt IE 7 ]>
	<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
	<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
	<![endif]-->

	<?php wp_footer(); // js scripts are inserted using this function ?>
	<script type="text/javascript" src="/wp-content/themes/Infinite/js/jquery.onepage-scroll.js"></script>

	<script>

		$(window).scroll(function() {
			$('#aninmation').each(function(){
				var imagePos = $(this).offset().top;

				var topOfWindow = $(window).scrollTop();
				if (imagePos < topOfWindow+400) {
					$(this).addClass("slideUp");
				}
			});

			$('#aninmation-two').each(function(){
				var imagePos = $(this).offset().top;

				var topOfWindow = $(window).scrollTop();
				if (imagePos < topOfWindow+400) {
					$(this).addClass("slideUp");
				}
			});

			$('#pop-up-message').each(function(){
				var imagePos = $(this).offset().top;

				var topOfWindow = $(window).scrollTop();
				if (imagePos < topOfWindow+400) {
					$(this).addClass("slideExpandUp");
				}
			});

			$('#example-4').each(function(){
				var imagePos = $(this).offset().top;

				var topOfWindow = $(window).scrollTop();
				if (imagePos < topOfWindow+400) {
					$('.device-arrow').addClass("stretchRight");
				}
			});

			$('#example-5').each(function(){
				var imagePos = $(this).offset().top;

				var topOfWindow = $(window).scrollTop();
				if (imagePos < topOfWindow+400) {
					$('.graph-bar').addClass("pullUp");
				}
			});


		});



</script>
</body>
<script>
		$(document).ready(function($) {
			setTimeout(function(){
				$("img[src='http://scontent-a.cdninstagram.com/hphotos-xpa1/t51.2885-15/923792_833581963340101_2095465039_a.jpg']").closest('.dcsns-li').hide();
			}, 3000);


		});
</script>
</html>
