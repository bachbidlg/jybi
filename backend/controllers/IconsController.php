<?php

namespace backend\controllers;

use backend\components\MyController;

class IconsController extends MyController
{
    public function actionIndex()
    {
        return $this->render('index', []);
    }

    public function actionLoadIcon()
    {
        if(\Yii::$app->request->isAjax) {
            return $this->renderAjax('load-icon', []);
        }
    }
}