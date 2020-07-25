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
    <div class="container-fluid">
        <div id="list-projects">
            <div id="filters-masonry" class="filters filter-button-group">
                <div data-filter="*" class="filter-item filter-item-active">All</div>
                <div data-filter=".nha-pho" class="filter-item">Nhà phố</div>
                <div data-filter=".biet-thu" class="filter-item">Biệt thự</div>
                <div data-filter=".van-phong" class="filter-item">Văn phòng</div>
            </div>
            <div id="grid-masonry" class="grid">
                <div class="row row-cols-md-3 row-cols-2" style="margin:0 -.5rem">
                    <?php for ($i = 1; $i <= 4; $i++) { ?>
                        <div class="col grid-item nha-pho mb-3 px-2">
                            <a class="caption" href="#">
                                <div class="image-wrap">
                                    <img class="img-fluid" src="./images/image<?= $i ?>.jpg" alt="img">
                                </div>
                                <div class="caption-wrap">
                                    <div class="d-table">
                                        <div class="d-table-cell text-center">
                                            <div class="title">Nhà phố</div>
                                            <div class="line"></div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                    <?php for ($i = 5; $i <= 8; $i++) { ?>
                        <div class="col grid-item biet-thu mb-3 px-2">
                            <a class="caption" href="#">
                                <div class="image-wrap">
                                    <img class="img-fluid" src="./images/image<?= $i ?>.jpg" alt="img">
                                </div>
                                <div class="caption-wrap">
                                    <div class="d-table">
                                        <div class="d-table-cell text-center">
                                            <div class="title">Biệt thự</div>
                                            <div class="line"></div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                    <div class="col grid-item van-phong mb-3 px-2">
                        <a class="caption" href="#">
                            <div class="image-wrap">
                                <img class="img-fluid" src="./images/image9.jpg" alt="img">
                            </div>
                            <div class="caption-wrap">
                                <div class="d-table">
                                    <div class="d-table-cell text-center">
                                        <div class="title">Văn phòng</div>
                                        <div class="line"></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col grid-item van-phong mb-3 px-2">
                        <a class="caption" href="#">
                            <div class="image-wrap">
                                <img class="img-fluid" src="./images/image10.jpg" alt="img">
                            </div>
                            <div class="caption-wrap">
                                <div class="d-table">
                                    <div class="d-table-cell text-center">
                                        <div class="title">Văn phòng</div>
                                        <div class="line"></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
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
