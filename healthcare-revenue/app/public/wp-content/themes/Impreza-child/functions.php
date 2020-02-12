<?php
/* Custom functions code goes here. */

//Remove the links to the general feeds: Post and Comment Feed.
remove_action( 'wp_head', 'feed_links',  2 );
 
//Remove the links to the extra feeds such as category feeds.
remove_action( 'wp_head',  'feed_links_extra',  3 );
 
//Remove the link to the Really Simple Discovery service endpoint, EditURI link.
remove_action( 'wp_head',  'rsd_link' );
 
//Remove the link to the Windows Live Writer manifest file.
remove_action( 'wp_head',  'wlwmanifest_link' );
 
//Remove index link.
remove_action( 'wp_head',  'index_rel_link' );
 
//Remove previous link.
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
 
//Remove start link.
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
 
//Remove relational links (previous and next) for the posts adjacent to the current post.
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
 
//Remove shortlink if it is defined.
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );

//Remove Oembed discovery link if it is defined.
remove_action('wp_head','wp_oembed_add_discovery_links', 10 );
remove_action('wp_head','wp_oembed_add_host_js');

function _remove_script_version( $src ){ 
$parts = explode( '?', $src ); 	
return $parts[0]; 
} 
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 ); 
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );

// Enqueue Custom Script
function theme_custom_scripts() {
    wp_enqueue_script( 'theme_custom_scripts', get_template_directory_uri() . '/js/custom-scripts.js', array( 'jquery' ), '1.0', true );
}
add_action('wp_enqueue_scripts', 'theme_custom_scripts');