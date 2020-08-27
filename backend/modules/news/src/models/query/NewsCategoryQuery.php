<?php

namespace milkyway\news\models\query;

use milkyway\news\models\NewsCategory;

/**
 * This is the ActiveQuery class for [[NewsCategoryQuery]].
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

    public function sort($sort = SORT_ASC)
    {
        return $this->orderBy([NewsCategory::tableName() . '.sort' => $sort]);
    }

    public function findByTypeDuAn($type_du_an)
    {
        return $this->andWhere([NewsCategory::tableName() . '.type_du_an' => $type_du_an]);
    }
}
