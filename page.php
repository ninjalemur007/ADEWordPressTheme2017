<?php get_header(); ?>
<div id="content" class="col-xs-12" aria-labelledby="page_title" >
    <div id="main" role="main" class="appcenter col-xs-12 col-sm-9"  title="main content">
    <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div id="pagetitle">
                <h2 id="page_title"><?php the_title(); ?></h2>
            </div>
            <div class="post-header">
              <div class="sharethis">
                <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>"
                data-dnt="true"
                data-show-count="false"
                via="@azedschools">Tweet</a>

                <div class="fb-share-button"
                  data-href="<?php the_permalink(); ?>"
                  data-layout="button"
                  data-size="small" >
               </div>
             </div>
           </div>
            <div >
                <?php the_content(); ?>
            </div>
        </article>
    <!-- #post-## -->
    <?php endwhile; ?>
    </div>  <!-- end [main] -->

    <div role="complementary" class="appright col-xs-12 col-sm-3">
          <?php dynamic_sidebar('static-sidebar') ?>
    </div>

<?php get_footer(); ?>
