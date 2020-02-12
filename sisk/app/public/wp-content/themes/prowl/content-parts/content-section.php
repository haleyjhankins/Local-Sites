<?php
/**
 * The template part for displaying looped sections.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Prowl
 */
?>
<!-- start sections -->

<?php

// check if the repeater field has rows of data
if( have_rows('section') ):

  $i = 0;

  // loop through the rows of data
while ( have_rows('section') ) : the_row();

$i++;
if (get_sub_field('section_background_color')) {
  $section_background_color = get_sub_field('section_background_color');
} else {
  $section_background_color = null;
}
if (get_sub_field('section_text_color')) {
  $section_text_color = get_sub_field('section_text_color');
} else {
  $section_text_color = null;
}
if (get_sub_field('section_background_image')) {
  $section_background_image = get_sub_field('section_background_image');
} else {
  $section_background_image = null;
}
if (get_sub_field('fixed_image')) {
  $fixed_image = get_sub_field('fixed_image');
} else {
  $fixed_image = null;
}
if (get_sub_field('no_row')) {
  $no_row = get_sub_field('no_row');
} else {
  $no_row = array (
    0 => 'row'
    );
}
if (get_sub_field('equalize_columns')) {
  $equalize_columns = get_sub_field('equalize_columns');
} else {
  $equalize_columns = null;
}
if (get_sub_field('section_padding')) {
  $section_padding = get_sub_field('section_padding');
} else {
  $section_padding = null;
}
?>



<section class="<?php if ($section_background_image == ''): ?><?php echo $section_background_color . ' '; ?><?php endif ?><?php echo $section_text_color .  ' ' . $section_padding . ' section-' . $i; ?>">
  <div class="full-background<?php if ($section_background_image != ''): ?> cover <?php endif ?><?php echo ' ' . $fixed_image[0];  ?>" <?php if ($section_background_image != ''): ?>style="background: url('<?php echo  $section_background_image; ?>') no-repeat;"<?php endif ?>></div>
  <div class="<?php echo $no_row[0]; ?> <?php echo $equalize_columns[0]; ?>" <?php if ($equalize_columns[0] == "equalize-this"): ?>data-equalizer<?php endif ?>>

    <?php
    // check if the repeater field has rows of data
    if( have_rows('page_builder') ):

      // loop through the rows of data
      while ( have_rows('page_builder') ) : the_row();

    if (get_sub_field('column_size')) {
      $column_size = get_sub_field('column_size');
    } else {
      $column_size = 'medium-12';
    }
    if (get_sub_field('column_alignment')) {
      $column_alignment = get_sub_field('column_alignment');
    } else {
      $column_alignment = null;
    }
    if (get_sub_field('column_background_image')) {
      $column_background_image = get_sub_field('column_background_image');
    } else {
      $column_background_image = null;
    }
    if (get_sub_field('column_background')) {
      $column_background = get_sub_field('column_background');
    } else {
      $column_background = null;
    }
    if (get_sub_field('column_title')) {
      $column_title = get_sub_field('column_title');
    } else {
      $column_title = null;
    }
    if (get_sub_field('title_alignment')) {
      $title_alignment = get_sub_field('title_alignment');
    } else {
      $title_alignment = null;
    }
    if (get_sub_field('column_image')) {
      $column_image = get_sub_field('column_image');
    } else {
      $column_image = null;
    }
    if (get_sub_field('column_content')) {
      $column_content = get_sub_field('column_content');
    } else {
      $column_content = null;
    }
    if (get_sub_field('content_background')) {
      $content_background = get_sub_field('content_background');
    } else {
      $content_background = null;
    }
    if (get_sub_field('column_link')) {
      $column_link = get_sub_field('column_link');
    } else {
      $column_link = null;
    }
    if (get_sub_field('vertically_center_content')) {
      $vertically_center_content = get_sub_field('vertically_center_content');
    } else {
      $vertically_center_content = null;
    }
    ?>

    <div class="<?php echo $column_size . " " . $column_background; ?><?php if ($column_link != ""): ?> hover-click<?php endif ?> columns <?php echo $column_alignment; ?>" <?php if ($column_background_image != ''): ?>style="background: url('<?php echo  $column_background_image; ?>') no-repeat center center; background-size: cover;"<?php endif ?>>

      <div class="<?php echo $content_background; ?>" <?php if ($equalize_columns[0] == "equalize-this"): ?>data-equalizer-watch<?php endif ?>>
        <?php if ($vertically_center_content[0] == "vertical_align") { ?>
        <div class="outer">
          <div class="inner">
            <?php } ?>
            <?php if ($column_link != ""): ?><a href="<?php echo $column_link; ?>"></a><?php endif ?>
            <div class="column-image"><?php if ($column_image[0] != ""): ?><img class="full-img" src="<?php echo $column_image; ?>" alt="<?php echo $column_title; ?>"><?php endif ?></div>

            <div class="section-content <?php echo $content_background; ?>">
              <h3 class="<?php echo $title_alignment; ?>"><?php echo $column_title; ?></h3>
              <?php echo $column_content; ?>
            </div>

            <?php if ($vertically_center_content[0] == "vertical_align") { ?>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>

  <?php endwhile;

  else :

    // no rows found

    endif;

  ?>

</div>

</section>


<?php endwhile;

else : ?>

<section>
  <div class="row">
    <div class="mrdium-12 columns">
      <?php the_content(); ?>
    </div>
  </div>
</section>

<?php endif;

?>

<!-- end sections -->
