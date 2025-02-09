<?php
/**
 * 
 *  Footer template.
 * 
 *  @package jakko_standard
 * 
 */

 // Fetch the footer image
$footerImage = get_field('footer_bild');
$footerSize = $footerImage['sizes']['2048x2048'];
// Fetch the email address
$email = get_field('e-post_adress');
// Fetch sociall media links
$instagram = get_field('instagram');
$facebook = get_field('facebook');
?>
   <footer>

   <div class="footer-content-container">
    <a class="mail-link" href="mailto:<?php echo $email ?>"><?php echo $email ?></a>
    <div class="socials-container">
      <a href="<?php echo $instagram ?>"><i class="fa-brands fa-instagram fa-2x"></i></a>
      <a href="<?php echo $facebook ?>"><i class="fa-brands fa-facebook-f fa-2x"></i></a>
    </div>
    <?php the_custom_logo(); ?>
    <p>Copyright© 2025 Jakob Olsson</p>
    
    
   </div>



    <div class="footer-fade"></div>
    <?php if ($footerImage): ?>
    <img src="<?php echo $footerSize; ?>" alt="The footer image" class="footer-image">
<?php endif; ?>

   </footer>

   <?php wp_footer(); ?>
 </body>
 </html>