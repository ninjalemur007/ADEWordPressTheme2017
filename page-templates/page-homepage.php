<?php

/*
 * Template Name: ADE Homepage
 * Description: Full custom homepage template
 */

?>

<!-- Call HEADER -->
<?php get_header(); ?>

<!-- Site Content begins -->
<div id="content" class="col-xs-12" aria-labelledby="page_title" >
  <main id="main" class="site-main" role="main">

    <!-- LEFTWRAP -->
    <div id="leftwrap" class="col-xs-12 col-md-8">
      <?php echo do_shortcode("[ade-homepage-widgets-features]"); ?>
    </div>

    <!-- RIGHTWRAP -->
    <div id="rightwrap" class="col-xs-12 col-md-4">
      <section id="ade-home-headlines" class="col-xs-6 col-md-12" aria-labelledby="headlinestitle">
        <?php echo do_shortcode("[ade-homepage-widgets-headlines]"); ?>
      </section>
      <section id="ade-home-announcements-widget" class="col-xs-6 col-md-12" aria-labelledby="announcementsslidertitle">
          <h2 id="announcementsslidertitle" class="screen-reader-text">Announcements</h2>
        <?php echo do_shortcode("[ade-homepage-widgets-announcements]"); ?>
      </section>
    </div>

    <!-- MIDDLEWRAP -->
    <div id="middlewrap" class="col-xs-12">

          <?php echo do_shortcode("[ade-homepage-widgets-message]"); ?>


      <section id="ade-home-quicklinks" class="col-xs-12" aria-labelledby="quicklinkstitle">
        <h2 id="quicklinkstitle" class="screen-reader-text">Quick Links</h2>
          <?php echo do_shortcode("[ade-homepage-widgets-quicklinks]"); ?>
      </section>

    </div>

    <!-- BLOGWRAP -->
    <section id="ade-home-blogwrap" class="col-xs-12 col-md-8" aria-labelledby="blogcornertitle">
      <h2 id="blogcornertitle" class="screen-reader-text">Blog Corner</h2>
      <article id="ade-home-box1" class="box-widget-wrap col-xs-6" aria-labelledby="banner-1">
        <?php echo do_shortcode("[ade-homepage-widgets-box box='1']"); ?>
      </article>
      <article id="ade-home-box2" class="box-widget-wrap col-xs-6" aria-labelledby="banner-2">
        <?php echo do_shortcode("[ade-homepage-widgets-box box='2']"); ?>
      </article>
      <article id="ade-home-box3" class="box-widget-wrap col-xs-6" aria-labelledby="banner-3">
        <?php echo do_shortcode("[ade-homepage-widgets-box box='3']"); ?>
      </article>
      <article id="ade-home-box4" class="box-widget-wrap col-xs-6" aria-labelledby="banner-4">
        <?php echo do_shortcode("[ade-homepage-widgets-box box='4']"); ?>
      </article>
    </section>

    <!-- SOCIALBOXWRAP -->
    <div id="ade-home-socialboxwrap" class="col-xs-12 col-md-4">
      <div id="socialtop">
        <div id="facebookwrap"  class="socialbox">
          <div class="fb-page"
            data-href="https://www.facebook.com/AZDeptofEducation"
            data-tabs="timeline"
            data-small-header="true"
            data-adapt-container-width="true"
            data-hide-cover="true"
            data-show-facepile="false"
            data-height="350" >
              <blockquote cite="https://www.facebook.com/AZDeptofEducation" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/AZDeptofEducation">Arizona Department of Education</a></blockquote>
          </div>
        </div>
      </div>
      <div id="socialbottom">
        <div id="twitterwrap" class="socialbox">
           <div class="socialfollow">
             <a href="https://twitter.com/azedschools" class="twitter-follow-button" data-show-count="false">Follow @azedschools</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
             <a href="https://twitter.com/intent/tweet?screen_name=azedschools" class="twitter-mention-button" data-dnt="true" data-show-count="false">Tweet to @azedschools</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
           </div>
            <a class="twitter-timeline" data-width="400" data-height="300" href="https://twitter.com/azedschools">Tweets by azedschools</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
      </div>
    </div>

  </main><!-- .site-main -->

<!-- Call FOOTER -->
<?php get_footer();

?>
