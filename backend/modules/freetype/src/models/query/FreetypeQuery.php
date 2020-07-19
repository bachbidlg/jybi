<?php

namespace milkyway\freetype\models\query;

use milkyway\freetype\models\Freetype;

/**
 * This is the ActiveQuery class for [[Freetype]].
 *
 * @see Freetype
 */
class FreetypeQuery extends \yii\db\ActiveQuery
{
    public function published()
    {
        return $this->andWhere([Freetype::tableName() . '.status' => Freetype::STATUS_PUBLISHED]);
    }

    public function disabled()
    {
        return $this->andWhere([Freetype::tableName() . '.status' => Freetype::STATUS_DISABLED]);
    }

    public function sort($sort = SORT_ASC)
    {
        return $this->orderBy([Freetype::tableName() . '.sort' => $sort]);
    }
}
