<?php

namespace frontend\controllers;

use frontend\models\Activity;
use frontend\models\ExHistory;
use frontend\models\Exploration;
use frontend\models\ExStory;
use frontend\models\GalleryCategory;
use frontend\models\News;
use frontend\models\NewsCategory;
use frontend\models\search\SearchNews;
use frontend\models\search\SearchVideo;
use frontend\models\Slider;
use frontend\models\TagSeo;
use Yii;
use frontend\components\MyController;
use yii\helpers\Url;

class SiteController extends MyController
{

    public function actionIndex()
    {
        $sliders = Slider::getByType(Slider::TYPE_SLIDER);
        $partners = Slider::getByType(Slider::TYPE_PARTNER);

        $projectCat = NewsCategory::getByType(NewsCategory::TYPE_PROJECT);
        $projectHot = News::getNewsCheckHot(NewsCategory::TYPE_PROJECT, false);
        $newsHot = News::getNewsCheckHot(NewsCategory::TYPE_NEWS, false);

        return $this->render('index', [
            'sliders' => $sliders,
            'partners' => $partners,
            'projectCat' => $projectCat,
            'projectHot' => $projectHot,
            'newsHot' => $newsHot,
        ]);
    }


}
