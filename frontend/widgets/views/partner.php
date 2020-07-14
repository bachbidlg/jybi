<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 7/14/2020
 * Time: 15:53
 */
?>
<?php foreach ($sliders as $item) : ?>
    <div class="partner-item">
        <img class="img-fluid" src="<?= $item->getImage() ?>" alt="<?= $item->name ?>">
    </div>
<?php endforeach ?>
