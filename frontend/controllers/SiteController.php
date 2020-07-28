<?php

namespace frontend\controllers;

use frontend\models\News;
use frontend\models\NewsCategory;
use frontend\models\Slider;
use Yii;
use frontend\components\MyController;
use yii\helpers\Url;

class SiteController extends MyController
{

    public function actionIndex()
    {
        $sliders = Slider::getByType(Slider::TYPE_SLIDER, true, false);
        $partners = Slider::getByType(Slider::TYPE_PARTNER, true, false);

        $projectCat = NewsCategory::getByType(NewsCategory::TYPE_PROJECT, true, false);
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
