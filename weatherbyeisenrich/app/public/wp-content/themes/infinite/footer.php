<?php
/**
* The template for displaying the footer.
*
* Contains the closing of the #content div and all content after
*
* @package Hijacked
*/
?>
</div><!-- #content -->

<footer id="colophon" class="pd25 light-grey-bg grey-text">

	<div class="row">
		<div class="medium-4 medium-push-8 columns">
			<nav>
				<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_class' => 'footer-menu tac md-tar no-bullet' ) ); ?>
			</nav>
		</div>

		<div class="medium-8 medium-pull-4 columns">
			<p class="only-sm-tac md-tal">&copy; Copyright <?php echo date('Y'); ?> Weatherby-Eisenrich Insurance</p>
		</div>

	</div>
</footer>
</div><!-- end off-canvas inner -->
</div><!-- end off-canvas wrap -->

<?php wp_footer(); ?>
<script>
	jQuery(document).foundation({
		equalizer : {
    		equalize_on_stack: true
		}
	});
</script>
<style type="text/css">
	.sm-pv4 {
		padding-top: 5%!important;
		padding-bottom: 5%!important;
	}
</style>
</body>
</html>
