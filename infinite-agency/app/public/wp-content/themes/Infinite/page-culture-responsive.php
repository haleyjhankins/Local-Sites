<?php
/*
Template Name: Culture Responsive
*/
?>
<?php get_header(); ?>

<script type="text/javascript">
  var index = 1,
  playlist = ['' + <?php echo get_template_directory_uri(); ?> + '/video/Culture.mp4', '' + <?php echo get_template_directory_uri(); ?> + '/video/Culture.mp4', '' + <?php echo get_template_directory_uri(); ?> + '/video/Culture.mp4'],
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
      $(".culture #top-section").css({'height':($(".culture #work-video").height()+'px')});
    },1500);
  });

  jQuery( window ).resize(function() {
    $(".culture #top-section").css({'height':($(".culture #work-video").height()+'px')});
  });
</script>

<script type="text/javascript">
  $(function() {
    $(".video").click(function(event) {

      var href = this.id;
      $("#iframe").attr("src", href);

    });
  });
</script>



<div id="content" class="culture">

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
      <source src="<?php echo get_template_directory_uri(); ?>/video/Culture.mp4" type="video/mp4">
        <source src="<?php echo get_template_directory_uri(); ?>/video/Firefox/Culture.ogg" type="video/ogg">
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



      <section class="two">
        <div class="row">
          <h1 class="white eames page-title text-center">5 Core Values</h1>
          <div class="twentyfive"></div>
          <div class="green-slashes text-center">
            <!--img src="/wp-content/uploads/the-infinite-agency-home-section3-top.jpg"-->
          </div>
          <div class="twentyfive"></div>
          <p class="white">In order to really get to know The Infinite Agency, you first have to know what we believe in. We have defined our beliefs in 5 core values. These values bind us together- as a company and as people. They are truly what we live by. You’ll see these values on the wall of our office and in the mind of every employee.</p>

          <p class="white">But we don’t just practice these words internally. Each core value reflects how we treat our relationship with every client. Our 5 core values clearly communicate how much we trust in each other, what you can expect in our work ethic, and how greatly we value people. We use this list to not only benefit you, but to also set expectations for ourselves.</p>
        </div>
      </section>




      <section class="three grey">
        <div class="row">
          <div class="large-12 columns text-center">
            <h2 class="white eames uppercase culture">learn more about our values</h2>
            <div class="twentyfive"></div>
          </div>
          <div class="video-gallery large-10 large-offset-1 left columns">
            <div class="video-player large-12 columns">
              <iframe id="iframe" src="//player.vimeo.com/video/78112674?title=0&amp;portrait=0&amp;color=a7c159" height="281" width="500" allowfullscreen="" frameborder="0"></iframe>
            </div>
            <div class="thumbnail-container large-12 columns">
              <div id="//player.vimeo.com/video/78112674?title=0&amp;portrait=0&amp;color=a7c159" class="video first-video">
                <div class="video-thumbnail-img hide-for-small">
                  <img class="video-thumbnail" alt="//player.vimeo.com/video/78112674?title=0&amp;portrait=0&amp;color=a7c159" src="/wp-content/uploads/purpose-duty.jpg">
                </div>
                <p class="white center uppercase"><strong>PURPOSE OVER DUTY</strong></p>
              </div>
              <div id="//player.vimeo.com/video/78112675?title=0&amp;portrait=0&amp;color=a7c159" class="video">
                <div class="video-thumbnail-img hide-for-small">
                  <img class="video-thumbnail" alt="//player.vimeo.com/video/78112675?title=0&amp;portrait=0&amp;color=a7c159" src="/wp-content/uploads/people-products.jpg">
                </div>
                <p class="white center uppercase"><strong>PEOPLE OVER PRODUCTS</strong></p>
              </div>
              <div id="//player.vimeo.com/video/78112948?title=0&amp;portrait=0&amp;color=a7c159" class="video">
                <div class="video-thumbnail-img hide-for-small">
                  <img class="video-thumbnail" alt="//player.vimeo.com/video/78112948?title=0&amp;portrait=0&amp;color=a7c159" src="/wp-content/uploads/trust-control.jpg">
                </div>
                <p class="white center uppercase"><strong>TRUST OVER CONTROL</strong></p>
              </div>
              <div id="//player.vimeo.com/video/78112947?title=0&amp;portrait=0&amp;color=a7c159" class="video">
                <div class="video-thumbnail-img hide-for-small">
                  <img class="video-thumbnail" alt="//player.vimeo.com/video/78112947?title=0&amp;portrait=0&amp;color=a7c159" src="/wp-content/uploads/potential-pride.jpg">
                </div>
                <p class="white center uppercase"><strong>POTENTIAL OVER PRIDE</strong></p>
              </div>
              <div id="//player.vimeo.com/video/78112950?title=0&amp;portrait=0&amp;color=a7c159" class="video last-video">
                <div class="video-thumbnail-img hide-for-small">
                  <img class="video-thumbnail" alt="//player.vimeo.com/video/78112950?title=0&amp;portrait=0&amp;color=a7c159" src="/wp-content/uploads/strength-weakness.jpg">
                </div>
                <p class="white center uppercase"><strong>STRENGTH OVER WEAKNESS</strong></p>
              </div>
            </div>
          </div>
        </div>
      </section>




      <section class="four green-container">
        <div class="green-content-container">
          <div class="row">
            <div class="green-bg">
              <div class="twentyfive"></div>
              <h3 class="white eames uppercase text-center">Some flowery praise from our clients</h3>
              <div class="twentyfive"></div>
              <div class="slidergroup"><section class="slider">
                <div class="outer">
                  <div class="inner">
                    <p class="large-10 large-offset-1 text-justify eames lowercase white quote-text-green">
                      With the help of The Infinite Agency, our social media numbers have increased exponentially!
                      They have exceeded our expectations with each campaign and we have reached our stretch milestones.
                      We look forward to working with them and reaching the next level of success.</p>
                      <p class="large-11 text-right green-quote white uppercase"><strong>michelle davis</strong>, shops at park lane</p>
                    </div>
                  </div>
                </section>
                <section class="slider">
                  <div class="outer">
                    <div class="inner">
                      <p class="large-10 large-offset-1 text-justify eames lowercase white quote-text-green">
                        It has been refreshing to work with The Infinite Agency. We’ve always been able to count on them. From concept to product implementation, they’ve shown reliability and impressive creative talent. From the very beginning, they’ve delivered on time and on budget. We couldn’t be happier.</p>
                        <p class="large-11 text-right green-quote white uppercase"><strong>Peter Linke- CEO</strong>, Hothead Technologies</p>
                      </div>
                    </div>
                  </section>
                  <section class="slider">
                    <div class="outer">
                      <div class="inner">
                        <p class="large-10 large-offset-1 text-justify eames lowercase white quote-text-green">
                          The Infinite Agency has helped us build our brand from the very beginning. From building our website, to creating signs, logos, apparel, and so much more. They get us everything we need in a timely matter, even when we ask for things last minute. They've really taken the effort to feel out The PilatesBarre culture. They even came to take a group class!</p>
                          <p class="large-11 text-right green-quote white uppercase"><strong>Meghann O'Leary- Co-Founder</strong>, The PilatesBarre</p>
                        </div>
                      </div>
                    </section></div>
                    <div class="twentyfive"></div>
                    <?php //echo get_new_royalslider(2); ?>
                  </div>
                </div>
              </div>
            </section>





            <section class="five">
              <div class="row">
                <div class="culture-profile">

                </div>

              </div>
              <div class="profile-id-box right">
                    <h3>Jonathan Ogle</h3>
                    <h4>Creative Director</h4>
                    <p>We frequently find ourselves asking, “What Would Jonathan Do?” As the architect of purpose, Jonathan’s leadership guides both our clients and our agency towards resounding success. After seeing Jonathan’s mind work, you might switch from asking “Why?” to saying “Whoa.”</p>
                    <div class="social-id">
                      <a href="http://www.twitter.com/jonathanogle" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-twitter.png"></a>
                    </div>
                    <div class="social-id">
                      <a href="http://www.instagram.com/jonathanogle" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-instagram.png"></a>
                    </div>
                  </div>
            </section>










            <section class="six">
              <div class="row">
                <div class="culture-profile">
                  <div class="profile-id-box right">
                    <h3>Flip Croft Caderao</h3>
                    <h4>Interactive Director</h4>
                    <p>Flip is a friend to all, enemy to none, and a leader of many. His energy inspires, his dedication astounds, and his laugh is infectious. He uses his natural “interactive” abilities to make The Infinite Agency the envy of other agencies across the globe.</p>
                    <div class="social-id">
                      <a href="http://www.twitter.com/fcroftcaderao" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-twitter.png"></a>
                    </div>
                    <div class="social-id">
                      <a href="http://www.instagram.com/flipcroftcaderao" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-instagram.png"></a>
                    </div>
                  </div>
                </div>
              </div>
            </section>





            <section class="seven">
              <div class="row">
                <div class="culture-profile">
                  <div class="profile-id-box right">
                    <h3>Don Pelham</h3>
                    <h4>Business Development Director</h4>
                    <p>Don will always be the coolest guy in the room, but he will always treat you like you are. Drawing from his incredible sense of business finesse, charm, and extensive life experience, his main priority is our clients’ best interests. We all want to be Don when we turn 27.</p>
                    <div class="social-id">
                      <a href="http://www.twitter.com/socialDPA" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-twitter.png"></a>
                    </div>
                    <div class="social-id">
                      <a href="http://www.instagram.com/DApelham" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-instagram.png"></a>
                    </div>
                  </div>
                </div>
              </div>
            </section>


            <section class="eight">
              <div class="row">
                <div class="culture-profile">
                  <div class="profile-id-box right">
                    <h3>Steve Wade</h3>
                    <h4>Director of Operations</h4>
                    <p>If we were on the USS Enterprise, Steve Wade would be “Scotty.” As the engineer of your marketing strategy, he drives lead-generating website traffic. With Steve’s expertise, we’ll kick it to Warp Speed and take your business to places no man has gone before!</p>
                    <div class="social-id">
                      <a href="http://www.facebook.com/smwade" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-facebook.png"></a>
                    </div>
                    <div class="social-id">
                      <a href="http://www.instagram.com/steveMwade" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-instagram.png"></a></div>
                  </div>
                </div>
              </div>
            </section>



            <section class="nine">
              <div class="row">
                <div class="culture-profile">
                  <div class="profile-id-box right">
                    <h3>ALEX PELHAM</h3>
                    <h4>PRODUCTION MANAGER</h4>
                    <p>Alex manages the production team like she manages her children- there seems to be a lot of them, they‘re all happy and healthy, and she’s just as patient as she is firm with them. Alex keeps her team motivated and safe from walking onto the highway at night.</p>
                    <div class="social-id">
                      <a href="http://www.twitter.com/stswaim" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-twitter.png"></a>
                    </div>
                    <div class="social-id">
                      <a href="http://www.instagram.com/stswaim" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-instagram.png"></a>
                    </div>
                  </div>
                </div>
              </div>
            </section>





            <section class="ten">
              <div class="row">
                <div class="culture-profile">
                  <div class="profile-id-box right">
                    <h3>ALLY HARDGRAVE</h3>
                    <h4>ACCOUNT MANAGER</h4>
                    <p>Ally may drive a truck and like guns, but she brings the lightest touch to every account. Bringing finesse and detailed focus to the relationships she cultivates, you might find yourself yelling “Yeehaaawww!” every time you see her.</p>
                    <div class="social-id">
                      <a href="http://www.facebook.com/smwade" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-facebook.png"></a>
                    </div>
                    <div class="social-id">
                      <a href="http://www.instagram.com/steveMwade" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-instagram.png"></a>
                    </div>
                  </div>
                </div>
              </div>
            </section>







            <section class="eleven">
              <div class="row">
                <div class="culture-profile">
                  <div class="profile-id-box right">
                    <h3>ALISA HOVLAND</h3>
                    <h4>ACCOUNT MANAGER</h4>
                    <p>Alisa is always two steps ahead of you but she still manages to watch your back. Very much like a ninja, Alisa has stealth, accuracy, and a death grip. It’s a good thing she’s fighting on your side.</p>
                    <div class="social-id">
                      <a href="http://www.twitter.com/joshuafortuna" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-twitter.png"></a>
                    </div>
                    <div class="social-id">
                      <a href="http://www.instagram.com/joshuafortuna" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-instagram.png"></a>
                    </div>
                    <div class="social-id">
                      <a href="http://www.dribbble.com/joshuafortuna" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-dribbble.png"></a>
                    </div>
                  </div>
                </div>
              </div>
            </section>







            <section class="twelve">
              <div class="row">
                <div class="culture-profile">
                  <div class="profile-id-box right">
                    <h3>ALLISON SOSEBEE</h3>
                    <h4>PRODUCTION ARTIST</h4>
                    <p>Allison deserves a ton of compliments, even though she is always handing them out. Her creative eye and hand lettering skills will earn your company a ton of praise, so we’ll just tell her “Great job Allison!” on your behalf.</p>
                    <div class="social-id"><a href="https://www.facebook.com/ricostudios" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-facebook.png"></a></div>
                    <div class="social-id"><a href="http://www.twitter.com/ricostudios" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-twitter.png"></a></div>
                    <div class="social-id"><a href="http://www.instagram.com/ricostudios" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-instagram.png"></a></div>
                    <div class="social-id"><a href="http://ricostudios.vsco.co" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-vsco.png"></a></div>
                    <div class="social-id"><a href="http://www.flickr.com/photos/ricostudios/" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-flickr.png"></a></div>
                  </div>
                </div>
              </div>
            </section>







            <section class="thirteen">
              <div class="row">
                <div class="culture-profile">
                  <div class="profile-id-box right">
                    <h3>CLAUDIA MOGLOVKIN</h3>
                    <h4>ACCOUNTING</h4>
                    <p>Claudia helps us sleep better at night. As the organizer of our finances and tax lingo we will never understand, we can go back to getting our 5 hours of sleep.</p>
                    <div class="social-id"><a href="http://www.twitter.com/jordanogle" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-twitter.png"></a></div>
                    <div class="social-id"><a href="http://www.instagram.com/jordanjamesogle" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-instagram.png"></a></div>
                  </div>
                </div>
              </div>
            </section>






            <section class="fourteen">
              <div class="row">
                <div class="culture-profile">
                  <div class="profile-id-box right">
                    <h3>DANIELLE CODY</h3>
                    <h4>OPERATIONS ADMINISTRATOR</h4>
                    <p>If our agency was a night club, Danielle would be the party coordinator. She would be there to make sure every DJ is booked and the bar is fully stocked. But you’ll always find her raising the roof on the dance floor with a big smile on her face.</p>
                    <div class="social-id"><a href="http://www.instagram.com/TMoneyMcC" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-instagram.png"></a></div>
                  </div>
                </div>
              </div>
            </section>




            <section class="fifteen">
              <div class="row">
                <div class="culture-profile">
                  <div class="profile-id-box right">
                    <h3>JASON CHANNELL</h3>
                    <h4>DIGITAL MARKETING MANAGER</h4>
                    <p>If your brand was a motorcycle, Jason would help you ride faster and get more adoring looks on the road. As an expert of strategy, research and implementation for SEO and PPC — you and Jason will be zipping by the competition. (We provide free helmets.)</p>
                    <div class="social-id"><a href="https://www.facebook.com/stockcharacter" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-facebook.png"></a></div>
                    <div class="social-id"><a href="http://www.twitter.com/stockcharacter" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-twitter.png"></a></div>
                    <div class="social-id"><a href="http://www.instagram.com/thestockcharacter" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-instagram.png"></a></div>
                  </div>
                </div>
              </div>
            </section>




            <section class="twentysix">
              <div class="row">
                <div class="culture-profile">
                  <div class="profile-id-box right">
                    <h3>JB EVERETT</h3>
                    <h4>JR. DEVELOPER</h4>
                    <p>If JB were a character in a video game, he would probably wield a magical axe. Slicing through code with ease, he will cast an irreversible Trinity Force Gauntlet Spell, giving your front-end development and SEO the power to reign supreme, with no cheat code required.</p>
                    <div class="social-id"><a href="http://www.instagram.com/_jessicachen" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-instagram.png"></a></div>
                  </div>
                </div>
              </div>
            </section>






            <section class="sixteen">
              <div class="row">
                <div class="culture-profile">
                  <div class="profile-id-box right">
                    <h3>JENNA ROME</h3>
                    <h4>ACCOUNT MANAGER</h4>
                    <p>Jenna’s account management skills are pitch perfect. Her impressive range will help your company sustain the perfect note. She creates the perfect harmony for your company and when she opens her mouth, it’s hard not to listen. She is a true superstar, so get used to standing ovations.</p>
                    <div class="social-id"><a href="http://www.twitter.com/drinkdallas" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-twitter.png"></a></div>
                    <div class="social-id"><a href="http://www.instagram.com/susiedrinksdallas" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-instagram.png"></a></div>
                  </div>
                </div>
              </div>
            </section>




            <section class="seventeen">
              <div class="row">
                <div class="culture-profile">
                  <div class="profile-id-box right">
                    <h3>JENNIFER ADELL</h3>
                    <h4>ACCOUNTING</h4>
                    <p>Jennifer is vital to the Infinite fabric. Weaving her way through invoices and finance, she is the thread to the warm, comforting blanket that is our company.</p>
                    <div class="social-id"><a href="https://www.facebook.com/nzurek" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-facebook.png"></a></div>
                    <div class="social-id"><a href="http://www.twitter.com/nancizurek" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-twitter.png"></a></div>
                    <div class="social-id"><a href="http://www.instagram.com/nancizurek" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-instagram.png"></a></div>
                  </div>
                </div>
              </div>
            </section>












            <section class="eighteen">
              <div class="row">
                <div class="culture-profile">
                  <div class="profile-id-box right">
                    <h3>JESSICA CHEN</h3>
                    <h4>ART DIRECTOR</h4>
                    <p>Jessica will amaze and astound. She brings design work to such a whole new level, we all have to pay every time we glance at her work. The tab is currently at $4,963.22.</p>
                    <div class="social-id"><a href="http://www.twitter.com/jaymesdowner" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-twitter.png"></a></div>
                    <div class="social-id"><a href="http://www.instagram.com/jaymesdowner" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-instagram.png"></a></div>
                    <div class="social-id"><a href="http://www.github.com/jaymesdowner" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-github.png"></a></div>
                    <div class="social-id"><a href="http://www.codepen.io/jaymesdowner" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-codepen.png"></a></div>
                  </div>
                </div>
              </div>
            </section>





            <section class="nineteen">
              <div class="row">
                <div class="culture-profile">
                  <div class="profile-id-box right">
                    <h3>KEVIN CRAFT</h3>
                    <h4>ART DIRECTOR</h4>
                    <p>Kevin was born with the superpower of breathing fire. We’re not saying he is a dragon, but stories have been passed down about how rare his creative talents are. As the legend grows, so does his art direction. Just try not to jump on his back.</p>
                    <div class="social-id"><a href="http://www.twitter.com/colinhoweth" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-twitter.png"></a></div>
                    <div class="social-id"><a href="http://www.instagram.com/cbhoweth" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-instagram.png"></a></div>
                    <div class="social-id"><a href="http://www.github.com/cbhoweth" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-github.png"></a></div>
                    <div class="social-id"><a href="http://www.codepen.io/cbhoweth" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-codepen.png"></a></div>
                  </div>
                </div>
              </div>
            </section>






            <section class="twenty">
              <div class="row">
                <div class="culture-profile">
                  <div class="profile-id-box right">
                    <h3>MADELINE HAYS</h3>
                    <h4>SOCIAL MEDIA MANAGER</h4>
                    <p>Madeline Hays is like a tour guide. She is adventurous, she’ll never lead you astray and she is always taking stunning photos. Follow her lead as she helps you avoid rocky terrain while telling a really great story along the way.</p>
                    <div class="social-id"><a href="http://www.instagram.com/warnerway" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-instagram.png"></a></div>
                  </div>
                </div>
              </div>
            </section>




            <section class="twentyone">
              <div class="row">
                <div class="culture-profile">
                  <div class="profile-id-box right">
                    <h3>MORGAN MCKENZIE</h3>
                    <h4>ACCOUNT MANAGER</h4>
                    <p>Morgan lights up every room with her sunshiny disposition. Committed to cultivating every relationship to fruition, no detail goes unnoticed with Morgan. This Georgia peach is sweet, and she will bring health into your account year-round.</p>
                    <div class="social-id"><a href="http://www.instagram.com/alexxpel" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-instagram.png"></a></div>
                  </div>
                </div>
              </div>
            </section>





            <<section class="twentytwo">
              <div class="row">
                <div class="culture-profile">
                  <div class="profile-id-box right">
                    <h3>NANCI ZUREK</h3>
                    <h4>COPYWRITER</h4>
                    <p>Nanci quietly makes everyone’s work look better. With her skills in writing and creativity, Nanci gives voice and personality to clients’ brands. And sometimes those voices speak back to her.</p>
                <div class="social-id"><a href="http://www.facebook.com" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-facebook.png"></a></div>
                <div class="social-id"><a href="http://www.twitter.com" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-twitter.png"></a></div>
                <div class="social-id"><a href="http://www.instagram.com" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-instagram.png"></a></div>
                            </div>
            </div>
          </div>
        </section>





        <section class="twentythree">
          <div class="row">
            <div class="culture-profile">
              <div class="profile-id-box right">
                <h3>NEIL HAYES</h3>
                <h4>BUSINESS DEVELOPMENT</h4>
                <p>Just take one look at Neil, and you’ll know why he’s in charge of whipping our new business into shape. Neil hiked the Appalachian Trail when he was 16, and now he is helping Infinite blaze new trails into the future!</p>
                <div class="social-id"><a href="http://www.facebook.com" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-facebook.png"></a></div>
                <div class="social-id"><a href="http://www.instagram.com" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-instagram.png"></a></div>
              </div>
            </div>
          </div>
        </section>




        <section class="twentyfour">
          <div class="row">
            <div class="culture-profile">
              <div class="profile-id-box right">
                <h3>RICO DELEON</h3>
                <h4>CONTENT CURATOR</h4>
                <p>Rico is The Infinite Agency’s very own creative socialite (on and off the clock). Bringing his skills of art direction, photography and social innovation, Rico gives our clients brilliant ideas that resound throughout every medium.</p>
                <div class="social-id"><a href="http://www.twitter.com/El_Fenix" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-twitter.png"></a></div>
                <div class="social-id"><a href="http://www.instagram.com/GTARZAN81" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-instagram.png"></a></div>
              </div>
            </div>
          </div>
        </section>




        <section class="twentyfive">
          <div class="row">
            <div class="culture-profile">
              <div class="profile-id-box right">
                <h3>STEVE SWAIM</h3>
                <h4>SENIOR ACCOUNT MANAGER</h4>
                <p>Every team needs an assistant football coach, running drills, drawing up plays and making sure that everything inside and out of the organization runs smoothly. And for The Infinite Agency, that’s Steve Swaim. We just wish he’d stop making everyone run laps.</p>
                <div class="social-id"><a href="http://www.facebook.com/claudia.moglovkin" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-facebook.png"></a></div>
                <div class="social-id"><a href="http://www.twitter.com/Cmoglovkin" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-twitter.png"></a></div>
                <div class="social-id"><a href="http://www.instagram.com/Cmoglovkin" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-instagram.png"></a></div>
              </div>
            </div>
          </div>
        </section>





        <section class="twentysix">
          <div class="row">
            <div class="culture-profile">
              <div class="profile-id-box right">
                <h3>SUSIE O</h3>
                <h4>SOCIAL MEDIA DIRECTOR</h4>
                <p>Without Susie, the entire social media universe would crumble. The Queen of everything bourbon, cupcakes, and hashtags, Susie strongly believes that “social media is not a fad … it’s the new way that business is done.” Cheers, Susie.</p>
              </div>
            </div>
          </div>
        </section>


        <section class="twentyseven">
          <div class="row">
            <div class="culture-profile">
              <div class="profile-id-box right">
                <h3>TAYLOR KRAFT</h3>
                <h4>SOCIAL MEDIA MANAGER</h4>
                <p>Taylor is so committed to her job, she continues to do hardcore “social research” when she leaves the office. Either rapping every word to a song or learning the latest trending dance move, you will never have to experience FOMO with Taylor’s work.</p>
                <div class="social-id">
                  <a href="http://www.twitter.com/captainplanetfd" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-twitter.png"></a>
                </div>
              </div>
            </div>
          </div>
        </section>






        <section class="twentyeight">
          <div class="row">
            <div class="culture-profile">
              <div class="profile-id-box right">
                <h3>TIM MCCARTHY</h3>
                <h4>CHIEF STORYTELLER</h4>
                <p>Tim is the pencil and vocal cords of The Infinite Agency. Bringing his skills of wordsmithery, acting talent and media producing of all types, Tim gives our clients an immediate edge. Well, that and his smile.</p>
                <div class="social-id">
                  <a href="http://www.twitter.com/captainplanetfd" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-twitter.png"></a>
                </div>
              </div>
            </div>
          </div>
        </section>





                <section class="twentynine">
          <div class="row">
            <div class="culture-profile">
              <div class="profile-id-box right">
                <h3>TRACI PENN</h3>
                <h4>GRAPHIC DESIGNER</h4>
                <p>Traci may be soft spoken, but she makes a lot of noise with her creative work. She will turn up the level of quality for every project she touches and just like your favorite song, you can’t wait to turn it up and experience it over and over again.</p>
                <div class="social-id">
                  <a href="http://www.twitter.com/captainplanetfd" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-twitter.png"></a>
                </div>
              </div>
            </div>
          </div>
        </section>






                <section class="thirty">
          <div class="row">
            <div class="culture-profile">
              <div class="profile-id-box right">
                <h3>TYLER ACKELBEIN</h3>
                <h4>ART DIRECTOR</h4>
                <p>Tyler is one rad designer. His hella creative skill set is gnarlier than the freshest of kale and his art direction is sicker than catching tight bay waves with his dope crew. He is from Northern California.</p>
                <div class="social-id">
                  <a href="http://www.twitter.com/captainplanetfd" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-twitter.png"></a>
                </div>
              </div>
            </div>
          </div>
        </section>






                <section class="thirtyone">
          <div class="row">
            <div class="culture-profile">
              <div class="profile-id-box right">
                <h3>WIL HELSER</h3>
                <h4>DEVELOPER</h4>
                <p>Wil is the muscle behind the agency. Not only because of his impressive physical stature, but because of the way he knocks out code with incredible ease. Wil will lift your project to a whole new level, and you’ll both look good in the meantime.</p>
                <div class="social-id">
                  <a href="http://www.twitter.com/captainplanetfd" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-twitter.png"></a>
                </div>
              </div>
            </div>
          </div>
        </section>




                <section class="thirtytwo">
          <div class="row">
            <div class="culture-profile">
              <div class="profile-id-box right">
                <h3>WILLIAM MERKEL</h3>
                <h4>LEAD PRODUCTION DESIGNER</h4>
                <p>William is a jack-of-all-trades, master of… well, everything. As the agency’s Swiss Army knife of skills, you can rest assured that William will bring a variety of things to your account- speed, efficiency and those tiny scissors you’ll never use.</p>
                <div class="social-id">
                  <a href="http://www.twitter.com/captainplanetfd" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-twitter.png"></a>
                </div>
              </div>
            </div>
          </div>
        </section>




           <!--     <section class="thirtythree">
          <div class="row">
            <div class="culture-profile">
              <div class="profile-id-box right">
                <h3>Captain Planet</h3>
                <h4>Environmental Protection Director</h4>
                <p>After a great career in the 90's cartoon industry, Captain found himself needing a steady income for Mrs. Planet and the boys. Captain can be found roaming the office late at night taking pollution down to zero. 'The power is yours!!!'</p>
                <div class="social-id">
                  <a href="http://www.twitter.com/captainplanetfd" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-twitter.png"></a>
                </div>
              </div>
            </div>
          </div>
        </section>-->




            <!--    <section class="thirtyfour">
          <div class="row">
            <div class="culture-profile">
              <div class="profile-id-box right">
                <h3>Captain Planet</h3>
                <h4>Environmental Protection Director</h4>
                <p>After a great career in the 90's cartoon industry, Captain found himself needing a steady income for Mrs. Planet and the boys. Captain can be found roaming the office late at night taking pollution down to zero. 'The power is yours!!!'</p>
                <div class="social-id">
                  <a href="http://www.twitter.com/captainplanetfd" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-twitter.png"></a>
                </div>
              </div>
            </div>
          </div>
        </section> -->



           <!--     <section class="thirtyfive">
          <div class="row">
            <div class="culture-profile">
              <div class="profile-id-box right">
                <h3>Captain Planet</h3>
                <h4>Environmental Protection Director</h4>
                <p>After a great career in the 90's cartoon industry, Captain found himself needing a steady income for Mrs. Planet and the boys. Captain can be found roaming the office late at night taking pollution down to zero. 'The power is yours!!!'</p>
                <div class="social-id">
                  <a href="http://www.twitter.com/captainplanetfd" target="_blank"><img alt="" src="/wp-content/themes/Infinite/img/social-twitter.png"></a>
                </div>
              </div>
            </div>
          </div>
        </section> -->

<!--        <section class="twentyfour">
          <div class="row">
            <div class="culture-profile">
              <div class="profile-id-box right">
                <h3>You Can Be Next</h3>
                <h4>Creative</h4>
              </div>
            </div>
          </div>
        </section>
      -->

  <!--script type="text/javascript">
    $(function() {
      $("img.video-thumbnail").click(function(event) {

        var href = this.alt;
        $("#iframe").attr("src", href);

      });
    });
  </script-->
<!--
  <script>
    $.fn.rotate = function(){
      return this.each(function() {

        /* Cache element's children */
        var $children = $(this).children();

        /* Current element to display */
        var position = -1;

        /* IIFE */
        !function loop() {

        /* Get next element's position.
         * Restarting from first children after the last one.
         */
         position = (position + 1) % $children.length;

         /* Fade element */
         $children.eq(position).fadeIn(1000).delay(5000).fadeOut(1000, loop);
     }();
 });
    };

    $(function(){
      $(".slider").hide();
      $(".slidergroup").rotate();
    });
  </script>-->

  <?php get_footer(); ?>