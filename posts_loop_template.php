
<!-- MODIFIED to show featured image
 This is for the posts-in-page plugin by ivycat
 -->

<!-- NOTE: If you need to make changes to this file, copy it to your current theme's main
	directory so your changes won't be overwritten when the plugin is upgraded. -->

<!-- Start of Post Wrap -->
<div class="post hentry ivycat-post">
	<!-- This is the output of the post TITLE -->
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
<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

          <a href="<?php the_permalink(); ?>" style="float:left; margin-right: 10px;"><?php the_post_thumbnail( array(100,100) ); ?></a>
        <?php the_excerpt(); ?>
<?php get_template_part( 'post_metadata' ); ?>

</div>

<!-- // End of Post Wrap -->
