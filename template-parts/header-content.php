<?php
/**
 * 
 *  Header content template file.
 * 
 *  @package jakko_standard
 * 
 */

 // Fetch the email address
 $email = get_field('e-post_adress');
 ?>
<div class="header-content header-content-1">
    <button class="hamburger closed">
        <span></span>
        <span></span>
        <span></span>
    </button>
</div>

<div class="header-content header-content-2" id="name">Jakob Olsson</div>

<div class="header-content header-content-3"><a href="mailto:<?php echo $email ?>" class="contact-button">Kontakta mig</a></div>


<!-- Menu navigation -->

<!-- <?php wp_nav_menu(
        array(
            'theme_location' => 'header-menu',
            
            )
        ); ?> -->