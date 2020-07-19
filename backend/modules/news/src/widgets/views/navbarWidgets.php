<?php
use yii\helpers\Url;
use milkyway\news\NewsModule;

?>
<ul class="nav nav-tabs nav-sm nav-light mb-25">
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'news-category') echo ' active' ?>"
           href="<?= Url::toRoute(['/news/news-category']); ?>">
            <i class="ion ion-ios-locate"></i><?= NewsModule::t('news', 'News Category'); ?>
        </a>
    </li>
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'news') echo ' active' ?>"
           href="<?= Url::toRoute(['/news/news']); ?>">
            <i class="ion ion-ios-locate"></i><?= NewsModule::t('news', 'News'); ?>
        </a>
    </li>
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'project-category') echo ' active' ?>"
           href="<?= Url::toRoute(['/news/project-category']); ?>">
            <i class="ion ion-ios-locate"></i><?= NewsModule::t('news', 'Projects Category'); ?>
        </a>
    </li>
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'project') echo ' active' ?>"
           href="<?= Url::toRoute(['/news/project']); ?>">
            <i class="ion ion-ios-locate"></i><?= NewsModule::t('news', 'Projects'); ?>
        </a>
    </li>
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'support-category') echo ' active' ?>"
           href="<?= Url::toRoute(['/news/support-category']); ?>">
            <i class="ion ion-ios-locate"></i><?= NewsModule::t('news', 'Supports Category'); ?>
        </a>
    </li>
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'support') echo ' active' ?>"
           href="<?= Url::toRoute(['/news/support']); ?>">
            <i class="ion ion-ios-locate"></i><?= NewsModule::t('news', 'Supports'); ?>
        </a>
    </li>
</ul>
