<?php
use yii\helpers\Url;
use modava\language\LanguageModule;

?>
<ul class="nav nav-tabs nav-sm nav-light mb-25">
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'language') echo ' active' ?>"
           href="<?= Url::toRoute(['/language/language']); ?>">
            <i class="ion ion-ios-locate"></i><?= LanguageModule::t('language', 'Language'); ?>
        </a>
    </li>
</ul>
