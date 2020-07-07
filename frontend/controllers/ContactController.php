<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 7/7/2020
 * Time: 02:42
 */

namespace frontend\controllers;


use frontend\components\MyController;

class ContactController extends MyController
{
    public function actionIndex()
    {
        return $this->render('index', []);
    }
}