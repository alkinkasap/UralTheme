<?php
/* Post Thumbnails */
	add_theme_support( 'post-thumbnails' ); 

/* Register Sidebar */
if (function_exists("register_sidebar")) {
  register_sidebar(Array("name" => "Sidebar"));
}


/* Enable Menus */
function register_my_menus() {
register_nav_menus(
  array(
    'header-menu' => __( 'Header Menu' ),
    'sidebar-menu' => __( 'Sidebar Menu' ),
  )
);}
add_action( 'init', 'register_my_menus' );

function menuheader() 
    {
        $link = 'Tema: <a href="http://alkinkasap.net" title="AlkinKasap">Ural</a>';
        echo $link;
    }
add_filter('wp_footer', 'menuheader');


/* Shortcuts */

function pumpkin_text( $atts, $content = null ) {
  return '<text class="text-pumpkin">' . $content . '</text>';
}
add_shortcode('pumpkin', 'pumpkin_text');

function wisteria_text( $atts, $content = null ) {
  return '<text class="text-wisteria">' . $content . '</text>';
}
add_shortcode('wisteria', 'wisteria_text');

function nephritis_text( $atts, $content = null ) {
  return '<text class="text-nephritis">' . $content . '</text>';
}
add_shortcode('nephritis', 'nephritis_text');

function belizehole_text( $atts, $content = null ) {
  return '<text class="text-belizehole">' . $content . '</text>';
}
add_shortcode('belizehole', 'belizehole_text');

function pomegranate_text( $atts, $content = null ) {
  return '<text class="text-pomegranate">' . $content . '</text>';
}
add_shortcode('pomegranate', 'pomegranate_text');

function greensea_text( $atts, $content = null ) {
  return '<text class="text-greensea">' . $content . '</text>';
}
add_shortcode('greensea', 'greensea_text');

function midnightblue_text( $atts, $content = null ) {
  return '<text class="text-midnightblue">' . $content . '</text>';
}
add_shortcode('midnightblue', 'midnightblue_text');






/* Theme Options */

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/options/' );
require_once dirname( __FILE__ ) . '/options/options-framework.php';
    
?>