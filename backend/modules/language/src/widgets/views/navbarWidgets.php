<?php

use yii\helpers\Url;
use milkyway\language\LanguageModule;
use modava\auth\models\User;

?>
<ul class="nav nav-tabs nav-sm nav-light mb-25">
    <?php if (Yii::$app->user->can(User::DEV) ||
        Yii::$app->user->can('language') ||
        Yii::$app->user->can('languageLanguage') ||
        Yii::$app->user->can('languageLanguageIndex')) { ?>
        <li class="nav-item mb-5">
            <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'language') echo ' active' ?>"
               href="<?= Url::toRoute(['/language/language']); ?>">
                <i class="ion ion-ios-locate"></i><?= LanguageModule::t('language', 'Language'); ?>
            </a>
        </li>
    <?php } ?>
</ul>
