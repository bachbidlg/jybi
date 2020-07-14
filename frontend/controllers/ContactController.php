<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 7/7/2020
 * Time: 02:42
 */

namespace frontend\controllers;

use frontend\components\MyController;
use frontend\models\form\ContactForm;
use Yii;
use yii\bootstrap\ActiveForm;
use yii\web\Response;

class ContactController extends MyController
{
    public function actionIndex()
    {
        $model = new ContactForm();

        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            if ($model->load(Yii::$app->request->post())) {
                if ($model->validate() && $model->save()) {
                    return [
                        'code' => 200,
                        'msg' => 'Gửi thành công',
                    ];
                } else {
                    return [
                        'code' => 400,
                        'msg' => 'Gửi thất bại',
                    ];
                }
            }
        }

        return $this->render('index', [
            'model' => $model
        ]);
    }

    public function actionValidationForm()
    {
        if (Yii::$app->request->isAjax) {
            $model = new ContactForm();
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($model->load(Yii::$app->request->post())) {
                return ActiveForm::validate($model);
            }
        }
    }
}