<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 7/7/2020
 * Time: 10:56
 */

/* @var $category frontend\models\NewsCategory */

/* @var $news yii\data\ActiveDataProvider */
/* @var $default_language integer */

use yii\helpers\Url;
use milkyway\language\models\table\LanguageTable;

$this->title = $category->newsCategoryLanguage[$default_language]->name;
\Yii::$app->view->params['breadcrumbs'][] = $this->title;
?>
<section class="page-news">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <?= \yii\widgets\ListView::widget([
                    'dataProvider' => $news,
                    'itemView' => '_news',
                    'layout' => '{items}<div class="pagination"><div class="text-center">{pager}</div></div>',
                    'itemOptions' => [
                        'class' => 'blog-post'
                    ],
                    'pager' => [
                        'firstPageLabel' => 'First',
                        'lastPageLabel' => 'Last',
                        'prevPageLabel' => '<i class="fa fa-angle-left"></i>',
                        'nextPageLabel' => '<i class="fa fa-angle-right"></i>',
                        'maxButtonCount' => 5,

                        'options' => [
                            'tag' => 'ul',
                            'class' => '',
                        ],
                        'disabledListItemSubTagOptions' => [
                            'tag' => 'a',
                            'class' => 'button small grey'
                        ],

                        // Customzing CSS class for pager link
                        'linkOptions' => ['class' => 'button small grey'],
                        'activePageCssClass' => 'current',
                        'disabledPageCssClass' => 'disabled page-disabled',
                        'pageCssClass' => '',

                        // Customzing CSS class for navigating link
                        'prevPageCssClass' => '',
                        'nextPageCssClass' => '',
                        'firstPageCssClass' => '',
                        'lastPageCssClass' => '',
                    ],
                ]) ?>
            </div>
            <div class="col-lg-4">
                <div class="sidebar sidebar-right">
                    <?php
                    echo \frontend\widgets\ContactWidget::widget(['type' => 'contact_wg']);
                    echo \frontend\widgets\NewsFeatured::widget();
                    echo \frontend\widgets\NewsRecommendWidget::widget();
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
$css = <<< CSS
.page-news .blog-post-img .img-fade {
    left: 0
}
CSS;
$this->registerCss($css);

$script = <<< JS
$('.blog-post-slide').owlCarousel({
    items: 1,
    loop: true,
    autoplay: true,
    autoplaySpeed: 3000,
    nav: false,
    dots: true,
});
JS;
$this->registerJs($script, \yii\web\View::POS_END);
?>
