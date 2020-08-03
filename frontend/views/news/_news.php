<?php

/* @var $model frontend\models\News */

use yii\helpers\Url;

$default_language = \milkyway\language\models\Language::getDefaultLanguage()->id;
?>
<?php /*
<div class="blog-post-slide owl-carousel owl-theme">
    <div class="item">
        <a href="<?= Url::toRoute(['/du-an/chi-tiet']) ?>" class="blog-post-img">
            <span class="img-fade"></span>
            <img src="<?= Yii::$app->assetManager->publish('@frontendWeb/images/blog-img1.jpg')[1] ?>"
                 alt="img">
        </a>
    </div>
    <div class="item">
        <a href="<?= Url::toRoute(['/du-an/chi-tiet']) ?>" class="blog-post-img">
            <span class="img-fade"></span>
            <img src="<?= Yii::$app->assetManager->publish('@frontendWeb/images/blog-img2.jpg')[1] ?>"
                 alt="img">
        </a>
    </div>
    <div class="item">
        <a href="<?= Url::toRoute(['/du-an/chi-tiet']) ?>" class="blog-post-img">
            <span class="img-fade"></span>
            <img src="<?= Yii::$app->assetManager->publish('@frontendWeb/images/blog-img3.jpg')[1] ?>"
                 alt="img">
        </a>
    </div>
</div>
 */ ?>
<a href="<?= Url::toRoute(['/news/view', 'slug' => $model->slug]) ?>" class="blog-post-img text-center">
    <span class="img-fade"></span>
    <img src="<?= $model->getImage() ?>" alt="img">
</a>
<div class="blog-post-content">
    <h3>
        <a href="<?= Url::toRoute(['/news/view', 'slug' => $model->slug]) ?>"><?= $model->newsLanguage[$default_language]->name ?></a>
    </h3>
    <ul class="blog-post-meta">
        <li><i class="fa fa-user-alt"></i> <?= $model->userCreated->userProfile->fullname ?></li>
        <li><i class="fa fa-calendar-alt"></i> <?= date('d/m/Y', $model->created_at) ?></li>
        <li>
            <i class="fa fa-folder-open"></i>
            <a href="<?= Url::toRoute(['/news/index', 'slug' => $model->categoryHasOne->slug]) ?>">
                <?= $model->categoryHasOne->newsCategoryLanguage[$default_language]->name ?>
            </a>
        </li>
    </ul>
    <div class="blog-post-desc">
        <?= $model->newsLanguage[$default_language]->description ?>
    </div>
    <a href="<?= Url::toRoute(['/news/index', 'slug' => $model->slug]) ?>" class="button button-icon small alt">
        <i class="fa fa-angle-right"></i> Xem thêm
    </a>
</div>