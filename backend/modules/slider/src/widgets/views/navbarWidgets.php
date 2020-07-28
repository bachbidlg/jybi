<?php

use yii\helpers\Url;
use milkyway\slider\SliderModule;
use modava\auth\models\User;

?>
<ul class="nav nav-tabs nav-sm nav-light mb-25">
    <?php if (Yii::$app->user->can(User::DEV) ||
        Yii::$app->user->can('slider') ||
        Yii::$app->user->can('sliderSlider') ||
        Yii::$app->user->can('sliderSliderIndex')) { ?>
        <li class="nav-item mb-5">
            <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'slider') echo ' active' ?>"
               href="<?= Url::toRoute(['/slider/slider']); ?>">
                <i class="ion ion-ios-locate"></i><?= SliderModule::t('slider', 'Slider'); ?>
            </a>
        </li>
    <?php } ?>
    <?php if (Yii::$app->user->can(User::DEV) ||
        Yii::$app->user->can('slider') ||
        Yii::$app->user->can('sliderPartner') ||
        Yii::$app->user->can('sliderPartnerIndex')) { ?>
        <li class="nav-item mb-5">
            <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'partner') echo ' active' ?>"
               href="<?= Url::toRoute(['/slider/partner']); ?>">
                <i class="ion ion-ios-locate"></i><?= SliderModule::t('slider', 'Partner'); ?>
            </a>
        </li>
    <?php } ?>
</ul>
