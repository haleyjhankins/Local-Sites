<?php
/*
Template Name: Hosting
*/
?>
<?php get_header(); ?>

<script type="text/javascript">
  var index = 1,
  playlist = ['' + <?php echo get_template_directory_uri(); ?> + '/video/Services.mp4', '' + <?php echo get_template_directory_uri(); ?> + '/video/Services.mp4', '' + <?php echo get_template_directory_uri(); ?> + '/video/Services.mp4'],
  video = document.getElementById('work-video');

  video.addEventListener('ended', rotate_video, false);

  function rotate_video() {
    video.setAttribute('src', playlist[index]);
    video.load();
    index++;
    if (index >= playlist.length) { index = 0; }
  }
</script>

<script type="text/javascript">
  jQuery( document ).ready(function() {
    setTimeout(function() {
      $(".services #top-section").css({'height':($(".services #work-video").height()+'px')});
    },1000);
  });

  jQuery( window ).resize(function() {

    $(".services #top-section").css({'height':($(".services #work-video").height()+'px')});

  });
</script>

<style>
  .no-margin-bottom {
    margin-bottom: 0;
  }
  a.button, a.button:hover {
    color: #FFF !important;
  }
  .open {
    left: 50%;
  }
  .pricing-table {
    margin-bottom: 5px;
  }
</style>



<div id="content" class="services">

  <?php if ( has_post_thumbnail() ) {
    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
    $bg_image = $thumb['0'];
  } ?>

  <section id="top-section" class="hide-for-desktop show-for-touch" style="background: url(<?php echo $bg_image ?>) no-repeat center !important; background-size: 100% !important; height:150px !important;">
    <div class="outer">
      <div class="inner">
        <div class="row">
          <div class="large-12">
            <h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="top-section" class="hide-for-touch">
    <video id="work-video" autoplay loop >
      <source src="<?php echo get_template_directory_uri(); ?>/video/Services.mp4" type="video/mp4">
        <source src="<?php echo get_template_directory_uri(); ?>/video/Firefox/Services.ogg" type="video/ogg">
          Your browser does not support the video tag.
        </video>
        <div class="outer">
          <div class="inner">
            <div class="row">
              <div class="large-12">
                <h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="three">
        <div class="row">
          <div class="large-12 columns twentyfive"></div>

          <div class="large-12 columns">

            <p class="video-sub">We are happy to announce that we are upgrading our hosting solution. This upgrade means increased security, stability, support and speed to our clients. By September 1, 2014 we plan to have this upgrade completed. To continue hosting with us, please sign up below.</p>

          </div>
          <div class="large-4 columns">
            <ul class="pricing-table">
              <li class="title">Website Hosting</li>
              <li class="price">$50/month</li>
              <li class="bullet-item">Daily Site Backups</li>
              <li class="bullet-item">Security Scans</li>
              <li class="bullet-item">Live Support</li>
              <li class="cta-button"><a class="button" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=NTWVQD6QTHGJN" class="white" target="_blank">Renew Hosting</a></li>
            </ul>
            <div class="large-3 medium-3 small-3">
            <img src="/wp-content/themes/Infinite/images/paypal.jpg" alt="">
            </div>
            <p><a href="#" data-reveal-id="myModal">*View full list of features</a></p>
          </div>

          <div class="large-7 large-offset-1 columns">
            <p class="no-margin-bottom"><b>Assisted Site Transfer</b></p>
            <p>If you do not want to renew your website hosting package with The Infinite Agency, we would be happy to package your site files up and load them on your new hosting server. This service is $300, unless you have multiple websites. Email <a href="mailto:hosting@theinfiniteagency.com">hosting@theinfiniteagency.com</a> for special pricing.</p>
            <a class="button" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=VYVMB3XCY2NXQ" class="white right" target="_blank">Buy Now</a>
            <p class="no-margin-bottom"><b>Unssisted Site Transfer</b></p>
            <p>If you do not want to renew your website hosting package with The Infinite Agency, and do not need assistance setting up your site on your new hosting plan, we would be happy to package up your site files and deliver them to you at no cost.</p>
            <a class="button" href="mailto:hosting@theinfiniteagency.com?subject=Please Send Me My Website Files." class="white right">Get My Site</a>
          </div>
        </div>
      </section>

      <section class="four">
        <div class="clear-bottom"></div>
        <div class="outer">
          <div class="inner">
            <div class="row">
              <a href="/work/shamoun-norman/">
                <div class="large-12 columns text-right">
                  <h1 class="white">I love the support I get from<br />The Infinite Agency!<br />- Client</h1>
                </div>
              </a>
            </div>
          </div>
        </div>
      </section>

      <div id="myModal" class="reveal-modal" data-reveal>
        <h1>Hosting Features</h1>
        <ul>
          <li>Updates - Plugin & Wordpress Core Updates</li>
          <li>Backup Core Files - WP Core, Database, Plugins & Themes are securely backed up to an Off Site Cloud Storage System</li>
          <li>Backup Stored Archives - Number of backup snapshot archive files saved on our Off Site Cloud Storage System.</li>
          <li>Backup Media Files - All your media uploads are securely backed up to an Off Site Cloud Storage System</li>
          <li>SPAM & Revisions Cleanup - We will actively purge all comments marked as spam and all Post & Page revisions.</li>
          <li>Database Optimization - We will perform a database optimization procedure at the time of backup.</li>
          <li>Security Scan - We will perform a Security Scan testing for Blacklisting, Malware, Malicious javascript, Malicious iFrames, Drive-by Downloads, Anomaly detection, IE-only attacks, Suspicious redirects & Spam </li>
          <li>Clone or Migrate Website - We will clone or migrate any of your existing WP Instances to any compatible host.</li>
          <li>Uptime Monitoring & Performance Scans - We will perform performance scans of your website, assign a grade and provide feedback for improvement consideration.</li>
          <li>Email Support - All plans come with unlimited email support.</li>
          <li>We provide you with a dedicated managed hosting service in which we monitor your server for security issues, isolate your sites files to ensure no other client we have in our system leaves you vulnerable, and offer 24/7 phone support if you should have a question about your hosting.</li>
        </ul>

        <h2>Understanding Security</h2>
        <p>When it comes to securing WordPress, it's best to start from the ground up. This idea is what is behind our process. Your hosting account is segmented so that if any site on a server is hacked, there's not a chance for your site to be  left  vulnerable. We also ensure the following is preformed:</p>
        <ul>
          <li>Run secure, stable versions of your web server and any software on your server.</li>
          <li>Have a server-level firewall.</li>
          <li>Keep your server under lock and key. Only your IT team have access.</li>
          <li>Never, ever access your server from an unsecure network.</li>
          <li>If you need to FTP in, use SFTP via a reputable program (I like Cyberduck).</li>
          <li>Make sure your MySQL installation is as secure as possible.</li>
          <li>Always create a unique database for each blog installation, and make sure your database table DOES NOT begin with wp_.</li>
          <li>Backup your database and other files as often as possible, especially right before you make a change (there are plenty of options for this, such as CodeGuard and VaultPress).</li>
          <li>And, of course, make sure your passwords are both complex and not used elsewhere.</li>
        </ul>
        <a class="close-reveal-modal">&#215;</a>
      </div>

      <div id="renewModal" class="reveal-modal" data-reveal>
        <h1>Renew Hosting</h1>

        <a class="close-reveal-modal">&#215;</a>
      </div>

      <div id="buyModal" class="reveal-modal" data-reveal>
        <h1>Buy Hosting</h1>

        <a class="close-reveal-modal">&#215;</a>
      </div>

      <div id="getModal" class="reveal-modal" data-reveal>
        <h1>Get My Site</h1>

        <a class="close-reveal-modal">&#215;</a>
      </div>

    </div>

    <?php get_footer(); ?>