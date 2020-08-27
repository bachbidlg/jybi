<?php

namespace milkyway\socials\controllers;

use milkyway\socials\models\table\SocialsTable;
use yii\db\Exception;
use Yii;
use yii\helpers\Html;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use milkyway\socials\SocialsModule;
use backend\components\MyController;
use milkyway\socials\models\Socials;
use milkyway\socials\models\search\SocialsSearch;
use yii\web\Response;

/**
 * SocialsController implements the CRUD actions for Socials model.
 */
class SocialsController extends MyController
{
    /**
    * {@inheritdoc}
    */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
    * Lists all Socials models.
    * @return mixed
    */
    public function actionIndex()
    {
        $searchModel = new SocialsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
            }



    /**
    * Displays a single Socials model.
    * @param integer $id
    * @return mixed
    * @throws NotFoundHttpException if the model cannot be found
    */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
    * Creates a new Socials model.
    * If creation is successful, the browser will be redirected to the 'view' page.
    * @return mixed
    */
    public function actionCreate()
    {
        $model = new Socials();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate() && $model->save()) {
                Yii::$app->session->setFlash('toastr-' . $model->toastr_key . '-view', [
                    'title' => 'Thông báo',
                    'text' => 'Tạo mới thành công',
                    'type' => 'success'
                ]);
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                $errors = Html::tag('p', 'Tạo mới thất bại');
                foreach ($model->getErrors() as $error) {
                    $errors .= Html::tag('p', $error[0]);
                }
                Yii::$app->session->setFlash('toastr-' . $model->toastr_key . '-form', [
                    'title' => 'Thông báo',
                    'text' => $errors,
                    'type' => 'warning'
                ]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
    * Updates an existing Socials model.
    * If update is successful, the browser will be redirected to the 'view' page.
    * @param integer $id
    * @return mixed
    * @throws NotFoundHttpException if the model cannot be found
    */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if($model->validate()) {
                if ($model->save()) {
                    Yii::$app->session->setFlash('toastr-' . $model->toastr_key . '-view', [
                        'title' => 'Thông báo',
                        'text' => 'Cập nhật thành công',
                        'type' => 'success'
                    ]);
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            } else {
                $errors = Html::tag('p', 'Cập nhật thất bại');
                foreach ($model->getErrors() as $error) {
                    $errors .= Html::tag('p', $error[0]);
                }
                Yii::$app->session->setFlash('toastr-' . $model->toastr_key . '-form', [
                    'title' => 'Thông báo',
                    'text' => $errors,
                    'type' => 'warning'
                ]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
    * Deletes an existing Socials model.
    * If deletion is successful, the browser will be redirected to the 'index' page.
    * @param integer $id
    * @return mixed
    * @throws NotFoundHttpException if the model cannot be found
    */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        try {
            if ($model->delete()) {
                Yii::$app->session->setFlash('toastr-' . $model->toastr_key . '-index', [
                    'title' => 'Thông báo',
                    'text' => 'Xoá thành công',
                    'type' => 'success'
                ]);
            } else {
                $errors = Html::tag('p', 'Xoá thất bại');
                foreach ($model->getErrors() as $error) {
                    $errors .= Html::tag('p', $error[0]);
                }
                Yii::$app->session->setFlash('toastr-' . $model->toastr_key . '-index', [
                    'title' => 'Thông báo',
                    'text' => $errors,
                    'type' => 'warning'
                ]);
            }
        } catch (Exception $ex) {
            Yii::$app->session->setFlash('toastr-' . $model->toastr_key . '-index', [
                'title' => 'Thông báo',
                'text' => Html::tag('p', 'Xoá thất bại: ' . $ex->getMessage()),
                'type' => 'warning'
            ]);
        }
        return $this->redirect(['index']);
    }

    public function actionChangeValue()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        if (Yii::$app->request->isAjax) {
            $id = Yii::$app->request->get('id');
            $val = Yii::$app->request->get('val');
            $field = Yii::$app->request->get('field');
            $model = SocialsTable::getById($id);
            if ($model === null || !$model->canGetProperty($field)) return [
                'code' => 404,
                'msg' => SocialsModule::t('news', 'Không tìm thấy dữ liệu')
            ];
            try {
                $model->setAttribute($field, $val);
                if ($model->validate() && $model->save()) return [
                    'code' => 200,
                    'msg' => SocialsModule::t('news', 'Cập nhật thành công')
                ];
                else {
                    $error = '';
                    foreach ($model->getErrors() as $err) {
                        $error .= $err[0] . '<br/>';
                    }
                    return [
                        'code' => 400,
                        'msg' => SocialsModule::t('news', 'Cập nhật thất bại') . ': <br/>' . $error
                    ];
                }
            } catch (Exception $ex) {
                return [
                    'code' => 400,
                    'msg' => SocialsModule::t('news', 'Có lỗi xảy ra')
                ];
            }
        }
        return [
            'code' => 403,
            'msg' => SocialsModule::t('news', 'Không có quyền truy cập')
        ];
    }

    /**
    * Finds the Socials model based on its primary key value.
    * If the model is not found, a 404 HTTP exception will be thrown.
    * @param integer $id
    * @return Socials the loaded model
    * @throws NotFoundHttpException if the model cannot be found
    */


    protected function findModel($id)
    {
        if (($model = Socials::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('socials', 'The requested page does not exist.'));
    }
}
