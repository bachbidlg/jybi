<?php

use yii\helpers\Url;
use milkyway\manual\ManualModule;

?>
<ul class="nav nav-tabs nav-sm nav-light mb-25">
    <?php if (Yii::$app->user->can('user_develop') ||
        Yii::$app->user->can('develop') ||
        Yii::$app->user->can('manual') ||
        Yii::$app->user->can('manualPermission-manual')) { ?>
        <li class="nav-item mb-5">
            <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'permission-manual') echo ' active' ?>"
               href="<?= Url::toRoute(['/manual/permission-manual']); ?>">
                <i class="ion ion-ios-locate"></i><?= ManualModule::t('manual', '[DEV] Quản lý permission'); ?>
            </a>
        </li>
    <?php } ?>
    <?php if (Yii::$app->user->can('user_develop') ||
        Yii::$app->user->can('develop') ||
        Yii::$app->user->can('manual') ||
        Yii::$app->user->can('manualUser-manual-dev-mode')) { ?>
        <li class="nav-item mb-5">
            <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'user-manual-dev-mode') echo ' active' ?>"
               href="<?= Url::toRoute(['/manual/user-manual-dev-mode']); ?>">
                <i class="ion ion-ios-locate"></i><?= ManualModule::t('manual', '[DEV] Hướng dẫn sử dụng'); ?>
            </a>
        </li>
    <?php } ?>
    <?php if (Yii::$app->user->can('user_develop') ||
        Yii::$app->user->can('develop') ||
        Yii::$app->user->can('manual') ||
        Yii::$app->user->can('manualPermission-manual')) { ?>
        <li class="nav-item mb-5">
            <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'user-manual') echo ' active' ?>"
               href="<?= Url::toRoute(['/manual/user-manual']); ?>">
                <i class="ion ion-ios-locate"></i><?= ManualModule::t('manual', 'User Manual'); ?>
            </a>
        </li>
    <?php } ?>
</ul>
