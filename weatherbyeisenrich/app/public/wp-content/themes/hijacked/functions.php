<?php
/**
 * Hijacked functions and definitions
 *
 * @package Hijacked
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'hijacked_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function hijacked_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Hijacked, use a find and replace
	 * to change 'hijacked' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'hijacked', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'featured-thumb', 640, 369, true ); //640 pixels wide
	add_image_size( 'gallery', 9999, 700, false ); //640 pixels wide

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'right' => __( 'Right Menu (Primary)', 'hijacked' ),
		'left' => __( 'Left Menu', 'hijacked' ),
		'mobile' => __( 'Mobile Menu', 'hijacked' ),
		'footer' => __( 'Footer Menu', 'hijacked' ),
		) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
		) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
		) );

}
endif; // hijacked_setup
add_action( 'after_setup_theme', 'hijacked_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function hijacked_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'hijacked' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="primary-text mb3 widget-title">',
		'after_title'   => '</h4>',
		) );
}
add_action( 'widgets_init', 'hijacked_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function hijacked_scripts() {

	wp_enqueue_style( 'hijacked-style', get_stylesheet_uri() );

	wp_enqueue_style( 'foundation-style', get_template_directory_uri() . '/assets/foundation/foundation.min.css' );

	wp_enqueue_style( 'vendor-style', get_template_directory_uri() . '/assets/css/vendor.css' );

	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'foundation-scripts', get_template_directory_uri() . '/assets/foundation/foundation.min.js', true );

	wp_enqueue_script( 'vendor-scripts', get_template_directory_uri() . '/assets/js/vendor.min.js', true );

	wp_enqueue_script( 'modernizr-scripts', get_template_directory_uri() . '/assets/js/modernizr.js', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'hijacked_scripts' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';


/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';


/**
 * Load custom fields file.
 */
require get_template_directory() . '/inc/custom-fields.php';


/**
 * Load shortcodes.
 */
require get_template_directory() . '/inc/shortcodes.php';

// define( 'ACF_LITE', true );

// THIS GIVES US SOME OPTIONS FOR STYLING THE ADMIN AREA
function custom_admin_area() {
	echo '<style type="text/css">
	            #adminmenu #menu-posts-event div.wp-menu-image:before {
	content: "\f488";
}
	            #adminmenu #menu-posts-testimonial div.wp-menu-image:before {
content: "\f205";
}
	#adminmenu #menu-posts-press div.wp-menu-image:before {
content: "\f116";
}
	#adminmenu #menu-posts-team div.wp-menu-image:before {
content: "\f110";
}
	#acf-sidebar_content {
max-width: 588px;
}
table.acf_input tbody tr td {
	padding: 3px 5px !important;
}
.sub_field tr.row:nth-child(even) td.order {
	border-right-color: #E1E1E1;
	background: #cecece !important;
}
.repeater > table > tbody > tr:nth-child(even) > td.order {
	background: #cecece;
}
	#acf-slide .repeater .widefat.acf_input tbody {
background: #A7C25B;
}

</style>';
}

add_action('admin_head', 'custom_admin_area');


// // removes auto add of paragraphs

// remove_filter( 'the_content', 'wpautop' );
// remove_filter( 'the_excerpt', 'wpautop' );

// function wpse_wpautop_nobr( $content ) {
//     return wpautop( $content, false );
// }

// add_filter( 'the_content', 'wpse_wpautop_nobr' );
// add_filter( 'the_excerpt', 'wpse_wpautop_nobr' );


// if (is_archive()) {
// 	wp_dequeue_style('pagination-style');
// 	wp_dequeue_script('jquery');
// }

// add_filter( 'wpcf7_load_js', '__return_false' );
// add_filter( 'wpcf7_load_css', '__return_false' );