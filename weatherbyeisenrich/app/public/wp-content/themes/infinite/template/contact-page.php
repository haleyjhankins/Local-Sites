<?php
/*
Template Name: Contact Page
*/
get_header(); ?>

<section class="white-bg black-text pd75">

    <div class="row">
        <div class="small-12 columns">
            <h1 class="tac mb2">Send Us a Message</h1>
            <hr class="hr--sm ">
        </div>
    </div>

    <div class="row contactPage__form">
        <?php echo do_shortcode('[contact-form-7 id="5" title="Contact Page"]'); ?>
    </div>

</section>

<?php get_footer(); ?>