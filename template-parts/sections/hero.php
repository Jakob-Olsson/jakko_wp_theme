<?php
/**
 * 
 *  Hero template file.
 * 
 *  @package jakko_standard
 * 
 */

 // fetch the preloader logo
 $loggaImage = get_field('logga');
 $loggaSize = $loggaImage['sizes']['large'];
 ?>

<div class="preloader"><img src="<?php echo $loggaSize; ?>" alt="The event logo image" class="preloader-content">
</div>

<div class="hero-section parallax">
    <div class="hero-overlay"></div>
    <img src="<?php echo get_template_directory_uri(); ?>/images/main-background.png" alt="background image" class="hero-image hero-image-background">
    <?php the_custom_logo(); ?>
    <img src="<?php echo get_template_directory_uri(); ?>/images/main-foreground.png" alt="foreground image" class="hero-image hero-image-foreground">

</div>