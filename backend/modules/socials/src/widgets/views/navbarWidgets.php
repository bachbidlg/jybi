<?php
use yii\helpers\Url;
use milkyway\socials\SocialsModule;

?>
<ul class="nav nav-tabs nav-sm nav-light mb-25">
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'socials') echo ' active' ?>"
           href="<?= Url::toRoute(['/socials/socials']); ?>">
            <i class="ion ion-ios-locate"></i><?= SocialsModule::t('socials', 'Socials'); ?>
        </a>
    </li>
</ul>
