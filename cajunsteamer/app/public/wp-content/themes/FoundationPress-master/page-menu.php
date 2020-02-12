<?php
/*
Template Name: Menu
*/
get_header('sub'); ?>

<style>
	.tabs dd {
		float: none !important;
	}
	.tabs {
		text-align: center;
	}
</style>

<header id="subpage-hero" role="banner" class="menu-top">
	<div class="large-12 columns">
		<?php if ( has_post_thumbnail() ) {
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
			$bg_image = $thumb['0'];
		} ?>
	</div>
</header>
<div class="tin-bg"></div>




<section id="main">

	<div class="row">
		<div class="small-12 large-12 columns" role="main">

			<?php do_action('foundationPress_before_content'); ?>
			<h1 class="entry-title">Download Menus</h1>

			<div class="text-center locations-list" style="max-width: 830px;">
			<?php
				$args = array('post_type' => 'menus',  'order' => 'ASC');
				$loop = new WP_Query( $args );

				if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post();
				$pdf = get_field('menu_pdf');
			 ?>
				<a class="button" href="<?php echo $pdf; ?>" target="_blank"><?php the_title(); ?></a>
			<?php
				endwhile; endif; wp_reset_postdata();
			 ?>
			</div>
			<div class="clearfix"></div>
			<div class="large-12 columns text-center lobster">
				<img src="/wp-content/uploads/2014/05/lobster-icon-2.png" alt="">
			</div>

			<?php do_action('foundationPress_after_content'); ?>

		</div>
	</section>


</div>
<?php get_footer('sub'); ?>
<style type="text/css">
	.locations-list {
	    margin-top: 3%;
	    margin-bottom: 10%;
	    margin-left: auto;
	    margin-right: auto;
	}


	.locations-list a.button {
	    margin: 0.3rem;
	}

	.locations-list a.button:hover {
	    color: #fff!important;
	    background-color: #b21515!important;
	}
</style>

