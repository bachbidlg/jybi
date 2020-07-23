<?php

use yii\helpers\Url;
use milkyway\contact\ContactModule;
use modava\auth\models\User;

?>
<ul class="nav nav-tabs nav-sm nav-light mb-25">
    <?php if (Yii::$app->user->can(User::DEV) ||
        Yii::$app->user->can('contact') ||
        Yii::$app->user->can('contactContact') ||
        Yii::$app->user->can('contactContactIndex')) { ?>
        <li class="nav-item mb-5">
            <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'contact') echo ' active' ?>"
               href="<?= Url::toRoute(['/contact/contact']); ?>">
                <i class="ion ion-ios-locate"></i><?= ContactModule::t('contact', 'Contacts'); ?>
            </a>
        </li>
    <?php } ?>
</ul>
