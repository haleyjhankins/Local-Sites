<?php
    /////////////////////////////////////////////
    // EDIT DETAILS HERE
    /////////////////////////////////////////////
    $address = "1900 Abrams Parkway";
    $city = "Dallas";
    $state = "TX";
    $zip = "75214";
    $phone = "214.828.8700";
    $email = "hello@unleavened.com";

    $facebook_url = "https://www.facebook.com/pages/Unleavened-Fresh-Kitchen/791727170863865";
    $twitter_url = "https://twitter.com/eatunleavened";
    $instagram_url = "https://instagram.com/eatunleavened/";

    $media_contact_name = "Bread & Butter Public Relations";
    $media_contact_agency = "Bread & Butter Public Relations";
    $media_contact_email = "unleavened@breadandbutterpr.com";
    $media_contact_phone = "469.206.6873";

    $pdf_menu = "/wp-content/uploads/2019/10/Menu_10.2019.pdf";
    $pdf_catering = "/wp-content/uploads/2019/10/CateringMenu_10.2019.pdf";

    // END EDIT DETAILS
    /////////////////////////////////////////////

    $phone_no_dots = str_replace(".", "", $phone);
    $media_contact_phone_no_dots = str_replace(".", "", $media_contact_phone);
?>

<!DOCTYPE html>
<!--[if IE 9]>    <html lang="en-us" class="no-js ie9"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en-us" class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>Unleavened Fresh Kitchen - It's All About You</title>
    <link rel="canonical" href="http://www.unleavened.com/"/>
    <meta property="og:site_name" content="Unleavened Fresh Kitchen"/>
    <meta property="og:title" content="It's all about you"/>
    <meta property="og:url" content="http://www.unleavened.com/"/>
    <meta property="og:type" content="website"/>
    <meta property="og:image" content="<?php echo get_template_directory_uri();?>/assets/img/unleavened-bug.jpg"/>
    <meta itemprop="name" content="It's all about you"/>
    <meta itemprop="url" content="http://www.unleavened.com/"/>
    <meta name="twitter:title" content="Unleavened Fresh Kitchen - It's all about you"/>
    <meta name="twitter:url" content="http://www.unleavened.com/"/>
    <meta name="twitter:card" content="summary"/>
    <meta name="description" content="For freshness seekers, Unleavened is a refined fast casual restaurant that serves a convenient meal everyone can feel good about. Located in the Lakewood Neighborhood of Historic East Dallas, TX." />

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Le favicons -->
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/manifest.json">
    <meta name="apple-mobile-web-app-title" content="Unleavened">
    <meta name="application-name" content="Unleavened">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-TileImage" content="/mstile-144x144.png">
    <meta name="theme-color" content="#ec594d">

    <!-- Le styles -->
    <script src="https://use.fontawesome.com/f85edc90e5.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/styles.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/new.css" rel="stylesheet">

    <script type="text/javascript">
      jQuery(document).ready(function($) {

        $(document).on('click', '.play-video', function(e) {
          e.preventDefault();

          var video = document.querySelector('#bgvid');
          $('.play-video').hide();

          video.play();

        });

        var video = document.querySelector('#bgvid');

        if($(window).width() > 768) {
          video.addEventListener('playing', function() {
            $('.play-video').hide();
          });

          video.addEventListener('pause', function() {
            $('.play-video').show();
          });
        }

      });
    </script>

</head>

<body>

    <div class="top-row container-fluid">
        <div class="row">
            <div class="home-sidebar col-md-4">

                <div class="top-nav row hidden-xs hidden-sm">
                    <a href="#map" class="scroll col-sm-6">Our Locations</a>
                    <a href="<?=$pdf_menu;?>" class="scroll col-sm-6" target="_blank">View The Menu</a>
                </div>


                <div class="body-copy row">
                  <div class="social-nav">
                      <a href="<?=$facebook_url;?>" class="social-nav-btn" target="_blank"><i class="icon-facebook"></i></a>
                      <a href="<?=$instagram_url?>" class="social-nav-btn" target="_blank"><i class="icon-instagram"></i></a>
                      <a href="<?=$twitter_url;?>" class="social-nav-btn" target="_blank"><i class="icon-twitter"></i></a>
                      <a href="mailto:<?=$email;?>" class="social-nav-btn" target="_blank"><i class="icon-mail"></i></a>
                  </div>

                    <div class="content">
                        <h1>
                            <span class="title-rule"><span class="txt">Welcome to</span></span>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/small-logo.png" alt="Unleavened" class="small-logo">
                        </h1>
                        <p><span class="caps">A fast, casual restaurant serving a completely fresh take on the classics.<br>
                        Join us for breakfast, lunch, or dinner – seven days a week.</span>
                    </div>
                </div>

                <form class="email-form row" action="//unleavened.us11.list-manage.com/subscribe/post?u=eec852a73521d4614cf3542fc&amp;id=4092060050" method="post" name="mc-embedded-subscribe-form" target="_blank">
                    <div class="col-xs-12">
                        <h2>Want Unleavened Goodness?</h2>
                        <div class="input-group">
                            <input type="email" class="form-control" value="" name="EMAIL" placeholder="Email Address..." required>
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">Submit</button>
                            </span>
                        </div><!-- /input-group -->
                    </div>

                    <div style="position: absolute; left: -5000px;">
                        <input type="text" name="b_eec852a73521d4614cf3542fc_40920600500" tabindex="-1" value="">
                    </div>
                </form>

            </div>
            <div class="home-slider col-md-8"><!--

                -->

                <div class="slide firstslide" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/slide-4.jpg);">
                    <div class="content">
                        <p>
                            <span class="red">wraps and salads <Br> are common</span>
                            <span class="copy">But here, they are a blank canvas. Where uncommon flavor combinations make for unique and delicious possibilities.  </span>
                        </p>
                    </div>
                </div>

                <div class="slide about-u" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/slide2.jpg);">
                    <div class="content">
                        <p>
                            <span class="red">it's all about
                                <svg id="logo-u" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="-1 -1 42 41" role="img">
                                    <title>U</title>
                                    <desc>The common "at" icon, but forming a "U", for Unleavened.</desc>
                                    <g>
                                        <path class="path" d="M40,16.3c0.2-4.5-1.3-8.6-4.2-11.6C32.8,1.7,28.6,0,24,0C13.3,0,2.7,8.7,0.4,19.3c-1.1,5.3-0.1,10.3,3,14.1
                                            C6.4,37,10.8,39,16,39c3.5,0,7.1-0.9,10.5-2.7c0.5-0.2,0.6-0.8,0.4-1.3c-0.2-0.5-0.8-0.6-1.3-0.4c-3.1,1.6-6.4,2.5-9.6,2.5
                                            c-4.6,0-8.6-1.8-11.2-4.9c-2.7-3.3-3.6-7.7-2.6-12.5C4.4,9.9,14.1,1.9,24,1.9c4.2,0,7.9,1.5,10.4,4.1c2.5,2.6,3.8,6.2,3.7,10.2
                                            c-0.7,8.5-6.2,13.2-9.7,13.2c-0.8,0-1.4-0.2-1.7-0.7c-0.6-0.8-0.7-2.3-0.3-4.1l3.1-13.3c0.1-0.5-0.2-1-0.7-1.1
                                            c-0.5-0.1-1,0.2-1.1,0.7l-2.9,12.3v0c-0.9,4-4.3,6.1-7,6.1c-1.1,0-2-0.3-2.5-1c-0.7-0.8-0.8-2.2-0.5-3.8l2-9.2
                                            c0.7-3.1-0.8-4.4-1.6-4.8c-1.7-0.9-4.1-0.4-5.8,1.4c-0.4,0.4-0.4,1,0,1.3c0.4,0.4,1,0.4,1.3,0c1.3-1.3,2.8-1.5,3.6-1
                                            c1,0.5,0.8,1.9,0.6,2.7l-2,9.2c-0.5,2.2-0.2,4.1,0.8,5.4c0.9,1.1,2.3,1.7,4,1.7c2.5,0,4.9-1.2,6.6-3.2c0.1,0.7,0.4,1.3,0.8,1.9
                                            c0.5,0.6,1.5,1.4,3.2,1.4C32.7,31.2,39.2,26,40,16.3C40,16.3,40,16.3,40,16.3C40,16.3,40,16.3,40,16.3"/>
                                    </g>
                                    </svg>.</span>
                            <span class="copy">Uncommon. Untraditional. Unexpected.<br>
                            This is our promise to you.<br>
                            Every meal. Every day.</span>
                        </p>
                    </div>
                </div>

                <div class="slide potential" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/slide3.jpg);">
                    <div class="content">
                        <p>
                            <span class="red">New to the<br>
                            Neighborhood</span>
                            <span class="copy">Now Open in University Park.</span>
                        </p>
                    </div>
                </div>

            </div>
        </div>

        <a href="#hours" class="btn-see-more scroll hidden-xs">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="168px" height="168px" viewBox="0 0 168 168">
                <g class="svg-bg">
                    <circle class="path" cx="84" cy="84" r="81.5"/>
                </g>
                <g class="svg-border">
                    <circle class="path" fill="none" stroke-width="4" stroke-miterlimit="10" cx="84" cy="84" r="81.5"/>
                </g>
                <g class="svg-text">
                    <path class="fill" d="M57.7,69.5l2.3-0.7c0.4,3.1,1.8,6.2,5.3,6.2c2.7,0,4.2-1.6,4.2-4.3c0-2.5-1.8-4.7-4-6.9l-4.6-4.9c-1.7-1.8-3.1-3.7-3.1-5.9c0-3.9,2.9-6.4,6.8-6.4c3.9,0,6.3,2.3,7,6.4l0.1,0.3l-2.2,0.7l0-0.2c-0.4-2.8-2-5-4.9-5c-2.5,0-4.3,1.3-4.3,3.9c0,1.7,1,3.2,2.4,4.7l4.4,4.7c2.3,2.5,4.9,5,4.9,8.4c0,4.4-3,6.6-7,6.6C60.7,77.1,58.3,73.6,57.7,69.5z"/>
                    <path class="fill" d="M79.4,76.6V47h10.3v2.1H82v11.2h5.5v2H82v12.2h7.7v2.1H79.4z"/>
                    <path class="fill" d="M96.8,76.6V47h10.3v2.1h-7.7v11.2h5.5v2h-5.5v12.2h7.7v2.1H96.8z"/>
                    <path class="fill" d="M42.2,110.9V81.3h3.2l5.7,25.6c2.3-11.2,3.5-14.4,5.7-25.6h3.2v29.7h-2.3V87.2l-5.5,23.7H50l-5.5-23.7v23.7H42.2z"/>
                    <path class="fill" d="M68.2,102.3V89.9c0-5,1.8-9,7.6-9c5.8,0,7.6,4,7.6,9v12.4c0,5-1.7,9.1-7.6,9.1S68.2,107.3,68.2,102.3zM80.7,102.9V89.3c0-3.5-1.1-6.4-4.9-6.4s-4.9,2.8-4.9,6.4v13.6c0,3.5,1.1,6.4,4.9,6.4S80.7,106.4,80.7,102.9z"/>
                    <path class="fill" d="M91.4,110.9V81.3h7.9c5.2,0,6.4,3.5,6.4,7.7c0,3-0.9,6-4.1,7.2l4.6,14.8h-2.8L99,96.4h-5v14.5H91.4zM94,94.3h5.3c3.1,0,3.8-2.7,3.8-5.5c0-2.9-0.7-5.5-3.8-5.5H94V94.3z"/>
                    <path class="fill" d="M113.4,110.9V81.3h10.3v2.1H116v11.2h5.5v2H116v12.2h7.7v2.1H113.4z"/>
                </g>
                <g class="svg-arrow">
                    <polyline class="path" fill="none" stroke-width="4" stroke-linecap="round" stroke-miterlimit="10" points="66.1,134 83.6,151.7 101.9,134"/>
                </g>
            </svg>
        </a>
    </div><!-- /.top-row -->

    <div class="second-row container-fluid">
        <div class="row">
            <div id="hours" class="col-md-5">
                <div class="content">
                    <h2 class="oswald-l">
                        Unexpectedly
                        <span class="lower lora italic">- fresh -</span>
                        Catering
                    </h2>
                    <div class="catering-menus">
                        <a href="<?=$pdf_catering;?>" class="cm-link lora italic">View Catering Menus</a>
                        <a href="mailto:catering@unleavened.com" class="cm-link lora italic">catering@unleavened.com</a>
                    </div>
                </div>
            </div>
            <div id="menu" class="col-md-7">
                <a href="<?=$pdf_menu;?>" class="btn-view-the-menu" target="_blank">
                    <div class="">
                        <span class="caps">View</span> - the - <span class="caps">Menu</span>
                    </div>
                </a>
            </div>
        </div>
    </div><!-- /.second-row -->

    <div class="video-row">
        <h3>Discover what makes Unleavened Uncommonly good</h3>
        <video id="bgvid" controls="controls" poster="/wp-content/themes/unleavened/assets/img/unleavened.jpg" width="100%">
            <source src="https://s3.amazonaws.com/unleavened/Unleavened-Full-Brand-Video.webm" type="video/webm">
            <source src="https://s3.amazonaws.com/unleavened/Unleavened-Full-Brand-Video.mp4" type="video/mp4">
            <source src="https://s3.amazonaws.com/unleavened/Unleavened-Full-Brand-Video.ogv" type="video/ogg">
        </video>
        <a class="play-video" href="#">
          <img src="/wp-content/themes/unleavened/assets/img/playbutton.png">
        </a>
    </div>

    <style type="text/css">
        .video-row { padding: 80px 0 0 0; }
        .video-row h3 { font-size: 4rem; text-align: center; margin-bottom: 80px; font-family: "Oswald","Helvetica Neue",Helvetica,Arial,sans-serif; color: #ec594d; letter-spacing: .5rem; font-weight: lighter;}
    </style>

    <div class="third-row">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="catering bucket">
                        <a class="bucket-bottom oswald location-callout" href="#map">Call Ahead For Takeout</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="takeout bucket">

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="delivery bucket">
                        <div class="delivery-options-box oswald">
                            Delivery<br>Options
                        </div>
                        <div class="bucket-bottom flex oswald lower">
                            <a href="https://www.ubereats.com/dallas/food-delivery/unleavened-fresh-kitchen/jKdp0kMKRUmfS27q3ooVKg/" class="bblink uber">UberEATS <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
                            <a href="https://favordelivery.com/order-delivery/unleavened-fresh-kitchen-3530" class="bb-link">FAVOR <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.third-row -->

    <div id="map">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="lined oswald">Locations</h3>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-4 location">
                    <p class="oswald">Lakewood</p>
                    <p class="loc-address lora">
                        <a href="https://goo.gl/maps/5KLmtUxeWW82" class="underline" target="_blank">
                            1900 Abrams Pkwy<br>
                            Dallas, TX  75214 <br>
                        </a>
                        <a href="tel: 214.828.8700">214.828.8700</a>
                        <span class="red">MON-SAT</span>
                        <span>7AM-9PM</span>
                        <span class="red no-top-marg">SUN</span>
                        <span>9AM-9PM</span>
                    </p>
                </div>
                <div class="col-md-4 location">
                    <p class="oswald">Lake Highlands</p>
                    <p class="loc-address lora">
                        <a href="https://goo.gl/maps/wARVLKwQVx82" class="underline" target="_blank">
                            8031 Walnut Hill Ln. Ste 1150 <br>
                            Dallas, Texas  75231 <br>
                        </a>
                        <a href="tel: 214.360.4762">214.360.4762</a>
                        <span class="red">MON-SAT</span>
                        <span>7AM-9PM</span>
                        <span class="red no-top-marg">SUN</span>
                        <span>9AM-9PM</span>
                    </p>
                </div>
                <div class="col-md-4 location">
                    <p class="oswald">University Park</p>
                    <p class="loc-address lora">
                        <a href="https://www.google.com/maps/place/6632+Snider+Plaza,+Dallas,+TX+75205/@32.8473707,-96.7896863,17z/data=!3m1!4b1!4m5!3m4!1s0x864e9f00d7109e6f:0xd154d2ca63d3533!8m2!3d32.8473662!4d-96.7874923" class="underline" target="_blank">
                            6632 Snider Plaza <br>
                            Dallas, TX 75205 <br>
                        </a>
                        <a href="tel: 214.890.9820">214.890.9820</a>
                        <span class="red">MON-SAT</span>
                        <span>7AM-9PM</span>
                        <span class="red no-top-marg">SUN</span>
                        <span>9AM-9PM</span>
                    </p>
                </div>
                <div class="col-md-12">
                    <h3 class="bottom-lined oswald red">
                        <svg id="logo-u" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="-1 -1 42 41" role="img" height="50px">
                            <title>U</title>
                            <desc>The common "at" icon, but forming a "U", for Unleavened.</desc>
                            <g>
                                <path class="path" d="M40,16.3c0.2-4.5-1.3-8.6-4.2-11.6C32.8,1.7,28.6,0,24,0C13.3,0,2.7,8.7,0.4,19.3c-1.1,5.3-0.1,10.3,3,14.1
                                    C6.4,37,10.8,39,16,39c3.5,0,7.1-0.9,10.5-2.7c0.5-0.2,0.6-0.8,0.4-1.3c-0.2-0.5-0.8-0.6-1.3-0.4c-3.1,1.6-6.4,2.5-9.6,2.5
                                    c-4.6,0-8.6-1.8-11.2-4.9c-2.7-3.3-3.6-7.7-2.6-12.5C4.4,9.9,14.1,1.9,24,1.9c4.2,0,7.9,1.5,10.4,4.1c2.5,2.6,3.8,6.2,3.7,10.2
                                    c-0.7,8.5-6.2,13.2-9.7,13.2c-0.8,0-1.4-0.2-1.7-0.7c-0.6-0.8-0.7-2.3-0.3-4.1l3.1-13.3c0.1-0.5-0.2-1-0.7-1.1
                                    c-0.5-0.1-1,0.2-1.1,0.7l-2.9,12.3v0c-0.9,4-4.3,6.1-7,6.1c-1.1,0-2-0.3-2.5-1c-0.7-0.8-0.8-2.2-0.5-3.8l2-9.2
                                    c0.7-3.1-0.8-4.4-1.6-4.8c-1.7-0.9-4.1-0.4-5.8,1.4c-0.4,0.4-0.4,1,0,1.3c0.4,0.4,1,0.4,1.3,0c1.3-1.3,2.8-1.5,3.6-1
                                    c1,0.5,0.8,1.9,0.6,2.7l-2,9.2c-0.5,2.2-0.2,4.1,0.8,5.4c0.9,1.1,2.3,1.7,4,1.7c2.5,0,4.9-1.2,6.6-3.2c0.1,0.7,0.4,1.3,0.8,1.9
                                    c0.5,0.6,1.5,1.4,3.2,1.4C32.7,31.2,39.2,26,40,16.3C40,16.3,40,16.3,40,16.3C40,16.3,40,16.3,40,16.3"/>
                            </g>
                            </svg>
                    </h3>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="footer-top container-fluid">
            <div class="row">

                <div class="media-inquiries col-md-5">
                </div>

                <div class="careers-cta col-md-2">
                    <a href="mailto:hello@unleavened.com" target="_blank">Join the Team</a>
                </div>
                <div class="media-inquiries col-md-5">
                </div>
            </div>
        </div>
        <div class="footer-bottom container-fluid">
            <div class="row">
                <p class="logos col-lg-8">
                    <span class="logo unleavened">
                        <img class="ft-logo" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-main.svg" alt="Unleavened">
                    </span>
                    <a class="logo stock-in-trade" href="http://www.stockintraderg.com/" target="_blank"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-stock-in-trade.svg"></a>
                    <span class="logo go-texan"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-go-texan.svg"></span>
                </p>
                <div class="address-social col-lg-4">
                    <div class="social-nav ft-social-nav">
                        <a href="<?=$facebook_url;?>" class="social-nav-btn" target="_blank"><i class="icon-facebook"></i></a>
                        <a href="<?=$instagram_url;?>" class="social-nav-btn" target="_blank"><i class="icon-instagram"></i></a>
                        <a href="<?=$twitter_url;?>" class="social-nav-btn" target="_blank"><i class="icon-twitter"></i></a>
                        <a href="mailto:<?=$email;?>" class="social-nav-btn" target="_blank"><i class="icon-mail"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="loader-overlay">
        <div class="loader">
            <div class="spinner"></div>
        </div>
    </div>

    <!-- Le javascript -->
    <!-- <script>
        var map_address = "<?=$address;?>";
        var map_city = "<?=$city;?>";
        var map_state = "<?=$state;?>";
        var map_zip = "<?=$zip;?>";
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKPpkzBL9pOukoEJDDNtzC37mh0JbVWXY&v=3.20&sensor=false&extension=.js"></script> -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/min/scripts-min.js"></script>

    <!-- Google Analytics -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-65974922-1', 'auto');
        ga('send', 'pageview');

    </script>

    <style type="text/css">
        .buttonbox { margin-top: 60px; }
        #reward-button { display: block; width: 172px; margin: 0 auto 0 auto; height: 60px; background: url('<?php echo get_template_directory_uri(); ?>/assets/img/rewardbtn.svg') center center no-repeat; background-size: contain; cursor: pointer;}
        #reward-button:hover { background: url('<?php echo get_template_directory_uri(); ?>/assets/img/rewardbtn-white.svg') center center no-repeat;}
    </style>

</body>
</html>
