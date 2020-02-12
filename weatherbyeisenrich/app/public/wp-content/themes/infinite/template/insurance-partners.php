<?php
/*
Template Name: Insurance Partners
*/
get_header(); ?>

<section class="white-bg black-text pd75">

    <div class="row">
        <div class="small-12 columns mb3">
            <h1 class="tac mb2">Insurance Partners</h1>
            <hr class="hr--sm ">
            <?php the_content(); ?>
        </div>
    </div>

    <div class="row collapse" data-equalizer>
        <?php
        $query = new WP_Query(array('post_type' => 'partner', 'posts_per_page' => -1, 'orderby'=> 'name', 'order' => 'ASC')); ?>
        <?php while ($query->have_posts()) : $query->the_post();
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
        ?>

        <div class="medium-6 large-3 columns left tac insuranceContact__border">
            <div class="insuranceContact pv2 ph2" data-equalizer-watch>
                <img src="<?php echo $image[0] ?>" alt="<?php the_title(); ?>">
            </div>
        </div>
    <?php endwhile; wp_reset_query(); ?>
</div>

</section>

<?php get_footer(); ?>
