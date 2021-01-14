<?php

namespace milkyway\manual\models\query;

use milkyway\manual\models\PermissionManual;

/**
 * This is the ActiveQuery class for [[PermissionManual]].
 *
 * @see PermissionManual
 */
class PermissionManualQuery extends \yii\db\ActiveQuery
{
    public function published()
    {
        return $this->andWhere([PermissionManual::tableName() . '.status' => PermissionManual::STATUS_PUBLISHED]);
    }

    public function disabled()
    {
        return $this->andWhere([PermissionManual::tableName() . '.status' => PermissionManual::STATUS_DISABLED]);
    }
}
