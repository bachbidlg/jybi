<?php

namespace milkyway\manual\controllers;

use backend\components\MyController;
use milkyway\manual\models\PermissionManual;
use milkyway\manual\models\UserManual;

class UserManualController extends MyController
{
    /**
     * @param null|int $id
     * @return string|\yii\web\Response
     */
    public function actionIndex($id = null)
    {
        $permisson_manual = PermissionManual::findOne($id);
        if ($id != null && $permisson_manual == null) return $this->redirect(['index']);
        $user_manual = UserManual::find()->where(['for_permission' => $id])->orderBy(['sort' => SORT_DESC, 'id' => SORT_DESC])->one();
        return $this->render('index', [
            'permission_manual' => $permisson_manual,
            'user_manual' => $user_manual,
        ]);
    }
}
