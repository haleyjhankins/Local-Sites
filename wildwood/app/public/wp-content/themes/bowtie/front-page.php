<?php get_header(); ?>

<div id="outer" style="overflow: hidden;">
    <div id="wrapper">

    <nav id="navigation">
        <?php 

            wp_nav_menu([
                'theme_location'    => 'primary',
                'container'         =>  false
            ]);

        ?>
    </nav>

    <header>
        <div class="row">
            <div class="large-12 medium-12 small-12 columns logo-wrapper">
                <a href="#"><img src="<?php echo IMAGES_DIR; ?>logo.svg"></a>
            </div>
            <button class="hamburger hamburger--collapse" type="button">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </header>

    <section id="hero" class="section">


        <div class="row" data-equalizer>
            <div class="large-10 large-centered medium-12 small-12 columns left" data-equalizer-watch>
            
                <?php 

                    if( have_posts() ) {
                        while( have_posts() ) the_post(); {
                            the_content();
                        }
                    }

                ?>
            </div>
            
        </div>

        <video loop autoplay muted>
            <source src="/wp-content/uploads/2018/12/Wildwood-hero-forest_HD-1.mp4" type="video/mp4">
        </video>

    </section>

    <section id="credits" class="section">
        <div class="row">
            <div class="large-6 medium-6 small-12 columns">
                <h2>Buy Credits</h2>
                <div class="content" style="background: url(<?php echo IMAGES_DIR; ?>buy-credits.png) no-repeat center center; background-size: cover;">
                    <p>Purchasing ecological offsets, or mitigation credits, is a quick and easy way to demonstrate Clean Water Act compliance for your permit (Endangered Species Act too!).  Mitigation banking is actually the preferred compensatory offset by the U.S. Army Corps of Engineers, and a great strategy for many U.S. Fish and Wildlife Service districts across the country.  Equally important, the purchase of mitigation bank credits transfers environmental liabilities from your project to one of Wildwood’s established mitigation banks, allowing you to focus on core business, while we deal with the weeds. </p>
                    <a href="#map" class="btn white">see map</a>
                </div>
            </div>
            <div class="large-6 medium-6 small-12 columns">
                <h2>Create Credits</h2>
                <div class="content" style="background: url(<?php echo IMAGES_DIR; ?>create-credits.jpg) no-repeat center center; background-size: cover;">
                    <p>Where do credits come from?  This can be a tricky question, but we do our best to simplify the answer. Wildwood (and others) develop mitigation credits through the restoration of degraded ecosystems on land we own, or through joint ventures with property owners.  The size of these projects, amount of restoration and subsequent prescriptions vary, but at the end of the day our credits come from positive changes to our shared natural resources.</p>
                    <a href="#contact" class="btn white">contact us</a>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="section">
        <div class="row">
            <div class="large-8 medium-12 small-12 columns">
                <?php 

                    $contact = new WP_Query([
                        'post_type' =>  'page',
                        'post__in'  =>  [182]
                    ]);

                    if( $contact->have_posts() ) {

                        while( $contact->have_posts() ) { $contact->the_post();
                            the_content();
                        } 

                    }

                    wp_reset_postdata();

                ?>
                <ul class="options">
                    <li><a href="/wild-insights" target="_blank" rel="noopener noreferrer">Find out more on our blog</a></li>
                </ul>
            </div>
        </div>
    </section>

    <section id="offer" class="section">
        <div class="row">
            <div class="large-12 medium-12 small-12 columns">
                <h2 class="text-center">What we Offer</h2>
            </div>
        </div>
        <div class="row">

            <?php 

                $service = new WP_Query([
                    'post_type'         =>  'offers',
                    'posts_per_page'    =>  -1,
                    'orderby'           =>  'menu_order',
                    'order'             =>  'ASC'
                ]);

                if( $service->have_posts() ) : while( $service->have_posts() ) : $service->the_post();
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); 

            ?>

            <div class="large-6 medium-6 small-12 columns cta" >
                <div class="inner" style="background: url( <?php echo $image[0];?> ) no-repeat center center; background-size: cover;">
                    <div class="color <?php the_field('color'); ?>">
                        <img src="<?php the_field('image'); ?>">
                        <h3><?php the_title(); ?></h3>
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>

            <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
    </section>

    <section id="map" class="section">
        <div class="row collapse expanded" data-equalizer>
            <div class="large-4 medium-12 small-12 columns left" data-equalizer-watch>
                <?php 
                

                    echo '<ul id="sidebar">';

						echo '<li><span class="title" style="margin: 0;">Wildwood Bank Projects</span>';
						echo '<p class="disclaimer">Click project name for detailed service area map.</p></li>';




                                $posts = new WP_Query([
                                    'post_type'         =>  'projects',
                                    'posts_per_page'    =>  -1,
									'orderby'			=>	'menu_order',
									'order'				=>	'ASC',
                                ]);

                                if( $posts->post_count > 0 ) {
                                    
                                    if( $posts->have_posts() ) {
                                        while( $posts->have_posts() ) { $posts->the_post();

                                            echo '<ul>';

                                                echo '<li>';

                                                    echo '<h4>' . get_the_title() . '</h4>';
                                                    the_content();

                                                echo '</li>';

                                            echo '</ul>';

                                        }
                                    }

                                }


                      

                    echo '</ul>';
                
                ?>
            </div>
            <div class="large-8 medium-12 small-12 columns right" data-equalizer-watch>
                <iframe width="100%" height="100%" frameborder="0" src="https://wildwood.cartodb.com/viz/06c4f886-450c-11e5-9197-0e43f3deba5a/embed_map" allowfullscreen="" webkitallowfullscreen="" mozallowfullscreen="" oallowfullscreen="" msallowfullscreen=""></iframe>
            </div>
        </div>
    </section>

    <section id="our-team" class="section">
        <div class="row">
            <div class="large-12 medium-12 small-12 columns">
                <h2 class="text-center">Our Team</h2>
            </div>
        </div>
        <div class="row">
            <div class="large-12 medium-12 small-12 columns">

                <div class="row">
                    <?php 

                    $team = new WP_Query([
                        'post_type'         =>  'team',
                        'posts_per_page'    =>  -1,
                        'orderby'            =>  'menu_order',
                        'order'             =>  'asc'
                    ]);

                    if( $team->have_posts() ) : while( $team->have_posts() ): $team->the_post();

                    ?>
                    <div data-open="bio-modal" data-thumbnail="<?php the_field('modal_image'); ?>" data-title="<?php the_title(); ?>" data-position="<?php the_field('title'); ?>" data-bio='<?php echo json_encode( get_field('bio')); ?>' class="team-member column">
                        <div class="thumbnail" style="background: url(<?php the_field('image'); ?>) no-repeat center top; background-size: cover;"></div>
                        <h4><?php the_title(); ?></h4>
                        <p class="title"><?php the_field('title'); ?></p>
                    </div>
                    <?php endwhile; endif; wp_reset_postdata(); ?>
                </div>

            </div>
        </div>
    </section>

    <section id="instagram" class="section">
        <div class="row">
            <div class="large-12 medium-12 small-12 columns">
                <h2 class="text-center">Follow our Instagram</h2>
            </div>
        </div>
        <div class="row expanded collapse">
            <div class="large-12 medium-12 small-12 columns">
                <?php echo do_shortcode('[instagram-feed]'); ?>
            </div>
        </div>
    </section>

    <section id="contact" class="section" style="background: url(<?php echo IMAGES_DIR; ?>contact-background.jpg) no-repeat center center; background-size: cover;">
        <div class="row">
            <div class="large-6 medium-6 small-12 columns">
                <?php 

                    $contact = new WP_Query([
                        'post_type' =>  'page',
                        'post__in'  =>  [178]
                    ]);

                    if( $contact->have_posts() ) {

                        while( $contact->have_posts() ) { $contact->the_post();
                            the_content();
                        } 

                    }
                
                    wp_reset_postdata();
                
                ?>
            </div>
            <div class="large-5 large-offset-1 medium-6 small-12 columns">
                <?php echo do_shortcode('[gravityform id="1" title="false" description="false"]'); ?>
            </div>
        </div>
    </section>

    <section id="newsletter" class="section">
        <div class="row">
            <div class="large-8 large-centered medium-12 small-12 columns">
                <h2 class="text-center">newsletter</h2>
                <p class="text-center">Not ready to talk? Sign up for our newsletter to learn more <br /> about Wildwood’s culture and projects.</p>
                <?php echo do_shortcode('[gravityform id="3" title="false" description="false"]'); ?>
            </div>
        </div>
    </section>

    <footer>
        <div class="row">
            <div class="large-12 medium-12 small-12 columns footer-wrapper">
                <nav id="footer">
                    <?php 

                        wp_nav_menu([
                            'theme_location'    => 'primary',
                            'container'         =>  false
                        ]);

                    ?>
                </nav>
            </div>
        </div>
    </footer>

    </div>
</div>

<div id="bio-modal" class="reveal" data-reveal>
    <div class="row">
        <div id="bio-thumbnail" class="large-4 medium-4 small-12 columns">
            <img src="">
        </div>
        <div id="bio" class="large-8 medium-8 small-12 columns">
            <h4></h4>
            <p class="title"></p>
            <p class="bio"></p>
        </div>
        <a class="close-button" aria-label="close modal" data-close>CLOSE</a>
    </div>
</div>


<?php get_footer(); ?>
