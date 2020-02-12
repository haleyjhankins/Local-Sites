<?php
/**
 * Plugin Name: TIA Wordpress Tools
 * Plugin URI: https://github.com/theinfiniteagency/tia-wp-tools
 * Description: Helper tools for TIA
 * Version: 1.0.0
 * Author: The Infinite Agency
 * Author URI: http://theinfiniteagency.com
 *
 */

 function tia_clear_cache( WP_REST_Request $request ) {
   WpeCommon::purge_memcached();
   WpeCommon::clear_maxcdn_cache();
   WpeCommon::purge_varnish_cache();
   $output = array('message' => 'Cache Cleared');
   return json_encode($output);
 }

 function tia_installed( WP_REST_Request $request ) {
   $output = array('connected' => true);
   return json_encode($output);
 }

 add_action('rest_api_init', function () {
   register_rest_route( 'tia', '/clear_cache', array(
     'methods' => 'GET',
     'callback' => 'tia_clear_cache',
   ));

   register_rest_route( 'tia', '/connected', array(
     'methods' => 'GET',
     'callback' => 'tia_installed',
   ));
 } );


?>
