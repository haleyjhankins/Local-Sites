<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __('One', 'options_framework_theme'),
		'two' => __('Two', 'options_framework_theme'),
		'three' => __('Three', 'options_framework_theme'),
		'four' => __('Four', 'options_framework_theme'),
		'five' => __('Five', 'options_framework_theme')
		);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'options_framework_theme'),
		'two' => __('Pancake', 'options_framework_theme'),
		'three' => __('Omelette', 'options_framework_theme'),
		'four' => __('Crepe', 'options_framework_theme'),
		'five' => __('Waffle', 'options_framework_theme')
		);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
		);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
		);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/inc/images/';

	$options = array();

	$options[] = array(
		'name' => __('General', 'options_framework_theme'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Logo', 'options_framework_theme'),
		'desc' => __('Add company logo', 'options_framework_theme'),
		'id' => 'logo',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Call To Action Title', 'options_framework_theme'),
		'desc' => __('CTA Title here', 'options_framework_theme'),
		'id' => 'cta_title',
		'placeholder' => 'Buy Now',
		'type' => 'text');

	$options[] = array(
		'name' => __('Call To Action Link', 'options_framework_theme'),
		'desc' => __('Add link for call to action button', 'options_framework_theme'),
		'id' => 'cta_link',
		'type' => 'select',
		'options' => $options_pages);

	$options[] = array(
		'name' => __('Left Menu Title', 'options_framework_theme'),
		'desc' => __('Title that displays above left menu', 'options_framework_theme'),
		'id' => 'l_menu_title',
		'placeholder' => 'Call Today',
		'type' => 'text');

	$options[] = array(
		'name' => __('Right Menu Title', 'options_framework_theme'),
		'desc' => __('Title that displays above right menu', 'options_framework_theme'),
		'id' => 'r_menu_title',
		'placeholder' => 'About Us',
		'type' => 'text');

	$options[] = array(
		'name' => __('Phone Number', 'options_framework_theme'),
		'desc' => __('Add phone', 'options_framework_theme'),
		'id' => 'phone_number',
		'placeholder' => '888-888-8888',
		'type' => 'text');

	$options[] = array(
		'name' => __('Email', 'options_framework_theme'),
		'desc' => __('Add email', 'options_framework_theme'),
		'id' => 'email',
		'placeholder' => 'hello@theinfiniteagency.com',
		'type' => 'text');

	$options[] = array(
		'name' => __('Twitter', 'options_framework_theme'),
		'desc' => __('Add twitter page', 'options_framework_theme'),
		'id' => 'twitter',
		'placeholder' => 'twitter',
		'type' => 'text');

	$options[] = array(
		'name' => __('Facebook', 'options_framework_theme'),
		'desc' => __('Add facebook page', 'options_framework_theme'),
		'id' => 'facebook',
		'placeholder' => 'facebook',
		'type' => 'text');

	$options[] = array(
		'name' => __('Instagram', 'options_framework_theme'),
		'desc' => __('Add instagram page', 'options_framework_theme'),
		'id' => 'instagram',
		'placeholder' => 'instagram',
		'type' => 'text');

	$options[] = array(
		'name' => __('Pinterest', 'options_framework_theme'),
		'desc' => __('Add pinterest', 'options_framework_theme'),
		'id' => 'pinterest',
		'placeholder' => 'pinterest',
		'type' => 'text');

	$options[] = array(
		'name' => __('Hide ACF', 'options_framework_theme'),
		'desc' => __('Hides menu item from Wordpress', 'options_framework_theme'),
		'id' => 'hide_acf',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Header Settings', 'options_framework_theme'),
		'type' => 'heading');

		$options[] = array(
		'name' => "Header Type Selector",
		'desc' => "Choose Header",
		'id' => "header_type",
		'std' => "Header 1",
		'type' => "images",
		'options' => array(
			'1' => $imagepath . 'header1.jpg',
			'2' => $imagepath . 'header2.jpg',
			'3' => $imagepath . 'header3.jpg',
			'4' => $imagepath . 'header4.jpg',
			'5' => $imagepath . 'header5.jpg',
			'6' => $imagepath . 'header6.jpg',
			'7' => $imagepath . 'header7.jpg',
			'8' => $imagepath . 'header8.jpg')
		);

	$options[] = array(
		'name' => __('Footer Settings', 'options_framework_theme'),
		'type' => 'heading' );

		$options[] = array(
		'name' => "Footer Type Selector",
		'desc' => "Choose Footer",
		'id' => "footer_type",
		'std' => "Footer 1",
		'type' => "images",
		'options' => array(
			'Footer 1' => $imagepath . 'header1.jpg',
			'Footer 2' => $imagepath . 'header2.jpg',
			'Footer 3' => $imagepath . 'header3.jpg',
			'Footer 4' => $imagepath . 'header4.jpg',
			'Footer 5' => $imagepath . 'header5.jpg',
			'Footer 6' => $imagepath . 'header6.jpg',
			'Footer 7' => $imagepath . 'header7.jpg',
			'Footer 8' => $imagepath . 'header8.jpg')
		);

		$options[] = array(
			'name' => __('Copyright', 'options_framework_theme'),
			'desc' => __('Add copyright text', 'options_framework_theme'),
			'id' => 'copyright',
			'placeholder' => 'Copyright',
			'type' => 'text');

	return $options;
}