<?php
/* ***************************************************** 
 * File Description: Contains all theme's shortcodes
 * Author: Weblusive
 * Author URI: http://www.weblusive.com
 * ************************************************** */


/*********** ENABLE RAW CONTENT ************/
function my_formatter($content) 
{
       $new_content = '';
       $pattern_full = '{(\[raw\].*?\[/raw\])}is';
       $pattern_contents = '{\[raw\](.*?)\[/raw\]}is';
       $pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);

       foreach ($pieces as $piece) 
       {
               if (preg_match($pattern_contents, $piece, $matches)) 
               {
                       $new_content .= $matches[1];
               } else 
               {
                       $new_content .= wptexturize(wpautop($piece));
               }
       }

       return $new_content;
}

remove_filter('the_content', 'wpautop');
remove_filter('the_content', 'wptexturize');

add_filter('the_content', 'my_formatter', 99);

/**********************************************/


/***************** BUTTONS ********************/

function al_button($atts, $content = null) {

	extract(shortcode_atts(array(
		"id"	=> '',
		"url" 	=> '#', 
		"size"	=> 'medium',
		"type"	=> 'normal',
		"bg"	=> '',
	), $atts));
	
	$id = isset($id) && $id != '' ? 'id="'.$id.'"' : '';
	
	return '<a href="'.$url.'" '.$id.' class="button '.$size.' '.$type.' '.$bg.'">'.$content.'</a>';
	
}
add_shortcode('button', 'al_button');

/************************************************/



/*********** SINGLE ARTICLE BY ID ***************/

function sc_article($atts, $content = null) {

	extract(shortcode_atts(array(
		"id"=> '',
	), $atts));
	
	$post = get_post($id);
	$url = get_permalink($id);
	return '<h2><a href="'.$url.'">'.$post->post_title.'</a></h2><div>'.do_shortcode($post->post_content).'</div>';
	
}
add_shortcode('article', 'sc_article');

/************************************************/


/*********** MEMBER INFO ***************/

function al_member($atts, $content = null) {

	extract(shortcode_atts(array(
		"photo"=> '',
		"name"=> '',
		"position" => '',
		"email" => ''
		
	), $atts));
	
	$return = '
	<div class="grid_3 nomargin">                
		<div class="alignleft"><img src="'.$photo.'" alt=""/></div>	
		<h4>'.$name.'<br /><span>'.$position.'</span></h4>            
		<p><a href="mailto:'.$email.'">'.$email.'</a></p>
	</div>';
	

	return do_shortcode('[raw]'.$return.'[/raw]');
	
}
add_shortcode('member', 'al_member');

/************************************************/



/*************** SOCIAL BUTTONS *****************/

function al_socialbutton($atts, $content = null) {

	extract(shortcode_atts(array(
		"name"	=> '',
		"url" 	=> '#', 
		"icon"	=> '',
		"title"	=> '',
		"target" => '_blank'
	), $atts));
	
	$title = isset($title) && $title != '' ? $title : $name;
	$predefined = array('facebook', 'twitter', 'rss', 'youtube', 'mail', 'flickr', 'linkedin', 'vimeo', 'skype', 'myspace');
	$icon = in_array($name, $predefined) ? get_template_directory_uri().'/images/social_icons/'.$name.'.png' : $icon.'' ;
	
	return '<a href="'.$url.'" class="tip_trigger" target="'.$target.'"><img class="social fade" src="'.$icon.'" alt="'.$title.'" /><span class="tip">'.$title.'</span></a>';
}
add_shortcode('social_button', 'al_socialbutton');

/************************************************/


/************** TEXT HIGLIGHTING ****************/

function al_highlight($atts, $content = null) {
	return '<span class="highlight">'.$content.'</span>';
}
add_shortcode('highlight', 'al_highlight');

/************************************************/


/****** SHOW POSTS BY CATEGORY AND COUNT ********/

function al_show_posts( $atts )
{

	extract( shortcode_atts( array(
		'category' => '',
		'num' => '5',
		'order' => 'DESC',
		'orderby' => 'date',
		'class' =>'popular-posts',
		'minimal' => 0
	), $atts) );

	$out = '';

	$query = array();

	if ( $category != '' )
		$query[] = 'category=' . $category;

	if ( $num )
		$query[] = 'numberposts=' . $num;

	if ( $order )
		$query[] = 'order=' . $order;

	if ( $orderby )
		$query[] = 'orderby=' . $orderby;

	$posts_to_show = get_posts( implode( '&', $query ) );

	$out = '<ul class="'.$class.'">';

	foreach ($posts_to_show as $ps) {
		$permalink = get_permalink( $ps->ID );
		if ($minimal)
		{
			$out.='<li><a href ="'.$permalink.'" title="'.get_the_title($ps->ID).'" class="post-minimal">'.get_the_title($ps->ID).'</a></li>';
		}
		else
		{
			$out .="
			<li>
				<div class=\"list-post-thumb\">".get_the_post_thumbnail($ps->ID, array(45,45))."</div>
				<div class=\"list-post-desc\">
					<a href =\"{$permalink}\" title=\"{$ps->post_title}\"  class=\"wt-title\">{$ps->post_title}</a>
					<span>".get_the_time('F jS, Y', $ps->ID)."</span>
					<span class=\"by-author\">by ".get_the_author()."</span> 
				</div>
				<div class=\"clear\"></div>
			</li>";
		}
	}

	$out .= '</ul>';

    return $out;
}

add_shortcode('showposts', 'al_show_posts');


/*************** RELATED POSTS ******************/

function al_related_posts( $atts ) {
	extract(shortcode_atts(array(
	    'limit' => '5',
	    
	), $atts));

	global $wpdb, $post, $table_prefix;

	if ($post->ID) {
		$retval = '<ul>';
 		// Get tags
		$tags = wp_get_post_tags($post->ID);
		$tagsarray = array();
		foreach ($tags as $tag) {
			$tagsarray[] = $tag->term_id;
		}
		$tagslist = implode(',', $tagsarray);

		// Do the query
		$q = "SELECT p.*, count(tr.object_id) as count
			FROM $wpdb->term_taxonomy AS tt, $wpdb->term_relationships AS tr, $wpdb->posts AS p WHERE tt.taxonomy ='post_tag' AND tt.term_taxonomy_id = tr.term_taxonomy_id AND tr.object_id  = p.ID AND tt.term_id IN ($tagslist) AND p.ID != $post->ID
				AND p.post_status = 'publish'
				AND p.post_date_gmt < NOW()
 			GROUP BY tr.object_id
			ORDER BY count DESC, p.post_date_gmt DESC
			LIMIT $limit;";

		$related = $wpdb->get_results($q);
 		if ( $related ) {
			foreach($related as $r) {
				$retval .= '<li><a title="'.wptexturize($r->post_title).'" href="'.get_permalink($r->ID).'">'.wptexturize($r->post_title).'</a></li>';
			}
		} else {
			$retval .= '
	<li>No related posts found</li>';
		}
		$retval .= '</ul>';
		return $retval;
	}
	return;
}
add_shortcode('related_posts', 'al_related_posts');

/************************************************/


/***************** LIST PAGES *******************/

function al_list_pages($atts, $content, $tag) {
	global $post;
		
	// set defaults
	$defaults = array(
	    'class'       => $tag,
	    'depth'       => 0,
	    'show_date'   => '',
	    'date_format' => get_option('date_format'),
	    'exclude'     => '',
	    'child_of'    => 0,
	    'title_li'    => '',
	    'authors'     => '',
	    'sort_column' => 'menu_order, post_title',
	    'link_before' => '',
	    'link_after'  => '',
	    'exclude_tree'=> ''
	);
	
	
	$atts = shortcode_atts($defaults, $atts);
	
	
	$atts['echo'] = 0;
	if($tag == 'child-pages')
		$atts['child_of'] = $post->ID;	

	// create output
	$out = wp_list_pages($atts);
	if(!empty($out))
		$out = '<ul class="'.$atts['class'].'">' . $out . '</ul>';
	
  return $out;
}

add_shortcode('child-pages', 'al_list_pages');
add_shortcode('list-pages', 'al_list_pages');

/************************************************/


/*************** DIVIDER LINE ******************/

function al_divider($atts, $content = null) {
	  extract(shortcode_atts(array(
        'top' => '',       
    ), $atts));
	  
	if ($top)
	{
		return '<div class="divider"><h5><a class="alignright toTop" href="#">Top &uarr;</a></h5></div>';
	}
	else
	{
   		return '<div class="divider"></div>';
	}
}
add_shortcode('divider', 'al_divider');

/***********************************************/



/****************** SPACING ********************/

function al_spacing($atts, $content = null) {
  extract(shortcode_atts(array(
        'type' => 'top',
        'amount' => '10',
   ), $atts));
   return '<div class="'.$type.$amount.'"></div>';
}
add_shortcode('spacing', 'al_spacing');

/************************************************/


/************* VIMEO EMBED (VIA ID) *************/

function al_vimeo($atts, $content=null) {
	
	   extract(shortcode_atts(array(
            "id" => '',
            "width" => '621',
            "height" => '350',
			"class" => ''
        ), $atts));
    
    /*$data = '
		<object class="'.$class.'" width="'.$width.'" height="'.$height.'" data="http://vimeo.com/moogaloop.swf?clip_id='.$id.'&amp;server=vimeo.com" type="application/x-shockwave-flash">
            <param name="allowfullscreen" value="true" />
			<param name="wmode" value="transparent" />
            <param name="allowscriptaccess" value="always" />
            <param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id='.$id.'&amp;server=vimeo.com" />
        </object>';*/
	$data = '<iframe src="http://player.vimeo.com/video/'.$id.'?title=0&amp;byline=0&amp;portrait=0&amp;color=00adef" width="'.$width.'" height="'.$height.'" class="'.$class.'"></iframe>';
	
    return $data;
}
add_shortcode('vimeo', 'al_vimeo');

/************************************************/


/************** YOUTUBE EMBED (VIA ID) **********/ 
$youtube_nr = 0;
function al_youtube($atts, $content=null) {
	 extract(shortcode_atts(array(
			'id'  => '',
			'width'  => '600',
			'height' => '340',
			"class" => 'frame'
			), $atts));

		return '<div class="youtube_video"><object class="'.$class.'" type="application/x-shockwave-flash" style="width:'.$width.'px; height:'.$height.'px;" data="http://www.youtube.com/v/'.$id.'&amp;hl=en_US&amp;fs=1&amp;"><param name="movie" value="http://www.youtube.com/v/'.$id.'&amp;hl=en_US&amp;fs=1&amp;" /></object></div>';

}
add_shortcode('youtube', 'al_youtube');
/************************************************/


/***************** CLEAR ************************/

function al_clear($atts, $content = null) {	
	 extract(shortcode_atts(array(
        "type" => '',            
    ), $atts));
	return '<div class="clear'.$type.'"></div>';
}
add_shortcode('clear', 'al_clear');

/************************************************/


/********* STANDARD UNORDERED LISTS *************/

function al_list($atts, $content = null) {
	extract(shortcode_atts(array(
		'type' 	=> '',	
	), $atts));

	return '<div class="list'.$type.'">'.$content.'</div>';
}
add_shortcode('list', 'al_list');

/************************************************/


/****************** COLUMNS *********************/

// COLUMN FULL
function full( $atts, $content = null ) {
   return '<div class="grid_12">' . do_shortcode($content) . '</div>'; }
add_shortcode('full', 'full');
// COLUMN 1/2
function one_half( $atts, $content = null ) {
   return '<div class="halfwidth">' . do_shortcode($content) . '</div>'; }
add_shortcode('one_half', 'one_half');

// COLUMN 1/2 Last
function one_half_last( $atts, $content = null ) {
   return '<div class="halfwidth omega">' . do_shortcode($content) . '</div><div class="clearnospacing"></div>'; }
add_shortcode('one_half_last', 'one_half_last');

// COLUMN 1/3 
function one_third( $atts, $content = null ) {
   return '<div class="thirdwidth">' . do_shortcode($content) . '</div>'; }
add_shortcode('one_third', 'one_third');

// COLUMN 1/3 Last
function one_third_last( $atts, $content = null ) {
   return '<div class="thirdwidth omega">' . do_shortcode($content) . '</div><div class="clearnospacing"></div>'; }
add_shortcode('one_third_last', 'one_third_last');

// COLUMN 1/4
function one_fourth( $atts, $content = null ) {
   return '<div class="fourthwidth">' . do_shortcode($content) . '</div>'; }
add_shortcode('one_fourth', 'one_fourth');

// COLUMN 1/4 Last
function one_fourth_last( $atts, $content = null ) {
   return '<div class="fourthwidth omega">' . do_shortcode($content) . '</div><div class="clearnospacing"></div>'; }
add_shortcode('one_fourth_last', 'one_fourth_last');

// COLUMN 1/6
function one_sixth( $atts, $content = null ) {
   return '<div class="sixthwidth">' . do_shortcode($content) . '</div>'; }
add_shortcode('one_sixth', 'one_sixth');

// COLUMN 1/6 Last
function one_sixth_last( $atts, $content = null ) {
   return '<div class="sixthwidth omega">' . do_shortcode($content) . '</div><div class="clearnospacing"></div>'; }
add_shortcode('one_sixth_last', 'one_sixth_last');

/************************************************/


/******************* QUOTES *********************/

function al_quote( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'author' => '',
		'type'	 => '',
	), $atts));
	$return = '';
	if ($type == 'static')
	{
		$return = '<div class="quote"><div class="static">'.do_shortcode($content).'<br /><span>'.$author.'</span></div></div>';
	}
	else
	{
		$return = '<div class="blockquote">'.do_shortcode($content).'<br /><span>'.$author.'</span></div>';
	}
	$return.= '<div class="clearnospacing"></div>';
	return $return; 
}
add_shortcode('quote', 'al_quote');

/************************************************/


/*******************  TABS  *********************/

add_shortcode( 'tabgroup', 'al_tab_group' );
function al_tab_group( $atts, $content ){
	extract(shortcode_atts(array(
		'location' => ''
	), $atts));
	$GLOBALS['tab_count'] = 0;
	$location = empty($location) ? '' : ' '.$location.'tab';
	do_shortcode( $content );
	
	if( is_array( $GLOBALS['tabs'] ) ){
	foreach( $GLOBALS['tabs'] as $tab ){
	$tabs[] = '<li><a class="" href="#">'.$tab['title'].'</a></li>';
	$panes[] = '<div class="pane'.$location.'">'.do_shortcode($tab['content']).'</div>';
	}
	$return = "\n".'<div class="wrap"><ul class="tabs'.$location.'">'.implode( "\n", $tabs ).'</ul><div class="clearnospacing"></div>'."\n".'<div class="panes clearfix">'.implode( "\n", $panes ).'</div></div>'."\n";
	}
	return $return;
}

add_shortcode( 'tab', 'al_tab' );

function al_tab( $atts, $content ){
	extract(shortcode_atts(array(
	'title' => 'Tab %d'
	), $atts));
	
	$x = $GLOBALS['tab_count'];
	$GLOBALS['tabs'][$x] = array( 'title' => sprintf( $title, $GLOBALS['tab_count'] ), 'content' =>  $content );
	
	$GLOBALS['tab_count']++;
}

/************************************************/


/************ TESTIMONIALS ROTATOR **************/

add_shortcode( 'trotator', 'al_trotator' );
function al_trotator( $atts, $content ){
	$count = 0;
	$GLOBALS['tritem_count']=0;
	do_shortcode( $content );

	if( is_array( $GLOBALS['tritem'] ) ){
		foreach( $GLOBALS['tritem'] as $tab ){
			if ($count == 0)
			{
				$panes[] = '<li class="slide">'.do_shortcode($tab['content']).'<span> <br />'.$tab['author'].'</span></li>';	
			}
			else
			{
				$panes[] = '<li class="slide" style="display:none">'.do_shortcode($tab['content']).'<span>'.$tab['author'].'</span></li>';		
			}
			$count++;
		}
		$return = "\n".'<ul id="testimonials">'.implode( "\n", $panes ).''."\n".'</ul>';
		$return.='<script type="text/javascript">jQuery(document).ready(function() {jQuery(\'#coda-slider-1\').codaSlider();});</script>';
	}
	return $return;
}

add_shortcode( 'tritem', 'al_tritem' );

function al_tritem( $atts, $content ){
	extract(shortcode_atts(array(
	'author' => ''
	), $atts));
	
	$x = $GLOBALS['tritem_count'];
	$GLOBALS['tritem'][$x] = array('author' => $author, 'content' =>  $content );
	
	$GLOBALS['tritem_count']++;
}

/************************************************/


/*********** SLIDESHOW WITH LIGHTBOX ************/

add_shortcode( 'slideshow', 'al_slideshow' );
function al_slideshow( $atts, $content ){
	$count = 0;
	$GLOBALS['sitem_count']=0;
	do_shortcode( $content );

	if( is_array( $GLOBALS['sitem'] ) ){
		foreach( $GLOBALS['sitem'] as $tab ){
			if ($count == 0)
			{
				$panes[] ='<li class="slide hover"><a href="'.$tab['full'].'" data-rel="prettyPhoto[my_gallery]" title="'.$tab['title'].'"><img src="'.$tab['thumb'].'" alt=""/></a></li>';	
			}
			else
			{
				$panes[] = '<li class="slide hover" style="display:none"><a href="'.$tab['full'].'" data-rel="prettyPhoto[my_gallery]" title="'.$tab['title'].'"><img src="'.$tab['thumb'].'" alt=""/></a></li>';	
			}
			$count++;
		}
		$return = "\n".' <div class="shadowdetailsextrasm left0 top10"><ul id="testimonialsimageonly">'.implode( "\n", $panes ).'</ul></div>';
		$return.='<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery(\'#testimonialsimageonly .slide\');
			setInterval(function(){
				jQuery(\'#testimonialsimageonly .slide\').filter(\':visible\').fadeOut(1000,function(){
					if(jQuery(this).next().size()){jQuery(this).next().fadeIn(1000);}
					else{jQuery(\'#testimonialsimageonly .slide\').eq(0).fadeIn(1000);}
				});
			},6000);	
		});	
		</script>';
	}
	return $return;
}

add_shortcode( 'sitem', 'al_sitem' );

function al_sitem( $atts, $content ){
	extract(shortcode_atts(array(
		'title' => '',
		'thumb' => '',
		'full' => ''
	), $atts));
	
	$x = $GLOBALS['sitem_count'];
	$GLOBALS['sitem'][$x] = array('title' => $title, 'content' =>  $content, 'thumb'=>$thumb, 'full'=>$full );
	
	$GLOBALS['sitem_count']++;
}

/************************************************/


/***************  NIVO SLIDER  ******************/

add_shortcode('slider', 'al_slider' );
function al_slider( $atts, $content ){
	$GLOBALS['slideritem_count'] = 0;
	
	do_shortcode( $content );
		
	if( is_array( $GLOBALS['sitems'] ) ){
		$icount = 0;
		foreach( $GLOBALS['sitems'] as $item ){
			$panes[] = '<img src="'.$item['image'].'" alt="'.$item['title'].'"/>';   		
			$icount ++ ;
		}
		
		$randomId = mt_rand(0, 100000);
		$return ='<div id="slider-'.$randomId.'" class="nivoSlider nivoframe">'.implode( "\n", $panes ).'</div>	<div class="clearnospacing"></div>		
		<script type="text/javascript">jQuery(window).load(function(){jQuery(\'#slider-'.$randomId.'\').nivoSlider();});</script>';	
	}
	return $return;
}

add_shortcode( 'slideritem', 'al_slideritem' );

function al_slideritem( $atts, $content ){
	extract(shortcode_atts(array(
		'image' => '',
		'title' => '',
	), $atts));
	
	$x = $GLOBALS['slideritem_count'];
	$GLOBALS['sitems'][$x] = array( 'image' => $image, 'title' => $title, 'content' =>  $content );
	
	$GLOBALS['slideritem_count']++;
	
}

/************************************************/


/***************** TOGGLES **********************/

add_shortcode( 'togglegroup', 'al_togglegroup' );
function al_togglegroup( $atts, $content ){
	$GLOBALS['toggle_count'] = 0;
	do_shortcode( $content );
	if( is_array( $GLOBALS['toggles'] ) ){
	foreach( $GLOBALS['toggles'] as $toggle ){
		$panes[] = '<div class="expand">'.$toggle['title'].'</div><div class="collapse"><p>'.do_shortcode($toggle['content']).'</p></div>';
	}
	$return = '<div id="wrapper"><div id="content"><div class="demo">'.implode( "\n", $panes ).'</div></div></div>';	
	}
	return $return; //do_shortcode('[raw]'.$return.'[/raw]');
}

add_shortcode( 'toggle', 'al_toggle' );

function al_toggle( $atts, $content ){
	extract(shortcode_atts(array(
	'title' => ''
	), $atts));
	
	$x = $GLOBALS['toggle_count'];
	$GLOBALS['toggles'][$x] = array('title' => $title, 'content' =>  $content);	
	$GLOBALS['toggle_count']++;
}

/************************************************/


/***************** MESSAGES  ********************/

function al_message($atts, $content = null ) {
	extract(shortcode_atts(array(
		'type'	=> 'success',
		'class'	=> '',
	), $atts));
	
	$messageType = '';
	switch ($type)
	{
		case 'success':
		$messageType = 'greenbox'; 
		break;
		
		case 'info':
		$messageType = 'bluebox'; 
		break;
		
		case 'warning':
		$messageType = 'yellowbox'; 
		break;
		
		case 'error':
		$messageType = 'redbox'; 
		break;
		
	}
	
	return '<div class="'.$class.' '.$messageType.'"><h2>'.$content.'</h2></div>';
	
}
add_shortcode('message', 'al_message');

/************************************************/


/**************** ALIGNED IMAGES ****************/

function al_alimage( $atts, $content = null)
{
   extract(shortcode_atts(array(
		'align'	=> 'left',	
	), $atts));	
   return '<div class="align'.$align.'">'. do_shortcode($content) . '</div>';
}
add_shortcode('alimage', 'al_alimage');

/************************************************/


/***************** SHADOWS **********************/

function al_shadow( $atts, $content = null)
{
   extract(shortcode_atts(array(
		'type'	=> '1',
	), $atts));	
   
   $shadowtype = 'shadowdetails';
   switch ($type)
		{
			case 1:
			$shadowtype = 'shadowdetails';
			break;
			
			case 2:
			$shadowtype = 'portshadow300';
			break;
			
			case 3:
			$shadowtype = 'portshadow400';
			break;
			
			case 4:
			$shadowtype = 'shadow400x290';
			break;
			
			case 5:
			$shadowtype = 'shadow510x290';
			break;
			
			case 6:
			$shadowtype = 'shadowdetailsvideo';
			break;
			
			case 7:
			$shadowtype = 'shadowdetailssm';
			break;
			
			case 8:
			$shadowtype = 'shadowdetailsextrasm';
			break;
			
			case 9:
			$shadowtype = 'shadowheader';
			break;
		}
	
	return '<div class="'.$shadowtype.'">'. do_shortcode($content) .'</div>';
}
add_shortcode('shadow', 'al_shadow');

/************************************************/


/************* IMAGE IN LIGHTBOX ****************/

function al_lightbox( $atts, $content = null)
{
   extract(shortcode_atts(array(
		'thumb'	=> '',
		'full'	=> '',
		'title' => '',
		'shadow' => ''
	), $atts));	
	
	$return = '';
	$shadowtype = 'shadowdetails';
	if (!empty ($shadow))
	{
		switch ($shadow)
		{
			case 1:
			$shadowtype = 'shadowdetails';
			break;
			
			case 2:
			$shadowtype = 'portshadow300';
			break;
			
			case 3:
			$shadowtype = 'portshadow400';
			break;
			
			case 4:
			$shadowtype = 'shadow400x290';
			break;
			
			case 5:
			$shadowtype = 'shadow510x290';
			break;
			
			case 6:
			$shadowtype = 'shadowdetailsvideo';
			break;
			
			case 7:
			$shadowtype = 'shadowdetailssm';
			break;
			
			case 8:
			$shadowtype = 'shadowdetailsextrasm';
			break;
			
			case 9:
			$shadowtype = 'shadowheader';
			break;
			
		}
	}
	$return = '<div class="'.$shadowtype.'">';
	
	$return.='<div class="frame hover"><span><a title="'.$title.'" data-rel="prettyPhoto" href="'.$full.'"><img alt="'.$title.'" src="'.$thumb.'"></a></span></div>';
	
	$return.= '</div>';
	
   return $return;
}
add_shortcode('lightbox', 'al_lightbox');

/************************************************/


/*************** GOOGLE MAPS ********************/

/*
Plugin Name: Google Maps v3 Shortcode
Plugin URI: http://gis.yohman.com
Description: This plugin allows you to add one or more maps to your page/post using shortcodes.  Features include:  multiple maps on the same page, specify location by address or lat/lon combo, add kml, show traffic, add your own custom image icon, set map size.
Version: 1.02
Author: yohda
Author URI: http://gis.yohman.com/
*/

// Add the google maps api to header

// Main function to generate google map
function mapme($attr) {

	// default atts
	$attr = shortcode_atts(array(	
		'lat'   => '0', 
		'lon'    => '0',
		'id' => 'map',
		'z' => '1',
		'w' => '260',
		'h' => '260',
		'maptype' => 'ROADMAP',
		'address' => '',
		'kml' => '',
		'marker' => '',
		'markerimage' => '',
		'traffic' => 'no',
		'infowindow' => ''
		
		), $attr);
									
$returnme = '<div id="' .$attr['id'] . '" style="width:' . $attr['w'] . 'px;height:' . $attr['h'] . 'px;"></div>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script type="text/javascript">
    	var latlng = new google.maps.LatLng(' . $attr['lat'] . ', ' . $attr['lon'] . ');
		var myOptions = {
			zoom: ' . $attr['z'] . ',
			center: latlng,
			mapTypeId: google.maps.MapTypeId.' . $attr['maptype'] . '
		};
		var ' . $attr['id'] . ' = new google.maps.Map(document.getElementById("' . $attr['id'] . '"),
		myOptions);
		';
				
		//kml
		if($attr['kml'] != '') 
		{
			//Wordpress converts "&" into "&#038;", so converting those back
			$thiskml = str_replace("&#038;","&",$attr['kml']);		
			$returnme .= '
			var kmllayer = new google.maps.KmlLayer(\'' . $thiskml . '\');
			kmllayer.setMap(' . $attr['id'] . ');
			';
		}
		
		//traffic
		if($attr['traffic'] == 'yes')
		{
			$returnme .= '
			var trafficLayer = new google.maps.TrafficLayer();
			trafficLayer.setMap(' . $attr['id'] . ');
			';
		}
	
		//address
		if($attr['address'] != '')
		{
			$returnme .= '
		    var geocoder_' . $attr['id'] . ' = new google.maps.Geocoder();
			var address = \'' . $attr['address'] . '\';
			geocoder_' . $attr['id'] . '.geocode( { \'address\': address}, function(results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					' . $attr['id'] . '.setCenter(results[0].geometry.location);
					';
					
					if ($attr['marker'] !='')
					{
						//add custom image
						if ($attr['markerimage'] !='')
						{
							$returnme .= 'var image = "'. $attr['markerimage'] .'";';
						}
						$returnme .= '
						var marker = new google.maps.Marker({
							map: ' . $attr['id'] . ', 
							';
							if ($attr['markerimage'] !='')
							{
								$returnme .= 'icon: image,';
							}
						$returnme .= '
							position: ' . $attr['id'] . '.getCenter()
						});
						';

						//infowindow
						if($attr['infowindow'] != '') 
						{
							//first convert and decode html chars
							$thiscontent = htmlspecialchars_decode($attr['infowindow']);
							$returnme .= 'var contentString = \'' . $thiscontent . '\'
								var infowindow = new google.maps.InfoWindow({
								content: contentString
							});
										
							google.maps.event.addListener(marker, \'click\', function() {
							  infowindow.open(' . $attr['id'] . ',marker);
							});
				
							';
						}


					}
			$returnme .= '
				} else {
				alert("Geocode was not successful for the following reason: " + status);
			}
			});
			';
		}

		//marker: show if address is not specified
		if ($attr['marker'] != '' && $attr['address'] == '')
		{
			//add custom image
			if ($attr['markerimage'] !='')
			{
				$returnme .= 'var image = "'. $attr['markerimage'] .'";';
			}

			$returnme .= '
				var marker = new google.maps.Marker({
				map: ' . $attr['id'] . ', 
				';
				if ($attr['markerimage'] !='')
				{
					$returnme .= 'icon: image,';
				}
			$returnme .= '
				position: ' . $attr['id'] . '.getCenter()
			});
			';

			//infowindow
			if($attr['infowindow'] != '') 
			{
				$returnme .= '
				var contentString = \'' . $attr['infowindow'] . '\';
				var infowindow = new google.maps.InfoWindow({
					content: contentString
				});
							
				google.maps.event.addListener(marker, \'click\', function() {
				  infowindow.open(' . $attr['id'] . ',marker);
				});
	
				';
			}


		}

		$returnme .= '</script>';

		return $returnme;
	?>
    

	<?php
}
add_shortcode('map', 'mapme');

/************************************************/


/******** SHORTCODE SUPPORT FOR WIDGETS *********/

if (function_exists ('shortcode_unautop')) {
	add_filter ('widget_text', 'shortcode_unautop');
}
add_filter ('widget_text', 'do_shortcode');

/************************************************/


/************* LIST POPULAR POSTS ***************/

function al_popular_posts($atts, $content = null) {
    extract(shortcode_atts(array(
            "limit" => '2',
            "cat" => ''
    ), $atts));

   
	global $post;
    $query = new WP_Query();
	$query->query('ignore_sticky_posts=1&showposts='.$limit.'&orderby=comment_count');
	
	 $retour='<ul class="popular-posts">';
	$i = 1;
	while ($query->have_posts()) : $query->the_post(); 
	
    	$thumb = has_post_thumbnail() ?  get_the_post_thumbnail($post->ID, 'blog-thumb') : '';
		$categories =  get_the_category($post->ID);
		$category = $categories[0]->cat_name;
		  $retour.='
		<li>
			'.$divider.'
			<div class="alignleft">
            	<a href="'.get_permalink($post->ID).'" class="wt-title">'.$thumb.'</a>
			</div>	
            <a href="'.get_permalink($post->ID).'" class="tip_trigger"><img src="'.get_template_directory_uri().'/images/icons/user.png" class="imgspace" alt=""/><span class="tip">'.get_the_author().'</span></a>
            <a href="'.get_permalink($post->ID).'" class="tip_trigger"><img src="'.get_template_directory_uri().'/images/icons/tag.png" class="imgspace" alt=""/><span class="tip">'.$category.'</span></a>
            <a href="'.get_permalink($post->ID).'" class="tip_trigger"><img src="'.get_template_directory_uri().'/images/icons/comment.png" alt=""/><span class="tip">'.do_shortcode('[comments_count id="'.$post->ID.'" /]').'</span></a>            
        	<p>'.limit_words(get_the_excerpt(), '6').'</p>	
        	
			<div class="clearnospacing"></div>
			<div class="dividerblog"></div>
		</li>
		';
		$i++;
        endwhile;
        $retour.='</ul>';
     
                           
        return $retour;
}
add_shortcode("popular_posts", "al_popular_posts");

/************************************************/


/* ****** Display number of comments for specific post ****** */
function al_comments_count($atts) {
	extract( shortcode_atts( array(
		'id' => ''
	), $atts ) );

	$num = 0;
	$post_id = $id;
	$queried_post = get_post($post_id);
	$cc = $queried_post->comment_count;
		if( $cc == $num || $cc > 1 ) : $cc = $cc.' Comments';
		else : $cc = $cc.' Comment';
		endif;
	$permalink = get_permalink($post_id);

	//return '<a href="'. $permalink . '" class="comments_link">' . $cc . '</a>';
	return $cc;
}
add_shortcode('comments_count', 'al_comments_count');


/************* PORTFOLIO WORKS ***************/

function al_list_portfolio($atts, $content = null) {
    extract(shortcode_atts(array(
            "limit" => '4',
    		"category" => ''
    ), $atts));
 	global $post;
    $counter = 1; 
	$args = array('post_type' => 'portfolio', 'taxonomy'=> 'portfolio_category', 'showposts' => $limit, 'posts_per_page' => 777, 'orderby' => 'date','order' => 'DESC');
	if (!empty($category))
	$args['term'] = $category; 
   	$query = new WP_Query($args);
	
	$return.='<div id="masonry-grid">';
	   	
	while ($query->have_posts())  : $query->the_post(); 
		$custom = get_post_custom($post->ID);  	
		
		$return.='
		<div class="grid_4 masonry-item">
			<div class="projectdetailssm">                               
				<div class="grid_4_no_margin"> 
					<div class="shadowdetailsextrasm">
						<div class="featuredimage">                                                	
							<div class="hover">
								<span>';
								if( !empty ( $custom['_portfolio_video'][0] ) ) : 
									$return.='<a href="'.$custom['_portfolio_video'][0].'" class="zoom-icon" title="'.get_the_title().'" data-rel="prettyPhoto">';
								elseif( isset($custom['_portfolio_link'][0]) && $custom['_portfolio_link'][0] != '' ) : 
									$return.='<a href="'.$custom['_portfolio_link'][0].'" title="'.get_the_title().'">';
								elseif( isset( $custom['_portfolio_no_lightbox'][0] )  &&  $custom['_portfolio_no_lightbox'][0] !='' ): 
									$return.='<a href="'.get_permalink().'">';
								else : // open image in original size in the pretty photo lightbox 
									$full_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full', false);
									$return.='<a href="'.$full_image[0].'" class="zoom-icon" title="'.get_the_title().'" data-rel="prettyPhoto">';
								endif;
									$return.=get_the_post_thumbnail($post->ID, 'portfolio-thumb-masonry2', array('class' => 'cover'));
								$return.='</a>
								</span>
							</div>
						</div>
					</div>
					<div class="grid_4 paddingleft masonry-list">
						<h4 class="paddingright">'.get_the_title().'</h4>
						<p class="paddingright">'.limit_words(get_the_excerpt(), '30').'</p>';
						if (isset($custom['_portfolio_additional_info'][0])):
							$return.= do_shortcode ($custom['_portfolio_additional_info'][0]);
						endif; 
						$return.='<div><a href="'.get_permalink().'" class="button light small">Read More</a></div>                     
					</div>
				</div>
				<div class="clearnospacing"></div>
			</div>
		</div>';
	  	
	endwhile; wp_reset_query();
		
	$return.='<div class="clear"></div>';
	$return.='</div>';
	return $return;
	
}
add_shortcode("list_portfolio", "al_list_portfolio"); 
	
?>