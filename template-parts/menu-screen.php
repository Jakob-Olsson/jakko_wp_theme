<?php
/**
 * 
 *  Menu screen template file.
 * 
 *  This template is used to display the menu screen from the hamburger menu.
 * 
 *  @package jakko_standard
 * 
 */
 ?>

 <div class="menu-screen-main-container">
    <div>
        <!-- Menu navigation -->
        <?php wp_nav_menu(
            array(
                'theme_location' => 'header-menu',
                
            )
        ); ?>
    </div>
 </div>