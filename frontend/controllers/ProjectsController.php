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

class ProjectsController extends MyController
{
    public function actionIndex($slug = null)
    {
        $category = NewsCategory::getBySlug($slug);
        if ($category == null) return $this->redirect(['/site/index']);
        $default_language = $this->default_language;

        /* Breadcrumbs */
        $alias = explode('/', $category->alias);
        unset($alias[0]);
        $list_breadcrumbs = NewsCategory::getByIds($alias, true);
        unset($list_breadcrumbs[$category->id]);
        foreach ($list_breadcrumbs as $breadcrumb) {
            \Yii::$app->view->params['breadcrumbs'][] = [
                'label' => $breadcrumb->projectsCategoryLanguage[$default_language]->name,
                'url' => ['/project/index', 'slug' => $breadcrumb->slug]
            ];
        }

        $projects = News::getByAlias($category->alias);

        return $this->render('index', [
            'category' => $category,
            'projects' => $projects,
            'default_language' => $default_language
        ]);
    }

    public function actionView($slug)
    {
        $project = News::getBySlug($slug);
        if ($project == null) return $this->redirect(['/site/index']);
        $default_language = $this->default_language;

        /* Breadcrumbs */
        $alias = explode('/', $project->categoryHasOne->alias);
        unset($alias[0]);
        $list_breadcrumbs = NewsCategory::getByIds($alias, true);
        foreach ($list_breadcrumbs as $breadcrumb) {
            \Yii::$app->view->params['breadcrumbs'][] = [
                'label' => $breadcrumb->newsCategoryLanguage[$default_language]->name,
                'url' => ['/projects/index', 'slug' => $breadcrumb->slug]
            ];
        }

        $category = $project->categoryHasOne;
        $projectsRelate = News::getByAlias($category->alias, 5);

        return $this->render('view', [
            'project' => $project,
            'projectsRelate' => $projectsRelate
        ]);
    }
}