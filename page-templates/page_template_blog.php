<?php
/**
* Template Name: Blog Page - No Sidebar
**/
?>
<?php get_header(); ?>
<div id="content" class="col-xs-12" aria-labelledby="page_title" >
<!--<div id="primary" class="content-area" tabindex="-1">-->
<main id="main" class="site-main" role="main">
        <?php /** Static Page Content **/ ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div id="pagetitle">
                        <h2 id="page_title"><?php the_title(); ?></h2>
                    </div>
                </article>
            <?php endwhile; ?>
<?php /** End Static Page Content **/ ?>
<?php /** Begin Posts **/ ?>
<?php global $wp_query, $paged;

    if( get_query_var('paged') ) {
        $paged = get_query_var('paged');
    }else if ( get_query_var('page') ) {
        $paged = get_query_var('page');
    }else{
        $paged = 1;
    }
    $postsperpage = get_option( 'posts_per_page' );

    $wp_query = null;

    $args = array(
            'posts_per_page' => $postsperpage,
            'paged' => $paged,
            'post_status' => 'publish',
    );

    $wp_query = new WP_Query();
    $wp_query->query( $args );

    while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <div class="entry-content">
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

          <a href="<?php the_permalink(); ?>"><?php the_title('<h3>', '</h3>'); ?></a>
          <a href="<?php the_permalink(); ?>" style="float:left; margin-right: 10px;"><?php the_post_thumbnail( array(100,100) ); ?></a>
          <?php the_excerpt(); ?>
          <?php get_template_part( 'page-templates/post_metadata' ); ?>
        </div>
    </article>
    <!-- #post-## -->
    <?php endwhile; ?>
<?php /** End Posts **/ ?>

	<div class="nav-previous"><?php next_posts_link(__('<span class="meta-nav">&laquo;</span> Older posts', 'thematic')) ?></div>
	<div class="nav-next"><?php previous_posts_link(__('Newer posts <span class="meta-nav">&raquo;</span>', 'thematic')) ?></div>
</main>
<!--</div>-->

<?php get_footer(); ?>
