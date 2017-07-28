<?php
if ( ! isset( $content_width ) ) {
	$content_width = 500; /* pixels */
}

if ( ! function_exists( 'ade_theme_2016_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ade_theme_2016_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on ADE Theme 2016, use a find and replace
	 * to change 'ade-theme-2016' and 'ade_theme_2016' and anything else that uses the words "ade and theme and 2016" to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'ade-theme-2016', get_template_directory() . '/languages' );


	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	 add_image_size( 'ade-home-features-image-largest', 800, 450, true ); // hard crop, 16:9, used for posts featured on ADE Homepage
	 add_image_size( 'ade-home-features-image-small', 200, 112.5, true ); // hard crop, 16:9, used for posts featured on ADE Homepage
	 add_image_size( 'ade-home-announcements-image-largest', 800, 600, true ); // hard crop, 4:3, used for posts featured on ADE Homepage
	 add_image_size( 'ade-home-announcements-image-small', 200, 150, true ); // hard crop, 4:3, used for posts featured on ADE Homepage
	 add_image_size( 'ade-home-box-widget-image', 450, 338, true ); // hard crop, 4:3, used for posts featured on ADE Homepage
   add_image_size('large-thumb',1060, 650, true);
   add_image_size('small-thumb',780, 250, true);
   add_theme_support( 'post-thumbnails' );


	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'master' => __( 'MasterMenu', 'ade-theme-2016' ),
    'secondary' => __( 'Secondary Menu', 'ade-theme-2016' )
    ) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery'
	) );

	// Setup the WordPress core custom background feature.
//	add_theme_support( 'custom-background', apply_filters( 'ade_theme_2016_custom_background_args', array(
//		'default-color' => 'ffffff',
//		'default-image' => '',
//	) ) );
}
endif; // ade_theme_2016_setup
add_action( 'after_setup_theme', 'ade_theme_2016_setup' );



/**
 * Register widget areas
**/
function ade_theme_2016_widgets_init() {
    register_sidebar( array(
				'name'          => __( 'Static Page Sidebar', 'ade-theme-2016' ),
		    'description'   => __('Widget area for use with Static Page w/ Right Sidebar page template','ade-theme-2016'),
				'id'            => 'static-sidebar',
				'description'   => '',
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h1 class="widget-title">',
				'after_title'   => '</h1>',
		) );
    register_sidebar( array(
        'name'          => __( 'Default Blog Sidebar Area', 'ade-theme-2016' ),
        'description'   => __( 'Widget area for use with Blog Page with Sidebar page template.', 'ade-theme-2016'),
        'id'            => 'blog-sidebar',
        'before_widget' => '<aside>',
        'after_widget'  => '</aside>',
    ) ) ;
}
add_action( 'widgets_init', 'ade_theme_2016_widgets_init' );



/** Register custom skins for Uber Menu **/
add_action( 'init' , 'ade16_register_ubermenu_skins' , 9 );
function ade16_register_ubermenu_skins(){
   if( function_exists( 'ubermenu_register_skin' ) ){
      $skin_slug1 = 'ade1';       //replace with your skin slug
      $skin_name1 = '[ADE Theme 2016] ADE 1';   //Replace with the name of your skin (visible to users)
      $skin_path1 = get_stylesheet_directory_uri() . '/css/ade1.css';  //Replace with path to the custom skin in your theme
      $skin_slug2 = 'ade2';       //replace with your skin slug
      $skin_name2 = '[ADE Theme 2016] ADE 2';   //Replace with the name of your skin (visible to users)
      $skin_path2 = get_stylesheet_directory_uri() . '/css/ade2.css';  //Replace with path to the custom skin in your theme
      ubermenu_register_skin( $skin_slug1 , $skin_name1 , $skin_path1 );
      ubermenu_register_skin( $skin_slug2 , $skin_name2 , $skin_path2 );
   }
}


// Make widgets able to process shortcodes
add_filter( 'widget_text', 'do_shortcode');


/**
    ADE Button Shortcodes
**/

// Function to create widget-ready button
function adeButton($atts, $content = null) {
   extract(shortcode_atts(array(
      'title' => '',
   		'icon' => '',
   		'color' => 'bright_blue',
   		'link' => '',
      'target' => '_self',
			'width' => '',
			'id' => '',
			'textalign' => '',
			'image' => '',
			'alt' => '',
			'align' => '',
			'square' => '',
			'wrap' => '',
   		), $atts));

			if ($width == 'medium' || $width == '250px' || $width == '300px') {
				$bnclass = 'button-medium';
				$figwidth = 'figure-medium';
			} else if ($width == 'large' || $width == '350px') {
				$bnclass = 'button-large';
				$figwidth = 'figure-large';
			} else {
				$bnclass = 'button-small';
				$figwidth = 'figure-small';
			}

			if ($align == 'center') { $align = 'margin: 0.5em auto;'; }

			if ($wrap == 'right') {
				$inline = 'display: inline-flex; float: left; margin-right: 1em;';
			} else if ($wrap == 'left') {
				$inline = 'display: inline-flex; float: right; margin-left: 1em;';
			}

			if ($square == 'yes') {
				if ($width == 'large') { $aspect = 'square-crop-large'; }
				else if ($width == 'medium') { $aspect = 'square-crop-medium';}
				else { $aspect = 'square-crop-small'; }
			} else if ($square == '') {
				if ($width == 'large') { $aspect = 'retain-aspect-large'; }
				else if ($width == 'medium') { $aspect = 'retain-aspect-medium'; }
				else { $aspect = 'retain-aspect-small'; }
			}

			if ($icon !== '') {
				$icon = '<i class="fa fa-'.$icon.' spaceafter"></i>';
			}

			if ($textalign == 'left') {
				$text = 'text-left';
				$wedge = 'pad-left';
			} else if ($textalign == 'right') {
				$text = 'text-right';
				$wedge = 'pad-left';
			} else {
				$text = 'text-center';
			}

			if ($align !== '' || $inline !== '') {
				$style = 'style="'.$align.' '.$inline.'"';
			} else { $style = '';}

			if ($image !== '') { //if has an image
				if ($title !== '' && $alt !== '') { //if has title and alt parameters
					$caption = '<figcaption>'.$title.'</figcaption>'; //use title parameter for caption
					$title = $title; //use title parameter for image title
					$alt = $alt; //use alt parameter for alt text
				} else if ($title !== '' && $alt == '') { //if has title but no alt parameter
					$caption = '<figcaption>'.$title.'</figcaption>'; //use title parameter for caption
					$title = $title; //use title parameter for title
					$alt = $title; //use title parameter for alt tag value
				} else if ($title == '' && $alt !== '') { //if has alt but no title
					$caption = ''; //caption is blank
					$title = $alt; //use alt parameter for image title
					$alt = $alt; //use alt parameter for alt tag
				}

				if ($link !== '') { //and has a link
					if (strpos($link, ":") > 0) { //if a full http url in link
						return '<figure class="'.$figwidth.'" '.$style.'><a href="'.$link.'" target="'.$target.'"><div class="imagelinkwrap"><img src="'.$image.'" class="imagelink '.$aspect.'" alt="'.$alt.'" title="'.$title.'"></div>'.$caption.'</a></figure>';
					} else { //if a relative link
						$link = get_site_url() + '/' + $link;
						return '<figure class="'.$figwidth.'" '.$style.'><a href="'.$link.'" target="'.$target.'"><div class="imagelinkwrap"><img src="'.$image.'" class="imagelink '.$aspect.'" alt="'.$alt.'" title="'.$title.'"></div>'.$caption.'</a></figure>';
					}
				} else { // if no link, then create a button
					return '<figure class="'.$figwidth.'" '.$style.'><div class="imagelinkwrap"><img src="'.$image.'" id="'.$id.'" alt="'.$alt.'" title="'.$title.'" class="imagelink  '.$aspect.'"></div>'.$caption.'</figure>';
				}
			} else { //if no image
					if ($link !== '') {  //if link included, but not image, then a styled link
						if (strpos($link, ":") > 0) {  //if a full http url
				           return '<div class="link-as-button-wrap ' .$bnclass. ' '.$color.' '.$text.'" '.$style.'><a href="'.$link.'" target="' . $target . '" class="link-as-button '. $bnclass .' '.$wedge.'">' .$icon.' '. $title . '</a></div>';
				    } else { //if a relative link
				           return '<div class="link-as-button-wrap '.$bnclass.' '.$color.' '.$text.'"  '.$style.'><a href="' . get_site_url() . '/' . $link . '" target="' . $target . '" class="link-as-button ' .$bnclass. ' '.$wedge.'">'.$icon.' '.$title.'</a></div>';
				    }
					} else {//if no link, then a styled button that can be used for a script
									return '<div class="button-wrap '.$bnclass.'" '.$style.' ><button id="'.$id.'" class="ade-button '.$color.' '.$bnclass.' '.$wedge.' '.$text.'">'.$icon.' '.$title.'</button></div>';
					} //end else no link
			} // end else no image

} // end function

// Create button shortcodes -- includes shortcodes for backwards compatibility
add_shortcode('button', 'adeButton');
add_shortcode('imagelink', 'adeButton');
add_shortcode('ade-button', 'adeButton');
add_shortcode('ade-button-widget', 'adeButton');
add_shortcode('ade-button-body', 'adeButton');



/**
    Accordion shortcodes
**/
function create_adeaccordion($atts, $content = null) {
   return '<div class="adeaccordion" role="tablist" aria-multiselectable="false">' . do_shortcode($content) . '</div>';/*This creates the accordion instance, not the individual panels. */
}
add_shortcode('createaccordion', 'create_adeaccordion');
add_shortcode('createadeaccordion', 'create_adeaccordion');
/* Use like this --> [createadeaccordion]content goes here[/createadeaccordion] */

function add_adeaccordion_segment($atts, $content = null) {
    extract(shortcode_atts(array(
   		'title' => 'Panel Title Goes Here',
   		), $atts));
    return '<h4 class="adeaccordion-toggle" role="tab" aria-selected="false" tabindex="0">'.$title.'</h4><div class="adeaccordion-content" role="tabpanel" aria-hidden="true" aria-expanded="false" tabindex="-1">'. do_shortcode($content) .'</div>';
}
add_shortcode('addsegment', 'add_adeaccordion_segment'); /* Use like this --> [createadeaccordion][addsegment title="Well-written Segment Title"]Lots of content....[/addsegment][/createadeaccordion] */

function add_adeaccordion_opensegment($atts, $content = null) { /* FOR DEFAULT-OPEN SEGMENT */
    extract(shortcode_atts(array(
   		'title' => 'Panel Title Goes Here',
   		), $atts));
    return '<h4 class="adeaccordion-toggle" role="tab"  aria-selected="true" tabindex="0">'.$title.'</h4><div class="adeaccordion-content" role="tabpanel" aria-expanded="true" tabindex="-1" aria-hidden="false">'. do_shortcode($content) .'</div>';
}
add_shortcode('addsegment-open', 'add_adeaccordion_opensegment');

function expand_all_button($atts, $content = null) { /*TO EXPAND ALL ACCORDION PANELS */
		return '<button class="ade_button bright_blue expand-all">Expand All</button>';
}
add_shortcode( 'expand-all-button', 'expand_all_button');


/**
    Tab Group shortcodes
**/
function create_tab_group($atts, $content = null) {
    return '<div class="tabs" role="tablist"  aria-multiselectable="false"><ul class="tabtitles"></ul><div class="tabpanelwrap">' . do_shortcode($content) . '</div></div>'; /*This creates the tab group instance, not the individual tabs. */
}
add_shortcode('createtabgroup', 'create_tab_group');
add_shortcode('add-tabs', 'create_tab_group');

function new_tab($atts, $content = null) {
    extract(shortcode_atts(array(
   		'title' => 'Tab',
   		), $atts));
    return '<li class="horizontal-tabs" role="tab" aria-selected="false" tabindex="0">'.$title.'</li><div class="tabpanel-content" role="tabpanel" aria-expanded="false" tabindex="-1">'. do_shortcode($content) .'</div>';
}
add_shortcode('addtab', 'new_tab');
add_shortcode('content-tab', 'new_tab');


/**
    Content Column Shortcodes
**/

/* LEFT 2/3 + RIGHT 1/3 SET */
function create_column_left($atts, $content = null) {
    return '<div id="columnscontainer" class="col-12"><div class="col-xs-12 col-md-8 contentcolumn">' .do_shortcode($content) . '</div>';
}
add_shortcode('column-left', 'create_column_left');
/* Use like this --> [column-left]content goes here[/column-left] */

function create_column_right($atts, $content = null) {
    return '<div class="col-xs-12 col-md-4 contentcolumn">' .do_shortcode($content) . '</div></div>';
}
add_shortcode('column-right', 'create_column_right');
/* Use like this --> [column-right]content goes here[/column-right] */


/* LEFT 1/3 MIDDLE 1/3 RIGHT 1/3 SET */
function create_small_column_left($atts, $content = null) {
    return '<div id="columnscontainer" class="col-12"><div class="col-xs-12 col-md-4 contentcolumn">' .do_shortcode($content) . '</div>';
}
function create_small_column_middle($atts, $content = null) {
    return '<div class="col-xs-12 col-md-4 contentcolumn">' .do_shortcode($content) . '</div>';
}
function create_small_column_right($atts, $content = null) {
    return '<div class="col-xs-12 col-md-4 contentcolumn">' .do_shortcode($content) . '</div></div>';
}
add_shortcode('small-column-left', 'create_small_column_left');
add_shortcode('small-column-middle', 'create_small_column_middle');
add_shortcode('small-column-right', 'create_small_column_right');
/* Use like this -->
[small-column-left]content goes here[/small-column-left]
[small-column-middle]content goes here[/small-column-middle]
[small-column-right]content goes here[/small-column-right]
*/

/*HALF COLUMNS */
function create_half_column_left($atts, $content = null) {
    return '<div id="columnscontainer" class="col-12"><div class="col-xs-12 col-md-6 contentcolumn">' . do_shortcode($content) . '</div>';
}
add_shortcode('half-column-left', 'create_half_column_left');
function create_half_column_right($atts, $content = null) {
    return '<div class="col-xs-12 col-md-6 contentcolumn">' .do_shortcode($content) . '</div></div>';
}
add_shortcode('half-column-right', 'create_half_column_right');


/**
    Create a modal target-box pair
    -- MUST USE [modaltarget] set with [modalcontent] AS A PAIR. Use SAME ID for both. --
**/
function modal_target($atts, $content = null) {
    extract(shortcode_atts(array(
        'id' => 'target-id',
        ), $atts));
    return '<span class="modaltarget" id="'.$id.'" tabindex="0">' . do_shortcode($content) . '</span>';
}
add_shortcode('modaltarget', 'modal_target');
add_shortcode('floating-modaltarget', 'modal_target');
/* Use like this --> [modaltarget id="word"]content goes here[/modaltarget] */

function modaltargetButton($atts, $content = null) {
   extract(shortcode_atts(array(
        'id' => 'targetid',
        'title' => 'button',
   		'icon' => '',
   		'color' => 'bright_blue',
   		), $atts));
   return '<button id="' . $id . '" class="ade_button modaltarget '.$color.'"><i class="fa fa-'.$icon.'"></i>&nbsp;&nbsp;'.$title.'</button>';
}
add_shortcode('modaltarget-button', 'modaltargetButton');
/* Use like this --> [modaltarget-button id="word" color="bright_blue" icon="paw" title="Button Text"] */

function modal_content($atts, $content = null) {
    extract(shortcode_atts(array(
        'id' => 'content-id',
        ), $atts));
    return '<div tabindex="0" class="modalbox modalboxview" title="modal window" id="modalcontent_'.$id.'"><div id="closemodal" class="closex" title="close modal window" tabindex="0"><img src="'. get_theme_root_uri() .'/ADETheme2016/includes/xclose-75opacity.png" class="ximage" /></div>' .do_shortcode($content). '</div>';
}
add_shortcode('modalcontent', 'modal_content');
/* Use like this --> [modalcontent id="word"]content goes here[/modalcontent] */

function floating_modal_content($atts, $content = null) {
    extract(shortcode_atts(array(
        'id' => 'content-id',
        'width' => '50%',
        'height' => '50%',
        'top' => '25%',
        'left' => '25%',
        ), $atts));
    return '<div tabindex="0" class="modalbox floatingbox modalboxview" title="modal window" style="width: ' . $width .'; height: ' . $height .'; top: ' . $top . '; left: '. $left . ';" id="modalcontent_'.$id.'"><div id="closemodal" class="closex" title="close modal window" tabindex="0"><img src="'. get_theme_root_uri() .'/ADETheme2016/includes/xclose-75opacity.png" class="ximage" /></div>' .do_shortcode($content) . '</div><div class="grayout"></div>';
}
add_shortcode('floating-modalcontent', 'floating_modal_content');

/**
    Add a basic ADE-themed Table
**/
function create_table($atts, $content = null) {
    extract(shortcode_atts(array(
        'title' => 'TABLE TITLE',
        'width' => '100%',
        ), $atts));

    return '<div class="table-responsive"><table class="adethemetable table" style="width:' . $width . ';"><caption>' . $title . '</caption>' . do_shortcode($content) .'</table></div>';
}
add_shortcode('addtable', 'create_table');

function table_header_row($atts, $content = null) {
    return '<thead><tr>' . do_shortcode($content) . '</tr></thead>';
}
add_shortcode('header-row', 'table_header_row');

function table_column_header($atts, $content = null) {
    extract(shortcode_atts(array(
        'title' => '',
				'align' => 'center',
				'style' => '',
				'columns' => '',
        ), $atts));
				if( $align == 'right' ) { $align = ' rightcell'; }
					else if ($align == 'center' ) { $align = ' centercell'; }
					else if ($align == '' | $align == 'left' ){ $align = ' leftcell'; }
				if( $style == '' ) { }
					else if ( $style == 'bold' ) { $style = ' boldcell'; }
					else if ( $style == 'italic' ) { $style = ' italiccell'; }
					else if ( $style == 'italic bold' | $style == 'bold italic' ) { $style = ' boldcell italiccell'; }
				if( $columns !== '' ) { $cols = ' colspan="'.$columns.'"'; }
					else { $cols = ''; }
    return '<th scope="col" class="'.$style.' '.$align.'" '.$cols.'>' . $title . '</th>';
}
add_shortcode('header-cell', 'table_column_header');

function table_body_row($atts, $content = null) {
    return '<tr>' . do_shortcode($content) . '</tr>';
}
add_shortcode('body-row', 'table_body_row');

function table_body_cell($atts, $content = null) {
		extract(shortcode_atts(array(
				'align' => '',
				'style' => '',
				'columns' => '',
				), $atts));
		if( $align == 'right' ) { $align = ' rightcell'; }
			else if ($align == 'center' ) { $align = ' centercell'; }
			else if ($align == '' | $align == 'left' ){ $align = ' leftcell'; }
		if( $style == '' ) { }
			else if ( $style == 'bold' ) { $style = ' boldcell'; }
			else if ( $style == 'italic' ) { $style = ' italiccell'; }
			else if ( $style == 'italic bold' | $style == 'bold italic' ) { $style = 'boldcell italiccell'; }
		if( $columns !== '' ) { $cols = ' colspan="'.$columns.'"'; }
			else { $cols = ''; }
    return '<td class="'.$style.' '.$align.'" '.$cols.'>' . do_shortcode($content) . '</td>';
}
add_shortcode('body-cell', 'table_body_cell');

function table_row_header_cell($atts, $content = null) {
	extract(shortcode_atts(array(
			'title' => '',
			'align' => 'left',
			'style' => '',
			), $atts));
			if( $align == 'right' ) { $align = ' rightcell'; }
				else if ($align == 'center' ) { $align = ' centercell'; }
				else if ($align == '' | $align == 'left' ){ $align = ' leftcell'; }
			if( $style == '' ) { }
				else if ( $style == 'bold' ) { $style = ' boldcell'; }
				else if ( $style == 'italic' ) { $style = ' italiccell'; }
				else if ( $style == 'italic bold' | $style == 'bold italic' ) { $style = ' boldcell italiccell'; }
	return '<td class="rowheader '.$style.' '.$align.' " scope="row">' . $title . '</td>';
}
add_shortcode('row-header-cell', 'table_row_header_cell');

/** functions for backwards compatibility **/
function body_cell_center ($atts, $content = null) {
	return '<td class="centercell">' . do_shortcode($content). '</td>';
}
add_shortcode('body-cell-center', 'body_cell_center');

function body_cell_bold($atts, $content = null) {
	return '<td class="boldcell">' .do_shortcode($content).'</td>';
}
add_shortcode('body-cell-bold', 'body_cell_bold');

function body_cell_boldcenter ($atts, $content = null) {
	return '<td class="boldcell centercell">' .do_shortcode($content).'</td>';
}
add_shortcode('body-cell-boldcenter', 'body_cell_boldcenter');

function body_cell_multicolumn ($atts, $content = null) {
	extract(shortcode_atts(array(
			'columns' => '2',
			), $atts));
	return '<td colspan="'.$columns.'">' .do_shortcode($content).'</td>';
}
add_shortcode('body-cell-multicolumn', 'body_cell_multicolumn');


/**** Layout Tables ****/
function create_layouttable($atts, $content = null) {
    extract(shortcode_atts(array(
        'title' => '',
        'width' => '100%',
				'border' => 'no',
				'align' => 'center',
        ), $atts));
			if($border == 'yes') {$border = ' layouttable-border';}
				else {$border = '';}
			if( $align == 'right' ) { $align = ' layout-align-right'; }
				else if ($align == 'left' ) { $align = 'layout-align-left'; }
				else if ($align == '' | $align == 'center' ){ $align = 'layout-align-center'; }
    return '<div class="layout-table '.$border.'" style="width:' . $width . ';"><p class="layout-table-title '.$align.'">'.$title.'</p>'. do_shortcode($content) .'</div>';
}
add_shortcode('layouttable', 'create_layouttable');

function layouttable_header_row($atts, $content = null) {
    return '<div class="layout-header-row">' . do_shortcode($content) . '</div>';
}
add_shortcode('layouttable-header-row', 'layouttable_header_row');

function layouttable_column_header($atts, $content = null) {
    extract(shortcode_atts(array(
        'title' => '',
				'border' => 'no',
				'align' => 'center',
				'width' => '',
        ), $atts));
			if($border == 'yes') {$border = ' layout-header-border';}
				else {$border = '';}
			if( $align == 'right' ) { $align = ' layout-align-right'; }
			else if ($align == 'left' ) { $align = 'layout-align-left'; }
			else if ($align == '' | $align == 'center' ){ $align = 'layout-align-center'; }
    return '<div class="layout-header-cell '.$border.' '.$align.'" style="width: '.$width.';">' . $title . '</div>';
}
add_shortcode('layouttable-header-cell', 'layouttable_column_header');

function layouttable_body_row($atts, $content = null) {
    return '<div class="layout-body-row">' . do_shortcode($content) . '</div>';
}
add_shortcode('layouttable-body-row', 'layouttable_body_row');

function layouttable_body_cell($atts, $content = null) {
	extract(shortcode_atts(array(
			'border' => 'no',
			'align' => 'left',
			), $atts));

		if($border == 'yes') {$border = ' layout-cell-border';}
		else {$border = '';}

		if( $align == 'right' ) { $align = ' layout-align-right'; }
		else if ($align == 'left' ) { $align = 'layout-align-left'; }
		else if ($align == '' | $align == 'center' ){ $align = 'layout-align-center'; }

		return '<div class="layout-body-cell '.$border.' '.$align.'">' . do_shortcode($content) . '</div>';
}
add_shortcode('layouttable-body-cell', 'layouttable_body_cell');

/** Customize the 'more' tag at end of post excerpts **/
function new_excerpt_more($more) {
    global $post;
    return '<a class="moretag" href=" ' .get_permalink($post->ID) . '"> [Read more...]</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');


/** Limit Excerpt Length to #Characters -- call with 'echo get_excerpt(#);' **/
function get_excerpt( $count ) {
    $permalink = get_permalink($post->ID);
    $excerpt = get_the_content();
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $count);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = '<p>'.$excerpt.'<a class="moretag" href=" ' .get_permalink($post->ID) . '"> [Read more...]</a></p>';
    return $excerpt;
}


/**
Insert relative URL
**/
function relativeLink($atts, $content = null) {
    extract(shortcode_atts(array(
        'url' => '',
        ), $atts));
    if( strpos($url, ":") > 0 )  {
       return '<a href="' . $url . '">'  . do_shortcode($content) . '</a>';
    } elseif ( strpos($url, "/") ===  0 ) {
        return '<a href="' . get_site_url() . $url . '">'  . do_shortcode($content) . '</a>';
    } else {
       return '<a href="' . get_site_url() . '/' .  $url . '">'  . do_shortcode($content) . '</a>';
    }
}
add_shortcode('link', 'relativeLink');



/**
Add shortcodes for using FontAwesome icons in text
**/
function ade16_addIcon($atts, $content = null) {
    extract(shortcode_atts(array(
        'color' => 'medium_blue',
        'icon' => 'paw',
        'size' => ' ',
 	      'alt' => 'icon',
				'link' => ''
        ), $atts));

		if ($link !== '') {  //if icon has a link
				if (strpos($link, ":") > 0) { //if a full http url in link
			 			$linkopen = '<a href="'.$link.'" title="'.$alt.'">';
					} else { //if a relative link
						$link = get_site_url() + '/' + $link;
						$linkopen = '<a href="'.$link.'" title="'.$alt.'">';
					}
			 $linkclose = '</a>';
		 }
    return ''.$linkopen.'<i class="fa fa-' . $icon . ' text_' . $color . ' fa-' . $size . '  "></i><span class="screen-reader-text">icon ' . $alt . '</span>'.$linkclose.'';
}
add_shortcode('addicon', 'ade16_addIcon');


/**
Shortcode to allow color text inline
**/
function ade16_colorText($atts, $content = null) {
		extract(shortcode_atts(array(
			'color' => '',
		), $atts));
		return '<span class="text_' .$color. '">' .do_shortcode($content).'</span>';
}
add_shortcode('textcolor', 'ade16_colorText');

/**
Remove Certain Dashboard Widgets from ALL Users
**/
function ade16_remove_dashboard_widgets() {
    remove_meta_box ('dashboard_activity', 'dashboard', 'normal' );
    remove_meta_box ('dashboard_primary', 'dashboard', 'side' );
}
add_action( 'wp_dashboard_setup', 'ade16_remove_dashboard_widgets' );

/**
Remove Certain Dashboard Menus from Non-Admins
**/
function ade16_remove_admin_dashboard_menus() {
    $user = wp_get_current_user();
    if (!$user -> has_cap ('manage_options'))
        remove_menu_page( 'edit-comments.php' );
   }
add_action( 'admin_menu', 'ade16_remove_admin_dashboard_menus' );


/**
Move load priority of wpautop to process after do_shortcode
**/
remove_filter ('the_content', 'wpautop');
remove_filter ('the_content', 'wptexturize');
remove_filter ('the_content', 'shortcode_unautop');
add_filter ('the_content', 'wpautop', 99);
add_filter ('the_content', 'shortcode_unautop', 101);
add_filter ('the_content', 'wptexturize', 100);

/**
Remove empty paragraphs and breaks added by wpautop. If hit enter twice in editor, then will make paragraph, but does not add paragraphs otherwise.
**/
function removeEmptyPs( $content) {
		$content = balanceTags($content, true); //balance any unbalanced tags
		$content = str_replace( "<p></p>", "", $content); //then get rid of the empty paragraphs
		$content = str_replace( "<br />", "", $content); //get rid of unintended breaks
		$content = str_replace( "<br/>", "", $content); //get rid of unintended breaks
		$content = str_replace( "<br>", "", $content); //get rid of unintended breaks
		return $content;
	}
add_filter("the_content", "removeEmptyPs", 120); //runs after everything else runs

/**
Add a line break that will not be stripped by removeEmptyPs
**/
function addLinebreak () {
	  return '<br class="donotfilter">';
	}
add_shortcode("break", "addLinebreak");

/* Modify output of archive titles */
function ade_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }

    return $title;
}

add_filter( 'get_the_archive_title', 'ade_archive_title' );

/**
	Add POST ID # to admin
**/
add_filter( 'manage_posts_columns', 'show_id_column', 5);
add_action( 'manage_posts_custom_column', 'show_id_column_content', 5, 2);
function show_id_column( $columns ) { //make a column for post ID
	$columns['show_id'] = 'ID'; //get the post ID
	return $columns;
}
function show_id_column_content( $column, $id ) { //show the ID
	if( 'show_id' == $column ) {
		echo $id;
	}
}


/**
	Add Page Template slug to admin
**/
add_filter( 'manage_edit-page_columns', 'add_template_column', 5);
add_action( 'manage_page_posts_custom_column', 'add_template_data', 5, 2);
function add_template_column( $columns ) { //make a column for page template
	$columns['template'] = __( 'Page Template', 'locale' ); //get the page template slug
	return $columns;
}
function add_template_data( $column ) { //show the page template
	global $post;
	$template_name = get_page_template_slug( $post->ID );
	$template = untrailingslashit( get_stylesheet_directory() ) . '/' . $template_name;

	$template_name = ( 0 === strlen( trim( $template_name ) ) || ! file_exists( $template ) )? __( 'Default', 'locale' ) : get_file_description( $template );

	if( 'template' == $column ) {
		echo $template_name;
	}
}

/**
  Enqueue styles and js files
**/
function ade_theme_2016_theme_scripts(){
  wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/includes/bootstrap/css/bootstrap.min.css', array(), '3.3.4', 'all' );
  wp_enqueue_style( 'ade-theme-2016-style', get_stylesheet_uri(), array(), '1.8.2', 'all' );
  wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/includes/bootstrap/js/bootstrap.min.js', array( 'jquery' ), '3.3.4', true );
  wp_enqueue_style('fontawesome', get_template_directory_uri() . '/includes/fontawesome/css/font-awesome.min.css');
  wp_deregister_script('jquery');
  wp_enqueue_script( 'jquery' , get_template_directory_uri() . '/js/jquery/dist/jquery.min.js');
  wp_enqueue_script('js-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), false, true );
	wp_enqueue_script('twitter-setup', get_template_directory_uri() . '/js/twitter-setup.js', array(), false, true );
	wp_enqueue_script('facebook-setup', get_template_directory_uri() . '/js/facebook-setup.js', array(), false, true );
}
add_action( 'wp_enqueue_scripts', 'ade_theme_2016_theme_scripts' );

?>
