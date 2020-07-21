<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 7/8/2020
 * Time: 14:09
 */

/* @var $recommend_news array */

/* @var $news frontend\models\News */

use yii\helpers\Url;

$default_language = Yii::$app->view->params['default_language'];
?>
<div class="widget news-relative">
    <div class="sidebar-title">
        <h4><?= Yii::t('frontend', 'Có thể bạn quan tâm') ?></h4>
        <div class="separator"></div>
    </div>
    <div class="sidebar-content">
        <?php foreach ($recommend_news as $news) { ?>
            <div class="media">
                <div class="media-left">
                    <img src="<?= $news->getImage() ?>" alt="<?= $news->newsLanguage[$default_language]->name ?>"
                         class="media-object">
                </div>
                <div class="media-body">
                    <h3 class="media-heading">
                        <a href="<?= Url::toRoute(['/news/view', 'slug' => $news->slug]) ?>"><?= $news->newsLanguage[$default_language]->name ?></a>
                    </h3>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
