<?php
/**
 * 
 *  Category template file.
 * 
 *  This template is used to display the categories on the front-page..
 * 
 *  @package jakko_standard
 * 
 */

$eventImage = get_field('event');
$eventImageSize = $eventImage['sizes']['large'];

$artisterImage = get_field('artister');
$artisterImageSize = $artisterImage['sizes']['large'];

$kommersielltImage = get_field('kommersiellt');
$kommersielltImageSize = $kommersielltImage['sizes']['large'];
?>


<div class="category-main-container">

    <div class="category-container">
        <a href="">
        <div class="text-container">
            <h3>Event</h3>
        </div> 
        <div class="read-more">Läs mer</div>
            <div class="category-container-fade"></div>
            <img src="<?php echo $eventImageSize; ?>" alt="The event category image" class="category-image"> 
        </a>
    </div>



    <div class="category-container">
        <a href=""> 
            <div class="text-container">
                <h3>Artister</h3>
            </div> 
            <div class="read-more">Läs mer</div>
            <div class="category-container-fade"></div>
            <img src="<?php echo $artisterImageSize; ?>" alt="The event category image" class="category-image"> 
        </a>
    </div>

    <div class="category-container">
        <a href=""> 
            <div class="text-container">
                <h3>Kommersiellt</h3>
            </div> 
            <div class="read-more">Läs mer</div>
            <div class="category-container-fade"></div>
            <img src="<?php echo $kommersielltImageSize; ?>" alt="The event category image" class="category-image"> 
        </a>
    </div>

</div>