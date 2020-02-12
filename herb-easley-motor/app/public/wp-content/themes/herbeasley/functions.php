<?php 
	
	
add_action('wp_head', 'theme');
function theme() {
	wp_register_style('theme', get_template_directory_uri() . '/style.css');
	wp_enqueue_style('theme');
}