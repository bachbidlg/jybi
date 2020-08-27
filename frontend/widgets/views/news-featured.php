<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 7/8/2020
 * Time: 15:00
 */

use yii\helpers\Url;

/* @var $list_news_featured array */
/* @var $news_featured frontend\models\News */

$default_language = $this->params['default_language'];
?>
<div class="widget news-featured">
    <div class="sidebar-title">
        <h4><?= Yii::t('frontend', 'Cẩm nang xây dựng') ?></h4>
        <div class="separator"></div>
    </div>
    <div class="sidebar-content">
        <ul>
            <?php foreach ($list_news_featured as $news_featured) { ?>
                <li>
                    <a href="<?= Url::toRoute(['/news/view', 'slug' => $news_featured->slug]) ?>"
                       alt="<?= $news_featured->newsLanguage[$default_language]->name ?>">
                        <?= $news_featured->newsLanguage[$default_language]->name ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>
