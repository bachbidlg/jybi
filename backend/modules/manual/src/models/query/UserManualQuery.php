<?php

namespace milkyway\manual\models\query;

use milkyway\manual\models\UserManual;

/**
 * This is the ActiveQuery class for [[UserManual]].
 *
 * @see UserManual
 */
class UserManualQuery extends \yii\db\ActiveQuery
{
    public function published()
    {
        return $this->andWhere([UserManual::tableName() . '.status' => UserManual::STATUS_PUBLISHED]);
    }

    public function disabled()
    {
        return $this->andWhere([UserManual::tableName() . '.status' => UserManual::STATUS_DISABLED]);
    }
}
