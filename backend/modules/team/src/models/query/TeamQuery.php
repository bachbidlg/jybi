<?php

namespace milkyway\team\models\query;

use milkyway\team\models\Team;

/**
 * This is the ActiveQuery class for [[Team]].
 *
 * @see Team
 */
class TeamQuery extends \yii\db\ActiveQuery
{
    public function published()
    {
        return $this->andWhere([Team::tableName() . '.status' => Team::STATUS_PUBLISHED]);
    }

    public function disabled()
    {
        return $this->andWhere([Team::tableName() . '.status' => Team::STATUS_DISABLED]);
    }
}
