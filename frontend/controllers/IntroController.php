<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 7/7/2020
 * Time: 01:11
 */

namespace frontend\controllers;


use frontend\components\MyController;

class IntroController extends MyController
{
    public function actionIndex()
    {
        return $this->render('index', []);
    }
}