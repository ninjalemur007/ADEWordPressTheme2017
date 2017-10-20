<?php get_header(); ?>
<div id="content" class="col-xs-12" aria-labelledby="page_title" >
    <div id="main" role="main" class="appcenter col-xs-12 col-sm-9"  >
            <div id="pagetitle"><h2><?php the_title(); ?></h2></div>
            <div class="post-header">
              Published: <?php the_time('F jS, Y') ?>
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
          <?php while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <div class="entry-content">
          <div class="featured-image-box">
            <?php
                if ( has_post_thumbnail( ) ) : the_post_thumbnail('medium', array( 'class' => 'alignleft' ) );
              endif;
              ?> <div class="featured-image-caption"> <?php
                if ( has_post_thumbnail( ) ) : the_post_thumbnail_caption( array( 'class' => 'alignleft') );
              endif;
              ?> </div>
            </div>
        <?php the_content(); ?>
         <div style="clear:both;"> <?php previous_post_link(); ?> &laquo; Prev || Next &raquo; <?php next_post_link(); ?>
      <?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?></div>
    </div>
    </article>


    <!-- #post-## -->
    <?php endwhile; ?>
<?php /** End Static Page Content **/ ?>
     </div>
<?php get_template_part( 'page-templates/blog', 'sidebar' ); ?>

<?php get_footer(); ?>
