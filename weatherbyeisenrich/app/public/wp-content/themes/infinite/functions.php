<?php
/**
 * Hijacked functions and definitions
 *
 * @package Hijacked
 */

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/assets/css/app.css',
        array('vendor-style','foundation-style')
    );
}

add_action( 'wp_enqueue_scripts', 'child_add_scripts' );

/**
 * Register and enqueue a script that does not depend on a JavaScript library.
 */
function child_add_scripts() {
    wp_register_script(
        'main_js',
        get_stylesheet_directory_uri() . '/js/app.min.js',
        false,
        '1.0',
        true
    );

    wp_enqueue_script( 'main_js' );
}

/**
 * Load custom post types.
 */
require_once('post-types/leadership.php');
require_once('post-types/insurance.php');
require_once('post-types/partners.php');

/* Hides ACF*/
define( 'ACF_LITE', true );

/**
 * Load custom shortcodes file.
 */
include STYLESHEETPATH . '/custom-shortcodes.php';