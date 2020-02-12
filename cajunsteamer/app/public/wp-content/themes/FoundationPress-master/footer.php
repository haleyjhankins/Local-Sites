</section>
<section id="main-bottom">

</section>

<section id="signup-bg">
  <div class="row">
  <p>SIGN UP FOR OUR EMAIL LIST</p>
    <?php //echo do_shortcode('[contact-form-7 id="34" title="Contact form 1"]'); ?>
    <a href="http://eepurl.com/cGkYgz" target="_blank" class="su-btn button">Sign Up</a>
</div>
</section>
<style type="text/css">
    .su-btn { display: block!important; width: 30%; margin: 0 auto; line-height: 25px; }
</style>
<section id="footer">
    <div class="row">
        <div class="large-4 columns">
            <h2 class="white">Locations</h2>
            <p>
                <a href="/locations-hoover-al"><b>Hoover, AL</b></a><br />
                <a href="/locations-trussville-al"><b>Trussville, AL</b></a><br />
                <a href="/locations-franklin-tn"><b>Franklin, TN</b></a><br />
                <a href="/locations-huntsville-al"><b>Huntsville, AL </b></a> </span>
            </p>
        </div>
        <div class="large-8 columns border-left-white">
            <h2 class="white">Connect</h2>
            <div class="large-8 columns no-padding">
                <a class="social-link" href="https://www.facebook.com/CajunSteamer/" target="_blank"><img src="/wp-content/uploads/2017/07/facebook.png" alt="" /></a>
<a class="social-link"href="https://twitter.com/cajun_steamer" target="_blank"><img src="/wp-content/uploads/2017/07/twitter.png" alt="" /></a>
<a class="social-link" href="https://www.instagram.com/cajun_steamer/" target="_blank"><img src="/wp-content/uploads/2017/07/instagram.png" alt="" /></a>
            </div>
        </div>
    </div>
</section>
<section id="copyright">
    <div class="row">
        <div class="large-12">
            <p>
                Site by <a href="http://www.theinfiniteagency.com" target="_blank">INFINITE</a>   |   <a href="mailto: socialmedia@cajunsteamer.com">Email Us</a>    |    © Copyright <?php echo date('Y'); ?> Cajun Steamer. All rights reserved.
            </p>
        </div>
    </div>
</section>
<footer class="row">
	<?php do_action('foundationPress_before_footer'); ?>
	<?php dynamic_sidebar("footer-widgets"); ?>
	<?php do_action('foundationPress_after_footer'); ?>
</footer>
<a class="exit-off-canvas"></a>

<?php do_action('foundationPress_layout_end'); ?>
</div>
</div>

<?php wp_footer(); ?>

<?php do_action('foundationPress_before_closing_body'); ?>

<script>
    $(window).scroll(function() {
        $('.swing').each(function(){
        var imagePos = $(this).offset().top;

        var topOfWindow = $(window).scrollTop();
            if (imagePos < topOfWindow+400) {
                //$(this).addClass("slideUp");
                $('.swing-from-left').addClass('swing-left');
                $('.swing-from-right').addClass('swing-right');
            }
        });
    });
</script>

<script>
  jQuery(document).ready(function() {
    $(".menu-icon-open").click(function(event) {
      $(".mobile-menu").addClass("open");
    });
    $(".menu-icon-close").click(function(event) {
      $(".mobile-menu").removeClass("open");
    });
  });
  </script>
</body>
</html>
