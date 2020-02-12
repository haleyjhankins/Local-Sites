<?php

/**
 * Plugin Name: Genius Location Importer
 * Plugin URI: https://github.com/theinfiniteagency/genius-importer
 * Description: Imports CSV data to Locations
 * Version: 1.0.0
 * Author: The Infinite Agency
 * Author URI: http://theinfiniteagency.com
 *
 */

add_action('admin_menu', function() {
  add_submenu_page( 'edit.php?post_type=location', 'Import Locations', 'Import', 'manage_options', 'import-locations', 'import_locations_page' );
});

add_action('admin_init', function() {

});

function import_locations_page() {
  print '
  <div class="wrap">

    <form enctype="multipart/form-data" action="admin-post.php" method="post">
    <h1>Import Locations</h1>
    <p>Upload the CSV to the Geocoder first, then paste the new location data below.</p>
    <input type="hidden" name="action" value="import_locations">
    <textarea name="locations"></textarea>';

    submit_button('Import');
  print '</form>
  </div>
  ';
}

function import_locations_section_callback() {
  //print 'Section description';
}


function import_locations_post( ) {

  $data = stripslashes($_POST['locations']);
  $data = json_decode($data);

  $locations = $data->completed;
  $completed = 0;
  
  foreach($locations as $location) {
    $new_location = array(
      'post_type'=> 'location',
      'post_title' => wp_strip_all_tags($location->title),
      'post_status'   => 'publish',
    );

    $id = wp_insert_post($new_location);
    update_field('address', $location->address, $id);
    update_field('phone_number', $location->phone_number, $id);
    update_field('city', $location->city, $id);
    update_field('state', $location->state, $id);
    update_field('zip', $location->zip, $id);
    update_field('latitude', $location->latitude, $id);
    update_field('longitude', $location->longitude, $id);
    if(!empty($location->hours)) {
      update_field('hours', array(
        array(
          'day' => 'Everyday',
          'open' => $location->hours->opens,
          'closed' => $location->hours->closes
        )
      ), $id);
    }
    $completed++;
  }

  print "Added $completed Locations";
}

add_action( 'admin_post_nopriv_import_locations', 'import_locations_post' );
add_action( 'admin_post_import_locations', 'import_locations_post' );

?>
