<?php
/**
 * 
 *  Theme functions.
 * 
 *  @package jakko_standard
 * 
 */

 require_once( get_template_directory() . '/includes/photo-post.php' );



 // Load styles and scripts
function jakko_standard_equeue_scripts() {
    // Register and enqueue the main stylesheet
    wp_register_style('style-css', get_stylesheet_uri(), [], filemtime( get_template_directory().'/style.css'), 'all' );
    wp_enqueue_style( 'style-css' );

    // Register and enqueue the main JavaScript file
    wp_register_script('main-js', get_template_directory_uri().'/assets/main.js', [], filemtime( get_template_directory().'/assets/main.js'), true );
    wp_enqueue_script( 'main-js' );

    // Register and enqueue the animations file
    wp_register_script('animations-js', get_template_directory_uri().'/assets/animations.js', [], filemtime( get_template_directory().'/assets/animations.js'), true );
    wp_enqueue_script( 'animations-js' );

    // Register and enqueue the masonry file.
    // Masonry is the grid layout for the image gallery
    wp_enqueue_script('masonry-cdn', 'https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js', [], null, true);
    wp_enqueue_script('imagesloaded-js', 'https://unpkg.com/imagesloaded@5/imagesloaded.pkgd.min.js', [], null, true);

    // Register and enqueue the infinite scroll file
    wp_register_script('infinite-scroll-js', get_template_directory_uri().'/assets/infinite-scroll.js', [], filemtime( get_template_directory().'/assets/infinite-scroll.js'), true );
    wp_enqueue_script( 'infinite-scroll-js' );

    // Skicka AJAX URL till JavaScript
    wp_localize_script('infinite-scroll-js', 'ajax_params', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
    ));

}
// Load scripts and styles in WordPress
add_action('wp_enqueue_scripts', 'jakko_standard_equeue_scripts');


// Theme supports
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




// Ajax fuctionality
function load_more_gallery_images() {
    // Kontrollera om det finns en paged-parameter (sidnummer)
    $paged = isset($_POST['paged']) ? intval($_POST['page']) : 1;


    // Definiera WP_Query för att hämta bilder från ett galleri
    $args = array(
        'post_type'      => 'foto',  // Hämtar bilder
        'post_status'    => 'publish',
        'posts_per_page' => 20,             // Antal bilder per laddning
        'paged'          => $paged,
        'orderby'        => 'date',
        'order'          => 'DESC',
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $image_url = get_the_post_thumbnail_url(get_the_ID(), 'large');

            if ($image_url) {
                echo '<div class="gallery-item"><img src="' . esc_url($image_url) . '" alt=""></div>';
            }
        }
        wp_reset_postdata();
    } else {
        echo 'Inga bilder att visa.';
    }

    wp_die();
}
// Registrera AJAX-hanterare
add_action('wp_ajax_load_more_gallery_images', 'load_more_gallery_images');
add_action('wp_ajax_nopriv_load_more_gallery_images', 'load_more_gallery_images');




?>