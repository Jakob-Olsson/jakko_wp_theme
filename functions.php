<?php
/**
 * 
 *  Theme functions.
 * 
 *  @package jakko_standard
 * 
 */

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

?>