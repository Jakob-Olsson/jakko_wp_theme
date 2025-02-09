<?php /**
 * 
 *  This file includes allt the image post functionality.
 *  Will be called fron functions.php
 * 
 */

 function skapa_foto_posttype() {
    $args = array(
        'labels' => array(
            'name' => 'Foton',
            'singular_name' => 'Foto',
        ),
        'public' => true,
        'show_ui' => true,
        'supports' => array('title', 'thumbnail') // Lägg till stöd för 'thumbnail'
    );
    register_post_type('foto', $args);
}
add_action('init', 'skapa_foto_posttype');
add_action('after_setup_theme', function () {
    add_theme_support('post-thumbnails'); // Aktivera stöd för utvalda bilder
});

/**
 * Skapa Foto taxonomi (Kategorier för Foto)
 */
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
add_theme_support('post-thumbnails');

/**
 * Lägg till en kolumn för utvald bild i adminpanelen
 */
function foto_custom_columns($columns) {
    // Ordna kolumnerna: Bild först, sedan Titel, Kategori, Datum
    $new_columns = array(
        'cb' => '<input type="checkbox" />',
        'foto_thumbnail' => 'Bild',
        'title' => 'Titel',
        'foto_kategori' => 'Kategori', // Lägg till kategori
        'date' => 'Datum',
    );

    return $new_columns;
}
add_filter('manage_foto_posts_columns', 'foto_custom_columns');

/**
 * Fyll kolumnen med utvald bild och kategori
 */
function foto_custom_column_content($column, $post_id) {
    if ($column == 'foto_thumbnail') {
        // Hämta och visa utvald bild
        $thumbnail_url = get_the_post_thumbnail_url($post_id, 'thumbnail'); // Du kan ändra till annan storlek, t.ex. 'medium'
        if ($thumbnail_url) {
            echo '<img src="' . esc_url($thumbnail_url) . '" alt="' . get_the_title($post_id) . '" style="max-width: 100px; height: auto;" />';
        } else {
            echo 'Ingen bild';
        }
    }

    if ($column == 'foto_kategori') {
        // Hämta och visa kategori
        $terms = get_the_terms($post_id, 'foto_kategori');
        if ($terms && !is_wp_error($terms)) {
            $category_names = array();
            foreach ($terms as $term) {
                $category_names[] = $term->name;
            }
            echo implode(', ', $category_names); // Visa alla kategorier separerade med komma
        } else {
            echo 'Ingen kategori';
        }
    }
}
add_action('manage_foto_posts_custom_column', 'foto_custom_column_content', 10, 2);

/**
 * Lägg till stöd för att sortera bilder i adminpanelens kolumn
 */
function foto_columns_sortable($columns) {
    $columns['foto_thumbnail'] = 'thumbnail'; // Gör "Bild" kolumnen sorterbar om det behövs
    return $columns;
}
add_filter('manage_edit-foto_sortable_columns', 'foto_columns_sortable');