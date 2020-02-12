<script src="<?php echo get_template_directory_uri() ?>/js/jquery.tabSlideOut.v1.3.js" type="text/javascript"></script>    
<script type="text/javascript">
	jQuery(function(){
		jQuery('.slide-out-div').tabSlideOut({
			tabHandle: '.handle',                              //class of the element that will be your tab
			pathToTabImage: '<?php echo get_template_directory_uri() ?>/images/panel.png',          //path to the image for the tab *required*
			imageHeight: '26px',                              //height of tab image *required*
			imageWidth: '26px',                                //width of tab image *required*    
			tabLocation: 'left',                               //side of screen where tab lives, top, right, bottom, or left
			speed: 200,                                        //speed of animation
			action: 'click',                                   //options: 'click' or 'hover', action to trigger animation
			topPos: '60px',                                   //position from the top
			fixedPosition: true,                              //options: true makes it stick(fixed position) on scroll
			onLoadSlideOut: true	
		});
	});

/********** THEME SWITCHER ***********/

jQuery(document).ready(function(){
	var cookie_options = { path: '/', expires: 7 };
	
	var get_cookie = jQuery.cookie('Cosmopolitan_skin');
	var get_cookie2 = jQuery.cookie('Cosmopolitan_background');
	var get_cookie3 = jQuery.cookie('Cosmopolitan_theme');
	var isDark = 0;
	
	if(get_cookie == null){
		get_cookie = 'default';
		jQuery ('#active-skin').remove();
	}
	if (get_cookie3 == 'dark')
	{
		jQuery('head').append('<link rel="stylesheet" id="active-theme" type="text/css" href="<?php echo get_template_directory_uri() ?>/dark-theme.css" />'); 
	}
	else
	{
		jQuery('#active-theme').remove();
	}
	
	jQuery('head').append('<link rel="stylesheet" id="active-skin" type="text/css" href="<?php echo get_template_directory_uri() ?>/css/colors/' + get_cookie + '.css" />'); 
	
	jQuery(".switcher-themes").find('a').bind('click', function() {
		
		jQuery('#active-theme').remove();														
		var themename = jQuery(this).attr("data-rel");		
		
		jQuery.cookie('Cosmopolitan_theme', themename, cookie_options);
		if (themename == 'dark')
		{
			isDark = 1;
			jQuery('head').append('<link rel="stylesheet" id="active-theme" type="text/css" href="<?php echo get_template_directory_uri() ?>/dark-theme.css" />'); 
		}
		else
		{
			isDark = 0;
			jQuery('#active-theme, #dark-bg, #light-bg').remove();
		}
		return false;
	});	
	
	jQuery('.switcher-skins').find('a').bind('click', function() {		
		var skinname = jQuery(this).attr("data-rel");	
		jQuery.cookie('Cosmopolitan_skin', skinname, cookie_options);
		jQuery('head').append('<link rel="stylesheet" id="active-skin" type="text/css" href="<?php echo get_template_directory_uri() ?>/css/colors/' + skinname + '.css" />'); 
		
		return false;
	});
	
	jQuery(".switcher-backgrounds").find('a').bind('click', function() {
																	
		var bgname = jQuery(this).attr("data-rel");		
		
		jQuery.cookie('Cosmopolitan_background', bgname, cookie_options);
		if (get_cookie3 == 'dark' || isDark == 1)
		{
			jQuery('head').append('<style type="text/css" id="dark-bg">.box {background:url(<?php echo get_template_directory_uri() ?>/images/backgrounds/dark/' + bgname + '.jpg) repeat center top;}</style>'); 
			jQuery('#light-bg').remove();
		}
		else if (get_cookie3 == 'light' || isDark == 0)
		{
			jQuery('head').append('<style type="text/css" id="light-bg">.box {background:url(<?php echo get_template_directory_uri() ?>/images/backgrounds/' + bgname + '.jpg) repeat center top;}</style>'); 
			jQuery('#dark-bg').remove();
		}
		
		return false;
	});
	
});
-->
</script>

<!--Slide Out-->
<div class="slide-out-div">
	<a class="handle" href="#">Control Panel</a>
    <div id="colorchanger">
		<p>Theme</p> 
        <div class="switcher-themes">
            <a href="#" class="light-theme" data-rel="light">Light</a>
            <a href="#" class="dark-theme" data-rel="dark">Dark</a>
            <div class="clearsmall"></div>
        </div>
    	<p>Accent Colors</p> 
        <div class="switcher-skins">
            <a href="#" class="colorbox colorblue" data-rel="blue" title=""></a>
            <a href="#" class="colorbox colorgreen" data-rel="green" title=""></a>
            <a href="#" class="colorbox colorteal" data-rel="teal" title=""></a>
            <a href="#" class="colorbox colorpurple" data-rel="purple" title=""></a>
            <a href="#" class="colorbox colorviolet" data-rel="violet" title=""></a>
            <a href="#" class="colorbox colorred" data-rel="red" title=""></a>
            <a href="#" class="colorbox colorrust" data-rel="rust" title=""></a>
            <a href="#" class="colorbox colororange" data-rel="orange" title=""></a>
            <a href="#" class="colorbox colormauve" data-rel="mauve" title=""></a>
            <a href="#" class="colorbox colorblack" data-rel="black" title=""></a>
            <a href="#" class="colorbox colorwhite" data-rel="white" title=""></a>
            <div class="clearsmall"></div>
        </div>
        <p>Backgrounds</p>
        <div class="switcher-backgrounds">
            <a href="#" class="colorbox bgd1" data-rel="background1" title=""></a>
            <a href="#" class="colorbox bgd2" data-rel="background2" title=""></a>
            <a href="#" class="colorbox bgd3" data-rel="background3" title=""></a>
            <a href="#" class="colorbox bgd4" data-rel="background4" title=""></a>
            <a href="#" class="colorbox bgd5" data-rel="background5" title=""></a>
            <a href="#" class="colorbox bgd6" data-rel="background6" title=""></a>
            <a href="#" class="colorbox bgd7" data-rel="background7" title=""></a>
            <a href="#" class="colorbox bgd8" data-rel="background8" title=""></a>
            <a href="#" class="colorbox bgd9" data-rel="background9" title=""></a>  
        </div>                                  
	</div>
</div>