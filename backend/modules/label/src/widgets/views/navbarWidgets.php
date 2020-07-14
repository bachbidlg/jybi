<?php
use yii\helpers\Url;
use milkyway\label\LabelModule;

?>
<ul class="nav nav-tabs nav-sm nav-light mb-25">
    <li class="nav-item mb-5">
        <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'label') echo ' active' ?>"
           href="<?= Url::toRoute(['/label/label']); ?>">
            <i class="ion ion-ios-locate"></i><?= LabelModule::t('label', 'Label'); ?>
        </a>
    </li>
</ul>
