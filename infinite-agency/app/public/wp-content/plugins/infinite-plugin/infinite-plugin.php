<?php 
/**
 * Plugin Name: Infinite Plugin
 * Plugin URI: http://www.theinfiniteagency.com
 * Description: Plugin added to all Infinite Agency websites.
 * Version: 1.0
 * Author: Colin Howeth
 * Author URI: http://www.theinfiniteagency.com
 * License: GPL2
 */

/*Custom Post Types*/

function book_post_type() {

   /**
    * Register a custom post type
    *
    * Supplied is a "reasonable" list of defaults
    * @see register_post_type for full list of options for register_post_type
    * @see add_post_type_support for full descriptions of 'supports' options
    * @see get_post_type_capabilities for full list of available fine grained capabilities that are supported
    */
    register_post_type( 'book', array(
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'book' ),
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'revisions' ),
        'taxonomies' => array('post_tag', 'category'),
        'capability_type' => 'post',
        'capabilities' => array(),
        'labels' => array(
            'name' => __( 'books', 'textdomain' ),
            'singular_name' => __( 'book', 'textdomain' ),
            'add_new' => __( 'Add New', 'textdomain' ),
            'add_new_item' => __( 'Add New book', 'textdomain' ),
            'edit_item' => __( 'Edit book', 'textdomain' ),
            'new_item' => __( 'New book', 'textdomain' ),
            'all_items' => __( 'All books', 'textdomain' ),
            'view_item' => __( 'View book', 'textdomain' ),
            'search_items' => __( 'Search books', 'textdomain' ),
            'not_found' =>  __( 'No books found', 'textdomain' ),
            'not_found_in_trash' => __( 'No books found in Trash', 'textdomain' ),
            'parent_item_colon' => '',
            'menu_name' => 'Books'
        )
    ) );
}
add_action( 'init', 'book_post_type' );








?>