<?php
/*
Template Name: Home Page Theme
*/
get_header(); ?>

<style>
	@-webkit-keyframes bounce-left {
				-webkit-transform-origin: top center 0;
		transform-origin: top center 0;
 		0%{-webkit-transform:rotate(0deg)}
	    35%{-webkit-transform:rotate(25deg)}
	    75%{-webkit-transform:rotate(-25deg)}
	    100%{-webkit-transform:rotate(0deg)}
	}

	@-webkit-keyframes bounce-right {
				-webkit-transform-origin: top center 0;
		transform-origin: top center 0;
 		0%{-webkit-transform:rotate(0deg)}
	    25%{-webkit-transform:rotate(-25deg)}
	    85%{-webkit-transform:rotate(25deg)}
	    100%{-webkit-transform:rotate(0deg)}
	}

	.swing-from-left {
		-webkit-transform-origin: top center 0;
		transform-origin: top center;
		position: relative;
		z-index: 50;
		-webkit-transition: all 1s ease-in-out;
		-moz-transition: all 1s ease-in-out;
		-ms-transition: all 1s ease-in-out;
		-o-transition: all 1s ease-in-out;
		transition: all 1s ease-in-out;
/*		  -webkit-transform: rotate(45deg);
		  -moz-transform:    rotate(45deg);
		  -ms-transform:     rotate(45deg);
		  -o-transform:      rotate(45deg);
		  transform:         rotate(45deg);*/
	}
	.swing-from-right {
		-webkit-transform-origin: top center 0;
		transform-origin: top center;
		position: relative;
		z-index: 50;
		-webkit-transition: all 1s ease-in-out;
		-moz-transition: all 1s ease-in-out;
		-ms-transition: all 1s ease-in-out;
		-o-transition: all 1s ease-in-out;
		transition: all 1s ease-in-out;
/*		  -webkit-transform: rotate(-45deg);
		  -moz-transform:    rotate(-45deg);
		  -ms-transform:     rotate(-45deg);
		  -o-transform:      rotate(-45deg);
		  transform:         rotate(-45deg);*/
	}
	.swing-left {
		    -moz-animation: bounce-left 2s;
		    -webkit-animation: bounce-left 2s;
		    animation: bounce-left 2s;
		  /*-webkit-transform: rotate(0deg);
		  -moz-transform:    rotate(0deg);
		  -ms-transform:     rotate(0deg);
		  -o-transform:      rotate(0deg);
		  transform:         rotate(0deg);*/
	}
	.swing-right {
		-moz-animation: bounce-right 2s;
		    -webkit-animation: bounce-right 2s;
		    animation: bounce-right 2s;
		 /* -webkit-transform: rotate(0deg);
		  -moz-transform:    rotate(0deg);
		  -ms-transform:     rotate(0deg);
		  -o-transform:      rotate(0deg);
		  transform:         rotate(0deg);*/
	}
</style>

<header id="homepage-hero" role="banner">
        <div class="large-12 columns">
          <?php layerslider(2) ?>
        </div>
</header>
<section id="calltoaction">
	 <div class="row">
			      <div class="medium-6 columns band-left text-center show-for-medium-up">
			        <a href="/locations-hoover-al"><img src="/wp-content/themes/FoundationPress-master/img/Bucket-1.png" alt="" style="overflow: visible; margin-top:-20px;"></a>
			      </div>
			      <div class="medium-6 columns band-right text-center show-for-medium-up">
			        <a href="/events"><img src="/wp-content/themes/FoundationPress-master/img/Bucket-2.png" alt="" style="overflow: visible; margin-top:-25px;"></a>
			      </div>

			      <div class="medium-6 columns band-left text-center show-for-small-only">
			        <a href="/locations-hoover-al"><img src="/wp-content/themes/FoundationPress-master/img/Bucket-1-tall.png" alt="" style="overflow: visible; margin-top:-20px;"></a>
			      </div>
			      <div class="medium-6 columns band-right text-center show-for-small-only">
			        <a href="/events"><img src="/wp-content/themes/FoundationPress-master/img/Bucket-2-tall.png" alt="" style="overflow: visible; margin-top:-25px;"></a>
			      </div>
  </section>
  <section id="calltoaction-bottom">

  </section>



  <section id="main">
      
      <div class="row">
		<div class="small-12 large-12 columns" role="main">
		
		<?php do_action('foundationPress_before_content'); ?>
		
		<?php while (have_posts()) : the_post(); ?>
			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
				
				<?php do_action('foundationPress_page_before_entry_content'); ?>
				<div class="entry-content swing">
					<?php the_content(); ?>
				</div>
				<footer>
					<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'FoundationPress'), 'after' => '</p></nav>' )); ?>
					<p><?php the_tags(); ?></p>
				</footer>
				<?php do_action('foundationPress_page_before_comments'); ?>
				<?php comments_template(); ?>
				<?php do_action('foundationPress_page_after_comments'); ?>
			</article>
		<?php endwhile;?>

		<?php do_action('foundationPress_after_content'); ?>

		</div>
  </section>

	

</div>		
<?php get_footer(); ?>