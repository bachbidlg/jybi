<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 7/7/2020
 * Time: 10:48
 */

namespace frontend\controllers;


use frontend\components\MyController;

class NewsController extends MyController
{
    public function actionIndex()
    {
        return $this->render('index', [

        ]);
    }

    public function actionView()
    {
        return $this->render('view', []);
    }
}