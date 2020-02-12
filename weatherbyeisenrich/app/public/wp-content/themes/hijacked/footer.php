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

<footer id="colophon" class="site-footer pd25" role="contentinfo">

  <div class="row">
    <div class="site-copyright">
      <p class="copyright no-margin text-left medium-6 columns">Left Copyright</p>
    </div><!-- .site-copyright -->

    <div class="infinite-copyright medium-6 columns">
      <p class="copyright no-margin text-right">Copyright © <?php bloginfo( ); ?> <?php echo date( 'Y' ); ?>. Design by <a href="http://www.theinfiniteagency.com" target="_blank">Infinite</a>.</p>
    </div><!-- .infinite-copyright -->
  </div>
</footer><!-- #colophon -->
</div><!-- end off-canvas inner -->
</div><!-- end off-canvas wrap -->

<?php wp_footer(); ?>
<script>
  jQuery(document).foundation();
</script>

</body>
</html>
