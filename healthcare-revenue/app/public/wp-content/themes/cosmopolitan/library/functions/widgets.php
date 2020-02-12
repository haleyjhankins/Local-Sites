<?php

/**** WIDGETS AREA ****/


/* ***************************************************** 
 * Plugin Name: Cosmopolitan Flickr
 * Description: Retrieve and display photos from Flickr.
 * Version: 1.0
 * Author: Weblusive
 * Author URI: http://www.weblusive.com
 * ************************************************** */
class al_flickr_widget extends WP_Widget {

	// Widget setup.
	function al_flickr_widget() {

		// Widget settings.
		$widget_ops = array(
			'classname' => 'widget_al_flickr',
			'description' => __('Display images from flickr', 'Cosmopolitan')
		);

		// Widget control settings.
		$control_ops = array(
			'id_base' => 'al-flickr-widget'
		);

		// Create the widget.
		$this->WP_Widget('al-flickr-widget', __('Cosmopolitan - Flickr images', 'Cosmopolitan') , $widget_ops, $control_ops);
	}

	// Display the widget on the screen.
	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$id = $instance['flickr_id'];
		$nr = ($instance['flickr_nr'] != '') ? $nr = $instance['flickr_nr'] : $nr = 16;
		echo $before_widget;
		if ($title) echo $before_title . $title . $after_title;
		echo "
		<script type=\"text/javascript\">
			jQuery(document).ready(function(){
				jQuery('ul#basicuse').jflickrfeed({
					limit: ".$nr.",
					qstrings: {
						id: '".$id."'
					},
					itemTemplate: '<li><a href=\"http://www.flickr.com/photos/".$id."\"><img src=\"{{image_s}}\" alt=\"{{title}}\" /></a></li>'
				});
			});
		</script>";
		echo '<ul id="basicuse" class="thumbs"><li></li></ul>'.$after_widget;
		
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['flickr_id'] = strip_tags($new_instance['flickr_id']);
		$instance['flickr_nr'] = strip_tags($new_instance['flickr_nr']);
		return $instance;
	}

	function form($instance) {
		$defaults = array(
		'title' => 'Latest From Flickr',
		'flickr_nr' => '16',
		'flickr_id' => '47445714@N03'
		);
		
		$instance = wp_parse_args((array)$instance, $defaults); ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'Cosmopolitan'); ?></label>
			<input id="<?php echo $this->get_field_id('title'); ?>" type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
		</p>
        
		<p>
			<label for="<?php echo $this->get_field_id('flickr_id'); ?>"><?php _e('Flickr ID:', 'Cosmopolitan'); ?></label> 
			<input id="<?php echo $this->get_field_id('flickr_id'); ?>" type="text" name="<?php echo $this->get_field_name('flickr_id'); ?>" value="<?php echo $instance['flickr_id']; ?>" class="widefat" />
            <small style="line-height:12px;"><a href="http://www.idgettr.com">Find your Flickr user or group id</a></small>
		</p>
        <p>
			<label for="<?php echo $this->get_field_id('flickr_nr'); ?>"><?php _e('Number of photos:', 'Cosmopolitan'); ?></label> 
			<input id="<?php echo $this->get_field_id('flickr_nr'); ?>" type="text" name="<?php echo $this->get_field_name('flickr_nr'); ?>" value="<?php echo $instance['flickr_nr']; ?>" class="widefat" />
		</p>
	<?php
	}
}

register_widget('al_flickr_widget');


/* ***************************************************** 
 * Plugin Name: Last Tweets
 * Description: Displays Latest Tweets.
 * Version: 1.1
 * Author: Weblusive
 * Author URI: http://www.weblusive.com
 * ************************************************** */

add_action( 'widgets_init', 'es_tweets_widgets' );

function es_tweets_widgets() {
	register_widget( 'ES_Tweet_Widget' );
}
class es_tweet_widget extends WP_Widget {

	function ES_Tweet_Widget() {
	
		$widget_ops = array( 'classname' => 'es_tweet_widget', 'description' => __('A custom widget for displaying your latest tweets.', 'Cosmopolitan') );
		$this->WP_Widget( 'es_tweet_widget', __('Cosmopolitan - Latest Tweets','Cosmopolitan'), $widget_ops);
	}

	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );
		$username = $instance['username'];
		$postcount = $instance['postcount'];
		$fcaption = $instance['fcaption'];
	
		echo $before_widget;

		if ( $title )
			echo $before_title . $title . '<span class="twitbird">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>'.$after_title;
		
		 ?>
        	<div id="twitter_div">
                <ul id="twitter_update_list" class="twitter">
                    <li>&nbsp;</li>
                </ul>
                <a href="https://twitter.com/<?php echo $username ?>" target="_self" class="button light small"><?php echo $fcaption ?></a>
            </div>
            <a href="http://twitter.com/<?php echo $username ?>" class="twitter-link"></a>
			<script type="text/javascript" src="<?php echo get_template_directory_uri()  ?>/js/twitter.js"></script>
			<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/<?php echo $username ?>.json?callback=twitterCallback2&amp;count=<?php echo $postcount ?>"></script>
                            
        
		
		<?php 

		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['username'] = strip_tags( $new_instance['username'] );
		$instance['postcount'] = strip_tags( $new_instance['postcount'] );
		$instance['fcaption'] = strip_tags( $new_instance['fcaption'] );
		
		return $instance;
	}
	
	function form( $instance ) {

		$defaults = array(
		'title' => 'Latest Tweets',
		'username' => 'mariam_mel',
		'postcount' => '2',
		'fcaption' => 'Follow us on Twitter',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<div>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'Cosmopolitan') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</div>

		<div>
			<label for="<?php echo $this->get_field_id( 'username' ); ?>"><?php _e('Twitter Username (e.g., weblusive)', 'Cosmopolitan') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'username' ); ?>" name="<?php echo $this->get_field_name( 'username' ); ?>" value="<?php echo $instance['username']; ?>" />
		</div>
		
		<div>
			<label for="<?php echo $this->get_field_id( 'postcount' ); ?>"><?php _e('Number of tweets (Keep < 20)', 'Cosmopolitan') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'postcount' ); ?>" name="<?php echo $this->get_field_name( 'postcount' ); ?>" value="<?php echo $instance['postcount']; ?>" />
		</div>
        
        <div>
			<label for="<?php echo $this->get_field_id( 'fcaption' ); ?>"><?php _e('Follow button caption', 'Cosmopolitan') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'fcaption' ); ?>" name="<?php echo $this->get_field_name( 'fcaption' ); ?>" value="<?php echo $instance['fcaption']; ?>" />
		</div>
		
	<?php
	}
}



/* ***************************************************** 
 * Plugin Name: Cosmopolitan Last Works
 * Description: Retrieve and display latest works (Portfolio).
 * Version: 1.0
 * Author: Weblusive
 * Author URI: http://www.weblusive.com
 * ************************************************** */
class al_works_widget extends WP_Widget {

	// Widget setup.
	function al_works_widget() {

		// Widget settings.
		$widget_ops = array(
			'classname' => 'widget_al_works',
			'description' => __('Display latest works (Portoflio)', 'Cosmopolitan')
		);

		// Create the widget.
		$this->WP_Widget('al-works-widget', __('Cosmopolitan - Latest Works', 'Cosmopolitan') , $widget_ops);
	}

	// Display the widget on the screen.
	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['post_title']);
		
		echo $before_widget;
		if ($title) echo $before_title . $title . $after_title;
		$post_count = $instance['post_count'];
		
		$loop = new WP_Query(array('post_type' => 'portfolio', 'posts_per_page' => $post_count));
		?>
        <ul class="latest-works-widget">
			<?php
            while ( $loop->have_posts() ) : $loop->the_post();?>
            	<li>
                    <div class="work-widget-thumb">
                        <a href="<?php the_permalink()?>">
                            <?php the_post_thumbnail(array(55, 55), array('class'=>'cover') ); ?>
                        </a>
                    </div>      
                    <p class="work-widget-content">
                        <a href="<?php the_permalink()?>"><?php the_title() ?></a>
                        <br />
                        <?php echo limit_words(get_the_excerpt(), '12')?>
                    </p>
                    <div class="clearnospacing"></div>
               	</li>
               	<!-- <p><?php //echo limit_words($loop->post_content, '12')?></p>-->   
            <?php endwhile;?>
        </ul>
		<?php echo $after_widget; 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['post_title'] = strip_tags($new_instance['post_title']);
		$instance['post_count'] = strip_tags($new_instance['post_count']);
		return $instance;
	}

	function form($instance) {
		$defaults = array(
			'post_title' => 'Latest Works',
			'post_count' => '2'
		);
		$instance = wp_parse_args((array)$instance, $defaults); ?>
		<p>
			<label for="<?php echo $this->get_field_id('post_title'); ?>"><?php _e('Title', 'Cosmopolitan'); ?></label>
			<input id="<?php echo $this->get_field_id('post_title'); ?>" type="text" name="<?php echo $this->get_field_name('post_title'); ?>" value="<?php echo $instance['post_title']; ?>" class="widefat" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id('post_count'); ?>"><?php _e('Number of Posts to show', 'Cosmopolitan'); ?></label> 
			<input id="<?php echo $this->get_field_id('post_count'); ?>" type="text" name="<?php echo $this->get_field_name('post_count'); ?>" value="<?php echo $instance['post_count']; ?>" class="widefat" />
		</p>
	<?php
	}
}

register_widget('al_works_widget');



/* ***************************************************** 
 * Plugin Name: Cosmopolitan Blog Posts
 * Description: Retrieve and display latest blog posts.
 * Version: 1.0
 * Author: Weblusive
 * Author URI: http://www.weblusive.com
 * ************************************************** */
class al_blogposts_widget extends WP_Widget {

	// Widget setup.
	function al_blogposts_widget() {

		// Widget settings.
		$widget_ops = array(
			'classname' => 'widget_al_blogposts',
			'description' => __('Display latest blog posts', 'Cosmopolitan')
		);

		// Create the widget.
		$this->WP_Widget('al-blogposts-widget', __('Cosmopolitan Latest Blog Posts', 'Cosmopolitan') , $widget_ops);
	}

	// Display the widget on the screen.
	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['post_title']);
		
		echo $before_widget;
		if ($title) echo $before_title . $title . $after_title;
		$post_count = $instance['post_count'];
		$post_category = $instance['post_category'];
		
		global $post;
		$args = array( 'numberposts' => $post_count);
		if (!empty($post_category))
		$args['category'] = $post_category;
		$myposts = get_posts( $args );
		if ($myposts):
			foreach( $myposts as $post ) :	setup_postdata($post);  ?>
				
                <div class="alignleft">			
					<a href="<?php the_permalink()?>">
						<?php the_post_thumbnail('blog-thumb', array('class'=>'framesm') ); ?>
					</a>	
                </div>      
                <p><a href="<?php the_permalink()?>"><?php the_title()?></a></p>
                <a href="<?php the_permalink()?>" class="tip_trigger"><img src="<?php echo get_template_directory_uri() ?>/images/icons/user.png" class="fade imgspace" alt=""/><span class="tip"><?php echo the_author() ?></span></a>
                <a href="<?php the_permalink()?>" class="tip_trigger"><img src="<?php echo get_template_directory_uri() ?>/images/icons/tag.png" class="fade imgspace" alt=""/><span class="tip"><?php echo the_time('F jS, Y') ?></span></a>
                <a href="<?php the_permalink()?>" class="tip_trigger"><img src="<?php echo get_template_directory_uri() ?>/images/icons/comment.png" class="fade" alt=""/><span class="tip"></span></a>
               
                <div class="clearnospacing"></div>
                <p><?php echo  limit_words(get_the_excerpt(), 20); ?></p>
                <a href="<?php the_permalink()?>" class="button black small fade"><?php _e('Read More', 'Cosmopolitan');?></a>
            	
			<?php endforeach; ?>
        <?php endif; ?>
        <?php echo $after_widget; 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['post_title'] = strip_tags($new_instance['post_title']);
		$instance['post_count'] = strip_tags($new_instance['post_count']);
		$instance['post_category'] = strip_tags($new_instance['post_category']);
		return $instance;
	}

	function form($instance) {
		$defaults = array(
			'post_title' => 'Latest from the blog',
			'post_count' => '2',
			'post_category' => ''
		);
		$instance = wp_parse_args((array)$instance, $defaults); ?>
		<p>
			<label for="<?php echo $this->get_field_id('post_title'); ?>"><?php _e('Title', 'Cosmopolitan'); ?></label>
			<input id="<?php echo $this->get_field_id('post_title'); ?>" type="text" name="<?php echo $this->get_field_name('post_title'); ?>" value="<?php echo $instance['post_title']; ?>" class="widefat" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id('post_count'); ?>"><?php _e('Number of Posts to show', 'Cosmopolitan'); ?></label> 
			<input id="<?php echo $this->get_field_id('post_count'); ?>" type="text" name="<?php echo $this->get_field_name('post_count'); ?>" value="<?php echo $instance['post_count']; ?>" class="widefat" />
		</p>
        
         <p>
			<label for="<?php echo $this->get_field_id('post_category'); ?>"><?php _e('Category (Leave Blank to show from all categories)', 'Cosmopolitan'); ?></label> 
			<input id="<?php echo $this->get_field_id('post_category'); ?>" type="text" name="<?php echo $this->get_field_name('post_category'); ?>" value="<?php echo $instance['post_category']; ?>" class="widefat" />
		</p>
	<?php
	}
}

register_widget('al_blogposts_widget');


/* ***************************************************** 
 * Plugin Name: Information Widget
 * Description: Show information with an icon in a widget.
 * Version: 1.0
 * Author: Weblusive
 * Author URI: http://www.weblusive.com
 * ************************************************** */
class al_info_widget extends WP_Widget {

	// Widget setup.
	function al_info_widget() {

		// Widget settings.
		$widget_ops = array(
			'classname' => 'widget_al_content',
			'description' => __('Display custom content with icon and button', 'Cosmopolitan')
		);

		// Widget control settings.
		$control_ops = array('id_base' => 'al-content-widget');

		// Create the widget.
		$this->WP_Widget('al-content-widget', __('Cosmopolitan information widget', 'Cosmopolitan') , $widget_ops, $control_ops);
	}

	// Display the widget on the screen.
	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$descr = $instance['content_desc'];
		$image = $instance['content_image'];
		$link = $instance['content_link'];
		$linkTitle = $instance['link_title'];
		$active = $instance['is_active'];
		
		echo $before_widget;
		
		//SHOW the posts
		?>
        <div class="showbox nomargin boxpadding">	
            <h3 class="uppercase"><img class="imageinset" src="<?php echo $image ?>" alt="<?php echo $title ?>"/><?php echo $title ?></h3>
            <div class="clearextrasmall"></div>
            <p><?php echo $descr ?></p>
            <?php if ($link): ?>
                <a href="<?php echo $link ?>" target="_self" class="button <?php if ($active):?>high<?php endif?>light medium"><?php echo $linkTitle ?></a>
            <?php endif?>
        </div>   
            
            
		<?php
		
		echo $after_widget;
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['link_title'] = strip_tags($new_instance['link_title']);
		$instance['content_desc'] = strip_tags($new_instance['content_desc']);
		$instance['content_image'] = $new_instance['content_image'];
		$instance['content_link'] = $new_instance['content_link'];
		$instance['is_active'] = $new_instance['is_active'];
		
		return $instance;
	}

	function form($instance) {
		$defaults = array(
		'title' => '',
		'content_desc' => '',
		'content_image' => 'http://',
		'content_link' => 'http://',
		'link_title' => 'Read More',
		'is_active' => '',
		);
		
		$instance = wp_parse_args((array)$instance, $defaults); ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'Cosmopolitan'); ?></label>
			<input id="<?php echo $this->get_field_id('title'); ?>" type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
		</p>
        
       <p>
			<label for="<?php echo $this->get_field_id('content_desc'); ?>"><?php _e('Description:', 'Cosmopolitan'); ?></label> 
			<textarea id="<?php echo $this->get_field_id('content_desc'); ?>" name="<?php echo $this->get_field_name('content_desc'); ?>" class="widefat" style="height:100px"><?php echo $instance['content_desc']; ?></textarea>
  		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id('content_image'); ?>"><?php _e('Image:', 'Cosmopolitan'); ?></label> 
			<input id="<?php echo $this->get_field_id('content_image'); ?>" type="text" name="<?php echo $this->get_field_name('content_image'); ?>" value="<?php echo $instance['content_image']; ?>" class="widefat" />
  		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id('content_link'); ?>"><?php _e('Link (optional):', 'Cosmopolitan'); ?></label> 
			<input id="<?php echo $this->get_field_id('content_link'); ?>" type="text" name="<?php echo $this->get_field_name('content_link'); ?>" value="<?php echo $instance['content_link']; ?>" class="widefat" />
  		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id('link_title'); ?>"><?php _e('Link Title:', 'Cosmopolitan'); ?></label> 
			<input id="<?php echo $this->get_field_id('link_title'); ?>" type="text" name="<?php echo $this->get_field_name('link_title'); ?>" value="<?php echo $instance['link_title']; ?>" class="widefat" />
  		</p>
        <p>
			<label for="<?php echo $this->get_field_id('is_active'); ?>"><?php _e('Highlight link:', 'Cosmopolitan'); ?></label> 
			<select id="<?php echo $this->get_field_id('is_active'); ?>"  name="<?php echo $this->get_field_name('is_active'); ?>" class="widefat">
            	<option value="0" <?php if ($instance['is_active']==0): ?>selected="selected"<?php endif?>><?php _e('No', 'Cosmopolitan')?></option>
            	<option value="1" <?php if ($instance['is_active']==1): ?>selected="selected"<?php endif?>><?php _e('Yes', 'Cosmopolitan')?></option>
            </select>
  		</p>
        
	<?php
	}
}

register_widget('al_info_widget');


/* ***************************************************** 
 * Plugin Name: Cosmopolitan Contact Widget
 * Description: Display contact widget on footer.
 * Version: 1.0
 * Author: Weblusive
 * Author URI: http://www.weblusive.com
 * ************************************************** */
/**
 * Contact Form Widget Class
 */
class al_Contact_Form extends WP_Widget {
	
	function al_Contact_Form() {
		$widget_ops = array('classname' => 'al_contact_form_entries', 'description' => __("Contact widget", 'Cosmopolitan') );
		$this->WP_Widget('al_Contact_Form', __('Cosmopolitan - Contact Form', 'Cosmopolitan'), $widget_ops);
	}

	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Contact Us', 'Cosmopolitan') : $instance['title'], $instance);
		$email = apply_filters('widget_title', empty($instance['email']) ? __('', 'Cosmopolitan') : $instance['email'], $instance);
		$success = apply_filters('widget_title', empty($instance['success']) ? __('Thank you, e-mail sent.', 'Cosmopolitan') : $instance['success'], $instance);
		
		echo $before_widget;
		
		if ( $title ) echo $before_title . $title . $after_title;

			echo '<form action="#" method="post" id="contactFormWidget">';
			echo '<div><input type="text" name="wname" id="wname" value="" size="22" title="Name" /></div>';
			echo '<div><input type="text" name="wemail" id="wemail" value="" size="22" title="Email" /></div>';
			echo '<div><textarea name="wmessage" id="wmessage" cols="60" rows="10" title="Message"></textarea></div>';
			echo '<div class="loading"></div>';
			echo '<div><input type="hidden" name="wcontactemail" id="wcontactemail" value="'.$email.'" /></div>';
			echo '<div><input type="hidden" value="'.home_url().'" id="wcontactwebsite" name="wcontactwebsite" /></div>';
			echo '<div><input type="hidden" name="wcontacturl" id="wcontacturl" value="'.get_template_directory_uri().'/library/sendmail.php" /></div>';
			echo '<div><input type="submit" id="wformsend" value="Submit" class="button highlight small" name="wsend"  /></div>';
			echo '<div class="clearnospacing"></div>';
			echo '<div class="widgeterror"></div>';
			echo '<div class="widgetinfo">'.$success.'</div>';
			echo '</form>';
	
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['email'] = strip_tags($new_instance['email']);
		$instance['success'] = strip_tags($new_instance['success']);
		return $instance;
	}

	function form( $instance ) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$email = isset($instance['email']) ? esc_attr($instance['email']) : '';
		$success = isset($instance['success']) ? esc_attr($instance['success']) : '';
	?>
	
		<div>
        	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:<br />', 'Cosmopolitan'); ?>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
		</div>
        <div>
        	<label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email Address:<br />', 'Cosmopolitan'); ?>
			<input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo $email; ?>" /></label></p>
		</div>
        <div>
        	<label for="<?php echo $this->get_field_id('success'); ?>"><?php _e('Success Message:<br />', 'Cosmopolitan'); ?>
			<input class="widefat" id="<?php echo $this->get_field_id('success'); ?>" name="<?php echo $this->get_field_name('success'); ?>" type="text" value="<?php echo $success; ?>" /></label></p>
		</div>
		<div style="clear:both"></div>
<?php
	}
}

register_widget('al_Contact_Form');
?>