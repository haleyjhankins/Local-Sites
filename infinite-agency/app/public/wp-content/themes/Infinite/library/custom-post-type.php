<?php
/* Bones Custom Post Type Example
This page walks you through creating
a custom post type and taxonomies. You
can edit this one or copy the following code
to create another one.

I put this in a seperate file so as to
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

Developed by: Eddie Machado
URL: http://themble.com/bones/
*/


// let's create the function for the custom type
function custom_post_example() {
	// creating (registering) the custom type
	register_post_type( 'business', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Business', 'post type general name'), /* This is the Title of the Group */
			'singular_name' => __('Business', 'post type singular name'), /* This is the individual type */
			'add_new' => __('Add New', 'custom post type item'), /* The add new menu item */
			'add_new_item' => __('Add New Business'), /* Add New Display Title */
			'edit' => __( 'Edit' ), /* Edit Dialog */
			'edit_item' => __('Edit Business'), /* Edit Display Title */
			'new_item' => __('New Business'), /* New Display Title */
			'view_item' => __('View Business'), /* View Display Title */
			'search_items' => __('Search Business'), /* Search Custom Type Title */
			'not_found' =>  __('Nothing found in the Database.'), /* This displays if there are no entries yet */
			'not_found_in_trash' => __('Nothing found in Trash'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the example custom post type' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array('title')
	 	) /* end of options */
	); /* end of register post type */

	/* this ads your post categories to your custom post type */
	register_taxonomy_for_object_type('category', 'business');
	/* this ads your post tags to your custom post type */
	register_taxonomy_for_object_type('post_tag', 'business');

}
	// adding the function to the Wordpress init
	add_action( 'init', 'custom_post_example');

// Add custom post type WORK

	function work_post() {
	// creating (registering) the custom type
	register_post_type( 'work', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Work', 'post type general name'), /* This is the Title of the Group */
			'singular_name' => __('Work', 'post type singular name'), /* This is the individual type */
			'add_new' => __('Add New', 'custom post type item'), /* The add new menu item */
			'add_new_item' => __('Add New Work'), /* Add New Display Title */
			'edit' => __( 'Edit' ), /* Edit Dialog */
			'edit_item' => __('Edit Work'), /* Edit Display Title */
			'new_item' => __('New Work'), /* New Display Title */
			'view_item' => __('View Work'), /* View Display Title */
			'search_items' => __('Search Work'), /* Search Custom Type Title */
			'not_found' =>  __('Nothing found in the Database.'), /* This displays if there are no entries yet */
			'not_found_in_trash' => __('Nothing found in Trash'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the example custom post type' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 9, /* this is what order you want it to appear in on the left hand side menu */
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array('title', 'thumbnail')
	 	) /* end of options */
	); /* end of register post type */

	/* this ads your post categories to your custom post type */
	register_taxonomy_for_object_type('category', 'work');
	/* this ads your post tags to your custom post type */
	register_taxonomy_for_object_type('post_tag', 'work');

}
	// adding the function to the Wordpress init
	add_action( 'init', 'work_post');

/*Add Custom fields to Work Post type*/

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_work',
		'title' => 'Work',
		'fields' => array (
			array (
						'key' => 'field_528d400b6ef89',
						'label' => __('Cover Image'),
						'name' => 'cover_image',
						'type' => 'image',
						'instructions' => __('Add a background image'),
						'column_width' => '',
						'save_format' => 'url',
						'preview_size' => 'thumbnail',
						'library' => 'all',
					),
			array (
				'key' => 'field_529fa0223915c',
				'label' => __('Sub Title Paragraph'),
				'name' => 'sub_title_paragraph',
				'type' => 'textarea',
				'instructions' => __('Add text that will display below the title'),
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'formatting' => 'br',
			),
			array (
						'key' => 'field_528d42116ef87',
						'label' => __('Title Color'),
						'name' => 'title_color',
						'type' => 'color_picker',
						'instructions' => __('Add a title text color'),
						'column_width' => '',
						'default_value' => '',
					),
			array (
				'key' => 'field_528d3fee6ef85',
				'label' => __('Section'),
				'name' => 'section',
				'type' => 'repeater',
				'instructions' => __('Add a new section'),
				'sub_fields' => array (
					array (
						'key' => 'field_528d400b6ef86',
						'label' => __('Background Image'),
						'name' => 'background_image',
						'type' => 'image',
						'instructions' => __('Add a background image'),
						'column_width' => '',
						'save_format' => 'url',
						'preview_size' => 'thumbnail',
						'library' => 'all',
					),
					array (
						'key' => 'field_528d42116ef87',
						'label' => __('Background Color'),
						'name' => 'background_color',
						'type' => 'color_picker',
						'instructions' => __('Add a background color'),
						'column_width' => '',
						'default_value' => '',
					),
					array (
						'key' => 'field_528d42356ef88',
						'label' => __('Section Content'),
						'name' => 'section_content',
						'type' => 'wysiwyg',
						'instructions' => __('Add section content'),
						'column_width' => '',
						'default_value' => '',
						'toolbar' => 'full',
						'media_upload' => 'yes',
					),
				),
				'row_min' => 0,
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Section',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'work',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'the_content',
				1 => 'excerpt',
				2 => 'custom_fields',
				3 => 'discussion',
				4 => 'comments',
				5 => 'revisions',
				6 => 'slug',
				7 => 'author',
				8 => 'format',
				9 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));
}

// Register Custom Post Type
function team_cpt() {

	$labels = array(
		'name'                => _x( 'Team Members', 'Post Type General Name', 'infinite' ),
		'singular_name'       => _x( 'Team Member', 'Post Type Singular Name', 'infinite' ),
		'menu_name'           => __( 'Team Members', 'infinite' ),
		'name_admin_bar'      => __( 'Team Members', 'infinite' ),
		'parent_item_colon'   => __( 'Parent Team Member', 'infinite' ),
		'all_items'           => __( 'All Team Members', 'infinite' ),
		'add_new_item'        => __( 'Add New Team Member', 'infinite' ),
		'add_new'             => __( 'Add New', 'infinite' ),
		'new_item'            => __( 'New Team Member', 'infinite' ),
		'edit_item'           => __( 'Edit Team Member', 'infinite' ),
		'update_item'         => __( 'Update Team Member', 'infinite' ),
		'view_item'           => __( 'View Team Member', 'infinite' ),
		'search_items'        => __( 'Search Team Member', 'infinite' ),
		'not_found'           => __( 'Not found', 'infinite' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'infinite' ),
	);
	$args = array(
		'label'               => __( 'team', 'infinite' ),
		'description'         => __( 'Team Members', 'infinite' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => false,
		'capability_type'     => 'page',
	);
	register_post_type( 'team', $args );

}

// Hook into the 'init' action
add_action( 'init', 'team_cpt', 0 );

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_team',
		'title' => 'Team',
		'fields' => array (
			array (
				'key' => 'field_559ab9f645fd5',
				'label' => 'Job Title',
				'name' => 'job_title',
				'type' => 'text',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_559ab8911983c',
				'label' => 'Secondary Image',
				'name' => 'secondary_image',
				'type' => 'image',
				'required' => 1,
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_559ab8b51983d',
				'label' => 'Social Media',
				'name' => 'social_media',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_559ab8d71983e',
						'label' => 'Social Network',
						'name' => 'social_network',
						'type' => 'select',
						'required' => 1,
						'column_width' => '',
						'choices' => array (
							'instagram' => 'instagram',
							'facebook' => 'facebook',
							'twitter' => 'twitter',
							'codepen' => 'codepen',
							'dribble' => 'dribble',
							'flickr' => 'flickr',
							'github' => 'github',
							'vsco' => 'vsco',
						),
						'default_value' => '',
						'allow_null' => 0,
						'multiple' => 0,
					),
					array (
						'key' => 'field_559ab9811983f',
						'label' => 'User Name',
						'name' => 'username',
						'type' => 'text',
						'required' => 1,
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'none',
						'maxlength' => '',
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Row',
			),
			array (
				'key' => 'field_559ab9a125828',
				'label' => 'Order',
				'name' => 'order',
				'type' => 'number',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'team',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}
?>
