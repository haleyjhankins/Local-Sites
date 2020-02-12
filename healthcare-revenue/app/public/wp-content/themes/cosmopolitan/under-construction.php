<?php
/* Template Name: Under construction */
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"  <?php language_attributes( ) ?>> <!--<![endif]-->
<head>

    <meta charset="utf-8">
   	<meta name="description" content="">
	<meta name="author" content="">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=UTF-8" /> 
  	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
    <link rel="stylesheet" type="text/css"  media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <?php if ($al_options['al_favicon'] != ''):?>
		<link rel="shortcut icon" href="<?php echo $al_options['al_favicon'] ?>" /> 
    <?php endif?>
 	<?php  $skin = isset($al_options['al_skin']) && $al_options['al_skin'] != '' ? $al_options['al_skin'] : 'default';?>	
  
   	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/css/colors/<?php echo $skin?>.css" /> 	
   	<?php  $al_options = get_option('al_general_settings'); ?>
	<?php  
		$date = explode('/', $al_options['al_uc_ldate']);
		if(empty($date)) $date = array(24,06,2012);
	?>
   	<?php include (TEMPLATEPATH . '/css/dynamic-styles.php'); ?>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=PT+Sans" />
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" />
   	<!--[if lt IE 9]><script src="<?php echo get_template_directory_uri() ?>/js/html5.js"></script><![endif]-->
	<!--[if lte IE 6]>
    	<script src="<?php echo get_template_directory_uri()  ?>/js/ie6/warning.js"></script>
        <script>window.onload=function(){e("<?php echo get_template_directory_uri()  ?>/js/ie6/")}</script>
    <![endif]-->
    <!--[if IE ]><link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri()  ?>/css/ie.css" /><![endif]-->
  	
   <?php wp_head(); ?>
   <script src="<?php echo get_template_directory_uri()  ?>/js/jquery.countdown.min.js" type="text/javascript"></script>
   <script type="text/javascript">
		jQuery(document).ready(function(){ 
			jQuery('#countdown_dashboard').countDown({
				targetDate: {
					'day': 		<?php echo $date[0]?>,
					'month': 	<?php echo $date[1]?>,
					'year': 	<?php echo $date[2]?>,
					'hour': 	11,
					'min': 		0,
					'sec': 		0
				}
			});
    	}); 
    </script> 
</head>

<body>
<img src="<?php echo get_template_directory_uri() ?>/images/backgrounds/bg_image1.jpg" alt="" id="background" class="fullBg" />
<div id="maincontent">
  
	<div id="cs-logo">
		<img src="<?php echo $al_options['al_uclogo']?>" alt=""  />
	</div>
    
    <div class="box" style="padding:30px 0px">
        <div class="pagecontents">
            <div class="container_12">
                 
				<div class="center">
					<h3 class="coming-soon"><?php echo $al_options['al_uc_maincaption']?></h3>
					<p><?php echo $al_options['al_uc_pr_head_text']?></p>
					<div class="pagebgd" style="margin-top:20px; padding-top:22px; height:72px">
						<div id="countdown_dashboard">
							<div class="dash weeks_dash">
								<span class="dash_title"><?php _e('weeks', 'Cosmopolitan') ?></span>
								<div class="digit">0</div>
								<div class="digit">0</div>
							</div>
						
							<div class="dash days_dash">
								<span class="dash_title"><?php _e('days', 'Cosmopolitan') ?></span>
								<div class="digit">0</div>
								<div class="digit">0</div>
							</div>
						
							<div class="dash hours_dash">
								<span class="dash_title"><?php _e('hours', 'Cosmopolitan') ?></span>
								<div class="digit">0</div>
								<div class="digit">0</div>
							</div>
						
							<div class="dash minutes_dash">
								<span class="dash_title"><?php _e('minutes', 'Cosmopolitan') ?></span>
								<div class="digit">0</div>
								<div class="digit">0</div>
							</div>
						
							<div class="dash seconds_dash">
								<span class="dash_title"><?php _e('seconds', 'Cosmopolitan') ?></span>
								<div class="digit">0</div>
								<div class="digit">0</div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<div class="divider_shadow"></div>
					<div class="clearnospacing"></div>
					<?php if (isset($al_options['al_uc_social']) && $al_options['al_uc_social'] != ''):?>
						<div id="uc-social" ><?php echo do_shortcode($al_options['al_uc_social'])?></div>
					<?php endif?>
				</div>    
                
            </div>
        </div>     
	</div>
</div>
<?php wp_footer() ?>
</body>
</html>