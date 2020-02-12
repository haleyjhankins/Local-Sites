<?php
/**
* The template for displaying the footer.
*
* Contains the closing of the #content div and all content after
*
* @package Prowl
*/
?>
</div><!-- #content -->

<footer id="colophon" class="site-footer pd25" role="contentinfo">

<div class="row">

<?php if (of_get_option('copyright') != "") { ?>
  <div class="site-copyright medium-4 columns">
    <p class="copyright no-margin text-left hide-for-small">For more information contact<br />Member Benefits</p>
  </div><!-- .site-copyright -->
<?php } ?>

  <div class="medium-4 columns text-center site-logo">
    <div class="medium-8 medium-centered columns">
      <a href="" class="no-click"><img src="<?php the_field('company_logo'); ?>" alt=""></a>
    </div>
  </div>

  <div class="infinite-copyright medium-4 columns">
    <p class="copyright no-margin text-right hide-for-small">Copyright © <?php bloginfo( ); ?> <?php echo date( 'Y' ); ?></p>
    <p class="copyright no-margin text-center pt15 show-for-small">Copyright © <?php bloginfo( ); ?> <?php echo date( 'Y' ); ?></p>
    <p class="copyright no-margin text-center pt15 show-for-small">For more information contact<br />Member Benefits</p>
  </div><!-- .infinite-copyright -->

  </div>

</footer><!-- #colophon -->
</div><!-- end off-canvas inner -->
</div><!-- end off-canvas wrap -->

<?php wp_footer(); ?>
<script>
  jQuery(document).ready(function($) {
    $( 'iframe' ).wrap( "<div class='flex-video vimeo'></div>" );
  });
  jQuery(document).foundation('equalizer', 'reflow');
</script>

</body>
</html>
