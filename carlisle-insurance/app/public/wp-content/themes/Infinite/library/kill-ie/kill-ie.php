<?php 

/*
Plugin Name: Kill Internext Explorer for WordPress
Plugin Script: kill-ie.php
Plugin URI: http://tyler.tc
Description: A fun, simple, and attractive way to kill of those pesky old versions of Internet Explorer.
Version: 1.0
Author: Tyler Colwell
Author URI: http://tyler.tc

--- THIS PLUGIN AND ALL FILES INCLUDED ARE COPYRIGHT © TYLER COLWELL 2011. 
YOU MAY NOT MODIFY, RESELL, DISTRIBUTE, OR COPY THIS CODE IN ANY WAY. ---

*/

/*-----------------------------------------------------------------------------------*/
/*	Define Anything Needed
/*-----------------------------------------------------------------------------------*/

define('KILLIE_LOCATION', get_template_directory_uri() . '/library/'.basename(dirname(__FILE__)));
define('KILLIE_PATH', plugin_dir_path(__FILE__));

require_once('inc/tcf_settings_page.php');





/*-----------------------------------------------------------------------------------*/
/*	Menu Creation
/*-----------------------------------------------------------------------------------*/

// This is the function to create the options menu
function killie_create_menu() {
	
	// Adds the tab into the options panel in WordPress Admin area
	$page = add_options_page("Kill Internet Explorer for WordPress", "Kill Internet Explorer", 'administrator', __FILE__, 'killie_settings_page');

	//call register settings function
	add_action( 'admin_init', 'killie_register_settings' );
	
	// Hook style sheet loading
	add_action( 'admin_print_styles-' . $page, 'killie_admin_cssloader' );

}
		



		
/*-----------------------------------------------------------------------------------*/
/*	Add Admin CSS
/*-----------------------------------------------------------------------------------*/

// Add style sheet for plugin settings
function killie_settings_admin_css(){
				
	/* Register our stylesheet. */
	wp_register_style( 'killieSettings', KILLIE_LOCATION.'/css/tc_framework.css' );
							
} function killie_admin_cssloader(){
	
	// It will be called only on your plugin admin page, enqueue our stylesheet here
	wp_enqueue_style( 'killieSettings' );
	   
} // End admin style CSS





/*-----------------------------------------------------------------------------------*/
/*	Main Header Function
/*-----------------------------------------------------------------------------------*/

// This is the main function that will be called from the template files
function killInternetExplorer(){
	
	// Define current post
	global $post;

	// Get all of the options required for the popup
	$killie_enabled = get_option('killie-enabled');
	$killie_pages = explode(',', get_option('killie-pages'));
	$killie_selector = get_option('killie-page-selector');
	$killie_versions = get_option('killie-versions');
	$killie_template = get_option('killie-template');
	$final_template = KILLIE_LOCATION . '/upgrade/' . $killie_template;
	
	// Only continue if the pop-up option is enabled...
	if($killie_enabled != 3){
				
		// If only to include in pages
		if($killie_selector == 1){
			
			$switch = false;
			
			// Check if page is in the array
			if(in_array($post->ID, $killie_pages)){
			
				// set to true bc page is in selected array
				$switch = true;
				
			}
		
		// else check to exclude from pages
		} else if($killie_selector == 2){
			
			$switch = true;
			
			// disable if page is in array
			if(in_array($post->ID, $killie_pages)){
				
				// disable
				$switch = false;
				
			}
			
		} // end selector check
		
		// Check if homepage should display STP
		if(is_home() && $killie_enabled == 1){
			
			$switch = true;
			
		} else if(is_home() && $killie_enabled == 2){
			
			$switch = false;
			
		}
				
		// Only continue if the pop-up option is enabled...
		if($switch == true){ ?>
        
            <!--[if lte IE <?PHP echo $killie_versions; ?>]>
            <script type="text/javascript">window.location = '<?PHP echo $final_template; ?>';</script>
            <![endif]-->
							
		<?PHP } // End if switch enabled
		
	} // End if enabled
		
} // End main function





/*-----------------------------------------------------------------------------------*/
/*	Register SEttings
/*-----------------------------------------------------------------------------------*/

function killie_register_settings(){
		
	// Register our settings
	register_setting( 'killie-settings-group', 'killie-enabled' );
	register_setting( 'killie-settings-group', 'killie-page-selector' );
	register_setting( 'killie-settings-group', 'killie-pages' );
	register_setting( 'killie-settings-group', 'killie-versions' );
	register_setting( 'killie-settings-group', 'killie-template' );

	// Apply default options to settings
	add_option( 'killie-enabled', 'false' );
	add_option( 'killie-versions', '6' );
	add_option( 'killie-enabled', 'blue' );

}





/*-----------------------------------------------------------------------------------*/
/*	Start Running Hooks
/*-----------------------------------------------------------------------------------*/

// Add hook to include settings CSS
add_action( 'admin_init', 'killie_settings_admin_css' );
// create custom plugin settings menu
add_action( 'admin_menu', 'killie_create_menu' );
// include required files in header
add_action( 'wp_head', 'killInternetExplorer' );

?>
