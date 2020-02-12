<?PHP

/*-----------------------------------------------------------------------------------*/
/*	Ajax save callback
/*-----------------------------------------------------------------------------------*/

add_action('wp_ajax_killie_tc_settings_save', 'killie_tc_settings_save');

function killie_tc_settings_save(){

	check_ajax_referer('killie_settings_secure', 'security');
	
        // Save the posted value in the database
		update_option('killie-enabled', $_POST['killie-enabled']);
		update_option('killie-page-selector', $_POST['killie-page-selector']);
		update_option('killie-pages', $_POST['killie-pages']);
		update_option('killie-versions', $_POST['killie-versions']);
		update_option('killie-template', $_POST['killie-template']);
		
}





/*-----------------------------------------------------------------------------------*/
/*	New framework settings page
/*-----------------------------------------------------------------------------------*/

function killie_settings_page() {

?>

<script>
	
jQuery(document).ready(function(){

/*-----------------------------------------------------------------------------------*/
/*	Options Pages and Tabs
/*-----------------------------------------------------------------------------------*/
	  
	jQuery('.options_pages li').click(function(){
		
		var tab_page = 'div#' + jQuery(this).attr('id');
		var old_page = 'div#' + jQuery('.options_pages li.active').attr('id');
		
		// Change button class
		jQuery('.options_pages li.active').removeClass('active');
		jQuery(this).addClass('active');
				
		// Set active tab page
		jQuery(old_page).fadeOut('slow', function(){
			
			jQuery(tab_page).fadeIn('slow');
			
		});
		
	});
	
/*-----------------------------------------------------------------------------------*/
/*	Form Submit
/*-----------------------------------------------------------------------------------*/
	
	jQuery('form#plugin-options').submit(function(){
			
		var data = jQuery(this).serialize();
		
		jQuery.post(ajaxurl, data, function(response){
			
			if(response == 0){
				
				// Flash success message and shadow
				var success = jQuery('#success-save');
				var bg = jQuery("#message-bg");
				success.css("position","fixed");
				success.css("top", ((jQuery(window).height() - 65) / 2) + jQuery(window).scrollTop() + "px");
				success.css("left", ((jQuery(window).width() - 257) / 2) + jQuery(window).scrollLeft() + "px");
				bg.css({"height": jQuery(window).height()});
				bg.css({"opacity": .45});
				bg.fadeIn("slow", function(){
					success.fadeIn('slow', function(){
						success.delay(1500).fadeOut('fast', function(){
							bg.fadeOut('fast');
						});
					});
				});
								
			} else {
				
				//error out
				
			}
		
		});
				  
		return false;
	
	});	
	
/*-----------------------------------------------------------------------------------*/
/*	Finished
/*-----------------------------------------------------------------------------------*/
	
});

</script>

<div id="message-bg"></div>
<div id="success-save"></div>

<div id="tc_framework_wrap">

	<div id="header">
    	<h1>Kill IE6 Settings</h1>
        <span class="icon">&nbsp;</span>
    </div>
    
    <div id="content_wrap">
    
    	<form id="plugin-options" name="plugin-options" action="/">
        <?php settings_fields( 'killie-settings-group' ); ?>
        <input type="hidden" name="action" value="killie_tc_settings_save" />
        <input type="hidden" name="security" value="<?php echo wp_create_nonce('killie_settings_secure'); ?>" />
        
        	<div id="sub_header" class="info">
            
                <input type="submit" name="settingsBtn" id="settingsBtn" class="button-framework save-options" value="<?php _e('Save All Changes') ?>" />
                <span>Options Page</span>
                
            </div>
            
            <div id="content">
            
            	<div id="options_content">
                
                	<ul class="options_pages">
                    	<li id="general_options" class="active"><a href="#">General Settings</a><span></span></li>
                    </ul>
                    
                    <div id="general_options" class="options_page">
                    
                    	<div class="option">
                        	<h3>Enable Kill IE</h3>
                            <div class="section">
                            	<div class="element"><select name="killie-enabled" id="killie-enabled" class="textfield">
                    <option value="1" <?PHP if(get_option('killie-enabled') == '1'){echo 'selected="selected"';} ?>>Enabled & Show on Homepage</option>
                    <option value="2" <?PHP if(get_option('killie-enabled') == '2'){echo 'selected="selected"';} ?>>Enabled & Do Not Show on Homepage</option>
                    <option value="3" <?PHP if(get_option('killie-enabled') == '3'){echo 'selected="selected"';} ?>>Disabled ( Off )</option>
                				</select></div>
                                <div class="description">Enable or disable Kill IE and choose to enable it on the homepage.</div>
                            </div>
                        </div>


                    	<div class="option">
                        	<h3>Exclude or Include Selected Pages</h3>
                            <div class="section">
                            	<div class="element"><select name="killie-page-selector" id="killie-page-selector" class="textfield">
                    <option value="1" <?PHP if(get_option('killie-page-selector') == '1'){echo 'selected="selected"';} ?>>Only Show on Selected Pages</option>
                    <option value="2" <?PHP if(get_option('killie-page-selector') == '2'){echo 'selected="selected"';} ?>>Show on All Pages But The Selected Pages</option>
                				</select></div>
                                <div class="description">Choose how selected pages should be used.</div>
                            </div>
                        </div>


                    	<div class="option">
                        	<h3>Selected Pages</h3>
                            <div class="section">
                            	<div class="element"><input name="killie-pages" id="killie-pages" class="textfield" value="<?php echo get_option('killie-pages'); ?>" /></div>
                                <div class="description">Enter any page or post id seperated by commas. ex. 256, 162, 3, 45</div>
                            </div>
                        </div>
                        
                        
                    	<div class="option">
                        	<h3>Kill IE Versions</h3>
                            <div class="section">
                            	<div class="element"><select name="killie-versions" id="killie-versions" class="textfield">
                    <option value="5" <?PHP if(get_option('killie-versions') == '5'){echo 'selected="selected"';} ?>>Internet Explorer 5.0 or Older</option>
                    <option value="6" <?PHP if(get_option('killie-versions') == '6'){echo 'selected="selected"';} ?>>Internet Explorer 6.0 or Older</option>
                    <option value="7" <?PHP if(get_option('killie-versions') == '7'){echo 'selected="selected"';} ?>>Internet Explorer 7.0 or Older</option>
                    <option value="8" <?PHP if(get_option('killie-versions') == '8'){echo 'selected="selected"';} ?>>Internet Explorer 8.0 or Older</option>
                				</select></div>
                                <div class="description">Select which versions should be redirected.</div>
                            </div>
                        </div>
                        
                        
                    	<div class="option">
                        	<h3>Template / Color Theme</h3>
                            <div class="section">
                            	<div class="element"><select name="killie-template" id="killie-template" class="textfield">
                    <option value="blue" <?PHP if(get_option('killie-template') == 'blue'){echo 'selected="selected"';} ?>>Blue Template</option>
                    <option value="red" <?PHP if(get_option('killie-template') == 'red'){echo 'selected="selected"';} ?>>Red Template</option>
                    <option value="green" <?PHP if(get_option('killie-template') == 'green'){echo 'selected="selected"';} ?>>Green Template</option>
                    <option value="purple" <?PHP if(get_option('killie-template') == 'purple'){echo 'selected="selected"';} ?>>Purple Template</option>
                    <option value="orange" <?PHP if(get_option('killie-template') == 'orange'){echo 'selected="selected"';} ?>>Orange Template</option>
                    <option value="grey" <?PHP if(get_option('killie-template') == 'grey'){echo 'selected="selected"';} ?>>Grey Template</option>
                				</select></div>
                                <div class="description">Select the color of the template you want to use.</div>
                            </div>
                        </div>
                                                                        
                    </div>            
                                        
            		<br class="clear" />
                    
            </div>
            
            <div class="info bottom">
            
                <input type="submit" name="settingsBtn" id="settingsBtn" class="button-framework save-options" value="<?php _e('Save All Changes') ?>" />
            
            </div>
            
        </form>
        
    </div>

</div>

<?php } ?>
