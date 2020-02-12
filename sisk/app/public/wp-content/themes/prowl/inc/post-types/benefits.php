<?php
/* Infinite Custom Post Type

Developed by: Infinite Agency
URL: http://theinfiniteagency.com/
*/


// function for the custom type
function benefits() {
    // creating (registering) the custom type
    register_post_type( 'benefits', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
        // let's now add all the options for this post type
        array('labels' => array(
            'name' => __('Benefits', 'post type general name'), /* This is the Title of the Group */
            'singular_name' => __('Benifit', 'post type singular name'), /* This is the individual type */
            'add_new' => __('Add New', 'custom post type item'), /* The add new menu item */
            'add_new_item' => __('Add New benefit'), /* Add New Display Title */
            'edit' => __( 'Edit' ), /* Edit Dialog */
            'edit_item' => __('Edit benefit'), /* Edit Display Title */
            'new_item' => __('New benefit'), /* New Display Title */
            'view_item' => __('View benefits'), /* View Display Title */
            'search_items' => __('Search benefits'), /* Search Custom Type Title */
            'not_found' =>  __('Nothing found in the Database.'), /* This displays if there are no entries yet */
            'not_found_in_trash' => __('Nothing found in Trash'), /* This displays if there is nothing in the trash */
            'parent_item_colon' => ''
            ), /* end of arrays */
'description' => __( 'Northwood Retail Benefits' ), /* Custom Type Description */
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
'supports' => array('title')
) /* end of options */
); /* end of register post type */

}
    // adding the function to the Wordpress init
add_action( 'init', 'benefits');

if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_benefits',
        'title' => 'Benefits',
        'fields' => array (
            array (
                'key' => 'field_54c857ed31c66',
                'label' => 'Menu Item Name',
                'name' => 'menu_item',
                'type' => 'text',
                'instructions' => 'Add text that will display in menu(ex. Lifestyle)',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_54c858ed31c66',
                'label' => 'Disclaimer',
                'name' => 'disclaimer',
                'type' => 'text',
                'instructions' => 'Add benefit disclaimer',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_54c8596b31c67',
                'label' => 'Title Description',
                'name' => 'title_description',
                'type' => 'wysiwyg',
                'instructions' => 'Add your benefits main description',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'yes',
            ),
            array (
                'key' => 'field_54c859c931c68',
                'label' => 'Benefit Image',
                'name' => 'benefit_image',
                'type' => 'image',
                'instructions' => 'Add you image for the section',
                'save_format' => 'object',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array (
                'key' => 'field_54c859fd31c69',
                'label' => 'Benefit Information',
                'name' => 'benefit_information',
                'type' => 'repeater',
                'instructions' => 'Add more benefit information',
                'sub_fields' => array (
                    array (
                        'key' => 'field_54c85a4531c6a',
                        'label' => 'Icon',
                        'name' => 'icon',
                        'type' => 'image',
                        'column_width' => '',
                        'save_format' => 'object',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ),
                    array (
                        'key' => 'field_54c85a5a31c6b',
                        'label' => 'Icon Text',
                        'name' => 'icon_text',
                        'type' => 'wysiwyg',
                        'instructions' => 'Add text to display next to icon field',
                        'column_width' => '',
                        'default_value' => '',
                        'toolbar' => 'full',
                        'media_upload' => 'yes',
                    ),
                    array (
                        'key' => 'field_54c85a7731c6c',
                        'label' => 'Subtitle',
                        'name' => 'subtitle',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                    array (
                        'key' => 'field_54c85a8a31c6d',
                        'label' => 'Subtitle Description',
                        'name' => 'subtitle_description',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                    array (
                        'key' => 'field_54c85aab31c6e',
                        'label' => 'Callout Text',
                        'name' => 'callout_text',
                        'type' => 'text',
                        'instructions' => 'Add large callout text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                    array (
                        'key' => 'field_54c85ad231c6f',
                        'label' => 'Optional Description',
                        'name' => 'optional_description',
                        'type' => 'wysiwyg',
                        'instructions' => '(optional) add content to display directly under read more button',
                        'column_width' => '',
                        'default_value' => '',
                        'toolbar' => 'full',
                        'media_upload' => 'yes',
                    ),
                    array (
                        'key' => 'field_54c85b2931c70',
                        'label' => 'Read More Content',
                        'name' => 'read_more_content',
                        'type' => 'wysiwyg',
                        'instructions' => 'Add text that will display in the read more dropdown',
                        'column_width' => '',
                        'default_value' => '',
                        'toolbar' => 'full',
                        'media_upload' => 'yes',
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'row',
                'button_label' => 'Add additional info section',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'benefits',
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
