<?php //header("Content-type: text/css");
require_once( ABSPATH . 'wp-load.php');
$al_options = get_option('al_general_settings');
?>
<style type="text/css">
<?php if ( $al_options['al_custom_background'] != '' || $al_options['al_background_color'] != '' || $al_options['al_background_repeat'] != '') :?>
body{
	<?php if(!(empty($al_options['al_custom_background']))):?>background-image:url('<?php echo $al_options['al_custom_background']?>')!important;<?php endif?>  	<?php if(!(empty($al_options['al_background_color']))):?>background-color:<?php echo $al_options['al_background_color']?> !important;<?php endif?>
	<?php if(!(empty($al_options['al_background_repeat']))):?>background-repeat:<?php echo $al_options['al_background_repeat']?> !important;<?php endif?>
	<?php if(!(empty($al_options['al_fixed_bg'])) && !(empty($al_options['al_custom_background']))):?>
		background: url(<?php echo $al_options['al_custom_background']?>) no-repeat center center fixed;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
	<?php endif?>
}
<?php endif?>

<?php if ($al_options['al_topbar_bg']):?>
.box{
	<?php if (!(empty($al_options['al_topbar_bg']))):?> background-image:url('<?php echo $al_options['al_topbar_bg']?>'); <?php endif ?> 
	<?php if (!(empty($al_options['al_topbar_bg_repeat']))):?> background-repeat:<?php echo $al_options['al_topbar_bg_repeat'] ?>; <?php endif ?> 
}
<?php endif?>
<?php if ($al_options['al_header_bg']):?>
header{
	<?php if (!(empty($al_options['al_header_bg']))):?> background-image:url('<?php echo $al_options['al_header_bg']?>'); <?php endif ?> 
	<?php if (!(empty($al_options['al_header_bg_repeat']))):?> background-repeat:<?php echo $al_options['al_header_bg_repeat'] ?>; <?php endif ?> 
}
<?php endif?>
<?php if($al_options['al_footer_bg'] != ''):?>
.footer{
	background-image:url('<?php echo $al_options['al_footer_bg']?>'); 
	background-repeat:<?php echo $al_options['footer_bg_repeat'] ?>;	
}
<?php endif?>
<?php if($al_options['al_bottombar_bg_color'] != ''):?>
.bottombar{background-color:<?php	echo  $al_options['al_bottombar_bg_color'] ?>;}
<?php endif?>
<?php if($al_options['al_topbar_bg_color'] != ''):?>
.pagebgd{background-color:<?php	echo  $al_options['al_topbar_bg_color'] ?>;}
<?php endif?>
<?php if($al_options['al_topmenu_font_size'] != ''):?>
#menu ul a{font-size: <?php echo $al_options['al_topmenu_font_size']?>}
<?php endif?>
<?php if($al_options['al_dmenu_font_size'] != ''):?>
#menu ul a{font-size: <?php echo $al_options['al_topmenu_font_size']?>}
<?php endif?>
<?php if($al_options['al_dropdownmenu_font_size'] != ''):?>
#menu ul ul a{font-size: <?php echo $al_options['al_dropdownmenu_font_size']?>}
<?php endif?>
<?php if($al_options['al_body_font_size'] != ''):?>
body{font-size: <?php echo $al_options['al_body_font_size']?>}
<?php endif?>
<?php if($al_options['al_menu_font_color'] != ''):?>
#menu ul a{color: <?php echo $al_options['al_menu_font_color']?>}
<?php endif?>
<?php if($al_options['al_menu_active_font_color'] != ''):?>
#menu ul .current > a, #menu ul .current-menu-item > a, #menu ul .current_page_item > a, #menu ul .current_page_parent > a, #menu ul .current-menu-parent > a{
	color: <?php echo $al_options['al_menu_active_font_color']?>}
<?php endif?>
<?php if($al_options['al_submenu_font_color'] != ''):?>
#menu ul ul a{color: <?php echo $al_options['al_submenu_font_color']?>}
<?php endif?>
<?php if($al_options['al_menu_shadow_color'] != ''):?>
#menu ul a, #menu ul ul a{text-shadow:0 0 0 transparent,<?php echo $al_options['al_menu_shadow_color']?> 0px 1px 0px}
<?php endif?>
</style>