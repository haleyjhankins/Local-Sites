<?php
/**
 * The template part for displaying sliders.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Prowl
 */
?>

<div class="single-item slider flex-pagination">

<?php

// check if the repeater field has rows of data
if( have_rows('slide') ):

  // loop through the rows of data
  while ( have_rows('slide') ) : the_row();

  if (get_sub_field('slide_background_color')) {
    $slide_background_color = get_sub_field('slide_background_color');
  } else {
    $slide_background_color = null;
  }
  if (get_sub_field('slide_text_color')) {
    $slide_text_color = get_sub_field('slide_text_color');
  } else {
    $slide_text_color = null;
  }
  if (get_sub_field('slide_background_image')) {
    $slide_background_image = get_sub_field('slide_background_image');
  } else {
    $slide_background_image = null;
  }
  if (get_sub_field('slide_fixed_image')) {
    $slide_fixed_image = get_sub_field('slide_fixed_image');
  } else {
    $slide_fixed_image = null;
  }
  if (get_sub_field('slide_equalize_columns')) {
    $slide_equalize_columns = get_sub_field('slide_equalize_columns');
  } else {
    $slide_equalize_columns = null;
  }
  if (get_sub_field('slide_padding')) {
    $slide_padding = get_sub_field('slide_padding');
  } else {
    $slide_padding = null;
  }
?>


<div>
<div class="<?php if ($slide_background_image == ''): ?><?php echo $slide_background_color . ' '; ?><?php endif ?><?php echo $slide_text_color . ' ' . $slide_padding; ?><?php if ($slide_background_image != ''): ?> cover<?php endif ?>">
  <div class="full-background<?php if ($slide_background_image != ''): ?> cover <?php endif ?><?php echo $slide_fixed_image[0];  ?>" <?php if ($slide_background_image != ''): ?>style="background: url('<?php echo  $slide_background_image; ?>') no-repeat center center;"<?php endif ?>></div>
  <div class="row <?php echo $slide_equalize_columns[0]; ?>" <?php if ($slide_equalize_columns[0] == "equalize-this"): ?>data-equalizer<?php endif ?>>

    <?php
    // check if the repeater field has rows of data
    if( have_rows('slide_builder') ):

      // loop through the rows of data
      while ( have_rows('slide_builder') ) : the_row();

          if (get_sub_field('slide_column_size')) {
            $slide_column_size = get_sub_field('slide_column_size');
          } else {
            $slide_column_size = 'medium-12';
          }
          if (get_sub_field('slide_column_alignment')) {
            $slide_column_alignment = get_sub_field('slide_column_alignment');
          } else {
            $slide_column_alignment = null;
          }
          if (get_sub_field('slide_column_background')) {
            $slide_column_background = get_sub_field('slide_column_background');
          } else {
            $slide_column_background = null;
          }
          if (get_sub_field('slide_column_title')) {
            $slide_column_title = get_sub_field('slide_column_title');
          } else {
            $slide_column_title = null;
          }
          if (get_sub_field('slide_title_alignment')) {
            $slide_title_alignment = get_sub_field('slide_title_alignment');
          } else {
            $slide_title_alignment = null;
          }
          if (get_sub_field('slide_column_image')) {
            $slide_column_image = get_sub_field('slide_column_image');
          } else {
            $slide_column_image = null;
          }
          if (get_sub_field('slide_column_content')) {
            $slide_column_content = get_sub_field('slide_column_content');
          } else {
            $slide_column_content = null;
          }
          if (get_sub_field('slide_content_background')) {
            $slide_content_background = get_sub_field('slide_content_background');
          } else {
            $slide_content_background = null;
          }
          if (get_sub_field('slide_column_link')) {
            $slide_column_link = get_sub_field('slide_column_link');
          } else {
            $slide_column_link = null;
          }
          if (get_sub_field('slide_vertically_center_content')) {
            $slide_vertically_center_content = get_sub_field('slide_vertically_center_content');
          } else {
            $slide_vertically_center_content = null;
          }
      ?>

        <div class="slider-height <?php echo $slide_column_size . ' ' . $slide_column_background; ?><?php if ($slide_column_link != ""): ?> hover-click<?php endif ?> columns mt15 mb15 <?php echo $slide_column_alignment; ?>">
        <div class="<?php echo $slide_content_background; ?>" <?php if ($slide_equalize_columns[0] == "equalize-this"): ?>data-equalizer-watch<?php endif ?>></div>
          <?php if ($slide_vertically_center_content[0] == "vertical_align") { ?>
            <div class="outer">
              <div class="inner">
          <?php } ?>
          <?php if ($slide_column_link != ""): ?><a href="<?php echo $slide_column_link; ?>"></a><?php endif ?>
          <?php if ($slide_column_image[0] != ""): ?><img class="full-img" src="<?php echo $slide_column_image; ?>" alt="<?php echo $slide_column_title; ?>"><?php endif ?>

          <div class="section-content <?php echo $slide_content_background; ?>">
            <h3 class="<?php echo $slide_title_alignment; ?>"><?php echo $slide_column_title; ?></h3>
            <?php echo $slide_column_content; ?>
          </div>

          <?php if ($slide_vertically_center_content[0] == "vertical_align") { ?>
              </div>
            </div>
          <?php } ?>
        </div>

      <?php endwhile;

    else :

    // no rows found

      endif;

    ?>

  </div>

</div>

</div>


<?php endwhile;

else :

  get_template_part( 'content-parts/content', 'banner' );

endif;

?>

</div>