<?php
/**
 * 
 *  Header template.
 * 
 *  @package jakko_standard
 * 
 */
?>
<!DOCTYPE html>
 <html lang="<?php language_attributes(); ?>">
 <head>
    <meta charset="<?php bloginfo(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Recursive:slnt,wght,CASL,CRSV,MONO@-15..0,300..1000,0..1,0..1,0..1&display=swap" rel="stylesheet">

   <!-- Scripts -->
   <script src="https://kit.fontawesome.com/0b779f8c0b.js" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/CustomEase.min.js"></script>

    <?php wp_head(); ?>
 </head>
 <body <?php body_class(); ?>>

 <?php 
    if ( function_exists('wp_body_open') ) {
        wp_body_open();
    } 
 ?>

 <header>

 <?php get_template_part('template-parts/header-content'); ?>
     
 </header>

 <?php get_template_part('template-parts/menu-screen'); ?>