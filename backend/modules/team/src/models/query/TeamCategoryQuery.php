<?php

namespace milkyway\team\models\query;

use milkyway\team\models\TeamCategory;

/**
 * This is the ActiveQuery class for [[TeamCategory]].
 *
 * @see TeamCategory
 */
class TeamCategoryQuery extends \yii\db\ActiveQuery
{
    public function published()
    {
        return $this->andWhere([TeamCategory::tableName() . '.status' => TeamCategory::STATUS_PUBLISHED]);
    }

    public function disabled()
    {
        return $this->andWhere([TeamCategory::tableName() . '.status' => TeamCategory::STATUS_DISABLED]);
    }

    public function sort($sort = SORT_ASC)
    {
        return $this->orderBy([TeamCategory::tableName() . '.sort' => $sort]);
    }
}
