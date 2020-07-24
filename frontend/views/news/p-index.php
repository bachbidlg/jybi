<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 7/24/2020
 * Time: 09:16
 */

$this->title = $category->newsCategoryLanguage[$default_language]->name;
\Yii::$app->view->params['breadcrumbs'][] = $this->title;
?>
<section class="page-projects">
    <div class="container">
        <div id="list-projects">
            <div id="filters-masonry" class="work-filter">
                <div data-filter="*" class="filter-item filter-item-active">All</div>
                <div data-filter=".cate-1" class="filter-item filter-item-active">Project Category 1</div>
                <div data-filter=".cate-2" class="filter-item">Project Category 2</div>
                <div data-filter=".cate-3" class="filter-item">Project Category 3</div>
            </div>
            <div id="grid-masonry" class="cbp">
                <div class="cbp-item cate-1">
                    <a href="#">
                        <div class="image-wrap">
                            <img src="" alt="">
                        </div>
                        <div class="caption-wrap">
                            <div class="title"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
$script = <<< JS
$('.masonry').masonry({
    itemSelector: '.msr-item',
});
JS;
$this->registerJs($script, \yii\web\View::POS_END);
$this->registerJsFile('/js/masonry.pkgd.min.js', ['depends' => 'yii\web\JqueryAsset']);
?>
