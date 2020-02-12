<?php
/*
Author: Infinite Agency
URL: htp://theinfiniteagency.com

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

// Get Core Up & Running!
require_once('library/bones.php');            // core functions (don't remove)
require_once('library/plugins.php');          // plugins & extra functions (optional)
require_once('library/custom-post-type.php'); // custom post type example

// Load Kill IE8 Plugin
//require_once('library/kill-ie/kill-ie.php');

// Load Wordpress Sass Plugin
// require_once('library/wordpress-sass/wordpress_sass.php');

// Options panel
require_once('library/options-panel.php');

// Shortcodes
require_once('library/shortcodes.php');

// Admin Functions (commented out by default)
// require_once('library/admin.php');         // custom admin functions

// Custom Backend Footer
function bones_custom_admin_footer() {
	echo '<span id="footer-thankyou">Developed by <a href="http://320press.com" target="_blank">320press</a></span>. Built using <a href="http://themble.com/bones" target="_blank">Bones</a>.';
}

// adding it to the admin area
add_filter('admin_footer_text', 'bones_custom_admin_footer');

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'wpf-featured', 639, 300, true );
add_image_size ( 'wpf-home-featured', 970, 364, true );
add_image_size( 'bones-thumb-600', 600, 150, false );
add_image_size( 'bones-thumb-300', 300, 100, true );
/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image,
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
    register_sidebar(array(
    	'id' => 'sidebar1',
    	'name' => 'Main Sidebar',
    	'description' => 'Used on every page BUT the homepage page template.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widgettitle">',
    	'after_title' => '</h4>',
        ));

    register_sidebar(array(
    	'id' => 'sidebar2',
    	'name' => 'Homepage Top',
    	'description' => 'Used only on the homepage page template.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widgettitle">',
    	'after_title' => '</h4>',
        ));

    register_sidebar(array(
        'id' => 'sidebar3',
        'name' => 'Homepage Middle 1',
        'description' => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => '</h4>',
        ));

    register_sidebar(array(
        'id' => 'sidebar4',
        'name' => 'Homepage Middle 2',
        'description' => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => '</h4>',
        ));

    register_sidebar(array(
        'id' => 'sidebar5',
        'name' => 'Homepage Middle 3',
        'description' => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => '</h4>',
        ));

    register_sidebar(array(
        'id' => 'sidebar6',
        'name' => 'Homepage Bottom',
        'description' => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => '</h4>',
        ));

    register_sidebar(array(
        'id' => 'footer1',
        'name' => 'Footer Widget 1',
        'description' => 'First Footer Widget Area.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="widgettitle">',
        'after_title' => '</h5>',
        ));

    register_sidebar(array(
        'id' => 'footer2',
        'name' => 'Footer Widget 2',
        'description' => 'Second Footer Widget Area.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="widgettitle">',
        'after_title' => '</h5>',
        ));

    register_sidebar(array(
        'id' => 'footer3',
        'name' => 'Footer Widget 3',
        'description' => 'Third Footer Widget Area.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="widgettitle">',
        'after_title' => '</h5>',
        ));

    /*
    to add more sidebars or widgetized areas, just copy
    and edit the above sidebar code. In order to call
    your new sidebar just use the following code:

    Just change the name to whatever your new
    sidebar's id is, for example:



    To call the sidebar in your template, you can just copy
    the sidebar.php file and rename it to your sidebar's name.
    So using the above example, it would be:
    sidebar-sidebar2.php

    */
} // don't remove this bracket!


/************* ENQUEUE CSS AND JS *****************/

function theme_styles()
{
    // Bring in Open Sans from Google fonts
    wp_register_style( 'open-sans', 'http://fonts.googleapis.com/css?family=Open+Sans:300,800');
    // This is the compiled css file from SCSS
    wp_register_style( 'foundation-min', get_template_directory_uri() . '/css/foundation.min.css' );
    wp_register_style( 'normalize', get_template_directory_uri() . '/css/normalize.css' );

    if (is_page('161')) {
     wp_register_style( 'jquery-ui', get_template_directory_uri() . '/css/jquery-ui-1.10.3.custom.min.css' );
     wp_enqueue_style( 'jquery-ui' );
 }

 wp_enqueue_style( 'open-sans' );
 wp_enqueue_style( 'normalize' );
 wp_enqueue_style( 'foundation-min' );

}

add_action('wp_enqueue_scripts', 'theme_styles');

// SASS/SCSS Stylesheet Definition
/*
function generate_css() {
    if(function_exists('wpsass_define_stylesheet')) {
        wpsass_define_stylesheet("custom.scss");
    }
}
add_action( 'wp_footer', 'generate_css' );
*/

/* load modernizr from foundation */
function modernize_it(){
    wp_register_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js' );
    wp_enqueue_script( 'modernizr' );
}

add_action('wp_enqueue_scripts', 'modernize_it');


function foundation_js(){
    wp_deregister_script('jquery');
    wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery.js' );
    wp_enqueue_script( 'jquery' );
    wp_register_script( 'foundation-app', get_template_directory_uri() . '/js/app.js' );
    wp_enqueue_script( 'foundation-app', 'jquery', '1.0', true );
}

add_action('wp_enqueue_scripts', 'foundation_js');

function wp_foundation_js(){
    wp_register_script( 'wp-foundation-js', get_template_directory_uri() . '/library/js/scripts.js', 'jquery', '1.0', true);
    wp_enqueue_script( 'wp-foundation-js' );
}

add_action('wp_enqueue_scripts', 'wp_foundation_js');



/* load jquery flip */
function flip_jquery(){
    if (is_page('161')) {
        wp_register_script( 'jquery-ui-script', get_template_directory_uri() . '/js/jquery-ui-1.10.3.custom.min.js' );
        wp_enqueue_script( 'jquery-ui-script' , 'jquery', '1.0', true );
        wp_register_script( 'flip', get_template_directory_uri() . '/js/jquery.flip.min.js' );
        wp_enqueue_script( 'flip' , 'jquery', '1.0', true );
    }
}

add_action( 'wp_enqueue_scripts', 'flip_jquery' );


/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?>>
      <article id="comment-<?php comment_ID(); ?>" class="panel clearfix">
       <div class="comment-author vcard row clearfix">
        <div class="twelve columns">
            <div class="
            <?php
            $authID = get_the_author_meta('ID');

            if($authID == $comment->user_id)
                echo "panel callout";
            else
                echo "panel";
            ?>
            ">
            <div class="row">
                <div class="avatar two columns">
                 <?php echo get_avatar($comment,$size='75',$default='<path_to_url>' ); ?>
             </div>
             <div class="ten columns">
                 <?php printf(__('<h4 class="span8">%s</h4>'), get_comment_author_link()) ?>
                 <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time('F jS, Y'); ?> </a></time>

                 <?php edit_comment_link(__('Edit'),'<span class="edit-comment">', '</span>'); ?>

                 <?php if ($comment->comment_approved == '0') : ?>
                    <div class="alert-box success">
                       <?php _e('Your comment is awaiting moderation.') ?>
                   </div>
               <?php endif; ?>

               <?php comment_text() ?>

               <!-- removing reply link on each comment since we're not nesting them -->
               <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
           </div>
       </div>
   </div>
</div>
</div>
</article>
<!-- </li> is added by wordpress automatically -->
<?php
} // don't remove this bracket!

// Add grid classes to comments
function add_class_comments($classes){
    array_push($classes, "twelve", "columns");
    return $classes;
}
add_filter('comment_class', 'add_class_comments');

/************* SEARCH FORM LAYOUT *****************/

// Search Form
function bones_wpsearch($form) {
    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <label class="screen-reader-text" for="s">' . __('Search for:', 'bonestheme') . '</label>
    <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="Search the Site..." />
    <input type="submit" id="searchsubmit" value="'. esc_attr__('Search') .'" />
</form>';
return $form;
} // don't remove this bracket!

/****************** password protected post form *****/

add_filter( 'the_password_form', 'custom_password_form' );

function custom_password_form() {
	global $post;
	$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
	$o = '<div class="clearfix"><form action="' . get_option('siteurl') . '/wp-login.php?action=postpass" method="post">
	' . __( "" ) . '
	<div class="row collapse">
        <div class="twelve columns"><label for="' . $label . '">' . __( "Password:" ) . ' </label></div>
        <div class="eight columns">
            <input name="post_password" id="' . $label . '" type="password" size="20" class="input-text" />
        </div>
        <div class="four columns">
            <input type="submit" name="Submit" class="postfix button full-orange-button" value="' . esc_attr__( "Submit" ) . '" />
        </div>
    </div>
</form></div>
';
return $o;
}

/*********** update standard wp tag cloud widget so it looks better ************/

// filter tag clould output so that it can be styled by CSS
function add_tag_class( $taglinks ) {
    $tags = explode('</a>', $taglinks);
    $regex = "#(.*tag-link[-])(.*)(' title.*)#e";
    foreach( $tags as $tag ) {
        $tagn[] = preg_replace($regex, "('$1$2 label radius tag-'.get_tag($2)->slug.'$3')", $tag );
    }
    $taglinks = implode('</a>', $tagn);
    return $taglinks;
}

add_action('wp_tag_cloud', 'add_tag_class');

add_filter( 'widget_tag_cloud_args', 'my_widget_tag_cloud_args' );

function my_widget_tag_cloud_args( $args ) {
	$args['number'] = 20; // show less tags
	$args['largest'] = 9.75; // make largest and smallest the same - i don't like the varying font-size look
	$args['smallest'] = 9.75;
	$args['unit'] = 'px';
	return $args;
}

add_filter('wp_tag_cloud','wp_tag_cloud_filter', 10, 2);

function wp_tag_cloud_filter($return, $args)
{
  return '<div id="tag-cloud"><p>'.$return.'</p></div>';
}

function add_class_the_tags($html){
    $postid = get_the_ID();
    $html = str_replace('<a','<a class="label success radius"',$html);
    return $html;
}
add_filter('the_tags','add_class_the_tags',10,1);

// Enable shortcodes in widgets
add_filter('widget_text', 'do_shortcode');

// Disable jump in 'read more' link
function remove_more_jump_link($link) {
	$offset = strpos($link, '#more-');
	if ($offset) {
		$end = strpos($link, '"',$offset);
	}
	if ($end) {
		$link = substr_replace($link, '', $offset, $end-$offset);
	}
	return $link;
}
add_filter('the_content_more_link', 'remove_more_jump_link');

// Remove height/width attributes on images so they can be responsive
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );

function remove_thumbnail_dimensions( $html ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

// change the standard class that wordpress puts on the active menu item in the nav bar
//Deletes all CSS classes and id's, except for those listed in the array below
function custom_wp_nav_menu($var) {
    return is_array($var) ? array_intersect($var, array(
                //List of allowed menu classes
        'current_page_item',
        'current_page_parent',
        'current_page_ancestor',
        'first',
        'last',
        'vertical',
        'horizontal'
        )
    ) : '';
}
add_filter('nav_menu_css_class', 'custom_wp_nav_menu');
add_filter('nav_menu_item_id', 'custom_wp_nav_menu');
add_filter('page_css_class', 'custom_wp_nav_menu');

//Replaces "current-menu-item" with "active"
function current_to_active($text){
    $replace = array(
                //List of menu item classes that should be changed to "active"
        'current_page_item' => 'active',
        'current_page_parent' => 'active',
        'current_page_ancestor' => 'active',
        );
    $text = str_replace(array_keys($replace), $replace, $text);
    return $text;
}
add_filter ('wp_nav_menu','current_to_active');

//Deletes empty classes and removes the sub menu class
function strip_empty_classes($menu) {
    $menu = preg_replace('/ class=""| class="sub-menu"/','',$menu);
    return $menu;
}
add_filter ('wp_nav_menu','strip_empty_classes');


// add the 'has-flyout' class to any li's that have children and add the arrows to li's with children

class description_walker extends Walker_Nav_Menu
{
  function start_el(&$output, $category, $depth = 0, $args = array(), $current_object_id = 0)
  {
    global $wp_query;
    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

    $class_names = $value = '';

            // If the item has children, add the dropdown class for foundation
    if ( $args->has_children ) {
        $class_names = "has-dropdown ";
    }

    $classes = empty( $item->classes ) ? array() : (array) $item->classes;

    $class_names .= join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
    $class_names = ' class="'. esc_attr( $class_names ) . '"';

    $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
            // if the item has children add these two attributes to the anchor tag
            // if ( $args->has_children ) {
            //     $attributes .= 'class="dropdown-toggle" data-toggle="dropdown"';
            // }

    $item_output = $args->before;
    $item_output .= '<a'. $attributes .'>';
    $item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
    $item_output .= $args->link_after;
            // if the item has children add the caret just before closing the anchor tag
    if ( $args->has_children ) {
        $item_output .= '</a><a href="#" class=""><span> </span></a>';
    }
    else{
        $item_output .= '</a>';
    }
    $item_output .= $args->after;

    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
}

function start_lvl(&$output, $depth = 0, $args = array()) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"dropdown\">\n";
}

function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output )
{
    $id_field = $this->db_fields['id'];
    if ( is_object( $args[0] ) ) {
        $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
    }
    return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
}
}

// Walker class to customize footer links
class footer_links_walker extends Walker_Nav_Menu
{
  function start_el(&$output, $category, $depth = 0, $args = array(), $current_object_id = 0)
  {
    global $wp_query;
    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

    $class_names = $value = '';

    $classes = empty( $item->classes ) ? array() : (array) $item->classes;

    $class_names .= join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
    $class_names = ' class="'. esc_attr( $class_names ) . '"';

    $output .= $indent . '<li ' . $value . $class_names .'>';

    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

    $item_output = $args->before;
    $item_output .= '<a'. $attributes .'>';
    $item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
    $item_output .= $args->link_after;

    $item_output .= '</a>';
    $item_output .= $args->after;

    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
}

function start_lvl(&$output, $depth = 0, $args = array()) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"dropdown\">\n";
}

function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output )
{
    $id_field = $this->db_fields['id'];
    if ( is_object( $args[0] ) ) {
        $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
    }
    return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
}
}


// Add the Meta Box to the homepage template
function add_homepage_meta_box() {
    add_meta_box(
        'homepage_meta_box', // $id
        'Custom Fields', // $title
        'show_homepage_meta_box', // $callback
        'page', // $page
        'normal', // $context
        'high'); // $priority
}
add_action('add_meta_boxes', 'add_homepage_meta_box');

// Field Array
$prefix = 'custom_';
$custom_meta_fields = array(
    array(
        'label'=> 'Homepage tagline area',
        'desc'  => 'Displayed underneath page title. Only used on homepage template. HTML can be used.',
        'id'    => $prefix.'tagline',
        'type'  => 'textarea'
        )
    );

// The Homepage Meta Box Callback
function show_homepage_meta_box() {
    global $custom_meta_fields, $post;
// Use nonce for verification
    echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';

    // Begin the field table and loop
    echo '<table class="form-table">';
    foreach ($custom_meta_fields as $field) {
        // get value of this field if it exists for this post
        $meta = get_post_meta($post->ID, $field['id'], true);
        // begin a table row with
        echo '<tr>
        <th><label for="'.$field['id'].'">'.$field['label'].'</label></th>
        <td>';
            switch($field['type']) {
                    // text
                case 'text':
                echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="60" />
                <br /><span class="description">'.$field['desc'].'</span>';
                break;

                    // textarea
                case 'textarea':
                echo '<textarea name="'.$field['id'].'" id="'.$field['id'].'" cols="80" rows="4">'.$meta.'</textarea>
                <br /><span class="description">'.$field['desc'].'</span>';
                break;
                } //end switch
                echo '</td></tr>';
    } // end foreach
    echo '</table>'; // end table
}

// Save the Data
function save_homepage_meta($post_id) {
    global $custom_meta_fields;

    // verify nonce
    if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__)))
        return $post_id;
    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post_id;
    // check permissions
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id))
            return $post_id;
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    // loop through fields and save the data
    foreach ($custom_meta_fields as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    } // end foreach
}
add_action('save_post', 'save_homepage_meta');

function get_our_staff(){
    $args = array(
        'post_type'=>'our_staff',
        'order'=>'ASC',
        'orderby'=>'menu_order'
        );
    $ourstaff = new WP_Query($args);
    return $ourstaff;
}

function get_businessinfo(){
    $args = array(
        'post_type'=>'business',
        'posts_per_page'=>1,
        'order'=>'ASC',
        'orderby'=>'menu_order'
        );
    $businessinfo = new WP_Query($args);
    return $businessinfo;
}

//function homepage_slider(){
//    if( get_field('images') )
//{
//    while( has_sub_field('images') )
//    {
//        $images = get_sub_field('image');

//        return $images;
//}
//}

//define( 'ACF_LITE', true );

if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_business-info',
        'title' => 'Business Info',
        'fields' => array (
            array (
                'key' => 'field_527ab58173722',
                'label' => __('Company Name'),
                'name' => 'company_name',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
                ),
            array (
                'key' => 'field_527ab58173725',
                'label' => __('Company Email'),
                'name' => 'company_email',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
                ),
            array (
                'key' => 'field_527ab59f73723',
                'label' => __('Company Phone'),
                'name' => 'company_phone',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
                ),
            array (
                'key' => 'field_527ab61773724',
                'label' => __('Call To Action'),
                'name' => 'call_to_action',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
                ),
            array (
                'key' => 'field_527d3b3635ad6',
                'label' => __('Company Address'),
                'name' => 'company_address',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
                ),
            array (
                'key' => 'field_527d44b4bc329',
                'label' => __('Company Facebook Page'),
                'name' => 'company_facebook',
                'type' => 'text',
                'instructions' => __('Please enter the full URL of your company Facebook page. For example: https://www.facebook.com/TheInfiniteAgency'),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
                ),
            array (
                'key' => 'field_527d452000cc3',
                'label' => __('Company Twitter Page'),
                'name' => 'company_twitter',
                'type' => 'text',
                'instructions' => __('Please enter the full URL of your company Twitter page. For example: https://twitter.com/InfiniteAgency'),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
                ),
            array (
                'key' => 'field_527d456d00cc4',
                'label' => __('Company Instagram Page'),
                'name' => 'company_instagram',
                'type' => 'text',
                'instructions' => __('Please enter the full URL of your company Twitter page. For example: http://instagram.com/infiniteagency'),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
                ),
            array (
                'key' => 'field_528bf0a5f117b',
                'label' => __('Logo'),
                'name' => 'logo',
                'type' => 'image',
                'instructions' => __('Upload your company logo'),
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
                ),
            array (
                'key' => 'field_528bf0dbf117c',
                'label' => __('Mobile Logo'),
                'name' => 'mobile_logo',
                'type' => 'image',
                'instructions' => __('Upload your company logo for mobile view'),
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
                ),
            array (
                'key' => 'field_528bf0dbf117d',
                'label' => __('Top Section Background'),
                'name' => 'top_section',
                'type' => 'image',
                'instructions' => __('Upload the background image for the top section'),
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
                ),
            array (
                'key' => 'field_529d06db72094',
                'label' => __('Warning Message'),
                'name' => 'warning_message',
                'type' => 'wysiwyg',
                'instructions' => __('Enter your alert message here. If left empty no banner will display'),
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'yes',
                ),
            array (
                'key' => 'field_529e00f8d4b09',
                'label' => 'Homepage Images',
                'name' => 'images',
                'type' => 'repeater',
                'instructions' => 'Add Images for pages without featured image for background. Images must be at least 1280 x 855 in size and 72 DPI',
                'sub_fields' => array (
                    array (
                        'key' => 'field_529e01b3d4b0a',
                        'label' => 'Image',
                        'name' => 'image',
                        'type' => 'image',
                        'column_width' => '',
                        'save_format' => 'url',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                        ),
                    ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'table',
                'button_label' => 'Add Image',
                ),


),
'location' => array (
    array (
        array (
            'param' => 'post_type',
            'operator' => '==',
            'value' => 'business',
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


/*Custom Expertise slider filter*/

add_filter('new_royalslider_skins', 'new_royalslider_add_custom_skin', 10, 2);
function new_royalslider_add_custom_skin($skins) {
  $skins['rsThreeUp'] = array(
   'label' => '3 Up',
           'path' => get_stylesheet_directory_uri() . '/3-up/3-up.css'  // get_stylesheet_directory_uri returns path to your theme folder
           );
  return $skins;
}

add_filter('protected_title_format', 'blank');
function blank($title) {
       return '%s';
}

// Important Note! The second parameter ($Index) is available only since RoyalSlider v3.1.6


    /*add_filter('new_royalslider_posts_slider_query_args', 'newrs_custom_query', 10, 2);
function newrs_custom_query($args) {
    $args = array(
                'post_type'=>'page',
                'page_id'=> '150'
 );
    return $args;
}*/



?>
