<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <title>Herb Easley</title>
            <script src="inc/foundation.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
            <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,800,300italic,700italic,600italic' rel='stylesheet' type='text/css'>
            <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/normalize.css">
            <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/foundation.min.css">
            <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/app.css">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <?php wp_head(); ?>
    </head>
    <body>
        <div class="bg"></div>
        <div id="wrapper" style="overflow:hidden;">
            <header class="row">
                <div class="large-12 text-center columns">
                    <img id="main-logo" alt="Herb Easley main logo" src="http://herbeasley.com/wp-content/uploads/2020/02/HERB_EASLEY_Logo.png">
                    <div class="tagline" style="margin-bottom: 30px;">940-723-6631</div>
                    <p>1125 Central Freeway, Wichita Falls, TX 76306</p>
                    <div class="tagline" style="font-style: italic;">Experience the Herb Easley Difference <br> Real. Honest. Prices.</div>
                </div>
            </header>
            <?php 
	            
	            $result = get_posts(
		            array('post_type' => 'page')
	            );
	            
	            echo apply_filters("the_content", $result[0]->post_content);
	            
            ?>
        </div>
    </body>
    <?php wp_footer(); ?>
</html>