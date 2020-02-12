<?php
/*
Template Name: Leadership Team
*/
get_header(); ?>

<section class="white-bg black-text pd75">

    <div class="row">
        <div class="small-12 columns">
            <h1 class="tac mb2">Leadership Team</h1>
            <hr class="hr--sm ">
        </div>
    </div>


    <?php
    $query = new WP_Query(array('post_type' => 'staff', 'posts_per_page' => -1, 'orderby'=> 'date', 'order' => 'ASC')); ?>
    <?php while ($query->have_posts()) : $query->the_post();
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
    ?>
    <div class="row">
        <div class="medium-4 large-2 columns only-sm-mb1">
            <img src="<?php echo $image[0] ?>" alt="<?php the_title(); ?>">
        </div>
        <div class="medium-8 large-10 columns mb5">
            <h4 class="xmv mb05"><?php the_title(); ?><span class="primary-text"> / <?php the_field('position'); ?></span></h4>
            <p><?php the_content(); ?></p>
        </div>
    </div>
    <?php endwhile; wp_reset_query(); ?>

</section>

<?php get_footer(); ?>