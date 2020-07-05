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
</ul>
