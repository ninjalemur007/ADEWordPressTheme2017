<?php
if ( ! is_active_sidebar( 'blog-sidebar' ) ) {
	return;
} else
?>
<div class="appright-wrapper col-xs-12 col-sm-3">
    <div id="supplementary" class="widget-area appright" role="complementary" title="sidebar">
    <?php dynamic_sidebar( 'blog-sidebar' ); ?>
  </div><!-- #secondary -->
</div>
<?php  ?>

