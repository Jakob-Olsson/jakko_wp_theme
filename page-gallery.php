<?php
/**
 *  Template Name: Gallery
 *  Gallery template file.
 * 
 *  @package jakko_standard
 * 
 */

get_header();
 ?>
 <div class="main-gallery-container">
    <div class="gallery-container">
      <?php
      $args = array(
          'post_type'      => 'foto',
          'post_status'    => 'publish',
          'posts_per_page' => 20,
          'paged'          => 1,
          'orderby'        => 'date',
          'order'          => 'DESC',
      );
      $query = new WP_Query($args);
      
      if ($query->have_posts()) {
          while ($query->have_posts()) {
              $query->the_post();
              $image_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
              error_log("Post ID: " . $post->ID . " Thumbnail URL: " . $image_url);
              error_log("Antal inlägg hämtade: " . count($query->posts));
              echo '<div class="gallery-item"><img src="' . esc_url($image_url) . '" alt=""></div>';
          }
          wp_reset_postdata();
      }
      ?>
  </div>
 </div>
    <?php 
get_footer();