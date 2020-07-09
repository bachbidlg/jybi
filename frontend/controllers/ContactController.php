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

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate() && $model->save()) {
                Yii::$app->session->setFlash('alert', [
                    'class' => 'success',
                    'msg' => 'Gửi thành công!'
                ]);
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('alert', [
                    'class' => 'danger',
                    'msg' => 'Gửi thất bại! Vui lòng thử lại! save'
                ]);
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