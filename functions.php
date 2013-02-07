<?php
// Start the engine
require_once( get_template_directory() . '/lib/init.php' );

// Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Grace Simple Theme' );
define( 'CHILD_THEME_URL', 'http://www.webappdev.net/' );

// Add Viewport meta tag for mobile browsers
add_action( 'genesis_meta', 'sample_viewport_meta_tag' );
function sample_viewport_meta_tag() {
	echo '<meta name="viewport" content="width=device-width, initial-scale=1.0"/>';
}

// Add new image sizes (for such as featured images or grid thumbnails)
add_image_size('grid-thumbnail', 100, 100, TRUE);

// Add support for custom background
add_theme_support( 'custom-background' );

//---- HEADER ----
// Add support for custom header
add_theme_support( 'genesis-custom-header', array(
	'width' => 1152,
	'height' => 120
) );

// Reposition the Primary Navigation
remove_action('genesis_after_header', 'genesis_do_nav');
add_action('genesis_header_right', 'genesis_do_nav');	// will reposition navigation

/** Remove the header right widget area */
unregister_sidebar( 'header-right' );		// will remove search form


//---- FOOTER ----
// Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

// Genesis footer

/** Customize the credits */
add_filter( 'genesis_footer_creds_text', 'custom_footer_creds_text' );
function custom_footer_creds_text() {
    $creds = '<div class="creds"><p>';
    $creds .=  'Copyright &copy; ';
    $creds .=  date( 'Y' );
    $creds .=  ' &middot; <a href="http://webappdev.net">WEB & MOBILE DEVELOPER</a> &middot; Sung Ahn';
    $creds .=  '</p></div>';
    return $creds;
}