<?php
use yii\helpers\Url;
use milkyway\team\TeamModule;

?>
<ul class="nav nav-tabs nav-sm nav-light mb-25">
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'team-category') echo ' active' ?>"
           href="<?= Url::toRoute(['/team/team-category']); ?>">
            <i class="ion ion-ios-locate"></i><?= TeamModule::t('team', 'Team Category'); ?>
        </a>
    </li>
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'team') echo ' active' ?>"
           href="<?= Url::toRoute(['/team/team']); ?>">
            <i class="ion ion-ios-locate"></i><?= TeamModule::t('team', 'Team'); ?>
        </a>
    </li>
</ul>
