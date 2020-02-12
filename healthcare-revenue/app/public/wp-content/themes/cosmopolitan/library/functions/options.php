<?php

/** Cosmopolitan Options Page **/

$theme_name = 'Cosmopolitan';
$shortname = 'al';
$theme_version = '1.0';
$path = get_stylesheet_directory_uri();
$styles = array();
$background_options = array();
$skins = array();

if (is_dir(TEMPLATEPATH . "/css/")) {
	if ($open_dir = opendir(TEMPLATEPATH . "/css/")) {
		while (($style = readdir($open_dir)) !== false) {
			if (stristr($style, ".css") !== false) {
				$styles[] = $style;
			}
		}
	}
}


$html_desc = 'Enter HTML text';
$html_desc_p = 'Enter HTML text NOTE: Text must be between "p" tags';
$text_desc = 'Enter text';
$long_text = '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur et dignissim ipsum. Nam ac interdum sem. Pellentesque diam lacus, dictum in dapibus id, hendrerit eget felis. Nunc nec turpis libero</p>
<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas euismod condimentum mollis. In non congue orci. Nulla nunc velit, volutpat vestibulum congue vitae, tincidunt at sem. Pellentesque tincidunt molestie mi, eu aliquam quam fringilla nec. Sed suscipit adipiscing urna, et varius libero commodo eget.</p>';

$upload_desc = 'Upload image for your theme, or specify an existing url';

// Array added for 3D Rotator
$tween_types = array(
	array("value"=>"easeInOutExpo", "text"=>"easeInOutExpo"),
	array("value"=>"linear", "text"=>"linear"),
	array("value"=>"easeInSine", "text"=>"easeInSine"),
	array("value"=>"easeInSine", "text"=>"easeInSine"),
	array("value"=>"easeInOutSine", "text"=>"easeInOutSine"),
	array("value"=>"easeInCubic", "text"=>"easeInCubic"), 
	array("value"=>"easeOutCubic", "text"=>"easeOutCubic"),
	array("value"=>"easeInOutCubic", "text"=>"easeInOutCubic"), 
	array("value"=>"easeOutInCubic", "text"=>"easeOutInCubic"), 
	array("value"=>"easeInQuint", "text"=>"easeInQuint"), 
	array("value"=>"easeOutQuint", "text"=>"easeOutQuint"),
	array("value"=>"easeInOutQuint", "text"=>"easeInOutQuint"),
	array("value"=>"easeOutInQuint", "text"=>"easeOutInQuint"),
	array("value"=>"easeInCirc", "text"=>"easeInCirc"),
	array("value"=>"easeOutCirc", "text"=>"easeOutCirc"), 
	array("value"=>"easeInOutCirc", "text"=>"easeInOutCirc"),
	array("value"=>"easeOutInCirc", "text"=>"easeOutInCirc"),
	array("value"=>"easeInBack", "text"=>"easeInBack"), 
	array("value"=>"easeOutBack", "text"=>"easeOutBack"), 
	array("value"=>"easeInOutBack", "text"=>"easeInOutBack"), 
	array("value"=>"easeOutInBack", "text"=>"easeOutInBack"),
	array("value"=>"easeInQuad", "text"=>"easeInQuad"),
	array("value"=>"easeOutQuad", "text"=>"easeOutQuad"),
	array("value"=>"easeInOutQuad", "text"=>"easeInOutQuad"),
	array("value"=>"easeOutInQuad", "text"=>"easeOutInQuad"), 
	array("value"=>"easeInQuart", "text"=>"easeInQuart"), 
	array("value"=>"easeOutQuart", "text"=>"easeOutQuart"),
	array("value"=>"easeInOutQuart", "text"=>"easeInOutQuart"), 
	array("value"=>"easeOutInQuart", "text"=>"easeOutInQuart"),
	array("value"=>"easeInExpo", "text"=>"easeInExpo"), 
	array("value"=>"easeOutExpo", "text"=>"easeOutExpo"), 
	array("value"=>"easeOutInExpo", "text"=>"easeOutInExpo"),
	array("value"=>"easeInElastic", "text"=>"easeInElastic"), 
	array("value"=>"easeOutElastic", "text"=>"easeOutElastic"), 
	array("value"=>"easeInOutElastic", "text"=>"easeInOutElastic"), 
	array("value"=>"easeOutInElastic", "text"=>"easeOutInElastic"), 
	array("value"=>"easeInBounce", "text"=>"easeInBounce"), 
	array("value"=>"easeOutBounce", "text"=>"easeOutBounce"),
	array("value"=>"easeInOutBounce", "text"=>"easeInOutBounce"),
	array("value"=>"easeOutInBounce", "text"=>"easeOutInBounce")
);

$fonts = array(
	array('value'=>'off', 'text'=>'None / Disabled'),
	array('value'=>'Aclonica', 'text'=>'Aclonica'),
	array('value'=>'Allan', 'text'=>'Allan'),
	array('value'=>'Allerta', 'text'=>'Allerta'),
	array('value'=>'Allerta Stencil', 'text'=>'Allerta Stencil'),
	array('value'=>'Amaranth', 'text'=>'Amaranth'),
	array('value'=>'Annie Use Your Telescope', 'text'=>'Annie Use Your Telescope'),
	array('value'=>'Anonymous Pro', 'text'=>'Anonymous Pro'),
	array('value'=>'Allerta', 'text'=>'Allerta'),
	array('value'=>'Allerta Stencil', 'text'=>'Allerta Stencil'),
	array('value'=>'Anonymous Pro:regular,italic,bold,bolditalic', 'text'=>'Anonymous Pro (plus italic, bold, and bold italic)'),
	array('value'=>'Anton', 'text'=>'Anton'),
	array('value'=>'Arapey', 'text'=>'Arapey'),
	array('value'=>'Architects Daughter', 'text'=>'Architects Daughter'),
	array('value'=>'Arimo', 'text'=>'Arimo'),
	array('value'=>'Arimo:regular,italic,bold,bolditalic', 'text'=>'Arimo (plus italic, bold, and bold italic)'),
	array('value'=>'Arvo', 'text'=>'Arvo'),
	array('value'=>'Arvo:regular,italic,bold,bolditalic', 'text'=>'Arvo (plus italic, bold, and bold italic)'),
	array('value'=>'Astloch', 'text'=>'Astloch'),
	array('value'=>'Astloch:regular,bold', 'text'=>'Astloch (plus bold)'),
	array('value'=>'Bangers', 'text'=>'Bangers'),
	array('value'=>'Bentham', 'text'=>'Bentham'),
	array('value'=>'Bevan', 'text'=>'Bevan'),
	array('value'=>'Bigshot One', 'text'=>'Bigshot One'),
	array('value'=>'Brawler', 'text'=>'Brawler'),
	array('value'=>'Buda:light', 'text'=>'Buda'),
	array('value'=>'Cabin', 'text'=>'Cabin'),
	array('value'=>'Cabin:regular,500,600,bold', 'text'=>'Cabin (plus 500, 600, and bold)'),
	array('value'=>'Cabin Sketch:bold', 'text'=>'Cabin Sketch'),
	array('value'=>'Calligraffitti', 'text'=>'Calligraffitti'),
	array('value'=>'Candal', 'text'=>'Candal'),
	array('value'=>'Cantarell', 'text'=>'Cantarell'),
	array('value'=>'Cantarell:regular,italic,bold,bolditalic', 'text'=>'Cantarell (plus italic, bold, and bold italic)'),
	array('value'=>'Cardo', 'text'=>'Cardo'),
	array('value'=>'Carter One', 'text'=>'Carter One'),
	array('value'=>'Cherry Cream Soda', 'text'=>'Cherry Cream Soda'),
	array('value'=>'Chewy', 'text'=>'Chewy'),
	array('value'=>'Coda', 'text'=>'Coda'),
	array('value'=>'Coming Soon', 'text'=>'Coming Soon'),
	array('value'=>'Copse', 'text'=>'Copse'),
	array('value'=>'Corben:bold', 'text'=>'Corben'),
	array('value'=>'Cousine', 'text'=>'Cousine'),
	array('value'=>'Cousine:regular,italic,bold,bolditalic', 'text'=>'Cousine (plus italic, bold, and bold italic)'),
	array('value'=>'Covered By Your Grace', 'text'=>'Covered By Your Grace'),
	array('value'=>'Crafty Girls', 'text'=>'Crafty Girls'),
	array('value'=>'Crimson Text', 'text'=>'Crimson Text'),
	array('value'=>'Crushed', 'text'=>'Crushed'),
	array('value'=>'Cuprum', 'text'=>'Cuprum'),
	array('value'=>'Damion', 'text'=>'Damion'),
	array('value'=>'Dancing Script', 'text'=>'Dancing Script'),
	array('value'=>'Dawning of a New Day', 'text'=>'Dawning of a New Day'),
	array('value'=>'Didact Gothic', 'text'=>'Didact Gothic'),
	array('value'=>'Droid Sans', 'text'=>'Droid Sans'),		
	array('value'=>'Droid Sans:regular,bold', 'text'=>'Droid Sans (plus bold)'),
	array('value'=>'Droid Sans Mono', 'text'=>'Droid Sans Mono'),
	array('value'=>'Droid Serif', 'text'=>'Droid Serif'),
	array('value'=>'Droid Serif:regular,italic,bold,bolditalic', 'text'=>'Droid Serif (plus italic, bold, and bold italic)'),
	array('value'=>'EB Garamond', 'text'=>'EB Garamond'),
	array('value'=>'Expletus Sans', 'text'=>'Expletus Sans'),
	array('value'=>'Expletus Sans:regular,500,600,bold', 'text'=>'Expletus Sans (plus 500, 600, and bold)'),
	array('value'=>'Fontdiner Swanky', 'text'=>'Fontdiner Swanky'),
	array('value'=>'Francois One', 'text'=>'Francois One'),
	array('value'=>'Geo', 'text'=>'Geo'),	
	array('value'=>'Goudy Bookletter 1911', 'text'=>'Goudy Bookletter 1911'),
	array('value'=>'Gruppo', 'text'=>'Gruppo'),
	array('value'=>'Holtwood One SC', 'text'=>'Holtwood One SC'),
	array('value'=>'Homemade Apple', 'text'=>'Homemade Apple'),
	array('value'=>'Inconsolata', 'text'=>'Inconsolata'),
	array('value'=>'Indie Flower', 'text'=>'Indie Flower'),
	array('value'=>'IM Fell DW Pica', 'text'=>'IM Fell DW Pica'),
	array('value'=>'IM Fell DW Pica:regular,italic', 'text'=>'IM Fell DW Pica (plus italic)'),
	array('value'=>'IM Fell DW Pica SC', 'text'=>'IM Fell DW Pica SC'),
	array('value'=>'IM Fell Double Pica', 'text'=>'IM Fell Double Pica'),
	array('value'=>'IM Fell English', 'text'=>'IM Fell English'),
	array('value'=>'IM Fell English:regular,italic', 'text'=>'IM Fell English (plus italic)'),	
	array('value'=>'IM Fell English SC', 'text'=>'IM Fell English SC'),
	array('value'=>'IM Fell French Canon', 'text'=>'IM Fell French Canon'),
	array('value'=>'IM Fell French Canon:regular,italic', 'text'=>'IM Fell French Canon (plus italic)'),
	array('value'=>'IM Fell French Canon SC', 'text'=>'IM Fell French Canon SC'),
	array('value'=>'IM Fell Great Primer', 'text'=>'IM Fell Great Primer'),
	array('value'=>'IM Fell Great Primer:regular,italic', 'text'=>'IM Fell Great Primer (plus italic)'),
	array('value'=>'IM Fell Great Primer SC', 'text'=>'IM Fell Great Primer SC'),
	array('value'=>'Irish Grover', 'text'=>'Irish Grover'),
	array('value'=>'Irish Growler', 'text'=>'Irish Growler'),
	array('value'=>'Josefin Sans:100,100italic', 'text'=>'Josefin Sans 100 (plus italic)'),
	array('value'=>'Josefin Sans:light,lightitalic', 'text'=>'Josefin Sans Light 300 (plus italic)'),
	array('value'=>'Josefin Sans:regular,regularitalic', 'text'=>'Josefin Sans Regular 400 (plus italic)'),
	array('value'=>'Josefin Sans:bold,bolditalic', 'text'=>'Josefin Sans Bold 700 (plus italic)'),
	array('value'=>'Josefin Slab:100,100italic', 'text'=>'Josefin Slab 100 (plus italic)'),		
	array('value'=>'Josefin Slab:light,lightitalic', 'text'=>'Josefin Slab Light 300 (plus italic)'),
	array('value'=>'Josefin Slab:600,600italic', 'text'=>'Josefin Slab 600 (plus italic)'),
	array('value'=>'Josefin Slab:bold,bolditalic', 'text'=>'Josefin Slab Bold 700 (plus italic)'),
	array('value'=>'Judson', 'text'=>'Judson'),
	array('value'=>'Judson:regular,regularitalic,bold', 'text'=>'Judson (plus bold)'),
	array('value'=>'Just Another Hand', 'text'=>'Just Another Hand'),
	array('value'=>'Just Me Again Down Here', 'text'=>'Just Me Again Down Here'),
	array('value'=>'Kenia', 'text'=>'Kenia'),
	array('value'=>'Kranky', 'text'=>'Kranky'),
	array('value'=>'Kreon:light,regular,bold', 'text'=>'Kreon (plus light and bold)'),
	array('value'=>'Kristi', 'text'=>'Kristi'),
	array('value'=>'Lato:100,100italic', 'text'=>'Lato Light 100 (plus italic)'),
	array('value'=>'Lato:regular,regularitalic', 'text'=>'Lato Regular 400 (plus italic)'),
	array('value'=>'Lato:bold,bolditalic', 'text'=>'Lato Bold 700 (plus italic)'),
	array('value'=>'Lato:900,900italic', 'text'=>'Lato 900 (plus italic)'),
	array('value'=>'League Script', 'text'=>'League Script'),
	array('value'=>'Lekton', 'text'=>'Lekton'),
	array('value'=>'Lekton:regular,italic,bold', 'text'=>'Lekton (plus italic and bold)'),
	array('value'=>'Lobster', 'text'=>'Lobster'),
	array('value'=>'Luckiest Guy', 'text'=>'Luckiest Guy'),
	array('value'=>'Maiden Orange', 'text'=>'Maiden Orange'),
	array('value'=>'Mako', 'text'=>'Mako'),
	array('value'=>'Meddon', 'text'=>'Meddon'),
	array('value'=>'MedievalSharp', 'text'=>'MedievalSharp'),
	array('value'=>'Megrim', 'text'=>'Megrim'),
	array('value'=>'Merriweather', 'text'=>'Merriweather'),
	array('value'=>'Metrophobic', 'text'=>'Metrophobic'),
	array('value'=>'Michroma', 'text'=>'Michroma'),
	array('value'=>'Miltonian Tattoo', 'text'=>'Miltonian Tattoo'),
	array('value'=>'Miltonian', 'text'=>'Miltonian'),
	array('value'=>'Monofett', 'text'=>'Monofett'),
	array('value'=>'Molengo', 'text'=>'Molengo'),
	array('value'=>'Mountains of Christmas', 'text'=>'Mountains of Christmas'),
	array('value'=>'News Cycle', 'text'=>'News Cycle'),
	array('value'=>'Nobile', 'text'=>'Nobile'),
	array('value'=>'Nobile:regular,italic,bold,bolditalic', 'text'=>'Nobile (plus italic, bold, and bold italic)'),
	array('value'=>'Nova Cut', 'text'=>'Nova Cut'),
	array('value'=>'Nova Flat', 'text'=>'Nova Flat'),
	array('value'=>'Nova Mono', 'text'=>'Nova Mono'),
	array('value'=>'Nova Oval', 'text'=>'Nova Oval'),
	array('value'=>'Nova Round', 'text'=>'Nova Round'),
	array('value'=>'Nova Script', 'text'=>'Nova Script'),
	array('value'=>'Nova Slim', 'text'=>'Nova Slim'),
	array('value'=>'Nova Square', 'text'=>'Nova Square'),
	array('value'=>'Neucha', 'text'=>'Neucha'),
	array('value'=>'Neuton', 'text'=>'Neuton'),
	array('value'=>'Nunito:light,regular,bold', 'text'=>'Nunito'),
	array('value'=>'OFL Sorts Mill Goudy TT', 'text'=>'OFL Sorts Mill Goudy TT'),
	array('value'=>'Old Standard TT', 'text'=>'Old Standard TT'),
	array('value'=>'Old Standard TT:regular,italic,bold', 'text'=>'Old Standard TT (plus italic and bold)'),
	array('value'=>'Open Sans:light,lightitalic', 'text'=>'Open Sans light'),
	array('value'=>'Open Sans:regular,regularitalic', 'text'=>'Open Sans regular'),
	array('value'=>'Open Sans:light,lightitalic,regular,regularitalic,600,600italic,bold,bolditalic,800,800italic', 'text'=>'Open Sans (all types)'),
	array('value'=>'Open Sans Condensed:light,lightitalic', 'text'=>'Open Sans Condensed'),
	array('value'=>'Orbitron', 'text'=>'Orbitron Regular (400)'),
	array('value'=>'Orbitron:bold', 'text'=>'Orbitron (Bold)'),
	array('value'=>'Oswald', 'text'=>'Oswald'),
	array('value'=>'Over the Rainbow', 'text'=>'Over the Rainbow'),
	array('value'=>'Reenie Beanie', 'text'=>'Reenie Beanie'),
	array('value'=>'Pacifico', 'text'=>'Pacifico'),
	array('value'=>'Paytone One', 'text'=>'Paytone One'),
	array('value'=>'Permanent Marker', 'text'=>'Permanent Marker'),
	array('value'=>'Philosopher', 'text'=>'Philosopher'),
	array('value'=>'Play:regular,bold', 'text'=>'Play (plus bold)'),
	array('value'=>'PT Sans:regular,italic,bold,bolditalic', 'text'=>'PT Sans (plus itlic, bold, and bold italic)'),
	array('value'=>'PT Sans Caption:regular,bold', 'text'=>'PT Sans Caption (plus bold)'),
	array('value'=>'PT Sans Narrow:regular,bold', 'text'=>'PT Sans Narrow (plus bold)'),
	array('value'=>'PT Serif:regular,italic,bold,bolditalic', 'text'=>'PT Serif (plus italic, bold, and bold italic)'),
	array('value'=>'PT Serif Caption:regular,italic', 'text'=>'PT Serif Caption (plus italic)'),
	array('value'=>'Puritan:regular,italic,bold,bolditalic', 'text'=>'>Puritan (plus italic, bold, and bold italic)'),
	array('value'=>'Quattrocento', 'text'=>'Quattrocento'),
	array('value'=>'Quattrocento', 'text'=>'Quattrocento'),
	array('value'=>'Quattrocento Sans', 'text'=>'Quattrocento Sans'),
	array('value'=>'Radley', 'text'=>'Radley'),
	array('value'=>'Raleway', 'text'=>'Raleway'),
	array('value'=>'Rock Salt', 'text'=>'Rock Salt'),
	array('value'=>'Rokkitt', 'text'=>'Rokkitt'),
	array('value'=>'Schoolbell', 'text'=>'Schoolbell'),
	array('value'=>'Shanti', 'text'=>'Shanti'),
	array('value'=>'Sigmar One', 'text'=>'Sigmar One'),
	array('value'=>'Six Caps', 'text'=>'Six Caps'),
	array('value'=>'Slackey', 'text'=>'Slackey'),
	array('value'=>'Smythe', 'text'=>'Smythe'),
	array('value'=>'Sniglet 800', 'text'=>'Sniglet'),
	array('value'=>'Special Elite', 'text'=>'Special Elite'),
	array('value'=>'Sue Ellen Francisco', 'text'=>'Sue Ellen Francisco'),
	array('value'=>'Sunshiney', 'text'=>'Sunshiney'),
	array('value'=>'Swanky and Moo Moo', 'text'=>'Swanky and Moo Moo'),
	array('value'=>'Syncopate', 'text'=>'Syncopate'),
	array('value'=>'Tangerine', 'text'=>'Tangerine'),
	array('value'=>'Terminal Dosis Light', 'text'=>'Terminal Dosis Light'),
	array('value'=>'The Girl Next Door', 'text'=>'The Girl Next Door'),
	array('value'=>'Tinos', 'text'=>'Tinos'),
	array('value'=>'Tinos:regular,italic,bold,bolditalic', 'text'=>'Tinos (plus italic, bold, and bold italic)'),
	array('value'=>'Ubuntu', 'text'=>'Ubuntu'),
	array('value'=>'Ubuntu:regular,italic,bold,bolditalic', 'text'=>'Ubuntu (plus italic, bold, and bold italic)'),
	array('value'=>'Ultra', 'text'=>'Ultra'),
	array('value'=>'Unkempt', 'text'=>'Unkempt'),
	array('value'=>'UnifrakturCook:bold', 'text'=>'UnifrakturCook'),
	array('value'=>'UnifrakturMaguntia', 'text'=>'UnifrakturMaguntia'),
	array('value'=>'Vibur', 'text'=>'Vibur'),
	array('value'=>'Vollkorn', 'text'=>'Vollkorn'),
	array('value'=>'Vollkorn:regular,italic,bold,bolditalic', 'text'=>'Vollkorn (plus italic, bold, and bold italic)'),
	array('value'=>'VT323', 'text'=>'VT323'),
	array('value'=>'Waiting for the Sunrise', 'text'=>'Waiting for the Sunrise'),
	array('value'=>'Wallpoet', 'text'=>'Wallpoet'),
	array('value'=>'Walter Turncoat', 'text'=>'Walter Turncoat'),
	array('value'=>'Yanone Kaffeesatz', 'text'=>'Yanone Kaffeesatz'),
	array('value'=>'Yanone Kaffeesatz:700', 'text'=>'Yanone Kaffeesatz (Bold)')
);


$options = array(
	
	array(
		'type' => 'open',
		'tab_name' => 'General settings',
		'tab_id' => 'general-settings'
	) ,
	
		array(
			'name' => 'Logo image',
			'id' => $shortname . '_logo',
			'type' => 'upload',
			'img_w' => '400',
			'img_h' => '250',
			'std' => '',
			'desc' => 'Upload a logo from your hard drive or specify an existing url (Recommended size: 200x46)'
		),
	
		array(
			'name' => 'Logo Text',
			'id' => $shortname . '_logotext',
			'type' => 'text',
			'std' => '',
			'desc' => 'Logo Image alt text'
		) ,
		
		array(
			'name' => 'Choose a theme',
			'id' => $shortname.'_theme',
			'type' => 'select',
			'std' => '',
			'desc' => 'Choose between like or dark themes.',
			'options' => array(
				array( "value" => "0", "text" => "Light"),
				array( "value" => "1", "text" =>  "Dark")
			)
		),
		
		array(
			'name' => 'Choose a Skin',
			'id' => $shortname.'_skin',
			'type' => 'select',
			'std' => '',
			'desc' => 'Choose one of existing skins. You can optionally customize skins styles with styling options (next tab).',
			'options' => array(
				array( "value" => "default", "text" => "Default"),
				array( "value" => "blue", "text" =>  "Blue"),
				array( "value" => "green", "text" =>  "Green"),
				array( "value" => "teal", "text" =>  "Teal"),
				array( "value" => "purple", "text" =>  "Purple"),
				array( "value" => "violet", "text" =>  "Violet"),
				array( "value" => "red", "text" =>  "Red"),
				array( "value" => "rust", "text" =>  "Rust"),
				array( "value" => "orange", "text" =>  "Orange"),
				array( "value" => "mauve", "text" =>  "Mauve"),
				array( "value" => "black", "text" =>  "Black"),
				array( "value" => "white", "text" =>  "White")
			)
		),
		
		array(
			'name' => 'Choose a content part background',
			'id' => $shortname.'_background',
			'type' => 'select',
			'std' => '',
			'desc' => 'Choose one of existing backgrounds.',
			'options' => array(
				array( "value" => "", "text" => "Default"),
				array( "value" => "background1", "text" =>  "Background 1 (Light)"),
				array( "value" => "background2", "text" =>  "Background 2 (Light)"),
				array( "value" => "background3", "text" =>  "Background 3 (Light)"),
				array( "value" => "background4", "text" =>  "Background 4 (Light)"),
				array( "value" => "background5", "text" =>  "Background 5 (Light)"),
				array( "value" => "background6", "text" =>  "Background 6 (Light)"),
				array( "value" => "background7", "text" =>  "Background 7 (Light)"),
				array( "value" => "background8", "text" =>  "Background 8 (Light)"),
				array( "value" => "background9", "text" =>  "Background 9 (Light)"),
				array( "value" => "/dark/background1", "text" =>  "Background 1 (Dark)"),
				array( "value" => "/dark/background2", "text" =>  "Background 2 (Dark)"),
				array( "value" => "/dark/background3", "text" =>  "Background 3 (Dark)"),
				array( "value" => "/dark/background4", "text" =>  "Background 4 (Dark)"),
				array( "value" => "/dark/background5", "text" =>  "Background 5 (Dark)"),
				array( "value" => "/dark/background6", "text" =>  "Background 6 (Dark)"),
				array( "value" => "/dark/background7", "text" =>  "Background 7 (Dark)"),
				array( "value" => "/dark/background8", "text" =>  "Background 8 (Dark)"),
				array( "value" => "/dark/background9", "text" =>  "Background 9 (Dark)"),
			)
		),
		
		array(
			'name' => 'Body Font',
			'id' => $shortname.'_body_font',
			'type' => 'select',
			'std' => '',
			'desc' => 'Regular text and paragraphs font. Default: PT Sans',
			'options' => $fonts
		),
		
		array(
			'name' => 'Headings Font',
			'id' => $shortname.'_headings_font',
			'type' => 'select',
			'std' => '',
			'desc' => 'Applies to all headings (h1, h2, h3, h4, h5, h6). Default: Yanone Kaffeesatz',
			'options' => $fonts
		) ,
		
		array(
			'name' => 'Menu Font',
			'id' => $shortname.'_menu_font',
			'type' => 'select',
			'std' => '',
			'desc' => 'Applies to main menu\'s top items (not dropdowns). Default: Yanone Kaffeesatz',
			'options' => $fonts
		),
			
		array(
			'name' => 'Favicon',
			'id' => $shortname . '_favicon',
			'type' => 'upload',
			'img_w' => '400',
			'img_h' => '250',
			'std' => '',
			'desc' => 'Upload a favicon.'
		),
	
	array(
		'type' => 'close'
	) ,
	
	/*************** HEADER ***************/
	
	array(
		'type' => 'open',
		'tab_name' => 'Header',
		'tab_id' => 'header-section'
	) ,
	
	array(
		'name' => 'Social Icons',
		'id' => $shortname . '_header_social',
		'type' => 'textarea',
		'std' => '',
		'height' => '100',
		'desc' => 'Insert your social icons here using [social_button] shortcode. Example: [social_button name="facebook" url="http://my_fb_profile" title="Facebook" /]'
	) ,
	
	array(
		'type' => 'close'
	) ,
	
	/*************** FOOTER ***************/
	array(
		'type' => 'open',
		'tab_name' => 'Footer',
		'tab_id' => 'footer-section'
	) ,
	array(
		'name' => 'Footer Widgets',
		'id' => $shortname . '_footer_widgets_count',
		'type' => 'text',
		'std' => '4',
		'desc' => 'Enter the desired number of footer widgets'	
	) ,
		
	array(
		'name' => 'Copyright Text',
		'id' => $shortname . '_copyright',
		'type' => 'textarea',
		'std' => '',
		'height' => '100',
		'desc' => 'Copyright information on the bottom of site'
	) ,
	
	array(
		'name' => 'Footer menu',
		'id' => $shortname . '_footerinfo',
		'type' => 'textarea',
		'std' => '',
		'height' => '100',
		'desc' => 'Put here any content you find relevant, such as social links'
	),
	
	array(
		'type' => 'close'
	) ,
	
	

	/****** SKIN Choice and customization ****/
	array(
		'type' => 'open',
		'tab_name' => 'Styles',
		'tab_id' => 'styles'
	) ,
	
	array(
		'name' => 'Body background Image',
		'id' =>   $shortname.'_custom_background',
		'type' => 'upload',
		'std' => '',
		'desc' => 'Site body background. Overrides the 9 predefined background values.'
	),
			
	array( "name" => "Body Background Color",
		"desc" 	=> "Hex value for the background color (e.g. #eeeeee)",
		"id" 	=> $shortname."_background_color",
		"type" 	=> "color",
		"std" 	=> ""),
	
	array("name" => "Body Background Repeat",
		'type'	=> 'select',
		"id" 	=> $shortname."_background_repeat",
		'std' 	=> '',
		'desc' 	=> 'Choose if background is repeatable.',
		'options' => array(
			array( "value" => "repeat", "text" => "Repeat" ),
			array( "value" => "repeat-x", "text" => "Repeat X"),
			array( "value" => "repeat-y", "text" => "Repeat Y"),
			array( "value" => "no-repeat", "text" => "No repeat")
		)
	),
	
	array(
		'name' => 'Fixed Background image',
		'id' =>   $shortname.'_fixed_bg',
		'type' => 'select',
		'desc' => 'If chosen, will override the value for "Background repeat" field. Note in internet explorer it works with IE 9+ versions',
		'options' => array(
			array( "value" => "0", "text" => "No" ),
			array( "value" => "1", "text" => "Yes")
		)
	),
	
	array(
		'name' => 'Content background Image',
		'id' =>   $shortname.'_topbar_bg',
		'type' => 'upload',
		'std' => '',
		'desc' => 'Top bar background image. Upload an image or specify an existing url.'
	),
	
	array("name" => "Content bar Background Repeat",
		'type'	=> 'select',
		"id" 	=> $shortname."_topbar_bg_repeat",
		'std' 	=> '',
		'desc' 	=> 'Choose if content\'s background is repeatable.',
		'options' => array(
			array( "value" => "repeat", "text" => "Repeat" ),				   
			array( "value" => "no-repeat", "text" => "No repeat"),
			array( "value" => "repeat-x", "text" => "Repeat X"),
			array( "value" => "repeat-y", "text" => "Repeat Y"),				
		)
	),
	
	array(
		'name' => 'Header background Image',
		'id' =>   $shortname.'_header_bg',
		'type' => 'upload',
		'std' => '',
		'desc' => 'Header(Menu) background image. Upload an image or specify an existing url.'
	),
	
	array("name" => "Header Background Repeat",
		'type'	=> 'select',
		"id" 	=> $shortname."_header_bg_repeat",
		'std' 	=> '',
		'desc' 	=> 'Choose if header\'s background is repeatable.',
		'options' => array(
			array( "value" => "repeat", "text" => "Repeat" ),		
			array( "value" => "no-repeat", "text" => "No repeat"),
			array( "value" => "repeat-x", "text" => "Repeat X"),
			array( "value" => "repeat-y", "text" => "Repeat Y"),
		)
	),
	
	array(
		'name' => 'Footer Background Image',
		'id' =>   $shortname.'_footer_bg',
		'type' => 'upload',
		'std' => '',
		'desc' => 'Upload a custom footer background.'
	),
	
	array("name" => "Footer Background Repeat",
		'type'	=> 'select',
		'id' 	=> 'footer_bg_repeat',
		'std' 	=> '',
		'desc' 	=> 'Choose if footer background is repeatable.',
		'options' => array(
			array( "value" => "repeat", "text" => "Repeat"),
			array( "value" => "no-repeat", "text" => "No repeat"),
			array( "value" => "repeat-x", "text" => "Repeat X"),
			array( "value" => "repeat-y", "text" => "Repeat Y"),
		)
	),
	
	array(
		'name' => 'Top bar Background Color',
		'id' =>   $shortname.'_topbar_bg_color',
		'type' => 'color',
		'std' => '',
		'desc' => 'Background color for the bar which comes after header and includes search form and navigation.'
	),
	
	array(
		'name' => 'Bottom bar Background Color',
		'id' =>   $shortname.'_bottombar_bg_color',
		'type' => 'color',
		'std' => '',
		'desc' => ''
	),
	
	array("name" => "Menu font size (Top elements)",
		'type'	=> 'select',
		'id' 	=> $shortname.'_topmenu_font_size',
		'desc' 	=> '',
		'options' => array(
			array( "value" => "", "text" => "18px (Default)"),
			array( "value" => "22px", "text" => "22px"),
			array( "value" => "21px", "text" => "21px"),
			array( "value" => "20px", "text" => "20px"),
			array( "value" => "19px", "text" => "19px"),
			array( "value" => "17px", "text" => "17px"),
			array( "value" => "16px", "text" => "16px"),
			array( "value" => "15px", "text" => "15px"),
			array( "value" => "14px", "text" => "14px"),
			array( "value" => "13px", "text" => "13px"),
			array( "value" => "12px", "text" => "12px"),			
		)
	),
	
	array("name" => "Menu dropdown font size",
		'type'	=> 'select',
		'id' 	=> $shortname.'_dropdownmenu_font_size',
		'desc' 	=> '',
		'options' => array(
			array( "value" => "", "text" => "13px (Default)"),
			array( "value" => "22px", "text" => "22px"),
			array( "value" => "21px", "text" => "21px"),
			array( "value" => "20px", "text" => "20px"),
			array( "value" => "19px", "text" => "19px"),
			array( "value" => "18px", "text" => "18px"),
			array( "value" => "17px", "text" => "17px"),
			array( "value" => "16px", "text" => "16px"),
			array( "value" => "15px", "text" => "15px"),
			array( "value" => "14px", "text" => "14px"),
			array( "value" => "12px", "text" => "12px"),		
		)
	),
	
	array("name" => "Body font size",
		'type'	=> 'select',
		'id' 	=> $shortname.'_body_font_size',
		'desc' 	=> 'Applies to regular texts and paragraphs <p> font size.',
		'options' => array(
			array( "value" => "", "text" => "13px (Default)"),
			array( "value" => "22px", "text" => "22px"),
			array( "value" => "21px", "text" => "21px"),
			array( "value" => "20px", "text" => "20px"),
			array( "value" => "19px", "text" => "19px"),
			array( "value" => "18px", "text" => "18px"),
			array( "value" => "17px", "text" => "17px"),
			array( "value" => "16px", "text" => "16px"),
			array( "value" => "15px", "text" => "15px"),
			array( "value" => "14px", "text" => "14px"),
			array( "value" => "12px", "text" => "12px"),		
		)
	),
	
	array(
		'name' => 'Top menu font color',
		'id' =>   $shortname.'_menu_font_color',
		'type' => 'color',
		'std' => '',
		'desc' => ''
	),
	
	array(
		'name' => 'Top menu active font color',
		'id' =>   $shortname.'_menu_active_font_color',
		'type' => 'color',
		'std' => '',
		'desc' => ''
	),
	
	array(
		'name' => 'Submenu font color',
		'id' =>   $shortname.'_submenu_font_color',
		'type' => 'color',
		'std' => '',
		'desc' => ''
	),
	
	array(
		'name' => 'Menu shadow color',
		'id' =>   $shortname.'_menu_shadow_color',
		'type' => 'color',
		'std' => '',
		'desc' => ''
	),
	
	array(
		'type' => 'close'
	) ,

	/**************** HOME PAGE ****************/
	array(
		'type' => 'open',
		'tab_name' => 'Homepage',
		'tab_id' => 'home-page'
	) ,
	
	array(
		'name' => 'Enable widgets',
		'id' => $shortname.'_homepage_widgets',
		'type' => 'select',
		'std' => '',
		'desc' => 'Enable 3 homepage widgets right after the slider.',
		'options' => array(
			array( "value" => "1", "text" => "Yes"),
			array( "value" => "0", "text" => "No"),
		)
	),
	
	array(
		'name' => 'Slider',
		'id' => $shortname.'_active_slider',
		'type' => 'select',
		'std' => '',
		'desc' => 'Choose one of 4 types of sliders to display on homepage or disable it.',
		'options' => array(
			array( "value" => "nivo", "text" => "Nivo"),
			array( "value" => "3d", "text" => "3D (Piecemaker 2)"),
			array( "value" => "coda", "text" => "Coda (Supports video)"),
			array( "value" => "video", "text" => "Static video"),
			array( "value" => "static", "text" => "Static Content"),
			array( "value" => "", "text" => "Disable slider")				
		)
	),
		
	array(
		'name' => 'Static Video',
		'id' => $shortname.'_video_id',
		'type' => 'text',
		'std' => '',
		'desc' => 'Enter a vimeo video Id. Leave blank if chosen anything other than "Static video" from previous dropdown. Example: 21673567',
	),
	
	array(
		'name' => 'Static Content',
		'id' => $shortname.'_static_content',
		'type' => 'textarea',
		'std' => '',
		'desc' => 'Put any static content here.',
	),	
	
	array(
		'type' => 'close'
	) ,
	
	/*********************************************/
	
	
	/*********************************************/
	
	array(
		'type' => 'open',
		'tab_name' => 'Sliders',
		'tab_id' => 'sliders'
	) ,
	
	/**************** NIVO Slider Options ****************/
	
	
	array(
		'type' => 'toggle',
		'item_name' => 'Nivo Slider',
		'toggle_id' => 'nivo-slider'
	) ,
	
	array( 
		"name" => "Effect",
		"desc" => "Choose between 8 transition effects or leave the default to animate randomly",
		"id" => "nivo_effect",
		"type" => "select",
		'options' => array(
			array( "value" => "random", "text" => "Random" ),
			array( "value" => "sliceDown", "text" => "sliceDown"),
			array( "value" => "sliceDownLeft", "text" => "sliceDownLeft"),
			array( "value" => "sliceUp", "text" => "sliceUp"),
			array( "value" => "sliceUpLeft", "text" => "sliceUpLeft"),
			array( "value" => "sliceUpDown", "text" => "sliceUpDown"),
			array( "value" => "sliceUpDownLeft", "text" => "sliceUpDownLeft"),
			array( "value" => "fold", "text" => "fold"),
			array( "value" => "fade", "text" => "fade"),
		)
	),
	
	array(
		'name' => 'Slices',
		'id' => 'nivo_slices',
		'type' => 'text',
		'std' => '15',
		'desc' => 'Number of slices.'
	) ,
	
	array(
		'name' => 'Animation Speed',
		'id' => 'nivo_speed',
		'type' => 'text',
		'std' => '500',
		'desc' => 'Animation speed in miliseconds.'
	) ,
	
	array(
		'name' => 'Interval',
		'id' => 'nivo_pause',
		'type' => 'text',
		'std' => '3000',
		'desc' => 'Time interval between slice changes.'
	) ,
	
	array(
		'name' => 'Direction Navigation',
		'id' => 'nivo_direction',
		'type' => 'select',
		'options' => array(
			array( "value" => "true", "text" => "True" ),
			array( "value" => "false", "text" => "False")
		),
		'desc' => 'Next &amp; Previous buttons.'
	) ,
	
	array(
		'name' => 'Control Navigation',
		'id' => 'nivo_controlnav',
		'type' => 'select',
		'options' => array(
			array( "value" => "true", "text" => "True" ),
			array( "value" => "false", "text" => "False")
		),
		'desc' => 'Control Navigation (e.g. 1,2,3...).'
	) ,
	
	array(
		'name' => 'Keyboard Navigation',
		'id' => 'nivo_keynav',
		'type' => 'select',
		'options' => array(
			array( "value" => "true", "text" => "True" ),
			array( "value" => "false", "text" => "False")
		),
		'desc' => 'Enable Keyboard navigation (left and right keys).'
	) ,
	
	
	array(
		'type' => 'toggle_close'
	) ,

	/*********************************************/
	
	
	/**************** 3D Slider Options ****************/
	array(
		'type' => 'toggle',
		'item_name' => '3D Slider (Piecemaker 2)',
		'toggle_id' => '3d-slider'
	) ,
	
	array( 
		"name" => "Width",
		"desc" => "Width of the slider image in pixels.",
		"id" => $shortname."_slider3dimgw",
		"type" => "text",
		"std" => "860"
	),
	
	array( 
		"name" => "Height",
		"desc" => "Height of the slider image in pixels.",
		"id" => $shortname."_slider3dimgh",
		"type" => "text",
		"std" => "300"
	),
	
	array( 
		"name" => "Loader Color",
		"desc" => "Color of the cubes before the first image appears, also the color of the back sides of the cube, which become visible at some transition types",
		"id" => $shortname."_3D_loadercolor",
		"type" => "text",
		"std" => "0x333333"
	),
	
	array( 
		"name" => "Inner Side Color",
		"desc" => "Color of the inner sides of the cube when sliced.",
		"id" => $shortname."_3D_iscolor",
		"type" => "text",
		"std" => "0x222222"
	),
	
	array( 
		"name" => "Side Shadow Alpha",
		"desc" => "Sides get darker when moved away from the front. This is the degree of darkness - 0 == no change, 1 == 100% black.",
		"id" => $shortname."_3D_SideShadowAlpha",
		"type" => "text",
		"std" => "0.8"
	),
	
	array( 
		"name" => "Drop Shadow Alpha",
		"desc" => "Alpha of the drop shadow - 0 == no shadow, 1 == opaque.",
		"id" => $shortname."_3D_DropShadowAlpha",
		"type" => "text",
		"std" => "0.7"
	),
	
	array( 
		"name" => "Drop Shadow Distance",
		"desc" => "Distance of the shadow from the bottom of the image.",
		"id" => $shortname."_3D_DropShadowDistance",
		"type" => "text",
		"std" => "25"
	),
	
	array( 
		"name" => "Drop Shadow Scale",
		"desc" => "As the shadow is blurred, it appears wider that the actual image, when not resized. Thus its a good idea to make it slightly smaller. - 1 would be no resizing at all..",
		"id" => $shortname."_3D_DropShadowScale",
		"type" => "text",
		"std" => "0.95"
	),
	
	array( 
		"name" => "Drop Shadow Blur X",
		"desc" => "Blur of the drop shadow on the x-axis.",
		"id" => $shortname."_3D_DropShadowBlurX",
		"type" => "text",
		"std" => "40"
	),
	
	array( 
		"name" => "Drop Shadow Blur Y",
		"desc" => "Blur of the drop shadow on the y-axis.",
		"id" => $shortname."_3D_DropShadowBlurY",
		"type" => "text",
		"std" => "4"
	),
	
	array( 
		"name" => "Menu Distance X",
		"desc" => "Distance between two menu items (from center to center).",
		"id" => $shortname."_3D_MDX",
		"type" => "text",
		"std" => "20"
	),
	
	array( 
		"name" => "Menu Distance Y",
		"desc" => "Distance of the menu from the bottom of the image.",
		"id" => $shortname."_3D_MDY",
		"type" => "text",
		"std" => "50"
	),
	
	array( 
		"name" => "Menu Color 1",
		"desc" => "Color of an inactive menu item.",
		"id" => $shortname."_3D_Menu_Color1",
		"type" => "text",
		"std" => "0x999999"
	),
	
	array( 
		"name" => "Menu Color 2",
		"desc" => "Color of an active menu item.",
		"id" => $shortname."_3D_Menu_Color2",
		"type" => "text",
		"std" => "0x333333"
	),
	
	array( 
		"name" => "Menu Color 3",
		"desc" => "Color of the inner circle of an active menu item. Should equal the background color of the whole thing.",
		"id" => $shortname."_3D_Menu_Color3",
		"type" => "text",
		"std" => "0xFFFFFF"
	),
	
	array( 
		"name" => "Control Size",
		"desc" => "Size of the controls, which appear on rollover (play, stop, info, link).",
		"id" => $shortname."_3D_Control_Size",
		"type" => "text",
		"std" => "70"
	),
	
	array( 
		"name" => "Control Distance",
		"desc" => "Distance between the controls (from the borders).",
		"id" => $shortname."_3D_Control_Distance",
		"type" => "text",
		"std" => "20"
	),
	
	array( 
		"name" => "Control Color 1",
		"desc" => "Background color of the controls.",
		"id" => $shortname."_3D_Control_Color1",
		"type" => "text",
		"std" => "0x222222"
	),
	
	array( 
		"name" => "Control Color 2",
		"desc" => "Font color of the controls.",
		"id" => $shortname."_3D_Control_Color2",
		"type" => "text",
		"std" => "0xFFFFFF"
	),
	
	array( 
		"name" => "Control Alpha",
		"desc" => "Alpha of a control, when mouse is not over.",
		"id" => $shortname."_3D_Control_Alpha",
		"type" => "text",
		"std" => "0.8"
	),
	
	array( 
		"name" => "Control Alpha Over",
		"desc" => "Alpha of a control, when mouse is over.",
		"id" => $shortname."_3D_Control_Alpha_Over",
		"type" => "text",
		"std" => "0.95"
	),	
	
	array( 
		"name" => "Controls X",
		"desc" => "X-position of the point, which aligns the controls (measured from [0,0] of the image).",
		"id" => $shortname."_3D_Controls_X",
		"type" => "text",
		"std" => "430"
	),
	
	array( 
		"name" => "Controls Y",
		"desc" => "Y-position of the point, which aligns the controls (measured from [0,0] of the image).",
		"id" => $shortname."_3D_Controls_Y",
		"type" => "text",
		"std" => "280"
	),
	
	array( 
		"name" => "Controls Align",
		"desc" => "Type of alignment from the point [controlsX, controlsY] - can be \"center\", \"left\" or \"right\".",
		"id" => $shortname."_3D_Control_Align",
		"type" => "text",
		"std" => "center"
	),
	
	array( 
		"name" => "Tooltip Height",
		"desc" => "Height of the tooltip surface in the menu.",
		"id" => $shortname."_3D_Tooltip_Height",
		"type" => "text",
		"std" => "31"
	),
	
	array( 
		"name" => "Tooltip Color",
		"desc" => "Color of the tooltip surface in the menu.",
		"id" => $shortname."_3D_Tooltip_Color",
		"type" => "text",
		"std" => "0x222222"
	),
	
	array( 
		"name" => "Tooltip Text Y",
		"desc" => "Y-distance of the tooltip text field from the top of the tooltip.",
		"id" => $shortname."_3D_Tooltip_Text_Y",
		"type" => "text",
		"std" => "5"
	),
	
	array( 
		"name" => "Tooltip Text Style",
		"desc" => "The style of the tooltip text, specified in the CSS file.",
		"id" => $shortname."_3D_Tooltip_Text_Style",
		"type" => "text",
		"std" => "P-Italic"
	),
	
	array( 
		"name" => "Tooltip Text Color",
		"desc" => "Color of the tooltip text.",
		"id" => $shortname."_3D_Tooltip_Text_Color",
		"type" => "text",
		"std" => "0xFFFFFF"
	),
	
	array( 
		"name" => "Tooltip Margin Left",
		"desc" => "Margin of the text to the left end of the tooltip.",
		"id" => $shortname."_3D_Tooltip_Margin_Left",
		"type" => "text",
		"std" => "5"
	),
	
	array( 
		"name" => "Tooltip Margin Right",
		"desc" => "Margin of the text to the right end of the tooltip.",
		"id" => $shortname."_3D_Tooltip_Margin_Right",
		"type" => "text",
		"std" => "7"
	),
	
	array( 
		"name" => "Tooltip Text Sharpness",
		"desc" => "Sharpness of the tooltip text (-400 to 400).",
		"id" => $shortname."_3D_Tooltip_Text_Sharpness",
		"type" => "text",
		"std" => "50"
	),
	
	array( 
		"name" => "Tooltip Text Thickness",
		"desc" => "Thickness of the tooltip text (-400 to 400).",
		"id" => $shortname."_3D_Tooltip_Text_Thickness",
		"type" => "text",
		"std" => "-100"
	),
	
	array( 
		"name" => "Info Width",
		"desc" => "The width of the info text field.",
		"id" => $shortname."_3D_Info_Width",
		"type" => "text",
		"std" => "400"
	),
	
	array( 
		"name" => "Info Background",
		"desc" => "The background color of the info text field.",
		"id" => $shortname."_3D_Info_Background",
		"type" => "text",
		"std" => "0xFFFFFF"
	),
	
	array( 
		"name" => "Info Background Alpha",
		"desc" => "The alpha of the background of the info text, the image shines through, when smaller than 1.",
		"id" => $shortname."_3D_Info_Background_Alpha",
		"type" => "text",
		"std" => "0.95"
	),
	
	array( 
		"name" => "Info Margin",
		"desc" => "The margin of the text field in the info section to all sides.",
		"id" => $shortname."_3D_Info_Margin",
		"type" => "text",
		"std" => "15"
	),
	
	array( 
		"name" => "Info Sharpness",
		"desc" => "Sharpness of the info text (see above).",
		"id" => $shortname."_3D_Info_Sharpness",
		"type" => "text",
		"std" => "0"
	),
	
	array( 
		"name" => "Info Thickness",
		"desc" => "Thickness of the info text (see above).",
		"id" => $shortname."_3D_Info_Thickness",
		"type" => "text",
		"std" => "0"
	),
	
	array( 
		"name" => "Autoplay",
		"desc" => "Number of seconds from one transition to another, if not stopped. Set to 0 to disable autoplay.",
		"id" => $shortname."_3D_Autoplay",
		"type" => "text",
		"std" => "10"
	),
	
	array( 
		"name" => "Field Of View",
		"desc" => "see the official  Adobe Docs.",
		"id" => $shortname."_3D_FieldOfView",
		"type" => "text",
		"std" => "45"
	),	
		
	array(
		'type' => 'toggle_close'
	),
	

	/*********************************************/
	
	
	
	/****** CODA Slider Options ****/
	array(
		'type' => 'toggle',
		'item_name' => 'Coda Slider',
		'toggle_id' => 'coda-slider'
	) ,
		array(
			'name' => 'Sliding Effect',
			'id' => 'coda_sliding_effect',
			'type' => 'select',
			'std' => '',
			'desc' => 'Sliding animation effect',
			'options' => $tween_types
		) ,
		
		array( 
			"name" => "Sliding Speed",
			"desc" => "The speed of the transition (in milliseconds)",
			"id" => "coda_cycleSpeed",
			"type" => "text",
			"std" => "1000"
		),
		
		array( 
			"name" => "Autoslide",
			"desc" => "Automatical sliding",
			"id" => "coda_autoslide",
			"type" => "select",
			'options' => array(
				array( "value" => "false", "text" => "False  (Default)" ),			   	
				array( "value" => "true", "text" => "True" ),
			)
		),
		
		array( 
			"name" => "Slide Timeout",
			"desc" => "The time it takes for a slide to go to the next one",
			"id" => "coda_slide_timeout",
			"type" => "text",
			"std" => "6000"
		),
	array(
		'type' => 'toggle_close'
	),
	
	
	array( "type" => "close"), 
	/*********************************************/
	
	
	/*******************  BLOG  ******************/
	array(
		'type' => 'open',
		'tab_name' => 'Blog',
		'tab_id' => 'blog'
	) ,
	
	
	array( 
		"name" => "Show date",
		"desc" => "Date on blog posts listing page.",
		"id" => $shortname."_blog_show_date",
		"type" => "select",
		'options' => array(
			array( "value" => "1", "text" => "Yes"),
			array( "value" => "0", "text" => "No")
		)
	),
	
	array( 
		"name" => "Show Comments amount",
		"desc" => "Comments number on blog posts listing page.",
		"id" => $shortname."_blog_show_comments",
		"type" => "select",
		'options' => array(
			array( "value" => "1", "text" => "Yes"),
			array( "value" => "0", "text" => "No")
		)
	),
	
	array( 
		"name" => "Show Categories",
		"desc" => "Category listing on blog posts listing page.",
		"id" => $shortname."_blog_show_cats",
		"type" => "select",
		'options' => array(
			array( "value" => "1", "text" => "Yes"),
			array( "value" => "0", "text" => "No")
		)
	),
	
	array( 
		"name" => "Show Author",
		"desc" => "Author name on blog posts",
		"id" => $shortname."_blog_show_author",
		"type" => "select",
		'options' => array(
			array( "value" => "1", "text" => "Yes"),
			array( "value" => "0", "text" => "No")
		)
	),
	
	
	array( "type" => "close"),
	/*********************************************/
	
	
	/************* UNDER CONSTRUCTION ************/
	array(
		'type' => 'open',
		'tab_name' => 'Under Construction',
		'tab_id' => 'uc-page'
	),
	
	
	array(
		'name' => 'Logo',
		'id' => $shortname . '_uclogo',
		'type' => 'upload',
		'img_w' => '400',
		'img_h' => '250',
		'std' => '',
		'desc' => 'Upload a logo from your hard drive or specify an existing url'
	),
	
	array( 
		"name" => "Main Caption",
		"desc" => "",
		"id" => $shortname."_uc_maincaption",
		"type" => "text",
		"std"  => "Under Construction"
	),
	
	array(
		'name' => 'Primary Heading Text',
		'id' => $shortname . '_uc_pr_head_text',
		'type' => 'textarea',
		'std' => 'Our website is temporarily under construction. We appologize for the inconvenience.',
		'height' => '300',
		'desc' => ''
	),
	
	array(
		'name' => 'Social Links',
		'id' => $shortname . '_uc_social',
		'type' => 'textarea',
		'std' => '',
		'height' => '300',
		'desc' => 'Like facebook ot twitter, etc... Can be inserted via shortcode. This is an optional element.'
	),
	
	array(
		'name' => 'Launching Date (dd/mm/yyyy)',
		'id' => $shortname . '_uc_ldate',
		'type' => 'text',
		'std'  => '31/12/2013',
		'desc' => 'Please insert the date in dd/mm/yyyy format otherwise the page won\'t work correctly. Example: 25/04/2011'
	),
	
	array( "type" => "close"),
	/*********************************************/
	
	
	/**************  CONTACT FORM  ***************/
	array(
		'type' => 'open',
		'tab_name' => 'Contact form',
		'tab_id' => 'contact-form'
	) ,
	array(
		'name' => 'Email Address',
		'id' => $shortname.'_email_address',
		'type' => 'text',
		'std' => 'your_email@domain.com',
		'desc' => 'Enter your e-mail address.'
	) ,
	array(
		'name' => 'Subject',
		'id' => $shortname . '_subject',
		'type' => 'text',
		'std' => 'Website visitor',
		'desc' => ''
	) ,
	
	array(
		'name' => 'Success Message',
		'id' => $shortname . '_contact_success_message',
		'type' => 'text',
		'std' => 'Thank you. We will get back as soon as possible',
		'desc' => 'When the e-mail is successfully sent.'
	) ,
	array(
		'name' => 'Sending Error Message',
		'id' => $shortname . '_contact_error_message',
		'type' => 'text',
		'std' => 'An error occured. Please try again.',
		'desc' => 'If there was an error sending the message.'
	) ,

	array(
		'type' => 'close'
	) ,
	/*****************************************************/	
);
?>