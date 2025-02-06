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

    // Register and enqueue the main JavaScript file
    wp_register_script('animations-js', get_template_directory_uri().'/assets/animations.js', [], filemtime( get_template_directory().'/assets/animations.js'), true );
    wp_enqueue_script( 'animations-js' );

    // Register and enqueue the preloader JavaScript file
    wp_register_script('preloader-js', get_template_directory_uri().'/assets/preloader.js', [], filemtime( get_template_directory().'/assets/preloader.js'), true );
    wp_enqueue_script( 'preloader-js' );


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


function skapa_foto_posttype() {
    $args = array(
        'labels' => array(
            'name' => 'Foton',
            'singular_name' => 'Foto',
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'foton'),
    );
    register_post_type('foto', $args);
}
add_action('init', 'skapa_foto_posttype');

function skapa_foto_taxonomi() {
    $args = array(
        'labels' => array(
            'name' => 'Kategorier',
            'singular_name' => 'Kategori',
        ),
        'hierarchical' => true, // Gör taxonomin hierarkisk, som kategorier
    );
    register_taxonomy('foto_kategori', 'foto', $args);
}
add_action('init', 'skapa_foto_taxonomi');


?>