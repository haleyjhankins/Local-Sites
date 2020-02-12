<?php get_header(); ?>

<div id="outer">
    <div id="wrapper">

        <nav id="navigation">
            <?php 

                wp_nav_menu([
                    'theme_location'    => 'interior',
                    'container'         =>  false
                ]);

            ?>
        </nav>

        <header>
            <div class="row">
                <div class="large-12 medium-12 small-12 columns logo-wrapper">
                    <a href="<?php echo home_url('/'); ?>"><img src="<?php echo IMAGES_DIR; ?>logo.svg"></a>
                </div>
                <button class="hamburger hamburger--collapse" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </header>

        <div id="content-wrapper" class="row">

            <div id="blog-content" class="medium-8 columns">

                    <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

                        <div class="blog-entry">
                            <h2><?php the_title(); ?></h2>
                            <div class="details">
                                <p class="date"><?php echo get_the_date(); ?></p>
                            </div>
                            <div class="excerpt"><?php the_content(); ?></div>
                        </div>

                    <?php endwhile; endif; ?>
                
            </div><!-- .columns  -->

            <div id="sidebar-blog" class="medium-4 columns">

                <?php get_sidebar(); ?>

            </div><!-- .columns -->

        </div><!-- .row -->

       

    </div>
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

<?php get_footer(); ?>
