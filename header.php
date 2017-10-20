<?php
/**
 * Header
 * @package ADE Theme 2016
**/
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo get_the_title(); ?> - <?php bloginfo(name); ?> - Arizona Department of Education</title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<base href="/">
<!-- BEGIN dataLayer for use w/ Google Tag Manager -->
	<script>
		dataLayer = [{
			'theme' : 'azdeptofed'
		}];
	</script>
<!-- END dataLayer for use w/ Google Tag Manager -->
<!-- BEGIN Google Tag Manager Container -->
	<script>
		(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-KRZ2KDS');
	</script>
<!-- END Google Tag Manager Container -->
<!-- Twitter Card -->
<?php
	$twitter_url = get_permalink();
	$twitter_title = get_the_title();
	$twitter_desc = get_the_excerpt();
	$twitter_desc = strip_tags( $twitter_desc );
	$twitter_thumbs = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), full );
	$twitter_thumb = $twitter_thumbs[0];
	if(!$twitter_thumb) {$twitter_thumb = 'http://www.azed.gov/wp-content/themes/azdeptofed/includes/ade_seal.png'; }
	?>
<meta name="twitter:card" content="summary" />
<meta name="twitter:url" content="<?php echo $twitter_url; ?>" />
<meta name="twitter:site" content="@azedschools" />
<meta name="twitter:title" content="<?php echo $twitter_title; ?>" />
<meta name="twitter:description" content="<?php echo $twitter_desc; ?>" />
<meta name="twitter:image" content="<?php echo $twitter_thumb; ?>" />

<!-- END Twitter Card -->
<!-- Facebook Share meta -->
<?php
	$facebook_url = get_permalink();
    if( is_single() ) { $facebook_type = 'article'; }
	  if( is_page() ) { $facebook_type = 'website'; }
	$facebook_title = get_the_title();
	$facebook_desc = get_the_excerpt();
	$facebook_desc = strip_tags( $facebook_desc );
	$facebook_thumbs = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), full );
	$facebook_thumb = $facebook_thumbs[0];
	if(!$facebook_thumb) {$facebook_thumb = 'http://www.azed.gov/wp-content/themes/azdeptofed/includes/ade_seal.png'; }
	?>
<meta property="og:url" content="<?php echo $facebook_url; ?>" />
<meta property="og:type" content="<?php echo $facebook_type; ?>" />
<meta property="og:title" content="<?php echo $facebook_title; ?>" />
<meta property="og:description" content="<?php echo $facebook_desc; ?>" />
<meta property="og:image" content="<?php echo $facebook_thumb; ?>" />
<!-- END Facebook Share meta -->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- BEGIN Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KRZ2KDS" height="0" width="0" style="display:none;visibility:hidden;"></iframe></noscript>
<!-- END Google Tag Manager (noscript) -->
<!-- Facebook plugin required div -->
<div id="fb-root"></div>
<!-- BEGIN: PAGE -->
<div id="page" class="hfeed site" aria-labelledby="sitetitle">
	<a class="skip-link screen-reader-text" href='<?php global $wp;
$current_url = home_url(add_query_arg(array(),$wp->request)); echo esc_url( $current_url ); ?>#main'>Skip to main content</a>

<div class="sunset" role="banner">
<!-- Script below replaces each site's primary menu with the one from Blog #1 (ADE home site) -->
    <?php
if ( is_multisite() ) {
   switch_to_blog(1);
      wp_nav_menu( array(
	      'container_class' => 'primary-nav',
	      'container' => 'nav',
	      'menu' => 'NEW THEME Primary Menu',
	      'menu_class' => 'menu',
	      'theme_location' => 'master'
    	) );
    restore_current_blog();
}
else {
  wp_nav_menu( array(
      'container_class' => 'primary-nav',
      'container' => 'nav',
      'menu_class' => 'menu',
      'theme_location' => 'master'
    ) );
} ?>
<div class="adeheader">
     <a href="http://www.azed.gov/" title="ADE home page"><img src="<?php bloginfo( 'template_directory' ); ?>/includes/ade_seal.svg" alt="ADE seal" id="adelogo" /></a>
    <div class="superintendent hide-this"><img src="<?php bloginfo( 'template_directory' ); ?>/includes/ddsig.png" alt="" id="ddsig" /><br>Superintendent of Public Instruction<br></div><img src="<?php bloginfo( 'template_directory' ); ?>/includes/superintendentdouglas.jpg" alt="" id="superphoto" class="hide-this" /><a href="http://www.azed.gov/" title="ADE home page"><img src="<?php bloginfo( 'template_directory' ); ?>/includes/empty.png" alt="Diane M. Douglas" id="coversig" class="hide-this" /></a>
		<div class="socialmedia"><a href="https://twitter.com/azedschools" aria-label="ADE on Twitter"><i class="fa fa-twitter" style='display:inline-block;'></i></a>&nbsp;&nbsp;&nbsp;<a href="https://www.facebook.com/AZDeptofEducation" aria-label="ADE on Facebook"><i class="fa fa-facebook" style='display:inline-block;'></i></a>&nbsp;&nbsp;&nbsp;<a href="https://www.instagram.com/azedschools/" aria-label="ADE on Instagram"><i class="fa fa-instagram" style='display:inline-block;'></i></a><br /><div style='display:inline-block; width:156px; height:35px;' id="google_translate_element"></div><script type="text/javascript">
		function googleTranslateElementInit() {
		new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, gaTrack: true, gaId: 'UA-20875650-1'}, 'google_translate_element');
		}
		</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script></div> <!-- END .socialmedia -->
</div> <!-- end .adeheader -->
<!-- Site menu -->
<?php wp_nav_menu( array(
      'container_class' => 'secondary-nav',
      'container' => 'nav',
      'menu_class' => 'menu',
      'theme_location' => 'secondary'
    ) ); ?>

</div><!-- End 'sunset' div [banner] -->


    <!-- Site Title -->
<div id="sitetitle" style="width:100%; padding:15px 0 0 0; text-align:center;">
    <h1 id="site_title"><?php echo get_bloginfo( 'name' ); ?></h1>
</div>
<hr style="width:95%; background-color: #022169; margin: 0 auto 2vh auto !important;">
