<?php
/**
 * Shortcodes for this theme.
 *
 *
 * @package Prowl
 */

// Add Carousel Shortcode

// create shortcode with parameters so that the user can define what's queried - default is to list all blog posts
add_shortcode( 'post-type-carousel', 'post_type_carousel' );
function post_type_carousel( $atts ) {
  ob_start();

    // define attributes and their defaults
  extract( shortcode_atts( array (
    'type' => 'post',
    'order' => 'date',
    'orderby' => 'title',
    'posts' => -1,
    'category' => '',
    'layout_option' => 1,
    'clickable' => false,
    'items' => 4,
    ), $atts ) );

    // define query parameters based on attributes
  $options = array(
    'post_type' => $type,
    'order' => $order,
    'orderby' => $orderby,
    'posts_per_page' => $posts,
    'category_name' => $category,
    );
  $query = new WP_Query( $options );
    // run the loop based on the query
  if ( $query->have_posts() ) { ?>
  <div class="responsive show-<?php echo $items; ?>-items">
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
      <?php
      if (has_post_thumbnail() ) {
        $image_id = get_post_thumbnail_id();
        $image_url = wp_get_attachment_image_src($image_id,'full');
        $image_url = $image_url[0];
        $featuredImage = '<img src="'.$image_url.'" class="pic_left" />';
      }
      ?>
      <?php if ( $atts['layout_option'] == 2 ) { ?>
      <div class="pd15 hover-click carousel-item layout-<?php echo $atts['layout_option']; ?>">
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <?php echo $featuredImage; ?>
          <a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
          <?php the_excerpt(); ?>
        </div>
      </div>
      <?php } elseif ( $atts['layout_option'] == 3 ) { ?>
      <div class="m15 hover-click carousel-item layout-<?php echo $atts['layout_option']; ?>">
       <?php echo $featuredImage; ?>
       <div id="post-<?php the_ID(); ?>" class="hover-content">
          <div class="outer">
            <div class="inner">
              <a href="<?php the_permalink(); ?>"><h5 class="text-center"><?php the_title(); ?></h5></a>
            </div>
          </div>
      </div>
    </div>
    <?php } else { ?>
    <div class="carousel-item layout-default">
      <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
        <?php the_excerpt(); ?>
      </div>
    </div>
    <?php } ?>


  <?php endwhile;
  wp_reset_postdata(); ?>
</div>
<?php $myvariable = ob_get_clean();
return $myvariable;
}
}

//grid shortcode

// create shortcode with parameters so that the user can define what's queried - default is to list all blog posts
add_shortcode( 'column', 'grid_columns' );
function grid_columns( $atts ) {
  ob_start(); // define attributes and their defaults
  extract( shortcode_atts( array (
    'class'=>'',
    'size' => 'full',
    ), $atts ) );
    if ( $size == '1/2' ) {
      $column_size = 'medium-6';
    } elseif ( $size == '1/4') {
      $column_size = 'medium-3';
    } elseif ( $size == '1/3') {
      $column_size = 'medium-4';
    } elseif ( $size == '2/3') {
      $column_size = 'medium-8';
    } elseif ( $size == '3/4') {
      $column_size = 'medium-9';
    } elseif ( $size == '5/6') {
      $column_size = 'medium-10';
    } elseif ( $size == '1/6') {
      $column_size = 'medium-2';
    } elseif ( $size == 'full') {
      $column_size = 'medium-12';
    } else {
      $column_size = 'medium-12';
    }
    ?>
   <div class="<?php echo $column_size; ?> <?php echo $class ?> columns left">
  <?php $myvariable = ob_get_clean();
  return $myvariable;
  }

//grid shortcode

// create shortcode with parameters so that the user can define what's queried - default is to list all blog posts
  add_shortcode( 'end_column', 'grid_columns_close' );
  function grid_columns_close( $atts ) {
    ob_start(); // define attributes and their defaults
    extract( shortcode_atts( array (
      'size' => 'full',
      ), $atts ) );
    ?>
    </div>
  <?php $myvariable = ob_get_clean();
  return $myvariable;
}

//grid shortcode

// create shortcode with parameters so that the user can define what's queried - default is to list all blog posts
  add_shortcode( 'row', 'grid_row' );
  function grid_row( $atts ) {
    ob_start(); ?>
    <div class="row">
  <?php $myvariable = ob_get_clean();
  return $myvariable;
}

//grid shortcode

// create shortcode with parameters so that the user can define what's queried - default is to list all blog posts
  add_shortcode( 'end_row', 'grid_row_close' );
  function grid_row_close( $atts ) {
    ob_start(); ?>
    </div>
  <?php $myvariable = ob_get_clean();
  return $myvariable;
}



