</section>
<section id="main-bottom">

</section>

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
            <h2 class="white">Hours</h2>
            <div class="large-6 columns no-padding">
                <p>
                    <b>Trussville:</b><br />
                    Sun - Thur 11am-9pm<br />
                    Fri - Sat 11am-10pm<br />
                </p>
            </div>
            <div class="large-6 columns no-padding">
                <p>
                    <b>Hoover &amp; Huntsville:</b><br />
                    Mon - Thur 11am-10pm<br />
                    Fri - Sat 11am-11pm<br />
                    Sunday 11am-9pm
                </p>
            </div>
            <div class="large-6 columns no-padding">
                <p>
                    <b>Franklin:</b><br />
                    Mon - Thur 11am-9:30pm<br />
                    Fri - Sat 11am-10:30pm<br />
                    Sunday 11am-9pm
                </p>
            </div>
        </div>
    </div>
</section>
<section id="copyright">
    <div class="row">
        <div class="large-12">
            <p>
                Site by <a href="http://www.theinfiniteagency.com">INFINITE</a>   |   <a href="mailto:andreakjones@mac.com">Email Us</a>    |    © Copyright 2014 Cajun Steamer. All rights reserved.
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
        <script src="<?php echo get_template_directory_uri(); ?>/js/classie.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/photostack.js"></script>
        <script>
            // [].slice.call( document.querySelectorAll( '.photostack' ) ).forEach( function( el ) { new Photostack( el ); } );
            
            new Photostack( document.getElementById( 'photostack-1' ), {
                callback : function( item ) {
                    //console.log(item)
                }
            } );
            new Photostack( document.getElementById( 'photostack-2' ), {
                callback : function( item ) {
                    //console.log(item)
                }
            } );
            new Photostack( document.getElementById( 'photostack-3' ), {
                callback : function( item ) {
                    //console.log(item)
                }
            } );
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


