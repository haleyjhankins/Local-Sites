<?php
/**
 * Prowl functions and definitions
 *
 * @package Prowl
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'prowl_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function prowl_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Prowl, use a find and replace
	 * to change 'prowl' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'prowl', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'featured-thumb', 768, 768, true ); //768 pixels wide

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'right' => __( 'Right Menu (Primary)', 'prowl' ),
		'left' => __( 'Left Menu', 'prowl' ),
		'mobile' => __( 'Mobile Menu', 'prowl' ),
		'footer' => __( 'Footer Menu', 'prowl' ),
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

	// Setup the WordPress core custom background feature.
	// add_theme_support( 'custom-background', apply_filters( 'prowl_custom_background_args', array(
	// 	'default-color' => 'ffffff',
	// 	'default-image' => '',
	// 	) ) );
}
endif; // prowl_setup
add_action( 'after_setup_theme', 'prowl_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function prowl_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'prowl' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
		) );
}
add_action( 'widgets_init', 'prowl_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function prowl_scripts() {
	wp_enqueue_style( 'prowl-style', get_stylesheet_uri() );

	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'prowl', get_template_directory_uri() . '/assets/js/prowl.js', true );

	wp_enqueue_script( 'app', get_template_directory_uri() . '/assets/js/app.js', true );

	wp_enqueue_script( 'prowl-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'prowl-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'prowl_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/post-types/benefits.php';


/**
 * Custom template tags for this theme.
 */
//require get_template_directory() . '/inc/post-types/events.php';


/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
// require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom fields file.
 */
require get_template_directory() . '/inc/custom-fields.php';

/**
 * Load options framework.
 */
require get_template_directory() . '/options-functions.php';

/**
 * Load shortcodes.
 */
require get_template_directory() . '/inc/shortcodes.php';

if ( !function_exists( 'of_get_option' ) ) {
function of_get_option($name, $default = false) {

	$optionsframework_settings = get_option('optionsframework');

	// Gets the unique option id
	$option_name = $optionsframework_settings['id'];

	if ( get_option($option_name) ) {
		$options = get_option($option_name);
	}

	if ( !empty($options[$name]) ) {
		return $options[$name];
	} else {
		return $default;
	}
}
}

/* Hides ACF*/
$hideACF = of_get_option('hide_acf');
if ($hideACF == true) {
	define( 'ACF_LITE', true );
}

// THIS GIVES US SOME OPTIONS FOR STYLING THE ADMIN AREA
function custom_admin_area() {
	 echo '<style type="text/css">
	            #adminmenu #menu-posts-benefits div.wp-menu-image:before {
	content: "\f116";
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

// Excerpt options
function custom_excerpt_length( $length ) {
  return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
  return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');
