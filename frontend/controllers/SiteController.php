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
use frontend\models\TagSeo;
use Yii;
use frontend\components\MyController;
use yii\helpers\Url;

class SiteController extends MyController
{

    public function actionIndex()
    {
        $projectCat = NewsCategory::getByType(NewsCategory::TYPE_PROJECT);
        /*foreach($projectCat as $project){
            foreach($project->categoryHasMany as $category_has_many){
                echo $category_has_many->newsCategoryLanguage[$this->default_language->id]->name;
            }
        }*/

        return $this->render('index', [
            'projectCat' => $projectCat
        ]);
    }


}
