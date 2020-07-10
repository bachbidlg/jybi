<?php

namespace milkyway\partner\models\query;

use milkyway\partner\models\Partner;

/**
 * This is the ActiveQuery class for [[Partner]].
 *
 * @see Partner
 */
class PartnerQuery extends \yii\db\ActiveQuery
{
    public function published()
    {
        return $this->andWhere([Partner::tableName() . '.status' => Partner::STATUS_PUBLISHED]);
    }

    public function disabled()
    {
        return $this->andWhere([Partner::tableName() . '.status' => Partner::STATUS_DISABLED]);
    }
}
