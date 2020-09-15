<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 7/7/2020
 * Time: 02:42
 */

namespace frontend\controllers;

use common\commands\SendEmailCommand;
use frontend\components\MyController;
use frontend\models\form\ContactForm;
use milkyway\shop\models\table\ShopTable;
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
                    try {
                        $shop = Yii::$app->view->params['shop'];
                        if ($shop != null && $shop->dataMetadata('email') != null) {
                            \Yii::$app->commandBus->handle(new SendEmailCommand([
                                'to' => $shop->dataMetadata('email'),
                                'subject' => $model->subject,
                                'view' => 'contactMail',
                                'params' => $model->getAttributes(['subject', 'message', 'full_name', 'email', 'phone'])
                            ]));
                        }
                    } catch (\Exception $ex) {
                        Yii::warning('Send contact mail failed. Id: ' . $model->primaryKey . ', info: ' . json_encode($model->getAttributes(['subject', 'message', 'full_name', 'email', 'phone'])));
                    }
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

    public function actionEmailTemp()
    {
        return $this->render('email-temp');
    }
}