<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 7/7/2020
 * Time: 10:56
 */

/* @var $news frontend\models\News */

use yii\helpers\Url;

$default_language = $this->params['default_language'];
$this->title = Yii::t('frontend', $news->newsLanguage[$default_language]->name);
\Yii::$app->view->params['breadcrumbs'][] = $this->title;
?>
<section class="page-news-detail">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="widget content">
                    <?= $news->newsLanguage[$default_language]->content ?>
                    <div class="tags">
                        <span><i class="fa fa-tags"></i> Từ khóa:</span>
                        <a class="badge badge-dark" href="#">xây
                            nhà</a>
                        <a class="badge badge-dark" href="#">thiết
                            kế nhà</a>
                        <a class="badge badge-dark" href="#">biệt
                            thự</a>
                    </div>
                </div>

                <?php
                echo \frontend\widgets\NewsRelateWidget::widget(['news_id' => $news->id, 'limit' => 5]);
                ?>

                <div class="content widget comments">
                    <div class="sidebar-title">
                        <h4><?= Yii::t('frontend', 'Bình luận') ?></h4>
                        <div class="separator"></div>
                    </div>
                    <div class="sidebar-content">
                        <div class="fb-comments" data-href="<?= Url::current(Yii::$app->request->get(), true) ?>" data-numposts="5" data-width="100%"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar-right">
                    <?php
                    echo \frontend\widgets\ContactWidget::widget(['type' => 'contact_wg']);
                    echo \frontend\widgets\NewsFeatured::widget();
                    echo \frontend\widgets\NewsRecommendWidget::widget(['news_id' => $news->id, 'limit' => 5]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
