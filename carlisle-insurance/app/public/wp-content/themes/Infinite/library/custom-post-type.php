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

function our_staff() {
	// creating (registering) the custom type
	register_post_type( 'our_staff', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Our Staff', 'post type general name'), /* This is the Title of the Group */
			'singular_name' => __('Our Staff', 'post type singular name'), /* This is the individual type */
			'add_new' => __('Add New', 'custom post type item'), /* The add new menu item */
			'add_new_item' => __('Add New Staff Member'), /* Add New Display Title */
			'edit' => __( 'Edit' ), /* Edit Dialog */
			'edit_item' => __('Edit Staff Member'), /* Edit Display Title */
			'new_item' => __('New Staff Member'), /* New Display Title */
			'view_item' => __('View Our Staff'), /* View Display Title */
			'search_items' => __('Search Our Staff'), /* Search Custom Type Title */
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
			'supports' => array('title','thumbnail')
	 	) /* end of options */
	); /* end of register post type */

	/* this ads your post categories to your custom post type */
	//register_taxonomy_for_object_type('category', 'our_staff');
	/* this ads your post tags to your custom post type */
	//register_taxonomy_for_object_type('post_tag', 'our_staff');

}
	// adding the function to the Wordpress init
	add_action( 'init', 'our_staff');

	// hook into the init action and call create_position_taxonomies when it fires
	add_action( 'init', 'create_our_staff_taxonomies', 0 );

	// create two taxonomies, Positions and writers for the post type "our_staff"
	function create_our_staff_taxonomies() {
		// Add new taxonomy, make it hierarchical (like categories)
		$labels = array(
			'name'              => _x( 'Positions', 'our_staff' ),
			'singular_name'     => _x( 'Position', 'our_staff' ),
			'search_items'      => __( 'Search Positions' ),
			'all_items'         => __( 'All Positions' ),
			'parent_item'       => __( 'Parent Position' ),
			'parent_item_colon' => __( 'Parent Position:' ),
			'edit_item'         => __( 'Edit Position' ),
			'update_item'       => __( 'Update Position' ),
			'add_new_item'      => __( 'Add New Position' ),
			'new_item_name'     => __( 'New Position Name' ),
			'menu_name'         => __( 'Position' ),
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'position' ),
		);

		register_taxonomy( 'position', array( 'our_staff' ), $args );
	}

	// Register Custom Post Type
	function events() {

		$labels = array(
			'name'                => 'Events',
			'singular_name'       => 'Event',
			'menu_name'           => 'Events',
			'name_admin_bar'      => 'Events',
			'parent_item_colon'   => 'Parent Event:',
			'all_items'           => 'All Events',
			'add_new_item'        => 'Add New Event',
			'add_new'             => 'Add New',
			'new_item'            => 'New Event',
			'edit_item'           => 'Edit Event',
			'update_item'         => 'Update Event',
			'view_item'           => 'View Event',
			'search_items'        => 'Search Event',
			'not_found'           => 'Not found',
			'not_found_in_trash'  => 'Not found in Trash',
		);
		$args = array(
			'label'               => 'events',
			'description'         => 'Employer Compliance Events',
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', ),
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
			'capability_type'     => 'page',
		);
		register_post_type( 'events', $args );

	}

	// Hook into the 'init' action
	add_action( 'init', 'events', 0 );

?>
