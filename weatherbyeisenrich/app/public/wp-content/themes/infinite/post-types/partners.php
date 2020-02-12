<?php
/* Infinite Custom Post Type

Developed by: Infinite Agency
URL: http://theinfiniteagency.com/
*/


// function for the custom type
function partner() {
// creating (registering) the custom type
    register_post_type( 'partner', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
// let's now add all the options for this post type
        array('labels' => array(
            'name' => __('Insurance Partner', 'post type general name'), /* This is the Title of the Group */
            'singular_name' => __('Insurance Partner', 'post type singular name'), /* This is the individual type */
            'add_new' => __('Add New Contact', 'custom post type item'), /* The add new menu item */
            'add_new_item' => __('Add New Insurance Partner'), /* Add New Display Title */
            'edit' => __( 'Edit' ), /* Edit Dialog */
            'edit_item' => __('Edit Insurance Partner'), /* Edit Display Title */
            'new_item' => __('New Insurance Partner'), /* New Display Title */
            'view_item' => __('View Insurance Partner'), /* View Display Title */
            'search_items' => __('Search Insurance Partner'), /* Search Custom Type Title */
            'not_found' =>  __('Nothing found in the Database.'), /* This displays if there are no entries yet */
            'not_found_in_trash' => __('Nothing found in Trash'), /* This displays if there is nothing in the trash */
            'parent_item_colon' => ''
            ), /* end of arrays */
'description' => __( 'Insurance Partner' ), /* Custom Type Description */
'public' => true,
'publicly_queryable' => true,
'exclude_from_search' => false,
'show_ui' => true,
'query_var' => true,
'menu_position' => 12, /* this is what order you want it to appear in on the left hand side menu */
'menu_icon' => '', /* the icon for the custom post type menu */
'rewrite' => true,
'capability_type' => 'post',
'hierarchical' => false,
/* the next one is important, it tells what's enabled in the post editor */
'supports' => array('title', 'thumbnail', 'editor')
) /* end of options */
); /* end of register post type */
}
// adding the function to the Wordpress init
add_action( 'init', 'partner');

if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_partner',
        'title' => 'partner',
        'fields' => array (
            
            ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'partner',
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
