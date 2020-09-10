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
use yii\data\ActiveDataProvider;
use milkyway\language\models\table\LanguageTable;

class NewsController extends MyController
{
    public function actionIndex($slug = null)
    {
        $category = NewsCategory::getBySlug($slug, false);
        if ($category == null) return $this->redirect(['/site/index']);
        $default_language = $this->default_language;

        /* Breadcrumbs */
        $alias = explode('/', $category->alias);
        unset($alias[0]);
        $list_breadcrumbs = NewsCategory::getByIds($alias, true);
        unset($list_breadcrumbs[$category->id]);
        foreach ($list_breadcrumbs as $breadcrumb) {
            \Yii::$app->view->params['breadcrumbs'][] = [
                'label' => $breadcrumb->newsCategoryLanguage[$default_language]->name,
                'url' => ['/news/index', 'slug' => $breadcrumb->slug]
            ];
        }

        $news = new ActiveDataProvider([
            'query' => News::getQueryByAlias($category->alias),
            'pagination' => [
                'defaultPageSize' => 3
            ]
        ]);

        return $this->render('index', [
            'category' => $category,
            'news' => $news,
            'default_language' => $default_language
        ]);
    }

    public function actionView($slug)
    {
        $news = News::getBySlug($slug, false);
        if ($news == null) return $this->redirect(['/site/index']);
        $default_language = $this->default_language;

        /* Breadcrumbs */
        $alias = explode('/', $news->categoryHasOne->alias);
        unset($alias[0]);
        $list_breadcrumbs = NewsCategory::getByIds($alias, true);
        foreach ($list_breadcrumbs as $breadcrumb) {
            \Yii::$app->view->params['breadcrumbs'][] = [
                'label' => $breadcrumb->newsCategoryLanguage[$default_language]->name,
                'url' => ['/news/index', 'slug' => $breadcrumb->slug]
            ];
        }

        $category = $news->categoryHasOne;
        $newsRelate = News::getByAlias($category->alias, 5, true, false);

        return $this->render('view', [
            'news' => $news,
            'newsRelate' => $newsRelate
        ]);
    }
}