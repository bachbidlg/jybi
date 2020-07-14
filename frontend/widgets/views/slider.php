<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 7/14/2020
 * Time: 11:44
 */
?>

<section id="banner-full">
    <div class="banner-slider owl-carousel owl-theme">
        <?php foreach ($sliders as $item): ?>
            <div class="item">
                <img class="img-fluid"
                     src="<?= $item->getImage() ?>"
                     alt="<?= $item->name ?>">
            </div>
        <?php endforeach ?>
    </div>
</section>
