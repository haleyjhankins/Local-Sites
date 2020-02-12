<?php 
/** Get Admin Panel Options **/
	
global $options;

$get_options = get_option('al_general_settings');
	
foreach ($options as $value) 
{
	if ($get_options[$value['id']] == false) 
	{
		$$value['id'] = $value['std'];
	}
	else 
	{
		$$value['id'] = $get_options[$value['id']];
	}
}
?>