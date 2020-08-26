<?php

use yii\helpers\Url;
use milkyway\news\NewsModule;
use modava\auth\models\User;

?>
<ul class="nav nav-tabs nav-sm nav-light mb-25">
    <?php if (Yii::$app->controller->module->id == 'news' && in_array(Yii::$app->controller->id, [
            'news-category',
            'news'
        ])) { ?>
        <?php if (Yii::$app->user->can(User::DEV) ||
            Yii::$app->user->can('news') ||
            Yii::$app->user->can('newsNews-category') ||
            Yii::$app->user->can('newsNews-categoryIndex')) { ?>
            <li class="nav-item mb-5">
                <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'news-category') echo ' active' ?>"
                   href="<?= Url::toRoute(['/news/news-category']); ?>">
                    <i class="ion ion-ios-locate"></i><?= NewsModule::t('news', 'News Category'); ?>
                </a>
            </li>
        <?php } ?>
        <?php if (Yii::$app->user->can(User::DEV) ||
            Yii::$app->user->can('news') ||
            Yii::$app->user->can('newsNews') ||
            Yii::$app->user->can('newsNewsIndex')) { ?>
            <li class="nav-item mb-5">
                <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'news') echo ' active' ?>"
                   href="<?= Url::toRoute(['/news/news']); ?>">
                    <i class="ion ion-ios-locate"></i><?= NewsModule::t('news', 'News'); ?>
                </a>
            </li>
        <?php }
    } ?>
    <?php if (Yii::$app->controller->module->id == 'news' && in_array(Yii::$app->controller->id, [
            'project-category',
            'project'
        ])) { ?>
        <?php if (Yii::$app->user->can(User::DEV) ||
            Yii::$app->user->can('news') ||
            Yii::$app->user->can('newsProject-category') ||
            Yii::$app->user->can('newsProject-categoryIndex')) { ?>
            <li class="nav-item mb-5">
                <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'project-category') echo ' active' ?>"
                   href="<?= Url::toRoute(['/news/project-category']); ?>">
                    <i class="ion ion-ios-locate"></i><?= NewsModule::t('news', 'Projects Category'); ?>
                </a>
            </li>
        <?php } ?>
        <?php if (Yii::$app->user->can(User::DEV) ||
            Yii::$app->user->can('news') ||
            Yii::$app->user->can('newsProject') ||
            Yii::$app->user->can('newsProjectIndex')) { ?>
            <li class="nav-item mb-5">
                <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'project') echo ' active' ?>"
                   href="<?= Url::toRoute(['/news/project']); ?>">
                    <i class="ion ion-ios-locate"></i><?= NewsModule::t('news', 'Projects'); ?>
                </a>
            </li>
        <?php }
    } ?>
    <?php if (Yii::$app->controller->module->id == 'news' && in_array(Yii::$app->controller->id, [
            'support-category',
            'support'
        ])) { ?>
        <?php if (Yii::$app->user->can(User::DEV) ||
            Yii::$app->user->can('news') ||
            Yii::$app->user->can('newsSupport-category') ||
            Yii::$app->user->can('newsSupport-categoryIndex')) { ?>
            <li class="nav-item mb-5">
                <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'support-category') echo ' active' ?>"
                   href="<?= Url::toRoute(['/news/support-category']); ?>">
                    <i class="ion ion-ios-locate"></i><?= NewsModule::t('news', 'Supports Category'); ?>
                </a>
            </li>
        <?php } ?>
        <?php if (Yii::$app->user->can(User::DEV) ||
            Yii::$app->user->can('news') ||
            Yii::$app->user->can('newsSupport') ||
            Yii::$app->user->can('newsSupportIndex')) { ?>
            <li class="nav-item mb-5">
                <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'support') echo ' active' ?>"
                   href="<?= Url::toRoute(['/news/support']); ?>">
                    <i class="ion ion-ios-locate"></i><?= NewsModule::t('news', 'Supports'); ?>
                </a>
            </li>
        <?php }
    } ?>
</ul>
