<?php

namespace backend\controllers;

use backend\components\MyController;

class IconsController extends MyController
{
    public function actionIndex()
    {
        return $this->render('index', []);
    }
}