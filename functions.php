<?php
/**
 * 
 *  Theme functions.
 * 
 *  @package jakko_standard
 * 
 */



 // Load styles and scripts
function jakko_standard_equeue_scripts() {
    // Register and enqueue the main stylesheet
    wp_register_style('style-css', get_stylesheet_uri(), [], filemtime( get_template_directory().'/style.css'), 'all' );
    wp_enqueue_style( 'style-css' );

    // Register and enqueue the main JavaScript file
    wp_register_script('main-js', get_template_directory_uri().'/assets/main.js', [], filemtime( get_template_directory().'/assets/main.js'), true );
    wp_enqueue_script( 'main-js' );


}
// Load scripts and styles in WordPress
add_action('wp_enqueue_scripts', 'jakko_standard_equeue_scripts');



if ( ! function_exists( 'standard_setup' ) ) :
// Sets up theme and registers support for various WordPress features.
function standard_setup() {
    add_theme_support('menus');
    
    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support( 'custom-logo', array(
        'height'      => 550,
        'width'       => 650,
        'flex-width'  => true,
        'flex-height' => true,
    ) );
}
endif;
add_action( 'after_setup_theme', 'standard_setup' );



// Menus
register_nav_menus(
    array(
        'header-menu' => 'Header Menu Location',
        'mobile-menu' => 'Mobile Menu Location',
    )
);


?>