=== ADETheme2016 ===
Contributors: Arizona Department of Education IT Division
Version: 1.8.2
NOTE: Don't forget to update the stylesheet version number in the enqueue function!!!
Updated:

== Changelog ==

= 1.8.2 =
* Released:
* Changes:
  - single.php template now uses 'medium' for post_thumbnail size
  - added image alignment classes from WordPress
  - Fixed some accessibility issues
    - Header: aria-labelledby="sitetitle" (not site_title)
    - Template: page-homepage.php added sections with aria-labelledby references
    - Footer: envelope icon had no alt text
  - Added caption to featured image in single.php template
  - Added "Published: " before date in post and page templates
  - Changed font size for .wp-caption-text (from 1.1rem to .75em)

= 1.8.1 =
* Released: July 17, 2017
* Changes:
  - Added photo of superintendent to header
  - Changed some header classes to IDs and updated stylesheet
  - With addition of #superphoto to header, changed .hide-this breakpoint to 650px
  - Modified modal_target with do_shortcode($content)
  - Added image sizes corresponding to ADE Homepage Widgets sizes
  - Added link to accessibility document to footer
  - Removed title attribute from #main in all page templates

= 1.8.0 =
* Released: June 22, 2017
* Changes:
  - Added link capability to [addicon]
  - Fixed tag.php page template to pull posts_per_page attribute
  - Added admin column showing post IDs
  - Added admin column showing page templates
  - Removed widgety-posts from functions
    >> replaced by ADE Widgets plugin
  - Removed bxslider and added to ADE Widgets plugin
  - Updated fontawesome to version 4.7.0
  - Created new footer
  - New ADE homepage template available in page-templates folder
  - Added Twitter and Facebook share buttons to post and page layouts
    + script files to power the embedded timelines and the buttons
  - Removed custom blog page template sidebar widget areas and page templates
  - Moved stylesheets for menus into /css
  - Updated script for common logon form, targeting that form only
  - Fixed scripts.js for tab groups to correct problem where gathering tabs outside intended tab group
  - Added version number to enqueue function for stylesheet, busting the cache issue

= 1.7.3 =
* Released: April 28, 2017
* Changes:
  - Removed widget Site Transition Overlay from functions filed
  - Added Google Tag Manager code to header.php
  - Added shortcode for inline text color [textcolor color="color"]content[/textcolor] - uses .text_* classes in stylesheet
  - Added function removeEmptyPs to first balance tags in content, then go and strip all empty paragraphs and line breaks
  - Added function & shortcode [break] to manually add a line break that will not be stripped by removeEmptyPs


= 1.7.2 =
* Released: March 20, 2017
* Changes:
  - More fixes to image button styles and function
    + Fixed placement of align parameter within function return statements for image buttons
    + Created options for either retaining aspect ratio or cropping square
    + Refined margins and sizes
  - Updated function(s) for layout tables
    + made default vertical-align = top
    + added width parameter to column header cell
    + removed default Table Title

= 1.7.1 =
* Released: March 17, 2017
* Changes:
  - Corrections to button functions and styles
    + .button-wrap removed text-align: center
    + re-inserted missing "style="
    + wrapped image links in <figure> and added <figcaption> tags and styles
    + added margin-bottom: 0 for figure > a > p as a fix for wpautop issue
      >> NOTE: will see extra <p> in image button code until upgrade WP to at least 4.7.1
  - Added margin under h2, h3, h4, h5, h6

= 1.7 =
* Released: March 16, 2017
* Changes:
  - Rewrote function for button, link-as-button, and image-as-button
    + Solidified styles for all buttons in function
    + Single shortcode for all buttons with function sorting out which kind to encode
    + Image-as-button code constrains images to small (75px x 75px), medium (max 150px x max 150px), and large (max 300px x max 300px)

= 1.6 =
* Released: January 5, 2017
* Changes:
  - Made "width" into "max-width" for [button] shortcodes
  - Added shortcode and styles for displaying image links with titles and descriptions (mostly for Parent Gateway)
  - Added remove_empty_p function
  - Added $align to [button]
  - Updated table shortcodes to better conform to data table specs and accessibility
  - Updated scripts for tabs and accordions
    - tablist height adjustments now correctly calculate
    - embedding tabs in accordions or vice versa is now prohibited (by practice, will break code)
  - Added Layout Tables functions and styles
  - Changed code for regular tables to conform with standards for accessible data tables
    - more concise shortcodes with parameters

= 1.5.5 =
* Released: December 21, 2016
* Changes
  - Updated tab and accordion functions and scripts to match accessibility branch AND improve upon it, so can have more than one [tablist] in single page

= 1.5.1 =
* Released: December 20, 2016
* Changes
  - Adjusted page templates' title code to use correct functions
  - Made each page's <title> load correctly in header

= 1.5 =
* Released: November 14, 2016
* Changes
  - Fixed page and post title truncation by using get_the_title()
  - Included edited version of PollarOne font, removing serif from lowercase 'g'
  - Rearranged page templating pattern, making all more consistent
  - Incorporated correct ID for google translate widget in header.php
