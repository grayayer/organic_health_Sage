<?php
// Turn a category ID to a Name
function cat_id_to_name($id) {
	foreach((array)(get_categories()) as $category) {
    	if ($id == $category->cat_ID) { return $category->cat_name; break; }
	}
}

//	Pull theme options from database
function ot_option($key) {
	global $settings;
	$option = get_option($settings);
	if(isset($option[$key])) return $option[$key];
	else return FALSE;
}

// include the theme options
include(TEMPLATEPATH."/includes/theme-options.php");

//	Include the Custom Header code
include_once(TEMPLATEPATH.'/includes/custom-header.php');

// include write panel for additional fields in write windows
include(TEMPLATEPATH."/includes/write-panel.php");

//	Load local Gravity Forms styles if the plugin is installed
if(class_exists("RGForms") && !is_admin()){
    wp_enqueue_style("local_gf_styles", get_bloginfo('template_url') . "/includes/organic_gforms.css");
    if(!get_option('rg_gforms_disable_css'))
        update_option('rg_gforms_disable_css', true);
}

//	Register sidebars
if ( function_exists('register_sidebars') )
	register_sidebar(array('name'=>'Sidebar','before_widget'=>'<div id="%1$s" class="widget %2$s">','after_widget'=>'</div>','before_title'=>'<h4>','after_title'=>'</h4>'));

//	Include Content Limit function
function the_content_limit($max_char, $more_link_text = 'Read More', $stripteaser = 0, $more_file = '') {

    $content = get_the_content($more_link_text, $stripteaser, $more_file);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    $content = strip_tags($content);

   if (strlen($_GET['p']) > 0) {
      echo "<p>";
      echo $content;
      echo "&nbsp;<a href='";
      the_permalink();
      echo "'>"."Read More</a>";
      echo "</p>";
   }

   else if ((strlen($content)>$max_char) && ($espacio = strpos($content, " ", $max_char ))) {

        $content = substr($content, 0, $espacio);
        $content = $content;
        echo "<p>";
        echo $content;
        echo "...";
        echo "&nbsp;<a href='";
        the_permalink();
        echo "'>".$more_link_text."</a>";
        echo "</p>";
   }
   
   else {
      echo "<p>";
      echo $content;
      echo "&nbsp;<a href='";
      the_permalink();
      echo "'>"."Read More</a>";
      echo "</p>";

   }
}

// Add ID and CLASS attributes to the first <ul> occurence in wp_page_menu
function add_menuclass($ulclass) {
return preg_replace('/<ul>/', '<ul class="menu">', $ulclass, 1);
}
add_filter('wp_page_menu','add_menuclass');
add_filter('wp_nav_menu','add_menuclass');

// Add custom background
if ( function_exists('add_custom_background') )
add_custom_background();

// Add navigation support
if ( function_exists('add_theme_support') )
add_theme_support( 'menus' );

// Add default posts and comments RSS feed links to head
if ( function_exists('add_theme_support') )
add_theme_support( 'automatic-feed-links' );

// Add thumbnail support
if ( function_exists('add_theme_support') )
add_theme_support('post-thumbnails');
add_image_size( 'featured-thumbnail', 640, 360, true ); // Homepage Featured Image
add_image_size( 'home-bottom-thumbnail', ot_option('bottom_thumb_width'), ot_option('bottom_thumb_height'), true ); // Homepage Bottom Image

/* Remove the “Links” Menu Item */
add_action( 'admin_menu', 'my_admin_menu' );

function my_admin_menu() {
     remove_menu_page('link-manager.php');
}

/*Add Studio K40 Credits to the Administrative Footer*/
add_filter( 'admin_footer_text', 'my_admin_footer_text' );
function my_admin_footer_text( $default_text ) {
     return '<span id="footer-thankyou">Website managed by <a href="http://www.studiok40.com">Studio K40</a><span> | Powered by <a href="http://www.wordpress.org">WordPress</a>';
}

// creates WordPress short codes for GoogleMap

function get_ContactMap() {

	return '<iframe id="google_map" width="650" height="361" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=sage+body+massage+portland&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=53.345014,79.013672&amp;ie=UTF8&amp;hq=sage+body+massage&amp;hnear=Portland,+Multnomah,+Oregon&amp;cid=13509934941647292990&amp;ll=45.542247,-122.624416&amp;spn=0.024046,0.055704&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>'

;}

add_shortcode('ContactMap', 'get_ContactMap');


// creates WordPress short codes for MassagePackagePurchase

function get_MassagePackagePurchase() {

	return '
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="XEUPA39TY58RG">
<table>
<td><select name="os0">
	<option value="Pkg of 3 - 60 minute sessions">Pkg of 3 - 60 minute sessions $199.00</option>
	<option value="Pkg of 6 - 60 minute sessions">Pkg of 6 - 60 minute sessions $390.00</option>
	<option value="Pkg of 3 - 75 minute sessions">Pkg of 3 - 75 minute sessions $240.00</option>
	<option value="Pkg of 6 - 75 minute sessions">Pkg of 6 - 75 minute sessions $415.00</option>
	<option value="Pkg of 3 - 90 minute sessions">Pkg of 3 - 90 minute sessions $285.00</option>
	<option value="Pkg of 6 - 90 minute sessions">Pkg of 6 - 90 minute sessions $560.00</option>
</select> </td></tr>
</table>
<input type="hidden" name="currency_code" value="USD">
<input type="image" src="https://www.paypalobjects.com/WEBSCR-640-20110429-1/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/WEBSCR-640-20110429-1/en_US/i/scr/pixel.gif" width="1" height="1"></form>'

;}

add_shortcode('MassagePackagePurchase', 'get_MassagePackagePurchase');

// creates WordPress short codes for SingleMassagePurchase

function get_SingleMassagePurchase() {

	return '
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="2FYXBHNCB86CS">
<table>
<td><select name="os0">
	<option value="60 minutes">60 minutes $70.00</option>
	<option value="60 minutes with Full Body Scrub">60 minutes with Full Body Scrub $105.00</option>
	<option value="75 minutes">75 minutes $85.00</option>
	<option value="75 minutes with Full Body Scrub">75 minutes with Full Body Scrub $120.00</option>
	<option value="90 minutes">90 minutes $100.00</option>
	<option value="90 minutes with Full Body Scrub">90 minutes with Full Body Scrub $135.00</option>
	<option value="Hot Stone Massage (90 minutes)">Hot Stone Massage (90 minutes) $110.00</option>
	<option value="Full Body Scrub (approximately 50 minutes)">Full Body Scrub (approximately 50 minutes) $60.00</option>
	<option value="Current Monthly Special">Current Monthly Special $105.00</option>
</select> </td></tr>
</table>
<input type="hidden" name="currency_code" value="USD">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>'

;}

add_shortcode('SingleMassagePurchase', 'get_SingleMassagePurchase');


// custom admin login logo
function custom_login_logo() {
	echo '<style type="text/css">
	h1 a { background-image: url('.get_bloginfo('stylesheet_directory').'/images/custom-login-logo.png) !important; padding-bottom: 70px !important;}
	#login { padding: 50px 0 0; }
	</style>';
}
add_action('login_head', 'custom_login_logo');


// changing the login page URL
    function put_my_url(){
    return bloginfo('url'); // changes the url link from wordpress.org to your blog or website's url
    }
    add_filter('login_headerurl', 'put_my_url');

// changing the login page URL hover text
    function put_my_title(){
    return bloginfo('name'); // changing the title from "Powered by WordPress" to whatever you wish
    }
    add_filter('login_headertitle', 'put_my_title');




?>