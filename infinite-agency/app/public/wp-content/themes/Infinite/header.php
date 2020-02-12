<!DOCTYPE html>
<!--[if lte IE 8]>
<script type="text/javascript">
    window.location = "/wp-content/themes/Infinite/ie/index.html";
</script>
<![endif]-->
<head>

	<!-- theinfiniteagency.com -->
	<script type="text/javascript">
		var _da_=_da_||[],_da_oldErr=window.onerror;_da_.err=[];
		window.onerror=function(e){_da_.err.push(e);_da_oldErr&&_da_oldErr(e);};
		(function(d) {
			var da = d.createElement('script'); da.type = 'text/javascript'; da.async = true;
			da.src = location.protocol+'//decibelinsight.net/i/1779/di.js';
			d.getElementsByTagName('head')[0].appendChild(da);
		})(document);
</script>


	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<!--<title><?php wp_title(' '); ?><?php if(wp_title(' ', false)) { echo ' | '; } ?><?php bloginfo('name'); ?></title>-->
	<title><?php wp_title(' '); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">

	<script type="text/javascript" src="//use.typekit.net/oqd5kmr.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

	<script src="https://code.jquery.com/jquery-1.10.1.min.js"></script>



	<script>
		$(function pageLoad() {
			setTimeout(function() {
				$("#content").addClass('fader');
				$(".home-loader").addClass('loaded');
			},1000);
			setTimeout(function() {
				$(".home-loader").addClass('loaded-index');
			},2000);
		});
	</script>


	<?php if (is_page('23')){ ?>
	<script>
		jQuery(document).ready(function($) {

			if ($(window).height() > 700 && $(window).width() > 641) {
				$('head').append('<link rel="stylesheet" type="text/css" href="/wp-content/themes/Infinite/css/onepage-scroll.css">');
				$("section").css({'height':($( window ).height()+'px')});
				$(".home-loader").css({'height':($( window ).height()+'px')});

				$( window ).resize(function() {
					$("section").css({'height':($( window ).height()+'px')});
				});
			}

			else {
				$('.home section').css('background-attachment', 'fixed');
				$('.home section').css('margin-top', '0');
				$('section').css('height', '900px');
				$('.white-bottom').css('visibility', 'hidden');
				$('.grey-bottom').css('visibility', 'hidden');
				$('section.nine footer').css('height', '275px');
				$('.slidedown').css('opacity', '1');
				$('.slideleft').css('opacity', '1');
				$('.slideright').css('opacity', '1');
				$('.expandopen').css('opacity', '1');
				$('.slideexpandup').css('opacity', '1');
				$('.bigentrance').css('opacity', '1');
				$('section.nine .outer .inner .row').css('margin-top', '-300px');
			}
		});
	</script>

	<script>
		$(function pageLoad() {
			if ($(window).width() < 643) {
				$('.home section').css('background-attachment', 'scroll');
			}
		});
	</script>
	<?php } ?>

	<!-- media-queries.js (fallback) -->
		<!--[if lt IE 9]>
			<script src="https://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
			<![endif]-->

			<!-- html5.js -->
		<!--[if lt IE 9]>
			<script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<![endif]-->

			<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

			<!-- wordpress head functions -->
			<?php wp_head(); ?>
			<!-- end of wordpress head -->

			<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />



			<script>
				jQuery(document).ready(function($) {
					$( ".mobile-nav-icon" ).click(function() {
						$( ".mobile-nav-container-wrapper" ).toggleClass( "open" );
						$( ".content-wrapper" ).toggleClass( "content-wrapper-open" );
						$( "footer" ).toggleClass( "content-wrapper-open" );
					});
				});
			</script>



			<script>
				jQuery(document).ready(function($) {
					jQuery( ".mobile-nav-icon" ).click(function() {
						if ( $( "footer" ).hasClass( "content-wrapper-open" )) {
							$(".container").css({'height':($( window ).height()+'px')});
							$(".mobile-nav-container-wrapper").css({'height':($( window ).height()-80+'px')});
							$("ul.tabs.vertical li a").css({'padding-top':((((($( window ).height()-80)/5)-27)/2)+'px')});
							$("ul.tabs.vertical li a").css({'padding-bottom':((((($( window ).height()-80)/5)-27)/2)+'px')});
						}
						else {
							$(".container").css({'height':'100%'});
							$(".mobile-nav-container-wrapper").css({'height':($( window ).height()-80+'px')});
						}
					});
				});
			</script>


			<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/animations.css">

			<link rel="stylesheet" type="text/css" href="/wp-content/themes/Infinite/custom-final.css">

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-33472790-1', 'auto');
  ga('require', 'displayfeatures');
  ga('require', 'linkid', 'linkid.js');
  ga('send', 'pageview');

</script>

	</head>

		<body <?php body_class(); ?>>
			<div class="container">
				<div class="site-menu large-9 columns mobile-nav-container-wrapper">
					<?php bones_mobile_nav(); ?>
				</div>
				<div class="header-wrapper">
					<header role="banner" id="top-header" class="row">

						<?php $businessinfo = get_businessinfo(); ?>
						<?php while ( $businessinfo->have_posts() ) : $businessinfo->the_post(); ?>

							<!--div class="site-logo large-3 columns">
								<a href="/"><img alt="Creative Interactive Marketing Agency" data-interchange="[<?php the_field("mobile_logo"); ?>, (only screen and (min-width: 1px))], [<?php the_field("logo"); ?>, (only screen and (min-width: 768px))]"></a>
							</div-->

							<div class="site-logo large-3 columns">
								<a href="/"><img alt="Creative Interactive Marketing Agency" src="https://theinfiniteagency.com/wp-content/uploads/the-infinite-agency-dallas-logo.png"></a>
							</div>




						<?php endwhile;?>
						<?php wp_reset_query()?>

						<div class="mobile-nav-icon">
							<img src="/wp-content/themes/Infinite/images/mobile-nav-icon.png">
						</div>

						<div class="site-menu large-9 columns">
							<?php bones_main_nav(); ?>
						</div>

		</header>
				</div>
				<div class="content-wrapper main">
