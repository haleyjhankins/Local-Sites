<?php
/*** ADMIN SCRIPTS ***/

function al_admin_scripts() {

	// Admin Stylesheet
	wp_enqueue_style('Cosmopolitan-admin-styles',get_stylesheet_directory_uri(). '/library/admin/css/admin.css', false, '1.0.0', 'screen');
	wp_enqueue_style('Cosmopolitan-colorpicker', get_stylesheet_directory_uri(). '/library/admin/css/colorpicker.css', false, '1.0.0', 'screen');
	wp_enqueue_style('Cosmopolitan-datetime', get_stylesheet_directory_uri(). '/library/admin/css/datetime.css', false, '1.0.0', 'screen');
	
  
	
	// JAVASCRIPT
	wp_enqueue_script( 'jquery-ui-sortable' );
	wp_enqueue_script('Cosmopolitan-admin', get_stylesheet_directory_uri() . '/library/admin/js/admin.js', array('jquery'), '1.0.0');
	wp_enqueue_script('Datetime picker', get_stylesheet_directory_uri() . '/library/admin/js/datetime.js', array('jquery'), '1.0.0');
	wp_enqueue_script('Vertical Tabs',  get_stylesheet_directory_uri(). '/library/admin/js/jquery-jvert-tabs-1.1.4.js', array('jquery'), '1.1.4');
	wp_enqueue_script('Cosmopolitan-filestyle', get_stylesheet_directory_uri() . '/library/admin/js/filestyle.js', array('jquery'), '1.0.0');
}

add_action('admin_enqueue_scripts', 'al_admin_scripts');

/*** Admin Header ****/

function al_admin_head() { ?>
	<script type="text/javascript">
    	jQuery.noConflict();
    	
    	
    	jQuery(document).ready(function () {
    		
    		jQuery(".toggle_container").hide(); 
    		jQuery("h2.toggle-trigger").click(function(){
    			jQuery(this).toggleClass("active").next().slideToggle("slow");
				return false;
			});
		
			jQuery(".datetime").calendar();
        	jQuery("#vtabs1").jVertTabs();
    		
    		jQuery('form#post').attr('enctype','multipart/form-data');
        	jQuery('form#post').attr('encoding','multipart/form-data');
        	// File input style
        	jQuery('div.r-upload input[type=file]').filestyle({ 
            	imageheight : 20,
            	imagewidth : 80,
            	width : 120
        	});
			
			
			
		// Upload errors
	 	<?php
		$upload_tracking = get_option('r_tracking');
		if (!empty($upload_tracking)) {
			foreach($upload_tracking as $array) {
				if (array_key_exists('error', $array)) { ?>
					jQuery('form#post').before('<div class="updated fade"><p>Theme Upload Error: <strong><?php echo $array['upload_name'] ?></strong> - <?php echo $array["error"] ?></p></div>');
			  	<?php
				}
			}
		}
		delete_option('r_tracking'); 
		?>
    	}) // End scripts
    </script>
<?php
}
add_action('admin_head', 'al_admin_head');
?>