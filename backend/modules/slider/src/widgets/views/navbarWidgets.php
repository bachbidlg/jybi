<?php
use yii\helpers\Url;
use milkyway\slider\SliderModule;

?>
<ul class="nav nav-tabs nav-sm nav-light mb-25">
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'slider') echo ' active' ?>"
           href="<?= Url::toRoute(['/slider/slider']); ?>">
            <i class="ion ion-ios-locate"></i><?= SliderModule::t('slider', 'Slider'); ?>
        </a>
    </li>
</ul>
