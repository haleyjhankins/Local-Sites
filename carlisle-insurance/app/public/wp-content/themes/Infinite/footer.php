			<footer role="contentinfo">
				<div class="footer-widgets">
					<div class="row">
						<div class="large-4 medium-4 columns" id="sidebar7">
							<h3 class="gold">Get In Touch</h3>
							<?php $businessinfo = get_businessinfo(); ?>
							<?php while ( $businessinfo->have_posts() ) : $businessinfo->the_post(); ?>

								<p class="footer-call"><a href="/contact-us/locations">Contact Us</a></p>

								<p class="footer-email"><a href="mailto:<?php the_field('company_email'); ?>"><?php the_field('company_email'); ?></a></p>

							<?php endwhile;?>
							<?php wp_reset_query()?>

						</div>
						<div class="large-8 medium-8 columns hide-for-small" id="sidebar8">
							<h3 class="gold">Our Company</h3>

							<?php if ( is_active_sidebar( 'footer2' ) ) : ?>

								<?php dynamic_sidebar( 'footer2' ); ?>

							<?php else : ?>

								<!-- This content shows up if there are no widgets defined in the backend. -->

							<?php endif; ?>

						</div>

					</div>
				</div>
				<div class="copyright">

					<div class="row">
						<div class="large-12 medium-12 columns">
							<p class="left-copyright">&copy; <?php echo date("Y"); ?>&nbsp;
								<?php $businessinfo = get_businessinfo(); ?>
								<?php while ( $businessinfo->have_posts() ) : $businessinfo->the_post(); ?>

									<?php the_field('company_name'); ?>

								<?php endwhile;?>
								<?php wp_reset_query()?>. All Rights Reserved | <a href="/privacy-policy">privacy policy</a> | <a href="/terms-of-service">terms of service</a> | <a href="https://mail.carlisleins.com/owa">Webmail Login</a> | <a href="http://www.carlisleins.com/feed/">RSS</a><br>Designed by <a href="http://www.theinfiniteagency.com">The Infinite Agency</a>
							</p>
						</div>
						<div class="large-8 medium-8 columns hide-for-small">

						<p class="right-copyright"></p>
						</div>
					</div>

				</div>

			</footer> <!-- end footer -->

			<!--script src="/wp-content/themes/Infinite/js/jquery.js"></script-->
			<script src="/wp-content/themes/Infinite/js/foundation.min.js"></script>
			<script type="text/javascript" src="/wp-content/themes/Infinite/js/ie.js"></script>
			<script>
				$(document).foundation();
			</script>


		</div> <!-- end #container -->

		<!--[if lt IE 7 ]>
  			<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
  			<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
  			<![endif]-->

  			<?php wp_footer(); // js scripts are inserted using this function ?>
                  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.flippy.js"></script>
                  <style type="text/css">
                    .orange-button {
                      transition: background-color 0.5s ease;
                      background-color: #d8a928;
                      width: 30%;
                      border: none;
                      color: #fff!important;
                      font-family: "alternate-gothic-no-3-d", sans-serif;
                      /*font-size: 32px;*/
                      font-size: 1.5rem;
                      text-transform: uppercase;
                      float: right;
                      padding: 5px 10px;
                      margin-bottom: 20px;
                      margin-top: 20px;
                      border-radius: 3px;
                      -webkit-border-radius: 3px;
                      -moz-border-radius: 3px;
                      border-bottom: 1px solid #ad8720; }

                      .orange-button-full {
                        transition: background-color 0.5s ease;
                        background-color: #d8a928;
                        width: 100%;
                        border: none;
                        color: #fff!important;
                        font-family: "alternate-gothic-no-3-d", sans-serif;
                        /*font-size: 32px;*/
                        font-size: 1.2rem;
                        text-transform: uppercase;
                        float: right;
                        padding: 10px;
                        margin-bottom: 20px;
                        margin-top: 20px;
                        border-radius: 3px;
                        -webkit-border-radius: 3px;
                        -moz-border-radius: 3px;
                        border-bottom: 1px solid #ad8720; }

                     .orange {
                      color: #d8a928;
                     }

                    .blog-title {
                      font-size: 1.5rem!important;
                    }
                    .index-page {
                      /*padding: 2% 0 0 0;*/
                    }

                    .post-date {
                      text-transform: none!important;
                      margin-top: 0!important;
                      font-size: 1rem;
                      font-style: italic;
                    }
                    .pagination {
                      margin-bottom: 3%;
                      overflow: hidden;
                    }
                    .wp-pagenavi {
                      float: right;
                    }
                    .post_content > p {
                      font-size: 1.3rem!important;
                    }

                    .single-post #content.single, .blog #content.single > .row:first-child {
                      margin-top: -117px;
                    }

                    .single-post #content.single > .row:first-child, .blog #content.single > .row:first-child {
                      padding: 50px 125px 30px;
                      background-color: white;
                      border-radius: 5px;
                      -moz-border-radius: 5px;
                      -webkit-border-radius: 5px; }

                     span.pages {
                      border: none!important;
                     }

                     .previouspostslink {
                      border-right: none!important;
                     }

                     .black-button {
                       transition: background-color 0.5s ease;
                       background-color: #000;
                       width: 30%;
                       border: none;
                       color: #fff!important;
                       font-family: "alternate-gothic-no-3-d", sans-serif;
                       /*font-size: 32px;*/
                       font-size: 1rem;
                       text-transform: uppercase;
                       float: left;
                       padding: 5px 10px;
                       margin-bottom: 20px;
                       margin-top: 5px;
                       border-radius: 3px;
                       -webkit-border-radius: 3px;
                       -moz-border-radius: 3px;
                       }

                       .wpvl_auto_thumb_play {
                        display: none;
                       }

                       .employer-compliance-content {
                        margin-top: 5%;
                        text-indent: 15px;
                       }

                       .full-orange-button {
                         transition: background-color 0.5s ease;
                         background-color: #d8a928;
                         width: 100%;
                         border: none;
                         color: #fff!important;
                         font-family: "alternate-gothic-no-3-d", sans-serif;
                         /*font-size: 32px;*/
                         font-size: 1.5rem;
                         text-transform: uppercase;
                         float: right;
                         padding: 5px 10px;
                         margin-bottom: 20px;
                         margin-top: 0px;
                         border-radius: 3px;
                         -webkit-border-radius: 3px;
                         -moz-border-radius: 3px;
                         border-bottom: 1px solid #ad8720; }

                         .event-wrapper {
                          overflow: hidden;
                          margin-bottom: 25px;
                         }
                         .event-wrapper > h3 {
                          margin-bottom: none!important;
                         }
                         .video-title {
                          font-size: 0.8rem!important;
                         }
                         .ec-video-item {
                          margin-bottom: 15px;
                         }
                         .video-thumb > a > img {
                          border: 1px solid #ccc!important;
                         }
                  </style>
  		</div>
  	</div>
  </body>
  </html>
