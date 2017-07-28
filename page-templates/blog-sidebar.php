<div class="col-xs-12 col-sm-3" role="complementary" title="sidebar"> <!-- SIDEBAR -->
  <div class="post-header"  style="padding-bottom:4em; text-align: right;" >
    Share this page&nbsp;&nbsp;
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
    <?php dynamic_sidebar( 'blog-sidebar' ); ?>
    <?php the_widget( 'WP_Widget_Categories', 'count=1&hierarchical=1' ); ?>
    <?php the_widget( 'WP_Widget_Archives', 'count=1' ); ?>
    <?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
</div><!-- end SIDEBAR -->
