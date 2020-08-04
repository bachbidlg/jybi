<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 7/7/2020
 * Time: 01:11
 */

namespace frontend\controllers;


use frontend\components\MyController;
use frontend\models\KeyValue;
use frontend\models\News;

class IntroController extends MyController
{
    public function actionIndex()
    {
        $subject = KeyValue::getValueByKey('GIOI_THIEU', false);
        $intro = News::getBySlug($subject);
        if ($intro == null) return $this->redirect(['/site/index']);
        return $this->render('index', [
            'intro' => $intro
        ]);
    }
}