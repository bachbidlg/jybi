<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 7/8/2020
 * Time: 15:55
 */

/* @var $news_relate array */

use yii\helpers\Url;

$default_language = Yii::$app->view->params['default_language'];
?>

<div class="content widget blog-post-related">
    <div class="sidebar-title">
        <h4><?= Yii::t('frontend', 'Bài viết liên quan') ?></h4>
        <div class="separator"></div>
    </div>
    <div class="sidebar-content">
        <ul>
            <?php foreach ($news_relate as $news) { ?>
                <li>
                    <i class="fas fa-angle-double-right"></i>
                    <a href="<?= Url::toRoute(['/news/view', 'slug' => $news->slug]) ?>"><?= $news->newsLanguage[$default_language]->name ?></a>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>
