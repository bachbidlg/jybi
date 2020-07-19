<?php
use yii\helpers\Url;
use milkyway\freetype\FreetypeModule;

?>
<ul class="nav nav-tabs nav-sm nav-light mb-25">
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'freetype') echo ' active' ?>"
           href="<?= Url::toRoute(['/freetype/freetype']); ?>">
            <i class="ion ion-ios-locate"></i><?= FreetypeModule::t('freetype', 'Freetype'); ?>
        </a>
    </li>
</ul>
