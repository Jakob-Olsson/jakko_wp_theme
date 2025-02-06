<?php
/**
 * 
 *  About template file.
 * 
 *  This template is used to display about section on the front-page..
 * 
 *  @package jakko_standard
 * 
 */

$profileImage = get_field('personlig-bild');
$profileSize = $profileImage['sizes']['large'];
$information = get_field('informationstext');
?>

<div class="about-main-container">
    <div class="about-container">
        <div class="profile-container">
            <div class="image-container"><img src="<?php echo $profileSize; ?>" alt="The profile picture" class="profile-image"></div>
        </div>
        <div class="profile-text-container">
            <?php echo $information; ?>
        </div>

    </div>

</div>