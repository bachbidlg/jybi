<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 7/24/2020
 * Time: 09:16
 */

use yii\helpers\Url;

/* @var $category frontend\models\NewsCategory */
/* @var $sub_category frontend\models\NewsCategory */
/* @var $projects array */
/* @var $project frontend\models\News */

$this->title = $category->newsCategoryLanguage[$default_language]->name;
\Yii::$app->view->params['breadcrumbs'][] = $this->title;
$default_language = $this->params['default_language'];
$this->registerCss('
@media only screen and (min-width: 992px){
#main .site-heading{min-height:820px}
}
');
?>
<section class="page-projects">
    <div class="container-fluid">
        <?php
        if (count($projects) > 0) {
            $list_alias = [];
            ?>
            <div id="list-projects">
                <div id="filters-masonry" class="filters filter-button-group">
                    <div data-filter="*" class="filter-item filter-item-active">All</div>
                    <?php
                    foreach ($category->categoryHasMany as $sub_category) {
                        $list_alias[$sub_category->alias] = $sub_category->slug;
                        ?>
                        <div data-filter=".<?= $sub_category->slug ?>"
                             class="filter-item mb-2 mb-sm-0 mx-1"><?= $sub_category->newsCategoryLanguage[$default_language]->name ?></div>
                    <?php } ?>
                </div>
                <div id="grid-masonry" class="grid">
                    <div class="row row-cols-md-3 row-cols-1" style="margin:0 -.5rem">
                        <?php
                        var_dump($list_alias);
                        foreach ($projects as $project) {
                            $cat_slug = $project->categoryHasOne->slug;
                            foreach($list_alias as $alias => $slug){
                                if(strpos($project->categoryHasOne->alias .'/', $alias) !== false) {
                                    $cat_slug = $slug;
                                }
                                break;
                            }
                            ?>
                            <div class="col grid-item <?= $cat_slug ?> mb-3 px-0 px-sm-2">
                                <a class="caption"
                                   href="<?= Url::toRoute(['/projects/view', 'slug' => $project->slug]) ?>">
                                    <div class="image-wrap">
                                        <img class="img-fluid" src="<?= $project->getImage() ?>"
                                             alt="<?= $project->newsLanguage[$default_language]->name ?>">
                                    </div>
                                    <div class="caption-wrap">
                                        <div class="d-table">
                                            <div class="d-table-cell text-center">
                                                <div class="title"><?= $project->newsLanguage[$default_language]->name ?></div>
                                                <div class="line"></div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="container text-white"><?= Yii::t('frontend', 'Dữ liệu đang cập nhật') ?></div>
        <?php } ?>
    </div>
</section>
<?php
$script = <<< JS
$(function () {
    $('.grid').isotope({
      itemSelector: '.grid-item',
    });
    
    // filter items on button click
    $('.filter-button-group').on( 'click', '.filter-item', function() {
        var filterValue = $(this).attr('data-filter');
        $('.grid').isotope({ filter: filterValue });
        $('.filter-button-group .filter-item').removeClass('filter-item-active');
        $(this).addClass('filter-item-active');
    });
});
JS;
$this->registerJs($script, \yii\web\View::POS_END);
$this->registerJsFile('/js/isotope.pkgd.js', ['depends' => 'yii\web\JqueryAsset']);
?>
