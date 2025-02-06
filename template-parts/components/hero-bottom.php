<?php
/**
 * 
 *  Hero-bottom template file.
 * 
 *  This file contains the social media icons and the coordinates specified in wordpress.
 * 
 *  @package jakko_standard
 * 
 */

 // Fetch social media links
 $instagram = get_field('instagram');
 $facebook = get_field('facebook');
 $googleMaps = get_field('google_maps');
 ?>
 <div class="hero-bottom-container">
    <div class="hero-socials-container">
      <a href="<?php echo $instagram ?>"><i class="fa-brands fa-instagram fa-2x"></i></a>
      <a href="<?php echo $facebook ?>"><i class="fa-brands fa-facebook-f fa-2x"></i></a>
    </div>
    <a href="<?php echo $googleMaps ?>" class="coordinates-container"><i class="fa-regular fa-compass fa-lg"></i>56.0294° N, 14.1567° E</a>
    
 </div>