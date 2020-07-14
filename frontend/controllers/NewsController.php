<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 7/7/2020
 * Time: 10:48
 */

namespace frontend\controllers;

use frontend\components\MyController;
use frontend\models\News;
use frontend\models\NewsCategory;

class NewsController extends MyController
{
    public function actionIndex($slug = null)
    {
        $category = NewsCategory::getBySlug($slug);
        if($category == null) return $this->redirect(['/site/index']);

        $news = News::getByAlias($category->alias);

        return $this->render('index', [
            'news' => $news
        ]);
    }

    public function actionView($slug)
    {
        $news = News::getBySlug($slug);
        if($news == null) return $this->redirect(['/site/index']);

        $category = NewsCategory::getById($news->category);
        $newsRelate = News::getByAlias($category->alias, 5);

        return $this->render('view', [
            'news' => $news,
            'newsRelate' => $newsRelate
        ]);
    }
}