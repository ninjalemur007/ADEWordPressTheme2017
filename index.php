<?php get_header(); ?>

<div id="content" class="col-xs-12" aria-labelledby="page_title" >
    <main id="main" role="main" class="appcenter col-xs-12 col-sm-9"  >

    <?php while ( have_posts() ) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div id="pagetitle"><h2><?php the_title(); ?></h2></div>
            
            <div class="entry-content"><?php the_content(); ?></div>
      </article>
    <!-- #post-## -->
    <?php endwhile; ?>
  </main>
  <!-- .site-main -->
<?php get_footer(); ?>
