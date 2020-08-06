<?php

namespace frontend\controllers;

use frontend\components\MyController;
use frontend\models\Freetype;
use frontend\models\News;
use frontend\models\NewsCategory;
use frontend\models\Slider;

class SiteController extends MyController
{

    public function actionIndex()
    {
        $sliders = Slider::getByType(Slider::TYPE_SLIDER, true, false);
        $partners = Slider::getByType(Slider::TYPE_PARTNER, true, false);

        $projectCat = NewsCategory::getByType(NewsCategory::TYPE_PROJECT, true, false);
        $projectHot = News::getNewsCheckHot(NewsCategory::TYPE_PROJECT, false);
        $newsHot = News::getNewsCheckHot(NewsCategory::TYPE_NEWS, false);
        $freeTypes = Freetype::getByType(Freetype::TYPE_FREETYPE, true, false);

        return $this->render('index', [
            'sliders' => $sliders,
            'partners' => $partners,
            'projectCat' => $projectCat,
            'projectHot' => $projectHot,
            'newsHot' => $newsHot,
            'freeTypes' => $freeTypes
        ]);
    }

    public function actionSearchNewsHtml()
    {
        return $this->render('search-news', []);
    }
}
