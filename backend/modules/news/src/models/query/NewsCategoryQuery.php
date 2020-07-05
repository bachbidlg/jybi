<?php

namespace milkyway\news\models\query;

use milkyway\news\models\NewsCategory;

/**
 * This is the ActiveQuery class for [[NewsCategory]].
 *
 * @see NewsCategory
 */
class NewsCategoryQuery extends \yii\db\ActiveQuery
{
    public function published()
    {
        return $this->andWhere([NewsCategory::tableName() . '.status' => NewsCategory::STATUS_PUBLISHED]);
    }

    public function disabled()
    {
        return $this->andWhere([NewsCategory::tableName() . '.status' => NewsCategory::STATUS_DISABLED]);
    }
}
