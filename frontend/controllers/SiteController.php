<?php

namespace frontend\controllers;

use frontend\components\MyController;
use frontend\models\Comments;
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

        $projectMenu = NewsCategory::getDuAn();
        $projectCat = [];
        if ($projectMenu != null) {
            $projectCat = NewsCategory::findCategoryChildByTypeDuAn($projectMenu->alias, NewsCategory::TYPE_DU_AN_THIET_KE);
        }
        $projectDesignCategory = [];
        $projects = [];
        if ($projectMenu != null) {
            $projectDesignCategory = NewsCategory::findCategoryChildByTypeDuAn($projectMenu->alias, NewsCategory::TYPE_DU_AN_THIET_KE);
            $projects = News::getProjectDesignByAlias($projectMenu->alias, null);
        }
        $projectHot = News::getNewsCheckHot(NewsCategory::TYPE_PROJECT, null, false);
        $newsHot = News::getNewsCheckHot(NewsCategory::TYPE_NEWS, null, false);
        $freeTypes = Freetype::getByType(Freetype::TYPE_FREETYPE, true, false);

//        $comments = Comments::getAll(true, false);

        return $this->render('index', [
            'sliders' => $sliders,
            'partners' => $partners,
            'projectMenu' => $projectMenu,
            'projectDesignCategory' => $projectDesignCategory,
            'projects' => $projects,
            'projectCat' => $projectCat,
            'projectHot' => $projectHot,
            'newsHot' => $newsHot,
            'freeTypes' => $freeTypes,
//            'comments' => $comments
        ]);
    }

    public function actionSearchNewsHtml()
    {
        return $this->render('search-news', []);
    }
}
